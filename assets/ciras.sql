-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 09:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciras`
--

-- --------------------------------------------------------

--
-- Table structure for table `incitype`
--

CREATE TABLE `incitype` (
  `id` int(11) NOT NULL,
  `typee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incitype`
--

INSERT INTO `incitype` (`id`, `typee`) VALUES
(1, 'Hostage Situation'),
(2, 'Murder/Homicide'),
(3, 'Robbery/Hold-up'),
(4, 'Bomb Emergency '),
(5, 'Shooting Incident'),
(6, 'Barricaded suspect '),
(7, 'Carnapping'),
(8, 'Illegal Possession of Firearm, Ammunition and Explosives '),
(9, 'Crowd Control '),
(10, 'Vehicular/Traffic Accident'),
(11, 'Fire Incident'),
(12, 'Medical Emergency'),
(13, 'Arrests and Searches '),
(14, 'Reckless Imprudence Resulting to Damage to Properties and Physical Injuries.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(10) NOT NULL,
  `rank` varchar(60) NOT NULL,
  `rfirstname` varchar(60) NOT NULL,
  `rmidname` varchar(60) NOT NULL,
  `rlastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(255) NOT NULL,
  `acclvl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `rank`, `rfirstname`, `rmidname`, `rlastname`, `email`, `username`, `password`, `status`, `acclvl`) VALUES
(1, 'PCpl', 'Acevergerl', 'Dizon', 'Espino', 'espino', 'espino', 'asdf', 'done', 'Desk Officer'),
(2, 'NUP', 'qwer', 'qwer', 'qwer', 'qwer', 'qwer', 'qwer', 'done', 'Investigator'),
(3, 'PSMSg', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'done', 'Admin'),
(4, '', '', '', '', '', 'fdsa', 'fdsa', 'pending', 'Desk Officer'),
(5, 'PBGEN', 'zxcv', 'zxcv', 'zxcv', 'zxcv', 'zxcv', 'zxcv', 'done', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arrest`
--

CREATE TABLE `tbl_arrest` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nameofschool` varchar(255) NOT NULL,
  `schoolloc` varchar(255) NOT NULL,
  `idmarks` varchar(255) NOT NULL,
  `driverlic` varchar(255) NOT NULL,
  `issueat` varchar(255) NOT NULL,
  `issueon` date NOT NULL,
  `residentcert` varchar(255) NOT NULL,
  `rdissue` date NOT NULL,
  `pissue` varchar(255) NOT NULL,
  `othidcard` varchar(255) NOT NULL,
  `idnr` varchar(255) NOT NULL,
  `nameoffather` varchar(255) NOT NULL,
  `fage` int(255) NOT NULL,
  `fadd` varchar(255) NOT NULL,
  `nameofmother` varchar(255) NOT NULL,
  `mage` int(255) NOT NULL,
  `madd` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `rel` varchar(255) NOT NULL,
  `npadd` varchar(255) NOT NULL,
  `npnum` int(255) NOT NULL,
  `law` varchar(255) NOT NULL,
  `lawnum` int(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `docnum` int(255) NOT NULL,
  `healthprob` varchar(255) NOT NULL,
  `offench` varchar(255) NOT NULL,
  `wherearr` varchar(255) NOT NULL,
  `datearr` date NOT NULL,
  `nameofarroff` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_arrest`
--

