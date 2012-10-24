<?php

class Application_Form_Book extends Zend_Form
{

    public function init()
    {
        $title = new Zend_Form_Element_Text('title');
        $title ->setLabel('Book title')
        	->addFilter('StripTags')
            ->addFilter('StringTrim')
        	->setRequired(true);
        
        $description = new Zend_Form_Element_Textarea('description');
        	$description->setLabel('Book description')
        	->addFilter('StripTags')
        	->setRequired(true);
        
        $submit = new Zend_Form_Element_Submit('Save');
        
        $this->addElement($title,"title")
        	->addElement($description,"description")
        	->addElement($submit,"submit");
        
        $this->setMethod('post');

        
    }


}

?>