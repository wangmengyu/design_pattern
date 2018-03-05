<?php
/**
 * 咖啡因抽象类
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 下午3:40
 */
namespace DesignPatern\encapsulating_algorithms;

abstract class CaffeineBeverage
{

    /**
     * 准备食谱,没人能修改它
     * 每个步骤被封装入这个方法
     * 算法模板，其中每个执行的方法都是一个步骤，有些由基类实现，有些由子类实现
     */
    final public function prepareRecipe(){
        $this->boilWater();
        $this->brew();
        $this->pourInCup();
        if ($this->customerWantsCondiments()) {
            $this->addCondiments();
        }
    }
    //研磨,抽象方法，需要由子类实现
    abstract function brew();
    //加料，抽象方法，需要由子类实现
    abstract function addCondiments();

    final public function boilWater(){
        var_dump("烧开水");
    }
    final public function pourInCup(){
        var_dump("倒入杯子");
    }

    /**
     * 钩子方法，可由子类实现
     * 默认返回true
     * @return bool
     */
    public function customerWantsCondiments(){
        return true;
    }

}