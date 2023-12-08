-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 déc. 2023 à 11:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` decimal(30,0) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `nom`, `prenom`, `telephone`, `email`) VALUES
(1, 'Bernard', 'Marie', 33612345678, 'marie.bernard@planeteimmo.com'),
(2, 'Moreau', 'Jean', 33723456789, 'jean.moreau@planeteimmo.com'),
(3, 'Leroy', 'Sophie', 33698765432, 'sophie.leroy@planeteimmo.com'),
(4, 'Martin', 'Pierre', 33789654321, 'pierre.martin@planeteimmo.com'),
(5, 'Watanabe', 'Sakura ', 33654321897, 'sakura.watanabe@planeteimmo.jp');

-- --------------------------------------------------------

--
-- Structure de la table `contact_maison`
--

CREATE TABLE `contact_maison` (
  `id_contact_maison` int(11) NOT NULL,
  `id_maison_annonce` int(11) NOT NULL COMMENT 'Obligatoire | récupération automatique',
  `id_agent_annonce` int(11) NOT NULL COMMENT 'Obligatoire | récupération automatique',
  `interet` varchar(50) NOT NULL COMMENT 'Obligatoire',
  `email` varchar(50) NOT NULL COMMENT 'Obligatoire',
  `nom` varchar(50) NOT NULL COMMENT 'Non obligatoire',
  `prenom` varchar(50) NOT NULL COMMENT 'Non obligatoire',
  `commentaire` varchar(2000) NOT NULL COMMENT 'Obligatoire',
  `termes_et_conditions` tinyint(1) NOT NULL COMMENT '1 = Accepte les termes et conditions\r\n| \r\n0 = N''accepte pas les termes et conditions'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact_maison`
--

INSERT INTO `contact_maison` (`id_contact_maison`, `id_maison_annonce`, `id_agent_annonce`, `interet`, `email`, `nom`, `prenom`, `commentaire`, `termes_et_conditions`) VALUES
(1, 5, 3, 'negociation_prix', 'patate@gmail.fr', 'Colonel', 'Moutarde', '-10%', 1),
(2, 5, 3, 'plan', 'patate@gmail.fr', '', '', 'azertyuiopmù', 1);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id_horaire` int(11) NOT NULL,
  `jour` varchar(50) NOT NULL,
  `open_morning` time DEFAULT NULL,
  `close_morning` time DEFAULT NULL,
  `open_afternoon` time DEFAULT NULL,
  `close_afternoon` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id_horaire`, `jour`, `open_morning`, `close_morning`, `open_afternoon`, `close_afternoon`) VALUES
