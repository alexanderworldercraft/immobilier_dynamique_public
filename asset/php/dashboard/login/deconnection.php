<?php

session_start();
session_unset(); // Supprimer les variables de session
session_destroy(); // Détruire la session
header('Location: ../index.php?déconnecter'); // Redirection vers la page de connexion

