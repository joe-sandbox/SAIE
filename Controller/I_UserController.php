<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_UserController {
    /***
     * returns all the registered users.
     */
    public function getUsers();
    /***
     * returns the user with the corresponding id.
     */
    public function getUserById($id);
    /***
     * returns the user with the corresponding name.
     */
    public function getUserByName($name);
    /***
     * returns the users related to the date.
     * if $op = -1 all the users BEFORE the date.
     *      $op = 0 at that date.
     *      $op = 1 after that date.
     */
    public function getUsersByDate($date,$op);
}

?>
