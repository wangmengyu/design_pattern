<?php
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 下午3:27
 */

namespace DesignPatern\encapsulating_algorithms;

class Tea extends CaffeineBeverage
{
    function brew()
    {
        // TODO: Implement brew() method.
        var_dump("用沸水浸泡茶叶");
    }

    function addCondiments()
    {
        // TODO: Implement addCondiments() method.
        var_dump("加入柠檬");
    }
}