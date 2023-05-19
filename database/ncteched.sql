-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 02:29 AM
-- Server version: 10.1.22-MariaDB-1~xenial
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncteched`
--

-- --------------------------------------------------------

--
-- Table structure for table `commeettee`
--

CREATE TABLE `commeettee` (
  `commeettee_id` int(11) NOT NULL COMMENT 'หมายเลขคณะกรรมการ',
  `commeettee_fname` varchar(128) NOT NULL COMMENT 'ชื่อ',
  `commeettee_address` varchar(300) NOT NULL DEFAULT '1518' COMMENT 'ที่อยู่',
  `commeettee_district` varchar(50) NOT NULL DEFAULT 'วงศ์สว่าง' COMMENT 'ตำบล/แขวง',
  `commeettee_county` varchar(50) NOT NULL DEFAULT 'บางซื่อ' COMMENT 'เขต/อำเภอ',
  `commeettee_road` varchar(50) NOT NULL DEFAULT 'ถนนประชาราษฎร์ 1' COMMENT 'ถนน',
  `commeettee_building` varchar(30) DEFAULT '-' COMMENT 'อาคาร',
  `commeettee_floor` varchar(10) DEFAULT '-' COMMENT 'ชั้น',
  `commeettee_province` varchar(50) DEFAULT 'กรุงเทพมหานคร' COMMENT 'จังหวัด',
  `commeettee_zip` varchar(10) DEFAULT '10800' COMMENT 'รหัสไปรษณีย์',
  `commeettee_tel` varchar(16) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `commeettee_fax` varchar(16) NOT NULL DEFAULT '-' COMMENT 'โทรสาร',
  `commeettee_type_name` varchar(255) NOT NULL COMMENT 'ชื่อฝ่าย',
  `commeettee_pic` varchar(200) NOT NULL COMMENT 'รูปคณะกรรมการ',
  `user_id` int(7) NOT NULL COMMENT 'รหัสประจำตัวผู้ใช้งาน',
  `commeettee_department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='คณะกรรมการ';

--
-- Dumping data for table `commeettee`
--

