<?php

/**
 * 主题 接口
 * Interface Subject
 */
interface Subject{
    /**
     * 添加观察者
     * @param Observer $o
     * @return mixed
     */
    public function registerObserver(Observer $o);

    /**
     * 删除观察者
     * @param Observer $o
     * @return mixed
     */
    public function removeObserver(Observer $o);

    /**
     * 通知观察者变更
     * @return mixed
     */
    public function notifyObservers();

}

/**
 * 天气数据 实现 Subject 接口
 * Class WeatherData
 */
class WeatherData implements Subject{

    private $observers;// 观察者列表

    private $temperature; //温度

    private $humidity;//湿度

    private $pressure;//气压

    public function __construct()
    {
        $this->observers = [];//初始化观察者
    }

    public function registerObserver(Observer $o){
        $this->observers[]=$o;
    }

    /**
     * 删除观察者
     * @param Observer $o
     * @return mixed
     */
    public function removeObserver(Observer $o){
        $key = array_search($o,$this->observers);
        if ($key!==false) {
            array_splice($this->observers,$key,1);
        }
    }

    /**
     * 通知观察者 进行变更变更
     * @return mixed
     */
    public function notifyObservers(){
        foreach ($this->observers as $o) {
            /**
             * @var Observer
             */
            $o->update($this->temperature,$this->humidity, $this->pressure);
        }
    }

    /**
     * 对外变更操作
     */
    public function measurementsChanged(){
        $this->notifyObservers();
    }

    /**
     * 测试方法， 设置气候数据并执行通知
     * @param $temp
     * @param $humidity
     * @param $pressure
     */
    public function setMeasurements($temp,$humidity,$pressure) {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

}





/**
 * 观察者 接口
 * Interface Observer
 */
interface Observer{
    /**
     * 气象观测值改变时，观察者进行相应的更新操作
     * @param $temp
     * @param $humidity
     * @param $pressure
     * @return mixed
     */
    public function update($temp, $humidity, $pressure);

}

/**
 * 显示 接口
 * Interface DisplayElement
 */
interface DisplayElement{
    public function display();
}

/**
 * 当前天气布告板 实现 观察者接口，显示接口
 *
 * 只显示当前温度和湿度
 * Class CurrentConditions
 */
class CurrentConditions implements Observer,DisplayElement{
    private $temperature;
    private $humidity;
    /**
     * @var Subject
     */
    private $weatherData;//主题


    /**
     * 构造器，创建对象时, 给予天气数据主题对象，并将自己加入到观察者中
     * CurrentConditions constructor.
     * @param WeatherData $w
     */
    public function __construct(WeatherData $w)
    {
        $this->weatherData = $w;
        $this->weatherData->registerObserver($this);
    }

    public function update($temp, $humidity, $pressure)
    {
        $this->temperature = $temp;
        $this->humidity = $humidity;
    }

    public function display()
    {
        var_dump('Current conditions: temperature='
            . $this->temperature . ' humidity=' . $this->humidity);
    }
}

//测试代码
$weatherData = new WeatherData();
$currentCondition = new CurrentConditions($weatherData);
$weatherData->setMeasurements(1,60,199);
$weatherData->notifyObservers();
$currentCondition->display();
