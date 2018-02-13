<?php
namespace DesignPatern\Factory;
require_once __DIR__.'/'.'Pizza.php';
require_once __DIR__.'/'.'PizzaStore.php';
require_once __DIR__.'/'.'SimplePizzaFactory.php';
require_once __DIR__.'/'.'SimplePizzaStore.php';
class PizzaTest{
    public function testComplete() {
        //测试：订购一个纽约芝士批萨,和一个芝加哥芝士批萨
        $storeNy = new NYPizzaStore();
        $pizza = $storeNy->orderPizza("cheese");
        print_r(" 订购完成：". $pizza->getName());
        print_r("\n");
        $storeChigago = new ChicagoPizzaStore();
        $pizza = $storeChigago->orderPizza("cheese");
        print_r(" 订购完成：". $pizza->getName());
        print_r("\n");
    }

    public function testSimple(){
        $store = new SimplePizzaStore();
        $store->orderPizza("cheese");
    }
}

$testObj = new PizzaTest();
$testObj->testComplete();
$testObj->testSimple();



