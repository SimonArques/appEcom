<?php

class Application_Model_UserMapper
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
            $this->setDbTable('Application_Model_DbTable_User');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_User $user)
    {
        $data = array(
            'name'   => $user->getName(),
            'login'   => $user->getLogin(),
            'password'   => $user->getPassword(),
            'isAdmin'   => $user->getIsAdmin()
        );

        // if id exists, then it already is stocked in db so we nee
        if (null == ($id = $user->getId())) {
            $db = new Zend_Db_Table('USER');
            $db->insert($data);
        } else {
            $db = new Zend_Db_Table('USER');
            $db->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_User $user)
    {
        $db = new Zend_Db_Table('USER');
        $result = $db->find($id);

        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $user->setId($row->id)
            ->setName($row->name)
            ->setLogin($row->login)
            ->setPassword($row->password)
            ->setIsAdmin($row->isAdmin);
    }

    public function findbylogin($login, Application_Model_User $user)
    {
        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'baseecom'
        ));

        $result = $db->fetchRow('SELECT * FROM USER WHERE login = "'. $login . '";');

        if (0 == count($result)) {
            return false;
        }
        $row = $result;

        $user->setId($row['id'])
            ->setIsAdmin($row['isAdmin']);

        return $user;
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
                ->setLogin($row->login)
                ->setPassword($row->password)
                ->setIsAdmin($row->isAdmin);

            $entries[] = $entry;
        }
        return $entries;
    }
}





