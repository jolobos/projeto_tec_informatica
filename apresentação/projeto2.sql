-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2016 às 00:24
-- Versão do servidor: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projeto2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nome` varchar(150) CHARACTER SET latin1 NOT NULL,
  `CPF` char(14) CHARACTER SET latin1 NOT NULL,
  `telefone` bigint(14) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nome`, `CPF`, `telefone`, `email`, `endereco`) VALUES
(2, 'josias', '123813718', 34698411, 'digo_josias@hotmail.com', 'av. anchieta n. 1025 b. girafales'),
(4, 'luana koling', '0123456790', 92563582, 'tata_tata@tatamail.com', 'rua tata com tata nÂºta'),
(6, 'matheus ribeiro de azevedo', '1234568986', 34698411, 'matheus@matheus.com.br', 'rua tia nastacia b. sitio'),
(8, 'maria seliria rodrigues dos santos', '01255055281', 92563582, '', 'rua Anchieta nÂº 56'),
(9, 'clodoaldo arrantes figueira', '02103353743', 34691183, 'clod.arrantes@yahoo.com.br', 'rua caramuru nÂº335 B. bom jesus'),
(10, 'ricardo silva lopes', '', 34697300, 'ricardo_71@gmail.com', 'rua beija flor nÂº34 b. menino deus'),
(11, 'roberto afonso nunes', '03302303402', 34698177, 'debugs.s@gmail.com', 'r. mineirinho dutra n: 35 b: figueira'),
(12, 'jose ricardo borba', '1233474858', 345638832, 'jr.borba@gmail.com', 'rua tata com tata nÂºta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_venda`
--

CREATE TABLE IF NOT EXISTS `itens_venda` (
  `id_it_venda` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` double NOT NULL,
  `data_prod` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id_it_venda`, `id_venda`, `id_produto`, `quantidade`, `data_prod`) VALUES
(33, 213, 2, 1, '2016-12-04 10:56:09'),
(34, 213, 5, 2, '2016-12-04 10:56:09'),
(35, 213, 8, 2, '2016-12-04 10:56:09'),
(36, 213, 9, 1, '2016-12-04 10:56:09'),
(37, 213, 10, 1, '2016-12-04 10:56:09'),
(38, 213, 11, 1, '2016-12-04 10:56:09'),
(39, 213, 3, 3, '2016-12-04 10:56:09'),
(40, 214, 2, 2, '2016-12-04 10:56:37'),
(41, 214, 3, 1, '2016-12-04 10:56:37'),
(42, 214, 8, 1, '2016-12-04 10:56:37'),
(43, 215, 2, 4, '2016-12-04 10:57:00'),
(44, 215, 11, 1, '2016-12-04 10:57:00'),
(45, 215, 9, 1, '2016-12-04 10:57:00'),
(46, 216, 9, 1, '2016-12-04 10:57:17'),
(47, 216, 10, 1, '2016-12-04 10:57:17'),
(48, 216, 8, 1, '2016-12-04 10:57:17'),
(49, 218, 3, 3, '2016-12-04 20:20:17'),
(50, 218, 5, 1, '2016-12-04 20:20:17'),
(51, 218, 9, 2, '2016-12-04 20:20:17'),
(52, 219, 8, 1, '2016-12-04 20:21:17'),
(53, 220, 10, 1, '2016-12-04 20:21:33'),
(54, 221, 3, 3, '2016-12-05 16:33:59'),
(55, 221, 8, 1, '2016-12-05 16:33:59'),
(56, 221, 10, 1, '2016-12-05 16:33:59'),
(57, 221, 11, 1, '2016-12-05 16:33:59'),
(58, 222, 2, 1, '2016-12-05 16:38:53'),
(59, 223, 9, 1, '2016-12-07 21:04:16'),
(60, 223, 10, 1, '2016-12-07 21:04:16'),
(61, 223, 11, 1, '2016-12-07 21:04:16'),
(62, 223, 3, 1, '2016-12-07 21:04:16'),
(63, 223, 2, 2, '2016-12-09 21:25:11'),
(64, 223, 3, 1, '2016-12-09 21:25:11'),
(65, 223, 9, 3, '2016-12-09 21:25:11'),
(66, 224, 2, 2, '2016-12-09 21:26:07'),
(67, 224, 3, 1, '2016-12-09 21:26:07'),
(68, 224, 9, 3, '2016-12-09 21:26:07'),
(69, 225, 9, 1, '2016-12-10 14:45:41'),
(70, 226, 3, 23, '2016-12-14 19:41:39'),
(71, 226, 10, 1, '2016-12-14 19:41:39'),
(72, 227, 2, 1, '2016-12-16 20:15:32'),
(73, 228, 2, 1, '2016-12-16 20:15:49'),
(74, 229, 2, 1, '2016-12-16 20:17:41'),
(75, 230, 2, 1, '2016-12-16 20:17:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL,
  `cod_prod` bigint(10) NOT NULL,
  `produto` varchar(100) CHARACTER SET latin1 NOT NULL,
  `valor` double(6,2) NOT NULL,
  `descricao` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `cod_prod`, `produto`, `valor`, `descricao`) VALUES
(2, 1, 'cabo de rede', 1.00, 'cabo de rede de enternet'),
(3, 2, 'pilha ', 1.00, 'pilha para placa mae'),
(9, 7773, 'placa mÃ£e', 465.00, 'placa mae da asus socket 1151 chipset m110'),
(10, 6345, 'fonte sirius 650w', 209.00, 'fonte de alimentaÃ§Ã£o desktop'),
(11, 55425, 'gabinete rx-aÃ§Ã£o', 115.00, 'gabinete desktop'),
(12, 23980, 'tv samsung led 40pol j10', 1890.00, 'televisao de led');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `senha`, `nivel`) VALUES
(2, 'josias', '854a3864c2bef0b3948892a2c7b93ddd', 1),
(3, 'digoloko', '2a1c336844ec7a388d849dc16ed0f26c', 0),
(5, 'matheus', '45339359513f09155110f63f7ca91c3e', 1),
(8, 'ronaldo', 'c5aa3124b1adad080927ce4d144c6b33', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double(6,2) NOT NULL,
  `data_periodo` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `data`, `id_cliente`, `id_usuario`, `total`, `data_periodo`) VALUES
