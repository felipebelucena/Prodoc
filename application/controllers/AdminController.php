<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            return $this->_redirect(array('controller' => 'auth', 'action' => 'login'));
        }
        $this->_helper->layout->setLayout('admin');
    }

    public function indexAction()
    {
        $requisitos = new Application_Model_DbTable_Requisito();
        $this->view->requisitos = $requisitos->fetchAll(null, 'data desc', '10');
        
    }

    public function addprofessorAction()
    {
        $form = new Application_Form_Professor();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $matricula = $form->getValue('matricula');
                $senha = $form->getValue('senha');
                $nome = $form->getValue('nome');
                $titulo = $form->getValue('titulo');
                $procuraCargos = new Application_Model_Cargos();
                $cargo = $procuraCargos->achaCargoCorreto($titulo, null, 0, null);


                // criando pasta
                $path = '/var/www/html/Prodoc/public/images/comprovantes/' . $matricula;
                mkdir($path);


                //salvando o professor no banco de dados
                $professores = new Application_Model_DbTable_Professor();
                if (!$professores->fetchRow('matricula = ' . $matricula)) {
                    $professores->novoProfessor($matricula, $nome, $titulo, $cargo);

                    // criando um usuário para o professor
                    $usuarios = new Application_Model_DbTable_Usuario();
                    $usuarios->novoUsuario($matricula, $senha, 'professor');

                    $this->_helper->redirector('professores');
                }
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editprofessorAction()
    {
        $form = new Application_Form_Professor();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $matricula = $form->getValue('matricula');
                $senha = $form->getValue('senha');
                $nome = $form->getValue('nome');
                $titulo = $form->getValue('titulo');
                $nome_cargo = $form->getValue('nome_cargo');

                $professores = new Application_Model_DbTable_Professor();
                $professores->editProfessor($id, $matricula, $nome, $titulo);
                $this->_helper->redirector('professores');
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $professores = new Application_Model_DbTable_Professor();
                $form->populate($professores->getProfessor($id));
            }
        }
    }

    public function deleteprofessorAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
                $id = $this->getRequest()->getPost('id');
                $professores = new Application_Model_DbTable_Professor();
                $professor = $professores->fetchRow('id = ' . $id);
                $matricula = $professor->matricula;
                $professores->deleteProfessor($id);

                $usuarios = new Application_Model_DbTable_Usuario();
                $usuarios->delete('matricula = ' . $matricula);

                /*  //deletando pasta dos comprovantes
                  $path = '/var/www/html/Prodoc/public/images/comprovantes/' . $matricula;
                  rmdir($path);
                 *
                 */
            }
            $this->_helper->redirector('professores');
        } else {
            $id = $this->_getParam('id', 0);
            $professor = new Application_Model_DbTable_Professor();
            $this->view->professor = $professor->getProfessor($id);
        }
    }

    public function addatividadeAction()
    {
        $form = new Application_Form_Atividade();
        $form->submit->setLabel('Criar');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $descricao = $form->getValue('descricao');
                $pontos = $form->getValue('pontos');

                //salvando a atividade no banco de dados
                $atividades = new Application_Model_DbTable_Atividade();
                $atividades->novaAtividade(null, $descricao, $pontos);

                $this->_helper->redirector('atividades');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editatividadeAction()
    {
        $form = new Application_Form_Atividade();
        $form->submit->setLabel('Salvar');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $descricao = $form->getValue('descricao');
                $pontos = $form->getValue('pontos');

                //salvando a atividade no banco de dados
                $atividades = new Application_Model_DbTable_Atividade();
                $atividades->editAtividade($id, null, $descricao, $pontos);

                $this->_helper->redirector('atividades');
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $atividades = new Application_Model_DbTable_Atividade();
                $form->populate($atividades->getAtividade($id));
            }
        }
    }

    public function deleteatividadeAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
                $id = $this->getRequest()->getPost('id');
                $atividades = new Application_Model_DbTable_Atividade();
                $atividades->deleteAtividade($id);
            }
            $this->_helper->redirector('atividades');
        } else {
            $id = $this->_getParam('id', 0);
            $atividades = new Application_Model_DbTable_Atividade();
            $this->view->atividade = $atividades->getAtividade($id);
        }
    }

    public function addcargoAction()
    {
        $form = new Application_Form_Cargo();
        $form->submit->setLabel('Criar');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $cargo = $form->getValue('cargo');
                $vagas = $form->getValue('vagas');

                $cargos = new Application_Model_DbTable_Cargo();
                $cargos->novoCargo($cargo, $vagas);

                $this->_helper->redirector('cargos');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editcargoAction()
    {
        $form = new Application_Form_Cargo();
        $form->submit->setLabel('Salvar');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $form->getValue('id');
                $cargo = $form->getValue('cargo');
                $vagas = $form->getValue('vagas');

                $cargos = new Application_Model_DbTable_Cargo();
                $cargos->editCargo($id, $cargo, $vagas);
                $this->_helper->redirector('cargos');
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $cargos = new Application_Model_DbTable_Cargo();
                $form->populate($cargos->getCargo($id));
            }
        }
    }

    public function deletecargoAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
                $id = $this->getRequest()->getPost('id');
                $cargos = new Application_Model_DbTable_Cargo();
                $cargos->deleteCargo($id);
            }
            $this->_helper->redirector('cargos');
        } else {
            $id = $this->_getParam('id', 0);
            $cargos = new Application_Model_DbTable_Cargo();
            $this->view->cargo = $cargos->getCargo($id);
        }
    }

    public function atividadesAction()
    {
        $atividades = new Application_Model_DbTable_Atividade();
        $this->view->atividades = $atividades->fetchAll();
    }

    public function professoresAction()
    {
        $professores = new Application_Model_DbTable_Professor();
        $this->view->professores = $professores->fetchAll(null, 'nome asc');
    }

    public function cargosAction()
    {
        $cargos = new Application_Model_DbTable_Cargo();
        $this->view->cargos = $cargos->fetchAll();
    }

    public function requisitosAction()
    {
        $requisitos = new Application_Model_DbTable_Requisito();
        $this->view->requisitos = $requisitos->fetchAll(null, 'data desc');
    }

    

    public function aceitarAction()
    {
        $id = $this->_getParam('id');

        $requisitos = new Application_Model_DbTable_Requisito();
        $requisito = $requisitos->fetchRow('id = ' . (int)$id);

        $matricula = $requisito->mat_requerente;
        $pontos = $requisito->pontos;

        $professores = new Application_Model_DbTable_Professor();
        $professor = $professores->fetchRow('matricula = ' . $matricula);
        $pontos += $professor->pontos;

        // atualizando os pontos do prof
        $professores->atualizarPontos($matricula, $pontos);

        // atualizando o estado do requisito
        $requisitos->alterarEstado($id, 'aceito');

        $this->_helper->redirector('requisitos');

    }

    public function recusarAction()
    {
        $id = $this->_getParam('id');

        $requisitos = new Application_Model_DbTable_Requisito();
        $requisito = $requisitos->fetchRow('id = ' . (int)$id);
        $requisitos->alterarEstado($id, 'recusado');

        $this->_helper->redirector('requisitos');

    }

    public function promoverAction()
    {
        $matricula = $this->_getParam('matricula');
        $professores = new Application_Model_DbTable_Professor();
        $professor = $professores->getProfessorPorMatricula($matricula);
        $this->view->professor = $professor;
        $id = $professor->id;
        $titulo = $professor->titulo;
        $cargo = $professor->nome_cargo;
        $pontos = $professor->pontos;
        $data_cargo = $professor->data_cargo;
        // calcular diferença entre hoje e data_cargo
        $zend_date = new Zend_Date();
        $tempoCargoAnterior = $zend_date->subDate($data_cargo, 'Y:m:d H:i:s');
        $tempoCargoAnterior = $tempoCargoAnterior->toValue(Zend_Date::YEAR);
        
        $cargos = new Application_Model_Cargos();
        $novoCargo = $cargos->achaCargoCorreto($titulo, $cargo, $pontos, 
                $tempoCargoAnterior);
        $this->view->novocargo = $novoCargo;
        if($novoCargo){
            if ($this->getRequest()->isPost()) {
                $promover = $this->getRequest()->getPost('promover');
                if ($promover == 'Sim') {
                    // atualizando a quantidade de cargos (-1);
                    $cargos = new Application_Model_DbTable_Cargo();
                    $cargos->atualizarCargo($novoCargo, $cargo);
                    //$cargos->atualizarCargo($novocargo, null);
                    $professores->promover($id, $novoCargo);
                }
                $this->_helper->redirector('professores');
            }
        }
        else
            $this->_helper->redirector('professores');
    }


}





