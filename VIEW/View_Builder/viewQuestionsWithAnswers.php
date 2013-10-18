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
    $user = $_SESSION['user_id'];
    $project_id = (array_key_exists("project_id",$_POST))?$_POST["project_id"] : 4;
    $projectTrans = TranslatorBuilder::buildTranslator("Question");
    $op="byProjectId";
    //$project_id = 13;
    $questions = null;
    switch($op){
        case "user":
            break;
        case "id":
            break;
        case "IdAndName":
            break;
        case "byId":
            break;
        case "byProjectId":
            $questions = $projectTrans->getQuestionsWithQuestions($project_id);
            break;
        default:
            $filter = FilterEnum::NONE;
            $questions = $projectTrans->getQuestions($filter,$user);
    }
    echo json_encode($questions);
?>
