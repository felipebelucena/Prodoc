<?php

class Application_Model_DbTable_Usuario extends Zend_Db_Table_Abstract {

    protected $_name = 'usuarios';

    public function getUsuario($id)
    {
        $id = (int) $id;
        $usuario = $this->fetchRow('id = ' . $id);
        if (!$usuario) {
            throw new Exception("Usuario não encontrado. id:$id");
        }
        return $usuario->toArray();
    }

    
    public function novoUsuario($matricula, $senha, $tipo_usuario) {
        $dados = array(
            'matricula' => $matricula,
            'senha' => $senha,
            'tipo_usuario' => $tipo_usuario,
        );
        $this->insert($dados);
    }

    public function atualizarUsuario($id, $matricula, $senha, $tipo_usuario) 
    {
        $dados = array(
            'matricula' => $matricula,
            'senha' => $senha,
            'tipo_usuario'=> $tipo_usuario,
        );
        $this->update($dados, 'id = ' . (int) $id);
    }

    public function deleteUsuario($id)
    {
        $this->delete('id  = '.(int)$id);
    }

}

