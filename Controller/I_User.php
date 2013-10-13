<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_User {
    //put your code here
    /***
     * Gets the id of the user.
     */
    public function getId();
    /***
     * sets the id of the user.
     */
    public function setId($id);
    /***
     * Gets the name of the user.
     */
    public function getName();
    /***
     * sets the name of the user.
     */
    public function setName($name);
    /***
     * Gets the mail of the user.
     */
    public function getMail();
    /***
     * Sets the mail of the user.
     */
    public function setMail($mail);
    /***
     * Gets the description of the user.
     */
    public function getDescription();
    /***
     * Sets the description of the user.
     */
    public function setDescription($description);
    /***
     * Gets the password of the user.
     */
    public function getPassword();
    /***
     * Sets the passwrod of the user.
     */
    public function setPassword($password);
}

?>
