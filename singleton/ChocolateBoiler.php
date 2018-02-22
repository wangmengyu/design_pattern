<?php
namespace DesignPatern\singleton;
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-22
 * Time: 下午2:36
 */
class ChocolateBoiler{
    private $empty;//是否为空
    private $boiled;//是否诸熟
    private static $uniqueInstance;//唯一的实例
    private function __construct()
    {
        $this->empty = true;//空的
        $this->boiled = false;//没煮过
    }
    public static function getInstance(){
        if (self::$uniqueInstance == null){
            self::$uniqueInstance = new ChocolateBoiler();
        }
        return self::$uniqueInstance;
    }

    /**
     * 填满锅炉，此时锅炉必须是空的，一旦被填满，标记好私有的状态变量
     */
    public function fill(){
        if ($this->isEmpty()){
            var_dump('倒入牛奶和巧克力');
            $this->empty=false;
            $this->boiled = false;
        }
    }

    /**
     * 煮
     */
    public function boil(){
        if (!$this->isEmpty() && !$this->isBoiled()) {
            var_dump('煮牛奶巧克力');
            $this->boiled = true;
        }
    }

    /**
     * 排出,在非空，煮过后可以进行排出牛奶巧克力
     */
    public function drain(){
        if (!$this->isEmpty() && $this->isBoiled()){
            $this->empty = true;
            var_dump('排出牛奶巧克力');
        }
    }
    public function isEmpty(){
        return $this->empty;
    }

    public function isBoiled(){
        return $this->boiled;
    }
}

//测试代码
$chocolateBoiler = ChocolateBoiler::getInstance();//获得实例
$chocolateBoiler->fill();
$chocolateBoiler->boil();
$chocolateBoiler->drain();
