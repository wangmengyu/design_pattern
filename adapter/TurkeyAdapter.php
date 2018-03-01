<?php
namespace DesignPatern\Adapter;
/**
 * 火鸡适配器 - 实现Duck接口 ,将火鸡类的实例变成Duck的实例
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午2:19
 */
class TurkeyAdapter implements Duck{
    /**
     * 火鸡的引用
     * @var Turkey $turkey
     */
    protected $turkey;

    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }

    public function quack()
    {
        // TODO: Implement quack() method.
        $this->turkey->gobble();//调用火鸡的咯咯叫方法
    }

    public function fly()
    {
        // TODO: Implement fly() method.
        for ($i=1; $i<=5; ++$i) {
            $this->turkey->fly();
        }
    }
}
