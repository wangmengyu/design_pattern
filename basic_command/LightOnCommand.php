<?php
namespace DesignPatern\BasicCommand;
/**
 * 开灯命令对象
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午9:47
 */
class LightOnCommand implements Command{
    /**
     * @var Light
     */
    protected $light;
    public function __construct($light)
    {
        $this->light = $light;

    }
    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->light->on();
    }

    public function undo()
    {
        // TODO: Implement undo() method.
        $this->light->off();
    }
}