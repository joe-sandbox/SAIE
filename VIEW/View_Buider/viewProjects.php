<?php
    //header('Content-Type: text/html; charset=utf-8');
    chdir("..");
    include_once '../Services/Includer.php';
    $op = (array_key_exists("filter",$_GET))?$_GET["filter"]:ProjectFilter::NONE;
    switch($op){
        case "category":
            $filter = ProjectFilter::CATEROGY;
            break;
        default:
            $filter = ProjectFilter::NONE;
    }
    $translator = new ProjectTranslator(DomainEnumeration::PROJECT,  ProcessEnum::SELECT);
    $result = $translator->getProjects($filter);
    $temp = $result;
    
    var_dump(json_encode($temp));
    echo json_encode($result);
?>
