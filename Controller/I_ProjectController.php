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
     * then retrieves all the objects filtered according to the filter. If value
     * is set then it retrieves all the projects accordiin to the filter and the 
     * value. Example: if you want to retrieve al the projects corresponding to
     * the user id, then filter will be set to USER and value to the id of the 
     * user.
     * @param <tt>ProjectFilter</tt> $filter
     * @param <tt>int/string</tt> $userid 
     * @param <tt>int</tt> $project_id
     */
    public function getProjects($filter,$userid);
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
