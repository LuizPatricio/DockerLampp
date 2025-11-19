create database IF not exists `dashboard`;
create database IF not exists `ecommerce`;

USE `ecommerce`;

CREATE TABLE IF NOT EXISTS `produtos` (
    `codigoProduto` INT PRIMARY KEY,
    `nomeProduto` VARCHAR(255) NOT NULL,
    `codigoFornecedor` INT NOT NULL,
    `Foto` TEXT,
    `codigoUnidade` INT NOT NULL,
    `precoUnitario` DECIMAL(10,2) NOT NULL,
    `codigoCategoria` INT NOT NULL,
    FOREIGN KEY (`codigoFornecedor`) REFERENCES `fornecedores`(`codigoFornecedor`),
    FOREIGN KEY (`codigoUnidade`) REFERENCES `unidade`(`codigoUnidade`),
    FOREIGN KEY (`codigoCategoria`) REFERENCES `categoria`(`codigoCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `fornecedores` (
    `codigoFornecedor` INT PRIMARY KEY,
    `nomeFornecedor` VARCHAR(255) NOT NULL,
    `CNPJ` VARCHAR(20) NOT NULL,
    `Fax` VARCHAR(20),
    `telefoneFixo` VARCHAR(20),
    `telefoneCelular` VARCHAR(20),
    `site` VARCHAR(255),
    `logradouro` VARCHAR(255) NOT NULL,
    `numero` INT NOT NULL,
    `complemento` VARCHAR(100),
    `bairro` VARCHAR(100) NOT NULL,
    `cidade` VARCHAR(100) NOT NULL,
    `estado` VARCHAR(2) NOT NULL,
    `CEP` VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `categoria` (
    `codigoCategoria` INT PRIMARY KEY,
    `nomeCategoria` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `unidade` (
    `codigoUnidade` INT PRIMARY KEY,
    `descricaoUnidade` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `clientes` (
    `codigoCliente` INT PRIMARY KEY,
    `nomeCliente` VARCHAR(255) NOT NULL,
    `CPF` VARCHAR(14) NOT NULL,
    `telefoneFixo` VARCHAR(20),
    `telefoneCelular` VARCHAR(20),
    `logradouro` VARCHAR(255) NOT NULL,
    `numero` INT NOT NULL,
    `complemento` VARCHAR(100),
    `bairro` VARCHAR(100) NOT NULL,
    `cidade` VARCHAR(100) NOT NULL,
    `estado` VARCHAR(2) NOT NULL,
    `CEP` VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;