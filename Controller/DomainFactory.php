<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DomainFactory
 *
 * @author Joe
 */
class DomainFactory {
    /***
     * Instantiates the specied object with the array of values and returns it. 
     */
    public static function buildObject($name){
        try{
            $name = ucfirst(strtolower($name));
            return new $name();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}

?>
