<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: text/html; charset=utf-8');

include_once '../Services/Includer.php';
$translator = TranslatorBuilder::buildTranslator("Question");
$questions = $_POST["questions"];
$succes = true;
foreach($questions as $row){
    if(strlen($row)>0){
        $translator->setQuestion($row);
        $succes = $succes && $translator->saveRow();  
    }
}
if($succes){
    $msg = "success";
}else{
    $msg = "No se puedieron guardar las respuestas.";
}
header('Content-type:text/html');
echo $msg;
?>
