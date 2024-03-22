-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 05:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umudugudu`
--

-- --------------------------------------------------------

--
-- Table structure for table `abitabye_imana`
--

CREATE TABLE `abitabye_imana` (
  `umuturage_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nid` varchar(16) DEFAULT NULL,
  `passport_id` varchar(255) DEFAULT NULL,
  `other_identification` varchar(255) DEFAULT NULL,
  `impamvu_atagifite` varchar(300) DEFAULT NULL,
  `dob` date NOT NULL,
  `date_of_death` date DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status_tura_kodesha` varchar(255) NOT NULL,
  `icyo_akora` varchar(255) NOT NULL,
  `isano` varchar(255) NOT NULL,
  `amashuri_yize` varchar(255) NOT NULL,
  `ibyiciro_id` int(255) DEFAULT NULL,
  `ubwisungane_id` int(255) DEFAULT NULL,
  `umuryango_id` int(255) NOT NULL,
  `inshingano_id` int(255) NOT NULL,
  `ubumuga_status` varchar(255) DEFAULT NULL,
  `ubumuga_details` varchar(255) DEFAULT NULL,
  `reg_datetime` datetime NOT NULL,
  `gufungwa_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `amafoto`
--

CREATE TABLE `amafoto` (
  `amafoto_id` int(255) NOT NULL,
  `amafoto_name` varchar(255) NOT NULL,
  `amafoto_description` varchar(255) NOT NULL,
  `igikorwa_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `andi_makuru_igikorwa`
--

