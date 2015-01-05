<?php

require 'Playlist.php';
require 'Playlist_tracks.php';

// Récupération de la session
session_start();

// Création de l'objet playlist avec le nom indiqué par l'utilisateur
$newPlaylist = new Playlist();
$newPlaylist->playlist_name = $_POST['nomNouvellePlaylist'];

print_r($_SESSION);

// Si l'utilisateur est déjà connecté
if (isset($_SESSION['username'])) {
    // On lui attache cette playlist
    $newPlaylist->user_id = $_SESSION['userid'];
} else {
    // Sinon, cette playlist appartiendra à compte commun, elle sera partagée
    $newPlaylist->user_id = 1;
}

// Insertion de l'objet dans la base
$newPlaylist->insert();

// Construction de la plyalist grâce à l'objet plyalist_tracks, à chaque fois insérer dans la base
$i = 1;
foreach ($_POST['tracks'] as $id) {
    $newPlaylist_tracks = new Playlist_tracks();
    $newPlaylist_tracks->playlist_id = $newPlaylist->playlist_id;
    $newPlaylist_tracks->position = $i;
    $newPlaylist_tracks->track_id = $id;
    $newPlaylist_tracks->insert();
    $i++;
}

// Redirection vers la page d'accueil
header("Location: ../index.php?a=home");
