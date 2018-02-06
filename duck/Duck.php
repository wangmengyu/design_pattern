<?php

/**
 * 飞行接口
 * Interface FlyBehavior
 */
interface FlyBehavior
{
    public function fly();
}

/**
 * 用翅膀非的类 实现 FlyBehavior
 * Class FlyWithWings
 */
class FlyWithWings implements FlyBehavior
{
    public function fly()
    {
        var_dump("I am flying with wings!!");
    }
}

/**
 * 无法飞行 实现 FlyBehavior
 * Class FlyNoWay
 */
class FlyNoWay implements FlyBehavior
{
    public function fly()
    {
        var_dump("I cannot fly");
    }
}

/**
 * 火箭能量飞行 实现 FlyBehavior
 * Class FlyRocket
 */
class FlyRocketPowered implements FlyBehavior
{
    public function fly()
    {
        var_dump("I am flying with a rocket!!");
    }
}

/**
 * 嘎嘎叫接口
 * Interface QuackBehavior
 */
interface QuackBehavior
{
    public function quack();
}

/**
 * 嘎嘎叫类实现嘎嘎叫接口
 * Class QuackLoud
 */
class QuackLoud implements QuackBehavior
{
    public function quack()
    {
        var_dump("I am quacking loudly!!");
    }
}

/**
 * 沉默的嘎嘎叫 实现 QuackBehavior
 * Class QuackMute
 */
class QuackMute implements QuackBehavior
{
    public function quack()
    {
        var_dump("<< Silence >>");
    }
}

/**
 * 支支叫 实现 QuackBehavior
 * Class Squeak
 */
class Squeak implements QuackBehavior
{
    public function quack()
    {
        var_dump("Squeak!");
    }
}

/**
 * 抽象鸭子类
 * Class Duck
 */
abstract class Duck
{
    /**
     * 实例变量
     * @var FlyBehavior
     */
    protected $flyBehavior;

    /**
     * 设置飞行行为
     * @param FlyBehavior $f
     */
    public function setFlyBehavior(FlyBehavior $f)
    {
        $this->flyBehavior = $f;
    }

    /**
     * 设置嘎嘎叫行为
     * @var QuackBehavior
     */
    protected $quackBehavior;

    public function setQuackBehavior(QuackBehavior $q)
    {
        $this->quackBehavior = $q;
    }


    /**
     * 执行嘎嘎叫， 运行时根据对象决定调用什么类
     */
    public function performQuack()
    {
        $this->quackBehavior->quack();
    }

    /**
     * 执行飞行，运行时根据对象决定调用什么类
     */
    public function performFly()
    {
        $this->flyBehavior->fly();
    }

    /**
     * 抽象方法 ：显示
     */
    public abstract function display();

    public function swim()
    {
        echo 'All ducks float, even decoys!';
    }
}

/**
 * 绿毛鸭类
 * Class MallardDuck
 */
class MallardDuck extends Duck
{
    /**
     * 创建 绿毛鸭对象
     * MallardDuck constructor.
     */
    public function __construct()
    {
        $this->quackBehavior = new QuackLoud();//响亮嘎嘎叫
        $this->flyBehavior = new FlyWithWings();
    }

    /**
     * 覆盖显示行为
     */
    public function display()
    {
        echo ' I am a Mallard Duck.';
    }
}

/**
 * 模型鸭
 * Class ModelDuck
 */
class ModelDuck extends Duck
{
    /**
     * 创建 模型鸭对象
     * MallardDuck constructor.
     */
    public function __construct()
    {
        $this->quackBehavior = new QuackLoud();//大声叫的鸭子
        $this->flyBehavior = new FlyNoWay();//不会飞
    }

    public function display()
    {
        var_dump("I am a Model Duck!");
    }

}

//测试代码
$mallard = new MallardDuck();
$mallard->performQuack();
$mallard->performFly();
$model = new ModelDuck();
$model->performFly();//一开始不会飞
$f = new FlyRocketPowered();
$model->setFlyBehavior($f);//赋予火箭飞行能力
$model->performFly();//会飞了
