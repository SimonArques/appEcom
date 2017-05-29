<?php

class CartController extends Zend_Controller_Action
{
    public $myCart;

    public function init()
    {
        $this->myCart = new Zend_Session_Namespace('mycart');
    }

    public function indexAction()
    {
        // action body
        $this->view->cart = $this->myCart;
    }

    public function addtocartAction()
    {
        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname' => 'baseecom'
        ));

        $id = $this->_request->getParam("id", null);

        $db->setFetchMode(Zend_Db::FETCH_OBJ);
        $result = $db->fetchRow('SELECT productName, price FROM product WHERE id = ' . $id);

        if (!isset($this->myCart->cart)) {
            $this->myCart->cart = array();
        }

        $produit = array($result->productName, $result->price, 1, $result->price * 1);
        array_push($this->myCart->cart, $produit);

        foreach ($this->myCart->cart as $product) {
            for ($i = 0; $i < count($product)-1; $i++) {
                echo($product[$i] . " ");

                if($i == count($product)){
                    echo("\n");
                }
            }
        }
        return $this->_helper->redirector('index');
    }

    public function emptycartAction()
    {
        Zend_Session::namespaceUnset('mycart');
        return $this->_helper->redirector('index');
    }
}

