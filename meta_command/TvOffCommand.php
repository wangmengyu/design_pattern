<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;
use DesignPatern\BasicCommand\Tv;

/**
 * 关闭电视命令
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:36
 */
class TvOffCommand implements Command{
    /**
     * @var Tv
     */
    protected $tv;

    /**
     * 初始化时候，参数传入
     * StereoOnWithCdCommand constructor.
     * @param Tv $tv
     */
    public function __construct(Tv $tv)
    {
        $this->tv = $tv;
    }

    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->tv->off();
    }

    public function undo()
    {
        // TODO: Implement undo() method.
        $this->tv->on();
    }
}
