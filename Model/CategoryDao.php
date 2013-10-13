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
class CategoryDao extends A_Dao implements I_CategoriesController{
    function __construct($database = NULL) {
        $this->database = (isset($database))? $database : FactoryDB::buildObject();
    }
    public function getCategories($filterEnum) {
        switch($filterEnum){
            case FilterEnum::ID:
                $sql = "SELECT category_id FROM categories ORDER BY category_id ASC";
                break;
            case FilterEnum::NAME:
                $sql = "SELECT name FROM categories ORDER BY name ASC";
                break;
            case FilterEnum::BOTH:
                $sql = "SELECT * FROM categories ORDER BY name ASC";
                break;
            default:
                $sql = "SELECT * FROM categories";
        }
        
        $db = $this->database;
        $stmnt = $db->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
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
