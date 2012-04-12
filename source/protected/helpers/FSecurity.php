<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FSecurity
 *
 * @author qmha
 */
class FSecurity {
    //put your code here
    public static function requiredLogin() {
        // Check identity - Required Login
        if (!FMembership::hasIdentity()) Yii::app()->request->redirect(Yii::app ()->createUrl ('user/login'));
    }
}

?>
