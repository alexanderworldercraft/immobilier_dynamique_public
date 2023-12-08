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
    <link rel="stylesheet" href="./form-style.css">
</head>

<body class="m-0 p-0 bg-black">
    <img src="https://worldercraft-hebergement.web.app/immobilier/stockage/dashboad/fond.png" alt="fond d'écran"
        id="background">

    <header>
        <?php include_once'./nav.php' ?>
    </header>

    <main class="p-3 m-0">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="login-box">
                <h2>Se connecter</h2>
                <form action="./login/login-traitement.php" method="POST">
                    <div class="user-box">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="a">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <input type="submit" value="Se connecter">
                    </div>
                    <p id="message" style="margin-bottom: 0;margin-top: 10px;"></p>
                </form>
            </div>
        </div>
    </main>

    <!-- Script pour gérer les message de l'inscription-->
    <script>
    // Récupération des paramètres "error" et "message" depuis l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');

    // Vérification si le message est défini
    if (message) {
        // Sélection de l'élément où vous souhaitez afficher le message
        const messageElement = document.getElementById("message");

        // Mise à jour du contenu de l'élément avec le message
        messageElement.innerText = decodeURIComponent(message);
    }
    </script>

</body>

</html>