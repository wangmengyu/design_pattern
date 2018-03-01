<?php
namespace DesignPatern\Adapter;
require_once __DIR__.'/Duck.php';
require_once __DIR__.'/MallardDuck.php';
require_once __DIR__.'/Turkey.php';
require_once __DIR__.'/TurkeyAdapter.php';
require_once __DIR__.'/WildTurkey.php';
/**
 *
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午2:22
 * @param Duck $duck
 */
function testDuck(Duck $duck){
    $duck->quack();
    $duck->fly();
}

$duck = new MallardDuck();
$turkey = new WildTurkey();
$turkey->gobble();
$turkey->fly();
$turkeyAdapter = new TurkeyAdapter($turkey);
testDuck($duck);
testDuck($turkeyAdapter);


