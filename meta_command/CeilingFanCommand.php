<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * 风扇命令基类
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午4:08
 */
class CeilingFanCommand implements Command{
    /**
     * @var CeilingFan;
     */
    protected $ceilingFan;
    protected $prevSpeed;
    public function __construct($ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }

    /**
     * 执行方法，所有命令对象会实现此方法
     * 保留当前转速,以便回滚
     * 调速：当前无
     * @return mixed
     */
    public function execute()
    {
        // 等待子类各自实现不同的执行
        $this->setPrevSpeed();
    }

    /**
     * 设置上一步的转速度
     */
    public function setPrevSpeed(){
        $this->prevSpeed = $this->ceilingFan->getSpeed();
    }

    public function undo()
    {
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