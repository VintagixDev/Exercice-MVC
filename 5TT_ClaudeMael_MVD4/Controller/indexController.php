<?php

$uri = $_SERVER['REQUEST_URI'];

require_once("Models/schoolModel.php");

if($uri === "/index.php" || $uri === "/"){
    $schools = selectAllSchools($pdo);
    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
