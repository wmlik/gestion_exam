-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 mai 2022 à 00:34
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_examen`
--

-- --------------------------------------------------------

--
-- Structure de la table `compteuser`
--

CREATE TABLE `compteuser` (
  `idUser` int(11) NOT NULL,
  `idEtd` int(20) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `role` varchar(40) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dateCreation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compteuser`
--

INSERT INTO `compteuser` (`idUser`, `idEtd`, `login`, `email`, `password`, `role`, `status`, `dateCreation`) VALUES
(1, 13, 'wajdi mlik', 'wmlik@live.fr', 'aa', 'etudiant', 1, '2022-04-23 12:10:12'),
(3, NULL, 'khaled trabelsi', 'admin@admin.com', 'bb', 'admin', NULL, '2022-04-30 15:42:47'),
(10, 11, 'ghorbelmolka', 'molka@live.fr', 'aa', 'etudiant', NULL, '2022-05-01 18:24:14');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `idDep` int(11) NOT NULL,
  `idMat` int(11) DEFAULT NULL,
  `nomDep` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`idDep`, `idMat`, `nomDep`) VALUES
(1, 1, ' Informatique'),
(2, 2, 'mécanique');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtd` int(255) NOT NULL,
  `idDep` int(11) DEFAULT NULL,
  `idParcours` int(11) DEFAULT NULL,
  `idNiveaux` int(11) DEFAULT NULL,
  `nomEtd` varchar(255) DEFAULT NULL,
  `prenomEtd` varchar(255) DEFAULT NULL,
  `adresseMail` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `tel` int(255) DEFAULT NULL,
  `photoEtd` varchar(255) DEFAULT NULL,
  `cin` int(20) DEFAULT NULL,
  `statu` varchar(30) DEFAULT 'en cours de traitement',
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtd`, `idDep`, `idParcours`, `idNiveaux`, `nomEtd`, `prenomEtd`, `adresseMail`, `dateNaissance`, `tel`, `photoEtd`, `cin`, `statu`, `mdp`) VALUES
(11, 1, 2, 1, 'ghorbel', 'molka', 'molka@live.fr', '2004-12-04', 1, 'image5.jpg', 1, 'accepter', 'aa'),
(13, 2, 2, 2, 'mlik', 'wajdi', 'wmlik@live.fr', '1990-08-16', 23787920, 'image1.jpg', 656564565, 'accepter', 'aa'),
(14, 1, 3, 3, 'kamel', 'hamza', 'aa@d.d', '2004-12-30', 456456465, 'image1.jpg', 456456, 'en cours de traitement', 'rr'),
(15, 1, 4, 4, 'achraf ', 'jmal', 'jmal@afn.com', '2004-12-08', 464, 'image2.jpg', 4564564, 'refuser', 'bb'),
(16, 1, 3, 4, 'amira', 'karrey', 'aa@g.f', '2004-09-15', 4564456, 'image3.jpg', 2147483647, 'en cours de traitement', 'aa'),
(17, 1, 3, 1, 'slim', 'benayhya', 'aa@d.d', '2002-11-30', 486464564, 'image4.jpg', 456456456, 'en cours de traitement', 'aa'),
(18, 1, 4, 5, 'tasnim', 'fki', 'aa@d.d', '2001-02-28', 46486786, 'image5.jpg', 4567867, 'en cours de traitement', 'rr');

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `idSession` int(11) NOT NULL,
  `numExamen` int(11) NOT NULL,
  `dateExamen` datetime DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateSaisieNote` datetime DEFAULT NULL,
  `dureeExamen` decimal(8,0) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `nomexam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`idSession`, `numExamen`, `dateExamen`, `dateCreation`, `dateSaisieNote`, `dureeExamen`, `status`, `nomexam`) VALUES
