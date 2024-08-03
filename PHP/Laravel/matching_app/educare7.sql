-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-04-22 10:06:11
-- サーバのバージョン： 10.4.25-MariaDB
-- PHP のバージョン: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `educare7`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('1809692a-06f2-4638-b37e-e4e8dd0ba66d', 1, 3, 'aいう', NULL, 0, '2023-04-15 13:07:31', '2023-04-15 13:07:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL COMMENT 'id',
  `email` varchar(255) NOT NULL COMMENT 'メールアドレス',
  `body` text NOT NULL COMMENT 'お問い合わせ内容',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日時',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '送信日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `body`, `updated_at`, `created_at`) VALUES
(1, 'b@example.com', 'テスト', '2023-04-14 21:35:39', '2023-04-14 21:35:39'),
(2, 'b@example.com', 'テスト', '2023-04-14 21:36:50', '2023-04-14 21:36:50'),
(3, 'b@example.com', 'テスト', '2023-04-14 21:39:29', '2023-04-14 21:39:29'),
(4, 'b@example.com', 'テスト', '2023-04-14 21:39:33', '2023-04-14 21:39:33'),
(5, 'b@example.com', 'テスト', '2023-04-14 21:42:38', '2023-04-14 21:42:38'),
(6, 'b@example.com', 'テスト', '2023-04-14 21:43:19', '2023-04-14 21:43:19'),
(7, 'b@example.com', 'test', '2023-04-14 23:15:42', '2023-04-14 23:15:42');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_18_042209_create_swipes_table', 1),
(6, '2023_03_26_999999_add_active_status_to_users', 2),
(7, '2023_03_26_999999_add_avatar_to_users', 2),
(8, '2023_03_26_999999_add_dark_mode_to_users', 2),
(9, '2023_03_26_999999_add_messenger_color_to_users', 2),
(10, '2023_03_26_999999_create_chatify_favorites_table', 2),
(11, '2023_03_26_999999_create_chatify_messages_table', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `swipes`
--

CREATE TABLE `swipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `is_like` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `img_url`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`, `role`) VALUES
(56, 'Admin', 'admin@example.com', NULL, '$2y$10$I.rRWNk.938MPw8jQsJSwe6qWI1mAe0CSmNpkCYUmOOLTwdy5IXhy', NULL, '/storage/images/admin.jpg', '2023-04-17 22:12:43', '2023-04-17 22:12:43', 0, 'avatar.png', 0, NULL, 0),
(57, '一般ユーザー１', 'user1@example.com', NULL, '$2y$10$CWnpoeZgFPe/4jdSeXyK.OtEwAeQ6.kvGNjvCtGdZdqP83jx6usE2', NULL, '/storage/images/user_1.jpg', '2023-04-17 22:17:15', '2023-04-17 22:17:15', 0, 'avatar.png', 0, NULL, 1),
(58, '一般ユーザー2', 'user2@example.com', NULL, '$2y$10$1.GHNzWrg5D8y55vYVPbaekkswM6pSmzL9iccEjiS4V2cUtCIzeWm', NULL, '/storage/images/user_2.jpg', '2023-04-17 22:20:46', '2023-04-17 22:20:46', 0, 'avatar.png', 0, NULL, 1),
(59, '一般ユーザー３', 'user3@example.com', NULL, '$2y$10$xP531BUT3GpxQYHG9pRQbuNYnkTlYDGPxU6m3No9HJFh2TS4oxCIO', NULL, '/storage/images/user_3.jpg', '2023-04-18 00:07:07', '2023-04-18 00:07:07', 0, 'avatar.png', 0, NULL, 1),
(60, '一般ユーザー４', 'user4@example.com', NULL, '$2y$10$fszJ7bHXFQ5upOaIIKAEUugn/C2uX.vzB6fPTR2PKWg5FFsg2KYuG', NULL, '/storage/images/user_4.jpg', '2023-04-18 00:36:12', '2023-04-18 00:36:12', 0, 'avatar.png', 0, NULL, 1),
(61, '一般ユーザー５', 'user5@example.com', NULL, '$2y$10$PTVGqtiVj2eRcrWfEsN/QueleP.5qJnJlcGX7NDjQV1vSWtwgSfdm', NULL, '/storage/images/user_5.jpg', '2023-04-18 00:44:38', '2023-04-18 00:44:38', 0, 'avatar.png', 0, NULL, 1),
(62, '企業ユーザー１', 'company1@example.com', NULL, '$2y$10$8C24EMSK..5ZBDW7fJGzC.Q0MrUqzhCg2dMMJ9NcCQOKv5Nhcrteu', NULL, '/storage/images/company_1.jpg', '2023-04-18 01:00:36', '2023-04-18 01:00:36', 0, 'avatar.png', 0, NULL, 2),
(63, '企業ユーザー２', 'company2@example.com', NULL, '$2y$10$t1vWIPRo6CPDAaVVN7CuvejZK8fgMUP5ChGOXJUFULGn23udbVsXm', NULL, '/storage/images/company_2.jpg', '2023-04-18 11:39:00', '2023-04-18 11:39:00', 0, 'avatar.png', 0, NULL, 2),
(64, '企業ユーザー３', 'company3@example.com', NULL, '$2y$10$VrhED/Eszknol8eoh.1VJe4i1dF2UQ7BlQQAQK09yu7eDnqsIjknq', NULL, '/storage/images/company_3.jpg', '2023-04-18 11:53:05', '2023-04-18 11:53:05', 0, 'avatar.png', 0, NULL, 2),
(65, '企業ユーザー４', 'company4@example.com', NULL, '$2y$10$Q4Eh.Mc8pZSCUTFawu2ufu53Z4uYgKS.zn9Un8eFsm5pQSb7kPwXe', NULL, '/storage/images/company_4.jpg', '2023-04-18 11:53:42', '2023-04-18 11:53:42', 0, 'avatar.png', 0, NULL, 2),
(66, '企業ユーザー５', 'company5@example.com', NULL, '$2y$10$UPzBjtRqbw43tG7fveRy9.YQG2xdvpnIIBqNGNzbV6Aeew8Rbw7xG', NULL, '', '2023-04-18 11:54:28', '2023-04-18 11:54:28', 0, 'avatar.png', 0, NULL, 2);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `swipes`
--
ALTER TABLE `swipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `swipes_from_user_id_foreign` (`from_user_id`),
  ADD KEY `swipes_to_user_id_foreign` (`to_user_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `swipes`
--
ALTER TABLE `swipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `swipes`
--
ALTER TABLE `swipes`
  ADD CONSTRAINT `swipes_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `swipes_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
