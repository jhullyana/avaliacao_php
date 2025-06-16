-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: (data atual)
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criação do Banco de Dados
CREATE DATABASE IF NOT EXISTS `criar_banco`
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `criar_banco`;

-- --------------------------------------------------------
-- Estrutura da tabela de produtos (estoque)
CREATE TABLE `tb_produtos` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` VARCHAR(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `usuario_produto` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados iniciais da tabela produtos
INSERT INTO `tb_produtos` (`produto`, `descricao`, `quantidade`, `valor`, `usuario_id`) VALUES
('Coca-Cola', 'Bebida', 100, 5.00, 1),
('Refrigerante', 'Bebida', 50, 3.50, 1),
('Cerveja', 'Bebida', 20, 8.00, 1),
('Pão', 'Alimento', 30, 2.00, 1),
('Arroz', 'Alimento', 40, 3.00, 1),
('Feijão', 'Alimento', 50, 2.50, 1),
('Macarrão', 'Alimento', 60, 3.50, 1),
('Leite', 'Bebida', 70, 4.00, 1);

-- --------------------------------------------------------
-- Estrutura da tabela de usuários
CREATE TABLE `tb_usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` VARCHAR(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` VARCHAR(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados iniciais da tabela usuários
INSERT INTO `tb_usuarios` (`usuario`, `senha`, `email`) VALUES
('jhullyana', '12345', 'jhullyana@gmail.com'),
('fulano', '54321', 'fulano@gmail.com');

-- --------------------------------------------------------
-- Criação da chave estrangeira
ALTER TABLE `tb_produtos`
ADD CONSTRAINT `usuario_produto`
FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`id`)
ON DELETE CASCADE ON UPDATE NO ACTION;

COMMIT;
