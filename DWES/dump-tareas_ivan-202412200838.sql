-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: tareas_ivan
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `prioridad` int(11) NOT NULL,
  `img_tarea` mediumblob NOT NULL,
  `realizada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_tarea`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (1,'Dia de cumplea√±os','dia que cumplo a√±os','2025-07-16',2,_binary 'âPNG\r\n\Z\n\0\0\0\rIHDR\0\0\0•\0\0\0®\0\0\0Åµ.\0\0\0sRGB\0Æ\Œ\È\0\0\0gAMA\0\0±è¸a\0\0\0	pHYs\0\0\√\0\0\√\«o®d\0\0\”IDATx^\Ì\›!x\”L\«\Ò\*pHp\√\Õ1sõ∑\Õ\ÕQ\√\r™C\r\«‹Ü\‘@\r\‘@†¿Å8p{\Û\Î\Ó∫ÀµM/mZ˛\œ\Ú˝<Oí∂º\›\Ô˝\'ó\\\Ó\Œ\Á2¿êˇ‹üÄÑ\ÊJòC(a°Ñ9Ñ\ÊJòC(a°Ñ9Ñ\ÊJòC(a°Ñ9Ñ\ÊJòC(a°Ñ9Ñ\ÊJòC(a°Ñ9Ñ\ÊJòC(a°Ñ9Ñ≤Ç7o\ﬁdWÆ\\\…Œù;ó¥\Ë≥œû=s?çT\€R¡\ÂÀó≥ü?∫≠4\Áœü\œ˛¸˘„∂êÇJYA\’@J´\’rk\'Tmóóó©†%®îâ∂∂∂≤á∫≠,\˜k\Û’ñ\n:ï2¡\ﬁ\ﬁ^!ê\Î\Î\În≠:_mˇ˛˝\€˝˝eÇ0ê7o\ﬁÃû>}Í∂™SÖ\ÙT}1Ä\ﬂ(ßØ\…/˘!◊Ω:û\Õ\Õ\Õ\¬˛\Ê\Ê\Êé\Ûêªw!ÑrÑvª]—§\Íº\⁄\ˆôWO\˜.ÑPñ\ÿ\›\›-Ñ\'?ót\ÔLF¡\Ã[\ÂÖ}\„≠\Ô\·uIùK\Œ	\'•\ÏøÜSÑ≤D\Z]æ©3êB(£\ıù®\Ó@\Í\":£Rñòf%ãoY\Úk8E•ú1ﬂ©#\‰\∆∆Ü[ÉP)KL£R\Í\‘¡Ø†àJ9cq ©í˝®î%¶Q)iqèF•Ñ9ÑrÜËÄëÜP\Œ\»\Œ\ŒNm\›\ﬂ\Œ:\Œ)K\‘u˛\˜\ÂÀólqq±◊ár\Z∑,\œBY¢éP*à\n§Ç)◊Ø_\œ:ùÅ,¡\·{\ t\»\ˆÅT\’Aò@ñ#îS§ÜÕ£Gè\‹Vñµ\€\Ìl~~\ﬁma(æ1òæøT\Ì!wV\«^§!î%\Ú\√l!X\⁄N1(êì>F\—$Ñ≤\ƒ\ˆ\ˆv!\\ZT1\’#=vxxxº¥¥tº≤≤R¯<Å¨éP&à+¶U\√–•Kó˙>C \«\√%°j¨<x\¿m•\·Z\‰¯e∫Ê∏∂∂6≤\◊8Åú°¨H¡º{\˜n\ÈX@\”xûßIeM\ËíV.û\√B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áPN@è\⁄.//ó>Ÿà\Íxöq~˙=NN*\œW:*\Â¸\Ù#a Eì7Q=\«G•\√\Ôﬂø≥€∑ogØ^ΩrØ\ÙS\ı‘†®éJY\—«è≥k◊Æπ∫∫\Í\÷N\≈\’\Èe/^º\Ë6læˇ\Ó^…≤V´ï\Ì\Ô\Ôª-‘ÅPVp\ÔﬁΩ^\‘\·Y„óóçaÆ\·•1ùSb¥Nß£s\ÔÓ¢±(ø~˝\Í\ﬁ9\·ﬂã\rºäj®îâ^æ|\È\÷N\Ÿe\Ík(@/ú\–	ih}\'\nßD˛\\·Cw>úP8\ÍöZ\›.\\p[yπ\‰+ÆÑJô\‡›ªwΩ@\Œ\Õ\Õ\ı2\∆ÿîì!î	û?\Ó÷òSqeâA£\ˆÆ¨¨∏µraµ§^ë\Œ)\—\Ô«è\«˘a∫–í\÷l√Ñüì\Õ\Õ\Õ\¬k\ÒléPê7d˙¶ \Ÿ\ÿ\ÿ(ù~$¸¨\Ë≥\nq¯z|	É à¶∫\ÀΩΩ i}\–dN±0|ûÇ©	ü¸Î™ûçP>˛\\§™•™f\nˇ3ZBÖ˝ïU[ú îé¬≤∞∞\–ê\÷u^ô\ ˇúñXx*∞øø\Ô^\≈0¥æ\Õ*\ŒÀ≠Nyò∫€ì∫s\Áé[À≤\'Oû∏5\√ùú¬∏∏∏\ÿ\Îl±ΩΩù›øøªû™l]x\◊!èØº\\\„C© *êæJ\Ínçn#V5jrß\˝¸¥†∂*|5˛\∂\’m\Z¥oOèK®úøuâà*eS≈≠\ÌI∫ô˘}˚J\„ã\ÈZ\Ùw\Îä\Z ∏µ≠ª7ì\√6å.Öß\Û\Ë\Ë\»}\“\ÿP\Ê\rôB0&Ω\€mÖsnnÆ\˜y™eQ#\œ)\’AB\Áí^ª\›.\Ì¥[7=hv\Î\÷-∑ïe\Ôﬂøwk\Ër\·lå«è™ZY\'ã*\¬}¶ØP\’ƒ©FÖ2n\ÿ(êu\›\ˆ\˜õBo¯3\Ù\":’òPj\ÿ\‘HQ\À]˚Uo¢Tqã\\?[\Â\÷\ÊY’òP™˘_~\rõê\Z*:k\Òçñ\√\√\√n°≤Få˛ßàª∑\È\ﬂ\÷\ÙÜO#B©\Í*\Î|\Ï5ªï¯N~{3o¯\ˆ°•\…\Z\Ò_&uØKH-˛\æñ\"ºÜ©ê6Y#Bv¥\’/øq \„FSXô\’¿B∫FÑ\“®Æ\n4*ê≤ææ\ﬁ{øÈïØ™füºå!%ê¢\Í~éjôéPVê\ZH/l¿P-\”\ DU)qµD\Zæ©\„\“ixFgÑ≠≠≠\¬\»iy ≥º\œxAS\ƒ3:%vvv∫=ƒΩq9\Í1	\Ù#îC\ËQ=∂\‡&∑BjH@øè£££\Ó®m(\«\·{\rl\Â√¥∞∞0\ˆ!;6PìAa4B9Ä\¬\Œ˛∞ªª;\ˆ9\‰ç7\‹ZñΩ}˚÷≠°î\ﬂ8•V\ı¸¸|Ø\≈\‹jµ\‹;\„	/\Â¡Nnµ7ï2¢ñ\ˆ∑oﬂ∫\Î/^\ÏL0	˙˝y§N4\  Ä.ˇ\ƒ\œ\Ó\‘1h¿\““í[À≤◊Ø_ª5\Â*f\„i∏?}~\—\Ú∫®gíﬂØN\r\Ë]^éP\Ê\‚N¿U\Óÿ§¯\ı\ÎWaˇZWO\¬9°\Ã≈ùÄß\—âoUjQ8\Z∞_\„CWIjßE˚\ˆΩ\À\√`™í\‚T\„C©\«|@òYP8√ÅT\ıêN5∂\ı≠9ª\◊\÷÷≤ΩΩ=\˜\ Ik{VWW\Û\Ò¯Q\ﬂp¢ë°4g∑n*,≥r\ı\ÍU∑ñeü>}rkê∆ÖR∑\Õ\Ÿ\›\Èt\‹\÷lË¢∫G•å∏\√xcÑ∑\’\»¯ó˛á\r,µ\Œq¢1°TcB#X¯h˘◊ì-\r\ZHUˇ∆îy{Œ≤∆Ñ2§ñM\◊Cu°>˛wiir\Âl\Ã9e8màlll∏µ\'?|w˚i\Íú6¶é!ÍµÆé\∆·Ñ•M@\œsC‘ãHó©\‚\Œ¿\no^U\›\÷\ŸG/!CÜU\ŒAï\Ù,£R\¬*%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%\Ã!î0áP\¬B	s%å…≤ˇGé\Èq¸õ\0\0\0\0IENDÆB`Ç',0);
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tareas_ivan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-20  8:38:51
