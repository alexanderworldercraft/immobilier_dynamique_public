<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once'./asset/php/base_import.php' ?>
</head>

<body class="background">
    <?php include_once'./asset/php/nav.php' ?>
    <main class="p-3 d-flex justify-content-center">
        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 agent">
        <?php

//$vPHP = phpversion();
//echo $vPHP.' = version de PHP';
//echo "<br><br>";
?>
            <?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";

if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}
// Je définie la requête
$sql = "select * from agents";
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
        </section>
    </main>
    <?php include_once'./asset/php/footer.php' ?>
</body>

</html>