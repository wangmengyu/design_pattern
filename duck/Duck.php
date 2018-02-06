<?php
/**
 * 飞行接口
 * Interface FlyBehavior
 */
interface FlyBehavior{
    public function fly();
}

/**
 * 用翅膀非的类 实现 FlyBehavior
 * Class FlyWithWings
 */
class FlyWithWings implements FlyBehavior{
    public function fly(){
        var_dump("I am flying with wings!!");
    }
}

/**
 * 嘎嘎叫接口
 * Interface QuackBehavior
 */
interface QuackBehavior{
    public function quack();
}

/**
 * 嘎嘎叫类实现嘎嘎叫接口
 * Class QuackLoud
 */
class QuackLoud implements QuackBehavior{
    public function quack()
    {
        var_dump("I am quacking loudly!!");
    }
}

/**
 * 沉默的嘎嘎叫 实现 QuackBehavior
 * Class QuackMute
 */
class QuackMute implements QuackBehavior{
    public function quack(){
        var_dump("<< Silence >>");
    }
}

/**
 * 支支叫 实现 QuackBehavior
 * Class Squeak
 */
class Squeak implements QuackBehavior{
    public function quack()
    {
        var_dump("Squeak!");
    }
}
/**
 * 抽象鸭子类
 * Class Duck
 */
abstract class Duck{
    /**
     * 实例变量
     * @var FlyBehavior
     */
    protected $flyBehavior;
    /**
     * @var QuackBehavior
     */
    protected $quackBehavior;


    /**
     * 执行嘎嘎叫， 运行时根据对象决定调用什么类
     */
    public function performQuack(){
        $this->quackBehavior->quack();
    }

    /**
     * 执行飞行，运行时根据对象决定调用什么类
     */
    public function performFly(){
        $this->flyBehavior->fly();
    }

    /**
     * 抽象方法 ：显示
     */
    public abstract function display();

    public function swim(){
        echo 'All ducks float, even decoys!';
    }
}

class MallardDuck extends Duck{

    /**
     * 创建 绿毛鸭对象
     * MallardDuck constructor.
     */
    public function __construct(){
        $this->quackBehavior = new QuackLoud();//响亮嘎嘎叫
        $this->flyBehavior = new FlyWithWings();
    }

    /**
     * 覆盖显示行为
     */
    public function display(){
        echo ' I am a Mallard Duck.';
    }

}
//测试代码
$mallard = new MallardDuck();
$mallard->performQuack();
$mallard->performFly();