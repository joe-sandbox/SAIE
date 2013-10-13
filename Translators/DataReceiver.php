<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataReceiver
 *
 * @author Joe
 */
abstract class  DataReceiver {
    public $values = array();
    protected $DOMAIN_OBJECT;
    protected $PROCESS_OPTION;
    protected $controller;
    /***
     * Contructor of abstract class.
     */
    public function DataReceiver($domainEnum,$control){
        $this->values = array_merge($_GET, $_POST);
        if(isset($control)){
            $this->controller = new Controller($domainEnum, $this->values,
                    $control);
        }else{
            $this->controller = new Controller($domainEnum);
        }
        
    }
    /**
     * Returns the controller in use.
     * @return type
     */
    public function getController(){
        return $this->controller;
    }
    /***
     * Returns the string corresponding the DomainObject
     */
    public function getDOMAIN_OBJECT() {
        return $this->DOMAIN_OBJECT;
    }
    /***
     * Returns the string corresponding the process options
     */
    public function getPROCESS_OPTION() {
        return $this->PROCESS_OPTION;
    }
    /***
     * Saves the values entered by the user.
     * @param array cointaining the values.
     */
    public abstract function saveRow();
    /***
     * Update the row with the specified values.
     * @param array containing the new values.
     */
    public abstract function updateRow();
    /***
     * Remove the row specied by the value
     */
    public abstract function removeRowById();
    /**
     * Translates the values from the Get and Post array into an array accorduing
     * the domain object.
     */
    public abstract function translateValues();
}

?>
