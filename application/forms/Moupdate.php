<?php

class Application_Form_Moupdate extends Zend_Form
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
        
        $submit = new Zend_Form_Element_Submit("Update Movie");
            $submit->setAttrib('value', "Update Movie")
                    ->setAttrib('class','btn btn-primary');

        $cancel = new Zend_Form_Element_Button("Cancel");
            $cancel->setAttrib('value', "Cancel")
                    ->setAttrib('class','btn btn-primary')
                    ->setAttrib('onclick',"window.location = '../../../view'");
        
        $this->addElement($title,"title")
        	->addElement($story,"story")
        	->addElement($submit,"submit")
            ->addElement($cancel,"cancel");
        
        $this->setMethod('post');
        
}

}