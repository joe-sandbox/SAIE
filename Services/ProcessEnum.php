<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProcessEnum
 *
 * @author Joe
 */
class ProcessEnum {
    CONST INSERT = 1;
    CONST DELETE = 2;
    CONST UPDATE = 4;
    CONST SELECT = 5;
     /***
     * Returns the string value of the matching int.
     */
    public static function getProcessString($value){
        switch($value){
            case 1:
                return "INSERT";
            case 2:
                return "DELETE";
            case 3:
                return "UPDATE";
            case 4:
                return "SELECT";
            default :
        }
    }
     /***
     * Returns the int value of the matching string.
     */
    public static function getProcessObject($option){
        switch(strtoupper($option)){
            CASE "SELECT":
                return self::SELECT;
            CASE "UPDATE":
                return self::UPDATE;
            CASE "DELETE":
                return self::DELETE;
            CASE "INSERT":
                return self::INSERT;
            default :
        }
    }
}

?>
