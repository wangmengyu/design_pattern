<?php
/**
 * 扩音器
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午10:14
 */

namespace DesignPatern\Facade;


class Amplifier
{

    public function on(){
        var_dump("开启扩音器");
    }

    public function setDvd(){
        var_dump("设置DVD模式");

    }

    public function setSurroundSound(){
        var_dump("设置环绕音");
    }

    public function setVolume($volume){
        var_dump("设置音量{$volume}");
    }

    public function off(){
         var_dump("关闭扩音器");
    }
}