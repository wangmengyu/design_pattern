<?php
namespace DesignPatern\Command;
/**
 * 简单遥控器
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午9:57
 */
class SimpleRemoteControl{
    /**
     * @var Command $slot
     */
    protected $slot;//插槽，一个命令对象

    /**
     * 设置命令
     * @param Command $command
     */
    public function setCommand($command){
        $this->slot = $command;
    }

    /**
     * 按钮被按下时
     */
    public function buttonWasPassed(){
        $this->slot->execute();
    }


}
