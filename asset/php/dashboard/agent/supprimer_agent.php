<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"../../connexion.php";

$cnx = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if($cnx -> connect_error) {
    die("Connection failed : ".$cnx->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $query = "DELETE FROM agent WHERE id_agent=$id";

    if($cnx->query($query)=== TRUE) {
        header("Location: ../index.php?success_supprimer_agent=true");
        exit();
    }else {
        echo "Erreur : ".$query."<br>".$cnx->error;
    }
}
// Ferme la connexion à la base de données
$cnx->close();
?>