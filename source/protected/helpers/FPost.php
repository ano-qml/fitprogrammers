<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FPost
 *
 * @author qmha
 */
class FPost {
    //put your code here
    public static function getAnswerCount($id) {
        $crit = new CDbCriteria();
        $crit->condition = "parent_unique_id LIKE '".$id."'";
        $crit->select = array('parent_unique_id', 'post_unique_id');
        return Posts::model()->count($crit);
    }
}

?>
