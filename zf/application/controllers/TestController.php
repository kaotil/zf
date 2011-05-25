<?php
class TestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
$params = array ('host' => '127.0.0.1',
                    'username' => 'test',
                    'password' => 'testpass',
                    'dbname' => 'test');

        $db = Zend_Db::factory('PDO_MYSQL', $params);
        $sql = "select * from aaa";
        $result = $db->query($sql);
        $row = $result->fetchAll();
print_r($row);
    }
}

