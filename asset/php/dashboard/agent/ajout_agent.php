<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"../../connexion.php";

$cnx = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if($cnx -> connect_error) {
    die("Connection failed : ".$cnx->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte des informations du formulaire    

    // Vérification des données
    if(!isset($_POST['nom']) || empty($_POST['nom'])) {
        echo "Erreur de nom";
        exit();
    }
    if(!isset($_POST['email']) || empty($_POST['email'])) {
        echo "Erreur d'email";
        exit();
    }
    if(!isset($_POST['phone']) || empty($_POST['phone'])) {
        echo "Erreur de telephone";
        exit();
    }
    if(!isset($_POST['prenom']) || empty($_POST['prenom'])) {
        echo "Erreur de prenom";
        exit();
    }

    // Echappement des données
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);

    $query = "INSERT INTO agent (nom, prenom, telephone, email) VALUES ('$nom', '$prenom', '$phone', '$email')";

    if($cnx->query($query)=== TRUE) {
        header("Location: ../index.php?success_ajout_agent=true");
        exit();
    }else {
        echo "Erreur : ".$query."<br>".$cnx->error;
    }
}
// Ferme la connexion à la base de données
$cnx->close();
?>