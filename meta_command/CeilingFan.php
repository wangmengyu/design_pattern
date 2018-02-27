<?php
namespace DesignPatern\MetaCommand;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:59
 */
class CeilingFan {
    protected  $room = '';
    public function __construct($room)
    {
        $this->room = $room;
    }

    public function on(){
        var_dump("{$this->room}吊扇开了");
    }

    public function off(){
        var_dump("{$this->room}吊扇关了");
    }

}