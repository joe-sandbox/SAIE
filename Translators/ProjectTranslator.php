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
        $this->translateValues();
        $this->controller->updateObjectValues($this->values);
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
        $array['categories'] =(array_key_exists("categories",$this->values))? $this->values['categories'] : "";
        $array['user_id'] =$_SESSION['user_id'];
        $this->values = $array;   
    }
    public function removeRowById() {
        if($this->controller->deleteRow()){            
            return "Éxito al eliminar el proyecto";
        }else{
            return "No se pudo eliminar el proyecto";
        }
    }

    public function saveRow() {      
        if($this->controller->saveRow()){            
            return "Éxito al crear el proyecto";
        }else{
            return "No se pudo crear el proyecto";
        }
    }

    public function updateRow() { 
        if($this->controller->updateRow()){            
            return "Éxito al actualizar el proyecto";
        }else{
            return "No se pudo actualizar el proyecto";
        }
    }

    public function getProjectById($id) {
        return $this->controller->getProjectById($id);
    }

    public function getProjects($filter,$userid) {     
        return $this->controller->getProjects($filter,$userid);
    }

    

    public function getProjectsByCategory($cat) {        
        return $this->controller->getProjectsByCategory($cat);
    }

}

?>
