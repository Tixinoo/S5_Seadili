<?php

include_once 'DataBase.php';

class Artist {

    /**
     * Attributs d'un artiste
     * (correspondent aux colonnes de la table 'Artist')
     */
    private $artist_id, $name, $image_url, $info;

    public function __construct() {}

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
            $query = "UPDATE artists SET name = :name , image_url = :imageurl, info = :info WHERE artist_id = :id";
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

    /**
     * supprime le tuple de la table 'Artist'
     * qui correspond à l'objet courant
     * (même artist_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->artist_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE artists WHERE artist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->artist_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'Artist'
     * qui correspond à l'objet courant
     * (même artist_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO artists (name,image_url,info) VALUES(:name,:imageurl,:info)";
            $statement = $db->prepare($query);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':imageurl', $this->image_url);
            $statement->bindParam(':info', $this->info);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet Artist
     * les informations de la base
     * relative à l'artiste dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet Artist rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM artists WHERE artist_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Artist avec les informations contenues dans le tuple
            $artist = new Artist();
            $artist->artist_id = $row['artist_id'];
            $artist->name = $row['name'];
            $artist->image_url = $row['image_url'];
            $artist->info = $row['info'];

            // Retour de l'artiste
            return $artist;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByName($name) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM artists WHERE name LIKE :name";
            $statement = $db->prepare($query);
            $str = "%" . $name . "%";

            $statement->bindParam(':name', $str);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération de tous les tuples de la table Artist
            //$row = $statement->fetch(PDO::FETCH_ASSOC);

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Artist avec les informations contenues dans le tuple courant
                $artist = new Artist();
                $artist->artist_id = $row['artist_id'];
                $artist->name = $row['name'];
                $artist->image_url = $row['image_url'];
                $artist->info = $row['info'];
                $tab[] = $artist;
            }

            // Retour du tableau de tracks
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByName: $trace";
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
            $query = "SELECT * FROM artists";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération de tous les tuples de la table Artist
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Artist avec les informations contenues dans le tuple courant
                $artist = new Artist();
                $artist->artist_id = $row['artist_id'];
                $artist->name = $row['name'];
                $artist->image_url = $row['image_url'];
                $artist->info = $row['info'];
                $tab[] = $artist;
            }

            // Retour du tableau d'artiste
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }
    
    public static function findRandom($number) {
	
	//comptez nombre de ligne sql d'artistes
	$db = DataBase::getConnection();
	$res = $db->query('select count(*) as nb from artists');
	$data = $res->fetch();
	$nb = $data['nb'];

	//evitez les doublons
        $artist = new Artist();
        $tab = Array();
        for ($i = 0; $i < $number; $i++) {
            $artist = Artist::findById(rand(1, $nb));
            $tab[$i] = $artist;
			for($j =0; $j<$i; $j++){
				while($tab[$i]== $tab[$j]){
					$track = Artist::findById(rand(1, $nb));
					$tab[$i] = $artist;
					$j=0;
				}
			}			
        }
        return $tab;
    }

}
