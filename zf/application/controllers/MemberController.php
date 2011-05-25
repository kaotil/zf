<?php
// テスト
// テスト

class MemberController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $init = "init";
    }

    public function indexAction()
    {
        $member = new Application_Model_MemberMapper();
        $this->view->entries = $member->fetchAll();

        $form    = new Application_Form_Member();
        $this->view->form = $form;
    }

    public function regAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Member();

var_dump($form->getErrorMessages());

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Member($form->getValues());
var_dump($comment);
                $mapper  = new Application_Model_MemberMapper();
                $mapper->save($comment);
#                return $this->_helper->redirector('index');
            } else {
                foreach ($form->getMessages() as $key => $message) {
#$form->setMessage('[%$key%]には半角英数字以外の文字が含まれています。',Zend_Validate_Alnum::regexNotMatch);
#$form->setErrorMessages('[%$key%]には半角英数字以外の文字が含まれています。',Zend_Validate_Alnum::regexNotMatch);
$form->setErrorMessages(array('regexNotMatch' => 'My message here'));
                    foreach ($message as $type => $val) {
                        echo "$key => $val ($type)<br>";
                    }
                }
            }

        }


    }
}
