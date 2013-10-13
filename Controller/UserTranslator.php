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
    public function __construct($domainEnum,$processEnum) {
        parent::DataReceiver($domainEnum,$processEnum);
        $array = array();
        $array['id'] =(array_key_exists("id",$this->values))? $this->values['id'] : "";
        $array['name'] =(array_key_exists("name",$this->values))? $this->values['name'] : "";
        $array['mail'] =(array_key_exists("mail",$this->values))? $this->values['mail'] : "";
        $array['description'] =(array_key_exists("description",$this->values))? $this->values['description'] : "";
        $array['password'] =(array_key_exists("password",$this->values))? $this->values['password'] : "";
        $this->values = $array;
    }
    public function removeRowById() {
        
    }

    public function saveRow() {   
        //$control = new Controller(DomainEnumeration::USER,$values);
        //$control->saveRow();
        $responseString = "";
        foreach($this->values as $string){
            $responseString .= " ".$string;
        }
        header('Content-type:text/html');
        echo $responseString;
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

}

?>
