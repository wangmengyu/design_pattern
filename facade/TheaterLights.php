<?php
/**
 * 灯光
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午11:14
 */

namespace DesignPatern\Facade;


class TheaterLights
{
    public function dim($second){
        var_dump("灯光昏暗{$second}秒");
    }

    public function on(){
        var_dump("开启灯光");
    }


}