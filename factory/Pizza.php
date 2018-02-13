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
class Pizza{
    protected $name;//批萨名字
    protected $dough;//面团类型
    protected $sauce;//酱料类型
    protected $toppings = [];//佐料列表
    public function prepare(){
        print_r(" [准备] ". $this->name);
        print_r(" [面团] ". $this->dough);
        print_r(" [加酱料] ". $this->sauce);
        print_r(" [加佐料] ");
        foreach ($this->toppings as $top){
            print_r(' '. $top);
        }
    }
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

    public function getName(){
        return $this->name;
    }
}
class SimpleCheesePizza extends Pizza {
    public function __construct()
    {
        $this->name = "标准芝士批萨";//纽约风味芝士批萨
        $this->dough = "普通面饼";//薄饼
        $this->sauce = "纯番茄酱";//纯番茄酱
        $this->toppings = ['马力苏干酪']; //碎雷奇亚干酪奶酪
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
        print_r("[切片] 把批萨切成方形");
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