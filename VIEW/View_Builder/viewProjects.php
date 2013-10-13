<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    header('Content-Type: text/html; charset=utf-8');
    chdir("..");
    include_once '../Services/Includer.php';
    $op = (array_key_exists("filter",$_POST))?$_POST["filter"] : FilterEnum::NONE;    
    //$user = (array_key_exists("user_id",$_SESSION))?$_SESSION["user_id"] : 0;
    $user = 0;
    $project_id = (array_key_exists("project_id",$_POST))?$_POST["project_id"] : 0;
    $projectTrans = TranslatorBuilder::buildTranslator("Project");
    //$project_id = 5;
    //$op="byId";
    //echo "op:$op     ___ project_id:$project_id";
    switch($op){
        case "user"://returns the projects of the user
            $filter = FilterEnum::USER;
            $projects = $projectTrans->getProjects($filter,$user);
            break;
        case "id"://returns only an array with the id's of the user.
            $filter = FilterEnum::ID;
            $projects = $projectTrans->getProjects($filter,$user);
            break;
        case "IdAndName"://returns array with both id and name of the project corresponding the user
            $filter = FilterEnum::BOTH;
            $projects = $projectTrans->getProjects($filter,$user);
            break;
        case "byId":
            $projects = $projectTrans->getProjectById($project_id);
            break;
        default:
            $filter = FilterEnum::NONE;
            $projects = $projectTrans->getProjects($filter,$user);
    }
    echo json_encode($projects);
?>
