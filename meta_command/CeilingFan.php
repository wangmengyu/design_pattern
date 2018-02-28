<?php
namespace DesignPatern\MetaCommand;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 下午3:59
 */
class CeilingFan {
    const HIGH = 3;
    const MEDIUM = 2;
    const LOW = 1;
    const OFF = 0;
    protected $speed;
    protected  $location = '';
    public function __construct($location)
    {
        $this->location = $location;
        $this->speed = self::OFF;
    }

    public function on(){
        var_dump("{$this->location}吊扇开了");
    }

    public function off(){
        $this->speed = self::OFF;
        var_dump("{$this->location}吊扇关了");
    }

    public function high(){
        var_dump("{$this->location}吊扇开启了高档");
        $this->speed = self::HIGH;
    }

    public function medium(){
        var_dump("{$this->location}吊扇开启了中档");
        $this->speed = self::MEDIUM;
    }

    public function low(){
        var_dump("{$this->location}吊扇开启了低档");
        $this->speed = self::LOW;
    }

    /**
     * 获得转速
     * @return int
     */
    public function getSpeed(){
        return $this->speed;
    }

}