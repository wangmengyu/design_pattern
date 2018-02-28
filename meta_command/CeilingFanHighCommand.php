<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午4:08
 */
class CeilingFanHighCommand implements Command{
    /**
     * @var CeilingFan;
     */
    protected $ceilingFan;
    protected $prevSpeed;//上次的转速
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
        $this->ceilingFan->high();
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