<?php

include_once '2_controller/SiteController.php';

$sc = new SiteController();

if (isset($_GET['a'])) {
    $sc->callAction($_GET);
}
else {
    $sc->callAction("default");
}