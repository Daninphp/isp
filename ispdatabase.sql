-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 10:06 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Administracija', 'admin@email.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clanovigrupe`
--

CREATE TABLE `clanovigrupe` (
  `id` int(11) NOT NULL,
  `id_grupe` int(11) NOT NULL,
  `ime_grupe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oposlovanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clanovigrupe`
--

INSERT INTO `clanovigrupe` (`id`, `id_grupe`, `ime_grupe`, `clan`, `email`, `grad`, `oposlovanja`) VALUES
(22, 2, 'Test grupa', 'nenad', 'wpnenad@gmail.com', 'Loznica', 'Human Resource'),
(24, 1, 'Test grupa jedan', 'nenad', 'wpnenad@gmail.com', 'Loznica', 'Human Resource'),
(25, 4, 'Treca grupa', 'nenad', 'wpnenad@gmail.com', 'Loznica', 'Human Resource'),
(30, 1, 'Test grupa jedan', 'vall', 'test@gmail.com', 'Kragujevac', 'Human Resource'),
(33, 2, 'Test grupa', 'vall', 'test@gmail.com', 'Kragujevac', 'Human Resource'),
(50, 4, '123', 'masa', 'viki.vladisavljevic@gmail.com', 'Loznica', 'Purchasing'),
(57, 7, '123', 'masa', 'viki.vladisavljevic@gmail.com', 'Loznica', 'Purchasing'),
(58, 2, '123', 'masa', 'viki.vladisavljevic@gmail.com', 'Loznica', 'Purchasing'),
(61, 1, '123', 'masa', 'viki.vladisavljevic@gmail.com', 'Loznica', 'Purchasing'),
(62, 8, 'Nenadova grupa', 'nenad', 'wpnenad@gmail.com', 'Beograd', 'Human Resource'),
(63, 6, 'Nenadova grupa', 'nenad', 'wpnenad@gmail.com', 'Beograd', 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `diskusijatip`
--

CREATE TABLE `diskusijatip` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diskusijatip`
--

