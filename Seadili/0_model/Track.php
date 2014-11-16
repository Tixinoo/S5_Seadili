<?php

include_once 'DataBase.php';

class Track {

    /**
     * Attributs d'un titre
     * (correspondent aux colonnes de la table 'Track')
     */
    private $track_id, $title, $mp3_url, $artist_id;

    public function __construct() {
        
    }

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_title nom de l'attribut
     */
    public function __get($attr_title) {
        if (property_exists(__CLASS__, $attr_title)) {
            return $this->$attr_title;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_title nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_title, $attr_val) {
        if (property_exists(__CLASS__, $attr_title)) {
            $this->$attr_title = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'Track'
     * qui correspond à l'objet courant
     * (même track_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->track_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE tracks SET title = :title , mp3_url = :imageurl, artist_id = :artist_id WHERE track_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':title', $this->title);
            $statement->bindParam(':imageurl', $this->mp3_url);
            $statement->bindParam(':artist_id', $this->artist_id);
            $statement->bindParam(':id', $this->track_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'Track'
     * qui correspond à l'objet courant
     * (même track_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->track_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE tracks WHERE track_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->track_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'Track'
     * qui correspond à l'objet courant
     * (même track_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO tracks (title,mp3_url,artist_id) VALUES(:title,:imageurl,:artist_id)";
            $statement = $db->prepare($query);
            $statement->bindParam(':title', $this->title);
            $statement->bindParam(':imageurl', $this->mp3_url);
            $statement->bindParam(':artist_id', $this->artist_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet Track
     * les informations de la base
     * relative au titre dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet Track rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM tracks WHERE track_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Track avec les informations contenues dans le tuple
            $track = new Track();
            $track->track_id = $row['track_id'];
            $track->title = $row['title'];
            $track->mp3_url = $row['mp3_url'];
            $track->artist_id = $row['artist_id'];

            // Retour de l'artiste
            return $track;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByPlaylist($playlistid) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            //$query = "SELECT track_id FROM playlists_tracks WHERE playlist_id = :pid";
            $query = "SELECT * FROM playlists_tracks WHERE playlist_id = :pid";
            $statement = $db->prepare($query);
            $statement->bindParam(':pid', $playlistid);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération de tous les tuples de la table Artist
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Artist avec les artist_idrmations contenues dans le tuple courant
                $track = new Track();
                $track = Track::findById($row['track_id']);
                $tab[] = $track;
            }

            // Retour du tableau d'artiste
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByPlaylist: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Artist
     * tous les artistes contenus dans la base
     * @return un tableau d'objets Artist rempli avec les artistes contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM tracks";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération de tous les tuples de la table Artist
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Artist avec les artist_idrmations contenues dans le tuple courant
                $track = new Track();
                $track->track_id = $row['track_id'];
                $track->title = $row['title'];
                $track->mp3_url = $row['mp3_url'];
                $track->artist_id = $row['artist_id'];
                $tab[] = $track;
            }

            // Retour du tableau d'artiste
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

}
