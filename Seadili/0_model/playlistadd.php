<?php

include_once 'DataBase.php';
include_once 'Track.php';
include_once 'Artist.php';
include_once 'Playlist.php';
include_once 'Playlist_tracks.php';
include_once '../1_view/View.php';

$o = NULL;
$view = new View($o, $o, $o);

foreach ($_POST['tracks'] as $id) {
    $view->trackView(Track::findById($id));
}

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