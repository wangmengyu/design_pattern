<?php
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-11
 * Time: 上午9:35
 */

/**
 * pizza 工厂类
 * Class SimplePizzaFactory
 */

class Pizza{
    protected $name;//批萨名字
    protected $dough;//面团类型
    protected $sauce;//酱料类型
    protected $toppings = [];//佐料列表
    public function prepare(){
        print_r(" 准备 ". $this->name);
        print_r(" 面团 ". $this->dough);
        print_r(" 加酱料 ". $this->sauce);
        print_r(" 加佐料 ");
        foreach ($this->toppings as $top){
            print_r(' '. $top);
        }
    }
    public function bake(){
        print_r("烘焙25分钟");

    }
    public function cut(){
        //把披萨切成斜片
        print_r("把披萨切成斜片");
    }
    public function box(){
        print_r("打包pizza");
    }

    public function getName(){
        return $this->name;
    }
}
class CheesePizza extends Pizza {

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
        print_r("把批萨切成方形");
    }

}
class CACheesePizza extends CheesePizza{

}

class PepperoniPizza  extends Pizza {

}
class NYPepperoniPizza  extends PepperoniPizza {

}
class ChicagoPepperoniPizza  extends PepperoniPizza {

}
class CAPepperoniPizza  extends PepperoniPizza {

}

class ClamPizza extends Pizza {

}
class NYClamPizza extends ClamPizza {

}
class ChicagoClamPizza extends ClamPizza {

}
class CAClamPizza extends ClamPizza {

}


class VeggiePizza extends Pizza {

}
class NYVeggiePizza extends VeggiePizza {

}
class ChicagoVeggiePizza extends VeggiePizza {

}
class CAVeggiePizza extends VeggiePizza {

}


/**
 * 简单工厂 [非静态，可被继承]
 * Class SimplePizzaFactory
 */
class SimplePizzaFactory {
    public function createPizza($type) {
        $pizza = null;
        if ($type == 'cheese') {
            $pizza = new CheesePizza();
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

/**
 * 抽象类 批萨店
 * Class PizzaStore
 */
abstract class PizzaStore{
    /**
     * 制作pizza. 每个店有自己不同的创建方式，必须被实现
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

//测试：订购一个纽约芝士批萨,和一个芝加哥芝士批萨
$storeNy = new NYPizzaStore();
$pizza = $storeNy->orderPizza("cheese");
print_r(" 订购完成：". $pizza->getName());
print_r("\n");
$storeChigago = new ChicagoPizzaStore();
$pizza = $storeChigago->orderPizza("cheese");
print_r(" 订购完成：". $pizza->getName());
print_r("\n");





