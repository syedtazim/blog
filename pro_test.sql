-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 07:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2016-11-07 06:51:23', '2016-11-07 06:51:23'),
(2, 'SEO optimizer', '2016-11-07 06:51:53', '2016-11-07 06:51:53'),
(3, 'Web design', '2016-11-07 06:52:14', '2016-11-07 06:52:14'),
(4, 'Email maerketing', '2016-11-07 06:52:33', '2016-11-07 06:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 'Lablu', 'lablu@gmail.com', 'tazim is my best friend...', 1, 1, '2016-11-08 12:26:04', '2016-11-08 12:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2016_11_02_034347_create_posts_table', 1),
(48, '2016_11_03_163610_add_slug_to_users', 1),
(49, '2016_11_06_120154_add_category_to_post_table', 1),
(50, '2016_11_06_121551_create_categories_table', 1),
(51, '2016_11_07_081751_create_tags_table', 1),
(52, '2016_11_07_082249_create_post_tag_pivot_table', 1),
(53, '2016_11_08_161016_create_comments_table', 2),
(54, '2016_11_09_161333_add_images_to_post_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `category_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Programming Knowledge', 'When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield:When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield:', 'programming', 1, NULL, '2016-11-07 06:54:58', '2016-11-07 06:54:58'),
(2, 'My first card', 'When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield.When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield. When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield', 'first-post', 3, NULL, '2016-11-07 06:56:07', '2016-11-07 06:56:07'),
(3, 'This is our first title', 'When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield:......When defining a child page, you may use the Blade @extends directive to specify which layout the child page should "inherit". Views which @extends a Blade layout may inject content into the layout''s sections using @section directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using @yield:', 'second-post', 1, NULL, '2016-11-07 06:58:12', '2016-11-07 06:58:12'),
(4, 'My first card', 'body of the post', 'first-cards', 2, NULL, '2016-11-07 11:44:41', '2016-11-07 11:44:41'),
(5, 'Haked POst', '<p>Welcome!\r\n</p>\r\n\r\n<p>some thing wrong</p>\r\n<p>&lt;script&gt;alert("o")&lt;/script&gt;</p>', 'hacked-post', 1, NULL, '2016-11-09 04:23:41', '2016-11-09 04:23:41'),
(6, 'Image Post update', '<p>This <em>body</em> is test of <strong>TinyMCE</strong>!</p>\r\n<p>Update this post.</p>\r\n<p>&nbsp;</p>', 'image-post', 3, '1478716266.jpg', '2016-11-09 10:43:45', '2016-11-09 12:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(4, 4, 1),
(5, 4, 2),
(6, 2, 2),
(8, 1, 1),
(11, 2, 4),
(12, 5, 1),
(13, 5, 2),
(14, 6, 4),
(15, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'laravel', '2016-11-07 08:20:56', '2016-11-07 08:20:56'),
(2, 'php', '2016-11-07 08:21:04', '2016-11-07 08:21:04'),
(4, 'WordPress', '2016-11-08 06:48:19', '2016-11-08 06:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tazim', 'tazim@gmail.com', '$2y$10$cBixoZHieCDhnFTXCNrLoOiA7hDDI.fYzxmfkfF2hi5zDCLBiELHe', '5wJuegIzmbKjx46hkyawmsDO6kNy7ORyrSD4W3cIqh4moYFJCqtV9h52C8Lm', '2016-11-07 06:49:57', '2016-11-09 02:03:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
