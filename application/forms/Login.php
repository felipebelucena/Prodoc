<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
         $this->setName("login");


        $matricula = new Zend_Form_Element_Text('matricula');
        $matricula->setLabel('Matrícula:')
                ->setRequired(true)                
                ->addValidator('NotEmpty')
                ->removeDecorator('Errors');
        
        $senha = new Zend_Form_Element_Password('senha');

        $senha->setLabel('Senha:')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty')
                ->removeDecorator('Errors');

        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl()
                .'/auth/login');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Efetuar Login');

        $this->addElements(array($matricula, $senha, $submit));
    }


}

