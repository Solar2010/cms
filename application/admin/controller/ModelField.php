<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/25
 * Time: 8:15
 */

namespace app\admin\controller;


use think\Db;

class ModelField extends Base
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
        $lst = db('model_field')
            -> field('tp_model_field.*,tp_model.model_name')
            -> join('tp_model','tp_model_field.mode_id = tp_model.id')
            -> paginate(10);
        $this -> assign([
            'lst' => $lst
        ]);
        return view();
    }

    /**
     * 添加字段
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View|void
     */
    public function add()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            //过滤中文逗号
            if(!empty($data['field_values'])) {
                $data['field_values'] = str_replace('，', ',', $data['field_values']);
            }
            $validate = validate('ModelField');
            if(!$validate -> scene('edit') -> check($data)) {
                return $this -> error($validate -> getError());
            }
            $add = db('model_field')
                -> insert($data);
            if($add) {
                switch ($data['field_type']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $fieldType = sprintf("varchar(150) not null default '' comment '%s'",$data['field_cname']);
                        break;
                    case 5:
                        $fieldType = sprintf("varchar(600) not null default '' comment '%s'",$data['field_cname']);
                        break;
                    case 7:
                        $fieldType = sprintf("float not null default 0.0 comment '%s'",$data['field_cname']);
                        break;
                    case 8:
                        $fieldType = sprintf("int not null default 0 comment '%s'",$data['field_cname']);
                        break;
                    case 9:
                        $fieldType = sprintf("longtext not null default '' comment '%s'",$data['field_cname']);
                        break;
                    default:
                        $fieldType = "";
                        break;
                }
                $table = db('model') -> where('id',$data['mode_id']) -> column('table_name');
                $sql = sprintf("ALTER TABLE %s ADD %s %s", config('database.prefix').$table[0], $data['field_ename'], $fieldType);
                Db::execute($sql);
                return $this -> success('添加成功','lst');
            } else {
                return $this -> error('添加失败');
            }
        }
        $mode = db('model')
            -> field('id,model_name')
            -> select();
        $this -> assign([
            'mode' => $mode
        ]);
        return view();
    }

    /**
     * 编辑
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View|void
     */
    public function edit()
    {
        if(request() -> isPost()) {
            $data = input('post.');
            if(!empty($data['field_values'])) {
                $data['field_values'] = str_replace('，', ',', $data['field_values']);
            }
            $result = db('model_field')
                -> where('tp_model_field.id',$data['id'])
                -> field('tp_model_field.field_ename,tp_model.table_name')
                -> join('tp_model','tp_model_field.mode_id = tp_model.id')
                -> find();
            $validate = validate('ModelField');
            if(!$validate -> scene('edit') -> check($data)) {
                return $this -> error($validate -> getError());
            }
            $edit = db('model_field') -> update($data);

            if($edit !== false) {
                switch ($data['field_type']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $fieldType = sprintf("varchar(150) not null default '' comment '%s'",$data['field_cname']);
                        break;
                    case 5:
                        $fieldType = sprintf("varchar(600) not null default '' comment '%s'",$data['field_cname']);
                        break;
                    case 7:
                        $fieldType = sprintf("float not null default 0.0 comment '%s'",$data['field_cname']);
                        break;
                    case 8:
                        $fieldType = sprintf("int not null default 0 comment '%s'",$data['field_cname']);
                        break;
                    case 9:
                        $fieldType = sprintf("longtext not null default '' comment '%s'",$data['field_cname']);
                        break;
                    default:
                        $fieldType = "";
                        break;
                }
                $sql = sprintf("ALTER TABLE %s CHANGE %s %s %s",config('database.prefix').$result['table_name'], $result['field_ename'], $data['field_ename'], $fieldType);
                Db::execute($sql);
                return $this -> success('修改成功','lst');
            } else {
                return $this -> error('修改失败');
            }
        }
        $mode = db('model')
            -> field('id,model_name')
            -> select();
        $modelField = db('model_field') -> find(input('id'));
        $this -> assign([
            'mode' => $mode,
            'modelField' => $modelField
        ]);
        return view();
    }


    /**
     * ajax删除字段
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\Json|void
     */
    public function del()
    {
        if(request() -> isAjax()) {
            $id = input('id');
            $result = db('model_field')
                -> where('tp_model_field.id',$id)
                -> field('tp_model_field.field_ename,tp_model.table_name')
                -> join('tp_model','tp_model_field.mode_id = tp_model.id')
                -> find();
            $sql = sprintf("ALTER TABLE %s DROP COLUMN %s",config('database.prefix').$result['table_name'], $result['field_ename']);
            Db::execute($sql);
            db('model_field') -> delete($id);
            return json([
                'msg' => '删除成功',
                'code' => 200,
                'status' => 1
            ]);
        }
        return $this -> error('非法操作','lst');
    }

}