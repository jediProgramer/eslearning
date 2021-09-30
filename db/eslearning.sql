-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 05:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eslearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_accountbank`
--

CREATE TABLE `eslearning_accountbank` (
  `idaccountbank` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `accountname` varchar(250) NOT NULL,
  `accountnumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_accountbank`
--

INSERT INTO `eslearning_accountbank` (`idaccountbank`, `iduser`, `bank`, `accountname`, `accountnumber`) VALUES
(1, 'u001', '009 - BANK BNI', 'Erlangga', '0707648278');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_bank`
--

CREATE TABLE `eslearning_bank` (
  `name` varchar(250) NOT NULL,
  `code` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_bank`
--

INSERT INTO `eslearning_bank` (`name`, `code`) VALUES
('BANK BRI', '002'),
('BANK EKSPOR INDONESIA', '003'),
('BANK MANDIRI', '008'),
('BANK BNI', '009'),
('BANK DANAMON', '011'),
('PERMATA BANK', '013'),
('BANK BCA', '014'),
('BANK BII', '016'),
('BANK PANIN', '019'),
('BANK ARTA NIAGA KENCANA', '020'),
('BANK NIAGA', '022'),
('BANK BUANA IND', '023'),
('BANK LIPPO', '026'),
('BANK NISP', '028'),
('AMERICAN EXPRESS BANK LTD', '030'),
('CITIBANK N.A.', '031'),
('JP. MORGAN CHASE BANK, N.A.', '032'),
('BANK OF AMERICA, N.A', '033'),
('ING INDONESIA BANK', '034'),
('BANK MULTICOR TBK.', '036'),
('BANK ARTHA GRAHA', '037'),
('BANK CREDIT AGRICOLE INDOSUEZ', '039'),
('THE BANGKOK BANK COMP. LTD', '040'),
('THE HONGKONG & SHANGHAI B.C.', '041'),
('THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042'),
('BANK SUMITOMO MITSUI INDONESIA', '045'),
('BANK DBS INDONESIA', '046'),
('BANK RESONA PERDANIA', '047'),
('BANK MIZUHO INDONESIA', '048'),
('STANDARD CHARTERED BANK', '050'),
('BANK ABN AMRO', '052'),
('BANK KEPPEL TATLEE BUANA', '053'),
('BANK CAPITAL INDONESIA, TBK.', '054'),
('BANK BNP PARIBAS INDONESIA', '057'),
('BANK UOB INDONESIA', '058'),
('KOREA EXCHANGE BANK DANAMON', '059'),
('RABOBANK INTERNASIONAL INDONESIA', '060'),
('ANZ PANIN BANK', '061'),
('DEUTSCHE BANK AG.', '067'),
('BANK WOORI INDONESIA', '068'),
('BANK OF CHINA LIMITED', '069'),
('BANK BUMI ARTA', '076'),
('BANK EKONOMI', '087'),
('BANK ANTARDAERAH', '088'),
('BANK HAGA', '089'),
('BANK IFI', '093'),
('BANK CENTURY, TBK.', '095'),
('BANK MAYAPADA', '097'),
('BANK JABAR', '110'),
('BANK DKI', '111'),
('BPD DIY', '112'),
('BANK JATENG', '113'),
('BANK JATIM', '114'),
('BPD JAMBI', '115'),
('BPD ACEH', '116'),
('BANK SUMUT', '117'),
('BANK NAGARI', '118'),
('BANK RIAU', '119'),
('BANK SUMSEL', '120'),
('BANK LAMPUNG', '121'),
('BPD KALSEL', '122'),
('BPD KALIMANTAN BARAT', '123'),
('BPD KALTIM', '124'),
('BPD KALTENG', '125'),
('BPD SULSEL', '126'),
('BANK SULUT', '127'),
('BPD NTB', '128'),
('BPD BALI', '129'),
('BANK NTT', '130'),
('BANK MALUKU', '131'),
('BPD PAPUA', '132'),
('BANK BENGKULU', '133'),
('BPD SULAWESI TENGAH', '134'),
('BANK SULTRA', '135'),
('BANK NUSANTARA PARAHYANGAN', '145'),
('BANK SWADESI', '146'),
('BANK MUAMALAT', '147'),
('BANK MESTIKA', '151'),
('BANK METRO EXPRESS', '152'),
('BANK SHINTA INDONESIA', '153'),
('BANK MASPION', '157'),
('BANK HAGAKITA', '159'),
('BANK GANESHA', '161'),
('BANK WINDU KENTJANA', '162'),
('HALIM INDONESIA BANK', '164'),
('BANK HARMONI INTERNATIONAL', '166'),
('BANK KESAWAN', '167'),
('BANK TABUNGAN NEGARA (PERSERO)', '200'),
('BANK HIMPUNAN SAUDARA 1906, TBK .', '212'),
('BANK TABUNGAN PENSIUNAN NASIONAL', '213'),
('BANK SWAGUNA', '405'),
('BANK JASA ARTA', '422'),
('BANK MEGA', '426'),
('BANK JASA JAKARTA', '427'),
('BANK BUKOPIN', '441'),
('BANK SYARIAH MANDIRI', '451'),
('BANK BISNIS INTERNASIONAL', '459'),
('BANK SRI PARTHA', '466'),
('BANK JASA JAKARTA', '472'),
('BANK BINTANG MANUNGGAL', '484'),
('BANK BUMIPUTERA', '485'),
('BANK YUDHA BHAKTI', '490'),
('BANK MITRANIAGA', '491'),
('BANK AGRO NIAGA', '494'),
('BANK INDOMONEX', '498'),
('BANK ROYAL INDONESIA', '501'),
('BANK ALFINDO', '503'),
('BANK SYARIAH MEGA', '506'),
('BANK INA PERDANA', '513'),
('BANK HARFA', '517'),
('PRIMA MASTER BANK', '520'),
('BANK PERSYARIKATAN INDONESIA', '521'),
('BANK DIPO INTERNATIONAL', '523'),
('BANK AKITA', '525'),
('LIMAN INTERNATIONAL BANK', '526'),
('ANGLOMAS INTERNASIONAL BANK', '531'),
('BANK KESEJAHTERAAN EKONOMI', '535'),
('BANK UIB', '536'),
('BANK ARTOS IND', '542'),
('BANK PURBA DANARTA', '547'),
('BANK MULTI ARTA SENTOSA', '548'),
('BANK MAYORA', '553'),
('BANK INDEX SELINDO', '555'),
('BANK EKSEKUTIF', '558'),
('CENTRATAMA NASIONAL BANK', '559'),
('BANK FAMA INTERNASIONAL', '562'),
('BANK SINAR HARAPAN BALI', '564'),
('BANK VICTORIA INTERNATIONAL', '566'),
('BANK HARDA', '567'),
('BANK FINCONESIA', '945'),
('BANK MERINCORP', '946'),
('BANK MAYBANK INDOCORP', '947'),
('BANK OCBC – INDONESIA', '948'),
('BANK CHINA TRUST INDONESIA', '949'),
('BANK COMMONWEALTH', '950');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_bannerberanda`
--

CREATE TABLE `eslearning_bannerberanda` (
  `idbanner` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_bannerberanda`
--

INSERT INTO `eslearning_bannerberanda` (`idbanner`, `iduser`, `idlanguage`, `text`, `image`) VALUES
(1, 'u001', 1, '<h1>Example headline.</h1>\r\n                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                <p align=\"center\"><a class=\"btn btn-primary btn-more rounded-0 btn-lg\" href=\"#\">Sign up today</a></p>', 'bannerhome.jpg'),
(2, 'u001', 2, '<h1 class=\"banner-title display-4 text-uppercase wow fadeInLeftBig\">Get Unlimited Knowledge</h1>\r\n			<div class=\"banner-description  wow fadeInLeftBig\">\r\n			  <p class=\"banner-text\" class=\"lead\">Learn online from home, bring the world of knowledge to your home. Get quality online courses directly from the experts</p>\r\n			</div>\r\n			<div class=\"row\">\r\n			   <div class=\"col-lg-12\">\r\n <form  action=\"http://localhost/eslearning/learning/searchcourses\" method=\"post\" enctype=\"multipart/form-data\">\r\n				<div class=\"input-group input-group-lg\">\r\n				\r\n<input type=\"text\" class=\"form-control input-lg rounded-0\"  id=\"search\" name=\"search\"  placeholder=\"What do you want to learn?\">\r\n				  <span class=\"input-group-btn\">\r\n					<button class=\"btn btn-danger btn-lg rounded-0\" type=\"submit\"><i class=\"fas fa-search\"></i></button>\r\n				  </span>\r\n				</div>\r\n</form>\r\n			  </div>\r\n			</div>', 'bannerhome.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_bannerweb`
--

CREATE TABLE `eslearning_bannerweb` (
  `idbannerweb` int(4) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `idmenuutama` int(4) NOT NULL,
  `idmenukedua` int(4) NOT NULL,
  `idmenuketiga` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_category`
--

CREATE TABLE `eslearning_category` (
  `idcategory` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `favorite` int(4) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_category`
--

INSERT INTO `eslearning_category` (`idcategory`, `iduser`, `idlanguage`, `title`, `description`, `image`, `favorite`, `date`, `time`) VALUES
(1, 'u001', 1, 'Pemrograman Web', '', 'pemrogramanweb.png', 73, '2020-05-14', '12:05:38'),
(2, 'u001', 1, 'Pemrograman Mobile', '', 'pemrogramanmobile.png', 60, '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_content`
--

CREATE TABLE `eslearning_content` (
  `idcontent` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `idsyllabus` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `title` varchar(250) NOT NULL,
  `video` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(250) NOT NULL,
  `type` int(4) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_content`
--

INSERT INTO `eslearning_content` (`idcontent`, `idcourses`, `idsyllabus`, `iduser`, `title`, `video`, `link`, `file`, `description`, `duration`, `type`, `date`, `time`) VALUES
(1, 1, 1, 'u001', 'HTML Dasar', 'https://www.youtube.com/embed/NBZ9Ro6UKV8', '', '', '<p>Pengenalan HTML<br></p>', '03:00', 1, '2020-05-20', '03:11:21'),
(2, 1, 1, 'u001', 'Pengenalan Tag HTML', 'https://www.youtube.com/embed/i3GE-toQg-o', '', '', '<p>Pengenalan Tag HTML<br></p>', '10:15', 1, '2020-05-20', '01:46:50'),
(3, 1, 1, 'u001', 'Pengenalan Sintak HTML', 'https://www.youtube.com/embed/3U1AhjEf7DM', '', '', '<p>Pengenalan Sintak HTML<br></p>', '06:35', 1, '2020-05-20', '01:48:28'),
(4, 1, 1, 'u001', 'Slide HTML', '', '', 'slide1.pdf', '<p>Slide HTML<br></p>', '04:00', 2, '2020-05-20', '03:19:24'),
(5, 1, 1, 'u001', 'File Materi Bagian 1', '', 'https://rapidgator.net/file/c0175a7751ec083ecd276f6010756c82/JUNY-022.mp4', '', '<p>File Materi Bagian 1<br></p>', '', 3, '2020-05-20', '03:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_contentprogress`
--

CREATE TABLE `eslearning_contentprogress` (
  `idcontentprogress` int(4) NOT NULL,
  `idcontent` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `idsyllabus` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `progress` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_contentprogress`
--

INSERT INTO `eslearning_contentprogress` (`idcontentprogress`, `idcontent`, `idcourses`, `idsyllabus`, `iduser`, `progress`, `date`) VALUES
(1, 1, 1, 1, 'u200564b44', 1, '2020-06-01'),
(2, 2, 1, 1, 'u200564b44', 1, '2020-06-02'),
(3, 3, 1, 1, 'u200564b44', 1, '2020-06-03'),
(4, 4, 1, 1, 'u200564b44', 1, '2020-06-03'),
(5, 5, 1, 1, 'u200564b44', 1, '2020-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_countries`
--

CREATE TABLE `eslearning_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eslearning_countries`
--

INSERT INTO `eslearning_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'YU', 'Yugoslavia'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_courses`
--

CREATE TABLE `eslearning_courses` (
  `idcourses` int(4) NOT NULL,
  `idcategory` int(4) NOT NULL,
  `idsubcategory` int(4) NOT NULL,
  `idcoursetype` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `idlevel` int(4) NOT NULL,
  `idcurrency` int(4) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `favorite` int(4) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `quota` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_courses`
--

INSERT INTO `eslearning_courses` (`idcourses`, `idcategory`, `idsubcategory`, `idcoursetype`, `iduser`, `idlanguage`, `idlevel`, `idcurrency`, `title`, `description`, `image`, `price`, `favorite`, `date`, `time`, `start_date`, `end_date`, `quota`) VALUES
(1, 1, 1, 2, 'u001', 1, 1, 1, 'Belajar HTML Dasar', '<p style=\"text-align:justify\">Hypertext Markup Language adalah sebuah bahasa markah yang digunakan untuk membuat sebuah halaman web, menampilkan berbagai informasi di dalam sebuah penjelajah web Internet dan pemformatan hiperteks sederhana yang ditulis dalam berkas format ASCII agar dapat menghasilkan tampilan wujud yang terintegrasi.</p>\r\n', 'html.jpg', '150000.00', 3, '2020-05-14', '03:20:16', NULL, NULL, 0),
(2, 1, 1, 2, 'u001', 1, 1, 1, 'Belajar Bootstrap', '', 'html.jpg', '150000.00', 0, '2020-06-02', '20:02:21', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_coursetype`
--

CREATE TABLE `eslearning_coursetype` (
  `idcoursetype` int(4) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_coursetype`
--

INSERT INTO `eslearning_coursetype` (`idcoursetype`, `name`) VALUES
(1, 'Daring'),
(2, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_currency`
--

CREATE TABLE `eslearning_currency` (
  `idcurrency` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `currency` varchar(250) NOT NULL,
  `symbol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_currency`
--

INSERT INTO `eslearning_currency` (`idcurrency`, `iduser`, `currency`, `symbol`) VALUES
(1, 'u001', 'Rupiah', 'Rp'),
(2, 'u001', 'USD', '$');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_education`
--

CREATE TABLE `eslearning_education` (
  `ideducation` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `level` varchar(250) NOT NULL,
  `field_of_study` varchar(250) NOT NULL,
  `college` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `graduation_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_education`
--

INSERT INTO `eslearning_education` (`ideducation`, `iduser`, `level`, `field_of_study`, `college`, `city`, `country`, `graduation_year`) VALUES
(1, 'u001', 'S1', 'Teknik Informatika', 'Universitas Komputer Indonesia (UNIKOM)', 'Bandung', 'Indonesia', 2009),
(2, 'u001', 'S2', 'Teknik Informatika', 'Institut Teknologi Bandung', 'Bandung', 'Indonesia', 2016),
(3, 'u2003fbb0c', 'S1', 'Computer Science', 'Universitas Pendidikan Indonesia', 'Bandung', 'Indonesia', 2010);

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_educationlevel`
--

CREATE TABLE `eslearning_educationlevel` (
  `ideducationlevel` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `educationlevel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_educationlevel`
--

INSERT INTO `eslearning_educationlevel` (`ideducationlevel`, `iduser`, `educationlevel`) VALUES
(1, 'u001', 'S1'),
(2, 'u001', 'S2'),
(3, 'u001', 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_emailtemp`
--

CREATE TABLE `eslearning_emailtemp` (
  `iduser` varchar(12) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_emailtemp`
--

INSERT INTO `eslearning_emailtemp` (`iduser`, `email`) VALUES
('u200520562', 'rey.palpatin@resistance.gov'),
('u21098f840', 'tes@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_enroll`
--

CREATE TABLE `eslearning_enroll` (
  `idenroll` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_enroll`
--

INSERT INTO `eslearning_enroll` (`idenroll`, `idcourses`, `iduser`, `date`) VALUES
(1, 1, 'u200564b44', '2020-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_favorite`
--

CREATE TABLE `eslearning_favorite` (
  `idfavorite` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_instagram`
--

CREATE TABLE `eslearning_instagram` (
  `idinstagram` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `instagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_instructors`
--

CREATE TABLE `eslearning_instructors` (
  `idinstructors` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_instructors`
--

INSERT INTO `eslearning_instructors` (`idinstructors`, `idcourses`, `iduser`, `date`, `time`) VALUES
(1, 1, 'u2003fbb0c', '2020-05-15', '02:20:16'),
(2, 2, 'u200510ca3', '2020-06-07', '24:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_language`
--

CREATE TABLE `eslearning_language` (
  `idlanguage` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `language` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_language`
--

INSERT INTO `eslearning_language` (`idlanguage`, `iduser`, `language`, `icon`) VALUES
(1, 'u001', 'Indonesia', 'flag-icon flag-icon-id'),
(2, 'u001', 'English', 'flag-icon flag-icon-us');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_lecturer`
--

CREATE TABLE `eslearning_lecturer` (
  `idlecturer` int(11) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `golongan` varchar(250) NOT NULL,
  `pangkat` varchar(250) NOT NULL,
  `jafung` varchar(250) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `programmes` varchar(250) NOT NULL,
  `kbk` varchar(250) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `profile` text NOT NULL,
  `research_areas` text NOT NULL,
  `research_interests` text NOT NULL,
  `sinta_id` varchar(7) NOT NULL,
  `scopus_id` varchar(11) NOT NULL,
  `google_scholar_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_lecturer`
--

INSERT INTO `eslearning_lecturer` (`idlecturer`, `iduser`, `nip`, `nidn`, `fullname`, `golongan`, `pangkat`, `jafung`, `jabatan`, `programmes`, `kbk`, `phoneno`, `email`, `website`, `picture`, `address`, `profile`, `research_areas`, `research_interests`, `sinta_id`, `scopus_id`, `google_scholar_id`) VALUES
(1, 'u001', '198607082018031001', '0008078603', 'Erlangga, S.Kom., M.T.', 'III/b', 'Penata Muda Tingkat 1', 'Asisten Ahli', 'Tidak Menjabat', 'Pendidikan Ilmu Komputer', 'Sistem Informasi', '081321397362', 'erlangga@upi.edu', 'catatan-erlangga.com', '25181550730230.jpg', '<p>Jl. Dokter Setiabudhi No.276A Isola Cidadap, Isola, Kec. Sukasari, Kota Bandung, Jawa Barat 40154<br></p>', '<!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG></o:AllowPNG>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:EnableOpenTypeKerning></w:EnableOpenTypeKerning>\r\n   <w:DontFlipMirrorIndents></w:DontFlipMirrorIndents>\r\n   <w:OverrideTableStyleHps></w:OverrideTableStyleHps>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"></m:mathFont>\r\n   <m:brkBin m:val=\"before\"></m:brkBin>\r\n   <m:brkBinSub m:val=\"--\"></m:brkBinSub>\r\n   <m:smallFrac m:val=\"off\"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val=\"0\"></m:lMargin>\r\n   <m:rMargin m:val=\"0\"></m:rMargin>\r\n   <m:defJc m:val=\"centerGroup\"></m:defJc>\r\n   <m:wrapIndent m:val=\"1440\"></m:wrapIndent>\r\n   <m:intLim m:val=\"subSup\"></m:intLim>\r\n   <m:naryLim m:val=\"undOvr\"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"267\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"></w:LsdException>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin:0cm;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	mso-bidi-font-size:11.0pt;\r\n	font-family:\"Arial\",\"sans-serif\";}\r\n</style>\r\n<![endif]--><span style=\"font-size:12.0pt;line-height:\r\n150%;font-family:\" arial\",\"sans-serif\";mso-fareast-font-family:calibri;=\"\" mso-ansi-language:in;mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\" lang=\"IN\">M</span><span style=\"font-size:12.0pt;line-height:150%;font-family:\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\">enerima gelar Sarjana </span><span style=\"font-size:12.0pt;line-height:150%;font-family:\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-ansi-language:in;mso-fareast-language:en-us;=\"\" mso-bidi-language:ar-sa\"=\"\" lang=\"IN\">dalam bidang Teknik Informatika </span><span style=\"font-size:12.0pt;line-height:150%;font-family:\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\">dari Universitas Indonesia Komputer (UNIKOM),\r\nBandung, pada tahun 2008 dan </span><span style=\"font-size:12.0pt;\r\nline-height:150%;font-family:\" arial\",\"sans-serif\";mso-fareast-font-family:calibri;=\"\" mso-ansi-language:in;mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\" lang=\"IN\">memperoleh\r\ngelar </span><span style=\"font-size:12.0pt;line-height:150%;font-family:\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\">M.T.</span><span style=\"font-size:12.0pt;\r\nline-height:150%;font-family:\" arial\",\"sans-serif\";mso-fareast-font-family:calibri;=\"\" mso-ansi-language:in;mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\" lang=\"IN\"> dalam\r\nbidang Magister Informatika</span><span style=\"font-size:12.0pt;line-height:\r\n150%;font-family:\" arial\",\"sans-serif\";mso-fareast-font-family:calibri;=\"\" mso-ansi-language:en-us;mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\">\r\ndari Institut Teknologi Bandung, Indonesia. </span><span style=\"font-size:12.0pt;line-height:150%;font-family:\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-ansi-language:in;mso-fareast-language:en-us;=\"\" mso-bidi-language:ar-sa\"=\"\" lang=\"IN\">Saat ini aktif sebagai dosen di Universitas\r\nPendidikan Indonesia, Bandung, Departemen Pendidikan Ilmu Komputer, Fakultas\r\nPendidikan Matematika dan Ilmu Komputer. </span><span style=\"font-size:12.0pt;line-height:150%;font-family:\" arial\",\"sans-serif\";=\"\" mso-fareast-font-family:calibri;mso-ansi-language:in;mso-fareast-language:en-us;=\"\" mso-bidi-language:ar-sa\"=\"\" lang=\"IN\"></span>', '<ol><li>Mobile Programing</li><li>Mobile Learning</li><li>Information System</li></ol>', '<ol><li>Mobile Programing</li><li>Mobile Learning</li><li>Sistem Informasi</li><li>IT Governance.</li></ol>', '6653131', '57189244467', 'Tn9VtkEAAAAJ'),
(2, 'u001', '', '', 'Prof. Dr. Munir, M.IT.', 'IV/d', '', 'Guru Besar', '', '', '', '', '', '', 'prof_munir.jpeg', '', '', '', '', '', '', ''),
(3, 'u001', '', '', 'Prof. Dr. Wawan Setiawan, M.Kom.', 'IV/d', '', 'Guru Besar', '', '', '', '', '', '', 'prof_wawan.jpeg', '', '', '', '', '', '', ''),
(4, 'u001', '', '', 'Yaya Wihardi, S.Kom., M.Kom.', 'III/b', '', 'Asisten Ahli', '', '', '', '', '', '', 'yaya.jpg', '', '', '', '', '', '', ''),
(5, 'u001', '', '', 'Jajang Kusnendar, M.T.', 'III/d', '', 'Lektor', '', '', '', '', '', '', 'jajang.jpeg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_level`
--

CREATE TABLE `eslearning_level` (
  `idlevel` int(4) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_level`
--

INSERT INTO `eslearning_level` (`idlevel`, `idlanguage`, `iduser`, `level`) VALUES
(1, 1, 'u001', 'Pemula'),
(2, 1, 'u001', 'Menengah'),
(3, 1, 'u001', 'Mahir');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_menukedua`
--

CREATE TABLE `eslearning_menukedua` (
  `idmenukedua` int(4) NOT NULL,
  `idmenuutama` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `menu` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_menuketiga`
--

CREATE TABLE `eslearning_menuketiga` (
  `idmenuketiga` int(4) NOT NULL,
  `idmenukedua` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `menu` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_menuutama`
--

CREATE TABLE `eslearning_menuutama` (
  `idmenuutama` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `menu` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `main_menu` int(4) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_menuutama`
--

INSERT INTO `eslearning_menuutama` (`idmenuutama`, `iduser`, `idlanguage`, `menu`, `link`, `main_menu`, `type`) VALUES
(1, 'u001', 1, 'Tentang', 'pagecontent/pages/1', 1, 'single'),
(2, 'u001', 1, 'Bantuan', 'pagecontent/pages/2', 1, 'single'),
(3, 'u001', 2, 'About', '', 1, 'single'),
(4, 'u001', 2, 'Help', '', 1, 'single');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_message`
--

CREATE TABLE `eslearning_message` (
  `idmessage` int(4) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `website` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `view` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_message`
--

INSERT INTO `eslearning_message` (`idmessage`, `name`, `email`, `phone`, `website`, `message`, `view`, `date`) VALUES
(3, 'Erlangga', 'erlangga@upi.edu', '081321397362', 'catatan-erlangga.com', 'Latisha Zayna Syakira cantik anaknya Papa Angga dan Ibu Raisa', 0, '2020-04-15 03:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_navcategory`
--

CREATE TABLE `eslearning_navcategory` (
  `idnavcategory` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_navcategory`
--

INSERT INTO `eslearning_navcategory` (`idnavcategory`, `iduser`, `name`) VALUES
(1, 'u001', 'WEBSITES SETTINGS'),
(2, 'u001', 'LMS SETTINGS'),
(3, 'u001', 'REPORTING'),
(4, 'u001', 'ADMIN SETTINGS');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_navigation`
--

CREATE TABLE `eslearning_navigation` (
  `idnavigation` int(4) NOT NULL,
  `idnavcategory` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `name` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_navigation`
--

INSERT INTO `eslearning_navigation` (`idnavigation`, `idnavcategory`, `iduser`, `name`, `icon`, `link`) VALUES
(1, 1, 'u001', 'Websites Info', 'fas fa-globe', 'infowebsite'),
(2, 1, 'u001', 'Websites Menu', 'fas fa-bars', ''),
(3, 1, 'u001', 'Websites Banner', 'fas fa-image', ''),
(4, 1, 'u001', 'Pages', 'fas fa-book-open', 'pages/halamanweb'),
(5, 1, 'u001', 'Social Media Widgets', 'fab fa-empire', ''),
(6, 2, 'u001', 'Manage Courses', 'fas fa-edit', ''),
(7, 2, 'u001', 'Courses Users', 'fas fa-user-friends', ''),
(8, 2, 'u001', 'Payment Method', 'fas fa-donate', ''),
(9, 3, 'u001', 'Monitoring Report', 'fas fa-eye', 'monitoringreport'),
(10, 3, 'u001', 'Payment Report', 'fas fa-file-invoice-dollar', 'paymentreport'),
(11, 3, 'u001', 'Imcome Report', 'fas fa-money-check', 'incomereport'),
(12, 4, 'u001', 'Navigation', 'fas fa-bars', ''),
(13, 4, 'u001', 'Roles', 'fas fa-male', 'roles'),
(15, 4, 'u001', 'Users Access', 'fas fa-key', 'permissions'),
(16, 4, 'u001', 'Users', 'fa fa-user', 'users'),
(17, 4, 'u001', 'Param', 'fas fa-cog', ''),
(18, 4, 'u001', 'Users Log', 'fas fa-book', 'userslog');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_order`
--

CREATE TABLE `eslearning_order` (
  `idorder` char(5) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `sendingbank` varchar(250) NOT NULL,
  `sendingaccountnumber` varchar(250) NOT NULL,
  `sendingaccountname` varchar(250) NOT NULL,
  `accountbank` varchar(250) NOT NULL,
  `amountpayment` decimal(15,2) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `datepayment` date NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_order`
--

INSERT INTO `eslearning_order` (`idorder`, `iduser`, `idcourses`, `sendingbank`, `sendingaccountnumber`, `sendingaccountname`, `accountbank`, `amountpayment`, `status`, `date`, `datepayment`, `file`) VALUES
('19485', 'u200564b44', 1, '009 - BANK BNI', '71018010910', 'Erbadut', '009 - BANK BNI', '165485.00', 3, '2020-05-28', '2020-05-28', 'MBRC_1584764080498.png'),
('52298', 'u200564b44', 2, '', '', '', '', '0.00', 1, '2021-09-30', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_pagesweb`
--

CREATE TABLE `eslearning_pagesweb` (
  `idpagesweb` int(4) NOT NULL,
  `idmenuutama` int(4) NOT NULL,
  `idmenukedua` int(4) NOT NULL,
  `idmenuketiga` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `pages` text NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_pagesweb`
--

INSERT INTO `eslearning_pagesweb` (`idpagesweb`, `idmenuutama`, `idmenukedua`, `idmenuketiga`, `iduser`, `pages`, `type`) VALUES
(1, 1, 0, 0, 'u001', '<p>Tentang</p>\r\n', 'single'),
(2, 2, 0, 0, 'u001', '<p>Bantuan</p>\r\n', 'single');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_payment`
--

CREATE TABLE `eslearning_payment` (
  `idpayment` char(5) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `idorder` char(5) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_payment`
--

INSERT INTO `eslearning_payment` (`idpayment`, `iduser`, `idcourses`, `idorder`, `price`, `date`) VALUES
('19485', 'u200564b44', 1, '19485', '165485.00', '2020-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_permissions`
--

CREATE TABLE `eslearning_permissions` (
  `idpermissions` int(4) NOT NULL,
  `idroles` int(4) NOT NULL,
  `idnavcategory` int(4) NOT NULL,
  `idnavigation` int(4) NOT NULL,
  `idsubnavigation` int(4) NOT NULL,
  `users_access` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eslearning_permissions`
--

INSERT INTO `eslearning_permissions` (`idpermissions`, `idroles`, `idnavcategory`, `idnavigation`, `idsubnavigation`, `users_access`) VALUES
(1, 1, 1, 1, 0, 1),
(2, 1, 1, 2, 1, 1),
(3, 1, 1, 2, 2, 1),
(4, 1, 1, 2, 3, 1),
(5, 1, 1, 3, 4, 1),
(6, 1, 1, 3, 5, 1),
(7, 1, 1, 4, 0, 1),
(8, 1, 1, 5, 6, 1),
(9, 1, 1, 5, 7, 1),
(10, 1, 2, 6, 8, 1),
(11, 1, 2, 6, 9, 1),
(12, 1, 2, 6, 10, 1),
(13, 1, 2, 6, 11, 1),
(14, 1, 2, 7, 12, 1),
(15, 1, 2, 7, 13, 1),
(16, 1, 2, 8, 14, 1),
(17, 1, 3, 9, 0, 1),
(18, 1, 3, 10, 0, 1),
(19, 1, 3, 11, 0, 1),
(20, 1, 4, 12, 15, 1),
(21, 1, 4, 12, 16, 1),
(22, 1, 4, 12, 17, 1),
(23, 1, 4, 13, 0, 1),
(24, 1, 4, 15, 0, 1),
(25, 1, 4, 16, 0, 1),
(26, 1, 4, 17, 18, 1),
(27, 1, 4, 17, 19, 1),
(28, 1, 4, 17, 20, 1),
(29, 1, 4, 18, 0, 1),
(30, 2, 1, 1, 0, 1),
(31, 2, 1, 2, 1, 1),
(32, 2, 1, 2, 2, 1),
(33, 2, 1, 2, 3, 1),
(34, 2, 1, 3, 4, 1),
(35, 2, 1, 3, 5, 1),
(36, 2, 1, 4, 0, 1),
(37, 2, 1, 5, 6, 1),
(38, 2, 1, 5, 7, 1),
(39, 2, 2, 6, 8, 0),
(40, 2, 2, 6, 9, 0),
(41, 2, 2, 6, 10, 0),
(42, 2, 2, 6, 11, 0),
(43, 2, 2, 7, 12, 0),
(44, 2, 2, 7, 13, 0),
(45, 2, 2, 8, 14, 0),
(46, 2, 3, 9, 0, 0),
(47, 2, 3, 10, 0, 0),
(48, 2, 3, 11, 0, 0),
(49, 2, 4, 12, 15, 0),
(50, 2, 4, 12, 16, 0),
(51, 2, 4, 12, 17, 0),
(52, 2, 4, 13, 0, 0),
(53, 2, 4, 15, 0, 0),
(54, 2, 4, 16, 0, 0),
(55, 2, 4, 17, 18, 0),
(56, 2, 4, 17, 19, 0),
(57, 2, 4, 17, 20, 0),
(58, 2, 4, 18, 0, 0),
(59, 3, 1, 1, 0, 0),
(60, 3, 1, 2, 1, 0),
(61, 3, 1, 2, 2, 0),
(62, 3, 1, 2, 3, 0),
(63, 3, 1, 3, 4, 0),
(64, 3, 1, 3, 5, 0),
(65, 3, 1, 4, 0, 0),
(66, 3, 1, 5, 6, 0),
(67, 3, 1, 5, 7, 0),
(68, 3, 2, 6, 8, 1),
(69, 3, 2, 6, 9, 1),
(70, 3, 2, 6, 10, 0),
(71, 3, 2, 6, 11, 0),
(72, 3, 2, 7, 12, 1),
(73, 3, 2, 7, 13, 1),
(74, 3, 2, 8, 14, 0),
(75, 3, 3, 9, 0, 0),
(76, 3, 3, 10, 0, 0),
(77, 3, 3, 11, 0, 0),
(78, 3, 4, 12, 15, 0),
(79, 3, 4, 12, 16, 0),
(80, 3, 4, 12, 17, 0),
(81, 3, 4, 13, 0, 0),
(82, 3, 4, 15, 0, 0),
(83, 3, 4, 16, 0, 0),
(84, 3, 4, 17, 18, 0),
(85, 3, 4, 17, 19, 0),
(86, 3, 4, 17, 20, 0),
(87, 3, 4, 18, 0, 0),
(88, 4, 1, 1, 0, 0),
(89, 4, 1, 2, 1, 0),
(90, 4, 1, 2, 2, 0),
(91, 4, 1, 2, 3, 0),
(92, 4, 1, 3, 4, 0),
(93, 4, 1, 3, 5, 0),
(94, 4, 1, 4, 0, 0),
(95, 4, 1, 5, 6, 0),
(96, 4, 1, 5, 7, 0),
(97, 4, 2, 6, 8, 0),
(98, 4, 2, 6, 9, 0),
(99, 4, 2, 6, 10, 0),
(100, 4, 2, 6, 11, 0),
(101, 4, 2, 7, 12, 0),
(102, 4, 2, 7, 13, 0),
(103, 4, 2, 8, 14, 1),
(104, 4, 3, 9, 0, 0),
(105, 4, 3, 10, 0, 1),
(106, 4, 3, 11, 0, 1),
(107, 4, 4, 12, 15, 0),
(108, 4, 4, 12, 16, 0),
(109, 4, 4, 12, 17, 0),
(110, 4, 4, 13, 0, 0),
(111, 4, 4, 15, 0, 0),
(112, 4, 4, 16, 0, 0),
(113, 4, 4, 17, 18, 0),
(114, 4, 4, 17, 19, 0),
(115, 4, 4, 17, 20, 0),
(116, 4, 4, 18, 0, 0),
(117, 5, 1, 1, 0, 0),
(118, 5, 1, 2, 1, 0),
(119, 5, 1, 2, 2, 0),
(120, 5, 1, 2, 3, 0),
(121, 5, 1, 3, 4, 0),
(122, 5, 1, 3, 5, 0),
(123, 5, 1, 4, 0, 0),
(124, 5, 1, 5, 6, 0),
(125, 5, 1, 5, 7, 0),
(126, 5, 2, 6, 8, 0),
(127, 5, 2, 6, 9, 0),
(128, 5, 2, 6, 10, 1),
(129, 5, 2, 6, 11, 1),
(130, 5, 2, 7, 12, 0),
(131, 5, 2, 7, 13, 0),
(132, 5, 2, 8, 14, 0),
(133, 5, 3, 9, 0, 0),
(134, 5, 3, 10, 0, 0),
(135, 5, 3, 11, 0, 0),
(136, 5, 4, 12, 15, 0),
(137, 5, 4, 12, 16, 0),
(138, 5, 4, 12, 17, 0),
(139, 5, 4, 13, 0, 0),
(140, 5, 4, 15, 0, 0),
(141, 5, 4, 16, 0, 0),
(142, 5, 4, 17, 18, 0),
(143, 5, 4, 17, 19, 0),
(144, 5, 4, 17, 20, 0),
(145, 5, 4, 18, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_reportmaterialcourses`
--

CREATE TABLE `eslearning_reportmaterialcourses` (
  `idreportmaterialcourses` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `idcontent` int(4) NOT NULL,
  `idsyllabus` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `reportcoment` text NOT NULL,
  `readreport` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_review`
--

CREATE TABLE `eslearning_review` (
  `idreview` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `rating` int(4) NOT NULL,
  `coment` text NOT NULL,
  `yes` int(4) NOT NULL,
  `no` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_review`
--

INSERT INTO `eslearning_review` (`idreview`, `iduser`, `idcourses`, `rating`, `coment`, `yes`, `no`, `date`) VALUES
(1, 'u200510ca3', 1, 4, 'Materi yang dusampaikan sangat menarik, dan mudah dipahami.', 1, 0, '2020-05-19'),
(2, 'u200520562', 1, 4, 'Kelas yang bermanfaat dan cukup membantu dalam mempelajari dasar - dasar html.', 0, 1, '2020-05-17'),
(3, 'u200564b44', 1, 5, 'Yang disajikan dalam materi sangat mendalam dan sangat mendetail, dan saya sangat suka sekali.<br>', 1, 0, '2020-06-03'),
(4, 'u2003fbb0c', 1, 5, 'Bagus sekali materinya saya sangat suka belajar materi ini', 0, 0, '2020-05-08'),
(5, 'u001', 1, 4, 'Luar biasa mantul, belajarnya jadi sangat menyenangkan', 0, 0, '2020-05-04'),
(6, 'u200564b44', 2, 3, 'Luar Biasa', 0, 0, '2020-06-08'),
(7, 'u200520562', 2, 4, 'Keren', 0, 0, '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_reviewreport`
--

CREATE TABLE `eslearning_reviewreport` (
  `idreviewreport` int(4) NOT NULL,
  `idreview` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `report` int(4) NOT NULL,
  `yes` int(1) NOT NULL,
  `no` int(1) NOT NULL,
  `reportcoment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_reviewreport`
--

INSERT INTO `eslearning_reviewreport` (`idreviewreport`, `idreview`, `idcourses`, `iduser`, `report`, `yes`, `no`, `reportcoment`, `date`) VALUES
(1, 1, 1, 'u200564b44', 0, 0, 1, '', '2020-05-29'),
(2, 2, 1, 'u200564b44', 0, 0, 1, '', '2020-05-29'),
(3, 6, 2, 'u200564b44', 0, 1, 0, '', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_roles`
--

CREATE TABLE `eslearning_roles` (
  `idroles` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `roles` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_roles`
--

INSERT INTO `eslearning_roles` (`idroles`, `iduser`, `roles`) VALUES
(1, 'u001', 'Super Admin'),
(2, 'u001', 'Admin'),
(3, 'u001', 'Admin Content'),
(4, 'u001', 'Financial'),
(5, 'u001', 'Instructors'),
(6, 'u001', 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_subcategory`
--

CREATE TABLE `eslearning_subcategory` (
  `idsubcategory` int(4) NOT NULL,
  `idcategory` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `view` int(4) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_subcategory`
--

INSERT INTO `eslearning_subcategory` (`idsubcategory`, `idcategory`, `iduser`, `idlanguage`, `title`, `description`, `image`, `view`, `date`, `time`) VALUES
(1, 1, 'u001', 1, 'HTML', '', '', 0, '0000-00-00', '00:00:00'),
(2, 1, 'u001', 1, 'Javascript', '', '', 0, '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_subnavigation`
--

CREATE TABLE `eslearning_subnavigation` (
  `idsubnavigation` int(4) NOT NULL,
  `idnavigation` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `name` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_subnavigation`
--

INSERT INTO `eslearning_subnavigation` (`idsubnavigation`, `idnavigation`, `iduser`, `name`, `link`) VALUES
(1, 2, 'u001', 'Main Menu', 'menu/menuutamaweb'),
(2, 2, 'u001', 'Second Menu', 'menu/menukeduaweb'),
(3, 2, 'u001', 'Third Menu', 'menu/menuketigaweb'),
(4, 3, 'u001', 'Home Banner ', 'banner/halamanberandaweb'),
(5, 3, 'u001', 'Pages Banner', 'banner/halamanweb'),
(6, 5, 'u001', 'Instagram', 'instagram'),
(7, 5, 'u001', 'Twitter', 'twitter'),
(8, 6, 'u001', 'Category', 'category'),
(9, 6, 'u001', 'Sub Category', 'subcategory'),
(10, 6, 'u001', 'Courses', 'courses'),
(11, 6, 'u001', 'Courses Content', 'courses/content'),
(12, 7, 'u001', 'Instructors', 'users/instructors'),
(13, 7, 'u001', 'Users', 'coursesusers'),
(14, 8, 'u001', 'Bank Account', 'accountbank'),
(15, 12, 'u001', 'Navigation Catagory', 'navigasi/kategori'),
(16, 12, 'u001', 'Navigation', 'navigasi/navigasiadmin'),
(17, 12, 'u001', 'Sub Navigation', 'navigasi/subnavigasi'),
(18, 17, 'u001', 'Levels', 'level'),
(19, 17, 'u001', 'Language', 'language'),
(20, 17, 'u001', 'Currency', 'currency');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_syllabus`
--

CREATE TABLE `eslearning_syllabus` (
  `idsyllabus` int(4) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `syllabus` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_syllabus`
--

INSERT INTO `eslearning_syllabus` (`idsyllabus`, `idcourses`, `iduser`, `syllabus`, `date`, `time`) VALUES
(1, 1, 'u001', 'Bagian 1 - Pendahuluan', '2020-05-15', '11:18:50'),
(2, 1, 'u001', 'Bagian 2 - Pengenalan HTML', '2020-05-15', '11:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_twitter`
--

CREATE TABLE `eslearning_twitter` (
  `idtwitter` int(4) NOT NULL,
  `iduser` varchar(11) NOT NULL,
  `twitter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_userlogs`
--

CREATE TABLE `eslearning_userlogs` (
  `id` int(9) NOT NULL,
  `iduser` varchar(9) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `session_id` varchar(64) DEFAULT NULL,
  `browser` varchar(128) DEFAULT NULL,
  `log_addr` varchar(32) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `last_act_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eslearning_userlogs`
--

INSERT INTO `eslearning_userlogs` (`id`, `iduser`, `username`, `session_id`, `browser`, `log_addr`, `login_time`, `last_act_time`, `logout_time`) VALUES
(20, 'u001', 'erlangga', '20200322153220', 'Firefox', '::1', '2020-03-22 15:32:20', '2020-03-22 15:32:20', NULL),
(21, 'u001', 'erlangga', '20200322162739', 'Firefox', '::1', '2020-03-22 16:27:39', '2020-03-22 16:27:39', NULL),
(22, 'u001', 'erlangga', '20200322172927', 'Firefox', '::1', '2020-03-22 17:29:27', '2020-03-22 17:29:27', '2020-03-22 17:51:10'),
(23, 'u001', 'erlangga', '20200322175120', 'Firefox', '::1', '2020-03-22 17:51:20', '2020-03-22 17:51:20', '2020-03-22 17:58:24'),
(24, 'u001', 'erlangga', '20200322180150', 'Firefox', '127.0.0.1', '2020-03-22 18:01:50', '2020-03-22 18:01:50', '2020-03-22 18:02:25'),
(25, 'u001', 'erlangga', '20200323101843', 'Firefox', '::1', '2020-03-23 10:18:43', '2020-03-23 10:18:43', NULL),
(26, 'u001', 'erlangga', '20200323194202', 'Firefox', '::1', '2020-03-23 19:42:02', '2020-03-23 19:42:02', '2020-03-23 23:40:45'),
(27, 'u001', 'erlangga', '20200324094036', 'Firefox', '::1', '2020-03-24 09:40:36', '2020-03-24 09:40:36', NULL),
(28, 'u001', 'erlangga', '20200324122800', 'Firefox', '::1', '2020-03-24 12:28:00', '2020-03-24 12:28:00', NULL),
(29, 'u001', 'erlangga', '20200324192047', 'Firefox', '::1', '2020-03-24 19:20:47', '2020-03-24 19:20:47', NULL),
(30, 'u001', 'erlangga', '20200324192356', 'Firefox', '::1', '2020-03-24 19:23:56', '2020-03-24 19:23:56', NULL),
(31, 'u001', 'erlangga', '20200324192639', 'Firefox', '::1', '2020-03-24 19:26:39', '2020-03-24 19:26:39', NULL),
(32, 'u001', 'erlangga', '20200324192925', 'Firefox', '::1', '2020-03-24 19:29:25', '2020-03-24 19:29:25', '2020-03-24 19:35:47'),
(33, 'u001', 'erlangga', '20200325150910', 'Firefox', '127.0.0.1', '2020-03-25 15:09:10', '2020-03-25 15:09:10', '2020-03-25 19:11:08'),
(34, 'u001', 'erlangga', '20200326105449', 'Firefox', '::1', '2020-03-26 10:54:49', '2020-03-26 10:54:49', '2020-03-26 15:16:34'),
(35, 'u001', 'erlangga', '20200326152139', 'Firefox', '::1', '2020-03-26 15:21:39', '2020-03-26 15:21:39', '2020-03-26 15:27:52'),
(36, 'u001', 'erlangga', '20200326152802', 'Firefox', '::1', '2020-03-26 15:28:02', '2020-03-26 15:28:02', '2020-03-26 15:41:05'),
(37, 'u001', 'erlangga', '20200327121737', 'Firefox', '::1', '2020-03-27 12:17:37', '2020-03-27 12:17:37', NULL),
(38, 'u001', 'erlangga', '20200327123911', 'Firefox', '::1', '2020-03-27 12:39:11', '2020-03-27 12:39:11', NULL),
(39, 'u001', 'erlangga', '20200327131902', 'Firefox', '::1', '2020-03-27 13:19:02', '2020-03-27 13:19:02', NULL),
(40, 'u001', 'erlangga', '20200327134639', 'Firefox', '::1', '2020-03-27 13:46:39', '2020-03-27 13:46:39', NULL),
(41, 'u001', 'erlangga', '20200327140917', 'Firefox', '::1', '2020-03-27 14:09:17', '2020-03-27 14:09:17', NULL),
(42, 'u001', 'erlangga', '20200327144410', 'Firefox', '::1', '2020-03-27 14:44:10', '2020-03-27 14:44:10', NULL),
(43, 'u001', 'erlangga', '20200327152659', 'Firefox', '::1', '2020-03-27 15:26:59', '2020-03-27 15:26:59', NULL),
(44, 'u001', 'erlangga', '20200327161238', 'Firefox', '::1', '2020-03-27 16:12:38', '2020-03-27 16:12:38', NULL),
(45, 'u001', 'erlangga', '20200327171648', 'Firefox', '::1', '2020-03-27 17:16:48', '2020-03-27 17:16:48', '2020-03-27 17:53:44'),
(46, 'u001', 'erlangga', '20200328105524', 'Firefox', '::1', '2020-03-28 10:55:24', '2020-03-28 10:55:24', NULL),
(47, 'u001', 'erlangga', '20200328111718', 'Firefox', '::1', '2020-03-28 11:17:18', '2020-03-28 11:17:18', NULL),
(48, 'u001', 'erlangga', '20200328114716', 'Firefox', '::1', '2020-03-28 11:47:16', '2020-03-28 11:47:16', NULL),
(49, 'u001', 'erlangga', '20200328123708', 'Firefox', '::1', '2020-03-28 12:37:08', '2020-03-28 12:37:08', NULL),
(50, 'u001', 'erlangga', '20200328130323', 'Firefox', '::1', '2020-03-28 13:03:23', '2020-03-28 13:03:23', NULL),
(51, 'u001', 'erlangga', '20200328141818', 'Firefox', '::1', '2020-03-28 14:18:18', '2020-03-28 14:18:18', NULL),
(52, 'u001', 'erlangga', '20200328144103', 'Firefox', '::1', '2020-03-28 14:41:03', '2020-03-28 14:41:03', NULL),
(53, 'u001', 'erlangga', '20200328161527', 'Firefox', '::1', '2020-03-28 16:15:27', '2020-03-28 16:15:27', NULL),
(54, 'u001', 'erlangga', '20200328174304', 'Firefox', '::1', '2020-03-28 17:43:04', '2020-03-28 17:43:04', NULL),
(55, 'u001', 'erlangga', '20200328180416', 'Firefox', '::1', '2020-03-28 18:04:16', '2020-03-28 18:04:16', NULL),
(56, 'u001', 'erlangga', '20200328185112', 'Firefox', '127.0.0.1', '2020-03-28 18:51:12', '2020-03-28 18:51:12', '2020-03-28 18:51:17'),
(57, 'u001', 'erlangga', '20200329105112', 'Firefox', '::1', '2020-03-29 10:51:12', '2020-03-29 10:51:12', NULL),
(58, 'u001', 'erlangga', '20200329112845', 'Firefox', '::1', '2020-03-29 11:28:45', '2020-03-29 11:28:45', NULL),
(59, 'u001', 'erlangga', '20200329121239', 'Firefox', '::1', '2020-03-29 12:12:39', '2020-03-29 12:12:39', NULL),
(60, 'u001', 'erlangga', '20200329132727', 'Firefox', '::1', '2020-03-29 13:27:27', '2020-03-29 13:27:27', NULL),
(61, 'u001', 'erlangga', '20200329143952', 'Firefox', '::1', '2020-03-29 14:39:52', '2020-03-29 14:39:52', NULL),
(62, 'u001', 'erlangga', '20200329161101', 'Firefox', '::1', '2020-03-29 16:11:01', '2020-03-29 16:11:01', '2020-03-29 16:11:55'),
(63, 'u001', 'erlangga', '20200329161925', 'Firefox', '::1', '2020-03-29 16:19:25', '2020-03-29 16:19:25', '2020-03-29 16:20:30'),
(64, 'u001', 'erlangga', '20200329162247', 'Firefox', '::1', '2020-03-29 16:22:47', '2020-03-29 16:22:47', '2020-03-29 16:23:11'),
(65, 'u001', 'erlangga', '20200329162335', 'Firefox', '::1', '2020-03-29 16:23:35', '2020-03-29 16:23:35', '2020-03-29 16:24:02'),
(66, 'u001', 'erlangga', '20200329162427', 'Edge', '::1', '2020-03-29 16:24:27', '2020-03-29 16:24:27', '2020-03-29 16:26:52'),
(67, 'u001', 'erlangga', '20200329162742', 'Firefox', '::1', '2020-03-29 16:27:42', '2020-03-29 16:27:42', '2020-03-29 16:29:24'),
(68, 'u001', 'erlangga', '20200329173055', 'Firefox', '::1', '2020-03-29 17:30:55', '2020-03-29 17:30:55', NULL),
(69, 'u001', 'erlangga', '20200330101149', 'Firefox', '::1', '2020-03-30 10:11:49', '2020-03-30 10:11:49', NULL),
(70, 'u001', 'erlangga', '20200330104741', 'Firefox', '::1', '2020-03-30 10:47:41', '2020-03-30 10:47:41', NULL),
(71, 'u001', 'erlangga', '20200330113627', 'Firefox', '::1', '2020-03-30 11:36:27', '2020-03-30 11:36:27', NULL),
(72, 'u001', 'erlangga', '20200330113656', 'Edge', '::1', '2020-03-30 11:36:56', '2020-03-30 11:36:56', '2020-03-30 11:38:03'),
(73, 'u001', 'erlangga', '20200330114619', 'Edge', '::1', '2020-03-30 11:46:19', '2020-03-30 11:46:19', NULL),
(74, 'u001', 'erlangga', '20200330122552', 'Firefox', '::1', '2020-03-30 12:25:52', '2020-03-30 12:25:52', NULL),
(75, 'u001', 'erlangga', '20200330132638', 'Firefox', '::1', '2020-03-30 13:26:38', '2020-03-30 13:26:38', NULL),
(76, 'u001', 'erlangga', '20200330141247', 'Firefox', '::1', '2020-03-30 14:12:47', '2020-03-30 14:12:47', '2020-03-30 14:47:50'),
(77, 'u001', 'erlangga', '20200330152345', 'Firefox', '::1', '2020-03-30 15:23:45', '2020-03-30 15:23:45', '2020-03-30 15:51:15'),
(78, 'u001', 'erlangga', '20200330155617', 'Firefox', '::1', '2020-03-30 15:56:17', '2020-03-30 15:56:17', '2020-03-30 16:04:36'),
(79, 'u001', 'erlangga', '20200331100118', 'Firefox', '::1', '2020-03-31 10:01:18', '2020-03-31 10:01:18', NULL),
(80, 'u001', 'erlangga', '20200331102016', 'Firefox', '::1', '2020-03-31 10:20:16', '2020-03-31 10:20:16', NULL),
(81, 'u001', 'erlangga', '20200331112831', 'Firefox', '::1', '2020-03-31 11:28:31', '2020-03-31 11:28:31', NULL),
(82, 'u001', 'erlangga', '20200331114419', 'Firefox', '::1', '2020-03-31 11:44:19', '2020-03-31 11:44:19', NULL),
(83, 'u001', 'erlangga', '20200331132549', 'Firefox', '::1', '2020-03-31 13:25:49', '2020-03-31 13:25:49', NULL),
(84, 'u001', 'erlangga', '20200331143138', 'Firefox', '::1', '2020-03-31 14:31:38', '2020-03-31 14:31:38', NULL),
(85, 'u001', 'erlangga', '20200331174519', 'Firefox', '::1', '2020-03-31 17:45:19', '2020-03-31 17:45:19', NULL),
(86, 'u001', 'erlangga', '20200331183549', 'Firefox', '::1', '2020-03-31 18:35:49', '2020-03-31 18:35:49', NULL),
(87, 'u001', 'erlangga', '20200331185207', 'Firefox', '::1', '2020-03-31 18:52:07', '2020-03-31 18:52:07', NULL),
(88, 'u001', 'erlangga', '20200331195310', 'Firefox', '::1', '2020-03-31 19:53:10', '2020-03-31 19:53:10', NULL),
(89, 'u001', 'erlangga', '20200331203052', 'Firefox', '::1', '2020-03-31 20:30:52', '2020-03-31 20:30:52', '2020-03-31 21:20:20'),
(90, 'u001', 'erlangga', '20200401092713', 'Firefox', '::1', '2020-04-01 09:27:13', '2020-04-01 09:27:13', NULL),
(91, 'u001', 'erlangga', '20200401095454', 'Firefox', '::1', '2020-04-01 09:54:54', '2020-04-01 09:54:54', NULL),
(92, 'u001', 'erlangga', '20200401103850', 'Firefox', '::1', '2020-04-01 10:38:50', '2020-04-01 10:38:50', NULL),
(93, 'u001', 'erlangga', '20200401105933', 'Firefox', '::1', '2020-04-01 10:59:33', '2020-04-01 10:59:33', NULL),
(94, 'u001', 'erlangga', '20200401120424', 'Firefox', '::1', '2020-04-01 12:04:24', '2020-04-01 12:04:24', NULL),
(95, 'u001', 'erlangga', '20200401134024', 'Firefox', '::1', '2020-04-01 13:40:24', '2020-04-01 13:40:24', NULL),
(96, 'u001', 'erlangga', '20200401143825', 'Firefox', '::1', '2020-04-01 14:38:25', '2020-04-01 14:38:25', NULL),
(97, 'u001', 'erlangga', '20200401150635', 'Firefox', '::1', '2020-04-01 15:06:35', '2020-04-01 15:06:35', NULL),
(98, 'u001', 'erlangga', '20200401153157', 'Firefox', '::1', '2020-04-01 15:31:57', '2020-04-01 15:31:57', NULL),
(99, 'u001', 'erlangga', '20200401165614', 'Firefox', '::1', '2020-04-01 16:56:14', '2020-04-01 16:56:14', NULL),
(100, 'u001', 'erlangga', '20200401172622', 'Firefox', '::1', '2020-04-01 17:26:22', '2020-04-01 17:26:22', NULL),
(101, 'u001', 'erlangga', '20200401184618', 'Firefox', '::1', '2020-04-01 18:46:18', '2020-04-01 18:46:18', NULL),
(102, 'u001', 'erlangga', '20200401190521', 'Firefox', '::1', '2020-04-01 19:05:21', '2020-04-01 19:05:21', '2020-04-01 19:43:36'),
(103, 'u001', 'erlangga', '20200402133638', 'Firefox', '::1', '2020-04-02 13:36:38', '2020-04-02 13:36:38', NULL),
(104, 'u001', 'erlangga', '20200402135201', 'Firefox', '::1', '2020-04-02 13:52:01', '2020-04-02 13:52:01', '2020-04-02 14:37:11'),
(105, 'u001', 'erlangga', '20200402161820', 'Firefox', '::1', '2020-04-02 16:18:20', '2020-04-02 16:18:20', '2020-04-02 16:28:13'),
(106, 'u001', 'erlangga', '20200403123113', 'Firefox', '::1', '2020-04-03 12:31:13', '2020-04-03 12:31:13', '2020-04-03 13:52:12'),
(107, 'u001', 'erlangga', '20200403171330', 'Firefox', '::1', '2020-04-03 17:13:30', '2020-04-03 17:13:30', NULL),
(108, 'u001', 'erlangga', '20200403174118', 'Firefox', '::1', '2020-04-03 17:41:18', '2020-04-03 17:41:18', NULL),
(109, 'u001', 'erlangga', '20200403191113', 'Firefox', '::1', '2020-04-03 19:11:13', '2020-04-03 19:11:13', '2020-04-03 21:01:50'),
(110, 'u001', 'erlangga', '20200406125042', 'Firefox', '::1', '2020-04-06 12:50:42', '2020-04-06 12:50:42', NULL),
(111, 'u001', 'erlangga', '20200406155711', 'Firefox', '::1', '2020-04-06 15:57:11', '2020-04-06 15:57:11', NULL),
(112, 'u001', 'erlangga', '20200407092629', 'Firefox', '::1', '2020-04-07 09:26:29', '2020-04-07 09:26:29', NULL),
(113, 'u001', 'erlangga', '20200407100804', 'Firefox', '::1', '2020-04-07 10:08:04', '2020-04-07 10:08:04', '2020-04-07 10:21:08'),
(114, 'u001', 'erlangga', '20200407102115', 'Firefox', '::1', '2020-04-07 10:21:15', '2020-04-07 10:21:15', '2020-04-07 10:21:31'),
(115, 'u001', 'erlangga', '20200407130714', 'Firefox', '::1', '2020-04-07 13:07:14', '2020-04-07 13:07:14', '2020-04-07 13:09:53'),
(116, 'u001', 'erlangga', '20200407143933', 'Firefox', '::1', '2020-04-07 14:39:33', '2020-04-07 14:39:33', '2020-04-07 14:47:02'),
(117, 'u001', 'erlangga', '20200407151438', 'Firefox', '::1', '2020-04-07 15:14:38', '2020-04-07 15:14:38', '2020-04-07 15:17:58'),
(118, 'u001', 'erlangga', '20200407151802', 'Firefox', '::1', '2020-04-07 15:18:02', '2020-04-07 15:18:02', '2020-04-07 15:18:09'),
(119, 'u001', 'erlangga', '20200408130455', 'Firefox', '::1', '2020-04-08 13:04:55', '2020-04-08 13:04:55', NULL),
(120, 'u001', 'erlangga', '20200408135349', 'Firefox', '::1', '2020-04-08 13:53:49', '2020-04-08 13:53:49', '2020-04-08 14:28:23'),
(121, 'u001', 'erlangga', '20200408152553', 'Firefox', '::1', '2020-04-08 15:25:53', '2020-04-08 15:25:53', NULL),
(122, 'u001', 'erlangga', '20200408161928', 'Firefox', '::1', '2020-04-08 16:19:28', '2020-04-08 16:19:28', NULL),
(123, 'u001', 'erlangga', '20200408174554', 'Firefox', '::1', '2020-04-08 17:45:54', '2020-04-08 17:45:54', '2020-04-08 17:51:46'),
(124, 'u001', 'erlangga', '20200408175423', 'Firefox', '::1', '2020-04-08 17:54:23', '2020-04-08 17:54:23', NULL),
(125, 'u001', 'erlangga', '20200409104819', 'Firefox', '::1', '2020-04-09 10:48:19', '2020-04-09 10:48:19', '2020-04-09 10:50:07'),
(126, 'u001', 'erlangga', '20200413112641', 'Firefox', '::1', '2020-04-13 11:26:41', '2020-04-13 11:26:41', '2020-04-13 11:58:53'),
(127, 'u001', 'erlangga', '20200413124402', 'Firefox', '::1', '2020-04-13 12:44:02', '2020-04-13 12:44:02', '2020-04-13 12:44:04'),
(128, 'u001', 'erlangga', '20200413151108', 'Firefox', '::1', '2020-04-13 15:11:08', '2020-04-13 15:11:08', '2020-04-13 15:14:46'),
(129, 'u001', 'erlangga', '20200414104354', 'Firefox', '::1', '2020-04-14 10:43:54', '2020-04-14 10:43:54', NULL),
(130, 'u001', 'erlangga', '20200414134108', 'Firefox', '::1', '2020-04-14 13:41:08', '2020-04-14 13:41:08', NULL),
(131, 'u001', 'erlangga', '20200414140339', 'Firefox', '::1', '2020-04-14 14:03:39', '2020-04-14 14:03:39', NULL),
(132, 'u001', 'erlangga', '20200414155033', 'Firefox', '::1', '2020-04-14 15:50:33', '2020-04-14 15:50:33', '2020-04-14 15:59:28'),
(133, 'u001', 'erlangga', '20200415095224', 'Firefox', '::1', '2020-04-15 09:52:24', '2020-04-15 09:52:24', NULL),
(134, 'u001', 'erlangga', '20200415101551', 'Firefox', '::1', '2020-04-15 10:15:51', '2020-04-15 10:15:51', '2020-04-15 12:22:58'),
(135, 'u001', 'erlangga', '20200415125534', 'Firefox', '::1', '2020-04-15 12:55:34', '2020-04-15 12:55:34', '2020-04-15 13:17:55'),
(136, 'u001', 'erlangga', '20200415132534', 'Firefox', '::1', '2020-04-15 13:25:34', '2020-04-15 13:25:34', '2020-04-15 13:25:43'),
(137, 'u001', 'erlangga', '20200415135751', 'Firefox', '::1', '2020-04-15 13:57:51', '2020-04-15 13:57:51', '2020-04-15 15:17:11'),
(138, 'u001', 'erlangga', '20200416165855', 'Firefox', '::1', '2020-04-16 16:58:55', '2020-04-16 16:58:55', '2020-04-16 17:07:41'),
(139, 'u2003fbb0', 'yaya', '20200416170757', 'Firefox', '::1', '2020-04-16 17:07:57', '2020-04-16 17:07:57', '2020-04-16 17:08:06'),
(140, 'u001', 'erlangga', '20200416170810', 'Firefox', '::1', '2020-04-16 17:08:10', '2020-04-16 17:08:10', '2020-04-16 17:12:59'),
(141, 'u001', 'erlangga', '20200508104746', 'Firefox', '::1', '2020-05-08 10:47:46', '2020-05-08 10:47:46', NULL),
(142, 'u001', 'erlangga', '20200508105051', 'Firefox', '::1', '2020-05-08 10:50:51', '2020-05-08 10:50:51', NULL),
(143, 'u001', 'erlangga', '20200508113839', 'Firefox', '::1', '2020-05-08 11:38:39', '2020-05-08 11:38:39', NULL),
(144, 'u001', 'erlangga', '20200508115513', 'Firefox', '::1', '2020-05-08 11:55:13', '2020-05-08 11:55:13', NULL),
(145, 'u001', 'erlangga', '20200508125138', 'Firefox', '::1', '2020-05-08 12:51:38', '2020-05-08 12:51:38', NULL),
(146, 'u001', 'erlangga', '20200508140802', 'Firefox', '::1', '2020-05-08 14:08:02', '2020-05-08 14:08:02', NULL),
(147, 'u001', 'erlangga', '20200508150212', 'Firefox', '::1', '2020-05-08 15:02:12', '2020-05-08 15:02:12', NULL),
(148, 'u001', 'erlangga', '20200508152028', 'Firefox', '::1', '2020-05-08 15:20:28', '2020-05-08 15:20:28', NULL),
(149, 'u001', 'erlangga', '20200508165405', 'Firefox', '::1', '2020-05-08 16:54:05', '2020-05-08 16:54:05', '2020-05-08 17:00:54'),
(150, 'u001', 'erlangga', '20200508170308', 'Firefox', '::1', '2020-05-08 17:03:08', '2020-05-08 17:03:08', '2020-05-08 17:11:46'),
(151, 'u001', 'erlangga', '20200511140031', 'Firefox', '::1', '2020-05-11 14:00:31', '2020-05-11 14:00:31', NULL),
(152, 'u001', 'erlangga', '20200511144928', 'Firefox', '::1', '2020-05-11 14:49:28', '2020-05-11 14:49:28', NULL),
(153, 'u001', 'erlangga', '20200511151916', 'Firefox', '::1', '2020-05-11 15:19:16', '2020-05-11 15:19:16', NULL),
(154, 'u001', 'erlangga', '20200511154351', 'Firefox', '::1', '2020-05-11 15:43:51', '2020-05-11 15:43:51', '2020-05-11 16:42:58'),
(155, 'u001', 'erlangga', '20200512120646', 'Firefox', '::1', '2020-05-12 12:06:46', '2020-05-12 12:06:46', NULL),
(156, 'u001', 'erlangga', '20200512141437', 'Firefox', '::1', '2020-05-12 14:14:37', '2020-05-12 14:14:37', NULL),
(157, 'u001', 'erlangga', '20200512154515', 'Firefox', '::1', '2020-05-12 15:45:15', '2020-05-12 15:45:15', NULL),
(158, 'u001', 'erlangga', '20200512161048', 'Firefox', '::1', '2020-05-12 16:10:48', '2020-05-12 16:10:48', NULL),
(159, 'u001', 'erlangga', '20200512163649', 'Firefox', '::1', '2020-05-12 16:36:49', '2020-05-12 16:36:49', '2020-05-12 16:48:37'),
(160, 'u001', 'erlangga', '20200513111751', 'Firefox', '::1', '2020-05-13 11:17:51', '2020-05-13 11:17:51', NULL),
(161, 'u001', 'erlangga', '20200513114820', 'Firefox', '::1', '2020-05-13 11:48:20', '2020-05-13 11:48:20', NULL),
(162, 'u001', 'erlangga', '20200513131737', 'Firefox', '::1', '2020-05-13 13:17:37', '2020-05-13 13:17:37', NULL),
(163, 'u001', 'erlangga', '20200513132431', 'Firefox', '::1', '2020-05-13 13:24:31', '2020-05-13 13:24:31', NULL),
(164, 'u001', 'erlangga', '20200513134321', 'Firefox', '::1', '2020-05-13 13:43:21', '2020-05-13 13:43:21', NULL),
(165, 'u001', 'erlangga', '20200513140104', 'Firefox', '::1', '2020-05-13 14:01:04', '2020-05-13 14:01:04', NULL),
(166, 'u001', 'erlangga', '20200513143027', 'Firefox', '::1', '2020-05-13 14:30:27', '2020-05-13 14:30:27', NULL),
(167, 'u001', 'erlangga', '20200513145746', 'Firefox', '::1', '2020-05-13 14:57:46', '2020-05-13 14:57:46', '2020-05-13 15:59:47'),
(168, 'u001', 'erlangga', '20200514100949', 'Firefox', '::1', '2020-05-14 10:09:49', '2020-05-14 10:09:49', NULL),
(169, 'u001', 'erlangga', '20200514103842', 'Firefox', '::1', '2020-05-14 10:38:42', '2020-05-14 10:38:42', NULL),
(170, 'u001', 'erlangga', '20200514110924', 'Firefox', '::1', '2020-05-14 11:09:24', '2020-05-14 11:09:24', NULL),
(171, 'u001', 'erlangga', '20200514113117', 'Firefox', '::1', '2020-05-14 11:31:17', '2020-05-14 11:31:17', NULL),
(172, 'u001', 'erlangga', '20200514114804', 'Firefox', '::1', '2020-05-14 11:48:04', '2020-05-14 11:48:04', NULL),
(173, 'u001', 'erlangga', '20200514125510', 'Firefox', '::1', '2020-05-14 12:55:10', '2020-05-14 12:55:10', NULL),
(174, 'u001', 'erlangga', '20200514132006', 'Firefox', '::1', '2020-05-14 13:20:06', '2020-05-14 13:20:06', NULL),
(175, 'u001', 'erlangga', '20200514135057', 'Firefox', '::1', '2020-05-14 13:50:57', '2020-05-14 13:50:57', '2020-05-14 15:47:28'),
(176, 'u001', 'erlangga', '20200515091001', 'Firefox', '::1', '2020-05-15 09:10:01', '2020-05-15 09:10:01', NULL),
(177, 'u001', 'erlangga', '20200515093137', 'Firefox', '::1', '2020-05-15 09:31:37', '2020-05-15 09:31:37', NULL),
(178, 'u001', 'erlangga', '20200515101153', 'Firefox', '::1', '2020-05-15 10:11:53', '2020-05-15 10:11:53', NULL),
(179, 'u001', 'erlangga', '20200515103700', 'Firefox', '::1', '2020-05-15 10:37:00', '2020-05-15 10:37:00', NULL),
(180, 'u001', 'erlangga', '20200515111750', 'Firefox', '::1', '2020-05-15 11:17:50', '2020-05-15 11:17:50', NULL),
(181, 'u001', 'erlangga', '20200515115713', 'Firefox', '::1', '2020-05-15 11:57:13', '2020-05-15 11:57:13', NULL),
(182, 'u001', 'erlangga', '20200515124820', 'Firefox', '::1', '2020-05-15 12:48:20', '2020-05-15 12:48:20', NULL),
(183, 'u001', 'erlangga', '20200515135611', 'Firefox', '::1', '2020-05-15 13:56:11', '2020-05-15 13:56:11', NULL),
(184, 'u001', 'erlangga', '20200515141823', 'Firefox', '::1', '2020-05-15 14:18:23', '2020-05-15 14:18:23', '2020-05-15 14:22:39'),
(185, 'u001', 'erlangga', '20200517225316', 'Firefox', '::1', '2020-05-17 22:53:16', '2020-05-17 22:53:16', NULL),
(186, 'u001', 'erlangga', '20200517234952', 'Firefox', '::1', '2020-05-17 23:49:52', '2020-05-17 23:49:52', NULL),
(187, 'u001', 'erlangga', '20200518003233', 'Firefox', '::1', '2020-05-18 00:32:33', '2020-05-18 00:32:33', '2020-05-18 01:48:41'),
(188, 'u001', 'erlangga', '20200518015532', 'Firefox', '::1', '2020-05-18 01:55:32', '2020-05-18 01:55:32', '2020-05-18 02:00:45'),
(189, 'u001', 'erlangga', '20200518234431', 'Firefox', '::1', '2020-05-18 23:44:31', '2020-05-18 23:44:31', NULL),
(190, 'u001', 'erlangga', '20200519001611', 'Firefox', '::1', '2020-05-19 00:16:11', '2020-05-19 00:16:11', NULL),
(191, 'u001', 'erlangga', '20200519010819', 'Firefox', '::1', '2020-05-19 01:08:19', '2020-05-19 01:08:19', '2020-05-19 01:37:16'),
(192, 'u001', 'erlangga', '20200519231214', 'Firefox', '::1', '2020-05-19 23:12:14', '2020-05-19 23:12:14', '2020-05-20 02:33:07'),
(193, 'u001', 'erlangga', '20200520122830', 'Firefox', '::1', '2020-05-20 12:28:30', '2020-05-20 12:28:30', NULL),
(194, 'u001', 'erlangga', '20200520125328', 'Firefox', '::1', '2020-05-20 12:53:28', '2020-05-20 12:53:28', NULL),
(195, 'u001', 'erlangga', '20200520132138', 'Firefox', '::1', '2020-05-20 13:21:38', '2020-05-20 13:21:38', NULL),
(196, 'u001', 'erlangga', '20200520143926', 'Firefox', '::1', '2020-05-20 14:39:26', '2020-05-20 14:39:26', NULL),
(197, 'u001', 'erlangga', '20200520160150', 'Firefox', '::1', '2020-05-20 16:01:50', '2020-05-20 16:01:50', '2020-05-20 16:12:36'),
(198, 'u001', 'erlangga', '20200520161240', 'Firefox', '::1', '2020-05-20 16:12:40', '2020-05-20 16:12:40', '2020-05-20 16:15:30'),
(199, 'u001', 'erlangga', '20200524233926', 'Firefox', '::1', '2020-05-24 23:39:26', '2020-05-24 23:39:26', '2020-05-24 23:45:18'),
(200, 'u001', 'erlangga', '20200525000258', 'Firefox', '::1', '2020-05-25 00:02:58', '2020-05-25 00:02:58', '2020-05-25 00:06:00'),
(201, 'u001', 'erlangga', '20200525002535', 'Firefox', '::1', '2020-05-25 00:25:35', '2020-05-25 00:25:35', '2020-05-25 00:28:55'),
(202, 'u001', 'erlangga', '20200525005157', 'Firefox', '::1', '2020-05-25 00:51:57', '2020-05-25 00:51:57', '2020-05-25 00:56:44'),
(203, 'u001', 'erlangga', '20200525005659', 'Firefox', '::1', '2020-05-25 00:56:59', '2020-05-25 00:56:59', '2020-05-25 00:57:31'),
(204, 'u001', 'erlangga', '20200525010542', 'Firefox', '::1', '2020-05-25 01:05:42', '2020-05-25 01:05:42', '2020-05-25 01:13:08'),
(205, 'u001', 'erlangga', '20200526110629', 'Firefox', '::1', '2020-05-26 11:06:29', '2020-05-26 11:06:29', '2020-05-26 11:32:31'),
(206, 'u001', 'erlangga', '20200526133741', 'Firefox', '::1', '2020-05-26 13:37:41', '2020-05-26 13:37:41', NULL),
(207, 'u001', 'erlangga', '20200527111729', 'Firefox', '::1', '2020-05-27 11:17:29', '2020-05-27 11:17:29', NULL),
(208, 'u001', 'erlangga', '20200527121444', 'Firefox', '::1', '2020-05-27 12:14:44', '2020-05-27 12:14:44', NULL),
(209, 'u001', 'erlangga', '20200527121636', 'Firefox', '::1', '2020-05-27 12:16:36', '2020-05-27 12:16:36', '2020-05-27 12:16:45'),
(210, 'u001', 'erlangga', '20200527122033', 'Firefox', '::1', '2020-05-27 12:20:33', '2020-05-27 12:20:33', '2020-05-27 12:20:42'),
(211, 'u001', 'erlangga', '20200527122534', 'Firefox', '::1', '2020-05-27 12:25:34', '2020-05-27 12:25:34', '2020-05-27 12:26:06'),
(212, 'u200564b4', 'darthVader', '20200527133919', 'Firefox', '::1', '2020-05-27 13:39:19', '2020-05-27 13:39:19', '2020-05-27 13:39:37'),
(213, 'u200564b4', 'darthVader', '20200527141033', 'Firefox', '::1', '2020-05-27 14:10:33', '2020-05-27 14:10:33', '2020-05-27 14:10:50'),
(214, 'u200564b4', 'darthVader', '20200527141445', 'Firefox', '::1', '2020-05-27 14:14:45', '2020-05-27 14:14:45', '2020-05-27 14:17:21'),
(215, 'u200564b4', 'darthVader', '20200527142854', 'Firefox', '::1', '2020-05-27 14:28:54', '2020-05-27 14:28:54', '2020-05-27 15:14:54'),
(216, 'u001', 'erlangga', '20200527151503', 'Firefox', '::1', '2020-05-27 15:15:03', '2020-05-27 15:15:03', '2020-05-27 15:15:25'),
(217, 'u200564b4', 'darthVader', '20200527151534', 'Firefox', '::1', '2020-05-27 15:15:34', '2020-05-27 15:15:34', '2020-05-27 17:11:39'),
(218, 'u001', 'erlangga', '20200527160103', 'Chrome', '::1', '2020-05-27 16:01:03', '2020-05-27 16:01:03', '2020-05-27 16:01:48'),
(219, 'u200564b4', 'darthVader', '20200527212027', 'Firefox', '::1', '2020-05-27 21:20:27', '2020-05-27 21:20:27', NULL),
(220, 'u200564b4', 'darthVader', '20200527220742', 'Firefox', '::1', '2020-05-27 22:07:42', '2020-05-27 22:07:42', '2020-05-27 22:36:48'),
(221, 'u200564b4', 'darthVader', '20200527223658', 'Firefox', '::1', '2020-05-27 22:36:58', '2020-05-27 22:36:58', '2020-05-27 22:38:00'),
(222, 'u200564b4', 'darthVader', '20200527223810', 'Firefox', '::1', '2020-05-27 22:38:10', '2020-05-27 22:38:10', '2020-05-27 23:14:51'),
(223, 'u200564b4', 'darthVader', '20200527231502', 'Firefox', '::1', '2020-05-27 23:15:02', '2020-05-27 23:15:02', '2020-05-28 01:31:41'),
(224, 'u200564b4', 'darthVader', '20200528013147', 'Firefox', '::1', '2020-05-28 01:31:47', '2020-05-28 01:31:47', NULL),
(225, 'u200564b4', 'darthVader', '20200528020332', 'Firefox', '::1', '2020-05-28 02:03:32', '2020-05-28 02:03:32', '2020-05-28 02:06:57'),
(226, 'u200564b4', 'darthVader', '20200528104604', 'Firefox', '::1', '2020-05-28 10:46:04', '2020-05-28 10:46:04', NULL),
(227, 'u200564b4', 'darthVader', '20200528114930', 'Firefox', '::1', '2020-05-28 11:49:30', '2020-05-28 11:49:30', NULL),
(228, 'u200564b4', 'darthVader', '20200528115642', 'Firefox', '::1', '2020-05-28 11:56:42', '2020-05-28 11:56:42', NULL),
(229, 'u200564b4', 'darthVader', '20200528134300', 'Firefox', '::1', '2020-05-28 13:43:00', '2020-05-28 13:43:00', NULL),
(230, 'u200564b4', 'darthVader', '20200528143729', 'Firefox', '::1', '2020-05-28 14:37:29', '2020-05-28 14:37:29', NULL),
(231, 'u200564b4', 'darthVader', '20200528154828', 'Firefox', '::1', '2020-05-28 15:48:28', '2020-05-28 15:48:28', NULL),
(232, 'u200564b4', 'darthVader', '20200528181943', 'Firefox', '::1', '2020-05-28 18:19:43', '2020-05-28 18:19:43', NULL),
(233, 'u200564b4', 'darthVader', '20200528203950', 'Firefox', '::1', '2020-05-28 20:39:50', '2020-05-28 20:39:50', NULL),
(234, 'u200564b4', 'darthVader', '20200528215132', 'Firefox', '::1', '2020-05-28 21:51:32', '2020-05-28 21:51:32', NULL),
(235, 'u200564b4', 'darthVader', '20200528222310', 'Firefox', '::1', '2020-05-28 22:23:10', '2020-05-28 22:23:10', NULL),
(236, 'u200564b4', 'darthVader', '20200528225202', 'Firefox', '::1', '2020-05-28 22:52:02', '2020-05-28 22:52:02', '2020-05-28 23:20:12'),
(237, 'u200564b4', 'darthVader', '20200528232104', 'Firefox', '::1', '2020-05-28 23:21:04', '2020-05-28 23:21:04', '2020-05-28 23:21:18'),
(238, 'u200564b4', 'darthVader', '20200529085815', 'Firefox', '::1', '2020-05-29 08:58:15', '2020-05-29 08:58:15', '2020-05-29 08:58:42'),
(239, 'u001', 'erlangga', '20200529085918', 'Firefox', '::1', '2020-05-29 08:59:18', '2020-05-29 08:59:18', '2020-05-29 09:08:04'),
(240, 'u200564b4', 'darthVader', '20200529091641', 'Firefox', '::1', '2020-05-29 09:16:41', '2020-05-29 09:16:41', NULL),
(241, 'u200564b4', 'darthVader', '20200529101442', 'Firefox', '::1', '2020-05-29 10:14:42', '2020-05-29 10:14:42', NULL),
(242, 'u200564b4', 'darthVader', '20200529105711', 'Firefox', '::1', '2020-05-29 10:57:11', '2020-05-29 10:57:11', NULL),
(243, 'u200564b4', 'darthVader', '20200529132749', 'Firefox', '::1', '2020-05-29 13:27:49', '2020-05-29 13:27:49', NULL),
(244, 'u200564b4', 'darthVader', '20200529142628', 'Firefox', '::1', '2020-05-29 14:26:28', '2020-05-29 14:26:28', NULL),
(245, 'u200564b4', 'darthVader', '20200529145154', 'Firefox', '::1', '2020-05-29 14:51:54', '2020-05-29 14:51:54', NULL),
(246, 'u200564b4', 'darthVader', '20200529160319', 'Chrome', '::1', '2020-05-29 16:03:19', '2020-05-29 16:03:19', NULL),
(247, 'u200564b4', 'darthVader', '20200529182019', 'Firefox', '::1', '2020-05-29 18:20:19', '2020-05-29 18:20:19', NULL),
(248, 'u200564b4', 'darthVader', '20200529183616', 'Firefox', '::1', '2020-05-29 18:36:16', '2020-05-29 18:36:16', NULL),
(249, 'u200564b4', 'darthVader', '20200529200359', 'Firefox', '::1', '2020-05-29 20:03:59', '2020-05-29 20:03:59', NULL),
(250, 'u200564b4', 'darthVader', '20200529201919', 'Firefox', '::1', '2020-05-29 20:19:19', '2020-05-29 20:19:19', NULL),
(251, 'u200564b4', 'darthVader', '20200529205459', 'Firefox', '::1', '2020-05-29 20:54:59', '2020-05-29 20:54:59', '2020-05-29 21:12:50'),
(252, 'u200564b4', 'darthVader', '20200529211312', 'Firefox', '::1', '2020-05-29 21:13:12', '2020-05-29 21:13:12', '2020-05-29 21:15:48'),
(253, 'u200564b4', 'darthVader', '20200529220129', 'Firefox', '::1', '2020-05-29 22:01:29', '2020-05-29 22:01:29', '2020-05-29 22:01:51'),
(254, 'u200564b4', 'darthVader', '20200602084215', 'Firefox', '::1', '2020-06-02 08:42:15', '2020-06-02 08:42:15', NULL),
(255, 'u200564b4', 'darthVader', '20200602092714', 'Firefox', '::1', '2020-06-02 09:27:14', '2020-06-02 09:27:14', NULL),
(256, 'u200564b4', 'darthVader', '20200602114135', 'Firefox', '::1', '2020-06-02 11:41:35', '2020-06-02 11:41:35', NULL),
(257, 'u200564b4', 'darthVader', '20200602115650', 'Chrome', '::1', '2020-06-02 11:56:50', '2020-06-02 11:56:50', '2020-06-02 11:57:42'),
(258, 'u200564b4', 'darthVader', '20200602120006', 'Chrome', '::1', '2020-06-02 12:00:06', '2020-06-02 12:00:06', '2020-06-02 12:00:20'),
(259, 'u200564b4', 'darthVader', '20200602121633', 'Firefox', '::1', '2020-06-02 12:16:33', '2020-06-02 12:16:33', NULL),
(260, 'u200564b4', 'darthVader', '20200602145205', 'Firefox', '::1', '2020-06-02 14:52:05', '2020-06-02 14:52:05', NULL),
(261, 'u200564b4', 'darthVader', '20200602152853', 'Firefox', '::1', '2020-06-02 15:28:53', '2020-06-02 15:28:53', '2020-06-02 16:31:09'),
(262, 'u200564b4', 'darthVader', '20200602163001', 'Chrome', '::1', '2020-06-02 16:30:01', '2020-06-02 16:30:01', '2020-06-02 16:30:48'),
(263, 'u200564b4', 'darthVader', '20200602163052', 'Chrome', '::1', '2020-06-02 16:30:52', '2020-06-02 16:30:52', '2020-06-02 16:37:18'),
(264, 'u200564b4', 'darthVader', '20200602163115', 'Firefox', '::1', '2020-06-02 16:31:15', '2020-06-02 16:31:15', NULL),
(265, 'u200564b4', 'darthVader', '20200602163309', 'Firefox', '127.0.0.1', '2020-06-02 16:33:09', '2020-06-02 16:33:09', '2020-06-02 16:34:52'),
(266, 'u200564b4', 'darthVader', '20200602163500', 'Firefox', '127.0.0.1', '2020-06-02 16:35:00', '2020-06-02 16:35:00', '2020-06-02 16:44:20'),
(267, 'u001', 'erlangga', '20200602163724', 'Chrome', '::1', '2020-06-02 16:37:24', '2020-06-02 16:37:24', '2020-06-02 16:39:32'),
(268, 'u200564b4', 'darthVader', '20200602164322', 'Chrome', '::1', '2020-06-02 16:43:22', '2020-06-02 16:43:22', NULL),
(269, 'u200564b4', 'darthVader', '20200602164443', 'Firefox', '127.0.0.1', '2020-06-02 16:44:43', '2020-06-02 16:44:43', NULL),
(270, 'u200564b4', 'darthVader', '20200602164925', 'Firefox', '::1', '2020-06-02 16:49:25', '2020-06-02 16:49:25', '2020-06-02 17:13:59'),
(271, 'u200564b4', 'darthVader', '20200602171409', 'Firefox', '::1', '2020-06-02 17:14:09', '2020-06-02 17:14:09', '2020-06-02 17:18:10'),
(272, 'u200564b4', 'darthVader', '20200602171827', 'Firefox', '::1', '2020-06-02 17:18:27', '2020-06-02 17:18:27', NULL),
(273, 'u200564b4', 'darthVader', '20200602172856', 'Firefox', '::1', '2020-06-02 17:28:56', '2020-06-02 17:28:56', '2020-06-02 17:38:53'),
(274, 'u200564b4', 'darthVader', '20200602173903', 'Firefox', '::1', '2020-06-02 17:39:03', '2020-06-02 17:39:03', NULL),
(275, 'u200564b4', 'darthVader', '20200602182841', 'Firefox', '::1', '2020-06-02 18:28:41', '2020-06-02 18:28:41', '2020-06-02 18:29:22'),
(276, 'u200564b4', 'darthVader', '20200602183047', 'Firefox', '::1', '2020-06-02 18:30:47', '2020-06-02 18:30:47', '2020-06-02 21:13:02'),
(277, 'u200564b4', 'darthVader', '20200603121811', 'Firefox', '::1', '2020-06-03 12:18:11', '2020-06-03 12:18:11', NULL),
(278, 'u200564b4', 'darthVader', '20200603135533', 'Firefox', '::1', '2020-06-03 13:55:33', '2020-06-03 13:55:33', NULL),
(279, 'u200564b4', 'darthVader', '20200603151811', 'Firefox', '::1', '2020-06-03 15:18:11', '2020-06-03 15:18:11', NULL),
(280, 'u200564b4', 'darthVader', '20200603164833', 'Firefox', '::1', '2020-06-03 16:48:33', '2020-06-03 16:48:33', '2020-06-03 17:11:07'),
(281, 'u200564b4', 'darthVader', '20200603171113', 'Firefox', '::1', '2020-06-03 17:11:13', '2020-06-03 17:11:13', '2020-06-03 17:11:22'),
(282, 'u200564b4', 'darthVader', '20200603195132', 'Firefox', '::1', '2020-06-03 19:51:32', '2020-06-03 19:51:32', NULL),
(283, 'u200564b4', 'darthVader', '20200603213957', 'Firefox', '::1', '2020-06-03 21:39:57', '2020-06-03 21:39:57', NULL),
(284, 'u200564b4', 'darthVader', '20200603215556', 'Firefox', '::1', '2020-06-03 21:55:56', '2020-06-03 21:55:56', '2020-06-04 00:04:04'),
(285, 'u200564b4', 'darthVader', '20200604103029', 'Firefox', '::1', '2020-06-04 10:30:29', '2020-06-04 10:30:29', NULL),
(286, 'u200564b4', 'darthVader', '20200604113206', 'Firefox', '::1', '2020-06-04 11:32:06', '2020-06-04 11:32:06', '2020-06-04 11:59:56'),
(287, 'u200564b4', 'darthVader', '20200605222539', 'Firefox', '::1', '2020-06-05 22:25:39', '2020-06-05 22:25:39', NULL),
(288, 'u200564b4', 'darthVader', '20200605225540', 'Firefox', '::1', '2020-06-05 22:55:40', '2020-06-05 22:55:40', NULL),
(289, 'u200564b4', 'darthVader', '20200606134649', 'Firefox', '::1', '2020-06-06 13:46:49', '2020-06-06 13:46:49', NULL),
(290, 'u200564b4', 'darthVader', '20200606143338', 'Firefox', '::1', '2020-06-06 14:33:38', '2020-06-06 14:33:38', NULL),
(291, 'u200564b4', 'darthVader', '20200606175203', 'Firefox', '::1', '2020-06-06 17:52:03', '2020-06-06 17:52:03', NULL),
(292, 'u200564b4', 'darthVader', '20200606194252', 'Firefox', '::1', '2020-06-06 19:42:52', '2020-06-06 19:42:52', '2020-06-06 20:52:02'),
(293, 'u200564b4', 'darthVader', '20200607194444', 'Firefox', '::1', '2020-06-07 19:44:44', '2020-06-07 19:44:44', NULL),
(294, 'u200564b4', 'darthVader', '20200607224620', 'Firefox', '::1', '2020-06-07 22:46:20', '2020-06-07 22:46:20', '2020-06-08 00:22:40'),
(295, 'u200564b4', 'darthVader', '20200609162819', 'Firefox', '::1', '2020-06-09 16:28:19', '2020-06-09 16:28:19', NULL),
(296, 'u200564b4', 'darthVader', '20200609184022', 'Firefox', '::1', '2020-06-09 18:40:22', '2020-06-09 18:40:22', NULL),
(297, 'u200564b4', 'darthVader', '20200609201410', 'Firefox', '::1', '2020-06-09 20:14:10', '2020-06-09 20:14:10', '2020-06-09 22:17:34'),
(298, 'u200564b4', 'darthVader', '20200610115451', 'Firefox', '::1', '2020-06-10 11:54:51', '2020-06-10 11:54:51', NULL),
(299, 'u200564b4', 'darthVader', '20200610133620', 'Firefox', '::1', '2020-06-10 13:36:20', '2020-06-10 13:36:20', NULL),
(300, 'u200564b4', 'darthVader', '20200610145514', 'Firefox', '::1', '2020-06-10 14:55:14', '2020-06-10 14:55:14', NULL),
(301, 'u200564b4', 'darthVader', '20200610160850', 'Firefox', '::1', '2020-06-10 16:08:50', '2020-06-10 16:08:50', NULL),
(302, 'u200564b4', 'darthVader', '20200610162449', 'Firefox', '::1', '2020-06-10 16:24:49', '2020-06-10 16:24:49', '2020-06-10 17:31:24'),
(303, 'u200564b4', 'darthVader', '20200611130443', 'Firefox', '::1', '2020-06-11 13:04:43', '2020-06-11 13:04:43', NULL),
(304, 'u200564b4', 'darthVader', '20200611132859', 'Firefox', '::1', '2020-06-11 13:28:59', '2020-06-11 13:28:59', '2020-06-11 14:49:30'),
(305, 'u200564b4', 'darthVader', '20200611140722', 'Chrome', '::1', '2020-06-11 14:07:22', '2020-06-11 14:07:22', '2020-06-11 14:07:25'),
(306, 'u001', 'erlangga', '20200611140734', 'Chrome', '::1', '2020-06-11 14:07:34', '2020-06-11 14:07:34', NULL),
(307, 'u200564b4', 'darthVader', '20200611145904', 'Firefox', '::1', '2020-06-11 14:59:04', '2020-06-11 14:59:04', '2020-06-11 15:13:36'),
(308, 'u200564b4', 'darthVader', '20200611153444', 'Firefox', '::1', '2020-06-11 15:34:44', '2020-06-11 15:34:44', NULL),
(309, 'u200564b4', 'darthVader', '20200611164314', 'Firefox', '::1', '2020-06-11 16:43:14', '2020-06-11 16:43:14', '2020-06-11 16:58:30'),
(310, 'u200564b4', 'darthVader', '20200615150127', 'Firefox', '::1', '2020-06-15 15:01:27', '2020-06-15 15:01:27', '2020-06-15 15:02:22'),
(311, 'u001', 'erlangga', '20200615164104', 'Firefox', '::1', '2020-06-15 16:41:04', '2020-06-15 16:41:04', '2020-06-15 16:41:25'),
(312, 'u200564b4', 'darthVader', '20200615192732', 'Firefox', '::1', '2020-06-15 19:27:32', '2020-06-15 19:27:32', '2020-06-15 19:50:21'),
(313, 'u001', 'erlangga', '20200616103050', 'Firefox', '::1', '2020-06-16 10:30:50', '2020-06-16 10:30:50', NULL),
(314, 'u001', 'erlangga', '20200616144406', 'Firefox', '::1', '2020-06-16 14:44:06', '2020-06-16 14:44:06', NULL),
(315, 'u001', 'erlangga', '20200616153554', 'Firefox', '::1', '2020-06-16 15:35:54', '2020-06-16 15:35:54', NULL),
(316, 'u001', 'erlangga', '20200616172009', 'Firefox', '::1', '2020-06-16 17:20:09', '2020-06-16 17:20:09', NULL),
(317, 'u001', 'erlangga', '20200616175319', 'Firefox', '::1', '2020-06-16 17:53:19', '2020-06-16 17:53:19', NULL),
(318, 'u001', 'erlangga', '20200616183804', 'Firefox', '::1', '2020-06-16 18:38:04', '2020-06-16 18:38:04', NULL),
(319, 'u001', 'erlangga', '20200616190358', 'Firefox', '::1', '2020-06-16 19:03:58', '2020-06-16 19:03:58', '2020-06-16 19:06:25'),
(320, 'u001', 'erlangga', '20200617101822', 'Firefox', '::1', '2020-06-17 10:18:22', '2020-06-17 10:18:22', NULL),
(321, 'u001', 'erlangga', '20200617115121', 'Firefox', '::1', '2020-06-17 11:51:21', '2020-06-17 11:51:21', NULL),
(322, 'u001', 'erlangga', '20200617130228', 'Firefox', '::1', '2020-06-17 13:02:28', '2020-06-17 13:02:28', NULL),
(323, 'u001', 'erlangga', '20200617134728', 'Firefox', '::1', '2020-06-17 13:47:28', '2020-06-17 13:47:28', '2020-06-17 15:21:59'),
(324, 'u2003fbb0', 'yaya', '20200617152217', 'Firefox', '::1', '2020-06-17 15:22:17', '2020-06-17 15:22:17', '2020-06-17 15:22:50'),
(325, 'u001', 'erlangga', '20200617152302', 'Firefox', '::1', '2020-06-17 15:23:02', '2020-06-17 15:23:02', '2020-06-17 15:23:21'),
(326, 'u001', 'erlangga', '20200617152335', 'Firefox', '::1', '2020-06-17 15:23:35', '2020-06-17 15:23:35', '2020-06-17 15:23:45'),
(327, 'u001', 'erlangga', '20200617152409', 'Firefox', '::1', '2020-06-17 15:24:09', '2020-06-17 15:24:09', '2020-06-17 15:24:33'),
(328, 'u001', 'erlangga', '20200617152509', 'Firefox', '::1', '2020-06-17 15:25:09', '2020-06-17 15:25:09', '2020-06-17 15:28:17'),
(329, 'u001', 'erlangga', '20200617152859', 'Firefox', '::1', '2020-06-17 15:28:59', '2020-06-17 15:28:59', '2020-06-17 15:51:34'),
(330, 'u001', 'erlangga', '20200617155342', 'Firefox', '::1', '2020-06-17 15:53:42', '2020-06-17 15:53:42', '2020-06-17 15:55:44'),
(331, 'u200564b4', 'darthVader', '20200617155558', 'Firefox', '::1', '2020-06-17 15:55:58', '2020-06-17 15:55:58', '2020-06-17 15:56:06'),
(332, 'u200564b4', 'darthVader', '20210924171256', 'Firefox', '127.0.0.1', '2021-09-24 17:12:56', '2021-09-24 17:12:56', '2021-09-24 17:14:53'),
(333, 'u200564b4', 'darthVader', '20210924171514', 'Firefox', '127.0.0.1', '2021-09-24 17:15:14', '2021-09-24 17:15:14', '2021-09-24 17:15:34'),
(334, 'u200564b4', 'darthVader', '20210924171646', 'Firefox', '127.0.0.1', '2021-09-24 17:16:46', '2021-09-24 17:16:46', '2021-09-24 17:17:12'),
(335, 'u001', 'erlangga', '20210924172427', 'Firefox', '127.0.0.1', '2021-09-24 17:24:27', '2021-09-24 17:24:27', '2021-09-24 17:24:49'),
(336, 'u001', 'erlangga', '20210924172512', 'Firefox', '127.0.0.1', '2021-09-24 17:25:12', '2021-09-24 17:25:12', '2021-09-24 17:42:48'),
(337, 'u001', 'erlangga', '20210924215158', 'Firefox', '127.0.0.1', '2021-09-24 21:51:58', '2021-09-24 21:51:58', '2021-09-24 21:52:15'),
(338, 'u200564b4', 'darthVader', '20210924220914', 'Firefox', '127.0.0.1', '2021-09-24 22:09:14', '2021-09-24 22:09:14', '2021-09-24 22:09:20'),
(339, 'u200564b4', 'darthVader', '20210924221241', 'Firefox', '127.0.0.1', '2021-09-24 22:12:41', '2021-09-24 22:12:41', '2021-09-24 22:12:43'),
(340, 'u200564b4', 'darthVader', '20210924221309', 'Firefox', '127.0.0.1', '2021-09-24 22:13:09', '2021-09-24 22:13:09', '2021-09-24 22:13:11'),
(341, 'u200564b4', 'darthVader', '20210924221342', 'Firefox', '127.0.0.1', '2021-09-24 22:13:42', '2021-09-24 22:13:42', '2021-09-24 22:13:45'),
(342, 'u001', 'erlangga', '20210924221434', 'Firefox', '127.0.0.1', '2021-09-24 22:14:34', '2021-09-24 22:14:34', '2021-09-24 22:14:45'),
(343, 'u001', 'erlangga', '20210924222049', 'Firefox', '127.0.0.1', '2021-09-24 22:20:49', '2021-09-24 22:20:49', '2021-09-24 22:20:53'),
(344, 'u200564b4', 'darthVader', '20210924222431', 'Firefox', '127.0.0.1', '2021-09-24 22:24:31', '2021-09-24 22:24:31', '2021-09-24 22:24:35'),
(345, 'u001', 'erlangga', '20210924222513', 'Firefox', '127.0.0.1', '2021-09-24 22:25:13', '2021-09-24 22:25:13', '2021-09-24 22:37:15'),
(346, 'u001', 'erlangga', '20210924223732', 'Firefox', '127.0.0.1', '2021-09-24 22:37:32', '2021-09-24 22:37:32', NULL),
(347, 'u001', 'erlangga', '20210925002839', 'Firefox', '127.0.0.1', '2021-09-25 00:28:39', '2021-09-25 00:28:39', NULL),
(348, 'u001', 'erlangga', '20210925010217', 'Firefox', '127.0.0.1', '2021-09-25 01:02:17', '2021-09-25 01:02:17', '2021-09-25 01:05:10'),
(349, 'u200564b4', 'darthVader', '20210930105815', 'Firefox', '127.0.0.1', '2021-09-30 10:58:15', '2021-09-30 10:58:15', '2021-09-30 10:58:20'),
(350, 'u200564b4', 'darthVader', '20210930113500', 'Firefox', '127.0.0.1', '2021-09-30 11:35:00', '2021-09-30 11:35:00', '2021-09-30 11:35:07'),
(351, 'u200564b4', 'darthVader', '20210930113610', 'Firefox', '127.0.0.1', '2021-09-30 11:36:10', '2021-09-30 11:36:10', NULL),
(352, 'u200564b4', 'darthVader', '20210930153210', 'Firefox', '127.0.0.1', '2021-09-30 15:32:10', '2021-09-30 15:32:10', NULL),
(353, 'u200564b4', 'darthVader', '20210930161237', 'Firefox', '127.0.0.1', '2021-09-30 16:12:37', '2021-09-30 16:12:37', NULL),
(354, 'u200564b4', 'darthVader', '20210930161836', 'Firefox', '127.0.0.1', '2021-09-30 16:18:36', '2021-09-30 16:18:36', NULL),
(355, 'u200564b4', 'darthVader', '20210930163540', 'Firefox', '127.0.0.1', '2021-09-30 16:35:40', '2021-09-30 16:35:40', '2021-09-30 16:45:18'),
(356, 'u200564b4', 'darthVader', '20210930164532', 'Firefox', '127.0.0.1', '2021-09-30 16:45:32', '2021-09-30 16:45:32', '2021-09-30 17:35:14'),
(357, 'u200564b4', 'darthVader', '20210930164756', 'Chrome', '::1', '2021-09-30 16:47:56', '2021-09-30 16:47:56', '2021-09-30 16:48:12'),
(358, 'u001', 'erlangga', '20210930174754', 'Firefox', '127.0.0.1', '2021-09-30 17:47:54', '2021-09-30 17:47:54', '2021-09-30 17:49:16'),
(359, 'u001', 'erlangga', '20210930175350', 'Firefox', '127.0.0.1', '2021-09-30 17:53:50', '2021-09-30 17:53:50', '2021-09-30 17:55:35'),
(360, 'u200564b4', 'darthVader', '20210930175807', 'Firefox', '127.0.0.1', '2021-09-30 17:58:07', '2021-09-30 17:58:07', '2021-09-30 18:00:43'),
(361, 'u200564b4', 'darthVader', '20210930192515', 'Firefox', '127.0.0.1', '2021-09-30 19:25:15', '2021-09-30 19:25:15', '2021-09-30 19:25:19'),
(362, 'u200564b4', 'darthVader', '20210930194300', 'Firefox', '127.0.0.1', '2021-09-30 19:43:00', '2021-09-30 19:43:00', '2021-09-30 19:43:04'),
(363, 'u001', 'erlangga', '20210930202425', 'Firefox', '127.0.0.1', '2021-09-30 20:24:25', '2021-09-30 20:24:25', '2021-09-30 20:24:28'),
(364, 'u21098f84', 'veslearning', '20210930203926', 'Firefox', '127.0.0.1', '2021-09-30 20:39:26', '2021-09-30 20:39:26', '2021-09-30 20:52:06'),
(365, 'u200564b4', 'darthVader', '20210930205214', 'Firefox', '127.0.0.1', '2021-09-30 20:52:14', '2021-09-30 20:52:14', '2021-09-30 20:52:24'),
(366, 'u001', 'erlangga', '20210930210357', 'Firefox', '127.0.0.1', '2021-09-30 21:03:57', '2021-09-30 21:03:57', '2021-09-30 21:04:00'),
(367, 'u001', 'erlangga', '20210930210432', 'Firefox', '127.0.0.1', '2021-09-30 21:04:32', '2021-09-30 21:04:32', '2021-09-30 21:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_users`
--

CREATE TABLE `eslearning_users` (
  `iduser` varchar(12) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `profile` text NOT NULL,
  `phoneno` char(12) NOT NULL,
  `jobs` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `country` varchar(500) NOT NULL,
  `profilepicture` varchar(250) NOT NULL,
  `active` int(4) DEFAULT NULL,
  `login` int(4) NOT NULL,
  `roles` int(4) DEFAULT NULL,
  `date` date NOT NULL,
  `addby` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eslearning_users`
--

INSERT INTO `eslearning_users` (`iduser`, `fullname`, `username`, `password`, `email`, `profile`, `phoneno`, `jobs`, `institution`, `country`, `profilepicture`, `active`, `login`, `roles`, `date`, `addby`) VALUES
('u001', 'Erlangga, S.Kom., M.T.', 'erlangga', '827ccb0eea8a706c4c34a16891f84e7b', 'erlangga@upi.edu', '', '081321397362', 'Dosen', 'Universitas Pendidikan Indonesia', 'Indonesia', 'DSC_3096yxt.jpg', 1, 0, 1, '0000-00-00', 'u001'),
('u2003fbb0c', 'Yaya Wihardi', 'yaya', '827ccb0eea8a706c4c34a16891f84e7b', 'yaya.wihardi@upi.edu', '', '081112233344', 'Dosen', 'Universitas Pendidikan Indonesia', 'Indonesia', '', 1, 0, 5, '2020-04-06', 'u001'),
('u200510ca3', 'Bill Gates', 'windows', '2edc2166f588c489c624c8f5b69f4b2c', 'billgates@microsoft.com', '', '', '', '', '', '', NULL, 0, 6, '2020-06-08', ''),
('u200520562', 'Rey Palpatin', 'lastJedi', '81dc9bdb52d04dc20036dbd8313ed055', 'rey.palpatin@resistance.gov', '', '', '', '', '', '', 1, 0, 6, '0000-00-00', ''),
('u200564b44', 'Anakin Skywalker', 'darthVader', '827ccb0eea8a706c4c34a16891f84e7b', 'erlangga.kmoekasan@gmail.com', '<p>Programer yang selalu haus akan ilmu pemrograman dan terus belajar tanpa batas, untuk menjadi jediProgramer sejati.<br></p>', '081321397362', 'Jendral Besar Sekali', 'Empire', 'Indonesia', 'darth_vader.jpg', 1, 0, 6, '2020-05-26', ''),
('u21098f840', 'Video Erlangga', 'veslearning', '827ccb0eea8a706c4c34a16891f84e7b', 'tes@gmail.com', '', '', '', '', '', '', 1, 0, 6, '2021-09-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_veritificationceklist`
--

CREATE TABLE `eslearning_veritificationceklist` (
  `idveritification` varchar(250) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idcourses` int(4) NOT NULL,
  `certnumber` varchar(250) NOT NULL,
  `graduatedate` date NOT NULL,
  `expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_veritificationceklist`
--

INSERT INTO `eslearning_veritificationceklist` (`idveritification`, `iduser`, `idcourses`, `certnumber`, `graduatedate`, `expiredate`) VALUES
('u200564b4410406202095285', 'u200564b44', 1, 'CE-eslearning-C1-04/06/2020-95285', '2020-06-04', '2021-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_visitors`
--

CREATE TABLE `eslearning_visitors` (
  `idvisitors` int(4) NOT NULL,
  `country` varchar(250) NOT NULL,
  `menu` varchar(250) NOT NULL,
  `ip` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_visitors`
--

INSERT INTO `eslearning_visitors` (`idvisitors`, `country`, `menu`, `ip`) VALUES
(1, 'United States', 'home', '198.211.100.32'),
(2, 'United States', 'lecturer', '198.211.100.32'),
(3, 'United States', 'home', '198.211.100.32'),
(4, 'United States', 'contact', '198.211.100.32'),
(5, 'United States', 'video', '198.211.100.32'),
(6, 'United States', 'events', '198.211.100.32'),
(7, 'United States', 'announcement', '198.211.100.32'),
(8, 'United States', 'lecturer', '198.211.100.32'),
(9, 'United States', 'admin', '198.211.100.32'),
(10, 'United States', 'home', '198.211.100.32'),
(11, 'United States', 'home', '198.211.100.32'),
(12, 'United States', 'home', '198.211.100.32'),
(13, 'United States', 'video', '198.211.100.32'),
(14, 'United States', 'video', '198.211.100.32'),
(15, 'United States', 'video', '198.211.100.32'),
(16, 'United States', 'video', '198.211.100.32'),
(17, 'United States', 'video', '198.211.100.32'),
(18, 'United States', 'video', '198.211.100.32'),
(19, 'United States', 'video', '198.211.100.32'),
(20, 'United States', 'video', '198.211.100.32'),
(21, 'United States', 'home', '198.211.100.32'),
(22, 'United States', 'video', '198.211.100.32'),
(23, 'United States', 'video', '198.211.100.32'),
(24, 'United States', 'video', '198.211.100.32'),
(25, 'United States', 'video', '198.211.100.32'),
(26, 'United States', 'video', '198.211.100.32'),
(27, 'United States', 'video', '198.211.100.32'),
(28, 'United States', 'video', '198.211.100.32'),
(29, 'United States', 'video', '198.211.100.32'),
(30, 'United States', 'video', '198.211.100.32'),
(31, 'United States', 'video', '198.211.100.32'),
(32, 'United States', 'video', '198.211.100.32'),
(33, 'United States', 'video', '198.211.100.32'),
(34, 'United States', 'video', '198.211.100.32'),
(35, 'United States', 'sejarah', '198.211.100.32'),
(36, 'United States', 'sejarah', '198.211.100.32'),
(37, 'United States', 'sejarah', '198.211.100.32'),
(38, 'United States', 'sejarah', '198.211.100.32'),
(39, 'United States', 'sejarah', '198.211.100.32'),
(40, 'United States', 'sejarah', '198.211.100.32'),
(41, 'United States', 'sejarah', '198.211.100.32'),
(42, 'United States', 'sejarah', '198.211.100.32'),
(43, 'United States', 'sejarah', '198.211.100.32'),
(44, 'United States', 'sejarah', '198.211.100.32'),
(45, 'United States', 'home', '198.211.100.32'),
(46, 'United States', 'sejarah', '198.211.100.32'),
(47, 'United States', 'home', '198.211.100.32'),
(48, 'United States', 'sejarah', '198.211.100.32'),
(49, 'United States', 'home', '198.211.100.32'),
(50, 'United States', 'sejarah', '198.211.100.32'),
(51, 'United States', 'contact', '198.211.100.32'),
(52, 'United States', 'contact', '198.211.100.32'),
(53, 'United States', 'news', '198.211.100.32'),
(54, 'United States', 'video', '198.211.100.32'),
(55, 'United States', 'announcement', '198.211.100.32'),
(56, 'United States', 'events', '198.211.100.32'),
(57, 'United States', 'contact', '198.211.100.32'),
(58, 'United States', 'home', '198.211.100.32'),
(59, 'United States', 'sejarah', '198.211.100.32'),
(60, 'United States', 'home', '198.211.100.32'),
(61, 'United States', 'home', '198.211.100.32'),
(62, 'United States', 'home', '198.211.100.32'),
(63, 'United States', 'home', '198.211.100.32'),
(64, 'United States', 'news', '198.211.100.32'),
(65, 'United States', 'news', '198.211.100.32'),
(66, 'United States', 'home', '198.211.100.32'),
(67, 'United States', 'news', '198.211.100.32'),
(68, 'United States', 'news', '198.211.100.32'),
(69, 'United States', 'home', '198.211.100.32'),
(70, 'United States', 'news', '198.211.100.32'),
(71, 'United States', 'news', '198.211.100.32'),
(72, 'United States', 'home', '198.211.100.32'),
(73, 'United States', 'home', '198.211.100.32'),
(74, 'United States', 'home', '198.211.100.32'),
(75, 'United States', 'home', '198.211.100.32'),
(76, 'United States', 'home', '198.211.100.32'),
(77, 'United States', 'home', '198.211.100.32'),
(78, 'United States', 'home', '198.211.100.32'),
(79, 'United States', 'home', '198.211.100.32'),
(80, 'United States', 'home', '198.211.100.32'),
(81, 'United States', 'home', '198.211.100.32'),
(82, 'United States', 'lecturer', '198.211.100.32'),
(83, 'United States', 'lecturer', '198.211.100.32'),
(84, 'United States', 'home', '198.211.100.32'),
(85, 'United States', 'lecturer', '198.211.100.32'),
(86, 'United States', 'lecturer', '198.211.100.32'),
(87, 'United States', 'lecturer', '198.211.100.32'),
(88, 'United States', 'home', '198.211.100.32'),
(89, 'United States', 'home', '198.211.100.32'),
(90, 'United States', 'home', '198.211.100.32'),
(91, 'United States', 'home', '198.211.100.32'),
(92, 'United States', 'home', '198.211.100.32'),
(93, 'United States', 'home', '198.211.100.32'),
(94, 'United States', 'home', '198.211.100.32'),
(95, 'United States', 'home', '198.211.100.32'),
(96, 'United States', 'home', '198.211.100.32'),
(97, 'United States', 'home', '198.211.100.32'),
(98, 'United States', 'home', '198.211.100.32'),
(99, 'United States', 'home', '198.211.100.32'),
(100, 'United States', 'home', '198.211.100.32'),
(101, 'United States', 'home', '198.211.100.32'),
(102, 'United States', 'home', '198.211.100.32'),
(103, 'United States', 'home', '198.211.100.32'),
(104, 'United States', 'home', '198.211.100.32'),
(105, 'United States', 'home', '198.211.100.32'),
(106, 'United States', 'home', '198.211.100.32'),
(107, 'United States', 'home', '198.211.100.32'),
(108, 'United States', 'home', '198.211.100.32'),
(109, 'United States', 'home', '198.211.100.32'),
(110, 'United States', 'home', '198.211.100.32'),
(111, 'United States', 'home', '198.211.100.32'),
(112, 'United States', 'home', '198.211.100.32'),
(113, 'United States', 'home', '198.211.100.32'),
(114, 'United States', 'home', '198.211.100.32'),
(115, 'United States', 'home', '198.211.100.32'),
(116, 'United States', 'home', '198.211.100.32'),
(117, 'United States', 'home', '198.211.100.32'),
(118, 'United States', 'home', '198.211.100.32'),
(119, 'United States', 'home', '198.211.100.32'),
(120, 'United States', 'home', '198.211.100.32'),
(121, 'United States', 'home', '198.211.100.32'),
(122, 'United States', 'home', '198.211.100.32'),
(123, 'United States', 'home', '198.211.100.32'),
(124, 'United States', 'home', '198.211.100.32'),
(125, 'United States', 'home', '198.211.100.32'),
(126, 'United States', 'home', '198.211.100.32'),
(127, 'United States', 'home', '198.211.100.32'),
(128, 'United States', 'home', '198.211.100.32'),
(129, 'United States', 'home', '198.211.100.32'),
(130, 'United States', 'home', '198.211.100.32'),
(131, 'United States', 'home', '198.211.100.32'),
(132, 'United States', 'home', '198.211.100.32'),
(133, 'United States', 'home', '198.211.100.32'),
(134, 'United States', 'home', '198.211.100.32'),
(135, 'United States', 'home', '198.211.100.32'),
(136, 'United States', 'home', '198.211.100.32'),
(137, 'United States', 'home', '198.211.100.32'),
(138, 'United States', 'home', '198.211.100.32'),
(139, 'United States', 'home', '198.211.100.32'),
(140, 'United States', 'home', '198.211.100.32'),
(141, 'United States', 'home', '198.211.100.32'),
(142, 'United States', 'home', '198.211.100.32'),
(143, 'United States', 'home', '198.211.100.32'),
(144, 'United States', 'home', '198.211.100.32'),
(145, 'United States', 'home', '198.211.100.32'),
(146, 'United States', 'home', '198.211.100.32'),
(147, 'United States', 'home', '198.211.100.32'),
(148, 'United States', 'home', '198.211.100.32'),
(149, 'United States', 'home', '198.211.100.32'),
(150, 'United States', 'home', '198.211.100.32'),
(151, 'United States', 'home', '198.211.100.32'),
(152, 'United States', 'home', '198.211.100.32'),
(153, 'United States', 'home', '198.211.100.32'),
(154, 'United States', 'home', '198.211.100.32'),
(155, 'United States', 'home', '198.211.100.32'),
(156, 'United States', 'home', '198.211.100.32'),
(157, 'United States', 'home', '198.211.100.32'),
(158, 'United States', 'home', '198.211.100.32'),
(159, 'United States', 'home', '198.211.100.32'),
(160, 'United States', 'home', '198.211.100.32'),
(161, 'United States', 'home', '198.211.100.32'),
(162, 'United States', 'home', '198.211.100.32'),
(163, 'United States', 'home', '198.211.100.32'),
(164, 'United States', 'home', '198.211.100.32'),
(165, 'United States', 'home', '198.211.100.32'),
(166, 'United States', 'home', '198.211.100.32'),
(167, 'United States', 'home', '198.211.100.32'),
(168, 'United States', 'home', '198.211.100.32'),
(169, 'United States', 'home', '198.211.100.32'),
(170, 'United States', 'home', '198.211.100.32'),
(171, 'United States', 'home', '198.211.100.32'),
(172, 'United States', 'home', '198.211.100.32'),
(173, 'United States', 'home', '198.211.100.32'),
(174, 'United States', 'home', '198.211.100.32'),
(175, 'United States', 'home', '198.211.100.32'),
(176, 'United States', 'home', '198.211.100.32'),
(177, 'United States', 'home', '198.211.100.32'),
(178, 'United States', 'home', '198.211.100.32'),
(179, 'United States', 'home', '198.211.100.32'),
(180, 'United States', 'home', '198.211.100.32'),
(181, 'United States', 'home', '198.211.100.32'),
(182, 'United States', 'home', '198.211.100.32'),
(183, 'United States', 'home', '198.211.100.32'),
(184, 'United States', 'home', '198.211.100.32'),
(185, 'United States', 'home', '198.211.100.32'),
(186, 'United States', 'home', '198.211.100.32'),
(187, 'United States', 'home', '198.211.100.32'),
(188, 'United States', 'home', '198.211.100.32'),
(189, 'United States', 'home', '198.211.100.32'),
(190, 'United States', 'home', '198.211.100.32'),
(191, 'United States', 'home', '198.211.100.32'),
(192, 'United States', 'home', '198.211.100.32'),
(193, 'United States', 'home', '198.211.100.32'),
(194, 'United States', 'home', '198.211.100.32'),
(195, 'United States', 'home', '198.211.100.32'),
(196, 'United States', 'home', '198.211.100.32'),
(197, 'United States', 'home', '198.211.100.32'),
(198, 'United States', 'home', '198.211.100.32'),
(199, 'United States', 'home', '198.211.100.32'),
(200, 'United States', 'home', '198.211.100.32'),
(201, 'United States', 'home', '198.211.100.32'),
(202, 'United States', 'home', '198.211.100.32'),
(203, 'United States', 'home', '198.211.100.32'),
(204, 'United States', 'home', '198.211.100.32'),
(205, 'United States', 'home', '198.211.100.32'),
(206, 'United States', 'home', '198.211.100.32'),
(207, 'United States', 'home', '198.211.100.32'),
(208, 'United States', 'home', '198.211.100.32'),
(209, 'United States', 'home', '198.211.100.32'),
(210, 'United States', 'home', '198.211.100.32'),
(211, 'United States', 'home', '198.211.100.32'),
(212, 'United States', 'home', '198.211.100.32'),
(213, 'United States', 'home', '198.211.100.32'),
(214, 'United States', 'home', '198.211.100.32'),
(215, 'United States', 'home', '198.211.100.32'),
(216, 'United States', 'home', '198.211.100.32'),
(217, 'United States', 'home', '198.211.100.32'),
(218, 'United States', 'home', '198.211.100.32'),
(219, 'United States', 'home', '198.211.100.32'),
(220, 'United States', 'home', '198.211.100.32'),
(221, 'United States', 'home', '198.211.100.32'),
(222, 'United States', 'home', '198.211.100.32'),
(223, 'United States', 'home', '198.211.100.32'),
(224, 'United States', 'home', '198.211.100.32'),
(225, 'United States', 'home', '198.211.100.32'),
(226, 'United States', 'home', '198.211.100.32'),
(227, 'United States', 'home', '198.211.100.32'),
(228, 'United States', 'home', '198.211.100.32'),
(229, 'United States', 'home', '198.211.100.32'),
(230, 'United States', 'home', '198.211.100.32'),
(231, 'United States', 'home', '198.211.100.32'),
(232, 'United States', 'home', '198.211.100.32'),
(233, 'United States', 'home', '198.211.100.32'),
(234, 'United States', 'home', '198.211.100.32'),
(235, 'United States', 'home', '198.211.100.32'),
(236, 'United States', 'home', '198.211.100.32'),
(237, 'United States', 'home', '198.211.100.32'),
(238, 'United States', 'home', '198.211.100.32'),
(239, 'United States', 'home', '198.211.100.32'),
(240, 'United States', 'home', '198.211.100.32'),
(241, 'United States', 'home', '198.211.100.32'),
(242, 'United States', 'home', '198.211.100.32'),
(243, 'United States', 'home', '198.211.100.32'),
(244, 'United States', 'home', '198.211.100.32'),
(245, 'United States', 'home', '198.211.100.32'),
(246, 'United States', 'home', '198.211.100.32'),
(247, 'United States', 'home', '198.211.100.32'),
(248, 'United States', 'home', '198.211.100.32'),
(249, 'United States', 'home', '198.211.100.32'),
(250, 'United States', 'home', '198.211.100.32'),
(251, 'United States', 'home', '198.211.100.32'),
(252, 'United States', 'home', '198.211.100.32'),
(253, 'United States', 'home', '198.211.100.32'),
(254, 'United States', 'home', '198.211.100.32'),
(255, 'United States', 'home', '198.211.100.32'),
(256, 'United States', 'home', '198.211.100.32'),
(257, 'United States', 'home', '198.211.100.32'),
(258, 'United States', 'home', '198.211.100.32'),
(259, 'United States', 'home', '198.211.100.32'),
(260, 'United States', 'home', '198.211.100.32'),
(261, 'United States', 'home', '198.211.100.32'),
(262, 'United States', 'home', '198.211.100.32'),
(263, 'United States', 'home', '198.211.100.32'),
(264, 'United States', 'home', '198.211.100.32'),
(265, 'United States', 'home', '198.211.100.32'),
(266, 'United States', 'home', '198.211.100.32'),
(267, 'United States', 'home', '198.211.100.32'),
(268, 'United States', 'home', '198.211.100.32'),
(269, 'United States', 'home', '198.211.100.32'),
(270, 'United States', 'home', '198.211.100.32'),
(271, 'United States', 'home', '198.211.100.32'),
(272, 'United States', 'home', '198.211.100.32'),
(273, 'United States', 'home', '198.211.100.32'),
(274, 'United States', 'home', '198.211.100.32'),
(275, 'United States', 'home', '198.211.100.32'),
(276, 'United States', 'home', '198.211.100.32'),
(277, 'United States', 'home', '198.211.100.32'),
(278, 'United States', 'home', '198.211.100.32'),
(279, 'United States', 'home', '198.211.100.32'),
(280, 'United States', 'home', '198.211.100.32'),
(281, 'United States', 'home', '198.211.100.32'),
(282, 'United States', 'home', '198.211.100.32'),
(283, 'United States', 'home', '198.211.100.32'),
(284, 'United States', 'home', '198.211.100.32'),
(285, 'United States', 'home', '198.211.100.32'),
(286, 'United States', 'home', '198.211.100.32'),
(287, 'United States', 'home', '198.211.100.32'),
(288, 'United States', 'home', '198.211.100.32'),
(289, 'United States', 'home', '198.211.100.32'),
(290, 'United States', 'home', '198.211.100.32'),
(291, 'United States', 'home', '198.211.100.32'),
(292, 'United States', 'home', '198.211.100.32'),
(293, 'United States', 'home', '198.211.100.32'),
(294, 'United States', 'home', '198.211.100.32'),
(295, 'United States', 'home', '198.211.100.32'),
(296, 'United States', 'home', '198.211.100.32'),
(297, 'United States', 'home', '198.211.100.32'),
(298, 'United States', 'home', '198.211.100.32'),
(299, 'United States', 'home', '198.211.100.32'),
(300, 'United States', 'home', '198.211.100.32'),
(301, 'United States', 'home', '198.211.100.32'),
(302, 'United States', 'home', '198.211.100.32'),
(303, 'United States', 'home', '198.211.100.32'),
(304, 'United States', 'home', '198.211.100.32'),
(305, 'United States', 'home', '198.211.100.32'),
(306, 'United States', 'home', '198.211.100.32'),
(307, 'United States', 'home', '198.211.100.32'),
(308, 'United States', 'home', '198.211.100.32'),
(309, 'United States', 'home', '198.211.100.32'),
(310, 'United States', 'home', '198.211.100.32'),
(311, 'United States', 'home', '198.211.100.32'),
(312, 'United States', 'home', '198.211.100.32'),
(313, 'United States', 'home', '198.211.100.32'),
(314, 'United States', 'home', '198.211.100.32'),
(315, 'United States', 'home', '198.211.100.32'),
(316, 'United States', 'home', '198.211.100.32'),
(317, 'United States', 'home', '198.211.100.32'),
(318, 'United States', 'home', '198.211.100.32'),
(319, 'United States', 'home', '198.211.100.32'),
(320, 'United States', 'home', '198.211.100.32'),
(321, 'United States', 'home', '198.211.100.32'),
(322, 'United States', 'home', '198.211.100.32'),
(323, 'United States', 'home', '198.211.100.32'),
(324, 'United States', 'home', '198.211.100.32'),
(325, 'United States', 'home', '198.211.100.32'),
(326, 'United States', 'home', '198.211.100.32'),
(327, 'United States', 'home', '198.211.100.32'),
(328, 'United States', 'home', '198.211.100.32'),
(329, 'United States', 'home', '198.211.100.32'),
(330, 'United States', 'home', '198.211.100.32'),
(331, 'United States', 'home', '198.211.100.32'),
(332, 'United States', 'home', '198.211.100.32'),
(333, 'United States', 'home', '198.211.100.32'),
(334, 'United States', 'home', '198.211.100.32'),
(335, 'United States', 'home', '198.211.100.32'),
(336, 'United States', 'home', '198.211.100.32'),
(337, 'United States', 'home', '198.211.100.32'),
(338, 'United States', 'home', '198.211.100.32'),
(339, 'United States', 'home', '198.211.100.32'),
(340, 'United States', 'home', '198.211.100.32'),
(341, 'United States', 'home', '198.211.100.32'),
(342, 'United States', 'home', '198.211.100.32'),
(343, 'United States', 'home', '198.211.100.32'),
(344, 'United States', 'home', '198.211.100.32'),
(345, 'United States', 'home', '198.211.100.32'),
(346, 'United States', 'home', '198.211.100.32'),
(347, 'United States', 'home', '198.211.100.32'),
(348, 'United States', 'home', '198.211.100.32'),
(349, 'United States', 'home', '198.211.100.32'),
(350, 'United States', 'home', '198.211.100.32'),
(351, 'United States', 'home', '198.211.100.32'),
(352, 'United States', 'home', '198.211.100.32'),
(353, 'United States', 'home', '198.211.100.32'),
(354, 'United States', 'home', '198.211.100.32'),
(355, 'United States', 'home', '198.211.100.32'),
(356, 'United States', 'home', '198.211.100.32'),
(357, 'United States', 'home', '198.211.100.32'),
(358, 'United States', 'home', '198.211.100.32'),
(359, 'United States', 'home', '198.211.100.32'),
(360, 'United States', 'home', '198.211.100.32'),
(361, 'United States', 'home', '198.211.100.32'),
(362, 'United States', 'home', '198.211.100.32'),
(363, 'United States', 'home', '198.211.100.32'),
(364, 'United States', 'home', '198.211.100.32'),
(365, 'United States', 'home', '198.211.100.32'),
(366, 'United States', 'home', '198.211.100.32'),
(367, 'United States', 'home', '198.211.100.32'),
(368, 'United States', 'home', '198.211.100.32'),
(369, 'United States', 'home', '198.211.100.32'),
(370, 'United States', 'home', '198.211.100.32'),
(371, 'United States', 'home', '198.211.100.32'),
(372, 'United States', 'home', '198.211.100.32'),
(373, 'United States', 'home', '198.211.100.32'),
(374, 'United States', 'home', '198.211.100.32'),
(375, 'United States', 'home', '198.211.100.32'),
(376, 'United States', 'home', '198.211.100.32'),
(377, 'United States', 'home', '198.211.100.32'),
(378, 'United States', 'home', '198.211.100.32'),
(379, 'United States', 'home', '198.211.100.32'),
(380, 'United States', 'home', '198.211.100.32'),
(381, 'United States', 'home', '198.211.100.32'),
(382, 'United States', 'home', '198.211.100.32'),
(383, 'United States', 'home', '198.211.100.32'),
(384, 'United States', 'home', '198.211.100.32'),
(385, 'United States', 'home', '198.211.100.32'),
(386, 'United States', 'home', '198.211.100.32'),
(387, 'United States', 'home', '198.211.100.32'),
(388, 'United States', 'home', '198.211.100.32'),
(389, 'United States', 'home', '198.211.100.32'),
(390, 'United States', 'home', '198.211.100.32'),
(391, 'United States', 'home', '198.211.100.32'),
(392, 'United States', 'home', '198.211.100.32'),
(393, 'United States', 'home', '198.211.100.32'),
(394, 'United States', 'home', '198.211.100.32'),
(395, 'United States', 'home', '198.211.100.32'),
(396, 'United States', 'home', '198.211.100.32'),
(397, 'United States', 'home', '198.211.100.32'),
(398, 'United States', 'home', '198.211.100.32'),
(399, 'United States', 'home', '198.211.100.32'),
(400, 'United States', 'home', '198.211.100.32'),
(401, 'United States', 'home', '198.211.100.32'),
(402, 'United States', 'home', '198.211.100.32'),
(403, 'United States', 'home', '198.211.100.32'),
(404, 'United States', 'home', '198.211.100.32'),
(405, 'United States', 'home', '198.211.100.32'),
(406, 'United States', 'home', '198.211.100.32'),
(407, 'United States', 'home', '198.211.100.32'),
(408, 'United States', 'home', '198.211.100.32'),
(409, 'United States', 'home', '198.211.100.32'),
(410, 'United States', 'home', '198.211.100.32'),
(411, 'United States', 'home', '198.211.100.32'),
(412, 'United States', 'home', '198.211.100.32'),
(413, 'United States', 'home', '198.211.100.32'),
(414, 'United States', 'home', '198.211.100.32'),
(415, 'United States', 'home', '198.211.100.32'),
(416, 'United States', 'home', '198.211.100.32'),
(417, 'United States', 'home', '198.211.100.32'),
(418, 'United States', 'home', '198.211.100.32'),
(419, 'United States', 'home', '198.211.100.32'),
(420, 'United States', 'home', '198.211.100.32'),
(421, 'United States', 'home', '198.211.100.32'),
(422, 'United States', 'home', '198.211.100.32'),
(423, 'United States', 'home', '198.211.100.32'),
(424, 'United States', 'home', '198.211.100.32'),
(425, 'United States', 'home', '198.211.100.32'),
(426, 'United States', 'home', '198.211.100.32'),
(427, 'United States', 'home', '198.211.100.32'),
(428, 'United States', 'home', '198.211.100.32'),
(429, 'United States', 'home', '198.211.100.32'),
(430, 'United States', 'home', '198.211.100.32'),
(431, 'United States', 'home', '198.211.100.32'),
(432, 'United States', 'home', '198.211.100.32'),
(433, 'United States', 'home', '198.211.100.32'),
(434, 'United States', 'home', '198.211.100.32'),
(435, 'United States', 'home', '198.211.100.32'),
(436, 'United States', 'home', '198.211.100.32'),
(437, 'United States', 'home', '198.211.100.32'),
(438, 'United States', 'home', '198.211.100.32'),
(439, 'United States', 'home', '198.211.100.32'),
(440, 'United States', 'home', '198.211.100.32'),
(441, 'United States', 'home', '198.211.100.32'),
(442, 'United States', 'home', '198.211.100.32'),
(443, 'United States', 'home', '198.211.100.32'),
(444, 'United States', 'home', '198.211.100.32'),
(445, 'United States', 'home', '198.211.100.32'),
(446, 'United States', 'home', '198.211.100.32'),
(447, 'United States', 'home', '198.211.100.32'),
(448, 'United States', 'home', '198.211.100.32'),
(449, 'United States', 'home', '198.211.100.32'),
(450, 'United States', 'home', '198.211.100.32'),
(451, 'United States', 'home', '198.211.100.32'),
(452, 'United States', 'home', '198.211.100.32'),
(453, 'United States', 'home', '198.211.100.32'),
(454, 'United States', 'home', '198.211.100.32'),
(455, 'United States', 'home', '198.211.100.32'),
(456, 'United States', 'home', '198.211.100.32'),
(457, 'United States', 'home', '198.211.100.32'),
(458, 'United States', 'home', '198.211.100.32'),
(459, 'United States', 'home', '198.211.100.32'),
(460, 'United States', 'home', '198.211.100.32'),
(461, 'United States', 'home', '198.211.100.32'),
(462, 'United States', 'home', '198.211.100.32'),
(463, 'United States', 'home', '198.211.100.32'),
(464, 'United States', 'home', '198.211.100.32'),
(465, 'United States', 'home', '198.211.100.32'),
(466, 'United States', 'home', '198.211.100.32'),
(467, 'United States', 'home', '198.211.100.32'),
(468, 'United States', 'home', '198.211.100.32'),
(469, 'United States', 'home', '198.211.100.32'),
(470, 'United States', 'home', '198.211.100.32'),
(471, 'United States', 'home', '198.211.100.32'),
(472, 'United States', 'home', '198.211.100.32'),
(473, 'United States', 'home', '198.211.100.32'),
(474, 'United States', 'home', '198.211.100.32'),
(475, 'United States', 'home', '198.211.100.32'),
(476, 'United States', 'home', '198.211.100.32'),
(477, 'United States', 'home', '198.211.100.32'),
(478, 'United States', 'home', '198.211.100.32'),
(479, 'United States', 'home', '198.211.100.32'),
(480, 'United States', 'home', '198.211.100.32'),
(481, 'United States', 'home', '198.211.100.32'),
(482, 'United States', 'home', '198.211.100.32'),
(483, 'United States', 'home', '198.211.100.32'),
(484, 'United States', 'home', '198.211.100.32'),
(485, 'United States', 'home', '198.211.100.32'),
(486, 'United States', 'home', '198.211.100.32'),
(487, 'United States', 'home', '198.211.100.32'),
(488, 'United States', 'home', '198.211.100.32'),
(489, 'United States', 'home', '198.211.100.32'),
(490, 'United States', 'home', '198.211.100.32'),
(491, 'United States', 'home', '198.211.100.32'),
(492, 'United States', 'home', '198.211.100.32'),
(493, 'United States', 'home', '198.211.100.32'),
(494, 'United States', 'home', '198.211.100.32'),
(495, 'United States', 'home', '198.211.100.32'),
(496, 'United States', 'home', '198.211.100.32'),
(497, 'United States', 'home', '198.211.100.32'),
(498, 'United States', 'home', '198.211.100.32'),
(499, 'United States', 'home', '198.211.100.32'),
(500, 'United States', 'home', '198.211.100.32'),
(501, 'United States', 'home', '198.211.100.32'),
(502, 'United States', 'home', '198.211.100.32'),
(503, 'United States', 'home', '198.211.100.32'),
(504, 'United States', 'home', '198.211.100.32'),
(505, 'United States', 'home', '198.211.100.32'),
(506, 'United States', 'home', '198.211.100.32'),
(507, 'United States', 'home', '198.211.100.32'),
(508, 'United States', 'home', '198.211.100.32'),
(509, 'United States', 'home', '198.211.100.32'),
(510, 'United States', 'home', '198.211.100.32'),
(511, 'United States', 'home', '198.211.100.32'),
(512, 'United States', 'home', '198.211.100.32'),
(513, 'United States', 'home', '198.211.100.32'),
(514, 'United States', 'home', '198.211.100.32'),
(515, 'United States', 'home', '198.211.100.32'),
(516, 'United States', 'home', '198.211.100.32'),
(517, 'United States', 'home', '198.211.100.32'),
(518, 'United States', 'home', '198.211.100.32'),
(519, 'United States', 'home', '198.211.100.32'),
(520, 'United States', 'home', '198.211.100.32'),
(521, 'United States', 'home', '198.211.100.32'),
(522, 'United States', 'home', '198.211.100.32'),
(523, 'United States', 'home', '198.211.100.32'),
(524, 'United States', 'home', '198.211.100.32'),
(525, 'United States', 'home', '198.211.100.32'),
(526, 'United States', 'home', '198.211.100.32'),
(527, 'United States', 'home', '198.211.100.32'),
(528, 'United States', 'home', '198.211.100.32'),
(529, 'United States', 'home', '198.211.100.32'),
(530, 'United States', 'home', '198.211.100.32'),
(531, 'United States', 'home', '198.211.100.32'),
(532, 'United States', 'home', '198.211.100.32'),
(533, 'United States', 'home', '198.211.100.32'),
(534, 'United States', 'home', '198.211.100.32'),
(535, 'United States', 'home', '198.211.100.32'),
(536, 'United States', 'home', '198.211.100.32'),
(537, 'United States', 'home', '198.211.100.32'),
(538, 'United States', 'home', '198.211.100.32'),
(539, 'United States', 'home', '198.211.100.32'),
(540, 'United States', 'home', '198.211.100.32'),
(541, 'United States', 'home', '198.211.100.32'),
(542, 'United States', 'home', '198.211.100.32'),
(543, 'United States', 'home', '198.211.100.32'),
(544, 'United States', 'home', '198.211.100.32'),
(545, 'United States', 'home', '198.211.100.32'),
(546, 'United States', 'home', '198.211.100.32'),
(547, 'United States', 'home', '198.211.100.32'),
(548, 'United States', 'home', '198.211.100.32'),
(549, 'United States', 'home', '198.211.100.32'),
(550, 'United States', 'home', '198.211.100.32'),
(551, 'United States', 'home', '198.211.100.32'),
(552, 'United States', 'home', '198.211.100.32'),
(553, 'United States', 'home', '198.211.100.32'),
(554, 'United States', 'home', '198.211.100.32'),
(555, 'United States', 'home', '198.211.100.32'),
(556, 'United States', 'home', '198.211.100.32'),
(557, 'United States', 'home', '198.211.100.32'),
(558, 'United States', 'home', '198.211.100.32'),
(559, 'United States', 'home', '198.211.100.32'),
(560, 'United States', 'home', '198.211.100.32'),
(561, 'United States', 'home', '198.211.100.32'),
(562, 'United States', 'home', '198.211.100.32'),
(563, 'United States', 'home', '198.211.100.32'),
(564, 'United States', 'home', '198.211.100.32'),
(565, 'United States', 'home', '198.211.100.32'),
(566, 'United States', 'home', '198.211.100.32'),
(567, 'United States', 'home', '198.211.100.32'),
(568, 'United States', 'home', '198.211.100.32'),
(569, 'United States', 'home', '198.211.100.32'),
(570, 'United States', 'home', '198.211.100.32'),
(571, 'United States', 'home', '198.211.100.32'),
(572, 'United States', 'home', '198.211.100.32'),
(573, 'United States', 'home', '198.211.100.32'),
(574, 'United States', 'home', '198.211.100.32'),
(575, 'United States', 'home', '198.211.100.32'),
(576, 'United States', 'home', '198.211.100.32'),
(577, 'United States', 'home', '198.211.100.32'),
(578, 'United States', 'home', '198.211.100.32'),
(579, 'United States', 'home', '198.211.100.32'),
(580, 'United States', 'home', '198.211.100.32'),
(581, 'United States', 'home', '198.211.100.32'),
(582, 'United States', 'home', '198.211.100.32'),
(583, 'United States', 'home', '198.211.100.32'),
(584, 'United States', 'home', '198.211.100.32'),
(585, 'United States', 'home', '198.211.100.32'),
(586, 'United States', 'home', '198.211.100.32'),
(587, 'United States', 'home', '198.211.100.32'),
(588, 'United States', 'home', '198.211.100.32'),
(589, 'United States', 'home', '198.211.100.32'),
(590, 'United States', 'home', '198.211.100.32'),
(591, 'United States', 'home', '198.211.100.32'),
(592, 'United States', 'home', '198.211.100.32'),
(593, 'United States', 'home', '198.211.100.32'),
(594, 'United States', 'home', '198.211.100.32'),
(595, 'United States', 'home', '198.211.100.32'),
(596, 'United States', 'home', '198.211.100.32'),
(597, 'United States', 'home', '198.211.100.32'),
(598, 'United States', 'home', '198.211.100.32'),
(599, 'United States', 'home', '198.211.100.32'),
(600, 'United States', 'home', '198.211.100.32'),
(601, 'United States', 'home', '198.211.100.32'),
(602, 'United States', 'home', '198.211.100.32'),
(603, 'United States', 'home', '198.211.100.32'),
(604, 'United States', 'home', '198.211.100.32'),
(605, 'United States', 'home', '198.211.100.32'),
(606, 'United States', 'home', '198.211.100.32'),
(607, 'United States', 'home', '198.211.100.32'),
(608, 'United States', 'home', '198.211.100.32'),
(609, 'United States', 'home', '198.211.100.32'),
(610, 'United States', 'home', '198.211.100.32'),
(611, 'United States', 'home', '198.211.100.32'),
(612, 'United States', 'home', '198.211.100.32'),
(613, 'United States', 'home', '198.211.100.32'),
(614, 'United States', 'home', '198.211.100.32'),
(615, 'United States', 'home', '198.211.100.32'),
(616, 'United States', 'home', '198.211.100.32'),
(617, 'United States', 'home', '198.211.100.32'),
(618, 'United States', 'home', '198.211.100.32'),
(619, 'United States', 'home', '198.211.100.32'),
(620, 'United States', 'home', '198.211.100.32'),
(621, 'United States', 'home', '198.211.100.32'),
(622, 'United States', 'home', '198.211.100.32'),
(623, 'United States', 'home', '198.211.100.32'),
(624, 'United States', 'home', '198.211.100.32'),
(625, 'United States', 'home', '198.211.100.32'),
(626, 'United States', 'home', '198.211.100.32'),
(627, 'United States', 'home', '198.211.100.32'),
(628, 'United States', 'home', '198.211.100.32'),
(629, 'United States', 'home', '198.211.100.32'),
(630, 'United States', 'home', '198.211.100.32'),
(631, 'United States', 'home', '198.211.100.32'),
(632, 'United States', 'home', '198.211.100.32'),
(633, 'United States', 'home', '198.211.100.32'),
(634, 'United States', 'home', '198.211.100.32'),
(635, 'United States', 'home', '198.211.100.32'),
(636, 'United States', 'home', '198.211.100.32'),
(637, 'United States', 'home', '198.211.100.32'),
(638, 'United States', 'home', '198.211.100.32'),
(639, 'United States', 'home', '198.211.100.32'),
(640, 'United States', 'home', '198.211.100.32'),
(641, 'United States', 'home', '198.211.100.32'),
(642, 'United States', 'home', '198.211.100.32'),
(643, 'United States', 'home', '198.211.100.32'),
(644, 'United States', 'home', '198.211.100.32'),
(645, 'United States', 'home', '198.211.100.32'),
(646, 'United States', 'home', '198.211.100.32'),
(647, 'United States', 'home', '198.211.100.32'),
(648, 'United States', 'home', '198.211.100.32'),
(649, 'United States', 'home', '198.211.100.32'),
(650, 'United States', 'home', '198.211.100.32'),
(651, 'United States', 'home', '198.211.100.32'),
(652, 'United States', 'home', '198.211.100.32'),
(653, 'United States', 'home', '198.211.100.32'),
(654, 'United States', 'home', '198.211.100.32'),
(655, 'United States', 'home', '198.211.100.32'),
(656, 'United States', 'home', '198.211.100.32'),
(657, 'United States', 'home', '198.211.100.32'),
(658, 'United States', 'home', '198.211.100.32'),
(659, 'United States', 'home', '198.211.100.32'),
(660, 'United States', 'home', '198.211.100.32'),
(661, 'United States', 'home', '198.211.100.32'),
(662, 'United States', 'home', '198.211.100.32'),
(663, 'United States', 'home', '198.211.100.32'),
(664, 'United States', 'home', '198.211.100.32'),
(665, 'United States', 'home', '198.211.100.32'),
(666, 'United States', 'home', '198.211.100.32'),
(667, 'United States', 'home', '198.211.100.32'),
(668, 'United States', 'home', '198.211.100.32'),
(669, 'United States', 'home', '198.211.100.32'),
(670, 'United States', 'home', '198.211.100.32'),
(671, 'United States', 'home', '198.211.100.32'),
(672, 'United States', 'home', '198.211.100.32'),
(673, 'United States', 'home', '198.211.100.32'),
(674, 'United States', 'home', '198.211.100.32'),
(675, 'United States', 'home', '198.211.100.32'),
(676, 'United States', 'home', '198.211.100.32'),
(677, 'United States', 'home', '198.211.100.32'),
(678, 'United States', 'home', '198.211.100.32'),
(679, 'United States', 'home', '198.211.100.32'),
(680, 'United States', 'home', '198.211.100.32'),
(681, 'United States', 'home', '198.211.100.32'),
(682, 'United States', 'home', '198.211.100.32'),
(683, 'United States', 'home', '198.211.100.32'),
(684, 'United States', 'home', '198.211.100.32'),
(685, 'United States', 'home', '198.211.100.32'),
(686, 'United States', 'home', '198.211.100.32'),
(687, 'United States', 'home', '198.211.100.32'),
(688, 'United States', 'home', '198.211.100.32'),
(689, 'United States', 'home', '198.211.100.32'),
(690, 'United States', 'home', '198.211.100.32'),
(691, 'United States', 'home', '198.211.100.32'),
(692, 'United States', 'home', '198.211.100.32'),
(693, 'United States', 'home', '198.211.100.32'),
(694, 'United States', 'home', '198.211.100.32'),
(695, 'United States', 'home', '198.211.100.32'),
(696, 'United States', 'home', '198.211.100.32'),
(697, 'United States', 'home', '198.211.100.32'),
(698, 'United States', 'home', '198.211.100.32'),
(699, 'United States', 'home', '198.211.100.32'),
(700, 'United States', 'home', '198.211.100.32'),
(701, 'United States', 'home', '198.211.100.32'),
(702, 'United States', 'home', '198.211.100.32'),
(703, 'United States', 'home', '198.211.100.32'),
(704, 'United States', 'home', '198.211.100.32'),
(705, 'United States', 'home', '198.211.100.32'),
(706, 'United States', 'home', '198.211.100.32'),
(707, 'United States', 'home', '198.211.100.32'),
(708, 'United States', 'home', '198.211.100.32'),
(709, 'United States', 'home', '198.211.100.32'),
(710, 'United States', 'home', '198.211.100.32'),
(711, 'United States', 'home', '198.211.100.32'),
(712, 'United States', 'home', '198.211.100.32'),
(713, 'United States', 'home', '198.211.100.32'),
(714, 'United States', 'home', '198.211.100.32'),
(715, 'United States', 'home', '198.211.100.32'),
(716, 'United States', 'home', '198.211.100.32'),
(717, 'United States', 'home', '198.211.100.32'),
(718, 'United States', 'home', '198.211.100.32'),
(719, 'United States', 'home', '198.211.100.32'),
(720, 'United States', 'home', '198.211.100.32'),
(721, 'United States', 'home', '198.211.100.32'),
(722, 'United States', 'home', '198.211.100.32'),
(723, 'United States', 'home', '198.211.100.32'),
(724, 'United States', 'home', '198.211.100.32'),
(725, 'United States', 'home', '198.211.100.32'),
(726, 'United States', 'home', '198.211.100.32'),
(727, 'United States', 'home', '198.211.100.32'),
(728, 'United States', 'home', '198.211.100.32'),
(729, 'United States', 'home', '198.211.100.32'),
(730, 'United States', 'home', '198.211.100.32'),
(731, 'United States', 'home', '198.211.100.32'),
(732, 'United States', 'home', '198.211.100.32'),
(733, 'United States', 'home', '198.211.100.32'),
(734, 'United States', 'home', '198.211.100.32'),
(735, 'United States', 'home', '198.211.100.32'),
(736, 'United States', 'home', '198.211.100.32'),
(737, 'United States', 'home', '198.211.100.32'),
(738, 'United States', 'home', '198.211.100.32'),
(739, 'United States', 'home', '198.211.100.32'),
(740, 'United States', 'home', '198.211.100.32'),
(741, 'United States', 'home', '198.211.100.32'),
(742, 'United States', 'home', '198.211.100.32'),
(743, 'United States', 'home', '198.211.100.32'),
(744, 'United States', 'home', '198.211.100.32'),
(745, 'United States', 'home', '198.211.100.32'),
(746, 'United States', 'home', '198.211.100.32'),
(747, 'United States', 'home', '198.211.100.32'),
(748, 'United States', 'home', '198.211.100.32'),
(749, 'United States', 'home', '198.211.100.32'),
(750, 'United States', 'home', '198.211.100.32'),
(751, 'United States', 'home', '198.211.100.32'),
(752, 'United States', 'home', '198.211.100.32'),
(753, 'United States', 'home', '198.211.100.32'),
(754, 'United States', 'home', '198.211.100.32'),
(755, 'United States', 'home', '198.211.100.32'),
(756, 'United States', 'home', '198.211.100.32'),
(757, 'United States', 'home', '198.211.100.32'),
(758, 'United States', 'home', '198.211.100.32'),
(759, 'United States', 'home', '198.211.100.32'),
(760, 'United States', 'home', '198.211.100.32'),
(761, 'United States', 'home', '198.211.100.32'),
(762, 'United States', 'home', '198.211.100.32'),
(763, 'United States', 'home', '198.211.100.32'),
(764, 'United States', 'home', '198.211.100.32'),
(765, 'United States', 'home', '198.211.100.32'),
(766, 'United States', 'home', '198.211.100.32'),
(767, 'United States', 'home', '198.211.100.32'),
(768, 'United States', 'home', '198.211.100.32'),
(769, 'United States', 'home', '198.211.100.32'),
(770, 'United States', 'home', '198.211.100.32'),
(771, 'United States', 'home', '198.211.100.32'),
(772, 'United States', 'home', '198.211.100.32'),
(773, 'United States', 'home', '198.211.100.32'),
(774, 'United States', 'home', '198.211.100.32'),
(775, 'United States', 'home', '198.211.100.32'),
(776, 'United States', 'home', '198.211.100.32'),
(777, 'United States', 'home', '198.211.100.32'),
(778, 'United States', 'home', '198.211.100.32'),
(779, 'United States', 'home', '198.211.100.32'),
(780, 'United States', 'home', '198.211.100.32'),
(781, 'United States', 'home', '198.211.100.32'),
(782, 'United States', 'home', '198.211.100.32'),
(783, 'United States', 'home', '198.211.100.32'),
(784, 'United States', 'home', '198.211.100.32'),
(785, 'United States', 'home', '198.211.100.32'),
(786, 'United States', 'home', '198.211.100.32'),
(787, 'United States', 'home', '198.211.100.32'),
(788, 'United States', 'home', '198.211.100.32'),
(789, 'United States', 'home', '198.211.100.32'),
(790, 'United States', 'home', '198.211.100.32'),
(791, 'United States', 'home', '198.211.100.32'),
(792, 'United States', 'home', '198.211.100.32'),
(793, 'United States', 'home', '198.211.100.32'),
(794, 'United States', 'home', '198.211.100.32'),
(795, 'United States', 'home', '198.211.100.32'),
(796, 'United States', 'home', '198.211.100.32'),
(797, 'United States', 'home', '198.211.100.32'),
(798, 'United States', 'home', '198.211.100.32'),
(799, 'United States', 'home', '198.211.100.32'),
(800, 'United States', 'home', '198.211.100.32'),
(801, 'United States', 'home', '198.211.100.32'),
(802, 'United States', 'home', '198.211.100.32'),
(803, 'United States', 'home', '198.211.100.32'),
(804, 'United States', 'home', '198.211.100.32'),
(805, 'United States', 'home', '198.211.100.32'),
(806, 'United States', 'home', '198.211.100.32'),
(807, 'United States', 'home', '198.211.100.32'),
(808, 'United States', 'home', '198.211.100.32'),
(809, 'United States', 'home', '198.211.100.32'),
(810, 'United States', 'home', '198.211.100.32'),
(811, 'United States', 'home', '198.211.100.32'),
(812, 'United States', 'home', '198.211.100.32'),
(813, 'United States', 'home', '198.211.100.32'),
(814, 'United States', 'home', '198.211.100.32'),
(815, 'United States', 'home', '198.211.100.32'),
(816, 'United States', 'home', '198.211.100.32'),
(817, 'United States', 'home', '198.211.100.32'),
(818, 'United States', 'home', '198.211.100.32'),
(819, 'United States', 'home', '198.211.100.32'),
(820, 'United States', 'home', '198.211.100.32'),
(821, 'United States', 'home', '198.211.100.32'),
(822, 'United States', 'home', '198.211.100.32'),
(823, 'United States', 'home', '198.211.100.32'),
(824, 'United States', 'home', '198.211.100.32'),
(825, 'United States', 'home', '198.211.100.32'),
(826, 'United States', 'home', '198.211.100.32'),
(827, 'United States', 'home', '198.211.100.32'),
(828, 'United States', 'home', '198.211.100.32'),
(829, 'United States', 'home', '198.211.100.32'),
(830, 'United States', 'home', '198.211.100.32'),
(831, 'United States', 'home', '198.211.100.32'),
(832, 'United States', 'home', '198.211.100.32'),
(833, 'United States', 'home', '198.211.100.32'),
(834, 'United States', 'home', '198.211.100.32'),
(835, 'United States', 'home', '198.211.100.32'),
(836, 'United States', 'home', '198.211.100.32'),
(837, 'United States', 'home', '198.211.100.32'),
(838, 'United States', 'home', '198.211.100.32'),
(839, 'United States', 'home', '198.211.100.32'),
(840, 'United States', 'home', '198.211.100.32'),
(841, 'United States', 'home', '198.211.100.32'),
(842, 'United States', 'home', '198.211.100.32'),
(843, 'United States', 'home', '198.211.100.32'),
(844, 'United States', 'home', '198.211.100.32'),
(845, 'United States', 'home', '198.211.100.32'),
(846, 'United States', 'home', '198.211.100.32');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_webcontact`
--

CREATE TABLE `eslearning_webcontact` (
  `idwebcontact` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phonenumber` char(12) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_webcontact`
--

INSERT INTO `eslearning_webcontact` (`idwebcontact`, `iduser`, `email`, `phonenumber`, `address`) VALUES
(1, 'u001', 'cs@upi.edu', '+62222007140', 'Jl. Dokter Setiabudhi No.276A Isola Cidadap, Isola, Kec. Sukasari, Kota Bandung, Jawa Barat 40154, Indonesia.');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_webinfo`
--

CREATE TABLE `eslearning_webinfo` (
  `idwebinfo` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `idlanguage` int(4) NOT NULL,
  `websitename` varchar(250) NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_webinfo`
--

INSERT INTO `eslearning_webinfo` (`idwebinfo`, `iduser`, `idlanguage`, `websitename`, `keyword`, `author`, `year`, `description`) VALUES
(1, 'u001', 1, 'Erlangga Studio - Platform Daring dan Video Bahan Ajar Daring', 'Erlangga Studio - Platform Daring dan Video Bahan Ajar Daring', 'Erlangga Studio', 2020, 'Platfrom Daring dan Video Bahan Ajar Daring untuk Programing dan Teknologi Informasi '),
(2, 'u001', 2, 'eslearning - Online Video Learning Management System Platform', 'eslearning - Online Video Learning Management System Platform', 'Erlangga Studio', 2020, 'Online Video Learning Management System Platform for Programing and Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_weblogo`
--

CREATE TABLE `eslearning_weblogo` (
  `idweblogo` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_weblogo`
--

INSERT INTO `eslearning_weblogo` (`idweblogo`, `iduser`, `logo`, `favicon`) VALUES
(1, 'u001', 'eslogo.png', 'favicon-eslearning.png');

-- --------------------------------------------------------

--
-- Table structure for table `eslearning_websocialmedia`
--

CREATE TABLE `eslearning_websocialmedia` (
  `idwebsocialmedia` int(4) NOT NULL,
  `iduser` varchar(12) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eslearning_websocialmedia`
--

INSERT INTO `eslearning_websocialmedia` (`idwebsocialmedia`, `iduser`, `facebook`, `twitter`, `youtube`, `instagram`) VALUES
(1, 'u001', 'http://facebook.com/eslearning', 'http://twitter.com/eslearning', 'http://youtube.com/eslearning', 'http://instagram.com/eslearning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eslearning_accountbank`
--
ALTER TABLE `eslearning_accountbank`
  ADD PRIMARY KEY (`idaccountbank`);

--
-- Indexes for table `eslearning_bank`
--
ALTER TABLE `eslearning_bank`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `eslearning_bannerberanda`
--
ALTER TABLE `eslearning_bannerberanda`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indexes for table `eslearning_bannerweb`
--
ALTER TABLE `eslearning_bannerweb`
  ADD PRIMARY KEY (`idbannerweb`);

--
-- Indexes for table `eslearning_category`
--
ALTER TABLE `eslearning_category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `eslearning_content`
--
ALTER TABLE `eslearning_content`
  ADD PRIMARY KEY (`idcontent`);

--
-- Indexes for table `eslearning_contentprogress`
--
ALTER TABLE `eslearning_contentprogress`
  ADD PRIMARY KEY (`idcontentprogress`);

--
-- Indexes for table `eslearning_countries`
--
ALTER TABLE `eslearning_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslearning_courses`
--
ALTER TABLE `eslearning_courses`
  ADD PRIMARY KEY (`idcourses`);

--
-- Indexes for table `eslearning_coursetype`
--
ALTER TABLE `eslearning_coursetype`
  ADD PRIMARY KEY (`idcoursetype`);

--
-- Indexes for table `eslearning_currency`
--
ALTER TABLE `eslearning_currency`
  ADD PRIMARY KEY (`idcurrency`);

--
-- Indexes for table `eslearning_education`
--
ALTER TABLE `eslearning_education`
  ADD PRIMARY KEY (`ideducation`);

--
-- Indexes for table `eslearning_educationlevel`
--
ALTER TABLE `eslearning_educationlevel`
  ADD PRIMARY KEY (`ideducationlevel`);

--
-- Indexes for table `eslearning_emailtemp`
--
ALTER TABLE `eslearning_emailtemp`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `eslearning_enroll`
--
ALTER TABLE `eslearning_enroll`
  ADD PRIMARY KEY (`idenroll`);

--
-- Indexes for table `eslearning_favorite`
--
ALTER TABLE `eslearning_favorite`
  ADD PRIMARY KEY (`idfavorite`);

--
-- Indexes for table `eslearning_instagram`
--
ALTER TABLE `eslearning_instagram`
  ADD PRIMARY KEY (`idinstagram`);

--
-- Indexes for table `eslearning_instructors`
--
ALTER TABLE `eslearning_instructors`
  ADD PRIMARY KEY (`idinstructors`);

--
-- Indexes for table `eslearning_language`
--
ALTER TABLE `eslearning_language`
  ADD PRIMARY KEY (`idlanguage`);

--
-- Indexes for table `eslearning_lecturer`
--
ALTER TABLE `eslearning_lecturer`
  ADD PRIMARY KEY (`idlecturer`);

--
-- Indexes for table `eslearning_level`
--
ALTER TABLE `eslearning_level`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indexes for table `eslearning_menukedua`
--
ALTER TABLE `eslearning_menukedua`
  ADD PRIMARY KEY (`idmenukedua`);

--
-- Indexes for table `eslearning_menuketiga`
--
ALTER TABLE `eslearning_menuketiga`
  ADD PRIMARY KEY (`idmenuketiga`);

--
-- Indexes for table `eslearning_menuutama`
--
ALTER TABLE `eslearning_menuutama`
  ADD PRIMARY KEY (`idmenuutama`);

--
-- Indexes for table `eslearning_message`
--
ALTER TABLE `eslearning_message`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indexes for table `eslearning_navcategory`
--
ALTER TABLE `eslearning_navcategory`
  ADD PRIMARY KEY (`idnavcategory`);

--
-- Indexes for table `eslearning_navigation`
--
ALTER TABLE `eslearning_navigation`
  ADD PRIMARY KEY (`idnavigation`);

--
-- Indexes for table `eslearning_order`
--
ALTER TABLE `eslearning_order`
  ADD PRIMARY KEY (`idorder`);

--
-- Indexes for table `eslearning_pagesweb`
--
ALTER TABLE `eslearning_pagesweb`
  ADD PRIMARY KEY (`idpagesweb`);

--
-- Indexes for table `eslearning_payment`
--
ALTER TABLE `eslearning_payment`
  ADD PRIMARY KEY (`idpayment`);

--
-- Indexes for table `eslearning_permissions`
--
ALTER TABLE `eslearning_permissions`
  ADD PRIMARY KEY (`idpermissions`);

--
-- Indexes for table `eslearning_reportmaterialcourses`
--
ALTER TABLE `eslearning_reportmaterialcourses`
  ADD PRIMARY KEY (`idreportmaterialcourses`);

--
-- Indexes for table `eslearning_review`
--
ALTER TABLE `eslearning_review`
  ADD PRIMARY KEY (`idreview`);

--
-- Indexes for table `eslearning_reviewreport`
--
ALTER TABLE `eslearning_reviewreport`
  ADD PRIMARY KEY (`idreviewreport`);

--
-- Indexes for table `eslearning_roles`
--
ALTER TABLE `eslearning_roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indexes for table `eslearning_subcategory`
--
ALTER TABLE `eslearning_subcategory`
  ADD PRIMARY KEY (`idsubcategory`);

--
-- Indexes for table `eslearning_subnavigation`
--
ALTER TABLE `eslearning_subnavigation`
  ADD PRIMARY KEY (`idsubnavigation`);

--
-- Indexes for table `eslearning_syllabus`
--
ALTER TABLE `eslearning_syllabus`
  ADD PRIMARY KEY (`idsyllabus`);

--
-- Indexes for table `eslearning_twitter`
--
ALTER TABLE `eslearning_twitter`
  ADD PRIMARY KEY (`idtwitter`);

--
-- Indexes for table `eslearning_userlogs`
--
ALTER TABLE `eslearning_userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eslearning_users`
--
ALTER TABLE `eslearning_users`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `eslearning_veritificationceklist`
--
ALTER TABLE `eslearning_veritificationceklist`
  ADD PRIMARY KEY (`idveritification`);

--
-- Indexes for table `eslearning_visitors`
--
ALTER TABLE `eslearning_visitors`
  ADD PRIMARY KEY (`idvisitors`);

--
-- Indexes for table `eslearning_webcontact`
--
ALTER TABLE `eslearning_webcontact`
  ADD PRIMARY KEY (`idwebcontact`);

--
-- Indexes for table `eslearning_webinfo`
--
ALTER TABLE `eslearning_webinfo`
  ADD PRIMARY KEY (`idwebinfo`);

--
-- Indexes for table `eslearning_weblogo`
--
ALTER TABLE `eslearning_weblogo`
  ADD PRIMARY KEY (`idweblogo`);

--
-- Indexes for table `eslearning_websocialmedia`
--
ALTER TABLE `eslearning_websocialmedia`
  ADD PRIMARY KEY (`idwebsocialmedia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eslearning_accountbank`
--
ALTER TABLE `eslearning_accountbank`
  MODIFY `idaccountbank` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eslearning_bannerberanda`
--
ALTER TABLE `eslearning_bannerberanda`
  MODIFY `idbanner` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_bannerweb`
--
ALTER TABLE `eslearning_bannerweb`
  MODIFY `idbannerweb` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslearning_category`
--
ALTER TABLE `eslearning_category`
  MODIFY `idcategory` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_content`
--
ALTER TABLE `eslearning_content`
  MODIFY `idcontent` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eslearning_contentprogress`
--
ALTER TABLE `eslearning_contentprogress`
  MODIFY `idcontentprogress` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eslearning_courses`
--
ALTER TABLE `eslearning_courses`
  MODIFY `idcourses` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_coursetype`
--
ALTER TABLE `eslearning_coursetype`
  MODIFY `idcoursetype` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_currency`
--
ALTER TABLE `eslearning_currency`
  MODIFY `idcurrency` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_education`
--
ALTER TABLE `eslearning_education`
  MODIFY `ideducation` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eslearning_educationlevel`
--
ALTER TABLE `eslearning_educationlevel`
  MODIFY `ideducationlevel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eslearning_enroll`
--
ALTER TABLE `eslearning_enroll`
  MODIFY `idenroll` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eslearning_favorite`
--
ALTER TABLE `eslearning_favorite`
  MODIFY `idfavorite` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eslearning_instagram`
--
ALTER TABLE `eslearning_instagram`
  MODIFY `idinstagram` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslearning_instructors`
--
ALTER TABLE `eslearning_instructors`
  MODIFY `idinstructors` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_language`
--
ALTER TABLE `eslearning_language`
  MODIFY `idlanguage` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_lecturer`
--
ALTER TABLE `eslearning_lecturer`
  MODIFY `idlecturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eslearning_level`
--
ALTER TABLE `eslearning_level`
  MODIFY `idlevel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eslearning_menukedua`
--
ALTER TABLE `eslearning_menukedua`
  MODIFY `idmenukedua` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `eslearning_menuketiga`
--
ALTER TABLE `eslearning_menuketiga`
  MODIFY `idmenuketiga` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eslearning_menuutama`
--
ALTER TABLE `eslearning_menuutama`
  MODIFY `idmenuutama` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eslearning_message`
--
ALTER TABLE `eslearning_message`
  MODIFY `idmessage` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eslearning_navcategory`
--
ALTER TABLE `eslearning_navcategory`
  MODIFY `idnavcategory` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eslearning_navigation`
--
ALTER TABLE `eslearning_navigation`
  MODIFY `idnavigation` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `eslearning_pagesweb`
--
ALTER TABLE `eslearning_pagesweb`
  MODIFY `idpagesweb` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_permissions`
--
ALTER TABLE `eslearning_permissions`
  MODIFY `idpermissions` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `eslearning_reportmaterialcourses`
--
ALTER TABLE `eslearning_reportmaterialcourses`
  MODIFY `idreportmaterialcourses` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslearning_review`
--
ALTER TABLE `eslearning_review`
  MODIFY `idreview` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eslearning_reviewreport`
--
ALTER TABLE `eslearning_reviewreport`
  MODIFY `idreviewreport` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eslearning_roles`
--
ALTER TABLE `eslearning_roles`
  MODIFY `idroles` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eslearning_subcategory`
--
ALTER TABLE `eslearning_subcategory`
  MODIFY `idsubcategory` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_subnavigation`
--
ALTER TABLE `eslearning_subnavigation`
  MODIFY `idsubnavigation` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `eslearning_syllabus`
--
ALTER TABLE `eslearning_syllabus`
  MODIFY `idsyllabus` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_twitter`
--
ALTER TABLE `eslearning_twitter`
  MODIFY `idtwitter` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eslearning_userlogs`
--
ALTER TABLE `eslearning_userlogs`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `eslearning_visitors`
--
ALTER TABLE `eslearning_visitors`
  MODIFY `idvisitors` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=847;

--
-- AUTO_INCREMENT for table `eslearning_webcontact`
--
ALTER TABLE `eslearning_webcontact`
  MODIFY `idwebcontact` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eslearning_webinfo`
--
ALTER TABLE `eslearning_webinfo`
  MODIFY `idwebinfo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eslearning_weblogo`
--
ALTER TABLE `eslearning_weblogo`
  MODIFY `idweblogo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eslearning_websocialmedia`
--
ALTER TABLE `eslearning_websocialmedia`
  MODIFY `idwebsocialmedia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
