<?php

class Application_Model_ProductMapper
{

    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Product');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Product $product)
    {
        $data = array(
            'productName'   => $product->getProductName(),
            'price' => $product->getPrice(),
            'desc' => $product->getDesc(),
            'quantity' => $product->getQuantity(),
            'category' => $product->getCategory()

        );

        if (null === ($id = $product->getId())) {
            unset($data['id']);
            $db = new Zend_Db_Table('PRODUCT');
            $db->insert($data);
            //$this->getDbTable()->insert($data);
        } else {
            $db = new Zend_Db_Table('PRODUCT');
            $db->update($data, array('id = ?' => $id));
            //$this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Product $product)
{
    $db = new Zend_Db_Table('PRODUCT');
    $result = $db->find($id);
    //$result = $this->getDbTable()->find($id);
    if (0 == count($result)) {
        return;
    }
    $row = $result->current();
    $product->setId($row->id)
        ->setProductName($row->productName)
        ->setPrice($row->price)
        ->setDesc($row->desc)
        ->setCategory($row->category);
}

    public function fetchAll()
    {
        $db = new Zend_Db_Table('PRODUCT');
        $resultSet = $db->fetchAll();
        //$resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Product();
            $entry->setId($row->id)
                ->setProductName($row->productName)
                ->setPrice($row->price)
                ->setDesc($row->desc)
                ->setQuantity($row->quantity)
                ->setCategory($row->category);;

            $entries[] = $entry;
        }
        return $entries;
    }
}





