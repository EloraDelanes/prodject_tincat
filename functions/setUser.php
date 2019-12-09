<?php
// Etape 1: config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "";
// Etape 2: Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
// Etape 3: preparer une request
$prenom = "Elo";

$req = $db->prepare("INSERT INTO users (pseudo, password) VALUES(:pseudo, :password)");
$req->bindParam(":pseudo", $prenom);
$req->bindParam(":password", $prenom);
$req->execute();