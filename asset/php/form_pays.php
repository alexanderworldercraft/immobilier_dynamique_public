<?php
//$cnx = mysqli_connect("sql201.infinityfree.com", "epiz_34067972", "Ypq3pGAB8X", "epiz_34067972_immobilier");

$cnx = mysqli_connect("localhost", "root", "", "immobilier");

if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}
// Je définie la requête
$sql = "select DISTINCT pays from maison";
$result = mysqli_query($cnx, $sql);
// Pour l'ensemble des lignes du jeu résultats, répète
while($row = mysqli_fetch_row($result)) {
    echo '<option value="'.$row[0].'" style="text-transform: capitalize;">'.$row[0].'</option>';
}
// Annule le jeu de résultats
mysqli_free_result($result);
// Ferme la connexion à la base de données
mysqli_close($cnx);
?>