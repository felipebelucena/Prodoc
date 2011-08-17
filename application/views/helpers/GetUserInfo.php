<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetUserInfo
 *
 * @author Luís Felipe Lucena <felipelucena22 at gmail.com>
 */
class Zend_View_Helper_GetUserInfo
{
    //put your code here
    public function getUserInfo()
    {
        $user = Zend_Auth::getInstance()->getStorage()->read();
        if($user->tipo_usuario == 'professor'){
            $professores = new Application_Model_DbTable_Professor();
            $professor = $professores->fetchRow('matricula = '
                    . $user->matricula);
            return $professor;
        }
        return 'admin';

    }
}
?>
