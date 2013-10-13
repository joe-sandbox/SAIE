<?php


/**
 * Description of Answer
 *
 * @author Joe
 */
class Answer implements I_DomainObject, JsonSerializable{
    private $answer_id;
    private $answer;
    private $question_id;
    private $calification;
    private $date_creation;
    private $user_id;
    
    public function getAnswer_id() {
        return $this->answer_id;
    }

    public function setAnswer_id($answer_id) {
        $this->answer_id = $answer_id;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($answer) {
        $this->answer = $answer;
    }

    public function getQuestion_id() {
        return $this->question_id;
    }

    public function setQuestion_id($question_id) {
        $this->question_id = $question_id;
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

    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

        public function getID() {
        return $this->answer_id;
    }

    public function overwriteAttributes($values) {
        $this->answer_id = isset($values["answer_id"])? $values["answer_id"]: "";
        $this->answer = isset($values["answer"])? $values["answer"]: "";
        $this->question_id = isset($values["question_id"])? $values["question_id"]: "";
        $this->calification = isset($values["calification"])? $values["calification"]: "";
        $this->date_creation = isset($values["date_creation"])? $values["date_creation"]: "";
        $this->user_id = (array_key_exists("user_id", $values))?$values["user_id"]: "0";
    }

    public function setID($id) {
        $this->answer_id = $id;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    } 
    function __construct($answer_id = NULL, $answer = NULL, $question_id = NULL, 
                        $calification = NULL, $date_creation = NULL, $user_id = NULL) {
        $this->answer_id = isset($answer_id)? $answer_id: "";
        $this->answer = isset($answer)? $answer: "";
        $this->question_id = isset($question_id)? $question_id: "";
        $this->calification = isset($calification)? $calification: "";
        $this->date_creation = isset($date_creation)? $date_creation: "";
        $this->user_id = (isset($user_id))?$user_id: "0";
    }

}

?>
