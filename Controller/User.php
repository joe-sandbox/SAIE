<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Joe
 */
class User implements JsonSerializable,I_DomainObject {
    private $id;
    private $name;
    private $mail;
    private $description;
    private $password;
    /***
     * Gets the id of the user.
     */
    public function getId(){
        return $this->id;
    }
    
    /***
     * sets the id of the user.
     */
    public function setId($id){
        $this->id = $id;
    }
    /***
     * Gets the name of the user.
     */
    public function getName(){
        return $this->name;
    }
    /***
     * sets the name of the user.
     */
    public function setName($name){
        $this->name = $name;
    }
    /***
     * Gets the mail of the user.
     */
    public function getMail(){
        return $this->mail;
    }
    /***
     * Sets the mail of the user.
     */
    public function setMail($mail){
        $this->mail = $mail;
    }
    /***
     * Gets the description of the user.
     */
    public function getDescription(){
        return $this->description;
    }
            
    /***
     * Sets the description of the user.
     */
    public function setDescription($description){
        $this->description = $description;
    }
    /***
     * Gets the password of the user.
     */
    public function getPassword(){
        return $this->password;
    }
    /***
     * Sets the passwrod of the user.
     */
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
    public function overwriteAttributes($values){       
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->mail = $values['mail'];
        $this->description = $values['description'];
        $this->password = $values['password'];
    }
    /**
     * Constructor
     * @param type $id
     * @param type $name
     * @param type $mail
     * @param type $description
     * @param type $password
     */
    function __construct($id = NULL, $name = NULL, $mail = NULL, $description = NULL, $password = NULL) {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
        $this->description = $description;
        $this->password = $password;
    }


}

?>
