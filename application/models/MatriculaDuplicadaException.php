<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatriculaDuplicadaException
 *
 * @author Luís Felipe Lucena <felipelucena22 at gmail.com>
 */
class Application_Model_MatriculaDuplicadaException extends Exception{
    //put your code here
    public function __construct($message, $code=null, $previous=null) {
        parent::__construct($message);
    }
}
?>
