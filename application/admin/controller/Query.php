<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/5/14
 * Time: 23:51
 */

namespace app\admin\controller;


use QL\QueryList;

class Query extends Base
{
    public function index()
    {
        $url = "http://www.ufoer.com/";
        $rule = [
            'title' => [
                '.article-list .desc a.title',
                'text'
            ]
        ];
        $hj = QueryList::Query($url, $rule, null, 'gbk');
        print_r($hj->data);die;
    }

}