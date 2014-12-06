<?php

include_once 'Controller.php';
include_once '1_view/View.php';
include_once '0_model/Artist.php';
include_once '0_model/Track.php';
include_once '0_model/Playlist.php';

class SiteController extends Controller {

    public function __construct() {
        $this->tab_action = array(
            'default' => 'defaultAction',
            'home' => 'defaultAction',
            'playlists' => 'playlistsAction',
            'register' => 'registerAction',
            'searchTracks' => 'searchTracksAction',
            'searchArtists' => 'searchArtistsAction'
        );
    }
    
    public function defaultAction() {
        $tab0 = Track::findAll();
        $tab1 = Artist::findAll();
        $tab2 = Playlist::findAll();
        $view = new View($tab0, $tab1, $tab2);
        $view->defaultView();
    }
    
    public function playlistsAction() {
        $o = NULL;
        $view = new View($o,$o,$o);
        $view->playlistsView();
        
    }
    
    public function registerAction() {
        $o = NULL;
        $view = new View($o,$o,$o);
        $view->registerView();
    }
    
    public function searchTracksAction() {
        if (isset($_GET['val'])) {
            $this->searchByTrackTitle($_GET['val']);
        }
    }
    
    public function searchArtistsAction() {
        if (isset($_GET['val'])) {
            $this->searchByArtistName($_GET['val']);
        }
    }
    
    public function searchByTrackTitle($v) {
        $t = Track::findByTitle($v);
        $o = NULL;
        $view = new View($o,$o,$o);
        echo $view->tracksView($t);
    }
    
    public function searchByArtistName($v) {
        $t = Artist::findByName($v);
        $o = NULL;
        $view = new View($o,$o,$o);
        echo $view->artistsView($t);
    }
    
}