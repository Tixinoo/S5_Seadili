<?php

class View {
    
    /*
     * Objet à afficher
     */
    private $obj;

    function __construct($p) {
        $this->obj = $p;
    }

    public function defaultView() {
        include '3_content/header.html';
        include '3_content/home.html';
        include '3_content/footer.html';
    }

    public function playlistsView() {
        include '3_content/header.html';
        include '3_content/playlists.html';
        foreach ($this->obj as $artist) {
            $this->artistView($artist);
        }
        include '3_content/footer.html';
    }

    public function registerView() {
        include '3_content/header.html';
        include '3_content/register.html';
        include '3_content/footer.html';
    }

    // Méthodes d'affichage des différents éléments
    
    public function artistView($artist) {
        echo"<div class=\"artiste\">" . $artist->name . "
        <br><img src=\"" . $artist->image_url . "\" height=\"100px\"/>
        <br>Info : " . $artist->info . "
        </div>";
    }
    
}
