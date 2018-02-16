<?php
namespace DesignPatern\Factory;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-16
 * Time: 上午9:56
 */
/**
 * pizza 原料工厂接口
 * Interface PizzaIngredientFactory
 */
interface PizzaIngredientFactory{
    public function createDough();//创建面团
    public function createSauce();//创建酱料
    public function createCheese();//创建芝士
    public function createVeggies();//创建蔬菜
    public function createPepperoni();//创建意大利香肠
    public function createClam();//蛤蜊;
}

/**
 *  纽约 原料工厂 实现  PizzaIngredientFactory
 * Class NYPizzaIngredientFactory
 * @package DesignPatern\Factory
 */
class NYPizzaIngredientFactory implements PizzaIngredientFactory{

    public function createDough()
    {

        return new ThinCrustDough();//薄地壳比萨生面团
    }

    public function createSauce()
    {

        return new MarinaraSauce();//纯番茄酱
    }

    public function createCheese()
    {

        return new ReggianoCheese();//巴马干酪
    }

    public function createVeggies()
    {

        $veggies = [
            new Garlic(),//大蒜
            new Onion(),//洋葱
            new Mushroom(),//蘑菇
            new RedPepper()//红辣椒
        ];
        return $veggies;
    }

    public function createPepperoni()
    {
        return new SlicedPepperoni();//意大利香肠切片
    }

    public function createClam()
    {
        return new FreshClam();//创建新鲜的蛤蜊;
    }
}

/**
 *  芝加哥 原料工厂 实现  PizzaIngredientFactory
 * Class NYPizzaIngredientFactory
 * @package DesignPatern\Factory
 */
class ChicagoPizzaIngredientFactory implements PizzaIngredientFactory{

    public function createDough()
    {

        return new ThickCrustDough();//厚皮比萨面团
    }

    public function createSauce()
    {

        return new PlumTomatoSauce();//李子番茄酱
    }

    public function createCheese()
    {

        return new MozzarallaCheese();//马苏里拉奶酪
    }

    public function createVeggies()
    {

        $veggies = [
            new EggPlant(),//茄子
            new Spinach(),// 菠菜
            new BlackOlives(),//黑橄榄菜
        ];
        return $veggies;
    }

    public function createPepperoni()
    {
        return new SlicedPepperoni();//意大利香肠切片
    }

    public function createClam()
    {
        return new FrozenClam();//冰冻的蛤蜊;
    }
}