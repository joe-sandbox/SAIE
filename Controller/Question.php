<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author Joe
 */
class Question implements I_DomainObject{
    private $question_id;
    private $user_id;
    private $project_id;
    private $calification;
    private $date_creation;
    private $question;
    public function getQuestion_id() {
        return $this->question_id;
    }

    public function setQuestion_id($question_id) {
        $this->question_id = $question_id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getProject_id() {
        return $this->project_id;
    }

    public function setProject_id($project_id) {
        $this->project_id = $project_id;
    }

    public function getCalification() {
        return $this->calification;
    }

    public function setCalification($calification) {
        $this->calification = $calification;
    }

    public function getDate_creation() {
        return $this->date_creation;
    }

    public function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function getID() {
        return $this->question_id;
    }

    public function overwriteAttributes($values) {
        $this->project_id = isset($values["project_id"])? $values["project_id"]: "";
        $this->user_id = isset($values["user_id"])? $values["user_id"]: "1";
        $this->question_id = isset($values["question_id"])? $values["question_id"]: "";
        $this->calification = isset($values["calification"])? $values["calification"]: "";
        $this->date_creation = isset($values["date_creation"])? $values["date_creation"]: "";
        $this->question = isset($values["question"])? $values["question"]: "";
    }

    public function setID($id) {
        $this->question_id = $id;
    }
    function __construct($question_id = NULL, $user_id = NULL, $project_id = NULL,
                        $calification = NULL, $date_creation = NULL, $question = NULL) {
        $this->question_id = $question_id;
        $this->user_id = $user_id;
        $this->project_id = $project_id;
        $this->calification = $calification;
        $this->date_creation = $date_creation;
        $this->question = $question;
    }



}

?>
