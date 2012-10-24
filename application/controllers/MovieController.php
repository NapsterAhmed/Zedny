<?php

class MovieController extends Zend_Controller_Action
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
        
    }

	public function doneAction()
    {
        
    }

    public function addAction()
    {
        $form = new Application_Form_Movie();

        if ($this->getRequest()->isPost()) {
            $values = $this->getRequest()->getPost();
            if ($form->isValid($values)) {
                $final = $form->getValues();
                $newBook = new Application_Model_DbTable_Movie;
                $newBook->insert($final);
                $this->_redirect('/movie/add?done=1');
            }
    }
    $this->view->form = $form;
	}

	public function viewAction() 
    {

    $select = $this->_db->select()
        ->from('movie',array('id','title','story'));
    $result = $this->_db->fetchAll($select);
    $this->view->result = $result;

    }

	public function deleteAction() 
    {
    $newBook = new Application_Model_DbTable_Movie;
    $paramo = $this->getRequest()->getParam('id');
    $newBook->delete("id = $paramo");
    $this->_redirect('/movie/view');
    }

    public function updateAction()
    {

    $form = new Application_Form_Moupdate();
    $params = $this->getRequest()->getParam('id');
    $select = $this->_db->select()
                        ->from('movie')
                        ->where("id = '$params'");
    $result = $this->_db->fetchRow($select);
    $form->populate($result);

        if ($this->getRequest()->isPost()) {
            $values = $this->getRequest()->getPost();
            if ($form->isValid($values)) {
                $final = $form->getValues();
                $newBook = new Application_Model_DbTable_Movie;
                $paramo = $this->getRequest()->getParam(id);
                $newBook->update($final,"id = $paramo");
                $this->_redirect('/movie/view');


                    


            }
        }
    
    $this->view->form = $form;

    }

}