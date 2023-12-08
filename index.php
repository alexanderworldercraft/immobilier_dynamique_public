<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?php include_once'./asset/php/base_import.php' ?>
    <style>
    .flip>.front,
    .flip>.back {
        height: 500px;
    }

    .vue {
        max-height: 0;
        transition: max-height 1s ease, opacity 1s ease;
        opacity: 0;
    }

    .card-body:hover .vue {
        max-height: 708px;
        opacity: 1;
    }
    </style>
</head>

<body class="background h-100">
    <?php include_once'./asset/php/nav.php' ?>
    <main class="p-4 m-0">
        <section class="row row-cols-1 row-cols-md-2 g-4 mb-4">
            <div class="col">
                <div class="card rounded-0 box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Bienvenu chez Planète Immo !</h5>
                        <p id="texte-container" class="card-text vue">
                            Planète Immo est un site immobilier dynamique spécialisé dans la vente de maisons en France.
                            Il se distingue par son offre étendue qui inclut également des propriétés internationales,
                            notamment en Suisse et au Japon. Ce site est idéal pour ceux qui cherchent à acquérir des
                            biens immobiliers, que ce soit pour une résidence principale, secondaire, ou pour un
                            investissement à l'étranger. Avec une interface conviviale et un large éventail d'options,
                            Planète Immo s'adresse à un public varié, des acheteurs locaux aux investisseurs
                            internationaux.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card rounded-0 box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Annonce Aléatoire</h5>
                        <p class="card-text vue">
                            La fonctionnalité "Annonce Aléatoire" est une innovation captivante pour les visiteurs de
                            Planète Immo. Cette option offre une expérience utilisateur unique en présentant une
                            sélection aléatoire de biens immobiliers à chaque visite. Que ce soit une maison en France
                            ou une propriété exotique à l'étranger, cette fonctionnalité suscite la curiosité et expose
                            les utilisateurs à un éventail plus large de propriétés qu'ils n'auraient peut-être pas
                            envisagées initialement. Cette approche dynamique et surprenante rend la navigation sur le
                            site plus interactive et engageante, encourageant les utilisateurs à découvrir de nouvelles
                            opportunités immobilières à chaque clic.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once'./asset/php/index_alea.php' ?>
    </main>
    <?php include_once'./asset/php/footer.php' ?>

    <!-- Script pour mettre le lien de la page en valeur -->
    <script>
    const index = document.getElementById('index');
    index.setAttribute('class', 'nav-link active');
    </script>

</body>

</html>