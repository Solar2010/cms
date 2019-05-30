<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/5/17
 * Time: 6:48
 */

namespace app\admin\controller;


use QL\QueryList;

class Node extends Base
{
    /**
     * 采集列表
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function lst()
    {
        $lst = db('node')
            ->field('n.id, n.node_name, n.mode_id, n.output_encoding, n.input_encoding, n.addtime, n.lasttime, m.model_name')
            -> alias('n')
            -> join('tp_model m', 'n.mode_id=m.id')
            -> paginate(10);
        $this -> assign([
            'lst' => $lst
        ]);
        return view();
    }

    /**
     * 添加采集列表规则
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View|void
     */
    public function addListRules()
    {
        if(request() -> isPost()) {
            $_data = input('post.');
            $data['node_name'] = $_data['node_name'];
            $data['mode_id'] = $_data['mode_id'];
            $data['output_encoding'] = $_data['output_encoding'];
            $data['input_encoding'] = $_data['input_encoding'];
            $data['addtime'] = time();
            $data['list_rules'] = json_encode([
                'list_url' => $_data['list_url'],
                'start_page' => $_data['start_page'],
                'end_page' => $_data['end_page'],
                'step' => $_data['step'],
                'range' => $_data['range'],
                'list_rules' => [
                    'url' => $_data['url'],
                    'litpic' => $_data['litpic']
                ]
            ]);
            $add = db('node') -> insertGetId($data);
            if($add !== false) {
                $nodes = db('node')
                    -> field('mode_id')
                    -> find($add);
                $mode_id = $nodes['mode_id'];
                return $this -> redirect('addContentRules',['mode_id' => $mode_id, 'node_id' => $add]);
            } else {
                return $this -> error('添加失败');
            }
        }
        $modes = db('model') -> select();
        $this -> assign([
            'modes' => $modes
        ]);
        return view();
    }

    /**
     * 添加采集内容规则
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View|void
     */
    public function addContentRules()
    {
        $node_id = input('node_id');
        if(request() -> isPost()) {
            $data = input('post.');
            $rules = array();
            if(!empty($data)) {
                foreach ($data as $key => $value) {
                    if(empty($value['rule'])) {
                        continue;
                    }
                    $rules[$key][] = $value['rule'];
                    $rules[$key][] = $value['attr'];
                    $rules[$key][] = $value['filter'];
                }
            }
            $add = db('node')
                -> where(['id' => $node_id])
                -> update(['content_rules' => json_encode($rules)]);

            if($add !== false) {
                $this -> success('添加成功');
            } else {
                return $this->error('添加失败');
            }
        }
        //自定义模型字段
        $mode_id = input('mode_id');
        //$mode_id = 6;
        $modelFields = db('model_field')
            -> field('field_cname, field_ename')
            -> where(['mode_id' => $mode_id])
            -> select();
        $this -> assign([
            'modes' => $modelFields
        ]);
        return view();
    }

    /**
     * author:Ian
     * desc: $output_encoding 输出编码 $input_encoding 输入编码 $list_url 采集列表网址 $start_page 采集开始页码 $end_page 采集结束页码 $step 页码步长 $range 采集范围 $list_query_rules 采集规则
     * @throws
     * @param $id
     */
    public function doQuery($id)
    {
        $nodes = db('node')
            -> find($id);

        //采集参数
        $output_encoding = $nodes['output_encoding'];
        $input_encoding = $nodes['input_encoding'];


        $list_rules = json_decode($nodes['list_rules'], true);
        $list_url = $list_rules['list_url'];
        $start_page = $list_rules['start_page'];
        $end_page = $list_rules['end_page'];
        $step = $list_rules['step'];
        $range = $list_rules['range'];
        $list_query_rules = $list_rules['list_rules'];

        $list_query_rules = [
            'url' => [$list_query_rules['url'], 'href'],
            'litpic' => [$list_query_rules['litpic'], 'src']
        ];
        $content_query_rules = json_decode($nodes['content_rules'], true);

        //处理采集列表网址
        $_list_url = array();
        for($i = $start_page; $i <= $end_page; $i = $i + $step) {
            $_list_url[] = str_replace('(*)', $i, $list_url);
        }
        //print_r($list_query_rules);die;
        //循环采集列表数据
        $_data = array();
        foreach ($_list_url as $key => $value) {
//            print_r($list_query_rules);
//            print_r($value);die;
            $_data[] = QueryList::Query($value, $list_query_rules, $range, $output_encoding, $input_encoding) -> data;
            //print_r($_data);die;
        }

        //数组重构,列表数据结果集
        $data = [];
        foreach ($_data as $key => $value) {
            foreach ($value as $k => $v) {
                $data[] = $v;
            }
        }

        //内容数据采集
        $_dataContent = array();
        foreach ($data as $key => $value) {
            $_dataContent[] = QueryList::Query($value['url'], $content_query_rules, '', $output_encoding, $input_encoding) -> data;
            $_dataContent[$key][0]['url'] = $value['url'];//手动添加URL写入临时表
        }
        //数组重构
        $dataContent = array();
        foreach ($_dataContent as $key => $value) {
            foreach ($value as $k => $v) {
                $dataContent[] = $v;
            }
        }
        //将数据写入临时表
        foreach ($dataContent as $key => $value) {
            $insertData['node_id'] = $id;
            $insertData['title'] = $value['title'];
            $insertData['url'] = $value['url'];
            $insertData['addtime'] = time();
            $insertData['result'] = json_encode($value);
            db('html') -> insert($insertData);
        }
        dump($dataContent);die;

    }
}