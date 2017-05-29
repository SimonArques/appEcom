<?php

class CartController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body


    }

    public function addtocartAction(){

        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));

        $products = array();
        $id = $this->_request->getParam("id", null);

        $db->setFetchMode(Zend_Db::FETCH_OBJ);
        $result = $db->fetchRow('SELECT productName FROM product WHERE id = ' . $id);

        $myCart = new Zend_Session_Namespace('mycart');

        if(isset($myCart->cart)){

            $products = $myCart->cart;
        }else{
            $products = array();
        }
        array_push($products, $result->productName);
        $myCart->cart = $products;
        //print_r($myCart->cart);

        foreach($myCart->cart as $key){
            echo("Produit" .$key. "\n");
        }

        //$this->view->assign($myCart->cart);
        //return $this->_helper->redirector('index');
        //Zend_Session::destroy();
        }

}

