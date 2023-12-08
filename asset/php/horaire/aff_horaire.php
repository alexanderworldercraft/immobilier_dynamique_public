<?php

// Récupèration des horiares
include './asset/php/horaire/definir_horaire.php';

// Définir la zone horaire
date_default_timezone_set('Europe/Paris'); // Ajustez selon votre zone horaire

// Obtenir le jour et l'heure actuelle
$jourActuel = date("l"); // Donne le jour de la semaine en anglais
$heureActuelle = date("H:i");

// Fonction pour vérifier si l'heure actuelle est dans une plage horaire
function estOuvert($plagesHoraires, $heureActuelle) {
    foreach ($plagesHoraires as $plage) {
        if ($heureActuelle >= $plage["ouverture"] && $heureActuelle < $plage["fermeture"]) {
            return true;
        }
    }
    return false;
}

// Vérifier si le jour est défini dans les horaires
if (array_key_exists($jourActuel, $horaires) && $horaires[$jourActuel] != null) {
    if (estOuvert($horaires[$jourActuel], $heureActuelle)) {
        echo "<span style='color:green;'>L'agence est actuellement ouverte</span>";
    } else {
        echo "<span style='color:red;'>L'agence est actuellement fermé</span>";
    }
} else {
    echo "<span style='color:red;'>L'agence est actuellement fermé</span>";
}
?>
