<?php
require_once('usr/dBug.php');
class GroupsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        define('SMARTY_DIR', dirname(__FILE__) . '/../../library/smarty/libs/');
        require_once(SMARTY_DIR . 'Smarty.class.php');
        require_once(SMARTY_DIR . 'Zend_View_Smarty.class.php');
        $this->view   = new Zend_View_Smarty(dirname(__FILE__) . '/../smarty/templates');
        $viewRenderer = $this->_helper->getHelper('viewRenderer');
        $viewRenderer->setView($this->view);

        $viewRenderer->setView($this->view)
                     ->setViewBasePathSpec($view->_smarty->template_dir)
                     ->setViewScriptPathSpec(':controller/:action.:suffix')
                     ->setViewScriptPathNoControllerSpec(':action.:suffix')
                     ->setViewSuffix('tpl');
    }

    public function indexAction()
    {
        // action body
        $this->view->name = 'yossy';
    }


}

