<?php

class Application_Model_DbTable_Requisito extends Zend_Db_Table_Abstract
{

    protected $_name = 'requisitos';

    public function getRequisito($id){

        $req = $this->fetchRow('id = ' . (int)$id);
        if(!$req){
            throw new Exception('Requisito nao encontrado. id ' . $id);
        }
        return $req->toArray();
    }

    public function novoRequisito($mat_requerente, $comprovante, $atividade, $pontos)
    {
        $horario = date('Y-m-d H:i:s');
        $data = array(
            'mat_requerente' => $mat_requerente,
            'data' => $horario,
            'comprovante' => $comprovante,
            'atividade' => $atividade,
            'estado' => 'pendente',
            'pontos' => $pontos,


        );
        $this->insert($data);
    }

    public function alterarEstado($id, $estado)
    {

        $data = array(
            'estado' => $estado,
        );
        $this->update($data, 'id = ' . (int)$id);
    }

    public function deleteRequisito($id)
    {
        $this->delete('id = ' . (int)$id);
    }
}

