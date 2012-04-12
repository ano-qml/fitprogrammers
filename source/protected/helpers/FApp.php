<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FApp
 *
 * @author qmha
 */
class FApp {
    //put your code here
    public static $_VERSION = '0.1';
    
    public static function guid($include_braces = false) {
        if (function_exists('com_create_guid')) {
            if ($include_braces === true) {
                return com_create_guid();
            } else {
                return substr(com_create_guid(), 1, 36);
            }
        } else {
            mt_srand((double) microtime() * 10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));

            $guid = substr($charid,  0, 8) . '-' .
                    substr($charid,  8, 4) . '-' .
                    substr($charid, 12, 4) . '-' .
                    substr($charid, 16, 4) . '-' .
                    substr($charid, 20, 12);

            if ($include_braces) {
                $guid = '{' . $guid . '}';
            }

            return $guid;
        }
    }
    
}

?>
