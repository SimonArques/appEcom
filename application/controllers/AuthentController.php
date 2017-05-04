<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 04/05/2017
 * Time: 16:12
 */
class AuthentController extends Zend_Controller_Action
{
    public function loginAction()
    {
        $db = $this->_getParam('db');

        $loginForm = new Login($_POST);

        if ($loginForm->isValid()) {

            $adapter = new Zend_Auth_Adapter_DbTable(
                $db,
                'product',
                'login',
                'password',
                'MD5(CONCAT(?, password_salt))'
            );

            $adapter->setIdentity($loginForm->getValue('login'));
            $adapter->setCredential($loginForm->getValue('password'));

            $result = $auth->authenticate($adapter);

            if ($result->isValid()) {
                echo('Login réussi');
                $this->redirect('index');
                return;
            }

        }
        $this->view->loginForm = $loginForm;
    }

}