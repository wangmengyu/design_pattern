<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午4:08
 */
class CeilingFanLowCommandCommand extends CeilingFanCommand {
    /**
     * @var CeilingFan;
     */
    protected $ceilingFan;//电风扇的引用
    protected $prevSpeed;//之前的转速转台 ，在每次调整执行的execute()方法中，设置好变化前的当前的电风扇转速。

    /**
     * 执行方法，所有命令对象会实现此方法
     * 保留当前转速,以便回滚
     * 调速：低
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->setPrevSpeed();
        $this->ceilingFan->low();
    }

}