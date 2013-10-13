<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TranslatorBuilder
 *
 * @author Joe
 */
class TranslatorBuilder {
 /**
 * Instantiates the specified translator, if need you can pass another translator
  * in order to use the same controller object. 
 * @param <tt>String</tt> $target
 * @param <tt>DataReciever</tt> $origin
 * @return \name
 */
   public static function buildTranslator($target,$origin = NULL){
       try{
           $name = ucfirst(strtolower($target))."Translator";
           if(!isset($origin)){                
                return new $name();
           }else{               
                $con = $origin->getController();
                return new $name($con);
           }           
        }catch(Exception $e){
            
        }
    }
}

?>
