-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2024 às 23:56
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `farmacia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `comercial` varchar(45) NOT NULL,
  `generico` varchar(45) NOT NULL,
  `dosagem` varchar(45) NOT NULL,
  `temperatura` varchar(45) NOT NULL,
  `aplicacao` varchar(45) NOT NULL,
  `laboratorio` varchar(45) NOT NULL,
  `fornecedor` varchar(45) NOT NULL,
  `quantidade` varchar(45) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `medicamento`
--

INSERT INTO `medicamento` (`id`, `comercial`, `generico`, `dosagem`, `temperatura`, `aplicacao`, `laboratorio`, `fornecedor`, `quantidade`, `preco`, `validade`) VALUES
(4, 'Tylenol', 'Paracetamol', '500', '20', 'oral', 'Johnson & Johnson', 'Distribuidora X', '100', '12', '2025-01-01'),
(5, 'Aspirina', 'Ácido Acetilsalicílico', '100', '20', 'oral', 'Bayer', 'Distribuidora Y', '200', '8', '2026-02-01'),
(6, 'Omeprazol', 'Omeprazol', '20', '25', 'oral', 'EMS', 'Distribuidora Z', '300', '15', '2025-03-01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `idade` int(11) NOT NULL,
  `crf` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `idade`, `crf`, `telefone`, `cpf`, `rg`, `senha`, `sexo`, `role`) VALUES
(6, 'Teste da Silva', 10, '12345678901', '111234567855', '3', '4', '123', 'masculino', 'admin'),
(28, 'Matheus Lima', 18, '2442244224', '11987654321', '81131121111', '122443553535', '123', 'masculino', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
