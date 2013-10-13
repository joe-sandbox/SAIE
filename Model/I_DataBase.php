<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_DataBase {
    /***
     * Connects to the database.
     */
    public function connectDB();
    /***
     * Disconnects from the database.
     */
    public function disconnectDB();
    /***
     * Prepares the passed statement.
     */
    public function prepareStatement($statement);
    /***
     * Executes the previous prepared statement.
     */
    public function executeStmnt();
    /***
     * Commits all the previous executed statements.
     */
    public function commitStmnt();
    /***
     * Rollbacks all the previous executed statements.
     */
    public function rollBackTransactions();  
    /***
     * Returns the date according to the database.
     */
    public function getDate();
    
}

?>
