<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    include_once '../Services/Includer.php';
    $values = $_POST; 
    $user =(array_key_exists("mail",$values))? $values['mail'] : "";
    $pass =(array_key_exists("password",$values))? $values['password'] : "";
    header('Content-Type: text/html; charset=utf-8');
    if(strlen($user)>0 && strlen($pass)>0){  
        $translator = TranslatorBuilder::buildTranslator("User");
        $arr = $translator->getUserByMail($user); 
        $myUser = $arr[0];
        $salt1 = "*3uni@l3Is";
        $salt2 = "b@utiful#*"; 
        $string = "$salt1".$pass."$salt2";
	$token = sha1($string);
        if($token === $myUser['password']){
             if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }       
            $_SESSION['user_id'] =  $myUser['user_id'];
            $name = explode(" ",$myUser['name']);
            $_SESSION['Name'] = $name[0];
            $_SESSION['logged']=1;   
            echo "logged";
        }else{
            echo "false";
        }
    }else{
        echo "false";
    }
?>
