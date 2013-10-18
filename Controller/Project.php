<?php
/**
 * Description of Project
 *
 * @author Joe
 */
class Project implements JsonSerializable,I_DomainObject{
    private $id;
    private $name;
    private $description;    
    private $date_creation;
    private $phase_project;
    private $total_answers;
    private $date_update;
    
    /**
     * Gets the id of the object.
     * @return <tt>int</tt> id of the project.
     */
    public function getId() {
        return $this->id;
    }
    /**
     * Sets the id of the project
     * @param <tt>int</tt> $id of project.
     */
    public function setId($id) {
        $this->id = $id;
    }
    /**
     * Gets the name of project.
     * @return <tt>string</tt>
     */
    public function getName() {
        return $this->name;
    }
    /**
     * Sets the name of the project.
     * @param <tt>string</tt> $name
     */
    public function setName($name) {
        $this->name = $name;
    }
    /**
     * Gets the description of the project.
     * @return <tt>string</tt>
     */
    public function getDescription() {
        return $this->description;
    }
    /**
     * Sets the description of the project.
     * @param type $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }
    /**
     * Gets the date when the project was created.
     * @return <tt>string</tt>
     */
    public function getDate_creation() {
        return $this->date_creation;
    }
    /**
     * Returns the id of the corresponding phase in which the project is.
     * @return <tt>int</tt>
     */
    public function getPhase_project() {
        return $this->phase_project;
    }
    /**
     * Sets the id of the corresponding phase in which the project is.
     * @param <tt>int</tt> $phase_project
     */
    public function setPhase_project($phase_project) {
        $this->phase_project = $phase_project;
    }
    /**
     * Returns the number of how many answers has the project received.
     * @return <tt>int</tt>
     */
    public function getTotal_answers() {
        return $this->total_answers;
    }
    /**
     * Sets the number of answers the project has received.
     * @param <tt>int</tt> $total_answers
     */
    public function setTotal_answers($total_answers) {
        $this->total_answers = $total_answers;
    }
    /**
     * Returns the date of the last update of the project.
     * @return <tt>string</tt>
     */
    public function getDate_update() {
        return $this->date_update;
    }
    /**
     * Sets the date of the las update of the project.
     * @param <tt>string</tt> $date_update
     */
    public function setDate_update($date_update) {
        $this->date_update = $date_update;
    }

    
    public function overwriteAttributes($values) {
        $this->id = isset($values["id"])? $values["id"]: "";
        $this->name = isset($values["name"])? $values["name"]: "";
        $this->description = isset($values["description"])? $values["description"]: "";
        $this->date_creation = isset($values["date_creation"])? $values["date_creation"]: "";
        $this->phase_project = isset($values["phase_project"])? $values["phase_project"]: "";
        $this->total_answers = isset($values["total_answers"])? $values["total_answers"]: "";
        $this->date_update = isset($values["date_update"])? $values["date_update"]: "";
        
    }
    function __construct($id = NULL, $name = NULL, 
                        $description = NULL, $date_creation = NULL, 
                        $phase_project = NULL, $total_answers = NULL, 
                        $date_update = NULL) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->date_creation = $date_creation;
        $this->phase_project = $phase_project;
        $this->total_answers = $total_answers;
        $this->date_update = $date_update;
    }

    public function jsonSerialize() {        
        return (object) get_object_vars($this);
    }


    
    
}

?>
