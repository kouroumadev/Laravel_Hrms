-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 19:19
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `krupapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_head` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `dept_desc`, `dept_head`, `created_at`, `updated_at`) VALUES
(1, 'scrum', 'project management', 'abiskek kumar', '2022-01-25 12:09:22', '2022-01-28 03:59:02'),
(3, 'AWS123', 'aws cloud team', 'vivek', '2022-01-25 12:10:21', '2022-01-28 05:24:03'),
(4, 'web development', 'djnago, react js', 'abdoul k', '2022-01-25 12:10:49', '2022-01-25 12:10:49');

-- --------------------------------------------------------

--
-- Structure de la table `emp_projs`
--

DROP TABLE IF EXISTS `emp_projs`;
CREATE TABLE IF NOT EXISTS `emp_projs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_projs_user_id_foreign` (`user_id`),
  KEY `emp_projs_project_id_foreign` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emp_projs`
--

INSERT INTO `emp_projs` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-25 12:16:57', '2022-01-25 12:16:57'),
(2, 2, 1, '2022-01-25 12:17:15', '2022-01-25 12:17:15'),
(3, 3, 1, '2022-01-25 12:17:29', '2022-01-25 12:17:29'),
(4, 2, 3, '2022-01-25 12:17:42', '2022-01-25 12:17:42'),
(5, 1, 3, '2022-01-25 12:17:51', '2022-01-25 12:17:51');

-- --------------------------------------------------------

--
-- Structure de la table `interviews`
--

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE IF NOT EXISTS `interviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `interviews`
--

INSERT INTO `interviews` (`id`, `name`, `date`, `candidate`, `created_at`, `updated_at`) VALUES
(1, 'praven kumar', '2022-01-06', 'abdoul karim', '2022-01-28 06:43:38', '2022-01-28 06:43:38');

-- --------------------------------------------------------

--
-- Structure de la table `learnings`
--

DROP TABLE IF EXISTS `learnings`;
CREATE TABLE IF NOT EXISTS `learnings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` bigint UNSIGNED NOT NULL,
  `taskNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `learnings_department_id_foreign` (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `learnings`
--

INSERT INTO `learnings` (`id`, `department_id`, `taskNo`, `task`, `code`, `link`, `created_at`, `updated_at`) VALUES
(1, 3, '1', 'Create a free-tier account in AWS', 'https://www.youtube.com/', 'https://www.youtube.com/', '2022-01-25 12:22:57', '2022-01-25 12:22:57'),
(2, 3, '2', 'Make 3 slide ppt on AWS services and explain any one service', 'https://www.youtube.com/', 'https://www.youtube.com/', '2022-01-25 12:23:45', '2022-01-25 12:23:45'),
(3, 3, '3', 'Create a VPC with public and private network using VPC wizard', 'https://www.youtube.com/', 'https://www.youtube.com/', '2022-01-25 12:24:31', '2022-01-25 12:24:31'),
(4, 4, '1', 'HTML Crash course', 'https://www.youtube.com/', 'https://www.youtube.com/', '2022-01-25 12:25:02', '2022-01-25 12:25:02'),
(5, 4, '2', 'CSS Crash Course', 'https://www.youtube.com/', 'https://www.youtube.com/', '2022-01-25 12:25:27', '2022-01-25 12:25:27');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 3),
(8, '2022_01_22_085902_create_departments_table', 7),
(5, '2022_01_23_181125_create_projects_table', 4),
(10, '2022_01_24_070148_create_emp_projs_table', 9),
(9, '2022_01_25_075943_create_learnings_table', 8),
(11, '2022_01_25_181041_create_workflows_table', 10),
(12, '2022_01_26_165830_create_tasks_table', 11),
(13, '2022_01_28_112606_create_interviews_table', 12);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `name`, `desc`, `client`, `created_at`, `updated_at`) VALUES
(1, 'HRMS', 'zummit HRMS project', 'isha mishra', '2022-01-23 13:17:49', '2022-01-23 13:17:49'),
(2, 'QZ pilot', 'pilot', 'anusha pp', '2022-01-23 13:18:35', '2022-01-23 13:19:28'),
(3, 'QZ web', 'web', 'priyanka br', '2022-01-23 13:19:11', '2022-01-23 13:19:11');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `workflow_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_workflow_id_foreign` (`workflow_id`),
  KEY `tasks_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `workflow_id`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2022-01-26', '2022-01-26 12:17:55', '2022-01-26 12:17:55'),
