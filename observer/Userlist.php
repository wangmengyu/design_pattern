<?php
/**
 * Created by PhpStorm.
 * User: wangmengyu
 * Date: 18-2-7
 * Time: 下午2:59
 */

/**
 * 被观察者接口
 * Interface IObservable
 */
interface IObservable {
    public function addObserver($observer);//添加观察者方法
    public function deleteObserver($observer);//删除观察者方法
    public function notifyObserver($args);//通知观察者
}
class UserList implements IObservable{
    protected $_observers = [];//观察者列表
    protected $_users = [];//用户列表
    /**
     * 添加一个观察者
     * @param $observer
     */
    public function addObserver($observer){
        $this->_observers[] = $observer;
    }


    /**
     * 添加新用户名到名单中
     * @param $userName
     */
    public function addUser($userName){
        if (in_array($userName,$this->_users) === false) {
            $this->_users[] = $userName;
        }
        $args = [$userName];
        $this->notifyObserver($args);
    }

    /**
     * 暴露给观察者的方法，获得当前用户名列表
     * @return array
     */
    public function getUsers(){
        return $this->_users;
    }

    /**
     * 删除一个观察者
     * @param $observer
     */
    public function deleteObserver($observer){
        $index = array_search($observer,$this->_observers);
        if ($index!==false) {
            array_splice($this->_observers,$index,1);
        }
    }

    /**
     * 通知观察者变化的数据
     * @param $args
     */
    public function notifyObserver($args)
    {
       foreach ($this->_observers as $o){
           $o->onChanged($args);
       }
    }
}

/**
 * 观察者接口
 * Interface IObserver
 */
interface IObserver{
    public function onChanged($args);//发生变化时，观察者的操作

}

class UserListLogger implements IObserver {
    private $_userList;
    public function __construct(UserList $userList)
    {
        $this->_userList = $userList;
        $this->_userList->addObserver($this);
    }

    public function onChanged($args)
    {
        var_dump("Begin Logging:");
        //var_dump("input params:" . print_r($args,1));
        var_dump("current user list is:" . print_r($this->_userList->getUsers(),1));
    }

}

//测试代码：
$userListObj = new UserList();
$logObj = new UserListLogger($userListObj);
while (1) {
    fwrite(STDOUT, "Enter new user's name: ");
    $name = trim(fgets(STDIN));
    if ($name == 'exit') {
        break;
    }
    //fwrite(STDOUT, "Hello, $name!");
    $userListObj->addUser($name);

}


