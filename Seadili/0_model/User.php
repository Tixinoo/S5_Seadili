<?php

include_once 'DataBase.php';

class User {

    /**
     * Attributs d'un user
     * (correspondent aux colonnes de la table 'User')
     */
    private $user_id, $username, $password, $email;

    public function __construct($userid, $username, $password, $mail ) {
        $this->user_id = $userid;
        $this->username = $username;
        $this->password = $password;
        $this->email = $mail;
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
     * met à jour le tuple de la table 'User'
     * qui correspond à l'objet courant
     * (même user_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->user_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE users SET username = :username , password = :imageurl, email = :email WHERE user_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':username', $this->username);
            $statement->bindParam(':imageurl', $this->password);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':id', $this->user_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'User'
     * qui correspond à l'objet courant
     * (même user_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->user_id)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE users WHERE user_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->user_id);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'User'
     * qui correspond à l'objet courant
     * (même user_id)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO users (user_id,username,password,email) VALUES(:userid,:username,:imageurl,:email)";
            $statement = $db->prepare($query);
            $statement->bindParam(':userid', $this->user_id);
            $statement->bindParam(':username', $this->username);
            $statement->bindParam(':imageurl', $this->password);
            $statement->bindParam(':email', $this->email);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet User
     * les emailrmations de la base
     * relative à l'user dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet User rempli avec les emailrmations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM users WHERE user_id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet User avec les emailrmations contenues dans le tuple
            $user = new User("","","","");
            $user->user_id = $row['user_id'];
            $user->username = $row['username'];
            $user->password = $row['password'];
            $user->email = $row['email'];

            // Retour de l'user
            return $user;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByUsername($username) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM users WHERE username = :username";
            $statement = $db->prepare($query);

            $statement->bindParam(':username', $username);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet User avec les emailrmations contenues dans le tuple
            $user = new User("","","","");
            $user->user_id = $row['user_id'];
            $user->username = $row['username'];
            $user->password = $row['password'];
            $user->email = $row['email'];

            // Retour du tableau de tracks
            return $user;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByUsername: $trace";
        }
    }
    
    /**
     * retourne dans un tableau d'objets User
     * tous les users contenus dans la base
     * @return un tableau d'objets User rempli avec les users contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM users";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet User avec les emailrmations contenues dans le tuple courant
                $user = new User("","","","");
                $user->user_id = $row['user_id'];
                $user->username = $row['username'];
                $user->password = $row['password'];
                $user->email = $row['email'];
                $tab[] = $user;
            }

            // Retour du tableau d'user
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }
    
    public static function checkUsername($username) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT COUNT(*) FROM users WHERE username = :username" ;
            $statement = $db->prepare($query);

            $statement->bindParam(':username', $username);

            // Exécution de la requête préparée
            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_NUM);
            return $row[0];

        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant checkUsername: $trace";
        }
    }
    
    public static function newId() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT COUNT(*) FROM users";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $res = $statement->execute();

            $row = $statement->fetch(PDO::FETCH_NUM);
        

            // Retour du tableau d'user
            
            echo $row[0]+1;
            return $row[0]+1;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant newId: $trace";
        }
    }

}
