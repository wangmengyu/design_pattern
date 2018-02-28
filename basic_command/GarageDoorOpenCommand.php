<?php
namespace DesignPatern\BasicCommand;
/**
 * 开车库门命令对象
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午10:22
 */
class GarageDoorOpenCommand implements Command{

    /**
     * @var GarageDoor $garageDoor;
     */
    protected $garageDoor;//车库门对象
    public function __construct($garageDoor)
    {
        $this->garageDoor = $garageDoor;
    }

    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $this->garageDoor->up();
    }

    public function undo()
    {
        // TODO: Implement undo() method.
        $this->garageDoor->down();
    }
}
