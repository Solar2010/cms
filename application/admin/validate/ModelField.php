<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/25
 * Time: 21:25
 */

namespace app\admin\validate;


use think\Validate;

class ModelField extends Validate
{
    /**
     * 规则
     * @var array
     */
    protected $rule = [
        'field_cname' => 'require|unique:model_field',
        'field_ename' => 'require|unique:model_field',
        'field_type' => 'require',
        'mode_id' => 'require'
    ];
    /**
     * 提示信息
     * @var array
     */
    protected $message = [
        'field_cname.require' => '中文名称不能为空',
        'field_cname.unique' => '中文名称不能重复',
        'field_ename.require' => '英文名称不能为空',
        'field_ename.unique' => '英文名称不能重复',
        'field_type.require' => '类型必填',
        'mode_id.require' => '所属模型必填'

    ];

    /**
     * 场景
     * @var array
     */
    protected $scene = [
        'add' => [],
        'edit' => []
    ];

}