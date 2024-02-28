-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2016 às 00:37
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nome`, `CPF`, `telefone`, `email`, `endereco`) VALUES
(1, 'jose ricardo borbaa', '02353055234', 5193596160, 'jrborba.br@gmail.com', 'R.jundia B. caramuru C. guaiba RS'),
(2, 'josias', '123813718', 34698411, 'digo_josias@hotmail.com', 'av. anchieta n. 1025 b. girafales'),
(4, 'luana koling', '0123456790', 92563582, 'tata_tata@tatamail.com', 'rua tata com tata nÂºta'),
(6, 'matheus ribeiro de azevedo', '1234568986', 34698411, 'matheus@matheus.com.br', 'rua tia nastacia b. sitio'),
(8, 'maria seliria rodrigues dos santos', '01255055281', 92563582, '', 'rua Anchieta nÂº 56'),
(9, 'clodoaldo arrantes figueira', '02103353743', 34691183, 'clod.arrantes@yahoo.com.br', 'rua caramuru nÂº335 B. bom jesus'),
(10, 'ricardo silva lopes', '', 34697300, 'ricardo_71@gmail.com', 'rua beija flor nÂº34 b. menino deus');

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

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
(53, 220, 10, 1, '2016-12-04 20:21:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL,
  `cod_prod` bigint(10) NOT NULL,
  `produto` varchar(100) CHARACTER SET latin1 NOT NULL,
  `quantidade` double(6,2) NOT NULL,
  `valor` double(6,2) NOT NULL,
  `descricao` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `cod_prod`, `produto`, `quantidade`, `valor`, `descricao`) VALUES
(2, 1, 'cabo de rede', 1.00, 1.00, 'cabo de rede de enternet'),
(3, 2, 'pilha ', 1.00, 1.00, 'pilha para placa mae'),
(5, 0, 'TV', 3.00, 2.00, 'televisor de 40 polegadas'),
(8, 7, 'celular', 1.00, 500.00, 'celular lg optmus 2'),
(9, 7773, 'placa mÃ£e', 2.00, 465.00, 'placa mae da asus socket 1151 chipset m110'),
(10, 6345, 'fonte sirius 650w', 10.00, 209.00, 'fonte de alimentaÃ§Ã£o desktop'),
(11, 55425, 'gabinete rx-aÃ§Ã£o', 21.00, 115.00, 'gabinete desktop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(11) NOT NULL,
  `PositionNov2013` int(2) NOT NULL,
  `PositionNov2012` int(2) NOT NULL,
  `ProgLanguage` varchar(255) NOT NULL,
  `Ratings` float(10,4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ranking`
--

INSERT INTO `ranking` (`id`, `PositionNov2013`, `PositionNov2012`, `ProgLanguage`, `Ratings`) VALUES
(1, 1, 1, 'C', 18.1550),
(2, 2, 2, 'Java', 16.5210),
(3, 3, 3, 'Objective-C', 9.4060),
(4, 4, 4, 'C++', 8.3690),
(5, 5, 6, 'C#', 6.0240),
(6, 6, 5, 'PHP', 5.3790),
(7, 7, 7, '(Visual) Basic', 4.3960),
(8, 8, 8, 'Python', 3.1100),
(9, 9, 23, 'Transact-SQL', 2.5210),
(10, 10, 11, 'JavaScript', 2.0500),
(11, 11, 15, 'Visual Basic .NET', 1.9690),
(12, 12, 9, 'Perl', 1.5210),
(13, 13, 10, 'Ruby', 1.3030),
(14, 14, 14, 'Pascal', 0.7150),
(15, 15, 13, 'Lisp', 0.7060),
(16, 16, 19, 'MATLAB', 0.6560),
(17, 17, 12, 'Delphi/Object Pascal', 0.6490),
(18, 18, 17, 'PL/SQL', 0.6050),
(19, 19, 24, 'COBOL', 0.5850),
(20, 20, 20, 'Assembly', 0.5320);

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
(7, 'jose', '662eaa47199461d01a623884080934ab', 0),
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
  `total` double(6,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `data`, `id_cliente`, `id_usuario`, `total`) VALUES
(213, '2016-12-04 10:56:09', 4, 2, 1332.00),
(214, '2016-12-04 10:56:37', 9, 2, 2345.50),
(215, '2016-12-04 10:57:00', 8, 2, 750.35),
(216, '2016-12-04 10:57:17', 2, 2, 10.00),
(217, '2016-12-04 10:57:17', 2, 2, 10.00),
(218, '2016-12-04 20:20:17', 1, 2, 935.00),
(219, '2016-12-04 20:21:17', 1, 2, 500.00),
(220, '2016-12-04 20:21:33', 6, 2, 209.00);

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
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_it_venda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=221;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
