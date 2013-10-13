<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriesDao
 *
 * @author Joe
 */
class CategoriesDao extends A_Dao implements I_CategoriesController{
    function __construct($database = NULL) {
        $this->database = (isset($database))? $database : FactoryDB::buildObject();
    }
    public function getCategories() {
        $sql = "SELECT * FROM categories";
        $db = $this->database;
        $stmnt = $db->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_BOTH)){
                $arr[]=$row;
            }
            $stmnt->close();
            return $arr;
        }
    }

    public function insertList($values) {
        
    }

    public function insertRow($object) {
        
    }

    public function removeRowById($object) {
        
    }

    public function updateRow($object) {
        
    }  
}

?>
