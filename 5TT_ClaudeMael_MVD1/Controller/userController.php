<?php

$uri = $_SERVER['REQUEST_URI'];
echo $uri;
if($uri === "/index.php" || $uri === "/"){
    
    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif($uri === "/connexion"){
    $title = "Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
}
elseif($uri === "/inscription"){
    $title = "Inscription";
    $template = "Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");
}