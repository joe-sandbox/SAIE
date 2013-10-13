<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_Translator {
    /***
     * Saves the values entered by the user.
     * @param array cointaining the values.
     */
    public function saveRow($values);
    /***
     * Update the row with the specified values.
     * @param array containing the new values.
     */
    public function updateRow($value);
    /***
     * Remove the row specied by the value
     */
    public function removeRowById();
    
}

?>
