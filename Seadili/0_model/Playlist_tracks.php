<?php

include_once 'DataBase.php';

class Playlist_tracks {

    /**
     * Attributs d'un objet playlist_tracks
     * (correspondent aux colonnes de la table 'Playlist_tracks')
     */
    private $playlist_id, $position, $track_id;

    public function __construct() {}

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_position nom de l'attribut
     */
    public function __get($attr_position) {
        if (property_exists(__CLASS__, $attr_position)) {
            return $this->$attr_position;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_position nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_position, $attr_val) {
        if (property_exists(__CLASS__, $attr_position)) {
            $this->$attr_position = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'Playlist_tracks_track'
     * qui correspond à l'objet courant
     * (même playlist_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->playlist_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE playlists_tracks SET position = :position, track_id = :track_id WHERE playlist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':position', $this->position);
            $statement->bindParam(':track_id', $this->track_id);
            $statement->bindParam(':id', $this->playlist_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'Playlist_tracks'
     * qui correspond à l'objet courant
     * (même playlist_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->playlist_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE playlists_tracks WHERE playlist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->playlist_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'Playlist_trackss'
     * qui correspond à l'objet courant
     * (même playlist_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO playlists_tracks (playlist_id,position,track_id) VALUES(:playlist_id,:position,:track_id)";
            $statement = $db->prepare($query);
            $statement->bindParam(':playlist_id', $this->playlist_id);
            $statement->bindParam(':position', $this->position);
            $statement->bindParam(':track_id', $this->track_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet Playlist_tracks
     * les informations de la base
     * relative au titre dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'objet playlist_tracks dans la base
     * @return un objet Playlist_tracks rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM playlists_tracks WHERE playlist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Playlist_tracks avec les informations contenues dans le tuple
            $playlist = new Playlist_tracks();
            $playlist->playlist_id = $row['playlist_id'];
            $playlist->position = $row['position'];
            $playlist->track_id = $row['track_id'];
            
            // Retour de l'objet playlist_tracks
            return $playlist;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets playlist_tracks
     * tous les artistes contenus dans la base
     * @return un tableau d'objets playlist_tracks rempli avec les Playlist_Tracks contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM playlists_tracks";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Playlist_tracks avec les informations contenues dans le tuple courant
                $playlist = new Playlist_tracks();
                $playlist->playlist_id = $row['playlist_id'];
                $playlist->position = $row['position'];
                $playlist->track_id = $row['track_id'];
                $tab[] = $playlist;
            }

            // Retour du tableau d'objets playlist_tracks
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

}
