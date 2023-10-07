-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 mai 2022 à 09:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stock`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `pro_users`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_users` (IN `noms` VARCHAR(50), IN `username` VARCHAR(50), IN `password` VARCHAR(50), IN `role` VARCHAR(50))  BEGIN
  insert into users(noms,username,password,role) values(noms,username,password,role);  
END$$

DROP PROCEDURE IF EXISTS `saveapprovision`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `saveapprovision` (IN `produit` VARCHAR(100), IN `fournisseur` VARCHAR(100), IN `quantitedispo` FLOAT, IN `prix` FLOAT, IN `devise` VARCHAR(10), IN `dateoperation` DATE)  BEGIN
   INSERT INTO approvision(produit, fournisseur, quantite, prix, devise, dateoperation) VALUES(produit, fournisseur, quantitedispo, prix, devise, dateoperation);
   update produit set quantite=quantite+quantitedispo where designation=produit;
END$$

DROP PROCEDURE IF EXISTS `savesortie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `savesortie` (IN `client` VARCHAR(100), IN `produit` VARCHAR(100), IN `quantitedispo` FLOAT, IN `prix` FLOAT, IN `devise` VARCHAR(10), IN `dateoperation` DATE)  BEGIN
   INSERT INTO sortie(client, produit, quantite, prix, devise, dateoperation) VALUES(client, produit, quantitedispo, prix, devise, dateoperation);
   update produit set quantite=quantite-quantitedispo where designation=produit;
END$$

DROP PROCEDURE IF EXISTS `updateprovision`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateprovision` (IN `produit` VARCHAR(100), IN `fournisseur` VARCHAR(100), IN `quantite` FLOAT, IN `prix` FLOAT, IN `devise` VARCHAR(10), IN `dateoperation` DATE, IN `id` INT(11))  BEGIN
 UPDATE approvision SET produit=produit,fournisseur=fournisseur,quantite=quantite,prix=prix,devise=devise,dateoperation=dateoperation WHERE id=id;
 update produit set quantite=quantite+quantite where designation=produit;
END$$

DROP PROCEDURE IF EXISTS `updatesortie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatesortie` (IN `client` VARCHAR(100), IN `produit` VARCHAR(100), IN `quantite` FLOAT, IN `prix` FLOAT, IN `devise` VARCHAR(10), IN `dateoperation` DATE, IN `id` INT(11))  BEGIN
   UPDATE sortie SET client=client,produit=produit,quantite=quantite,prix=prix,devise=devise,dateoperation=dateoperation WHERE id=id;
 update produit set quantite=quantite-quantite where designation=produit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

DROP TABLE IF EXISTS `alerte`;
CREATE TABLE IF NOT EXISTS `alerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`id`, `quantite`) VALUES
(1, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `approvision`
--

DROP TABLE IF EXISTS `approvision`;
CREATE TABLE IF NOT EXISTS `approvision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(100) DEFAULT NULL,
  `fournisseur` varchar(100) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `dateoperation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `approvision`
--

INSERT INTO `approvision` (`id`, `produit`, `fournisseur`, `quantite`, `prix`, `devise`, `dateoperation`) VALUES
(11, 'Clavier', 'Maleya ', 200, 100, 'USD', '2022-01-24'),
(8, 'Iphone12', 'Charline', 30, 300, 'USD', '2022-01-15');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `designation`) VALUES
(1, 'Machines'),
(2, 'Cables'),
(3, 'Portable');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `sexe`, `adresse`, `telephone`, `mail`) VALUES
(1, 'ANGUANDIA JERED', 'Jered', '', 'Goma,mabanga-sud', '+243825053403', 'jered@gmail.com'),
(2, 'Jeanine', 'Emily', 'F', 'Goma /entree president', '0998374639', 'emily@gmail.com'),
(3, 'Daniel', 'Muyayalo', 'M', 'Goma', '0978243040', 'daniel@gmail.com'),
(4, 'Bonny', 'Ted', 'M', 'Goma', '098447575', 'ted@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commandeclient`
--

