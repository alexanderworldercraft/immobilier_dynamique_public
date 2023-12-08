<?php

// Définition des variables de connexion à la base de données
$db_server = 'localhost';       // Serveur de la base de données
$db_user = 'root';              // Nom d'utilisateur de la base de données
$db_user_pass = '';             // Mot de passe de l'utilisateur de la base de données
$db_name = 'immobilier';        // Nom de la base de données

// Établissement de la connexion à la base de données
$con = mysqli_connect($db_server, $db_user, $db_user_pass, $db_name);

// Récupération du terme de recherche à partir de la requête POST, si disponible
$pays = $_POST['pays'];
$prix_min = $_POST['prix_min'];
$prix_max = $_POST['prix_max'];
$type = $_POST['type'];

// Exécution de la requête de recherche sur la table 'personne'
// Recherche les enregistrements où le nom ou la ville correspond au terme de recherche
// Limite les résultats à 10
if (isset($_POST['pays'])) {
    $q =  $con->query(
        "SELECT typeBien, REPLACE(FORMAT(prix, 0, ''), ',', ' ') AS format_prix, pays 
        FROM maison 
        WHERE 
            (pays LIKE '%$pays%' OR '$pays' = '') 
            AND 
            (typeBien LIKE '%$type%' OR '$type' = '') 
        ORDER BY prix ASC
        ");
    $i = 1;
    // Parcours des résultats de la requête
    while($r = mysqli_fetch_array($q)) {
        // Affichage de chaque résultat : nom et ville de la personne
        echo 'Résultat '.$i.' : '.$r['pays'].', '.$r['format_prix'].'€, '.$r['typeBien'].'<br>';
        $i++;
    }
    echo '<a href="../../recherche.php">retour</a>';
}

?>