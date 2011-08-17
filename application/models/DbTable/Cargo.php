<?php

class Application_Model_DbTable_Cargo extends Zend_Db_Table_Abstract
{

    protected $_name = 'cargos';


    public function getCargo($id)
    {
        $linha = $this->fetchRow('id = ' . (int)$id);
        if(!$linha){
            throw new Exception('Cargo não encontrado. id = ' . $id);
        }
        return $linha->toArray();
    }

    public function novoCargo($cargo, $vagas)
    {
        $data = array(
            'cargo' => $cargo,
            'vagas' => $vagas,
        );

        $this->insert($data);
    }

    public function editCargo($id, $cargo, $vagas)
    {
        $data = array(
            'cargo' => $cargo,
            'vagas' => $vagas,
        );
        
        $this->update($data, 'id = ' . (int)$id);

    }
    public function editVaga($id, $vagas){
        $data = array(
            'vagas' => $vagas,
        );
        $this->update($data, 'id = ' . $id);
    }
    public function atualizarCargo($novoCargo, $cargoAntigo = null){
        $linha = $this->fetchRow("cargo =  '$novoCargo'");
        $linha2 = $this->fetchRow("cargo = '$cargoAntigo'");
        if(!$linha){
            throw new Exception('Cargo ' . $novocargo . ' nao encontrado');
        }
        if(!$linha2){
           throw new Exception('Cargo ' . $cargoAntigo . ' nao encontrado');
        }
        $vagas1 = $linha->vagas - 1;
        $id1 = $linha->id;
        $vagas2 = $linha2->vagas + 1;
        $id2 = $linha2->id;
        $this->editVaga($id1, $vagas1);
        $this->editVaga($id2, $vagas2);
    }

    public function deleteCargo($id)
    {
        $this->delete('id = ' . (int)$id);
    }
}

