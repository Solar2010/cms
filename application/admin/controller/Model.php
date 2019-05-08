<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/21
 * Time: 21:51
 */

namespace app\admin\controller;


use think\Db;

class Model extends Base
{
    /**
     * 列表
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View
     */
    public function lst()
    {
        $lst = db('model') -> paginate(10);
        $prefix = config('database.prefix');
        $this -> assign([
            'lst' => $lst,
            'prefix' => $prefix
        ]);
        return view();
    }

    /**
     * 添加
     * author:Ian
     * desc:
     * @return \think\response\View|void
     */
    public function add()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            $validate = validate('Model');
            if(!$validate -> scene('add') -> check($data)) {
                return $this -> error($validate -> getError());
            }
            $add = db('model') -> insert($data);
            if($add) {
                $table = config('database.prefix').$data['table_name'];
                $sql = sprintf("CREATE TABLE %s(aid int unsigned not null default 0 comment '关联文章主键') engine=myisam default charset=utf8",$table);
                Db::execute($sql);
                return $this -> success('添加成功','lst');
            } else {
                return $this -> error('添加失败');
            }
        }
        return view();
    }

    /**
     * 编辑模型
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View|void
     */
    public function edit()
    {
        $id = input('id');
        if(request() -> isPost()) {
            $data = input('post.');
            $data['status'] = isset($data['status']) ? $data['status'] : 0;
            $validate = validate('Model');
            if(!$validate -> scene('edit') -> check($data)) {
                return $this -> error($validate -> getError());
            }
            if($data['old_table_name'] != $data['table_name']) {
                $sql = sprintf("ALTER TABLE %s RENAME %s", config('database.prefix').$data['old_table_name'], config('database.prefix').$data['table_name']);
                Db::execute($sql);
            }
            unset($data['old_table_name']);


            $edit = db('model')
                -> update($data);
            if($edit !== false) {

                return $this -> success('修改成功','lst');
            } else {
                return $this -> error('修改失败');
            }
        }
        $model = db('model') -> find($id);
        $this -> assign([
            'model' => $model
        ]);
        return view();
    }

    /**
     * 删除模型
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\Json|void
     */
    public function del()
    {
        if(request() -> isAjax()) {
            $id = input('post.id');
            $table = input('post.table_name');
            $del = db('model') -> delete($id);
            if($del) {
                $sql = sprintf("DROP TABLE %s",config('database.prefix').$table);
                Db::execute($sql);
                return json([
                    'msg' => '删除成功',
                    'code' => 200,
                    'status' => 1
                ]);
            } else {
                return json([
                    'msg' => '删除失败',
                    'code' => 200,
                    'status' => 0
                ]);
            }
        }
        return $this -> error('非法操作');
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
            $status = db('model')
                -> where('id',$id)
                -> field('status')
                -> find();
            if($status['status'] == 1) {
                db('model')
                    -> where('id', $id)
                    -> update(['status' => 0]);
                return json([
                    'msg' => 'success',
                    'code' => 200,
                    'data' => 0
                ]);
            } else {
                db('model')
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
}