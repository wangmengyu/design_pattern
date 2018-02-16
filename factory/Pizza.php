<?php
namespace DesignPatern\Factory;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-11
 * Time: 上午9:35
 */

/**
 * pizza 商品超类
 * Class Pizza
 */
abstract class Pizza{
    protected $name;//批萨名字
    protected $dough;//面团类型
    protected $sauce;//酱料类型
    protected $veggies = [];//蔬菜列表
    protected $pepperoni;//香肠
    protected $clam;//蛤蜊
    protected $cheese;//芝士
    abstract public function prepare();
    /*{
        print_r(" [准备] ". $this->name);
        print_r(" [面团] ". $this->dough);
        print_r(" [加酱料] ". $this->sauce);
        print_r(" [加佐料] ");
        foreach ($this->toppings as $top){
            print_r(' '. $top);
        }
    }*/
    public function bake(){
        print_r("烘焙25分钟");

    }
    public function cut(){
        //把披萨切成斜片
        print_r("[切片]把披萨切成斜片");
    }
    public function box(){
        print_r("[打包]".$this->getName());
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}
class SimpleCheesePizza extends Pizza
{
    public function __construct()
    {
        $this->name = "标准芝士批萨";//纽约风味芝士批萨
        $this->dough = "普通面饼";//薄饼
        $this->sauce = "纯番茄酱";//纯番茄酱
        $this->toppings = ['马力苏干酪']; //碎雷奇亚干酪奶酪
    }

    public function prepare()
    {
        // TODO: Implement prepare() method.
    }
}

/**
 * 芝士批萨
 * Class CheesePizza
 * @package DesignPatern\Factory
 */
class CheesePizza extends Pizza {

    protected $ingredientFactory;//原料工厂

    /**
     * 构造方法
     * CheesePizza constructor.
     * @param PizzaIngredientFactory $ingredientFactory 工厂对象
     */
    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {
        //引入原料工厂
        $this->ingredientFactory = $ingredientFactory;
    }

    public function prepare()
    {
        // TODO: Implement prepare() method.
        print_r('准备' . $this->name);
        //通过原料工厂创建指定的原料，特定的工厂会生产特定的原料，不关心是哪一个工厂
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();

    }
}

/**
 * Veggie批萨
 * Class VeggiePizza
 * @package DesignPatern\Factory
 */
class VeggiePizza extends Pizza {

    protected $ingredientFactory;//原料工厂

    /**
     * 构造方法
     * CheesePizza constructor.
     * @param PizzaIngredientFactory $ingredientFactory 工厂对象
     */
    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {
        //引入原料工厂
        $this->ingredientFactory = $ingredientFactory;
    }

    public function prepare()
    {
        // TODO: Implement prepare() method.
        print_r('准备' . $this->name);
        //通过原料工厂创建指定的原料，特定的工厂会生产特定的原料，不关心是哪一个工厂
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();
        $this->veggies = $this->ingredientFactory->createVeggies();

    }
}

/**
 * 意大利香肠批萨
 * Class PepperoniPizza
 * @package DesignPatern\Factory
 */
class PepperoniPizza extends Pizza {

    protected $ingredientFactory;//原料工厂

    /**
     * 构造方法
     * PepperoniPizza constructor.
     * @param PizzaIngredientFactory $ingredientFactory 工厂对象
     */
    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {
        //引入原料工厂
        $this->ingredientFactory = $ingredientFactory;
    }

    public function prepare()
    {
        // TODO: Implement prepare() method.
        print_r('准备' . $this->name);
        //通过原料工厂创建指定的原料，特定的工厂会生产特定的原料，不关心是哪一个工厂
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();
        $this->pepperoni = $this->ingredientFactory->createPepperoni();

    }
}

/**
 * 蛤披萨
 * Class ClamPizza
 * @package DesignPatern\Factory
 */
class ClamPizza extends Pizza {

    protected $ingredientFactory;//原料工厂

    /**
     * 构造方法
     * ClamPizza constructor.
     * @param PizzaIngredientFactory $ingredientFactory 工厂对象
     */
    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {
        //引入原料工厂
        $this->ingredientFactory = $ingredientFactory;
    }

    public function prepare()
    {
        // TODO: Implement prepare() method.
        print_r('准备' . $this->name);
        //通过原料工厂创建指定的原料，特定的工厂会生产特定的原料，不关心是哪一个工厂
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();
        $this->clam = $this->ingredientFactory->createClam();

    }
}

class NYCheesePizza extends CheesePizza{
    public function __construct()
    {
        $this->name = "纽约风味芝士批萨";//纽约风味芝士批萨
        $this->dough = "薄饼";//薄饼
        $this->sauce = "纯番茄酱";//纯番茄酱
        $this->toppings = ['碎雷奇亚干酪奶酪']; //碎雷奇亚干酪奶酪
    }

}
class ChicagoCheesePizza extends CheesePizza{
    public function __construct()
    {
        $this->name="芝加哥风味芝士批萨";//芝加哥风味芝士批萨
        $this->dough = "超厚面饼";//厚皮
        $this->sauce = "李子番茄酱";//李子番茄酱
        $this->toppings = ['马苏里拉奶酪'];//马苏里拉奶酪
    }

    /**
     * 覆盖超类的切割方式
     */
    public function cut(){
        print_r("[切片] 把批萨切成方形");
    }

}
class CACheesePizza extends CheesePizza{

}


class NYPepperoniPizza  extends PepperoniPizza {

}
class ChicagoPepperoniPizza  extends PepperoniPizza {

}
class CAPepperoniPizza  extends PepperoniPizza {

}


class NYClamPizza extends ClamPizza {

}
class ChicagoClamPizza extends ClamPizza {

}
class CAClamPizza extends ClamPizza {

}



class NYVeggiePizza extends VeggiePizza {

}
class ChicagoVeggiePizza extends VeggiePizza {

}
class CAVeggiePizza extends VeggiePizza {

}