-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2013 at 05:51 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artesania`
--
CREATE DATABASE IF NOT EXISTS `artesania` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `artesania`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin1', '202cb962ac59075b964b07152d234b70'),
('admin2', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `username` varchar(100) NOT NULL,
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `clicks` int(11) NOT NULL,
  `max_clicks` int(11) NOT NULL,
  `camp_start_date` date NOT NULL,
  `path` varchar(100) NOT NULL,
  `redirect_url` varchar(100) NOT NULL,
  `allowed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ad_id`),
  UNIQUE KEY `username` (`username`,`ad_id`),
  UNIQUE KEY `username_2` (`username`,`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`username`, `ad_id`, `clicks`, `max_clicks`, `camp_start_date`, `path`, `redirect_url`, `allowed`) VALUES
('simral', 1, 23, 150, '1995-02-05', 'images/Mona_Lisa.jpg', 'www.simral.com', 0),
('simral', 2, 1, 50, '2013-11-20', 'images/', 'www.ret.com', 0),
('simral', 3, 2, 50, '2013-11-20', 'images/never_by_nataliadrepina-d6uh7ha.jpg', 'www.ret.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `username` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_acc_no` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`username`, `bank_name`, `bank_acc_no`, `amount`, `password`) VALUES
('Admin', 'Axis', 11111, 23443, '202cb962ac59075b964b07152d234b70'),
('Aniket', 'SBI', 123450, 344443, '202cb962ac59075b964b07152d234b70'),
('Himanshu', 'ICICI', 123123, 600, '202cb962ac59075b964b07152d234b70'),
('hritik', 'ICICI', 898989, 1237896, '202cb962ac59075b964b07152d234b70'),
('Jiya', 'PNB', 456789, 123450, '202cb962ac59075b964b07152d234b70'),
('Kiran', 'HDFC', 123123, 12349, '202cb962ac59075b964b07152d234b70'),
('Neha', 'Axis', 1234567, 59750, '202cb962ac59075b964b07152d234b70'),
('Nitin', 'Axis', 123890, 673326, '202cb962ac59075b964b07152d234b70'),
('Payal', 'Canera', 1234675, 458922, '202cb962ac59075b964b07152d234b70'),
('Rashi', '1234567', 1231414, 357645, '202cb962ac59075b964b07152d234b70'),
('simral', 'ICICI', 1234567, 728557, '202cb962ac59075b964b07152d234b70'),
('Vartika', 'SBI', 123123, 70000, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_type`) VALUES
(1, 'feedback', 'feedback'),
(2, 'photography', 'other'),
(3, 'painting', 'other'),
(4, 'literature', 'other'),
(5, 'recipes', 'other'),
(6, 'film_animation', 'other'),
(7, 'fashion', 'other'),
(8, 'craft', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `comment` text NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`,`product_id`,`comment_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `product_id`, `comment`, `comment_time`) VALUES
(1, 'Neha', 3, 'Adorable art! Kudos!', '2013-11-03 10:36:32'),
(2, 'simral', 12, 'nice blend of colors! ', '2013-11-03 13:24:56'),
(6, 'Neha', 14, 'amazing click :)', '2013-11-03 17:01:42'),
(8, 'Neha', 14, 'Bravo! nice click', '2013-11-03 17:08:12'),
(9, 'Neha', 12, 'baja bajaooo', '2013-11-05 11:17:41'),
(10, 'teena soni', 44, 'what a beautiful click! amazing photography!', '2013-11-16 13:37:53'),
(14, 'simral', 58, 'Wow This Is SOO Beautiful!', '2013-11-18 07:18:59'),
(15, 'Neha', 78, 'Yummmy! <3\r\n', '2013-11-18 07:49:49'),
(16, 'Neha', 78, 'Please mail me the recipe! ', '2013-11-18 07:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `craft`
--

CREATE TABLE IF NOT EXISTS `craft` (
  `product_id` int(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `craft`
--

INSERT INTO `craft` (`product_id`, `subcategory`, `size`, `price`) VALUES
(54, 'cullinary', '6 inches', 13),
(55, 'pottery', '20 cms', 200),
(57, 'ceramics', NULL, 0),
(58, 'pottery', NULL, 0),
(97, 'basketry', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fashion`
--

CREATE TABLE IF NOT EXISTS `fashion` (
  `product_id` int(50) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` int(20) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fashion`
--

INSERT INTO `fashion` (`product_id`, `size`, `price`, `subcategory`) VALUES
(88, '50grams', 1000, 'accessories'),
(89, NULL, 0, 'accessories'),
(90, '10cms', 200, 'accessories'),
(93, NULL, 0, 'shoes'),
(98, NULL, 0, 'shoes'),
(99, NULL, 0, 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE IF NOT EXISTS `favourite` (
  `username` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`username`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`username`, `product_id`) VALUES
('Neha', 2),
('Neha', 54),
('Neha', 76),
('Neha', 78),
('Neha', 88),
('Rashi', 1),
('simral', 0),
('simral', 14),
('simral', 36),
('simral', 37),
('simral', 43),
('simral', 55),
('simral', 58),
('simral', 78),
('simral12', 33),
('teena soni', 44);

-- --------------------------------------------------------

--
-- Table structure for table `film_animation`
--

CREATE TABLE IF NOT EXISTS `film_animation` (
  `product_id` int(50) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `subcategory` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film_animation`
--

INSERT INTO `film_animation` (`product_id`, `price`, `size`, `subcategory`) VALUES
(40, 0, '', 'short'),
(79, 0, NULL, 'short'),
(80, 500, '30 seconds', 'short'),
(81, 1000, '10seconds', 'short');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `artist` varchar(20) DEFAULT NULL,
  `movie` varchar(20) DEFAULT NULL,
  `band_music` varchar(20) DEFAULT NULL,
  `writer` varchar(20) DEFAULT NULL,
  `cuisine` varchar(20) DEFAULT NULL,
  `fashion_brand` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`username`, `artist`, `movie`, `band_music`, `writer`, `cuisine`, `fashion_brand`, `category`) VALUES
('Neha', 'simral', 'Jab we met', 'Jal', 'Agatha Christie', 'Italian', 'Maybeline', 'Photography'),
('simral', 'Neha', '3 Idiots', 'Agnee', 'Chetan Bhagat', 'Afghani', 'Allen Solly', 'Photography');

-- --------------------------------------------------------

--
-- Table structure for table `literature`
--

CREATE TABLE IF NOT EXISTS `literature` (
  `product_id` int(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `literature`
--

INSERT INTO `literature` (`product_id`, `subcategory`, `price`, `size`) VALUES
(30, 'poem', 0, ''),
(74, 'poem', 0, ''),
(82, 'poem', 110, '20lines'),
(83, 'essay', 0, ''),
(84, 'poem', 200, '20lines'),
(85, 'poem', 300, '20lines'),
(86, 'poem', 500, '30lines'),
(99, 'poem', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `painting`
--

CREATE TABLE IF NOT EXISTS `painting` (
  `product_id` int(50) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `painting`
--

INSERT INTO `painting` (`product_id`, `size`, `price`, `subcategory`) VALUES
(3, '50 X 50', 120, 'pottery'),
(28, 'dkj', 23, 'oil'),
(35, '0', 70, 'oil'),
(37, '1MB', 45, 'oil'),
(39, '20', 100, 'oil'),
(43, NULL, 0, 'oil'),
(45, NULL, 0, 'oil'),
(46, NULL, 0, 'oil'),
(48, NULL, 0, 'oil'),
(49, NULL, 0, 'oil'),
(50, NULL, 0, 'oil'),
(52, NULL, 0, 'oil'),
(56, NULL, 0, 'oil'),
(69, '3ftX5ft', 100, 'oil'),
(70, '3ftX4ft', 100, 'watercolor'),
(71, NULL, 0, 'pastel'),
(72, '4ftX4ft', 100, 'acrylic'),
(73, '5ftX7ft', 100, 'watercolor'),
(93, NULL, 0, 'oil'),
(94, NULL, 0, 'oil'),
(95, NULL, 0, 'oil'),
(100, NULL, 0, 'oil'),
(101, NULL, 0, 'oil'),
(102, NULL, 0, 'oil'),
(103, NULL, 0, 'oil'),
(104, NULL, 0, 'oil');

-- --------------------------------------------------------

--
-- Table structure for table `photography`
--

CREATE TABLE IF NOT EXISTS `photography` (
  `product_id` int(50) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `price` int(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photography`
--

INSERT INTO `photography` (`product_id`, `size`, `price`, `subcategory`) VALUES
(26, '324', 12, 'portrait'),
(27, '1MB', 5000, 'people'),
(29, '1MB', 45, 'portrait'),
(31, '', 10, 'portrait'),
(34, '', 50, 'portrait'),
(36, '1MB', 45, 'portrait'),
(41, '', 45, 'portrait'),
(42, NULL, 0, 'portrait'),
(44, NULL, 0, 'nature'),
(51, NULL, 0, 'portrait'),
(53, NULL, 0, 'portrait'),
(60, NULL, 0, 'portrait'),
(61, NULL, 0, 'nature'),
(62, NULL, 0, 'still'),
(63, NULL, 0, 'still'),
(64, '1080px', 0, 'still'),
(66, NULL, 0, 'still'),
(67, '1200px', 0, 'nature'),
(68, '580px', 0, 'nature'),
(87, NULL, 0, 'still'),
(91, '1080px', 0, 'still'),
(92, NULL, 0, 'portrait'),
(94, NULL, 0, 'portrait'),
(96, NULL, 0, 'portrait'),
(97, NULL, 0, 'portrait');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `caption` varchar(250) DEFAULT NULL,
  `description` text NOT NULL,
  `path` varchar(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `upvotes` int(50) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `on_sale` varchar(4) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `username`, `category`, `caption`, `description`, `path`, `views`, `upvotes`, `visibility`, `on_sale`, `upload_time`) VALUES
(54, 'simral', 'craft', 'Pinkie Pushie', 'A little pinky dino i created', 'images/6b5g_8ye47g_by_my_little_plush-d6ukk4k.jpg', 5, 2, 0, 'yes', '2013-11-18 08:03:42'),
(55, 'Neha', 'craft', 'Lollipop casettes', 'Made of ceramic and clay', 'images/cassette_tape_chocolate_by_onebadhat-d6uiz4x.jpg', 3, 2, 0, 'yes', '2013-11-18 08:05:43'),
(57, 'simral', 'craft', 'Cookie neclaces', 'Made by hand real-looking neclaces in the shape of cookies', 'images/cookie_necklace___word_or_initials_by_petitplat-d6ulbhn.jpg', 0, 1, 0, 'no', '2013-11-18 08:09:48'),
(58, 'Neha', 'craft', 'Explore the World', 'Little pieces brought together to make a meaning', 'images/explore_by_sarah_22-d6ukos8.jpg', 5, 2, 0, 'no', '2013-11-18 08:12:32'),
(60, 'Nitin', 'photography', 'Looking into the dark', 'Model name: Sarah Cullen\r\nVenue: City Fort', 'images/be_able_to_wait_by_bloodsuccubus-d6ugz83.jpg', 0, 1, 0, 'no', '2013-11-18 08:18:35'),
(61, 'Vartika', 'photography', 'Taking in the breeze of autumn', 'Place clicked: The central Gardens', 'images/autumn_is_a_second_spring_by_sarah_22-d6pqgeh.jpg', 0, 0, 0, 'no', '2013-11-18 06:22:21'),
(62, 'Rashi', 'photography', 'Bookeychains!', 'Keychains i recently came across ', 'images/b15bd8a1e95908c21e4de317be0c4cc8-d5ho7bs.jpg', 0, 0, 0, 'no', '2013-11-18 06:23:22'),
(63, 'Payal', 'photography', 'Colors together', 'A cute couple of pencils', 'images/bring_colors_to_my_life_by_sarah_22-d6qxjl8.jpg', 2, 0, 0, 'no', '2013-11-18 06:24:27'),
(64, 'simral', 'photography', 'Colors hearted!', 'Some beads and some colors come together to make a great picture', 'images/colorful_seeds_by_sarah_22-d6ubc0c.jpg', 0, 0, 0, 'yes', '2013-11-18 06:30:27'),
(66, 'simral', 'photography', 'Ticking the coffee', 'Time flies, haste spills over matters', 'images/dsc00194copy3_by_noctelux-d6etp4i.jpg', 0, 0, 0, 'no', '2013-11-18 06:32:23'),
(67, 'simral', 'photography', 'Squireelll', 'The cute squirrel I managed to get a shot of', 'images/i_did_not_touch_the_speed_dial_by_michellalonde-d6uksaf.jpg', 0, 0, 0, 'yes', '2013-11-18 06:33:13'),
(68, 'simral', 'photography', 'Blooming Flowers', 'The magic of spring', 'images/five_hundred___fifty_eight_by_anita_trimbur-d6uhd2r.png', 1, 0, 0, 'yes', '2013-11-18 06:36:01'),
(69, 'simral', 'painting', 'Trees painting', 'The seasonal variation put in the paintings', 'images/3-tree-paintings-season.preview.jpg', 0, 0, 0, 'yes', '2013-11-18 06:37:22'),
(70, 'simral', 'painting', 'Tree of Life', 'Colors used self made', 'images/13-tree-of-life-painting.jpg', 0, 0, 0, 'yes', '2013-11-18 06:38:27'),
(71, 'simral', 'painting', 'Rajasthan Culture', 'The colors of rajasthan', 'images/CM08_PAINTING_EXHB_1389248g.jpg', 0, 0, 0, 'no', '2013-11-18 06:39:03'),
(72, 'simral', 'painting', 'Babies and flowers', 'Baby innocence', 'images/painting- boy smells flowers.jpg', 0, 0, 0, 'no', '2013-11-18 06:41:04'),
(73, 'simral', 'painting', 'Elegant Girl', 'The elegancy of a women painted', 'images/painting_in_progress_oct_2010_by_ladysybile-d31jusk.jpg', 0, 0, 0, 'yes', '2013-11-18 06:42:39'),
(74, 'simral', 'literature', 'Rage', 'A self-written poem from the heart', 'docs/3.pdf', 0, 0, 0, 'no', '2013-11-18 06:43:41'),
(75, 'simral', 'recipes', 'Chocolates and yummies', 'The recently made chocolates and tarts', 'images/1_12_japanese_foods_by_Snowfern.jpg', 0, 0, 0, 'no', '2013-11-18 06:46:22'),
(76, 'simral', 'recipes', 'Truflle', 'The truffle i made for my small sister', 'images/1_12_scale_cheesecake_by_fairchildart-d55g3vw.jpg', 5, 2, 0, 'yes', '2013-11-18 08:47:29'),
(77, 'simral', 'recipes', 'Strawberry Cake', 'Made of strawberries and cream', 'images/cake1rec1.jpg', 2, 0, 0, 'yes', '2013-11-18 06:48:39'),
(78, 'simral', 'recipes', 'Cupcakes', 'Delicious strawberry cupcakes', 'images/miniature_food___saint_honores_by_petitplat-d56adwq.jpg', 36, 2, 0, 'yes', '2013-11-18 08:49:27'),
(79, 'simral', 'film_animation', 'Animation ', 'Kangaroo Animated', 'images/58a0adc69d7a234e08d3641221b90bf3-d5zvhv3.gif', 0, 0, 0, 'no', '2013-11-18 06:51:15'),
(80, 'simral', 'film_animation', 'Bear and Hare', 'A special moment designed', 'video/bearhare_test_loop3stream_by_basakward-d6u5wk1.mp4', 0, 0, 0, 'yes', '2013-11-18 06:52:15'),
(81, 'simral', 'film_animation', 'Animation design', 'Try and take a risk', 'video/polish_v01_lunes_polishextra_by_m0uz-d6u6dp9.mp4', 0, 0, 0, 'yes', '2013-11-18 06:54:04'),
(82, 'simral', 'literature', 'Lest you Forget', 'Straight from the soul', 'docs/lestyouforget.pdf', 0, 0, 0, 'yes', '2013-11-18 06:56:11'),
(84, 'simral', 'literature', 'Mist', 'In Midst of the Mist', 'docs/6.pdf', 0, 0, 0, 'yes', '2013-11-18 07:02:02'),
(85, 'simral', 'literature', 'Twisted Up Inside', 'Twisted up not only inside', 'docs/7.pdf', 0, 0, 0, 'yes', '2013-11-18 07:03:03'),
(86, 'simral', 'literature', 'Looking to the sky', 'Looking to the sky', 'docs/txt12.txt', 0, 0, 0, 'yes', '2013-11-18 07:07:12'),
(87, 'simral', 'photography', 'Time By atomic sugar', 'Ticking in wheels', 'images/time_by_atomik_sugarrr-d6l7wvu.jpg', 0, 0, 0, 'no', '2013-11-18 07:08:45'),
(88, 'simral', 'fashion', 'Neckpiece ', 'Neckpiece inspired by peacock design', 'images/gold_and_cobalt_necklace_by_galeriaaurus-d6ukn9h.jpg', 7, 3, 0, 'yes', '2013-11-18 07:09:48'),
(89, 'simral', 'fashion', 'Owl Hairpin', 'Hairpin shaped as a owl', 'images/hairpin_owl_by_nastya_iv83-d6ujrh4.jpg', 0, 1, 0, 'no', '2013-11-18 07:10:38'),
(90, 'simral', 'fashion', 'The gardener by evatheisen', 'The beautiful clip', 'images/the_gardener_by_evathissen-d6pwdq3.jpg', 0, 1, 0, 'yes', '2013-11-18 07:12:08'),
(91, 'simral', 'photography', 'The Lost Key', 'Hanging keys to oppurtunities.Grab them!', 'images/the_lost_key_by_sarah_22-d68iyvg.jpg', 1, 1, 0, 'yes', '2013-11-18 07:13:50'),
(92, 'simral', 'photography', 'anything', 'what a picture', 'images/abstract_colors_eola_citylights.jpg', 0, 0, 0, 'no', '2013-11-20 06:12:52'),
(93, 'simral', 'painting', 'anything', 'what a picture', 'images/pumpkins_by_tomazklemensak-d6uk31m.jpg', 0, 0, 0, 'no', '2013-11-20 06:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `product_id` int(50) NOT NULL,
  `price` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`product_id`, `price`, `size`, `subcategory`) VALUES
(75, 50, 0, 'italian'),
(76, 1000, 1, 'italian'),
(77, 2000, 5, 'chinese'),
(78, 500, 3, 'italian');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE IF NOT EXISTS `recommendations` (
  `username` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`artist`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`username`, `artist`, `time`) VALUES
('Neha', 'simral', '2013-11-07 12:52:04'),
('Rashi', 'simral', '2013-11-07 14:24:45'),
('simral', 'Neha', '2013-11-07 12:52:04'),
('simral12', 'simral', '2013-11-14 07:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_content` text,
  `reply_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `reply_topic` (`topic_id`),
  KEY `reply_by` (`username`),
  KEY `reply_id` (`reply_id`),
  KEY `reply_id_2` (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `reply_content`, `reply_time`, `topic_id`, `username`) VALUES
(1, 'Yes you can,just go to the footer below your profile and click on advertise.Just follow the simple steps to pay an amount and you ad will be posted.', '2013-11-17 19:52:38', 2, 'Nitin'),
(2, 'The Pixture provides all facilities to create your own art and upload it by clicking the save option provided on the left hand side of the menu bar. Hope it helps! :)', '2013-11-17 19:54:22', 1, 'Nitin'),
(3, 'Resolution can be upto 2MB although to the maximum limit.But 1MB is is sufficient to get a good print of the click.', '2013-11-17 19:56:25', 7, 'Nitin'),
(4, 'The save botton is given on the left side of menu bar.Save it and the dialog will ask to upload it.', '2013-11-17 20:06:41', 1, 'Neha'),
(5, 'Your advertisement gets posted on the profile walls of the users.The duration depends on the number of clicks your ad is able to generate.For more details visit the advertise link on your profile.', '2013-11-17 20:08:44', 3, 'Neha'),
(6, 'Artesania holds the copyright of each image postd on it.Only downloads are allowed of the image butthe prints are not provided until you set the product on sale.', '2013-11-17 20:10:29', 6, 'Neha'),
(7, 'It can be of any resolution.Just upload it :)', '2013-11-17 20:11:29', 7, 'Neha'),
(8, 'Wait for a couple of days.This happened with me too but i received the money within 3 days.', '2013-11-17 20:12:39', 8, 'Neha'),
(9, 'Contact the admintration,They might help.', '2013-11-17 20:13:25', 9, 'Neha'),
(10, 'Ya sure.Just fill up the details of yours in the form provided at the Join button on the home page.Proceed and enjoy the world of Artesania.', '2013-11-17 20:15:01', 4, 'Neha'),
(11, 'Paintings are delivered by the Artesania Courier facility.Transport used depends on the location you are living.', '2013-11-17 20:16:51', 5, 'Payal'),
(12, 'Full copyrights are maintained on Artesania.', '2013-11-17 20:17:51', 6, 'Payal'),
(13, 'Wait a little more otherwise you can contact the website shipping authority.', '2013-11-17 20:19:12', 8, 'Payal'),
(14, 'Its free and easy to join Artesania Nitin. :) Just go to the homepage and fill up your details.', '2013-11-17 20:20:27', 4, 'Payal'),
(16, 'You may return the product if it is intact.Please contact the nearest  delivery center of Artesania to get back the payment and return the product.Thank you!', '2013-11-17 20:26:42', 9, 'Admin'),
(17, 'Please provide your transaction ID so the we can track back the delivery status of your product.Sorry for the inconvinience.', '2013-11-17 20:28:09', 8, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `reported_images`
--

CREATE TABLE IF NOT EXISTS `reported_images` (
  `username` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`username`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) DEFAULT NULL,
  `topic_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_cat` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_time`, `topic_cat`, `username`, `upvotes`) VALUES
(1, 'How can I make my own painting in editor and save it to my computer?', '2013-11-03 23:30:00', 1, 'simral', 2),
(2, 'Can I post an advertisement of my own website here?', '2013-10-23 03:30:00', 1, 'Neha', 2),
(3, 'Where and for how long is my advertisement visible to others?', '2013-10-08 19:10:00', 1, 'Payal', 1),
(4, 'I really like the idea of Artesania. Can I become a part of the team? How?', '2013-11-02 01:30:00', 1, 'Nitin', 1),
(5, 'How are the paintings for sale delivered? Transport used? ', '2013-09-11 03:30:00', 3, 'Neha', 1),
(6, 'How to ensure copyright rights of my posted painting is protected?', '2013-11-07 06:06:17', 3, 'Vartika', 1),
(7, 'What is the required resolution of photographs that is preferred?', '2013-11-07 06:07:12', 2, 'Rashi', 1),
(8, 'My craft product that was sold 2 weeks before. But i havent recieved the payment yet. what am i supposed to do?', '2013-11-07 06:11:20', 8, 'simral', 1),
(9, 'I am not satisfied with the product i ordered and recieved a few days back. What is the return policy of the company?', '2013-11-07 06:12:47', 7, 'Vartika', 0),
(10, 'What is the pricing policy for ads?\r\n', '2013-11-20 06:19:10', 2, 'simral', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(30) NOT NULL AUTO_INCREMENT,
  `buyer` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `product_id` int(206) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `quantity` bigint(10) NOT NULL,
  `status` varchar(202) NOT NULL DEFAULT 'Undelivered',
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `buyer`, `time`, `date`, `amount`, `product_id`, `ad_id`, `quantity`, `status`) VALUES
(1, 'Neha', '10:07:00', '2013-11-06', 0, 36, NULL, 0, 'Delivered'),
(2, 'Neha', '10:12:08', '2013-11-06', 90, 36, NULL, 2, 'Undelivered'),
(3, 'Neha', '10:19:00', '2013-11-06', 90, 36, NULL, 2, 'Undelivered'),
(4, 'simral', '11:45:06', '2013-11-06', 45, 36, NULL, 1, 'Delivered'),
(5, 'simral', '11:45:45', '2013-11-06', 45, 36, NULL, 1, 'Undelivered'),
(6, 'Neha', '12:50:43', '2013-11-06', 45, NULL, 36, 0, 'Delivered'),
(7, 'Neha', '12:57:19', '2013-11-06', 50, NULL, 36, 0, 'Undelivered'),
(8, 'simral', '09:22:04', '2013-11-18', 1000, 78, NULL, 2, 'Delivered'),
(9, 'simral', '09:24:27', '2013-11-18', 50, NULL, 1, 0, 'Undelivered'),
(10, 'simral', '07:15:38', '2013-11-20', 500, 78, NULL, 1, 'Undelivered'),
(11, 'simral', '07:18:08', '2013-11-20', 25, NULL, 3, 0, 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE IF NOT EXISTS `upvotes` (
  `username` varchar(100) DEFAULT NULL,
  `path` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotes`
--

INSERT INTO `upvotes` (`username`, `path`) VALUES
('simral', 'images/Jellyfish.jpg'),
('simral', 'images/DSC02309.JPG'),
('simral', 'images/Hydrangeas.jpg'),
('simral', 'images/Chrysanthemum.jpg'),
('Neha', 'images/gold_and_cobalt_necklace_by_galeriaaurus-d6ukn9h.jpg'),
('Neha', 'images/1_12_scale_cheesecake_by_fairchildart-d55g3vw.jpg'),
('simral', 'images/cassette_tape_chocolate_by_onebadhat-d6uiz4x.jpg'),
('simral', 'images/explore_by_sarah_22-d6ukos8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `bank_acc_no` bigint(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `recommend` int(10) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `dp_name` varchar(100) NOT NULL DEFAULT 'images/default.jpg',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`username`, `password`, `name`, `dob`, `gender`, `email`, `contact`, `address`, `bank_acc_no`, `bank_name`, `recommend`, `premium`, `dp_name`) VALUES
('Admin', '202cb962ac59075b964b07152d234b70', 'Neha Sharma', '1995-07-11', 'female', 'admin1@gmail.com', '2343443', '5A, Tonk Phatak, Jaipur', 0, '', 0, 0, 'images/default.jpg'),
('Himanshu', 'd41d8cd98f00b204e9800998ecf8427e', 'Himanshu agarwal', '1997-03-12', 'male', 'himanshu@gmail.com', '876356754', '5A Jai Apartments,Bombay', 909090, 'Axis', 0, 0, 'images/card.jpg'),
('Neha', '202cb962ac59075b964b07152d234b70', 'Neha Sharma', '1998-03-12', 'female', 'sharmanehaa1993@gmail.com', '2706742', '36,China Town,China', 123456789, 'Axis', 0, 0, 'images/divided.jpg'),
('Nitin', '202cb962ac59075b964b07152d234b70', 'Nitin Kothari', '1995-05-12', 'male', 'nitin@gmail.com', '398876', 'M 35,Vijay path,Delhi', 123890, 'Axis', 0, 0, 'images/default_avatar_green.png'),
('Payal', '202cb962ac59075b964b07152d234b70', 'Payal Chauhan', '1993-01-04', 'female', 'payal@gmail.com', '9834732324', 'Vaishali Nagar,Kanpur', 0, '', 0, 0, 'images/default_avatar_blue.png'),
('Rashi', '202cb962ac59075b964b07152d234b70', 'Rashi Sharma', '1998-05-12', 'female', 'rashi@gmil.com', '2706742', 'Mansrovar,Noida', 345678912, 'PNB', 0, 0, 'images/default_avatar_green.png'),
('simral', '202cb962ac59075b964b07152d234b70', 'Simral', '2013-01-01', 'female', 'simral@gmail.com', '2343444', 'chitrakott', 1234567, 'ICICI', 0, 0, 'images/1456915_10151772409336347_1426492174_n.jpg'),
('Vartika', '202cb962ac59075b964b07152d234b70', 'Vartika', '2001-08-12', 'female', 'var@gmail.com', '3059455', '45,Casa Royale, Noida', 0, '', 0, 0, 'images/DSC02266.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
