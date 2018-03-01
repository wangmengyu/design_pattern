<?php
namespace DesignPatern\MetaCommand;

require_once __DIR__.'/../basic_command/Command.php';
require_once __DIR__.'/../basic_command/Light.php';
require_once __DIR__.'/../basic_command/Tv.php';
require_once __DIR__.'/../basic_command/LightOnCommand.php';
require_once __DIR__.'/../basic_command/LightOffCommand.php';
require_once __DIR__.'/../basic_command/SimpleRemoteControl.php';
require_once __DIR__.'/../basic_command/Command.php';
require_once __DIR__.'/../basic_command/GarageDoor.php';
require_once __DIR__.'/../basic_command/GarageDoorOpenCommand.php';
require_once __DIR__.'/CeilingFan.php';
require_once __DIR__.'/CeilingFanCommand.php';
require_once __DIR__.'/CeilingFanOnCommand.php';
require_once __DIR__.'/CeilingFanOffCommand.php';
require_once __DIR__.'/CeilingFanHighCommand.php';
require_once __DIR__.'/CeilingFanMediumCommand.php';
require_once __DIR__.'/CeilingFanLowCommand.php';
require_once __DIR__.'/GarageDoorDownCommand.php';
require_once __DIR__.'/GarageDoorUpCommand.php';
require_once __DIR__.'/NoCommand.php';
require_once __DIR__.'/RemoteControl.php';
require_once __DIR__.'/Stereo.php';
require_once __DIR__.'/StereoOffCommand.php';
require_once __DIR__.'/StereoOnWithCdCommand.php';
require_once __DIR__.'/RemoteControlWithUndo.php';
require_once __DIR__.'/../macro_command/MacroCommand.php';
require_once __DIR__.'/StereoOnCommand.php';
require_once __DIR__.'/TvOnCommand.php';
require_once __DIR__.'/TvOffCommand.php';

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
use DesignPatern\BasicCommand\Tv;
use DesignPatern\MacroCommand\MacroCommand;

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
//客厅电视
$tv = new Tv("客厅");


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


echo '--------------带着撤销按钮的遥控器----------------------------------------------------------------------
';
//带着撤销按钮的遥控器
$remoteControlWithUndo = new RemoteControlWithUndo();
$remoteControlWithUndo->setCommand(0,$livingRoomLightOn,$livingRoomLightOff);//设置客厅开关按钮一套
var_dump('---带撤销按钮的遥控器---');
$remoteControlWithUndo->onButtonWasPushed(0);//开灯,撤销位于开灯按钮
$remoteControlWithUndo->offButtonWasPushed(0);//关灯，撤销位于关灯按钮
echo $remoteControlWithUndo;
$remoteControlWithUndo->undoButtonWasPushed();//撤销，执行撤销[关灯按钮的撤销动作，开出来了]
$remoteControlWithUndo->offButtonWasPushed(0);//关灯，撤销位于关灯按钮
$remoteControlWithUndo->onButtonWasPushed(0);//开灯，撤销位于开灯按钮
echo $remoteControlWithUndo;
$remoteControlWithUndo->undoButtonWasPushed();//撤销[开灯]按钮的操作


echo '---------------------测试电扇开关---------------------------------------------------------------
';
//测试电扇开关
$remoteControlWithUndo = new RemoteControlWithUndo();
$ceilingFanMediumCommand = new CeilingFanMediumCommand($ceilingFan);
$ceilingFanHighCommand = new CeilingFanHighCommand($ceilingFan);
$remoteControlWithUndo->setCommand(0,$ceilingFanMediumCommand,$ceilingFanOffCommend);
$remoteControlWithUndo->setCommand(1,$ceilingFanHighCommand,$ceilingFanOffCommend);
$remoteControlWithUndo->onButtonWasPushed(0);//开启中档，没有上一步，设置当前按下的按钮是：开启中速
$remoteControlWithUndo->offButtonWasPushed(0);//关闭中档,上一步是[开启中速]
$remoteControlWithUndo->undoButtonWasPushed();//回滚到中档
$remoteControlWithUndo->onButtonWasPushed(1);//开到高档，此时上一步还是中档
$remoteControlWithUndo->undoButtonWasPushed();//回滚到中档

echo '---------------------测试宏命令---------------------------------------------------------------
';
$light = new Light("客厅");
$stereo = new Stereo("客厅");
$tv = new Tv("客厅");

$lightOnCommand = new LightOnCommand($light);
$lightOffCommand = new LightOffCommand($light);
$stereoOnCommand = new StereoOnCommand($stereo);
$stereoOffCommand = new StereoOffCommand($stereo);
$tvOnCommand = new TvOnCommand($tv);
$tvOffCommand = new TvOffCommand($tv);

//设置开关命令数组
$partyOn = [$lightOnCommand, $stereoOnCommand, $tvOnCommand];
$partyOff = [$lightOffCommand, $stereoOffCommand, $tvOffCommand];

//设置开命令的宏
$partyOnMacro = new MacroCommand($partyOn);

//设置关命令的宏
$partyOffMacro = new MacroCommand($partyOff);

//新建宏遥控器
$macroRemote = new RemoteControlWithUndo();
$macroRemote->setCommand(0,$partyOnMacro,$partyOffMacro);
echo '-----------------点宏 开启 按钮------------------------------
';
$macroRemote->onButtonWasPushed(0);//按下开按钮
echo '-----------------点宏 关闭 按钮------------------------------
';
$macroRemote->undoButtonWasPushed();//按撤销





























