<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalculaTempo
 *
 * @author Luís Felipe Lucena <felipelucena22 at gmail.com>
 */
class Zend_View_Helper_CalculaTempo {
    //put your code here
    public function calculaTempo($data){
        $zend_date = new Zend_Date();
        $tempoCargoAnterior = $zend_date->subDate($data, 'Y:m:d H:i:s');
        $tempoCargoAnterior = $tempoCargoAnterior->toValue(Zend_Date::YEAR);

        return $tempoCargoAnterior;
    }
}
?>
