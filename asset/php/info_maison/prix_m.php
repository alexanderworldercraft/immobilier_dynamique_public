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
$sql = "SELECT maison.prix, maison.maison AS maison, pays.nom AS pays
FROM maison 
LEFT JOIN pays ON pays.id_pays = maison.id_pays 
WHERE id_maison = ".$id_maison.";";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $prix_m = ($row['prix'] / $row['maison']);
    $prix_m_arrondit = round($prix_m);
    $prix_formate = number_format($prix_m_arrondit, 0, '', ' ');

    if ($row['pays']=="japon") {
        $yens_euro = $prix_m_arrondit * $yens;
        $yens_euro_formate = number_format($yens_euro, 0, '', ' ');
        echo "¥ " .$prix_formate. "/m² ≈ (" .$yens_euro_formate." €/m²)";
    } else if ($row['pays']=="suisse") {
        $chf_euro = $prix_m_arrondit * $chf;
        $chf_euro_formate = number_format($chf_euro, 0, '', ' ');
        echo $prix_formate. " CHF/m² ≈ (" .$chf_euro_formate." €/m²)";
    } else if ($row['pays']=="france") {
        echo $prix_formate."€/m²";
    } else {
        echo $prix_formate. " monnaie €/m²)";
    };
}

// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>