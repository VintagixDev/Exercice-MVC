<?php

require_once "Models/schoolModel.php";

if($uri === "/mesEcoles"){

    $schools = selectAllSchools($pdo);

    $title = "Mes Écoles";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}
elseif($uri === "/createSchool"){

    if(isset($_POST['btnEnvoi'])){
        createSchool($pdo);
        $schoolId = $pdo->lastInsertId();

        for($i = 0; $i < count($_POST["options"]);$i++){
            $optionsScolaireId = $_POST["options"][$i];
            ajouterOptionEcole($pdo, $schoolId, $optionsScolaireId);
        }
        header("location:/mesEcoles");
    }
    $options = selectAllOptions($pdo);
    $title = "Ajout d'une école";
    $template = "Views/editOrCreateSchool.php";
    require_once("Views/base.php");
}