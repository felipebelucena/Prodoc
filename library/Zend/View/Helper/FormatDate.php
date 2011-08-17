<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zend_View_Helper_Format
 *
 * @author lfbl
 */
class Zend_View_Helper_FormatDate {
    public function formatDate($datetime) {
        $date['day']     = substr($datetime, 8, 2);
        $date['mon']     = substr($datetime, 5, 2);
        $date['year']     = substr($datetime, 0, 4);
        $date['hour']    = substr($datetime, 11, 2);
        $date['min']  = substr($datetime, 14, 2);
        $date['sec'] = substr($datetime, 17, 2);
        $date['date']    = $date['day'] . '/' . $date['mon'] . '/' . $date['year'];
        $date['time'] = substr($datetime, 11, 8);
        return $date;      
    }
}
?>

