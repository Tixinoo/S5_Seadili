<?php

include_once 'DataBase.php';

class Artist {

    // Attributs

    public function __construct() {}

    // Getter magique
    public function __get($attr_name) {}

    // Setter magique
    public function __set($attr_name, $attr_val) {}

    public function update() {}

    public function delete() {}

    public function insert() {}

    public static function findById($id) {}

    public static function findAll() {}

}
