<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午4:08
 */
class CeilingFanLowCommandCommand implements Command{
    /**
     * @var CeilingFan;
     */
    protected $ceilingFan;//电风扇的引用
    protected $prevSpeed;//之前的转速转台 ，在每次调整执行的execute()方法中，设置好变化前的当前的电风扇转速。
    public function __construct($ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }

    /**
     * 执行方法，所有命令对象会实现此方法
     * 先保留当前转速
     * 再调速
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->low();
    }

    public function undo()
    {
        // TODO: Implement undo() method.
        if ($this->prevSpeed==CeilingFan::HIGH){
            $this->ceilingFan->high();
        } else if ($this->prevSpeed == CeilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } else if ($this->prevSpeed == CeilingFan::LOW){
            $this->ceilingFan->low();
        } else if ($this->prevSpeed == CeilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}