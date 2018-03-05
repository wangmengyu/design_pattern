<?php
/**
 * DVD播放器
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午10:14
 */

namespace DesignPatern\Facade;


class DvdPlayer
{
    public function on() {
        var_dump("开启dvd");

    }
    public function play($movie){
        var_dump("播放电影<{$movie}>");
    }

    public function stop(){
        var_dump("DVD停止播放");

    }

    public function eject(){
        var_dump("弹出DVD");

    }

    public function off(){
        var_dump("关闭DVD");
    }
}