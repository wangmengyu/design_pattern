<?php
namespace DesignPatern\Factory;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-13
 * Time: 上午9:30
 */
class SimplePizzaStore{
    protected $factory;
    function orderPizza($type) {
        $this->factory = new SimplePizzaFactory();
        $pizza = $this->factory->createPizza($type);
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
    }
}