<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";

// Vérifier la connexion, et afficher un message d'erreur si elle échoue
if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}

// Récupération du nombre de lignes dans la table
$sql = "SELECT COUNT(*) AS total FROM maison";
$result = $cnx->query($sql);
$row = $result->fetch_assoc();
$total_lignes = $row['total'];

// Tirage au sort d'un numéro de ligne
$numero_ligne_aleatoire = mt_rand(1, $total_lignes);

// Récupération de l'ID de la ligne tirée au sort
$sql = "SELECT id_maison FROM maison LIMIT 1 OFFSET " . ($numero_ligne_aleatoire - 1);
$result = $cnx->query($sql);
$row = $result->fetch_assoc();
$id_aleatoire = $row['id_maison'];

// Définir la requête SQL pour sélectionner les informations sur les maisons et les photos correspondantes
$sql = "SELECT maison.ville, maison.terrain, maison.maison, REPLACE(FORMAT(maison.prix, 0, ''), ',', ' '), maison.pieces, GROUP_CONCAT(photo.lien SEPARATOR ';'), maison.resumer, maison.id_maison, pays.nom, type_de_bien.nom 
FROM maison 
LEFT JOIN photo ON maison.id_maison = photo.id_maison 
LEFT JOIN pays ON pays.id_pays = maison.id_pays 
LEFT JOIN type_de_bien ON type_de_bien.id_type_de_bien = maison.id_type_de_bien
WHERE maison.id_maison = $id_aleatoire
GROUP BY maison.id_maison";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

// Initialise $i pour incrémentation des carousels
$i = 0;

// Parcourir chaque ligne du résultat de la requête
while($row = mysqli_fetch_row($result)) {

    echo '<section class="row">';
    echo '<div class="col">';
    echo '<div class="card h-100 rounded-0 box-shadow">';
    echo '  <div class="flip">';
    echo '      <div id="carousel'.$i.'" class="front" style="padding: 0; overflow: hidden;background-image: url();background-position: center;background-size: cover;">';
    echo '          <div class="d-flex flex-column justify-content-evenly align-items-center w-100 h-100">';
    echo '              <h1 class="text-shadow text-center capital">'.$row[8].'</h1>';
    echo '              <h1 class="text-shadow text-center capital">'.$row[0].'</h1>';
    echo '          </div>';
    echo '      </div>';
    echo '      <a href="';
    include_once'./asset/php/lien_web.php';
    echo 'vente.php?id_maison=' .$row[7]. '" class="back text-center p-3 pb-0" style="overflow: auto">';
    echo '          <h2><i>';
    if ($row[8]=="japon") {
        echo "¥ " .$row[3];
    } else if ($row[8]=="suisse") {
        echo $row[3]. " CHF";
    } else if ($row[8]=="france") {
        echo $row[3]. " €";
    } else {
        echo $row[3]. " monnaie";
    }
    echo '</i></h2>';
    echo '          <p>'.$row[6].'</p>';
    echo '          <p class="mb-0">Terrain : <strong>'.$row[1].'</strong>m² | <span class="capital">'.$row[9].'</span> : <strong>'.$row[2].'</strong>m² | Pièces : <strong>'.$row[4].'</strong></p>';
    echo '      </a>';
    echo '  </div>';
    echo '</div>';
    echo '  </div>';
    echo '  </section>';

    $imageUrls[$i] = explode(';', $row[5]);
    $idMaisons[$i] = $row[7];

    // Incrémenter l'indice pour identifier de manière unique les éléments HTML dynamiques
    $i++;
}

// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>

<!-- Script carrousel -->
<script>
function applyBackgroundCarousel(element, imageUrls, idMaison) {
    var currentIndex = 0;

    function changeBackgroundImage() {
        element.style.backgroundImage = 'url(https://worldercraft-hebergement.web.app/immobilier/stockage/maison/' +
            idMaison + '/' + imageUrls[currentIndex] + '.png)';
        currentIndex = (currentIndex + 1) % imageUrls.length;
    }

    setInterval(changeBackgroundImage, 7000);
    changeBackgroundImage();
}

document.addEventListener('DOMContentLoaded', function() {
    <?php for ($j = 0; $j < $i; $j++): ?>
    applyBackgroundCarousel(document.getElementById('carousel<?php echo $j; ?>'),
        <?php echo json_encode($imageUrls[$j]); ?>, '<?php echo $idMaisons[$j]; ?>');
    <?php endfor; ?>
});
</script>