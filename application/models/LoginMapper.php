<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 09/05/2017
 * Time: 13:50
 */
class LoginMapper
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
            $this->setDbTable('Application_Model_DbTable_Login');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_User $login)
    {
        $data = array(
            'name' => $login->getName(),
            'login'   => $login->getLogin(),
            'password' => $login->getPassword()
        );

        if (null === ($id = $login->getId())) {
            unset($data['id']);
            $db = new Zend_Db_Table('USER');
            $db->insert($data);
        } else {
            $db = new Zend_Db_Table('USER');
            $db->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_User $login)
    {
        $db = new Zend_Db_Table('USER');
        $result = $db->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $login->setId($row->id)
            ->setName($row->name)
            ->setLogin($row->price)
            ->setPassword($row->desc);
    }

    public function fetchAll()
    {
        $db = new Zend_Db_Table('USER');
        $resultSet = $db->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_User();
            $entry->setId($row->id)
                ->setName($row->name)
                ->setLogin($row->price)
                ->setPassword($row->desc);

            $entries[] = $entry;
        }
        return $entries;
    }

}