<?php

// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";

// Conversion de monnaie
include"./asset/php/info_maison/info_monnaie.php";

// Vérifier la connexion, et afficher un message d'erreur si elle échoue
if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}


// Définir la requête SQL pour sélectionner les informations sur les maisons et les photos correspondantes
$sql = "SELECT REPLACE(FORMAT(prix, 0, ''), ',', ' ') AS prix, pays.nom AS pays_nom, prix AS prix_2 
FROM maison 
LEFT JOIN pays ON pays.id_pays = maison.id_pays 
WHERE id_maison = ".$id_maison.";";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

while($row = mysqli_fetch_assoc($result)) {
    if ($row['pays_nom']=="japon") {
        $yens_euro = $row['prix_2'] * $yens;
        $yens_euro_formate = number_format($yens_euro, 0, '', ' ');
        echo "¥ " .$row['prix']. " ≈ (" .$yens_euro_formate." €)";
    } else if ($row['pays_nom']=="suisse") {
        $chf_euro = $row['prix_2'] * $chf;
        $chf_euro_formate = number_format($chf_euro, 0, '', ' ');
        echo $row['prix']. " CHF ≈ (" .$chf_euro_formate." €)";
    } else if ($row['pays_nom']=="france") {
        echo $row['prix']." €";
    } else {
        echo $row['prix_2']. " monnaie €)";
    }
}

// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>