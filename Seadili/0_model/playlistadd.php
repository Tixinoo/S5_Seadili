<?php

include_once 'Playlist.php';
include_once 'Playlist_tracks.php';

$newPlaylist = new Playlist();
$newPlaylist->playlist_name = $_POST['nomNouvellePlaylist'];
$newPlaylist->user_id = 1;
$newPlaylist->insert();

$i = 1;
foreach ($_POST['tracks'] as $id) {
    $newPlaylist_tracks = new Playlist_tracks();
    $newPlaylist_tracks->playlist_id = $newPlaylist->playlist_id;
    $newPlaylist_tracks->position = $i;
    $newPlaylist_tracks->track_id = $id;
    $newPlaylist_tracks->insert();
    $i++;
}

header("Location: ../index.php?a=home");