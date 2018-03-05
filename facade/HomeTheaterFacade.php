<?php
namespace DesignPatern\Facade;
/**
 * 家庭影院外观
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午10:12
 */
class HomeTheaterFacade{
    /**
     * @var Amplifier
     */
    protected $amp;
    /**
     * @var Tuner
     */
    protected $tuner;
    /**
     * @var DvdPlayer
     */
    protected $dvd;
    /**
     * @var CdPlayer
     */
    protected $cd;
    /**
     * @var Projector
     */
    protected $projector;
    /**
     * @var TheaterLights
     */
    protected $lights;
    /**
     * @var Screen
     */
    protected $screen;
    /**
     * @var PopcornPopper
     */
    protected $popper;

    /**
     * HomeTheaterFacade constructor.
     * @param $amp
     * @param $tuner
     * @param $dvd
     * @param $cd
     * @param $projector
     * @param $lights
     * @param $screen
     * @param $popper
     */
    public function __construct($amp,$tuner,$dvd,$cd,$projector,$lights,$screen,$popper){
        $this->amp = $amp;
        $this->tuner = $tuner;
        $this->dvd = $dvd;
        $this->cd = $cd;
        $this->projector = $projector;
        $this->lights = $lights;
        $this->screen = $screen;
        $this->popper = $popper;
    }

    /**
     *
     * 看电影
     * @param string $movie
     */
    public function watchMovie($movie){
        var_dump("开始看电影...");
        $this->popper->on();
        $this->popper->pop();
        $this->lights->dim(10);
        $this->screen->down();
        $this->projector->on();
        $this->projector->wideScreenMode();
        $this->amp->on();
        $this->amp->setDvd();
        $this->amp->setSurroundSound();
        $this->amp->setVolume(5);
        $this->dvd->on();
        $this->dvd->play($movie);

    }

    /**
     * 关电影
     */
    public function endMovie(){
        var_dump("关闭电影...");
        $this->popper->off();
        $this->lights->on();
        $this->screen->up();
        $this->projector->off();
        $this->amp->off();
        $this->dvd->stop();
        $this->dvd->eject();
        $this->dvd->off();
    }





}
