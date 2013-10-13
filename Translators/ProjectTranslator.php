<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProyectTranslator
 *
 * @author Joe
 */
class ProjectTranslator  extends DataReceiver implements I_ProjectController{
    public function __construct($controller = NULL) {
        parent::DataReceiver(DomainEnumeration::PROJECT,$controller);
        if(!isset($controller)){
            $this->translateValues();
        }   
    }
    public function translateValues() {
        $array = array();
        $array['id'] =(array_key_exists("id",$this->values))? $this->values['id'] : "";
        $array['name'] =(array_key_exists("name",$this->values))? $this->values['name'] : "";
        $array['date_creation'] =(array_key_exists("date_creation",$this->values))? $this->values['date_creation'] : "";
        $array['description'] =(array_key_exists("description",$this->values))? $this->values['description'] : "";
        $array['phase_project'] =(array_key_exists("phase_project",$this->values))? $this->values['phase_project'] : "";
        $array['total_answers'] =(array_key_exists("total_answers",$this->values))? $this->values['total_answers'] : "";
        $array['date_update'] =(array_key_exists("date_update",$this->values))? $this->values['date_update'] : "";
        $this->values = $array;            
    }
    public function removeRowById() {
        
    }

    public function saveRow() {
        
    }

    public function updateRow() {
        
    }

    public function getProjectById($id) {
        
    }

    public function getProjects($filter) {     
        return $this->controller->getProjects($filter);
    }

    

    public function getProjectsByCategory($cat) {        
        return $this->controller->getProjectsByCategory($cat);
    }

}

?>
