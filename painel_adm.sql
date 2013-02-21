-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.25a
-- Versão do PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `painel_adm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 's',
  `administrador` char(1) NOT NULL DEFAULT 'n',
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `login`, `senha`, `ativo`, `administrador`, `cadastro`) VALUES
(10, 'teste', '', '', '', '', 'n', 'n', '2013-02-20 14:15:56'),
(11, 'teste', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'n', 'n', '2013-02-20 14:17:15'),
(12, 'teste', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'n', 'n', '2013-02-20 14:22:38'),
(13, 'lucas', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'n', 'n', '2013-02-20 14:30:18'),
(14, 'lucas', '', 'lucasmcarlos@gmail.com', 'lucas', '81dc9bdb52d04dc20036dbd8313ed055', 's', 's', '2013-02-21 13:37:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