DROP TABLE IF EXISTS `commandeclient`;
CREATE TABLE IF NOT EXISTS `commandeclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(100) DEFAULT NULL,
  `produit` varchar(100) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `dateoperation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandeclient`
--

INSERT INTO `commandeclient` (`id`, `client`, `produit`, `quantite`, `prix`, `devise`, `dateoperation`) VALUES
(1, 'ANGUANDIA JERED', 'Ordinateur', 70, 500, 'FC', '2022-01-10'),
(2, 'Jeanine', 'Imprimante', 6, 777, 'FC', '2022-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `commandecompany`
--

DROP TABLE IF EXISTS `commandecompany`;
CREATE TABLE IF NOT EXISTS `commandecompany` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fournisseur` varchar(100) DEFAULT NULL,
  `produit` varchar(100) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `dateoperation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandecompany`
--

INSERT INTO `commandecompany` (`id`, `fournisseur`, `produit`, `quantite`, `prix`, `devise`, `dateoperation`) VALUES
(1, 'Jered', 'Ordinateur', 1000, 350, 'USD', '2022-01-10');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `fichestock`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `fichestock`;
CREATE TABLE IF NOT EXISTS `fichestock` (
`id` int(11)
,`designation` varchar(100)
,`SI` float
,`ENTREES` double
,`Date_Entree` date
,`SORTIES` float
,`Date_Sortie` date
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `fichestockfinal`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `fichestockfinal`;
CREATE TABLE IF NOT EXISTS `fichestockfinal` (
`id` int(11)
,`designation` varchar(100)
,`SI` float
,`ENTREES` double
,`Date_Entree` date
,`SORTIES` float
,`Date_Sortie` date
,`SF` double
);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `sexe`, `adresse`, `telephone`, `mail`) VALUES
(3, 'Charline', 'Ange', 'F', 'Bukavu', '0972134839', 'charline@gmail.com'),
(2, 'Jered', 'Ted', 'M', 'Goma ville', '0825053402', 'jered@gmail.com'),
(4, 'Maleya ', 'Gloria', 'F', 'Bunia', '0813958809', 'maleya@gmail.com'),
(5, 'Ted', 'Joanah', 'M', 'Goma', '0978541020', 'ted@gmail.com'),
(6, 'Julienne', 'Kathy', 'F', 'Goma/Birere', '+243817883541', 'julienne@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `postnom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `datenaiss` date DEFAULT NULL,
  `etatcivil` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `nom`, `postnom`, `prenom`, `sexe`, `datenaiss`, `etatcivil`, `adresse`, `telephone`, `mail`, `photo`) VALUES
(1, 'Charline', 'Batumike', 'Angel', 'F', '1997-10-21', 'MariÃ©', 'Goma/himbi 2', '0972134839', 'charline@gmail.com', '1610643400121.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `perteproduit`
--

DROP TABLE IF EXISTS `perteproduit`;
CREATE TABLE IF NOT EXISTS `perteproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(100) DEFAULT NULL,
  `dateperte` date DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `typegaspillage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `perteproduit`
--

INSERT INTO `perteproduit` (`id`, `produit`, `dateperte`, `quantite`, `typegaspillage`) VALUES
(1, 'Ordinateur', '2022-01-11', 100, 'incendue');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `dateoperation` date DEFAULT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cate` (`categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `designation`, `quantite`, `prix`, `devise`, `dateoperation`, `categorie`) VALUES
(1, 'Ordinateur', 200, 350, 'USD', '2022-01-09', 'Machines'),
(3, 'Imprimante', 500, 450, 'USD', '2022-01-12', 'Machines'),
(6, 'Clavier', 195, 100, 'USD', '2022-01-24', 'Machines'),
(5, 'Iphone12', 60, 300, 'USD', '2022-01-15', 'Portable'),
(7, 'Ordinateur', 50, 500, 'USD', '2022-01-28', 'Machines');

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
CREATE TABLE IF NOT EXISTS `sortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(100) DEFAULT NULL,
  `produit` varchar(100) DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `devise` varchar(10) DEFAULT NULL,
  `dateoperation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`id`, `client`, `produit`, `quantite`, `prix`, `devise`, `dateoperation`) VALUES
