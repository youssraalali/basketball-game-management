<?php
include_once ('initSession.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['nameMatch']) && !empty($_POST['date']) && !empty($_POST['hour']) && !empty($_POST['location'])){
        $tmatch = new tmatch($_POST["nameMatch"], $_POST["date"], $_POST["hour"], $_POST["location"]);
        $infoMatch->listMatch [] = $tmatch; 
    }
}
if(isset($_POST["back"])){
    header("location:index.php");
}
include_once("enterMatch.php");
