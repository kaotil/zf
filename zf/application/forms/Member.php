<?php

class Application_Form_Member extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
        $this->setAction('/zf/public/member/reg');

        // Add name element
/*
        $this->addElement('text', 'name', array(
            'label'      => 'Your name:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'message'    => '1111',
            'validators' => array(
                array('validator' => 'regex', 'options' => "/[a-z]/", 'regexNotMatch' => 'My message here'),
                array('validator' => 'StringLength', 'options' => array(0, 20))
            )
        ));
*/
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Name')
                ->setRequired(true)
                ->addValidator('NotEmpty', true, array('messages' => array(Zend_Validate_NotEmpty::IS_EMPTY => 'Your name is required.')))
#                ->addValidator('Alnum', true, array('messages' => array(Zend_Validate_Alnum::NOT_ALNUM=> 'my message')));
                ->addValidator('Regex', true, array('/^[a-z]/i', 'messages' => array(Zend_Validate_Regex::NOT_MATCH => 'tes')));
        $this->addElement($name);

        // Add email element
/*
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
                array('validator' => 'StringLength', 'options' => array(0, 50))
            )
        ));
*/
        $email = new Zend_Form_Element_Text('email');
        $email->setRequired(true)
             ->setLabel('Email')
             ->addFilter('StripTags')
             ->addFilter('StringTrim')
             ->addValidator('NotEmpty', true, array('messages' => array(Zend_Validate_NotEmpty::IS_EMPTY => 'Your email is required aaa')))
             ->addValidator('EmailAddress', true, array('messages' => array(Zend_Validate_EmailAddress::INVALID_FORMAT => 'Please enter a valid email address.')));
        $this->addElement($email, 'email');

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
