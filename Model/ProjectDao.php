<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectDao
 *
 * @author Joe
 */
class ProjectDao extends A_Dao implements I_ProjectController{
    function __construct($database = NULL) {
        $this->database = (isset($database))? $database : FactoryDB::buildObject();
    }
    public function insertList($values) {
        
    }

    public function insertRow($object) {
        
    }

    public function removeRowById($object) {
        
    }

    public function updateRow($object) {
        
    }

    public function getProjectById($id) {
        
    }
    public function getProjects($filter) {
        switch($filter){
            case ProjectFilter::NONE:
                $sql="SELECT * FROM projects ";
                break;
            case ProjectFilter::CATEROGY:              
                $sql="SELECT c.name,p.project_id,p.name,p.description,
                        p.date_creation,pp.name,p.total_answers ,p.date_update
                        FROM categories as c STRAIGHT_JOIN
                        project_categories as pc 
                        STRAIGHT_JOIN projects as p 
                        STRAIGHT_JOIN phase_project as pp
                        ON pc.project_id = p.project_id 
                        AND c.category_id = pc.category_id 
                        AND p.pp_id = pp.pp_id
                        ORDER BY c.name ASC";
                break;
            default:
                $sql="SELECT * FROM projects";
                break;
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
            while($row = $values->fetch_array(MYSQLI_NUM)){
                $arr[]=$row;
            }
            $stmnt->close();
            return $arr;
        }
    }

    public function getProjectsByCategory($cat) {   
        if(is_int($cat)){
            $sql="SELECT p.project_id,p.name,p.description,
                        p.date_creation,pp.name as pp_id,p.total_answers ,p.date_update
                        FROM categories as c STRAIGHT_JOIN
                        project_categories as pc 
                        STRAIGHT_JOIN projects as p 
                        STRAIGHT_JOIN phase_project as pp
                        ON pc.project_id = p.project_id 
                        AND c.category_id = pc.category_id 
                        AND p.pp_id = pp.pp_id
                        WHERE c.name = '$cat'
                        ORDER BY c.name ASC";
        }else{
            $sql="SELECT p.project_id,p.name,p.description,
                        p.date_creation,pp.name as pp_id,p.total_answers ,p.date_update
                        FROM categories as c STRAIGHT_JOIN
                        project_categories as pc 
                        STRAIGHT_JOIN projects as p 
                        STRAIGHT_JOIN phase_project as pp
                        ON pc.project_id = p.project_id 
                        AND c.category_id = pc.category_id 
                        AND p.pp_id = pp.pp_id
                        WHERE c.category_id = $cat
                        ORDER BY c.category_id ASC";
            
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
            while($row = $values->fetch_array(MYSQLI_NUM)){
                $arr[]=$row;
            }
            $stmnt->close();
            return $arr;
        }
    }
}

?>
