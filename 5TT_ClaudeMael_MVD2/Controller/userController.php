<?php
if($uri === "/connexion"){
    $title = "Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
}
elseif($uri === "/inscription"){
    $title = "Inscription";
    $template = "Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");
} else{
    $title = "Page introuvable...";
    $template = "Views/Users/error.php";
    require_once("Views/base.php");
}