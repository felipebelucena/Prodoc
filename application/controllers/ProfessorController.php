<?php

class ProfessorController extends Zend_Controller_Action
{

    public function init()
    {
        /* testando se o usuário está logado. caso contrário, será
         * redirecionado para página de login. Valerá para todas as ações deste
         * controlador
         */
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            return $this->_redirect(array('controller' => 'auth', 'action' => 'login'));
        }
        $this->_helper->layout->setLayout('layout');
    }

    private function getUserInfo()
    {
        $auth = Zend_Auth::getInstance();
        return $auth->getStorage()->read();
    }

    // nesta ação será mostrado alguns dados do professor (nome, cargo atual, titulo e pontuação
    // como tambem a relação dos 5 últimos requisitos feitos.
    public function indexAction()
    {
        $matricula = $this->getUserInfo()->matricula;

        $professores = new Application_Model_DbTable_Professor();
        $professor = $professores->getProfessorPorMatricula($matricula);
        $this->view->professor = $professor;

        $requisitos = new Application_Model_DbTable_Requisito();
        $this->view->requisitos = $requisitos->fetchAll('mat_requerente = '
                . $matricula, 'data desc', '5');
    }

    public function requisitosAction()
    {
        $matricula = $this->getUserInfo()->matricula;

        /* Gerando o formulário para cadastro de novo requisito e setando o caminho
         * para salvar a imagem no formato: /images/comprovantes/<matricula_usuario>
         */
        $form = new Application_Form_Requisitos();
        $form->setAttrib('enctype', 'multipart/form-data');
        $form->comprovante->setDestination(APPLICATION_UPLOADS_DIR ."/$matricula");
        $this->view->form = $form;

        /* passando para a view a relação de todos os requisitos do usuario */
        $requisitos = new Application_Model_DbTable_Requisito();
        $this->view->requisitos = $requisitos->fetchAll('mat_requerente  = '
                                                   . $matricula, 'data desc');

        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {

                // success - do something with the uploaded file
                 $uploadedData = $form->getValues();
                 $comprovante = $form->comprovante->getFileName();
                 $nomeArquivo = $uploadedData['comprovante'];
                 $atividadeID = (int)$uploadedData['atividades'];

                 $comprovante = str_replace('/var/www/html', '', $comprovante);
                 $atividades = new Application_Model_DbTable_Atividade();
                 $atividade = $atividades->getAtividade($atividadeID);
                 $pontos = $atividade['pontos'];

                 $requisitos->novoRequisito($this->getUserInfo()->matricula, $comprovante, $atividadeID, $pontos);
                 $this->_helper->redirector('requisitos');

            } else {
                $form->populate($formData);
            }
        }
    }

    public function atividadesAction()
    {
        // Lista todas as atividades como também sua pontuação.
        $atividades = new Application_Model_DbTable_Atividade();
        $this->view->atividades = $atividades->fetchAll();
    }   

    public function dadosAction()
    {
        $user = $this->getUserInfo();
        $professores = new Application_Model_DbTable_Professor();
        $this->view->professor = $professores->fetchRow('matricula = '
                . $user->matricula);

    }

    // editar os campos possiveis de cadastro: Endereço, telefone, etc...
    public function editarprofAction()
    {
       
    }


}





