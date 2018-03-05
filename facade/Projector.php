<?php
/**
 * 投影仪
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午11:13
 */

namespace DesignPatern\Facade;


class Projector
{

    public function on(){
        var_dump("开启投影仪");
    }

    public function wideScreenMode(){
        var_dump("宽屏模式");

    }

    public function off(){
        var_dump("关闭投影仪");
    }

}