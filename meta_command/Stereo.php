<?php
namespace DesignPatern\MetaCommand;
/**
 * 立体声音箱 类
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:37
 */
class Stereo{
    protected $volume = 0;
    protected $room = '';
    public function __construct($room)
    {
        $this->room = $room;
    }

    public function on(){
        var_dump("{$this->room}音箱开机");
    }
    public function off(){
        var_dump("{$this->room}音箱关了");
    }
    public function setCd(){
        var_dump("{$this->room}音箱设置CD模式");

    }
    public function setDvd(){

    }
    public function setRadio(){

    }
    public function setVolume($volume){
        $this->volume = $volume;
        var_dump("$this->room}音箱设置了音量:" . $volume);
    }



}