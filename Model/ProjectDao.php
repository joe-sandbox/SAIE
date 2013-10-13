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
        $sql="INSERT INTO projects(name,description,
                                    date_creation,date_update,
                                    total_answers,user_id) 
                VALUES (?,?,?,?,?,?)";
        /* Prepare statement */
        if(is_a($object,"Project")){
            $db = $this->database;
            $stmnt = $db->prepareStatement($sql);
            if($stmnt != false) {
                /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
                $name = $object->getName();
                $description = $object->getDescription();
                $date = $this->database->getDate();
                $tAns = 0;
                $userId = $object->getUser_id();
                $stmnt->bind_param('ssssii',$name,$description,$date,$date,$tAns,$userId); 
                /* Execute statement */
                $stmnt->execute();   
                $this->insertCategories($stmnt->insert_id, $object->getCategories());                
                if($stmnt->close()){
                    return true;
                }else{
                    return false;
                }
            }            
        }
    }
    /**
     * Inserts the values of the array in the table project_categories, corresponding
     * the project id.
     * @param int $projectId
     * @param array $values
     */
    private function insertCategories($projectId,$values){        
        $sql="INSERT INTO project_categories(project_id,category_id) 
                VALUES (?,?)";
        /* Prepare statement */
        $db = $this->database;
        $stmnt = $db->prepareStatement($sql);
        if($stmnt != false) {
            /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
            foreach($values as $row){
                $stmnt->bind_param('ii',$projectId,$row); 
                /* Execute statement */
                $stmnt->execute();   
            }
            if($stmnt->close()){
                return true;
            }else{
                return false;
            }
        }    
    }
    public function removeRowById($object) {
        $sql="DELETE FROM projects WHERE project_id = ?";
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */   
                $project_id = $object->getId();
                $questionDao = FactoryDao::buildObject("Question", $this->database); 
            if($questionDao->deleteQuestionsByProjectId($project_id)){ 
                $this->deleteProjectCategories($project_id);
                    /* Execute statement */           
                $stmnt->bind_param('i',$project_id); 
                $stmnt->execute();   
                $error = $stmnt->error;
                $stmnt->close();
                if(strlen($error)=== 0){
                    return true;
                }else{
                    return $error;
                }
            }else{
                return false;
            }
        }
    }
    /**
     * Queries the total answers of the project.
     * @param type $project_id
     * @return type
     */
    private function getTotalAnswers($project_id){
        $sql="SELECT COUNT(answer) as Total
                FROM `answers` as a
                STRAIGHT_JOIN questions as q
                ON a.question_id = q.question_id
                AND q.project_id = ?";
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->bind_param('i',$project_id); 
            $stmnt->execute();    
            $values = $stmnt->get_result();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
                $totalAns = $row["Total"];
            }
            $stmnt->close();
            return $totalAns;
        }
    }
    /**
     * Deletes all the cateogies from the project.
     * @param <tt>int</tt> $project_id
     */
    private function deleteProjectCategories($project_id){
        $sql="DELETE FROM project_categories WHERE project_id = ?";
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->bind_param('i',$project_id); 
                /* Execute statement */
            $stmnt->execute();   
            $stmnt->close();
        }
    }
    public function updateRow($object) {         
        $sql="UPDATE projects 
              SET name = ?, description = ? , date_update = ?, total_answers = ?
              WHERE project_id = ?";
        /* Prepare statement */
        if(is_a($object,"Project")){
            $db = $this->database;
            $stmnt = $db->prepareStatement($sql);
            if($stmnt != false) {
                /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
                $name = $object->getName();
                $description = $object->getDescription();
                $date = $this->database->getDate();
                $project_id = $object->getId();
                $pp_id = $object->getPhase_project();
                $tAns = $this->getTotalAnswers($project_id);
                $stmnt->bind_param('sssii',$name,$description,$date,$tAns,$project_id); 
                /* Execute statement */
                $success = $stmnt->execute();  
                $this->deleteProjectCategories($project_id);
                $this->insertCategories($project_id, $object->getCategories());                
                if($stmnt->close()){
                    return $success;
                }else{
                    return false;
                }
            }            
        }
    }

    public function getProjectById($id) {
        $sql="SELECT p.project_id,p.name,p.description,
                        p.date_creation,pp.name as phase_name,p.total_answers ,p.date_update,
                        p.user_id
                        FROM projects as p 
                        STRAIGHT_JOIN phase_project as pp
                        ON p.pp_id = pp.pp_id
                        AND p.project_id = $id
                        ORDER BY p.name ASC";
        //echo $sql."----------------------";
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
                $row["categories"] = $this->getProjectCategories($row["project_id"]);
                $arr[]=$row;
            }
            $stmnt->close();
            return $arr;
        }
    }
    /**
     * Returns a list of the assigend categories of the project.
     * @param type $projectId
     * @return type array of strings containing the categories names of the project.
     */
    private function getProjectCategories($projectId){
        $sql = "SELECT c.name 
                FROM `project_categories` as pc
                STRAIGHT_JOIN categories as c
                ON pc.category_id = c.category_id 
                AND project_id = $projectId";        
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_NUM)){
                $arr[]=$row[0];
            }
            $stmnt->close();
            return $arr;
        }
    }
    public function getProjects($filter,$userid) {
        switch($filter){
            case FilterEnum::NONE:
                $sql="SELECT * FROM projects";
                break;
            case FilterEnum::USER:           
                $sql="SELECT p.project_id,p.name,p.description,
                        p.date_creation,pp.name as phase_name,p.total_answers ,p.date_update
                        FROM projects as p 
                        STRAIGHT_JOIN phase_project as pp
                        ON p.pp_id = pp.pp_id
                        AND p.user_id = $userid
                        ORDER BY p.name ASC";
                break;
            case FilterEnum::ID:                       
                $sql="SELECT project_id FROM projects WHERE user_id = $userid
                        ORDER BY project_id ASC";
                break;
            case FilterEnum::NAME:
                $sql = "SELECT name FROM projects WHERE user_id = $userid
                        ORDER BY name ASC";
                break;
            case FilterEnum::BOTH:   
                if($userid===0){
                    $sql = "SELECT project_id,name FROM projects ORDER BY name ASC";
                }else{
                    $sql = "SELECT project_id,name FROM projects WHERE user_id = $userid
                        ORDER BY name ASC";
                }
                break;
            default:
                $sql="SELECT * FROM projects";
                break;
        }
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
                if(!$filter == FilterEnum::CATEROGY || !$filter == FilterEnum::USER){
                    $row["categories"] = $this->getProjectCategories($row["project_id"]);
                }
                $arr[]=$row;
            }
            $stmnt->close();
            return $arr;
        }
    }

    public function getProjectsByCategory($cat) { 
        if(!is_numeric($cat)){
            $sql="SELECT p.project_id, p.name, p.description, p.date_creation, pp.name AS pp_id, p.total_answers, p.date_update, u.name  as user_name
                        FROM categories AS c
                        STRAIGHT_JOIN project_categories AS pc
                        STRAIGHT_JOIN projects AS p
                        STRAIGHT_JOIN phase_project AS pp
                        STRAIGHT_JOIN users AS u ON pc.project_id = p.project_id
                        AND c.category_id = pc.category_id
                        AND p.pp_id = pp.pp_id
                        AND u.user_id = p.user_id
                        WHERE c.category_id = '$cat'
                        ORDER BY c.category_id ASC ";
        }else{
            $sql="SELECT p.project_id, p.name, p.description, p.date_creation, pp.name AS pp_id, p.total_answers, p.date_update, u.name as user_name
                    FROM categories AS c
                    STRAIGHT_JOIN project_categories AS pc
                    STRAIGHT_JOIN projects AS p
                    STRAIGHT_JOIN phase_project AS pp
                    STRAIGHT_JOIN users AS u ON pc.project_id = p.project_id
                    AND c.category_id = pc.category_id
                    AND p.pp_id = pp.pp_id
                    AND u.user_id = p.user_id
                    WHERE c.category_id = $cat
                    ORDER BY c.category_id ASC ";
            
        }
        //echo $sql."\n";
        $stmnt = $this->database->prepareStatement($sql);
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
}

?>
