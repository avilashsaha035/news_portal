-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2023 at 08:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obiram_banglar_mukh`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_sub_categories`
--

DROP TABLE IF EXISTS `child_sub_categories`;
CREATE TABLE IF NOT EXISTS `child_sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_title_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_title_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_categories` bigint UNSIGNED DEFAULT NULL,
  `sub_categories` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `child_sub_categories_news_categories_foreign` (`news_categories`),
  KEY `child_sub_categories_sub_categories_foreign` (`sub_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_sub_categories`
--

INSERT INTO `child_sub_categories` (`id`, `cate_title_eng`, `cate_title_ban`, `status`, `soft_delete`, `news_categories`, `sub_categories`, `created_at`, `updated_at`) VALUES
(4, 'Others', 'অন্যান্য', 'active', 'deactivate', 1, 1, '2023-09-03 02:53:36', '2023-09-09 06:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `city_union_villages`
--

DROP TABLE IF EXISTS `city_union_villages`;
CREATE TABLE IF NOT EXISTS `city_union_villages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_union_villages_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_union_villages_name_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `districts` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_union_villages_districts_foreign` (`districts`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_union_villages`
--

INSERT INTO `city_union_villages` (`id`, `city_union_villages_name_eng`, `city_union_villages_name_ban`, `type`, `status`, `soft_delete`, `districts`, `created_at`, `updated_at`) VALUES
(1, 'Faridpur Sadar', 'ফরিদপুর সদর', 'City', '1', 'activate', 1, '2023-09-05 02:51:00', '2023-09-19 01:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name_eng`, `country_name_ban`, `status`, `soft_delete`, `created_at`, `updated_at`) VALUES
(4, 'Bangladesh', 'বাংলাদেশ', 'deactive', 'deactivate', '2023-09-02 03:54:33', '2023-09-05 05:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisions` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_divisions_foreign` (`divisions`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name_eng`, `district_name_ban`, `status`, `soft_delete`, `divisions`, `created_at`, `updated_at`) VALUES
(1, 'Faridpur', 'ফরিদপুর', 'active', 'deactivate', 4, '2023-09-02 03:56:23', '2023-09-07 02:09:44'),
(5, 'Satkhira', 'সাতক্ষীরা', 'active', 'deactivate', 5, '2023-09-07 00:02:49', '2023-09-19 01:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_name_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countries` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `divisions_countries_foreign` (`countries`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name_eng`, `division_name_ban`, `status`, `soft_delete`, `countries`, `created_at`, `updated_at`) VALUES
(4, 'Dhaka', 'ঢাকা', 1, 'deactivate', 4, '2023-09-02 03:55:59', '2023-09-02 03:55:59'),
(5, 'Khulna', 'খুলনা', 1, 'deactivate', 4, '2023-09-07 00:01:02', '2023-09-09 23:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang_name_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_name_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_name_eng`, `lang_name_ban`, `created_at`, `updated_at`) VALUES
(1, 'English', 'ইংরেজি', '2023-09-02 03:54:03', '2023-09-02 03:54:03'),
(2, 'Bengali', 'বাংলা', '2023-09-02 03:54:18', '2023-09-02 03:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_08_23_102943_create_languages_table', 1),
(9, '2023_08_23_103443_create_countries_table', 1),
(10, '2023_08_23_103654_create_divisions_table', 1),
(11, '2023_08_23_104042_create_districts_table', 1),
(12, '2023_08_23_105633_create_city_union_villages_table', 1),
(13, '2023_08_23_115759_create_news_categories_table', 1),
(14, '2023_08_24_122616_create_sub_categories_table', 1),
(15, '2023_08_24_122756_create_child_sub_categories_table', 1),
(16, '2023_08_24_122857_create_web_settings_table', 1),
(17, '2023_08_24_123001_create_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_eng` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ban` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_eng` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_live` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_news` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` datetime DEFAULT NULL,
  `news_categories` bigint UNSIGNED DEFAULT NULL,
  `sub_categories` bigint UNSIGNED DEFAULT NULL,
  `child_sub_categories` bigint UNSIGNED DEFAULT NULL,
  `countries` bigint UNSIGNED DEFAULT NULL,
  `divisions` bigint UNSIGNED DEFAULT NULL,
  `districts` bigint UNSIGNED DEFAULT NULL,
  `city_union_villages` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soft_delete` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `news_news_categories_foreign` (`news_categories`),
  KEY `news_sub_categories_foreign` (`sub_categories`),
  KEY `news_child_sub_categories_foreign` (`child_sub_categories`),
  KEY `news_countries_foreign` (`countries`),
  KEY `news_divisions_foreign` (`divisions`),
  KEY `news_districts_foreign` (`districts`),
  KEY `news_city_union_villages_foreign` (`city_union_villages`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title_eng`, `title_ban`, `description_eng`, `description_ban`, `banner`, `date`, `video_link`, `video_live`, `latest_news`, `time_duration`, `news_categories`, `sub_categories`, `child_sub_categories`, `countries`, `divisions`, `districts`, `city_union_villages`, `slug`, `status`, `soft_delete`, `created_at`, `updated_at`) VALUES
(4, '\'Avatar\' robot is eliminating loneliness in Japan', 'জাপানে একাকিত্ব দূর করছে ‘অবতার’ রোবট', '<p style=\"text-align: justify;\">Are robots taking people\'s jobs? The question is gaining more importance in this age of artificial intelligence (AI). A novel project to eliminate human loneliness by using robots in a cafe in Japan is catching the attention of many.</p>\r\n<p style=\"text-align: justify;\">Restaurant guests want to interact with robots. One characteristic of these human-looking androids is that they have no artificial intelligence technology. These robots are actually human avatars who control them remotely.</p>\r\n<p style=\"text-align: justify;\">The so-called pilots can chat with guests thanks to cameras, speakers and microphones placed in the robot\'s eyes. Due to physical disabilities, these pilots can only work from home or hospital rooms.</p>\r\n<p style=\"text-align: justify;\">One of these pilots is Maya. Due to a chronic disease he now has to move around in a wheelchair. For this 24-year-old woman, not being able to find a job was a very difficult experience. His life changed when he got a job at Dawn Cafe. Highlighting her past, Maya said, \'I have applied for many jobs.</p>\r\n<p style=\"text-align: justify;\">But I didn\'t get any opportunity after completing higher education in university. I felt very sad and depressed. I thought I would never be able to work. That\'s when I got the news of this pilot job. It\'s really amazing. For me it was the last ray of hope. I feel grateful today when I hear the guests asking whether they will meet again if they are entertained. It gives me great joy to know that I am helping people in some way.\'</p>', '<p style=\"text-align: justify;\">রোবট কি মানুষের চাকরি খেয়ে নিচ্ছে? কৃত্রিম বুদ্ধিমত্তার (এআই) এই যুগে প্রশ্নটি আরও গুরুত্ব পাচ্ছে। জাপানে একটি ক্যাফেতে রোবটকে কাজে লাগিয়ে মানুষের একাকিত্ব দূর করার এক অভিনব প্রকল্প অনেকের নজর কাড়ছে।</p>\r\n<p style=\"text-align: justify;\">রেস্তোরাঁর অতিথিরা রোবটগুলোর সঙ্গে ভাবের আদানপ্রদান করতে চান। মানুষের মতো দেখতে এসব অ্যান্ড্রয়েড যন্ত্রমানবের একটা বৈশিষ্ট্য রয়েছে, এগুলোর মধ্যে কৃত্রিম বুদ্ধিমত্তার মতো কোনো প্রযুক্তি নেই। এই রোবট আসলে এমন মানুষের অবতার, যাঁরা দূর থেকে সেগুলো নিয়ন্ত্রণ করেন।</p>\r\n<p style=\"text-align: justify;\">রোবটের চোখে বসানো ক্যামেরা, স্পিকার ও মাইক্রোফোনের কল্যাণে তথাকথিত পাইলটরা অতিথিদের সঙ্গে গল্পগুজব করতে পারেন। শারীরিক প্রতিবন্ধকতার কারণে এই পাইলটরা শুধু বাসা অথবা হাসপাতালের ঘর থেকে কাজ করতে পারেন।</p>\r\n<p style=\"text-align: justify;\">এই পাইলটদের একজন হচ্ছেন মায়া। একটি ক্রনিক রোগের কারণে তাঁকে এখন হুইলচেয়ারে চলাফেরা করতে হয়। ২৪ বছর বয়সী এই নারীর কাছে কোনো চাকরি না পাওয়া অত্যন্ত কষ্টের অভিজ্ঞতা ছিল। ডন ক্যাফেতে কাজ পেয়ে তাঁর জীবনটা বদলে গেল। নিজের অতীত তুলে ধরে মায়া বলেন, &lsquo;আমি অনেক চাকরির আবেদন করেছি।</p>\r\n<p style=\"text-align: justify;\">কিন্তু বিশ্ববিদ্যালয়ে উচ্চশিক্ষা শেষ করার পর কোনো সুযোগ পাইনি। তখন খুব দুঃখ লাগছিল, অবসাদে ভুগছিলাম। ভেবেছিলাম, কোনো দিন কাজ করতে পারব না। তখনই পাইলটের এই চাকরির খবর পেলাম। এটা সত্যি অসাধারণ। আমার কাছে এটা ছিল শেষ আশার আলো। অতিথিদের মনোরঞ্জন হলে পরেরবারও দেখা হবে কি না, এমন প্রশ্ন শুনলে আজ আমি কৃতজ্ঞ বোধ করি। আমি মানুষকে কোনোভাবে সাহায্য করছি, সেটা জানতে পেরে আমার খুব আনন্দ হয়।&rsquo;</p>', '1695724537.jpg', '2023-09-09', 'https://www.prothomalo.com/world/asia/pibjtq6u8q', 'https://www.prothomalo.com/world/asia/pibjtq6u8q', 'yes', '2023-09-09 16:06:00', 1, 1, 4, 4, 4, 1, 1, 'avatar-robot-is-eliminating-loneliness-in-japan', 'active', 'deactivate', '2023-09-05 04:06:59', '2023-09-26 04:35:37'),
(7, 'News 23', 'জাতিসংঘের অধিবেশনে যোগ দিতে', '<p>dfhgfthfh</p>', NULL, '1695724283.jpg', '2023-09-10', 'thrfgfrthfgth', 'htfbgnythyh', 'no', '2023-09-10 16:54:00', 1, 1, 4, 4, 4, 1, 1, 'news-23', 'active', 'deactivate', '2023-09-10 04:57:45', '2023-09-26 04:31:23'),
(8, 'The Prime Minister left for New York to attend the UN session', 'জাতিসংঘের অধিবেশনে যোগ দিতে নিউইয়র্কের উদ্দেশে রওনা প্রধানমন্ত্রীর', '<p style=\"text-align: justify;\">A Biman Bangladesh Airlines VVIP flight carrying the Prime Minister and her entourage left Dhaka\'s Hazrat Shahjalal International Airport at 10:12 am today. Prime Minister\'s Press Secretary Ihsanul Karim told the bus.</p>', '<p style=\"text-align: justify;\">প্রধানমন্ত্রী ও তাঁর সফরসঙ্গীদের বহনকারী বিমান বাংলাদেশ এয়ারলাইনসের একটি ভিভিআইপি ফ্লাইট আজ সকাল ১০টা ১২ মিনিটে ঢাকার হজরত শাহজালাল আন্তর্জাতিক বিমানবন্দর ছেড়ে যায়। প্রধানমন্ত্রীর প্রেসসচিব ইহসানুল করিম বাসসকে এসব তথ্য জানিয়েছেন।</p>', '1694931038.jpg', '2023-09-10', 'ffffffffffffffffffffff', 'ffffffffffffffffffffffffff', 'yes', '2023-09-10 17:17:00', 1, 1, 4, 4, 4, 1, 1, 'the-prime-minister-left-for-new-york-to-attend-the-un-session', 'active', 'deactivate', '2023-09-10 05:18:04', '2023-09-21 00:13:16'),
(9, 'Canada Senate Human Rights Committee chief praised Sheikh Hasina\'s leadership', 'শেখ হাসিনার নেতৃত্বের ভূয়সী প্রশংসা করলেন কানাডা সিনেটের মানবাধিকার কমিটির প্রধান', '<p>According to a press release received in Dhaka on Saturday, Minister of Information and Broadcasting Hasan Mahmood, who is visiting Canada, met with Senator Ataullajan at Hotel Holiday Inn on Friday afternoon local time in Toronto. Referring to his visits to Bangladesh, the senator said that under the leadership of Sheikh Hasina, the success of the country in socio-economic development, especially women\'s empowerment, control of population growth, suppression of radicalism-militancy and achieving communal harmony, is unique.</p>', '<p>আজ শনিবার ঢাকায় প্রাপ্ত এক সংবাদ বিজ্ঞপ্তিতে জানানো হয়, কানাডা সফররত তথ্য ও সম্প্রচারমন্ত্রী হাছান মাহমুদ টরন্টোর স্থানীয় সময় শুক্রবার বিকেলে হোটেল হলিডে ইনে সিনেটর আতাউল্লাজানের সঙ্গে বৈঠক করেন। এ সময় সিনেটর তাঁর বাংলাদেশ সফরগুলোর কথা উল্লেখ করে বলেন, শেখ হাসিনার নেতৃত্বে দেশটি আর্থসামাজিক উন্নয়ন, বিশেষ করে নারী ক্ষমতায়ন, জনসংখ্যাবৃদ্ধি নিয়ন্ত্রণ, মৌলবাদ-জঙ্গিবাদ দমন ও সাম্প্রদায়িক সম্প্রীতি অর্জনে যে সাফল্য দেখিয়েছে, তা অনন্য।</p>', '1694942873.jpg', '2023-09-17', 'https://www.youtube.com/embed/AOJUMOfS_FY?si=RQetBd-xgTeziPCp', NULL, 'yes', '2023-09-17 12:56:00', 2, 1, 4, 4, 4, 1, 1, 'canada-senate-human-rights-committee-chief-praised-sheikh-hasinas-leadership', 'active', 'deactivate', '2023-09-17 00:56:48', '2023-09-26 03:43:42'),
(11, 'Last minute surprise! Who is RU\'s new leader?', 'শেষ মুহূর্তের চমক! কে হচ্ছেন রাবির নতুন নেতা..', '<p style=\"text-align: justify;\">The 26th conference of Rajshahi University Chhatra League was held on Monday 18th September. Rabi Chhatra League leader Zakirul Islam (Jack) is in today\'s discussion of the series of BCL leaders who are ahead in the leadership race in this conference.</p>\r\n<p style=\"text-align: justify;\">5 days passed after Rabi Chhatra League conference was held on September 18, but the Central Committee of Chhatra League did not announce the next leadership. In this situation, various speculations have spread among the leaders and workers of the organization and teachers and students. Workers-supporters continue to campaign for their respective leaders through social media. Rabi Chhatra League\'s newly ex-committee vice president Zakirul Islam Jack is a reflection of clean image and transparent politics in the campus.</p>\r\n<p style=\"text-align: justify;\">Pabna\'s son Jack has been active in the Rajshahi University Chhatra League since 2012. Ever since his admission in the campus, he has been present in the marches and meetings of the Chhatra League. In 2013 Jamaat-Hefazat countrywide anarchy, 2014 National Election before and after the BNP-Jamaat arson was on the streets protesting. Zakirul Jack, a student leader who has always been vocal against the anti-freedom forces in Rajshahi University, including the quota reform movement.</p>\r\n<p style=\"text-align: justify;\">Zakirul Jack was a candidate for the post of general secretary of Motherbox Hall Chhatra League in Rajshahi University\'s joint hall conference held in November 2016. Later, he got the responsibility of Joint General Secretary of Chhatra League. In 2008, 2014, 2018 9th, 10th and 11th National Assembly elections, he was present on the streets campaigning for the boat. In his constituency (Pabna-4), he served as the coordinator of the Central Chhatra League announced election management and coordination committee in the 2018 11th National Parliament Elections. In addition to being on the streets cherishing the ideals of Bangabandhu Sheikh Mujibur Rahman, Chhatra League leader Jack is also an active worker in the progressive cultural movement on campus. Drama students are very popular among general students. He is the first to run to any problem of the students.</p>\r\n<p style=\"text-align: justify;\">Pabna has continued to support the students in various ways through the District Association. Although he has been doing politics on campus for a long time, he has never made the headlines of any negative news and made the Chhatra League controversial as an organization. If Rabi comes to the main leadership of the Chhatra League, he vows to continue this trend of positivity. Chhatra League leaders, activists and ordinary students are expecting leadership that will play a strong role in building a student-friendly smart campus in the implementation of Vision-2041 of Honorable Prime Minister Sheikh Hasina, holding the ideals of Bangabandhu Sheikh Mujibur Rahman.</p>', '<p style=\"text-align: justify;\">রাজশাহী বিশ্ববিদ্যালয় ছাত্রলীগের ২৬ তম সম্মেলন অনুষ্ঠিত হয়েছে ১৮ই সেপ্টেম্বর সোমবার। এ সম্মেলনে নেতৃত্বের দৌড়ে এগিয়ে থাকা ছাত্রলীগ নেতাদের নিয়ে ধারাবাহিক পর্বের আজকের আলোচনায় থাকছে রাবি ছাত্রলীগ নেতা জাকিরুল ইসলাম (জ্যাক)।</p>\r\n<p style=\"text-align: justify;\">গত ১৮ সেপ্টেম্বর রাবি ছাত্রলীগের সম্মেলন অনুষ্ঠিত হবার পরে ৫ দিন অতিবাহিত হলেও পরবর্তী নেতৃত্ব ঘোষণা করে নি ছাত্রলীগের কেন্দ্রীয় কমিটি। এ অবস্থায় নানা জল্পনা-কল্পনা ডানা মেলেছে সংগঠনটির নেতাকর্মী ও শিক্ষক-শিক্ষার্থীদের মাঝে। কর্মী-সমর্থকরা সামাজিক যোগাযোগ মাধ্যমে নিজ নিজ নেতার প্রচার-প্রচারণা চালিয়ে যাচ্ছেন। রাবি ছাত্রলীগের সদ্য সাবেক কমিটির সহ সভাপতি জাকিরুল ইসলাম জ্যাক ক্যাম্পাসে ক্লিন ইমেজ ও স্বচ্ছ রাজনীতির প্রতিচ্ছবি।</p>\r\n<p style=\"text-align: justify;\">পাবনার ছেলে জ্যাক ২০১২ সাল থেকে রাজশাহী বিশ্ববিদ্যালয় ছাত্রলীগে সক্রিয়। ক্যাম্পাসে ভর্তির পর থেকেই ছাত্রলীগের মিছিল মিটিং, আন্দোলন সংগ্রামে সরব উপস্থিতি তার। ২০১৩ সালে জামাত-হেফাজতের দেশব্যাপী নৈরাজ্য, ২০১৪ সালের জাতীয় নির্বাচন পূর্ববর্তী ও পরবর্তী বিএনপি-জামাতের জ্বালাও-পোড়াও-য়ের প্রতিবাদে রাজপথে ছিলেন সম্মুখসারিতে। কোটা সংস্কার আন্দোলনসহ রাজশাহী বিশ্ববিদ্যালয়ে স্বাধীনতাবিরোধী অপশক্তির বিরুদ্ধে সর্বদা সোচ্চার ছাত্রনেতা জাকিরুল জ্যাক।</p>\r\n<p style=\"text-align: justify;\">২০১৬ সালের নভেম্বরে অনুষ্ঠিত রাজশাহী বিশ্ববিদ্যালয়ের সমন্বিত হল সম্মেলনে মাদারবক্স হল ছাত্রলীগের সাধারণ সম্পাদক পদ প্রত্যাশী ছিলেন জাকিরুল জ্যাক। পরে হল ছাত্রলীগের যুগ্ম সাধারণ সম্পাদকের দায়িত্ব পান। ২০০৮, ২০১৪, ২০১৮ সালের নবম, দশম ও একাদশ জাতীয় সংসদ নির্বাচনে নৌকার পক্ষে প্রচার-প্রচারণায় রাজপথে ছিলো তার সরব উপস্থিতি। নিজ নির্বাচনী আসন (পাবনা-৪) এ ২০১৮ সালের একাদশ জাতীয় সংসদ নির্বাচনে কেন্দ্রীয় ছাত্রলীগ ঘোষিত নির্বাচন পরিচালনা ও সমন্বয় কমিটির সমন্বয়কের দায়িত্ব পালন করেন। বঙ্গবন্ধু শেখ মুজিবুর রহমানের আদর্শ লালন করে রাজপথে থাকার পাশাপাশি ছাত্রলীগ নেতা জ্যাক ক্যাম্পাসে প্রগতিশীল সাংস্কৃতিক আন্দোলনেরও একজন সক্রিয় কর্মী। নাট্যকলার এ শিক্ষার্থী সাধারণ শিক্ষার্থীদের মধ্যে তুমুল জনপ্রিয়। শিক্ষার্থীদের যে কোনো সমস্যায় সবার আগে ছুটে যান তিনি।</p>\r\n<p style=\"text-align: justify;\">পাবনা জেলা সমিতির মাধ্যমেও শিক্ষার্থীদের নানরকম সহযোগিতা অব্যাহত রেখেছেন। দীর্ঘ সময় ক্যাম্পাসে রাজনীতি করলেও কখনো কোনো নেতিবাচক সংবাদের শিরোনাম হয়ে সংগঠন হিসেবে ছাত্রলীগকে বিতর্কিত করেন নি। রাবি ছাত্রলীগের মূল নেতৃত্বে আসতে পারলে ইতিবাচকতার এ ধারা অব্যাহত রাখার প্রতিজ্ঞা তার। বঙ্গবন্ধু শেখ মুজিবুর রহমানের আদর্শ ধারণ করে, মাননীয় প্রধানমন্ত্রী শেখ হাসিনার ভিশন-২০৪১ বাস্তবায়নে, শিক্ষার্থীবান্ধব স্মার্ট ক্যাম্পাস বিনির্মানে দৃঢ় ভূমিকা রাখবে এমন নেতৃত্ব প্রত্যাশা করছে ছাত্রলীগের নেতাকর্মী ও সাধারণ শিক্ষার্থীরা..</p>', '1695724873.jpg', NULL, 'https://www.youtube.com/embed/tzBBaMHPy6k?si=ax3yb9wo_cQ0Rc7A', 'none', 'yes', '2023-09-26 12:19:00', 2, 1, 4, 4, 4, 1, 1, 'last-minute-surprise-who-is-rus-new-leader', 'active', 'deactivate', '2023-09-26 00:20:54', '2023-09-26 04:43:00'),
(12, 'Bangladesh World Cup preparation started with victory', 'জয় দিয়ে শুরু বাংলাদেশের বিশ্বকাপ প্রস্তুতি', '<p style=\"text-align: justify;\">Google says the temperature in Guwahati was 30 degrees, humidity 80 percent. The temperature in Guwahati was being called \'excessive hot\'. Curious to see the temperature in Guwahati after talking to a cricketer of the Bangladesh team about the conditions before today\'s warm-up match against Sri Lanka at the Barshapara Cricket Stadium in Guwahati. It became more clear after seeing the sweaty faces of the cricketers of both the teams on the field of play.</p>\r\n<p style=\"text-align: justify;\">It is a question how much the Bangladesh team benefited by playing the preparation match in such conditions. After playing two warm-up matches in \'hot\' Guwahati, Bangladesh will have to go to Dharamshala in cold weather. Where the Bangladesh team will play their first two matches in the World Cup. Or when Bangladesh meet Sri Lanka in the last half of the league stage of the World Cup, it will be cold in Delhi, the city of that match.</p>\r\n<p style=\"text-align: justify;\">However, the preparation match is not only to adapt to the conditions, but also to see one\'s own ability. The biggest achievement in that regard is the opening pair. After restricting Sri Lanka to 263 in 49.1 overs even on Guwahati\'s batting wicket, Liton Das and Tanjim Hasan put on 131 runs in the opening pair while chasing runs. And that was enough to set the stage for Bangladesh\'s 7-wicket win.</p>', '<p style=\"text-align: justify;\">গুগল বলছে গুয়াহাটির তাপমাত্রা ছিল ৩০ ডিগ্রি, আর্দ্রতা ৮০ শতাংশ। দুইয়ে মিলে গুয়াহাটির তাপমাত্রাকে বলা হচ্ছিল &lsquo;অতিরিক্ত গরম&rsquo;। গুয়াহাটির বর্ষাপাড়া ক্রিকেট স্টেডিয়ামে আজ শ্রীলঙ্কার বিপক্ষে প্রস্তুতি ম্যাচের আগে বাংলাদেশ দলের এক ক্রিকেটারের সঙ্গে কন্ডিশন নিয়ে কথা বলার পরই কৌতূহলী হয়ে গুয়াহাটির তাপমাত্রা দেখা। খেলার মাঠে দুই দলের ক্রিকেটারদের ঘর্মাক্ত চেহারা দেখার পর সেটি আরও পরিষ্কার হলো।</p>\r\n<p style=\"text-align: justify;\">এমন কন্ডিশনে প্রস্তুতি ম্যাচ খেলে বাংলাদেশ দলের কতটা লাভ হলো, সেটা একটা প্রশ্ন। &lsquo;গরম&rsquo; গুয়াহাটিতে দুটি প্রস্তুতি ম্যাচ খেলে বাংলাদেশকে যেতে হবে ঠান্ডা আবহাওয়ার ধর্মশালায়। যেখানে বিশ্বকাপে নিজেদের প্রথম দুটি ম্যাচ খেলবে বাংলাদেশ দল। অথবা বিশ্বকাপের লিগ পর্বের শেষার্ধে যখন শ্রীলঙ্কার বিপক্ষে বাংলাদেশের দেখা হবে, তখন সে ম্যাচের শহর দিল্লিতে থাকবে শীত।</p>\r\n<p style=\"text-align: justify;\">তবে প্রস্তুতি ম্যাচ তো শুধু কন্ডিশনের সঙ্গে মানিয়ে নিতেই নয়, নিজেদের সামর্থ্য দেখারও একটা ব্যাপার থাকে। সেদিক দিয়ে সবচেয়ে বড় প্রাপ্তি উদ্বোধনী জুটি। গুয়াহাটির ব্যাটিং উইকেটেও শ্রীলঙ্কাকে ৪৯.১ ওভারে ২৬৩ রানে আটকে রাখার পর সে রানের পেছনে ছুটতে গিয়ে লিটন দাস ও তানজিম হাসান উদ্বোধনী জুটিতেই করে ফেলেন ১৩১ রান। আর সেটিই বাংলাদেশের ৭ উইকেটের জয়ের মঞ্চ গড়ে দেওয়ার জন্য যথেষ্ট হয়েছে।</p>', '1696147908.jpg', '2023-10-01', NULL, NULL, 'no', '2023-10-01 14:11:00', 5, 1, 4, 4, 4, 1, 1, 'bangladesh-world-cup-preparation-started-with-victory', 'active', 'deactivate', '2023-10-01 02:11:48', '2023-10-01 02:11:48'),
(13, 'Bangladesh is going to become a country using nuclear energy', 'পারমাণবিক শক্তি ব্যবহারকারী দেশ হতে যাচ্ছে বাংলাদেশ', '<p style=\"text-align: justify;\">Bangladesh is going to become the 33rd nuclear power user in the world with Rooppur nuclear power plant. Nuclear fuel or uranium for use in this power plant arrived in Bangladesh last Thursday on a special plane. Yesterday Friday it reached Rooppur through tight security.</p>\r\n<p style=\"text-align: justify;\">A ceremony to formally hand over the uranium is scheduled to take place in Rooppur on October 5. Prime Minister Sheikh Hasina and Russian President Vladimir Putin will inaugurate it. Both of them can join the event online.</p>\r\n<p style=\"text-align: justify;\">International Atomic Energy Agency (IAEA) Director General Rafael Grossi is expected to come to Bangladesh to attend the event. However, it is reported that he can join the online event without coming. Minister of Science and Technology Yefess Osman and Director General of Russia\'s state-owned Atomic Energy Corporation (Rosatom) Alexey Likhachev may be present in Ruppur.</p>', '<p style=\"text-align: justify;\">রূপপুর পারমাণবিক বিদ্যুৎকেন্দ্রের মাধ্যমে বিশ্বের ৩৩তম পারমাণবিক শক্তি ব্যবহারকারী দেশ হতে যাচ্ছে বাংলাদেশ। এই বিদ্যুৎকেন্দ্রে ব্যবহারের জন্য পারমাণবিক জ্বালানি বা ইউরেনিয়াম গত বৃহস্পতিবার বিশেষ উড়োজাহাজে বাংলাদেশে এসে পৌঁছেছে। গতকাল শুক্রবার তা কড়া নিরাপত্তার মধ্য নিয়ে রূপপুরে পৌঁছায়।</p>\r\n<p style=\"text-align: justify;\">আগামী ৫ অক্টোবর রূপপুরে ইউরেনিয়াম আনুষ্ঠানিকভাবে হস্তান্তরে এক অনুষ্ঠান হওয়ার কথা রয়েছে। এটি উদ্বোধন করবেন প্রধানমন্ত্রী শেখ হাসিনা ও রাশিয়ার প্রেসিডেন্ট ভ্লাদিমির পুতিন। তাঁরা দুজন অনুষ্ঠানে অনলাইনে যুক্ত হতে পারেন।</p>\r\n<p style=\"text-align: justify;\">আন্তর্জাতিক পরমাণু শক্তি সংস্থার (আইএইএ) মহাপরিচালক রাফায়েল গ্রোসি অনুষ্ঠানে অংশ নিতে বাংলাদেশে আসবেন বলে কথা রয়েছে। তবে তিনি না এসে অনলাইনে অনুষ্ঠানে যুক্ত হতে পারেন বলে জানা গেছে। রূপপুরে উপস্থিত থাকতে পারেন বিজ্ঞান ও প্রযুক্তিমন্ত্রী ইয়াফেস ওসমান এবং পারমাণবিক জ্বালানি উৎপাদনকারী রাশিয়ার রাষ্ট্রায়ত্ত সংস্থা পারমাণবিক শক্তি করপোরেশনের (রোসাটম) মহাপরিচালক অ্যালেক্সি লিখাচেভ।</p>', '1696148384.jpg', '2023-10-01', NULL, NULL, 'no', '2023-10-01 14:19:00', 4, 1, 4, 4, 4, 1, 1, 'bangladesh-is-going-to-become-a-country-using-nuclear-energy', 'active', 'deactivate', '2023-10-01 02:19:44', '2023-10-01 02:19:44'),
(14, 'Awami League leader\'s case on behalf of 40 BNP leaders-activists in connection with the clash in Kurigram', 'কুড়িগ্রামে ছাত্রলীগের সঙ্গে সংঘর্ষের ঘটনায় বিএনপির ৪০ নেতা–কর্মীর নামে  মামলা', '<p style=\"text-align: justify;\">A case has been filed against BNP leaders and activists in connection with the clash with Chhatra League leaders and activists in Kurigram\'s Phulbari. Upazila Awami League office secretary Mr. Ali filed the case at Phulbari police station on Saturday midnight, alleging disorder, vandalism and beating. Upazila BNP vice-president Lokman Hossain Sarkar and general secretary Abdul Mannan have named 40 people and 50 to 60 others have been accused.</p>\r\n<p style=\"text-align: justify;\">Najmus Saqib alias Sajib, officer-in-charge of Phulbari police station, confirmed the truth of the case and said that the clash between Chhatra League and BNP took place yesterday around BNP\'s rally. Heard that some people on both sides were injured. Later that night, the office secretary of the Upazila Awami League filed a case at the police station as a plaintiff.</p>', '<p style=\"text-align: justify;\">কুড়িগ্রামের ফুলবাড়ীতে ছাত্রলীগ নেতা&ndash;কর্মীদের সঙ্গে সংঘর্ষের ঘটনায় বিএনপির নেতা&ndash;কর্মীদের বিরুদ্ধে মামলা হয়েছে। বিশৃঙ্খলা সৃষ্টি, ভাঙচুর ও মারধরের অভিযোগ এনে গতকাল শনিবার মধ্যরাতে ফুলবাড়ী থানায় মামলাটি করেছেন উপজেলা আওয়ামী লীগের দপ্তর সম্পাদক জনাব আলী। এতে উপজেলা বিএনপির সহসভাপতি লোকমান হোসেন সরকার ও সাধারণ সম্পাদক আবদুল মান্নানসহ ৪০ জনের নাম উল্লেখ করে অজ্ঞাতনামা আরও ৫০ থেকে ৬০ জনকে আসামি করা হয়েছে।</p>\r\n<p style=\"text-align: justify;\">ফুলবাড়ী থানার ভারপ্রাপ্ত কর্মকর্তা নাজমুস সাকিব ওরফে সজীব মামলার সত্যতা নিশ্চিত করে বলেছেন, গতকাল বিএনপির সমাবেশ ঘিরে ছাত্রলীগ-বিএনপির সংঘর্ষের ঘটনা ঘটে। এতে উভয় পক্ষের কয়েকজন আহত হয়েছেন বলে শুনেছেন। পরে রাতে উপজেলা আওয়ামী লীগের দপ্তর সম্পাদক বাদী হয়ে থানায় মামলা করেন।</p>', '1696148606.jpg', '2023-10-01', NULL, NULL, 'no', '2023-10-01 14:22:00', 3, 1, 4, 4, 4, 1, 1, 'awami-league-leaders-case-on-behalf-of-40-bnp-leaders-activists-in-connection-with-the-clash-in-kurigram', 'active', 'deactivate', '2023-10-01 02:23:26', '2023-10-01 02:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_title_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_title_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `cate_title_eng`, `cate_title_ban`, `status`, `soft_delete`, `created_at`, `updated_at`) VALUES
(1, 'National', 'জাতীয়', 'active', 'deactivate', '2023-09-02 05:58:11', '2023-09-07 03:40:35'),
(2, 'Politics', 'রাজনীতি', 'active', 'deactivate', '2023-09-17 00:53:17', '2023-09-17 00:53:17'),
(3, 'Latest', 'সর্বশেষ', 'active', 'deactivate', '2023-09-26 04:08:37', '2023-09-26 04:08:37'),
(4, 'Special News', 'বিশেষ সংবাদ', 'active', 'deactivate', '2023-09-26 04:09:21', '2023-09-26 04:10:59'),
(5, 'Sports', 'খেলাধুলা', 'active', 'deactivate', '2023-09-26 04:10:11', '2023-09-26 04:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `soft_delete`, `route`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Language', 'deactivate', 'superadmin.lang', '<i class=\"fa fa-language\" aria-hidden=\"true\"></i>', '2023-09-19 05:55:37', '2023-09-19 05:55:37'),
(2, 'Country', 'deactivate', 'superadmin.country', '<i class=\"fa fa-globe\" aria-hidden=\"true\"></i>', '2023-09-19 05:56:53', '2023-09-19 05:56:53'),
(3, 'Division', 'deactivate', 'superadmin.division', '<i class=\"fa fa-map-signs\" aria-hidden=\"true\"></i>', '2023-09-19 06:27:53', '2023-09-19 06:27:53'),
(4, 'District', 'deactivate', 'superadmin.district', '<i class=\"fa fa-map-pin\" aria-hidden=\"true\"></i>', '2023-09-19 06:29:44', '2023-09-19 06:29:44'),
(5, 'City', 'deactivate', 'superadmin.city', '<i class=\"fa fa-building\" aria-hidden=\"true\"></i>', '2023-09-19 06:37:59', '2023-09-19 06:37:59'),
(6, 'News Categories', 'deactivate', 'superadmin.category', '<i class=\"fa fa-bars\" aria-hidden=\"true\"></i>', '2023-09-19 06:43:05', '2023-09-19 06:43:05'),
(7, 'Sub-Category', 'deactivate', 'superadmin.subcategory', '<i class=\"fa fa-object-ungroup\" aria-hidden=\"true\"></i>', '2023-09-19 06:44:05', '2023-09-19 06:44:05'),
(8, 'Child Sub-Category', 'deactivate', 'superadmin.child-subcategory', '<i class=\"fa fa-object-group\" aria-hidden=\"true\"></i>', '2023-09-19 06:45:11', '2023-09-19 06:45:11'),
(9, 'Web Settings', 'deactivate', 'superadmin.websettings', '<i class=\"fa fa-cogs\" aria-hidden=\"true\"></i>', '2023-09-19 06:46:38', '2023-09-19 06:46:38'),
(10, 'News', 'deactivate', 'news', '<i class=\"fa fa-newspaper\" aria-hidden=\"true\"></i>', '2023-09-19 07:05:13', '2023-09-19 07:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role_type`, `description`, `soft_delete`, `created_at`, `updated_at`) VALUES
(1, 'ROLE_SUPERADMIN', 'ROLE SUPERADMIN', 'ROLE_SUPERADMIN', NULL, NULL, NULL),
(2, 'ROLE_ADMIN', 'ROLE ADMIN', 'i\'m admin', 'deactivate', NULL, '2023-09-20 02:22:59'),
(3, 'ROLE_ADMIN', 'Editor', 'I am editor', 'deactivate', '2023-09-19 05:50:57', '2023-09-19 05:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` bigint UNSIGNED DEFAULT NULL,
  `permission` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_has_permissions_role_foreign` (`role`),
  KEY `role_has_permissions_permission_foreign` (`permission`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `role`, `permission`, `created_at`, `updated_at`) VALUES
(18, 2, 2, '2023-09-20 00:56:45', '2023-09-20 00:56:45'),
(19, 2, 1, '2023-09-20 01:03:41', '2023-09-20 01:03:41'),
(21, 2, 3, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(22, 2, 4, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(23, 2, 5, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(24, 2, 6, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(25, 2, 7, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(26, 2, 8, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(27, 2, 9, '2023-09-20 02:22:59', '2023-09-20 02:22:59'),
(28, 2, 10, '2023-09-20 02:22:59', '2023-09-20 02:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_title_eng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_title_ban` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_categories` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_news_categories_foreign` (`news_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cate_title_eng`, `cate_title_ban`, `status`, `soft_delete`, `news_categories`, `created_at`, `updated_at`) VALUES
(1, 'Fashions', 'ফ্যাশন', 'active', 'deactivate', 1, '2023-09-03 01:13:29', '2023-09-10 00:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soft_delete` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `soft_delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'sadmin@gmail.com', NULL, '$2y$10$0dr1VEmnaLS4NNLYq.nf/OABs7uAMQrLLf4.ynbY8ljUXZGwzeukC', NULL, NULL, NULL, '2023-09-19 05:28:01', '2023-09-19 05:28:01'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$0dr1VEmnaLS4NNLYq.nf/OABs7uAMQrLLf4.ynbY8ljUXZGwzeukC', NULL, NULL, NULL, '2023-09-19 05:28:48', '2023-09-19 05:28:48'),
(3, 'Reader', 'reader@gmail.com', NULL, '$2y$10$0dr1VEmnaLS4NNLYq.nf/OABs7uAMQrLLf4.ynbY8ljUXZGwzeukC', NULL, NULL, NULL, '2023-09-19 05:48:32', '2023-09-19 05:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
CREATE TABLE IF NOT EXISTS `web_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_links` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_sub_categories`
--
ALTER TABLE `child_sub_categories`
  ADD CONSTRAINT `child_sub_categories_news_categories_foreign` FOREIGN KEY (`news_categories`) REFERENCES `news_categories` (`id`),
  ADD CONSTRAINT `child_sub_categories_sub_categories_foreign` FOREIGN KEY (`sub_categories`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `city_union_villages`
--
ALTER TABLE `city_union_villages`
  ADD CONSTRAINT `city_union_villages_districts_foreign` FOREIGN KEY (`districts`) REFERENCES `districts` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_divisions_foreign` FOREIGN KEY (`divisions`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `divisions_countries_foreign` FOREIGN KEY (`countries`) REFERENCES `countries` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_child_sub_categories_foreign` FOREIGN KEY (`child_sub_categories`) REFERENCES `child_sub_categories` (`id`),
  ADD CONSTRAINT `news_city_union_villages_foreign` FOREIGN KEY (`city_union_villages`) REFERENCES `city_union_villages` (`id`),
  ADD CONSTRAINT `news_countries_foreign` FOREIGN KEY (`countries`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `news_districts_foreign` FOREIGN KEY (`districts`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `news_divisions_foreign` FOREIGN KEY (`divisions`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `news_news_categories_foreign` FOREIGN KEY (`news_categories`) REFERENCES `news_categories` (`id`),
  ADD CONSTRAINT `news_sub_categories_foreign` FOREIGN KEY (`sub_categories`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_foreign` FOREIGN KEY (`permission`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_has_permissions_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_news_categories_foreign` FOREIGN KEY (`news_categories`) REFERENCES `news_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
