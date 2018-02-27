<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午4:08
 */
class CeilingFanOnCommand implements Command{
    /**
     * @var CeilingFan;
     */
    protected $ceilingFan;
    public function __construct($ceilingFan)
    {
        $this->ceilingFan = $ceilingFan;
    }

    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->ceilingFan->on();
    }
}