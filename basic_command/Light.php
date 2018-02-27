<?php
namespace DesignPatern\BasicCommand;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午10:06
 */
class Light{
    protected $room;//房间名称
    public function __construct($room='')
    {
        $this->room = $room;
    }
    /**
     * 开灯方法
     */
    public function on(){
        var_dump($this->room.'灯开了');
    }
    /**
     * 开灯方法
     */
    public function off(){
        var_dump($this->room.'灯关了');
    }

}