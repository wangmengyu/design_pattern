<?php
namespace DesignPatern\Adapter;
/**
 * 鸭子适配器，将鸭子类实例转换成火鸡类实例
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午2:37
 */
class DuckAdapter implements Turkey{
    /**
     * @var Duck $duck;
     */
    protected $duck;

    public function __construct(Duck $duck)
    {
        $this->duck = $duck;
    }

    public function gobble()
    {
        // TODO: Implement gobble() method.
        $this->duck->quack();
    }

    public function fly()
    {
        // TODO: Implement fly() method.
        $this->duck->fly();
    }
}