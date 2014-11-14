<?php

class View {
    
    /*
     * Objet à afficher
     */
    private $obj0, $obj1;

    function __construct($p0, $p1) {
        $this->obj0 = $p0;
        $this->obj1 = $p1;
    }

    public function defaultView() {
        include '3_content/header.html';
        include '3_content/home.html';
        //Affichage de 10 titres aléatoires
        echo "<h2>Titres</h2><hr><br>";
        for ($i = 0; $i < 10; $i++) {
            $this->trackView($this->obj0[rand(0, count($this->obj0))]);
        }
        //foreach ($this->obj0 as $track) {
            //$this->trackView($track);
        //}
        
        //Affichage de tous les artistes
        echo "<h2>Artites</h2><hr><br>";
        for ($i = 0; $i < 10; $i++) {
            $this->artistView($this->obj1[rand(0, count($this->obj1))]);
        }
        //foreach ($this->obj1 as $artist) {
            //$this->artistView($artist);
        //}
        
        //Affichage de toutes les playlists
        
        
        include '3_content/footer.html';
    }

    public function playlistsView() {
        include '3_content/header.html';
        include '3_content/playlists.html';
        include '3_content/footer.html';
    }

    public function registerView() {
        include '3_content/header.html';
        include '3_content/register.html';
        include '3_content/footer.html';
    }

    // Méthodes d'affichage des différents éléments
    
    /**
     * Affiche un artiste
     * @param $artist Artiste à afficher
     */
    public function artistView($artist) {
        echo"<div class=\"artiste\">" . $artist->name . "
        <br><img src=\"" . $artist->image_url . "\" height=\"100px\"/>
        <br>Info : " . $artist->info . "
        </div>";
    }
    
    /**
     * Affiche un titre
     * @param $track Titre à afficher
     */
    public function trackView($track) {
        echo"<div class=\"morceau\">" . $track->title . "
        <br>Ariste_id : " . $track->artist_id . "
        <br><audio controls=\"controls\"><source src=". $track->mp3_url ."/></audio>
        </div>";
        //<br><audio controls=\"controls\"><source src=\"" . $track->image_url . "/>toto</audio>
    }
    
}
