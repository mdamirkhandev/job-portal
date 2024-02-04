-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2024 at 06:21 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(2, 'Accountant', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(3, 'Information Technology', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(4, 'Fashion designing', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(5, 'Marketting', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `job_type_id` bigint UNSIGNED NOT NULL,
  `vacancy` int NOT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `benefits` text COLLATE utf8mb4_unicode_ci,
  `responsibility` text COLLATE utf8mb4_unicode_ci,
  `qualifications` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `isFeatured` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `category_id`, `job_type_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualifications`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(1, 10, 'Graphic Designer', 4, 4, 10, '25K', 'Surat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'figma,ilustrator,graphics', '3', 'company', 'company loction', 'http://company.com', 1, 1, '2024-01-09 12:13:43', '2024-01-15 11:14:25'),
(2, 10, 'Cashier', 2, 5, 20, '30k', 'Mumbai', 'Senior Accounttant', 'Quis laudantium et', 'Minus inventore qui', 'Omnis sit officia d', 'ca,accountant', '4', 'Dillon and Mason Trading', 'Guerra and Hudson Co', 'Hardy and Leblanc LLC', 1, 1, '2024-01-10 12:14:28', '2024-01-11 12:14:28'),
(3, 10, 'Civil Engineer', 1, 1, 5, '15k', 'Kolkata', 'Trainee Civil Engineer', 'Quis laudantium et', 'Minus inventore qui', 'Omnis sit officia d', 'civil', '4', 'Dillon and Mason Trading', 'Guerra and Hudson Co', 'Hardy and Leblanc LLC', 1, 1, '2024-01-11 12:14:28', '2024-01-11 12:14:28'),
(4, 10, 'Web Developer', 3, 2, 11, '10k', 'Pune', 'Wordpress web developer', 'Quis laudantium et', 'Minus inventore qui', 'Omnis sit officia d', 'wordpress, bootatrap, backend', '4', 'Dillon and Mason Trading', 'Guerra and Hudson Co', 'Hardy and Leblanc LLC', 1, 1, '2024-01-12 12:14:28', '2024-01-11 12:14:28'),
(5, 10, 'Purchase Manager', 5, 3, 25, '35k', 'Ahmedabad', 'Junior Marketing Manager', 'Quis laudantium et', 'Minus inventore qui', 'Omnis sit officia d', 'marketing,sales,purchase', '4', 'Dillon and Mason Trading', 'Guerra and Hudson Co', 'Hardy and Leblanc LLC', 1, 1, '2024-01-13 12:14:28', '2024-01-11 12:14:28'),
(9, 10, 'Sales Manager', 5, 1, 25, NULL, 'Noida', 'Experience Sales Person', 'Quis laudantium et', 'Minus inventore qui', 'Omnis sit officia d', 'sales,buy,profit,marketing', '4', 'Dillon and Mason Trading', 'Guerra and Hudson Co', 'Hardy and Leblanc LLC', 1, 1, '2024-01-14 12:14:28', '2024-01-11 12:14:28'),
(10, 10, 'Site Maintainance', 3, 3, 25, NULL, 'Bangalore', 'Experience website maintainance Engineer', 'Quis laudantium et', 'Minus inventore qui', 'Omnis sit officia d', 'debugger,update,upgrade,backup', '4', 'Dillon and Mason Trading', 'Guerra and Hudson Co', 'Hardy and Leblanc LLC', 1, 0, '2024-01-15 12:14:28', '2024-01-11 12:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `employer_id` bigint UNSIGNED NOT NULL,
  `applied_date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `user_id`, `employer_id`, `applied_date`, `created_at`, `updated_at`) VALUES
(18, 10, 9, 10, '2024-01-30 14:55:05', '2024-01-30 14:55:05', '2024-01-30 14:55:05'),
(19, 5, 9, 10, '2024-01-30 15:03:43', '2024-01-30 15:03:43', '2024-01-30 15:03:43'),
(20, 10, 1, 10, '2024-01-30 14:55:05', '2024-01-30 14:55:05', '2024-01-30 14:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(2, 'Part Time', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(3, 'Remote', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(4, 'Freelance', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30'),
(5, 'Contract', 1, '2024-01-06 14:48:30', '2024-01-06 14:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 2),
(7, '2024_01_06_193858_create_job_types_table', 3),
(8, '2024_01_06_200459_create_categories_table', 3),
(11, '2024_01_06_201133_create_jobs_table', 4),
(12, '2024_01_27_201709_create_job_applications_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zoe Levy', 'hapujujoqu@mailinator.com', NULL, '$2y$12$vGt.Pfw862XGSlBxUtz89.ROSE.jUjBYmaT6L3uIE9SFaOdN/hUJy', NULL, NULL, NULL, NULL, '2023-12-15 15:05:40', '2023-12-15 15:05:40'),
(2, 'Moana Jenkins', 'sezysak@mailinator.com', NULL, '$2y$12$ObU4IRsPRKGn2rNEBS4gcOWFDmFwNibokJP.QrrD33HSmZmHPUnum', NULL, NULL, NULL, NULL, '2023-12-15 15:05:49', '2023-12-15 15:05:49'),
(3, 'Tanek Daniel', 'qofyba@mailinator.com', NULL, '$2y$12$SGmH/Cbu32Cur8u8vqUV1.Kd.mhiMwKS.aaVDHE0jNES/y6dQevk2', NULL, NULL, NULL, NULL, '2023-12-15 15:06:07', '2023-12-15 15:06:07'),
(4, 'Colby Tyson', 'pudonohi@mailinator.com', NULL, '$2y$12$Bdq/Uu8tcRM3ry9xAqc6/uSjEHBBe2lqgqOGLC98/XvgXjOSU3Vx.', NULL, NULL, NULL, NULL, '2023-12-15 15:08:02', '2023-12-15 15:08:02'),
(5, 'Lacey Reeves', 'tavid@mailinator.com', NULL, '$2y$12$UZpWOhwFCkn4vBVHV6hz7.aQ5QerpNK3X5f/n6TyYqWPi6jkoMcOa', NULL, NULL, NULL, NULL, '2023-12-15 15:08:57', '2023-12-15 15:08:57'),
(6, 'Zephania Howard', 'nugiw@mailinator.com', NULL, '$2y$12$tICEe9Az1fKg4seaK6dzOuBL5j38dB10O5bRHlABGDBQtsJUGFiHO', NULL, NULL, NULL, NULL, '2023-12-15 15:09:11', '2023-12-15 15:09:11'),
(7, 'Maris Mills', 'wozolate@mailinator.com', NULL, '$2y$12$hGH39IjYqysj1rzYhaIP5eVUrTlRWZT07/vF6xDEcaMwRc01N2h.y', NULL, NULL, NULL, NULL, '2023-12-15 15:12:56', '2023-12-15 15:12:56'),
(8, 'Montana Mccormick', 'hevusyx@mailinator.com', NULL, '$2y$12$qC8JVFjQPDYpeLn7pe0nO.PeNgRrOHbqYYzh9JcxB.KtmW2qjGC3a', NULL, NULL, NULL, NULL, '2023-12-15 15:13:31', '2023-12-15 15:13:31'),
(9, 'Sara Jones', 'sara@test.com', NULL, '$2y$12$p7SlzxAFR6V9/MopQVB5tOKeTwnojwLb/1gow5a45sRegoUruS9ky', NULL, NULL, NULL, NULL, '2023-12-16 09:46:54', '2023-12-16 09:46:54'),
(10, 'Amir Khan', 'amir@test.com', NULL, '$2y$12$p7SlzxAFR6V9/MopQVB5tOKeTwnojwLb/1gow5a45sRegoUruS9ky', '10-1704569099.png', 'CEO', '8866008738', NULL, '2023-12-16 10:47:59', '2024-01-15 09:39:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
