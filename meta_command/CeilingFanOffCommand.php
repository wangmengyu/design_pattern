<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午4:08
 */
class CeilingFanOffCommand extends CeilingFanCommand {
    /**
     * @var CeilingFan;
     */
    protected $ceilingFan;
    protected $prevSpeed;

    /**
     * 执行方法，所有命令对象会实现此方法
     * 保留当前转速,以便回滚
     *
     * 调速：关闭
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->setPrevSpeed();
        $this->ceilingFan->off();
    }
}