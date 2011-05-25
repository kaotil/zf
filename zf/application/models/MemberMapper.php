<?php

class Application_Model_MemberMapper
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
            $this->setDbTable('Application_Model_DbTable_Member');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Member $member)
    {
        $data = array(
            'id'   => $member->getId(),
            'name' => $member->getName(),
            'email' => $member->getEmail(),
            'tel' => $member->getTel(),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s'),
        );
print_r($data);

        if (null === ($id = $member->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

/*
    public function find($id, Application_Model_Member $member)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $member->setId($row->id)
                  ->setEmail($row->email)
                  ->setComment($row->comment)
                  ->setCreated($row->created);
    }

*/
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Member();
            $entry->setId($row->id)
                  ->setName($row->name)
                  ->setEmail($row->email)
                  ->setTel($row->tel)
                  ->setCreated($row->created)
                  ->setUpdated($row->updated);
            $entries[] = $entry;
        }
        return $entries;
    }
}

