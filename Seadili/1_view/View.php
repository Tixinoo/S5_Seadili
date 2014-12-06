<?php

include_once '0_model/User.php';

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
        include '3_content/header.php';
        include '3_content/home.html';
        //Affichage de 10 titres aléatoires
        echo "<h2>Titres</h2><hr><br><div id=\"resultatsTitres\">";
        for ($i = 0; $i < 3; $i++) {
            $this->trackView($this->obj0[rand(0, count($this->obj0) - 1)]);
        }
        //foreach ($this->obj0 as $track) {
        //$this->trackView($track);
        //}
        echo "</div>";

        //Affichage de 10 artistes aléatoires
        echo "<h2>Artites</h2><hr><br><div id=\"resultatsArtistes\">";
        for ($i = 0; $i < 3; $i++) {
            $this->artistView($this->obj1[rand(0, count($this->obj1) - 1)]);
        }
        //foreach ($this->obj1 as $artist) {
        //$this->artistView($artist);
        //}
        echo "</div>";

        //Affichage de toutes les playlists
        echo "<h2>Playlists</h2><hr><br><div id=\"resultatsPlaylists\">";
        foreach ($this->obj2 as $playlist) {
            $this->playlistView($playlist);
        }
        echo "</div>";

        include '3_content/footer.html';
    }

    public function playlistsView() {
        include '3_content/header.php';
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

        if(isset($_SESSION['user'])) {
            $u = new User();
            $u = $_SESSION['user'];
            $t = Playlist::findByUserid($u->user_id);
            foreach ($t as $pl) {
                $this->playlistView($pl);
            }
        }


        include '3_content/footer.html';
    }

    public function registerView() {
        include '3_content/header.php';
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
     * Affiche un artiste
     * @param $artist Artiste à afficher
     */
    public function artistView2($artist) {
        $str = "<div class=\"artiste\">" . $artist->name . "
        <br><img src=\"" . $artist->image_url . "\" height=\"100px\"/>
        <br>Info : " . $artist->info . "
        </div>";
        return $str;
    }

    public function artistsView($artists) {
        $str = "";
        foreach ($artists as $artist) {
            $str.= $this->artistView2($artist);
        }
        return $str;
    }

    /**
     * Affiche un titre
     * @param $track Titre à afficher
     */
    public function trackView($track) {
        echo"<div class=\"morceau\">" . $track->title;
        echo
        "<form name=\"addtrack\" method=\"POST\">
	<input type=\"button\" value=\"Ajouter\"  onclick=\"addtrackplaylist(" . $track->track_id . ",'" . $track->title . "')\">
        </form>";
        $artist = Artist::findById($track->artist_id);
        echo "<i>" . $artist->name . "</i>
        <br><audio controls=\"controls\"><source src=" . $track->mp3_url . "/></audio>
        </div>";
    }

    /**
     * Affiche un titre
     * @param $track Titre à afficher
     */
    public function trackView2($track) {
        $str = "<div class=\"morceau\">" . $track->title;
        $str.=
                "<form name=\"addtrack\" method=\"POST\">
	<input type=\"button\" value=\"Ajouter\"  onclick=\"addtrackplaylist(" . $track->track_id . ",'" . $track->title . "')\">
        </form>";
        $artist = Artist::findById($track->artist_id);
        $str.= "<i>" . $artist->name . "</i>
        <br><audio controls=\"controls\"><source src=" . $track->mp3_url . "/></audio>
        </div>";
        return $str;
    }

    public function tracksView($tracks) {
        $str = "";
        foreach ($tracks as $track) {
            $str.= $this->trackView2($track);
        }
        return $str;
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
