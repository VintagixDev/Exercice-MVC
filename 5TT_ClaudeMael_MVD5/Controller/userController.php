<?php

require_once("Models/userModel.php");
if($uri === "/connexion"){
    if(isset($_POST['btnEnvoi'])){
        $erreur = false;
        if(connectUser($pdo)){
            header("location:/");
        }
        else{
            $erreur = true;
        }
    }
    $title = "Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
}
elseif($uri === "/inscription"){
    if(isset($_POST['btnEnvoi'])){

        $messageError = verifEmptyData();
        if(!$messageError){
            //ajout de l'user à la bdd
            createUser($pdo);
            //redirection vers la page de connexion
            header('location:/connexion');
        }
    }
    $title = "Inscription";
    $template = "Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");

}elseif($uri === "/updateProfil"){
    if(isset($_POST['btnEnvoi'])){
        $messageError = verifEmptyData();
        if(!$messageError){
            updateUser($pdo);
            updateSession($pdo);
            header('location:/profil');
        }
    }
    $title = "Mise à jour du profil";
    $template = "Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");


}elseif($uri === "/deconnexion"){
    session_destroy();
    header('location:/');
}elseif($uri === "/deleteProfil"){
    deleteAllSchoolsFromUser($pdo);
    deleteUser($pdo);
    header("location:/deconnexion");
} else{
    $title = "Page introuvable...";
    $template = "Views/Users/error.php";
    require_once("Views/base.php");
}


function verifEmptyData(){
    foreach($_POST as $key => $value){
        if(empty(str_replace(' ', '', $value))){
            $messageError[$key] = "Votre" . $key . " est vide";
        }
    }

    if(isset($messageError)){
        return $messageError;
    } else{
        return false;
    }
}