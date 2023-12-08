<footer class="py-3 tertiary main border-top" style="box-shadow: -2px -2px 15px 2px rgba(0, 0, 0, .75);"
    data-bs-theme="dark">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="./index.php" class="nav-link px-2 text-body-secondary">Accueil</a>
        </li>
        <li class="nav-item"><a href="#" class="disabled nav-link px-2 text-body-secondary">Nos services</a></li>
        <li class="nav-item"><a href="#" class="disabled nav-link px-2 text-body-secondary">Honoraires d’agence</a></li>
        <li class="nav-item"><a href="#" class="disabled nav-link px-2 text-body-secondary">Mentions légales</a></li>
        <li class="nav-item"><a href="https://www.cnil.fr/fr" target="_blank"
                class="nav-link px-2 text-body-secondary">CNIL</a></li>
        <li class="nav-item"><p href="#" id="horaire"
                class="nav-link px-2 text-body-secondary" data-bs-toggle="tooltip"
                data-bs-html="true"
                data-bs-title="<?php include './asset/php/horaire/horaire.php'; ?>"><?php include './asset/php/horaire/aff_horaire.php'; ?></p></li>
    </ul>
    <p class="text-center text-body-secondary">© 2023
        <?php include"./asset/php/nom_entreprise.php"; ?></p>
</footer>

<!-- Script Chargement tooltip -->
<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>