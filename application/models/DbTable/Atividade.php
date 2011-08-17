<?php

class Application_Model_DbTable_Atividade extends Zend_Db_Table_Abstract
{

    protected $_name = 'atividades';

    public function getAtividade($id)
    {
        $linha = $this->fetchRow('id = ' . (int)$id);
        if(!$linha){
            throw new Exception('Atividade não encontrada. id = ' .$id);
        }
        return $linha->toArray();
    }

    public function novaAtividade($cod_atividade, $descricao, $pontos)
    {
        $data = array(
            'cod_atividade' => $cod_atividade,
            'descricao' => $descricao,
            'pontos' => $pontos
        );
        $this->insert($data);
    }

    public function editAtividade($id, $cod_atividade, $descricao, $pontos)
    {
        $data = array(
            'cod_atividade' => $cod_atividade,
            'descricao' => $descricao,
            'pontos' => $pontos
        );
        $this->update($data, 'id = ' . (int)$id);
    }

    public function deleteAtividade($id)
    {
        $this->delete('id = ' . (int)$id);
    }
}

