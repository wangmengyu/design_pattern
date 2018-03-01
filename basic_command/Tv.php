<?php
namespace DesignPatern\BasicCommand;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 上午9:35
 */
class Tv {
    protected $location;
    public function __construct($location)
    {
        $this->location = $location;
    }
    public function on(){
        var_dump("{$this->location}电视机开了");
    }

    public function off(){
        var_dump("{$this->location}电视机关了");
    }
}
