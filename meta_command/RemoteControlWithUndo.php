<?php
namespace DesignPatern\MetaCommand;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午2:58
 */
use DesignPatern\BasicCommand\Command;

/**
 * 远程遥控器类
 * Class RemoteControlWithUndo
 * @package DesignPatern\MetaCommand
 */
class RemoteControlWithUndo{
    /**
     * @var Command array
     */
    protected $onCommands=[];
    /**
     * @var Command array
     */
    protected $offCommands=[];
    /**
     * @var Command
     */
    protected $undoCommand;

    public function __construct()
    {
        //防止越界访问，设计NoCommand处理异常
        $command = new NoCommand();
        for($i = 0 ; $i < 7; ++$i) {
            $this->onCommands[] = $command;
            $this->offCommands[] = $command;
        }
        $this->undoCommand = $command;
    }

    /**
     * 设置指定位置的一组开关
     * @param int $slot
     * @param Command $onCommand
     * @param Command $offCommand
     */
    public function setCommand($slot, $onCommand, $offCommand) {
        $this->onCommands[$slot] = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }


    /**
     * 指定位置的开启按钮被按下时
     * @param $slot
     */
    public function onButtonWasPushed($slot) {
        /**
         * @var Command $command
         */
        $command = $this->onCommands[$slot];
        $command->execute();
        //每个开关命令执行后，设置好当前操作的命令到撤销对象中
        $this->undoCommand = $command;
    }

    /**
     * 指定位置的关闭按钮被按下时
     * @param $slot
     */
    public function offButtonWasPushed($slot) {
        /**
         * @var Command $command
         */
        $command = $this->offCommands[$slot];
        $command->execute();
        ////每个开关命令执行后，设置好当前操作的命令到撤销对象中
        $this->undoCommand = $command;
    }

    /**
     * 点击撤销按钮,调用命令对象的undo方法,调用每个按钮的重置方法
     */
    public function undoButtonWasPushed(){
        $this->undoCommand->undo();
    }

    /**
     * 打印开关类名
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        $str = '----remote control---
        ';
        for($i=0; $i<7; ++$i) {
            $str.= ' [slot ' . $i.']:'.get_class($this->onCommands[$i])
                . ','.get_class($this->offCommands[$i]).'
                ';
        }
        $str .= ' [undo button]:' . get_class($this->undoCommand).'
        ';
        if (isset($this->undoCommand->prevSpeed)){
            $str .= ' [undo button status]:'. $this->undoCommand->prevSpeed.'
            ';
        }

        return $str;
    }






}