(1, 'Monday', NULL, NULL, NULL, NULL),
(2, 'Tuesday', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(3, 'Wednesday', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(4, 'Thursday', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(5, 'Friday', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(6, 'Saturday', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(7, 'Sunday', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(11) NOT NULL,
  `pieces` int(11) NOT NULL,
  `resumer` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `prix` int(11) NOT NULL,
  `terrain` int(11) NOT NULL,
  `maison` int(11) NOT NULL,
  `id_type_de_bien` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `id_proprietaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `id_pays`, `adresse`, `ville`, `cp`, `pieces`, `resumer`, `description`, `prix`, `terrain`, `maison`, `id_type_de_bien`, `id_agent`, `id_proprietaire`) VALUES
(1, 1, '10 rue de la paix', 'paris', 75001, 3, 'Charmante maison parisienne avec salon élégant, chambre principale luxueuse, entourée d\'un jardin paisible.', 'Cette maison présente un style architectural parisien traditionnel et un intérieur luxueusement décoré, qui évoque l\'élégance et le raffinement.<br><br>À l\'extérieur, la façade est classique, avec des toits mansardés caractéristiques et des lucarnes. Les balcons en fer forgé, la pierre taillée de la façade et les fenêtres hautes indiquent une influence haussmannienne. Un petit jardin soigné et des arbustes bien entretenus entourent la propriété, lui donnant un aspect accueillant.<br><br>L\'intérieur est spacieux et baigné de lumière naturelle grâce aux grandes fenêtres. Le salon est un mélange harmonieux de confort moderne et de charme classique, avec des canapés moelleux, des coussins assortis et des plantes vertes qui ajoutent une touche de nature. Les murs sont ornés de moulures délicates et des œuvres d\'art qui rappellent les rues de Paris. Le mobilier est choisi avec soin, alliant esthétique et fonctionnalité, avec des matériaux comme le bois, le métal et le textile.<br><br>La chambre est un havre de paix, avec un grand lit central et une literie luxueuse. Les tables de chevet et les lampes de lecture ajoutent une touche de confort. La palette de couleurs est douce et apaisante, avec des nuances de gris, de bleu et de beige.<br><br>Chaque pièce de la maison est une célébration du style de vie parisien, offrant un mélange de tradition et de modernité.', 750000, 500, 120, 2, 1, 1),
(2, 1, '22 Avenue de l\'Opéra', 'paris', 75002, 4, 'Maison de luxe à Paris avec salon élégant, chambre principale raffinée et garage souterrain moderne.', 'Cette propriété somptueuse est un joyau architectural situé au cœur de la ville lumière, Paris. Avec une façade classique haussmannienne, elle offre un aperçu intemporel de l\'élégance française. La résidence est une union parfaite entre le patrimoine historique et le confort moderne.<br><br>Extérieur: À l\'extérieur, on trouve un bâtiment majestueux aux lignes épurées, couronné d\'un toit mansardé traditionnel et orné de fer forgé travaillé. Les balcons filants en pierre, les fenêtres élégantes et l\'entrée imposante promettent une expérience de vie raffinée.<br><br>Salon: L\'intérieur s\'ouvre sur un salon spacieux baigné de lumière, grâce à de hautes fenêtres qui offrent une vue pittoresque sur les rues parisiennes. Le parquet en chevron, les moulures délicates au plafond et la cheminée en marbre rappellent le glamour du 19e siècle, tandis que l\'ameublement contemporain apporte une touche de modernité.<br><br>Chambre: La chambre principale est une véritable retraite urbaine avec une vue imprenable sur les toits de Paris et la Tour Eiffel. Elle est meublée avec élégance, disposant d\'un grand lit confortable, d\'un lustre étincelant et d\'un mobilier luxueux qui complètent la palette de couleurs neutres et apaisantes.<br><br>Garage: Le garage est une merveille de design moderne, équipé pour accueillir une collection de véhicules haut de gamme. L\'architecture avant-gardiste avec ses lignes nettes, l\'éclairage intégré et les panneaux muraux tactiles reflètent un style de vie ultramoderne.<br><br>En résumé, cette propriété est une alliance parfaite entre le charme historique et les aménagements de luxe contemporains, une adresse prestigieuse pour ceux qui cherchent à s\'immerger dans le faste parisien.', 3000000, 600, 150, 1, 2, 2),
(3, 2, '5 Boulevard Montmartre', 'Genève', 1201, 2, 'Maison genevoise élégante sur 400 m², intérieur chic avec salon spacieux et accueillant, reflétant le charme suisse.', 'Cette élégante demeure se présente comme un joyau architectural, niché au cœur d\'un quartier résidentiel paisible et verdoyant. L\'extérieur, d\'une grâce classique, dévoile une façade soignée avec des finitions en bois et en pierre, complétée par de vastes balcons et terrasses qui promettent des moments de détente en plein air avec une vue imprenable sur la ville et les montagnes au loin.<br><br>À l\'intérieur, chaque espace est baigné de lumière naturelle grâce à de grandes fenêtres, offrant une atmosphère chaleureuse et accueillante. Le salon spacieux, avec ses canapés confortables et son design épuré, est l\'endroit idéal pour recevoir ou se détendre en famille. La salle à manger adjacente, caractérisée par une table élégante entourée de chaises modernes, est parfaite pour des dîners raffinés.<br><br>La chambre principale est un havre de paix, avec un accès direct à un balcon privé où l\'on peut savourer son café matinal tout en admirant la vue. La salle de bains attenante est un véritable sanctuaire de bien-être, équipé d\'installations haut de gamme pour une expérience de détente ultime.<br><br>Cette maison est une fusion parfaite de confort moderne et de charme traditionnel, un cadre de vie idéal pour ceux qui cherchent un style de vie sophistiqué dans un environnement paisible.', 2900000, 400, 90, 1, 3, 3),
(4, 2, '18 Rue du Faubourg Saint-Antoine', 'Zürich', 8001, 3, ' Maison moderne à Zurich : façade élégante, salon spacieux et lumineux, chambre principale luxueuse avec vue sur la ville.', 'Cette maison contemporaine se présente comme une fusion parfaite de luxe et d\'élégance moderne, conçue pour un confort et une esthétique sans pareils. Chaque pièce bénéficie de généreuses ouvertures vers l\'extérieur, offrant une luminosité naturelle exceptionnelle et une sensation d\'espace ouvert tout en préservant l\'intimité.<br><br>Le salon est un chef-d\'œuvre de design, avec son plafond haut et ses grandes baies vitrées qui encadrent la vue pittoresque sur le quartier résidentiel paisible. Le mobilier, à la fois chic et fonctionnel, est agencé pour favoriser la convivialité et le confort. La palette de couleurs neutres, rehaussée par des touches de bois naturel et des éléments métalliques noirs, crée une atmosphère chaleureuse et accueillante.<br><br>La chambre principale est un havre de paix, alliant luxe et simplicité. Le grand lit est positionné pour profiter de la vue urbaine, tandis que le linge de lit de haute qualité promet un repos confortable. L\'espace est complété par une sélection de meubles élégants qui allient fonctionnalité et esthétique moderne.<br><br>À l\'extérieur, la structure cubique de la maison se distingue par son architecture épurée et ses matériaux de haute qualité. La façade mélange le verre, le béton et le bois, offrant une belle harmonie visuelle. Les terrasses et les espaces verts sont méticuleusement aménagés pour créer des zones de détente et de divertissement en plein air, avec des jardinières qui apportent une touche de nature.<br><br>Cette propriété est véritablement un bijou architectural, alliant intimité et ouverture, tradition et modernité, dans l\'un des quartiers les plus recherchés de la ville.', 8000000, 550, 130, 1, 4, 4),
(5, 1, '1 Rue Oceane', 'Théoule-sur-Mer', 6590, 6, 'Élégance et raffinement définissent cette villa avec vue mer. Salon lumineux, chambre avec terrasse, matériaux de luxe, cuisine high-tech et jardins luxuriants. Une oasis de tranquillité.', 'Cette demeure d\'exception, baignée par la lumière méditerranéenne, offre un panorama époustouflant sur la mer. Chaque espace a été conçu pour offrir un confort maximal, avec des matériaux de haute qualité. Le salon principal, avec ses hauts plafonds, est un véritable havre de paix, ouvrant sur une vue imprenable grâce à ses grandes baies vitrées. La chambre principale, spacieuse et épurée, se prolonge sur une terrasse privée où l\'on peut savourer l\'infini bleu du ciel et de la mer.<br><br>La propriété est dotée d\'une élégance architecturale intemporelle, harmonisant des lignes contemporaines avec des touches traditionnelles. L\'intérieur est un mariage réussi de confort moderne et de luxe discret, mettant en scène des bois nobles et des textiles raffinés. La cuisine équipée avec des appareils dernier cri est un appel à la convivialité et à l\'art culinaire.<br><br>À l\'extérieur, les terrasses et les jardins en cascade créent une symphonie de verdure et de bleu. La piscine à débordement semble se jeter dans la mer, promettant des moments de détente absolue. Cette maison est une invitation à vivre en harmonie avec l\'environnement, offrant une expérience résidentielle incomparable.', 22700000, 8550, 320, 3, 3, 7),
(6, 1, '32 Rue de Rivoli', 'Bayonne', 64100, 4, 'Maison à Bayonne : élégante, avec 4 chambres, salon accueillant, garage souterrain pratique.', 'Cette élégante demeure se distingue par sa majestueuse façade où le classicisme rencontre le modernisme. Dès le premier regard, on est captivé par son harmonie architecturale, qui fusionne des éléments traditionnels avec des touches contemporaines. La maison s\'étend sur trois niveaux, offrant une vue panoramique de ses terrasses aux balustrades finement ouvragées.<br><br>L\'entrée principale, accueillante et spacieuse, s\'ouvre sur un hall d\'entrée qui annonce l\'opulence des espaces de vie. Avec des sols en bois noble et des murs habillés de moulures délicates, chaque pièce évoque une époque révolue tout en intégrant le confort moderne. Les vastes salons sont ponctués de cheminées en marbre, de grandes fenêtres qui inondent les lieux de lumière naturelle et de plafonds hauts ornés de rosaces et corniches travaillées.<br><br>La cuisine, équipée des dernières technologies, marie élégamment fonctionnalité et esthétisme, avec des plans de travail en marbre et des équipements encastrés. Elle s\'ouvre sur une salle à manger informelle idéale pour les petits-déjeuners ensoleillés.<br><br>Les chambres, des refuges de calme et de luxe, bénéficient de salles de bains attenantes, richement aménagées avec des matériaux de premier choix. Les suites parentales incluent des dressings spacieux et des balcons privatifs d\'où l\'on peut admirer les jardins soignés et la paisible banlieue environnante.<br><br>La propriété comprend également un sous-sol fonctionnel avec un garage spacieux, un espace atelier et une zone de détente qui ouvre sur un jardin intérieur, créant ainsi un havre de paix loin de l\'agitation citadine.<br><br>Cet écrin résidentiel, niché dans un quartier recherché, offre une vie de luxe et de tranquillité avec toutes les commodités modernes, faisant de cette maison un bien immobilier d\'exception.', 450000, 450, 110, 1, 1, 5),
(7, 1, '1 La Noue Margot', 'Brinon-sur-Sauldre', 18410, 5, 'Charmante demeure alliant authenticité et modernité, avec poutres et pierres apparentes, grandes pièces à vivre, cheminée, cuisine équipée, chambres cosy, jardins paysagers et garage. Un havre de paix en campagne.', 'Découvrez cette demeure d\'exception, une invitation à la sérénité, où le charme de l\'ancien se mêle avec élégance à des commodités modernes. Nichée dans un écrin de verdure, cette propriété vous offre un havre de paix en campagne, avec une vue imprenable sur les paysages environnants.<br><br>L\'entrée vous accueille dans un espace chaleureux où les poutres apparentes, les murs en pierre et le plancher de bois créent une atmosphère intemporelle. La pièce de vie principale, spacieuse et lumineuse grâce à de grandes fenêtres, est agrémentée d\'une cheminée imposante, promesse de soirées douillettes. La cuisine, véritable cœur de la maison, est entièrement équipée avec des finitions de haute qualité et un design qui ravira les amateurs de gastronomie.<br><br>La maison dispose de plusieurs chambres au confort feutré, chacune offrant une atmosphère unique, ainsi que de salles de bains modernes alliant fonctionnalité et esthétisme. L\'extérieur n\'est pas en reste avec un jardin paysager, des terrasses pour profiter des jours ensoleillés et un garage spacieux qui complète cette demeure.<br><br>Cette propriété est un véritable bijou, conjuguant avec brio l\'authenticité des matériaux nobles et le confort moderne, pour une qualité de vie incomparable.', 641000, 1429, 148, 1, 2, 6),
(8, 1, 'Domaine de chatillon, Moncay', 'Lailly-en-Val', 45740, 16, 'Château historique avec tourelles, offrant luxe et modernité, entouré de jardins à la française. Intérieurs somptueux, équipements de pointe, parfait pour une vie de prestige.', 'Découvrez cette magnifique demeure historique, un joyau architectural qui marie élégance classique et raffinement moderne. Niché au cœur d\'un domaine luxuriant, ce château imposant offre une façade en pierre de taille avec des tours coniques emblématiques et des toits en ardoise qui dessinent le ciel.<br><br>À l\'approche, une allée majestueuse bordée d\'arbres mène à une cour spacieuse, accueillant les visiteurs avec noblesse et grandeur. Les intérieurs, rénovés avec soin, respectent l\'authenticité historique tout en intégrant des équipements contemporains. Chaque pièce offre un spectacle unique, grâce aux plafonds hauts, aux boiseries d\'époque et aux cheminées monumentales. <br><br>Avec ses salons vastes et lumineux, ses nombreuses chambres et suites luxueuses, et sa cuisine professionnelle, cette propriété est un véritable havre de paix alliant confort et prestige. Les jardins à la française, méticuleusement entretenus, avec leurs fontaines et sculptures, offrent une toile de fond idyllique pour des événements inoubliables ou des moments de détente privée.', 66600000, 87900, 1325, 4, 4, 8),
(9, 3, 'Kitamori-29-2 Honmechō Higashikaya', 'Kameoka 亀岡市', 6120254, 5, 'Écrin de sérénité, cette maison japonaise traditionnelle allie architecture classique et confort moderne, avec tatamis, onsen privé et vues forestières apaisantes. Un havre de paix intemporel.', 'Nichée au cœur d\'une nature luxuriante et entourée de pins majestueux, cette résidence traditionnelle japonaise offre une fusion impeccable de l\'architecture classique et du confort moderne. L\'intérieur est un hommage à l\'esthétique zen, avec des tatamis soigneusement disposés, des shoji laissant passer la lumière naturelle et une palette de couleurs terreuses qui invite à la sérénité. Chaque pièce offre une vue imprenable sur les paysages environnants, grâce aux larges fenêtres qui brouillent la ligne entre intérieur et extérieur. La propriété inclut également un onsen privé, pour une expérience de relaxation ultime.<br><br>La maison s\'articule autour d\'un salon central où se côtoient des coussins bas et une table traditionnelle en bois, idéale pour des repas intimes ou des moments de détente. Les chambres, minimales dans leur ameublement, maximisent l\'espace et la tranquillité, tandis que la luminosité naturelle y est reine, créant un havre de paix pour le repos et la méditation.<br><br>L\'extérieur est tout aussi impressionnant, avec ses terrasses en bois et ses pierres soigneusement disposées qui guident vers un onsen extérieur, offrant une vue panoramique sur la forêt. L\'architecture de la résidence, avec son toit en pente et ses poutres apparentes, reflète l\'harmonie avec la nature, une caractéristique essentielle du design japonais.<br><br>Cette maison est une offre rare sur le marché, promettant une vie harmonieuse et paisible, parfaitement intégrée dans un environnement naturel et préservé.', 473300500, 1542, 322, 1, 5, 9);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom`) VALUES
(1, 'france'),
(2, 'suisse'),
(3, 'japon');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `lien` varchar(50) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `lien`, `id_maison`) VALUES
(1, 'a', 1),
(2, 'b', 1),
(3, 'c', 1),
(4, 'a', 2),
(5, 'b', 2),
(6, 'c', 2),
(7, 'd', 2),
(8, 'a', 3),
(9, 'b', 3),
(10, 'a', 4),
(11, 'b', 4),
(12, 'c', 4),
(13, 'a', 5),
(14, 'b', 5),
(15, 'c', 5),
(16, 'd', 5),
(17, 'a', 6),
(18, 'b', 6),
(19, 'c', 6),
(20, 'd', 6),
(21, 'a', 7),
(22, 'b', 7),
(23, 'c', 7),
(24, 'a', 8),
(25, 'b', 8),
(26, 'c', 8),
(27, 'd', 8),
(28, 'e', 8),
(29, 'f', 8),
(30, 'a', 9),
(31, 'b', 9),
(32, 'c', 9);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_proprietaire` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `nom`, `prenom`, `telephone`, `email`) VALUES
(1, 'Leroux', 'Alexandre', '33656789012', 'alexandre.leroux@email.com'),
(2, 'Moreau', 'Élise', '33667890123', 'elise.moreau@email.com'),
(3, 'Petit', 'Julien', '33645678901', 'julien.petit@email.com'),
(4, 'Robert', 'Thomas', '33634567890', 'thomas.Robert@email.com'),
(5, 'Simon', 'Lucas', '33659521897', 'lucas.Simon@email.com'),
(6, 'lefebvre', 'theo', '33744879111', 'theo.lefebvre@email.com'),
(7, 'lepetit', 'hugo', '3375642586', 'hugo.lepetit@email.com'),
(8, 'Leroie', 'Arthur', '33781648257', 'arthur.leroie@email.com'),
(9, 'Kobayashi', 'Yuto', '818099887766', 'yuto.kobayashi@email.jp');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_bien`
--

CREATE TABLE `type_de_bien` (
  `id_type_de_bien` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_de_bien`
--

INSERT INTO `type_de_bien` (`id_type_de_bien`, `nom`) VALUES
(1, 'maison'),
(2, 'appartement'),
(3, 'villa'),
(4, 'château');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `mot_de_passe`) VALUES
(1, 'alexander', '$2y$10$Y7cXpQVlti3ZAmkrdFFLAuDkvS5LtLMS0R0Ho/wT4Es2BLRg0.g5i');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`);

--
-- Index pour la table `contact_maison`
--
ALTER TABLE `contact_maison`
  ADD PRIMARY KEY (`id_contact_maison`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id_horaire`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`),
  ADD KEY `id_agents` (`id_agent`),
  ADD KEY `id_proprietaire` (`id_proprietaire`),
  ADD KEY `id_type_de_bien` (`id_type_de_bien`),
  ADD KEY `id_pays` (`id_pays`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_maison` (`id_maison`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_proprietaire`);

--
-- Index pour la table `type_de_bien`
--
ALTER TABLE `type_de_bien`
  ADD PRIMARY KEY (`id_type_de_bien`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `contact_maison`
--
ALTER TABLE `contact_maison`
  MODIFY `id_contact_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id_horaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_proprietaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `type_de_bien`
--
ALTER TABLE `type_de_bien`
  MODIFY `id_type_de_bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `id_agents_relation_maison` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pays_relation_maison` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_proprietaire_relation_maison` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_type_de_bien_relation_maison` FOREIGN KEY (`id_type_de_bien`) REFERENCES `type_de_bien` (`id_type_de_bien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `id_maison_relation_photos` FOREIGN KEY (`id_maison`) REFERENCES `maison` (`id_maison`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
