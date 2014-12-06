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
    
    if($pw == $user->password) {
        $a = session_start();
        echo $a;
        $_SESSION['username'] = $un;
        $_SESSION['password'] = $user->password;
        $_SESSION['user'] = $user;
    }
    
}

header("Location: ../index.php?a=home");