<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"../connexion.php";

// Vérifier la connexion, et afficher un message d'erreur si elle échoue
if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}


// Définir la requête SQL pour sélectionner les informations sur les maisons et les photos correspondantes
$sql = "SELECT id_agent, nom FROM agent;";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

while($row = mysqli_fetch_row($result)) {
    echo "<option value='".$row[0]."'>".$row[0]." -> ".$row[1]."</option>";
}

// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>