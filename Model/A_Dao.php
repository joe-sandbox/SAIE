<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A_Dao
 *
 * @author Joe
 */
abstract class A_Dao {
    protected $database;
    /***
     * Saves the values entered by the user.
     * @param array cointaining the values.
     */
    public abstract function insertRow($object);
    /***
     * Update the row with the specified values.
     * @param array containing the new values.
     */
    public abstract function updateRow($object);
    /***
     * Remove the row specied by the value
     */
    public abstract function removeRowById($object);
    /***
     * Not implemented yet.
     */
    public abstract function insertList($values);
    /**
     * Returns the object of the database.
     * @return <tt>I_Database</tt>
     */
    public function getDataBase(){
        return $this->database;
    }
    
    function __construct($database = NULL) {
        $this->database = $database;
    }

}

?>
