<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_QuestionController {
    /**
     * Returns all the questions of the user filter by the filter.
     * @param <tt>FilterEnum</tt> $filter
     * @param <tt>int</tt> $userid
     */
    public function getQuestions($filter,$userid);
    /**
     * Returns the questions according its id.
     * @param <tt>int</tt> $id
     */
    public function getQuestionById($id);
    /**
     * Returns all the questions corresponding the project id.
     * @param <tt>int</tt> $project_id
     */
    public function getQuestionsByProjectId($project_id);
}

?>
