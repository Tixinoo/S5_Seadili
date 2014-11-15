<?php

View v = new View(NULL, NULL, NULL);
foreach ($_POST['tracks'] as $value) {
    echo $value;
}