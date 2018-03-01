<?php
namespace DesignPatern\MacroCommand;
use DesignPatern\BasicCommand\Command;

/**
 * 宏命令
 * 按一个按钮执行多个命令
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-28
 * Time: 下午4:50
 */
class MacroCommand implements Command {
    protected $commands=[]; //一组命令

    public function __construct($commands)
    {
        $this->commands = $commands;
    }

    /**
     * 每个命令对象都执行一遍
     * @return mixed
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }

    public function undo()
    {
        // TODO: Implement undo() method.
        foreach ($this->commands as $command){
            $command->undo();
        }
    }
}