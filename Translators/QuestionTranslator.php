<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionsTranslator
 *
 * @author Joe
 */
class QuestionTranslator extends DataReceiver implements I_QuestionController {
    public function __construct($controller = NULL) {
        parent::DataReceiver(DomainEnumeration::QUESTION,$controller);
        $this->translateValues();
        $this->controller->updateObjectValues($this->values);
    }

    public function getQuestionById($id) {
        return $this->controller->getQuestionById($id);
    }

    public function getQuestions($filter, $userid) {
        return $this->controller->getQuestions($filter, $userid);
    }

    public function getQuestionsByProjectId($project_id) {
        return $this->controller->getQuestionsByProjectId($project_id);
    }

    public function removeRowById(){
        if($this->controller->deleteRow()){    
            return "Éxito al guardar la respuesta";
        }else{
            return "No se pudo guardar la respuesta";
        }
    }

    public function saveRow() {
        if($this->controller->saveRow()){            
            return true;
        }else{
            return false;
        }
    }

    public function translateValues() {
        $array = array();
        $array['question_id'] =(array_key_exists("question_id",$this->values))? $this->values['question_id'] : "";
        $array['project_id'] =(array_key_exists("project_id",$this->values))? $this->values['project_id'] : "";
        $array['question'] =(array_key_exists("question",$this->values))? $this->values['question'] : "";
        $array['calification'] =(array_key_exists("calification",$this->values))? $this->values['calification'] : "";
        $array['date_creation'] =(array_key_exists("date_creation",$this->values))? $this->values['date_creation'] : "";
        $array['user_id'] = $_SESSION['user_id'];
        $this->values = $array;   
    }
    
    public function setQuestion($question){
        $this->values["question"] = $question;  
        $this->controller->updateObjectValues($this->values);
        
    }

    public function updateRow() {
        if($this->controller->saveRow()){         
            return "Éxito al guardar la respuesta";
        }else{
            return "No se pudo guardar la respuesta";
        }
    }
}

?>
