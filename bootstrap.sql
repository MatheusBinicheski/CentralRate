-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 23, 2015 as 04:11 PM
-- Versão do Servidor: 5.1.73
-- Versão do PHP: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bootstrap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

create database if not exists bootstrap;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`) VALUES
(1, 'Matheus', '3a327c936edc3710aa9049e8fe586ff707ea7f7c7e43a165579c4fad503a58f9', '3ad7d6b440539f21', 'matheusbinmanga@gmail.com'),
(2, 'Jerson', 'b1db36c1fe1a966219e811dd21071de8ac5f9ab5aed4d22cb00f676f9a4b1063', '615dc7e1e2c1d33', 'jerson.junior@centralit.com.br'),
(3, 'Thiago', 'd455e8988d3dbd1a1829f40dc7dbf3a1e5f4c76bab3cca361bf5360e86caf8ef', '257aa4f402cb904', 'tiago.carlos@centralit.com.br'),
(4, 'jersonjunior', '38bd4fff863087cdc86790a4adcd7b58ccbf51edd428ee19548aa8cab3c1bd20', '483a0f4117ad2ab', 'jer@gmail.com'),
(5, 'james', 'a83482b6059c43be504587c7658c5e2a6f49615370352281d8dbc64421e20874', '4d3cbeec3d477083', 'james@j.com'),
(6, 'Gilberto', '33ade7a01e514b31b6a5d7acf5c78c11b5dda1c817fbb0c5f2a52e79bcce637e', '22f169642a87f343', 'gilberto@hotmail.ccom');
