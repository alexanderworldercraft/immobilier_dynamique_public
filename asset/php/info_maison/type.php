<?php

// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";

// Vérifier la connexion, et afficher un message d'erreur si elle échoue
if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}

// Définir la requête SQL pour sélectionner les informations sur les maisons et les photos correspondantes
$sql = "SELECT type_de_bien.nom FROM maison 
LEFT JOIN type_de_bien ON maison.id_type_de_bien = type_de_bien.id_type_de_bien
WHERE maison.id_maison = $id_maison 
GROUP BY maison.id_maison;";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

while($row = mysqli_fetch_row($result)) {
    echo $row[0];
}

// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>