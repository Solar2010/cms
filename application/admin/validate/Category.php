<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/17
 * Time: 8:15
 */

namespace app\admin\validate;


use think\Validate;

class Category extends Validate
{

    protected $rule = [
        'mode_id' => 'require|number',
        'pid' => 'require|number',
        'cate_name' => 'require|unique:category',
        'cate_attr' => 'require|number',
    ];

    protected $message = [
        'mode_id.require' => '模型ID不能为空',
        'mode_id.number' => '模型ID必须是数字',
        'pid.require' => '上级栏目不能为空',
        'pid.number' => '上级栏目ID必须是数字',
        'cate_name.require' => '栏目名称不能为空',
        'cate_name.unique' => '栏目名称不能重复',
        'cate_attr.require' => '栏目属性不能为空',
        'cate_attr.number' => '栏目属性ID必须是数字'
    ];

    protected $scene = [

    ];
}