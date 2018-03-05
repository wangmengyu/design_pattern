<?php
/**
 * 屏幕
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午11:15
 */

namespace DesignPatern\Facade;


class Screen
{
    public function down(){
        var_dump("放下屏幕");
    }

    public function up(){
        var_dump("收起屏幕");
    }

}