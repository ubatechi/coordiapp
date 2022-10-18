-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 oct. 2022 à 19:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coordination`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectenseignant`
--

CREATE TABLE `affectenseignant` (
  `idaffect` int(11) NOT NULL,
  `idenseig` int(11) DEFAULT NULL,
  `idecole` int(11) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL,
  `dateaffect` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affectenseignant`
--

INSERT INTO `affectenseignant` (`idaffect`, `idenseig`, `idecole`, `idcours`, `dateaffect`) VALUES
(1, 1, 1, 1, '2022-09-22 14:08:37'),
(2, 2, 2, 3, '2022-09-22 14:09:53'),
(3, 3, 3, 3, '2022-10-07 09:45:52'),
(4, 4, 3, 2, '2022-10-07 09:50:06'),
(5, 4, 4, 3, '2022-10-07 09:52:14');

-- --------------------------------------------------------

--
-- Structure de la table `affecthoraire`
--

CREATE TABLE `affecthoraire` (
  `idhoraire` int(11) NOT NULL,
  `idclass` int(11) DEFAULT NULL,
  `idopt` int(11) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL,
  `jours` varchar(100) DEFAULT NULL,
  `heuredebut` varchar(100) DEFAULT NULL,
  `heurefin` varchar(100) DEFAULT NULL,
  `idenseig` int(11) DEFAULT NULL,
  `idsect` int(11) DEFAULT NULL,
  `idecole` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affecthoraire`
--

INSERT INTO `affecthoraire` (`idhoraire`, `idclass`, `idopt`, `idcours`, `jours`, `heuredebut`, `heurefin`, `idenseig`, `idsect`, `idecole`) VALUES
(1, 1, 1, 1, 'Lundi', '08h20', '12h30', 1, 3, 1),
(2, 2, 1, 2, 'Lundi', '08h30', '13h00', 2, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcat` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `designation`) VALUES
(1, 'Evenement'),
(2, 'ActualitÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `idclass` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `idopti` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idclass`, `designation`, `idopti`) VALUES
(1, '1ere', 1),
(2, '2Ã¨me', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idcours` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idcours`, `designation`) VALUES
(1, 'Mathematique'),
(2, 'chimie'),
(3, 'biologie'),
(4, 'comptabilitÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE `dossier` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `archive` varchar(100) DEFAULT NULL,
  `ecole` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`id`, `titre`, `archive`, `ecole`) VALUES
(1, 'Salut', 'agents.pdf', 'maman yetu');

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `idecole` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `responsable` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`idecole`, `nom`, `responsable`, `telephone`, `email`, `adresse`, `logo`) VALUES
(1, 'Mama mulezi', 'Anguandia Tsandi ', '0978451020', 'mamamulezi@gmail.com', 'Goma/office 1', 'Updev1.png'),
(2, 'Mama yetu', 'Naomi Serena', '0825053403', 'mamayetu@gmail.com', 'Goma/office 2', 'logo isig.jpg'),
(3, 'Kauta', 'vicky', '0972767814', 'kauta@gmail.com', 'ulogl', 'logo.jpg'),
(4, 'bakanja', 'stella', '0987654321', 'bak@gmail.com', 'keyshero', 'logo-coord.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `ideleve` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `postnom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `datenassance` date DEFAULT NULL,
  `lieunaiss` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `territoire` varchar(100) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `avenue` varchar(100) DEFAULT NULL,
  `quartier` varchar(100) DEFAULT NULL,
  `commune` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `tutaire` varchar(100) DEFAULT NULL,
  `professiontutaire` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`ideleve`, `nom`, `postnom`, `prenom`, `sexe`, `datenassance`, `lieunaiss`, `province`, `territoire`, `nationalite`, `avenue`, `quartier`, `commune`, `ville`, `tutaire`, `professiontutaire`, `contact`, `photo`) VALUES
