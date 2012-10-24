<?php

class Application_Form_Movie extends Zend_Form
{

    public function init()
    {
		$title = new Zend_Form_Element_Text('title');
        $title ->setLabel('Movie Title')
        	->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setAttrib('style', 'height:30px; width:400px;')
        	->setRequired(true);
        
        $story = new Zend_Form_Element_Textarea('story');
        	$story->setLabel('Movie Story')
        	->addFilter('StripTags')
            ->setAttrib('rows', '6')
            ->setAttrib('cols', '20')
            ->setAttrib('style', 'width:400px;')
        	->setRequired(true);
        
        $submit = new Zend_Form_Element_Submit('submit');
            $submit->setLabel("Add Movie")
                    ->setAttrib('class','btn btn-primary');
        
        $this->addElement($title,"title")
        	->addElement($story,"story")
        	->addElement($submit,"submit");
        
        $this->setMethod('post');
    }

}

