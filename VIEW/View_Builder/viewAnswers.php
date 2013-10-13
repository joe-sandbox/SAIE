<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    header('Content-Type: text/html; charset=utf-8');
    chdir("..");
    include_once '../Services/Includer.php';
    $op = (array_key_exists("filter",$_POST))?$_POST["filter"] : FilterEnum::NONE;
    //$user = (array_key_exists("user_id",$_SESSION))?$_SESSION["user_id"] : 1;
    $user_id = $_SESSION['user_id'];
    $question_id = (array_key_exists("question_id",$_POST))?$_POST["question_id"] : 0;
    $answersTrans = TranslatorBuilder::buildTranslator("Answer");
    //$op="byProjecId";
    //$project_id = 13;
    switch($op){
        case "id":
            break;
        case "IdAndName":
            break;
        case "byId":
            break;
        case "allQuestionId":
            $answers = $answersTrans->getAnswersByQuestionId($question_id);
            break;
        case "byQuestionId":
            $answers = $answersTrans->getAnswersByQuestionId($question_id,$user_id);
            break;
        case "byUserId":
            $answers = $answersTrans->getAnswers($filter,$user_id);
            break;
        default:
            $filter = FilterEnum::NONE;
    }
    echo json_encode($answers);
?>
