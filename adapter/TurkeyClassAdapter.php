<?php
namespace DesignPatern\Adapter;
/**
 * 火鸡类适配器,实现 DUCK 与 TURKEY
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午4:19
 */
class TurkeyClassAdapter implements Duck,Turkey {
    /**
     * @var Turkey $turkey;
     */
    protected $turkey;

    /**
     * TurkeyClassAdapter constructor.
     * @param Turkey $turkey
     */
    public function __construct(Turkey $turkey)
    {
        $this->turkey = $turkey;
    }


    public function quack()
    {
        // TODO: Implement quack() method.
        $this->turkey->gobble();

    }

    public function fly()
    {
        // TODO: Implement fly() method.
        for ($i=1; $i<=5; ++$i) {
            $this->turkey->fly();
        }

    }

    public function gobble()
    {
        // TODO: Implement gobble() method.
        throw new \Exception('duck can not gobble');
    }
}
