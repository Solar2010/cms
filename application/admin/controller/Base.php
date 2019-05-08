<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/10
 * Time: 8:07
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;

class Base extends Controller
{
    public $config;
    /**
     * 初始化方法
     * author:Ian
     * desc:
     */
    public function _initialize()
    {
        parent::_initialize();
        $this -> getController();
        $this -> getConf();
    }

    /**
     * 获取控制器
     * author:Ian
     * desc:
     */
    public function getController()
    {
        $request = Request::instance();
        $con = $request -> controller();
        $this -> assign([
            'controller' => $con
        ]);
    }

    /**
     * 获取配置项
     * author:Ian
     * desc:
     */
    public function getConf()
    {
        $_conf = array();
        $conf = db('conf')
            -> field('ename,value')
            -> select();
        foreach ($conf as $item) {
            $_conf[$item['ename']] = $item['value'];
        }

        $this -> config = $_conf;
    }

}