(2, 5, 2, '2022-01-26', '2022-01-26 12:18:03', '2022-01-26 12:18:03'),
(3, 1, 2, '2022-01-27', '2022-01-27 03:42:13', '2022-01-27 03:42:13'),
(4, 7, 2, '2022-01-27', '2022-01-27 11:02:41', '2022-01-27 11:02:41'),
(5, 4, 2, '2022-01-27', '2022-01-27 11:35:59', '2022-01-27 11:35:59'),
(6, 2, 2, '2022-01-28', '2022-01-28 05:31:05', '2022-01-28 05:31:05'),
(7, 6, 2, '2022-01-30', '2022-01-30 09:15:49', '2022-01-30 09:15:49');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_b` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_j` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_department_id_foreign` (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `name`, `gender`, `street`, `city`, `country`, `user_type`, `date_b`, `date_j`, `department_id`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$XCmQ2LdcuIc5I0qmXu9dOehT2LGW463H1akGIcWms9dLHJzqUhXaC', '4578962558', 'abdoul kareem', 'Male', 'gunjur palya', 'karnataka', 'India', 'Admin', '1988-06-09', '2022-01-03', 1, 'baby-boy-84489_1920.jpg', NULL, 'sn4LxEwt6f99zUUWd7ifPR5HgJSW31lOYKgavk911dVKHsaPkvPbNvx2r1lH', '2022-01-23 12:14:44', '2022-01-23 12:14:44'),
(2, 'pooja@gmail.com', '$2y$10$sOLldyr7deb8osbnHD/7geeZ58PSH1PD9NheiNgzgDFvsKTZDCnQi', '4579625885', 'pooja br', 'Female', 'MG road', 'karnataka', 'India', 'Intern', '2006-02-09', '2022-01-05', 2, 'baby-2923997_1920.jpg', NULL, NULL, '2022-01-25 02:01:21', '2022-01-25 02:01:21'),
(3, 'ali@gmail.com', '$2y$10$e4obtCMbPyAtrCRkBjELnut17auxkPKPPGRtT7Tt1r5XEUhchjuGC', '1203456887', 'mohamed ali', 'Male', 'london bridge', 'karnataka', 'United Kingdom', 'Intern', '1988-06-16', '2022-01-03', 4, 'apple-1867461_1920.jpg', NULL, NULL, '2022-01-25 02:03:48', '2022-01-25 02:03:48'),
(4, 'test@gmail.com', '$2y$10$n4LGJZjumVPYmWkP.NvOq.0VdqOOognXDKuTTZ66SctjmM2HiP7Am', '1245698225', 'test test', 'Male', 'gunjur', 'kaenataka', 'India', 'Admin', '2013-02-06', '2022-01-01', 4, 'babe-2972219_1920.jpg', NULL, NULL, '2022-01-28 05:21:42', '2022-01-28 05:21:42'),
(5, 'paul@gmail.com', '$2y$10$JKWt33HrCStzz6OBDmPgXuEkubDcZhAJl/HqK8RU2VrIB5EGi3oBm', '458972254', 'ali mihammad', 'Male', 'gunjur', 'karnataka', 'Afghanistan', 'Admin', '2006-02-28', '2022-01-01', 4, 'baby-2923997_1920.jpg', NULL, NULL, '2022-01-30 09:09:05', '2022-01-30 09:09:05');

-- --------------------------------------------------------

--
-- Structure de la table `workflows`
--

DROP TABLE IF EXISTS `workflows`;
CREATE TABLE IF NOT EXISTS `workflows` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `workflows`
--

INSERT INTO `workflows` (`id`, `work_no`, `work_name`, `link`, `created_at`, `updated_at`) VALUES
(1, '1', 'joined slack', 'https://www.youtube.com/', '2022-01-26 02:46:35', '2022-01-26 02:46:35'),
(2, '2', 'joined trello', 'https://www.youtube.com/', '2022-01-26 02:47:05', '2022-01-26 02:47:05'),
(3, '3', 'Join Respective Slack channels', 'https://www.youtube.com/', '2022-01-26 02:47:47', '2022-01-26 02:47:47'),
(4, '4', 'Register for Standup Alice', 'https://www.youtube.com/', '2022-01-26 02:49:06', '2022-01-26 02:49:06'),
(5, '5', 'Attend POSH meeting', 'https://www.youtube.com/', '2022-01-26 02:49:33', '2022-01-26 02:49:33'),
(6, '6', 'Join Relevant whatsapp group', 'https://www.youtube.com/', '2022-01-27 10:11:02', '2022-01-27 10:11:02'),
(7, '7', 'Follow Zummit Social', 'https://www.youtube.com/', '2022-01-27 10:12:10', '2022-01-27 10:12:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
