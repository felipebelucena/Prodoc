<?php

class Application_Form_Professor extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $matricula = new Zend_Form_Element_Text('matricula');
        $matricula->setLabel('Matrícula:')
                    ->setRequired(true)
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim')
                    ->addValidator('Digits')
                    ->addValidator('NotEmpty');

        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('Senha:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setRenderPassword(true);

        $titulo = new Zend_Form_Element_Select('titulo');
        $titulo->setRequired(true)
                ->setLabel('Título:')
                ->addMultioptions(array('graduado' => 'Graduado',
                                        'pós-graduado'=> 'Pós-graduado',
                                        'mestrado' => 'Mestrado',
                                        'doutorado' => 'Doutorado',
                                        'livre-docente' => 'Livre-docente',
                 ));     



        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $nome, $matricula, $senha, $titulo, $submit));

    }


}

