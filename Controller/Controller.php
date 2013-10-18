<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Joe
 */
class Controller implements I_UserController,  I_ProjectController, I_CategoriesController{
    private $activeDao;
    private $activeObject;
    private $activeObjectName;
    private $ativeDomainEnum;
    
    public function Controller($DomainEnum, $values){
        $this->ativeDomainEnum = $DomainEnum;
        $this->activeObjectName = DomainEnumeration::getDomainString($DomainEnum);
        $this->activeObject = DomainFactory::buildObject($this->activeObjectName);
        $this->activeObject->overwriteAttributes($values);
        $this->activeDao = FactoryDao::buildObject($this->activeObjectName);
    }
    public function getUserById($id) {
        if(DomainEnumeration::USER === $this->ativeDomainEnum){
            return $this->activeDao->getUserById();
        }        
    }

    public function getUserByName($name) {
        if(DomainEnumeration::USER === $this->ativeDomainEnum){
            return $this->activeDao->getUserByName();
        }                
    }

    public function getUsers() {
        if(DomainEnumeration::USER === $this->ativeDomainEnum){
            return $this->activeDao->getUsers();
        }                
        
    }

    public function getUsersByDate($date, $op) {
        if(DomainEnumeration::USER === $this->ativeDomainEnum){
            return $this->activeDao->getUsersByDate();
        }                
        
    }
    /***
     * Sends the object to the dao and saves it in the model section.
     */
    public function saveRow(){
        return $this->activeDao->insertRow($this->activeObject);
    }
    /***
     * Sends the object to the dao and updates it in the model section.
     */
    public function updateRow(){
        $this->activeDao->updateRow($this->activeObject);
    }
    /***
     * Sends the object to the dao and deletes it in the model section.
     */
    public function deleteRow(){
        $this->activeDao->removeRowById($this->activeObject);
        
    }

    public function getProjectById($id) {
        
    }

    public function getProjects($filter) {
        return $this->activeDao->getProjects($filter);
    }

    public function getCategories($filterEnum) {        
        return $this->activeDao->getCategories($filterEnum);
    }

    public function getProjectsByCategory($cat) {
        return $this->activeDao->getProjectsByCategory($cat);        
    }
}

?>
