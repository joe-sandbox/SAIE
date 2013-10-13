<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FactoryDB
 *
 * @author Joe
 */
class FactoryDB {
    /***
     * Instantiates the specied object with the array of values and returns it. 
     */
    public static function buildObject(){
        try{
            return new MySqlDB();
        }catch(Exception $e){
            
        }
    }
}

?>
