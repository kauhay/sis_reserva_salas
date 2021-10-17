-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2021 às 21:13
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sala` varchar(255) CHARACTER SET latin1 NOT NULL,
  `reserva` int(255) NOT NULL,
  `id_index` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `user`, `sala`, `reserva`, `id_index`) VALUES
(1, 'teste 1', '#3A87AD', '2021-09-26 09:00:00', '2021-09-26 10:00:00', 'selton', 'teste', 0, 1),
(2, 'teste 1', '#3A87AD', '2021-09-27 09:00:00', '2021-09-27 12:00:00', 'selton', 'teste', 0, 2),
(3, 'teste 1', '#3A87AD', '2021-10-04 09:00:00', '2021-10-04 12:00:00', 'selton', 'teste', 0, 2),
(4, 'teste 1', '#3A87AD', '2021-10-11 09:00:00', '2021-10-11 12:00:00', 'selton', 'teste', 0, 2),
(5, 'teste 1', '#3A87AD', '2021-10-18 09:00:00', '2021-10-18 12:00:00', 'selton', 'teste', 0, 2),
(6, 'teste 1', '#3A87AD', '2021-10-25 09:00:00', '2021-10-25 12:00:00', 'selton', 'teste', 0, 2),
(7, 'teste 1', '#3A87AD', '2021-11-01 09:00:00', '2021-11-01 12:00:00', 'selton', 'teste', 0, 2),
(8, 'teste 1', '#3A87AD', '2021-11-08 09:00:00', '2021-11-08 12:00:00', 'selton', 'teste', 0, 2),
(9, 'teste 1', '#3A87AD', '2021-11-15 09:00:00', '2021-11-15 12:00:00', 'selton', 'teste', 0, 2),
(10, 'teste 1', '#3A87AD', '2021-11-22 09:00:00', '2021-11-22 12:00:00', 'selton', 'teste', 0, 2),
(11, 'teste 1', '#3A87AD', '2021-11-29 09:00:00', '2021-11-29 12:00:00', 'selton', 'teste', 0, 2),
(12, 'teste 1', '#3A87AD', '2021-12-06 09:00:00', '2021-12-06 12:00:00', 'selton', 'teste', 0, 2),
(13, 'teste 1', '#3A87AD', '2021-12-13 09:00:00', '2021-12-13 12:00:00', 'selton', 'teste', 0, 2),
(14, 'teste 1', '#3A87AD', '2021-12-20 09:00:00', '2021-12-20 12:00:00', 'selton', 'teste', 0, 2),
(15, 'teste 1', '#3A87AD', '2021-12-27 09:00:00', '2021-12-27 12:00:00', 'selton', 'teste', 0, 2),
(16, 'teste 1', '#3A87AD', '2022-01-03 09:00:00', '2022-01-03 12:00:00', 'selton', 'teste', 0, 2),
(17, 'teste 1', '#3A87AD', '2022-01-10 09:00:00', '2022-01-10 12:00:00', 'selton', 'teste', 0, 2),
(18, 'teste 1', '#3A87AD', '2022-01-17 09:00:00', '2022-01-17 12:00:00', 'selton', 'teste', 0, 2),
(19, 'teste 1', '#3A87AD', '2022-01-24 09:00:00', '2022-01-24 12:00:00', 'selton', 'teste', 0, 2),
(20, 'teste 1', '#3A87AD', '2022-01-31 09:00:00', '2022-01-31 12:00:00', 'selton', 'teste', 0, 2),
(21, 'teste 1', '#3A87AD', '2022-02-07 09:00:00', '2022-02-07 12:00:00', 'selton', 'teste', 0, 2),
(22, 'teste 1', '#3A87AD', '2022-02-14 09:00:00', '2022-02-14 12:00:00', 'selton', 'teste', 0, 2),
(23, 'teste 1', '#3A87AD', '2022-02-21 09:00:00', '2022-02-21 12:00:00', 'selton', 'teste', 0, 2),
(24, 'teste 1', '#3A87AD', '2022-02-28 09:00:00', '2022-02-28 12:00:00', 'selton', 'teste', 0, 2),
(25, 'teste 1', '#3A87AD', '2022-03-07 09:00:00', '2022-03-07 12:00:00', 'selton', 'teste', 0, 2),
(26, 'teste 1', '#3A87AD', '2022-03-14 09:00:00', '2022-03-14 12:00:00', 'selton', 'teste', 0, 2),
(27, 'teste 1', '#3A87AD', '2022-03-21 09:00:00', '2022-03-21 12:00:00', 'selton', 'teste', 0, 2),
(28, 'teste 1', '#3A87AD', '2022-03-28 09:00:00', '2022-03-28 12:00:00', 'selton', 'teste', 0, 2),
(29, 'teste 1', '#3A87AD', '2022-04-04 09:00:00', '2022-04-04 12:00:00', 'selton', 'teste', 0, 2),
(30, 'teste 1', '#3A87AD', '2022-04-11 09:00:00', '2022-04-11 12:00:00', 'selton', 'teste', 0, 2),
(31, 'teste 1', '#3A87AD', '2022-04-18 09:00:00', '2022-04-18 12:00:00', 'selton', 'teste', 0, 2),
(32, 'teste 1', '#3A87AD', '2022-04-25 09:00:00', '2022-04-25 12:00:00', 'selton', 'teste', 0, 2),
(33, 'teste 1', '#3A87AD', '2022-05-02 09:00:00', '2022-05-02 12:00:00', 'selton', 'teste', 0, 2),
(34, 'teste 1', '#3A87AD', '2022-05-09 09:00:00', '2022-05-09 12:00:00', 'selton', 'teste', 0, 2),
(35, 'teste 1', '#3A87AD', '2022-05-16 09:00:00', '2022-05-16 12:00:00', 'selton', 'teste', 0, 2),
(36, 'teste 1', '#3A87AD', '2022-05-23 09:00:00', '2022-05-23 12:00:00', 'selton', 'teste', 0, 2),
(37, 'teste 1', '#3A87AD', '2022-05-30 09:00:00', '2022-05-30 12:00:00', 'selton', 'teste', 0, 2),
(38, 'teste 1', '#3A87AD', '2022-06-06 09:00:00', '2022-06-06 12:00:00', 'selton', 'teste', 0, 2),
(39, 'teste 1', '#3A87AD', '2022-06-13 09:00:00', '2022-06-13 12:00:00', 'selton', 'teste', 0, 2),
(40, 'teste 1', '#3A87AD', '2022-06-20 09:00:00', '2022-06-20 12:00:00', 'selton', 'teste', 0, 2),
(41, 'teste 1', '#3A87AD', '2022-06-27 09:00:00', '2022-06-27 12:00:00', 'selton', 'teste', 0, 2),
(42, 'teste 1', '#3A87AD', '2022-07-04 09:00:00', '2022-07-04 12:00:00', 'selton', 'teste', 0, 2),
(43, 'teste 1', '#3A87AD', '2022-07-11 09:00:00', '2022-07-11 12:00:00', 'selton', 'teste', 0, 2),
(44, 'teste 1', '#3A87AD', '2022-07-18 09:00:00', '2022-07-18 12:00:00', 'selton', 'teste', 0, 2),
(45, 'teste 1', '#3A87AD', '2022-07-25 09:00:00', '2022-07-25 12:00:00', 'selton', 'teste', 0, 2),
(46, 'teste 1', '#3A87AD', '2022-08-01 09:00:00', '2022-08-01 12:00:00', 'selton', 'teste', 0, 2),
(47, 'teste 1', '#3A87AD', '2022-08-08 09:00:00', '2022-08-08 12:00:00', 'selton', 'teste', 0, 2),
(48, 'teste 1', '#3A87AD', '2022-08-15 09:00:00', '2022-08-15 12:00:00', 'selton', 'teste', 0, 2),
(49, 'teste 1', '#3A87AD', '2022-08-22 09:00:00', '2022-08-22 12:00:00', 'selton', 'teste', 0, 2),
(50, 'teste 1', '#3A87AD', '2022-08-29 09:00:00', '2022-08-29 12:00:00', 'selton', 'teste', 0, 2),
(51, 'teste 1', '#3A87AD', '2022-09-05 09:00:00', '2022-09-05 12:00:00', 'selton', 'teste', 0, 2),
(52, 'teste 1', '#3A87AD', '2022-09-12 09:00:00', '2022-09-12 12:00:00', 'selton', 'teste', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localizacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lugares` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teams` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `titulo`, `valor`, `icon`, `localizacao`, `lugares`, `telefone`, `skype`, `teams`, `descricao`) VALUES
(1, 'teste', 'teste', 'fas fa-video', 'teste', '50', '12', 'teste@outlook.com', 'teste@outlook.com', 'teste é uma sala teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tipo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `pergunta` varchar(500) NOT NULL,
  `resposta` varchar(500) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `tipo`, `pergunta`, `resposta`, `foto`, `nome`) VALUES
(1, 'selton', '123', 'supadm', '123', '123', 'selton_barros(selton).jpg', 'Selton Silva');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
