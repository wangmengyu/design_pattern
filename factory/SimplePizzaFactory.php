<?php
namespace DesignPatern\Factory;
/**
 * 简单工厂模式
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-13
 * Time: 上午9:19
 */
class SimplePizzaFactory{
    function createPizza($type) {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new SimpleCheesePizza();
        } else if ($type == 'pepperoni') {
            $pizza = new PepperoniPizza();
        } else if ($type == 'clam') {
            $pizza = new ClamPizza();
        } else if ($type == 'veggie') {
            $pizza = new VeggiePizza();
        }
        return $pizza;
    }
}

