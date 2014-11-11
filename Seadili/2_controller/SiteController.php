<?php

include_once 'Controller.php';
include_once '1_view/View.php';

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
        $o = NULL;
        $view = new View($o);
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