-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2014 at 10:36 AM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_saap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aluno`
--

CREATE TABLE IF NOT EXISTS `tb_aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_turma` int(11) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codigo` varchar(100) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tb_aluno`
--

INSERT INTO `tb_aluno` (`id`, `id_turma`, `data_cadastro`, `codigo`, `nome`, `email`, `sexo`) VALUES
(2, 1, '2014-06-20 10:35:39', '52150', 'JORGE', '', 'M'),
(3, 1, '2014-06-20 10:35:39', '50', 'RITA', '', 'F'),
(4, 2, '2014-06-20 10:35:39', '5055', 'CASSIA', 'cassia2@netocortes.com', 'F'),
(5, 2, '2014-06-20 10:35:39', '5487', 'FERNANDO', '', 'M'),
(6, 1, '2014-06-20 10:35:39', '987', 'FERNANDA', '', 'F'),
(7, 1, '2014-06-20 10:35:39', '87', 'ALICE', '', 'F'),
(8, 2, '2014-06-20 10:35:39', '8809', 'ALINE', '', 'F'),
(9, 2, '2014-06-20 10:35:39', '899', 'JUSSARA', '', 'F'),
(10, 1, '2014-06-20 10:35:39', '777', 'ANA CAROLINA', '', 'F'),
(11, 2, '2014-06-20 10:35:39', '89880', 'ANA CECILIA', '', 'F'),
(12, 1, '2014-06-20 10:35:39', '2000', 'MATEUS', '', 'M'),
(13, 2, '2014-06-20 10:35:39', '808', 'MICHEL', '', 'M'),
(14, 1, '2014-06-20 10:35:40', '620', 'JULIO', '', 'M'),
(15, 2, '2014-06-20 10:35:40', '6209', 'MARIA RITA', '', 'F'),
(16, 2, '2014-06-20 10:35:40', '900', 'MARIA JOSÉ', '', 'F'),
(17, 1, '2014-06-20 10:38:06', '1001', 'PEDRO', '', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aluno_prova`
--

CREATE TABLE IF NOT EXISTS `tb_aluno_prova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_prova` int(11) NOT NULL,
  `nota` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_aluno` (`id_aluno`,`id_prova`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_professor`
--

CREATE TABLE IF NOT EXISTS `tb_professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_professor`
--

INSERT INTO `tb_professor` (`id`, `data_cadastro`, `nome`, `email`, `senha`) VALUES
(5, '2014-04-22 22:56:21', 'José Côrtes Neto', 'jcortes.neto@gmail.com', '123456789'),
(6, '2014-05-08 20:58:45', 'José Côrtes Neto', 'neto@cerradotecnologia.com', '1234'),
(7, '2014-05-14 20:33:03', 'Neto', 'jjjj@j.com', '81');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prova`
--

CREATE TABLE IF NOT EXISTS `tb_prova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_prova` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_professor` (`id_professor`,`id_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_prova`
--

INSERT INTO `tb_prova` (`id`, `id_professor`, `id_turma`, `data_cadastro`, `data_prova`, `valor`) VALUES
(1, 7, 1, '2014-05-20 16:17:22', '2014-05-28', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pergunta` text NOT NULL,
  `gabarito` text NOT NULL,
  `nivel` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prova` (`data_cadastro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_questao`
--

INSERT INTO `tb_questao` (`id`, `data_cadastro`, `pergunta`, `gabarito`, `nivel`) VALUES
(1, '2014-05-20 16:19:15', 'Pergunta de teste 1', 'Gabarito de teste1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_turma`
--

CREATE TABLE IF NOT EXISTS `tb_turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `instituicao` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_professor` (`id_professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_turma`
--

INSERT INTO `tb_turma` (`id`, `id_professor`, `data_cadastro`, `nome`, `curso`, `instituicao`, `descricao`) VALUES
(1, 5, '2014-04-30 19:06:46', 'TURMA F.A.D.', 'SISTEMAS DE INFORMAÇÃO', 'UNICERP', 'SEM DESC.'),
(2, 5, '2014-05-01 18:29:58', 'ENG 1A', 'ENGENHARIA CIVIL', 'UNICERP', 'SEM DESC.'),
(3, 7, '2014-05-14 20:45:25', 'aaaa', 'aaa', 'aa', '    aa'),
(4, 7, '2014-05-14 20:53:11', 'Turma A 1-2014', 'Eng', 'Unicerp', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