CREATE TABLE `andi_makuru_igikorwa` (
  `andi_makuru_igikorwa` int(255) NOT NULL,
  `igikorwa_id` int(255) NOT NULL,
  `igikorwa_status` varchar(255) NOT NULL,
  `igikorwa_report` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `andi_makuru_igipangu`
--

CREATE TABLE `andi_makuru_igipangu` (
  `andi_makuru_igipangu_id` int(255) NOT NULL,
  `igipangu_id` int(255) NOT NULL,
  `akarima_k_igikoni` varchar(255) NOT NULL,
  `ikigega_cy_amazi` varchar(255) NOT NULL,
  `amazi` varchar(255) NOT NULL,
  `amashanyarazi` varchar(255) NOT NULL,
  `icyobo_cy_amazi` varchar(255) NOT NULL,
  `ubwiherero` varchar(255) NOT NULL,
  `pavuma` varchar(255) NOT NULL,
  `itara_ry_umutekano` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `andi_makuru_igipangu`
--

INSERT INTO `andi_makuru_igipangu` (`andi_makuru_igipangu_id`, `igipangu_id`, `akarima_k_igikoni`, `ikigega_cy_amazi`, `amazi`, `amashanyarazi`, `icyobo_cy_amazi`, `ubwiherero`, `pavuma`, `itara_ry_umutekano`) VALUES
(1, 12, 'Yego', 'Oya', 'Yego', 'Yego', 'Oya', 'medium', 'Oya', 'Yego'),
(2, 11, 'Oya', 'Oya', 'Yego', 'Yego', 'Oya', 'medium', 'Oya', 'Yego');

-- --------------------------------------------------------

--
-- Table structure for table `andi_makuru_umuryango`
--

CREATE TABLE `andi_makuru_umuryango` (
  `andi_makuru_id` int(255) NOT NULL,
  `umuryango_id` int(255) NOT NULL,
  `uko_babayeho` varchar(500) DEFAULT NULL,
  `kubana_n_amatungo` varchar(255) DEFAULT NULL,
  `ibicanwa` varchar(255) DEFAULT NULL,
  `supernet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ibyiciro`
--

CREATE TABLE `ibyiciro` (
  `ibyiciro_id` int(255) NOT NULL,
  `ibyiciro_name` varchar(255) NOT NULL,
  `ibyiciro_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ibyiciro`
--

INSERT INTO `ibyiciro` (`ibyiciro_id`, `ibyiciro_name`, `ibyiciro_details`) VALUES
(2, 'B', 'Icyiciro cya B kirimo ingo zinjiza amafaranga hagati y’ibihumbi 65-600 buri kwezi, cyangwa ubutaka guhera kuri hegitare imwe kugera kuri hegitare 10 mu cyaro, na metero kare 300 kugera kuri hegitare imwe mu mujyi.'),
(3, 'C', 'Icyiciro cya C kirimo ingo zinjiza buri kwezi amafaranga kuva ku bihumbi 45 kugera kuri 65,000, cyangwa izifite ubutaka kuva ku gice cya hegitare kugera kuri hegitare imwe mu cyaro, na metero kare 100 kugera kuri 300 mu mujyi.'),
(4, 'D', 'Icyiciro cya D kibarurirwamo urugo rwinjiza munsi y’amafaranga ibihumbi 45 ku kwezi, cyangwa ubutaka buri munsi ya 1/2 cya hegitare mu cyaro no munsi ya metero kare 100 mu mujyi.'),
(5, 'E', 'Icyiciro cya E kigizwe n’abadafite ahantu na hamwe bavana imibereho kandi bageze mu zabukuru, cyangwa abafite ubumuga, uburwayi bukomeye, abana b’impfubyi, ndetse n’urugo ruyobowe n’umuntu ukiri umunyeshuri.'),
(6, 'Ntacyo_Afite', '');

-- --------------------------------------------------------

--
-- Table structure for table `igikorwa`
--

CREATE TABLE `igikorwa` (
  `igikorwa_id` int(255) NOT NULL,
  `igikorwa_type` varchar(255) NOT NULL,
  `igikorwa_detail` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `uko_byagenze` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `igipangu`
--

CREATE TABLE `igipangu` (
  `igipangu_id` int(255) NOT NULL,
  `isibo_id` int(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `address_code` varchar(255) NOT NULL,
  `additional_details` varchar(255) DEFAULT NULL,
  `reg_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igipangu`
--

INSERT INTO `igipangu` (`igipangu_id`, `isibo_id`, `owner_name`, `address_code`, `additional_details`, `reg_datetime`) VALUES
(11, 15, 'MUKAREMERA Francoise', 'RWP/GCC/ubutwari/IGPG002', '', '2021-03-24 01:34:42'),
(12, 15, 'RUVUZANDEKWE Hamisi', 'RWP/GCC/ubutwari/IGPG001', '', '2021-03-24 01:35:16'),
(14, 15, 'MBARUBUKEYE Emmanuel', 'RWP/GCC/ubutwari/IGPG004', '', '2021-03-24 01:36:14'),
(15, 15, 'NTAMUGABUMWE Haruna', 'RWP/GCC/ubutwari/IGPG005', '', '2021-03-24 01:36:43'),
(16, 15, 'RUBIMBURA Nizar', 'RWP/GCC/ubutwari/IGPG006', '', '2021-03-24 01:37:06'),
(17, 15, 'MUSABWASONI Sofia', 'RWP/GCC/ubutwari/IGPG007', '', '2021-03-24 01:37:29'),
(18, 15, 'MASUMBUKO Christophe', 'RWP/GCC/ubutwari/IGPG008', '', '2021-03-24 01:39:07'),
(19, 15, 'UWAYO Egide', 'RWP/GCC/ubutwari/IGPG009', '', '2021-03-24 01:39:31'),
(20, 15, 'NYIRIMANA Bonavanture Hassan', 'RWP/GCC/ubutwari/IGPG010', '', '2021-03-24 01:40:15'),
(21, 15, 'MUKANYONGA Rose', 'RWP/GCC/ubutwari/IGPG011', '', '2021-03-24 01:40:39'),
(22, 15, 'NAKABONYE Donatha', 'RWP/GCC/ubutwari/IGPG012', '', '2021-03-24 01:41:12'),
(23, 16, 'MUTABARUKA Yousufu', 'RWP/GCC/icyerekezo/IGPG001', '', '2021-03-24 01:53:20'),
(24, 16, 'NTABYERA Djuma', 'RWP/GCC/icyerekezo/IGPG002', '', '2021-03-24 01:54:02'),
(25, 16, 'ROMAMI Marcel', 'RWP/GCC/icyerekezo/IGPG003', '', '2021-03-24 01:58:09'),
(26, 16, 'BIZIMANA Abdala', 'RWP/GCC/icyerekezo/IGPG004', '', '2021-03-24 01:59:23'),
(27, 16, 'RWANYAGAHUTU David', 'RWP/GCC/icyerekezo/IGPG005', '', '2021-03-24 01:59:53'),
(28, 16, 'HABINEZA Thomas', 'RWP/GCC/icyerekezo/IGPG006', '', '2021-03-24 02:00:16'),
(29, 16, 'BIGIRABAGABO Abubakar', 'RWP/GCC/icyerekezo/IGPG007', '', '2021-03-24 02:00:53'),
(30, 16, 'INZU ZAKAGARI', 'RWP/GCC/icyerekezo/IGPG008', '', '2021-03-24 02:01:40'),
(31, 16, 'BURANGA Celestine', 'RWP/GCC/icyerekezo/IGPG009', '', '2021-03-24 02:02:07'),
(32, 16, 'ABIMANA Afisa', 'RWP/GCC/icyerekezo/IGPG010', '', '2021-03-24 02:02:45'),
(33, 16, 'NZIGIRA Francois', 'RWP/GCC/icyerekezo/IGPG011', '', '2021-03-24 02:03:11'),
(34, 16, 'NDUWAMUNGU Stamirli', 'RWP/GCC/icyerekezo/IGPG012', '', '2021-03-24 02:04:22'),
(35, 16, 'MUREKEZI Abasi', 'RWP/GCC/icyerekezo/IGPG013', '', '2021-03-24 02:04:42'),
(36, 16, 'NYIRAKURAMA Rangwida', 'RWP/GCC/icyerekezo/IGPG014', '', '2021-03-24 02:05:08'),
(37, 17, 'UWERA Afisa', 'RWP/GCC/ubwitange/IGPG001', '', '2021-03-24 20:45:38'),
(38, 17, 'SINDAYIGAYA Philippo', 'RWP/GCC/ubwitange/IGPG002', '', '2021-03-24 20:46:38'),
(39, 17, 'TESIRE Aisha', 'RWP/GCC/ubwitange/IGPG003', '', '2021-03-24 20:47:35'),
(40, 17, 'NTAMBARA Vincent', 'RWP/GCC/ubwitange/IGPG004', '', '2021-03-24 20:48:11'),
(41, 17, 'MUKAMUNANA', 'RWP/GCC/ubwitange/IGPG005', '', '2021-03-24 20:48:42'),
(42, 17, 'UMUTESI Harima', 'RWP/GCC/ubwitange/IGPG006', '', '2021-03-24 20:49:58'),
(43, 17, 'SEBERA Ibrahimu', 'RWP/GCC/ubwitange/IGPG007', '', '2021-03-24 20:50:31'),
(44, 17, 'NYIRANDUNGU Mariya', 'RWP/GCC/ubwitange/IGPG008', '', '2021-03-24 20:51:15'),
(45, 17, 'KAVAMAHANGA FRED', 'RWP/GCC/ubwitange/IGPG009', '', '2021-03-24 20:51:46'),
(46, 17, 'RWAMUCYO Asuman', 'RWP/GCC/ubwitange/IGPG010', '', '2021-03-24 20:53:59'),
(47, 17, 'MUNGARURIRE Aloys', 'RWP/GCC/ubwitange/IGPG011', '', '2021-03-24 20:54:28'),
(48, 17, 'MUKAGIHANA Oliver', 'RWP/GCC/ubwitange/IGPG012', '', '2021-03-24 20:57:48'),
(49, 17, 'MUKANDORI M. Goreth', 'RWP/GCC/ubwitange/IGPG013', '', '2021-03-24 20:58:24'),
(50, 17, 'TASSIEN Adam', 'RWP/GCC/ubwitange/IGPG014', '', '2021-03-24 20:59:03'),
(51, 17, 'AMANI', 'RWP/GCC/ubwitange/IGPG015', '', '2021-03-24 20:59:23'),
(52, 18, 'MUTAMURIZA Natalie', 'RWP/GCC/gukundaigihugu/IGPG001', '', '2021-03-24 21:00:29'),
(53, 18, 'UWANYIRIGIRA Virginie', 'RWP/GCC/gukundaigihugu/IGPG002', '', '2021-03-24 21:00:57'),
(54, 18, 'MUKUNDABANTU Yahya', 'RWP/GCC/gukundaigihugu/IGPG003', '', '2021-03-24 21:01:41'),
(55, 18, 'MPAKANIYE Idi', 'RWP/GCC/gukundaigihugu/IGPG004', '', '2021-03-24 21:02:03'),
(56, 18, 'KANYWA Rashid', 'RWP/GCC/gukundaigihugu/IGPG005', '', '2021-03-24 21:02:44'),
(57, 18, 'MUKARUGWIZA Josephine', 'RWP/GCC/gukundaigihugu/IGPG006', '', '2021-03-24 21:03:15'),
(58, 18, 'BASHIRU Abdu', 'RWP/GCC/gukundaigihugu/IGPG007', '', '2021-03-24 21:03:48'),
(59, 18, 'NYIRAHABINEZA Marie', 'RWP/GCC/gukundaigihugu/IGPG008', '', '2021-03-24 21:10:33'),
(60, 18, 'NZEYIMANA Radjabu', 'RWP/GCC/gukundaigihugu/IGPG009', '', '2021-03-24 21:11:34'),
(61, 18, 'RUTAREMARA Tharcisse', 'RWP/GCC/gukundaigihugu/IGPG010', '', '2021-03-24 21:12:43'),
(62, 18, 'RUTAREMARA Tharcisse', 'RWP/GCC/gukundaigihugu/IGPG011', 'Aho RUTAREMARA Tharcisse akodeshwa inzu', '2021-03-24 21:14:43'),
(63, 18, 'NYIRABASARE Dancila', 'RWP/GCC/gukundaigihugu/IGPG012', '', '2021-03-24 21:15:11'),
(64, 18, 'MUKAKIMENYI Aisha', 'RWP/GCC/gukundaigihugu/IGPG013', '', '2021-03-24 21:15:33'),
(65, 18, 'NKURIKIYABATWARE Jean Bosco', 'RWP/GCC/gukundaigihugu/IGPG014', '', '2021-03-24 21:16:59'),
(66, 18, 'NTAWUBYIRINDA Domitila', 'RWP/GCC/gukundaigihugu/IGPG015', '', '2021-03-24 21:17:34'),
(67, 21, 'NSENGIYUMVA Zaburoni', 'RWP/GCC/ubunyangamugayo/IGPG001', '', '2021-03-24 21:19:08'),
(68, 21, 'RWANYAGAHUTU David', 'RWP/GCC/ubunyangamugayo/IGPG002', 'Aho RWANYAGAHUTU David akodeshwa inzu', '2021-03-24 21:21:08'),
(69, 21, 'ENEYA Abdala', 'RWP/GCC/ubunyangamugayo/IGPG003', '', '2021-03-24 21:22:38'),
(70, 21, 'VUGUZIGA Bubakar', 'RWP/GCC/ubunyangamugayo/IGPG004', '', '2021-03-24 21:23:06'),
(71, 21, 'MUTEBI Ally', 'RWP/GCC/ubunyangamugayo/IGPG005', '', '2021-03-24 21:23:26'),
(72, 21, 'KANYANDEKWE Eugene', 'RWP/GCC/ubunyangamugayo/IGPG006', '', '2021-03-24 21:23:58'),
(73, 21, 'Haj. KAYUMBA Hassan', 'RWP/GCC/ubunyangamugayo/IGPG007', '', '2021-03-24 21:24:41'),
(74, 21, 'Haj. KAYUMBA Hassan', 'RWP/GCC/ubunyangamugayo/IGPG008', '', '2021-03-24 21:28:07'),
(75, 21, 'NDAZIRAMIYE Jean Paul', 'RWP/GCC/ubunyangamugayo/IGPG009', '', '2021-03-24 21:28:31'),
(76, 21, 'NSENGIYERA Djumapiri', 'RWP/GCC/ubunyangamugayo/IGPG010', '', '2021-03-24 21:29:20'),
(77, 21, 'BARUKU Tiery', 'RWP/GCC/ubunyangamugayo/IGPG011', '', '2021-03-24 21:30:32'),
(78, 21, 'Kwa Papa Akim', 'RWP/GCC/ubunyangamugayo/IGPG012', '', '2021-03-24 21:31:13'),
(79, 21, 'MUKAGAJU Zaudjiya', 'RWP/GCC/ubunyangamugayo/IGPG013', '', '2021-03-24 21:31:42'),
(80, 21, 'SHUMBUSHO Hassan', 'RWP/GCC/ubunyangamugayo/IGPG014', '', '2021-03-24 21:32:03'),
(81, 20, 'RWANYAGAHUTU David', 'RWP/GCC/kwigira/IGPG001', 'Aho RWANYAGAHUTU David akorera', '2021-03-24 21:32:50'),
(82, 20, 'SEMAHANE Musa', 'RWP/GCC/kwigira/IGPG002', '', '2021-03-24 21:33:54'),
(83, 20, 'MUTSINDASHYAKA Amza', 'RWP/GCC/kwigira/IGPG003', '', '2021-03-24 21:34:20'),
(84, 20, 'MUKAYUHI Salima', 'RWP/GCC/kwigira/IGPG004', '', '2021-03-24 21:34:39'),
(85, 20, 'MUTO Haruna', 'RWP/GCC/kwigira/IGPG005', '', '2021-03-24 21:35:00'),
(86, 20, 'KASIMU', 'RWP/GCC/kwigira/IGPG006', '', '2021-03-24 21:35:51'),
(87, 20, 'HAJAT UZAMUKUNDA Zainabu', 'RWP/GCC/kwigira/IGPG007', '', '2021-03-24 21:49:03'),
(88, 20, 'HAVUGIMANA Hamadi', 'RWP/GCC/kwigira/IGPG008', '', '2021-03-24 21:49:46'),
(89, 20, 'NYANDWI Radjabu', 'RWP/GCC/kwigira/IGPG009', '', '2021-03-24 21:50:48'),
(90, 20, 'MUDAHEMUKA Valence', 'RWP/GCC/kwigira/IGPG010', '', '2021-03-24 21:51:46'),
(91, 20, 'MUHIGIRWA Ernest', 'RWP/GCC/kwigira/IGPG011', '', '2021-03-24 21:52:17'),
(92, 20, 'UWAMUNGU Issa', 'RWP/GCC/kwigira/IGPG012', '', '2021-03-24 21:52:50'),
(93, 20, 'MUNYESHYAKA Abdulkarim', 'RWP/GCC/kwigira/IGPG013', '', '2021-03-24 21:53:13'),
(94, 20, 'BIMENYIMANA John', 'RWP/GCC/kwigira/IGPG014', '', '2021-03-24 21:53:37'),
(95, 20, 'NTABOMVURA Josephine', 'RWP/GCC/kwigira/IGPG015', '', '2021-03-24 21:54:05'),
(96, 15, 'HAKIZIMANA Daniel', 'RWP/GCC/ubutwari/IGPG003', '', '2021-03-24 21:55:45'),
(97, 15, 'HATEGEKIMANA Kasimu Yousuf (mu bapangayi)', 'RWP/GCC/ubutwari/IGPG013', '', '2021-03-24 21:57:50'),
(98, 15, 'GAHIGARI Yousufu', 'RWP/GCC/ubutwari/IGPG014', '', '2021-03-24 21:58:11'),
(99, 15, 'NUMUGABO Harid', 'RWP/GCC/ubutwari/IGPG015', '', '2021-03-24 21:58:58'),
(101, 16, 'MURWANASHYAKA Amuri', 'RWP/GCC/icyerekezo/IGPG015', '', '2021-03-24 22:04:13'),
(102, 15, 'MUKARIMASI Bertirde', 'RWP/GCC/ubutwari/IGPG0033', '', '2021-04-18 11:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `inshingano`
--

CREATE TABLE `inshingano` (
  `inshingano_id` int(255) NOT NULL,
  `inshingano_name` varchar(255) NOT NULL,
  `aho_bireba` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inshingano`
--

INSERT INTO `inshingano` (`inshingano_id`, `inshingano_name`, `aho_bireba`) VALUES
(1, 'Nta Nshingano', '-'),
(5, 'Intore yo ku mukondo', 'Isibo'),
(6, 'Intore yo kuruhembe rw\'iburyo', 'Isibo'),
(7, 'Intore yo kuruhembe rw\'ibumoso', 'Isibo'),
(8, 'Umujyanama ushinzwe ubukungu', 'Isibo'),
(9, 'Umujyanama ushinzwe iterambere', 'Isibo'),
(10, 'Umujyanama ushinzwe ubutabera', 'Isibo'),
(11, 'Umujyanama ushinzwe imibereho myiza', 'Isibo'),
(12, 'Umukuru w\'umudugudu', 'Umudugudu'),
(13, 'Ushinzwe umutekano', 'Umudugudu'),
(14, 'Ushinzwe amakuru', 'Umudugudu'),
(15, 'Ushinzwe imibereho myiza', 'Umudugudu'),
(16, 'Ushinzwe iterambere', 'Umudugudu'),
(17, 'Coordinatrice', 'CNF'),
(18, 'Vice-coordinatrice', 'CNF'),
(19, 'Secretaire', 'CNF'),
(20, 'Iterambere', 'CNF'),
(21, 'Imibereho Myiza', 'CNF'),
(22, 'Ubukungu', 'CNF'),
(23, 'Ubutabera', 'CNF'),
(24, 'President', 'CNJ'),
(25, 'Vice-President', 'CNJ'),
(26, 'Secretaire', 'CNJ'),
(27, 'Ubukungu', 'CNJ'),
(28, 'Imibereho myiza', 'CNJ'),
(29, 'Iterambere', 'CNJ'),
(30, 'Ubutabera', 'CNJ'),
(31, 'Umujyanama w\'ubuzima', 'Umudugudu'),
(33, 'President', 'Umugoroba w\'umuryango'),
(34, 'Vice-President', 'Umugoroba w\'umuryango'),
(35, 'Secretaire', 'Umugoroba w\'umuryango'),
(36, 'Umujyanama', 'Umugoroba w\'umuryango'),
(37, 'Inshuti y\'umuryango', 'Umudugudu'),
(38, 'President', 'Ubudehe'),
(39, 'Vice-President', 'Ubudehe'),
(40, 'Secretaire', 'Ubudehe'),
(41, 'Umubitsi', 'Ubudehe'),
(42, 'Umujyanama', 'Ubudehe'),
(43, 'Umujyenzuzi', 'Ubudehe');

-- --------------------------------------------------------

--
-- Table structure for table `inzu`
--

CREATE TABLE `inzu` (
  `inzu_id` int(255) NOT NULL,
  `igipangu_id` int(255) NOT NULL,
  `status_turwa_kodeshwa` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `inzu_details` varchar(255) NOT NULL,
  `reg_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inzu`
--

INSERT INTO `inzu` (`inzu_id`, `igipangu_id`, `status_turwa_kodeshwa`, `owner_name`, `inzu_details`, `reg_datetime`) VALUES
(8, 12, 'Iratuwe', '	RWP/GCC/ubutwari/IGPG001/INZ01', 'ituwemo', '2021-04-18 09:36:50'),
(9, 12, 'Iratuwe', '	RWP/GCC/ubutwari/IGPG001/INZ02', 'ituwemo', '2021-04-18 09:37:38'),
(10, 12, 'Iratuwe', '	RWP/GCC/ubutwari/IGPG001/INZ03', 'ituwemo', '2021-04-18 09:38:00'),
(11, 12, 'Iratuwe', '	RWP/GCC/ubutwari/IGPG001/INZ04', 'ituwemo', '2021-04-18 09:38:28'),
(13, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ01', 'ntabwo ituwe', '2021-04-18 10:29:48'),
(14, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ02', 'ituwemo', '2021-04-18 10:30:35'),
(15, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ03', 'ituwemo', '2021-04-18 10:31:02'),
(16, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ04', 'ituwemo', '2021-04-18 10:31:30'),
(17, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ05', 'ituwemo', '2021-04-18 10:31:51'),
(18, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ06', 'ituwemo', '2021-04-18 10:32:06'),
(19, 11, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG002/INZ07', 'ituwemo', '2021-04-18 10:51:40'),
(20, 102, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG0033/INZ01', 'ituwemo', '2021-04-18 11:19:49'),
(21, 102, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG0033/INZ02', 'ituwemo', '2021-04-18 11:20:54'),
(22, 102, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG0033/INZ03', 'ituwemo', '2021-04-18 11:21:04'),
(23, 14, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG004/INZ01', 'ituwemo', '2021-04-18 11:46:40'),
(24, 14, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG004/INZ02', 'ituwemo', '2021-04-18 11:47:13'),
(25, 14, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG004/INZ03', 'ituwemo', '2021-04-18 11:47:38'),
(26, 14, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG004/INZ04', 'ituwemo', '2021-04-18 11:48:05'),
(27, 15, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG005/INZ01', 'ituwemo', '2021-04-18 12:25:06'),
(28, 15, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG005/INZ02', 'ituwemo', '2021-04-18 12:25:34'),
(29, 15, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG005/INZ03', 'ituwemo', '2021-04-18 12:25:49'),
(30, 15, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG005/INZ04', 'ituwemo', '2021-04-18 12:26:02'),
(31, 16, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG006/INZ01', 'ituwemo', '2021-04-18 13:11:39'),
(32, 18, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG008/INZ01', 'ituwemo', '2021-04-18 13:32:35'),
(33, 17, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG007/INZ01', 'ituwemo', '2021-04-18 13:47:58'),
(34, 17, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG007/INZ02', 'ituwemo', '2021-04-18 13:48:31'),
(35, 19, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG009/INZ01', 'ituwemo', '2021-04-18 14:14:56'),
(36, 19, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG009/INZ02', 'ituwemo', '2021-04-18 14:15:49'),
(37, 20, 'Iratuwe', 'RWP/GCC/ubutwari/IGPG010/INZ01', 'ituwemo', '2021-04-18 14:27:45'),
(38, 20, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG010/INZ02', 'ituwemo', '2021-04-18 14:28:05'),
(39, 102, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG010/INZ03', 'ituwemo', '2021-04-18 14:42:11'),
(40, 102, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG010/INZ04', 'ituwemo', '2021-04-18 14:42:40'),
(41, 20, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG010/INZ03', 'ituwemo', '2021-04-18 15:06:10'),
(42, 20, 'Irakodeshwa', 'RWP/GCC/ubutwari/IGPG010/INZ04', 'ituwemo', '2021-04-18 15:06:41'),
(44, 32, 'Irakodeshwa', 'RWP/GCC/icyerekezo/IGPG010/INZ05', 'ituwemo', '2021-04-19 10:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `isibo`
--

CREATE TABLE `isibo` (
  `isibo_id` int(255) NOT NULL,
  `isibo_name` varchar(255) NOT NULL,
  `reg_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isibo`
--

INSERT INTO `isibo` (`isibo_id`, `isibo_name`, `reg_datetime`) VALUES
(15, 'Ubutwari', '2021-03-24 01:05:29'),
(16, 'Icyerekezo', '2021-03-24 01:05:45'),
(17, 'Ubwitange', '2021-03-24 01:05:56'),
(18, 'Gukunda Igihugu', '2021-03-24 01:06:13'),
(20, 'Kwigira', '2021-03-24 01:06:35'),
(21, 'Ubunyangamugayo', '2021-03-24 02:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `nyirinzu`
--

CREATE TABLE `nyirinzu` (
  `nyirinzu_id` int(255) NOT NULL,
  `umuturage_id` int(255) DEFAULT NULL,
  `umuryango_id` int(255) DEFAULT NULL,
  `inzu_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nyirinzu`
--

INSERT INTO `nyirinzu` (`nyirinzu_id`, `umuturage_id`, `umuryango_id`, `inzu_id`) VALUES
(8, 12, 6, 9),
(9, 13, 7, 10),
(10, 15, 8, 11),
(12, 17, 10, 16),
(13, 18, 11, 17),
(14, 20, 12, 18),
(15, 22, 13, 19),
(19, 25, 15, 22),
(20, 28, 16, 21),
(22, 38, 18, 24),
(23, 41, 19, 25),
(24, 42, 20, 26),
(26, 51, 22, 28),
(27, 52, 23, 29),
(28, 53, 24, 30),
(30, 62, 26, 32),
(32, 74, 28, 34);

-- --------------------------------------------------------

--
-- Table structure for table `ubwishyu_mituweli`
--

CREATE TABLE `ubwishyu_mituweli` (
  `ubwishyu_id` int(255) NOT NULL,
  `umuturage_id` int(255) NOT NULL,
  `aho_yishyuriye` varchar(255) DEFAULT NULL,
  `umwaka_yishyuriye` varchar(255) DEFAULT NULL,
  `impamvu_atishyuye` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ubwishyu_umutekano`
--

CREATE TABLE `ubwishyu_umutekano` (
  `ubwishyu_id` int(255) NOT NULL,
  `umuryango_id` int(255) NOT NULL,
  `ukwezi` varchar(255) NOT NULL,
  `umwaka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ubwisungane`
--

CREATE TABLE `ubwisungane` (
  `ubwisungane_id` int(255) NOT NULL,
  `ubwisungane_name` varchar(255) NOT NULL,
  `Ntacyo_Afite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ubwisungane`
--

INSERT INTO `ubwisungane` (`ubwisungane_id`, `ubwisungane_name`, `Ntacyo_Afite`) VALUES
(1, 'RSSB', ''),
(2, 'Mituweli', ''),
(3, 'Sanlam', ''),
(4, 'MIS UR', ''),
(5, 'UAP', ''),
(6, 'Ntabwishingizi', ''),
(7, 'MMI', '');

-- --------------------------------------------------------

--
-- Table structure for table `ubwitabire`
--

CREATE TABLE `ubwitabire` (
  `ubwitabire_id` int(255) NOT NULL,
  `igikorwa_id` int(255) NOT NULL,
  `umuturage_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umuryango`
--

CREATE TABLE `umuryango` (
  `umuryango_id` int(255) NOT NULL,
  `umuryango_chef` varchar(255) NOT NULL,
  `status_tura_kodesha` varchar(255) NOT NULL,
  `ibyiciro_id` int(255) DEFAULT NULL,
  `ubwisungane_id` int(11) NOT NULL,
  `reg_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umuryango`
--

INSERT INTO `umuryango` (`umuryango_id`, `umuryango_chef`, `status_tura_kodesha`, `ibyiciro_id`, `ubwisungane_id`, `reg_datetime`) VALUES
(5, 'MUKADUSENGE Denyse', 'Uratuye', 3, 2, '2021-04-18 09:40:02'),
(6, 'MUKANDUTIYE Asia', 'Urakodesha', 3, 2, '2021-04-18 09:50:31'),
(7, 'MAMASHENGE Rachel', 'Urakodesha', 3, 2, '2021-04-18 09:57:44'),
(8, 'RUKOZI Francois', 'Urakodesha', 6, 6, '2021-04-18 10:11:16'),
(9, 'MUKAREMERA Francoise', 'Urakodesha', 3, 2, '2021-04-18 10:33:16'),
(10, 'MUNYANA Cecile', 'Urakodesha', 4, 2, '2021-04-18 10:41:06'),
(11, 'MUJAWIMANA Aisha', 'Urakodesha', 4, 2, '2021-04-18 10:44:33'),
(12, 'MUKESHIMANA Alice', 'Urakodesha', 4, 2, '2021-04-18 10:52:42'),
(13, 'HABYARIMANA Alexandre', 'Urakodesha', 3, 2, '2021-04-18 11:06:30'),
(14, 'MUKARIMASI Bertirde', 'Uratuye', 3, 2, '2021-04-18 11:22:15'),
(15, 'DUSABIMANA Dativa', 'Urakodesha', 3, 1, '2021-04-18 11:29:13'),
(16, 'NTIRENGANYA Abdul', 'Urakodesha', 3, 2, '2021-04-18 11:33:50'),
(17, 'MBARUBUKEYE Emmanuel', 'Uratuye', 2, 1, '2021-04-18 11:48:30'),
(18, 'NDAYAMBAJE Aimee', 'Urakodesha', 3, 2, '2021-04-18 12:05:03'),
(19, 'BIZIMANA Jeremie', 'Urakodesha', 3, 2, '2021-04-18 12:13:41'),
(20, 'NSHIMYUMUREMYI Aimable', 'Urakodesha', 3, 2, '2021-04-18 12:17:28'),
(21, 'NTAMUGABUMWE Haruna', 'Uratuye', 2, 1, '2021-04-18 12:26:45'),
(22, 'NAYIHIKI James', 'Urakodesha', 3, 2, '2021-04-18 12:45:44'),
(23, 'NYIRANSABIMANA Claudine', 'Urakodesha', 3, 2, '2021-04-18 12:48:19'),
(24, 'UFITIMANA Jean Pierre', 'Urakodesha', 4, 2, '2021-04-18 12:55:53'),
(25, 'RUBAMBURA Nizar', 'Uratuye', 3, 2, '2021-04-18 13:12:50'),
(26, 'SAID Yusufu', 'Urakodesha', 2, 2, '2021-04-18 13:34:21'),
(27, 'MUSABWASONI Sofia', 'Uratuye', 3, 2, '2021-04-18 13:49:16'),
(28, 'MUKANTABANA Jaqueline', 'Urakodesha', 3, 2, '2021-04-18 14:05:13'),
(29, 'UWAYO Egide', 'Uratuye', 3, 2, '2021-04-18 14:17:31'),
(30, 'INEZA NYIRIMANA Bonavanture', 'Uratuye', 3, 2, '2021-04-18 14:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `umuturage`
--

CREATE TABLE `umuturage` (
  `umuturage_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nid` varchar(16) DEFAULT NULL,
  `passport_id` varchar(255) DEFAULT NULL,
  `other_identification` varchar(255) DEFAULT NULL,
  `impamvu_atagifite` varchar(300) DEFAULT NULL,
  `dob` date NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status_tura_kodesha` varchar(255) NOT NULL,
  `icyo_akora` varchar(255) NOT NULL,
  `isano` varchar(255) NOT NULL,
  `umuturage_dad` varchar(255) DEFAULT NULL,
  `umuturage_mum` varchar(255) DEFAULT NULL,
  `amashuri_yize` varchar(255) NOT NULL,
  `ibyiciro_id` int(255) DEFAULT NULL,
  `ubwisungane_id` int(255) DEFAULT NULL,
  `umuryango_id` int(255) NOT NULL,
  `inshingano_id` int(255) NOT NULL,
  `inshingano2_id` int(255) DEFAULT NULL,
  `inshingano3_id` int(255) DEFAULT NULL,
  `ubumuga_status` varchar(255) DEFAULT NULL,
  `ubumuga_details` varchar(255) DEFAULT NULL,
  `reg_datetime` datetime NOT NULL,
  `gufungwa_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umuturage`
--

INSERT INTO `umuturage` (`umuturage_id`, `first_name`, `last_name`, `gender`, `nid`, `passport_id`, `other_identification`, `impamvu_atagifite`, `dob`, `tel`, `nationality`, `country`, `status_tura_kodesha`, `icyo_akora`, `isano`, `umuturage_dad`, `umuturage_mum`, `amashuri_yize`, `ibyiciro_id`, `ubwisungane_id`, `umuryango_id`, `inshingano_id`, `inshingano2_id`, `inshingano3_id`, `ubumuga_status`, `ubumuga_details`, `reg_datetime`, `gufungwa_status`) VALUES
(7, 'Denyse', 'MUKADUSENGE ', 'Gore', '1197970004898015', '-', '-', '-', '1979-11-11', '0785229723', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntamurimo', 'Nyirurugo', NULL, NULL, 'primary ya (2)', 3, 2, 5, 1, 37, 31, 'Oya', '-', '2021-04-18 09:42:16', 'Ntabwo afunzwe'),
(8, 'Amina', 'NIYONSABA', 'Gore', '-', '-', '-', 'Ntarayifata', '2004-04-11', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umudozi', 'umwana we', NULL, NULL, 'primary', 3, 2, 5, 1, NULL, NULL, 'Oya', '-', '2021-04-18 09:44:50', 'Ntabwo afunzwe'),
(9, 'Asia', 'TUGIRIMANA ', 'Gore', '-', '-', '-', 'ni umwana', '2008-02-11', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'primary', 3, 2, 5, 1, NULL, NULL, 'Oya', '-', '2021-04-18 09:46:25', 'Ntabwo afunzwe'),
(10, 'Sifa', 'ISHIMWE', 'Gore', '-', '-', '-', 'ni umwana', '2010-03-01', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 3, 2, 5, 1, NULL, NULL, 'Oya', '-', '2021-04-18 09:47:15', 'Ntabwo afunzwe'),
(11, 'Ranu', 'MASENGESHO', 'Gore', '-', '-', '-', 'ni umwana', '2016-02-06', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntamurimo', 'umwana we', NULL, NULL, '-', 3, 2, 5, 1, NULL, NULL, 'Oya', '-', '2021-04-18 09:48:41', 'Ntabwo afunzwe'),
(12, 'Asia', 'MUKANDUTIYE', 'Gore', '1196670001434118', '-', '-', '-', '1966-01-01', '0782413746', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umuganga wagakondo', 'Nyirurugo', NULL, NULL, 'primary ya(3)', 3, 2, 6, 1, NULL, NULL, 'Oya', '-', '2021-04-18 09:53:44', 'Ntabwo afunzwe'),
(13, 'Rachel', 'MAMASHENGE ', 'Gore', '1197870004233109', '-', '-', '-', '1978-04-04', '0788525455', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'Primary', 3, 2, 7, 1, NULL, NULL, 'Oya', '-', '2021-04-18 09:59:18', 'Ntabwo afunzwe'),
(14, 'CYOMORO Hassan', 'MUGISHA', 'Gabo', '-', '-', '-', 'ni umwana', '2014-05-21', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'Ikiburamwaka', 3, 2, 7, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:00:54', 'Ntabwo afunzwe'),
(15, 'Francois', 'RUKOZI', 'Gabo', '1197580003206039', '-', '-', '-', '1975-06-26', '0783367339', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umukanishi', 'Nyirurugo', NULL, NULL, 'imyuga(Mechanic)', 6, 6, 8, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:13:54', 'Ntabwo afunzwe'),
(16, 'Francoise', 'MUKAREMERA', 'Gore', '1195970001021016', '-', '-', '-', '1959-01-01', '0786530853', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'Primary', 3, 2, 9, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:37:14', 'Ntabwo afunzwe'),
(17, 'Cecile', 'MUNYANA ', 'Gore', '1198770004606163', '-', '-', '-', '1987-12-01', '0789370925', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'Primary(5)', 4, 2, 10, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:42:51', 'Ntabwo afunzwe'),
(18, 'Aisha', 'MUJAWIMANA', 'Gore', '1198870004611297', '-', '-', '-', '1988-01-01', '0782463703', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Gusuka', 'Nyirurugo', NULL, NULL, 'Primary(2)', 4, 2, 11, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:46:59', 'Ntabwo afunzwe'),
(19, 'Kevine', 'MUGISHA', 'Gore', '-', '-', '-', 'ni umwana', '2008-12-07', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 4, 2, 11, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:47:59', 'Ntabwo afunzwe'),
(20, 'Alice', 'MUKESHIMANA', 'Gore', '1198270205622004', '-', '-', '-', '1982-01-01', '0785841450', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'ntayo', 4, 2, 12, 1, NULL, NULL, 'Oya', '-', '2021-04-18 10:54:45', 'Ntabwo afunzwe'),
(21, 'Devotha', 'YANKURIJE ', 'Gore', '1198970024531089', '-', '-', '-', '1989-01-01', '0785780594', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umuyede', 'inshuti', NULL, NULL, 'Primary', 4, 2, 12, 1, NULL, NULL, 'Yego', 'Ubumuga bwo kutavuga', '2021-04-18 10:59:55', 'Ntabwo afunzwe'),
(22, 'Alexandre', 'HABYARIMANA', 'Gabo', '1197280002802050', '-', '-', '-', '1972-05-01', '0784844879', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'ntayo', 3, 2, 13, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:09:21', 'Ntabwo afunzwe'),
(23, ' Bertirde', 'MUKARIMASI', 'Gore', '1196370001308042', '-', '-', '-', '1963-06-17', '0788863977', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'secondary(5)', 3, 2, 14, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:24:18', 'Ntabwo afunzwe'),
(24, 'SEZERANO Christian', 'MUNYARUKIKO ', 'Gabo', '1199180202481264', '-', '-', '-', '1991-12-15', '0781964337', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umwana we', NULL, NULL, 'O level', 3, 2, 14, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:26:09', 'Ntabwo afunzwe'),
(25, 'Dativa', 'DUSABIMANA ', 'Gore', '1199170022717155', '-', '-', '-', '1991-01-01', '0784195545', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Umwarimu', 'Nyirurugo', NULL, NULL, 'kaminuza', 3, 1, 15, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:30:42', 'Ntabwo afunzwe'),
(26, 'Eva Christella', 'IGIHOZO', 'Gore', '-', '-', '-', 'ni umwana', '2013-03-12', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 3, 1, 15, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:31:49', 'Ntabwo afunzwe'),
(27, 'Nicole', 'ASIIMWE', 'Gore', '-', '-', '-', 'ni umwana', '2007-09-09', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'Ikiburamwaka', 3, 1, 15, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:32:49', 'Ntabwo afunzwe'),
(28, 'Abdul', 'NTIRENGANYA ', 'Gabo', '1199680161283027', '-', '-', '-', '1996-08-30', '0788710141', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umukomisiyoneri', 'Nyirurugo', NULL, NULL, 'Primary(5)', 3, 2, 16, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:36:31', 'Ntabwo afunzwe'),
(29, 'Asuma', 'NYINAWASE', 'Gore', '1199570211746029', '-', '-', '-', '1995-12-12', '0786529552', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'umugore we', NULL, NULL, 'Primary(5)', 3, 2, 16, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:38:18', 'Ntabwo afunzwe'),
(30, 'Naira', 'UWASE ', 'Gore', '-', '-', '-', 'ni umwana', '2015-06-01', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'Ikiburamwaka', 3, 2, 16, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:39:25', 'Ntabwo afunzwe'),
(31, 'Nasibti', 'UGIRIMBABAZI', 'Gore', '-', '-', '-', 'ni umwana', '2017-08-01', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'Ikiburamwaka', 3, 2, 16, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:41:16', 'Ntabwo afunzwe'),
(32, 'Bashiru', 'NIYONSHUTI', 'Gabo', '-', '-', '-', 'ni umwana', '2018-12-03', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', '-', 'umwana we', NULL, NULL, '-', 3, 2, 16, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:42:48', 'Ntabwo afunzwe'),
(33, 'Emmanuel', 'MBARUBUKEYE', 'Gabo', '1197980012925032', '-', '-', '-', '1979-01-01', '0788443840', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Umwarimu', 'Nyirurugo', NULL, NULL, 'bachelor (Economics)', 2, 1, 17, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:50:41', 'Ntabwo afunzwe'),
(34, 'Euphrosine', 'MUTESI ', 'Gore', '1198470021477201', '-', '-', '-', '1984-08-14', '0788465354', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Umuganga', 'umugore we', NULL, NULL, 'bachelor(Nursing)', 2, 1, 17, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:53:29', 'Ntabwo afunzwe'),
(35, 'RANDY Garvin', 'BUKEMA ', 'Gabo', '-', '-', '-', 'ni umwana', '2012-12-30', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 2, 1, 17, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:54:39', 'Ntabwo afunzwe'),
(36, 'DARVIN Ginno', 'INEZA', 'Gabo', '-', '-', '-', 'ni umwana', '2016-04-20', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'nursery', 2, 1, 17, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:55:44', 'Ntabwo afunzwe'),
(37, 'Ian Gibbar', 'NKUBITO', 'Gabo', '-', '-', '-', 'ni umwana', '2018-08-14', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', '-', 'umwana we', NULL, NULL, '-', 2, 1, 17, 1, NULL, NULL, 'Oya', '-', '2021-04-18 11:56:46', 'Ntabwo afunzwe'),
(38, 'Aimee', 'NDAYAMBAJE ', 'Gabo', '1199880038172018', '-', '-', '-', '1998-01-01', '0786582261', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Umunyeshuri', 'Nyirurugo', NULL, NULL, 'Bachelor(civil engineering)', 3, 2, 18, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:06:41', 'Ntabwo afunzwe'),
(39, 'Pacifique', 'MURWANASHYAKA', 'Gabo', '1199880057509059', '-', '-', '-', '1998-01-01', '0786470111', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'Inshuti', NULL, NULL, 'Bachelor(Phyics climate and atmosphere)', 3, 2, 18, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:09:12', 'Ntabwo afunzwe'),
(40, 'Jean de Dieu', 'MUSHIMIYIMANA ', 'Gabo', '1199680134726188', '-', '-', '-', '1996-10-21', '0786164559', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'Inshuti', NULL, NULL, 'bachelor (Electronic and Telecommunication)', 3, 2, 18, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:11:16', 'Ntabwo afunzwe'),
(41, 'Jeremie', 'BIZIMANA ', 'Gabo', '1198780068847180', '-', '-', '-', '1987-01-01', '0783551266', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Electrician', 'Nyirurugo', NULL, NULL, 'A1( Electricity and Telecommunication)', 3, 2, 19, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:16:22', 'Ntabwo afunzwe'),
(42, 'Aimable', 'NSHIMYUMUREMYI ', 'Gabo', '1199280008903058', '-', '-', '-', '1992-01-01', '0782850005', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Umucuruzi', 'Nyirurugo', NULL, NULL, 'Secondary', 3, 2, 20, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:19:12', 'Ntabwo afunzwe'),
(43, 'Haruna', 'NTAMUGABUMWE ', 'Gabo', '1195380000611096', '-', '-', '-', '1953-12-25', '0788435571', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Shoferi', 'Nyirurugo', NULL, NULL, 'secondary(4)', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:28:31', 'Ntabwo afunzwe'),
(44, 'Rehema', 'MUKAMURAMUTSA ', 'Gore', '1196070001202046', '-', '-', '-', '1960-01-01', '0787170608', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umugore we', NULL, NULL, 'Primary', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:30:54', 'Ntabwo afunzwe'),
(45, 'Khadidja', 'UMUNYANA', 'Gore', '1199170168160062', '-', '-', '-', '1991-07-24', '0784892491', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umwana we', NULL, NULL, 'University', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:32:19', 'Ntabwo afunzwe'),
(46, 'Issiaka', 'SHUMBUSHO', 'Gabo', '1199580036773182', '-', '-', '-', '1995-09-28', '0784079404', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Umwubatsi', 'umwana we', NULL, NULL, 'University(Business and Finance)', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:34:18', 'Ntabwo afunzwe'),
(47, 'Amza Yvan', 'MUGISHA', 'Gabo', '-', '-', '-', 'ni umwana', '2009-07-07', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:37:34', 'Ntabwo afunzwe'),
(48, 'Asia', 'UWINEZA ', 'Gabo', '-', '-', '-', 'ni umwana', '2011-02-22', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'abo arera', NULL, NULL, 'Primary', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:39:00', 'Ntabwo afunzwe'),
(49, 'Aluwa', 'UMWIZA', 'Gore', '-', '-', '-', 'ni umwana', '2015-06-10', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Umwuzukuru', NULL, NULL, 'Ikiburamwaka', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:39:58', 'Ntabwo afunzwe'),
(50, 'Aimable', 'NTIVUGURUZWA', 'Gabo', '119980176520036', '-', '-', '-', '1998-01-01', '0787953425', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Umukozi wo murugo', 'umukozi we', NULL, NULL, 'Primary', 2, 1, 21, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:42:55', 'Ntabwo afunzwe'),
(51, 'James', 'NAYIHIKI ', 'Gabo', '1200280025146032', '-', '-', '-', '2002-05-01', '0783792899', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'MTN Agent ', 'Nyirurugo', NULL, NULL, 'Primary', 3, 2, 22, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:47:32', 'Ntabwo afunzwe'),
(52, 'Claudine', 'NYIRANSABIMANA ', 'Gore', '1199070023034056', '-', '-', '-', '1990-01-01', '0787141171', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'MTN Agent ', 'Nyirurugo', NULL, NULL, 'secondary', 3, 2, 23, 1, NULL, NULL, 'Oya', '-', '2021-04-18 12:49:47', 'Ntabwo afunzwe'),
(53, 'Jean Pierre', 'UFITIMANA ', 'Gabo', '1198580175900045', '-', '-', '-', '1985-02-01', '0783070632', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Mucoma', 'Nyirurugo', NULL, NULL, 'Primary', 4, 2, 24, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:02:48', 'Ntabwo afunzwe'),
(54, 'Eduard', 'NIYIGENA', 'Gabo', '1198880090029056', '-', '-', '-', '1988-01-01', '0789716161', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Inshuti', NULL, NULL, 'Umuyede', 4, 2, 24, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:04:13', 'Ntabwo afunzwe'),
(55, 'Nizar', 'RUBAMBURA ', 'Gabo', '1196780000084015', '-', '-', '-', '1967-01-01', '0788632618', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Umwarimu na Technician', 'Nyirurugo', NULL, NULL, 'kaminuza', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:14:52', 'Ntabwo afunzwe'),
(56, 'Salama', 'BASHIMYEZOMBI', 'Gore', '1197770000204091', '-', '-', '-', '1977-01-01', '07885280816', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umudozi wimyenda', 'umugore we', NULL, NULL, 'Primary', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:17:27', 'Ntabwo afunzwe'),
(57, 'Kawathar', 'ISHIMWE', 'Gore', '-', '-', '-', 'Ntarayifata', '2005-01-01', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'secondary', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:21:07', 'Ntabwo afunzwe'),
(58, 'Shakur', 'IRADUKUNDA', 'Gabo', '-', '-', '-', 'ni umwana', '2006-08-01', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'secondary', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:22:03', 'Ntabwo afunzwe'),
(59, 'Mutawakila', 'IRASUBIZA', 'Gore', '-', '-', '-', 'ni umwana', '2009-04-12', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:23:23', 'Ntabwo afunzwe'),
(60, 'Mutawakilu', 'IRAKOZE ', 'Gabo', '-', '-', '-', 'ni umwana', '2015-06-05', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'Primary', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:24:23', 'Ntabwo afunzwe'),
(61, 'Tasinimu', 'ISINGIZWE', 'Gore', '-', '-', '-', 'ni umwana', '2017-04-25', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', '-', 'umwana we', NULL, NULL, '-', 3, 2, 25, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:25:45', 'Ntabwo afunzwe'),
(62, 'Yusufu', 'SAID ', 'Gabo', '1198780173997056', '-', '-', '-', '1987-12-25', '0788884498', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umukomisiyoneri', 'Nyirurugo', NULL, NULL, 'Secondary', 2, 2, 26, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:36:07', 'Ntabwo afunzwe'),
(63, 'Perine', 'UWERA', 'Gore', '1199570111391086', '-', '-', '-', '1995-01-01', '0780464552', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'umugore we', NULL, NULL, 'Secondary', 2, 2, 26, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:40:05', 'Ntabwo afunzwe'),
(64, 'Said Riziki', 'MPINGANZIMA', 'Gore', '-', '-', '-', 'ni umwana', '2019-09-30', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', '-', 'umwana we', NULL, NULL, '-', 2, 2, 26, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:41:12', 'Ntabwo afunzwe'),
(65, 'Daphroza', 'MUKESHIMANA', 'Gore', '1199770008090069', '-', '-', '-', '1997-05-14', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'Umukozi wo murugo', 'umukozi we', NULL, NULL, 'Primary', 2, 2, 26, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:43:25', 'Ntabwo afunzwe'),
(66, 'Sofia', 'MUSABWASONI ', 'Gore', '1196070001307156', '-', '-', '-', '1960-01-01', '0788593644', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'Primary', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:50:38', 'Ntabwo afunzwe'),
(67, 'Safi', 'MUNGANYIKI ', 'Gore', '1198270007922239', '-', '-', '-', '1982-01-01', '078271074', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umwana we', NULL, NULL, 'Primary', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:52:14', 'Ntabwo afunzwe'),
(68, 'Afisa', 'MUSABURARE', 'Gore', '1198470007359096', '-', '-', '-', '1984-10-26', '0788263554', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umwana we', NULL, NULL, 'O level S3', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:53:43', 'Ntabwo afunzwe'),
(69, 'Asia', 'MURORUNKWERE', 'Gore', '1198670005837001', '-', '-', '-', '1986-11-29', '0789099700', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umwana we', NULL, NULL, 'secondary', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:55:03', 'Ntabwo afunzwe'),
(70, 'Hussai', 'HARERIMANA', 'Gabo', '-', '-', '-', 'Ntarayifata', '2003-08-21', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Umwuzukuru we', NULL, NULL, 'S4', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:58:13', 'Ntabwo afunzwe'),
(71, 'Nonde Ibrahim', 'UKUNDWE ', 'Gabo', '-', '-', '-', 'ni umwana', '2005-01-29', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Umwuzukuru we', NULL, NULL, 'secondary', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 13:59:12', 'Ntabwo afunzwe'),
(72, 'Nema', 'MUTEGARABA', 'Gore', '-', '-', '-', 'ni umwana', '2005-12-27', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Umwuzukuru we', NULL, NULL, 'S1', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:01:05', 'Ntabwo afunzwe'),
(73, 'Slha', 'AGASARO', 'Gore', '-', '-', '-', 'ni umwana', '2017-10-14', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Umwuzukuru we', NULL, NULL, 'Ikiburamwaka', 3, 2, 27, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:03:16', 'Ntabwo afunzwe'),
(74, 'Jaqueline', 'MUKANTABANA ', 'Gore', '1197870003550015', '-', '-', '-', '1978-03-11', '0780233089', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'ntakazi ', 'Nyirurugo', NULL, NULL, 'Primary', 3, 2, 28, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:06:49', 'Ntabwo afunzwe'),
(75, 'Cherisa', 'SHONGORE', 'Gore', '-', '-', '-', 'ni umwana', '2008-02-02', '-', 'Umunyarwanda', 'Rwanda', 'Arakodesha', 'umunyeshuri', 'umwana we', NULL, NULL, 'P6', 3, 2, 28, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:09:05', 'Ntabwo afunzwe'),
(76, 'Egide', 'UWAYO ', 'Gabo', '1198380151918097', '-', '-', '-', '1983-01-01', '0784587143', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'Umutekano irondo', 'Nyirurugo', NULL, NULL, 'Primary', 3, 2, 29, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:19:37', 'Ntabwo afunzwe'),
(77, 'Aimable', 'UJENEZA ', 'Gabo', '1198180005623006', '-', '-', '-', '1981-01-01', '0786679006', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umufundi', 'Umuvandimwe we', NULL, NULL, 'secondary', 3, 2, 29, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:22:20', 'Ntabwo afunzwe'),
(78, 'Florentine', 'UWAMAHORO', 'Gore', '119780004652068', '-', '-', '-', '1978-04-08', '078668858', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'Mushiki we', NULL, NULL, 'secondary', 3, 2, 29, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:25:16', 'Ntabwo afunzwe'),
(79, 'Sakinah', 'UWIMANA', 'Gore', '1198770004688055', '-', '-', '-', '1987-01-01', '0788532104', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'ntakazi ', 'umugore we', NULL, NULL, 'S3', 3, 2, 30, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:51:08', 'Ntabwo afunzwe'),
(80, 'Abdulilah', 'NIZEYIMANA', 'Gabo', '-', '-', '-', 'ni umwana', '2004-07-07', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'umwana we', NULL, NULL, 'S2', 3, 2, 30, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:53:37', 'Ntabwo afunzwe'),
(81, 'Ibrahim', 'MUNYANKINDI', 'Gabo', '-', '-', '-', 'ni umwana', '2006-03-05', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Ni umwana we', NULL, NULL, 'P6', 3, 2, 30, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:55:08', 'Ntabwo afunzwe'),
(82, 'Soheillia', 'INEZA Rayah', 'Gore', '-', '-', '-', 'ni umwana', '2017-11-25', '-', 'Umunyarwanda', 'Rwanda', 'Aratuye', 'umunyeshuri', 'Umwana we', NULL, NULL, 'Ikiburamwaka', 3, 2, 30, 1, NULL, NULL, 'Oya', '-', '2021-04-18 14:57:35', 'Ntabwo afunzwe'),
(83, ' NYIRIMANA Bonavanture', 'NEZA', 'Gabo', '1970636743646475', '-', '-', '-', '1970-01-01', '078000087', 'Rwanda', 'Rwanda', 'Aratuye', 'Umucuruzi', 'Nyirurugo', NULL, NULL, 'A1', 3, 2, 30, 1, NULL, NULL, 'Oya', '-', '2021-04-19 10:09:49', 'Ntabwo afunzwe');

-- --------------------------------------------------------

--
-- Table structure for table `umuyobozi_isibo`
--

CREATE TABLE `umuyobozi_isibo` (
  `chefIsibo_id` int(255) NOT NULL,
  `umuturage_id` int(255) DEFAULT NULL,
  `inshingano_id` int(255) NOT NULL,
  `isibo_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umuyobozi_umuryango`
--

CREATE TABLE `umuyobozi_umuryango` (
  `chefUmuryango_id` int(255) NOT NULL,
  `umuryango_id` int(255) NOT NULL,
  `umuturage_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umuyobozi_umuryango`
--

INSERT INTO `umuyobozi_umuryango` (`chefUmuryango_id`, `umuryango_id`, `umuturage_id`) VALUES
(6, 5, 7),
(7, 6, 12),
(8, 7, 13),
(9, 8, 15),
(10, 9, 16),
(11, 10, 17),
(12, 11, 18),
(13, 12, 20),
(14, 13, 22),
(15, 14, 23),
(16, 15, 25),
(17, 16, 28),
(18, 17, 33),
(19, 18, 38),
(20, 19, 41),
(21, 20, 42),
(22, 21, 43),
(23, 22, 51),
(24, 23, 52),
(25, 24, 53),
(26, 25, 55),
(27, 26, 62),
(28, 27, 66),
(29, 28, 74),
(30, 29, 76),
(31, 30, 83);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(9, 'Joel', 'Higiro', 'joelhigiro@gmail.com', '$2y$10$LT8wA0vOEfDlUoEWDX5IaOFtptcNaylPlQRQIUnjY0gF01Wabfv4m'),
(16, 'Vincent', 'Ntambara', 'ntambaravincent@gmail.com', '$2y$10$BzdrxHPU.RlyzW9ybDYLeuAH3d3jMllMZt.jjU4Eo8.i9gvIHZO1O'),
(18, 'Joel', 'Higiro', 'joelhigiro@gmail.com', '$2y$10$9bPMIjjbmZx31wXVEqlyoOCbLY1ev7TSDxEbc7.3ia/j9SU4iaJAq'),
(19, 'Karlo', 'Mugabo', 'karlo@gmail.com', '$2y$10$qmH/NClRZty35kMIqPNl7uwRIEI5odSVsLxwAa/rXhRrWm8YMr.B6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abitabye_imana`
--
ALTER TABLE `abitabye_imana`
  ADD PRIMARY KEY (`umuturage_id`),
  ADD KEY `ubudehe_id` (`ibyiciro_id`,`ubwisungane_id`,`umuryango_id`,`inshingano_id`),
  ADD KEY `umuryango_id` (`umuryango_id`),
  ADD KEY `ubwisungane_id` (`ubwisungane_id`),
  ADD KEY `inshingano_id` (`inshingano_id`),
  ADD KEY `ibyiciro_id` (`ibyiciro_id`,`ubwisungane_id`);

--
-- Indexes for table `amafoto`
--
ALTER TABLE `amafoto`
  ADD PRIMARY KEY (`amafoto_id`),
  ADD KEY `igikorwa_id` (`igikorwa_id`);

--
-- Indexes for table `andi_makuru_igikorwa`
--
ALTER TABLE `andi_makuru_igikorwa`
  ADD PRIMARY KEY (`andi_makuru_igikorwa`),
  ADD KEY `igikorwa_id` (`igikorwa_id`);

--
-- Indexes for table `andi_makuru_igipangu`
--
ALTER TABLE `andi_makuru_igipangu`
  ADD PRIMARY KEY (`andi_makuru_igipangu_id`),
  ADD KEY `igipangu_id` (`igipangu_id`);

--
-- Indexes for table `andi_makuru_umuryango`
--
ALTER TABLE `andi_makuru_umuryango`
  ADD PRIMARY KEY (`andi_makuru_id`),
  ADD KEY `umuryango_id` (`umuryango_id`);

--
-- Indexes for table `ibyiciro`
--
ALTER TABLE `ibyiciro`
  ADD PRIMARY KEY (`ibyiciro_id`);

--
-- Indexes for table `igikorwa`
--
ALTER TABLE `igikorwa`
  ADD PRIMARY KEY (`igikorwa_id`);

--
-- Indexes for table `igipangu`
--
ALTER TABLE `igipangu`
  ADD PRIMARY KEY (`igipangu_id`),
  ADD KEY `isibo_id` (`isibo_id`);

--
-- Indexes for table `inshingano`
--
ALTER TABLE `inshingano`
  ADD PRIMARY KEY (`inshingano_id`);

--
-- Indexes for table `inzu`
--
ALTER TABLE `inzu`
  ADD PRIMARY KEY (`inzu_id`),
  ADD KEY `isibo_id` (`igipangu_id`);

--
-- Indexes for table `isibo`
--
ALTER TABLE `isibo`
  ADD PRIMARY KEY (`isibo_id`);

--
-- Indexes for table `nyirinzu`
--
ALTER TABLE `nyirinzu`
  ADD PRIMARY KEY (`nyirinzu_id`),
  ADD KEY `inzu_id` (`inzu_id`,`umuturage_id`),
  ADD KEY `umuturage_id` (`umuturage_id`),
  ADD KEY `umuryango` (`umuryango_id`);

--
-- Indexes for table `ubwishyu_mituweli`
--
ALTER TABLE `ubwishyu_mituweli`
  ADD PRIMARY KEY (`ubwishyu_id`),
  ADD KEY `umuturage_id` (`umuturage_id`);

--
-- Indexes for table `ubwishyu_umutekano`
--
ALTER TABLE `ubwishyu_umutekano`
  ADD PRIMARY KEY (`ubwishyu_id`);

--
-- Indexes for table `ubwisungane`
--
ALTER TABLE `ubwisungane`
  ADD PRIMARY KEY (`ubwisungane_id`);

--
-- Indexes for table `ubwitabire`
--
ALTER TABLE `ubwitabire`
  ADD PRIMARY KEY (`ubwitabire_id`),
  ADD KEY `umuturage_id` (`umuturage_id`);

--
-- Indexes for table `umuryango`
--
ALTER TABLE `umuryango`
  ADD PRIMARY KEY (`umuryango_id`),
  ADD KEY `ibyiciro_id` (`ibyiciro_id`),
  ADD KEY `ubwisungane` (`ubwisungane_id`);

--
-- Indexes for table `umuturage`
--
ALTER TABLE `umuturage`
  ADD PRIMARY KEY (`umuturage_id`),
  ADD KEY `ubudehe_id` (`ibyiciro_id`,`ubwisungane_id`,`umuryango_id`,`inshingano_id`),
  ADD KEY `umuryango_id` (`umuryango_id`),
  ADD KEY `ubwisungane_id` (`ubwisungane_id`),
  ADD KEY `inshingano_id` (`inshingano_id`),
  ADD KEY `ibyiciro_id` (`ibyiciro_id`,`ubwisungane_id`),
  ADD KEY `pos2` (`inshingano2_id`),
  ADD KEY `pos3` (`inshingano3_id`);

--
-- Indexes for table `umuyobozi_isibo`
--
ALTER TABLE `umuyobozi_isibo`
  ADD PRIMARY KEY (`chefIsibo_id`),
  ADD KEY `isibo_id` (`isibo_id`,`umuturage_id`),
  ADD KEY `umuturage_id` (`umuturage_id`),
  ADD KEY `inshingano_id` (`inshingano_id`);

--
-- Indexes for table `umuyobozi_umuryango`
--
ALTER TABLE `umuyobozi_umuryango`
  ADD PRIMARY KEY (`chefUmuryango_id`),
  ADD KEY `umuryango_id` (`umuryango_id`),
  ADD KEY `umuturage` (`umuturage_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abitabye_imana`
--
ALTER TABLE `abitabye_imana`
  MODIFY `umuturage_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amafoto`
--
ALTER TABLE `amafoto`
  MODIFY `amafoto_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `andi_makuru_igikorwa`
--
ALTER TABLE `andi_makuru_igikorwa`
  MODIFY `andi_makuru_igikorwa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `andi_makuru_igipangu`
--
ALTER TABLE `andi_makuru_igipangu`
  MODIFY `andi_makuru_igipangu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `andi_makuru_umuryango`
--
ALTER TABLE `andi_makuru_umuryango`
  MODIFY `andi_makuru_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ibyiciro`
--
ALTER TABLE `ibyiciro`
  MODIFY `ibyiciro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `igikorwa`
--
ALTER TABLE `igikorwa`
  MODIFY `igikorwa_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `igipangu`
--
ALTER TABLE `igipangu`
  MODIFY `igipangu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `inshingano`
--
ALTER TABLE `inshingano`
  MODIFY `inshingano_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `inzu`
--
ALTER TABLE `inzu`
  MODIFY `inzu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `isibo`
--
ALTER TABLE `isibo`
  MODIFY `isibo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nyirinzu`
--
ALTER TABLE `nyirinzu`
  MODIFY `nyirinzu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ubwishyu_mituweli`
--
ALTER TABLE `ubwishyu_mituweli`
  MODIFY `ubwishyu_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ubwishyu_umutekano`
--
ALTER TABLE `ubwishyu_umutekano`
  MODIFY `ubwishyu_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ubwisungane`
--
ALTER TABLE `ubwisungane`
  MODIFY `ubwisungane_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ubwitabire`
--
ALTER TABLE `ubwitabire`
  MODIFY `ubwitabire_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `umuryango`
--
ALTER TABLE `umuryango`
  MODIFY `umuryango_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `umuturage`
--
ALTER TABLE `umuturage`
  MODIFY `umuturage_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `umuyobozi_isibo`
--
ALTER TABLE `umuyobozi_isibo`
  MODIFY `chefIsibo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `umuyobozi_umuryango`
--
ALTER TABLE `umuyobozi_umuryango`
  MODIFY `chefUmuryango_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amafoto`
--
ALTER TABLE `amafoto`
  ADD CONSTRAINT `amafoto_ibfk_1` FOREIGN KEY (`igikorwa_id`) REFERENCES `igikorwa` (`igikorwa_id`);

--
-- Constraints for table `andi_makuru_igikorwa`
--
ALTER TABLE `andi_makuru_igikorwa`
  ADD CONSTRAINT `andi_makuru_igikorwa_ibfk_1` FOREIGN KEY (`igikorwa_id`) REFERENCES `igikorwa` (`igikorwa_id`);

--
-- Constraints for table `andi_makuru_igipangu`
--
ALTER TABLE `andi_makuru_igipangu`
  ADD CONSTRAINT `andi_makuru_igipangu_ibfk_1` FOREIGN KEY (`igipangu_id`) REFERENCES `igipangu` (`igipangu_id`);

--
-- Constraints for table `andi_makuru_umuryango`
--
ALTER TABLE `andi_makuru_umuryango`
  ADD CONSTRAINT `andi_makuru_umuryango_ibfk_1` FOREIGN KEY (`umuryango_id`) REFERENCES `umuryango` (`umuryango_id`);

--
-- Constraints for table `igipangu`
--
ALTER TABLE `igipangu`
  ADD CONSTRAINT `igipangu_ibfk_1` FOREIGN KEY (`isibo_id`) REFERENCES `isibo` (`isibo_id`);

--
-- Constraints for table `inzu`
--
ALTER TABLE `inzu`
  ADD CONSTRAINT `inzu_ibfk_1` FOREIGN KEY (`igipangu_id`) REFERENCES `igipangu` (`igipangu_id`);

--
-- Constraints for table `nyirinzu`
--
ALTER TABLE `nyirinzu`
  ADD CONSTRAINT `nyirinzu_ibfk_1` FOREIGN KEY (`inzu_id`) REFERENCES `inzu` (`inzu_id`),
  ADD CONSTRAINT `nyirinzu_ibfk_2` FOREIGN KEY (`umuturage_id`) REFERENCES `umuturage` (`umuturage_id`),
  ADD CONSTRAINT `umuryango` FOREIGN KEY (`umuryango_id`) REFERENCES `umuryango` (`umuryango_id`);

--
-- Constraints for table `ubwishyu_mituweli`
--
ALTER TABLE `ubwishyu_mituweli`
  ADD CONSTRAINT `ubwishyu_mituweli_ibfk_1` FOREIGN KEY (`umuturage_id`) REFERENCES `umuturage` (`umuturage_id`);

--
-- Constraints for table `umuryango`
--
ALTER TABLE `umuryango`
  ADD CONSTRAINT `umuryango_ibfk_1` FOREIGN KEY (`ibyiciro_id`) REFERENCES `ibyiciro` (`ibyiciro_id`),
  ADD CONSTRAINT `umuryango_ibfk_2` FOREIGN KEY (`ubwisungane_id`) REFERENCES `ubwisungane` (`ubwisungane_id`);

--
-- Constraints for table `umuturage`
--
ALTER TABLE `umuturage`
  ADD CONSTRAINT `umuturage_ibfk_1` FOREIGN KEY (`ibyiciro_id`) REFERENCES `ibyiciro` (`ibyiciro_id`),
  ADD CONSTRAINT `umuturage_ibfk_2` FOREIGN KEY (`inshingano_id`) REFERENCES `inshingano` (`inshingano_id`),
  ADD CONSTRAINT `umuturage_ibfk_3` FOREIGN KEY (`umuryango_id`) REFERENCES `umuryango` (`umuryango_id`),
  ADD CONSTRAINT `umuturage_ibfk_4` FOREIGN KEY (`ubwisungane_id`) REFERENCES `ubwisungane` (`ubwisungane_id`),
  ADD CONSTRAINT `umuturage_ibfk_5` FOREIGN KEY (`inshingano2_id`) REFERENCES `inshingano` (`inshingano_id`),
  ADD CONSTRAINT `umuturage_ibfk_6` FOREIGN KEY (`inshingano3_id`) REFERENCES `inshingano` (`inshingano_id`);

--
-- Constraints for table `umuyobozi_isibo`
--
ALTER TABLE `umuyobozi_isibo`
  ADD CONSTRAINT `insh` FOREIGN KEY (`inshingano_id`) REFERENCES `inshingano` (`inshingano_id`),
  ADD CONSTRAINT `umuyobozi_isibo_ibfk_1` FOREIGN KEY (`isibo_id`) REFERENCES `isibo` (`isibo_id`),
  ADD CONSTRAINT `umuyobozi_isibo_ibfk_2` FOREIGN KEY (`umuturage_id`) REFERENCES `umuturage` (`umuturage_id`);

--
-- Constraints for table `umuyobozi_umuryango`
--
ALTER TABLE `umuyobozi_umuryango`
  ADD CONSTRAINT `umuturage` FOREIGN KEY (`umuturage_id`) REFERENCES `umuturage` (`umuturage_id`),
  ADD CONSTRAINT `umuyobozi_umuryango_ibfk_2` FOREIGN KEY (`umuryango_id`) REFERENCES `umuryango` (`umuryango_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
