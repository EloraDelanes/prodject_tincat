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
//Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (pseudo, email, password) VALUES(:pseudo, :email, :password)");

// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    if($_POST["pseudo"] == "" || $_POST["password"] == "" || $_POST["email"] == ""){
    echo "Veuillez renseigner tous les champs.";
    //Redirection vers la page register.php
    header("Location: ../register.php?inputNone=Veuillez renseigner tous les champs.");
    }
    else {
        $req->bindParam(":pseudo", $_POST["pseudo"]);
    }

    // Ajouter un input confirm password et vérifier si les deux sont égaux
    
    if($_POST["password"] === $_POST["confirmp"]){
        $req->bindParam(":password", $_POST["password"]);
    }
    else{
        echo "Veuillez renseigner les même mots de passe.";
    //Redirection vers la page register.php
    header("Location: ../register.php?errorPassword=Veuillez renseigner les même mots de passe.");
    }


// Ajouter un champ email
$req->bindParam(":email", $_POST["email"]);

var_dump($_POST);

if($req->execute()){
    echo "Inscription valider.";
    //Redirection vers la page register.php
    header("Location: ../register.php?errorPassword=Inscription valider.");
}

