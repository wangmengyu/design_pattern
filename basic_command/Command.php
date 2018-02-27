<?php
namespace DesignPatern\BasicCommand;

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-27
 * Time: 上午9:42
 */
/**
 * 命令对象
 * Interface Command
 * @package DesignPatern\Command
 */
interface Command{
    /**
     * 执行方法，所有命令对象会实现此方法
     * @return mixed
     */
    public function execute();
}
