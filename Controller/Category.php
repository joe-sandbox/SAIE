<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Joe
 */
class Category implements JsonSerializable,I_DomainObject{
    private $id;
    private $name;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    
    public function __construct($id = NULL, $name = NULL) {
        $this->id = $id;
        $this->name = $name;
    }

    public function overwriteAttributes($values) {
        $this->id = (isset($values['id']))? $values["id"] : "";
        $this->name = (isset($values['name']))? $values["name"] : "";
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }

}

?>
