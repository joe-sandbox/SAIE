<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_DomainObject {
    /**
     * Returns the id of the object.
     */
   public function getID();
   /**
    * Returns the id of the object.
    * @param type $id
    */
   public function setID($id);
   /**
    * Overwrites the values of the attributes with those in the array.
    * @param type $values associative array containing the values of the object. 
    */
   public function overwriteAttributes($values);
}

?>
