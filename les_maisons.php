<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Maisons</title>
    <?php include_once'./asset/php/base_import.php' ?>
</head>

<body class="background">
    <?php include_once'./asset/php/nav.php' ?>

    <main class="p-3">
        <?php include_once'./asset/php/aff_maison.php' ?>
    </main>

    <?php include_once'./asset/php/footer.php' ?>

    <!-- Script pour mettre le lien de la page en valeur -->
    <script>
    const index = document.getElementById('maison');
    index.setAttribute('class', 'nav-link active');
    </script>

    

</body>

</html>