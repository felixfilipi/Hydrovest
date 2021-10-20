<?php 

require_once "./functions/functions.php";
session_start();

$loggedin = "";

if(isset($_SESSION["loggedin"]) == TRUE){
    $loggedin = TRUE;
    $admin_id = htmlspecialchars($_SESSION["id"]);
}else{
    $loggedin = FALSE;
}

if($loggedin){
    include "header.php";
}else{
    header("Location: login.php");
    exit;
}

?>
