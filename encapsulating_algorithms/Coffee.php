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

    public function customerWantsCondiments()
    {
       $answer = $this->getUserInput();
       if (substr(strtolower($answer),0,1) == 'y') {
           return true;
       }
       return false;
    }

    private function getUserInput(){
        fwrite(STDOUT,"请输入y or n代表是否需要加入添加品:");
        $arg = trim(fgets(STDIN));
        return $arg;
    }
}