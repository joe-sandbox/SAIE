<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_ProjectController {
    //put your code here
    /**
     * Gets all the projects. If filter is null retrieves all of them. If is set
     * then retrieves all the objects filtered according to the filter.
     * @param <tt>ProjectFilter</tt> $filter
     */
    public function getProjects($filter);
    /***
     * Gets the project according to the id.
     * @param  <tt>int</tt> $id of the project.
     */
    public function getProjectById($id);
    /***
     * Gets the project according to the category.
     * @param  <tt>name/int</tt> $id of the project.
     */
    public function getProjectsByCategory($cat);
}

?>
