<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/22
 * Time: 7:26
 */

namespace app\admin\validate;


use think\Validate;

class Model extends Validate
{
    protected $rule = [
        'table_name' => 'require|unique:model',
        'model_name' => 'require|unique:model',
        'status' => 'require|number'
    ];

    protected $message = [
        'table_name.require' => '表名称必填',
        'table_name.unique' => '表名称不能重复',
        'model_name.require' => '模型名称必填',
        'model_name.unique' => '模型名称不能重复',
        'status.require' => '模型状态必填',
        'status.number' => '模型状态必须是数字'
    ];

    protected $scene = [
        'add' => [],
        'edit' => []
    ];

}