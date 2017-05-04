<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 04/05/2017
 * Time: 16:09
 */
class Login extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            'text', 'login', array(
            'label' => 'Login:',
            'required' => true,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('password', 'password', array(
            'label' => 'Password:',
            'required' => true,
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
        ));

    }
}