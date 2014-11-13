<?php

include_once 'DataBase.php';

class Artist {

    /**
     * Attributs d'un artiste
     * (correspondent aux colonnes de la table 'Artist')
     */
    private $artist_id, $name, $image_url, $info;

    public function __construct() {
        
    }

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_name nom de l'attribut
     */
    public function __get($attr_name) {
        if (property_exists(__CLASS__, $attr_name)) {
            return $this->$attr_name;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_name nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_name, $attr_val) {
        if (property_exists(__CLASS__, $attr_name)) {
            $this->$attr_name = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'Artist'
     * qui correspond à l'objet courant
     * (même artist_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->artist_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();
            
            // Création de la requête préparée
            $query = "UPDATE Artist SET name = :name , image_url = :imageurl, info = :info WHERE artist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':imageurl', $this->image_url);
            $statement->bindParam(':info', $this->info);
            $statement->bindParam(':id', $this->artist_id);
            
            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    public function delete() {
        
    }

    public function insert() {
        
    }

    public static function findById($id) {
        
    }

    public static function findAll() {
        
    }

}
