-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2018 at 08:59 AM
-- Server version: 5.6.38-log
-- PHP Version: 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
CREATE DATABASE ABCjobs;
USE ABCjobs;
--
-- Database: `ABCjobs`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `procSaveUser`(IN `i_id` INT, IN `i_firstname` VARCHAR(50), IN `i_lastname` VARCHAR(50), IN `i_email` VARCHAR(50), IN `i_password` VARCHAR(255), IN `i_creation_time` DATETIME, IN `i_role` VARCHAR(10))
BEGIN
    if(i_id=0) then
      insert into tb_user(firstname,lastname,email,password, account_creation_time, role) values(i_firstname,i_lastname,i_email,i_password, i_creation_time, i_role);
    Else
                 update tb_user set firstname=i_firstname,lastname=i_lastname,email=i_email,password=i_password,role=i_role where id=i_id;
    end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comments` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`id`, `firstname`, `lastname`, `email`, `comments`) VALUES
(1, 'ttdwdwd', 'yydwdwd', 'wong@hotmail.com', 'fjkmb hiun kj;no;'),
(2, 'wew', 'frgg', 'W@hotmail.com', 'defeff'),
(3, 'efefd', 'efrfr4f', 'wong@hotmail.com', 'efervrv'),
(4, 'wong', 'lee', 'ww@hotmail.com', 'complain about ...'),
(6, 'wong', 'lee', 'ww@hotmail.com', 'complain about ...');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstname`, `lastname`, `email`, `password`, `account_creation_time`, `role`) VALUES
(1, 'Chee Wei', 'Lim', 'cheewei001@gmail.com', '$2y$11$1wzyxcs11QWS1/ieSwFH4efMgBLyM7kYK0hrEgb5e4hFIT7c779a.', '2017-12-25 14:30:08', 'admin'),
(3, 'walter', 'wong', 'wong@hotmail.com', '$2y$11$HtK2Tv4c57QrHro4XXdnie8YAAspzAUXxfqQrR3uzTtqK5z3ZcM3O', '2017-12-25 14:30:08', 'admin'),
(4, 'Chee Wei', 'Lim', 'lcwei5557@yahoo.com', '$2y$11$.4L91Xy9oh.a1JUZ8qZ8TunS7VLryH3KqYzYe.BDefYEQ/q1isTGC', '2018-01-04 17:23:50', 'user'),
(5, 'ben', 'yeo1', 'ben@hotmail.com', '$2y$11$xBfa040Ay.l/kcMX8CqAJuYSvCbYiwYyZ9r.I.lH2AACk3KEmFmmG', '2018-01-04 17:26:13', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
