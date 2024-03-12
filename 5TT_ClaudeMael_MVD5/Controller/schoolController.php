<?php

require_once "Models/schoolModel.php";

if($uri === "/mesEcoles"){

    $schools = selectAllSchools($pdo);

    $title = "Mes Écoles";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif($uri === "/createSchool"){

}