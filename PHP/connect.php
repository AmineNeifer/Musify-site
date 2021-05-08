<?php
function connect(){
    $base = 'musify';
    $server = 'localhost';
    $user = 'admin';
    $pass = 'hLatSM9GEtw1dOnc';
    try{
        $bdd = new PDO("mysql:host=$server;dbname=$base",
        $user ,$pass);
        $bdd->query("SET NAMES 'utf8'");
        return $bdd;
    }
    catch (PDOException $e)
        {
        die('Erreur : ' . $e->getMessage());
        }
}
?>