<?php
namespace DesignPatern\MetaCommand;

require_once __DIR__.'/../basic_command/Command.php';
require_once __DIR__.'/../basic_command/Light.php';
require_once __DIR__.'/../basic_command/LightOnCommand.php';
require_once __DIR__.'/../basic_command/LightOffCommand.php';
require_once __DIR__.'/../basic_command/SimpleRemoteControl.php';
require_once __DIR__.'/../basic_command/Command.php';
require_once __DIR__.'/../basic_command/GarageDoor.php';
require_once __DIR__.'/../basic_command/GarageDoorOpenCommand.php';
require_once __DIR__.'/CeilingFan.php';
require_once __DIR__.'/CeilingFanOnCommand.php';
require_once __DIR__.'/CeilingFanOffCommand.php';
require_once __DIR__.'/GarageDoorDownCommand.php';
require_once __DIR__.'/GarageDoorUpCommand.php';
require_once __DIR__.'/NoCommand.php';
require_once __DIR__.'/RemoteControl.php';
require_once __DIR__.'/Stereo.php';
require_once __DIR__.'/StereoOffCommand.php';
require_once __DIR__.'/StereoOnWithCdCommand.php';

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:53
 */

use DesignPatern\BasicCommand\GarageDoor;
use DesignPatern\BasicCommand\Light;
use DesignPatern\BasicCommand\LightOffCommand;
use DesignPatern\BasicCommand\LightOnCommand;

$remoteControl = new RemoteControl();

//客厅的灯
$livingRoomLight = new Light("客厅");
//厨房的灯
$kitchenLight = new Light("厨房");
//客厅的吊扇
$ceilingFan = new CeilingFan("客厅");
//车库门
$garageDoor = new GarageDoor();

$stereo = new Stereo("客厅");
//客厅音箱
$livingRoomStereo = new Stereo("客厅");

//开客厅灯命令
$livingRoomLightOn = new LightOnCommand($livingRoomLight);
//关客厅灯命令
$livingRoomLightOff = new LightOffCommand($livingRoomLight);

//开厨房灯命令
$kitchenLightOn = new LightOnCommand($kitchenLight);
//关厨房灯命令
$kitchenLightOff = new LightOffCommand($kitchenLight);

//开吊扇命令
$ceilingFanOnCommend = new CeilingFanOnCommand($ceilingFan);
//关吊扇命令
$ceilingFanOffCommend = new CeilingFanOffCommand($ceilingFan);

//开车门命令
//$garageDoorUpCommand = new GarageDoorUpCommand($garageDoor);
//$garageDoorDownCommand = new GarageDoorDownCommand($garageDoor);

//开音箱CD模式命令
$stereoOnWithCd = new StereoOnWithCdCommand($stereo);

//关音箱命令
$stereoOffWithCd = new StereoOffCommand($stereo);

//设置命令到每个插槽
$remoteControl->setCommand(0,$livingRoomLightOn,$livingRoomLightOff);
$remoteControl->setCommand(1,$kitchenLightOn,$kitchenLightOff);
$remoteControl->setCommand(2,$ceilingFanOnCommend,$ceilingFanOffCommend);
$remoteControl->setCommand(3,$stereoOnWithCd,$stereoOffWithCd);

//打印每个插槽具体类名
var_dump($remoteControl);
$remoteControl->onButtonWasPushed(0);
$remoteControl->offButtonWasPushed(0);
$remoteControl->onButtonWasPushed(1);
$remoteControl->offButtonWasPushed(1);
$remoteControl->onButtonWasPushed(2);
$remoteControl->offButtonWasPushed(2);
$remoteControl->onButtonWasPushed(3);
$remoteControl->offButtonWasPushed(3);
$remoteControl->onButtonWasPushed(4);
$remoteControl->offButtonWasPushed(4);













