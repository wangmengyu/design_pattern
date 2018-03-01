<?php
namespace DesignPatern\Adapter;
require_once __DIR__.'/Duck.php';
require_once __DIR__.'/MallardDuck.php';
require_once __DIR__.'/Turkey.php';
require_once __DIR__.'/TurkeyAdapter.php';
require_once __DIR__.'/WildTurkey.php';
require_once __DIR__.'/DuckAdapter.php';
require_once __DIR__.'/TurkeyClassAdapter.php';

/**
 *
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-3-1
 * Time: 下午2:22
 * @param Duck $duck
 */
/**
 * 测试鸭子
 * @param Duck $duck
 */
function testDuck(Duck $duck){
    $duck->quack();
    $duck->fly();
}

/**
 * 测试火鸡
 * @param Turkey $turkey
 */
function testTurkey(Turkey $turkey){
    $turkey->gobble();
    $turkey->fly();
}

$duck = new MallardDuck();
$turkey = new WildTurkey();
$turkey->gobble();
$turkey->fly();
$turkeyAdapter = new TurkeyAdapter($turkey);
testDuck($duck);
testDuck($turkeyAdapter);
$mallardDuck = new MallardDuck();
$duckAdapter = new DuckAdapter($mallardDuck);
testTurkey($turkey);
testTurkey($duckAdapter);

$turkeyClassAdapter = new TurkeyClassAdapter($turkey);
try {
    $turkeyClassAdapter->gobble();
} catch (\Exception $e){
    var_dump($e->getMessage());
}






