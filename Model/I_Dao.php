<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_Dao { 
    /***
     * Saves the values entered by the user.
     * @param array cointaining the values.
     */
    public function insertRow($object);
    /***
     * Update the row with the specified values.
     * @param array containing the new values.
     */
    public function updateRow($object);
    /***
     * Remove the row specied by the value
     */
    public function removeRowById($object);
    /***
     * Not implemented yet.
     */
    public function insertList($values);
}

?>
