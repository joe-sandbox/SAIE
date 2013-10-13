<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnswersTranslator
 *
 * @author Joe
 */
class AnswerTranslator extends DataReceiver implements I_AnswerController {
    public function __construct($controller = NULL) {
        parent::DataReceiver(DomainEnumeration::ANSWER,$controller);
        $this->translateValues();
        $this->controller->updateObjectValues($this->values);
    }
    public function translateValues() {
        $array = array();
        $array['answer_id'] =(array_key_exists("answer_id",$this->values))? $this->values['answer_id'] : "";
        $array['answer'] =(array_key_exists("answer",$this->values))? $this->values['answer'] : "";
        $array['date_creation'] =(array_key_exists("date_creation",$this->values))? $this->values['date_creation'] : "";
        $array['question_id'] =(array_key_exists("question_id",$this->values))? $this->values['question_id'] : "";
        $array['calification'] =(array_key_exists("calification",$this->values))? $this->values['calification'] : "";
        $array['user_id'] =$_SESSION['user_id'];
        $this->values = $array;   
    }
    public function getAnswers($filter, $user_id = NULL) {
        return $this->controller->getProjects($filter,$user_id);
    }

    public function getAnswersById($id) {
        
    }

    public function removeRowById() {
        if($this->controller->removeRowById()){            
            return "Éxito al borrar la respuesta";
        }else{
            return "No se pudo borrar la respuesta";
        }
    }

    public function saveRow() {
        if($this->controller->saveRow()){            
            return "Éxito al guardar la respuesta";
        }else{
            return "No se pudo guardar la respuesta";
        }
        
    }

    public function updateRow() {
        if($this->controller->updateRow()){            
            return "Éxito al guardar la respuesta";
        }else{
            return "No se pudo guardar la respuesta";
        }
    }

    public function getAnswersByQuestionId($question_id, $user_id = NULL) {
        return $this->controller->getAnswersByQuestionId($question_id, $user_id);
    }   
}

?>
