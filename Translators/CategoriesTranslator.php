<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriesTranslator
 *
 * @author Joe
 */
class CategoriesTranslator extends DataReceiver implements I_CategoriesController{
    public function __construct($controller = NULL) {
        parent::DataReceiver(DomainEnumeration::CATEGORY,$controller);
        if(!isset($controller)){
            $this->translateValues();
        }   
    }

    public function getCategories($filterEnum) {
        return $this->controller->getCategories($filterEnum);
    }

    public function removeRowById() {
        
    }

    public function saveRow() {
        
    }

    public function updateRow() {
        
    }

    public function translateValues() {
        
    }    //put your code here
}

?>
