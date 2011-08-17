<?php

class Application_Model_DbTable_Professor extends Zend_Db_Table_Abstract
{

    protected $_name = 'professores';

    public function getProfessor($id)
    {
        $linha = $this->fetchRow('id = ' .(int)$id);

        if(!$linha){
            throw new Exception("Professor não encontrado $id");
        }
        return $linha->toArray();

    }

    public function getProfessorPorMatricula($matricula)
    {
        $professor = $this->fetchRow('matricula = ' . $matricula);
        if(!$professor){
            throw new Exception('Professor não encontrado. Matricula -' ,$matricula);
        }
        return $professor;

    }

    public function getId($matricula)
    {
        $professor = $this->fetchRow('matricula = ' . $matricula);
        if(!$professor){
            throw new Exception('Professor nao encontrado. matricula ' . $matricula);
        }
        return $professor->id;
    }

    public function novoProfessor($matricula, $nome, $titulo, $nome_cargo)
    {
        if($this->fetchRow("matricula = '$matricula'"))
                throw new Application_Model_MatriculaDuplicadaException ('Matricula já existente');
        $today = date('Y-m-d H:i:s');
        $data = array(
            'matricula' => $matricula,
            'nome' => $nome,
            'titulo' => $titulo,
            'nome_cargo' => $nome_cargo,
            'data_cargo' => $today,
            'data_total' => $today,
            'pontos' => 0,  // ao criar um professor, sua pontuação é zero.
        );

        $this->insert($data);
    }
    
    public function editProfessor($id, $matricula, $nome, $titulo, $nome_cargo,
            $data_cargo,$data_total, $pontos)
    {
        $data = array(  
            'matricula' => $matricula,
            'nome' => $nome,
            'titulo' => $titulo,
            'nome_cargo' => $nome_cargo,
            'data_cargo' => $data_cargo,
            'data_total' => $data_total,
            'pontos' => $pontos,
        );

        $this->update($data, 'id = ' . (int)$id);
    }

    public function atualizarPontos($matricula, $pontos){

        $data = array('pontos' => $pontos);
        $this->update($data, 'matricula = ' . $matricula);

    }
    public function promover($id, $novoCargo)
    {
        $hoje = date('Y-m-d H:i:s');
        $data = array(
            'nome_cargo' => $novoCargo,
            'pontos' => 0,    // ao ser promovido, a pontuação é zerada.
            'data_cargo' => $hoje,
         );
        
        $this->update($data, 'id = ' . (int)$id);
    }

    public function deleteProfessor($id)
    {
        $this->delete('id = ' . (int)$id);
    }





}

