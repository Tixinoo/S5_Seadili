<div class="page">
<?php

include_once '0_model/User.php';

$nberror = 0;
$error = "";
$valid = true;
        
    //Check username
    if (!isset($_POST["pseudo"]) || strlen($_POST["pseudo"]) <= 5){
        $valid = false;
        $error .= "<p>- Votre nom d'utilisateur doit contenir au moins 5 caractères !</p>";
        $nberror++;
    }
    else{
        $pseudo = $_POST["pseudo"];
    }


    //Check password
    if (!isset($_POST['pass']) || strlen($_POST['pass']) <= 8){
        $valid = false;
        $error .= "<p>- Votre mot de passe doit contenir au moins 8 caractères !</p>";
        $nberror++;
    }

    if(!preg_match("#[0-9]#", $_POST["pass"])){
        $valid = false;
        $error .= "<p>- Votre mot de passe doit contenir au moins un chiffre !</p>";
        $nberror++;
    }

    if ($valid){
        $pass = $_POST["pass"];
    }



    //Check confirmation
    if (!isset($_POST['pass2']) || $_POST['pass2'] != $_POST['pass']){
        $valid = false;
        $error .= "<p>- Le mot de passe et sa confirmation ne sont pas identiques !</p>";
        $nberror++; 
    }
    else{
        $pass2 = $_POST['pass2'];
    }

    //Check mail
    if (!isset($_POST["mail"]) || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $error .= "<p>- L'adresse e-mail saisie est invalide !</p>";
        $nberror++;
    }
    else{
        $mail = $_POST["mail"];
    }

    //Check if username is already used
    if ($valid){
        $check = User::checkUsername($pseudo);
        if ($check != 0){
              $valid = false;
              $error .= "<p>- Le nom d'utilisateur ".$pseudo." est déjà pris !</p>";
              $nberror++;
        }
    }


    //Add the user
    if ($valid){
        echo "<br><br><br><p> Félicitations ! Votre inscription s'est réalisée avec succès !</p>";
        $id = User::newId();
        $us = new User($id, $pseudo, md5($pass), $mail);
        $us->insert();
    }
    else{
        echo "<p>Votre formulaire d'inscription contient les ".$nberror." erreurs suivantes: </p>";
        echo $error;
    }
?>
           
    
</div>



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

