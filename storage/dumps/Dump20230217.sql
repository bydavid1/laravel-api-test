-- MySQL dump 10.13  Distrib 8.0.31, for macos12 (x86_64)
--
-- Host: 146.190.113.66    Database: laravel_api_test
-- ------------------------------------------------------
-- Server version	5.7.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_reset_tokens_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2019_12_14_000001_create_personal_access_tokens_table',1),(17,'2023_02_15_223448_create_products_table',1),(18,'2023_02_16_165555_create_reset_password_codes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'LaravelBase8Token','2b2dbb2700e87508a0b27d51c4c6a15a670459e366a84b862d898c251b11677b','[\"*\"]',NULL,NULL,'2023-02-17 13:02:58','2023-02-17 13:02:58'),(2,'App\\Models\\User',1,'LaravelBase8Token','c9c96eb754b5fcb307ed79ef20bcca7a7e37c798d08380c42984af64171f2514','[\"*\"]',NULL,NULL,'2023-02-17 13:04:46','2023-02-17 13:04:46'),(3,'App\\Models\\User',1,'LaravelBase8Token','7e6736ceed38b753c0abde11b100a71e01b160795348b25c43144bd57dc06848','[\"*\"]',NULL,NULL,'2023-02-17 13:05:18','2023-02-17 13:05:18'),(4,'App\\Models\\User',1,'LaravelBase8Token','b7581eb2388598afe3c1fab4727db489ed516109bee3040be84acbbecfdba31f','[\"*\"]',NULL,NULL,'2023-02-17 13:06:07','2023-02-17 13:06:07'),(5,'App\\Models\\User',1,'LaravelBase8Token','7a1563b51eea8d1fb06b5cf136e8e0d3e361f0ddbe6f06fa630d5b52e604ff9f','[\"*\"]','2023-02-17 14:06:31',NULL,'2023-02-17 13:06:30','2023-02-17 14:06:31'),(6,'App\\Models\\User',7,'LaravelBase8Token','4fc31d51ac6dbc9bd507d0e01e9a3a98a8e77b5225edd80677ee35da437b2520','[\"*\"]',NULL,NULL,'2023-02-17 13:19:37','2023-02-17 13:19:37');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'chc-03671564','necessitatibus architecto minus',85,201.79,'Magni excepturi unde dolores reiciendis repudiandae sit voluptatibus deleniti.','https://via.placeholder.com/640x480.png/0044ff?text=molestias','2023-02-17 13:01:45','2023-02-17 13:01:45'),(2,'sjh-37360429','voluptatibus tempore similique',90,441.08,'Fugiat laborum odio odio ipsa vitae quam.','https://via.placeholder.com/640x480.png/00bbdd?text=recusandae','2023-02-17 13:01:45','2023-02-17 13:01:45'),(3,'wan-20054997','quo aut quis',13,576.25,'Aut ex pariatur quos voluptas qui perspiciatis.','https://via.placeholder.com/640x480.png/003322?text=hic','2023-02-17 13:01:45','2023-02-17 13:01:45'),(4,'gwi-17466371','reiciendis tempora aut',24,975.58,'Quas dolorem omnis in assumenda cupiditate iusto.','https://via.placeholder.com/640x480.png/008877?text=ullam','2023-02-17 13:01:45','2023-02-17 13:01:45'),(5,'oop-89084188','amet cupiditate deleniti',86,447.41,'Asperiores nesciunt et est.','https://via.placeholder.com/640x480.png/001133?text=perferendis','2023-02-17 13:01:45','2023-02-17 13:01:45'),(6,'efj-05288662','natus neque autem',3,788.84,'Quaerat sit saepe molestias quidem.','https://via.placeholder.com/640x480.png/003344?text=voluptas','2023-02-17 13:01:45','2023-02-17 13:01:45'),(7,'plg-79637078','consequatur est iure',53,346.61,'Explicabo quae et et illo sit explicabo.','https://via.placeholder.com/640x480.png/0033dd?text=autem','2023-02-17 13:01:45','2023-02-17 13:01:45'),(8,'xju-79001076','iste ut architecto',59,520.44,'Officiis ea nam quia ea omnis quidem maiores.','https://via.placeholder.com/640x480.png/004433?text=nobis','2023-02-17 13:01:45','2023-02-17 13:01:45'),(9,'yir-19277982','nesciunt magnam illum',58,624.99,'Delectus magnam magnam iure aliquam quisquam est.','https://via.placeholder.com/640x480.png/005500?text=maxime','2023-02-17 13:01:45','2023-02-17 13:01:45'),(10,'oah-85615857','magni impedit voluptas',69,366.78,'Modi libero dignissimos qui sit exercitationem.','https://via.placeholder.com/640x480.png/0066cc?text=doloribus','2023-02-17 13:01:45','2023-02-17 13:01:45');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password_codes`
--

DROP TABLE IF EXISTS `reset_password_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_password_codes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reset_password_codes_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password_codes`
--

LOCK TABLES `reset_password_codes` WRITE;
/*!40000 ALTER TABLE `reset_password_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset_password_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juan','juan123','juan@example.com',1234567,'1990-01-01',NULL,'$2y$10$2AHkucogDdOzpD0V2HvaQ.vDmnNBcVP.KunXkaWmX.LxWcJvQcm1W',NULL,NULL,NULL),(2,'User 6 Updated','username6','user6@test.com',1234712,'2012-12-12',NULL,'password123',NULL,NULL,'2023-02-17 13:11:17'),(3,'Pedro','pedro123','pedro@example.com',3456789,'1985-12-31',NULL,'$2y$10$IN07Iy0xLPu8lgtSIGqaFuM3AWIeMZL2e3/zbjpl1tG20Xga.svAW',NULL,NULL,NULL),(4,'Lucia','lucia123','lucia@example.com',4567890,'1994-07-15',NULL,'$2y$10$VRqwhbg9eejLh6j1rcWcfuhCjM5hwDfuT2fiZ78tWNAAPYERr01k6',NULL,NULL,NULL),(5,'Jorge','jorge123','jorge@example.com',5678901,'1998-11-21',NULL,'$2y$10$wM9WIKQXAHMilwXPuJeTv.v4PO1QixgjZqByLOTWeo0.RwV1zKMd.',NULL,NULL,NULL),(6,'Byron Jimenez 2','Byron2','byronjimenez99112@gmail.com',1234712,'2012-12-12',NULL,'$2y$10$N3ugAaR6e1ol5Dw15W7grO3vNiq85/C2Sxy8BkhvgbnF3bqiJXN0C',NULL,'2023-02-17 13:08:31','2023-02-17 13:08:31'),(7,'Byron Jimenez','Byron','byronjimenez9911@gmail.com',1234712,'2012-12-12',NULL,'$2y$10$oVD0p3tGw0xskSEfwJ8.w.0etVqj0RQByowIdrQm3aPWD.pAkKJHW',NULL,'2023-02-17 13:19:37','2023-02-17 13:21:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-17  8:37:33
