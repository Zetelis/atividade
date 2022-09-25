-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Maio-2018 às 15:58
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `codCidade` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCidade` varchar(60) NOT NULL,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`codCidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`codCidade`, `nomeCidade`, `uf`) VALUES
(1, 'CIANORTE', 'PR'),
(2, 'MARINGá', 'PR'),
(3, 'CIANORTE', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `codCompra` int(11) NOT NULL,
  `codCondPgto` int(11) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `dataCompra` date NOT NULL,
  `valorTotal` decimal(15,2) NOT NULL,
  `valorItens` decimal(15,2) NOT NULL,
  `desconto` decimal(15,2) NOT NULL,
  `situacao` char(1) NOT NULL,
  `nf` varchar(20) NOT NULL,
  `primeiroPrazo` date NOT NULL,
  PRIMARY KEY (`codCompra`),
  KEY `codPessoa` (`codPessoa`),
  KEY `codCondPgto` (`codCondPgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cond_pgto`
--

CREATE TABLE IF NOT EXISTS `cond_pgto` (
  `codCondPgto` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `qtdeParcelas` int(11) NOT NULL,
  `intervalo` int(11) NOT NULL,
  PRIMARY KEY (`codCondPgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE IF NOT EXISTS `contas_pagar` (
  `documento` int(11) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `codCondPgto` int(11) NOT NULL,
  `dataEmissao` date NOT NULL,
  `dataVencimento` date NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `valorRestante` decimal(15,2) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `primeiroPrazo` date NOT NULL,
  `situacao` char(1) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`documento`),
  KEY `codPessoa` (`codPessoa`),
  KEY `codCondPgto` (`codCondPgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE IF NOT EXISTS `contas_receber` (
  `documento` int(11) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `codOs` int(11) NOT NULL,
  `dataEmissao` date NOT NULL,
  `dataVencimento` date NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `valorRestante` decimal(15,2) NOT NULL,
  `valorTotal` decimal(15,2) NOT NULL,
  `situacao` char(1) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  PRIMARY KEY (`documento`),
  KEY `codPessoa` (`codPessoa`),
  KEY `codOs` (`codOs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_pagar`
--

CREATE TABLE IF NOT EXISTS `detalhes_pagar` (
  `codLancamento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `valorPago` decimal(15,2) NOT NULL,
  `valorRestante` decimal(15,2) NOT NULL,
  `dataPgto` date NOT NULL,
  PRIMARY KEY (`codLancamento`,`documento`),
  KEY `documento` (`documento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_receber`
--

CREATE TABLE IF NOT EXISTS `detalhes_receber` (
  `documento` int(11) NOT NULL,
  `codLancamento` int(11) NOT NULL,
  `valorPago` decimal(15,2) NOT NULL,
  `valorRestante` decimal(15,2) NOT NULL,
  `dataPgto` date NOT NULL,
  PRIMARY KEY (`documento`,`codLancamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_compra`
--

CREATE TABLE IF NOT EXISTS `item_compra` (
  `codItem` int(11) NOT NULL,
  `codCompra` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `precoCompra` decimal(15,2) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  PRIMARY KEY (`codItem`,`codCompra`,`codProduto`),
  KEY `codProduto` (`codProduto`),
  KEY `codCompra` (`codCompra`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_servico`
--

CREATE TABLE IF NOT EXISTS `item_servico` (
  `codItem` int(11) NOT NULL,
  `codOs` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  PRIMARY KEY (`codItem`,`codOs`,`codProduto`),
  KEY `codProduto` (`codProduto`),
  KEY `codOs` (`codOs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_servico`
--

CREATE TABLE IF NOT EXISTS `ordem_servico` (
  `codOs` int(11) NOT NULL,
  `codCondPgto` int(11) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `dataEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `prevEntrega` date NOT NULL,
  `valorTotal` decimal(15,2) NOT NULL,
  `valorPeca` decimal(15,2) NOT NULL,
  `qtdePeca` int(11) NOT NULL,
  `situacao` char(1) DEFAULT NULL,
  PRIMARY KEY (`codOs`),
  KEY `codPessoa` (`codPessoa`),
  KEY `codCondPgto` (`codCondPgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_funcionario`
--

CREATE TABLE IF NOT EXISTS `os_funcionario` (
  `codServFunc` int(11) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `codOs` int(11) NOT NULL,
  PRIMARY KEY (`codServFunc`,`codPessoa`,`codOs`),
  KEY `codPessoa` (`codPessoa`),
  KEY `codOs` (`codOs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `codPessoa` int(11) NOT NULL,
  `codCidade` int(11) NOT NULL,
  `nomePessoa` varchar(60) NOT NULL,
  `razaoSocial` varchar(60) DEFAULT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `ie_rg` varchar(20) DEFAULT NULL,
  `endereco` varchar(60) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `tipoPessoa` char(1) NOT NULL,
  `fone1` varchar(20) NOT NULL,
  `fone2` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dataCadastro` date NOT NULL,
  `situacao` char(1) NOT NULL,
  `classificacaoPessoa` char(1) NOT NULL,
  PRIMARY KEY (`codPessoa`),
  KEY `codCidade` (`codCidade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codProduto` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `qtdeEstoque` int(11) NOT NULL,
  `custo` decimal(15,2) NOT NULL,
  `cor` varchar(20) DEFAULT NULL,
  `referencia` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(20) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `login` varchar(40) NOT NULL,
  PRIMARY KEY (`codUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `nomeUsuario`, `senha`, `tipo`, `login`) VALUES
(5, 'Admin', 'd0489f1b7263192297d8659fdfc6213d', '1', 'admin'),
(4, 'Jean Carlos', '4d86d580b9122289ec5a242fd33e390e', '1', 'jean-c1818@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
