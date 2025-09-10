-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: fyp-travel.com
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('356a192b7913b04c54574d18c28d46e6395428ab','i:2;',1738067606),('356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1738067606;',1738067606),('a17961fa74e9275d529f489537f179c05d50c2f3','i:1;',1737452908),('a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1737452908;',1737452908),('filament-fabricator::page-urls','a:1:{i:1;s:9:\"/homepage\";}',2053428022);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_layanan`
--

DROP TABLE IF EXISTS `category_layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_layanan` (
  `id` char(36) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama_category` varchar(255) DEFAULT NULL,
  `seq_no` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_layanan`
--

LOCK TABLES `category_layanan` WRITE;
/*!40000 ALTER TABLE `category_layanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` char(36) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counters`
--

DROP TABLE IF EXISTS `counters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counters` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counters`
--

LOCK TABLES `counters` WRITE;
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
/*!40000 ALTER TABLE `counters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infografis`
--

DROP TABLE IF EXISTS `infografis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infografis` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infografis`
--

LOCK TABLES `infografis` WRITE;
/*!40000 ALTER TABLE `infografis` DISABLE KEYS */;
/*!40000 ALTER TABLE `infografis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layanan`
--

DROP TABLE IF EXISTS `layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layanan` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layanan`
--

LOCK TABLES `layanan` WRITE;
/*!40000 ALTER TABLE `layanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_08_19_150254_create_blogs_table',1),(5,'2024_10_10_055636_create_infografis_table',1),(6,'2024_10_10_091340_create_gallery_table',1),(7,'2024_10_10_115201_create_video_table',1),(8,'2024_10_26_025019_create_counter_table',1),(9,'2024_10_26_030544_create_testimoni_table',1),(10,'2024_10_26_032348_create_teams_table',1),(11,'2024_10_27_030616_create_category_layanan_table',1),(12,'2024_10_27_031842_create_layanan_table',1),(13,'2024_10_27_033738_create_contact_table',1),(14,'2024_12_04_060215_add_wording_position_column_to_msslides',2),(15,'2024_12_04_070323_create_msproducts_table',3),(16,'2024_12_24_081508_create_pages_table',4),(17,'2024_12_24_081509_fix_slug_unique_constraint_on_pages_table',4),(28,'2025_01_23_022101_create_tours_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msblogs`
--

DROP TABLE IF EXISTS `msblogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msblogs` (
  `id` char(36) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `is_popular` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `msblogs_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msblogs`
--

LOCK TABLES `msblogs` WRITE;
/*!40000 ALTER TABLE `msblogs` DISABLE KEYS */;
INSERT INTO `msblogs` VALUES ('9da43534-65ec-45ac-8811-96a515a70105','test-untuk-title','test untuk title','title disini','description disini','keyword1, keyword2','blog-images/01JE7Y8Q9ASQMGEF5MVR2J6RMR.png','<p>content here</p>',NULL,1,'2024-12-03 21:18:48','2024-12-03 22:55:48'),('9e137613-5ae7-4e23-98db-1a1df7861be2','contoh-title','contoh title','meta title','descri','keyword, keyword2','blog-images/01JJPB6S5WQN9NQGVPXX7KTPV9.jpg','<p>slug ini adalah</p>',NULL,1,'2025-01-28 04:37:05','2025-01-28 04:37:05');
/*!40000 ALTER TABLE `msblogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msproducts`
--

DROP TABLE IF EXISTS `msproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msproducts` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msproducts`
--

LOCK TABLES `msproducts` WRITE;
/*!40000 ALTER TABLE `msproducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `msproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msslides`
--

DROP TABLE IF EXISTS `msslides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msslides` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `wording_position` enum('left','center','right') NOT NULL DEFAULT 'left',
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msslides`
--

LOCK TABLES `msslides` WRITE;
/*!40000 ALTER TABLE `msslides` DISABLE KEYS */;
INSERT INTO `msslides` VALUES ('9da42de7-f4f5-4ff9-8a3e-9a731119201f','title','subtitle','<p>description</p>','left',NULL,'image/01JE7X3BFPH20JBEQQ4DH8N2KT.png','text','link',2,1,'2024-12-03 20:58:23','2024-12-03 21:01:59'),('9da42f23-ef95-40f1-9f2b-b8ae31417ba5','title 2','subtitle 2','<p>desc 2</p>','left',NULL,'image/01JE7X9NPK2VGTAWMX7NHK0WF7.png','text 2','link 2',1,1,'2024-12-03 21:01:50','2024-12-03 21:01:59');
/*!40000 ALTER TABLE `msslides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL DEFAULT 'default',
  `blocks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`blocks`)),
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_parent_id_unique` (`slug`,`parent_id`),
  KEY `pages_parent_id_foreign` (`parent_id`),
  KEY `pages_title_index` (`title`),
  KEY `pages_layout_index` (`layout`),
  CONSTRAINT `pages_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'homepage','homepage','default','[{\"type\":\"banner\",\"data\":{\"slides\":[{\"image\":\"slides\\/01JJ447HVAJBHFZPNR0K0M46CG.jpg\",\"textAlignment\":\"text-left\",\"smallTitle\":\"world trip\",\"bigTitle\":\"Keep The\",\"mediumTitle\":\"World In Your Hand\",\"buttonText\":\"discover your top destination\",\"buttonUrl\":\"https:\\/\\/google.com\"},{\"image\":\"slides\\/01JJ447HVE0PJ6R2QSDVWGKZXV.jpg\",\"textAlignment\":\"text-left\",\"smallTitle\":\"world trip\",\"bigTitle\":\"Keep The\",\"mediumTitle\":\"World In Your Hand\",\"buttonText\":\"discover your top destination\",\"buttonUrl\":\"https:\\/\\/google.com\"}],\"search_placeholder\":\"Dest\",\"search_button_text\":\"Ser\",\"searchPlaceholder\":\"DESTINATION\",\"searchButtonText\":\"\\u2315 Search\"}},{\"type\":\"product\",\"data\":{\"mainTitle\":\"Our Product\",\"subTitle\":\"We are the best\",\"products\":[{\"title\":\"Paket Tour\",\"image\":\"pages\\/01JJP96HDGGJHMQEHZ32GADAQA.png\",\"path\":\"\\/homepage\"},{\"title\":\"Travel Insurance\",\"image\":\"pages\\/01JJP96HDNC5J9NE6EGPB9Y62J.png\",\"path\":\"\\/homepage\"},{\"title\":\"Europamundo\",\"image\":\"pages\\/01JJP96HDPJV9M2PS4P6BA6JHB.png\",\"path\":\"\\/homepage\"},{\"title\":\"Medical Tourism\",\"image\":\"pages\\/01JJP96HDQAHCYKKCA2AMRBZTE.png\",\"path\":\"\\/homepage\"}]}},{\"type\":\"tour-list\",\"data\":{\"title\":\"Best Holiday Packages\",\"subTitle\":\"We are the best\",\"limit\":5,\"showInHome\":true}},{\"type\":\"explore\",\"data\":{\"mainTitle\":\"About Asia\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit<\\/p>\",\"exploreTitle\":\"Explore\",\"locationTitle\":\"Asia\",\"mapUrl\":\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3027.481692075607!2d-73.78032778444181!3d40.641311079339694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c26650d5404947%3A0xec4fb213489f11f0!2sJohn+F.+Kennedy+International+Airport!5e0!3m2!1sen!2s!4v1526891811523\",\"buttonText\":\"Open map\",\"enableGrayBackground\":false,\"contentAlignment\":\"text-right\"}},{\"type\":\"achievement\",\"data\":{\"mainTitle\":\"Our Achievement\",\"subTitle\":\"We are the best\",\"counterItems\":[{\"icon\":\"icon-support2\",\"number\":\"32654\",\"label\":\"Customers\",\"backgroundColor\":\"#fdb911\"},{\"icon\":\"icon-globe4\",\"number\":\"1021\",\"label\":\"Destinations\",\"backgroundColor\":\"#ee5b32\"},{\"icon\":\"icon-bus-front-view-with-sign\",\"number\":\"20096\",\"label\":\"Tours\",\"backgroundColor\":\"#00a4e1\"},{\"icon\":\"icon-menu\",\"number\":\"150\",\"label\":\"Tour Types\",\"backgroundColor\":\"#f7991b\"}]}},{\"type\":\"tour-list-banner\",\"data\":{\"limit\":5,\"showInHome\":true}},{\"type\":\"blog-list\",\"data\":{\"title\":\"From the blog\",\"subTitle\":\"We are the best\",\"limit\":5}},{\"type\":\"photo-gallery\",\"data\":{\"mainTitle\":\"Photo Gallery\",\"photoGalleryItems\":[{\"title\":\"Bali, Indonesia\",\"image\":\"photo-gallery\\/01JJPDR0H3NV7PZJJGKBHAD3Y3.jpg\"},{\"title\":\"Istanbul, Turki\",\"image\":\"photo-gallery\\/01JJPDR0H5RYMJ0FNEBQAR0729.jpg\"},{\"title\":\"Phuket, Thailand\",\"image\":\"photo-gallery\\/01JJPDR0H810QXF1KV24VEBHPV.jpg\"},{\"title\":\"Newyork, USA\",\"image\":\"photo-gallery\\/01JJPDR0H93YQC095FCMKH8ZT5.jpg\"}]}},{\"type\":\"testimoni\",\"data\":{\"mainTitle\":\"Testimoni\",\"subTitle\":\"What They Said\",\"photoGalleryItems\":[{\"photo\":\"photo-gallery\\/01JJPEEHQS0MVHYTSFKN5Q6SGR.jpg\",\"user\":\"Debora Fani\",\"rating\":5,\"comment\":\"Pelayanan kepada sy bersama tour ini sangat memuaskan jd langganan deh sm travel ini sukses selalu fyp.\"},{\"photo\":\"photo-gallery\\/01JJPEEHQVB5K6AV6M7CFV0T1R.jpg\",\"user\":\"Marylin Tjandra\",\"rating\":5,\"comment\":\"Pelayanan kepada sy bersama tour ini sangat memuaskan jd langganan deh sm travel ini sukses selalu fyp.\"}]}},{\"type\":\"email-c-t-a\",\"data\":{\"mainTitle\":\"Join Us Today\",\"subTitle\":\"We are the best\",\"description\":\"Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.\"}}]',NULL,'2025-01-21 00:49:32','2025-01-28 05:40:22');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('JCz5s9MZSyAz7QVKIw0mdVFxK9fPQN8pGAxEg3d5',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoicTlWWkRzS0ZUUnNubHVxT1NQZkw0MzlOSDZhRTh3ZURDZVFPMGFPRCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGRHMWowT013UWFZd3Z3aExyaERUUXVWRzJFcDhQTHlXa0I1TGRIaGpyL1hjUE1uODQySEgyIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Fzc2V0cy9mcm9udC9pbWFnZXMvZmF2aWNvbi5pY28iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjg6ImZpbGFtZW50IjthOjA6e319',1738068031);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` char(36) NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seq_no` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimoni` (
  `id` char(36) NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `text_testimoni` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimoni`
--

LOCK TABLES `testimoni` WRITE;
/*!40000 ALTER TABLE `testimoni` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tours` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `show_in_home` tinyint(1) NOT NULL DEFAULT 0,
  `short_description` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `min_age` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `max_people` int(11) NOT NULL,
  `tour_description` text NOT NULL,
  `departure_location` varchar(255) NOT NULL,
  `departure_time` varchar(255) NOT NULL,
  `itinerary_description` text NOT NULL,
  `itinerary_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`itinerary_items`)),
  `price_includes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`price_includes`)),
  `price_excludes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`price_excludes`)),
  `complementaries` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`complementaries`)),
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photos`)),
  `reviews` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`reviews`)),
  `order` int(11) NOT NULL DEFAULT 0,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES ('9e133ffc-4b24-4393-a9fd-fe56483de043','Grand Canyon Park',2800.00,'USD','01JJP2HV1T55Z8CXTT4YF098B5.jpg',1,'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo.','9 Days 8 Nights','San Francisco','10+','Jan 16\' - Dec 16\'','San Francisco',80,'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','Soekarno Hatta International Airport','3 Hours Before Flight Time','Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','[{\"day\":\"1\",\"title\":\"ARRIVE IN Z\\u00dcRICH, SWITZERLAND\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"},{\"day\":\"2\",\"title\":\"Z\\u00dcRICH\\u2013BIEL\\/BIENNE\\u2013NEUCH\\u00c2TEL\\u2013GENEVA\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"}]','[{\"item\":\"Air fares\"},{\"item\":\"3 Nights Hotel Accomodation\"},{\"item\":\"Tour Guide\"},{\"item\":\"Entrance Fees\"},{\"item\":\"All transportation in destination location\"}]','[{\"item\":\"Guide Service Fee\"},{\"item\":\"Driver Service Fee\"},{\"item\":\"Any Private Expenses\"},{\"item\":\"Room Service Fees\"}]','[{\"item\":\"Umbrella\"},{\"item\":\"Sunscreen\"},{\"item\":\"T-Shirt\"},{\"item\":\"Entrance Fees\"}]','[{\"image\":\"01JJP2HV1YGZ83ZMQHV26B91BD.jpg\",\"caption\":\"Caption\"}]','[{\"profile\":\"01JJP2HV1ZRR2S621NJ3CQRE97.jpg\",\"user_name\":\"Username\",\"comment\":\"Comment\",\"rating\":5,\"review_date\":\"2025-01-28\"}]',1,1,'2025-01-28 02:05:50','2025-01-28 02:05:50'),('9e1361bb-a69e-4cab-afe6-2e79915e6d18','Grand Canyon Park',2800.00,'USD','01JJP2HV1T55Z8CXTT4YF098B5.jpg',1,'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo.','9 Days 8 Nights','San Francisco','10+','Jan 16\' - Dec 16\'','San Francisco',80,'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','Soekarno Hatta International Airport','3 Hours Before Flight Time','Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','[{\"day\":\"1\",\"title\":\"ARRIVE IN Z\\u00dcRICH, SWITZERLAND\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"},{\"day\":\"2\",\"title\":\"Z\\u00dcRICH\\u2013BIEL\\/BIENNE\\u2013NEUCH\\u00c2TEL\\u2013GENEVA\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"}]','[{\"item\":\"Air fares\"},{\"item\":\"3 Nights Hotel Accomodation\"},{\"item\":\"Tour Guide\"},{\"item\":\"Entrance Fees\"},{\"item\":\"All transportation in destination location\"}]','[{\"item\":\"Guide Service Fee\"},{\"item\":\"Driver Service Fee\"},{\"item\":\"Any Private Expenses\"},{\"item\":\"Room Service Fees\"}]','[{\"item\":\"Umbrella\"},{\"item\":\"Sunscreen\"},{\"item\":\"T-Shirt\"},{\"item\":\"Entrance Fees\"}]','[{\"image\":\"01JJP2HV1YGZ83ZMQHV26B91BD.jpg\",\"caption\":\"Caption\"}]','[{\"profile\":\"01JJP2HV1ZRR2S621NJ3CQRE97.jpg\",\"user_name\":\"Username\",\"comment\":\"Comment\",\"rating\":5,\"review_date\":\"2025-01-28\"}]',2,1,'2025-01-28 03:40:12','2025-01-28 03:40:12'),('9e1361d2-02c1-47bb-8f45-7be36c8f9a27','Grand Canyon Park',2800.00,'USD','01JJP2HV1T55Z8CXTT4YF098B5.jpg',1,'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo.','9 Days 8 Nights','San Francisco','10+','Jan 16\' - Dec 16\'','San Francisco',80,'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','Soekarno Hatta International Airport','3 Hours Before Flight Time','Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','[{\"day\":\"1\",\"title\":\"ARRIVE IN Z\\u00dcRICH, SWITZERLAND\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"},{\"day\":\"2\",\"title\":\"Z\\u00dcRICH\\u2013BIEL\\/BIENNE\\u2013NEUCH\\u00c2TEL\\u2013GENEVA\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"}]','[{\"item\":\"Air fares\"},{\"item\":\"3 Nights Hotel Accomodation\"},{\"item\":\"Tour Guide\"},{\"item\":\"Entrance Fees\"},{\"item\":\"All transportation in destination location\"}]','[{\"item\":\"Guide Service Fee\"},{\"item\":\"Driver Service Fee\"},{\"item\":\"Any Private Expenses\"},{\"item\":\"Room Service Fees\"}]','[{\"item\":\"Umbrella\"},{\"item\":\"Sunscreen\"},{\"item\":\"T-Shirt\"},{\"item\":\"Entrance Fees\"}]','[{\"image\":\"01JJP2HV1YGZ83ZMQHV26B91BD.jpg\",\"caption\":\"Caption\"}]','[{\"profile\":\"01JJP2HV1ZRR2S621NJ3CQRE97.jpg\",\"user_name\":\"Username\",\"comment\":\"Comment\",\"rating\":5,\"review_date\":\"2025-01-28\"}]',3,1,'2025-01-28 03:40:27','2025-01-28 03:40:27'),('9e1361db-797c-429e-8dfb-ab60c7a1bfc2','Grand Canyon Park',2800.00,'USD','01JJP2HV1T55Z8CXTT4YF098B5.jpg',1,'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo.','9 Days 8 Nights','San Francisco','10+','Jan 16\' - Dec 16\'','San Francisco',80,'Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','Soekarno Hatta International Airport','3 Hours Before Flight Time','Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute. Consectetur adipisicing elit.','[{\"day\":\"1\",\"title\":\"ARRIVE IN Z\\u00dcRICH, SWITZERLAND\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"},{\"day\":\"2\",\"title\":\"Z\\u00dcRICH\\u2013BIEL\\/BIENNE\\u2013NEUCH\\u00c2TEL\\u2013GENEVA\",\"description\":\"Consectetur adipisicing elit, sed do eiusmod...\"}]','[{\"item\":\"Air fares\"},{\"item\":\"3 Nights Hotel Accomodation\"},{\"item\":\"Tour Guide\"},{\"item\":\"Entrance Fees\"},{\"item\":\"All transportation in destination location\"}]','[{\"item\":\"Guide Service Fee\"},{\"item\":\"Driver Service Fee\"},{\"item\":\"Any Private Expenses\"},{\"item\":\"Room Service Fees\"}]','[{\"item\":\"Umbrella\"},{\"item\":\"Sunscreen\"},{\"item\":\"T-Shirt\"},{\"item\":\"Entrance Fees\"}]','[{\"image\":\"01JJP2HV1YGZ83ZMQHV26B91BD.jpg\",\"caption\":\"Caption\"}]','[{\"profile\":\"01JJP2HV1ZRR2S621NJ3CQRE97.jpg\",\"user_name\":\"Username\",\"comment\":\"Comment\",\"rating\":5,\"review_date\":\"2025-01-28\"}]',4,1,'2025-01-28 03:40:33','2025-01-28 03:40:33');
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrator','admin@fyp-travel.com',NULL,'$2y$12$dG1j0OMwQaYwvwhLrhDTQuVG2Ep8PLyWkB5LdHhjr/XcPMn842HH2','sfCWylkCv3wx1BZYGNW9Ztek3LDnqqSNc53yvJ78IcrV0sumjfyS6XBJbQCf','2024-12-03 20:56:16','2024-12-03 20:56:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` char(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `link_video` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-28 19:45:38
