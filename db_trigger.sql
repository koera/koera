-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2017 at 08:37 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.36-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_trigger`
--

-- --------------------------------------------------------

--
-- Table structure for table `AUDIT_VENDEURS`
--

CREATE TABLE IF NOT EXISTS `AUDIT_VENDEURS` (
  `quand` date NOT NULL,
  `qui` varchar(20) DEFAULT NULL,
  `quoi` varchar(20) DEFAULT NULL,
  `ancien_salaire` int(11) DEFAULT NULL,
  `nouv_salaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AUDIT_VENDEURS`
--

INSERT INTO `AUDIT_VENDEURS` (`quand`, `qui`, `quoi`, `ancien_salaire`, `nouv_salaire`) VALUES
('2017-05-12', 'root@localhost', 'INSERT', NULL, 3000),
('2017-05-12', 'root@localhost', 'INSERT', NULL, 5000),
('2017-05-12', 'root@localhost', 'INSERT', NULL, 5500),
('2017-05-17', 'root@localhost', 'INSERT', NULL, 3000),
('2017-05-17', 'root@localhost', 'INSERT', NULL, 900),
('2017-05-17', 'root@localhost', 'INSERT', NULL, 900),
('2017-05-17', 'root@localhost', 'INSERT', NULL, 89990),
('2017-05-17', 'root@localhost', 'INSERT', NULL, 9000),
('2017-05-17', 'root@localhost', 'INSERT', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `RECETTES_JOUR`
--

CREATE TABLE IF NOT EXISTS `RECETTES_JOUR` (
  `rc_j_date` date NOT NULL,
  `rc_j_montant` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`rc_j_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RECETTES_JOUR`
--

INSERT INTO `RECETTES_JOUR` (`rc_j_date`, `rc_j_montant`) VALUES
('2017-05-11', 2900),
('2017-05-16', 50000),
('2017-05-26', 0),
('2017-06-05', 900),
('2017-07-04', 500),
('2017-09-20', 900),
('2018-05-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `RECETTES_MOIS`
--

CREATE TABLE IF NOT EXISTS `RECETTES_MOIS` (
  `rc_m_year` int(4) NOT NULL,
  `rc_m_mounth` int(2) NOT NULL DEFAULT '0',
  `rc_m_montant` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`rc_m_year`,`rc_m_mounth`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RECETTES_MOIS`
--

