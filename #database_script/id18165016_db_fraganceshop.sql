-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2021 at 03:08 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18165016_db_fraganceshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `password`, `email`, `name`) VALUES
('son2k', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenthaison@gmail.com', 'Thai Son');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pass`
--

CREATE TABLE `reset_pass` (
  `reset_id` int(11) NOT NULL,
  `m_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `m_time` bigint(20) NOT NULL,
  `m_numcheck` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reset_pass`
--

INSERT INTO `reset_pass` (`reset_id`, `m_email`, `m_token`, `m_time`, `m_numcheck`) VALUES
(5, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '7d5637a552699e47cb726b0a85f0ee08', 1640248314, 0),
(6, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'f30a358cf4a7bd072cefc0bc2e1bfe92', 1640250278, 0),
(7, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'fa8de9ab55a622bd39b89d753a15fb5e', 1640250949, 0),
(8, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '243b57de09b2dcf71f8c20ad027eb4e1', 1640251130, 0),
(9, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'fcc61b2988a00bc07ad0cf404f5e3921', 1640251332, 0),
(10, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'e17063cfd77fe33aa6cd9a292e5f6edb', 1640251696, 0),
(11, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '9a3422fff1a6af0aaa1806612f858a97', 1640251737, 0),
(12, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '97e1a5564aaf5e34caf1730ef663776d', 1640251822, 0),
(13, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '7bdacdc672f255b11474d9c4f1c47106', 1640251833, 0),
(14, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'fe7aa393d63e0764daa74c8cba6b5f3e', 1640251956, 0),
(15, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '750903cda4bcb6bf2b49b30a638af0d8', 1640253021, 0),
(16, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '59f3bd6497be62edead8eca2cf4a9f23', 1640253094, 0),
(17, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '6980eab443b706ab61503279a1375095', 1640253184, 0),
(18, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '178b1908110f7c5bcf5b90479bf573a9', 1640262435, 0),
(19, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'aeca3971da36d139a1f2810abbea7e89', 1640263932, 0),
(20, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'c59902a4f63f3fb8ea3f9cd78edc9f27', 1640266646, 0),
(21, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '97780d26c49735774f4dc12769c8e999', 1640272349, 0),
(22, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'e1c9fbcf17e69000b758c004f30ca38b', 1640274483, 0),
(23, 'MjAyMTF0dDA2MTVAbWFpbC50ZGMuZWR1LnZu', '4da522ff6e1e4e22f7697e666f21a12b', 1640301431, 0),
(24, 'MjAyMTF0dDA2MTVAbWFpbC50ZGMuZWR1LnZu', 'f0339e6327f04605a7c2510fb59655b2', 1640301463, 0),
(25, 'MjAyMTF0dDA2MTVAbWFpbC50ZGMuZWR1LnZu', '80701192733a257464cecd1fdaede7c9', 1640302343, 0),
(26, 'MjAyMTF0dDA2MTVAbWFpbC50ZGMuZWR1LnZu', 'f9b433acebb68e235d896f3dd7ec42f0', 1640302742, 0),
(27, 'YnVpaG9uZ25nb2MudGRjMjAyMEBnbWFpbC5jb20=', 'fc6dc90c4d81455ca458e563951fdd61', 1640304151, 0),
(28, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '5293544ce41dbf5f410fbab58c24d77a', 1640304220, 0),
(29, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', 'b1aab0bd8c2fdbd0d9dd310177ed0422', 1640306519, 0),
(30, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '270f9fc5630db4a99a74e19f6dbd4d13', 1640307840, 0),
(31, 'bmd1eWVudGhhaXNvbi50ZGMyMDIwQGdtYWlsLmNvbQ==', '6a5179070bf6efb9af9584f1b61f2f03', 1640307944, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_image`) VALUES
(1, 'Armani', '1.jpeg'),
(2, 'Chanel', '2.jpeg'),
(3, 'Dior', '3.jpeg'),
(4, 'Hugo Boss', '4.jpeg'),
(5, 'Lancome', '5.jpeg'),
(6, 'Marc Jacobs', '6.jpeg'),
(7, 'Mugler', '7.jpeg'),
(8, 'Paco Rabanne', '8.jpeg'),
(9, 'Tiffany&Co', '9.jpeg'),
(10, 'Tom Ford', '10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `postzip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_at` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Confirm','Delivery','Delivered','Cancelled') COLLATE utf8_unicode_ci DEFAULT 'Pending',
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `firstname`, `lastname`, `address`, `city`, `state`, `postzip`, `phone`, `email`, `ordered_at`, `status`, `user_id`, `payment_id`) VALUES
(51, 'Son', 'Nguyen', '94/7', 'Tp.HCM', 'Thu Duc', '120000', '0907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 01:07:42', 'Cancelled', 40, 1),
(52, 'Son', 'Nguyen', '94/7', 'Tp.HCM', 'Thu Duc', '120000', '0907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 01:08:03', 'Delivered', 40, 1),
(53, 'Son', 'Nguyen', '94/7', 'Tp.HCM', 'Thu Duc', '120000', '0907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 01:19:05', 'Delivery', 42, 1),
(54, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:30:40', 'Pending', 37, 1),
(55, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:32:41', 'Pending', 37, 1),
(56, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:33:19', 'Pending', 37, 1),
(57, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:34:07', 'Pending', 37, 1),
(58, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:42:15', 'Pending', 37, 1),
(59, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:47:36', 'Pending', 37, 1),
(60, 'Sơn', 'Thái', '94/7, a', 'HCM', 'asd', '15', '907711585', 'nguyenthaison.tdc2020@gmail.com', '2021-12-24 02:48:58', 'Pending', 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderitem`
--

CREATE TABLE `tbl_orderitem` (
  `orderItem_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `pf_id` int(11) NOT NULL,
  `item_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_orderitem`
--

INSERT INTO `tbl_orderitem` (`orderItem_id`, `quantity`, `order_id`, `pf_id`, `item_price`) VALUES
(153, 1, 51, 472, 120),
(154, 1, 51, 518, 34),
(155, 1, 51, 492, 99),
(156, 1, 51, 481, 84),
(157, 1, 52, 472, 120),
(158, 1, 52, 518, 34),
(159, 1, 52, 492, 99),
(160, 1, 52, 481, 84),
(161, 1, 53, 518, 34),
(162, 1, 53, 481, 84),
(163, 1, 53, 472, 120),
(164, 4, 54, 513, 88),
(165, 1, 54, 492, 99),
(166, 1, 54, 472, 120),
(167, 1, 55, 502, 71),
(168, 1, 55, 492, 99),
(169, 1, 55, 472, 120),
(170, 1, 56, 472, 120),
(171, 1, 56, 492, 99),
(172, 1, 56, 502, 71),
(173, 1, 57, 492, 99),
(174, 1, 57, 472, 120),
(175, 1, 57, 502, 71),
(176, 1, 58, 472, 120),
(177, 1, 58, 492, 99),
(178, 1, 58, 502, 71),
(179, 1, 59, 492, 99),
(180, 1, 59, 472, 120),
(181, 1, 60, 492, 99),
(182, 1, 60, 472, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_type`) VALUES
(1, 'Paypal'),
(2, 'Cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perfume`
--

CREATE TABLE `tbl_perfume` (
  `pf_id` int(11) NOT NULL,
  `pf_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regular_price` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `sales_qty` int(11) DEFAULT 0,
  `capacity` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_price` float DEFAULT 0,
  `type_id` int(11) NOT NULL,
  `range_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_perfume`
--

INSERT INTO `tbl_perfume` (`pf_id`, `pf_name`, `gender`, `regular_price`, `description`, `created_at`, `image`, `brand_id`, `status`, `sales_qty`, `capacity`, `sales_price`, `type_id`, `range_id`) VALUES
(469, 'DIOR Miss Dior Eau de Parfum', 'women', 118, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>The new Miss Dior eau de parfum brings in a wave of optimism and brims with life—echoing Miss Dior\'s very essence. Miss Dior\'s fresh and floral notes are composed like a bouquet of countless flowers with endless sparkling colours. François Demachy, Perfumer-Creator of the House of Dior, wanted to create an iridescent Rose for this fragrance that is lit up by a myriad of fresh and floral notes.The iconic Miss Dior couture bow harnesses an exceptional artisanal savoir-faire that transforms each embroidered ribbon into a unique piece, that of a true high fashion creation.', '2021-12-21 16:13:05', 'DIOR-Miss-Dior-Eau-de-Parfum-100ml.jfif#DIOR-Miss-Dior-Eau-de-Parfum2.png#DIOR-Miss-Dior-Eau-de-Parfum3.png', 3, 1, 0, '100ml', 10, 1, 10),
(470, 'Hugo Boss BOSS The Scent For Her Eau de Parfum', 'unisex', 95, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>BOSS The Scent for Her is designed to elicit a hidden seductive power that envelops the woman who wears it with a captivating allure.Under the creative vision of Jason Wu, Artistic Director for HUGO BOSS Womenswear, BOSS The Scent for Her is the realisation of BOSS Women - powerful and at the same time uniquely feminine. Mirroring the the story of seduction from attraction to seduction to addiction, BOSS The Scent for Her features an irresistibly potent combination of ingredients. Attraction: Honeyed peach and freesia top notes meet in an exquisite, head-turning combination, making him want to discover more.', '2021-12-21 16:13:05', 'Hugo-Boss-BOSS-The-Scent-For-Her-Eau-de-Parfum-100ml.jfif#Hugo-Boss-BOSS-The-Scent-For-Her-Eau-de-Parfum2.png#Hugo-Boss-BOSS-The-Scent-For-Her-Eau-de-Parfum3.png', 4, 1, 0, '100ml', 0, 8, 9),
(471, 'Marc Jacobs Perfect Eau de Parfum for Her', 'women', 55, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>The playful and unexpected women\'s perfume, Perfect Marc Jacobs Eau de Parfum for her, is a comforting floral scent that celebrates optimism, self-acceptance and originality.The perfume was inspired by Marc Jacobs’ mantra: “I am perfect as I am,” which is symbolised by a tattoo of the word “perfect” on his wrist. Like his tattoo, Perfect Marc Jacobs is about embracing and expressing one’s true self.', '2021-12-21 16:13:05', 'Marc-Jacobs-Perfect-Eau-de-Parfum-for-Her-50ml.png#Marc-Jacobs-Perfect-Eau-de-Parfum-for-Her2.png#Marc-Jacobs-Perfect-Eau-de-Parfum-for-Her3.png', 6, 0, 0, '50ml', 0, 7, 4),
(472, 'CHANEL CHANCE EAU TENDRE', 'women', 120, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>An even tenderer interpretation of CHANCE. A delicate presence, an intensely feminine and enveloping trail. A new chance for the taking.\nA composition with a radiant heart intensified by jasmine absolute and rose essence. A dazzling floral-fruity fragrance, a full and tender interpretation with heightened femininity.', '2021-12-21 16:13:05', 'CHANEL-CHANCE-EAU-TENDRE.jfif#CHANEL-CHANCE-EAU-TENDRE2.png#CHANEL-CHANCE-EAU-TENDRE3.png', 2, 1, 10, '100ml', 0, 9, 1),
(473, 'TIFFANY & CO. Tiffany Sheer Eau de Toilette for Her', 'women', 38, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Tiffany Sheer Eau de Toilette is a bright and sparkling interpretation of the signature fragrance. Elegantly wrapped in top notes of black currant, vert de mandarine and ylang ylang, the scent beautifully blends with rose oil and finishes with an iris base.', '2021-12-21 16:13:05', 'TIFFANY-&-CO-Tiffany-Intense-Eau-De-Parfum-for-Her-75ml.jfif#TIFFANY-&-CO.-Tiffany-Sheer-Eau-de-Toilette-for-Her2.png#TIFFANY-&-CO.-Tiffany-Sheer-Eau-de-Toilette-for-Her3.png', 9, 0, 0, '30ml', 10, 5, 6),
(474, 'TOM FORD Grey Vetiver Eau de Parfum', 'unisex', 110, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>With its elegant and refined heart of natural vetiver superbly blended with sun-drenched citrus, rich spices and prized woods, TOM FORD grey vetiver captures the essence of debonair, charismatic and provocative masculinity.“Grey Vetiver captures the essence of debonair, charismatic and provocative masculinity.” – TOM FORD', '2021-12-21 16:13:05', 'TOM-FORD-Grey-Vetiver-Eau-de-Parfum-100ml.jfif#TOM-FORD-Grey-Vetiver-Eau-de-Parfum2.png#TOM-FORD-Grey-Vetiver-Eau-de-Parfum3.png', 10, 1, 0, '100ml', 0, 10, 1),
(475, 'Giorgio Armani My Way Eau de Parfum Refillable', 'men', 100, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>MY WAY is a contemporary floral fragrance composed of the finest natural ingredients: Vanilla is sourced from Madagascar through an inclusive program that benefits local communities, while the Tuberose is harvested in India. In creating the notes, craftsmanship meets innovation, as the Tuberose heart is extracted using molecular distillation, allowing the perfumers to select the creamy, velvety facets tailor-made for MY WAY. The Orange blossom note is extracted in Egypt using an innovative, exclusive and entirely natural enfleurage process, whose cold extraction method infuses the Orange flowers in Orange essence. The artisanal approach finally translates in the manual weighing and blending of the fragrance’s concentrate in Grasse creates pure, highly-refined notes with enhanced radiance and naturality.</p>', '2021-12-21 16:13:05', 'Giorgio-Armani-My-Way-Eau-de-Parfum-50ml-Refillable.jfif#Giorgio-Armani-My-Way-Eau-de-Parfum-Refillable2.png#Giorgio-Armani-My-Way-Eau-de-Parfum-Refillable3.png', 1, 1, 0, '50', 0, 3, 3),
(476, 'Tiffany & Love for Her 50ml Eau de Parfum', 'women', 62, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Created by renowned perfumers Honorine Blanc and Marie Salamagne, Tiffany & Love for Her is a floral, woody scent. The fragrance opens with a burst of bright and sparkling top notes, beginning with blue basil–a botanical ingredient developed exclusively for Tiffany – paired with grapefruit for an aromatic crispness. The sweet floral bouquet of neroli is at the heart of the fragrance, with a woody blend of blue sequoia, vetiver and cedarwood at the base, creating a faceted and feminine scent.', '2021-12-21 16:13:05', 'Tiffany-&-Love-for-Her-50ml-Eau-de-Parfum.jfif#Tiffany-&-Love-for-Her-50ml-Eau-de-Parfum2.png#Tiffany-&-Love-for-Her-50ml-Eau-de-Parfum3.png', 9, 0, 0, '25ml', 0, 1, 3),
(477, 'TOM FORD Velvet Orchid Eau de Parfum Spray ', 'men', 110, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Velvet Orchid is a fragrance that lives in the Black Orchid world of glamorous mystique. Sharing its aura yet standing apart with its own compelling identity. It pushes the dna of the original Black Orchid into new territory, evolving hidden facets of the original\'s olfactive structure with extravagant ingredients to reveal even more brilliance, femininity and attractive force. In Velvet Orchid, the daring and dramatic floral signature of Black Orchid is the inspiration for a warm and enveloping fragrance that is lavished with shimmering freshness, dramatic petals, honey and rum.', '2021-12-21 16:13:05', 'TOM-FORD-Velvet-Orchid-Eau-de-Parfum-Spray-100ml.jfif#TOM-FORD-Velvet-Orchid-Eau-de-Parfum-Spray-2.png#TOM-FORD-Velvet-Orchid-Eau-de-Parfum-Spray-3.png', 10, 1, 0, '100ml', 10, 7, 4),
(478, 'TOM FORD Mandarino Di Amalfi Acqua Eau de Toilette Spray ', 'men', 80, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>A serene perspective of the Amalfi cliffsides, with its citrus fruits and calm idyll, captures the bright tranquillity of the day. At dusk, the air, scented with mint, thyme and wildflowers, mingles with a warm breeze of night-blooming flowers.“Mandarino di Amalfi Acqua invites you to experience a sparkling expression of the Italian coastal paradise from a new point of view.” – TOM FORD', '2021-12-21 16:13:05', 'TOM-FORD-Mandarino-Di-Amalfi-Acqua-Eau-de-Toilette-Spray-50ml.jfif#TOM-FORD-Mandarino-Di-Amalfi-Acqua-Eau-de-Toilette-Spray-2.png#TOM-FORD-Mandarino-Di-Amalfi-Acqua-Eau-de-Toilette-Spray3.png', 10, 1, 0, '50ml', 10, 3, 2),
(479, 'Marc Jacobs Daisy Eau de Toilette', 'women', 48, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Daisy Marc Jacobs is the same classic, pure perfume for women that’s charmingly simple with a signature quality. It transports you to a place that is optimistic, beautiful, and pure. The scent embodies the essence of the daisy girl who wears it: timeless, yet young-at-heart. She is a reminder to be open, loving, and playful while radiating positive energy. The bottle is the embodiment of sophistication and vintage charm. Inspired by its name, the daisy flower is turned into a whimsical bottle shape. The weighted block of clear glass with soft, rounded edges is classic and luxurious, while the scattering of daisies blooming from the rounded gold metal hardware creates an unexpected, retro-cool twist.', '2021-12-21 16:13:05', 'Marc-Jacobs-Daisy-Eau-de-Toilette-50ml.png#Marc-Jacobs-Daisy-Eau-de-Toilette2.png#Marc-Jacobs-Daisy-Eau-de-Toilette3.png', 6, 0, 0, '50ml', 0, 5, 10),
(481, 'DIOR Dolce Vita Eau de Toilette Spray', 'men', 94, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Dolce Vita, the fragrance of happiness recalls the carefree, heart-lifting nostalgia of driving a convertible along the Italian Riviera. A dazzlingly feminine and joyful fruity/floral fragrance with spicy, sensual undertones of cedar, it incarnates the spirit of Dior in all its sumptuousness.The magnolia flower is white or cream-colored and in the delicate shape of a star. It has a strong floral fragrance with vanilla-scented accents. The magnolia beautifully leads the top notes of Dolce Vita.', '2021-12-21 16:13:05', 'DIOR-Dolce-Vita-Eau-de-Toilette-Spray-100ml.jfif#DIOR-Dolce-Vita-Eau-de-Toilette-Spray2.png#DIOR-Dolce-Vita-Eau-de-Toilette-Spray3.png', 3, 1, 5, '100ml', 10, 3, 6),
(482, 'MUGLER Angel Eau de Toilette', 'women', 36, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Introducing Angel Eau de Toilette standing star fragrance. A new fragrance, a new star, a new sensuality. The new lighter, refined juice that is delicate, ultra-delicious and silky, featuring notes found in the original Eau de Toilette, but with more gourmand and floral notes. In addition, this fantastic updated version of the bottle can stand up by itself.', '2021-12-21 16:13:05', 'MUGLER-Angel-Eau-de-Toilette-30ml.jfif#MUGLER-Angel-Eau-de-Toilette2.png#MUGLER-Angel-Eau-de-Toilette3.png', 7, 0, 0, '60ml', 0, 1, 7),
(483, 'Giorgio Armani Acqua Di Gio Homme Mens Eau de Toilette', 'women', 58, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>ACQUA DI GIO - The Aftershave For Him by Giorgio Armani. A light, dinstinguished Eau de Toilette inspired by the fresh sea, warm sun &amp; the richness of the earth.This aquatic, aromatic fragrance opens with a splash of fresh calabrian bergamot, neroli and green tangerine. Light, aquatic nuances mix with jasmine petal, crisp rock rose, rosemary, fruity persimmon and warm Indonesian patchouli to create a masculine scent that is both fresh and sensual. Natural and authentic, it is the perfect fragrance for gifting.</p>', '2021-12-21 16:13:05', 'Giorgio-Armani-Acqua-Di-Gio-Homme-Mens-Eau-de-Toilette-50ml.jfif#Giorgio-Armani-Acqua-Di-Gio-Homme-Mens-Eau-de-Toilette2.png#Giorgio-Armani-Acqua-Di-Gio-Homme-Mens-Eau-de-Toilette3.png', 1, 1, 0, '50', 10, 10, 6),
(484, 'MUGLER Alien Eau de Parfum Refill Bottle', 'unisex', 66, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Alien Eau de Parfum Refill bottle, a woody, floral women’s fragrance by Mugler. Mugler is committed to a responsible luxury by offering unique refillable bottles, which can be refilled again and again. Refill your precious Alien Eau de Parfum with this Alien Refill Bottle, allowing you to keep your beloved talisman Alien Eau de Parfum bottle and enjoy great savings whilst being kind to the environment.', '2021-12-21 16:13:05', 'MUGLER-Alien-Eau-de-Parfum-Refill-Bottle-100ml.jfif#MUGLER-Alien-Eau-de-Parfum-Refill-Bottle2.png#MUGLER-Alien-Eau-de-Parfum-Refill-Bottle3.png', 7, 1, 0, '100ml', 10, 10, 8),
(485, 'Lancôme Idôle L\'Intense Eau de Parfum', 'women', 92, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Here\'s to the ones who dream big; a new generation of conquering women, strong, outspoken & empowered.  Here’s to the leaders of tomorrow, glorious and luminous, igniting the flame of success and lighting the way for others.Here\'s to the new Idôles, who daringly shine the path for others. To those, whose aura radiates with success and greatness, inspiring the Idôle that resides within each one of us.', '2021-12-21 16:13:05', 'Lancome-Idle-LIntense-Eau-de-Parfum-75ml.jfif#Lancôme-Idôle-LIntense-Eau-de-Parfum2.png#Lancôme-Idôle-LIntense-Eau-de-Parfum3.png', 5, 1, 0, '75ml', 0, 1, 3),
(486, 'Perfect Intense Marc Jacobs Eau de Parfum', 'unisex', 84, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Intriguing, moreish, hovering on the brink of gourmand-style delicacy, PERFECT INTENSE MARC JACOBS pulls back, keeping you on your toes at every turn, serving up an irresistible clash of brightness and darkness, the crisp and the smooth, in a vibrant explosion of scent that mirrors the ebbs and flows of your inner essence, and the delightful quirks unique to every individual.PERFECT INTENSE MARC JACOBS is a voluptuous expression of self, a rich gold juice enclosed in an eccentric perfume bottle topped with a cluster of lucky charms: little fragments of Marc Jacobs himself to make your own.', '2021-12-21 16:13:05', 'Perfect-Intense-Marc-Jacobs-Eau-de-Parfum-50ml.png#Perfect-Intense-Marc-Jacobs-Eau-de-Parfum2.png#Perfect-Intense-Marc-Jacobs-Eau-de-Parfum3.png', 6, 1, 0, '75ml', 10, 7, 7),
(487, 'Hugo Boss BOSS Bottled Eau de Toilette', 'men', 45, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>The elegant, woody accords of the classic aftershave for men reflect a complex structure that is as versatile and rich in contrasts as the man who wears it. Hour by hour, the scent unfolds and takes on a different quality that inspires and stays with the BOSS man throughout his day. The result is an aftershave which remains as contemporary and relevant today as it was at launch 20 years ago, a symbol of masculinity that has been effortlessly incorporated into the daily routines of men around the world.', '2021-12-21 16:13:05', 'Hugo-Boss-BOSS-Bottled-Eau-de-Toilette-30ml.jfif#Hugo-Boss-BOSS-Bottled-Eau-de-Toilette2.png#Hugo-Boss-BOSS-Bottled-Eau-de-Toilette3.png', 4, 0, 0, '30ml', 0, 1, 10),
(488, 'TOM FORD Noir Extreme Eau de Parfum ', 'men', 65, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>An amber-drenched, woody oriental fragrance with a tantalizing, delectable heart, Noir Extreme dares to make a more extravagant gesture by pushing noir\'s themes of refinement and seductiveness to their edges. Every aspect of the composition is intensified to capture the totality of a man\'s impeccable outer expression and his alluring inner nature.', '2021-12-21 16:13:05', 'TOM-FORD-Noir-Extreme-Eau-de-Parfum-50ml.jfif#TOM-FORD-Noir-Extreme-Eau-de-Parfum2.png#TOM-FORD-Noir-Extreme-Eau-de-Parfum3.png', 10, 0, 0, '25ml', 0, 1, 7),
(490, 'Lancôme Poême Eau De Parfum', 'unisex', 59, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>A fragrance of seduction that goes beyond words!A composition of contrasts in which the effusive note of the Himalayan Blue Poppy embraces the enchanting scent of the Datura flower. Around this duo, white flowers mingle gaily with yellow flowers...in Poême each word is a flower, each flower a poem to express that which cannot be said.An oriental fragrance of light and shadow, Poême excels in the art of contrast. Frosty or sunny, blues or yellows, excited or composed, the notes of Poême form a poetic olfactory sensation.', '2021-12-21 16:13:05', 'Lancome-Poeme-Eau-De-Parfum-50ml.jfif#Lancome-Poeme-Eau-De-Parfum2.png#Lancôme-Poême-Eau-De-Parfum3.png', 5, 1, 0, '50ml', 10, 2, 4),
(491, 'TIFFANY & CO. Tiffany Intense Eau De Parfum ', 'unisex', 90, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Tiffany & CO. unveils Eau de Parfum Intense, a richer and deeper version of the signature fragrance. This new interpretation echoes facets of the original composition with a profusion of iris, along with notes of amber and warm vanilla like benzoin.', '2021-12-21 16:13:05', 'TIFFANY-&-CO-Tiffany-Sheer-Eau-de-Toilette-for-Her-30ml.jfif#TIFFANY-&-CO.-Tiffany-Intense-Eau-De-Parfum2.png#TIFFANY-&-CO.-Tiffany-Intense-Eau-De-Parfum3.png', 9, 1, 0, '75ml', 0, 8, 10),
(492, 'CHANEL COCO MADEMOISELLE', 'women', 110, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>COCO MADEMOISELLE draws its inspiration from the fascinating personality of Gabrielle Chanel. The fragrance is the olfactory reflection of an independent thinker who breaks the rules to create her own. The portrait of a woman ready to daringly write her own destiny.An oriental fragrance with a strong personality, yet surprisingly fresh.Sparks of fresh and vibrant orange immediately awaken the senses. A clear and sensual heart reveals the transparent accords of Jasmine and Rose. The trail unfurls the pure accents of Patchouli and Vetiver that emphasise the slender structure of the composition.', '2021-12-21 16:13:05', 'CHANEL-COCO-MADEMOISELLE-100ml.jpg#CHANEL-COCO-MADEMOISELLE2.png#CHANEL-COCO-MADEMOISELLE3.png', 2, 1, 9, '100ml', 10, 5, 5),
(493, 'MUGLER Aura Refillable Eau de Parfum', 'men', 39, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Introducing Aura MUGLER Eau de Parfum, the new oriental botanical fragrance that radiates a wild blend of botanical freshness and feline sensuality. Aura MUGLER is a fragrance of vital energy that reveals the Aura in every woman. Aura MUGLER is created around three distinctive and addictive hearts. The instinctive heart contains the tiger liana plant which is the guiding thread and signature note of this fragrance and features fresh, green, sweet, animalistic and smoky notes for instinctive femininity', '2021-12-21 16:13:05', 'MUGLER-Aura-Refillable-Eau-de-Parfum-30ml.jfif#MUGLER-Aura-Refillable-Eau-de-Parfum2.png#MUGLER-Aura-Refillable-Eau-de-Parfum3.png', 7, 0, 0, '30ml', 10, 6, 2),
(494, 'Hugo Boss BOSS Femme for Her Eau de Parfum', 'women', 50, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>FEMME by BOSS. Radiant. Soft. Smooth. Femme by BOSS is a woody musky perfume for women that exudes an aura of captivating femininity. An ultra feminine fragrance that mirrors the image of modern women today.', '2021-12-21 16:13:05', 'Hugo-Boss-BOSS-Femme-for-Her-Eau-de-Parfum-50ml.jfif#Hugo-Boss-BOSS-Femme-for-Her-Eau-de-Parfum2.png#Hugo-Boss-BOSS-Femme-for-Her-Eau-de-Parfum3.png', 4, 1, 0, '50ml', 0, 5, 1),
(495, 'Marc Jacobs Daisy Dream Eau de Toilette', 'unisex', 55, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Daisy Eau So Intense Eau de Parfum for her is a new, deeper twist on the classic Daisy perfume by MARC JACOBS.Created by world-renowned master perfumer Alberto Morillas, the fragrance for women is vibrant, with sparkling bursts of strawberry and pear revealing a sweet honey and elegant rosebud heart. A lingering trail of soft vanilla, balanced by a crisp, green moss, envelopes you in a truly unique, enticing blend.Inspired by the golden glow of a sunset, the fragrance evokes the feeling of biting into a juicy strawberry on a warm spring day.', '2021-12-21 16:13:05', 'Marc-Jacobs-Daisy-Dream-Eau-de-Toilette-50ml.jfif#Marc-Jacobs-Daisy-Dream-Eau-de-Toilette2.png#Marc-Jacobs-Daisy-Dream-Eau-de-Toilette3.png', 6, 1, 0, '50ml', 10, 10, 1),
(496, 'Lancôme La Vie Est Belle Eau De Parfum', 'women', 90, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>La Vie est Belle is Lancôme’s best selling feminine fragrance that captures the luminosity of Magnolia Essence. It is inspired by the idea of natural and simple beauty, joy and pleasure in small things. Incarnated by Julia Roberts, this gourmand yet elegant composition is a universal declaration to the beauty of life. A unique olfactory signature perfume scent created by three of France\'s leading perfumers.Iris is the key ingredient of this floral Eau de Parfum, surrounded by orange blossoms and jasmine in the heart.', '2021-12-21 16:13:05', 'Lanome-La-Vie-Est-Belle-Eau-De-Parfum-100ml.jfif#Lancome-La-Vie-Est-Belle-Eau-De-Parfum2.png#Lancome-La-Vie-Est-Belle-Eau-De-Parfum3.png', 5, 1, 0, '100ml', 0, 6, 4),
(497, 'Paco Rabanne Invictus Legend Eau de Parfum', 'men', 55, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>At the frontier of time, a new land. Vast. And new challenge, immense. Burning desert heat. Motors roar in convoy. Ambush, counter-attack, acceleration. Invictus triumphs effortlessly and speeds towards glory.INVICTUS LEGEND. A blazing duel. Two forces clash. Fresh adrenaline rides a whirlwind of hot woods. A fragrance with power. Thrilling like victory.Intense spicy-woody. Made for victory. A storm of wood and red amber. Metallic freshness blasts through burning desert heat. Indestructible', '2021-12-21 16:13:05', 'Paco-Rabanne-Invictus-Legend-Eau-de-Parfum-50ml.jfif#Paco-Rabanne-Invictus-Legend-Eau-de-Parfum2.png#Paco-Rabanne-Invictus-Legend-Eau-de-Parfum3.png', 8, 0, 0, '50ml', 10, 10, 5),
(498, 'Paco Rabanne Pure XS for Her Eau de Parfum', 'unisex', 49, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Pure XS for her. A wild provocative floral oriental from Paco Rabanne, with the electrifying Emily Ratajkowski. Ylang-ylang for the raw, the untamed, senses inflamed. A popcorn burst. Ex-hilarating, ex-plosive, ex-static. Excess in its purest state.', '2021-12-21 16:13:05', 'Paco-Rabanne-Pure-XS-for-Her-Eau-de-Parfum-30ml.jfif#Paco-Rabanne-Pure-XS-for-Her-Eau-de-Parfum2.png#Paco-Rabanne-Pure-XS-for-Her-Eau-de-Parfum3.png', 8, 1, 0, '30ml', 0, 6, 2),
(499, 'Emporio Armani Diamonds for Men Eau de Toilette', 'men', 65, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>This woody aromatic gouramand, cut and polished like a diamond, operates like a captivation prism. Diamonds for men is the definition of masculinity &amp; desire. Hard to resist.In the initial aromas, the icy opening contrasts with lingering sensual, burning accents. The emblematic notes of men’s fragrance are subverted with original surprising and addictive ingredients. This sparkling duality gives birth to a play of dazzling reflections.</p>', '2021-12-21 16:13:05', 'Emporio-Armani-Diamonds-for-Men-Eau-de-Toilette-75ml.jfif#Emporio-Armani-Diamonds-for-Men-Eau-de-Toilette2.png#Emporio-Armani-Diamonds-for-Men-Eau-de-Toilette3.png', 1, 1, 8, '75', 10, 8, 4),
(500, 'Lancôme La Nuit Trésor Eau de Parfum', 'women', 100, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Discover La Nuit Trésor, a sultry, smouldering perfume for women with notes of fresh raspberry, frankincense, and vanilla, with a bewitching heart of Black Rose essence.This fragrance is Lancôme’s first ‘Gourmand Woody Floriental’ perfume, a scent of passionate love - as showcased in the new advert featuring the beautiful Penelope Cruz.The La Nuit Trésor bottle is shaped like a black diamond, the most mysterious and precious of all diamonds, and adorned with a black rose choker as a symbol of elegance.', '2021-12-21 16:13:05', 'Lancome-La-Nuit-Tresor-Eau-de-Parfum-100ml.jfif#Lancome-La-Nuit-Tresor-Eau-de-Parfum2.png#Lancome-La-Nuit-Tresor-Eau-de-Parfum3.png', 5, 1, 0, '100ml', 0, 1, 9),
(501, 'Paco Rabanne Lady Million Empire Eau de Parfum', 'women', 64, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>How to build an empire Million style? Risk it all. Never stop. Desire your destiny. Right now. Lady MILLION EMPIRE, fragrance for women. Brilliant magnolia flower on cognac-addiction. A floral chypre from Paco Rabanne, deliciously insolent.', '2021-12-21 16:13:05', 'Paco-Rabanne-Lady-Million-Empire-Eau-de-Parfum-80ml.jfif#Paco-Rabanne-Lady-Million-Empire-Eau-de-Parfum2.png#Paco-Rabanne-Lady-Million-Empire-Eau-de-Parfum3.png', 8, 1, 0, '60ml', 0, 1, 9),
(502, 'CHANEL N5 LEau', 'women', 79, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>N°5 L’EAU Eau de Toilette is the N°5 of today. A vibrant abstract floral under the banner of modernity, with freshness at its core. N°5 L’EAU, a praise of simplicity. N°5 L’EAU, the obvious choice. Its minimalist packaging has the iconic silhouette of the fragrance embossed on the cardboard case. Inside, a second box protects the crystal-clear glass bottle. No component spoils this distinct impression. The supreme simplicity of the bottle further accentuated by the contents, gives free rein to the imagination of the woman who chooses this fragrance for her skin.', '2021-12-21 16:13:05', 'chanel-n05-leau-100ml.jfif#CHANEL-n05-leau2.png#CHANEL-n05-leau3.png', 2, 1, 5, '50ml', 10, 9, 3),
(503, 'DIOR J\'adore Eau de Parfum Spray', 'unisex', 108, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>J’adore Eau de Parfum is the great women\'s floral fragrance by Dior. A bouquet finely crafted down to the last detail, like a custom-made flower. It unites essence of ylang-ylang with its floral-fruity notes; essence of Damascus Rose from Turkey and blend with a rare duo of Jasmine Grandiflorum from Grasse, and Indian Sambac Jasmine with fruity and voluptuous sensuality.“J’adore is an extraordinary fragrance, because it succeeds in being effortlessly seductive while boasting an original signature.Carnal, but not overbearing. This is a composition that unites contrasts, transforming iconic floral notes into an appealing, unprecedented and mysterious ensemble. J\'adore invents a flower that does not exist.', '2021-12-21 16:13:05', 'DIOR-Jadore-Eau-de-Parfum-Spray-100ml.jfif#DIOR-Jadore-Eau-de-Parfum-Spray2.png#DIOR-Jadore-Eau-de-Parfum-Spray3.png', 3, 0, 0, '100ml', 0, 2, 9),
(504, 'DIOR Poison Girl Eau de Parfum Spray', 'unisex', 83, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Poison Girl is the fragrance of a modern-day girl, delicious and toxic. A sensual trap that instantly poisons and draws out the pleasure to the point of addiction. A bitter-sweet floral with mouthwatering Orange that is delightfully swathed in Venezuelan Tonka Bean and blossoms in the biting sensuality of Grasse Rose.\"Poison Girl is immediately recognisable, it\'s an uncompromising signature.\" - François Demachy', '2021-12-21 16:13:05', 'DIOR-Poison-Girl-Eau-de-Parfum-Spray-50ml.jfif#DIOR-Poison-Girl-Eau-de-Parfum-Spray2.png#DIOR-Poison-Girl-Eau-de-Parfum-Spray3.png', 3, 1, 1, '50ml', 10, 3, 2),
(505, 'Paco Rabanne 1 Million After Shave Lotion', 'men', 44, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Paco Rabanne 1 Million fragrance provides a striking contrast, combining refined sensuality and asserted virility. The fragrance opens with sparkling fresh fruits, including notes of frosted grapefruit, blood mandarin and peppermint. The heart is spicy and masculine with rose absolute, musk and cinnamon bark. The base notes include sensual blond leather, tonka bean and amber ketal. 1 Million After Shave soothes and tones skin after shaving whilst leaving it scented with 1 Million fragrance.', '2021-12-21 16:13:05', 'Paco-Rabanne-1-Million-After-Shave-Lotion-100ml.jfif#Paco-Rabanne-1-Million-After-Shave-Lotion2.png#Paco-Rabanne-1-Million-After-Shave-Lotion3.png', 8, 1, 0, '100ml', 10, 5, 10),
(506, 'Paco Rabanne Olympéa For Women Eau De Parfum', 'women', 66, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>A modern day goddess. Heaven-scent. Iconic, chic. Unique. Half-myth, half-muse. Smiling on victory as her natural reward. Ready to seduce Zeus. Trouble in paradise... A sensuel salty-vanilla, earthly, irrresistible.A fresh-oriental, powerfully discreet. The divine union of exalted floral freshness and a skin-loving salty-vanilla accord. A revelation in green mandarin and vanilla that blooms with jasmine and ginger flower, wrapped up in cashmere wood and Ambregris. A sublime wake. Divine.\n\n\n', '2021-12-21 16:13:05', 'Paco-Rabanne-Olympea-For-Women-Eau-De-Parfum-50ml.jfif#Paco-Rabanne-Olympea-For-Women-Eau-De-Parfum2.png#Paco-Rabanne-Olympea-For-Women-Eau-De-Parfum3.png', 8, 1, 0, '50ml', 0, 7, 6),
(507, 'DIOR Miss Dior Eau de Toilette Originale Spray', 'men', 99, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>In the words of Christian Dior,\"I created this perfume to wrap each woman in exquisite femininity,as if each of my designs were emerging from the bottle one by one.\" Born with the New Look in 1947, the house’s first perfume incarnates the signature of a great designer in the timeless elegance and refinement of a classic green chypre with galbanum and jasmine.The galbanum plant grows in Iran and Afghanistan.Its gum is harvested by cutting into the roots and is then distilled.The essence obtained blends well with herbaceous and chypre green tones. It brings a touch of impertinence as the top note of Miss Dior Original.', '2021-12-21 16:13:05', 'DIOR-Miss-Dior-Eau-de-Toilette-Originale-Spray-100ml.jfif#DIOR-Miss-Dior-Eau-de-Toilette-Originale-Spray2.png#DIOR-Miss-Dior-Eau-de-Toilette-Originale-Spray3.png', 3, 0, 0, '100ml', 10, 6, 6),
(508, 'MUGLER Angel Refillable Eau de Parfum ', 'men', 45, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Angel, the first fragrance by MUGLER, is a voluptuous oriental gourmand, which has a stunning movie star looks too. A collection of truly beautiful bottles resembling dazzling stars cut from a night blue sky.\nIt has a celestial top of bergamot and helional as pure and transparent as air; a delicious heart of fruit and honey which evoke mouth-watering childhood memories; and a sensual passionate base of vanilla, chocolate, caramel and patchouli.', '2021-12-21 16:13:05', 'MUGLER-Angel-Refillable-Eau-de-Parfum-25ml.jfif#MUGLER-Angel-Refillable-Eau-de-Parfum2.png#MUGLER-Angel-Refillable-Eau-de-Parfum3.png', 7, 1, 0, '25ml', 10, 8, 5),
(509, 'Tiffany & Love for Him Eau de Toilette', 'men', 45, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Crafted by renowned perfumers Sophie Labbé and Nicolas Beaulieu, Tiffany & Love for Him is a citrusy, aromatic fragrance with a wood-infused base. An enticing composition, the scent begins with oils of ginger, mandarin and cardamom. At the heart is a juniper-cypress blend, a co-distillation process created exclusively for Tiffany, which brings a sense of modernity to the fragrance. Sandalwood, vetiver and the common ingredient of the duo, the signature blue sequoia note, complete the base of this masterful composition.', '2021-12-21 16:13:05', 'Tiffany-&-Love-for-Him-50ml-Eau-de-Toilette.jfif#Tiffany-&-Love-for-Him-Eau-de-Toilette2.png#Tiffany-&-Love-for-Him-Eau-de-Toilette3.png', 9, 1, 0, '50ml', 0, 6, 4),
(510, 'Hugo Boss BOSS Bottled Tonic Eau de Toilette', 'men', 52, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>A fresh masculine twist on the classic aftershave BOSS BOTTLED TONIC is the distillation of the fresh moment of clarity the Man of Today needs to regain composure, sharpen, reflect, and go again. The first ever fresh fragrance from the iconic BOSS BOTTLED portfolio, BOSS BOTTLED TONIC for men reveals a new facet of modern masculinity, inviting the Man of Today to take a moment to refocus on his path to success. An inherently masculine fresh fragrance, BOSS BOTTLED TONIC is an elegant composition of sophisticated citruses and rich woody notes to bring a lighter and refreshing dimension to the classic fragrance.', '2021-12-21 16:13:05', 'Hugo-Boss-BOSS-Bottled-Tonic-Eau-de-Toilette-50ml.jfif#Hugo-Boss-BOSS-Bottled-Tonic-Eau-de-Toilette2.png#Hugo-Boss-BOSS-Bottled-Tonic-Eau-de-Toilette3.png', 4, 1, 0, '50ml', 10, 6, 4),
(511, 'CHANEL CHANCE EAU FRAICHE', 'women', 102, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>A floral-sparkling fragrance in a round bottle. A surge of energy that sweeps you into a whirlwind of happiness and fantasy. An olfactory encounter with chance.It comes and goes, it never stays still... and you only have a few seconds to seize your chance. It is unpredictable and appears when you least expect it, but if you decide to seize it, anything is possible.\"A chance came up, I seized it.\" Mademoiselle Chanel knew that her real chance was the one of her own creation, a state of mind, a way of being.A floral-sparkling fragrance that intertwines the zesty freshness of Citron, the softness of Jasmine and the vibrant presence of Teak Wood. A whirlwind of energy and vitality.', '2021-12-21 16:13:05', 'CHANEL-CHANCE-EAU-FRAICHE.jfif#CHANEL-CHANCE-EAU-FRAICHE2.png#CHANEL-CHANCE-EAU-FRAICHE3.png', 2, 1, 0, '100ml', 0, 10, 10),
(512, 'Lancôme Trésor Eau De Parfum', 'women', 56, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>This Eau de Parfum unveils the floral, fruity, powdery and amber notes of Trésor. Its bottle, with its luxurious design, nestles in the hand, like a precious treasure. Its luminous fragrance gives a refined and radiant aura to the woman who wears it. A fragrance of emotion is in the air... Trésor.Trésor opens with a flurry of Rose petals and Apricot blossom, illuminated by a halo of the pure, white notes of Peach Tree Flowers. Lilly of the Valley, Vanilla, Heliotrope and Iris follow, casting their seductive spell.', '2021-12-21 16:13:05', 'Lancome-Tresor-Eau-De-Parfum-30ml.jfif#Lancôme-Tresor-Eau-De-Parfum2.png#Lancôme-Tresor-Eau-De-Parfum3.png', 5, 1, 0, '30ml', 10, 2, 7),
(513, 'Giorgio Armani Acqua di Gioia Eau de Parfum', 'women', 88, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>THE ESSENCE OF JOY. There is a charming sensation of freshness from the very first notes which are carried along in a deliciously heady current of crushed Mint, with a zest of Italian “Limone Primo Fiore Femminello\", harvested from the first spring blossoms in Calabria. At its base, ACQUA DI GIOIA bears the signature of water rooted in the Earth, revealed by luscious LMR Cedarwood Heart sprinkled with sensuous Brown Sugar and Labdanum, which is one of the rare plants to possess animal notes. A beautiful fresh floral fragrance ideal for the warm season.', '2021-12-21 16:13:05', 'Giorgio-Armani-Acqua-di-Gioia-Eau-de-Parfum-100ml.jfif#Giorgio-Armani-Acqua-di-Gioia-Eau-de-Parfum2.png#Giorgio-Armani-Acqua-di-Gioia-Eau-de-Parfum3.png', 1, 1, 4, '100ml', 0, 6, 5),
(514, 'MARC JACOBS Daisy Spring Eau de Toilette', 'unisex', 48, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Capturing the airy essence of nature and the innocence of spring, the daisy spring limited edition perfume for her are a seasonal twist on the classic daisy fragrances.  with inviting bursts of pink rosebuds and rosewood blossom paired with spicy cardamom for texture, daisy Marc Jacobs spring creates a fresh feeling of elegance.  Transport yourself to a world of blooming daisies and lush greenery with the Daisy Marc Jacobs spring limited edition perfume.', '2021-12-21 16:13:05', 'MARC-JACOBS-Daisy-Spring-Eau-de-Toilette-30ml-Limited-Edition.png#MARC-JACOBS-Daisy-Spring-Eau-de-Toilette2.png#MARC-JACOBS-Daisy-Spring-Eau-de-Toilette3.png', 6, 1, 0, '30ml', 0, 7, 7),
(515, 'Hugo Boss BOSS Alive Eau de Toilette for Her', 'women', 65, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>The new BOSS Alive Eau de Toilette invites women to celebrate life’s simple pleasures – the small moments of connection, positivity, and happiness.Light-hearted and vibrant, blending soft and delicate notes, the BOSS Alive Eau de Toilette fragrance for her leaves a trail of joyful energy.Sparkling zesty top notes together with magnolia exude joy, while a floral heart of jasmine sambac reveals radiant femininity. The contrasting base fuses woody notes with clary sage and moss, adding a hint of inner confidence and power.\n\n', '2021-12-21 16:13:05', 'Hugo-Boss-BOSS-Alive-Eau-de-Toilette-for-Her-50ml.jfif#Hugo-Boss-BOSS-Alive-Eau-de-Toilette-for-Her2.png#Hugo-Boss-BOSS-Alive-Eau-de-Toilette-for-Her3.png', 4, 0, 0, '50ml', 10, 7, 10),
(516, 'TOM FORD Eau De Soleil Blanc Eau de Toilette ', 'women', 80, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Eau de Soleil Blanc embodies a refreshing illumination on Private Blend Soleil Blanc. Bright, crisp & drenched with sparkling citrus. The vibrant twist on the floral amber warmth mirrors the crystalline reflection of the white sun, a sensuous gleam of sky on water.“The instant hit of vibrancy invites you into a decidedly new Soleil experience.” – TOM FORD', '2021-12-21 16:13:05', 'TOM-FORD-Eau-De-Soleil-Blanc-Eau-de-Toilette-50ml.jfif#TOM-FORD-Eau-De-Soleil-Blanc-Eau-de-Toilette2.png#TOM-FORD-Eau-De-Soleil-Blanc-Eau-de-Toilette3.png', 10, 1, 0, '50ml', 0, 5, 6),
(517, 'Tiffany & Co. Rose Gold Eau de Parfum for Her ', 'women', 82, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Vibrant and magnetic, Tiffany & Co. Rose Gold perfume for her is the innovative creation of master perfumer, Jerome Epinette of Robertet. The fragrance opens with a fruity blackcurrant paired with pink pepper and lychee fruit for a sparkling, playful top note. At the heart of the fragrance is the blue rose accord, a unique hybrid of Japanese rose that nods to Tiffany’s signature shade and lends a delicate floral scent to the fragrance. For a warm finish, ambrette seed blend with deep musk and iris at the base.', '2021-12-21 16:13:05', 'Tiffany-&-Co-Rose-Gold-Eau-de-Parfum-for-Her-75ml.jfif#Tiffany-&-Co.-Rose-Gold-Eau-de-Parfum-for-Her2.png#Tiffany-&-Co.-Rose-Gold-Eau-de-Parfum-for-Her3.png', 9, 1, 0, '75ml', 10, 3, 2),
(518, 'CHANEL COCO', 'men', 38, '<p>-Top notes: &nbsp;Bergamot &nbsp; &nbsp; &nbsp; &nbsp; -Heart notes: &nbsp;Iris Accord</p><p>&nbsp;</p><p>-Base notes: &nbsp;Vetiver &amp; Tonka Bean</p><p>&nbsp;</p><p>-Launch date: 2021</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>The essence of baroque, according to Mademoiselle.Oriental-floral, a warm, sensual fragrance.', '2021-12-21 16:13:05', 'CHANEL-COCO.jfif#CHANEL-COCO2.png#CHANEL-COCO3.png', 2, 1, 6, '100ml', 10, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_range`
--

CREATE TABLE `tbl_range` (
  `range_id` int(11) NOT NULL,
  `range_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_range`
--

INSERT INTO `tbl_range` (`range_id`, `range_name`) VALUES
(1, 'Alien'),
(2, 'Angel Nova'),
(3, 'Angel'),
(4, 'CHANCE'),
(5, 'COCO MADEMOISELLE'),
(6, 'Crystal Noir'),
(7, 'Daisy '),
(8, 'Gentleman Elite'),
(9, 'princess'),
(10, 'seductive'),
(12, 'asdsadsad'),
(13, 'asdsadsa'),
(14, 'nhom1'),
(16, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tbl_perfume_pf_id` int(11) NOT NULL,
  `review_title` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `sb_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`sb_id`, `email`) VALUES
(7, 'lytai15032019@gmail.com'),
(8, '20211tt0983@mail.tdc.edu.vn'),
(9, 'nguyenthaison.tdc2020@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'Eau de parfum Roller-Pearl for her'),
(2, 'Eau de parfum for her'),
(3, 'Eau de parfum for him'),
(4, 'Eau de Toilette'),
(5, 'Eau deToilette spray'),
(6, 'Eau de Toilette for her'),
(7, 'Eau de Toilette Refill'),
(8, 'Eau de parfum infinissime for her'),
(9, 'Eau de Parfum Roll On'),
(10, 'Eau de Toilette for him'),
(13, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `password`, `email`) VALUES
(37, 'Sơn', 'Thái', '3220132120fc792856ba3ecd93df473e', 'gameso2099@gmail.com'),
(40, 'Son', 'Nguyen', 'bec58015ea555f895c20fc2fa7428050', 'nguyenthaison.tdc2020@gmail.com'),
(42, 'Sơn', 'Nguyễn', 'b9e083f58d8bb8b32d6c07a3df7b456d', 'teststream2000@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_tbl_order_tbl_user1_idx` (`user_id`),
  ADD KEY `fk_order_payment_idx` (`payment_id`);

--
-- Indexes for table `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  ADD PRIMARY KEY (`orderItem_id`),
  ADD KEY `fk_tbl_orderItem_tbl_order1_idx` (`order_id`),
  ADD KEY `fk_tbl_orderItem_tbl_perfume1_idx` (`pf_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_perfume`
--
ALTER TABLE `tbl_perfume`
  ADD PRIMARY KEY (`pf_id`),
  ADD KEY `fk_tbl_perfume_tbl_brand1_idx` (`brand_id`),
  ADD KEY `fk_tbl_perfumes_tbl_type1_idx` (`type_id`),
  ADD KEY `fk_tbl_perfumes_tbl_range1_idx` (`range_id`);

--
-- Indexes for table `tbl_range`
--
ALTER TABLE `tbl_range`
  ADD PRIMARY KEY (`range_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_tbl_review_tbl_perfume1_idx` (`tbl_perfume_pf_id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`sb_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reset_pass`
--
ALTER TABLE `reset_pass`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  MODIFY `orderItem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_perfume`
--
ALTER TABLE `tbl_perfume`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT for table `tbl_range`
--
ALTER TABLE `tbl_range`
  MODIFY `range_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_order_payment` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_user1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_orderitem`
--
ALTER TABLE `tbl_orderitem`
  ADD CONSTRAINT `fk_tbl_orderItem_tbl_order1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_orderItem_tbl_perfume1` FOREIGN KEY (`pf_id`) REFERENCES `tbl_perfume` (`pf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_perfume`
--
ALTER TABLE `tbl_perfume`
  ADD CONSTRAINT `fk_tbl_perfume_tbl_brand1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_perfumes_tbl_range1` FOREIGN KEY (`range_id`) REFERENCES `tbl_range` (`range_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_perfumes_tbl_type1` FOREIGN KEY (`type_id`) REFERENCES `tbl_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD CONSTRAINT `fk_tbl_review_tbl_perfume1` FOREIGN KEY (`tbl_perfume_pf_id`) REFERENCES `tbl_perfume` (`pf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
