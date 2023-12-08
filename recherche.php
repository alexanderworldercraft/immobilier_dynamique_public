<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>

    <!-- Importation des feuille de style et script de base -->
    <?php include_once'./asset/php/base_import.php' ?>
</head>

<body class="background">
    <!-- Importation de la NavBar -->
    <?php include_once'./asset/php/nav.php' ?>

    <main class="p-3 d-flex justify-content-center">
        <section class="card">
            <form class="card-body" action="./asset/php/recherche_traitement.php" method="POST">
            <h5 class="card-title text-center">Recherche d'un bien</h5>
            <br>
                <!-- je recherche quoi ? -->
                <div class="input-group mb-3">
                    <label class="input-group-text">Pays</label>
                    <select class="form-select" name="pays">
                        <option selected>Choisir...</option>
                        <?php include_once'./asset/php/form_pays.php' ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text">Type de bien</label>
                    <select class="form-select" name="type">
                        <option selected>Choisir...</option>
                        <?php include_once'./asset/php/form_type.php' ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text">Budget mini</label>
                    <select class="form-select" name="prix_min">
                        <option selected>Choisir...</option>
                        <option value="100000">100 000€</option>
                        <option value="200000">200 000€</option>
                        <option value="700000">700 000€</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text">Budget Maxi</label>
                    <select class="form-select" name="prix_max">
                        <option selected>Choisir...</option>
                        <option value="100000">100 000€</option>
                        <option value="200000">200 000€</option>
                        <option value="800000">800 000€</option>
                    </select>
                </div>
                <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
            </form>
        </section>
    </main>

    <!-- Importation du footer -->
    <?php include_once'./asset/php/footer.php' ?>

    <!-- Script pour mettre le lien de la page en valeur -->
    <script>
    const index = document.getElementById('recherche');
    index.setAttribute('class', 'nav-link active');
    </script>
</body>

</html>