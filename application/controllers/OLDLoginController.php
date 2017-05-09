<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 04/05/2017
 * Time: 16:12
 */
class LoginController extends Zend_Controller_Action
{

    public function loginAction()
    {

        $db = new Zend_Db_Adapter_Pdo_Mysql(array(

            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname' => 'baseecom'

        ));

        $loginForm = new Application_Form_Login($_POST);
        

        if ($loginForm->isValid($_POST)) {

            $adapter = new Zend_Auth_Adapter_DbTable($db);
            $adapter->setTableName('user')
                ->setIdentityColumn('login')
                ->setCredentialColumn('password');

            //TODO: Recuperer Identity et Credential de loginForm
            $adapter->setIdentity('login')
                ->setCredential('password');

            $auth   = Zend_Auth::getInstance();
            $result = $auth->authenticate($adapter);

            if ($result->isValid()) {
                echo('Login réussi');
                $this->redirect('/');
                return;
            }

        }
        $this->view->loginForm = $loginForm;
    }


}