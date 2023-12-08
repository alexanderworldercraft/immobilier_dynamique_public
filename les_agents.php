<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Agents</title>
    <?php include_once'./asset/php/base_import.php' ?>
</head>

<body class="background">
    <?php include_once'./asset/php/nav.php' ?>

    <main class="p-3 d-flex flex-column justify-content-center">
        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 agent">
            <?php include'./asset/php/aff_agent.php' ?>
        </section>
    </main>

    <?php include_once'./asset/php/footer.php' ?>

    <!-- Script pour mettre le lien de la page en valeur -->
    <script>
    const index = document.getElementById('agent');
    index.setAttribute('class', 'nav-link active');
    </script>
</body>

</html>