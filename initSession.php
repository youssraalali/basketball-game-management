<?php
include_once("metier.php");
session_start();

if(!isset($_SESSION["teamList"])){
    $_SESSION['teamList'] = new infoMatch();
}
$infoMatch = $_SESSION["teamList"];

if(!isset($_SESSION["matchList"])){
    $_SESSION['matchList'] = new infoMatch();
}
$infoMatch = $_SESSION["matchList"];