INSERT INTO `tbl_arrest` (`id`, `investigno`, `fullname`, `nameofschool`, `schoolloc`, `idmarks`, `driverlic`, `issueat`, `issueon`, `residentcert`, `rdissue`, `pissue`, `othidcard`, `idnr`, `nameoffather`, `fage`, `fadd`, `nameofmother`, `mage`, `madd`, `cname`, `rel`, `npadd`, `npnum`, `law`, `lawnum`, `doc`, `docnum`, `healthprob`, `offench`, `wherearr`, `datearr`, `nameofarroff`, `unit`, `profile_image`) VALUES
(1, 'IS-E-202112041', 'Espino, Acevergel Dizon.', 'Our Lady  of Fatima University', 'Barangay Dela paz, Mc Arthur Highway,  CSFP', 'non', '09084-57857-548', 'Sto Tomas', '2021-12-03', '1232-4255-6563', '2021-12-01', 'Sto tomas', 'None', 'None', 'Father Espino', 40, 'Sto.tomas pampanga', 'Mother Espino', 40, 'Sto. Tomas Pampanga', 'Mother Espino', 'Mother', 'Sto. Tomas Pampanga', 2147483647, 'Trina Huerte', 2147483647, 'Diane Gutierez', 2147483647, 'None', 'Roberry', 'San Vicente, Sto. Tomas, Pampanga', '2021-12-03', 'Sebastian Jabson', '5', '1638578265-wallpaper.jpg'),
(2, 'IS-E-202112044', 'Aquino, Brix Reyes.', 'OLFU', 'Brgy Dela paz', 'None', '324961686', 'Sto. tomas, Pampanga', '2019-07-12', '486194321', '2021-12-11', 'Sto.tomas, Pampanga', 'NONE', 'NONE', 'Noynoy Aquino', 60, 'Sapa, Sto.tomas, Pampanga', 'Cory Aquino', 80, 'San Bartolome, Sto tomas. Pampanga', 'BAM AQUINO', 'Brother', 'Sapa, Sto.tomas, Pampanga', 2147483647, 'Chel Diokno', 2147483647, 'Doc. Willie Ong', 2147483647, 'Sakit sa Puso', 'sapikan', 'sapa, sto.tomas. Pampanga', '2021-12-10', 'BAto dela rosa', '9999', '1639126701-wallpaper.jpg'),
(3, 'IS-E-202112042', 'Juby, Lee eel.', 'DHVTSU', 'Sto,tomas', '1641654', '581861', 'Sto.tomas', '2021-12-11', '498461', '2021-12-11', 'Sto.tomas', 'License', '6458165', 'Father', 32, 'Sto Tomas', 'Mother', 45, 'Sto.Tomas', 'Hanest Lee', 'Sister', 'Sto tomas pampanga', 2147483647, 'Tony cho', 997024547, 'biju eel', 965198154, 'None', 'Carnapping', 'Sto Tomas', '2021-12-11', 'Bato dela rosa', '12', '1639129727-3-33352_dual-monitor-wallpaper-aesthetic.png'),
(4, 'IS-E-202112045', 'Lee, Hannest eel.', 'DHVTSU', 'Sto.tomas, Pampanga', '12354958', '54948568', 'Sto. Tomas, Pampanga', '2021-12-10', '78687651', '2021-12-10', 'Sto. Tomas, Pampanga', 'National ID', '45681789', 'Lee, hanest', 57, 'Sto.tomas, Pampanga', 'Lee, Marites', 60, 'Sto.tomas, Pampanga', 'Lee, Ace', 'Brother', '#12, San Bartolome, Sto. Tomas, Pampanga', 978512457, 'Espinosa, Jonel', 978784784, 'Jabson, Sebastian', 957518541, 'None', 'Hostage', 'Barangay San Bartolome, Sto.Tomas, Pampanga', '2021-12-10', 'Jonel nuezca', '12', '1639134724-3-33352_dual-monitor-wallpaper-aesthetic.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter`
--

CREATE TABLE `tbl_blotter` (
  `id` int(11) NOT NULL,
  `entryno` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `btime` varchar(255) NOT NULL,
  `bincidentevent` varchar(1000) NOT NULL,
  `bdisposition` varchar(1000) NOT NULL,
  `bdeleted` varchar(255) NOT NULL,
  `bstatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blotter`
--

INSERT INTO `tbl_blotter` (`id`, `entryno`, `bdate`, `btime`, `bincidentevent`, `bdisposition`, `bdeleted`, `bstatus`) VALUES
(1, 'E-202112041', '2021-12-4', '8:16:4', 'Sample', 'Sample', 'No', 'Completed'),
(2, 'E-202112042', '2021-12-8', '12:20:27', '12:30 PM of February 13, 2021, Mrs. DEJARA JARANILLA MOJARES, 43 years old, married, resident of #074 Brgy Poblacion, Sto. Tomas personally appeared at Sto.tomas police station and reported a robbery incident that transpired between 1:00-4:00AM inside her residence at the aforementioned place and was discovered at about 7:00AM of same date. Initial investigation conducted disclosed that perpetrator/s gained entry by forcibly destroying the doorknob of the back door and once inside suspect/s took and carted away the one (1) piece ACER laptop amounting to Php 18,000.00, bag containing cash amounting to P65, 000.00, Samsung cellular phone worth P5,000.00 and IDs which were placed inside her room were missing. Estimated value of stolen items amounting to Php88, 000.00 and after which, the suspect exited at the sliding glass window of the said room. Victim and other occupants believed that the incident possibly occurred in between 1:00AM to 4:00AM of same date while they were at the midst o', 'PCpl. Alkaiser S Jumlail', 'No', 'Completed'),
(3, 'E-202112043', '2021-12-8', '15:14:23', 'One Justin bayber y gomez, 34 years old, married, of #88, Moras De la Paz, Sto.tomas Pampanga. appeared this station and reported that he was allegedly physically threatened by SEAN MALIK y REYES, on or about 3:00 pm. this date.\r\n\r\n', 'Francis Lorenzo', 'No', 'Completed'),
(4, 'E-202112044', '2021-12-8', '15:27:14', 'Juby Lee, 35 years old, married, of #21, San Bartolome, Sto.Tomas, Pampanga. appeared this station and reported that he allerged that her child was kidnapped by her husband Hanest Lee around 9:30 in the morning when the said person fetched the child ryza mae lee in school without permission from the mother Juby Lee. Her phone calls since 12:30pm, the time she discovered her child was taken, was unanswered by the suspect Hannest Lee', 'JB Wenceslao', 'No', 'Completed'),
(5, 'E-202112045', '2021-12-10', '18:53:45', 'Juby Lee, 35 years old, married, of #21, San Bartolome, Sto.Tomas, Pampanga. appeared this station and reported that he allerged that her child was kidnapped by her husband Hanest Lee around 9:30 in the morning when the said person fetched the child ryza mae lee in school without permission from the mother Juby Lee. Her phone calls since 12:30pm, the time she discovered her child was taken, was unanswered by the suspect Hannest Lee', 'Dejara jaranilla ', 'No', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drug`
--

CREATE TABLE `tbl_drug` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `incitype` varchar(255) NOT NULL,
  `ddateup` date NOT NULL,
  `dprofile_image` varchar(255) NOT NULL,
  `dfullname` varchar(255) NOT NULL,
  `dnickname` varchar(255) NOT NULL,
  `dcivilstatus` varchar(255) NOT NULL,
  `dmobileno` varchar(255) NOT NULL,
  `daddress` varchar(255) NOT NULL,
  `doccupation` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL,
  `dunitassign` varchar(255) NOT NULL,
  `dheight` varchar(255) NOT NULL,
  `dcoloreyes` varchar(255) NOT NULL,
  `dhair` varchar(255) NOT NULL,
  `dcomplexion` varchar(255) NOT NULL,
  `ddatereported` date NOT NULL,
  `dplaceofbirth` varchar(255) NOT NULL,
  `deducattain` varchar(255) NOT NULL,
  `dworkadd` varchar(255) NOT NULL,
  `dafppnprank` varchar(255) NOT NULL,
  `dweight` varchar(255) NOT NULL,
  `ddescripteyes` varchar(255) NOT NULL,
  `ddescripthair` varchar(255) NOT NULL,
  `dstatus` varchar(255) NOT NULL,
  `dcontactname` varchar(255) NOT NULL,
  `drelationship` varchar(255) NOT NULL,
  `drelcontactno` varchar(255) NOT NULL,
  `ddeleted` varchar(255) NOT NULL,
  `dtype` varchar(255) NOT NULL,
  `dnationality` varchar(255) NOT NULL,
  `dgender` varchar(255) NOT NULL,
  `ddateofbirth` date NOT NULL,
  `dgroupaff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evidence`
--

CREATE TABLE `tbl_evidence` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `sococaseno` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `datecollected` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `evicustodian` varchar(255) NOT NULL,
  `socoteamleader` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_evidence`
--

INSERT INTO `tbl_evidence` (`id`, `investigno`, `sococaseno`, `description`, `quantity`, `datecollected`, `place`, `evicustodian`, `socoteamleader`) VALUES
(1, 'IS-E-202112045', 'SC-202112101', 'Necklace', '1', '2021-12-11', 'under table', 'none', 'DEJARA JARANILLA MOJARES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informant`
--

CREATE TABLE `tbl_informant` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `incitype` varchar(255) NOT NULL,
  `ilastname` varchar(60) NOT NULL,
  `ifirstname` varchar(60) NOT NULL,
  `imidname` varchar(60) NOT NULL,
  `inickname` varchar(60) NOT NULL,
  `icivilstatus` varchar(60) NOT NULL,
  `igender` varchar(60) NOT NULL,
  `ibirthday` date NOT NULL,
  `iage` varchar(255) NOT NULL,
  `imobileno` varchar(255) NOT NULL,
  `icitizen` varchar(60) NOT NULL,
  `iplaceofbirth` varchar(60) NOT NULL,
  `iaddress` varchar(255) NOT NULL,
  `ihigheduc` varchar(60) NOT NULL,
  `ioccu` varchar(60) NOT NULL,
  `iworkadd` varchar(255) NOT NULL,
  `iemail` varchar(60) NOT NULL,
  `ideleted` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_informant`
--

INSERT INTO `tbl_informant` (`id`, `investigno`, `incitype`, `ilastname`, `ifirstname`, `imidname`, `inickname`, `icivilstatus`, `igender`, `ibirthday`, `iage`, `imobileno`, `icitizen`, `iplaceofbirth`, `iaddress`, `ihigheduc`, `ioccu`, `iworkadd`, `iemail`, `ideleted`, `barangay`, `municipality`, `province`) VALUES
(1, 'IS-E-202112041', 'Robbery/Hold-up', 'Jabson', 'Sebastian ', 'Cestona ', 'Baste', 'Single', 'Male', '1999-09-07', '22', '09977024547', 'Filipino', 'MANILA', '#2,  1st Avenue', 'Elementary', 'Student', 'None', 'sebastianjabson07@gmail.com', 'No', 'Poblacion', 'Sto.Tomas', 'Pampanga'),
(2, 'IS-E-202112044', 'Robbery/Hold-up', 'Diane', 'Gutierez', 'Alvaro', 'kathkath', 'Single', 'Male', '2021-12-11', '21', '09977024547', 'Filipino', 'Sto tomas', '#44', 'High school', 'kargador', 'sto tomas', 'kathdian@mail.com', 'No', 'San Vicente', 'Sto.Tomas', 'Pampanga'),
(3, 'IS-E-202112043', 'Hostage Situation', 'Macapagal', 'Brian', 'Sigui', 'Brian', 'Single', 'Male', '2021-12-10', '21', '09988198494', 'Filipino', 'Sto.tomas', '#232', 'College', 'Student', 'Sto.tomas', 'Brian@mail.com', 'No', 'San Vicente', 'Sto.Tomas', 'Pampanga'),
(5, 'IS-E-202112042', 'Carnapping', 'DEJARA', 'JARANILLA', 'MOJARES', 'moj', 'Married', 'Male', '2021-12-11', '22', '0997024547', 'Filipino', 'Sto.tomas', '#212', 'College', 'Student', 'Sto tomas', 'Dejara@mail.com', 'No', 'San Matias', 'Sto.Tomas', 'Pampanga'),
(6, 'IS-E-202112045', 'Hostage Situation', 'Lee', 'Juby', 'eel', 'Lee', 'Single', 'Male', '2021-12-10', '22', '099770245457', 'Filipino', 'Sto.Tomas ', '#21', 'College', 'Student', 'Sto.Tomas', 'leejuby01@mail.com', 'No', 'San Bartolome', 'Sto.Tomas', 'Pampanga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_irf`
--

CREATE TABLE `tbl_irf` (
  `id` int(11) NOT NULL,
  `blotterno` varchar(255) NOT NULL,
  `incitype` varchar(255) NOT NULL,
  `datereported` date NOT NULL,
  `timereported` time NOT NULL,
  `dateincident` date NOT NULL,
  `timeincident` time NOT NULL,
  `isitcrime` varchar(255) NOT NULL,
  `narrativerep` longtext NOT NULL,
  `placeofinci` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_irf`
--

INSERT INTO `tbl_irf` (`id`, `blotterno`, `incitype`, `datereported`, `timereported`, `dateincident`, `timeincident`, `isitcrime`, `narrativerep`, `placeofinci`, `status`, `barangay`, `municipality`, `province`) VALUES
(1, 'IS-E-202112041', 'Robbery/Hold-up', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'Yes', '', '#321', 'Completed', 'Poblacion', 'Sto.Tomas', 'Pampanga'),
(2, 'IS-E-202112044', 'Robbery/Hold-up', '2021-12-10', '16:46:00', '2021-12-10', '16:47:00', 'Yes', '', '#321', 'Completed', 'San Vicente', 'Sto.Tomas', 'Pampanga'),
(3, 'IS-E-202112043', 'Hostage Situation', '2021-12-11', '17:00:00', '2021-12-10', '17:00:00', 'Yes', '', '#321', 'Completed', 'San Bartolome', 'Sto.Tomas', 'Pampanga'),
(5, 'IS-E-202112042', 'Carnapping', '2021-12-17', '17:42:00', '2021-12-10', '17:42:00', 'Yes', '12:30 PM of February 13, 2021, Mrs. DEJARA JARANILLA MOJARES, 43 years old, married, resident of #074 Brgy Poblacion, Sto. Tomas personally appeared at Sto.tomas police station and reported a robbery incident that transpired between 1:00-4:00AM inside her residence at the aforementioned place and was discovered at about 7:00AM of same date. Initial investigation conducted disclosed that perpetrator/s gained entry by forcibly destroying the doorknob of the back door and once inside suspect/s took and carted away the one (1) piece ACER laptop amounting to Php 18,000.00, bag containing cash amounting to P65, 000.00, Samsung cellular phone worth P5,000.00 and IDs which were placed inside her room were missing. Estimated value of stolen items amounting to Php88, 000.00 and after which, the suspect exited at the sliding glass window of the said room. Victim and other occupants believed that the incident possibly occurred in between 1:00AM to 4:00AM of same date while they were at the midst o', '#412', 'Completed', 'San Matias', 'Sto.Tomas', 'Pampanga'),
(6, 'IS-E-202112045', 'Hostage Situation', '2021-12-10', '18:56:00', '2021-12-10', '18:56:00', 'Yes', 'Juby Lee, 35 years old, married, of #21, San Bartolome, Sto.Tomas, Pampanga. appeared this station and reported that he allerged that her child was kidnapped by her husband Hanest Lee around 9:30 in the morning when the said person fetched the child ryza mae lee in school without permission from the mother Juby Lee. Her phone calls since 12:30pm, the time she discovered her child was taken, was unanswered by the suspect Hannest Lee', '#21', 'Completed', 'San Bartolome', 'Sto.Tomas', 'Pampanga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_missing`
--

CREATE TABLE `tbl_missing` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `incitype` varchar(255) NOT NULL,
  `mprofile_image` varchar(255) NOT NULL,
  `mdateupload` date NOT NULL,
  `mname` varchar(255) NOT NULL,
  `mnickname` varchar(60) NOT NULL,
  `maddress` varchar(255) NOT NULL,
  `mgender` varchar(60) NOT NULL,
  `mcitizenship` varchar(255) NOT NULL,
  `mage` int(60) NOT NULL,
  `mcomplexion` varchar(255) NOT NULL,
  `mheight` varchar(255) NOT NULL,
  `mweight` varchar(255) NOT NULL,
  `mbuild` varchar(255) NOT NULL,
  `mhair` varchar(255) NOT NULL,
  `mpeculiar` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `madditional` varchar(255) NOT NULL,
  `mdeleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suspect`
--

CREATE TABLE `tbl_suspect` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `incitype` varchar(255) NOT NULL,
  `slastname` varchar(60) NOT NULL,
  `sfirstname` varchar(60) NOT NULL,
  `smidname` varchar(60) NOT NULL,
  `snickname` varchar(60) NOT NULL,
  `scivilstatus` varchar(60) NOT NULL,
  `sgender` varchar(60) NOT NULL,
  `sbirthday` date NOT NULL,
  `sage` varchar(255) NOT NULL,
  `smobileno` varchar(255) NOT NULL,
  `scitizen` varchar(60) NOT NULL,
  `splaceofbirth` varchar(60) NOT NULL,
  `saddress` varchar(255) NOT NULL,
  `shigheduc` varchar(60) NOT NULL,
  `soccu` varchar(60) NOT NULL,
  `sworkadd` varchar(255) NOT NULL,
  `semail` varchar(60) NOT NULL,
  `sdeleted` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suspect`
--

INSERT INTO `tbl_suspect` (`id`, `investigno`, `incitype`, `slastname`, `sfirstname`, `smidname`, `snickname`, `scivilstatus`, `sgender`, `sbirthday`, `sage`, `smobileno`, `scitizen`, `splaceofbirth`, `saddress`, `shigheduc`, `soccu`, `sworkadd`, `semail`, `sdeleted`, `status`) VALUES
(1, 'IS-E-202112041', 'Robbery/Hold-up', 'Espino', 'Acevergel', 'Dizon', 'Ace', 'Single', 'Male', '2021-12-04', '22', '09977024547', 'Filipino', 'Sto.tomas', 'Sto.tomas Pampanga', 'No schooling completed', 'Student', 'None', 'espinoace@gmail.com', 'No', 'Completed'),
(2, 'IS-E-202112041', 'Robbery/Hold-up', 'Jabson', 'Sebastian', 'Cestona', 'Jabson', 'Single', 'Male', '2021-12-10', '22', '09977024547', 'Filipino', 'Sto Tomas', 'San Vicente, Sto Tomas, Pampanga', 'Elementary', 'student', 'Sto.tomas', 'jabson@mail.com', 'No', 'At-large'),
(3, 'IS-E-202112044', 'Robbery/Hold-up', 'Aquino', 'Brix', 'Reyes', 'brix', 'Single', 'Male', '2021-12-11', '21', '09977024547', 'Filipino', 'Sto.tomas', '#22, San Vicente, Sto Tomas, Pampanga', 'High school', 'Student', 'NONE', 'Aquino@maill.com', 'No', 'Completed'),
(4, 'IS-E-202112043', 'Hostage Situation', 'Matos', 'Kiko', 'eggbomb', 'carbonlodi', 'Married', 'Male', '2021-12-11', '21', '099878945421', 'Filipino', 'Sto.tomas ', '#321, San Vicente, Sto Tomas, Pampanga', 'Junior Highschool Graduate', 'Student', 'Sto.tomas', 'matos@mail.com', 'No', 'At-large'),
(6, 'IS-E-202112042', 'Carnapping', 'Juby', 'Lee', 'eel', 'lee', 'Married', 'Male', '2021-12-10', '21', '09977024547', 'Filipino', 'Sto.Tomas', '#212, San Matias, Sto. Tomas, Pampanga', 'High school', 'Student', 'Sto.tomas', 'juby@mail.com', 'No', 'Completed'),
(7, 'IS-E-202112045', 'Hostage Situation', 'Lee', 'Hannest', 'eel', 'Hannest', 'Single', 'Male', '2021-12-10', '20', '09978458124', 'Filipino', 'Sto. Tomas', '#123, San Bartolome, Sto. Tomas, Pampanga', 'Junior Highschool Graduate', 'Driver', 'Sto.tomas, Pampanga', 'hanest@mail.com', 'No', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_victim`
--

CREATE TABLE `tbl_victim` (
  `id` int(11) NOT NULL,
  `investigno` varchar(255) NOT NULL,
  `incitype` varchar(255) NOT NULL,
  `vlastname` varchar(60) NOT NULL,
  `vfirstname` varchar(60) NOT NULL,
  `vmidname` varchar(60) NOT NULL,
  `vnickname` varchar(60) NOT NULL,
  `vcivilstatus` varchar(60) NOT NULL,
  `vgender` varchar(60) NOT NULL,
  `vbirthday` date NOT NULL,
  `vage` varchar(255) NOT NULL,
  `vmobileno` varchar(255) NOT NULL,
  `vcitizen` varchar(60) NOT NULL,
  `vplaceofbirth` varchar(60) NOT NULL,
  `vaddress` varchar(255) NOT NULL,
  `vhigheduc` varchar(60) NOT NULL,
  `voccu` varchar(60) NOT NULL,
  `vworkadd` varchar(255) NOT NULL,
  `vemail` varchar(60) NOT NULL,
  `vdeleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_victim`
--

INSERT INTO `tbl_victim` (`id`, `investigno`, `incitype`, `vlastname`, `vfirstname`, `vmidname`, `vnickname`, `vcivilstatus`, `vgender`, `vbirthday`, `vage`, `vmobileno`, `vcitizen`, `vplaceofbirth`, `vaddress`, `vhigheduc`, `voccu`, `vworkadd`, `vemail`, `vdeleted`) VALUES
(1, 'IS-E-202112041', 'Robbery/Hold-up', 'Bermudo', 'Alejandro', 'Balajadia', 'Dro', 'Single', 'Male', '2021-12-04', '22', '09977024547', 'Filipino', 'Sto.tomas Pampanga', 'Sto.tomas Pampanga', 'No schooling completed', 'Student', 'None', 'alejandro@gmail.com', 'No'),
(2, 'IS-E-202112044', 'Robbery/Hold-up', 'Reyes', 'Rosvic', 'Aquino', 'Rosvic', 'Married', 'Male', '2021-12-10', '21', '09977024547', 'Filipino', 'Sto.Tomas Pampanga', 'San Bartolome, Sto. Tomas, Pampanga', 'High school', 'Student', 'Sto.tomas', 'vic@mail.com', 'No'),
(3, 'IS-E-202112043', 'Hostage Situation', 'labrador', 'rendon', 'matos', '', 'Divorced', 'Male', '2021-12-11', '22', '0997704498812', 'Filipino', 'Sto tomas', '#213, San Vicente, Sto.Tomas, Pampanga', 'Elementary', 'Student', 'Sto.Tomas', 'labrado@mail.com', 'No'),
(4, 'IS-E-202112045', 'Hostage Situation', 'REYES', 'SEAN MALIK', 'Yi', 'Sean', 'Married', 'Male', '2021-12-10', '22', '09559617552', 'Filipino', 'Sto.tomas, Pampanga', '#21, San Bartolome, Pampanga', 'Elementary', 'House Wife', 'San Bartolome, Sto. tomas', 'reyes@mail.com', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incitype`
--
ALTER TABLE `incitype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_arrest`
--
ALTER TABLE `tbl_arrest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_evidence`
--
ALTER TABLE `tbl_evidence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_informant`
--
ALTER TABLE `tbl_informant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_irf`
--
ALTER TABLE `tbl_irf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_missing`
--
ALTER TABLE `tbl_missing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suspect`
--
ALTER TABLE `tbl_suspect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_victim`
--
ALTER TABLE `tbl_victim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incitype`
--
ALTER TABLE `incitype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_arrest`
--
ALTER TABLE `tbl_arrest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_evidence`
--
ALTER TABLE `tbl_evidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_informant`
--
ALTER TABLE `tbl_informant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_irf`
--
ALTER TABLE `tbl_irf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_missing`
--
ALTER TABLE `tbl_missing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_suspect`
--
ALTER TABLE `tbl_suspect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_victim`
--
ALTER TABLE `tbl_victim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
