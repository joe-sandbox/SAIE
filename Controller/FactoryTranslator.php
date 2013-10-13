<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PHPFascade
 *
 * @author Joe
 */
include_once '../Services/Includer.php';
//stores the name of the tag and not the id.
/*$req = array_merge($_GET, $_POST);
var_dump($req);*/

    /***
     * Builds the specified translator.
     */
function buildTranslator(string $transLatorEnum,array $values){
    try {
        return new $transLatorEnum($values);
    }
    catch(Exception $e){
        throw new Exception("$transLatorEnum translator couldn't be buidl.");
    }
}

?>
