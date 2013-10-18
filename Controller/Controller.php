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
class Controller implements I_UserController, I_ProjectController, 
                            I_CategoriesController, I_QuestionController,
                            I_AnswerController{
    private $activeDao;
    private $activeObject;
    private $activeObjectName;
    private $ativeDomainEnum;
    
    public function Controller($DomainEnum, $values = NULL,$controller = NULL){
        $this->ativeDomainEnum = $DomainEnum;
        $this->activeObjectName = DomainEnumeration::getDomainString($DomainEnum);
        $this->activeObject = DomainFactory::buildObject($this->activeObjectName);
        if(isset($values)){
            $this->activeObject->overwriteAttributes($values);
        }        
        if(isset($controller)){
            $dao = $controller->getActiveDao();
            $this->activeDao = FactoryDao::buildObject($this->activeObjectName,$dao->getDataBase());
        }else{
            $this->activeDao = FactoryDao::buildObject($this->activeObjectName);
        }
    }
    public function updateObjectValues($values){
        $this->activeObject->overwriteAttributes($values);
    }
    public function getActiveDao() {
        return $this->activeDao;
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
        return $this->activeDao->updateRow($this->activeObject);
    }
    /***
     * Sends the object to the dao and deletes it in the model section.
     */
    public function deleteRow(){
        return $this->activeDao->removeRowById($this->activeObject);
        
    }

    public function getProjectById($id) {
        return $this->activeDao->getProjectById($id);
    }

    public function getProjects($filter,$userid) {
        return $this->activeDao->getProjects($filter,$userid);
    }

    public function getCategories($filterEnum) {  
        return $this->activeDao->getCategories($filterEnum);
    }

    public function getProjectsByCategory($cat) {
        return $this->activeDao->getProjectsByCategory($cat);        
    }

    public function getQuestionById($id) {
        return $this->activeDao->getQuestionById($id);
    }

    public function getQuestions($filter, $userid) {
        return $this->activeDao->getQuestions($filter, $userid);      
    }

    public function getQuestionsByProjectId($project_id) {
        return $this->activeDao->getQuestionsByProjectId($project_id);
    }

    public function getUserByMail($mail) {
        if(DomainEnumeration::USER === $this->ativeDomainEnum){
            return $this->activeDao->getUserByMail($mail);
        }                
    }
    public function getAnswers($filter, $user_id = NULL) {
        return $this->activeDao->getAnswers($filter,$user_id);
    }

    public function getAnswersById($id) {
        return $this->activeDao->getAnswersById($id);
    }

    public function getAnswersByQuestionId($question_id, $user_id = NULL) {
        return $this->activeDao->getAnswersByQuestionId($question_id, $user_id);
    }

    public function getQuestionsWithQuestions($project_id) {
        return $this->activeDao->getQuestionsWithQuestions($project_id);
    }

    public function moveToNextPhase($project_id) {
        return $this->activeDao->moveToNextPhase($project_id);
    }
}

?>
