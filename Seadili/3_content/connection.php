<?php

include_once '../0_model/User.php';

session_start();

// Si l'utilisateur est déjà connecté
if(isset($_SESSION['username'])) {
    // Déconnexion de l'utlisateur
    unset($_SESSION['username'], $_SESSION['userid']);
}

if(isset($_POST['username'], $_POST['password'])) {

    $un = $_POST['username'];
    $pw = $_POST['password'];
    
    // On récupère l'utilisateur
    $user = User::findByUsername($un);
    
    // Si le mot de passe indiqué est le bon
    if(md5($pw) == $user->password) {
        $a = session_start();
        // On enregistre en tant que variables de sessions, son nom d'utilisateur et son id
        $_SESSION['username'] = $un;
        $_SESSION['userid'] = $user->user_id;
    }
    
}

// Redirection vers la page d'accueil
header("Location: ../index.php?a=home");