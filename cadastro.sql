-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 08-Jul-2019 às 23:02
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `catcodig` int(11) NOT NULL,
  `catdescr` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`catcodig`, `catdescr`) VALUES
(1, 'Higiene'),
(2, 'Refrigerantes'),
(3, 'Massas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `clicodig` int(11) NOT NULL,
  `clinome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clisenha` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`clicodig`, `clinome`, `cliemail`, `clisenha`) VALUES
(1, 'João', '', ''),
(2, 'Maria', '', ''),
(3, 'Matheus', 'matheusyagami1470@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `clicodig` int(11) NOT NULL,
  `procodig` int(11) NOT NULL,
  `qtd_prod` int(11) NOT NULL,
  `preco_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`clicodig`, `procodig`, `qtd_prod`, `preco_prod`) VALUES
(3, 53, 2, 4),
(3, 31, 3, 4),
(3, 29, 5, 2),
(3, 55, 6, 5),
(3, 31, 1, 4),
(3, 54, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `procodig` int(11) NOT NULL,
  `pronome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `promarca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `procateg` int(11) NOT NULL,
  `propreco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`procodig`, `pronome`, `promarca`, `procateg`, `propreco`) VALUES
(28, 'Coca-Cola', 'Coca-cola', 2, '5.40'),
(29, 'Sabonete', 'Lux', 1, '2.00'),
(31, 'Sprite', 'Coca-Cola', 2, '4.23'),
(53, 'Escova de dentes ', 'Kolinos', 1, '3.50'),
(54, 'Macarrao', 'Isabela', 3, '6.20'),
(55, 'Fanta', 'Coca-cola', 2, '4.95');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`catcodig`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clicodig`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD KEY `clicodig` (`clicodig`),
  ADD KEY `procodig` (`procodig`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`procodig`),
  ADD KEY `prodcat` (`procateg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `catcodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clicodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `procodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`clicodig`) REFERENCES `clientes` (`clicodig`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`procodig`) REFERENCES `produtos` (`procodig`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `prodcat` FOREIGN KEY (`procateg`) REFERENCES `categorias` (`catcodig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
