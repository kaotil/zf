<?php

class Application_Model_Member
{
    protected $_id;
    protected $_name;
    protected $_email;
    protected $_tel;
    protected $_created;
    protected $_updated;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid member property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid member property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setTel($tel)
    {
        $this->_tel = (string) $tel;
        return $this;
    }

    public function getTel()
    {
        return $this->_tel;
    }

    public function setCreated($created)
    {
        $this->_created = (string) $created;
        return $this;
    }

    public function getCreated()
    {
        return $this->_created;
    }

    public function setUpdated($updated)
    {
        $this->_updated = (string) $updated;
        return $this;
    }

    public function getUpdated()
    {
        return $this->_updated;
    }
}

