<?php

include_once '0_model/User.php';
include_once '0_model/Track.php';

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

        // Affichage de titres aléatoires
        echo "<div style=\"display:inline-block; float:left; width:78%; \">";
        echo "<h2>Titres</h2><hr><br><div id=\"resultatsTitres\">";
        foreach (Track::findRandom(8) as $track) {
            $this->trackView($track);
        }
        echo "</div>";
        
        // Affichage d'artistes aléatoires
        echo "<h2>Artistes</h2><hr><br><div id=\"resultatsArtistes\">";
        foreach (Artist::findRandom(4) as $artist) {
            $this->artistView($artist);
        }
        echo "</div>";
        
        // Affichage de playlists aléatoires
        echo "<h2>Playlists</h2><hr><br><div id=\"resultatsPlaylists\">";
        foreach (Playlist::findRandom(3) as $playlist) {
            $this->playlistView($playlist);
        }
        echo "</div>";
        echo "</div>";

        // Affichage de la playlist en création
        echo "<div style=\"display:inline-block; float:left; width:20%; margin:auto;\">";
        echo "<h2>Votre nouvelle playlist</h2><hr><br>";
        include '3_content/newplaylist.html';
        echo "</div>";

        // Affichage du footer
        echo "<div style=\"display:inline; float:right; width:100%;\">";
        include '3_content/footer.html';
        echo "</div>";
    }

    public function playlistsView() {
        include '3_content/header.php';
        include '3_content/playlists.html';

        /* PARTIE "A DECOUVRIR" - NON ACHEVÉE
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
        */
        
        //Affichage de toutes les playlists de l'utilisateur s'il est connecté
        echo "<h2>Mes Playlists</h2><hr><br><div id=\"resultatsPlaylists\">";
        if (isset($_SESSION['username'])) {
            $t = Playlist::findByUserid($_SESSION['userid']);
            foreach ($t as $pl) {
                $this->playlistView($pl);
            }
        } else {
            echo "Vous n'êtes pas connectés. Inscrivez-vous et connectez-vous pour profiter pleinement de SeaDiLi !";
        }
        
        // Affichage du footer
        include '3_content/footer.html';
    }

    public function registerView() {
        include '3_content/header.php';
        include '3_content/register.html';
        include '3_content/footer.html';
    }

    public function doneView() {
        include '3_content/header.php';
        include '3_content/register.php';
        include '3_content/footer.html';
    }

    // Méthodes d'affichage des différents éléments

    /**
     * Affiche un artiste
     * @param $artist Artiste à afficher
     */
    public function artistView($artist) {
        echo $this->artistView2($artist);
    }

    /**
     * Affiche un artiste
     * @param $artist Artiste à afficher
     * @return String contenant l'artiste à afficher
     */
    public function artistView2($artist) {
        $str = "<div class=\"artiste\"><b>" . $artist->name . "</b>
        <br><img src=\"" . $artist->image_url . "\" height=\"100px\"/>";
        $str.= "<br><button style=\"background-color: white; border: 0px;\" class=\"easy-modal-open\" href=\"#artistinfo" . $artist->artist_id . "\"><img height=\"20px\" src=\"http://localhost/Seadili/Seadili/5_images/info.png\" height=\"100px\"/></button>\n";
        $str.= "</div>";
        $str.= "<div class=\"easy-modal\" id=\"artistinfo" . $artist->artist_id . "\">\n";
        $str.= "<br><div class=\"infoartist\">";
        $str.= "<b>" . $artist->name . "</b>";
        $str.= "<br><br><img src=\"" . $artist->image_url . "\" height=\"100px\"/>";
        $str.= "<br><br><i>" . $artist->info . "</i></div>";
        $str.= "</div>\n";
        return $str;
    }

    /**
     * Affiche un tableau d'artistes
     * @param $artists un tableau d'Artists à afficher
     * @return String contenant les artistes à afficher
     */
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
        echo $this->trackView2($track);
    }

    /**
     * Affiche un titre
     * @param $track Titre à afficher
     */
    public function trackViewInline($track) {
        $artist = Artist::findById($track->artist_id);
        echo "<div class=\"morceauInline\">";
        echo "<input type=\"image\" height=\"18px\" src=\"http://localhost/Seadili/Seadili/5_images/play.png\" value=\"Lire\" onclick=\"playTrack('" . $track->mp3_url . "')\">";
        echo " " . $track->title;
        echo " (<i>" . $artist->name . "</i>)";
        echo " <input type=\"image\" height=\"20px\" src=\"http://localhost/Seadili/Seadili/5_images/add.png\" value=\"Ajouter\" onclick=\"addtrackplaylist(" . $track->track_id . ",'" . $track->title . "')\">";
        echo "</div>";
    }

    /**
     * Affiche un titre
     * @param $track Titre à afficher
     * @return String contenant la track
     */
    public function trackView2($track) {
        $artist = Artist::findById($track->artist_id);
        $str = "<div class=\"morceau\">";
        $str.= "<input type=\"image\" height=\"25px\" src=\"http://localhost/Seadili/Seadili/5_images/play.png\" value=\"Lire\" onclick=\"playTrack('" . $track->mp3_url . "')\"><br>";
        $str.= $track->title;
        $str.= "<br><i>" . $artist->name . "</i>";
        $str.= "<br><input type=\"image\" height=\"27px\" src=\"http://localhost/Seadili/Seadili/5_images/add.png\" value=\"Ajouter\" onclick=\"addtrackplaylist(" . $track->track_id . ",'" . $track->title . "')\">";
        $str.= "</div>";
        return $str;
        /* OLD:
          $str = "<div class=\"morceau\">" . $track->title;
          $str.=
          "<form name=\"addtrack\" method=\"POST\">
          <input type=\"button\" value=\"Ajouter\"  onclick=\"addtrackplaylist(" . $track->track_id . ",'" . $track->title . "')\">
          </form>";
          $artist = Artist::findById($track->artist_id);
          $str.= "<i>" . $artist->name . "</i>
          <br><audio controls=\"controls\"><source src=" . $track->mp3_url . "/></audio>
          <br><input type=\"button\" value=\"Lire\" onclick=\"playTrack('" . $track->mp3_url . "')\">
          </div>";
          return $str; */
    }

    /**
     * Affiche un tableau de titres
     * @param $tracks un tableau de titres
     * @return String contenant les titres à afficher
     */
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
        echo "<div class=\"playlist\"><div onclick=\"showPlaylist('p" . $playlist->playlist_id . "')\"><b>" . $playlist->playlist_name . "</b>";
        $username = User::findById($playlist->user_id)->username;
        if ($username != "bateau") {
            echo "<br><img height=\"20px\" src=\"http://localhost/Seadili/Seadili/5_images/user.png\"/>" . $username;
        } else {
            echo "<br><img height=\"20px\" src=\"http://localhost/Seadili/Seadili/5_images/alluser.png\"/>";
        }
        $tracks = Track::findByPlaylist($playlist->playlist_id);
        echo "</div><div style=\"display: none;\" id=\"p" . $playlist->playlist_id . "\">";
        foreach ($tracks as $track) {
            $this->trackViewInline($track);
        }
        echo "</div></div>";
    }

}
