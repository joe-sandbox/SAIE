<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FactoryDao
 *
 * @author Joe
 */
class FactoryDao {
    /***
     * Instantiates the specied object and returns it.
     */
    public static function buildObject($name, $dataBase = NULL){
        try{
            $name .= "Dao";
            if(isset($dataBase)){
                return new $name($dataBase);
            }else{
                return new $name();
            }
        }catch(Exception $e){
            
        }
    }  
}

?>
