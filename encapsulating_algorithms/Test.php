<?php
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-5
 * Time: 下午3:54
 */

namespace DesignPatern\encapsulating_algorithms;
require_once __DIR__.'/CaffeineBeverage.php';
require_once __DIR__.'/Coffee.php';
require_once __DIR__.'/Tea.php';

$coffee = new Coffee();
$coffee->prepareRecipe();