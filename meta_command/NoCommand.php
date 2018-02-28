<?php
namespace DesignPatern\MetaCommand;
use DesignPatern\BasicCommand\Command;

/**
 * 空命令，什么也不执行
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:04
 */
class NoCommand implements Command{

    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
    }

    public function undo()
    {
        // TODO: Implement undo() method.
    }
}
