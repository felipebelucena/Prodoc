<?php

class Application_Form_UploadForm extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }
    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->setName('upload');
        $this->setAttrib('enctype', 'multipart/form-data');

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('Description')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');

        $file = new Zend_Form_Element_File('file');    
        $file->setRequired(true);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Upload');

        $this->addElements(array($description, $file, $submit));

    }

}