INSERT INTO `diskusijatip` (`id`, `autor`, `naslov`, `datum`) VALUES
(1, 'Administracija', 'Opste diskusije', '2018-06-06'),
(2, 'Administracija', 'Diskusija za startupove', '2018-06-03'),
(5, 'Administracija', 'Diskusija za IT sektor', '2018-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `diskusije`
--

CREATE TABLE `diskusije` (
  `id` int(11) NOT NULL,
  `id_tipa` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `datum_arhiv` datetime DEFAULT NULL,
  `vidljivost` int(2) NOT NULL,
  `korisnikst_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnikinv_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arhiv` int(1) NOT NULL,
  `slika_st` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika_inv` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diskusije`
--

INSERT INTO `diskusije` (`id`, `id_tipa`, `naslov`, `sadrzaj`, `datum`, `datum_arhiv`, `vidljivost`, `korisnikst_username`, `korisnikinv_username`, `arhiv`, `slika_st`, `slika_inv`) VALUES
(4, 1, 'Diskusija za startupove', 'Neka diskusija', '2018-05-29', '2018-06-06 05:32:34', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(5, 1, 'Diskusija za investitore', 'fasdfaefasefaef', '2018-05-29', '2018-06-13 05:27:30', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(6, 1, 'Diskusija za sve posetioce', 'Neka diskusija', '2018-05-29', '2018-06-07 12:30:00', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(7, 1, 'Diskusija za sve korisnike', 'neka diskusija', '2018-05-29', '2018-06-11 16:31:49', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(9, 1, 'Laza je carski sin', 'KAKO NE', '2018-05-29', '2018-06-06 16:18:32', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(10, 1, 'Danas je sreda', 'adsfadfasfas', '2018-05-29', '2018-06-06 06:12:16', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(16, 1, 'Nova diskusija posle brisanja', 'nnnek teksti\r\n', '2018-06-01', '2018-06-01 10:25:00', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(17, 1, 'Test za arhiviranje', 'aldfka;ldfkga afe\\aseaf', '2018-06-01', '2018-06-11 00:00:00', 5, 'nenad', NULL, 2, 'uploads/startup_nenad.jpg', 'uploads/investitor_metass.gif'),
(18, 1, 'Test diskusije investitor', 'za sve', '2018-06-02', '2018-06-05 06:17:15', 5, NULL, 'Marko', 2, NULL, 'uploads/investitor_3232.jpg'),
(19, 1, 'Sledeca diskusija primer', 'Za sve', '2018-06-02', NULL, 4, NULL, 'Marko', 1, NULL, 'uploads/investitor_3232.jpg'),
(21, 1, 'asdf', 'adsfadsfasdf', '2018-06-12', '2018-06-08 13:27:17', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(22, 1, 'Test za sve', 'asdkfljad\\fas', '2018-06-05', '2018-06-15 09:16:06', 5, NULL, 'Marko', 2, NULL, 'uploads/investitor_3232.jpg'),
(23, 1, 'NOVI TEST', 'asdkfljad\\fas', '2018-06-05', '2018-06-20 08:23:43', 5, NULL, 'Marko', 2, NULL, 'uploads/investitor_3232.jpg'),
(24, 1, 'teetafasdfa', 'aetraerfadf', '2018-06-05', '2018-06-03 09:27:48', 5, NULL, 'Marko', 2, NULL, 'uploads/investitor_3232.jpg'),
(25, 1, '3232', '1111', '2018-06-05', '2018-06-16 11:10:50', 5, NULL, 'Marko', 2, NULL, 'uploads/investitor_3232.jpg'),
(26, 1, 'naslov', 'test', '2018-06-05', NULL, 3, NULL, 'Marko', 1, NULL, 'uploads/investitor_3232.jpg'),
(27, 1, 'masa', 'test', '2018-06-05', NULL, 1, 'masa', NULL, 1, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(28, 1, 'novi test arhiviranje', 'test', '2018-06-05', NULL, 1, 'nenad', NULL, 1, 'uploads/startup_nenad.jpg', 'uploads/investitor_metass.gif'),
(29, 1, 'Ipak je cetvrtak', 'asdf', '2018-06-05', NULL, 1, 'masa', NULL, 1, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(30, 1, '8i', 'oio', '2018-06-05', NULL, 1, NULL, 'Marko', 1, NULL, 'uploads/investitor_3232.jpg'),
(31, 1, 'dfsafda', 'dfasfasdfasdfae', '2018-06-05', NULL, 3, NULL, 'Marko', 1, NULL, 'uploads/investitor_3232.jpg'),
(32, 1, 'Danas je sreda', 'Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-05', NULL, 4, NULL, 'Marko', 1, NULL, 'uploads/investitor_3232.jpg'),
(33, 1, 'Danas je sredaadsfasdfa', 'adsfadsfasdfSome text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-05', NULL, 4, NULL, 'Marko', 1, NULL, 'uploads/investitor_3232.jpg'),
(34, 2, 'Proba diskusije', 'Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-07', NULL, 4, 'nenad', NULL, 1, 'uploads/startup_nenad.jpg', 'uploads/investitor_metass.gif'),
(35, 1, 'Ipak je cetvrtak', 'Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-07', NULL, 4, 'masa', NULL, 1, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(36, 1, 'Testing test', 'PoslenjeSome text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-09', NULL, 4, 'masa', NULL, 1, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(37, 1, 'diskusija', 'fhghjkl'';''', '2018-06-11', '2018-06-16 20:16:16', 5, 'masa', NULL, 2, 'uploads/startup_masa.jpg', 'uploads/investitor_metass.gif'),
(38, 1, 'Test', 'investitor milos', '2018-06-16', '2018-06-03 05:36:42', 5, NULL, 'milos', 2, NULL, 'uploads/investitor_Jelena.png'),
(39, 1, 'Danas je sreda', 'testSome text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-16', NULL, 4, NULL, 'milos', 1, NULL, 'uploads/investitor_milos.png'),
(40, 1, 'Miloseva', 'DiskusijaSome text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.', '2018-06-16', NULL, 4, NULL, 'milos', 1, NULL, 'uploads/investitor_milos.png'),
(42, 1, 'Test diskusije investitor', 'ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', '2018-06-23 19:00:00', 5, NULL, 'Jelena', 2, NULL, NULL),
(43, 1, 'Test diskusije investitor Milos', 'ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', NULL, 3, NULL, 'milos', 1, NULL, 'uploads/investitor_milos.png'),
(44, 1, 'Ipak je cetvrtak', 'ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', NULL, 2, NULL, 'milos', 1, NULL, 'uploads/investitor_milos.png'),
(45, 1, 'test', 'asdfagafgaefasd', '2018-06-20', NULL, 4, NULL, 'Jelena', 1, NULL, 'uploads/investitor_Jelena.png'),
(46, 1, 'ISP je portal posvecen povezivanju ', 'P je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.P je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', NULL, 3, 'nenad', NULL, 1, 'uploads/startup_nenad.jpg', NULL),
(47, 1, 'Testttteee', 'P je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.P je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.P je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', NULL, 4, 'nenad', NULL, 1, 'uploads/startup_nenad.jpg', NULL),
(48, 1, 'Novi test', '$slika$slikaISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', NULL, 4, 'nenad', NULL, 1, 'uploads/startup_nenad.jpg', NULL),
(49, 1, 'Here we go again', 'uploads/investitor_Jelena.pnguploads/investitor_Jelena.pnguploads/investitor_Jelena.png', '2018-06-20', NULL, 4, NULL, 'Jelena', 1, NULL, 'uploads/investitor_Jelena.png'),
(50, 1, 'Test width', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-06-20', NULL, 4, NULL, 'Jelena', 1, NULL, 'uploads/investitor_Jelena.png'),
(51, 1, 'Ko zna koji test po redu', 'ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-20', NULL, 4, 'masa', NULL, 1, 'uploads/startup_masa.jpg', NULL),
(52, 1, 'naslov', '<p>Twenty six times over a seven month period, that&#39;s an entire 78 minutes of company time he may have stolen!</p>\r\n\r\n<p><em>Or, as I like to call that, a typical Friday afternoon.</em></p>\r\n', '2018-06-21', NULL, 4, NULL, 'Jelena', 1, NULL, 'uploads/investitor_Jelena.png'),
(53, 1, 'Ipak je cetvrtak Nikola', '<p>Test</p>\r\n', '2018-06-25', NULL, 4, NULL, 'Nikola', 1, NULL, 'uploads/investitor_Nikola.gif'),
(54, 1, 'Test za odgovore i paginaciju', '<p>SP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.SP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.SP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.</p>\r\n', '2018-06-25', NULL, 4, 'nenad', NULL, 1, 'uploads/startup_nenad.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diskusijeodg`
--

CREATE TABLE `diskusijeodg` (
  `id` int(11) NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  `diskusije_id` int(11) DEFAULT NULL,
  `grupe_id` int(11) DEFAULT NULL,
  `clan_username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnikst_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnikinv_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika_st` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika_inv` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diskusijeodg`
--

INSERT INTO `diskusijeodg` (`id`, `sadrzaj`, `datum`, `diskusije_id`, `grupe_id`, `clan_username`, `korisnikst_username`, `korisnikinv_username`, `slika_st`, `slika_inv`) VALUES
(13, 'hello\r\n', '2018-05-29 00:00:00', 4, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(26, 'test', '2018-05-31 00:00:00', 6, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(31, 'asdfasdf', '2018-06-07 00:00:00', NULL, 1, 'masa', NULL, NULL, 'uploads/startup_masa.jpg', NULL),
(32, 'Hello World, this is my first website.', '2018-06-07 00:00:00', NULL, 1, 'nenad', NULL, NULL, 'uploads/startup_nenad.jpg', NULL),
(33, 'WILKOMMEN', '2018-06-07 00:00:00', NULL, 2, 'vall', NULL, NULL, 'uploads/startup_vall.png', NULL),
(34, 'Sam odgovara na svoju diskusiju', '2018-06-09 00:00:00', 36, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(35, 'szfdghkj', '2018-06-11 00:00:00', 19, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(36, 'test', '2018-06-16 00:00:00', 36, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(37, 'test', '2018-06-16 00:00:00', 40, NULL, NULL, NULL, 'milos', 'uploads/startup_Helena.jpg', 'uploads/investitor_milos.png'),
(38, 'Test 2', '2018-06-16 00:00:00', 40, NULL, NULL, NULL, 'milos', NULL, 'uploads/investitor_milos.png'),
(39, 'test 3', '2018-06-16 00:00:00', 40, NULL, NULL, NULL, 'milos', NULL, 'uploads/investitor_milos.png'),
(40, 'Marija', '2018-06-16 00:00:00', 19, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(41, 'Hello world ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.', '2018-06-19 00:00:00', 28, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(42, 'Treci pokusaj sa slikom!', '2018-06-19 00:00:00', 28, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(43, 'HELLOW WORLD', '2018-06-19 00:00:00', 19, NULL, NULL, NULL, 'Marko', NULL, 'uploads/investitor_3232.jpg'),
(44, 'Test Nenad za paginaciju jedan', '2018-06-20 00:00:00', 19, NULL, NULL, 'nenad', NULL, 'uploads/startup_nenad.jpg', NULL),
(45, 'I''m unable to get my ''next_posts_link()'' and ''previous_posts_link()'' to display. So far I''ve tried the standard first debug by deactivating all plugins and clearing the cache, I''ve also tried removing the optional parameters from the call. And I''ve also tried using wp-pagenavi, which does display but oddly only when I set my Reading options to show 1 post per page and even then it only shows 2 page links. The site I''m having the problem with is pixelsandtea.com and here''s the code on my home template page.', '2018-06-20 00:00:00', 19, NULL, NULL, 'nenad', NULL, 'uploads/startup_nenad.jpg', NULL),
(46, 'Test za paginaciju', '2018-06-20 00:00:00', 40, NULL, NULL, NULL, 'milos', NULL, 'uploads/investitor_milos.png'),
(47, 'test', '2018-06-20 00:00:00', 44, NULL, NULL, NULL, 'milos', NULL, 'uploads/investitor_milos.png'),
(62, 'adf', '2018-06-21 14:35:16', NULL, 1, 'masa', NULL, NULL, 'uploads/startup_masa.jpg', NULL),
(64, 'asdf', '2018-06-21 14:36:27', NULL, 1, 'masa', NULL, NULL, 'uploads/startup_masa.jpg', NULL),
(66, 'test', '2018-06-21 15:48:52', NULL, 1, 'masa', NULL, NULL, 'uploads/startup_masa.jpg', NULL),
(67, 'pesants', '2018-06-25 00:00:00', 19, NULL, NULL, NULL, 'Nikola', NULL, 'uploads/investitor_Nikola.gif'),
(68, 'hello', '2018-06-25 00:00:00', 19, NULL, NULL, NULL, 'Nikola', NULL, 'uploads/investitor_Nikola.gif'),
(69, 'dfae', '2018-06-25 00:00:00', 19, NULL, NULL, NULL, 'Nikola', NULL, 'uploads/investitor_Nikola.gif'),
(70, 'test', '2018-06-25 00:00:00', 53, NULL, NULL, NULL, 'Nikola', NULL, 'uploads/investitor_Nikola.gif'),
(71, 'Hello', '2018-06-25 00:00:00', 52, NULL, NULL, NULL, 'Nikola', NULL, 'uploads/investitor_Nikola.gif'),
(72, 'test', '2018-06-25 00:00:00', 50, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(73, 'Test', '2018-06-25 00:00:00', 26, NULL, NULL, 'masa', NULL, 'uploads/startup_masa.jpg', NULL),
(74, 'Hello', '2018-06-25 00:00:00', 54, NULL, NULL, 'nenad', NULL, 'uploads/startup_nenad.jpg', NULL),
(75, 'Hello', '2018-06-25 00:00:00', 54, NULL, NULL, NULL, 'Jelena', NULL, 'uploads/investitor_Jelena.png');

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`id`, `ime`) VALUES
(1, 'Subotica'),
(2, 'Sombor'),
(3, 'Kikinda'),
(4, 'Zrenjanin'),
(5, 'Novi Sad'),
(6, 'S. Mitrovica'),
(7, 'Vrsac'),
(8, 'Pancevo'),
(9, 'Beograd'),
(10, 'Sabac'),
(11, 'Smederevo'),
(12, 'Pozarevac'),
(13, 'Loznica'),
(14, 'Valjevo'),
(15, 'Kragujevac'),
(16, 'Zajecar'),
(17, 'Uzice'),
(18, 'Cacak'),
(19, 'Jagodina'),
(20, 'Kraljevo'),
(21, 'Krusevac'),
(22, 'Nis'),
(23, 'Novi Pazar'),
(24, 'Pirot'),
(25, 'Leskovac'),
(26, 'Pristina'),
(27, 'Vranje');

-- --------------------------------------------------------

--
-- Table structure for table `grupe`
--

CREATE TABLE `grupe` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `osnivac` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `grad` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemlja` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oblastposlovanja` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datum` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grupe`
--

INSERT INTO `grupe` (`id`, `ime`, `osnivac`, `opis`, `grad`, `zemlja`, `oblastposlovanja`, `datum`, `status`) VALUES
(1, 'Test grupa jedan', 'masa', 'Ovo je grupa 1, namenjena testiranju\n', NULL, NULL, NULL, '2018-06-01', 1),
(2, 'Test grupa', 'masa', 'Test grupa 2', NULL, NULL, NULL, '2018-06-01', 1),
(4, 'Treca grupa', 'nenad', 'Posle brisanja\r\n', NULL, NULL, NULL, '2018-06-07', 1),
(5, 'Test grupa 4', 'masa', 'test\r\n', NULL, NULL, NULL, '2018-06-11', 1),
(6, 'Test grupa 5', 'masa', 'test\r\n', NULL, NULL, NULL, '2018-06-11', 1),
(7, 'Grupa 5', 'masa', 'test', NULL, NULL, NULL, '2018-06-11', 1),
(8, '123', 'masa', 'esr', NULL, NULL, NULL, '2018-06-11', 1),
(9, 'Hellow WorldW', 'masa', 'Test grupe za IT sektor,Test grupe za IT sektor,Test grupe za IT sektor,Test grupe za IT sektor,Test grupe za IT sektor,Test grupe za IT sektor,Test grupe za IT sektor,Test grupe za IT sektor,Test gru', 'Beograd', 'Srbija', 'IT', '2018-06-27', 1),
(10, 'Nenadova grupa', 'nenad', 'hi just create an an array called ''anything'' like this \r\n$page_data[''myvariable'']=''something''; // the myvariable(or whatever you write) will become a variable once passed to the view, then in the seco', 'Pancevo', 'Srbija', 'Sales', '2018-06-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnikinv`
--

CREATE TABLE `korisnikinv` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nazplica` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datosnivanja` int(50) NOT NULL,
  `brregistracije` int(50) NOT NULL,
  `pib` int(20) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `srimezakpre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zemlja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opstina` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ktelefon` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oposlovanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brzaposlenih` int(20) NOT NULL,
  `prihod` int(20) NOT NULL,
  `profit` int(20) NOT NULL,
  `posao` text COLLATE utf8_unicode_ci NOT NULL,
  `testiranje` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vrusluga` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `inviznos` int(20) NOT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `javni` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnikinv`
--

INSERT INTO `korisnikinv` (`id`, `username`, `password`, `nazplica`, `datosnivanja`, `brregistracije`, `pib`, `ime`, `prezime`, `srimezakpre`, `adresa`, `zemlja`, `grad`, `opstina`, `ktelefon`, `email`, `oposlovanja`, `brzaposlenih`, `prihod`, `profit`, `posao`, `testiranje`, `vrusluga`, `inviznos`, `facebook`, `twitter`, `linkedin`, `website`, `slika`, `javni`) VALUES
(1, 'Marko', '1', 'Milos', 1985, 1, 1, '1', '1', '1', '1', 'Srbija', 'Sombor', '1', '0631234567', 'Marko@gmail.com', 'Legal', 1, 1, 1, 'Novi projekat investiI''ve read a bunch of solutions and tri   I''ve read a bunch of solutions and tri', NULL, '1', 5000, 'https://www.codeproject.com', '', 'https://www.codeproject.com', 'https://www.codeproject.com', 'uploads/investitor_3232.jpg', ''),
(2, 'gfgfgf', '123', '1', 2018, 1, 22, '2', '2', '2', '22', 'Srbija', 'Sombor', '2', '0115477654', 'asdf@adf', 'Research and Development', 2, 2, 2, 'I''ve read a bunch of solutions and tri', NULL, '2', 2, 'https://www.codeproject.com', 'https://www.codeproject.com', 'https://www.codeproject.com', 'https://www.codeproject.com', '', ''),
(3, 'Jelena', '2', '1', 2018, 1, 1, '1', '1', '1', '1', 'Crna Gora', 'Zrenjanin', '1', '06255764', 'admin@email.com', 'Production', 1, 11, 1, 'I''ve read a bunch of solutions and triI''ve read a bunch of solutions and triI''ve read a bunch of solutions and tri', NULL, '4234', 1, 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'uploads/investitor_Jelena.png', 'da'),
(4, 'metass', '1', '1', 2018, 1, 1, '1', '1', '1', '1', 'Crna Gora', 'Zrenjanin', '1', '1', '1@gmail.com', 'Distribution', 1, 1, 1, '1I''ve read a bunch of solutions and triI''ve read a bunch of solutions and triI''ve read a bunch of solutions and triI''ve read a bunch of solutions and tri', NULL, '1', 1, 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'uploads/investitor_metass.gif', 'da'),
(5, 'milos', 'milos', 'Milos', 1950, 146576, 1147888669, 'Milos', 'Prodanovic', 'Marko', 'Cetinjska 24', 'Srbija', 'Beograd', 'Savski Venac', '014413348', 'danindragosavac@gmail.com', 'Managment', 15, 5500, 75000, 'InvestitorI''ve read a bunch of solutions and triI''ve read a bunch of solutions and triI''ve read a bunch of solutions and tri', NULL, 'Telekomunikacije', 500000, 'https://www.facebook.com/home.php', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.reddit.com/', 'uploads/investitor_milos.png', 'da'),
(6, 'Maria Meta', 'masha', '1', 2018, 1, 1, 'Maria', 'Kitrina', '1', '1', 'Slovenija', 'Vrsac', '1', '11', '32@gmail.com', 'Sales', 1, 1, 1, '1I''ve read a bunch of solutions and triI''ve read a bunch of solutions and triI''ve read a bunch of solutions and tri', NULL, '1', 1, 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', '', 'da'),
(7, 'Nikola', '1', '1', 2018, 1, 11, '1', '1', '1', '11', 'Slovenija', 'Vrsac', '1', '1', '1@gmail.com', 'Marketing', 1, 1, 11, '1', NULL, '1', 1, 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'uploads/investitor_Nikola.gif', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `korisnikst`
--

CREATE TABLE `korisnikst` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nazplica` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datosnivanja` date NOT NULL,
  `brregistracije` int(30) NOT NULL,
  `pib` int(8) NOT NULL,
  `ime` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `srimezakpre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zemlja` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `grad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opstina` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ktelefon` int(15) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oposlovanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `posao` text COLLATE utf8_unicode_ci NOT NULL,
  `brzaposlenih` int(10) NOT NULL,
  `prihod` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `statintsvojine` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `podopatentu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tiznos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `javni` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnikst`
--

INSERT INTO `korisnikst` (`id`, `username`, `password`, `nazplica`, `datosnivanja`, `brregistracije`, `pib`, `ime`, `prezime`, `srimezakpre`, `adresa`, `zemlja`, `grad`, `opstina`, `ktelefon`, `email`, `oposlovanja`, `posao`, `brzaposlenih`, `prihod`, `profit`, `statintsvojine`, `podopatentu`, `tiznos`, `website`, `facebook`, `twitter`, `linkedin`, `slika`, `javni`) VALUES
(1, 'masa', 'masa', 'Marija', '2018-06-27', 4, 4, 'Marija', 'Vujinovic', '123', 'Carigradska 24', 'BiH', 'Loznica', 'Stari Grad', 2241311, 'viki.vladisavljevic@gmail.com', 'IT', 'Hello from the other side \r\nI must''ve called a thousand times \r\nTo tell you I''m sorry, for everything that I''ve done Hello from the other side \r\nI must''ve called a thousand times \r\nTo tell you Hello from the other side \r\nI must''ve called a thousand times \r\nTo tell you I''m sorry, for everything that I''ve done Hello from the other side \r\nI must''ve called a thousand times \r\nTo tell you I''m sorry, for everything that I''ve done Hello from the other side \r\nI must''ve called a thousand times \r\n', 44, '200000', '20000', 'Status', 'adfadfaefa', '29900', 'https://www.linkedin.com/', 'https://www.reddit.com/', '', 'https://www.twitter.com/', 'uploads/startup_masa.jpg', 'da'),
(2, 'nenad', 'nenad', 'Nenad', '2018-06-05', 4341, 23, 'Nenad', 'Nenadovic', 'Sredoje', 'Neka adresa 25', 'Srbija', 'Beograd', 'Savski Venac', 11233109, 'wpnenad@gmail.com', 'Human Resource', 'Hello from the other side  I must''ve called a thousand times  To tell you I''m sorry, for ', 24, '15000', '50000', 'Stoji', 'Neki', '40100', 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.facebook.com', 'uploads/startup_nenad.jpg', 'da'),
(3, 'vall', '1', '1', '2018-05-22', 1, 1, '1', '1', '1', '1', 'Srbija', 'Kragujevac', '1', 1, 'danindragosavac@gmail.com', 'Human Resource', 'Hello from the other side  I must''ve called a thousand times  To tell you I''m sorry, for ', 1, '1', '1', '1', '1', '1', 'https://www.codeproject.com', 'https://www.codeproject.com', 'https://www.codeproject.com', 'https://www.codeproject.com', 'uploads/startup_vall.png', ''),
(4, 'jao', '1', '1', '2018-05-23', 1, 1, '1', '1', '1', '1', 'Srbija', 'Kragujevac', '1', 1, 'asdf@adf', 'Accounting and Finance', '1  ', 1, '1', '1', '1', '1', '1', 'https://www.codeproject.com', 'https://www.codeproject.com', 'https://www.codeproject.com', 'https://www.codeproject.com', '', ''),
(5, 'novitest', '1', '1', '2018-06-04', 1, 1, '1', '1', '1', '11', 'Srbija', 'Beograd', '1', 1, 'admadin@email.com', 'Operations', '1 \r\n                                    ', 11, '1', '1', '1', '1', '1', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', '', 'da'),
(6, 'Helena', 'helena', 'Helena', '2018-06-25', 1234, 5234, 'Helena', 'Markovic', 'Hektor', 'Carigradska 24', 'Srbija', 'Beograd', 'Stari Grad', 11224555, 'helena@gmail.com', 'IT', ' \r\n          ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.                          ', 23, '544', '123', 'Status', 'adfadfaefa', '22000', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'uploads/startup_Helena.jpg', 'da'),
(7, 'Hulk', 'hulk', '1', '2018-06-25', 1, 1, 'Hulk', 'Hoganivic', '1', '1', 'Srbija', 'Nis', '1', 1, 'hulk@gmail.com', 'Purchasing', '11', 1, '1', '1', '11', '1', '1', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', 'https://www.reddit.com/', '', 'da'),
(8, 'tasha', '11', '1', '2018-06-25', 1, 1, '1', '1', '1', '1', 'Srbija', 'Nis', '1', 1, '1@gmail.com', 'Legal', '4313', 1, '1', '1', '1', '1', '1', 'https://www.reddit.com/', 'https://www.reddit.com/', '', 'https://www.reddit.com/', '', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `id` int(11) NOT NULL,
  `inv_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`id`, `inv_username`, `naslov`, `sadrzaj`, `datum`, `slika`) VALUES
(1, 'Marko', 'Novi oglas za testiranje', 'sdfasdkfljadsfasdfadsf', '2018-06-02', 'uploads/investitor_3232.jpg'),
(2, 'milos', 'Danas je sreda', 'test', '2018-06-16', 'uploads/investitor_milos.png'),
(3, 'Jelena', 'etsts', '<p>test</p>', '2018-06-21', 'uploads/investitor_Jelena.png'),
(4, 'Jelena', 'test ', '<p><strong>Novi test oglasa</strong></p>\r\n', '2018-06-21', 'uploads/investitor_Jelena.png');

-- --------------------------------------------------------

--
-- Table structure for table `oposlovanja`
--

CREATE TABLE `oposlovanja` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oposlovanja`
--

INSERT INTO `oposlovanja` (`id`, `ime`) VALUES
(1, 'Human Resource'),
(2, 'Marketing'),
(3, 'Sales'),
(4, 'Accounting and Finance'),
(5, 'Distribution'),
(6, 'Research and Development'),
(7, 'Managment'),
(8, 'Production'),
(9, 'Operations'),
(10, 'IT'),
(11, 'Legal'),
(12, 'Purchasing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(1, 'adsf', 'asdf', 'asdf@adf.com', 'asdf', '$2y$04$KeXpJw7Z2i6KIZoIJvDlQuV879oQEmS/bagzYEFg4kEgHkDmSGZh.'),
(2, 'eeee', 'asdfeeee', 'nenad@gmail.com', 'asdf', '$2y$04$K/g0.1myQFEsuXkic5qI1uiwIJl8/1xl2uqKeZD4cQEcylzi1u3o6');

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `id_vesti` int(11) NOT NULL,
  `autor_startup` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor_investitor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`id_vesti`, `autor_startup`, `autor_investitor`, `naslov`, `sadrzaj`, `datum`, `slika`) VALUES
(3, 'masa', NULL, 'Masa test 2', 'dasfdfa\r\n', '2018-05-31', ''),
(5, NULL, 'Marko', 'Test investitor', 'Vestr\r\n', '2018-06-02', ''),
(6, 'masa', NULL, 'test', 'hbl;l\\lk''lkkgklj', '2018-06-11', ''),
(7, 'masa', NULL, 'test', 'test', '2018-06-11', ''),
(8, NULL, 'milos', 'Milos test vesti', 'Neki sadrzaj', '2018-06-16', ''),
(9, 'masa', NULL, 'Test sa slikom', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae corporis exercitationem fugit nostrum quia quod reprehenderit sunt velit. Error in itaque quis quod reiciendis sapiente sequi unde ut vero voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid debitis hic illo minima sapiente sit tempore! Cumque cupiditate enim iste modi odit omnis praesentium quas quia repudiandae, suscipit tempore, vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto autem deleniti dolorem dolorum eligendi fugit harum iste minima natus nostrum officia suscipit tempore, veniam vero. Consequuntur deserunt dolore voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid animi assumenda commodi corporis cum dolor, earum esse fugit id, laborum nemo nihil omnis quaerat quam, quibusdam quis recusandae temporibus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae earum illum libero natus odio optio placeat, quisquam rem totam! Deleniti eaque, et libero nemo neque nostrum odio voluptatibus. Amet, aspernatur.', '2018-06-18', 'vesti/vesti_1.gif'),
(12, 'masa', NULL, 'Test vest 4', 'cia suscipit tempore, veniam vero. Consequuntur deserunt dolore voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid animi assumenda commodi corporis cum dolor, earum esse fugit id, laborum nemo nihil omnis quaerat quam, quibusdam quis recusandae temporibus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae earum illum libero natus odio optio placeat, quisquam rem totam! Deleniti eaque, et libero nemo neque nostrum odio voluptatibus. Amet, aspernatur.cia suscipit tempore, veniam vero. Consequuntur deserunt dolore voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid animi assumenda commodi corporis cum dolor, earum esse fugit id, laborum nemo nihil omnis quaerat quam, quibusdam quis recusandae temporibus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae earum illum libero natus odio optio placeat, quisquam rem totam! Deleniti eaque, et libero nemo neque nostrum odio voluptatibus. Amet, aspernatur.cia suscipit tempore, veniam vero. Consequuntur deserunt dolore voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid animi assumenda commodi corporis cum dolor, earum esse fugit id, laborum nemo nihil omnis quaerat quam, quibusdam quis recusandae temporibus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae earum illum libero natus odio optio placeat, quisquam rem totam! Deleniti eaque, et libero nemo neque nostrum odio voluptatibus. Amet, aspernatur.', '2018-06-18', 'vesti/vesti_1.gif'),
(16, 'masa', NULL, 'test vest 6', 'ach code letter is preceded with a percent sign: %Y %m %d etc.\r\n\r\nThe benefit of doing dates this way is that you don''t have to worry about escaping any characters that are not date codes, as you would normally have to do with the date() function. Example:\r\n\r\n$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";ach code letter is preceded with a percent sign: %Y %m %d etc.\r\n\r\nThe benefit of doing dates this way is that you don''t have to worry about escaping any characters that are not date codes, as you would normally have to do with the date() function. Example:\r\n\r\n$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";', '2018-06-18', 'vesti/vesti_1529334505.jpg'),
(17, 'masa', NULL, 'naslov', 'Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.', '2018-06-18', 'vesti/vesti_1529334601.jpg'),
(18, 'masa', NULL, 'test vest 10', 'Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.', '2018-06-18', 'vesti/vesti_1529334649.jpg'),
(19, 'masa', NULL, 'Poslednja vest', '<p><a href="http://www.novosti.rs/vesti/naslovna/zanimljivosti/aktuelno.288.html:734331-SOK-NA-KRSTENjU-Popu-dojadio-plac-pa-osamario-dete-VIDEO">Novosti</a>&nbsp;Na snimku se vidi kako upla&scaron;eno dete plače, dok mu pop drži glavu poku&scaron;avajući da ga smiri. U jednom trenutku sve&scaron;tenik gubi strpljenje i udara &scaron;amar mali&scaron;anu pred &scaron;okiranim roditeljima.<br />\r\nNa snimku se vidi kako upla&scaron;eno dete plače, dok mu pop drži glavu poku&scaron;avajući da ga smiri. U jednom trenutku sve&scaron;tenik gubi strpljenje i udara &scaron;amar mali&scaron;anu pred &scaron;okiranim roditeljima.<br />\r\nNa snimku se vidi kako upla&scaron;eno dete plače, dok mu pop drži glavu poku&scaron;avajući da ga smiri. U jednom trenutku sve&scaron;tenik gubi strpljenje i udara &scaron;amar mali&scaron;anu pred &scaron;okiranim roditeljima.Na snimku se vidi kako upla&scaron;eno dete plače, dok mu pop drži glavu poku&scaron;avajući da ga smiri. U jednom trenutku sve&scaron;tenik gubi strpljenje i udara &scaron;amar mali&scaron;anu pred &scaron;okiranim roditeljima.</p>\r\n', '2018-06-21', 'vesti/vesti_1529616485.jpg'),
(21, 'masa', NULL, 'Danas je sreda', '<p>ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.</p>\r\n', '2018-06-25', 'vesti/vesti_1529925980.jpg'),
(22, 'masa', NULL, 'Ipak je cetvrtak', '<p>ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.ISP je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka.</p>\r\n', '2018-06-25', 'vesti/vesti_1529926040.jpg'),
(24, 'nenad', NULL, 'Socijalne mreze', '<p>&nbsp;je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka&nbsp;je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka&nbsp;je portal posvecen povezivanju startup kompanija sa potencijalnim investitorima. Nas cilj je da obezbedimo sto bolju i laksu komunikaciju izmedju zainterisovanih stranaka</p>\r\n', '2018-06-25', ''),
(25, 'Helena', NULL, 'JOŠ JEDAN SRBIN U NBA Dušan Ristić dobio poziv za Letnju ligu', '<p>Srpski ko&scaron;arka&scaron; Du&scaron;an Ristić dobio je poziv Finiks Sansa da učestvuje na Letnjoj ligi koja će se održati u Las Vegasu od 6. do 17. jula kako bi se izborio za ugovor u timu koji sa klupe predvodi na&scaron; trener Igor Koko&scaron;kov.</p>\r\n\r\n<p>Ristić je pro&scaron;lu sezonu proveo na koledžu Arizonu zajedno sa Deandreom Ejtonom koji je izabran sa prvog mesta na ovogodi&scaron;njem draftu od strane Sansa.</p>\r\n\r\n<p>Srpski ko&scaron;arka&scaron; Du&scaron;an Ristić dobio je poziv Finiks Sansa da učestvuje na Letnjoj ligi koja će se održati u Las Vegasu od 6. do 17. jula kako bi se izborio za ugovor u timu koji sa klupe predvodi na&scaron; trener Igor Koko&scaron;kov.</p>\r\n\r\n<p>Ristić je pro&scaron;lu sezonu proveo na koledžu Arizonu zajedno sa Deandreom Ejtonom koji je izabran sa prvog mesta na ovogodi&scaron;njem draftu od strane Sansa.</p>\r\n', '2018-06-25', 'vesti/vesti_1529927245.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vestiodg`
--

CREATE TABLE `vestiodg` (
  `id` int(11) NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `vesti_id` int(11) NOT NULL,
  `korisnikst_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnikinv_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vestiodg`
--

INSERT INTO `vestiodg` (`id`, `sadrzaj`, `datum`, `vesti_id`, `korisnikst_username`, `korisnikinv_username`) VALUES
(1, 'hello', '2018-05-31', 3, 'masa', NULL),
(3, 'Odgovor', '2018-05-31', 3, NULL, '3232'),
(4, 'test', '2018-06-16', 7, 'masa', NULL),
(5, 'test', '2018-06-16', 8, NULL, 'milos'),
(6, 'adsfasdf', '2018-06-18', 5, 'masa', NULL),
(7, 'dafadsf', '2018-06-18', 5, 'masa', NULL),
(8, 'test', '2018-06-18', 9, 'masa', NULL),
(9, 'cia suscipit tempore, veniam vero. Consequuntur deserunt dolore voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid animi assumenda commodi corporis cum dolor, earum esse fugit id, laborum nemo nihil omnis quaerat quam, quibusdam quis recusandae temporibus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae earum illum libero natus odio optio placeat, quisquam rem totam! Deleniti eaque, et libero nemo neque nostrum odio voluptatibus. Amet, aspernatur.', '2018-06-18', 9, 'masa', NULL),
(10, 'test', '2018-06-18', 12, 'masa', NULL),
(11, 'Consequuntur deserunt dolore voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid animi assumenda commodi corporis cum dolor, earum esse fugit id, laborum nemo nihil omnis quaerat quam, quibusdam quis recusandae temporibus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae earum illum libero natus odio optio ', '2018-06-18', 12, 'masa', NULL),
(12, 'Test odgovora  end to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() function.', '2018-06-18', 18, 'masa', NULL),
(13, 'LAZI', '2018-06-25', 25, NULL, 'Jelena');

-- --------------------------------------------------------

--
-- Table structure for table `zemlje`
--

CREATE TABLE `zemlje` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zemlje`
--

INSERT INTO `zemlje` (`id`, `ime`) VALUES
(1, 'Srbija'),
(2, 'BiH'),
(3, 'Crna Gora'),
(4, 'Hrvatska'),
(5, 'Makedonija'),
(6, 'Slovenija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `clanovigrupe`
--
ALTER TABLE `clanovigrupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clan_idx` (`clan`),
  ADD KEY `grupaid_idx` (`id_grupe`),
  ADD KEY `grupaime_idx` (`ime_grupe`),
  ADD KEY `email_idx` (`email`),
  ADD KEY `grad_idx` (`grad`),
  ADD KEY `oposlovanja_idx` (`oposlovanja`);

--
-- Indexes for table `diskusijatip`
--
ALTER TABLE `diskusijatip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `autor_idx` (`autor`);

--
-- Indexes for table `diskusije`
--
ALTER TABLE `diskusije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diskusije_korisnikst1_idx` (`korisnikst_username`),
  ADD KEY `fk_diskusije_korisnikinv1_idx` (`korisnikinv_username`),
  ADD KEY `fk_idtipdiskusije_idx` (`id_tipa`),
  ADD KEY `id` (`id`),
  ADD KEY `slikaST_idx` (`slika_st`),
  ADD KEY `slikaINV_idx` (`slika_inv`);

--
-- Indexes for table `diskusijeodg`
--
ALTER TABLE `diskusijeodg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `odgovor_diskusije` (`diskusije_id`),
  ADD KEY `fk_diskusijeodg_korisnikinv1_idx` (`korisnikinv_username`),
  ADD KEY `startup_username` (`korisnikst_username`),
  ADD KEY `grupe_id_idx` (`grupe_id`),
  ADD KEY `clan_username_idx` (`clan_username`),
  ADD KEY `slikaSt_idx` (`slika_st`),
  ADD KEY `slikaInvOdgovor_idx` (`slika_inv`);

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`id`,`ime`),
  ADD KEY `ime` (`ime`);

--
-- Indexes for table `grupe`
--
ALTER TABLE `grupe`
  ADD PRIMARY KEY (`id`,`ime`),
  ADD KEY `osnivac_idx` (`osnivac`),
  ADD KEY `ime` (`ime`),
  ADD KEY `id` (`id`),
  ADD KEY `gradGrupe_idx` (`grad`),
  ADD KEY `zemljaGrupe_idx` (`zemlja`),
  ADD KEY `oposlovanjaGrupe_idx` (`oblastposlovanja`);

--
-- Indexes for table `korisnikinv`
--
ALTER TABLE `korisnikinv`
  ADD PRIMARY KEY (`id`,`username`,`slika`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `slika` (`slika`),
  ADD KEY `gradINV_idx` (`grad`),
  ADD KEY `zemljaINV_idx` (`zemlja`),
  ADD KEY `oblastiPoslovanjaINV_idx` (`oposlovanja`);

--
-- Indexes for table `korisnikst`
--
ALTER TABLE `korisnikst`
  ADD PRIMARY KEY (`id`,`username`,`oposlovanja`,`grad`,`email`,`slika`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `grad` (`grad`),
  ADD KEY `email` (`email`),
  ADD KEY `oposlovanja` (`oposlovanja`),
  ADD KEY `slika` (`slika`),
  ADD KEY `zemljaST_idx` (`zemlja`);

--
-- Indexes for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oglasi_investitor` (`inv_username`),
  ADD KEY `slikaInvestitora_idx` (`slika`);

--
-- Indexes for table `oposlovanja`
--
ALTER TABLE `oposlovanja`
  ADD PRIMARY KEY (`id`,`ime`),
  ADD KEY `ime` (`ime`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`id_vesti`),
  ADD KEY `autor_startup_idx` (`autor_startup`),
  ADD KEY `autor_investitor_idx` (`autor_investitor`);

--
-- Indexes for table `vestiodg`
--
ALTER TABLE `vestiodg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vestiodg_vesti_idx` (`vesti_id`);

--
-- Indexes for table `zemlje`
--
ALTER TABLE `zemlje`
  ADD PRIMARY KEY (`id`,`ime`),
  ADD KEY `ime` (`ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clanovigrupe`
--
ALTER TABLE `clanovigrupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `diskusijatip`
--
ALTER TABLE `diskusijatip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `diskusije`
--
ALTER TABLE `diskusije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `diskusijeodg`
--
ALTER TABLE `diskusijeodg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `grupe`
--
ALTER TABLE `grupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `korisnikinv`
--
ALTER TABLE `korisnikinv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `korisnikst`
--
ALTER TABLE `korisnikst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oposlovanja`
--
ALTER TABLE `oposlovanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `id_vesti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `vestiodg`
--
ALTER TABLE `vestiodg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `zemlje`
--
ALTER TABLE `zemlje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clanovigrupe`
--
ALTER TABLE `clanovigrupe`
  ADD CONSTRAINT `clan` FOREIGN KEY (`clan`) REFERENCES `korisnikst` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `korisnikst` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `grad` FOREIGN KEY (`grad`) REFERENCES `korisnikst` (`grad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `grupaid` FOREIGN KEY (`id_grupe`) REFERENCES `grupe` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `grupaime` FOREIGN KEY (`ime_grupe`) REFERENCES `grupe` (`ime`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `oposlovanja` FOREIGN KEY (`oposlovanja`) REFERENCES `korisnikst` (`oposlovanja`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `diskusijatip`
--
ALTER TABLE `diskusijatip`
  ADD CONSTRAINT `autor` FOREIGN KEY (`autor`) REFERENCES `admin` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diskusije`
--
ALTER TABLE `diskusije`
  ADD CONSTRAINT `korisnikINVusername` FOREIGN KEY (`korisnikinv_username`) REFERENCES `korisnikinv` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `korisnikSTusername` FOREIGN KEY (`korisnikst_username`) REFERENCES `korisnikst` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `slikaINV` FOREIGN KEY (`slika_inv`) REFERENCES `korisnikinv` (`slika`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `slikaST` FOREIGN KEY (`slika_st`) REFERENCES `korisnikst` (`slika`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tipdiskusije` FOREIGN KEY (`id_tipa`) REFERENCES `diskusijatip` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `diskusijeodg`
--
ALTER TABLE `diskusijeodg`
  ADD CONSTRAINT `clan_username` FOREIGN KEY (`clan_username`) REFERENCES `korisnikst` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_diskusijeodg_korisnikinv1` FOREIGN KEY (`korisnikinv_username`) REFERENCES `korisnikinv` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `grupe_id` FOREIGN KEY (`grupe_id`) REFERENCES `grupe` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `iddiskusije` FOREIGN KEY (`diskusije_id`) REFERENCES `diskusije` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `slikaInvOdgovor` FOREIGN KEY (`slika_inv`) REFERENCES `korisnikinv` (`slika`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `slikaStOdgovor` FOREIGN KEY (`slika_st`) REFERENCES `korisnikst` (`slika`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `startup_username` FOREIGN KEY (`korisnikst_username`) REFERENCES `korisnikst` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `grupe`
--
ALTER TABLE `grupe`
  ADD CONSTRAINT `gradGrupe` FOREIGN KEY (`grad`) REFERENCES `gradovi` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oposlovanjaGrupe` FOREIGN KEY (`oblastposlovanja`) REFERENCES `oposlovanja` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `osnivac` FOREIGN KEY (`osnivac`) REFERENCES `korisnikst` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zemljaGrupe` FOREIGN KEY (`zemlja`) REFERENCES `zemlje` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnikinv`
--
ALTER TABLE `korisnikinv`
  ADD CONSTRAINT `gradINV` FOREIGN KEY (`grad`) REFERENCES `gradovi` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oblastiPoslovanjaINV` FOREIGN KEY (`oposlovanja`) REFERENCES `oposlovanja` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zemljaINV` FOREIGN KEY (`zemlja`) REFERENCES `zemlje` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnikst`
--
ALTER TABLE `korisnikst`
  ADD CONSTRAINT `gradST` FOREIGN KEY (`grad`) REFERENCES `gradovi` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `oblastPosolvanjaSt` FOREIGN KEY (`oposlovanja`) REFERENCES `oposlovanja` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zemljaST` FOREIGN KEY (`zemlja`) REFERENCES `zemlje` (`ime`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD CONSTRAINT `oglasi_investitor` FOREIGN KEY (`inv_username`) REFERENCES `korisnikinv` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `slikaInvestitora` FOREIGN KEY (`slika`) REFERENCES `korisnikinv` (`slika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vesti`
--
ALTER TABLE `vesti`
  ADD CONSTRAINT `autor_investitor` FOREIGN KEY (`autor_investitor`) REFERENCES `korisnikinv` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `autor_startup` FOREIGN KEY (`autor_startup`) REFERENCES `korisnikst` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `vestiodg`
--
ALTER TABLE `vestiodg`
  ADD CONSTRAINT `vestiodg_vesti` FOREIGN KEY (`vesti_id`) REFERENCES `vesti` (`id_vesti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
