<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FMembership
 *
 * @author qmha
 */
class FMembership {
    //put your code here
    public static function getUser() {
        if (isset($_SESSION['FITer']))
        return unserialize($_SESSION['FITer']);
        else return null;
    }
    
    public static function getAuthor($member_id) {
        return Members::model()->find('member_id = '.$member_id);
    }
    
    public static function saveSession($userinfo) {
        $_SESSION['FITer'] = serialize($userinfo);
    }
    
    public static function hasIdentity() {
        if (isset($_SESSION['FITer'])) return true;
        else return false;
    }
}

?>
