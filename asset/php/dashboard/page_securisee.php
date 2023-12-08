<?php

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // L'utilisateur n'est pas connecté ou la session n'est pas valide
    header('Location: login.php'); // Redirection vers la page de connexion
    exit();
}
// Durée de timeout en secondes (ex: 300 secondes = 5 minutes)
$timeout_duration = 300;

// Vérifiez si $_SESSION['last_activity'] est défini
if (isset($_SESSION['last_activity'])) {
    // Calculer le temps écoulé depuis la dernière activité
    $elapsed_time = time() - $_SESSION['last_activity'];

    // Si le temps écoulé est supérieur à la durée de timeout
    if ($elapsed_time > $timeout_duration) {
        // Détruire la session et rediriger vers la page de connexion
        session_unset();
        session_destroy();
        header('Location: ./login.php');
        exit();
    }
}

// Mise à jour du timestamp de la dernière activité
$_SESSION['last_activity'] = time();

// Le reste de votre code...

// contenu sécurisé

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- script Popper2 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!-- style Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./input-style.css">
</head>

<body class="m-0 p-0 bg-black">
    <img src="https://worldercraft-hebergement.web.app/immobilier/stockage/dashboad/fond.png" alt="fond d'écran"
        id="background">

    <header>
        <?php include_once'./nav.php' ?>
    </header>

    <main class="p-3 m-0">

        <section class="mb-3 d-flex justify-content-center">
            <div id="btn-group-primary" class="btn-group box-shadow fond-blur-menu" role="group" aria-label="Basic radio toggle button group">
                <input value="content5" type="radio" class="btn-check" name="main-radio-menu" id="btnradio5"
                    autocomplete="off">
                <label class="btn btn-outline-primary text-contour" for="btnradio5"><b>Maisons</b></label>

                <input value="content6" type="radio" class="btn-check" name="main-radio-menu" id="btnradio6"
                    autocomplete="off">
                <label class="btn btn-outline-primary text-contour" for="btnradio6"><b>Agents</b></label>

                <input value="content7" type="radio" class="btn-check" name="main-radio-menu" id="btnradio7"
                    autocomplete="off">
                <label class="btn btn-outline-primary text-contour" for="btnradio7"><b>Propriétaires</b></label>

                <input value="content9" type="radio" class="btn-check" name="main-radio-menu" id="btnradio9"
                    autocomplete="off">
                <label class="btn btn-outline-primary text-contour" for="btnradio9"><b>Photos</b></label>

                <input value="content8" type="radio" class="btn-check" name="main-radio-menu" id="btnradio8"
                    autocomplete="off" checked>
                <label class="btn btn-outline-primary text-contour" for="btnradio8"><b>fermer</b></label>
            </div>
        </section>

        <section id="content5" class="card bg-info-subtle affiche mb-3 content main-radio-menu box-shadow" data-bs-toggle="tooltip"
            data-bs-html="true" data-bs-title='Voir les infos des maisons'>
            <div class="card-header fond-blur-header d-flex justify-content-between align-items-center">
                <h5 class="text-info m-0">TABLE maison</h5>
                <button type="button" class="btn btn-outline-primary" data-vue-target="#vue1">Afficher</button>
            </div>
            <div id="vue1" class="card-body vue">
                <?php include_once "./affichage_maison.php"; ?>
            </div>
        </section>

        <section id="content6" class="card bg-transparent fond-blur affiche mb-3 content main-radio-menu box-shadow">
            <div class="card-header fond-blur-header d-flex justify-content-between align-items-center">
                <h5 class="text-info text-contour m-0">GESTION des agents</h5>
            </div>
            <div class="card-body fond-blur">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="btn-group box-shadow fond-blur-menu" role="group" aria-label="Basic radio toggle button group">
                            <input value="content1" type="radio" class="btn-check" name="agent-radio-menu" id="btnradio1"
                                autocomplete="off">
                            <label class="btn btn-outline-primary text-contour" for="btnradio1"><b>Ajouter</b></label>

                            <input value="content2" type="radio" class="btn-check" name="agent-radio-menu" id="btnradio2"
                                autocomplete="off">
                            <label class="btn btn-outline-primary text-contour" for="btnradio2"><b>Modifier</b></label>

                            <input value="content3" type="radio" class="btn-check" name="agent-radio-menu" id="btnradio3"
                                autocomplete="off">
                            <label class="btn btn-outline-primary text-contour" for="btnradio3"><b>Supprimer</b></label>

                            <input value="content4" type="radio" class="btn-check" name="agent-radio-menu" id="btnradio4"
                                autocomplete="off" checked>
                            <label class="btn btn-outline-primary text-contour" for="btnradio4"><b>fermer</b></label>
                        </div>

                        <div id="content1" class="content agent-radio-menu">
                            <form action="./agent/ajout_agent.php" method="POST">
                                <fieldset>
                                    <legend class="text-contour">Ajouter un nouvel agent</legend>
                                    <p class="text-contour"><small>Photo à placer sur le serveur d'hébergement avec comme nom l'<span
                                                class="text-danger"><i><b>ID</b></i></span> de l'agent et l'extension en
                                            <span class="text-danger"><i><b>.png</b></i></span></small></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-contour box-shadow"
                                            id="nom_agent-ajout">Nom</span>
                                        <input name="nom" type="text" class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="nom_agent-ajout">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-contour box-shadow"
                                            id="prenom-agent-ajout">Prénom</span>
                                        <input name="prenom" type="text"
                                            class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="prenom-agent-ajout">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-contour box-shadow"
                                            id="phone-agent-ajout">Tél</span>
                                        <input name="phone" type="number"
                                            class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="phone-agent-ajout">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-contour box-shadow"
                                            id="email-agent-ajout">@</span>
                                        <input name="email" type="email"
                                            class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="email-agent-ajout">
                                    </div>
                                    <input class="btn btn-outline-light text-contour box-shadow" type="submit" value="Envoyer">
                                </fieldset>
                            </form>
                            <?php if(isset($_GET['success_ajout_agent']) && $_GET['success_ajout_agent'] == 'true') {
                                    echo "<script>alert('Bravo ! l\'agent à été ajouté avec succès !')</script>";
                                } 
                            ?>
                        </div>

                        <div id="content2" class="content agent-radio-menu">

                            <form action="./agent/modifier_agent.php" method="POST">
                                <fieldset>
                                    <legend class="text-contour">Modifier un agent</legend>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text bg-light border-light text-light text-contour box-shadow"
                                            for="id-agent-modifier">ID</label>
                                        <select class="form-select border-light" id="id-agent-modifier" name="id">
                                            <option disabled selected>Séléction de l'ID à modifier</option>
                                            <?php include "./agent/id_agent_form.php" ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-light text-contour box-shadow"
                                            id="nom-agent-modifier">Nom</span>
                                        <input name="nom" type="text" class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="nom-agent-modifier">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-light text-contour box-shadow"
                                            id="prenom-agent-modifier">Prénom</span>
                                        <input name="prenom" type="text"
                                            class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="prenom-agent-modifier">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-light text-contour box-shadow box-shadow"
                                            id="phone-agent-modifier">Tél</span>
                                        <input name="phone" type="number"
                                            class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="phone-agent-modifier">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-light border-light text-light text-contour box-shadow"
                                            id="email-agent-modifier">@</span>
                                        <input name="email" type="email"
                                            class="form-control bg-transparent border-light box-shadow"
                                            aria-describedby="email-agent-modifier">
                                    </div>
                                    <input class="btn btn-outline-light text-contour box-shadow" type="submit" value="Modifier" onclick="return confirmModify('id-agent-modifier');">
                                </fieldset>
                            </form>
                            <?php if(isset($_GET['success_modifier_agent']) && $_GET['success_modifier_agent'] == 'true') {
                                    echo "<script>alert('Bravo ! l\'agent à été modifier avec succès !')</script>";
                                } 
                            ?>
                        </div>

                        <div id="content3" class="content agent-radio-menu">

                            <form action="./agent/supprimer_agent.php" method="POST">
                                <fieldset>
                                    <legend class="text-contour">Supprimer un agent</legend>
                                    <p class="text-contour"><small>Merci de supprimer la photo de l'agent placer sur le serveur d'hébergement
                                            avec comme nom l'<span class="text-light"><i><b>ID</b></i></span> de
                                            l'agent.</small></p>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text bg-light border-light text-contour box-shadow"
                                            for="id-agent-modifier">ID</label>
                                        <select class="form-select border-light box-shadow" id="id-agent-supprimer" name="id">
                                            <option disabled selected>Séléction de l'ID à modifier</option>
                                            <?php include "./agent/id_agent_form.php" ?>
                                        </select>
                                    </div>
                                    <input class="btn btn-outline-light text-contour box-shadow" type="submit" value="SUPPRIMER"
                                        onclick="return confirmDelete('id-agent-supprimer');">
                                </fieldset>
                            </form>
                            <?php if(isset($_GET['success_supprimer_agent']) && $_GET['success_supprimer_agent'] == 'true') {
                                    echo "<script>alert('L\'agent à été supprimer avec succès !')</script>";
                                } 
                            ?>
                        </div>

                    </div>
                    <div class="col">
                        <?php include_once "./affichage_agent.php"; ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="content7" class="card bg-info-subtle affiche mb-3 content main-radio-menu box-shadow">
            <div class="card-header fond-blur-header d-flex justify-content-between align-items-center" data-bs-toggle="tooltip"
                data-bs-html="true" data-bs-title='Voir les infos des propriétaire des maisons'>
                <h5 class="text-info m-0">TABLE proprietaire</h5>
                <button type="button" class="btn btn-outline-primary" data-vue-target="#vue3">Afficher</button>
            </div>
            <div id="vue3" class="card-body vue">
                <?php include_once "./affichage_proprietaire.php"; ?>
            </div>
        </section>

        <section id="content9" class="card bg-info-subtle affiche mb-3 content main-radio-menu box-shadow">
            <div class="card-header fond-blur-header d-flex justify-content-between align-items-center" data-bs-toggle="tooltip"
                data-bs-html="true" data-bs-title='Voir les infos des photos des maisons'>
                <h5 class="text-info m-0">TABLE photo</h5>
                <button type="button" class="btn btn-outline-primary" data-vue-target="#vue4">Afficher</button>
            </div>
            <div id="vue4" class="card-body vue">
                <?php include_once "./affichage_photo.php"; ?>
            </div>
        </section>

    </main>

    <!-- Chargement des infos-bulle -->
    <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <!-- Script pour la gestion de l'affichage des panneaux de gestion (agent pour le moment) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Attacher un gestionnaire d'événement 'click' à tous les éléments 'input' de type 'radio'
        $('input[type="radio"]').click(function() {
            // Récupérer la valeur de l'attribut 'value' de l'input radio cliqué
            var inputValue = $(this).attr("value");

            // Récupérer le groupe auquel appartient l'input radio cliqué
            var group = $(this).attr("name");

            // Utiliser la valeur et le groupe récupérés pour identifier un élément cible (l'id correspondant)
            var targetBox = $("." + group + "#" + inputValue);

            // Cacher tous les éléments avec la classe correspondant au groupe et qui ne sont pas l'élément cible
            $("." + group).not(targetBox).hide();

            // Afficher l'élément cible
            $(targetBox).show();
        });
    });
    </script>


    <!-- Script pour la confirmation de supprimer l'agent -->
    <script>
    function confirmDelete(selectId) {
        var selectedId = document.getElementById(selectId).value;
        if (selectedId) {
            return confirm('Êtes-vous sûr de vouloir supprimer l\'agent avec l\'ID ' + selectedId +
                ' de la base de données ? Cette action est irréversible.');
        } else {
            alert('Veuillez sélectionner un ID.');
            return false;
        }
    }
    function confirmModify(selectId) {
        var selectedId = document.getElementById(selectId).value;
        if (selectedId) {
            return confirm('Êtes-vous sûr de vouloir modifier les valeur de l\'agent avec l\'ID ' + selectedId +
                ' de la base de données ? Les anciennes valeurs seront effacer.');
        } else {
            alert('Veuillez sélectionner un ID.');
            return false;
        }
    }
    </script>

    <!-- Script pour gérer le placement du groupe de boutons qui gére l'affichage des fenêtres de gestion de la BDD -->
    <script>
    const btn_group = document.querySelector('#btn-group-primary');

    window.addEventListener('resize', function() {
        if (window.innerWidth < 460) {
            btn_group.setAttribute('class', 'btn-group-vertical');
        } else {
            btn_group.setAttribute('class', 'btn-group');
        }
    });
    </script>

</body>

</html>