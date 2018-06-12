-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Maio-2018 às 10:33
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `trabalho`
--
CREATE DATABASE IF NOT EXISTS `trabalho` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trabalho`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(12) NOT NULL AUTO_INCREMENT,
  `nome_pais` varchar(50) NOT NULL,
  `continente` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id_pais`, `nome_pais`, `continente`) VALUES
(1, 'NigÃ©ria', 'Ãfrica do Sul'),
(3, 'NigÃ©ria', 'Ãfrica '),
(4, 'Argentina', 'AmÃ©rica do Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `religiao`
--

CREATE TABLE IF NOT EXISTS `religiao` (
  `id_religiao` int(12) NOT NULL AUTO_INCREMENT,
  `nome_religiao` varchar(50) NOT NULL,
  `simbolo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_religiao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `religiao`
--

INSERT INTO `religiao` (`id_religiao`, `nome_religiao`, `simbolo`) VALUES
(2, 'Budismo', 'simbolos/1525784254.jpg'),
(4, 'Catolicismo', 'simbolos/1525457576.jpg'),
(5, 'CandomblÃ©fh', 'simbolos/1525467546.jpg'),
(6, 'Teste', 'simbolos/1525784634.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `religiao_pais`
--

CREATE TABLE IF NOT EXISTS `religiao_pais` (
  `id_religiao_pais` int(12) NOT NULL AUTO_INCREMENT,
  `cod_religiao` int(12) NOT NULL,
  `cod_pais` int(12) NOT NULL,
  PRIMARY KEY (`id_religiao_pais`),
  KEY `id_religiao` (`cod_religiao`,`cod_pais`),
  KEY `id_pais` (`cod_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `religiao_pais`
--

INSERT INTO `religiao_pais` (`id_religiao_pais`, `cod_religiao`, `cod_pais`) VALUES
(7, 2, 4),
(5, 4, 1),
(9, 5, 1),
(6, 5, 3),
(8, 5, 4);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `religiao_pais`
--
ALTER TABLE `religiao_pais`
  ADD CONSTRAINT `religiao_pais_ibfk_1` FOREIGN KEY (`cod_religiao`) REFERENCES `religiao` (`id_religiao`),
  ADD CONSTRAINT `religiao_pais_ibfk_2` FOREIGN KEY (`cod_pais`) REFERENCES `pais` (`id_pais`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
