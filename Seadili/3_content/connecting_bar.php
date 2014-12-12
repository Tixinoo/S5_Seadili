<?php

session_start();

if (isset($_SESSION['username'])) {

    echo "        <div class=\"connexion\">\n";
    echo "Vous êtes connectés en tant que " . $_SESSION['username'];
    echo "<form action=\"3_content/disconnection.php\" method=\"GET\">\n";
    echo "  <input class=\"bouton\" type=\"submit\" value=\"Se déconnecter\"/>\n";
    echo "</form>\n";
    echo "        </div>\n";
    
} else {

    echo "        <div class=\"connexion\">\n";
    echo "            <div class=\"input\">\n";
    echo "                <form action=\"3_content/connection.php\" method=\"post\">\n";
    echo "                    <input class=\"champ\" type=\"text\" name=\"username\" value=\"bateau\" size=\"20\"/>\n";
    echo "                    <input class=\"champ\" type=\"password\" name=\"password\" value=\"mdp\"/>\n";
    echo "                    <input class=\"bouton\" type=\"submit\" value=\"Se connecter\"/>\n";
    echo "                </form>\n";
    echo "            </div>\n";
    echo "        </div>\n";
    
}

    