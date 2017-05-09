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
        $id = $this->getRequest()->getParam('product');
        $mapper = new Application_Model_Product();
        $mapper->delete($id);
        return $this->_helper->redirector('index');

    }

    public function editProductAction()
    {

    }


}









