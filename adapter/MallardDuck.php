<?php
namespace DesignPatern\Adapter;
/**
 *
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午1:59
 */
/**
 * 野鸭类 实现 DUCK接口
 * Class MallardDuck
 * @package DesignPatern\Adapter
 */
class MallardDuck implements Duck{

    public function quack()
    {
        // TODO: Implement quack() method.
        var_dump("嘎嘎");
    }

    public function fly()
    {
        // TODO: Implement fly() method.
        var_dump("我在飞");
    }
}