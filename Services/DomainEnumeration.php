<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DomainEnumeration
 *
 * @author Joe
 */
class DomainEnumeration {
    const USER = 0;
    const PROJECT = 1;
    const QUESTION = 2;
    CONST ANSWER = 3;
    CONST FINAL_ANSWERS = 4;
    CONST CATEGORY = 5;
    
     /***
     * Returns the string value of the matching int.
     */
    public static function getDomainString($value){
        switch($value){
            case 0:
                return "USER";
            case 1:
                return "PROJECT";
            case 2:
                return "QUESTION";
            case 3:
                return "ANSWER";
            case 4:
                return "FINAL_ANSWERS";
            case 5:
                return "CATEGORY";
            default :
        }
    }
     /***
     * Returns the int value of the matching string.
     */
    public static function getDomainObject($option){
        switch(strtoupper($option)){
            CASE "USER":
                return self::USER;
            CASE "PROJECT":
                return self::PROJECT;
            CASE "QUESTION":
                return self::QUESTION;
            CASE "ANSWER":
                return self::ANSWERS;
            CASE "FINAL_ANSWERS":
                return self::FINAL_ANSWERS;
            CASE "CATEGORY":
                return self::CATEGORY;
            default :
        }
    }
}

?>
