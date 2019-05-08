<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/10
 * Time: 8:20
 */

namespace app\admin\controller;


class Category extends Base
{
    public function index()
    {
        return;
    }
    /**
     * 列表
     * author:Ian
     * desc:
     */
    public function lst()
    {
        $lst = model('category') -> catetree();
        $this -> assign([
            'lst' => $lst
        ]);
        return view();
    }

    /**
     * 栏目添加
     * author:Ian
     * desc:
     * @return \think\response\View|void
     */
    public function add()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            $validate = validate('Category');
            if(!$validate -> scene('add') -> check($data)) {
                return $this -> error($validate -> getError());
            }
            $add = db('category') -> insert($data);
            if($add) {
                return $this -> success('添加成功','lst');
            } else {
                return $this -> error('添加失败');
            }
        }
        $id = input('id');
        $categorys = model('Category')
            -> catetree();

        $model = db('model')
            -> select();
        $this -> assign([
            'categorys' => $categorys,
            'id' => $id,
            'model' => $model
        ]);
        return view();
    }

    /**
     * 栏目编辑
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function edit()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            $data['status'] = isset($data['status'])?$data['status']:0;
            $validate = validate('Category');
            if(!$validate -> scene('edit') -> check($data)) {
                return $this -> error($validate -> getError());
            }
            $edit = db('category')
                -> update($data);

            if($edit !== false) {
                $this -> success('修改成功','lst');
            } else {
                $this -> error('修改失败');
            }
        }
        $id = input('id');
        $result = db('category') -> find($id);
        $modelIds = db('category') -> column('mode_id');
        $categorys = model('Category')
            -> catetree();
        $model = db('model')
            -> select();

        $this -> assign([
            'categorys' => $categorys,
            'result' => $result,
            'modeIds' => $modelIds,
            'model' => $model
        ]);
        return view();

    }

    /**
     * 栏目删除
     * author:Ian
     * desc:
     * @throws
     * @param $id
     */
    public function del($id)
    {
        $ids = model('category') -> childrenIds($id);
        $ids[] = (int)$id;
        $del = db('category')
            -> delete($ids);
        if($del) {
            return $this -> success("删除成功");
        } else {
            return $this -> error("删除失败");
        }
    }

    /**
     * 图片上传
     * author:Ian
     * desc:
     */
    public function upload()
    {
        $file = request() -> file('img');
        $info = $file -> move(ROOT_PATH.'public'.DS.'uploads/admin/category');
        if($info) {
            echo $info -> getSaveName();
            exit;
        } else {
            echo $info -> getError();
            exit;
        }
    }

    /**
     * ajax修改栏目状态
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\Json
     */
    public function changeStatus()
    {
        if(request() -> isAjax()) {
            $id = input('post.id');
            $status = db('category')
                -> where('id',$id)
                -> field('status')
                -> find();
            if($status['status'] == 1) {
                db('category')
                    -> where('id', $id)
                    -> update(['status' => 0]);
                return json([
                    'msg' => 'success',
                    'code' => 200,
                    'data' => 0
                ]);
            } else {
                db('category')
                    -> where('id', $id)
                    -> update(['status' => 1]);
                return json([
                    'msg' => 'success',
                    'code' => 200,
                    'data' => 1
                ]);
            }
        } else {
            $this -> error('非法操作');
        }
    }

    /**
     * 排序和批量删除
     * author:Ian
     * desc:
     */
    public function delAndSort()
    {
        $data = input('post.');
        foreach ($data['sort'] as $key => $value) {
            db('category')
                -> where('id',$key)
                -> update(['sort' => $value]);
        }
        if(!empty($data['item'])) {
            $childrenIds = [];
            foreach ($data['item'] as $key => $value) {
                $childrenIds[] = model('category')
                    -> childrenIds($value);
                $childrenIds[] = (int)$value;

            }
            $ids = [];
            foreach ($childrenIds as $key => $value) {
                if(!is_array($value)) {
                    $ids[] = $value;
                    continue;
                }
                foreach ($value as $k => $v) {
                    $ids[] = $v;
                }
            }
            $ids = array_unique($ids);
            db('category') -> delete($ids);
        }
        $this -> success('数据处理成功','lst');
    }

    /**
     * ajax异步删除文件
     * author:Ian
     * desc:
     * @return \think\response\Json
     */
    public function unlinkFile()
    {
        $url = input('post.imgurl');
        $res = @unlink(UPLOAD_IMG.'admin/category/'.$url);
        $id = input('post.id');
        if($res) {
            if(isset($id)) {
                db('category')
                    -> where('id',$id)
                    -> setField('img','');
            }
            return json([
                'msg' => '文件删除成功',
                'code' => 200,
                'status' => 1
            ]);
        } else {
            return json([
                'msg' => '文件删除失败',
                'code' => 500,
                'status' =>  2
            ]);
        }
    }

    /**
     * ajax伸缩文件
     * author:Ian
     * desc:
     */
    public function ajaxList()
    {
        if(request() -> isAjax()) {
            $id = input('post.id');
            $sonids = model('Category')
                -> childrenIds($id);
            echo json_encode($sonids);exit;
        }
        return $this -> error('非法操作');
    }

    /**
     * ajax获取栏目信息
     * author:Ian
     * desc:
     */
    public function ajaxCategoryInfo()
    {
        if(request() -> isAjax()) {
            $id = input('post.id');
            $data = db('category')
                -> find($id);
            if(!empty($data)) {
                return json([
                    'code' => 200,
                    'msg' => '请求成功',
                    'data' => $data
                ]);
            }
            return json([
                'code' => 404,
                'msg' => '无数据',
                'data' => []
            ]);
            exit;
        }
        return $this -> error('非法请求');
    }
}