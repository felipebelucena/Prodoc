-- MySQL dump 10.13  Distrib 5.5.14, for Linux (i686)
--
-- Host: localhost    Database: prodoc
-- ------------------------------------------------------
-- Server version	5.5.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_atividade` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
INSERT INTO `atividades` VALUES (1,NULL,'Atividade acadÃªmica em nÃ­vel superior na UNICAP, com atÃ© 19 horas semanais, por ano',1),(2,NULL,'Atividade acadÃªmica em nÃ­vel superior na UNICAP, de 20 a 39 horas semanais, por ano',2),(3,NULL,'Atividade acadÃªmica em nÃ­vel superior na UNICAP, com 40 horas semanais, por ano',3),(4,NULL,'Atividade, por ano letivo, em nÃ­vel superior fora da UNICAP, em regime de mais de 20 horas semanais, ou, nÃ£o cumulativamente, por ano social de atividade profissional devidamente compravada pelo interessado e reconhecida pela Universidade, desde que tais atividades sejam exercidas em Ã¡rea de real interesse do Departamento, em, no mÃ¡ximo, 5 (cinco) pontos.',1),(5,NULL,'Livros publicados',16),(6,NULL,'CapÃ­tulo de livro',4),(7,NULL,'PublicaÃ§Ã£o em revistas indexadas de circulaÃ§Ã£o internacional',3),(8,NULL,'PublicaÃ§Ã£o em revistas indexadas de circulaÃ§Ã£o nacional',2),(9,NULL,'Trabalho completo publicado em anais de eventos nacionais e internacionais',1),(10,NULL,'OrientaÃ§Ã£o de doutorado em programa reconhecido pelo MEC',10),(11,NULL,'Co-orientaÃ§Ã£o de doutorado em programa reconhecido pelo MEC',5),(12,NULL,'OrientaÃ§Ã£o de mestrado em programa reconhecido pelo MEC',6),(13,NULL,'Co-orientaÃ§Ã£o de mestrado em programa reconhecido pelo MEC',3),(14,NULL,'LideranÃ§a de grupos de pesquisa credenciados pelo CNPq',2),(15,NULL,'ParticipaÃ§Ã£o em eventos tÃ©cnico-cientÃ­ficos no exterior com apresentaÃ§Ã£o de trabalho',3),(16,NULL,'ParticipaÃ§Ã£o em eventos tÃ©cnico-cientÃ­ficos no paÃ­s com apresentaÃ§Ã£o de trabalho',2),(17,NULL,'TraduÃ§Ã£o de livro',3),(18,NULL,'TraduÃ§Ã£o de artigo, capÃ­tulo de livro ou de trabalho tÃ©cnico-cientÃ­fico',1),(19,NULL,'ProduÃ§Ã£o de filme e vÃ­deo de curta e longa duraÃ§Ã£o',5),(20,NULL,'ElaboraÃ§Ã£o de Softwares (programas)',5),(21,NULL,'OrganizaÃ§Ã£o de compÃªndios',3),(22,NULL,'OrientaÃ§Ã£o de bolsista de IniciaÃ§Ã£o CientÃ­fica.',1),(23,NULL,'ParticipaÃ§Ã£o em Ã“rgÃ£os e Colegiados, na condiÃ§Ã£o de titular, ou em comissÃµes nomeadas pelo Diretor-Presidente ou Reitor',1),(24,NULL,'ParticipaÃ§Ã£o em banca examinadora de doutorado',3),(25,NULL,'ParticipaÃ§Ã£o em banca examinadora de mestrado',2),(26,NULL,'ParticipaÃ§Ã£o em banca examinadora de concurso pÃºblico em IES',2),(27,NULL,'ParticipaÃ§Ã£o em banca examinadora de seleÃ§Ã£o',1),(28,NULL,'CoordenaÃ§Ã£o de projetos de pesquisa aprovados por Ã³rgÃ£os de fomento Ã  pesquisa',1),(29,NULL,'PÃ³s-doutorado ou equivalente',10),(30,NULL,'PrÃªmios conferidos por trabalhos tÃ©cnicos ou cientÃ­ficos.',5);
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(30) COLLATE utf8_bin NOT NULL,
  `vagas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) COLLATE utf8_bin NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `titulo` varchar(20) COLLATE utf8_bin NOT NULL,
  `nome_cargo` varchar(30) COLLATE utf8_bin NOT NULL,
  `data_cargo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_total` timestamp NULL DEFAULT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (1,'12345','Zaphod Beeblebox','mestrado','Professor Assistente I','2011-08-17 14:42:57','2011-08-17 14:42:57',0),(2,'1234','Ford Prefect','doutorado','Professor Assistente II','2011-08-17 15:29:53','2011-08-17 14:43:24',16);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitos`
--

DROP TABLE IF EXISTS `requisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_requerente` varchar(20) COLLATE utf8_bin NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comprovante` varchar(100) COLLATE utf8_bin NOT NULL,
  `atividade` int(11) NOT NULL,
  `pontos` int(11) NOT NULL,
  `estado` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitos`
--

LOCK TABLES `requisitos` WRITE;
/*!40000 ALTER TABLE `requisitos` DISABLE KEYS */;
INSERT INTO `requisitos` VALUES (1,'1234','2011-08-17 15:26:49','/Prodoc/public/images/comprovantes/1234/comprovante.jpg',11,5,'recusado'),(2,'1234','2011-08-17 15:29:11','/Prodoc/public/images/comprovantes/1234/42.png',5,16,'aceito');
/*!40000 ALTER TABLE `requisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) COLLATE utf8_bin NOT NULL,
  `senha` varchar(20) COLLATE utf8_bin NOT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','admin','admin'),(2,'12345','123','professor'),(3,'1234','123','professor');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-08-17 12:35:27
