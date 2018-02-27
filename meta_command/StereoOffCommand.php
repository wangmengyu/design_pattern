<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * CD模式下开启音箱命令类
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:36
 */
class StereoOffCommand implements Command{
    /**
     * @var Stereo
     */
    protected $stereo;

    /**
     * 初始化时候，参数传入
     * StereoOnWithCdCommand constructor.
     * @param Stereo $stereo
     */
    public function __construct(Stereo $stereo)
    {
        $this->stereo = $stereo;
    }

    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->stereo->off();
    }
}
