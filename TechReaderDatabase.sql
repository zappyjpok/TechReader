-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 21, 2015 at 06:14 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `TechReader`
--
CREATE DATABASE IF NOT EXISTS `TechReader` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `TechReader`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `city`, `postal_code`, `state`, `created_at`, `updated_at`) VALUES
(3, 1, '8197 W Peakview Dr.', 'Denver', '80123', 'Colorado', '2015-07-12 01:22:50', '2015-07-12 13:37:30'),
(4, 1, '339 Jamison #12', 'Littleton', '80120', 'Colorado', '2015-07-12 01:23:35', '2015-07-12 13:28:25'),
(5, 1, '98 Station St. ', 'Fairfield Heights', '2165', 'NSW', '2015-07-12 11:54:38', '2015-07-12 13:42:33'),
(6, 7, '123 fake street ', 'Lakewood', '80123', 'CO', '2015-07-30 21:09:08', '2015-07-31 22:20:53'),
(7, 7, '26 George St. ', 'Mapleton', '65909', 'MN', '2015-07-30 21:09:59', '2015-07-30 21:09:59'),
(8, 10, '89 George St', 'Sydney', '2000', 'NSW', '2015-08-15 17:26:56', '2015-08-15 17:26:56'),
(9, 10, '45 Redfern Sq', 'Sydney', '2000', 'NSW', '2015-08-15 18:06:57', '2015-08-15 18:06:57'),
(10, 9, '89 George St', 'Sydney', '2000', 'NSW', '2015-08-17 17:58:26', '2015-08-17 17:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Mac', '2015-07-12 18:27:16', '2015-07-12 18:27:16'),
(3, 'Programming', '2015-07-12 18:27:27', '2015-07-21 23:40:29'),
(4, 'ASP.Net', '2015-07-12 20:37:38', '2015-07-12 20:37:38'),
(5, 'PHP', '2015-07-12 20:38:41', '2015-07-12 20:38:41'),
(6, 'Windows', '2015-07-13 23:14:54', '2015-07-13 23:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2015_06_06_063335_create_users_table', 1),
('2015_06_06_064259_create_roles_table', 1),
('2015_06_06_064510_create_role_user_pivot_table', 1),
('2015_06_13_122711_create_addresses_table', 1),
('2015_06_20_102704_create_categories_table', 1),
('2015_06_30_070402_create_products_table', 1),
('2015_06_30_070553_create_sales_table', 1),
('2015_07_03_011409_create_profiles_table', 1),
('2015_07_05_041647_create_orders_table', 1),
('2015_07_05_042327_create_order_product_pivot_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `order_product_order_id_index` (`order_id`),
  KEY `order_product_product_id_index` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(52, 4, 0),
(52, 2, 0),
(52, 5, 0),
(52, 8, 0),
(53, 4, 7),
(53, 2, 7),
(53, 5, 7),
(53, 8, 7),
(54, 4, 2),
(54, 2, 3),
(54, 5, 8),
(54, 8, 1),
(55, 4, 10),
(55, 2, 11),
(55, 8, 12),
(55, 5, 20),
(56, 4, 2),
(56, 6, 4),
(57, 4, 2),
(57, 6, 4),
(58, 7, 5),
(59, 3, 5),
(59, 5, 1),
(59, 4, 6),
(59, 8, 3),
(59, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `order_date` date NOT NULL,
  `ship_date` date DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `addess_id` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `order_date`, `ship_date`, `total`, `created_at`, `updated_at`) VALUES
(51, 7, 7, '2015-08-02', NULL, 623.14, '2015-08-01 22:15:54', '2015-08-01 22:15:54'),
(52, 7, 7, '2015-08-02', NULL, 623.14, '2015-08-01 22:16:28', '2015-08-01 22:16:28'),
(53, 7, 7, '2015-08-02', NULL, 623.14, '2015-08-01 22:17:00', '2015-08-01 22:17:00'),
(54, 7, 7, '2015-08-02', NULL, 623.14, '2015-08-01 22:17:24', '2015-08-01 22:17:24'),
(55, 7, 7, '2015-08-02', NULL, 1065.67, '2015-08-01 22:18:17', '2015-08-01 22:18:17'),
(56, 7, 7, '2015-08-03', NULL, 138.94, '2015-08-02 23:13:44', '2015-08-02 23:13:44'),
(57, 7, 7, '2015-08-03', NULL, 138.94, '2015-08-02 23:15:01', '2015-08-02 23:15:01'),
(58, 10, 8, '2015-08-16', NULL, 299.95, '2015-08-15 18:13:35', '2015-08-15 18:13:35'),
(59, 9, 10, '2015-08-18', NULL, 462.25, '2015-08-17 17:58:33', '2015-08-17 17:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_title_unique` (`title`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `name`, `author`, `publish_date`, `publisher`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 'PHP and MySQL Web Development ', 'PHP book ', 'Luke Welling ', '2015-07-13', 'PHP Publishers', 34.99, 'Master today''s best practices for succeeding with PHP 5.6 and MySQL 5.6 web database development! Long acknowledged as the clearest, most practical, and most down-to-earth guide to PHP/MySQL web development, the brand-new Fifth Edition of PHP and MySQL We', '/Applications/MAMP/htdocs/TechReader/public/images/products/phpwebdevelopment_2.jpg', '2015-07-12 20:40:47', '2015-07-12 21:26:41'),
(2, 4, 'ASP.NET Web API 2: Building a REST Service from Start to Finish', 'ASP.Net book ', ' Jamie Kurtz ', '2015-07-06', 'Apress', 29.99, 'The ASP.NET MVC Framework has always been a good platform on which to implement REST-based services, but the introduction of the ASP.NET Web API Framework raised the bar to a whole new level.', '/Applications/MAMP/htdocs/TechReader/public/images/products/webapi_1.jpg', '2015-07-12 21:22:10', '2015-07-12 21:22:10'),
(3, 5, 'Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5 (Learning Php, Mysql, Javascript, Css & Html5) ', 'PHP book ', 'Robin Nixon', '2015-07-13', 'O''Rielly', 19.99, 'The fully revised, updated and extended 4th edition of the hugely popular web development book - includes CSS, HTML5, jQuery and the mysqli extension.', '/Applications/MAMP/htdocs/TechReader/public/images/products/PhpMysqlJavaScript.jpg', '2015-07-12 21:36:43', '2015-07-12 21:37:01'),
(4, 6, 'Windows 8.1 For Seniors For Dummies ', 'Windows book ', 'Peter Weverka ', '2015-07-14', 'For Dummies', 34.99, 'Microsoft, now a little older and wiser, is back with Windows 8.1, the revamped version that brings fresh changes and welcome improvements to the Windows 8 operating system. And now you savvy seniors can get the very most out of this easier-to-use Windows', '/Applications/MAMP/htdocs/TechReader/public/images/products/windowsdummies_1.jpg', '2015-07-13 23:14:40', '2015-07-13 23:15:58'),
(5, 4, 'Murach''s PHP and MySQL', 'php book ', 'Joel Murach ', '2015-07-14', 'Mike Murach & Associates', 54.40, 'That''s what one developer said in an online review of the first edition of Murach''s PHP and MySQL. Now, this 2nd Edition does an even better job of delivering the real-world skills you need to develop database-driven websites using PHP and MySQL, two of t', '/Applications/MAMP/htdocs/TechReader/public/images/products/phpmurdach_4.jpg', '2015-07-13 23:18:09', '2015-07-13 23:18:09'),
(6, 4, 'Pro ASP.NET MVC 5 ', 'MVC', 'Adam Freeman', '2015-07-14', 'Apress', 18.99, 'The ASP.NET MVC 5 Framework is the latest evolution of Microsoft’s ASP.NET web platform. It provides a high-productivity programming model that promotes cleaner code architecture, test-driven development, and powerful extensibility, combined with all the ', '/Applications/MAMP/htdocs/TechReader/public/images/products/aspnetmvc_1.jpg', '2015-07-13 23:19:54', '2015-07-13 23:19:54'),
(7, 4, 'Pro C Sharp 5.0 and the .NET 4.5 Framework ', 'asp book ', 'Andrew Troelsen', '2015-07-14', 'Apress', 59.99, 'This new edition of Pro C# 5.0 and the .NET 4.5 Platform has been completely revised and rewritten to reflect the latest changes to the C# language specification and new advances in the .NET Framework. ', '/Applications/MAMP/htdocs/TechReader/public/images/products/CsharpFramework.jpg', '2015-07-13 23:34:47', '2015-07-13 23:41:08'),
(8, 2, 'Macs All-in-One For Dummies ', 'Mac Book', 'Joe Hutsko', '2014-06-30', 'Dummies ', 34.99, 'It’s a Mac world out there. But if you haven’t read the instruction manual, you may be neglecting some of your computer’s coolest features. Turn to Macs All-in-One For Dummies’ jam-packed guide to access the incredible tools within your computer. With thi', '/Applications/MAMP/htdocs/TechReader/public/images/products/macdummies.jpg', '2015-07-17 15:58:07', '2015-07-17 15:58:08'),
(10, 3, 'PHP Solutions: Dynamic Web Design Made Easy', 'Programming Book', 'David Powers', '2015-10-02', 'Apress', 49.99, 'This is the third edition of David Powers'' highly-respected PHP Solutions: Dynamic Web Design Made Easy. This new edition has been updated by David to incorporate changes to PHP since the second edition and to offer the latest techniques—a classic guide m', '/Applications/MAMP/htdocs/TechReader/public/images/products/phpsolutions.jpg', '2015-08-17 23:43:54', '2015-08-17 23:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `VIP_Number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `VIP_Number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nolan ', 'Legge', '4898-5430', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 'Thuy', 'Legge', '848737289', '', '2015-07-12 15:23:42', '2015-07-12 15:23:42'),
(11, 2, 'Shawn ', 'Legge', '32233322', '', '2015-07-12 16:39:50', '2015-07-12 16:39:50'),
(12, 4, 'Emma Rose ', 'Legge', '38948382', '', '2015-07-17 02:30:12', '2015-07-17 02:30:12'),
(13, 7, 'Paul ', 'Ciavallia ', '48378293', '', '2015-07-30 21:08:45', '2015-07-30 22:10:47'),
(14, 9, 'Mike', 'Branson', '39382384', '', '2015-08-13 21:36:26', '2015-08-13 21:36:26'),
(15, 10, 'John', 'Smith ', '0255449873', '', '2015-08-15 17:26:30', '2015-08-15 17:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 3),
(1, 4),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2015-07-15 00:04:53', '2015-07-15 00:04:53'),
(2, 'Staff', '2015-07-15 00:05:10', '2015-07-15 00:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sales_product_id_foreign` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `start`, `finish`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, '2015-07-06', '2015-07-21', 0.35, '2015-07-12 21:38:30', '2015-07-12 21:38:30'),
(2, 2, '2015-07-07', '2015-07-30', 0.30, '2015-07-13 23:20:17', '2015-07-13 23:20:17'),
(4, 5, '2015-07-07', '2015-07-31', 0.30, '2015-07-13 23:21:04', '2015-07-13 23:21:04'),
(5, 4, '2015-06-09', '2015-08-27', 0.10, '2015-07-13 23:21:23', '2015-07-13 23:21:23'),
(6, 7, '2015-07-06', '2015-07-22', 0.20, '2015-07-13 23:41:33', '2015-07-13 23:41:33'),
(7, 8, '2015-07-07', '2015-07-31', 0.25, '2015-07-21 23:46:08', '2015-07-21 23:46:08'),
(8, 3, '2015-07-27', '2015-08-24', 0.05, '2015-08-07 00:32:24', '2015-08-07 00:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AwesomeNolan', 'Nolan@gmail.com', '$2y$10$IzSUZiE0fSApJZhS/uOJweXNExK8tZJlkyvnpRJahvrxA3gIQboiW', 'mjP9t5RQRzJjXHGkOKNF9miSqfwlwKVCYPGQHdcYPDZrwHfdlc0fa4soLgF6', '2015-07-09 00:23:23', '2015-08-17 19:52:35'),
(2, 'happy', 'happy@gmail.com', '$2y$10$.5RA4Lt8dxhkDyBykWLltu/PArVoz9QSvjtEA2o8iN0foRyEtIbQ6', 'moEHkaNutlFYuYdy5uRpIp4AKK68UqrGzxSuQ9ycc5lWhofEWdgE8WacH5Kp', '2015-07-12 00:26:55', '2015-08-15 21:16:07'),
(3, 'LovelyThuy', 'Thuy@gmail.com', '$2y$10$n4gbAdo0jl2ufvK6fsjQc.gfEmml6hQwMqoVfGDarRz1wq8xliYDe', 'tNWFGF0ten8YM34WOHBmurHxkcmLh55WE3sG21Rhsw22cGaojfRlDYYFPrdB', '2015-07-12 15:22:59', '2015-07-12 15:23:04'),
(4, 'EmmaRose', 'emma@gmail.com', '$2y$10$lYcNd92SGeinibEcJiqsg.elyvk2XBU0V48Mme2saeLJUYvp7njAO', 'aKQKToBpij99O06C6NkxphfNwOZ2gN7Lfbv1IPQ94Id7kMN487JdH3MrwOx7', '2015-07-12 15:29:04', '2015-07-12 16:41:32'),
(5, 'SuperGrandma', 'mommy@gmail.com', '$2y$10$Cndm1ch6zMLuFVVK7b9Y.OmffsD9uWhO71B8dQbEfS/mIKAmkuSCG', NULL, '2015-07-15 21:18:56', '2015-07-15 21:18:56'),
(6, 'Grampy', 'doug@gmail.com', '$2y$10$qiU54c6lsisD5rQm3.8QFew2Dx40UpoTwKnftezg.6sIwNNwYxsWS', 'sRfI9wqpEZC0of4Rv0vZsIUH9I7LHJqWUyR9ivWujVakaNzYq00kqTC7tLfu', '2015-07-16 21:16:14', '2015-07-16 21:16:19'),
(7, 'coolPolice', 'Policeman@gmail.com', '$2y$10$7Yu13tEVXB25IrYxduESEeKsduInXZW1RDmNQC8iW88/fpMh3rA5C', 'PHZbiEPr6IcH0sWGWIjm2pa26wjO2NaY9KDR94cfl4XXU9qFMKNSG40BvrjS', '2015-07-18 19:09:48', '2015-07-31 01:50:56'),
(8, 'funAunt', 'superfundawn@gmail.com', '$2y$10$l3I6pb4q6969izGlsPuw3ev2e9gAbc.rZlPkoAzHz/yNTNmYbEQvC', NULL, '2015-07-28 19:25:26', '2015-07-28 19:25:26'),
(9, 'professorMike', 'ansan@gmail.com', '$2y$10$brBZ3k9HOnweutvvt6uZVu9mV20BddjswDzadMprnnJL0IeOqPsb2', 'OuOD0nP8wON1mN105qeuxBHAtrR5uUTD1Nrb8yH9HNlRYPzyzwpUAXxLLWGf', '2015-08-12 22:44:27', '2015-08-17 17:58:38'),
(10, 'customer', 'customer@yourcompany.com', '$2y$10$O5vSEVxpY35mOM6eClZVu.FZF.kfUbgu54T.1Km7B3I4lfa8CB9na', 'n4atqRLnWSVGKTbVTO3YtmJvKJQzDuRCwiHeaDJy2i2RU8vWw8TZI9PPL5Qv', '2015-08-15 15:07:56', '2015-08-15 18:38:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addess_id` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
