<?php

class Application_Form_Member extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
        $this->setAction('/zf/public/member/reg');

        // Add name element
        $this->addElement('text', 'name', array(
            'label'      => 'Your name:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'regex', 'options' => "/[a-z]/"),
                array('validator' => 'StringLength', 'options' => array(0, 20))
            )
        ));

        // Add email element
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
                array('validator' => 'StringLength', 'options' => array(0, 50))
            )
        ));

        // Add tel element
        $this->addElement('text', 'tel', array(
            'label'      => 'Your tel:',
            'required'   => true,
            'validators' => array(
                'int',
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'regist member',
        ));

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));

    }
}
