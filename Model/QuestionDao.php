<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionsDao
 *
 * @author Joe
 */
class QuestionDao extends A_Dao implements I_QuestionController{
    function __construct($database = NULL) {
        $this->database = (isset($database))? $database : FactoryDB::buildObject();
    }
    public function getQuestionById($id) {
        
    }

    public function getQuestions($filter, $userid) {
        
    }

    public function getQuestionsByProjectId($project_id) {
        $sql="SELECT q.question_id,q.question,
                        q.calification,q.date_creation,
                        u.user_id 
                FROM questions as q 
                STRAIGHT_JOIN users as u
                ON q.user_id = u.user_id
                AND q.project_id = ?";
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->bind_param('i',$project_id); 
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
                $arr[] = $row;
            }
            $error = $stmnt->error;
            $stmnt->close();
            if(strlen($error)=== 0){
                return $arr;
            }else{
                return $error;
            }
        }
    }

    public function insertList($values) {
        
    }

    public function insertRow($object) {
        $sql="INSERT INTO questions(project_id,
                                    date_creation,question,
                                    calification,user_id) 
                VALUES (?,?,?,?,?)";
        /* Prepare statement */
        if(is_a($object,"Question")){
            $db = $this->database;
            $stmnt = $db->prepareStatement($sql);
            if($stmnt != false) {
                /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
                $project_id = $object->getProject_id();
                $date = $this->database->getDate();
                $question = $object->getQuestion();
                $calification = $object->getCalification();
                $userId = $object->getUser_id();
                $stmnt->bind_param('issii',$project_id,$date,$question,$calification,$userId); 
                /* Execute statement */
                $stmnt->execute();   
                $error = $stmnt->error;
                $stmnt->close();
                if(strlen($error)=== 0){
                    return true;
                }else{
                    return $error;
                }
            }            
        }
    }

    public function removeRowById($object) {
        
    }
    /**
     * Deletes from table all the rows corresponding to the project id.
     * @param <tt>int</tt> $project_id
     * @return <tt>boolean</tt> true if successful.
     */
    public function deleteQuestionsByProjectId($project_id){
        $sql="DELETE FROM questions WHERE project_id = ?";
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
            $stmnt->bind_param('i',$project_id); 
                /* Execute statement */
            $stmnt->execute();   
            $error = $stmnt->error;
            $stmnt->close();
            if(strlen($error)=== 0){
                return true;
            }else{
                return $error;
            }
        }
    }
    public function updateRow($object){
        
    }

    public function getQuestionsWithQuestions($project_id) {
        
        $sql="SELECT q.question_id,q.question,
                    q.calification,q.date_creation,
                    u.user_id 
            FROM questions as q 
            STRAIGHT_JOIN users as u
            ON q.user_id = u.user_id
            AND q.project_id = ?";
        $stmnt = $this->database->prepareStatement($sql);       
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{  
            $stmnt->bind_param('i',$project_id); 
            /* Execute statement */
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
                $answerDao = new AnswerDao($this->database);
                $row['answers'] = $answerDao->getAnswersByQuestionId($row['question_id']);
                $arr[] = $row;
            }
            $error = $stmnt->error;
            $stmnt->close();
            if(strlen($error)=== 0){
                return $arr;
            }else{
                return $error;
            }
        }
    }
}

?>
