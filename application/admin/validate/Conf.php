<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/7
 * Time: 19:09
 */

namespace app\admin\validate;


use think\Validate;

class Conf extends Validate
{
    /**
     * 规则
     * @var array
     */
    protected $rule = [
        'cname' => 'require|max:60|unique:conf',
        'ename' => 'require|max:30|unique:conf',
        'dt_type' => 'require|number',
        'cf_type' => 'require|number'
    ];

    /**
     * 提示信息
     * @var array
     */
    protected $message = [
        'cname.require' => '中文名称必填',
        'cname.max' => '中文名称最大长度不超过60',
        'cname.unique' => '中文名称不能重复',
        'ename.require' => '英文名称必填',
        'ename.max' => '英文名称最大长度不能超过30',
        'ename.unique' => '英文名称重复',
        'dt_type.require' => 'dt_type必填',
        'dt_type.number' => '字符类型必须是数字',
        'cf_type.require' => 'cf_type必填',
        'cf_type.number' => '字符类型必须是数字'
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