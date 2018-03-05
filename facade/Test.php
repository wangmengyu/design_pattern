<?php
namespace DesignPatern\Facade;
require_once __DIR__.'/Amplifier.php';
require_once __DIR__.'/CdPlayer.php';
require_once __DIR__.'/DvdPlayer.php';
require_once __DIR__.'/HomeTheaterFacade.php';
require_once __DIR__.'/PopcornPopper.php';
require_once __DIR__.'/Projector.php';
require_once __DIR__.'/Screen.php';
require_once __DIR__.'/TheaterLights.php';
require_once __DIR__.'/Tuner.php';

/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 上午11:36
 */

/**
 * /**
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

$amp = new Amplifier();
$tuner = new Tuner();
$dvd = new DvdPlayer();
$cd = new CdPlayer();
$projector = new Projector();
$lights = new TheaterLights();
$screen = new Screen();
$popper = new PopcornPopper();
$facade = new HomeTheaterFacade($amp,$tuner,$dvd,$cd,$projector,$lights,$screen,$popper);
$facade->watchMovie("33分侦探");
$facade->endMovie();