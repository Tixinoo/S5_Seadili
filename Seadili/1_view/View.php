<?php

class View {
    /*
     * Objet à afficher
     */

    private $obj;

    function __construct($p) {
        $this->obj = $p;
    }

    public function defaultView() {
        include '3_content/header.html';
        include '3_content/home.html';
        include '3_content/footer.html';
    }

    public function playlistsView() {
        include '3_content/header.html';
        include '3_content/playlists.html';
        include '3_content/footer.html';
    }

    public function registerView() {
        include '3_content/header.html';
        include '3_content/register.html';
        include '3_content/footer.html';
    }

}
