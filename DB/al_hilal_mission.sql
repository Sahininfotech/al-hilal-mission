-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 11:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_hilal_mission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(34) NOT NULL,
  `email` varchar(34) NOT NULL,
  `username` varchar(34) NOT NULL,
  `password` varchar(1055) NOT NULL,
  `ph_no` bigint(34) NOT NULL,
  `address` varchar(225) NOT NULL,
  `Profile_image` varchar(255) NOT NULL,
  `profession` varchar(225) NOT NULL,
  `institute` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `added_by` varchar(225) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `ph_no`, `address`, `Profile_image`, `profession`, `institute`, `country`, `added_by`, `added_on`) VALUES
(14, 'Al-Hilal', 'example@gmail.com', 'al-hilal', '$2y$10$hMDtxsceOWIyNMelJSQsiOv9t74KAYFDjiRnPAEhHYg9y3k6vJjcq', 9143005911, 'Chapadali\r\nBarasat\r\nKolkata', '', 'Teacher', '', 'India', '', '2023-04-04 11:06:58.742330');

-- --------------------------------------------------------

--
-- Table structure for table `admission_fees_dtls`
--

CREATE TABLE `admission_fees_dtls` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_query`
--

CREATE TABLE `admission_query` (
  `id` int(34) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gurdian_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `gender` varchar(34) NOT NULL,
  `previous_school` varchar(255) NOT NULL,
  `previous_class` varchar(11) NOT NULL,
  `admission_class` varchar(34) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(144) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `pin_code` varchar(11) NOT NULL,
  `state` varchar(34) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `added_by` varchar(134) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ids` int(8) NOT NULL,
  `id` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `description` varchar(1555) NOT NULL,
  `image` varchar(255) NOT NULL,
  `overall_pass_marks` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(8) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subject_pass_marks` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_send`
--

