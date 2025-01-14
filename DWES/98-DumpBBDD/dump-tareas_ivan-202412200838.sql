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
INSERT INTO `tareas` VALUES (1,'Dia de cumpleaños','dia que cumplo años','2025-07-16',2,_binary '�PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0�\0\0\0�\0\0\0��.\0\0\0sRGB\0�\�\�\0\0\0gAMA\0\0���a\0\0\0	pHYs\0\0\�\0\0\�\�o�d\0\0\�IDATx^\�\�!x\�L\�\�\�*pHp\�\�1s��\�\�Q\�\r�C\r\�܆\�@\r\�@���8p{\�\�\�˵M/mZ�\�\��<O���\�\��\'�\\\�\�\�2���ܟ��\�J�C(a��9�\�J�C(a��9�\�J�C(a��9�\�J�C(a��9�\�J�C(a��9�\�J�C(a��9���7o\�dW�\\\�Ν;��\�Ϟ=s?�T\�R�\�˗��?��4\�ϟ\����㶐�JYA\�@J�\�rk\'Tm�����%����������,\�k\�Ֆ\n:�2�\�\�^!�\�\�\�n�:_m���\���e�0�7o\�̞>}궪S�\�T}1�\�(��\�/�!׽:�\�\�\�\��\�\�\�\�w!�r�v�]Ѥ\�\�\��WO\�.�P�\�\�\�-�\'?�t\�LF�\�[\�}\��\�\�uI�K\�	\'�\���S��D\Z]��3�B(�\���\�@\�\":�R��f%�oY\�k8E��1ߩ#\�\�Ɔ[�P)KL�R\�\�����J9cq �����%�Q)iq�F��9�r�耑�P\�\�\�\�Nm\�\�\�:\�)K\�u�\�\�˗lqq�ׇr\Z�,\�BY��P*�\n��)ׯ_\�:��,�\�{\�t\�\��T\�A�@�#�S��ͣG�\�V��\�\�l~~\�ma(�1���T\�!wV\�^�!�%\�\�l!X\�N1(��>F\�$��\�\�\�v!\\ZT1\�#=vxxx���t���R�<���P&�+�U\�ХK��>C \�\�%�j�<x\��m�\�Z\��e�渶�6�\�8����H��{\�n\�X@\�x��IeM\�V.�\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�PN@�\�.//�>و\�x�q~�=NN*\�W:*\��\�#a E�7Q=\�G�\�\�߿�۷og�^�r�\�S\�Ԡ��JY\�Ǐ�k׮���\�\�N\�\�\�e/^�\�6l��\�^ɲV��\�\�\�-ԁPVp\�޽^\�\�Y㗗�a�\�1�Sb�N��s\�(�~�\�\�9\�ߋ\r��j���^�|\�\�N\�e\�k(@/�\�	ih}\'\n�D�\�\�Cw>�P8\�Z\�.\\p[y�\�+��J�\�ݻw�@\�\�\�\�2\�ؔ�!�	�?\�֘Sqe�A�\������ra��^�\�)\�\�Ǐ\��a�В\�lÄ��\�\�\�\�k\�l�P�7d�� \�\�\�(�~$��\�\nq�z|	�ʈ��\��� i}\�dN�0|���	��몞�P>�\\����f\n�3ZB���U[� ��²��\��\�u^�\����Xx*���\�^\�0��\�*\�˭Ny��ۓ�s\�[˲\'O��5\���¸��\�\�l����ݿ����l]x\�!���\\\�C� *��J\�n�n#V5jr�\������*|5�\��\�m\Z�oO�K���u��*eSŭ\�I���}�J\�\�Z\�w\��\Zʸ���7�\�6�.��\�\�\�\�}\�\�P\�\r�B0&�\�m�snn�\�y�eQ#\�)\�AB\�^�\�.\�[7=hv\�\�-��e\�߿wk\�r\�l�Ǐ�ZY\'�*\�}��P\�ĩF�2n\�(�u\�\�\��Bo�3\�\":՘Pj\�\�HQ\�]�Uo�Tq�\\?[\�\�\�Y՘P��_~\r��\Z*:k\�\�\�\�n��F������\�\�\�\�O#B�\�*\�|\�5���N~{3o�\���\�\Z\�_&u�KH-�\���\"����6Y#Bv�\�/�q \�FSX�\��B�F�\���\n4*����\�{�镯�f���!%��\�~�j��PV�\ZH/l�P-\�\�DU)q�D\Z��\�\�ixFg����\�\�iy ��\�xAS\�3:%vvv�=Ľq9\�1	\�#�C\�Q=�\�&�BjH@�����\�m(\�\�{\rl\�ô��0\�!;6P�Aa4B9�\�\�����;\�9\�7\�Z��}�֭��\�8�V\���|�\�\�j�\�;\�	/\��Nn�7�2��\��oߺ\�/^\�L0	��y�N4\�ʀ.�\�\�\�\�1h�\�Ғ[˲ׯ_�5\�*f\�i�?}~\�\�g�߯N\r\�]^�P\�\�N�U\�ؤ�\�\�Wa�ZWO\�9�\�ŝ��\��oUjQ8\Z�_\�CWIj�E�\��\�\�`��\�T\�C�\�|@�YP8ÁT\��N5�\��9�\�\�ֲ��=\�\�Ik{VWW\�\��Q\�p���4g�n*,�r\�\�U��e�>}rk�ƅR�\�\�\�\�t\�\�l袺G���\�xc��\�\�����\r,�\�q�1�TcB#X�h�ד-\r\ZHU�Ɣy{βƄ2��M\�Cu�>�wiir\�l\�9e8m�lll��\'?|w�i\�6��!굮�\�ᄥM@\�sCԋH��\�\��\no^U\�\�\�G/!C�U\�A�\�,�R\�*%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%\�!�0�P\�B	s%�ɲ�G�\�q��\0\0\0\0IEND�B`�',0);
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
