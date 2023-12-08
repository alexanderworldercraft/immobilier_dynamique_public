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
    
    if(!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
        echo "Erreur de confirmpassword";
        exit();
    }

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Vérification des données (vous pouvez ajouter vos propres validations)
    if ($password !== $confirmPassword) {
        $message = "Les mots de passe ne correspondent pas.";
            header("Location: ../inscription.php?message=" . urlencode($message));
            exit;
    } else {
        $password = "banane";
        $confirmPassword = "poire";
    }
    
    // Echappement des données
    $nom_utilisateur = htmlspecialchars($_POST['username']);
    $mot_de_passe_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);    

    // Clé de connexion (chemin depuis l'utilisation des maisons)
    include"../../connexion.php";
    // Création de la connexion
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Insertion dans la base de données
    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom_utilisateur, $mot_de_passe_hache);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Redirection vers la page d'origine après l'inscription réussie
        $message = "Inscription réussie !";
        header("Location: ../inscription.php?message=" . urlencode($message));
        exit();
    } else {
        // Gérer l'erreur d'inscription ici
        $message = "Erreur lors de l'incription" . $stmt->error;
        header("Location: ../inscription.php?message=" . urlencode($message));
        exit();
    }
}