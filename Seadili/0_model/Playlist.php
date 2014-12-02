<?php

include_once 'DataBase.php';

class Playlist {

    /**
     * Attributs d'un titre
     * (correspondent aux colonnes de la table 'Playlist')
     */
    private $playlist_id, $playlist_name, $user_id;

    public function __construct() {}

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_playlist_name nom de l'attribut
     */
    public function __get($attr_playlist_name) {
        if (property_exists(__CLASS__, $attr_playlist_name)) {
            return $this->$attr_playlist_name;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_playlist_name nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_playlist_name, $attr_val) {
        if (property_exists(__CLASS__, $attr_playlist_name)) {
            $this->$attr_playlist_name = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'Playlist_track'
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
            $query = "UPDATE playlists SET playlist_name = :playlist_name, user_id = :user_id WHERE playlist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':playlist_name', $this->playlist_name);
            $statement->bindParam(':user_id', $this->user_id);
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
     * supprime le tuple de la table 'Playlist'
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
            $query = "DELETE playlists WHERE playlist_id = :id";
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
     * insère le tuple de la table 'Playlists'
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
            $query = "INSERT INTO playlists (playlist_name,user_id) VALUES(:playlist_name,:user_id)";
            $statement = $db->prepare($query);
            $statement->bindParam(':playlist_name', $this->playlist_name);
            $statement->bindParam(':user_id', $this->user_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            
            $this->playlist_id = $db->lastInsertId();
            
            echo "id:" . $this->playlist_id;
            
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet Playlist
     * les informations de la base
     * relative au titre dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet Playlist rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM playlists WHERE playlist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Playlist avec les informations contenues dans le tuple
            $playlist = new Playlist();
            $playlist->playlist_id = $row['playlist_id'];
            $playlist->playlist_name = $row['playlist_name'];
            $playlist->user_id = $row['user_id'];
            
            // Retour de l'artiste
            return $playlist;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
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
            $query = "SELECT * FROM playlists";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération de tous les tuples de la table Artist
            //$row = $statement->fetch(PDO::FETCH_OBJ);

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Playlist avec les informations contenues dans le tuple courant
                $playlist = new Playlist();
                $playlist->playlist_id = $row['playlist_id'];
                $playlist->playlist_name = $row['playlist_name'];
                $playlist->user_id = $row['user_id'];
                $tab[] = $playlist;
            }

            // Retour du tableau d'artiste
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

}
