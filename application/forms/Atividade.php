<?php

class Application_Form_Atividade extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $descricao = new Zend_Form_Element_Textarea('descricao');
        $descricao->setLabel('Descrição:')
                    ->setRequired(true)
                    ->addFilter('StripTags')
                    ->addFilter('StringTrim')
                    ->setAttrib('rows', '8')
                    ->setAttrib('cols', '35')
                    ->addValidator('NotEmpty');

         // gerando um array com chave e valor de 1 a 50 para ser usado no formulario de pontos.
        for($i = 1; $i <= 50; $i++){
            $options[$i] = $i;
        }
        $pontos = new Zend_Form_Element_Select('pontos');
        $pontos->setLabel('Pontos:')
                ->addMultiOptions($options);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array($id, $descricao,$pontos, $submit));

    }


}

