<?php 
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";
// Vérifier la connexion, et afficher un message d'erreur si elle échoue
if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}


// Définir la requête SQL pour sélectionner les informations sur les maisons et les photos correspondantes
$sql = "SELECT photo.lien FROM photo 
INNER JOIN maison ON photo.id_maison = maison.id_maison 
WHERE maison.id_maison = $id_maison 
GROUP BY photo.id_photo;";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

$imageUrls = array(); // Initialisation du tableau

while($row = mysqli_fetch_row($result)) {
    $imageUrls[] = $row[0]; // Ajout de $row[0] dans le tableau
}


// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>