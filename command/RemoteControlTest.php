<?php
namespace DesignPatern\Command;
require_once __DIR__.'/Command.php';
require_once __DIR__.'/Light.php';
require_once __DIR__.'/LightOnCommand.php';
require_once __DIR__.'/SimpleRemoteControl.php';
require_once __DIR__.'/Command.php';
/**
 * 遥控器测试
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午10:02
 */
$remote = new SimpleRemoteControl();
$light = new Light();
$command = new LightOnCommand($light);
$remote->setCommand($command);
$remote->buttonWasPassed();
