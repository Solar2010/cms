<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/13
 * Time: 17:07
 */

namespace app\admin\model;


use think\Model;

class Category extends Model
{
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /**
     * 获取无限极分类数据
     * author:Ian
     * desc:
     * @throws
     * @return array
     */
    public function catetree()
    {
        $data = $this
            -> field('tp_category.*, tp_model.model_name')
            -> join('tp_model','tp_category.mode_id = tp_model.id')
            -> order('sort desc')
            -> select();
        return $this -> sort($data);
    }

    /**
     * 无限极分类
     * author:Ian
     * desc:
     * @param $data
     * @param int $pid
     * @param int $level
     * @return array
     */
    protected function sort($data, $pid = 0, $level=0)
    {
        static $arr = array();

        foreach ($data as $key => $value) {
            if($value['pid'] == $pid) {
                $value['level'] = $level;
                $arr[] = $value;
                $this -> sort($data, $value['id'], $level + 1);
            }
        }

        return $arr;
    }

    /**
     * 获取子栏目ID
     * author:Ian
     * desc:
     * @param $id int
     * @throws
     * @return array
     */
    public function childrenIds($id)
    {
        $data = $this -> field('id,pid') -> select();
        return $this -> _childrenIds($data, $id);
    }

    /**
     * 获取所有子栏目ID
     * author:Ian
     * desc:
     * @param $data
     * @param $id
     * @return array
     */
    private function _childrenIds($data, $id)
    {
        static $arr = [];

        foreach ($data as $key => $value) {
            if($value['pid'] == $id) {
                $arr[] = $value['id'];
                $this -> _childrenIds($data, $value['id']);
            }
        }
        $arr = collection($arr) ->toArray();
        return $arr;
    }
}