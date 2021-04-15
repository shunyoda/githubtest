-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2021 at 10:07 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_user_table_with_photo`
--

CREATE TABLE `gs_user_table_with_photo` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL DEFAULT '0',
  `img` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gs_user_table_with_photo`
--

INSERT INTO `gs_user_table_with_photo` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `img`) VALUES
(8, '依田峻', '123', '123', 1, 0, '20210408060043図21.png'),
(9, 'よだ', '456', '456', 0, 0, '20210408060116'),
(10, 'しゅん', '789', '789', 1, 0, '20210408060129'),
(11, 'aaa', 'aaa', 'aaa', 1, 0, '20210408060802'),
(12, 'bbb', 'bbb', 'bbb', 1, 0, '20210408060807'),
(17, 'しゅん', '135', '135', 0, 0, '20210415094131'),
(18, 'よだ', 'よだ', 'よだ', 0, 0, '20210415094418'),
(19, 'qqq', 'qqq', 'qqq', 0, 0, '20210415100237');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table_with_photo`
--
ALTER TABLE `gs_user_table_with_photo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table_with_photo`
--
ALTER TABLE `gs_user_table_with_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
