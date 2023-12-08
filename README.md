
# Site Immobilier Dynamique

## Description
Le "Site Immobilier Dynamique" est une solution web complète pour l'immobilier, conçue pour offrir une expérience utilisateur enrichissante et interactive. Ce site est développé en PHP et utilise une base de données SQL, accompagné de styles CSS soigneusement élaborés pour une esthétique moderne et professionnelle.

## Langues et Technologies
- **Front-end** : HTML, CSS (Bootstrap), JavaScript (jQuery)
- **Back-end** : PHP, SQL
- **Bibliothèques et Frameworks** : Bootstrap pour le design réactif, jQuery pour les fonctionnalités dynamiques.

## Bibliothèques JavaScript et Scripts PHP
- `lightbox-plus-jquery.min.js` : Combine jQuery avec des extensions lightbox.
- `traitement_contact_maison.php` : Traite les soumissions de formulaires.
- `aff_horaire.php`, `definir_horaire.php`, `horaire.php` : Gestion des horaires d'ouverture, avec récupération des données de la base de données et affichage sur le site.

## Gestion du Site et de la Base de Données
- Fichier à part `index.php` et `nav.php` : Interface de gestion du site avec une barre de navigation Bootstrap. Utilise des sessions PHP pour la gestion de l'état utilisateur.
- Sécurité et contrôle d'accès pour les fonctionnalités d'administration.

## Gestion des Utilisateurs et Sécurité
- Authentification et inscription avec des pages et scripts dédiés.
- Sécurité des sessions et gestion de l'accès utilisateur.
- Scripts pour interagir avec la base de données de manière sécurisée.

## Gestion des Utilisateurs et des Agents
- Fonctionnalités complètes pour la gestion des agents, y compris l'ajout, la modification, et la suppression.
- Mesures de sécurité pour protéger les données des utilisateurs et des agents.

## Styles CSS
- Styles personnalisés pour différents éléments et aspects du site, notamment :
  - `main_dominant.css` : Styles de base pour la structure et la disposition.
  - `barre_de_scroll.css` : Personnalisation des barres de défilement.
  - `card_agents.css` : Stylisation des cartes d'agents.
  - `carousel.css` : Styles pour carrousels ou éléments interactifs.
  - `lightbox.min.css` : Styles pour lightbox.
  - `palette.css` : Palette de couleurs pour une cohérence visuelle.
  - `police.css` : Importe et applique la police Roboto sur l'ensemble du site.

## Base de Données
- Script `immo.sql` pour la structure et les données initiales.

## Pages et Fonctionnalités
- `index.php` : Page d'accueil.
- `les_agents.php` : Liste des agents.
- `les_maisons.php` : Informations sur des maisons.
- `vente.php` : Détails des maisons en vente.

## Comment l'utiliser
- Configurer un serveur web avec support PHP et SQL.
- Configurer la base de données selon le script `immo.sql`.

## Licence
Sous licence Apache License 2.0.

Ce projet est disponible sous les termes de la Apache License 2.0. Veuillez consulter le fichier LICENSE ou https://www.apache.org/licenses/LICENSE-2.0 pour plus de détails.

Toute utilisation, distribution ou modification est soumise aux termes de cette licence.
