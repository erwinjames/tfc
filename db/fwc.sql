-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fwc`
--

-- --------------------------------------------------------

--
-- Table structure for table `mlecs_list`
--

CREATE TABLE `mlecs_list` (
  `mlecs_list_id` int(11) NOT NULL,
  `mlecs_list_equip_id` int(100) NOT NULL,
  `mlecs_list_equip_desc` text NOT NULL,
  `mlecs_list_equip_manuf` text NOT NULL,
  `mlecs_list_mlecs_sn` text NOT NULL,
  `mlecs_list_cp` text NOT NULL,
  `mlecs_list_lcd` date NOT NULL,
  `mlecs_list_cd` date NOT NULL,
  `mlecs_list_cbo` text NOT NULL,
  `flag_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlecs_list`
--

INSERT INTO `mlecs_list` (`mlecs_list_id`, `mlecs_list_equip_id`, `mlecs_list_equip_desc`, `mlecs_list_equip_manuf`, `mlecs_list_mlecs_sn`, `mlecs_list_cp`, `mlecs_list_lcd`, `mlecs_list_cd`, `mlecs_list_cbo`, `flag_status`) VALUES
(1, 0, 'fasdfa', 'dfasdfa', 'dfadsf', 'Weekly', '2023-05-09', '2023-05-09', 'dfadsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mlecs_record`
--

CREATE TABLE `mlecs_record` (
  `mlecs_record_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `mlecs_record_f_list_id` int(11) NOT NULL,
  `ao_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlecs_record`
--

INSERT INTO `mlecs_record` (`mlecs_record_id`, `table_id`, `mlecs_record_f_list_id`, `ao_date`) VALUES
(1, 1, 1, '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `mlecs_reviewer_sign`
--

CREATE TABLE `mlecs_reviewer_sign` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `rev_sign` text NOT NULL,
  `rev_name` varchar(100) NOT NULL,
  `rev_position` varchar(100) NOT NULL,
  `rev_sign_image` text NOT NULL,
  `rev_date` text NOT NULL,
  `appr_sign` text NOT NULL,
  `appr_name` varchar(100) NOT NULL,
  `appr_position` varchar(100) NOT NULL,
  `appr_sign_image` text NOT NULL,
  `appr_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlecs_reviewer_sign`
--

INSERT INTO `mlecs_reviewer_sign` (`id`, `table_id`, `rev_sign`, `rev_name`, `rev_position`, `rev_sign_image`, `rev_date`, `appr_sign`, `appr_name`, `appr_position`, `appr_sign_image`, `appr_date`) VALUES
(0, 1, 'data:image/png;base64,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', 'fasdf', 'dfasdf', '', '2023-05-09T10:34', 'data:image/png;base64,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', 'dfasdf', 'dfasdf', '', '2023-05-09T10:34');

-- --------------------------------------------------------

--
-- Table structure for table `tcf_list`
--

CREATE TABLE `tcf_list` (
  `tcf_list_id` int(11) NOT NULL,
  `tcf_list_date` date NOT NULL,
  `tcf_list_time` time NOT NULL,
  `tcf_list_checker_initial` varchar(100) NOT NULL,
  `tcf_list_ther_id` text NOT NULL,
  `tcf_list_nist_ther` text NOT NULL,
  `tcf_list_ther_act_read` text NOT NULL,
  `tcf_list_diff` text NOT NULL,
  `tcf_list_comment` text NOT NULL,
  `tcf_flag_stat` tinyint(1) NOT NULL,
  `tcf_rev_stat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tcf_list`
--

INSERT INTO `tcf_list` (`tcf_list_id`, `tcf_list_date`, `tcf_list_time`, `tcf_list_checker_initial`, `tcf_list_ther_id`, `tcf_list_nist_ther`, `tcf_list_ther_act_read`, `tcf_list_diff`, `tcf_list_comment`, `tcf_flag_stat`, `tcf_rev_stat`) VALUES
(1, '2023-05-10', '09:50:00', 'dfasd', 'dfasdfa', 'dfasdfa', 'dfadsf', 'dfasdf', 'dfads', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tcf_record`
--

CREATE TABLE `tcf_record` (
  `tcf_record_id` int(11) NOT NULL,
  `tcf_record_table_id` int(11) NOT NULL,
  `tcf_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tcf_record`
--

INSERT INTO `tcf_record` (`tcf_record_id`, `tcf_record_table_id`, `tcf_list_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tcf_reviewer_sign`
--

CREATE TABLE `tcf_reviewer_sign` (
  `id` int(11) NOT NULL,
  `tcf_record_table_id` int(11) NOT NULL,
  `per_sign` text NOT NULL,
  `per_name` varchar(100) NOT NULL,
  `per_position` varchar(100) NOT NULL,
  `per_sign_image` text NOT NULL,
  `per_date` text NOT NULL,
  `rev_sign` text NOT NULL,
  `rev_name` varchar(100) NOT NULL,
  `rev_position` varchar(100) NOT NULL,
  `rev_sign_image` text NOT NULL,
  `rev_date` text NOT NULL,
  `ver_sign` text NOT NULL,
  `ver_name` varchar(100) NOT NULL,
  `ver_position` varchar(100) NOT NULL,
  `ver_sign_image` text NOT NULL,
  `ver_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tcf_reviewer_sign`
--

INSERT INTO `tcf_reviewer_sign` (`id`, `tcf_record_table_id`, `per_sign`, `per_name`, `per_position`, `per_sign_image`, `per_date`, `rev_sign`, `rev_name`, `rev_position`, `rev_sign_image`, `rev_date`, `ver_sign`, `ver_name`, `ver_position`, `ver_sign_image`, `ver_date`) VALUES
(1, 1, 'data:image/png;base64,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', 'dfasd', 'fasdf', '', '2023-05-10T08:50', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mlecs_list`
--
ALTER TABLE `mlecs_list`
  ADD PRIMARY KEY (`mlecs_list_id`);

--
-- Indexes for table `mlecs_record`
--
ALTER TABLE `mlecs_record`
  ADD PRIMARY KEY (`mlecs_record_id`);

--
-- Indexes for table `tcf_list`
--
ALTER TABLE `tcf_list`
  ADD PRIMARY KEY (`tcf_list_id`);

--
-- Indexes for table `tcf_record`
--
ALTER TABLE `tcf_record`
  ADD PRIMARY KEY (`tcf_record_id`);

--
-- Indexes for table `tcf_reviewer_sign`
--
ALTER TABLE `tcf_reviewer_sign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mlecs_list`
--
ALTER TABLE `mlecs_list`
  MODIFY `mlecs_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mlecs_record`
--
ALTER TABLE `mlecs_record`
  MODIFY `mlecs_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tcf_list`
--
ALTER TABLE `tcf_list`
  MODIFY `tcf_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tcf_record`
--
ALTER TABLE `tcf_record`
  MODIFY `tcf_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tcf_reviewer_sign`
--
ALTER TABLE `tcf_reviewer_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
