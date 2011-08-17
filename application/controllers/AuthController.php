<?php

class AuthController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout('login');
    }

    public function indexAction() {
        // a index action do controlador Auth apenas redireciona para a ação de
        // login.
        $this->_forward('login');
    }

    public function loginAction() {
        $form = new Application_Form_Login();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $authAdapter = $this->getDefaultAdapter();
                $authAdapter->setIdentity($form->getValue('matricula'))
                        ->setCredential($form->getValue('senha'));
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    $this->_helper->FlashMessenger('Successful Login');


                    $user_info = $authAdapter->getResultRowObject(null, 'senha');

                    // gravando dados do usuario logado pra ser usado posteriormente
                    $auth->getStorage()->write($user_info);

                    switch ($user_info->tipo_usuario) {
                        case 'admin':
                            $this->_forward('index', 'admin');                             
                            break;
                        
                        case 'professor':
                            $this->_forward('index', 'professor');
                            break;
                    }
                    return;
                } else {
                    $this->_helper->FlashMessenger('Usuário ou senha inválidos!');

                    // se os dados estiverem incorretos, volte para a pagina de login.
                    return $this->_redirect(array('controller' => 'auth',
                        'action' => 'login'));
                }
            }
            else
                $form->populate($formData);
        }
    }

    public function logoutAction()
    {
        // action body
        $auth = Zend_Auth::getInstance()->clearIdentity();
        $this->_forward('login');
    }

    private function getDefaultAdapter()
    {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

        $authAdapter->setTableName('usuarios')
                ->setIdentityColumn('matricula')
                ->setCredentialColumn('senha');
        return $authAdapter;
    }

}

