<?php

// Récupèration des horiares
include './asset/php/horaire/definir_horaire.php';

// Variable des horaires d'ouverture
echo "Lundi ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi du Lundi
echo generateOpeningMessage($horaires, "Monday");
echo "<br>";
echo "<br>";
echo "Mardi ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi du Mardi
echo generateOpeningMessage($horaires, "Tuesday");
echo "<br>";
echo "<br>";
echo "Mercredi ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi Mercredi
echo generateOpeningMessage($horaires, "Wednesday");
echo "<br>";
echo "<br>";
echo "Jeudi ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi du Jeudi
echo generateOpeningMessage($horaires, "Thursday");
echo "<br>";
echo "<br>";
echo "Vendredi ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi Vendredi
echo generateOpeningMessage($horaires, "Friday");
echo "<br>";
echo "<br>";
echo "Samedi ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi du Samedi
echo generateOpeningMessage($horaires, "Saturday");
echo "<br>";
echo "<br>";
echo "Dimanche ";
echo "<br>";
// Afficher les messages pour le matin et l'après-midi Du Dimanche
echo generateOpeningMessage($horaires, "Sunday");



// Fonction pour générer le message d'ouverture/fermeture pour un jour spécifique
function generateOpeningMessage($horaires, $jour) {
    $message = "";

    // Récupérer les horaires pour le jour spécifié
    $plagesHoraires = $horaires[$jour];

    $openTimeMorning = $plagesHoraires[0]["ouverture"];
    $closeTimeMorning = $plagesHoraires[0]["fermeture"];
    $openTimeAfternoon = $plagesHoraires[1]["ouverture"];
    $closeTimeAfternoon = $plagesHoraires[1]["fermeture"];

    if ($openTimeMorning == null && $closeTimeMorning == null && $openTimeAfternoon == null && $closeTimeAfternoon == null) {
        // Fermé toute la journée
        $message = "Fermé toute la journée";
    } else {
        // Gérer le matin
        if ($openTimeMorning == null || $closeTimeMorning == null) {
            $message .= "Fermé le matin";
        } else {
            $message .= "Ouvert le matin de " . $openTimeMorning . " à " . $closeTimeMorning;
        }

        $message .= "<br>";

        // Gérer l'après-midi
        if ($openTimeAfternoon == null || $closeTimeAfternoon == null) {
            $message .= "Fermé l'après-midi";
        } else {
            $message .= "Ouvert l'après-midi de " . $openTimeAfternoon . " à " . $closeTimeAfternoon;
        }
    }

    return $message;
}
?>