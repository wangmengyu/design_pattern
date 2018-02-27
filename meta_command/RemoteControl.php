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
 * Class RemoteControl
 * @package DesignPatern\MetaCommand
 */
class RemoteControl{
    /**
     * @var Command array
     */
    protected $onCommands=[];
    /**
     * @var Command array
     */
    protected $offCommands=[];

    public function __construct()
    {
        $command = new NoCommand();
        for($i = 0 ; $i < 7; ++$i) {
            $this->onCommands[] = $command;
            $this->offCommands[] = $command;
        }
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
    }

    /**
     * 打印开关类名
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        $str = '----remote control---';
        for($i=0; $i<7; ++$i) {
            $str.= ' [slot ' . $i.']:'.get_class($this->onCommands[$i]) . ','.get_class($this->offCommands[$i]);
        }
        return $str;
    }




}
