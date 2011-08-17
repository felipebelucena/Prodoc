<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChecarPromo
 *
 * @author Luís Felipe Lucena <felipelucena22 at gmail.com>
 */
class Zend_View_Helper_ChecarPromo {
    public function checarPromo($titulo, $cargo, $pontos, $tempoCargoAnterior)
    {
        $cargos = new Application_Model_Cargos();
        $nome_cargo = $cargos->achaCargoCorreto($titulo, $cargo, $pontos, $tempoCargoAnterior);
        return $nome_cargo;
    }
}
?>
