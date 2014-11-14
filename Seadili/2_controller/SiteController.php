<?php

include_once 'Controller.php';
include_once '1_view/View.php';
include_once '0_model/Artist.php';
include_once '0_model/Track.php';

class SiteController extends Controller {

    public function __construct() {
        $this->tab_action = array(
            'default' => 'defaultAction',
            'home' => 'defaultAction',
            'playlists' => 'playlistsAction',
            'register' => 'registerAction'
        );
    }
   
    public function defaultAction() {
        $tab0 = Track::findAll();
        $tab1 = Artist::findAll();
        $view = new View($tab0, $tab1);
        $view->defaultView();
    }
    
    public function playlistsAction() {
        $o = NULL;
        $view = new View($o);
        $view->playlistsView();
        
    }
    
    public function registerAction() {
        $o = NULL;
        $view = new View($o);
        $view->registerView();
    }
}