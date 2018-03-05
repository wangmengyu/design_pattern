<?php
/**
 * 封装算法
 * 咖啡
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 下午3:19
 */

namespace DesignPatern\encapsulating_algorithms;


class Coffee extends CaffeineBeverage
{

    /**
     * 烧开水
     */
    public function boilWater(){
        var_dump("烧开水");
    }


    public function pourInCup(){
        var_dump("倒入杯子");
    }


    function brew()
    {
        // TODO: Implement brew() method.
        var_dump("用沸水冲泡咖啡");
    }

    function addCondiments()
    {
        // TODO: Implement addCondiments() method.
        var_dump("加入糖和牛奶");
    }
}