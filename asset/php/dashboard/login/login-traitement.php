<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collecte des informations du formulaire    

    // Vérification des données
    if(!isset($_POST['username']) || empty($_POST['username'])) {
        echo "Erreur de username";
        exit();
    }
    
    if(!isset($_POST['password']) || empty($_POST['password'])) {
        echo "Erreur de password";
        exit();
    }
    
    // Echappement des données
    $nom_utilisateur = htmlspecialchars($_POST['username']);
    $mot_de_passe = htmlspecialchars($_POST['password']);

    // Clé de connexion (chemin depuis l'utilisation des maisons)
    include"../../connexion.php";
    // Création de la connexion
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer une requête SQL pour sélectionner l'utilisateur
    $stmt = $conn->prepare("SELECT id_utilisateur, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = ?");
    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
            // Connexion réussie
            $id_utilisateur = $row['id_utilisateur']; // Récupération de l'ID de l'utilisateur
            session_start();
            $_SESSION['user_id'] = $id_utilisateur; // Par exemple, stocker l'ID de l'utilisateur
            $_SESSION['logged_in'] = true; // Marquer l'utilisateur comme connecté
            header("Location: ../page_securisee.php");
            exit();

        } else {
            // Échec de la connexion
            header("Location: ../login.php?Échec_de_la_connexion");
        }
    } else {
        // Utilisateur non trouvé
        $message = "Utilisateur non trouvé.";
        header("Location: ../login.php?message=" . urlencode($message));
    }
}