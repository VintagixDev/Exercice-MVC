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
    $template = "Views/Schools/editOrCreateSchool.php";
    require_once("Views/base.php");
}
elseif(isset($_GET["schoolId"]) && $uri === "/voirEcole?schoolId=" . $_GET["schoolId"]){
    $school = selectOneSchool($pdo);
    $options = selectOptionsSchool($pdo);
    $title = "Ecole";
    $template = "Views/Schools/voirEcole.php";
}
elseif(isset($_GET["schoolId"]) && $uri === "/updateEcole?schoolId=" . $_GET["schoolId"]){
    if(isset($_POST['btnEnvoi'])){
        updateSchool($pdo);

        deleteOptionSchool($pdo);
        for($i = 0; $i < count($_POST["options"]); $i++){
            $optionScolaireId = $_POST["options"][$i];
            ajouterOptionEcole($pdo, $_GET["schoolId"], $optionScolaireId);
        }
        header("location:/mesEcoles");
    }
    $school = selectOneSchool($pdo);
    $optionActiveSchool = selectOptionsActiveSchool($pdo);
    $options = selectAllOptions($pdo);
    $title = "Mise à jour d'une école";
    $template = "Views/Schools/editOrCreateSchool.php";
    require_once("Views/base.php");
}
elseif(isset($_GET["schoolId"]) && $uri === "/deleteEcole?schoolId=" . $_GET["schoolId"]){
    
    deleteOptionSchool($pdo);
    deleteOneSchool($pdo);
    header("location:/mesEcoles");
}