(5, 'ANGUANDIA JERED', 'Ordinateur', 500, 500, 'USD', '2022-01-15'),
(6, 'Daniel', 'Clavier', 10, 150, 'USD', '2022-01-24'),
(7, 'ANGUANDIA JERED', 'Ordinateur', 500, 700, 'USD', '2022-01-28');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(100) DEFAULT NULL,
  `SI` float DEFAULT NULL,
  `dateActuel` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkStock` (`produit`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `SI`, `dateActuel`) VALUES
(1, 'Ordinateur', 500, '2022-01-09'),
(2, 'Cable VGA', 100, '2022-01-10'),
(3, 'Ordinateur', 500, '2022-01-12');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `totalproduit`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `totalproduit`;
CREATE TABLE IF NOT EXISTS `totalproduit` (
`totalproduit` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `totalsortie`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `totalsortie`;
CREATE TABLE IF NOT EXISTS `totalsortie` (
`totalsortie` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `totalstock`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `totalstock`;
CREATE TABLE IF NOT EXISTS `totalstock` (
`Totalstock` double
);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noms` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `noms`, `username`, `password`, `role`) VALUES
(1, 'Bobly Ted', 'bob', '123', 'admin'),
(2, 'ANGUANDIA JERED', 'jered', '123', 'admin'),
(3, 'Jered Ted Brad', 'john', '12345', 'user'),
(4, 'Emily Jeanine', 'emily', 'emily', 'user'),
(7, 'Bob Marley', 'bob', 'bob', 'user');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vapprovision`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vapprovision`;
CREATE TABLE IF NOT EXISTS `vapprovision` (
`totalappro` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_alerte`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `view_alerte`;
CREATE TABLE IF NOT EXISTS `view_alerte` (
`Id` int(11)
,`Produit` varchar(100)
,`Quantite` float
,`Categorie` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure de la vue `fichestock`
--
DROP TABLE IF EXISTS `fichestock`;

DROP VIEW IF EXISTS `fichestock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fichestock`  AS  select `produit`.`id` AS `id`,`produit`.`designation` AS `designation`,`produit`.`quantite` AS `SI`,(`produit`.`quantite` + `approvision`.`quantite`) AS `ENTREES`,`approvision`.`dateoperation` AS `Date_Entree`,`sortie`.`quantite` AS `SORTIES`,`sortie`.`dateoperation` AS `Date_Sortie` from ((`produit` join `approvision` on((`approvision`.`produit` = `produit`.`id`))) join `sortie` on((`sortie`.`produit` = `produit`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `fichestockfinal`
--
DROP TABLE IF EXISTS `fichestockfinal`;

DROP VIEW IF EXISTS `fichestockfinal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fichestockfinal`  AS  select `fichestock`.`id` AS `id`,`fichestock`.`designation` AS `designation`,`fichestock`.`SI` AS `SI`,`fichestock`.`ENTREES` AS `ENTREES`,`fichestock`.`Date_Entree` AS `Date_Entree`,`fichestock`.`SORTIES` AS `SORTIES`,`fichestock`.`Date_Sortie` AS `Date_Sortie`,(`fichestock`.`ENTREES` - `fichestock`.`SORTIES`) AS `SF` from `fichestock` ;

-- --------------------------------------------------------

--
-- Structure de la vue `totalproduit`
--
DROP TABLE IF EXISTS `totalproduit`;

DROP VIEW IF EXISTS `totalproduit`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalproduit`  AS  select sum(`produit`.`quantite`) AS `totalproduit` from `produit` ;

-- --------------------------------------------------------

--
-- Structure de la vue `totalsortie`
--
DROP TABLE IF EXISTS `totalsortie`;

DROP VIEW IF EXISTS `totalsortie`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalsortie`  AS  select sum(`sortie`.`quantite`) AS `totalsortie` from `sortie` ;

-- --------------------------------------------------------

--
-- Structure de la vue `totalstock`
--
DROP TABLE IF EXISTS `totalstock`;

DROP VIEW IF EXISTS `totalstock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalstock`  AS  select sum(`SI`) AS `Totalstock` from `stock` ;

-- --------------------------------------------------------

--
-- Structure de la vue `vapprovision`
--
DROP TABLE IF EXISTS `vapprovision`;

DROP VIEW IF EXISTS `vapprovision`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vapprovision`  AS  select sum(`approvision`.`quantite`) AS `totalappro` from `approvision` ;

-- --------------------------------------------------------

--
-- Structure de la vue `view_alerte`
--
DROP TABLE IF EXISTS `view_alerte`;

DROP VIEW IF EXISTS `view_alerte`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alerte`  AS  select `produit`.`id` AS `Id`,`produit`.`designation` AS `Produit`,`produit`.`quantite` AS `Quantite`,`produit`.`categorie` AS `Categorie` from `produit` where (`produit`.`quantite` <= (select `alerte`.`quantite` from `alerte`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
