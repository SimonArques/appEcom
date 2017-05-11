<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 10/05/2017
 * Time: 14:23
 */
class Application_Model_Database
{

    public static function connectDb(){

        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));

        return $db;
        
    }

    public static function checkRights(){

        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));

        $auth = Zend_Auth::getInstance();
        $user = $auth->getIdentity();

        $isAdmin = $db->fetchRow("SELECT isAdmin FROM PRODUCT WHERE login = ".$user);

        if($isAdmin == 1){
            $admin = true;
        }else{
            $admin = false;
        }
        return $admin;
    }
}