<?php

class Application_Form_Requisitos extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $basePath = Zend_Controller_Front::getInstance()->getBaseUrl();

        $atividade = new Application_Model_DbTable_Atividade();
        $atividades = $atividade->fetchAll();

        // gerando um array com uma key (id da atividade) e uma value (tambem a id)
        // para ser usado no Select form.
        foreach($atividades as $ativ){
            $options[$ativ->id] = $ativ->id;
        }

        $atividades = new Zend_Form_Element_Select('atividades');
        $atividades->addMultiOptions($options)
                    ->setRequired(true)
                    ->setLabel('atividade:')
                    ->addErrorMessage('Por favor, selecione uma atividade!');

        $imagem = new Zend_Form_Element_File('comprovante');
        $imagem->setLabel('comprovante:')
                    
                    ->addErrorMessage('Você deve selecionar um comprovante!')                
                    ->setRequired(true);
                

                    

        $submit = new Zend_Form_Element_Submit('submit');

        $this->addElements(array($atividades, $imagem, $submit));
    }


}

