<?php
namespace DesignPatern\Adapter;
/**
 * 狂野火鸡
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午2:14
 */
class WildTurkey implements Turkey{

    public function gobble()
    {
        // TODO: Implement gobble() method.
        var_dump("咯咯");
    }

    public function fly()
    {
        // TODO: Implement fly() method.
        var_dump("我正在短距离飞行");
    }
}