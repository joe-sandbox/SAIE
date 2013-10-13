<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTranslator
 *
 * @author Joe
 */
class UserTranslator extends DataReceiver implements I_UserController{
    public function __construct($controller = NULL) {
        parent::DataReceiver(DomainEnumeration::USER,$controller);
        if(!isset($controller)){
            $this->translateValues();
        }
    }
    public function removeRowById() {
        
    }

    public function saveRow() {   
            header('Content-type:text/html');
        if($this->controller->saveRow()){            
            echo "Éxito al registrar usuario";
        }else{
            echo "No se pudo registrar el usuario";
        }
    }

    public function updateRow() {
        
    }    

    public function getUserById($id) {
        
    }

    public function getUserByName($name) {
        
    }

    public function getUsers() {
        
    }

    public function getUsersByDate($date,$op) {
        
    }

    public function translateValues() {
        $array = array();
        $array['id'] =(array_key_exists("id",$this->values))? $this->values['id'] : "";
        $array['name'] =(array_key_exists("name",$this->values))? $this->values['name'] : "";
        $array['mail'] =(array_key_exists("mail",$this->values))? $this->values['mail'] : "";
        $array['description'] =(array_key_exists("description",$this->values))? $this->values['description'] : "";
        $array['password'] =(array_key_exists("password",$this->values))? $this->values['password'] : "";
        $this->values = $array;
    }

}

?>
