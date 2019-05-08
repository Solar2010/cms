<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/6
 * Time: 9:16
 */

namespace app\admin\controller;


class Conf extends Base
{
    /**
     * 配置列表
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function lst()
    {
        $lst = db('conf') -> paginate(10);
        $this -> assign([
            'lst' => $lst
        ]);
        return view();
    }

    /**
     * 配置添加
     * author:Ian
     * desc:
     * @return \think\response\View
     */
    public function add()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            $validate = validate('Conf');
            if(!$validate -> scene('add') ->check($data)) {
                $this -> error($validate -> getError());
            }
            $add = db('conf') -> insert($data);
            if($add !== false) {
                $this -> success('添加成功','lst');
            } else {
                $this -> error('添加失败');
            }

        }
        return view();
    }

    /**
     * 修改配置
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function edit()
    {
        $id = input('id');
        if(request() -> isPost()) {
            $data = input('post.');
            $validate = validate('Conf');
            if(!$validate -> scene('edit') -> check($data)) {
                $this -> error($validate -> getError());
            }
            $edit = db('conf') -> update($data);
            if($edit !== false) {
                $this -> success('修改成功','lst');
            } else {
                $this -> error('修改失败');
            }
        }
        $result = db('conf')
            -> where('id',$id)
            -> find();
        $this -> assign([
            'result' => $result
        ]);
        return view();
    }

    /**
     * 删除配置
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function del()
    {
        $id = input('id');
        $del = db('conf')
            -> where('id',$id)
            -> delete();
        if($del !== false) {
            $this -> success('删除成功');
        } else {
            $this -> error('删除失败');
        }
        return view();
    }

    /**
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function conflist()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            $enameArr = db('conf')
                -> column('ename');
            $confArr = [];
            foreach ($data as $key => $value) {
                $confArr[] = $key;
                if(is_array($value)) {
                    $value = implode(',',$value);
                }
                db('conf')
                    -> where('ename',$key)
                    -> update(['value' => $value]);
            }
            $imgColumn = db('conf')
                -> where('dt_type',6)
                -> column('ename');
            foreach ($enameArr as $key => $value) {
                if(!in_array($value, $confArr) && !in_array($value,$imgColumn)) {
                    db('conf')
                        -> where('ename',$value)
                        -> update(['value' => ""]);
                }
            }

            //附件
            foreach ($imgColumn as $key => $value) {
                if($_FILES[$value]['tmp_name'] != '') {
                    $file = request() -> file($value);
                    $info = $file -> move(ROOT_PATH.'public'.DS.'uploads/admin/conf');
                    if($info) {
                        $path = $info -> getSaveName();
                        db('conf')
                            -> where('ename',$value)
                            -> update(['value' => $path]);
                    }
                }

            }
            return $this -> success('修改成功');
        }
        $confs = db('conf') -> select();
        $this -> assign([
            'confs' => $confs
        ]);
        return view();
    }

}