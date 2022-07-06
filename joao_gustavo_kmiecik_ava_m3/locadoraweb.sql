-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.27 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_locadoraweb
CREATE DATABASE IF NOT EXISTS `db_locadoraweb`;
USE `db_locadoraweb`;

-- Copiando estrutura para tabela db_locadoraweb.tb_cidades
CREATE TABLE IF NOT EXISTS `tb_cidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `abreviatura` varchar(45) NOT NULL,
  `id_estado` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_cidades_tb_estados` (`id_estado`),
  CONSTRAINT `FK_tb_cidades_tb_estados` FOREIGN KEY (`id_estado`) REFERENCES `tb_estados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_locadoraweb.tb_clientes
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `estadocivil` varchar(15) NOT NULL,
  `fone` varchar(15) DEFAULT NULL,
  `cel` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rua` varchar(45) NOT NULL,
  `num` varchar(15) NOT NULL,
  `comp` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `id_cidade` int DEFAULT NULL,
  `id_uf` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_clientes_tb_cidades` (`id_cidade`),
  KEY `FK_tb_clientes_tb_estados` (`id_uf`),
  CONSTRAINT `FK_tb_clientes_tb_cidades` FOREIGN KEY (`id_cidade`) REFERENCES `tb_cidades` (`id`),
  CONSTRAINT `FK_tb_clientes_tb_estados` FOREIGN KEY (`id_uf`) REFERENCES `tb_estados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_locadoraweb.tb_estados
CREATE TABLE IF NOT EXISTS `tb_estados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sigla` char(2) NOT NULL,
  `regiao` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_locadoraweb.tb_filmes
CREATE TABLE IF NOT EXISTS `tb_filmes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo_traduzido` varchar(45) NOT NULL,
  `titulo_original` varchar(45) NOT NULL,
  `duracao` varchar(15) NOT NULL,
  `valor_locacao` decimal(10,2) DEFAULT NULL,
  `id_generos` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_filmes_tb_generos` (`id_generos`),
  CONSTRAINT `FK_tb_filmes_tb_generos` FOREIGN KEY (`id_generos`) REFERENCES `tb_generos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_locadoraweb.tb_funcionarios
CREATE TABLE IF NOT EXISTS `tb_funcionarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `genero` char(1) NOT NULL,
  `estadocivil` varchar(15) NOT NULL,
  `cel` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dataadmissao` date NOT NULL,
  `cargo` varchar(35) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `id_cidade` int DEFAULT NULL,
  `id_uf` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_funcionarios_tb_cidades` (`id_cidade`),
  KEY `FK_tb_funcionarios_tb_estados` (`id_uf`),
  CONSTRAINT `FK_tb_funcionarios_tb_cidades` FOREIGN KEY (`id_cidade`) REFERENCES `tb_cidades` (`id`),
  CONSTRAINT `FK_tb_funcionarios_tb_estados` FOREIGN KEY (`id_uf`) REFERENCES `tb_estados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_locadoraweb.tb_generos
CREATE TABLE IF NOT EXISTS `tb_generos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
