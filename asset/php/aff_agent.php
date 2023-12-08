<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";

if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}
// Je définie la requête
$sql = "select id_agent, nom, prenom, telephone, email from agent";
$result = mysqli_query($cnx, $sql);
// Pour l'ensemble des lignes du jeu résultats, répète
while($row = mysqli_fetch_row($result)) {
    echo '<div class="col">';
    echo '    <div class="carte" style="background-image: url(https://worldercraft-hebergement.web.app/immobilier/stockage/agents/'.$row[0].'.png);background-size: cover;background-position: center;background-repeat: no-repeat;">';
    echo '      <div class="content">';
    echo '          <h2 class="title">'.$row[2].' '.$row[1].'</h2>';
    echo '          <a href="tel:+'.$row[3].'" class="copy">+'.$row[3].'</a>';
    echo '          <a href="mailto:'.$row[4].'" class="btn-agent">'.$row[4].'</a>';
    echo '      </div>';
    echo '    </div>';
    echo '</div>';
}
// Annule le jeu de résultats
mysqli_free_result($result);
// Ferme la connexion à la base de données
mysqli_close($cnx);
?>