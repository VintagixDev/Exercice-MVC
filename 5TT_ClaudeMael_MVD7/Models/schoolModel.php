<?php

function selectAllSchools($pdo){
    try{
        //définition de la request
        $query = "select * from school";
        //préparation de l'exécution de la request
        $selectSchool = $pdo->prepare($query);
        //exécution;
        $selectSchool->execute();
        //récupération des données dans l'objet fetch
        $schools = $selectSchool->fetchAll();
        //renvoi des données
        return $schools;
    }catch (PDOException $e) {
        $msg = "Error PDO".$e->getMessage();
        die($msg);
    }
}

function deleteAllSchoolsFromUser($pdo){
    try{
        $query = 'delete from school where utilisateurId = :utilisateurId';
        $deleteAllSchoolsFromId = $pdo->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function selectMySchools($pdo){
    try{
        $query = 'select * from school where utilisateurId = :utilisateurId';
        $selectSchool = $pdo->prepare($query);
        $selectSchool->execute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
        $schools = $selectSchool->fetchAll();
        return $schools;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}
function selectAllOptions($pdo){
    try{
        $query = 'SELECT * FROM optionscolaire';
        $selectOptions = $pdo->prepare($query);
        $selectOptions->execute();
        $options = $selectOptions->fetchAll();
        return $options;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function createSchool($pdo){
    try{
        $query = 'insert into school(schooNom, schoolAdresse, schoolVille, schoolCodePostal, schoolNumero, schoolImage, utilisateurId) 
        values(:schoolNom, :schoolAdresse, :schoolVille, :schoolCodePostal, :schoolNumero, :schoolImage, :utilisateurId)';
        $addSchool = $pdo->prepare($query);
        $addSchool->execute([
            'schoolNom' => $_POST["nom"],
            'schoolAdresse' => $_POST["adresse"],
            'schoolVille' => $_POST["ville"],
            'schoolCodePostal' => $_POST["code_postal"],
            'schoolNumero' => $_POST["numero_de_telephone"],
            'schoolImage' => $_POST["image"],
            'utilisateurId' => $_POST["user"]->id 
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function ajouterOptionEcole($pdo,$schoolId,$optionId){
    try{
        $query='insert into option_ecole(schoolId, optionScolaireId) values (:schoolId, :optionScolaireId)';
        $addOptionToSchool = $pdo->prepare($query);
        $addOptionToSchool->execute([
            'schoolId' => $schoolId,
            'optionScolaireId' => $optionId
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}


function selectOneSchool($pdo)
{
    try{
        $query = 'select * from school where schoolId = :schoolId';
        $selectSchool = $pdo->prepare($query);
        $selectSchool->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
        $school = $selectSchool->fetch();
        return $school;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}


function selectOptionsActiveSchool($pdo){
    try{
        $query = 'select * from optionscolaire where optionScolaireId in (select optionScolaireId from option_ecole where schoolId = :schoolId);';
        $selectOptions = $pdo->prepare($query);
        $selectOptions->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
        $options = $selectOptions->fetch();
        return $options;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function updateSchool($pdo){
    try{
        $query = 'update school set schoolNom = :schoolNom, schoolAdresse = :schoolAdresse, schoolVille = :schoolVille, schoolCodePostal = :schoolCodePostal, schoolNumero = :schoolNumero, schoolImage = :schoolImage where schoolId = :schoolId';
        $updateSchoolFromId = $pdo->prepare($query);
        $updateSchoolFromId->execute([
            'schoolNom' => $_POST["nom"],
            'schoolAdresse' => $_POST["adresse"],
            'schoolVille' => $_POST["ville"],
            'schoolCodePostal' => $_POST["code_postal"],
            'schoolNumero' => $_POST["numero_de_telephone"],
            'schoolImage' => $_POST["image"],
            'schoolId' => $_GET["schoolId"]
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function deleteOptionSchool($pdo){
    try{
        $query = 'delete from option_ecole where schoolId = :schoolId';
        $deleteAllSchoolsFromId = $pdo->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function deleteOneSchool($pdo)
{
    try{
        $query = 'delete from school where schoolId = :schoolId';
        $deleteSchoolFromId = $pdo->prepare($query);
        $deleteSchoolFromId->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}