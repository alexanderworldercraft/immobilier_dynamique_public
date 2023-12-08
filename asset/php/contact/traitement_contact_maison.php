<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte des informations du formulaire    

    // Vérification des données
    if(!isset($_POST['id_maison']) || empty($_POST['id_maison'])) {
        echo "Erreur de l'id_maison";
        exit();
    }
    
    if(!isset($_POST['id_agent']) || empty($_POST['id_agent'])) {
        echo "Erreur de l'id_agent";
        exit();
    }
    
    if(!isset($_POST['commentaire']) || empty($_POST['commentaire'])) {
        echo "Le commentaire est obligatoire";
        exit();
    }
    
    if(!isset($_POST['email']) || empty($_POST['email'])) {
        echo "Le email est obligatoire";
        exit();
    }
    
    if(!isset($_POST['interet']) || empty($_POST['interet'])) {
        echo "Erreur de l'intérêt";
        exit();
    }
    
    // Echappement des données
    $id_maison_form = htmlspecialchars($_POST['id_maison']);
    $id_agent_form = htmlspecialchars($_POST['id_agent']);
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $interet = htmlspecialchars($_POST['interet']);
    $termes_et_conditions = htmlspecialchars(isset($_POST['termes_et_conditions']) ? 1 : 0);// Vérifie si le checkbox est coché

    // Clé de connexion (chemin depuis l'utilisation des maisons)
    include"../connexion.php";

    // Création de la connexion
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
  
    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }


    // Requête SQL pour insérer les données dans la table "utilisateur"
    $sql = "INSERT INTO contact_maison (id_maison_annonce, id_agent_annonce, interet, email, Nom, prenom, commentaire,termes_et_conditions) 
    VALUES ('$id_maison_form','$id_agent_form','$interet','$email','$nom','$prenom','$commentaire','$termes_et_conditions')";

    if ($conn->query($sql) === TRUE) {
        $message = "Envoie du message réussie !";
        header("Location: ../../../vente.php?id_maison=".$id_maison_form."&message_valid=" . urlencode($message)."#form");
        exit;

    } else {
        $message = "Erreur lors de l'envoie : " . $conn->error;
        header("Location: ../../../vente.php?id_maison=".$id_maison_form."&message_valid=" . urlencode($message)."#form");
        exit;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>