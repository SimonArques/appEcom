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

        $request = $this->getRequest();
        $loginForm  = new Application_Form_Login();

        if ($this->getRequest()->isPost()) {
            if ($loginForm->isValid($request->getPost())) {

                $adapter = new Zend_Auth_Adapter_DbTable($db);
                $adapter->setTableName('user')
                    ->setIdentityColumn('login')
                    ->setCredentialColumn('password');

                $adapter->setIdentity($loginForm->getValue('login'))
                        ->setCredential($loginForm->getValue('password'));

                $auth   = Zend_Auth::getInstance();
                $result = $auth->authenticate($adapter);

                if ($result->isValid()) {

                    $this->redirect('/Product');
                    return;
                }else{
                    echo("Identifiant et/ou Mot de passe incorrects");
                }
            }
        }
        $this->view->form = $loginForm;
    }

    public function logoutAction(){

        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){

            $auth->clearIdentity();

            $this->redirect('/Product');
        }else{

            $this->redirect('/Product');
        }

    }
}