<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Joe
 */
interface I_AnswerController {
    /**
     * Gets the answers in the database according to the filter.
     * @param FilterEnum $filter
     */
    public function getAnswers($filter, $user_id = NULL);
    /**
     * Returns the row according of the id.
     * @param int $id
     */
    public function getAnswersById($id);
    public function getAnswersByQuestionId($question_id,$user_id = NULL);
}

?>
