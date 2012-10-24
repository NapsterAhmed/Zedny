<?php

class BookController extends Zend_Controller_Action
{

    protected $_db;

    public function init()
    {
        $this->_db = Zend_Db::factory('Pdo_Mysql', array(
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'zendy'
        ));
    }

    public function indexAction()
    {
        // action body
    }

    public function doneAction()
    {
        // action body
    }


    public function createAction()
    {
        $form = new Application_Form_Book();

        if ($this->getRequest()->isPost()) {
            $values = $this->getRequest()->getPost();
            if ($form->isValid($values)) {
                $final = $form->getValues();
                $newBook = new Application_Model_DbTable_Book;
                $newBook->insert($final);
                $this->_redirect('/book/done');
            }
        }

        $this->view->form = $form;
        
    }

        public function updateAction()
    {
        $form = new Application_Form_Book();

        if ($this->getRequest()->isPost()) {
            $values = $this->getRequest()->getPost();
            if ($form->isValid($values)) {
                $final = $form->getValues();
                $newBook = new Application_Model_DbTable_Book;
                $paramo = $this->getRequest()->getParam(id);
                $newBook->update($final,"id = $paramo");
                $this->_redirect('/book/done');
            }
        }

        $this->view->form = $form;
        
    }

    public function selectAction() 
    {

    $select = $this->_db->select()
        ->from('book')
        ->where('id = 1');
    $result = $this->_db->fetchAll($select);
    $this->view->result = $result;

    }

    public function deleteAction() 
    {
    $newBook = new Application_Model_DbTable_Book;
    $paramo = $this->getRequest()->getParam('id');
    $newBook->delete("id = $paramo");
    $this->_redirect('/book/done');
    }
}