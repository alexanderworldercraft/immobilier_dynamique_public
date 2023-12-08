<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"./asset/php/connexion.php";

try {
    // Établir la connexion à la base de données
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDB, $passwordDB);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour obtenir les horaires
    $sql = "SELECT jour, 
               TIME_FORMAT(open_morning, '%H:%i') as open_morning, 
               TIME_FORMAT(close_morning, '%H:%i') as close_morning, 
               TIME_FORMAT(open_afternoon, '%H:%i') as open_afternoon, 
               TIME_FORMAT(close_afternoon, '%H:%i') as close_afternoon 
        FROM horaire";
    $stmt = $pdo->query($sql);

    // Initialiser le tableau des horaires
    $horaires = [];

    // Récupérer les données et remplir le tableau
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $jour = $row['jour']; // Assurez-vous que cette valeur correspond aux clés du tableau $horaires (ex: "Monday", "Tuesday", etc.)
        $horaires[$jour] = [
            ["ouverture" => $row['open_morning'], "fermeture" => $row['close_morning']],
            ["ouverture" => $row['open_afternoon'], "fermeture" => $row['close_afternoon']]
        ];
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}

// À ce stade, le tableau $horaires est rempli avec les données de la base de données
// Vous pouvez maintenant utiliser ce tableau pour vos autres logiques

// Exemple d'affichage
//foreach ($horaires as $jour => $plages) {
//    echo "Horaires pour $jour :<br>";
//    foreach ($plages as $plage) {
//        if ($plage["ouverture"] != null && $plage["fermeture"] != null) {
//            echo "Ouvert de " . $plage["ouverture"] . " à " . $plage["fermeture"] . "<br>";
//        } else {
//            echo "Fermé<br>";
//        }
//    }
//    echo "<br>";
//};

?>