(213, '2016-11-04 10:56:09', 4, 2, 1332.00, '2016-11-04'),
(214, '2016-11-04 05:17:33', 9, 2, 2345.50, '2016-11-04'),
(215, '2016-12-04 10:57:00', 8, 2, 750.35, '2016-12-04'),
(216, '2016-12-04 10:57:17', 2, 2, 10.00, '2016-12-04'),
(217, '2016-12-04 10:57:17', 2, 2, 10.00, '2016-12-04'),
(218, '2016-12-04 20:20:17', 1, 2, 935.00, '2016-12-04'),
(219, '2016-12-04 20:21:17', 1, 2, 500.00, '2016-12-04'),
(220, '2016-12-04 20:21:33', 6, 2, 209.00, '2016-12-04'),
(221, '2016-12-05 16:33:59', 8, 2, 827.00, '2016-12-05'),
(222, '2016-12-05 16:38:53', 9, 2, 1.00, '2016-12-05'),
(223, '2016-12-07 21:04:16', 2, 2, 790.00, '2016-12-07'),
(224, '2016-11-09 21:26:07', 11, 2, 1398.00, '2016-11-09'),
(225, '2016-12-10 14:45:41', 8, 2, 465.00, '2016-12-10'),
(226, '2016-12-14 19:41:39', 8, 2, 232.00, '2016-12-14'),
(227, '2016-12-16 20:15:32', 2, 2, 1.00, '2016-12-16'),
(228, '2016-12-16 20:15:49', 2, 2, 1.00, '2016-12-16'),
(229, '2016-12-16 20:17:41', 2, 2, 1.00, '2016-12-16'),
(230, '2016-12-16 20:17:45', 2, 2, 1.00, '2016-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id_it_venda`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_it_venda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=231;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
