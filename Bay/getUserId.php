<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: text/html; charset=utf-8');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $result["user"] = $_SESSION["user_id"];
    echo json_encode($result);
?>
