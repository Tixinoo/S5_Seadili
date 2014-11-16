<?php

class View {
    
    /*
     * Objet à afficher
     */
    private $obj0, $obj1, $obj2;

    function __construct($p0, $p1, $p2) {
        $this->obj0 = $p0;
        $this->obj1 = $p1;
        $this->obj2 = $p2;
    }

    public function defaultView() {
        include '3_content/header.html';
        include '3_content/home.html';
        //Affichage de 10 titres aléatoires
        echo "<h2>Titres</h2><hr><br>";
        for ($i = 0; $i < 3; $i++) {
            $this->trackView($this->obj0[rand(0, count($this->obj0)-1)]);
        }
        //foreach ($this->obj0 as $track) {
            //$this->trackView($track);
        //}
        
        //Affichage de 10 artistes aléatoires
        echo "<h2>Artites</h2><hr><br>";
        for ($i = 0; $i < 3; $i++) {
            $this->artistView($this->obj1[rand(0, count($this->obj1)-1)]);
        }
        //foreach ($this->obj1 as $artist) {
            //$this->artistView($artist);
        //}
        
        //Affichage de toutes les playlists
        echo "<h2>Playlists</h2><hr><br>";
        foreach ($this->obj2 as $playlist) {
            $this->playlistView($playlist);
        }
        
        include '3_content/footer.html';
    }

    public function playlistsView() {
        include '3_content/header.html';
        include '3_content/playlists.html';
        
        echo
        "<div class=\"decouverte\">
            <h2>Decouvrir...</h2>
            <div class=\"Dplaylist\" id=1 onclick=\"playlist(this.id)\">
                Playlist 1<input type=\"button\" class=\"add\" value=\"+\">
            </div>
            <div class=\"playlistcontent\" id=\"pcontent1\"> 
                Morceau 1
                <br>Morceau 2
            </div>
            
            <div class=\"Dplaylist\" id=2 onclick=\"playlist(this.id)\">
                Playlist 2<input type=\"button\" class=\"add\" value=\"+\">
            </div>
            <div class=\"playlistcontent\" id=\"pcontent2\"> 
                Morceau 1
                <br>Morceau 2
            </div>
        </div>";
        
        
        
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
        echo"<div class=\"morceau\">" . $track->title;
        echo
        "<form name=\"addtrack\" method=\"POST\">
	<input type=\"button\" value=\"Ajouter\"  onclick=\"addtrackplaylist(". $track->track_id . ",'". $track->title . "')\">
        </form>";
        $artist = Artist::findById($track->artist_id);
        echo "<i>" . $artist->name . "</i>
        <br><audio controls=\"controls\"><source src=". $track->mp3_url ."/></audio>
        </div>";
    }
    
    /**
     * Affiche une playlist
     * @param $playlist Playlist à afficher
     */
    public function playlistView($playlist) {
        echo"<div class=\"playlist\">" . $playlist->playlist_name . "
        <br><i>Created by ..</i>";
        $tracks = Track::findByPlaylist($playlist->playlist_id);
        foreach ($tracks as $track) {
            $this->trackView($track);
        }
        echo "</div>";
    }
    
}
