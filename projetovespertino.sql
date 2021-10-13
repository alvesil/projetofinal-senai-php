-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2021 às 20:25
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetovespertino`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `incluir` varchar(1) NOT NULL,
  `alterar` varchar(1) NOT NULL,
  `excluir` varchar(1) NOT NULL,
  `consultar` varchar(1) NOT NULL,
  `entrada` varchar(1) NOT NULL,
  `saida` varchar(1) NOT NULL,
  `ativo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `senha`, `foto`, `incluir`, `alterar`, `excluir`, `consultar`, `entrada`, `saida`, `ativo`) VALUES
('0', '0', '', '', '', '', '', '', '', ''),
('a', '550a141f12de6341fba65b0ad0433500', '', '', '', '', '', '', '', 's'),
('acaacac', '111', '', '', '', '', '', '', '', ''),
('b', '15de21c670ae7c3f6f3f1f37029303c9', '', 's', 's', 's', 's', 's', 's', 's'),
('c', '15de21c670ae7c3f6f3f1f37029303c9', '', '', '', '', '', '', '', 's'),
('caracas', '541', '', '', '', '', '', '', '', ''),
('caracules', '554', '', '', '', '', '', '', '', ''),
('eduardo', '123', '', '', '', '', '', '', '', ''),
('lucas', '154', '', '', '', '', '', '', '', ''),
('teste', 'aaa', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `codigo` varchar(7) NOT NULL,
  `veiculo` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `ano` date NOT NULL,
  `quantidade` int(5) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`codigo`, `veiculo`, `marca`, `modelo`, `ano`, `quantidade`, `foto`) VALUES
('00001', 'Gol', 'VolksWagen', 'Trend', '2006-03-05', 2, 'vw-gol.jpg'),
('00002', 'Kadett', 'General Motors', 'Kadett Sport', '2021-10-15', 4, 'gm-kadett.jpg'),
('00003', 'Voyage', 'VolksWagen', 'GS SEDAN', '1975-09-05', 3, 'vw-voyage'),
('00005', 'Fusca', 'VolksWagen', '1600', '1965-06-03', 6, 'vw-fusca.jpg'),
('00006', 'Voyage', 'VolksWagen', 'LE', '2018-10-22', 6, 'vw-voyage2010.jpg'),
('00008', 'Clio', 'Renault', 'Ghia', '2017-06-02', 3, 'renault-clio.jpg'),
('00009', 'Ka', 'Ford Motors', 'SE', '2019-08-03', 5, 'ford-ka.jpg'),
('00010', 'C4', 'Citroen', 'SE', '2008-06-05', 4, 'citroen-c4.jpg'),
('00011', '206', 'Peugeot', 'Ghia', '2005-08-04', 3, 'peugeot-206.jpg'),
('00012', 'Mobi', 'Fiat', 'SE', '2019-06-02', 6, 'mobi.jpg'),
('00013', '208', 'Peugeot', 'LES', '2006-06-05', 6, 'peugeot-208.jpeg'),
('54154', 'Voyage', 'VolksWagen', 'Sportting', '2021-10-16', 2, 'vw-voyage2010.jpg'),
('99999', 'F1000', 'Ford Motors', 'Tracker', '2021-10-14', 6, 'mustang-bgless.png'),
('9999999', 'Gol', 'VolksWagen', 'Ghia', '2021-09-30', 9, 'vw-gol.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
