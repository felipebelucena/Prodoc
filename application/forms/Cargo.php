<?php

class Application_Form_Cargo extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $cargo = new Zend_Form_Element_Text('cargo');
        $cargo->setLabel('Cargo:')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        // gerando um array com chave e valor de 1 a 50 para ser usado no formulario de pontos.
        for($i = 1; $i <= 30; $i++){
            $options[$i] = $i;
        }
        $vagas = new Zend_Form_Element_Select('vagas');
        $vagas->setLabel('Vagas:')
                ->addMultiOptions($options);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $cargo, $vagas, $submit));

    }


}

