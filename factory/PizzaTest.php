<?php
namespace DesignPatern\Factory;
require_once __DIR__.'/'.'Pizza.php';
require_once __DIR__.'/'.'PizzaStore.php';
require_once __DIR__.'/'.'SimplePizzaFactory.php';
require_once __DIR__.'/'.'SimplePizzaStore.php';
require_once __DIR__.'/'.'BlackOlives.php';
require_once __DIR__.'/'.'EggPlant.php';
require_once __DIR__.'/'.'freshClam.php';
require_once __DIR__.'/'.'FrozenClam.php';
require_once __DIR__.'/'.'Garlic.php';
require_once __DIR__.'/'.'MozzarallaCheese.php';
require_once __DIR__.'/'.'MarinaraSauce.php';
require_once __DIR__.'/'.'Mushroom.php';
require_once __DIR__.'/'.'Onion.php';
require_once __DIR__.'/'.'PizzaIngredientFactory.php';
require_once __DIR__.'/'.'PlumTomatoSauce.php';
require_once __DIR__.'/'.'RedPepper.php';
require_once __DIR__.'/'.'ReggianoCheese.php';
require_once __DIR__.'/'.'SlicedPepperoni.php';
require_once __DIR__.'/'.'Spinach.php';
require_once __DIR__.'/'.'ThickCrustDough.php';
require_once __DIR__.'/'.'ThinCrustDough.php';

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