CREATE TABLE `contact_send` (
  `id` int(34) NOT NULL,
  `name` varchar(355) NOT NULL,
  `email` varchar(355) NOT NULL,
  `subject` varchar(355) NOT NULL,
  `message` varchar(355) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `added_on` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE `employee_designation` (
  `id` int(11) NOT NULL,
  `designation_id` varchar(255) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `year` varchar(355) NOT NULL,
  `max_marks` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `voucher_no` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `paid_to` varchar(255) NOT NULL,
  `head_of_accounts_id` varchar(255) NOT NULL,
  `description` varchar(1555) NOT NULL,
  `upload_bill` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `status` varchar(34) NOT NULL,
  `date` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_accounts`
--

CREATE TABLE `fees_accounts` (
  `id` int(8) NOT NULL,
  `account_name` varchar(25) NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE `fees_structure` (
  `id` int(11) NOT NULL,
  `class_id` varchar(34) NOT NULL,
  `purpose` varchar(225) NOT NULL,
  `amount` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `notice` varchar(1555) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `subject` varchar(355) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_staff`
--

CREATE TABLE `forum_staff` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(355) NOT NULL,
  `name` varchar(355) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `notice` varchar(1555) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `upload_pageName` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `Min_marks` varchar(255) NOT NULL,
  `Max_marks` varchar(255) NOT NULL,
  `grade_mane` varchar(255) NOT NULL,
  `particular_name` varchar(255) NOT NULL,
  `modified_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_of_accounts`
--

CREATE TABLE `head_of_accounts` (
  `id` int(11) NOT NULL,
  `parent_category` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `description` varchar(1555) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institute_details`
--

CREATE TABLE `institute_details` (
  `id` int(34) NOT NULL,
  `institute_name` varchar(355) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(355) NOT NULL,
  `contact_number` varchar(355) NOT NULL,
  `contact_number2` varchar(34) NOT NULL,
  `address` varchar(355) NOT NULL,
  `about` varchar(355) NOT NULL,
  `post_office` varchar(355) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pin_code` varchar(355) NOT NULL,
  `state` varchar(355) NOT NULL,
  `session` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_fees_dtls`
--

CREATE TABLE `monthly_fees_dtls` (
  `id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `added_by` varchar(255) NOT NULL,
  `modified_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pass_marks`
--

CREATE TABLE `pass_marks` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percentage_marks`
--

CREATE TABLE `percentage_marks` (
  `id` int(11) NOT NULL,
  `rank_type` varchar(255) NOT NULL,
  `min_percentage` varchar(255) NOT NULL,
  `max_percentage` varchar(255) NOT NULL,
  `char` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `princple_details`
--

CREATE TABLE `princple_details` (
  `id` int(34) NOT NULL,
  `name` varchar(355) NOT NULL,
  `address` varchar(355) NOT NULL,
  `email` varchar(355) NOT NULL,
  `contact_no` varchar(355) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `modified_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_donation`
--

CREATE TABLE `revenue_donation` (
  `id` int(11) NOT NULL,
  `name` varchar(355) NOT NULL,
  `address` varchar(355) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pin_code` int(34) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `amount` varchar(355) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `status` varchar(34) NOT NULL,
  `description` varchar(355) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_others`
--

CREATE TABLE `revenue_others` (
  `id` int(11) NOT NULL,
  `source` varchar(355) NOT NULL,
  `vendor_id` varchar(34) NOT NULL,
  `amount` varchar(355) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `description` varchar(1555) NOT NULL,
  `status` varchar(34) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(255) NOT NULL,
  `name` varchar(34) NOT NULL,
  `email` varchar(34) NOT NULL,
  `address` varchar(34) NOT NULL,
  `Password` varchar(1055) NOT NULL,
  `post_office` varchar(255) NOT NULL,
  `sdo_or_bdo` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `qualification` varchar(11) NOT NULL,
  `experience` varchar(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `feature_page` varchar(255) NOT NULL,
  `specialist` varchar(34) NOT NULL,
  `message` varchar(255) NOT NULL,
  `position` varchar(34) NOT NULL,
  `salary` varchar(34) NOT NULL,
  `joinin_date` varchar(34) NOT NULL,
  `status` varchar(34) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `added_by` varchar(34) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_experience`
--

CREATE TABLE `staff_experience` (
  `cid` int(11) NOT NULL,
  `year` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_message`
--

CREATE TABLE `staff_message` (
  `sl_no` int(11) NOT NULL,
  `staff_id` varchar(34) NOT NULL,
  `name` varchar(34) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(34) NOT NULL,
  `status_id` varchar(34) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(34) NOT NULL,
  `image` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `email` varchar(34) NOT NULL,
  `gurdian_name` varchar(34) NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `address` varchar(34) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `post_office` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `sdo_or_bdo` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(34) NOT NULL,
  `status` varchar(34) NOT NULL,
  `added_by` varchar(34) NOT NULL,
  `added_on` varchar(255) NOT NULL,
  `class` varchar(34) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `stream` varchar(34) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `cid` int(11) NOT NULL,
  `student_id` varchar(355) NOT NULL,
  `class_id` varchar(34) NOT NULL,
  `session` varchar(255) NOT NULL,
  `added_on` varchar(34) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_dtls`
--

CREATE TABLE `student_fees_dtls` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gurdian_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `month` datetime(6) NOT NULL,
  `concession` varchar(255) NOT NULL,
  `conc_remark` varchar(255) NOT NULL,
  `payable_fee` varchar(255) NOT NULL,
  `total_due` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_payment_dtls`
--

CREATE TABLE `student_payment_dtls` (
  `id` int(11) NOT NULL,
  `name` varchar(355) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `roll_no` varchar(355) NOT NULL,
  `class` varchar(355) NOT NULL,
  `status` varchar(34) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `amount` varchar(355) NOT NULL,
  `total_amount` varchar(34) NOT NULL,
  `Fees_account` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_payment_summary`
--

CREATE TABLE `student_payment_summary` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_due` varchar(255) NOT NULL,
  `last_paid` varchar(255) NOT NULL,
  `advanced` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_stream`
--

CREATE TABLE `student_stream` (
  `cid` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `class_id` varchar(34) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `added_on` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_summary`
--

CREATE TABLE `student_summary` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `total_due` varchar(255) NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post_office` varchar(255) NOT NULL,
  `police_station` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `sdo_or_bdo` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `exam_status` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_marks`
--

CREATE TABLE `subject_marks` (
  `id` int(11) NOT NULL,
  `class_id` varchar(355) NOT NULL,
  `student_id` varchar(355) NOT NULL,
  `student_roll` varchar(255) NOT NULL,
  `exam_id` varchar(355) NOT NULL,
  `subject_id` varchar(355) NOT NULL,
  `marks` varchar(355) NOT NULL,
  `session` varchar(34) NOT NULL,
  `added_by` varchar(355) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vendor_id` varchar(225) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mob_no` bigint(11) NOT NULL,
  `status` varchar(22) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_fees_dtls`
--
ALTER TABLE `admission_fees_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_query`
--
ALTER TABLE `admission_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classid_classsubjectid_fk` (`class_id`);

--
-- Indexes for table `contact_send`
--
ALTER TABLE `contact_send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_designation`
--
ALTER TABLE `employee_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_accounts`
--
ALTER TABLE `fees_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_structure`
--
ALTER TABLE `fees_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_staff`
--
ALTER TABLE `forum_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_of_accounts`
--
ALTER TABLE `head_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_details`
--
ALTER TABLE `institute_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_fees_dtls`
--
ALTER TABLE `monthly_fees_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_marks`
--
ALTER TABLE `pass_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage_marks`
--
ALTER TABLE `percentage_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `princple_details`
--
ALTER TABLE `princple_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue_donation`
--
ALTER TABLE `revenue_donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue_others`
--
ALTER TABLE `revenue_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_experience`
--
ALTER TABLE `staff_experience`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `staff_message`
--
ALTER TABLE `staff_message`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student_fees_dtls`
--
ALTER TABLE `student_fees_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment_dtls`
--
ALTER TABLE `student_payment_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment_summary`
--
ALTER TABLE `student_payment_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_stream`
--
ALTER TABLE `student_stream`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student_summary`
--
ALTER TABLE `student_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_marks`
--
ALTER TABLE `subject_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admission_fees_dtls`
--
ALTER TABLE `admission_fees_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_query`
--
ALTER TABLE `admission_query`
  MODIFY `id` int(34) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ids` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_send`
--
ALTER TABLE `contact_send`
  MODIFY `id` int(34) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_designation`
--
ALTER TABLE `employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_accounts`
--
ALTER TABLE `fees_accounts`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_structure`
--
ALTER TABLE `fees_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_staff`
--
ALTER TABLE `forum_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `head_of_accounts`
--
ALTER TABLE `head_of_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institute_details`
--
ALTER TABLE `institute_details`
  MODIFY `id` int(34) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_fees_dtls`
--
ALTER TABLE `monthly_fees_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pass_marks`
--
ALTER TABLE `pass_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `percentage_marks`
--
ALTER TABLE `percentage_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `princple_details`
--
ALTER TABLE `princple_details`
  MODIFY `id` int(34) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue_donation`
--
ALTER TABLE `revenue_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue_others`
--
ALTER TABLE `revenue_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_experience`
--
ALTER TABLE `staff_experience`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_message`
--
ALTER TABLE `staff_message`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_dtls`
--
ALTER TABLE `student_fees_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_payment_dtls`
--
ALTER TABLE `student_payment_dtls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_payment_summary`
--
ALTER TABLE `student_payment_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_stream`
--
ALTER TABLE `student_stream`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_summary`
--
ALTER TABLE `student_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_marks`
--
ALTER TABLE `subject_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
