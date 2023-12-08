<nav class="navbar navbar-expand-sm bg-black border-bottom border-1 border-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Tableau de bord</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../../">retour sur le site</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                        // L'utilisateur est connecté, afficher le lien de déconnexion
                        echo '<a class="nav-link active" aria-current="page" href="./login/deconnection.php">Se Déconnecter</a>';
                    } else {
                        // L'utilisateur n'est pas connecté, afficher le lien de connexion
                        echo '<a class="nav-link active" aria-current="page" href="./login.php">Se Connecter</a>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./inscription.php">inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./page_securisee.php">Gestion BDD</a>
                </li>
            </ul>
        </div>
    </div>
</nav>