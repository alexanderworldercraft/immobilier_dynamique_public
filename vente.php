<?php
if (isset($_GET['id_maison'])) {
    $id_maison = $_GET['id_maison'];
} else {
    echo "Aucun ID de maison n'a été transmis.";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente <?php include'./asset/php/info_maison/type.php' ?>
        <?php include'./asset/php/info_maison/nombre_de_chambres.php' ?> pièces de
        <?php include'./asset/php/info_maison/metre_carre.php' ?>m²</title>
    <?php include_once'./asset/php/base_import.php' ?>
</head>

<body class="background">
    <div class="position-fixed w-100 z-3" style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, .75);">
        <?php include_once'./asset/php/nav.php' ?>
    </div>

    <header class="m-0 p-0"
        style="background-image: url();min-height: 100vh;max-height: 100vh;background-position: center;background-size: cover;transition: 750ms;box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, .75);">
    </header>

    <main class="my-5 mx-4">
        <section class="col">
            <div class="card rounded-0 mb-4" style="box-shadow: 2px 2px 15px 2px rgba(0, 0, 0, .75);">
                <div class="card-body">
                    <h4 class="card-title">À propos de <?php include'./asset/php/info_maison/prefix_type.php' ?>
                        <?php include'./asset/php/info_maison/type.php' ?> de
                        <?php include'./asset/php/info_maison/nombre_de_chambres.php' ?> pièces à
                        <?php include'./asset/php/info_maison/ville.php' ?>
                        (<?php include'./asset/php/info_maison/cp.php' ?>)</h4>
                    <h5 class="card-title text-primary">
                        <i><b><?php include'./asset/php/info_maison/prix.php' ?></b></i>
                    </h5>
                    <p class="card-title text-info"><i><?php include'./asset/php/info_maison/prix_m.php' ?></i></p>
                    <p class="card-text"><?php include"./asset/php/nom_entreprise.php" ?> -
                        <i><b><?php include'./asset/php/info_maison/agent.php' ?></b></i> vous
                        propose : Venez découvrir cette <?php include'./asset/php/info_maison/type.php' ?>
                        EXCEPTIONNELLE.
                    </p>
                    <p class="card-text"><?php include"./asset/php/info_maison/grand_description.php" ?></p>
                    <p class="card-text">Ne ratez pas cette opportunité de vivre dans un(e)
                        <?php include'./asset/php/info_maison/type.php' ?> UNIQUE, avec des équipements modernes et
                        un emplacement privilégié.</p>
                    <p class="card-text">Contactez-moi dès maintenant pour organiser une visite.</p>
                    <p class="card-text">Disponible 7j/7 - <i><b><a class="text-dark" style="text-decoration: none;"
                                    href="tel:+<?php include'./asset/php/info_maison/num_agent.php' ?>">+<?php include'./asset/php/info_maison/num_agent.php' ?></a></b></i>
                        ou <i><b><a class="text-dark" style="text-decoration: none;"
                                    href="mailto:<?php include'./asset/php/info_maison/mail_agent.php' ?>"><?php include'./asset/php/info_maison/mail_agent.php' ?></a></b></i>
                    </p>
                    <p class="card-text">Honoraires d’agence à la charge du vendeur. Les informations sur les risques
                        auxquels ce bien est
                        exposé sont disponibles sur le site Géorisques : <a href="https://www.georisques.gouv.fr"
                            target="_blank">www.georisques.gouv.fr</a>. La présente annonce
                        immobilière a été rédigée sous la responsabilité éditoriale de
                        <?php include'./asset/php/info_maison/agent.php' ?>, mandataire
                        indépendant en immobilier (sans détention de fonds), agent commercial de la
                        <?php include"./asset/php/nom_entreprise.php" ?>,
                        titulaire de la carte de démarchage immobilier pour le compte de la société
                        <?php include"./asset/php/nom_entreprise.php" ?>.
                        Retrouvez tous nos biens sur notre site internet. {lien du site}</p>
                </div>
            </div>
        </section>
        <section class="col">
            <div class="card rounded-0">
                <div class="card-body">
                    <h5 class="card-title">Besoin d'un renseignement ?</h5>

                    <form id="form" class="row was-validated" method="POST" action="./asset/php/contact/traitement_contact_maison.php">

                        <div class="col">
                            <div class="row mb-3">

                                <div class="col">

                                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" name="interet" id="floatingSelect"
                                                    aria-label="Floating label select example" required>
                                                    <option selected value="">Select</option>
                                                    <option value="plan">Plan du bien immobilier</option>
                                                    <option value="achat">Achat</option>
                                                    <option value="negociation_prix">Négociation du prix</option>
                                                    <option value="autre">Autre</option>
                                                </select>
                                                <label for="floatingSelect">intérêt du contact</label>
                                                <div class="invalid-feedback">
                                                    Obligatoire
                                                </div>
                                                <div class="valid-feedback">
                                                    Nous prenons cela en compte.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="email" name="email" class="form-control" placeholder=""
                                                    id="floatingText" required>
                                                <label for="floatingText">Email</label>
                                                <div class="invalid-feedback">
                                                    Obligatoire
                                                </div>
                                                <div class="valid-feedback">
                                                    Nous enregistrons cette information.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" name="nom" class="form-control" placeholder=""
                                                    id="nom_form">
                                                <label for="nom_form">Nom</label>
                                                <div class="valid-feedback">
                                                    Non obligatoire
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" name="prenom" class="form-control" placeholder=""
                                                    id="prenom_form">
                                                <label for="prenom_form">Prénom</label>
                                                <div class="valid-feedback">
                                                    Non obligatoire
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="commentaire" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" required></textarea>
                                    <label for="floatingTextarea2">Commentaire</label>
                                    <div class="valid-feedback">
                                        Nous prennent note 😊
                                    </div>
                                    <div class="invalid-feedback">
                                        Obligatoire
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" name="termes_et_conditions" type="checkbox" value="1" id="Check"
                                            required>
                                            <label class="form-check-label" for="Check">
                                                Accepter les termes et conditions
                                            </label>
                                            <div class="invalid-feedback">
                                                Vous devez donner votre accord avant de soumettre votre demande.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="btn-group d-flex justify-content-center" role="group"
                                            aria-label="Basic outlined example">
                                            <button type="submit" class="btn btn-outline-primary">Envoyer</button>
                                            <button type="reset" class="btn btn-outline-primary">Effacer</button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Champ caché pour stocker l'ID de la maison -->
                        <input type="hidden" name="id_maison" value="<?php echo $id_maison; ?>">
                        <!-- Champ caché pour stocker l'ID de l'agent -->
                        <input type="hidden" name="id_agent" value="<?php echo $id_agents; ?>">

                        <!-- Message de validation d'envoie des données -->
                        <p id="message_valid"></p>

                    </form>

                </div>
            </div>
        </section>
    </main>

    <?php include_once'./asset/php/footer.php' ?>

    <!-- Script pour mettre le lien de la page en valeur -->
    <script>
    const index = document.getElementById('maison');
    index.setAttribute('class', 'nav-link active');
    </script>

    <!-- Récupération des URLs -->
    <?php include'./asset/php/info_maison/photo.php'; ?>

    <!-- Script carrousel header -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var imageUrls = <?php echo json_encode($imageUrls); ?>;
        var id_maison = <?php echo json_encode($id_maison); ?>;
        var currentIndex = 0;

        function changeBackgroundImage() {
            var header = document.querySelector('header');
            header.style.backgroundImage =
                'url(https://worldercraft-hebergement.web.app/immobilier/stockage/maison/' + id_maison + '/' +
                imageUrls[currentIndex] + '.png)';
            currentIndex = (currentIndex + 1) % imageUrls.length;
        }

        // Changer l'image toutes les 5 secondes (5000 millisecondes)
        setInterval(changeBackgroundImage, 5000);

        // Appliquer la première image immédiatement
        changeBackgroundImage();
    });
    </script>
    <!-- Script pour gérer le message d'envoie des données -->
    <script>
        // Récupération des paramètres depuis l'URL
        const urlParams = new URLSearchParams(window.location.search);

        // Récupération des paramètres "message" depuis l'URL
        const message = urlParams.get('message_valid');

        // Vérification si le message est défini
        if (message) {
            // Sélection de l'élément où vous souhaitez afficher le message
            const messageElement = document.getElementById("message_valid");

            // Mise à jour du contenu de l'élément avec le message
            messageElement.innerText = decodeURIComponent(message);
        }
    </script>

</body>

</html>