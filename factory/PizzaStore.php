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
    abstract function createPizza($type);//由子类实现的抽象工厂方法

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

    protected $ingredientFactory;
    /**
     * 制作pizza. 每个店有自己不同的创建方式，必须被实现
     * @param $type
     * @return Pizza $pizza;
     */
    function createPizza($type)
    {
        $pizza = null;
        $this->ingredientFactory = new NYPizzaIngredientFactory();
        if ($type == 'cheese') {
            $pizza = new CheesePizza($this->ingredientFactory);
            $pizza->setName("纽约风格芝士批萨");
        } else if ($type == 'pepperoni') {
            $pizza = new PepperoniPizza($this->ingredientFactory);
            $pizza->setName("纽约风格香肠批萨");
        } else if ($type == 'clam') {
            $pizza = new ClamPizza($this->ingredientFactory);
            $pizza->setName("纽约风格蛤蜊批萨");
        } else if ($type == 'veggie') {
            $pizza = new VeggiePizza($this->ingredientFactory);
            $pizza->setName("纽约风格蔬菜批萨");
        }
        return $pizza;
    }
}

/**
 * 芝加哥加盟店
 * Class ChicagoPizzaStore
 */
class ChicagoPizzaStore extends PizzaStore{

    protected $ingredientFactory;
    /**
     * 制作pizza. 每个店有自己不同的创建方式，必须被实现
     * @param $type
     * @return Pizza $pizza;
     */
    function createPizza($type)
    {
        $this->ingredientFactory = new ChicagoPizzaIngredientFactory();
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new CheesePizza($this->ingredientFactory);
            $pizza->setName("芝加哥风格芝士批萨");
        } else if ($type == 'pepperoni') {
            $pizza = new PepperoniPizza($this->ingredientFactory);
            $pizza->setName("芝加哥风格香肠批萨");
        } else if ($type == 'clam') {
            $pizza = new ClamPizza($this->ingredientFactory);
            $pizza->setName("芝加哥蛤蜊批萨");
        } else if ($type == 'veggie') {
            $pizza = new VeggiePizza($this->ingredientFactory);
            $pizza->setName("芝加哥风格蔬菜批萨");
        }
        return $pizza;
    }
}

