<?php
namespace DesignPatern\Factory;
/**;
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-11
 * Time: 下午5:11
 */
/**
 * 批萨店 超类
 * Class PizzaStore
 */
abstract class PizzaStore{
    /**
     * 工厂方法 制作pizza
     * 每个店有自己不同的创建方式，必须被实现
     * @param $type
     * @return Pizza $pizza;
     */
    abstract function createPizza($type);//必须由子类实现的抽象工厂方法

    /**
     *  pizza订单方法：
     *   负责处理订单，所有加盟店保持同样处理订单流程
     * @param $type
     * @return Pizza
     */
    public function orderPizza($type){
        $pizza = $this->createPizza($type);//使用工厂类的createPizza方法代替new方法
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
        return $pizza;
    }
}

/**
 * 纽约加盟店
 * Class NYPizzaStore
 */
class NYPizzaStore extends PizzaStore{

    /**
     * 制作pizza. 每个店有自己不同的创建方式，必须被实现
     * @param $type
     * @return Pizza $pizza;
     */
    function createPizza($type)
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new NYCheesePizza();
        } else if ($type == 'pepperoni') {
            $pizza = new NYPepperoniPizza();
        } else if ($type == 'clam') {
            $pizza = new NYClamPizza();
        } else if ($type == 'veggie') {
            $pizza = new NYVeggiePizza();
        }
        return $pizza;
    }
}

/**
 * 芝加哥加盟店
 * Class ChicagoPizzaStore
 */
class ChicagoPizzaStore extends PizzaStore{

    /**
     * 制作pizza. 每个店有自己不同的创建方式，必须被实现
     * @param $type
     * @return Pizza $pizza;
     */
    function createPizza($type)
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new ChicagoCheesePizza();
        } else if ($type == 'pepperoni') {
            $pizza = new ChicagoPepperoniPizza();
        } else if ($type == 'clam') {
            $pizza = new ChicagoClamPizza();
        } else if ($type == 'veggie') {
            $pizza = new ChicagoVeggiePizza();
        }
        return $pizza;
    }
}

/**
 * 加州加盟店
 * Class CAPizzaStore
 */
class CAPizzaStore extends PizzaStore{

    /**
     * 制作pizza. 每个店有自己不同的创建方式，必须被实现
     * @param $type
     * @return Pizza $pizza;
     */
    function createPizza($type)
    {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new CACheesePizza();
        } else if ($type == 'pepperoni') {
            $pizza = new CAPepperoniPizza();
        } else if ($type == 'clam') {
            $pizza = new CAClamPizza();
        } else if ($type == 'veggie') {
            $pizza = new CAVeggiePizza();
        }
        return $pizza;
    }
}

