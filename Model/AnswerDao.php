<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnswersDao
 *
 * @author Joe
 */
class AnswerDao extends A_Dao implements I_AnswerController{
    function __construct($database = NULL) {
        $this->database = (isset($database))? $database : FactoryDB::buildObject();
    }
    public function insertList($values) {
        
    }

    public function insertRow($object) {
        $sql="INSERT INTO answers(answer, question_id, calification,
                                    date_creation, user_id) 
                VALUES (?,?,?,?,?)";
        /* Prepare statement */
        if(is_a($object,"Answer")){        
            $stmnt = $this->database->prepareStatement($sql);
            if($stmnt != false) {
                /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
                $answer = $object->getAnswer();
                $question_id = $object->getQuestion_id();
                $date = $this->database->getDate();
                $calification = $object->getCalification();
                $userId = $object->getUser_id();
                echo $answer."-".$question_id."-".$calification."-".$date."-".$userId;
                $stmnt->bind_param('siisi',$answer,$question_id,$calification,$date,$userId); 
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

    public function updateRow($object) {
        
    }

    public function getAnswers($filter,$user_id = NULL) {
        switch($filter){
            case FilterEnum::NONE:
                break;
            case FilterEnum::USER:
                $sql = "SELECT * FROM answers WHERE user_id = $user_id";
                break;
            case FilterEnum::ID:    
                break;
            case FilterEnum::NAME:
                break;
            case FilterEnum::BOTH:  
                break;
            default:
                $sql="SELECT * FROM answers";
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
                $arr[]=$row;
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

    public function getAnswersById($id) {
        
    }

    public function getAnswersByQuestionId($question_id, $user_id = NULL) {
        if(isset($user_id)){
            $sql="SELECT a.answer_id,a.answer,a.question_id,a.calification,
                        a.date_creation,u.name
                    FROM `answers` as a
                    STRAIGHT_JOIN users as u
                    ON u.user_id = a.user_id
                    AND question_id  = ? 
                    AND user_id = ?";
        }else{
            $sql="SELECT a.answer_id,a.answer,a.question_id,a.calification,
                        a.date_creation,u.name
                    FROM `answers` as a
                    STRAIGHT_JOIN users as u
                    ON u.user_id = a.user_id
                    AND question_id  = ? ";
        }
        
        $stmnt = $this->database->prepareStatement($sql);
        if($stmnt === false) {
            trigger_error('Wrong SQL: ' . $stmnt . ' Error: ' . $this->database->error, E_USER_ERROR);
        }else{            
            /* Execute statement */
             if(isset($user_id)){  $stmnt->bind_param('ii',$question_id,$user_id); }
             else{ $stmnt->bind_param('i',$question_id); };
            $stmnt->execute();    
            $values = $stmnt->get_result();
            $arr = array();
            while($row = $values->fetch_array(MYSQLI_ASSOC)){
                $arr[] = $row;
            }
            $stmnt->close();
            return $arr;
        }
    }    
}

?>
