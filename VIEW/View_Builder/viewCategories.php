<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: text/html; charset=utf-8');
    chdir("..");
    include_once '../Services/Includer.php';
    $op = (array_key_exists("filter",$_GET))?$_GET["filter"] : ProjectFilter::NONE;
    switch($op){
        case "category":
            $filter = ProjectFilter::CATEROGY;
            break;
        default:
            $filter = ProjectFilter::NONE;
    }
    $catTrans = TranslatorBuilder::buildTranslator("Categories");
    $result = $catTrans->getCategories(FilterEnum::BOTH);
    $bigArr = array();
    $x = 0;
    //creates the array of categories
    foreach ($result as $row){
        $bigArr[$x][0] = $row["category_id"];
        $bigArr[$x][1] = $row["name"];
        $x++;
    }
    echo json_encode($bigArr);
?>
