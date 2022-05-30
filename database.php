<?php
//on définit les différents parametre de connexion
define('HOST', 'localhost');
define('DB_NAME', 'Projet');
define('USER', 'root');
define('PASS', '');

try {
    //on se connecte à la base de donnée
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { //en cas d'échec on retourne e
    echo $e;
}
