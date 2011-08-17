<?php

class Application_Form_Uploadfile extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... 
        $element = new Zend_Form_Element_File('foo');
        $element->setLabel('Upload an image:')
        ->setDestination('/var/www/html/Prodoc/public/images/uploads');
        // ensure only 1 file
        $element->addValidator('Count', false, 1);
        // limit to 100K
        $element->addValidator('Size', false, 102400);
        // only JPEG, PNG, and GIFs
        $element->addValidator('Extension', false, 'jpg,png,gif');
        $this->addElement($element, 'foo');
        */
        $this->setAction('');

        // Seta o método de envio do formulário como POST
        $this->setMethod( Zend_Form::METHOD_POST );

        // Seta o enctype do formulário para upload de arquvos
        $this->setEnctype( Zend_form::ENCTYPE_MULTIPART );

        // Inicia aqui a criação e configuração do campo file_image
        $file_image   = new Zend_Form_Element_File('file_image');
        $file_image->setLabel('Selecione a imagem')
                    ->setRequired(true)
                    ->addValidator( new Zend_Validate_File_Extension('jpeg','jpg','gif','png') );

        // Inicia aqui a criação e configuração do botão de submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Fazer upload');

        // Adiciona os elementos ao formulário
        $this->addElements(array($file_image, $submit));
    }


}