(1, 1, '2022-04-06 22:08:37', '2022-04-01 22:08:37', '2022-05-04 22:08:37', '2', NULL, 'algo'),
(2, 2, '2022-05-12 22:16:42', '2022-04-01 22:16:42', '2022-05-19 22:16:42', '2', NULL, 'SGBD'),
(3, 3, '2022-05-26 23:13:25', '2022-05-02 00:13:24', '2022-05-02 00:13:24', '2', NULL, 'Architecture logicielle\r\n'),
(4, 4, '2022-06-08 23:13:25', '2022-05-02 00:13:24', '2022-05-02 00:13:24', '3', NULL, 'Atelier Environnement \r\n'),
(5, 5, '2022-06-15 23:14:52', '2022-05-02 00:14:44', '2022-05-02 00:14:44', '1', NULL, 'Atelier framework \r\n'),
(6, 6, '2022-06-14 23:14:52', '2022-05-02 00:14:44', '2022-05-02 00:14:44', '3', NULL, 'POO\r\n'),
(7, 7, '2022-04-03 23:14:52', '2022-05-02 00:14:44', '2022-05-02 00:14:44', '1', NULL, '.net\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `exammatier`
--

CREATE TABLE `exammatier` (
  `idSession` int(11) NOT NULL,
  `numExamen` int(11) NOT NULL,
  `idMat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `groupeformation`
--

CREATE TABLE `groupeformation` (
  `idgroupe` int(11) NOT NULL,
  `nomgroupe` varchar(254) DEFAULT NULL,
  `dateOuverture` datetime DEFAULT NULL,
  `dateCloture` datetime DEFAULT NULL,
  `au` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `groupeformationmatiere`
--

CREATE TABLE `groupeformationmatiere` (
  `idgroupe` int(11) NOT NULL,
  `idMat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `idMat` int(11) NOT NULL,
  `nomMat` varchar(254) DEFAULT NULL,
  `coefMat` float DEFAULT NULL,
  `nbreHeureMat` int(11) DEFAULT NULL,
  `niveau` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `idNiveaux` int(20) NOT NULL,
  `nomNiveaux` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idNiveaux`, `nomNiveaux`) VALUES
(1, 'Licence 1ère année'),
(2, 'Licence 2ème année'),
(3, 'Licence 3ème année'),
(4, 'Master 1ère année'),
(5, 'Master 2ème année');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `idParcours` int(11) NOT NULL,
  `idMat` int(11) DEFAULT NULL,
  `nomParcours` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`idParcours`, `idMat`, `nomParcours`) VALUES
(2, 2, 'Développement des Systèmes Informatiques'),
(3, 3, 'Réseaux et Systèmes Informatiques'),
(4, 4, 'mécanique'),
(5, NULL, 'electromecanique');

-- --------------------------------------------------------

--
-- Structure de la table `passerexamen`
--

CREATE TABLE `passerexamen` (
  `idgroupe` int(11) NOT NULL,
  `idEtd` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  `numExamen` int(11) NOT NULL,
  `numeroSecret` int(11) NOT NULL,
  `dateEntreSession` datetime DEFAULT NULL,
  `score` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `idSession` int(11) NOT NULL,
  `numExamen` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `enonceQuestion` varchar(254) DEFAULT NULL,
  `notebareme` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reponsequestion`
--

CREATE TABLE `reponsequestion` (
  `Que_idSession` int(11) NOT NULL,
  `Que_numExamen` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  `idgroupe` int(11) NOT NULL,
  `idEtd` int(11) NOT NULL,
  `numExamen` int(11) NOT NULL,
  `numeroSecret` int(11) NOT NULL,
  `reponseQuestion` varchar(254) DEFAULT NULL,
  `noteAttribue` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sessionexamen`
--

CREATE TABLE `sessionexamen` (
  `idSession` int(11) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `datedebutSession` datetime DEFAULT NULL,
  `datefinSession` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compteuser`
--
ALTER TABLE `compteuser`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`idDep`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtd`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idSession`,`numExamen`);

--
-- Index pour la table `exammatier`
--
ALTER TABLE `exammatier`
  ADD PRIMARY KEY (`idSession`,`numExamen`,`idMat`);

--
-- Index pour la table `groupeformation`
--
ALTER TABLE `groupeformation`
  ADD PRIMARY KEY (`idgroupe`);

--
-- Index pour la table `groupeformationmatiere`
--
ALTER TABLE `groupeformationmatiere`
  ADD PRIMARY KEY (`idgroupe`,`idMat`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`idMat`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`idNiveaux`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`idParcours`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idSession`,`numExamen`,`idQuestion`);

--
-- Index pour la table `reponsequestion`
--
ALTER TABLE `reponsequestion`
  ADD PRIMARY KEY (`Que_idSession`,`Que_numExamen`,`idSession`,`idQuestion`,`idgroupe`,`idEtd`,`numExamen`,`numeroSecret`),
  ADD KEY `FK_question_reppQuet` (`Que_idSession`,`Que_numExamen`,`idQuestion`),
  ADD KEY `FK_repQues_passexam` (`idSession`,`idgroupe`,`idEtd`,`numExamen`,`numeroSecret`);

--
-- Index pour la table `sessionexamen`
--
ALTER TABLE `sessionexamen`
  ADD PRIMARY KEY (`idSession`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compteuser`
--
ALTER TABLE `compteuser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `idDep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `idNiveaux` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `idParcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `passerexamen`
--
ALTER TABLE `passerexamen`
  ADD CONSTRAINT `FK_passExam_exam` FOREIGN KEY (`idSession`,`numExamen`) REFERENCES `examen` (`idSession`, `numExamen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
