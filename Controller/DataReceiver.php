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
    protected $values = array();
    private $DOMAIN_OBJECT;
    private $PROCESS_OPTION;

    /***
     * Contructor of abstract class.
     */
    public function DataReceiver($domainEnum,$processEnum){
        $this->values = array_merge($_GET, $_POST);
        $this->DOMAIN_OBJECT = $domainEnum;
        $this->PROCESS_OPTION = $processEnum;
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
}

?>
