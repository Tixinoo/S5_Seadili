<?php

include_once 'DataBase.php';
include_once 'Track.php';
include_once 'Artist.php';
include_once '../1_view/View.php';

$o = NULL;
$view = new View($o, $o, $o);

foreach ($_POST['tracks'] as $id) {
    $view->trackView(Track::findById($id));
}