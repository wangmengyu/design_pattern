<?php
/**
 * 爆米花机
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午11:15
 */

namespace DesignPatern\Facade;
class PopcornPopper
{

    public function on(){
        var_dump("开启爆米花机");
    }

    public function pop(){
        var_dump("取出爆米花");
    }

    public function off(){
        var_dump("关闭爆米花机");
    }


}