(1, 'Anguandia', 'Tsandi', 'Jered', 'M', '1999-02-11', 'goma', 'nord kivu', 'rutchuru', 'congolaise', 'Industrielle', 'mabanga sud', 'karisimbi', 'Goma', 'Bobly swagger', 'Ir architecte', '0973635353', 'jered.jpg'),
(3, 'ilunga', 'kadanda', 'abel', 'M', '2010-02-10', 'Goma', 'Nord-kivu', 'Goma', 'congolaise', 'baraka', 'himbi', 'goma', 'goma', 'abk', 'agent de l\'etat', '0972767814', 'logo.jpg'),
(4, 'vicky', 'habab', 'jaak', 'F', '2017-06-07', 'jksa', 'isqk', 'ADI', 'JKAS', 'babaa', 'haha', 'jaja', 'jaja', 'dwhs', 'klas', 'is', 'logo.jpg'),
(5, 'cal', 'cal', 'cal', 'F', '2019-05-08', 'cal', 'cal', 'cal', 'cal', 'cal', 'cal', 'cal', 'cal', 'cal', 'cal', 'cal', 'logo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `idense` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `postnom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `domaine` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `etatcivile` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`idense`, `nom`, `postnom`, `prenom`, `sexe`, `adresse`, `contact`, `mail`, `domaine`, `qualification`, `etatcivile`, `photo`) VALUES
(1, 'Anguandia', 'Tsandi', 'Jeremie', 'M', 'Goma/mabanga sud', '0978451020', 'jered@gmail.com', 'informatique', 'licenciÃ©', 'Celibataire', 'jered.jpg'),
(2, 'Naomi', 'N\'saka', 'Rebecca', 'F', 'Goma/himbi 1', '0978451020', 'rebeca@gmail.com', 'developpement', 'master', 'MariÃ©', 'mi amor5.jpg'),
(3, 'abel', 'kandanda', 'abk', 'M', 'himbi', '0972767814', 'abel@gmail.com', 'informatique', 'Licencié', 'Marié', '2021-09-26 18.57.34.jpeg'),
(4, 'caleb', 'kandanda', 'serge', 'M', 'himbi', '0991708300', 'cal@gmail.com', 'medical', 'dr', 'Celibataire', 'logo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `idinfo` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`idinfo`, `titre`, `description`, `photo`, `idcat`) VALUES
(1, 'OPEN ISEG : LES GRANDS GAGNANTS !', 'Mi-mars, toute lâ€™Ã©quipe de lâ€™incubateur IONIS 361 a eu la joie de pouvoir accueillir lâ€™Ã©vÃ©nement phare de lâ€™incubateur sur le financement : Meet Your Investors.', '2021_01_21_12_40_IMG_2455.JPG', 1),
(2, 'LA PROSPECTION EN TEMPS DE CRISE, SE PRÃ‰PARER POUR REBONDIR Ã€ LA REPRISE !', 'Romain HÃ©vin, coach en business development, aide les entreprises Ã  amÃ©liorer leur processus commercial. DÃ©couvrez ses conseils pour amÃ©liorer votre impact commercial et rebondir aprÃ¨s la crise !', '1613153247868.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idins` int(11) NOT NULL,
  `ideleve` int(11) DEFAULT NULL,
  `idclass` int(11) DEFAULT NULL,
  `idopt` int(11) DEFAULT NULL,
  `idecole` int(11) DEFAULT NULL,
  `annee` varchar(100) DEFAULT NULL,
  `dateinscrit` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`idins`, `ideleve`, `idclass`, `idopt`, `idecole`, `annee`, `dateinscrit`) VALUES
(3, 3, 2, 4, 2, '2021-2022', '2022-10-04 09:36:55'),
(4, 4, 2, 2, 1, '2021-2022', '2022-10-04 15:00:34'),
(7, 5, 1, 2, 4, '2021-2022', '2022-10-07 10:06:46'),
(6, 1, 1, 2, 3, '2020', '2022-10-07 10:03:35');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `listeeleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `listeeleve` (
`code` int(11)
,`eleves` varchar(302)
,`sexe` varchar(2)
,`datenassance` date
,`lieunaiss` varchar(100)
,`province` varchar(100)
,`territoire` varchar(100)
,`nationalite` varchar(100)
,`adresse` varchar(205)
,`tutaire` varchar(100)
,`professiontutaire` varchar(100)
,`contact` varchar(20)
,`photo` varchar(100)
,`ecole` varchar(100)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `listeenseignant`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `listeenseignant` (
`code` int(11)
,`nom` varchar(100)
,`postnom` varchar(100)
,`prenom` varchar(100)
,`sexe` varchar(2)
,`adresse` varchar(100)
,`contact` varchar(100)
,`mail` varchar(100)
,`domaine` varchar(100)
,`qualification` varchar(100)
,`etatcivile` varchar(100)
,`photo` varchar(100)
,`ecole` varchar(100)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nombreeleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `nombreeleve` (
`nombreEleve` bigint(21)
,`ecole` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `idopti` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `idsection` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`idopti`, `designation`, `idsection`) VALUES
(1, 'commercial', 3),
(2, 'math-physique', 3),
(3, 'pedagogie generale', 3),
(4, 'mecanique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `idpaie` int(11) NOT NULL,
  `montant` decimal(10,0) DEFAULT NULL,
  `motif` varchar(100) DEFAULT NULL,
  `idecole` int(11) DEFAULT NULL,
  `datepaie` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`idpaie`, `montant`, `motif`, `idecole`, `datepaie`) VALUES
(4, '4000', 'h', 3, '2022-10-11 09:38:47'),
(5, '2000', 'ue', 0, '2022-10-11 09:42:59'),
(6, '80000', 'uw', 4, '2022-10-11 09:43:56');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `idpres` int(11) NOT NULL,
  `idenseig` int(11) DEFAULT NULL,
  `heurearrive` varchar(100) DEFAULT NULL,
  `heuresortie` varchar(100) DEFAULT NULL,
  `datepres` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`idpres`, `idenseig`, `heurearrive`, `heuresortie`, `datepres`) VALUES
(1, 1, '07h50', '14h30', '2022-09-22 14:17:22'),
(2, 2, '08h30', '15h00', '2022-09-22 14:17:59');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `idrapport` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `motif` text NOT NULL,
  `archive` varchar(100) NOT NULL,
  `dateexep` timestamp NULL DEFAULT current_timestamp(),
  `idecole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rapport`
--

INSERT INTO `rapport` (`idrapport`, `designation`, `motif`, `archive`, `dateexep`, `idecole`) VALUES
(4, 'rapport 5', 'explications des nouveaux frais', '', '2022-10-08 17:14:03', 4),
(8, 'g', 'k', 'Abel CV final1 - Copie.docx', '2022-10-13 09:25:26', 4),
(9, 'bb', 'nnn', 'agents.pdf', '2022-10-13 09:30:12', 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `designation`) VALUES
(1, 'ecole1'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `idsec` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`idsec`, `designation`) VALUES
(1, 'maternelle'),
(2, 'primaire'),
(3, 'secondaire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(11) NOT NULL,
  `noms` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idrole` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `noms`, `password`, `email`, `idrole`) VALUES
(1, 'Jered Ted', '12345', 'jered@gmail.com', 1),
(2, 'Abel Bin Kandanda', '123456789', 'ilungakandandaabel@gmail.com', 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vlisteleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vlisteleve` (
`nom` varchar(100)
,`EFFECTIF` bigint(21)
,`GARCON` bigint(21)
,`FILLE` bigint(22)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vpaiement`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vpaiement` (
`montant` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vsexefemin`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vsexefemin` (
`ideleve` int(11)
,`nom` varchar(100)
,`postnom` varchar(100)
,`prenom` varchar(100)
,`sexe` varchar(2)
,`datenassance` date
,`lieunaiss` varchar(100)
,`province` varchar(100)
,`territoire` varchar(100)
,`nationalite` varchar(100)
,`avenue` varchar(100)
,`quartier` varchar(100)
,`commune` varchar(100)
,`ville` varchar(100)
,`tutaire` varchar(100)
,`professiontutaire` varchar(100)
,`contact` varchar(20)
,`photo` varchar(100)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vsexemasc`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vsexemasc` (
`ideleve` int(11)
,`nom` varchar(100)
,`postnom` varchar(100)
,`prenom` varchar(100)
,`sexe` varchar(2)
,`datenassance` date
,`lieunaiss` varchar(100)
,`province` varchar(100)
,`territoire` varchar(100)
,`nationalite` varchar(100)
,`avenue` varchar(100)
,`quartier` varchar(100)
,`commune` varchar(100)
,`ville` varchar(100)
,`tutaire` varchar(100)
,`professiontutaire` varchar(100)
,`contact` varchar(20)
,`photo` varchar(100)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtotaleleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vtotaleleve` (
`totaleleve` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la vue `listeeleve`
--
DROP TABLE IF EXISTS `listeeleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listeeleve`  AS SELECT `inscription`.`idins` AS `code`, concat(`eleve`.`nom`,' ',`eleve`.`postnom`,' ',`eleve`.`prenom`) AS `eleves`, `eleve`.`sexe` AS `sexe`, `eleve`.`datenassance` AS `datenassance`, `eleve`.`lieunaiss` AS `lieunaiss`, `eleve`.`province` AS `province`, `eleve`.`territoire` AS `territoire`, `eleve`.`nationalite` AS `nationalite`, concat('C.',`eleve`.`commune`,'/V.',`eleve`.`ville`) AS `adresse`, `eleve`.`tutaire` AS `tutaire`, `eleve`.`professiontutaire` AS `professiontutaire`, `eleve`.`contact` AS `contact`, `eleve`.`photo` AS `photo`, `ecole`.`nom` AS `ecole` FROM ((`eleve` join `inscription` on(`inscription`.`ideleve` = `eleve`.`ideleve`)) join `ecole` on(`ecole`.`idecole` = `inscription`.`ideleve`)) GROUP BY `inscription`.`ideleve`, `ecole`.`nom``nom`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `listeenseignant`
--
DROP TABLE IF EXISTS `listeenseignant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listeenseignant`  AS SELECT `affectenseignant`.`idaffect` AS `code`, `enseignant`.`nom` AS `nom`, `enseignant`.`postnom` AS `postnom`, `enseignant`.`prenom` AS `prenom`, `enseignant`.`sexe` AS `sexe`, `enseignant`.`adresse` AS `adresse`, `enseignant`.`contact` AS `contact`, `enseignant`.`mail` AS `mail`, `enseignant`.`domaine` AS `domaine`, `enseignant`.`qualification` AS `qualification`, `enseignant`.`etatcivile` AS `etatcivile`, `enseignant`.`photo` AS `photo`, `ecole`.`nom` AS `ecole` FROM ((`affectenseignant` join `enseignant` on(`enseignant`.`idense` = `affectenseignant`.`idenseig`)) join `ecole` on(`ecole`.`idecole` = `affectenseignant`.`idecole`)) GROUP BY `affectenseignant`.`idecole``idecole`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `nombreeleve`
--
DROP TABLE IF EXISTS `nombreeleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nombreeleve`  AS SELECT count(0) AS `nombreEleve`, `ecole`.`nom` AS `ecole` FROM (`inscription` join `ecole` on(`ecole`.`idecole` = `inscription`.`idecole`)) GROUP BY `inscription`.`idecole``idecole`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vlisteleve`
--
DROP TABLE IF EXISTS `vlisteleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlisteleve`  AS SELECT `ecole`.`nom` AS `nom`, count(`inscription`.`ideleve`) AS `EFFECTIF`, count(`vsexemasc`.`ideleve`) AS `GARCON`, count(`inscription`.`ideleve`) - count(`vsexemasc`.`ideleve`) AS `FILLE` FROM (`ecole` left join (`inscription` left join `vsexemasc` on(`vsexemasc`.`ideleve` = `inscription`.`ideleve`)) on(`ecole`.`idecole` = `inscription`.`ideleve`)) GROUP BY `inscription`.`idecole``idecole`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vpaiement`
--
DROP TABLE IF EXISTS `vpaiement`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpaiement`  AS SELECT sum(`paiement`.`montant`) AS `montant` FROM `paiement``paiement`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vsexefemin`
--
DROP TABLE IF EXISTS `vsexefemin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsexefemin`  AS SELECT `eleve`.`ideleve` AS `ideleve`, `eleve`.`nom` AS `nom`, `eleve`.`postnom` AS `postnom`, `eleve`.`prenom` AS `prenom`, `eleve`.`sexe` AS `sexe`, `eleve`.`datenassance` AS `datenassance`, `eleve`.`lieunaiss` AS `lieunaiss`, `eleve`.`province` AS `province`, `eleve`.`territoire` AS `territoire`, `eleve`.`nationalite` AS `nationalite`, `eleve`.`avenue` AS `avenue`, `eleve`.`quartier` AS `quartier`, `eleve`.`commune` AS `commune`, `eleve`.`ville` AS `ville`, `eleve`.`tutaire` AS `tutaire`, `eleve`.`professiontutaire` AS `professiontutaire`, `eleve`.`contact` AS `contact`, `eleve`.`photo` AS `photo` FROM `eleve` WHERE `eleve`.`sexe` = 'F''F'  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vsexemasc`
--
DROP TABLE IF EXISTS `vsexemasc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsexemasc`  AS SELECT `eleve`.`ideleve` AS `ideleve`, `eleve`.`nom` AS `nom`, `eleve`.`postnom` AS `postnom`, `eleve`.`prenom` AS `prenom`, `eleve`.`sexe` AS `sexe`, `eleve`.`datenassance` AS `datenassance`, `eleve`.`lieunaiss` AS `lieunaiss`, `eleve`.`province` AS `province`, `eleve`.`territoire` AS `territoire`, `eleve`.`nationalite` AS `nationalite`, `eleve`.`avenue` AS `avenue`, `eleve`.`quartier` AS `quartier`, `eleve`.`commune` AS `commune`, `eleve`.`ville` AS `ville`, `eleve`.`tutaire` AS `tutaire`, `eleve`.`professiontutaire` AS `professiontutaire`, `eleve`.`contact` AS `contact`, `eleve`.`photo` AS `photo` FROM `eleve` WHERE `eleve`.`sexe` = 'M''M'  ;

-- --------------------------------------------------------

--
-- Structure de la vue `vtotaleleve`
--
DROP TABLE IF EXISTS `vtotaleleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtotaleleve`  AS SELECT count(0) AS `totaleleve` FROM `inscription``inscription`  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectenseignant`
--
ALTER TABLE `affectenseignant`
  ADD PRIMARY KEY (`idaffect`),
  ADD KEY `fk_cours_affect` (`idcours`),
  ADD KEY `fk_ecole_aff` (`idecole`),
  ADD KEY `fk_enseign` (`idenseig`);

--
-- Index pour la table `affecthoraire`
--
ALTER TABLE `affecthoraire`
  ADD PRIMARY KEY (`idhoraire`),
  ADD KEY `fk_horaire` (`idecole`),
  ADD KEY `fk_hor_aff` (`idcours`),
  ADD KEY `fk_class_aff` (`idclass`),
  ADD KEY `fk_enseign_aff` (`idenseig`),
  ADD KEY `fk_option_aff` (`idopt`),
  ADD KEY `fk_sect_aff` (`idsect`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idclass`),
  ADD KEY `fk_classe` (`idopti`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idcours`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`idecole`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`ideleve`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`idense`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`idinfo`),
  ADD KEY `fk_info` (`idcat`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idins`),
  ADD KEY `fk_class_insc` (`idclass`),
  ADD KEY `fk_ecole_insc` (`idecole`),
  ADD KEY `fk_eleve_insc` (`ideleve`),
  ADD KEY `fk_option_insc` (`idopt`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`idopti`),
  ADD KEY `fk_opt` (`idsection`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idpaie`),
  ADD KEY `fk_paie` (`idecole`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`idpres`),
  ADD KEY `fk_presence` (`idenseig`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`idrapport`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idsec`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_users` (`idrole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectenseignant`
--
ALTER TABLE `affectenseignant`
  MODIFY `idaffect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `affecthoraire`
--
ALTER TABLE `affecthoraire`
  MODIFY `idhoraire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `idclass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `dossier`
--
ALTER TABLE `dossier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `idecole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `ideleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `idense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `idinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `idins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `idopti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idpaie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `idpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `idrapport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `idsec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
