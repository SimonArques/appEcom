<?php


class ProductController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $product = new Application_Model_ProductMapper();
        $this->view->entries = $product->fetchAll();
    }

    public function showproductAction(){

        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));

        $id = $this->_request->getParam("id", null);
        $result = $db->fetchRow('SELECT * FROM product WHERE id = '.$id);
        $this->view->assign($result);

    }

    public function addproductAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Product();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Product($form->getValues());
                $mapper  = new Application_Model_ProductMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;

    }

    public function deleteproductAction()
    {

        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));


        $id = $this->_request->getParam("id", null);
        $sql = 'DELETE FROM product WHERE id = '.$id;
        $db->prepare($sql);
        $db->exec($sql);

        return $this->_helper->redirector('index');

    }

    public function editproductAction()
    {
        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));

        $id = $this->_request->getParam("id", null);
        $form = new Application_Form_Product();

        $result = $db->fetchRow('SELECT * FROM product WHERE id = ' . $id);
        $form->populate($result);

        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $product = new Application_Model_Product($form->getValues());
                $mapper  = new Application_Model_ProductMapper();
                $mapper->save($product);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }
}









