<?php
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 下午2:26
 */

namespace DesignPatern\Facade;

class Car
{
    /**
     * @var Engine
     */
    protected $engine;
    public function __construct()
    {

    }


    /**
     * 开始
     * @param $key
     */
    public function start(Key $key) {
        $doors = new Doors();//方法内创建的对象
        $authorized = $key->turns();//作为参数传递进来的对象
        if ($authorized) {
            $this->engine->start();//自己组件
            $this->updateDashboardDisplay();
            $doors->lock();//方法内创建的类的方法可用
        }
    }

    /**
     * 更新显示面板
     */
    public function updateDashboardDisplay(){

    }
}

/**
 * 引擎
 * Class Engine
 * @package DesignPatern\Facade
 */
class Engine{

    public function start(){
        var_dump("发动引擎");
    }


}

/**
 * Class Key
 * @package DesignPatern\Facade
 */
class Key{

    /**
     * 转动
     */
    public function turns(){
        return true;
    }

}

/**
 * 门
 * Class Doors
 * @package DesignPatern\Facade
 */
class Doors{

    public function lock(){
        var_dump("上锁");
    }

}