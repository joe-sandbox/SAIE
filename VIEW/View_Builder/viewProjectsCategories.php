<?php
    //header('Content-Type: text/html; charset=utf-8');
    header('Content-Type: text/html; charset=utf-8');
    chdir("..");
    include_once '../Services/Includer.php';
    $op = (array_key_exists("filter",$_GET))?$_GET["filter"] : FilterEnum::NONE;
    switch($op){
        case "category":
            $filter = FilterEnum::CATEROGY;
            break;
        default:
            $filter = FilterEnum::NONE;
    }
    $catTrans = TranslatorBuilder::buildTranslator("Categories");
    $projectTrans = TranslatorBuilder::buildTranslator("Project",$catTrans);
    $result = $catTrans->getCategories(FilterEnum::BOTH);
    $bigArr = array();
    $x = 0;
    //var_dump($result);
    foreach ($result as $row){
        $bigArr[$x]["category_id"] = $row["category_id"];
        $bigArr[$x]["name"] = $row["name"];
        $miniArr = $projectTrans->getProjectsByCategory($row["category_id"]);
        //var_dump($miniArr);
        $bigArr[$x]["projects"] = $miniArr;
        $x++;
    }
    //var_dump($bigArr);
    //var_dump($bigArr[3]);
    echo json_encode($bigArr);
?>