INSERT INTO `RECETTES_MOIS` (`rc_m_year`, `rc_m_mounth`, `rc_m_montant`) VALUES
(2017, 5, 53900),
(2017, 6, 900),
(2017, 7, 500),
(2017, 9, 900),
(2018, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `RECETTES_VENDEUR`
--

CREATE TABLE IF NOT EXISTS `RECETTES_VENDEUR` (
  `rc_date` date NOT NULL,
  `rc_montant` decimal(10,0) DEFAULT NULL,
  `vd_id` int(11) NOT NULL,
  PRIMARY KEY (`vd_id`,`rc_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RECETTES_VENDEUR`
--

INSERT INTO `RECETTES_VENDEUR` (`rc_date`, `rc_montant`, `vd_id`) VALUES
('2017-05-11', 2500, 1),
('2017-06-05', 900, 1),
('2017-09-20', 900, 1),
('2017-05-11', 400, 2),
('2017-07-04', 500, 2),
('2017-05-16', 50000, 9);

--
-- Triggers `RECETTES_VENDEUR`
--
DROP TRIGGER IF EXISTS `insert_recettes_vendeur`;
DELIMITER //
CREATE TRIGGER `insert_recettes_vendeur` AFTER INSERT ON `RECETTES_VENDEUR`
 FOR EACH ROW BEGIN

    DECLARE daty_insert DATE;
    DECLARE montant_journaliere NUMERIC;

    DECLARE annee INT;
    DECLARE mois INT;
    DECLARE montant_mois NUMERIC;
        
    DECLARE vendeur_id INT;
    DECLARE annee_vm INT;
    DECLARE mois_vm INT;
    DECLARE montant_mois_vendeur NUMERIC;

    SELECT rc_j_date INTO daty_insert FROM RECETTES_JOUR WHERE rc_j_date = NEW.rc_date;

    SELECT rc_m_year INTO annee FROM RECETTES_MOIS WHERE rc_m_year = YEAR(NEW.rc_date) AND rc_m_mounth = MONTH(NEW.rc_date);
    SELECT rc_m_mounth INTO mois FROM RECETTES_MOIS WHERE rc_m_year = YEAR(NEW.rc_date) AND rc_m_mounth = MONTH(NEW.rc_date);

    SELECT vd_id INTO vendeur_id FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date) AND vd_id = NEW.vd_id;
    SELECT rc_vm_year INTO annee_vm FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date) AND vd_id = NEW.vd_id;
    SELECT rc_vm_mounth INTO mois_vm FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date) AND vd_id = NEW.vd_id;
    
    IF daty_insert IS NOT NULL THEN
        SELECT SUM(rc_j_montant) INTO montant_journaliere FROM RECETTES_JOUR WHERE rc_j_date = daty_insert;
        UPDATE RECETTES_JOUR SET rc_j_montant = montant_journaliere + NEW.rc_montant WHERE rc_j_date = daty_insert;
    ELSE
        INSERT INTO RECETTES_JOUR VALUES(NEW.rc_date,NEW.rc_montant);
    END IF;

    IF annee AND mois IS NOT NULL THEN
        SELECT SUM(rc_m_montant) INTO montant_mois FROM RECETTES_MOIS WHERE rc_m_year = annee AND rc_m_mounth = mois;
        UPDATE RECETTES_MOIS SET rc_m_montant = montant_mois + NEW.rc_montant WHERE rc_m_year = annee AND rc_m_mounth = mois;
    ELSE
        INSERT INTO RECETTES_MOIS VALUES(YEAR(NEW.rc_date),MONTH(NEW.rc_date),NEW.rc_montant);
    END IF;

    IF annee_vm AND mois_vm AND vendeur_id IS NOT NULL THEN
        SELECT SUM(rc_vm_montant) INTO montant_mois_vendeur FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = annee_vm AND rc_vm_mounth = mois_vm AND vd_id = vendeur_id;
        UPDATE RECETTES_VENDEUR_MOIS SET rc_vm_montant = montant_mois_vendeur + NEW.rc_montant WHERE rc_vm_year = annee_vm AND rc_vm_mounth = mois_vm AND vd_id = vendeur_id;
    ELSE
        INSERT INTO RECETTES_VENDEUR_MOIS VALUES(YEAR(NEW.rc_date),MONTH(NEW.rc_date),NEW.rc_montant,NEW.vd_id);
    END IF;

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `update_recettes_vendeur`;
DELIMITER //
CREATE TRIGGER `update_recettes_vendeur` AFTER UPDATE ON `RECETTES_VENDEUR`
 FOR EACH ROW BEGIN
    
    DECLARE daty_update DATE;
    DECLARE montant_journaliere NUMERIC;
    
    DECLARE montant_mensuel NUMERIC;
    DECLARE annee INT;
    DECLARE mois INT;

    DECLARE vendeur_id INT;
    DECLARE annee_vm INT;
    DECLARE mois_vm INT;
    DECLARE montant_mois_vendeur NUMERIC;
    
    SELECT rc_j_date INTO daty_update FROM RECETTES_JOUR WHERE rc_j_date=NEW.rc_date;
    SELECT SUM(rc_j_montant) INTO montant_journaliere FROM RECETTES_JOUR WHERE rc_j_date=NEW.rc_date;

    SELECT rc_m_year INTO annee FROM RECETTES_MOIS WHERE rc_m_year = YEAR(NEW.rc_date) AND rc_m_mounth = MONTH(NEW.rc_date);
    SELECT rc_m_mounth INTO mois FROM RECETTES_MOIS WHERE rc_m_year = YEAR(NEW.rc_date) AND rc_m_mounth = MONTH(NEW.rc_date);
    SELECT SUM(rc_m_montant) INTO montant_mensuel FROM RECETTES_MOIS WHERE rc_m_year = YEAR(NEW.rc_date) AND rc_m_mounth = MONTH(NEW.rc_date);

    SELECT vd_id INTO vendeur_id FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date) AND vd_id = NEW.vd_id;
    SELECT rc_vm_year INTO annee_vm FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date) AND vd_id = NEW.vd_id;
    SELECT rc_vm_mounth INTO mois_vm FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date) AND vd_id = NEW.vd_id;
    SELECT SUM(rc_vm_montant) INTO montant_mois_vendeur FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = annee_vm AND rc_vm_mounth = mois_vm AND vd_id = vendeur_id;

    IF daty_update=NEW.rc_date THEN
        UPDATE RECETTES_JOUR SET rc_j_montant=montant_journaliere+(NEW.rc_montant-OLD.rc_montant) WHERE rc_j_date=daty_update;
    END IF;

    IF annee=YEAR(NEW.rc_date) AND mois=MONTH(NEW.rc_date) THEN
        UPDATE RECETTES_MOIS SET rc_m_montant=montant_mensuel+(NEW.rc_montant-OLD.rc_montant) WHERE rc_m_year = YEAR(NEW.rc_date) AND rc_m_mounth = MONTH(NEW.rc_date);
    END IF;
        
    IF annee_vm=YEAR(NEW.rc_date) AND mois_vm=MONTH(NEW.rc_date) AND vendeur_id=NEW.vd_id THEN
        UPDATE RECETTES_VENDEUR_MOIS SET rc_vm_montant=montant_mensuel+(NEW.rc_montant-OLD.rc_montant) WHERE rc_vm_year = YEAR(NEW.rc_date) AND rc_vm_mounth = MONTH(NEW.rc_date);
    END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_recettes_vendeur`;
DELIMITER //
CREATE TRIGGER `delete_recettes_vendeur` AFTER DELETE ON `RECETTES_VENDEUR`
 FOR EACH ROW BEGIN
    DECLARE daty_update DATE;
    DECLARE montant_journaliere NUMERIC;
    
    DECLARE montant_mensuel NUMERIC;
    DECLARE annee INT;
    DECLARE mois INT;

    DECLARE vendeur_id INT;
    DECLARE annee_vm INT;
    DECLARE mois_vm INT;
    DECLARE montant_mois_vendeur NUMERIC;
    
    SELECT rc_j_date INTO daty_update FROM RECETTES_JOUR WHERE rc_j_date=OLD.rc_date;
    SELECT SUM(rc_j_montant) INTO montant_journaliere FROM RECETTES_JOUR WHERE rc_j_date=OLD.rc_date;

    SELECT rc_m_year INTO annee FROM RECETTES_MOIS WHERE rc_m_year = YEAR(OLD.rc_date) AND rc_m_mounth = MONTH(OLD.rc_date);
    SELECT rc_m_mounth INTO mois FROM RECETTES_MOIS WHERE rc_m_year = YEAR(OLD.rc_date) AND rc_m_mounth = MONTH(OLD.rc_date);
    SELECT SUM(rc_m_montant) INTO montant_mensuel FROM RECETTES_MOIS WHERE rc_m_year = YEAR(OLD.rc_date) AND rc_m_mounth = MONTH(OLD.rc_date);

    SELECT vd_id INTO vendeur_id FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(OLD.rc_date) AND rc_vm_mounth = MONTH(OLD.rc_date) AND vd_id = OLD.vd_id;
    SELECT rc_vm_year INTO annee_vm FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(OLD.rc_date) AND rc_vm_mounth = MONTH(OLD.rc_date) AND vd_id = OLD.vd_id;
    SELECT rc_vm_mounth INTO mois_vm FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = YEAR(OLD.rc_date) AND rc_vm_mounth = MONTH(OLD.rc_date) AND vd_id = OLD.vd_id;
    SELECT SUM(rc_vm_montant) INTO montant_mois_vendeur FROM RECETTES_VENDEUR_MOIS WHERE rc_vm_year = annee_vm AND rc_vm_mounth = mois_vm AND vd_id = vendeur_id;

    IF daty_update=OLD.rc_date THEN
        UPDATE RECETTES_JOUR SET rc_j_montant=montant_journaliere-OLD.rc_montant WHERE rc_j_date=daty_update;
    END IF;

    IF annee=YEAR(OLD.rc_date) AND mois=MONTH(OLD.rc_date) THEN
        UPDATE RECETTES_MOIS SET rc_m_montant=montant_mensuel-OLD.rc_montant WHERE rc_m_year = YEAR(OLD.rc_date) AND rc_m_mounth = MONTH(OLD.rc_date);
    END IF;
        
    IF annee_vm=YEAR(OLD.rc_date) AND mois_vm=MONTH(OLD.rc_date) AND vendeur_id=OLD.vd_id THEN
        UPDATE RECETTES_VENDEUR_MOIS SET rc_vm_montant=montant_mensuel-OLD.rc_montant WHERE rc_vm_year = YEAR(OLD.rc_date) AND rc_vm_mounth = MONTH(OLD.rc_date);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `RECETTES_VENDEUR_MOIS`
--

CREATE TABLE IF NOT EXISTS `RECETTES_VENDEUR_MOIS` (
  `rc_vm_year` int(4) NOT NULL,
  `rc_vm_mounth` int(2) NOT NULL DEFAULT '0',
  `rc_vm_montant` decimal(10,0) DEFAULT NULL,
  `vd_id` int(11) NOT NULL,
  PRIMARY KEY (`rc_vm_year`,`rc_vm_mounth`,`vd_id`),
  KEY `FK_RECETTES_VENDEUR_MOIS_vd_id` (`vd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RECETTES_VENDEUR_MOIS`
--

INSERT INTO `RECETTES_VENDEUR_MOIS` (`rc_vm_year`, `rc_vm_mounth`, `rc_vm_montant`, `vd_id`) VALUES
(2017, 5, 3900, 1),
(2017, 5, 3900, 2),
(2017, 5, 50000, 9),
(2017, 6, 900, 1),
(2017, 7, 500, 2),
(2017, 9, 900, 1),
(2018, 5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `VENDEUR`
--

CREATE TABLE IF NOT EXISTS `VENDEUR` (
  `vd_id` int(11) NOT NULL AUTO_INCREMENT,
  `vd_name` varchar(50) DEFAULT NULL,
  `salaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`vd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `VENDEUR`
--

INSERT INTO `VENDEUR` (`vd_id`, `vd_name`, `salaire`) VALUES
(1, 'Koera', 3000),
(2, 'Aymard', 3000),
(3, 'Laza', 3000),
(4, 'Manoa', 5000),
(5, 'Ratou', 5500),
(6, 'popo', 3000),
(7, 'papa', 900),
(8, 'Zaza', 900),
(9, 'Thomas Mahatod', 89990),
(10, 'Nanta', 9000),
(11, 'Aymard', 0);

--
-- Triggers `VENDEUR`
--
DROP TRIGGER IF EXISTS `AUDIT_VENDEUR`;
DELIMITER //
CREATE TRIGGER `AUDIT_VENDEUR` BEFORE INSERT ON `VENDEUR`
 FOR EACH ROW BEGIN
    INSERT INTO AUDIT_VENDEURS(quand,qui,quoi,nouv_salaire) VALUES(
            NOW(),CURRENT_USER(),'INSERT',NEW.salaire
    );
END
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `RECETTES_VENDEUR`
--
ALTER TABLE `RECETTES_VENDEUR`
  ADD CONSTRAINT `FK_RECETTES_VENDEUR_vd_id` FOREIGN KEY (`vd_id`) REFERENCES `VENDEUR` (`vd_id`);

--
-- Constraints for table `RECETTES_VENDEUR_MOIS`
--
ALTER TABLE `RECETTES_VENDEUR_MOIS`
  ADD CONSTRAINT `FK_RECETTES_VENDEUR_MOIS_vd_id` FOREIGN KEY (`vd_id`) REFERENCES `VENDEUR` (`vd_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