INSERT INTO `commeettee` (`commeettee_id`, `commeettee_fname`, `commeettee_address`, `commeettee_district`, `commeettee_county`, `commeettee_road`, `commeettee_building`, `commeettee_floor`, `commeettee_province`, `commeettee_zip`, `commeettee_tel`, `commeettee_fax`, `commeettee_type_name`, `commeettee_pic`, `user_id`, `commeettee_department`) VALUES
(15, 'admin', '้้้ดดกด', '5585858', '58585858585', 'เดเดเดเดเดเดเด', 'ดเดเดเดเด', '-', 'กรุงเทพมหานคร', '54545', '024618709', '255535353555535', 'คณะกรรมการ', '', 2, ''),
(96, 'Phanthakit Kampa', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '0876824665', '-', 'คณะกรรมการ', '', 139, 'สาขาวิศวกรรมเครื่องกล, สาขาครุศาสตร์เครื่องกล, สาขาวิศวกรรมไฟฟ้า, สาขาครุศาสตร์ไฟฟ้า, สาขาวิศวกรรมโยธา, สาขาครุศาสตร์โยธา, สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ, สาขาบริหารอาชีวะและเทคนิคศึกษา, สาขาบริหารธุรกิจอุตสาหกรรม, สาขาอื่นๆที่เกี่ยวข้อง'),
(97, 'ชัยกุล อิอิ', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', '', '', 151, ''),
(98, 'Phanthakit Kampa', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10290', '0876824665', '-', 'คณะกรรมการ', '', 152, 'สาขาวิศวกรรมเครื่องกล, สาขาครุศาสตร์เครื่องกล, สาขาวิศวกรรมไฟฟ้า, สาขาครุศาสตร์ไฟฟ้า, สาขาวิศวกรรมโยธา, สาขาครุศาสตร์โยธา, สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ, สาขาบริหารอาชีวะและเทคนิคศึกษา, สาขาบริหารธุรกิจอุตสาหกรรม, สาขาอื่นๆที่เกี่ยวข้อง'),
(99, 'muk', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '0876824665', '-', 'คณะกรรมการ', '', 153, 'สาขาวิศวกรรมเครื่องกล, สาขาครุศาสตร์เครื่องกล, สาขาวิศวกรรมไฟฟ้า, สาขาครุศาสตร์ไฟฟ้า, สาขาวิศวกรรมโยธา, สาขาครุศาสตร์โยธา, สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ, สาขาบริหารอาชีวะและเทคนิคศึกษา, สาขาบริหารธุรกิจอุตสาหกรรม, สาขาอื่นๆที่เกี่ยวข้อง'),
(100, 'อรดี พลดาหาญ', 'asda', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', 'asdasd', '-', 'คณะกรรมการ', '', 157, 'สาขาวิศวกรรมเครื่องกล, สาขาครุศาสตร์เครื่องกล, สาขาวิศวกรรมไฟฟ้า, สาขาครุศาสตร์ไฟฟ้า, สาขาวิศวกรรมโยธา, สาขาครุศาสตร์โยธา, สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ, สาขาบริหารอาชีวะและเทคนิคศึกษา, สาขาบริหารธุรกิจอุตสาหกรรม, สาขาอื่นๆที่เกี่ยวข้อง'),
(101, 'จิโรจ ศิริโรโรจน์', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', 'xxxx', '-', 'คณะกรรมการ', '', 158, 'สาขาวิศวกรรมเครื่องกล, สาขาครุศาสตร์เครื่องกล, สาขาวิศวกรรมไฟฟ้า, สาขาครุศาสตร์ไฟฟ้า, สาขาวิศวกรรมโยธา, สาขาครุศาสตร์โยธา, สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ, สาขาบริหารอาชีวะและเทคนิคศึกษา, สาขาบริหารธุรกิจอุตสาหกรรม, สาขาอื่นๆที่เกี่ยวข้อง'),
(102, 'สมคิด เตียตระกูล', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', 'xxxxxxxx', '-', 'คณะกรรมการ', '', 159, 'สาขาวิศวกรรมเครื่องกล, สาขาครุศาสตร์เครื่องกล, สาขาวิศวกรรมไฟฟ้า, สาขาครุศาสตร์ไฟฟ้า, สาขาวิศวกรรมโยธา, สาขาครุศาสตร์โยธา, สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ, สาขาบริหารอาชีวะและเทคนิคศึกษา, สาขาบริหารธุรกิจอุตสาหกรรม, สาขาอื่นๆที่เกี่ยวข้อง');

-- --------------------------------------------------------

--
-- Table structure for table `commeettee_type`
--

CREATE TABLE `commeettee_type` (
  `commeettee_type_id` int(11) NOT NULL,
  `commeettee_type_name` varchar(128) NOT NULL,
  `commeettee_type_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commeettee_type`
--

INSERT INTO `commeettee_type` (`commeettee_type_id`, `commeettee_type_name`, `commeettee_type_status`) VALUES
(11, 'คณะกรรมการ', 'YES'),
(12, 'ฝ่ายอื่นๆ', 'NO'),
(13, 'บรรณาธิการ', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `conferences_select_on`
--

CREATE TABLE `conferences_select_on` (
  `conferences_select_id` int(11) NOT NULL,
  `conferences_select_on` int(4) NOT NULL,
  `conferences_select_note` text COLLATE utf8_unicode_ci NOT NULL,
  `conferences_select_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conferences_select_on`
--

INSERT INTO `conferences_select_on` (`conferences_select_id`, `conferences_select_on`, `conferences_select_note`, `conferences_select_status`) VALUES
(1, 1, '2011/1', 0),
(2, 2, '2012/2', 0),
(3, 3, '2013/3', 0),
(4, 4, '2014/4', 0),
(5, 5, '2015/5', 0),
(6, 6, '2016/6', 0),
(7, 7, '2016/7', 0),
(8, 8, '2016/8', 0),
(9, 9, '2017/9', 0),
(10, 10, '2017/10', 0),
(11, 11, '2017/11', 0),
(12, 12, '2017/12', 0),
(13, 13, '2017/13', 0),
(14, 14, '2017/14', 0),
(15, 15, '2017/15', 0),
(16, 16, '2017/16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(255) NOT NULL,
  `department_name` varchar(300) NOT NULL,
  `department_status` varchar(100) NOT NULL,
  `department_count_payment` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_status`, `department_count_payment`) VALUES
(1, 'สาขาวิศวกรรมเครื่องกล', 'YES', 0),
(2, 'สาขาครุศาสตร์เครื่องกล', 'YES', 0),
(3, 'สาขาวิศวกรรมไฟฟ้า', 'YES', 0),
(4, 'สาขาครุศาสตร์ไฟฟ้า', 'YES', 0),
(5, 'สาขาวิศวกรรมโยธา', 'YES', 0),
(6, 'สาขาครุศาสตร์โยธา', 'YES', 0),
(7, 'สาขาเทคโนโลยีทางการศึกษา คอมพิวเตอร์ศึกษา และเทคโนโลยีสารสนเทศ', 'YES', 0),
(8, 'สาขาบริหารอาชีวะและเทคนิคศึกษา', 'YES', 0),
(9, 'สาขาบริหารธุรกิจอุตสาหกรรม', 'YES', 0),
(10, 'สาขาอื่นๆที่เกี่ยวข้อง', 'YES', 0);

-- --------------------------------------------------------

--
-- Table structure for table `downloadpaper_file`
--

CREATE TABLE `downloadpaper_file` (
  `downloadpaper_file_id` int(5) NOT NULL,
  `downloadpaper_file_name` varchar(300) NOT NULL,
  `downloadpaper_file_year` year(4) NOT NULL,
  `downloadpaper_file_no` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `downloadpaper_file`
--

INSERT INTO `downloadpaper_file` (`downloadpaper_file_id`, `downloadpaper_file_name`, `downloadpaper_file_year`, `downloadpaper_file_no`) VALUES
(1, 'NCTechEd001.pdf', 2008, 1),
(2, 'NCTechEd002.pdf', 2009, 2),
(3, 'NCTechEd003.pdf', 2010, 3),
(4, 'NCTechEd004.pdf', 2011, 4),
(5, 'NCTechEd005.pdf', 2012, 5),
(6, 'NCTechEd006.pdf', 2013, 6),
(7, 'NCTechEd007.pdf', 2014, 7),
(8, 'NCTechEd008.pdf', 2016, 8);

-- --------------------------------------------------------

--
-- Table structure for table `email_system`
--

CREATE TABLE `email_system` (
  `email_system_id` int(2) NOT NULL,
  `protocol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_port` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `charset` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mailtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_system`
--

INSERT INTO `email_system` (`email_system_id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `charset`, `mailtype`) VALUES
(1, 'smtp', 'ssl://smtp.gmail.com', '465', 'ncteched.kmutnb@gmail.com', 'kmutnb123456', 'utf-8', 'html');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int(11) NOT NULL,
  `paper_detail_id` int(11) NOT NULL,
  `paper_file_id` int(11) NOT NULL,
  `evaluation_number1` int(11) NOT NULL,
  `evaluation_number2` int(11) NOT NULL,
  `evaluation_number3` int(11) NOT NULL,
  `evaluation_number4` int(11) NOT NULL,
  `evaluation_number5` int(11) NOT NULL,
  `evaluation_number6` int(11) NOT NULL,
  `evaluation_number7` int(11) NOT NULL,
  `evaluation_number8` int(11) NOT NULL,
  `evaluation_number9` int(11) NOT NULL,
  `evaluation_number10` int(11) NOT NULL,
  `evaluation_comment` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='แบบประเมิน';

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `paper_detail_id`, `paper_file_id`, `evaluation_number1`, `evaluation_number2`, `evaluation_number3`, `evaluation_number4`, `evaluation_number5`, `evaluation_number6`, `evaluation_number7`, `evaluation_number8`, `evaluation_number9`, `evaluation_number10`, `evaluation_comment`, `date_create`, `status`, `user_id`) VALUES
(1, 5, 6, 5, 4, 3, 4, 4, 4, 1, 4, 4, 1, '', '2017-08-15 16:18:04', 0, 152),
(2, 5, 7, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-08-16 06:33:00', 0, 152),
(3, 8, 8, 5, 4, 3, 2, 3, 4, 3, 2, 3, 4, '', '2017-08-19 19:17:40', 0, 152),
(4, 2, 2, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-08-22 09:27:40', 0, 152),
(5, 8, 12, 5, 5, 5, 5, 5, 1, 1, 1, 1, 1, '', '2017-08-22 10:18:18', 0, 152),
(6, 13, 13, 3, 3, 3, 3, 3, 2, 2, 2, 2, 2, '', '2017-09-24 10:02:07', 0, 152),
(7, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-10-22 07:37:29', 0, 152),
(8, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-10-22 07:38:38', 0, 152),
(9, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 3, '', '2017-10-22 07:43:54', 0, 157),
(10, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-10-22 07:49:06', 0, 158),
(11, 18, 17, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '2017-10-22 13:16:06', 0, 152),
(12, 19, 18, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '', '2017-10-22 17:52:18', 0, 152),
(13, 19, 19, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-10-22 19:43:35', 0, 152),
(14, 24, 25, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, '', '2017-11-03 20:56:57', 0, 152),
(15, 25, 26, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2017-11-04 06:05:06', 0, 153),
(16, 27, 27, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2018-01-29 19:10:59', 0, 152),
(17, 27, 28, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2018-01-30 07:54:55', 0, 152),
(18, 28, 29, 5, 5, 5, 5, 3, 3, 3, 4, 4, 4, '', '2018-01-30 09:40:56', 0, 152),
(19, 28, 29, 5, 5, 5, 5, 3, 3, 2, 2, 2, 2, '', '2018-01-30 09:43:02', 0, 152),
(20, 26, 30, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2018-02-01 07:14:51', 0, 152),
(21, 29, 31, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '2018-02-01 07:24:20', 0, 152);

-- --------------------------------------------------------

--
-- Table structure for table `file_announce`
--

CREATE TABLE `file_announce` (
  `file_announce_id` int(255) NOT NULL,
  `file_announce_name` varchar(300) NOT NULL,
  `file_announce_note` varchar(100) NOT NULL,
  `file_announce_status` varchar(3) NOT NULL DEFAULT 'NO',
  `file_announce_conferences_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_announce`
--

INSERT INTO `file_announce` (`file_announce_id`, `file_announce_name`, `file_announce_note`, `file_announce_status`, `file_announce_conferences_on`) VALUES
(1, 'NC-conferences-8-2016-0.pdf', '55', 'NO', '8'),
(2, 'NC-conferences-x-xxxx-x.pdf', '-', 'NO', '7'),
(3, 'NC-conferences-x-xxxx-x.pdf', '-', 'NO', '9'),
(4, 'NC-conferences-x-xxxx-x.pdf', '-', 'NO', '6'),
(5, 'NC-conferences-x-xxxx-x.pdf', '-', 'NO', '13'),
(6, 'NC-conferences-x-xxxx-x.pdf', '-', 'NO', '16'),
(7, 'NC-conferences-x-xxxx-x.pdf', '-', 'NO', '4');

-- --------------------------------------------------------

--
-- Table structure for table `file_manual`
--

CREATE TABLE `file_manual` (
  `file_manual_id` int(255) NOT NULL,
  `file_manual_name` varchar(300) NOT NULL,
  `file_manual_note` varchar(100) NOT NULL,
  `file_manual_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_manual`
--

INSERT INTO `file_manual` (`file_manual_id`, `file_manual_name`, `file_manual_note`, `file_manual_type`) VALUES
(1, 'NC-manual-user-2018-V0.pdf', '', 'ผู้ส่งงานวิจัย'),
(2, 'NC-manual-reviewer-2018-V0.pdf', '', 'ผู้ตรวจบทความ'),
(3, 'NC-manual-admin_or_board-2018-V0.pdf', '', 'คณะกรรมการ');

-- --------------------------------------------------------

--
-- Table structure for table `file_schedule`
--

CREATE TABLE `file_schedule` (
  `file_schedule_id` int(255) NOT NULL,
  `file_schedule_name` varchar(300) NOT NULL,
  `file_schedule_note` varchar(100) NOT NULL,
  `file_schedule_conferences_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_schedule`
--

INSERT INTO `file_schedule` (`file_schedule_id`, `file_schedule_name`, `file_schedule_note`, `file_schedule_conferences_on`) VALUES
(1, 'NCtechEd-8-2016-Conference-Session-Schedule-02.pdf', '-', '9'),
(2, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '7'),
(3, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '4'),
(4, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '8'),
(5, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '8'),
(6, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '6'),
(7, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '13'),
(8, 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf', '-', '16');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `footer_id` int(255) NOT NULL,
  `footer_pic` varchar(300) NOT NULL DEFAULT 'no_pic.png',
  `footer_conferences_on` int(4) NOT NULL,
  `footer_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`footer_id`, `footer_pic`, `footer_conferences_on`, `footer_status`) VALUES
(3, 'footerwebNC-2016-0.jpg', 1, 'YES'),
(4, 'footerwebNC-2016-01.jpg', 1, 'YES'),
(5, 'footerwebNC-2016-0.png', 1, 'YES'),
(6, 'footerwebNC-2016-01.png', 1, 'YES'),
(7, 'footerwebNC-2016-02.png', 1, 'YES'),
(8, 'footerwebNC-2016-03.png', 1, 'YES'),
(9, 'footerwebNC-2016-04.png', 1, 'YES'),
(10, 'footerwebNC-2016-02.jpg', 1, 'YES'),
(11, 'footerwebNC-2016-03.JPG', 1, 'YES'),
(12, 'footerwebNC-2016-04.jpg', 1, 'YES'),
(13, 'footerwebNC-2016-05.jpg', 1, 'YES'),
(14, 'footerwebNC-2016-06.jpg', 1, 'YES'),
(15, 'footerwebNC-2016-07.jpg', 1, 'YES'),
(16, 'footerwebNC-2016-0.jpg', 2, 'YES'),
(17, 'footerwebNC-2016-01.jpg', 2, 'YES'),
(18, 'footerwebNC-2016-0.png', 2, 'YES'),
(19, 'footerwebNC-2016-01.png', 2, 'YES'),
(20, 'footerwebNC-2016-02.png', 2, 'YES'),
(21, 'footerwebNC-2016-03.png', 2, 'YES'),
(22, 'footerwebNC-2016-04.png', 2, 'YES'),
(23, 'footerwebNC-2016-02.jpg', 2, 'YES'),
(24, 'footerwebNC-2016-03.JPG', 2, 'YES'),
(25, 'footerwebNC-2016-04.jpg', 2, 'YES'),
(26, 'footerwebNC-2016-05.jpg', 2, 'YES'),
(27, 'footerwebNC-2016-06.jpg', 2, 'YES'),
(28, 'footerwebNC-2016-07.jpg', 2, 'YES'),
(29, 'footerwebNC-2016-0.jpg', 3, 'YES'),
(30, 'footerwebNC-2016-01.jpg', 3, 'YES'),
(31, 'footerwebNC-2016-0.png', 3, 'YES'),
(32, 'footerwebNC-2016-01.png', 3, 'YES'),
(33, 'footerwebNC-2016-02.png', 3, 'YES'),
(34, 'footerwebNC-2016-03.png', 3, 'YES'),
(35, 'footerwebNC-2016-04.png', 3, 'YES'),
(36, 'footerwebNC-2016-02.jpg', 3, 'YES'),
(37, 'footerwebNC-2016-03.JPG', 3, 'YES'),
(38, 'footerwebNC-2016-04.jpg', 3, 'YES'),
(39, 'footerwebNC-2016-05.jpg', 3, 'YES'),
(40, 'footerwebNC-2016-06.jpg', 3, 'YES'),
(41, 'footerwebNC-2016-07.jpg', 3, 'YES'),
(42, 'footerwebNC-2016-0.jpg', 4, 'YES'),
(43, 'footerwebNC-2016-01.jpg', 4, 'YES'),
(44, 'footerwebNC-2016-0.png', 4, 'YES'),
(45, 'footerwebNC-2016-01.png', 4, 'YES'),
(46, 'footerwebNC-2016-02.png', 4, 'YES'),
(47, 'footerwebNC-2016-03.png', 4, 'YES'),
(48, 'footerwebNC-2016-04.png', 4, 'YES'),
(49, 'footerwebNC-2016-02.jpg', 4, 'YES'),
(50, 'footerwebNC-2016-03.JPG', 4, 'YES'),
(51, 'footerwebNC-2016-04.jpg', 4, 'YES'),
(52, 'footerwebNC-2016-05.jpg', 4, 'YES'),
(53, 'footerwebNC-2016-06.jpg', 4, 'YES'),
(54, 'footerwebNC-2016-07.jpg', 4, 'YES'),
(55, 'footerwebNC-2016-0.jpg', 5, 'YES'),
(56, 'footerwebNC-2016-01.jpg', 5, 'YES'),
(57, 'footerwebNC-2016-0.png', 5, 'YES'),
(58, 'footerwebNC-2016-01.png', 5, 'YES'),
(59, 'footerwebNC-2016-02.png', 5, 'YES'),
(60, 'footerwebNC-2016-03.png', 5, 'YES'),
(61, 'footerwebNC-2016-04.png', 5, 'YES'),
(62, 'footerwebNC-2016-02.jpg', 5, 'YES'),
(63, 'footerwebNC-2016-03.JPG', 5, 'YES'),
(64, 'footerwebNC-2016-04.jpg', 5, 'YES'),
(65, 'footerwebNC-2016-05.jpg', 5, 'YES'),
(66, 'footerwebNC-2016-06.jpg', 5, 'YES'),
(67, 'footerwebNC-2016-07.jpg', 5, 'YES'),
(68, 'footerwebNC-2016-0.jpg', 6, 'YES'),
(69, 'footerwebNC-2016-01.jpg', 6, 'YES'),
(70, 'footerwebNC-2016-0.png', 6, 'YES'),
(71, 'footerwebNC-2016-01.png', 6, 'YES'),
(72, 'footerwebNC-2016-02.png', 6, 'YES'),
(73, 'footerwebNC-2016-03.png', 6, 'YES'),
(74, 'footerwebNC-2016-04.png', 6, 'YES'),
(75, 'footerwebNC-2016-02.jpg', 6, 'YES'),
(76, 'footerwebNC-2016-03.JPG', 6, 'YES'),
(77, 'footerwebNC-2016-04.jpg', 6, 'YES'),
(78, 'footerwebNC-2016-05.jpg', 6, 'YES'),
(79, 'footerwebNC-2016-06.jpg', 6, 'YES'),
(80, 'footerwebNC-2016-07.jpg', 6, 'YES'),
(81, 'footerwebNC-2016-0.jpg', 7, 'YES'),
(82, 'footerwebNC-2016-01.jpg', 7, 'YES'),
(83, 'footerwebNC-2016-0.png', 7, 'YES'),
(84, 'footerwebNC-2016-01.png', 7, 'YES'),
(85, 'footerwebNC-2016-02.png', 7, 'YES'),
(86, 'footerwebNC-2016-03.png', 7, 'YES'),
(87, 'footerwebNC-2016-04.png', 7, 'YES'),
(88, 'footerwebNC-2016-02.jpg', 7, 'YES'),
(89, 'footerwebNC-2016-03.JPG', 7, 'YES'),
(90, 'footerwebNC-2016-04.jpg', 7, 'YES'),
(91, 'footerwebNC-2016-05.jpg', 7, 'YES'),
(92, 'footerwebNC-2016-06.jpg', 7, 'YES'),
(93, 'footerwebNC-2016-07.jpg', 7, 'YES'),
(94, 'footerwebNC-2016-0.jpg', 8, 'YES'),
(95, 'footerwebNC-2016-01.jpg', 8, 'YES'),
(96, 'footerwebNC-2016-0.png', 8, 'YES'),
(97, 'footerwebNC-2016-01.png', 8, 'YES'),
(98, 'footerwebNC-2016-02.png', 8, 'YES'),
(99, 'footerwebNC-2016-03.png', 8, 'YES'),
(100, 'footerwebNC-2016-04.png', 8, 'YES'),
(101, 'footerwebNC-2016-02.jpg', 8, 'YES'),
(102, 'footerwebNC-2016-03.JPG', 8, 'YES'),
(103, 'footerwebNC-2016-04.jpg', 8, 'YES'),
(104, 'footerwebNC-2016-05.jpg', 8, 'YES'),
(105, 'footerwebNC-2016-06.jpg', 8, 'YES'),
(106, 'footerwebNC-2016-07.jpg', 8, 'YES'),
(107, 'footerwebNC-2016-0.jpg', 9, 'YES'),
(108, 'footerwebNC-2016-01.jpg', 9, 'YES'),
(109, 'footerwebNC-2016-0.png', 9, 'YES'),
(110, 'footerwebNC-2016-01.png', 9, 'YES'),
(111, 'footerwebNC-2016-02.png', 9, 'YES'),
(112, 'footerwebNC-2016-03.png', 9, 'YES'),
(113, 'footerwebNC-2016-04.png', 9, 'YES'),
(114, 'footerwebNC-2016-02.jpg', 9, 'YES'),
(115, 'footerwebNC-2016-03.JPG', 9, 'YES'),
(116, 'footerwebNC-2016-04.jpg', 9, 'YES'),
(117, 'footerwebNC-2016-05.jpg', 9, 'YES'),
(118, 'footerwebNC-2016-06.jpg', 9, 'YES'),
(119, 'footerwebNC-2016-07.jpg', 9, 'YES'),
(120, 'footerwebNC-2016-0.jpg', 10, 'YES'),
(121, 'footerwebNC-2016-01.jpg', 10, 'YES'),
(122, 'footerwebNC-2016-0.png', 10, 'YES'),
(123, 'footerwebNC-2016-01.png', 10, 'YES'),
(124, 'footerwebNC-2016-02.png', 10, 'YES'),
(125, 'footerwebNC-2016-03.png', 10, 'YES'),
(126, 'footerwebNC-2016-04.png', 10, 'YES'),
(127, 'footerwebNC-2016-02.jpg', 10, 'YES'),
(128, 'footerwebNC-2016-03.JPG', 10, 'YES'),
(129, 'footerwebNC-2016-04.jpg', 10, 'YES'),
(130, 'footerwebNC-2016-05.jpg', 10, 'YES'),
(131, 'footerwebNC-2016-06.jpg', 10, 'YES'),
(132, 'footerwebNC-2016-07.jpg', 10, 'YES'),
(133, 'footerwebNC-2016-0.jpg', 11, 'YES'),
(134, 'footerwebNC-2016-01.jpg', 11, 'YES'),
(135, 'footerwebNC-2016-0.png', 11, 'YES'),
(136, 'footerwebNC-2016-01.png', 11, 'YES'),
(137, 'footerwebNC-2016-02.png', 11, 'YES'),
(138, 'footerwebNC-2016-03.png', 11, 'YES'),
(139, 'footerwebNC-2016-04.png', 11, 'YES'),
(140, 'footerwebNC-2016-02.jpg', 11, 'YES'),
(141, 'footerwebNC-2016-03.JPG', 11, 'YES'),
(142, 'footerwebNC-2016-04.jpg', 11, 'YES'),
(143, 'footerwebNC-2016-05.jpg', 11, 'YES'),
(144, 'footerwebNC-2016-06.jpg', 11, 'YES'),
(145, 'footerwebNC-2016-07.jpg', 11, 'YES'),
(146, 'footerwebNC-2016-0.jpg', 12, 'YES'),
(147, 'footerwebNC-2016-01.jpg', 12, 'YES'),
(148, 'footerwebNC-2016-0.png', 12, 'YES'),
(149, 'footerwebNC-2016-01.png', 12, 'YES'),
(150, 'footerwebNC-2016-02.png', 12, 'YES'),
(151, 'footerwebNC-2016-03.png', 12, 'YES'),
(152, 'footerwebNC-2016-04.png', 12, 'YES'),
(153, 'footerwebNC-2016-02.jpg', 12, 'YES'),
(154, 'footerwebNC-2016-03.JPG', 12, 'YES'),
(155, 'footerwebNC-2016-04.jpg', 12, 'YES'),
(156, 'footerwebNC-2016-05.jpg', 12, 'YES'),
(157, 'footerwebNC-2016-06.jpg', 12, 'YES'),
(158, 'footerwebNC-2016-07.jpg', 12, 'YES'),
(159, 'footerwebNC-2016-0.jpg', 13, 'YES'),
(160, 'footerwebNC-2016-01.jpg', 13, 'YES'),
(161, 'footerwebNC-2016-0.png', 13, 'YES'),
(162, 'footerwebNC-2016-01.png', 13, 'YES'),
(163, 'footerwebNC-2016-02.png', 13, 'YES'),
(164, 'footerwebNC-2016-03.png', 13, 'YES'),
(165, 'footerwebNC-2016-04.png', 13, 'YES'),
(166, 'footerwebNC-2016-02.jpg', 13, 'YES'),
(167, 'footerwebNC-2016-03.JPG', 13, 'YES'),
(168, 'footerwebNC-2016-04.jpg', 13, 'YES'),
(169, 'footerwebNC-2016-05.jpg', 13, 'YES'),
(170, 'footerwebNC-2016-06.jpg', 13, 'YES'),
(171, 'footerwebNC-2016-07.jpg', 13, 'YES'),
(172, 'footerwebNC-2016-0.jpg', 14, 'YES'),
(173, 'footerwebNC-2016-01.jpg', 14, 'YES'),
(174, 'footerwebNC-2016-0.png', 14, 'YES'),
(175, 'footerwebNC-2016-01.png', 14, 'YES'),
(176, 'footerwebNC-2016-02.png', 14, 'YES'),
(177, 'footerwebNC-2016-03.png', 14, 'YES'),
(178, 'footerwebNC-2016-04.png', 14, 'YES'),
(179, 'footerwebNC-2016-02.jpg', 14, 'YES'),
(180, 'footerwebNC-2016-03.JPG', 14, 'YES'),
(181, 'footerwebNC-2016-04.jpg', 14, 'YES'),
(182, 'footerwebNC-2016-05.jpg', 14, 'YES'),
(183, 'footerwebNC-2016-06.jpg', 14, 'YES'),
(184, 'footerwebNC-2016-07.jpg', 14, 'YES'),
(185, 'footerwebNC-2016-0.jpg', 15, 'YES'),
(186, 'footerwebNC-2016-01.jpg', 15, 'YES'),
(187, 'footerwebNC-2016-0.png', 15, 'YES'),
(188, 'footerwebNC-2016-01.png', 15, 'YES'),
(189, 'footerwebNC-2016-02.png', 15, 'YES'),
(190, 'footerwebNC-2016-03.png', 15, 'YES'),
(191, 'footerwebNC-2016-04.png', 15, 'YES'),
(192, 'footerwebNC-2016-02.jpg', 15, 'YES'),
(193, 'footerwebNC-2016-03.JPG', 15, 'YES'),
(194, 'footerwebNC-2016-04.jpg', 15, 'YES'),
(195, 'footerwebNC-2016-05.jpg', 15, 'YES'),
(196, 'footerwebNC-2016-06.jpg', 15, 'YES'),
(197, 'footerwebNC-2016-07.jpg', 15, 'YES'),
(198, 'footerwebNC-2016-0.jpg', 16, 'YES'),
(199, 'footerwebNC-2016-01.jpg', 16, 'YES'),
(200, 'footerwebNC-2016-0.png', 16, 'YES'),
(201, 'footerwebNC-2016-01.png', 16, 'YES'),
(202, 'footerwebNC-2016-02.png', 16, 'YES'),
(203, 'footerwebNC-2016-03.png', 16, 'YES'),
(204, 'footerwebNC-2016-04.png', 16, 'YES'),
(205, 'footerwebNC-2016-02.jpg', 16, 'YES'),
(206, 'footerwebNC-2016-03.JPG', 16, 'YES'),
(207, 'footerwebNC-2016-04.jpg', 16, 'YES'),
(208, 'footerwebNC-2016-05.jpg', 16, 'YES'),
(209, 'footerwebNC-2016-06.jpg', 16, 'YES'),
(210, 'footerwebNC-2016-07.jpg', 16, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `header_id` int(255) NOT NULL,
  `header_pic` varchar(300) NOT NULL,
  `header_status` varchar(100) NOT NULL,
  `header_url` varchar(600) NOT NULL,
  `header_conferences_on` int(4) NOT NULL,
  `header_order` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`header_id`, `header_pic`, `header_status`, `header_url`, `header_conferences_on`, `header_order`) VALUES
(1, 'haedwebNC-2016-0.png', 'YES', 'http://www.kmutnb.ac.th/', 1, 1),
(2, 'haedwebNC-2016-0.jpg', 'YES', 'http://www.fte.kmutnb.ac.th/', 1, 2),
(3, 'haedwebNC-2016-01.jpg', 'YES', '#', 8, 1),
(4, 'haedwebNC-2016-02.jpg', 'YES', '#', 8, 2),
(5, 'haedwebNC-2016-01.jpg', 'YES', '#', 2, 1),
(6, 'haedwebNC-2016-02.jpg', 'YES', '#', 2, 2),
(7, 'haedwebNC-2016-01.jpg', 'YES', '#', 3, 1),
(8, 'haedwebNC-2016-02.jpg', 'YES', '#', 3, 2),
(9, 'haedwebNC-2016-01.jpg', 'YES', '#', 4, 1),
(10, 'haedwebNC-2016-02.jpg', 'YES', '#', 4, 2),
(11, 'haedwebNC-2016-01.jpg', 'YES', '#', 5, 1),
(12, 'haedwebNC-2016-02.jpg', 'YES', '#', 5, 2),
(13, 'haedwebNC-2016-01.jpg', 'YES', '#', 6, 1),
(14, 'haedwebNC-2016-02.jpg', 'YES', '#', 6, 2),
(15, 'haedwebNC-2016-01.jpg', 'YES', '#', 7, 1),
(16, 'haedwebNC-2017-0.png', 'YES', 'http://www.google.co.th', 7, 2),
(17, 'haedwebNC-2016-01.jpg', 'YES', '#', 9, 1),
(18, 'haedwebNC-2016-02.jpg', 'YES', '#', 9, 2),
(19, 'haedwebNC-2016-01.jpg', 'YES', '#', 10, 1),
(20, 'haedwebNC-2016-02.jpg', 'YES', '#', 10, 2),
(21, 'haedwebNC-2016-01.jpg', 'YES', '#', 11, 1),
(22, 'haedwebNC-2016-02.jpg', 'YES', '#', 11, 2),
(23, 'haedwebNC-2016-01.jpg', 'YES', '#', 12, 1),
(24, 'haedwebNC-2016-02.jpg', 'YES', '#', 12, 2),
(25, 'haedwebNC-2016-01.jpg', 'YES', '#', 13, 1),
(26, 'haedwebNC-2016-02.jpg', 'YES', '#', 13, 2),
(27, 'haedwebNC-2016-01.jpg', 'YES', '#', 14, 1),
(28, 'haedwebNC-2016-02.jpg', 'YES', '#', 14, 2),
(29, 'haedwebNC-2016-01.jpg', 'YES', '#', 15, 1),
(30, 'haedwebNC-2016-02.jpg', 'YES', '#', 15, 2),
(31, 'haedwebNC-2016-01.jpg', 'YES', '#', 16, 1),
(32, 'haedwebNC-2016-02.jpg', 'YES', 'http://www.google.com', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `index_paper_file`
--

CREATE TABLE `index_paper_file` (
  `index_paper_file_id` int(11) NOT NULL,
  `index_paper_file_key` varchar(17) NOT NULL,
  `index_paper_file_name` varchar(255) NOT NULL,
  `index_paper_file_author` text NOT NULL,
  `index_paper_file_year` varchar(4) NOT NULL,
  `index_paper_file_no` varchar(2) NOT NULL,
  `index_paper_file_department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางงานวิจัยที่ถูกเผยแพร่แล้ว';

--
-- Dumping data for table `index_paper_file`
--

INSERT INTO `index_paper_file` (`index_paper_file_id`, `index_paper_file_key`, `index_paper_file_name`, `index_paper_file_author`, `index_paper_file_year`, `index_paper_file_no`, `index_paper_file_department_name`) VALUES
(1, 'NCTED-16-10-0004', 'กฟกห', '', '2017', '16', 'สาขาอื่นๆที่เกี่ยวข้อง'),
(2, 'NCTED-16-01-0003', 'ทดสอบ3', 'ชัยกุล กาญจนโภคิน', '2017', '16', 'สาขาวิศวกรรมเครื่องกล'),
(3, 'NCTED-16-01-0002', 'โปรแกรม AutoCAD', 'ชัยกุล กาญจนโภคิน', '2017', '16', 'สาขาวิศวกรรมเครื่องกล'),
(4, 'NCTED-16-10-0001', '123', '', '2017', '16', 'สาขาอื่นๆที่เกี่ยวข้อง'),
(5, 'NCTED-16-10-0002', 'เทส', '', '2017', '16', 'สาขาอื่นๆที่เกี่ยวข้อง'),
(6, 'NCTED-16-10-0003', 'ไไทย', '', '2017', '16', 'สาขาอื่นๆที่เกี่ยวข้อง'),
(7, 'NCTED-16-10-0005', 'ทดสอบ66', 'ชัยกุล กาญจนโภคิน และ ทดสอบส่ง', '2017', '16', 'สาขาอื่นๆที่เกี่ยวข้อง'),
(8, 'NCTED-16-01-0005', 'การพัฒนาเกมการสอนแบบมลติมีเดียบนอุปกรณ์ ระบบหน้าจอสัมผัส รายวิชาคณิตศาสตร์ ', 'ชัยกุล กาญจนโภคิน', '2017', '16', 'สาขาวิศวกรรมเครื่องกล'),
(9, 'NCTED-16-01-0006', 'การพัฒน', '', '2017', '16', 'สาขาวิศวกรรมเครื่องกล');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `log_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_user_ip` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `log_user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`log_user_id`, `user_id`, `log_user_ip`, `log_user_date`) VALUES
(1, 154, '192.168.33.1', '2017-02-13 04:45:25'),
(2, 2, '192.168.33.1', '2017-02-13 04:49:37'),
(3, 154, '192.168.33.1', '2017-02-13 13:10:13'),
(4, 2, '192.168.33.1', '2017-02-14 06:39:45'),
(5, 152, '192.168.33.1', '2017-02-14 09:09:27'),
(6, 2, '192.168.33.1', '2017-02-15 05:54:40'),
(7, 152, '192.168.33.1', '2017-02-15 05:57:33'),
(8, 152, '192.168.33.1', '2017-02-15 08:08:27'),
(9, 2, '192.168.33.1', '2017-02-15 08:11:27'),
(10, 154, '192.168.33.1', '2017-02-15 08:13:04'),
(11, 2, '192.168.33.1', '2017-02-15 08:58:51'),
(12, 154, '192.168.33.1', '2017-02-16 02:58:16'),
(13, 152, '192.168.33.1', '2017-02-16 02:58:33'),
(14, 2, '192.168.33.1', '2017-02-16 02:58:55'),
(15, 154, '192.168.33.1', '2017-02-16 04:45:23'),
(16, 154, '192.168.33.1', '2017-02-16 04:45:37'),
(17, 152, '192.168.33.1', '2017-02-16 04:46:05'),
(18, 152, '192.168.33.1', '2017-02-16 04:46:15'),
(19, 2, '192.168.33.1', '2017-02-16 07:09:28'),
(20, 152, '192.168.33.1', '2017-02-16 10:01:56'),
(21, 152, '192.168.33.1', '2017-02-16 15:50:13'),
(22, 2, '192.168.33.1', '2017-02-16 17:04:24'),
(23, 2, '192.168.33.1', '2017-02-17 02:19:33'),
(24, 2, '192.168.33.1', '2017-02-17 02:19:43'),
(25, 154, '192.168.33.1', '2017-02-17 03:46:25'),
(26, 152, '192.168.33.1', '2017-02-17 05:18:58'),
(27, 2, '192.168.33.1', '2017-02-17 10:43:33'),
(28, 2, '192.168.33.1', '2017-02-17 14:54:06'),
(29, 2, '192.168.33.1', '2017-02-17 18:40:57'),
(30, 2, '192.168.33.1', '2017-02-17 18:41:07'),
(31, 2, '192.168.33.1', '2017-02-18 00:03:45'),
(32, 2, '192.168.33.1', '2017-02-18 00:03:56'),
(33, 154, '192.168.33.1', '2017-02-18 06:19:44'),
(34, 2, '192.168.33.1', '2017-02-18 06:20:05'),
(35, 154, '192.168.33.1', '2017-02-18 08:18:02'),
(36, 2, '192.168.33.1', '2017-02-18 10:48:05'),
(37, 152, '192.168.33.1', '2017-02-18 10:53:39'),
(38, 2, '192.168.33.1', '2017-02-18 15:06:21'),
(39, 2, '192.168.33.1', '2017-02-18 15:06:44'),
(40, 154, '192.168.33.1', '2017-02-18 15:07:15'),
(41, 154, '192.168.33.1', '2017-02-18 17:58:50'),
(42, 2, '192.168.33.1', '2017-02-19 04:11:20'),
(43, 152, '192.168.33.1', '2017-02-19 07:39:59'),
(44, 154, '192.168.33.1', '2017-02-19 12:26:52'),
(45, 154, '192.168.33.1', '2017-02-19 14:31:25'),
(46, 154, '192.168.33.1', '2017-02-19 17:09:27'),
(47, 152, '192.168.33.1', '2017-02-19 17:12:59'),
(48, 157, '192.168.33.1', '2017-02-19 17:55:59'),
(49, 2, '192.168.33.1', '2017-02-19 17:56:47'),
(50, 158, '192.168.33.1', '2017-02-19 18:35:36'),
(51, 158, '192.168.33.1', '2017-02-19 18:35:44'),
(52, 154, '192.168.33.1', '2017-02-20 05:12:56'),
(53, 2, '192.168.33.1', '2017-02-20 07:39:56'),
(54, 2, '192.168.33.1', '2017-02-20 07:40:07'),
(55, 154, '192.168.33.1', '2017-02-20 07:44:57'),
(56, 152, '192.168.33.1', '2017-02-20 08:08:30'),
(57, 2, '192.168.33.1', '2017-02-20 08:08:43'),
(58, 2, '192.168.33.1', '2017-02-20 08:08:52'),
(59, 154, '192.168.33.1', '2017-02-20 09:12:57'),
(60, 2, '192.168.33.1', '2017-02-20 10:56:26'),
(61, 152, '192.168.33.1', '2017-02-21 03:12:40'),
(62, 152, '192.168.33.1', '2017-02-21 03:12:53'),
(63, 152, '192.168.33.1', '2017-02-21 05:32:13'),
(64, 2, '192.168.33.1', '2017-02-21 05:40:34'),
(65, 154, '192.168.33.1', '2017-02-21 05:47:23'),
(66, 2, '192.168.33.1', '2017-02-21 06:48:15'),
(67, 154, '192.168.33.1', '2017-02-21 06:49:08'),
(68, 2, '192.168.33.1', '2017-02-21 06:49:39'),
(69, 152, '192.168.33.1', '2017-02-21 06:52:00'),
(70, 154, '192.168.33.1', '2017-02-21 15:36:24'),
(71, 2, '192.168.33.1', '2017-02-21 15:42:48'),
(72, 152, '192.168.33.1', '2017-02-21 15:43:30'),
(73, 154, '192.168.33.1', '2017-02-21 17:50:09'),
(74, 154, '192.168.33.1', '2017-02-22 03:35:28'),
(75, 154, '192.168.33.1', '2017-02-22 07:07:17'),
(76, 154, '192.168.33.1', '2017-02-22 13:50:38'),
(77, 2, '192.168.33.1', '2017-02-22 13:51:48'),
(78, 154, '192.168.33.1', '2017-02-23 19:45:23'),
(79, 2, '192.168.33.1', '2017-02-26 05:44:49'),
(80, 2, '192.168.33.1', '2017-03-04 04:05:44'),
(81, 2, '192.168.33.1', '2017-03-04 12:22:39'),
(82, 2, '192.168.33.1', '2017-03-04 12:22:52'),
(83, 2, '192.168.33.1', '2017-03-05 09:34:36'),
(84, 2, '192.168.33.1', '2017-03-05 09:54:05'),
(85, 154, '192.168.33.1', '2017-03-05 10:29:37'),
(86, 154, '192.168.33.1', '2017-03-05 10:30:35'),
(87, 154, '192.168.33.1', '2017-03-05 10:30:43'),
(88, 154, '192.168.33.1', '2017-03-05 10:31:12'),
(89, 154, '192.168.33.1', '2017-03-05 10:31:22'),
(90, 154, '192.168.33.1', '2017-03-05 10:31:56'),
(91, 154, '192.168.33.1', '2017-03-05 12:11:19'),
(92, 2, '192.168.33.1', '2017-03-05 12:11:51'),
(93, 154, '192.168.33.1', '2017-03-05 17:27:22'),
(94, 2, '192.168.33.1', '2017-03-05 17:31:21'),
(95, 2, '127.0.0.1', '2017-04-26 09:12:22'),
(96, 2, '127.0.0.1', '2017-04-28 09:33:34'),
(97, 154, '192.168.33.1', '2017-05-31 03:46:21'),
(98, 2, '192.168.33.1', '2017-05-31 03:49:15'),
(99, 2, '192.168.33.1', '2017-06-16 11:04:47'),
(100, 2, '192.168.33.1', '2017-06-19 08:48:16'),
(101, 2, '192.168.33.1', '2017-06-26 08:22:22'),
(102, 2, '192.168.33.1', '2017-06-29 08:42:02'),
(103, 154, '192.168.33.1', '2017-06-29 10:09:53'),
(104, 154, '192.168.33.1', '2017-06-30 03:33:08'),
(105, 2, '192.168.33.1', '2017-06-30 03:33:52'),
(106, 154, '192.168.33.1', '2017-06-30 03:36:33'),
(107, 154, '192.168.33.1', '2017-07-03 06:17:07'),
(108, 154, '192.168.33.1', '2017-07-03 06:17:44'),
(109, 154, '192.168.33.1', '2017-07-03 06:21:19'),
(110, 2, '192.168.33.1', '2017-07-03 06:24:33'),
(111, 2, '192.168.33.1', '2017-07-05 10:16:23'),
(112, 154, '192.168.33.1', '2017-07-05 10:26:25'),
(113, 154, '192.168.33.1', '2017-07-05 10:27:38'),
(114, 154, '192.168.33.1', '2017-07-05 10:28:22'),
(115, 154, '192.168.33.1', '2017-07-05 10:38:52'),
(116, 154, '192.168.33.1', '2017-07-05 10:48:13'),
(117, 152, '127.0.0.1', '2017-07-05 10:51:01'),
(118, 154, '192.168.33.1', '2017-07-05 10:51:25'),
(119, 150, '127.0.0.1', '2017-07-05 10:52:18'),
(120, 150, '127.0.0.1', '2017-07-05 10:53:27'),
(121, 2, '127.0.0.1', '2017-07-05 10:56:46'),
(122, 2, '192.168.33.1', '2017-07-06 04:01:25'),
(123, 2, '192.168.33.1', '2017-07-06 06:30:52'),
(124, 2, '192.168.33.1', '2017-07-07 08:20:07'),
(125, 2, '192.168.33.1', '2017-07-12 08:59:51'),
(126, 154, '192.168.33.1', '2017-07-13 03:32:05'),
(127, 2, '192.168.33.1', '2017-07-13 03:32:47'),
(128, 2, '192.168.33.1', '2017-07-19 07:40:32'),
(129, 2, '192.168.33.1', '2017-07-21 02:57:17'),
(130, 2, '192.168.33.1', '2017-07-21 07:04:56'),
(131, 2, '192.168.33.1', '2017-07-22 13:29:04'),
(132, 2, '192.168.33.1', '2017-07-23 07:57:27'),
(133, 2, '192.168.33.1', '2017-07-23 14:08:19'),
(134, 2, '192.168.33.1', '2017-07-23 16:46:19'),
(135, 2, '192.168.33.1', '2017-07-24 02:20:45'),
(136, 2, '192.168.33.1', '2017-07-24 09:53:02'),
(137, 2, '192.168.33.1', '2017-07-29 10:39:27'),
(138, 2, '192.168.33.1', '2017-07-30 06:05:08'),
(139, 2, '192.168.33.1', '2017-07-30 19:41:34'),
(140, 2, '192.168.33.1', '2017-07-31 10:53:58'),
(141, 2, '192.168.33.1', '2017-08-01 14:45:27'),
(142, 2, '192.168.33.1', '2017-08-02 13:38:39'),
(143, 2, '192.168.33.1', '2017-08-03 03:12:59'),
(144, 2, '192.168.33.1', '2017-08-04 02:27:52'),
(145, 2, '192.168.33.1', '2017-08-05 12:24:08'),
(146, 2, '192.168.33.1', '2017-08-06 01:03:17'),
(147, 2, '192.168.33.1', '2017-08-06 08:00:41'),
(148, 2, '192.168.33.1', '2017-08-06 13:17:27'),
(149, 2, '192.168.33.1', '2017-08-07 15:32:37'),
(150, 2, '192.168.33.1', '2017-08-08 03:16:15'),
(151, 2, '192.168.33.1', '2017-08-08 12:29:53'),
(152, 2, '192.168.33.1', '2017-08-08 14:50:51'),
(153, 2, '192.168.33.1', '2017-08-09 09:02:03'),
(154, 2, '192.168.33.1', '2017-08-09 15:53:47'),
(155, 2, '192.168.33.1', '2017-08-10 18:48:21'),
(156, 154, '192.168.33.1', '2017-08-11 10:09:49'),
(157, 2, '192.168.33.1', '2017-08-11 10:10:12'),
(158, 154, '192.168.33.1', '2017-08-11 10:23:21'),
(159, 2, '192.168.33.1', '2017-08-12 10:12:07'),
(160, 154, '192.168.33.1', '2017-08-12 10:15:04'),
(161, 154, '192.168.33.1', '2017-08-12 10:16:46'),
(162, 2, '192.168.33.1', '2017-08-12 14:07:20'),
(163, 2, '192.168.33.1', '2017-08-13 12:25:07'),
(164, 2, '192.168.33.1', '2017-08-13 15:31:37'),
(165, 154, '192.168.33.1', '2017-08-13 15:32:08'),
(166, 2, '192.168.33.1', '2017-08-14 10:14:51'),
(167, 154, '192.168.33.1', '2017-08-14 10:15:12'),
(168, 2, '192.168.33.1', '2017-08-14 15:17:17'),
(169, 154, '192.168.33.1', '2017-08-14 15:17:45'),
(170, 154, '192.168.33.1', '2017-08-14 16:07:33'),
(171, 154, '192.168.33.1', '2017-08-15 02:29:50'),
(172, 154, '192.168.33.1', '2017-08-15 06:31:36'),
(173, 154, '192.168.33.1', '2017-08-15 10:21:59'),
(174, 154, '192.168.33.1', '2017-08-15 14:51:48'),
(175, 2, '192.168.33.1', '2017-08-15 15:29:57'),
(176, 152, '192.168.33.1', '2017-08-15 16:16:56'),
(177, 152, '192.168.33.1', '2017-08-16 03:15:24'),
(178, 152, '192.168.33.1', '2017-08-16 06:21:38'),
(179, 2, '192.168.33.1', '2017-08-16 06:26:03'),
(180, 154, '192.168.33.1', '2017-08-16 06:28:48'),
(181, 154, '192.168.33.1', '2017-08-16 09:58:18'),
(182, 154, '192.168.33.1', '2017-08-16 13:27:49'),
(183, 154, '192.168.33.1', '2017-08-17 02:47:03'),
(184, 2, '192.168.33.1', '2017-08-17 05:44:20'),
(185, 154, '192.168.33.1', '2017-08-17 06:28:56'),
(186, 154, '192.168.33.1', '2017-08-17 13:26:13'),
(187, 154, '192.168.33.1', '2017-08-17 16:49:54'),
(188, 154, '192.168.33.1', '2017-08-18 06:28:43'),
(189, 2, '192.168.33.1', '2017-08-18 11:29:46'),
(190, 2, '192.168.33.1', '2017-08-19 11:38:52'),
(191, 152, '192.168.33.1', '2017-08-19 14:22:37'),
(192, 154, '192.168.33.1', '2017-08-19 18:14:41'),
(193, 152, '192.168.33.1', '2017-08-19 19:02:23'),
(194, 154, '192.168.33.1', '2017-08-19 21:25:20'),
(195, 2, '192.168.33.1', '2017-08-19 21:26:45'),
(196, 2, '192.168.33.1', '2017-08-20 05:44:57'),
(197, 154, '192.168.33.1', '2017-08-20 05:46:51'),
(198, 2, '192.168.33.1', '2017-08-20 10:25:42'),
(199, 154, '192.168.33.1', '2017-08-20 10:40:34'),
(200, 2, '192.168.33.1', '2017-08-20 18:09:41'),
(201, 154, '192.168.33.1', '2017-08-20 18:33:54'),
(202, 152, '192.168.33.1', '2017-08-20 19:05:58'),
(203, 2, '192.168.33.1', '2017-08-21 02:23:29'),
(204, 154, '192.168.33.1', '2017-08-21 02:57:31'),
(205, 154, '192.168.33.1', '2017-08-21 11:25:24'),
(206, 2, '192.168.33.1', '2017-08-21 11:32:42'),
(207, 152, '192.168.33.1', '2017-08-21 13:45:32'),
(208, 152, '192.168.33.1', '2017-08-21 15:44:58'),
(209, 152, '192.168.33.1', '2017-08-22 07:22:57'),
(210, 152, '192.168.33.1', '2017-08-22 09:24:06'),
(211, 2, '192.168.33.1', '2017-08-22 09:45:25'),
(212, 154, '192.168.33.1', '2017-08-22 09:46:16'),
(213, 147, '::1', '2017-09-06 03:12:55'),
(214, 2, '::1', '2017-09-06 03:13:16'),
(215, 147, '::1', '2017-09-06 03:13:56'),
(216, 2, '::1', '2017-09-06 03:14:15'),
(217, 147, '::1', '2017-09-06 03:15:14'),
(218, 2, '::1', '2017-09-06 03:15:27'),
(219, 2, '::1', '2017-09-06 03:15:59'),
(220, 147, '::1', '2017-09-06 03:16:17'),
(221, 2, '::1', '2017-09-06 03:16:26'),
(222, 147, '::1', '2017-09-06 03:16:58'),
(223, 147, '::1', '2017-09-06 03:29:45'),
(224, 147, '::1', '2017-09-06 03:30:15'),
(225, 154, '192.168.33.1', '2017-09-06 03:43:39'),
(226, 154, '192.168.33.1', '2017-09-06 16:12:36'),
(227, 154, '192.168.33.1', '2017-09-06 17:43:16'),
(228, 154, '192.168.33.1', '2017-09-06 17:47:51'),
(229, 147, '127.0.0.1', '2017-09-06 17:51:51'),
(230, 147, '192.168.33.1', '2017-09-06 17:53:19'),
(231, 147, '192.168.33.1', '2017-09-06 17:54:39'),
(232, 147, '192.168.33.1', '2017-09-06 17:58:47'),
(233, 147, '::1', '2017-09-06 17:59:28'),
(234, 147, '192.168.33.1', '2017-09-06 17:59:56'),
(235, 180, '192.168.33.1', '2017-09-21 10:32:08'),
(236, 2, '::1', '2017-09-24 06:34:11'),
(237, 2, '::1', '2017-09-24 07:12:35'),
(238, 147, '::1', '2017-09-24 07:19:49'),
(239, 2, '::1', '2017-09-24 07:24:33'),
(240, 153, '::1', '2017-09-24 07:48:54'),
(241, 2, '::1', '2017-09-24 07:50:03'),
(242, 2, '::1', '2017-09-24 08:52:08'),
(243, 147, '::1', '2017-09-24 08:53:18'),
(244, 2, '::1', '2017-09-24 08:59:46'),
(245, 2, '192.168.33.1', '2017-09-24 09:15:29'),
(246, 153, '::1', '2017-09-24 09:55:09'),
(247, 152, '::1', '2017-09-24 09:55:30'),
(248, 152, '::1', '2017-09-24 09:56:23'),
(249, 2, '::1', '2017-09-24 09:56:52'),
(250, 147, '::1', '2017-09-24 09:57:46'),
(251, 152, '::1', '2017-09-24 10:00:36'),
(252, 2, '::1', '2017-09-24 10:07:29'),
(253, 147, '::1', '2017-09-24 10:11:26'),
(254, 147, '::1', '2017-09-24 10:18:48'),
(255, 154, '192.168.33.1', '2017-09-24 13:04:06'),
(256, 2, '192.168.33.1', '2017-09-24 13:10:24'),
(257, 147, '192.168.33.1', '2017-09-24 13:22:22'),
(258, 152, '::1', '2017-09-24 13:33:47'),
(259, 2, '::1', '2017-09-24 13:34:31'),
(260, 147, '::1', '2017-09-24 13:40:33'),
(261, 147, '::1', '2017-09-24 13:41:14'),
(262, 147, '::1', '2017-09-24 13:42:22'),
(263, 147, '::1', '2017-09-24 13:43:01'),
(264, 2, '::1', '2017-09-24 13:43:30'),
(265, 147, '::1', '2017-09-24 13:44:26'),
(266, 147, '::1', '2017-09-24 13:44:46'),
(267, 147, '::1', '2017-09-24 13:45:37'),
(268, 147, '::1', '2017-09-24 13:47:33'),
(269, 2, '::1', '2017-09-29 05:05:14'),
(270, 2, '::1', '2017-10-10 01:37:06'),
(271, 2, '::1', '2017-10-12 05:14:29'),
(272, 147, '::1', '2017-10-12 06:35:06'),
(273, 147, '::1', '2017-10-12 06:39:46'),
(274, 2, '::1', '2017-10-12 06:40:19'),
(275, 147, '::1', '2017-10-12 06:41:08'),
(276, 2, '::1', '2017-10-12 06:50:58'),
(277, 2, '::1', '2017-10-12 07:10:20'),
(278, 154, '192.168.33.1', '2017-10-12 08:39:10'),
(279, 2, '192.168.33.1', '2017-10-12 08:40:54'),
(280, 152, '::1', '2017-10-12 09:22:11'),
(281, 2, '::1', '2017-10-12 09:24:24'),
(282, 2, '192.168.33.1', '2017-10-17 15:52:46'),
(283, 2, '192.168.33.1', '2017-10-19 13:56:14'),
(284, 154, '192.168.33.1', '2017-10-19 15:05:56'),
(285, 2, '::1', '2017-10-20 21:51:18'),
(286, 2, '127.0.0.1', '2017-10-21 09:34:11'),
(287, 2, '127.0.0.1', '2017-10-21 11:24:51'),
(288, 2, '::1', '2017-10-21 15:49:35'),
(289, 2, '::1', '2017-10-22 03:31:34'),
(290, 147, '::1', '2017-10-22 06:20:44'),
(291, 2, '::1', '2017-10-22 06:20:59'),
(292, 147, '::1', '2017-10-22 06:34:11'),
(293, 154, '::1', '2017-10-22 06:52:48'),
(294, 2, '::1', '2017-10-22 07:16:58'),
(295, 152, '::1', '2017-10-22 07:18:48'),
(296, 2, '::1', '2017-10-22 07:27:46'),
(297, 157, '::1', '2017-10-22 07:43:26'),
(298, 2, '127.0.0.1', '2017-10-22 07:45:06'),
(299, 158, '::1', '2017-10-22 07:48:50'),
(300, 147, '::1', '2017-10-22 10:02:18'),
(301, 2, '::1', '2017-10-22 10:02:47'),
(302, 152, '127.0.0.1', '2017-10-22 11:15:48'),
(303, 2, '::1', '2017-10-22 16:59:13'),
(304, 152, '127.0.0.1', '2017-10-22 17:22:00'),
(305, 147, '::1', '2017-10-22 20:30:42'),
(306, 147, '::1', '2017-10-22 20:31:54'),
(307, 147, '::1', '2017-10-22 20:50:57'),
(308, 147, '::1', '2017-10-22 20:52:13'),
(309, 147, '::1', '2017-10-22 20:52:42'),
(310, 147, '::1', '2017-10-22 20:54:00'),
(311, 147, '::1', '2017-10-22 20:54:34'),
(312, 2, '::1', '2017-10-23 03:47:05'),
(313, 147, '::1', '2017-10-23 04:10:58'),
(314, 147, '::1', '2017-10-23 04:11:48'),
(315, 147, '::1', '2017-10-23 04:12:17'),
(316, 147, '::1', '2017-10-23 08:59:30'),
(317, 147, '::1', '2017-10-23 09:40:24'),
(318, 147, '::1', '2017-10-23 10:24:48'),
(319, 2, '192.168.33.1', '2017-10-29 17:11:54'),
(320, 2, '192.168.33.1', '2017-10-30 10:19:32'),
(321, 154, '192.168.33.1', '2017-10-30 10:20:06'),
(322, 154, '192.168.33.1', '2017-10-30 10:21:08'),
(323, 154, '192.168.33.1', '2017-10-30 16:40:03'),
(324, 2, '192.168.33.1', '2017-10-30 16:43:09'),
(325, 2, '::1', '2017-11-03 19:23:56'),
(326, 147, '::1', '2017-11-03 19:31:16'),
(327, 152, '::1', '2017-11-03 19:31:55'),
(328, 153, '::1', '2017-11-03 19:33:09'),
(329, 153, '::1', '2017-11-03 19:33:51'),
(330, 153, '::1', '2017-11-03 19:34:09'),
(331, 152, '::1', '2017-11-03 19:36:41'),
(332, 147, '::1', '2017-11-03 19:38:47'),
(333, 2, '::1', '2017-11-03 20:04:22'),
(334, 152, '::1', '2017-11-03 20:38:46'),
(335, 147, '::1', '2017-11-04 05:59:20'),
(336, 2, '::1', '2017-11-04 06:02:15'),
(337, 153, '::1', '2017-11-04 06:04:39'),
(338, 2, '::1', '2018-01-29 17:57:30'),
(339, 152, '::1', '2018-01-29 18:02:20'),
(340, 147, '::1', '2018-01-29 18:02:50'),
(341, 147, '::1', '2018-01-29 18:07:44'),
(342, 2, '::1', '2018-01-29 18:08:13'),
(343, 2, '::1', '2018-01-29 19:09:11'),
(344, 152, '::1', '2018-01-29 19:10:01'),
(345, 2, '::1', '2018-01-29 19:11:48'),
(346, 147, '::1', '2018-01-30 07:44:31'),
(347, 2, '::1', '2018-01-30 07:45:01'),
(348, 152, '::1', '2018-01-30 07:54:21'),
(349, 2, '::1', '2018-01-30 07:55:56'),
(350, 152, '::1', '2018-01-30 07:56:34'),
(351, 2, '::1', '2018-01-30 08:45:52'),
(352, 152, '::1', '2018-01-30 09:04:23'),
(353, 147, '::1', '2018-01-30 09:34:22'),
(354, 2, '::1', '2018-01-30 09:36:35'),
(355, 152, '::1', '2018-01-30 12:03:02'),
(356, 153, '::1', '2018-01-30 12:43:34'),
(357, 152, '::1', '2018-01-30 12:51:56'),
(358, 2, '::1', '2018-01-30 18:31:46'),
(359, 2, '::1', '2018-01-31 06:31:32'),
(360, 2, '::1', '2018-01-31 11:49:16'),
(361, 2, '::1', '2018-01-31 19:08:15'),
(362, 2, '::1', '2018-02-01 06:46:19'),
(363, 152, '::1', '2018-02-01 07:13:25'),
(364, 147, '::1', '2018-02-01 07:13:42'),
(365, 152, '::1', '2018-02-01 07:14:32'),
(366, 152, '::1', '2018-02-01 07:21:23'),
(367, 147, '::1', '2018-02-01 07:21:39'),
(368, 152, '::1', '2018-02-01 07:23:53'),
(369, 147, '::1', '2018-02-01 07:34:00'),
(370, 2, '::1', '2018-04-01 13:26:29'),
(371, 2, '::1', '2018-04-09 01:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `news_email_logs`
--

CREATE TABLE `news_email_logs` (
  `news_email_logs_id` int(11) NOT NULL,
  `news_email_logs_title` varchar(255) NOT NULL,
  `news_email_logs_msg` text NOT NULL,
  `news_email_logs_user_type` varchar(10) NOT NULL,
  `news_email_logs_file_name` varchar(255) NOT NULL,
  `news_email_logs_file_name_hash` varchar(42) NOT NULL,
  `news_email_logs_file_type` varchar(10) NOT NULL,
  `news_email_logs_year_dir` varchar(7) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_email_logs_flag` int(11) NOT NULL,
  `data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_email_logs`
--

INSERT INTO `news_email_logs` (`news_email_logs_id`, `news_email_logs_title`, `news_email_logs_msg`, `news_email_logs_user_type`, `news_email_logs_file_name`, `news_email_logs_file_name_hash`, `news_email_logs_file_type`, `news_email_logs_year_dir`, `user_id`, `news_email_logs_flag`, `data_create`) VALUES
(1, 'zxczxcvv', 'zvxcvxfesr45645ertdhg', '0,1,2', 'Att_NCTECHED_20170723074608', '8a912e9b72e9c9827677acc5fc0202199e3931fb', '.jpg', '2017_07', 2, 0, '2017-07-23 18:16:35'),
(2, 'ทดสอบระบบ ncteched', 'zxczxczxczc', '0,1,2', '', '', '', '', 2, 0, '2017-07-23 18:16:35'),
(3, 'ทดสอบระบบ ncteched', 'zxczxczxczc1111', '0,1,2', '', '', '', '', 2, 0, '2017-07-23 18:16:35'),
(4, 'ทดสอบระบบ ncteched', 'zxczxczxczc1111', '0,1,2', 'Att_NCTECHED_20170723071730', '1ea3eceb04e624155c8096b2b75f134ef4030aa2', '.jpg', '2017_07', 2, 0, '2017-07-23 18:17:30'),
(5, 'ทดสอบระบบ ncteched', 'zxczxczxczc1111', '0,1,2', 'Att_NCTECHED_20170723073747', '03f88f9787a8938e24eebc7056752ee12bf7b859', '.jpg', '2017_07', 2, 0, '2017-07-23 18:37:48'),
(6, 'ทดสอบระบบ ncteched', 'zxczxczxczc1111', '0,1,2', 'Att_NCTECHED_20170723073834', '5e7cdf4962c7dccf695881effc8064e7556f9e88', '.jpg', '2017_07', 2, 0, '2017-07-23 18:38:34'),
(7, 'zxczxcxczxc', 'zxczxczxczxc', '0,1,2', 'Att_NCTECHED_20170723075514', '4a42367f789f69fc2df3f31d2d185661bf58e4f1', '.jpg', '2017_07', 2, 0, '2017-07-23 18:55:14'),
(8, 'zxczxcxczxc', 'zxczxczxczxc', '0,1,2', 'Att_NCTECHED_20170723075924', '77df041d57a456511b49e0b9d078a18df63cb0e0_a', '.jpg', '2017_07', 2, 0, '2017-07-23 18:59:24'),
(9, 'ทดสอบระบบ ncteched', 'zxczxcxczxczxc', '0,1,2', 'Att_NCTECHED_20170724074209', '10ebba7482994dba8f5c1a7dad575e8f8fac41e1_a', '.jpg', '2017_07', 2, 0, '2017-07-24 02:42:10'),
(10, 'ทดสอบระบบ ncteched ครั้งที่ 10', 'ขอความร่วมให้ทุกคน ไปที่ ห้องประชุมในวันนี้ เวลา 10 นาฬิกา ', '0,1,2', 'Att_NCTECHED_20170724071341', '60b017bb20d21879d2770b866b112792d3280954_a', '.jpg', '2017_07', 2, 0, '2017-07-24 10:13:41'),
(11, 'ทดสอบระบบ ncteched ครั้งที่ 10', 'ขอความร่วมให้ทุกคน ไปที่ ห้องประชุมในวันนี้ เวลา 10 นาฬิกา 50 okkkที', '0,1,2', 'Att_NCTECHED_20170724072622', '8ef94b892b8a707a3db30de208a37889d98cf646_a', '.jpg', '2017_07', 2, 0, '2017-07-24 10:26:22'),
(12, 'ccc', 'vvv', '1', '', '', '', '', 2, 0, '2017-08-06 14:51:10'),
(13, 'vvv', 'vvvv', '1', '', '', '', '', 2, 0, '2017-08-06 14:53:23'),
(14, 'xxx', 'vvv', '0', '', '', '', '', 2, 0, '2017-08-07 15:34:45'),
(15, 'ccc', 'xcc', '2', '', '', '', '', 2, 0, '2017-08-07 15:37:49'),
(16, 'ccc', 'xxxx', '1', '', '', '', '', 2, 0, '2017-08-07 15:39:41'),
(17, 'xxx', 'xxx', '0', '', '', '', '', 2, 0, '2017-08-07 15:40:45'),
(18, 'xx', 'vvv', '2', '', '', '', '', 2, 0, '2017-08-07 16:07:33'),
(19, 'xx', 'ccc', '2', '', '', '', '', 2, 0, '2017-08-07 16:09:22'),
(20, 'cc', 'ccc', '1', '', '', '', '', 2, 0, '2017-08-07 16:10:39'),
(21, 'vvv', 'ccc', '2', '', '', '', '', 2, 0, '2017-08-07 16:11:51'),
(22, 'cc', 'ccc', '2', '', '', '', '', 2, 0, '2017-08-08 12:30:30'),
(23, 'xxx', 'xxx', '2', '', '', '', '', 2, 0, '2017-08-08 12:32:35'),
(24, 'xx', 'xxxx', '1', '', '', '', '', 2, 0, '2017-08-08 12:33:11'),
(25, 'xxx', 'xxxxx', '1', '', '', '', '', 2, 0, '2017-08-08 12:35:58'),
(26, 'xxxxx', 'xxxxx', '2', '', '', '', '', 2, 0, '2017-08-08 12:36:46'),
(27, 'ปแแแ', 'ปปปป', '2', '', '', '', '', 2, 0, '2017-08-08 15:25:31'),
(28, 'xxx', 'ccc', '0', '', '', '', '', 2, 0, '2017-08-08 15:57:22'),
(29, 'cc', '666', '1', '', '', '', '', 2, 0, '2017-08-08 16:33:28'),
(30, 'ccc', 'bbb', '1', '', '', '', '', 2, 0, '2017-08-08 16:34:00'),
(31, 'cc', 'bbb', '2', '', '', '', '', 2, 0, '2017-08-08 16:40:36'),
(32, 'xxx', 'xxxx', '2', '', '', '', '', 2, 0, '2017-08-09 09:02:59'),
(33, 'xxx', 'xxxx', '2', '', '', '', '', 2, 0, '2017-08-09 09:03:59'),
(34, 'xxxx', 'xxxx', '2', '', '', '', '', 2, 0, '2017-08-09 09:47:37'),
(35, 'xxxx', 'xxxx', '2', '', '', '', '', 2, 0, '2017-08-09 09:50:37'),
(36, 'xx', 'xxx', '2', '', '', '', '', 2, 0, '2017-08-09 09:51:36'),
(37, 'sss', 'sssss', '2', '', '', '', '', 2, 0, '2017-08-09 09:52:27'),
(38, 'ssss', 'sssss', '2', '', '', '', '', 2, 0, '2017-08-09 09:53:55'),
(39, 'xxx', 'xxxx', '2', '', '', '', '', 2, 0, '2017-08-09 09:55:28'),
(40, 'ccc', 'ccc', '2', 'Att_NCTECHED_20170809085629', '6f9839e473af8d1ccf8d7ca1c15b2302993b9f7f_a', '.jpg', '2017_08', 2, 0, '2017-08-09 15:56:29'),
(41, 'ccc', 'xxx', '1', '', '', '', '', 2, 0, '2017-08-09 16:45:10'),
(42, 'แแแ', 'อออ', '1', '', '', '', '', 2, 0, '2017-08-09 17:25:41'),
(43, 'ปปป', 'ออออ', '2', '', '', '', '', 2, 0, '2017-08-09 17:26:25'),
(44, 'อออ', 'ปปป', '2', '', '', '', '', 2, 0, '2017-08-09 17:47:09'),
(45, 'ิิิปอป', 'แแแ', '2', '', '', '', '', 2, 0, '2017-08-09 18:28:59'),
(46, 'แแแ', 'ิิิ', '2', '', '', '', '', 2, 0, '2017-08-09 18:30:39'),
(47, 'ccc', 'bb', '2', '', '', '', '', 2, 0, '2017-08-09 18:33:09'),
(48, 'vvv', 'bbb', '2', '', '', '', '', 2, 0, '2017-08-09 18:45:18'),
(49, 'vvv', 'bbb', '2', '', '', '', '', 2, 0, '2017-08-09 18:46:23'),
(50, 'vvv', 'bbb', '2', '', '', '', '', 2, 0, '2017-08-09 18:46:49'),
(51, 'vvv', 'bbb', '2', '', '', '', '', 2, 0, '2017-08-09 18:47:05'),
(52, 'bnnn', 'bbbb', '2', 'Att_NCTECHED_20170809085408', 'f8063bebe7a15ce63a3450fe91836f33382db7fe_a', '.jpg', '2017_08', 2, 0, '2017-08-09 18:54:08'),
(53, 'bbb', 'nnn', '2', 'Att_NCTECHED_20170809085446', 'ea0d4d35a73ba35a96d74b4bc8d5ecc72866f40b_a', '.jpg', '2017_08', 2, 0, '2017-08-09 18:54:46'),
(54, 'bbb', 'vvvv', '2', 'Att_NCTECHED_20170809085557', '973b0ed9eb54ce1f7699bb066337094c67eb4363_a', '.jpg', '2017_08', 2, 0, '2017-08-09 18:55:57'),
(55, 'ประกาศทดสอบระบบส่งอีเมล', 'นี่เป็นการทดสอบระบบส่งอีเมล ซึ่งกว่าจะทำได้เกือบสมบูรณ์ มันก็ใช้เวลานานมากเกินไปแล้ว ฮ่าๆ เหลืออะไรที่ต้องทำอีกบ้างหว่า ดูตามเอกสารแนบละกัน หลอกๆ', '0,1,2', 'Att_NCTECHED_20170809080250', '8dd70f1b4962f082cd245d81a6108ce576cae3ac_a', '.pdf', '2017_08', 2, 0, '2017-08-09 19:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `news_email_logs_hash`
--

CREATE TABLE `news_email_logs_hash` (
  `news_email_logs_hash_id` int(11) NOT NULL,
  `news_email_logs_id` int(11) NOT NULL,
  `news_email_logs_hash_str` varchar(40) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_email_logs_hash`
--

INSERT INTO `news_email_logs_hash` (`news_email_logs_hash_id`, `news_email_logs_id`, `news_email_logs_hash_str`, `flag`) VALUES
(1, 1, '18bf1929009ca9a9f3a077f5ee257808949092e5', 0),
(2, 2, '83b77e61bbcd91204fcdae3132ba8d2525cf27d8', 0),
(3, 4, '2a0aae39ad4f97c0ed649b299ae275ef838f7075', 0),
(4, 5, 'b8b564de9f7d544354837a7c0458f4e2cbad3732', 0),
(5, 6, '1210968d3be699f68cdb8c3a440fb39bf58d3ec8', 0),
(6, 7, 'a613feee5f0a65184e7105791fe2907e71c6345b', 0),
(7, 8, 'a564b7b19a8355c818022ba74147c823eba57513', 0),
(8, 9, '6961b3172dd83d9598d1831956d37ba26b79b590', 0),
(9, 10, 'c5b1558113ed869a1a61a05c78d62f8bbbbc55a5', 0),
(10, 11, '07587db1b32145933948a8cd29ffe76ae9a6a143', 0),
(11, 40, 'fb533896665d145f3b6d74dc1fcc72405abb8564', 0),
(12, 52, 'd5ae9fabde4d18914f34dc50ec5d6682e0fb2c4a', 0),
(13, 53, '37e5080469b34d76bc3c75d5ccf50833b13c1972', 0),
(14, 54, '09d255f223ecb2ee9fed56ed8790fd7d0382e2d3', 0),
(15, 55, '11ae7b737ee798ec37d27c139788940a3d4ba5f8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_public`
--

CREATE TABLE `news_public` (
  `news_public_id` int(255) NOT NULL,
  `news_name` text NOT NULL,
  `news_description` text NOT NULL,
  `news_type_status` varchar(100) NOT NULL,
  `news_public_date` date NOT NULL,
  `news_public_times` text NOT NULL,
  `news_public_conferences` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_public`
--

INSERT INTO `news_public` (`news_public_id`, `news_name`, `news_description`, `news_type_status`, `news_public_date`, `news_public_times`, `news_public_conferences`) VALUES
(1, 'ขยายเวลารับสมัครผลงานวิจัย', '-', 'YES', '2015-09-15', '17:30', 0),
(2, 'ลงทะเบียนเข้าร่วมฟังบรรยายและเสวนาพิเศษ ฟรี', '-', 'YES', '2015-11-16', '16:39', 0),
(3, 'test1', 'test1', 'YES', '2016-08-22', '06:00', 6),
(4, 'test1\'\'', 'test1;;', 'YES', '2016-08-15', '07:30', 6),
(5, 'test', 'ffff', 'YES', '2017-10-23', '17:00', 13),
(6, 'ขยายเวลาส่งเอกสารแนบการชำระเงิน', 'ให้ผู้ส่งงานวิจัยกรุณาอัฟโหลดสลิปการชำระเงินได้ก่อนสิ้นเดือนธันวาคม', 'YES', '2018-01-02', '02:00', 16);

-- --------------------------------------------------------

--
-- Table structure for table `paper_commeetee`
--

CREATE TABLE `paper_commeetee` (
  `paper_commeetee_id` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ที่อัพโหลด',
  `paper_detail_id` int(11) NOT NULL COMMENT 'ลำดับ',
  `commeettee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='บทความที่คณะกรรมการตรวจ';

-- --------------------------------------------------------

--
-- Table structure for table `paper_comment`
--

CREATE TABLE `paper_comment` (
  `paper_comment_id` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ที่อัพโหลด',
  `paper_file_id` int(11) NOT NULL COMMENT 'ลำดับ',
  `paper_comment_file_show` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ที่แสดง',
  `paper_comment_text` varchar(11) NOT NULL COMMENT 'สถานะของไฟล์',
  `paper_comment_point` decimal(2,2) NOT NULL COMMENT 'จำนวนการพิมพ์',
  `paper_comment_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'เวลาที่ส่งไฟล์เข้าสู่ระบบ',
  `paper_comment_ip` varchar(100) NOT NULL COMMENT 'ไอพี่ที่ใช้ส่งไฟล์',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='คอมเมนต์ของบทความ';

-- --------------------------------------------------------

--
-- Table structure for table `paper_detail`
--

CREATE TABLE `paper_detail` (
  `paper_detail_id` int(11) NOT NULL COMMENT 'ลำดับของบทความ',
  `paper_numbering_code` varchar(17) NOT NULL DEFAULT 'NCTED-00-00-0000',
  `paper_detail_name_th` varchar(255) NOT NULL COMMENT 'ชื่อบทความภาษาไทย',
  `paper_detail_name_en` varchar(255) NOT NULL COMMENT 'ชื่อบทความภาษาอังกฤษ',
  `department_id` int(11) NOT NULL COMMENT 'ลำดับสาขาวิชา',
  `paper_detail_keyword_th` varchar(255) NOT NULL COMMENT 'คำสำคัญภาษาไทย',
  `paper_detail_keyword_en` varchar(255) NOT NULL COMMENT 'คำสำคัญภาษาอังกฤษ',
  `paper_detail_abstract_th` mediumtext NOT NULL COMMENT 'บทคัดย่อ',
  `paper_detail_abstract_en` mediumtext NOT NULL,
  `paper_detail_year` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'ปีของบทความ',
  `paper_detail_status` int(11) NOT NULL DEFAULT '1' COMMENT 'สถานะของบทความ',
  `paper_last_file_id` int(11) NOT NULL,
  `conferences_select_id` int(11) NOT NULL COMMENT 'บันทึกครั้งที่ประชุมปัจจุบัน',
  `user_id` int(11) NOT NULL COMMENT 'ลำดับผู้ส่งบทความ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='รายละเอียดบทความ';

--
-- Dumping data for table `paper_detail`
--

INSERT INTO `paper_detail` (`paper_detail_id`, `paper_numbering_code`, `paper_detail_name_th`, `paper_detail_name_en`, `department_id`, `paper_detail_keyword_th`, `paper_detail_keyword_en`, `paper_detail_abstract_th`, `paper_detail_abstract_en`, `paper_detail_year`, `paper_detail_status`, `paper_last_file_id`, `conferences_select_id`, `user_id`) VALUES
(1, 'NCTED-07-10-0001', 'ปปป', 'xxx', 10, 'ปปป', 'xxxx', 'ปปปป', 'xxx', '2017-03-05 10:14:11', 6, 1, 7, 154),
(2, 'NCTED-07-10-0002', 'ำพะำพะ', 'gfhgjh', 10, 'ปปป', 'xcxv', 'ปกดพด', 'xsrserd', '2017-03-05 10:33:12', 3, 2, 7, 154),
(3, 'NCTED-07-10-0003', 'กดกเ', 'dfsg', 10, 'ปแอปอ', 'dgfdg', 'กดหกด', 'dfsdfs', '2017-03-05 12:15:02', 6, 3, 7, 154),
(4, 'NCTED-07-10-0004', 'อออออ', 'ccccc', 10, 'ผปแผปแ', 'xczxz', 'ผปแผปแ', 'asdasd', '2017-10-22 07:56:54', 1, 5, 7, 154),
(5, 'NCTED-09-09-0001', 'ปปปป', 'xxxxxx', 9, 'เเเดดด', 'xxx', 'ปปปปป', 'xxxxxx', '2017-08-21 06:06:24', 6, 7, 9, 154),
(6, 'NCTED-09-09-0002', 'งานวิจัยเรื่อง พฤติกรรมการออกก าลังกายก่อนและหลังการใช้โปรแกรมให้ความรู้ เรื่อง อาหาร อารมณ์ อกก าลังกายของผู้สูงอาย', 'Effects of the knowledge of the food emotions and exercise to the exercise behavior of Aging', 9, 'กกก', 'xxx', 'การศึกษาครั้งนี้เป็นการศึกษาเชิงกึ่งทดลองเพื่อศึกษาผลของการให้ความรู้ต่อพฤติกรรมการออกก าลังกาย\nของผู้สูงอายุบ้านใหม่ ต าบลดอนคา อ าเภออู่ทอง จังหวัดสุพรรณบุรี ก่อนและหลังการให้ความรู้เรื่อง 3 อ. (\nอาหาร อารมณ์ ออกก าลังกาย กลุ่มตัวอย่างที่ใช้ในการศึกษา ได้แก่ ผู้สูงอายุที่มีอายุ 60 ปีขึ้นไป จ านวน 60\nคน กลุ่มตัวอย่างที่ใช้ในการศึกษาในครั้งนี้ได้มาจากการสมัครใจของผู้สูงอายุ อายุ 60 ปีขึ้นไปชาวบ้านใหม่\nต าบลดอนคา อ าเภออู่ทอง จังหวัดสุพรรณบุรีเครื่องมือที่ใช้เป็นแบบทดสอบความรู้ก่อนและหลังการให้ความรู้\nเรื่อง 3 อ. ( อาหาร อารมณ์ ออกก าลังกาย ) และแบบวัดพฤติกรรมการออกก าลังกาย การวิเคราะห์ข้อมูล โดย\nน าแบบสอบถามข้อมูลพื้นฐานทั่วไปของกลุ่มตัวอย่างมาแจกแจงค่าความถี่และค่าร้อยละ เปรียบเทียบความ\nแตกต่างของค่าเฉลี่ยของผลการทดสอบความรู้ก่อนและหลังให้ความรู้เรื่อง 3 อ. ( อาหาร อารมณ์ ออกก าลังกาย )\nเปรียบเทียบความแตกต่างของค่าเฉลี่ยพฤติกรรมการออกก าลังกายก่อนและหลังให้ความรู้เรื่อง 3 อ. ( อาหาร\nอารมณ์ ออกก าลังกาย ) เป็นเวลา 3 สัปดาห์ และติดตามผลหลังการให้ความรู้ ผลการศึกษาพบว่า พบว่า หลัง\nการทดลองผู้สูงอายุมีค่าเฉลี่ยด้านความรู้เรื่อง 3 อ. และพฤติกรรมการออกก าลังกายเพิ่มขึ้นจากก่อนการทดลอง\nอย่างมีนัยส าคัญทางสถิติ (p< 0.05)\n จากผลการวิจัยครั้งนี้แสดงให้เห็นว่าการออกก าลังกายคือต้องการมีสุขภาพร่างกายแข็งแรงและสุขภาพจิตที่ดี\nลดอาการปวดเมื่อยจากการท างาน ควรมีหน่วยงานที่จะให้ความรู้ สร้างสุขภาพกับพฤติกรรมการออกก าลังกาย\nของประชาชน เพื่อปลูกจิตส านึกในการให้ความส าคัญต่อสุขภาพและการออกก าลังกาย', 'This study is an semi experimental study to investigate the effect of the exercise behaviors\nof aging at Banmai Donca Uthong Suphanburi. Before and after the knowledge of the third\nfactors (food emotions and exercise ) The sample used in the study were aged 60 years and\nolder were 60 samples used in this study were derived from the application. minds of elderly\npeople aged 60 years at Banmai Donca Uthong Suphanburi. The tool uses a knowledge test\nbefore and after the knowledge of the third factors (based on exercise) and exercise behavior.\nAnalysis of the survey data are the basis of the samples was analyzed using frequency and\npercentage. Compare the difference of the average of the test results before and after the\napplication of knowledge to the knowledge of the third factors (food, emotions exercise,) to\ncompare the difference in mean exercise behavior before and after the application of\nknowledge. for 3 weeks, and follow after knowledge. The results revealed that the aging have\nfound that the experimental value of the knowledge of the third factors, and exercise behavior\nincreased from the pretest. Statistical significance (p <0.05).\nThe results of this study show that exercise is like a healthy body and good mental health.\nRelieve pain from work. Agencies should be aware of. Health and exercise behavior of\nindividuals. To raise awareness of the importance of health and fitness.', '2017-08-16 07:30:54', 1, 0, 9, 154),
(7, 'NCTED-09-09-0003', 'งานวิจัยเรื่อง พฤติกรรมการออกก าลังกายก่อนและหลังการใช้โปรแกรมให้ความรู้ เรื่อง อาหาร อารมณ์ อกก าลังกายของผู้สูงอายงานวิจัยเรื่อง พฤติกรรมการออกก าลังกายก่อนและหลังการใช้โปรแกรมให้ความรู้ เรื่อง อาหาร อารมณ์ อกก าลังกายของผู้สูงอาย', 'Effects of the knowledge of the food emotions and exercise to the exercise behavior of AgingEffects of the knowledge of the food emotions and exercise to the exercise behavior of Aging', 9, 'กกกกกกกกกก', 'xxxxxx', 'หหหหหหกฟกฟกฟหก', 'This study is an semi experimental study to investigate the effect of the exercise behaviors\nof aging at Banmai Donca Uthong Suphanburi. Before and after the knowledge of the third\nfactors (food emotions and exercise ) The sample used in the study were aged 60 years and\nolder were 60 samples used in this study were derived from the application. minds of elderly\npeople aged 60 years at Banmai Donca Uthong Suphanburi. The tool uses a knowledge test\nbefore and after the knowledge of the third factors (based on exercise) and exercise behavior.\nAnalysis of the survey data are the basis of the samples was analyzed using frequency and\npercentage. Compare the difference of the average of the test results before and after the\napplication of knowledge to the knowledge of the third factors (food, emotions exercise,) to\ncompare the difference in mean exercise behavior before and after the application of\nknowledge. for 3 weeks, and follow after knowledge. The results revealed that the aging have\nfound that the experimental value of the knowledge of the third factors, and exercise behavior\nincreased from the pretest. Statistical significance (p <0.05).\nThe results of this study show that exercise is like a healthy body and good mental health.\nRelieve pain from work. Agencies should be aware of. Health and exercise behavior of\nindividuals. To raise awareness of the importance of health and fitness.This study is an semi experimental study to investigate the effect of the exercise behaviors\nof aging at Banmai Donca Uthong Suphanburi. Before and after the knowledge of the third\nfactors (food emotions and exercise ) The sample used in the study were aged 60 years and\nolder were 60 samples used in this study were derived from the application. minds of elderly\npeople aged 60 years at Banmai Donca Uthong Suphanburi. The tool uses a knowledge test\nbefore and after the knowledge of the third factors (based on exercise) and exercise behavior.\nAnalysis of the survey data are the basis of the samples was analyzed using frequency and\npercentage. Compare the difference of the average of the test results before and after the\napplication of knowledge to the knowledge of the third factors (food, emotions exercise,) to\ncompare the difference in mean exercise behavior before and after the application of\nknowledge. for 3 weeks, and follow after knowledge. The results revealed that the aging have\nfound that the experimental value of the knowledge of the third factors, and exercise behavior\nincreased from the pretest. Statistical significance (p <0.05).\nThe results of this study show that exercise is like a healthy body and good mental health.\nRelieve pain from work. Agencies should be aware of. Health and exercise behavior of\nindividuals. To raise awareness of the importance of health and fitness.', '2017-10-22 06:55:32', 4, 11, 9, 154),
(8, 'NCTED-09-09-0004', 'พฤติกรรมการออมและการกู้ยืมของสมาชิกสหกรณ์ออมทรัพย์ พนักงาน การไฟฟ้าส่วนภูมิภาค จำกัด', 'The Saving Behaviors and Loan Service Using', 9, 'พฤติกรรมการออม, พฤติกรรมการกู้ยืม', 'Saving Behaviors, Loan Service Behaviors', 'งานวิจัยครั้งนี้วัตถุประสงค์ของการวิจัยคือ เพื่อศึกษาพฤติกรรมการออม การกู้ยืม และเพื่อศึกษาความสัมพันธ์ระหว่างปัจจัยลักษณะทางประชากรศาสตร์ และสภาพทางเศรษฐกิจ กับพฤติกรรมการออมและการกู้ยืม กลุ่มตัวอย่างที่ใช้ในการวิจัยในครั้งนี้ ได้แก่ พนักงานการไฟฟ้าส่วนภูมิภาคที่เป็นสมาชิกในสหกรณ์การไฟฟ้าจำนวน 365 คน ผู้วิจัยสุ่มกลุ่มตัวอย่างโดยวิธีการสุ่มอย่างง่าย (Sample Random Sampling) โดยใช้แบบสอบถาม (Questionnaire) ในการเก็บรวบรวมข้อมูล สถิติที่ใช้ในการวิเคราะห์ คือ ร้อยละ (Percentage) และไคสแควร์ (Chi-square test: 2) \n	ผลการวิเคราะห์ข้อมูล พบว่า ผู้ตอบแบบสอบถามส่วนใหญ่เป็นหญิง มีอายุ 36 - 45 ปี มีการศึกษาระดับปริญญาตรี ส่วนใหญ่สมรสแล้ว และปัจจุบันปฏิบัติงานในกลุ่มงานปริญญา มีสมาชิกที่มีภาระต้องอุปการะ 1 - 2 คน เป็นสมาชิกสหกรณ์ออมทรัพย์มาแล้วมากกว่า 10 ปี มีรายได้ต่อเดือน มากกว่า 40,000 บาท และมีรายจ่ายต่อเดือนมากกว่า 30,000 บาท โดยรายได้สมดุลกับรายจ่าย ส่วนใหญ่มีการวางแผนทางการเงิน และออมทั้งประเภททุนเรือนหุ้นและเงินฝากกับสหกรณ์ออมทรัพย์ โดยมีการสะสมทุนเรือนหุ้นโดยประมาณต่อเดือนมากกว่า 1,000 บาท เพราะต้องการออมและต้อการผลตอบแทนหรือเงินปันผล มีปริมาณการฝากเงินกับสหกรณ์ออมทรัพย์เฉลี่ย10,000 – 50,000 บาทต่อปี ส่วนใหญ่เลือกประเภทเงินฝากออมทรัพย์พิเศษ เพื่อเป็นทุนการศึกษาบุตรหลาน ลักษณะการใช้จ่ายที่ก่อให้เกิดหนี้สิน คือ การซื้อบ้านที่อยู่อาศัย กู้ยืมเงินกับสหกรณ์ออมทรัพย์เพราะได้รับความสะดวกกว่าสถาบันการเงินอื่น \n	ผลการทดสอบสมมติฐาน พบว่า เพศ ระดับการศึกษา และรายได้รวมต่อเดือน มีความสัมพันธ์กับรูปแบบของการออม อายุ สถานภาพสมรส และรายได้รวมต่อเดือน มีความสัมพันธ์กับปริมาณการฝากเงินกับสหกรณ์ออมทรัพย์เฉลี่ยต่อปี และวัตถุประสงค์ในการฝากเงินกับสหกรณ์ออมทรัพย์ อายุ ตำแหน่งงาน และรายได้รวมต่อเดือน มีความสัมพันธ์กับการสะสมทุนเรือนหุ้นกับสหกรณ์โดยประมาณ ต่อเดือน รายได้รวมต่อเดือนมีความสัมพันธ์กับการวางแผนทางการเงิน และ อายุ สถานภาพสมรสรายได้รวมต่อเดือน มีความสัมพันธ์กับรูปแบบการกู้ยืมเงินกับสหกรณ์ออมทรัพย์', 'The purposes of this research were to study the saving behaviors and loan service using behaviors and to study the relationships between personal factors, economical factors, saving behaviors and loan service using behaviors of Provincial Electricity Authority’s Employees Saving and Credit Cooperation. The sample was 365 people who are now membership with the Provincial Electricity Authority’s Employees Saving and credit Cooperation. Data was collected by simple random sampling through questionnaires. Frequency, percentage and chi-square test (2) were applied as statistical analysis tools. Statistical significance levels were set at .01 and .05.\n	The results showed that the respondents were mostly females, aged 36 to 45 years old, holding Bachelor degree, married, working in Bachelor degree group worked sector. They have had to support 2 or 3 people in their families. They had joined the member of the co-operative for more than 10 years. They had a monthly income more than 40,000 Thai baths and monthly expenses more than 30,000 Thai baths. The revenue and expenditure were balance. The majority of them had financial planning. They saved money in the capital sharing and savings deposits with the Provincial Electricity Authority’s Employees Saving and credit Cooperation. They had capital stock with approximately 1,000 Thai baht per month. The reason they decide to deposit in a co-operative is that they want some deposits and other advantages. They deposited with an amount of money to the co-operative each year average 10,000 to 50,000 Thai baht with using special deposit saving for future study of their children. Nature of expenditure which resulted in debt is to buy houses and using loans service with co-operative credit union because they were convenient than other financial institutions. Hypothesis testing showed that gender, education level and monthly income relate to saving patterns. Age, marital status and monthly income relate to the amount of deposited money per year and saving purposes.  Age, work situation and monthly income relate to the capital sharing per month. Monthly income relate to financial planning. Age, marital status monthly income relate to loaning patterns. ', '2017-08-22 10:26:49', 6, 12, 9, 154),
(9, 'NCTED-09-09-0005', 'ผปแผปแ', 'zxczxc', 9, 'ผปแผปแ', 'sfgdfg', 'หกดหกด', 'zxczxczxc', '2017-08-22 10:43:13', 1, 0, 9, 154),
(10, 'NCTED-09-07-0001', 'สสส', 'gggg', 7, 'สสส', 'gggg', 'สสสส', 'gggg', '2017-09-06 03:20:09', 1, 0, 9, 147),
(11, 'NCTED-09-10-0001', 'ภาษาไทย', 'English mmss', 10, 'พฤติกรรมการออม,พฤติกรรมการกู้ยืม', 'Saving Behaviors, Loan Service Behaviors', 'บทคัดย่อภาษาไทย ', 'English man', '2017-09-06 16:19:53', 1, 0, 9, 154),
(12, 'NCTED-09-10-0002', 'ฟหกฟหกฟหก', 'ddddd', 10, 'พฤติกรรมการออม,พฤติกรรมการกู้ยืม', 'Saving Behaviors, Loan Service Behaviors', 'ผปแผแ', 'sfsdf', '2017-09-06 17:47:27', 1, 0, 9, 0),
(13, 'NCTED-09-04-0001', 'การพัฒนาเกมการสอนแบ5555555', 'The Development of Interactive Educational Game', 4, 'ทดสอบ', 'test', 'การวิจัยครั้งนี้มีวัตถุประสงค์เอ (1) พัฒนาแบบวัดความสามารถในการคิดอย่างมีวิจารณญาณสำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 3 ในโรงเรียนสังกัดสำนักงานเขตพื้นที่การศึกษาจันทบุรี เขต 2 และ (2) ตรวจสอบคุณภาพแบบวัดความสามารถในการคิดอย่างมีวิจารณญาณ สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 3 สังกัดสำนักงานเขตพื้นที่การศึกษาจันทบุรี เขต 2\r\n              กลุ่มตัวอย่างเป็นนักเรียนชั้นมัธยมศึกษาปีที่ 3 ในโรงเรียนสังกัดสำนักงานเขตพื้นที่การศึกษาจันทบุรี เขต 2 ได้มาโดยการสุ่มแบบหลายขั้นตอน จำนวน 800 คน เครื่องมือที่ใช้ในการวิจัยเป็นแบบวัดความสามารถในการคิดอย่างมีวิจารณญาณ สำหรับนักเรียนชั้นมัธยมศึกษาปีที่ 3 จำนวน 48 ข้อ ตรวจสอบคุณภาพวัดโดยตรวจสอบความตรงเชิงเนื้อหา ด้วยวิธีหาค่าดัชนีความสอดคล้อง ตรวจสอบความยากและอำนาจจำแนก ตรวจสอบความตรงเชิงโครงสร้างด้วยวิธีวิเคราะห์องค์ประกอบเชิงยืนยันและตรวจสอบความเที่ยงด้วยวิธีคำนาณสัมประสิทธิ์สหสัมพันธ์ของคูเดอร์-ริชาร์ดสัน ที่ 20', ' The objectives of this study were (1) to develop a critical thinking test for Mathayom Suksa III students in schools under the Office of  Chanthaburi Educational Service Area 2 and (2) to verify the critical thinking  test for Mathayom Suksa III students in schools under the Office of Chanthaburi Educational Service Area 2. \r\n              The sample consisted of  800  Mathayom Suksa III students in  schools under the Office of Chanthaburi Educational Service Area 2, obtained by multi-stage sampling. The employed research instrument was a critical thinking  test  comprising  48 items for Mattayom Suksa III students. Content validity of the developed test was verified by the item-objective congruency (IOC) index. Each item s difficulty level and discriminating power were verified with the difficulty index and discriminating index. Its construct validity was verified by confirmatory factor analysis (CFA). Its reliability was verified  by  calculation of  Kuder- Richardson 20 (K-R 20) formula.', '2017-09-24 09:58:17', 3, 13, 9, 147),
(14, 'NCTED-09-01-0001', 'ก้องเทสนะ', 'sssssss', 1, 'ทดสอบ', 'test', 'ดดดดกดกดกด', 'fdfdfdfd', '2017-09-24 13:19:13', 0, 15, 9, 147),
(15, 'NCTED-09-10-0003', 'ผแปผปแ', 'sad', 10, 'ผแ', 'xczc', 'ปแอปแอ', 'xcvxv', '2017-09-24 13:05:53', 1, 0, 9, 154),
(16, 'NCTED-13-04-0001', 'การพัฒนาเกมการสอนแบบมลติมีเดียบนอุปกรณ์ ระบบหน้าจอสัมผัส รายวิชาคณิตศาสตร์ ', 'The Development of Interactive Educational Game on Tablet PC for Mathematics of Prathomsuksa 1 ', 4, 'ทดสอบ', 'Interactive Educational Game, Tablet PC', 'ะ้ะ้ะ้ะ้ะะ้ะ', 'yjyjyjyjy', '2017-10-12 06:47:42', 1, 0, 13, 147),
(17, 'NCTED-14-10-0001', 'แนวทางการจัดกระบวนการเรียนรู้เพื่อส่งเสริมการกำหนดจุดมุ่งหมายการดำเนินชีวิตด้วยตนเอง ของนักเรียนที่มีความบกพร่องทางการเห็นระดับชั้นประถมศึกษาในเขตภาคเหนือ', 'Guidelines for learning process that Thai enhance self-determination of Primary-school students with visual impairment in the Northern area', 10, 'กระบวนการเรียนรู้, จุดมุ่งหมาย, ความบกพร่อง', 'Learning process, determination, Visual impairment', 'เนินชีวิตด้วยตนเองของนักเรียนที่มีความบกพร่องทางการเห็นในโรงเรียนสอนคนตาบอดระดับชั้นประถมศึกษา ใน\nเขตภาคเหนือ 2) ศึกษาแนวทางการจัดกระบวนการเรียนรู้เพื่อส่งเสริมการกำหนดจุดมุ่งหมายการดำเนินชีวิตด้วยตนเอง\nของนักเรียนที่มีความบกพร่องทางการเห็นในโรงเรียนสอนคนตาบอดระดับชั้นประถมศึกษาในเขตภาคเหนือ ประชากร\nได้แก่ ครูผู้สอนนักเรียนที่มีความบกพร่องทางการเห็นในโรงเรียนสอนคนตาบอดระดับชั้นประถมศึกษา ในเขตภาคเหนือ\nจำนวน 3 โรงเรียน เครื่องมือที่ใช้ประกอบด้วยแบบสัมภาษณ์ความคิดเห็นของครูผู้สอน วิเคราะห์ข้อมูลจากผู้ตอบแบบ\nสัมภาษณ์ด้วยการวิเคราะห์สาระ (Content Analysis) ในสภาพการปฏิบัติการจัดกระบวนการเรียนรู้ตามพระราชบัญญัติ\nการศึกษาแห่งชาติ ทั้ง 6 ด้าน นำเสนอด้วยวิธีพรรณนาวิเคราะห์ผล\nการวิจัยพบว่า\n1. สภาพการจัดกระบวนการเรียนรู้เพื่อส่งเสริมการกำหนดจุดมุ่งหมายการดำเนินชีวิตด้วยตนเองของนักเรียนที่มี\nความบกพร่องทางการเห็นในโรงเรียนสอนคนตาบอดระดับชั้นประถมศึกษาในเขตภาคเหนือ ผู้วิจัยได้ข้อมูลจากการ\nสัมภาษณ์ครูผู้สอนซึ่งเป็นผู้รับผิดชอบสอนนักเรียนที่มีความบกพร่องทางการเห็นในโรงเรียนสอนคนตาบอดระดับชั้น\nประถมศึกษาในเขตภาคเหนือจำนวน 3 โรงเรียน พบว่าทุกโรงเรียนมีกระบวนการจัดการเรียนรู้ในทุกกลุ่มสาระวิชาและ\nทุกทักษะ ยกเว้นทักษะการสอนตนเองที่มีบางโรงเรียนไม่ได้สอนในกลุ่มสาระวิชาภาษาไทย การงานอาชีพและเทคโนโลยี\nสังคมศึกษา ศาสนา และวัฒนธรรม ทักษะการดำรงชีวิตอิสระ การกล้าเสี่ยง และการรู้จักรักษาความปลอดภัยในตนเอง\nไม่ได้สอนในสาระวิชาศิลปะ ภาษาไทย และภาษาต่างประเทศ และในทักษะการตัดสินใจที่ไม่ได้สอน ในสาระวิชา\nคณิตศาสตร์ และวิทยาศาสตร์\n2. แนวทางการจัดกระบวนการเรียนรู้เพื่อส่งเสริมการกำหนดจุดมุ่งหมายการดำเนินชีวิตด้วยตนเองของ\nนักเรียนที่มีความบกพร่องทางการเห็นในโรงเรียนสอนคนตาบอดระดับชั้นประถมศึกษาในเขตภาคเหนือ การให้\nความสำคัญกับหลักสูตรและแผนการจัดการเรียนรู้ การสร้างความมั่นใจในตนเองให้กับนักเรียนให้นักเรียนตระหนักใน\nคุณค่าของตนเอง', 'The purposes of research were 1) to study the condition and 2) to study the guideline for\nlearning process that enhance self – determination of primary – school student with visual impairment\nin the northern school for the blind. The populations of the study were teachers who taught primary –\nschool students with visual impairment in the northern school for the blind in 3 schools. The\ninstrument used was an interview protocol. The data were analyzed by content analysis according to\nlearning process of National Education Act in 6 aspects and presented with descriptive analysis.\nResults of this research were the following:\n1. The condition for learning process that enhance self – determination of primary – school\nstudent with visual impairment in the northern school for the blind were at high and moderate level,\nwhereas independent living, take risk, and self – safety knowledge skill, self – teaching skill, and\nleadership skill were at mild level.\n2. The guideline for learning process that enhances self – determination of primary – school\nstudent with visual impairment in the northern school for the blind in the North. Teachers should\nfocus on the curriculum and learning management. Teachers should also motivate students to have\nself-confidence to make students aware of their own value.', '2017-10-19 15:25:20', 3, 16, 14, 154),
(18, 'NCTED-16-01-0001', 'นะครับ', 'test', 1, 'ทดสอบ', 'test', 'ครับ test ', 'test', '2017-10-22 13:56:24', 0, 17, 16, 147),
(19, 'NCTED-16-01-0002', 'โปรแกรม AutoCAD', 'AutoCAD program', 1, 'ทดสอบ , สส', 'test', 'มาไทย', 'hello', '2017-10-22 20:21:28', 6, 19, 16, 147),
(20, 'NCTED-16-10-0001', '123', '123', 10, '123', '123', '123ฟหก', '123', '2017-10-30 10:39:55', 6, 20, 16, 154),
(21, 'NCTED-16-10-0002', 'เทส', 'test', 10, 'ไทย', 'english', 'เทสtest', 'testtesttest', '2017-10-30 17:02:03', 6, 22, 16, 154),
(22, 'NCTED-16-10-0003', 'ไไทย', 'english', 10, 'ไทย', 'english', 'ไทย', 'enliss', '2017-10-30 17:26:16', 6, 23, 16, 154),
(23, 'NCTED-16-10-0004', 'กฟกห', 'asdsa', 10, 'ปแปอ', 'dcd', 'ปิแ', 'cvxv', '2017-10-30 18:35:34', 6, 24, 16, 154),
(24, 'NCTED-16-01-0003', 'ทดสอบ3', 'test3', 1, 'ทดสอบ', 'test', 'เว็บเซอร์วิสเป็นเทคโนโลยีที่ได้รับความนิยมอย่างมากในปัจจุบันเนื่องจากความสามารถติดต่อสื่อสารข้ามเทคโนโลยีระหว่างกันได้ (Cross Platform) และยังเป็นการทำงานแบบแอพพลิเคชั่นต่อแอพพลิเคชั่น ในงานวิจัยนี้ผู้วิจัยต้องการศึกษาว่าเว็บเซอร์วิสที่พัฒนาด้วยเทคโนโลยีเดียวกันและเว็บเซอร์วิสที่พัฒนาด้วยเทคโนโลยีที่ต่างกันจะมีประสิทธิภาพทางด้านเวลาต่างกันหรือไม่อย่างไร โดยในที่นี้จะศึกษาเทคโนโลยี 2 ตัวที่นิยมใช้ในปัจจุบัน คือ เทคโนโลยีจาวาและเทคโนโลยีไมโครซอร์ฟดอทเน็ตด้วยซีชาร์ป', 'The objectives of this study were (1) to develop a critical thinking test for MathayomSuksa III students in schools under the Office of Chanthaburi Educational Service Area 2 ; and (2)to verify the critical thinking test for Mathayom Suksa III students in schools under the Office ofChanthaburi Educational Service Area 2.The sample consisted of 800 Mathayom Suksa III students in schools under the Officeof Chanthaburi Educational Service Area 2, obtained by multi-stage sampling. The employed researchinstrument was a critical thinking test comprising 48 items for Mattayom Suksa III students. Contentvalidity of the developed test was verified by the item-objective congruency (IOC) index. Each item’ sdifficulty level and discriminating power were verified with the difficulty index and discriminating index.Its construct validity was verified by confirmatory factor analysis (CFA). Its reliability was verified by calculation of Kuder- Richardson 20 (K-R 20) formula', '2017-11-03 21:57:00', 6, 25, 16, 147),
(25, 'NCTED-16-10-0005', 'ทดสอบ66', 'test66', 10, 'ทดสอบ', 'test', 'กกหกหกหกดกดกดกดก', 'ggfgfgfgfgfg', '2017-11-04 06:08:25', 6, 26, 16, 147),
(26, 'NCTED-16-01-0004', 'ดดด', 'tt', 1, 'ดดด', 'hhhh', 'าสาttttttttttttttttttterttgเเเเ', '4etg4retrrtrtrtgrtgr', '2018-02-01 07:14:01', 3, 30, 16, 147),
(27, 'NCTED-16-01-0005', 'การพัฒนาเกมการสอนแบบมลติมีเดียบนอุปกรณ์ ระบบหน้าจอสัมผัส รายวิชาคณิตศาสตร์ ', 'The Development of Interactive Educational Game on Tablet PC for Mathematics of Prathomsuksa 1 ', 1, 'ทดสอบ', 'test', 'ดดดดดfeffefe', 'fefefef', '2018-01-30 08:54:39', 6, 28, 16, 147),
(28, 'NCTED-16-01-0006', 'การพัฒน', 'ffffffffffffffffffff', 1, 'ทดสอบ', 'test', 'ดดดดfeffe', 'fefefefe', '2018-02-01 07:48:59', 6, 29, 16, 147),
(29, 'NCTED-16-01-0007', 'ทดสอบ44', 'test44', 1, 'ทดสอบ', 'test', 'ทดสอบ44', 'test44', '2018-02-01 07:24:48', 0, 31, 16, 147);

-- --------------------------------------------------------

--
-- Table structure for table `paper_detail_owner`
--

CREATE TABLE `paper_detail_owner` (
  `paper_detail_owner_id` int(11) NOT NULL,
  `paper_detail_id` int(11) NOT NULL,
  `paper_detail_owner_prename` varchar(50) NOT NULL,
  `paper_detail_owner_name` varchar(150) NOT NULL,
  `paper_detail_owner_email` varchar(100) NOT NULL,
  `paper_detail_owner_address` text NOT NULL,
  `paper_detail_owner_mobile` varchar(20) NOT NULL,
  `paper_detail_owner_tel` varchar(20) NOT NULL,
  `paper_detail_owner_flg` int(11) NOT NULL COMMENT 'กำหนดผู้นิพนธ์ประสานงาน',
  `paper_detail_owner_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_detail_owner`
--

INSERT INTO `paper_detail_owner` (`paper_detail_owner_id`, `paper_detail_id`, `paper_detail_owner_prename`, `paper_detail_owner_name`, `paper_detail_owner_email`, `paper_detail_owner_address`, `paper_detail_owner_mobile`, `paper_detail_owner_tel`, `paper_detail_owner_flg`, `paper_detail_owner_status`, `user_id`, `create_date`, `modify_date`) VALUES
(1, 1, 'xxx', 'xxxx', 'xx', 'xxxx', 'xxx', 'xxx', 1, 1, 154, '2017-02-22 09:17:30', '0000-00-00 00:00:00'),
(2, 1, 'ปปแ', 'ปปป', 'ปปป', 'ปปป', 'ปปป', 'ปป', 0, 1, 154, '2017-02-23 19:45:57', '0000-00-00 00:00:00'),
(3, 1, 'หหห', 'หหหห', 'หหหห', 'หห', 'หหหห', 'หหห', 0, 1, 154, '2017-02-23 19:46:10', '0000-00-00 00:00:00'),
(4, 2, 'ccc', 'cc', 'cc', 'ccc', 'ccc', 'cc', 1, 1, 154, '2017-03-05 10:32:41', '0000-00-00 00:00:00'),
(5, 3, 'dfgdf', 'dfgdfg', 'ddfg', 'bcvb', 'bvcb', 'xbx', 1, 1, 154, '2017-03-05 12:13:05', '0000-00-00 00:00:00'),
(6, 4, 'asdasd', 'asdas', 'asdasd', 'asdasd', 'd', 'sdasd', 1, 1, 154, '2017-03-05 17:28:48', '0000-00-00 00:00:00'),
(15, 5, 'dd', 'ss', 'sss@sss.ss', 'sss', '0999999999', '072222222', 1, 1, 154, '2017-08-15 15:15:20', '0000-00-00 00:00:00'),
(16, 6, 'นางสาว', 'นีรชา อินนวล', 'sad@ddd.cc', 'asd', '0888888888', '074666666', 1, 1, 154, '2017-08-16 10:00:26', '0000-00-00 00:00:00'),
(17, 6, 'รศ.', 'ลาวัณย์ ผลสมภพ', 'fff@dddd.cc', 'ssss', '0888888888', '074666666', 0, 1, 154, '2017-08-16 10:02:25', '0000-00-00 00:00:00'),
(18, 8, 'Mister', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '074611585', 1, 1, 154, '2017-08-18 08:59:38', '2017-08-18 11:24:31'),
(19, 7, 'นาย', 'พันธ กิจ', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '022831074', 1, 1, 154, '2017-08-20 05:47:56', '0000-00-00 00:00:00'),
(20, 9, 'Phunthakit', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '026666666', 1, 1, 154, '2017-09-06 03:44:46', '0000-00-00 00:00:00'),
(21, 9, 'นาย', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '026666666', 0, 1, 154, '2017-09-06 03:46:56', '2017-09-06 03:47:50'),
(22, 11, 'Phunthakit', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '026666666', 0, 1, 154, '2017-09-06 16:20:28', '2017-09-06 17:39:03'),
(24, 10, 'asda', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '026666666', 0, 1, 147, '2017-09-06 17:54:00', '2017-09-06 18:02:33'),
(25, 10, 'Phunthakit', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '026666666', 0, 1, 147, '2017-09-06 18:03:58', '0000-00-00 00:00:00'),
(26, 10, '55', '5655', 'millman411412@gmail.com', 'hhh', '0876824665', '024618709', 0, 1, 147, '2017-09-06 18:22:05', '0000-00-00 00:00:00'),
(27, 10, 'อิอิ', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '026666666', 0, 1, 147, '2017-09-06 18:34:48', '0000-00-00 00:00:00'),
(28, 13, 'นาย', 'หมา', 'millman411412@gmail.com', '411', '0876824665', '024618709', 1, 1, 147, '2017-09-24 08:57:39', '0000-00-00 00:00:00'),
(29, 14, 'ยยย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '411', '0876824665', '024618709', 1, 1, 147, '2017-09-24 10:20:46', '0000-00-00 00:00:00'),
(30, 16, 'าาา', '่า่า่า', 'fdsfdsfd@ggg.com', 'jyjjyjyj', '0876824665', '024618709', 1, 1, 147, '2017-10-12 06:48:13', '0000-00-00 00:00:00'),
(31, 17, 'นางสาว', 'เสาวรถ อยู่ปั้น', 'sao@gmail.com', '122', '0811310944', '022222222', 1, 1, 154, '2017-10-19 15:20:14', '0000-00-00 00:00:00'),
(32, 17, 'นางสาว', 'ศิริวิมล ใจงาม', 'siri@gmail.com', '224', '0811310944', '022222222', 0, 1, 154, '2017-10-19 15:21:38', '0000-00-00 00:00:00'),
(33, 17, 'นางสาว', 'สลักจิต ตรีรณโอภาส', 'salak@gmail.com', '236', '0811310944', '022222222', 0, 1, 154, '2017-10-19 15:23:05', '0000-00-00 00:00:00'),
(34, 18, 'นาย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '411', '0876824665', '024618709', 1, 1, 147, '2017-10-22 10:17:48', '0000-00-00 00:00:00'),
(37, 19, 'นาย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '411 gggg', '0876824665', '02444 สส 555', 0, 1, 147, '2017-10-22 15:34:08', '2017-10-22 18:35:24'),
(39, 19, 'นาย', 'ก้อง ก้อง', 'millman411412@gmail.com', '411', '0876824665', '1234 กด 58', 1, 1, 147, '2017-10-22 16:35:01', '0000-00-00 00:00:00'),
(40, 20, 'Phunthakit', 'Phunthakit Kampa', 'kong555.01@gmail.com', '60/129 ,Village No.3 ,Chumpon Sub-Distric', '0828310743', '0266666666', 1, 1, 154, '2017-10-30 10:22:22', '0000-00-00 00:00:00'),
(41, 21, 'dd', 'Auftrag', 'ph.kp111@gmail.com', 'sss', '0999999999', '029999999', 1, 1, 154, '2017-10-30 16:41:39', '0000-00-00 00:00:00'),
(42, 22, 'dd', 'Auftrag', 'ph.kp111@gmail.com', 'sss', '0999999999', '022222222', 1, 1, 154, '2017-10-30 17:24:20', '0000-00-00 00:00:00'),
(43, 24, 'นาย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '1518', '0876824665', '0811111111', 1, 1, 147, '2017-11-03 19:56:23', '0000-00-00 00:00:00'),
(44, 23, 'dd', 'Auftrag', 'ph.kp111@gmail.com', 'sss', '0999999999', '022222222', 1, 1, 154, '2017-10-30 17:24:20', '0000-00-00 00:00:00'),
(45, 25, 'นาย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '1518', '0876824665', '0811111111', 1, 1, 147, '2017-11-04 06:00:42', '0000-00-00 00:00:00'),
(46, 25, 'นาย', 'ทดสอบส่ง', 'millman11411412@gmail.com', '1518', '0876824665', '0811111111', 0, 1, 147, '2017-11-04 06:01:03', '0000-00-00 00:00:00'),
(47, 26, 'ใใใ', 'ใใใ', 'millman411412@gmail.com', 'ใใใ', '0846187787', '024618709', 1, 1, 147, '2018-01-29 18:12:35', '0000-00-00 00:00:00'),
(48, 27, 'นาย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '411 หมู่ 10', '0876824665', '024618709', 1, 1, 147, '2018-01-29 18:35:45', '0000-00-00 00:00:00'),
(49, 29, 'นาย', 'ชัยกุล กาญจนโภคิน', 'millman411412@gmail.com', '411', '0876824665', '0811111111', 1, 1, 147, '2018-02-01 07:22:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paper_detail_status`
--

CREATE TABLE `paper_detail_status` (
  `paper_detail_status_id` int(11) NOT NULL,
  `paper_detail_status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_detail_status`
--

INSERT INTO `paper_detail_status` (`paper_detail_status_id`, `paper_detail_status_name`, `active`) VALUES
(0, 'ไม่ผ่านการพิจารณา', 'YES'),
(1, 'กำลังรอไฟล์งานวิจัย', 'YES'),
(2, 'ผ่านการตรวจสอบหัวข้องานวิจัย', 'YES'),
(3, 'รอการตรวจสอบงานวิจัย', 'YES'),
(4, 'ผ่าน รอการตรวจสอบการชำระเงิน', 'YES'),
(5, 'อยู่ระหว่างการตรวจสอบการขำระเงิน', 'YES'),
(6, 'ผ่านการตรวจสอบการชำระเงิน', 'YES'),
(7, 'รอการตีพิมพ์', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `paper_file`
--

CREATE TABLE `paper_file` (
  `paper_file_id` int(11) NOT NULL COMMENT 'ลำดับ',
  `paper_detail_id` int(11) NOT NULL COMMENT 'ลำดับของบทความ',
  `paper_file_name` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ที่อัพโหลด',
  `paper_file_show` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ที่แสดง',
  `paper_file_name_hash` varchar(42) NOT NULL COMMENT 'เก็บชื่อไฟล์ที่หลังจากอัพโหลด',
  `paper_file_year_dir` varchar(7) NOT NULL COMMENT 'เก็บชื่อที่อยู่โฟลเดอร์',
  `paper_file_type` varchar(5) NOT NULL,
  `paper_file_format_status` varchar(255) NOT NULL COMMENT 'สถานะของไฟล์',
  `paper_file_printcount` int(11) NOT NULL COMMENT 'จำนวนการพิมพ์',
  `paper_file_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'เวลาที่ส่งไฟล์เข้าสู่ระบบ',
  `paper_file_comment1` varchar(200) NOT NULL,
  `paper_file_comment2` varchar(200) NOT NULL,
  `paper_file_comment3` varchar(200) NOT NULL,
  `paper_file_ip` varchar(100) NOT NULL COMMENT 'ไอพี่ที่ใช้ส่งไฟล์',
  `user_id` int(11) NOT NULL,
  `paper_file_owner_comment1_status` varchar(255) NOT NULL,
  `paper_file_owner_comment2_status` varchar(255) NOT NULL,
  `paper_file_owner_comment3_status` varchar(255) NOT NULL,
  `paper_file_status` int(11) NOT NULL,
  `paper_file_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ไฟล์ของบทความ';

--
-- Dumping data for table `paper_file`
--

INSERT INTO `paper_file` (`paper_file_id`, `paper_detail_id`, `paper_file_name`, `paper_file_show`, `paper_file_name_hash`, `paper_file_year_dir`, `paper_file_type`, `paper_file_format_status`, `paper_file_printcount`, `paper_file_datetime`, `paper_file_comment1`, `paper_file_comment2`, `paper_file_comment3`, `paper_file_ip`, `user_id`, `paper_file_owner_comment1_status`, `paper_file_owner_comment2_status`, `paper_file_owner_comment3_status`, `paper_file_status`, `paper_file_flg`) VALUES
(1, 1, 'SLP_20170222025131', 'NCTED-07-10-0001-001', '2fb1429b1839f913b1bdffa9fa7f5b2cd48f5fee_o', '2017_02', '.jpg', 'ok', 0, '2017-02-22 13:58:17', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(2, 2, '15337460_1204552949636195_6750350434560759738_n', 'NCTED-07-10-0002-001', '26bb40cb2c084d4a722974c7944c9801b533681c_o', '2017_03', '.jpg', 'ok', 0, '2017-03-05 10:34:21', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(3, 3, 'แบบทดสอบ', 'NCTED-07-10-0003-001', '6e99467938b836111b5c22803d81032520c18243_o', '2017_03', '.docx', 'vvv', 0, '2017-03-05 12:13:53', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(4, 4, '16999091_664182530428261_5522816682567480249_n', 'NCTED-07-10-0004-001', 'a01bff66257f08a3fcb00f649e38da28d26c4a17_o', '2017_03', '.jpg', 'bbbb', 0, '2017-03-05 17:32:32', '', '', '', '192.168.33.1', 154, '', '', '', 2, 1),
(5, 4, 'แบบทดสอบหลังเรียน-หน่วยที่-3', 'NCTED-07-10-0004-002', '4fe603e225626c445316a0c95fe9d37d27396da6_o', '2017_03', '.docx', 'ccc', 0, '2017-03-05 17:33:15', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(6, 5, '3.1_.2_', 'NCTED-09-09-0001-001', '2b4daf78c42b7930785a5d81883c40bb874a8ec1_o', '2017_08', '.pdf', 'ok', 0, '2017-08-16 06:26:56', '', '', '', '192.168.33.1', 154, '', '', '', 2, 1),
(7, 5, 'NCTED-09-09-0001-001', 'NCTED-09-09-0001-002', '3e0ecfda4249d6d34472bc7832fd8eb8a734532f_o', '2017_08', '.pdf', 'kkk', 0, '2017-08-16 06:56:31', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(8, 8, 'ตัวอย่างบทความวิจัย', 'NCTED-09-09-0004-001', '73b7f9ee29c6b81d6365308140302d5e5fe0cdc3_o', '2017_08', '.doc', 'ให้แก้ไขตามเอกสารแนบ', 0, '2017-08-19 21:27:48', '', '', '', '192.168.33.1', 154, '', '', '', 2, 1),
(9, 7, 'ตัวอย่างบทความวิจัย', 'NCTED-09-09-0003-001', 'f9a69f24a5c5714f07874d9898403b6c0d227ffa_o', '2017_08', '.doc', 'แก้ไขตามเอกสารแนบ', 0, '2017-08-20 10:37:23', '', '', '', '192.168.33.1', 154, '', '', '', 2, 1),
(10, 7, 'ตัวอย่างบทความวิจัย', 'NCTED-09-09-0003-002', '921bc417061676555366d731201a14b8914a0e8f_o', '2017_08', '.doc', 'ตามนั้น', 0, '2017-08-20 18:15:59', '', '', '', '192.168.33.1', 154, '', '', '', 2, 1),
(11, 7, 'ตัวอย่างบทความวิจัย', 'NCTED-09-09-0003-003', 'aa96844fd03aed4c78fea512361ec6ec98bb088b_o', '2017_08', '.doc', 'ตามนั้น', 0, '2017-08-21 02:24:38', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(12, 8, 'NCTED-09-09-0001-001', 'NCTED-09-09-0004-002', '293ca8b551511e031462879f6d4d3812ba8642e5_o', '2017_08', '.pdf', 'ตามนั้น', 0, '2017-08-22 10:22:44', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(13, 13, 'ShopAt24.com_-_การสั่งซื้อของคุณ_1019113705_จาก_12_07_2017_-_การชำระเงิน_บัตรเครดิต_', 'NCTED-09-04-0001-001', '0581c10c2d8a15c7b10b76bb9ef9affeecebc842_o', '2017_09', '.pdf', 'แก้ตามนั้น', 0, '2017-09-24 10:10:05', '', '', '', '::1', 147, '', '', '', 1, 1),
(14, 14, 'ShopAt24.com_-_การสั่งซื้อของคุณ_1019113705_จาก_12_07_2017_-_การชำระเงิน_บัตรเครดิต_', 'NCTED-09-01-0001-001', '95dd1149308601ef88f4b24f8c681d8b9b4cf0f8_o', '2017_09', '.pdf', '', 0, '2017-09-24 10:21:40', '', '', '', '::1', 147, '', '', '', 0, 0),
(15, 14, 'ASTE-6Z7V8M_R0_EN', 'NCTED-09-01-0001-002', 'c475779e532ef0d88d54316bf4b0c31a20c3b9dc_o', '2017_09', '.pdf', 'ไม่รู้', 0, '2017-09-24 13:19:12', '', '', '', '::1', 147, '', '', '', 1, 1),
(16, 17, 'fda201707_2', 'NCTED-14-10-0001-001', '374eb353fb5e017d003843cc74c764321f218a94_o', '2017_10', '.pdf', '', 0, '2017-10-22 07:49:59', '', '', '', '192.168.33.1', 154, '', '', '', 2, 1),
(17, 18, '31-7-2560_2-15-58', 'NCTED-16-01-0001-001', 'b695f8df13052799f9e3d0f0969538fe678983ea_o', '2017_10', '.pdf', '', 0, '2017-10-22 13:56:24', '', '', '', '::1', 147, '', '', '', 1, 1),
(18, 19, '31-7-2560_2-15-58', 'NCTED-16-01-0002-001', 'fadaa46845fa854d7aed49403f89a54cc64220ca_o', '2017_10', '.pdf', 'ช่วยแก้ไขหน่อย', 0, '2017-10-22 17:59:56', '', '', '', '::1', 147, '', '', '', 2, 1),
(19, 19, 'คู่มือ_Electrolux_ew-541f', 'NCTED-16-01-0002-002', 'd841f37a214e1a8aad160e1488ef26d9400b2171_o', '2017_10', '.pdf', '', 0, '2017-10-22 19:47:14', '', '', '', '::1', 147, '', '', '', 3, 1),
(20, 20, '9780387290560-c2', 'NCTED-16-10-0001-001', '2dcbba0dfb1e695ab4cbb631c78d5ee832ab6d15_o', '2017_10', '.pdf', '', 0, '2017-10-30 10:23:56', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(21, 21, '3.1_.2_', 'NCTED-16-10-0002-001', '66e281e488a2a779122e2740d03c18be0455929e_o', '2017_10', '.pdf', 'gg', 0, '2017-10-30 16:48:04', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(22, 21, '3.1_.2_', 'NCTED-16-10-0002-002', '85251df3ee8fe24fffdc7d31d671c766fc70199a_o', '2017_10', '.pdf', 'kk', 0, '2017-10-30 16:58:14', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(23, 22, '3.1_.2_', 'NCTED-16-10-0003-001', 'b9b7733a61e3e2a347b6e51c99b10608d482e4f1_o', '2017_10', '.pdf', 'cccc', 0, '2017-10-30 17:25:51', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(24, 23, '3.1_.2_', 'NCTED-16-10-0004-001', 'dff089458bef9a32b3f50a870ffb3185af479b50_o', '2017_10', '.pdf', 'kk', 0, '2017-10-30 18:32:29', '', '', '', '192.168.33.1', 154, '', '', '', 3, 1),
(25, 24, 'คณะกรรมการ', 'NCTED-16-01-0003-001', '1a2638c3fb6597e88c19aad834e6fdacfc675181_o', '2017_11', '.docx', '', 0, '2017-11-03 21:21:47', '', '', '', '::1', 147, '', '', '', 3, 1),
(26, 25, 'คณะกรรมการ', 'NCTED-16-10-0005-001', '15859adbcac2e232a311896e2ad377eb4524a280_o', '2017_11', '.pdf', 'ผ่านแล้ว', 0, '2017-11-04 06:06:56', '', '', '', '::1', 147, '', '', '', 3, 1),
(27, 27, 'ห้ามปิดสวิตซ์', 'NCTED-16-01-0005-001', '598de7cbf11f30723746ebdf0c82feaf9319ce61_o', '2018_01', '.docx', '', 0, '2018-01-30 07:47:37', '', '', '', '::1', 147, '', '', '', 2, 1),
(28, 27, 'Doc1', 'NCTED-16-01-0005-002', 'fb0116486a25417647b870f397f1d347dc1ffc4c_o', '2018_01', '.docx', '', 0, '2018-01-30 07:56:10', '', '', '', '::1', 147, '', '', '', 3, 1),
(29, 28, 'Doc1', 'NCTED-16-01-0006-001', '474a3b9da21e1473d22ff0faa3c88835c3b52244_o', '2018_01', '.docx', '', 0, '2018-02-01 07:11:09', '', '', '', '::1', 147, '', '', '', 3, 1),
(30, 26, 'ห้ามปิดสวิตซ์', 'NCTED-16-01-0004-001', '94a428a40ddf74c51ac34bd9c3140caaa2d8fb7f_o', '2018_02', '.docx', '', 0, '2018-02-01 07:15:41', '', '', '', '::1', 147, '', '', '', 2, 1),
(31, 29, 'ห้ามปิดสวิตซ์', 'NCTED-16-01-0007-001', 'af62a0b6d74933590e3e71a8acfb0e381ffb9bf6_o', '2018_02', '.docx', '', 0, '2018-02-01 07:24:48', '', '', '', '::1', 147, '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paper_file_evaluation_comment`
--

CREATE TABLE `paper_file_evaluation_comment` (
  `paper_file_evaluation_comment_id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `paper_file_evaluation_comment_text` text NOT NULL,
  `paper_file_evaluation_comment_file` text,
  `paper_file_evaluation_comment_hash` varchar(42) NOT NULL COMMENT 'เก็บแฮช',
  `paper_file_evaluation_comment_type` varchar(5) NOT NULL COMMENT 'เก็บนามสกุลไฟล์',
  `paper_file_evaluation_comment_year_dir` varchar(7) NOT NULL COMMENT 'เก็บโฟลเดอร์',
  `paper_file_evaluation_comment_status` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_file_evaluation_comment`
--

INSERT INTO `paper_file_evaluation_comment` (`paper_file_evaluation_comment_id`, `evaluation_id`, `paper_file_evaluation_comment_text`, `paper_file_evaluation_comment_file`, `paper_file_evaluation_comment_hash`, `paper_file_evaluation_comment_type`, `paper_file_evaluation_comment_year_dir`, `paper_file_evaluation_comment_status`, `date_create`, `user_id`) VALUES
(1, 1, 'คะแนน 3.00 ถึง 3.99 รับลงพิมพ์โดยต้องแก้ไขเล็กน้อย ไม่ต้องผ่านกรรมการพิจารณา (ให้แก้ไขตามเอกสารแนบ)', 'Rev_NCTECHED_20170816082418', 'c3ba3951f39d2d7bfd169a8f3c02441946c5b880_r', '.docx', '2017_08', 0, '2017-08-16 06:24:18', 152),
(2, 2, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-08-16 06:33:41', 152),
(3, 3, 'คะแนน 3.00 ถึง 3.99 รับลงพิมพ์โดยต้องแก้ไขเล็กน้อย ไม่ต้องผ่านกรรมการพิจารณา (ให้แก้ไขตามเอกสารแนบ)', 'Rev_NCTECHED_20170819081823', 'bdafaa51679150754a3358edcabf19dd5908f52f_r', '.doc', '2017_08', 0, '2017-08-19 21:18:23', 152),
(4, 4, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-08-22 09:27:48', 152),
(5, 5, 'คะแนน 3.00 ถึง 3.99 รับลงพิมพ์โดยต้องแก้ไขเล็กน้อย ไม่ต้องผ่านกรรมการพิจารณา (ให้แก้ไขตามเอกสารแนบ)', 'Rev_NCTECHED_20170822082141', '0e2799606b9e9037d9542d5ad301c2fc98807f30_r', '.doc', '2017_08', 0, '2017-08-22 10:21:41', 152),
(6, 6, 'คะแนน 2.00 ถึง 2.99 รับลงพิมพ์โดยแก้ไขส่วนใหญ่ต้องผ่านกรรมการพิจารณาอีกครั้ง (ให้แก้ไขตามเอกสารแนบ)', 'Rev_NCTECHED_20170924090509', '81a2604648aff8f018ff84dead966734a8aef663_r', '.pdf', '2017_09', 0, '2017-09-24 10:05:09', 152),
(7, 7, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-10-22 07:37:33', 152),
(8, 8, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-10-22 07:38:48', 152),
(9, 9, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-10-22 07:43:57', 157),
(10, 10, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-10-22 07:49:08', 158),
(11, 11, '22', 'Rev_NCTECHED_20171022105414', '690ab3f5d1853d41da6eb2664929cec7f41713a3_r', '.pdf', '2017_10', 0, '2017-10-22 13:54:14', 152),
(12, 12, 'คะแนน 3.00 ถึง 3.99 รับลงพิมพ์โดยต้องแก้ไขเล็กน้อย ไม่ต้องผ่านกรรมการพิจารณา (ให้แก้ไขตามเอกสารแนบ)', 'Rev_NCTECHED_20171022105533', '80ad5ed4689ac5d390c6a3b6752992ab48d67f83_r', '.pdf', '2017_10', 0, '2017-10-22 17:55:33', 152),
(13, 13, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-10-22 19:43:40', 152),
(14, 14, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-11-03 20:59:40', 152),
(15, 15, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2017-11-04 06:05:18', 153),
(16, 16, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2018-01-29 19:11:01', 152),
(17, 17, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2018-01-30 07:54:58', 152),
(18, 18, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2018-01-30 09:42:40', 152),
(19, 19, 'คะแนน 3.00 ถึง 3.99 รับลงพิมพ์โดยต้องแก้ไขเล็กน้อย ไม่ต้องผ่านกรรมการพิจารณา (ให้แก้ไขตามเอกสารแนบ)', 'Rev_NCTECHED_20180130014500', '6d7aaf58520e2d75116f0bc0cc82e45aeb3b559c_r', '.jpg', '2018_01', 0, '2018-01-30 09:45:04', 152),
(20, 20, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2018-02-01 07:14:55', 152),
(21, 21, 'คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข', '', '', '', '', 0, '2018-02-01 07:24:23', 152);

-- --------------------------------------------------------

--
-- Table structure for table `paper_file_eval_hash`
--

CREATE TABLE `paper_file_eval_hash` (
  `paper_file_eval_hash_id` int(11) NOT NULL,
  `paper_file_evaluation_comment_id` int(11) NOT NULL,
  `paper_file_eval_hash_str` varchar(40) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เก็บ hash ไว้อ้างอิงไฟล์ของ evaluation';

--
-- Dumping data for table `paper_file_eval_hash`
--

INSERT INTO `paper_file_eval_hash` (`paper_file_eval_hash_id`, `paper_file_evaluation_comment_id`, `paper_file_eval_hash_str`, `flag`) VALUES
(1, 1, '336884766e3d8da8d8bf69e03e71d169371f9e20', 0),
(2, 3, 'a8e74a06b481909883b85161df58aac861644d2a', 0),
(3, 5, 'a5d2efcb20f75e47e6b2f0b47c1a583dccbf6c24', 0),
(4, 6, 'c1344c2f3a147d476d4391a72dd2c7aa27b45533', 0),
(5, 11, '890b0db2b91dc81e0c3cedd6af42529351d36c72', 0),
(6, 12, 'c47ba2ed03fcf643a294d29b9232b90f3a325bde', 0),
(7, 19, '311ae8bd886ced0808f84601f0eac28abba801ae', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_file_hash`
--

CREATE TABLE `paper_file_hash` (
  `paper_file_hash_id` int(11) NOT NULL,
  `paper_file_id` int(11) NOT NULL,
  `paper_file_hash_str` varchar(40) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เก็บ hash ของ paper_file';

--
-- Dumping data for table `paper_file_hash`
--

INSERT INTO `paper_file_hash` (`paper_file_hash_id`, `paper_file_id`, `paper_file_hash_str`, `flag`) VALUES
(1, 1, 'a3752a9f3ebaebc191cc28fec7f7537d1a699b8e', 0),
(2, 2, '1accbf58d3e9823e33720fde8c524b88b4dadfeb', 0),
(3, 3, '26f3478a0f190eb51422bcdf0828f4454b545c6f', 0),
(4, 4, '56c9a2c9d3a8946e0d707881ed164d637f38fe68', 0),
(5, 5, '98f9d5581aa669cb8a1bb3b09f68e146bf1bb933', 0),
(6, 6, '22315ba9802c81d277bb5f6b94ffda53889772f5', 0),
(7, 7, 'c26e17ef0e932e02057ee36745c6a5380da0d58e', 0),
(8, 8, '7262099d8671ac53692373fc5d69b663550f6675', 0),
(9, 9, '74c123cbe9bcb88090210ce511985b208bb5c2b6', 0),
(10, 10, 'e5b7f00e81a60619d24d124dc1b38d76cb2b270f', 0),
(11, 11, '0be28ea2faa89b1c19980e4cf4e90e84252d876d', 0),
(12, 12, '9822925942fbea6b6bbf598a75576f6865afbe40', 0),
(13, 13, '40a496eb7a6d643c959e8afd8bab726ab5023f74', 0),
(14, 14, '36cadb85b37808745e7ef0454fb7d55201d48d19', 0),
(15, 15, 'fce2c30d13ac54c079568d1afb5b90c17e2bea57', 0),
(16, 16, 'e16344fbaca2a4236b6f4ad9e84959a177e0336e', 0),
(17, 17, '76175dbc62daed028066189dfca87a484b2ebdb6', 0),
(18, 18, '950e6d8d80e27c7aff5b2995c6f65d45118bbaf6', 0),
(19, 19, 'e03d4ab6dd46741175d654cad309dc8c006ea91c', 0),
(20, 20, '789993283be0ff1515f718b29298f513ca0279a7', 0),
(21, 21, 'a55cc7f637ca02f74ca122a58c5fe077cbbedbce', 0),
(22, 22, '79e4a0f4310d40b9bf01786052cd7c26a5f5792e', 0),
(23, 23, '1d342fe71f0e852fd37a8af7aa26a290cf5068ae', 0),
(24, 24, '6cb2c09be786bc553df7353f421f00a77ba0f29d', 0),
(25, 25, '13f66f08d9ab755e1db7f5d6148cb699a8c4fa82', 0),
(26, 26, '8859441291404f181d3bdb6578bf686a6f74596f', 0),
(27, 27, '65e098f9802b32a9a8badfe98fefc9e1b909fe20', 0),
(28, 28, 'a16808fa9dc2924fa6baf347b95c887faeda94dc', 0),
(29, 29, '58f9c8db3cd4c42a92684018c68f1faf0b2008a9', 0),
(30, 30, 'fb799b87124595febd5d7caaf9bd0f05a422aab8', 0),
(31, 31, '7af326077937c7b19a643eb502b171e30ef969bc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_file_index_hash`
--

CREATE TABLE `paper_file_index_hash` (
  `paper_file_index_hash_id` int(11) NOT NULL,
  `paper_file_id` int(11) NOT NULL,
  `index_paper_file_id` int(11) NOT NULL,
  `paper_file_index_hash_str` varchar(40) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_file_index_hash`
--

INSERT INTO `paper_file_index_hash` (`paper_file_index_hash_id`, `paper_file_id`, `index_paper_file_id`, `paper_file_index_hash_str`, `flag`) VALUES
(4, 24, 1, '7bef5974c9e74870fb50bf0ed32d1598ddaf0fe2', 0),
(5, 25, 2, '6572bc6c764678e4893d717b5102a48b10d22a50', 0),
(6, 19, 3, '6572bc6c764678e4893d717b5102a48b10d22a50', 0),
(7, 20, 4, '6572bc6c764678e4893d717b5102a48b10d22a50', 0),
(8, 22, 5, '6572bc6c764678e4893d717b5102a48b10d22a50', 0),
(9, 23, 6, '6572bc6c764678e4893d717b5102a48b10d22a50', 0),
(10, 26, 7, '7ae26138e564af157e1e8ab088bbdbe0581ce8ec', 0),
(11, 28, 8, '48afbe729ec5c76ed795b3df65ec7b0461321b98', 0),
(12, 29, 9, 'ba423775ca273e03a2876b2fd0666a209cbb4779', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_numbering`
--

CREATE TABLE `paper_numbering` (
  `paper_numbering_id` int(11) NOT NULL,
  `paper_numbering_no` int(11) NOT NULL,
  `paper_numbering_year` year(4) NOT NULL,
  `paper_numbering_dep` int(11) NOT NULL,
  `paper_numbering_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_numbering`
--

INSERT INTO `paper_numbering` (`paper_numbering_id`, `paper_numbering_no`, `paper_numbering_year`, `paper_numbering_dep`, `paper_numbering_number`) VALUES
(1, 7, 2016, 10, 4),
(2, 9, 2017, 9, 5),
(3, 9, 2017, 7, 1),
(4, 16, 2017, 10, 5),
(5, 9, 2017, 4, 1),
(6, 16, 2017, 1, 7),
(7, 13, 2017, 4, 1),
(8, 16, 2017, 10, 5),
(9, 16, 2017, 1, 7),
(10, 16, 2017, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer`
--

CREATE TABLE `paper_reviewer` (
  `paper_reviewer_id` int(11) NOT NULL,
  `paper_detail_id` int(11) NOT NULL,
  `paper_file_owner_comment1` int(11) NOT NULL,
  `paper_file_owner_comment_status1` int(11) NOT NULL,
  `paper_file_owner_comment2` int(11) NOT NULL,
  `paper_file_owner_comment_status2` int(11) NOT NULL,
  `paper_file_owner_comment3` int(11) NOT NULL,
  `paper_file_owner_comment_status3` int(11) NOT NULL,
  `paper_file_owner_comment4` int(11) NOT NULL,
  `paper_file_owner_comment_status4` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_reviewer`
--

INSERT INTO `paper_reviewer` (`paper_reviewer_id`, `paper_detail_id`, `paper_file_owner_comment1`, `paper_file_owner_comment_status1`, `paper_file_owner_comment2`, `paper_file_owner_comment_status2`, `paper_file_owner_comment3`, `paper_file_owner_comment_status3`, `paper_file_owner_comment4`, `paper_file_owner_comment_status4`, `create_date`, `user_id`) VALUES
(1, 2, 152, 0, 157, 0, 0, 0, 0, 0, '2017-03-05 10:33:34', 2),
(2, 5, 152, 0, 0, 0, 0, 0, 0, 0, '2017-08-15 15:32:43', 2),
(3, 8, 152, 0, 0, 0, 0, 0, 0, 0, '2017-08-18 11:36:15', 2),
(4, 13, 152, 0, 0, 0, 0, 0, 0, 0, '2017-09-24 09:54:17', 2),
(5, 17, 152, 0, 0, 0, 0, 0, 0, 0, '2017-10-19 15:28:14', 2),
(6, 4, 152, 0, 157, 0, 158, 0, 0, 0, '2017-10-22 07:35:29', 2),
(7, 18, 152, 0, 157, 0, 0, 0, 0, 0, '2017-10-22 10:49:13', 2),
(8, 19, 152, 0, 0, 0, 0, 0, 0, 0, '2017-10-22 17:51:16', 2),
(9, 24, 152, 0, 153, 0, 0, 0, 0, 0, '2017-11-03 20:34:15', 2),
(10, 25, 153, 0, 0, 0, 0, 0, 0, 0, '2017-11-04 06:02:56', 2),
(11, 27, 152, 0, 0, 0, 0, 0, 0, 0, '2018-01-29 19:09:29', 2),
(12, 28, 152, 0, 0, 0, 0, 0, 0, 0, '2018-01-30 09:36:57', 2),
(13, 26, 152, 0, 0, 0, 0, 0, 0, 0, '2018-02-01 07:12:40', 2),
(14, 29, 152, 0, 0, 0, 0, 0, 0, 0, '2018-02-01 07:23:34', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_system`
--

CREATE TABLE `payment_system` (
  `payment_system_id` int(11) NOT NULL COMMENT 'ลำดับของระบบการจ่ายเงิน',
  `paper_detail_id` int(11) NOT NULL COMMENT 'ลำดับของรายละเอียดงานวิจัย',
  `payment_sytem_slip_realname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อจริงของไฟล์สลิป',
  `payment_system_showslip_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อที่ใช้แสดงสลิปในระบบ',
  `payment_system_hash_file` varchar(42) CHARACTER SET utf8 NOT NULL,
  `payment_system_file_type` varchar(5) CHARACTER SET utf8 NOT NULL,
  `payment_system_file_dir` varchar(7) CHARACTER SET utf8 NOT NULL,
  `payment_system_edit` datetime NOT NULL COMMENT 'วันที่แก้ไข',
  `payment_system_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่อัพโหลด',
  `payment_system_ip` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ip ที่ใช้อัพโหลด',
  `payment_system_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะของ สลิป',
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้ใช้',
  `payment_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ระบบการอัปโหลดสลิปจ่ายเงินลงทะเบียนงานวิจัย';

--
-- Dumping data for table `payment_system`
--

INSERT INTO `payment_system` (`payment_system_id`, `paper_detail_id`, `payment_sytem_slip_realname`, `payment_system_showslip_filename`, `payment_system_hash_file`, `payment_system_file_type`, `payment_system_file_dir`, `payment_system_edit`, `payment_system_date`, `payment_system_ip`, `payment_system_status`, `user_id`, `payment_flg`) VALUES
(1, 1, 'NCTED-07-10-0001-001_(2).jpg', 'SLP_20170222025856', 'bc1969e366d20c737aeada23fd2235ed645002a9_p', '.jpg', '2017_02', '0000-00-00 00:00:00', '2017-02-22 13:58:56', '192.168.33.1', 'กำลังตรวจสอบ', 154, 1),
(2, 1, 'SLP_20170222025856_(2).jpg', 'SLP_20170222021945', '050f7673fa5236f97d8cfae46ef824be75988584_p', '.jpg', '2017_02', '0000-00-00 00:00:00', '2017-02-22 17:19:45', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(3, 3, '16999091_664182530428261_5522816682567480249_n.jpg', 'SLP_20170305031446', '65ecebb81b12e7448df887c166672b7ea6850a20_p', '.jpg', '2017_03', '0000-00-00 00:00:00', '2017-03-05 12:14:46', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(4, 5, '17935469-View-of-Bogliasco-Bogliasco-is-a-ancient-fishing-village-in-Italy-Stock-Photo.jpg', 'SLP_20170816080457', '1db640e63c77be42f09ba305830b66740c710626_p', '.jpg', '2017_08', '0000-00-00 00:00:00', '2017-08-16 07:04:57', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(5, 7, '20841152_1122226544588936_8667466459217687357_n.jpg', 'SLP_20170821080725', '39fe1ef46d527bdfda93a5ed7e34c50a632bc880_p', '.jpg', '2017_08', '0000-00-00 00:00:00', '2017-08-21 05:07:26', '192.168.33.1', 'ไม่สามารถตรวจสอบได้', 154, 1),
(6, 5, 'SLP_20170816080457.jpg', 'SLP_20170821082937', 'bf4e9db1b71180befef2c6707f29ee4fa8115a3a_p', '.jpg', '2017_08', '0000-00-00 00:00:00', '2017-08-21 05:29:37', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(7, 5, 'SLP_20170821080725.jpg', 'SLP_20170821080540', 'caa872a3fcb8bb4ef02c93bba6996db1d110aa75_p', '.jpg', '2017_08', '0000-00-00 00:00:00', '2017-08-21 06:05:40', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(8, 8, '20786129_1775206569164009_8131608323678186882_o.jpg', 'SLP_20170822082516', '42e88eaaada3d233d2e83a6e37e821c3a7c635f0_p', '.jpg', '2017_08', '0000-00-00 00:00:00', '2017-08-22 10:25:16', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(9, 19, '16997824_1832540107019827_2127612233030027966_n.jpg', 'SLP_20171022105409', '6000938eec7deb748503eee45958812e3fcf2620_p', '.jpg', '2017_10', '0000-00-00 00:00:00', '2017-10-22 19:54:09', '::1', 'ไม่สามารถตรวจสอบได้', 147, 1),
(10, 19, '31-7-2560_2-15-58.jpg', 'SLP_20171022100454', 'de94520009077f40624278be133c51fa43d2383d_p', '.jpg', '2017_10', '0000-00-00 00:00:00', '2017-10-22 20:04:53', '::1', 'กำลังตรวจสอบ', 147, 1),
(11, 19, '31-7-2560_2-15-58.jpg', 'SLP_20171022101352', '09fa2fce78bd5fae416b2e0395222ffcbe2343b2_p', '.jpg', '2017_10', '0000-00-00 00:00:00', '2017-10-22 20:13:52', '::1', 'ชำระเงินเรียบร้อยแล้ว', 147, 1),
(12, 20, '20232058_1700056170301615_5805386880435390241_o.jpg', 'SLP_20171030102453', 'a1381627cd996af1cdcf520b55be8f80f7124dac_p', '.jpg', '2017_10', '0000-00-00 00:00:00', '2017-10-30 10:24:53', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(13, 21, '3.1_.2_.pdf', 'SLP_20171030105849', '0b4575530871326132b40f4c79931eb1811c0a5e_p', '.pdf', '2017_10', '0000-00-00 00:00:00', '2017-10-30 16:58:49', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(14, 23, '3.1_.2_.pdf', 'SLP_20171030103403', '60f5948bf0ac47121806490ac9fc9a39af75b366_p', '.pdf', '2017_10', '0000-00-00 00:00:00', '2017-10-30 18:34:03', '192.168.33.1', 'ชำระเงินเรียบร้อยแล้ว', 154, 1),
(15, 24, 'kmut4.jpg', 'SLP_20171103113435', '453c2885cb5dcd0840aac97156540ed85501e438_p', '.jpg', '2017_11', '0000-00-00 00:00:00', '2017-11-03 21:34:35', '::1', 'ชำระเงินเรียบร้อยแล้ว', 147, 1),
(16, 24, 'kmut4.jpg', 'SLP_20171103114924', '05ae3644bad171d09cb01507306014ae73897fff_p', '.jpg', '2017_11', '0000-00-00 00:00:00', '2017-11-03 21:49:24', '::1', 'ชำระเงินเรียบร้อยแล้ว', 147, 1),
(17, 25, '4-11-2560_1-33-46.jpg', 'SLP_20171104110747', 'cd7ac9cbe7868339ab6671cdc158d6e412b740e4_p', '.jpg', '2017_11', '0000-00-00 00:00:00', '2017-11-04 06:07:47', '::1', 'ชำระเงินเรียบร้อยแล้ว', 147, 1),
(18, 27, '7696A3FB-E9F7-48AB-B694-5AD58DED82E3.jpg', 'SLP_20180130014832', '5b8e83611c6498efbbf9a3df4e46b51a881d74b9_p', '.jpg', '2018_01', '0000-00-00 00:00:00', '2018-01-30 08:48:37', '::1', 'ไม่สามารถตรวจสอบได้', 147, 1),
(19, 27, 'S__107225097.jpg', 'SLP_20180130015231', '16e5dfcbf6add5313328b83739a02b1cdcc12ca4_p', '.jpg', '2018_01', '0000-00-00 00:00:00', '2018-01-30 08:52:36', '::1', 'ชำระเงินเรียบร้อยแล้ว', 147, 1),
(20, 28, '7696A3FB-E9F7-48AB-B694-5AD58DED82E3.jpg', 'SLP_20180201023427', '33ac592040aba53835a56ba7ee9d57f1bb311b17_p', '.jpg', '2018_02', '0000-00-00 00:00:00', '2018-02-01 07:34:33', '::1', 'ไม่สามารถตรวจสอบได้', 147, 1),
(21, 28, 'S__107225097.jpg', 'SLP_20180201024833', 'ffb51cf27337376af6693eb41526cd0674f9be5b_p', '.jpg', '2018_02', '0000-00-00 00:00:00', '2018-02-01 07:48:39', '::1', 'ชำระเงินเรียบร้อยแล้ว', 147, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_system_hash`
--

CREATE TABLE `payment_system_hash` (
  `payment_system_hash_id` int(11) NOT NULL,
  `payment_system_id` int(11) NOT NULL,
  `payment_system_hash_str` varchar(42) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เก็บ hash ไว้อ้างอิงไฟล์ของ payment';

--
-- Dumping data for table `payment_system_hash`
--

INSERT INTO `payment_system_hash` (`payment_system_hash_id`, `payment_system_id`, `payment_system_hash_str`, `flag`) VALUES
(1, 1, 'bf69b753ede08ef19bb9772d036098d68abfbe4e', 0),
(2, 2, 'ec29ba28be6a756aa80c5d983b94b91abbd68e63', 0),
(3, 3, 'dfd4aea9cb2fafe88057b744205b3e5d820f9045', 0),
(4, 4, '0f80fb021c4e69be0a9c68b1898977bb48033377', 0),
(5, 5, '8d4991c413b24ef109c770b538e12f6dd31aecdc', 0),
(6, 6, 'e0605f5d36ff6dbde6adc7044b56bd5831addf16', 0),
(7, 7, '987bce2bd7925209c53202eb699f95f1d23b28f8', 0),
(8, 8, 'd48d8289637568130ce253d3ca2c70d62538f32f', 0),
(9, 9, 'bdb929aac05be71edfb78e6c725e097c743edda8', 0),
(10, 10, 'e647f0be745cf4b8b4a1a31dd6815304466a8898', 0),
(11, 11, 'c66cdffb407c8c8a138cb2e5c4dcf5d37eceb671', 0),
(12, 12, '3f6e09a471cf5266d2fac955567abd7502d6c935', 0),
(13, 13, '22ec6e895057e64963c898d2c6cb658672123492', 0),
(14, 14, '5f04d8b33e9237f0b21bb27b42e5d3c712ceb241', 0),
(15, 15, '99e643ba56f528bcdeb05009413fca04867fddd8', 0),
(16, 16, 'fbd555c5bb9c10edc1040dc3cf224df9261d7028', 0),
(17, 17, '75bc6259b1d71d462860aa751a687375b33d2bc8', 0),
(18, 18, '4e01dcf2cca883e4907b1a8001aa083c4574f7c5', 0),
(19, 19, 'a8d121bd45b6fb3f346b64af51cc3ca3c9d0a3c1', 0),
(20, 20, 'a3530b7c22c924b5b07b6303d7a293d98f952eda', 0),
(21, 21, 'a66c2911403d691e76447a87c565dcec5de205c1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`) VALUES
(1, 'Airi', 'Satou', 'female', 'Tokyo', '1964-03-04'),
(2, 'Garrett', 'Winters', 'male', 'Tokyo', '1988-09-02'),
(3, 'John', 'Doe', 'male', 'Kansasssss', '1972-11-02'),
(4, 'Tatyana', 'Fitzpatrick', 'male', 'London', '1989-01-01'),
(5, 'Quinnffff', 'Flynn', 'male', 'Edinburgh', '1977-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `program_date`
--

CREATE TABLE `program_date` (
  `program_date_id` int(255) NOT NULL,
  `program_date_day` date NOT NULL,
  `program_date_name` text NOT NULL,
  `program_date_time_start` time NOT NULL,
  `program_date_time_end` time NOT NULL,
  `program_date_conferences` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_date`
--

INSERT INTO `program_date` (`program_date_id`, `program_date_day`, `program_date_name`, `program_date_time_start`, `program_date_time_end`, `program_date_conferences`) VALUES
(1, '2015-12-26', 'ลงทะเบียนรับเอกสาร ณ หอประชุมเบญจรัตน์, อาคารนวมินทรราชินี', '08:00:00', '09:00:00', 1),
(2, '2015-12-26', 'พิธีเปิดการประชุมวิชาการฯ ณ หอประชุมเบญจรัตน์, อาคารนวมินทรราชินี<br/>\r\n- กล่าวรายงานโดย ผู้ช่วยศาสตราจารย์ ดร.พนาฤทธิ์ เศรษฐกุล คณบดีคณะครุศาสตร์อุตสาหกรรม มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ<br/>\r\n- กล่าวเปิดงานโดย ศาสตราจารย์ ดร.ธีรวุฒิ บุณยโสภณ อธิการบดี มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ', '08:00:00', '09:00:00', 1),
(6, '2015-12-26', 'อภิปรายกลุ่ม เรื่อง<br/>\r\n“บทบาทของครูฝึกในสถานประกอบการต่อการพัฒนาการศึกษา และอุตสากรรม ในประเทศไทยและอาเซียน<br/>(Roles of In-Company Trainer to Develop the Education and Industry in Thailand and ASEAN)” โดย<br/>\r\n- รศ.ดร.จีรเดช อู่สวัสดิ์<br/>\r\nประธานคณะกรรมการการศึกษา สภาหอการค้าไทย<br/>\r\n- ดร.นพดล ปิยะตระภูมิ<br/>\r\nผู้อำนวยการสำนักบริหารคุณวุฒิแห่งชาติ สถาบันคุณวุฒิวิชาชีพ (องค์การมหาชน)<br/>\r\n- ดร.สันติภาพ คำสะอาด<br/>\r\nผู้อำนวยการฝ่ายทรัพยากรมนุษย์ บริษัท บ๊อช ออโตโมทีฟ (ประเทศไทย) จำกัด และบริษัท โรเบิร์ด บ๊อช ออโตโมทีฟ เทคโนโลยี (ประเทศไทย) จำกัด<br/>\r\n- ผศ.ดร.พนาฤทธิ์ เศรษฐกุล<br/>\r\nคณบดีคณะครุศาสตร์อุตสาหกรรม มจพ. นายกสมาคมครุศาสตร์อุตสาหกรรมไทย และประธาน IEEE Education Chapter, Thailand Section<br/>\r\nดำเนินการอภิปราย โดย<br/>\r\n- คุณสุธีร์ เสียงหวาน', '10:00:00', '12:00:00', 1),
(7, '2015-12-26', '- พักรับประทานอาหารกลางวัน\r\nณ หอประชุมเบญจรัตน์ , อาคารนวมินทร์ )', '12:00:00', '13:00:00', 1),
(8, '2015-12-26', '- นำเสนอผลงานวิจัย แบ่งตามกลุ่มบทความ\r\n( ณ อาคาร 52 คณะครุศาสตร์อุตสาหกรรม )', '13:00:00', '14:20:00', 1),
(9, '2015-12-26', '- พักรับประทานอาหารว่างและเครื่องดื่ม', '14:20:00', '14:40:00', 1),
(10, '2015-12-26', '- นำเสนอผลงานวิจัย แบ่งตามกลุ่มบทความ (ต่อ)', '15:00:00', '17:00:00', 1),
(11, '2016-08-22', 'ยยย', '08:00:00', '10:30:00', 6),
(12, '2016-08-08', '่่่444', '07:30:00', '10:00:00', 6),
(13, '2017-09-12', 'ooo', '17:00:00', '21:30:00', 9),
(14, '2018-02-06', 'ประชุมที่หอประชุมกันอย่างพร้อมเพียง', '04:30:00', '07:00:00', 16);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(5) NOT NULL COMMENT 'รหัสแทนจังหวัด',
  `province_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อจังหวัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='จังหวัด';

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ   '),
(3, 'นนทบุรี   '),
(4, 'ปทุมธานี   '),
(5, 'พระนครศรีอยุธยา   '),
(6, 'อ่างทอง   '),
(7, 'ลพบุรี   '),
(8, 'สิงห์บุรี   '),
(9, 'ชัยนาท   '),
(10, 'สระบุรี'),
(11, 'ชลบุรี   '),
(12, 'ระยอง   '),
(13, 'จันทบุรี   '),
(14, 'ตราด   '),
(15, 'ฉะเชิงเทรา   '),
(16, 'ปราจีนบุรี   '),
(17, 'นครนายก   '),
(18, 'สระแก้ว   '),
(19, 'นครราชสีมา   '),
(20, 'บุรีรัมย์   '),
(21, 'สุรินทร์   '),
(22, 'ศรีสะเกษ   '),
(23, 'อุบลราชธานี   '),
(24, 'ยโสธร   '),
(25, 'ชัยภูมิ   '),
(26, 'อำนาจเจริญ   '),
(27, 'หนองบัวลำภู   '),
(28, 'ขอนแก่น   '),
(29, 'อุดรธานี   '),
(30, 'เลย   '),
(31, 'หนองคาย   '),
(32, 'มหาสารคาม   '),
(33, 'ร้อยเอ็ด   '),
(34, 'กาฬสินธุ์   '),
(35, 'สกลนคร   '),
(36, 'นครพนม   '),
(37, 'มุกดาหาร   '),
(38, 'เชียงใหม่   '),
(39, 'ลำพูน   '),
(40, 'ลำปาง   '),
(41, 'อุตรดิตถ์   '),
(42, 'แพร่   '),
(43, 'น่าน   '),
(44, 'พะเยา   '),
(45, 'เชียงราย   '),
(46, 'แม่ฮ่องสอน   '),
(47, 'นครสวรรค์   '),
(48, 'อุทัยธานี   '),
(49, 'กำแพงเพชร   '),
(50, 'ตาก   '),
(51, 'สุโขทัย   '),
(52, 'พิษณุโลก   '),
(53, 'พิจิตร   '),
(54, 'เพชรบูรณ์   '),
(55, 'ราชบุรี   '),
(56, 'กาญจนบุรี   '),
(57, 'สุพรรณบุรี   '),
(58, 'นครปฐม   '),
(59, 'สมุทรสาคร   '),
(60, 'สมุทรสงคราม   '),
(61, 'เพชรบุรี   '),
(62, 'ประจวบคีรีขันธ์   '),
(63, 'นครศรีธรรมราช   '),
(64, 'กระบี่   '),
(65, 'พังงา   '),
(66, 'ภูเก็ต   '),
(67, 'สุราษฎร์ธานี   '),
(68, 'ระนอง   '),
(69, 'ชุมพร   '),
(70, 'สงขลา   '),
(71, 'สตูล   '),
(72, 'ตรัง   '),
(73, 'พัทลุง   '),
(74, 'ปัตตานี   '),
(75, 'ยะลา   '),
(76, 'นราธิวาส   '),
(77, 'บึงกาฬ');

-- --------------------------------------------------------

--
-- Table structure for table `time_cycle_paper`
--

CREATE TABLE `time_cycle_paper` (
  `time_cycle_paper_id` int(255) NOT NULL,
  `time_cycle_paper_name` text NOT NULL,
  `time_cycle_paper_date_start` date NOT NULL,
  `time_cycle_paper_date_end` date NOT NULL,
  `time_cycle_paper_status` varchar(100) NOT NULL DEFAULT 'YES',
  `time_cycle_conferences` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_cycle_paper`
--

INSERT INTO `time_cycle_paper` (`time_cycle_paper_id`, `time_cycle_paper_name`, `time_cycle_paper_date_start`, `time_cycle_paper_date_end`, `time_cycle_paper_status`, `time_cycle_conferences`) VALUES
(1, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 1),
(2, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 1),
(3, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 1),
(4, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 1),
(5, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 2),
(6, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 2),
(7, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 2),
(8, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 2),
(9, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 3),
(10, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 3),
(11, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 3),
(12, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 3),
(13, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 4),
(14, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 4),
(15, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 4),
(16, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 4),
(17, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 5),
(18, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 5),
(19, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 5),
(20, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 5),
(21, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 6),
(22, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 6),
(23, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 6),
(24, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 6),
(25, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 7),
(26, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 7),
(27, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 7),
(28, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 7),
(29, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 8),
(30, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 8),
(31, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 8),
(32, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 8),
(33, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 9),
(34, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 9),
(35, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 9),
(36, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 9),
(37, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 10),
(38, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 10),
(39, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 10),
(40, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 10),
(41, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 11),
(42, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 11),
(43, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 11),
(44, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 11),
(49, 'Regist สมัครสมาชิก', '2017-10-09', '2017-10-13', 'YES', 13),
(50, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2017-10-11', 'YES', 13),
(51, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-02', '2017-10-04', 'YES', 13),
(52, 'Payment การชำระค่าลงทะเบียน', '2017-10-10', '2017-10-11', 'YES', 13),
(61, 'Regist สมัครสมาชิก', '2017-10-19', '2017-10-19', 'YES', 14),
(62, 'วันเปิดรับผลงานวิจัย', '2017-10-19', '2017-10-25', 'YES', 14),
(63, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-20', '2017-10-25', 'YES', 14),
(64, 'Payment การชำระค่าลงทะเบียน', '2017-10-20', '2017-10-25', 'YES', 14),
(65, 'Regist สมัครสมาชิก', '2017-10-12', '2017-10-12', 'YES', 15),
(66, 'วันเปิดรับผลงานวิจัย', '2017-10-12', '2017-10-12', 'YES', 15),
(67, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-12', '2017-10-12', 'YES', 15),
(68, 'Payment การชำระค่าลงทะเบียน', '2017-10-12', '2017-10-12', 'YES', 15),
(69, 'Regist สมัครสมาชิก', '2017-10-23', '2018-11-23', 'YES', 16),
(70, 'วันเปิดรับผลงานวิจัย', '2017-10-01', '2018-12-12', 'YES', 16),
(71, 'แจ้งผลการพิจารณาผลงานวิจัย', '2017-10-12', '2018-12-12', 'YES', 16),
(72, 'Payment การชำระค่าลงทะเบียน', '2017-10-12', '2018-12-12', 'YES', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(7) NOT NULL COMMENT 'รหัสประจำตัวผู้ใช้งาน',
  `username` varchar(200) NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `password` varchar(200) NOT NULL COMMENT 'รหัสผ่านเข้าระบบ',
  `email` varchar(200) NOT NULL COMMENT 'email ผู้ใช้งาน',
  `user_type` int(1) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `active_status` varchar(2) NOT NULL,
  `user_bad` int(11) NOT NULL DEFAULT '0' COMMENT 'ระงับใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บผู้ใช้';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `user_type`, `hash`, `active_status`, `user_bad`) VALUES
(2, 'admin', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'millman411412@gmail.com', 1, '', '', 0),
(147, 'chaiyakul1', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'chaiyakul.mill@gmail.com', 0, 'e2c420d928d4bf8ce0ff2ec19b371514', '1', 0),
(150, 'chaiyakul2', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'mill.moon013@gmail.com', 0, '9778d5d219c5080b9a6a17bef029331c', '1', 0),
(151, 'admin2', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 's5502041620133@email.kmutnb.ac.th', 1, '', '', 0),
(152, 're1', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 's5502041620036@email.kmutnb.ac.th', 2, '', '', 0),
(153, 're2', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'muk2dog@gmail.com', 2, '', '', 0),
(154, 'kong1', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'kong555.01@gmail.comm', 0, '08b255a5d42b89b0585260b6f2360bdd', '1', 0),
(155, 'charunllllสสส', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'charun.s@fte.kkkkmutnb.ac.th', 0, '1aa48fc4880bb0c9b8a3bf979d3b917e', '1', 0),
(156, 'millmamaf', 'faea741ae3850213113c1a1d173a8a4d59b30d92770b0b68e6028ff7b91bb24116e6abcbc5fd3ff3dd0dec228cee079335ed24430bee020a76c206117a834a25', 'millmanaaaaaoodwo@gmail.com', 0, '1be3bc32e6564055d5ca3e5a354acbef', '', 0),
(157, 're3', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'email@email.com', 2, '', '', 0),
(158, 're4', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'asda@email.com', 2, '', '', 0),
(159, 're5', '80e65daf158cd3f7672e33bdd4468e8a83aea5a5e7c89cfde6473321d05a443f08896290c520ebb99988d1b2903a13e7c4e196b70cf04baa260c881718f61357', 'zxc@email.com', 2, '', '', 0),
(171, 'sdasdad335', '2832fe2de49e6dbfeb3e3a2e7e3bde6a1cebad2955341deb05bcf7b6cc4dfa46aa46e7df370637b8d21d9f442ba2f0585c7294039d7053a5c6f08e0d081782b5', 'azzc@dfdfd.com', 0, '0f28b5d49b3020afeecd95b4009adf4c', '', 0),
(172, 'sxcvxcvภาษาไท', 'c35daf02fe116c1c978aac3316d4f047f3d0d4610923c5cd1769a51f527320ad9df2615164305fea6d41bf8e22023a6e537d248aa3f920fce931b542a954a9d5', 'xczxc@zsfxf.com', 0, 'ccb0989662211f61edae2e26d58ea92f', '', 0),
(173, 'korkai', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'test@testddd.lo', 0, 'd296c101daa88a51f6ca8cfc1ac79b50', '', 0),
(174, 'adasdasd', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', '1234@asdasd.conn', 0, '2291d2ec3b3048d1a6f86c2c4591b7e0', '1', 0),
(175, 'asdas66666', '525aa53cfc7ff502a4ada8f35326bcfe101749af22d5da1365a2003aa4eaadf26cc31eb647feb564e9c8de187d5042de48d39e82b9409a6a694137cde5ec3538', '12345@asdasd.con', 0, 'a532400ed62e772b9dc0b86f46e583ff', '1', 0),
(176, 'lolgggbbb', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'lllll@dddd.com', 0, 'e49b8b4053df9505e1f48c3a701c0682', '', 0),
(177, '888888', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'dddd@dd.com', 0, 'b706835de79a2b4e80506f582af3676a', '', 0),
(178, '88889988', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'dd99dd@dd.com', 0, '2f885d0fbe2e131bfc9d98363e55d1d4', '1', 0),
(179, 'tghyujk', 'f8093846a482dae2041980c5b8356f27e161ca61d33d3fa96e154da6ee3910adb54760a8e7c67f3be8d546239f9931e7fccfb230611725f636276eb27f6fa59a', 'asdasd@sss.ccc', 0, '903ce9225fca3e988c2af215d4e544d3', '1', 0),
(180, 'example1', 'd447d7b0166fb5a6824fc32a126861d27b76d89199a179bc54ef9912890e3d40bc3dee44193f5d90cf9c3f79d419ef157bf823c71039cac279dd791a090710fd', 'kong555.01@gmail.com', 0, '01161aaa0b6d1345dd8fe4e481144d84', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_detail_id` int(11) NOT NULL COMMENT 'หมายเลขคณะกรรมการ',
  `user_detail_fname` varchar(128) NOT NULL COMMENT 'ชื่อ',
  `user_detail_address` varchar(300) NOT NULL DEFAULT '1518' COMMENT 'ที่อยู่',
  `user_detail_district` varchar(50) NOT NULL DEFAULT 'วงศ์สว่าง' COMMENT 'ตำบล/แขวง',
  `user_detail_county` varchar(50) NOT NULL DEFAULT 'บางซื่อ' COMMENT 'เขต/อำเภอ',
  `user_detail_road` varchar(50) NOT NULL DEFAULT 'ถนนประชาราษฎร์ 1' COMMENT 'ถนน',
  `user_detail_building` varchar(30) DEFAULT '-' COMMENT 'อาคาร',
  `user_detail_floor` varchar(10) DEFAULT '-' COMMENT 'ชั้น',
  `user_detail_province` varchar(50) DEFAULT 'กรุงเทพมหานคร' COMMENT 'จังหวัด',
  `user_detail_zip` varchar(10) DEFAULT '10800' COMMENT 'รหัสไปรษณีย์',
  `user_detail_tel` varchar(16) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_detail_fax` varchar(16) NOT NULL DEFAULT '-' COMMENT 'โทรสาร',
  `user_detail_type_id` int(11) NOT NULL COMMENT 'เลขประจำตัวฝ่าย',
  `user_detail_type` varchar(100) NOT NULL DEFAULT '-' COMMENT 'อีเมล์บริษัท',
  `user_detail_pic` varchar(200) NOT NULL COMMENT 'รูปคณะกรรมการ',
  `user_id` int(7) NOT NULL COMMENT 'รหัสประจำตัวผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='คณะกรรมการ';

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_detail_id`, `user_detail_fname`, `user_detail_address`, `user_detail_district`, `user_detail_county`, `user_detail_road`, `user_detail_building`, `user_detail_floor`, `user_detail_province`, `user_detail_zip`, `user_detail_tel`, `user_detail_fax`, `user_detail_type_id`, `user_detail_type`, `user_detail_pic`, `user_id`) VALUES
(2, '-ddd', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '-', '', 0, '-', 'webcam-toy-photo11.jpg', 70),
(19, 'ชัยกุล กาญจนโภคิน', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '0876824665', '-', 0, '-', '', 140),
(22, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 143),
(23, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 144),
(24, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 145),
(25, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 146),
(26, 'ทดสอบส่ง', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์1', '-', '-', 'กรุงเทพมหานคร', '10800', '0876824665', '-', 0, '-', '', 147),
(27, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 148),
(28, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 149),
(29, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 150),
(30, 'พันธกิจ คำภา', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '0901059185', '-', 0, '-', 'IMG_20160724_1455231.jpg', 154),
(31, 'ทดสอบ', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '0876824665', '-', 0, '-', '', 155),
(32, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 156),
(33, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 161),
(34, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 162),
(35, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 163),
(36, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 164),
(37, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 165),
(38, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 166),
(39, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 167),
(40, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 168),
(41, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 169),
(42, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 170),
(43, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 171),
(44, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 172),
(45, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 173),
(46, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 174),
(47, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 175),
(48, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 176),
(49, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 177),
(50, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 178),
(51, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 179),
(52, '', '1518', 'วงศ์สว่าง', 'บางซื่อ', 'ถนนประชาราษฎร์ 1', '-', '-', 'กรุงเทพมหานคร', '10800', '', '-', 0, '-', '', 180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commeettee`
--
ALTER TABLE `commeettee`
  ADD PRIMARY KEY (`commeettee_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `commeettee_type`
--
ALTER TABLE `commeettee_type`
  ADD PRIMARY KEY (`commeettee_type_id`);

--
-- Indexes for table `conferences_select_on`
--
ALTER TABLE `conferences_select_on`
  ADD PRIMARY KEY (`conferences_select_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `downloadpaper_file`
--
ALTER TABLE `downloadpaper_file`
  ADD PRIMARY KEY (`downloadpaper_file_id`);

--
-- Indexes for table `email_system`
--
ALTER TABLE `email_system`
  ADD PRIMARY KEY (`email_system_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`);

--
-- Indexes for table `file_announce`
--
ALTER TABLE `file_announce`
  ADD PRIMARY KEY (`file_announce_id`);

--
-- Indexes for table `file_manual`
--
ALTER TABLE `file_manual`
  ADD PRIMARY KEY (`file_manual_id`);

--
-- Indexes for table `file_schedule`
--
ALTER TABLE `file_schedule`
  ADD PRIMARY KEY (`file_schedule_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`header_id`);

--
-- Indexes for table `index_paper_file`
--
ALTER TABLE `index_paper_file`
  ADD PRIMARY KEY (`index_paper_file_id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`log_user_id`);

--
-- Indexes for table `news_email_logs`
--
ALTER TABLE `news_email_logs`
  ADD PRIMARY KEY (`news_email_logs_id`);

--
-- Indexes for table `news_email_logs_hash`
--
ALTER TABLE `news_email_logs_hash`
  ADD PRIMARY KEY (`news_email_logs_hash_id`);

--
-- Indexes for table `news_public`
--
ALTER TABLE `news_public`
  ADD PRIMARY KEY (`news_public_id`);

--
-- Indexes for table `paper_commeetee`
--
ALTER TABLE `paper_commeetee`
  ADD PRIMARY KEY (`paper_commeetee_id`);

--
-- Indexes for table `paper_comment`
--
ALTER TABLE `paper_comment`
  ADD PRIMARY KEY (`paper_comment_id`);

--
-- Indexes for table `paper_detail`
--
ALTER TABLE `paper_detail`
  ADD PRIMARY KEY (`paper_detail_id`);

--
-- Indexes for table `paper_detail_owner`
--
ALTER TABLE `paper_detail_owner`
  ADD PRIMARY KEY (`paper_detail_owner_id`);

--
-- Indexes for table `paper_detail_status`
--
ALTER TABLE `paper_detail_status`
  ADD PRIMARY KEY (`paper_detail_status_id`);

--
-- Indexes for table `paper_file`
--
ALTER TABLE `paper_file`
  ADD PRIMARY KEY (`paper_file_id`);

--
-- Indexes for table `paper_file_evaluation_comment`
--
ALTER TABLE `paper_file_evaluation_comment`
  ADD PRIMARY KEY (`paper_file_evaluation_comment_id`);

--
-- Indexes for table `paper_file_eval_hash`
--
ALTER TABLE `paper_file_eval_hash`
  ADD PRIMARY KEY (`paper_file_eval_hash_id`);

--
-- Indexes for table `paper_file_hash`
--
ALTER TABLE `paper_file_hash`
  ADD PRIMARY KEY (`paper_file_hash_id`);

--
-- Indexes for table `paper_file_index_hash`
--
ALTER TABLE `paper_file_index_hash`
  ADD PRIMARY KEY (`paper_file_index_hash_id`);

--
-- Indexes for table `paper_numbering`
--
ALTER TABLE `paper_numbering`
  ADD PRIMARY KEY (`paper_numbering_id`);

--
-- Indexes for table `paper_reviewer`
--
ALTER TABLE `paper_reviewer`
  ADD PRIMARY KEY (`paper_reviewer_id`);

--
-- Indexes for table `payment_system`
--
ALTER TABLE `payment_system`
  ADD PRIMARY KEY (`payment_system_id`);

--
-- Indexes for table `payment_system_hash`
--
ALTER TABLE `payment_system_hash`
  ADD PRIMARY KEY (`payment_system_hash_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_date`
--
ALTER TABLE `program_date`
  ADD PRIMARY KEY (`program_date_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `time_cycle_paper`
--
ALTER TABLE `time_cycle_paper`
  ADD PRIMARY KEY (`time_cycle_paper_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_detail_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commeettee`
--
ALTER TABLE `commeettee`
  MODIFY `commeettee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลขคณะกรรมการ', AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `commeettee_type`
--
ALTER TABLE `commeettee_type`
  MODIFY `commeettee_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `conferences_select_on`
--
ALTER TABLE `conferences_select_on`
  MODIFY `conferences_select_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `downloadpaper_file`
--
ALTER TABLE `downloadpaper_file`
  MODIFY `downloadpaper_file_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `file_announce`
--
ALTER TABLE `file_announce`
  MODIFY `file_announce_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `file_schedule`
--
ALTER TABLE `file_schedule`
  MODIFY `file_schedule_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `footer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `header_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `index_paper_file`
--
ALTER TABLE `index_paper_file`
  MODIFY `index_paper_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `log_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;
--
-- AUTO_INCREMENT for table `news_email_logs`
--
ALTER TABLE `news_email_logs`
  MODIFY `news_email_logs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `news_email_logs_hash`
--
ALTER TABLE `news_email_logs_hash`
  MODIFY `news_email_logs_hash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news_public`
--
ALTER TABLE `news_public`
  MODIFY `news_public_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `paper_detail`
--
ALTER TABLE `paper_detail`
  MODIFY `paper_detail_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับของบทความ', AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `paper_detail_owner`
--
ALTER TABLE `paper_detail_owner`
  MODIFY `paper_detail_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `paper_file`
--
ALTER TABLE `paper_file`
  MODIFY `paper_file_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `paper_file_evaluation_comment`
--
ALTER TABLE `paper_file_evaluation_comment`
  MODIFY `paper_file_evaluation_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `paper_file_eval_hash`
--
ALTER TABLE `paper_file_eval_hash`
  MODIFY `paper_file_eval_hash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `paper_file_hash`
--
ALTER TABLE `paper_file_hash`
  MODIFY `paper_file_hash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `paper_file_index_hash`
--
ALTER TABLE `paper_file_index_hash`
  MODIFY `paper_file_index_hash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `paper_numbering`
--
ALTER TABLE `paper_numbering`
  MODIFY `paper_numbering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `paper_reviewer`
--
ALTER TABLE `paper_reviewer`
  MODIFY `paper_reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payment_system`
--
ALTER TABLE `payment_system`
  MODIFY `payment_system_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับของระบบการจ่ายเงิน', AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `payment_system_hash`
--
ALTER TABLE `payment_system_hash`
  MODIFY `payment_system_hash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `program_date`
--
ALTER TABLE `program_date`
  MODIFY `program_date_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแทนจังหวัด', AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `time_cycle_paper`
--
ALTER TABLE `time_cycle_paper`
  MODIFY `time_cycle_paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประจำตัวผู้ใช้งาน', AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลขคณะกรรมการ', AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
