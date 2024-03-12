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