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
        $this->translateValues();
        $this->controller->updateObjectValues($this->values);
    }
    public function removeRowById() {
        
    }

    public function saveRow() {   
        if($this->controller->saveRow()){            
            return "Éxito al registrar usuario";
        }else{
            return "No se pudo registrar el usuario";
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
        $salt1 = "*3uni@l3Is";
        $salt2 = "b@utiful#*";    
        $array['id'] =(array_key_exists("id",$this->values))? $this->values['id'] : "";
        $array['name'] =(array_key_exists("name",$this->values))? $this->values['name'] : "";
        $array['mail'] =(array_key_exists("mail",$this->values))? $this->values['mail'] : "";
        $array['description'] =(array_key_exists("description",$this->values))? $this->values['description'] : "";
        $array['password'] =(array_key_exists("password",$this->values))? $this->values['password'] : "";
	$string = $salt1.$array['password'].$salt2;
        $array['password'] = sha1($string);  
        $this->values = $array;
    }

    public function getUserByMail($mail) {
        return $this->controller->getUserByMail($mail);
    }

}

?>
