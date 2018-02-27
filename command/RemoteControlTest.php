<?php
namespace DesignPatern\Command;
require_once __DIR__.'/Command.php';
require_once __DIR__.'/Light.php';
require_once __DIR__.'/LightOnCommand.php';
require_once __DIR__.'/SimpleRemoteControl.php';
require_once __DIR__.'/Command.php';
require_once __DIR__.'/GarageDoor.php';
require_once __DIR__.'/GarageDoorOpenCommand.php';
/**
 * 遥控器测试 - 客户端
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午10:02
 */
$remote = new SimpleRemoteControl();//遥控器：调用者
$light = new Light();//灯：接收者
$command = new LightOnCommand($light);//开灯命令对象
$garageDoor = new GarageDoor();
$garageCommand = new GarageDoorOpenCommand($garageDoor);
$remote->setCommand($command);//调用者设置好命令1：开灯命令
$remote->buttonWasPassed();//执行命令
$remote->setCommand($garageCommand);//调用者设置命令2：开车库灯命令
$remote->buttonWasPassed();//执行命令
