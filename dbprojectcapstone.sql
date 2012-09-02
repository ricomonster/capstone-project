-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2012 at 08:57 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbprojectcapstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmission`
--

CREATE TABLE IF NOT EXISTS `tbladmission` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `bednumber` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `service` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dateadmitted` datetime NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbladmission`
--

INSERT INTO `tbladmission` (`aid`, `pid`, `rid`, `did`, `bednumber`, `roomno`, `service`, `status`, `dateadmitted`) VALUES
(2, 39, 49, 1, 6, 3, 'Surgical', 'Pending Discharge', '2012-01-20 23:22:52'),
(3, 40, 52, 7, 3, 2, 'Orthopedics', 'Admitted', '2012-01-21 04:25:39'),
(4, 41, 51, 2, 2, 1, 'Medical', 'Admitted', '2012-01-22 03:27:54'),
(5, 42, 53, 5, 8, 5, 'Medical', 'Admitted', '2012-01-23 14:38:20'),
(6, 43, 54, 1, 4, 2, 'Surgical', 'Admitted', '2012-01-27 21:23:29'),
(7, 45, 56, 5, 2, 1, 'Pediatric', 'Admitted', '2012-02-09 01:37:21'),
(10, 46, 57, 4, 10, 7, 'Surgical', 'Admitted', '2012-02-04 18:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblbed`
--

CREATE TABLE IF NOT EXISTS `tblbed` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bednumber` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `roomtype` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Available',
  `dateadmitted` datetime NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblbed`
--

INSERT INTO `tblbed` (`bid`, `bednumber`, `roomno`, `roomtype`, `pid`, `rid`, `aid`, `status`, `dateadmitted`) VALUES
(1, 1, 1, 'Ward', 0, 0, 0, 'Available', '0000-00-00 00:00:00'),
(2, 2, 1, 'Ward', 45, 56, 0, 'Occupied', '2012-02-09 01:37:21'),
(3, 3, 2, 'Ward', 0, 0, 0, 'Available', '2012-01-21 04:25:39'),
(4, 4, 2, 'Ward', 43, 54, 0, 'Occupied', '2012-01-27 21:23:29'),
(5, 5, 3, 'Ward', 41, 51, 4, 'Occupied', '0000-00-00 00:00:00'),
(6, 6, 3, 'Ward', 0, 0, 0, 'Available', '0000-00-00 00:00:00'),
(7, 7, 4, 'Private Room', 0, 0, 0, 'Available', '0000-00-00 00:00:00'),
(8, 8, 5, 'Private Room', 42, 53, 0, 'Occupied', '2012-01-23 14:38:20'),
(9, 9, 6, 'Private Room w/ Air-Con', 0, 0, 0, 'Available', '0000-00-00 00:00:00'),
(10, 10, 7, 'Private Room w/ Air-Con', 46, 57, 10, 'Occupied', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblclinicalface`
--

CREATE TABLE IF NOT EXISTS `tblclinicalface` (
  `cfid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `placeofbirth` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `telno` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `nameofnextkin` varchar(50) NOT NULL,
  `relationshipkin` varchar(20) NOT NULL,
  `addresskin` varchar(100) NOT NULL,
  `dateadmitted` datetime NOT NULL,
  `timeadmitted` varchar(10) NOT NULL,
  `datedischarged` date NOT NULL,
  `timedischarged` varchar(10) NOT NULL,
  `noofhosdays` int(11) NOT NULL,
  `servicedept` varchar(20) NOT NULL,
  `ward` varchar(10) NOT NULL,
  `servicedept2` varchar(20) NOT NULL,
  `did` int(11) NOT NULL,
  `admittingdiagnosis` text NOT NULL,
  `wb` varchar(4) NOT NULL,
  `imp` varchar(4) NOT NULL,
  `unmp` varchar(4) NOT NULL,
  `exp` varchar(4) NOT NULL,
  `ref` varchar(4) NOT NULL,
  `trans` varchar(4) NOT NULL,
  `hama` varchar(4) NOT NULL,
  `abs` varchar(4) NOT NULL,
  `others` varchar(50) NOT NULL,
  `admittingphysician` varchar(50) NOT NULL,
  `admittingclerk` varchar(50) NOT NULL,
  `disposition` varchar(50) NOT NULL,
  `finaldiagnosis` text NOT NULL,
  `complications` text NOT NULL,
  `surgicaldone` text NOT NULL,
  `pathologicalreport` text NOT NULL,
  `residentincharge` varchar(50) NOT NULL,
  `medicalspecialist` varchar(50) NOT NULL,
  `seniorresidenthead` varchar(50) NOT NULL,
  `persondischarged` varchar(40) NOT NULL,
  `dateaddedform` datetime NOT NULL,
  PRIMARY KEY (`cfid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblclinicalface`
--

INSERT INTO `tblclinicalface` (`cfid`, `pid`, `aid`, `rid`, `placeofbirth`, `category`, `occupation`, `telno`, `religion`, `nationality`, `nameofnextkin`, `relationshipkin`, `addresskin`, `dateadmitted`, `timeadmitted`, `datedischarged`, `timedischarged`, `noofhosdays`, `servicedept`, `ward`, `servicedept2`, `did`, `admittingdiagnosis`, `wb`, `imp`, `unmp`, `exp`, `ref`, `trans`, `hama`, `abs`, `others`, `admittingphysician`, `admittingclerk`, `disposition`, `finaldiagnosis`, `complications`, `surgicaldone`, `pathologicalreport`, `residentincharge`, `medicalspecialist`, `seniorresidenthead`, `persondischarged`, `dateaddedform`) VALUES
(1, 39, 2, 49, 'San Fernando City, La Union', 'CH', 'Cashier', '09209234801', 'Roman Catholic', 'Filipino', 'Angela Joy Jimenez', 'Sister', 'San Juan, La Union', '2012-01-20 23:22:52', '11:01 pm', '2012-02-03', '03:00 PM', 15, 'Surgical', 'Ward', 'Neurology', 1, 'Appendicitis', 'N/A', 'Yes', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Dr. Rico Maglayon, MD', 'Marian Rivera', 'None', 'Appendicitis', 'None', 'Appendectomy ', 'Appendix Removed', 'Dr. Angel Locsin, MD', 'Dr. Sam Pinto, MD', 'Dr. Anne Curtis, MD', 'Maricar Reyes, RN', '2012-02-04 23:36:09'),
(2, 40, 3, 52, 'Quezon City, Metro Manila', 'CH', 'Registered Nurse', '09123349012', 'Roman Catholic', 'Filipino', 'Samuel Angeles', 'Father', 'San Juan, La Union', '2012-01-21 04:25:39', '04:01 am', '2012-02-04', '03:00 PM', 16, 'Orthopedics', 'Ward', 'Cosmetics', 7, 'fractured right arm', 'N/A', 'Yes', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Dr. Manny Calayan, MD', 'Marian Rivera', 'None', 'Fractured Right Arm', 'None', 'Yes, surgically repaired the broken bone and applied cast to prevent mobilization', 'None', 'Dr. Sam Pinto, MD', 'Dr. Anne Curtis, MD', 'Dr. Angel Locsin, MD', 'Maricar Reyes, RN', '2012-02-05 02:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctors`
--

CREATE TABLE IF NOT EXISTS `tbldoctors` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `title` varchar(10) NOT NULL,
  `specialization` varchar(15) NOT NULL,
  `position` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `duty` varchar(10) NOT NULL,
  `professionalfee` int(11) NOT NULL,
  `dateleave` date NOT NULL,
  `dateregistered` datetime NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbldoctors`
--

INSERT INTO `tbldoctors` (`did`, `firstname`, `middlename`, `lastname`, `title`, `specialization`, `position`, `address`, `contact`, `duty`, `professionalfee`, `dateleave`, `dateregistered`) VALUES
(1, 'Rico', 'Agbuya', 'Maglayon', 'MD', 'Neurology', 'Attending', '#155 National Highway, Brgy. Urbiztondo, San Juan, La Union', '0921-956-6298', 'On-Duty', 0, '2012-01-26', '2012-01-13 02:28:16'),
(2, 'Vicky', 'Garcia', 'Belo', 'MD', 'Dermatology', 'Attending', 'San Juan, La Union', '0927-109-2890', 'On-Duty', 0, '0000-00-00', '2012-01-14 18:46:39'),
(3, 'Jose', 'Protacio', 'Rizal', 'MD', 'Opthamology', 'Resident-On-Duty', 'Calamba, Laguna', '0920-058-7209', 'On-Duty', 0, '0000-00-00', '2012-01-17 19:08:12'),
(4, 'Coco', 'Ignacio', 'Martin', 'MD', 'Surgery', 'Attending', 'San Juan, La Union', '0921-956-6298', 'On-Duty', 0, '2012-01-24', '2012-01-19 18:50:05'),
(5, 'Lamar', 'William', 'Smith', 'MD', 'Pediatrics', 'Resident-On-Duty', 'Bacnotan, La Union', '0927-918-7839', 'On-Call', 0, '0000-00-00', '2012-01-20 15:12:56'),
(6, 'Hayden', 'Castillo', 'Kho', 'MD', 'Dermatology', 'Attending', 'San Fernando City, La Union', '0920-710-9283', 'On-Duty', 0, '0000-00-00', '2012-01-23 14:35:24'),
(7, 'Manny', 'Rivera', 'Calayan', 'MD', 'Cosmetics', 'Resident-On-Duty', 'Bacnotan, La Union', '0927-120-9381', 'On-Duty', 0, '0000-00-00', '2012-01-23 14:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctorsorder`
--

CREATE TABLE IF NOT EXISTS `tbldoctorsorder` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `doctorsorder` text NOT NULL,
  `ordercarried` varchar(3) NOT NULL DEFAULT 'n/a',
  `datetimeordered` datetime NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbldoctorsorder`
--

INSERT INTO `tbldoctorsorder` (`oid`, `pid`, `rid`, `aid`, `doctorsorder`, `ordercarried`, `datetimeordered`) VALUES
(1, 43, 54, 6, 'Check vital signs every 4 hours', 'C', '2012-02-03 03:09:30'),
(2, 46, 57, 10, 'Give Vitamins every shift', 'C', '2012-02-05 01:27:42'),
(3, 39, 49, 2, 'No fluids, foods for the next 24 hours', 'C', '2012-02-05 01:31:50'),
(4, 40, 52, 3, 'provide anti-pain meds for 24 hours', 'C', '2012-02-05 02:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblhistoryphysical`
--

CREATE TABLE IF NOT EXISTS `tblhistoryphysical` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `presentillness` text NOT NULL,
  `fcancer` varchar(15) NOT NULL,
  `ftb` varchar(15) NOT NULL,
  `fhypertension` varchar(15) NOT NULL,
  `fmental` varchar(15) NOT NULL,
  `fblooddys` varchar(15) NOT NULL,
  `heartdisease` varchar(15) NOT NULL,
  `fdiabetes` varchar(15) NOT NULL,
  `fallergies` varchar(15) NOT NULL,
  `familyplanning` varchar(15) NOT NULL,
  `genapp` text NOT NULL,
  `skin` text NOT NULL,
  `headbent` text NOT NULL,
  `necklymph` text NOT NULL,
  `chestbreast` text NOT NULL,
  `hrate` varchar(3) NOT NULL,
  `bp` varchar(8) NOT NULL,
  `rrate` varchar(3) NOT NULL,
  `stomach` varchar(15) NOT NULL,
  `liver` varchar(15) NOT NULL,
  `gallbladder` varchar(15) NOT NULL,
  `spleen` varchar(15) NOT NULL,
  `kidneyblad` text NOT NULL,
  `genitalia` text NOT NULL,
  `spine` text NOT NULL,
  `neurological` text NOT NULL,
  `admitimpre` text NOT NULL,
  `doctor` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblhistoryphysical`
--

INSERT INTO `tblhistoryphysical` (`hid`, `rid`, `pid`, `aid`, `complaint`, `presentillness`, `fcancer`, `ftb`, `fhypertension`, `fmental`, `fblooddys`, `heartdisease`, `fdiabetes`, `fallergies`, `familyplanning`, `genapp`, `skin`, `headbent`, `necklymph`, `chestbreast`, `hrate`, `bp`, `rrate`, `stomach`, `liver`, `gallbladder`, `spleen`, `kidneyblad`, `genitalia`, `spine`, `neurological`, `admitimpre`, `doctor`, `dateadded`) VALUES
(2, 52, 40, 3, 'edited edited edited  edited edited edited edited edited edited ', 'edited edited edited edited edited', 'Cancer', 'TB', 'Hypertenstion', 'Mental Illness', 'Blood Dyscrasia', 'Heart Disease', 'Diabetes', 'Allergies', 'Family Plannig', 'edited', 'edited', 'edited', 'edited', 'edited', '30', '120/93', '30', 'Stomach', 'liver', 'Gallbladder', 'Spleen', 'edited', 'edited', 'edited', 'edited', 'edited', 5, '2012-01-21 04:34:57'),
(3, 49, 39, 2, 'Sharp pain at lower right portion of the abdomen', 'None', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Diabetes', 'N/A', 'N/A', 'Looks healthy', 'Pale', 'Normal', 'Normal', 'Normal', '38', '120/90', '33', 'N/A', 'N/A', 'N/A', 'N/A', 'Normal', 'Normal', 'Normal', 'Normal', 'Patient is in pain', 5, '2012-02-05 01:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblivfconsumption`
--

CREATE TABLE IF NOT EXISTS `tblivfconsumption` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `datestarted` date NOT NULL,
  `shift` varchar(20) NOT NULL,
  `timestarted` varchar(10) NOT NULL,
  `ivfbt` varchar(100) NOT NULL,
  `dateconsumed` date NOT NULL,
  `timeconsumed` varchar(10) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblivfconsumption`
--

INSERT INTO `tblivfconsumption` (`cid`, `pid`, `rid`, `aid`, `datestarted`, `shift`, `timestarted`, `ivfbt`, `dateconsumed`, `timeconsumed`) VALUES
(1, 39, 49, 2, '2012-02-05', '11 PM - 7 AM', '08:00 PM', 'Glucose IV', '2012-02-05', '01:00 PM'),
(2, 40, 52, 3, '2012-02-05', '11 PM - 7 AM', '10:00 PM', 'dextrose', '2012-02-05', '04:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogins`
--

CREATE TABLE IF NOT EXISTS `tbllogins` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `login` datetime NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `tbllogins`
--

INSERT INTO `tbllogins` (`lid`, `uid`, `login`) VALUES
(88, 8, '2012-01-22 23:12:29'),
(89, 8, '2012-01-22 23:12:58'),
(90, 24, '2012-01-22 23:13:23'),
(91, 8, '2012-01-23 12:52:23'),
(92, 8, '2012-01-24 23:23:08'),
(93, 24, '2012-01-25 03:33:37'),
(94, 8, '2012-01-25 12:43:07'),
(95, 8, '2012-01-25 14:13:07'),
(96, 8, '2012-01-25 22:06:54'),
(97, 8, '2012-01-26 01:41:21'),
(98, 8, '2012-01-26 03:57:51'),
(99, 8, '2012-01-26 04:05:50'),
(100, 8, '2012-01-26 04:07:43'),
(101, 8, '2012-01-26 22:09:22'),
(102, 8, '2012-01-27 00:08:35'),
(103, 8, '2012-01-27 02:33:31'),
(104, 8, '2012-01-27 15:59:15'),
(105, 8, '2012-01-27 20:00:07'),
(106, 8, '2012-01-28 16:04:14'),
(107, 8, '2012-01-29 16:00:55'),
(108, 8, '2012-01-30 12:37:45'),
(109, 8, '2012-01-30 12:48:31'),
(110, 8, '2012-01-31 13:41:10'),
(111, 8, '2012-01-31 18:13:00'),
(112, 8, '2012-01-31 18:15:06'),
(113, 8, '2012-01-31 18:15:27'),
(114, 8, '2012-02-01 02:53:54'),
(115, 24, '2012-02-01 02:54:04'),
(116, 24, '2012-02-01 05:11:46'),
(117, 8, '2012-02-01 13:40:49'),
(118, 8, '2012-02-01 23:06:08'),
(119, 24, '2012-02-01 23:06:23'),
(120, 8, '2012-02-01 23:06:52'),
(121, 8, '2012-02-02 15:35:46'),
(122, 8, '2012-02-02 15:50:18'),
(123, 8, '2012-02-03 00:23:14'),
(124, 8, '2012-02-03 17:59:31'),
(125, 27, '2012-02-06 01:43:34'),
(126, 8, '2012-02-06 01:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblnursenotes`
--

CREATE TABLE IF NOT EXISTS `tblnursenotes` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `datetimeadded` datetime NOT NULL,
  `nursenotes` text NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblnursenotes`
--

INSERT INTO `tblnursenotes` (`nid`, `pid`, `rid`, `aid`, `datetimeadded`, `nursenotes`) VALUES
(1, 46, 57, 10, '2012-02-05 01:28:24', 'Just gave the patient a vitamin C'),
(2, 39, 49, 2, '2012-02-05 01:32:31', 'Patient is looking good'),
(3, 40, 52, 3, '2012-02-05 02:38:24', 'patient is in a little bit pain');

-- --------------------------------------------------------

--
-- Table structure for table `tblpastillness`
--

CREATE TABLE IF NOT EXISTS `tblpastillness` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `measles` varchar(15) NOT NULL,
  `tb` varchar(15) NOT NULL,
  `malaria` varchar(15) NOT NULL,
  `arthritis` varchar(15) NOT NULL,
  `syphillis` varchar(15) NOT NULL,
  `drugs` varchar(15) NOT NULL,
  `mumps` varchar(15) NOT NULL,
  `asthma` varchar(15) NOT NULL,
  `rheumatic` varchar(15) NOT NULL,
  `typhoid` varchar(15) NOT NULL,
  `diarrhea` varchar(15) NOT NULL,
  `alcoholism` varchar(15) NOT NULL,
  `mental` varchar(15) NOT NULL,
  `diabetes` varchar(15) NOT NULL,
  `cancer` varchar(15) NOT NULL,
  `hypertension` varchar(15) NOT NULL,
  `blooddys` varchar(15) NOT NULL,
  `allergies` varchar(15) NOT NULL,
  `others` varchar(100) NOT NULL,
  `previousop` varchar(100) NOT NULL,
  `children` varchar(50) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblpastillness`
--

INSERT INTO `tblpastillness` (`iid`, `pid`, `rid`, `hid`, `aid`, `measles`, `tb`, `malaria`, `arthritis`, `syphillis`, `drugs`, `mumps`, `asthma`, `rheumatic`, `typhoid`, `diarrhea`, `alcoholism`, `mental`, `diabetes`, `cancer`, `hypertension`, `blooddys`, `allergies`, `others`, `previousop`, `children`, `dateadded`) VALUES
(5, 40, 52, 2, 3, 'Measles', 'TB', 'Malaria', 'Arthritis', 'Syphillis', 'Drugs', 'Mumps', 'Asthma', 'Rheumatic Fever', 'Typhoid Fever', 'Diarrhea', 'Alcholism', 'Mental Illness', 'Diabetes', 'N/A', 'N/A', 'N/A', 'N/A', 'edited', 'edited', 'edited', '2012-01-21 04:34:57'),
(6, 39, 49, 3, 2, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Diarrhea', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Allergies', 'N/A', 'N/A', 'N/A', '2012-02-05 01:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatientbills`
--

CREATE TABLE IF NOT EXISTS `tblpatientbills` (
  `pbid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `dateadmitted` date NOT NULL,
  `timeadmitted` varchar(10) NOT NULL,
  `nurseonduty` varchar(30) NOT NULL,
  `finaldiagnosis` text NOT NULL,
  `drugsandmedicines` varchar(10) NOT NULL,
  `supplies` varchar(10) NOT NULL,
  `laboratory` varchar(10) NOT NULL,
  `xray` varchar(10) NOT NULL,
  `ultrasound` varchar(10) NOT NULL,
  `ecg` varchar(10) NOT NULL,
  `oxygen` varchar(10) NOT NULL,
  `accomsubs` varchar(10) NOT NULL,
  `professionalfee` varchar(10) NOT NULL,
  `orfeedrfee` varchar(10) NOT NULL,
  `admissionfee` varchar(10) NOT NULL,
  `wardservice` varchar(10) NOT NULL,
  `nebfee` varchar(10) NOT NULL,
  `ambulancefee` varchar(10) NOT NULL,
  `exdrugsandmedicines` varchar(10) NOT NULL,
  `exsupplies` varchar(10) NOT NULL,
  `exlaboratory` varchar(10) NOT NULL,
  `exxray` varchar(10) NOT NULL,
  `exultrasound` varchar(10) NOT NULL,
  `execg` varchar(10) NOT NULL,
  `exoxygen` varchar(10) NOT NULL,
  `exaccomsubs` varchar(10) NOT NULL,
  `exprofessionalfees` varchar(10) NOT NULL,
  `exorfeedrfee` varchar(10) NOT NULL,
  `exadmissionfee` varchar(10) NOT NULL,
  `exwardservice` varchar(10) NOT NULL,
  `exambulancefee` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `extotal` varchar(10) NOT NULL,
  `amountpaid` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `notes` text NOT NULL,
  `datetimerecorded` datetime NOT NULL,
  PRIMARY KEY (`pbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpatientrecords`
--

CREATE TABLE IF NOT EXISTS `tblpatientrecords` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `dateofvisit` date NOT NULL,
  `age` varchar(15) NOT NULL,
  `timein` varchar(8) NOT NULL,
  `timeout` varchar(8) NOT NULL,
  `bp` varchar(7) NOT NULL,
  `cr` int(3) NOT NULL,
  `rr` int(3) NOT NULL,
  `temp` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `complaint` text NOT NULL,
  `remarks` text NOT NULL,
  `foradmission` varchar(3) NOT NULL,
  `admit` varchar(20) NOT NULL DEFAULT 'N/A',
  `dateregistered` datetime NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tblpatientrecords`
--

INSERT INTO `tblpatientrecords` (`rid`, `pid`, `did`, `dateofvisit`, `age`, `timein`, `timeout`, `bp`, `cr`, `rr`, `temp`, `weight`, `complaint`, `remarks`, `foradmission`, `admit`, `dateregistered`) VALUES
(47, 39, 1, '2012-01-08', '29', '10:00 AM', '07:00 PM', '120/80', 33, 33, 35, 70, 'headache', 'meds', 'No', 'N/A', '2012-01-18 11:01:48'),
(48, 40, 2, '2012-01-09', '23', '03:00 PM', '08:00 AM', '120/90', 30, 30, 35, 65, 'stomach ache', 'recommended for admission for observation', 'No', 'N/A', '2012-01-18 11:03:36'),
(49, 39, 1, '2012-01-17', '29', '09:00 AM', '04:49 PM', '120/80', 30, 30, 35, 70, 'jkhkljhjkhljkhljkhkljhj', 'hjkhjkhlkjhlkjhklj', 'Yes', 'Pending Discharge', '2012-01-18 15:24:02'),
(50, 39, 7, '2012-01-10', '29', '04:00 PM', '08:00 AM', '120/90', 33, 33, 35, 68, 'a;dlkfj', 'jasdkfjasld', 'No', 'N/A', '2012-01-18 15:25:15'),
(51, 41, 2, '2012-01-09', '8', '11:11 AM', '11:11 ', '111/111', 111, 111, 111, 111, 'head ache, stomach ache, dizziness', 'checked vital signs\nrecommended to be admitted for observation', 'Yes', 'Admitted', '2012-01-19 14:28:26'),
(52, 40, 7, '2012-01-26', '23', '11:11 PM', '11:11 PM', '120/80', 35, 35, 35, 60, 'pain at left upper quadrant of the abdomen', 'to be admitted for observation ', 'Yes', 'Pending Discharge', '2012-01-20 23:01:41'),
(53, 42, 5, '2012-01-21', '24', '10:00 AM', '07:00 PM', '120/80', 33, 33, 35, 55, 'stomach ache and dizziness', 'for observation, possible diarrhea', 'Yes', 'Admitted', '2012-01-22 03:24:40'),
(54, 43, 1, '2012-01-27', '21', '12:05 AM', ' AM', '128/98', 35, 35, 33, 60, 'bruises at right arm, broken right leg, abrasions and cuts and left arm, left leg.', 'clean up the wounds, stabilize the right leg.\nprepare for operation and also for admission to be observed for the next days', 'Yes', 'Admitted', '2012-01-27 02:59:49'),
(55, 44, 1, '2012-01-26', '32', '04:00 PM', '00:00 PM', '130/95', 35, 33, 36, 70, 'headache, chills, fever', 'given medicines&lt;br /&gt;\nfor admission and to be observed', 'Yes', 'Admitted', '2012-01-27 21:27:19'),
(56, 45, 5, '2012-02-08', '6', '12:00 AM', ' AM', '140/100', 38, 38, 38, 6, 'high fever', 'monitor patient''s temperature, do blood tests\nfor admission', 'Yes', 'Admitted', '2012-02-09 01:33:51'),
(57, 46, 4, '2012-02-03', '21 years old', '10:00 AM', ' PM', '120/90', 36, 35, 37, 70, 'Headache, chills, numbness of some parts of the body', 'put on IVT, on fluids, for admission to be checked', 'Yes', 'Admitted', '2012-02-04 18:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatients`
--

CREATE TABLE IF NOT EXISTS `tblpatients` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `membership` varchar(14) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `cs` varchar(20) NOT NULL,
  `dateofbirth` date NOT NULL,
  `opdnum` varchar(9) NOT NULL,
  `address` varchar(250) NOT NULL,
  `dateregistered` datetime NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tblpatients`
--

INSERT INTO `tblpatients` (`pid`, `firstname`, `middlename`, `lastname`, `membership`, `sex`, `cs`, `dateofbirth`, `opdnum`, `address`, `dateregistered`) VALUES
(39, 'Angelo Joseph', 'Lopez', 'Jimenez', 'Member', 'Male', 'Single', '1982-06-08', '00-00-01', 'San Juan, La Union', '2012-01-18 11:01:48'),
(40, 'Samantha', 'Aquinio', 'Angeles', 'Dependent', 'Female', 'Single', '1988-09-07', '00-00-02', 'Bacnotan, La Union', '2012-01-18 11:03:36'),
(41, 'Andrea', 'Salvacion', 'Santos', 'Dependent', 'Female', 'Single', '2003-12-07', '00-00-03', 'Baroro, Bacnotan, La Union', '2012-01-19 14:28:26'),
(42, 'Sophia Joy', 'De Guzman', 'Fontanilla', 'Dependent', 'Female', 'Single', '1988-12-21', '00-00-04', 'Bacnotan, La Union', '2012-01-22 03:24:40'),
(43, 'Christine', 'Samonte', 'Diaz', 'Dependent', 'Female', 'Single', '1991-12-27', '00-00-05', 'Bacnotan, La Union', '2012-01-27 02:59:49'),
(44, 'Anthony', 'Santiago', 'Florendo', 'Member', 'Male', 'Married', '1980-12-10', '00-00-06', 'San Fernando City, La Union', '2012-01-27 21:27:19'),
(45, 'Andrea Joanna', 'Hernandez', 'Lopez', 'Dependent', 'Female', 'Single', '2011-08-09', '00-00-07', 'San Fernando City, La Union', '2012-02-09 01:33:51'),
(46, 'Lambert', 'Garcia', 'Galangco', 'Dependent', 'Male', 'Single', '1990-10-21', '00-00-08', 'Suyo, Ilocos Sur', '2012-02-04 18:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogressnotes`
--

CREATE TABLE IF NOT EXISTS `tblprogressnotes` (
  `pgid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `progressnotes` text NOT NULL,
  PRIMARY KEY (`pgid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblprogressnotes`
--

INSERT INTO `tblprogressnotes` (`pgid`, `pid`, `rid`, `aid`, `datetime`, `progressnotes`) VALUES
(1, 43, 54, 6, '2012-02-03 03:12:36', 'Temperature dropped'),
(2, 46, 57, 10, '2012-02-05 01:28:06', 'Patient Taking Vitamins'),
(3, 39, 49, 2, '2012-02-05 01:32:18', 'Patient is recovering fast'),
(4, 40, 52, 3, '2012-02-05 02:38:09', 'patient looking good');

-- --------------------------------------------------------

--
-- Table structure for table `tbltheraconsumed`
--

CREATE TABLE IF NOT EXISTS `tbltheraconsumed` (
  `tcid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `shift` varchar(15) NOT NULL,
  `given` varchar(10) NOT NULL,
  `givendate` date NOT NULL,
  PRIMARY KEY (`tcid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tbltheraconsumed`
--

INSERT INTO `tbltheraconsumed` (`tcid`, `pid`, `rid`, `aid`, `tid`, `shift`, `given`, `givendate`) VALUES
(1, 39, 49, 2, 1, '3 PM - 11 PM', 'Given', '2012-01-28'),
(2, 39, 49, 2, 2, '3 PM - 11 PM', 'Given', '2012-01-28'),
(3, 39, 49, 2, 6, '3 PM - 11 PM', 'Given', '2012-01-28'),
(4, 39, 49, 2, 6, '3 PM - 11 PM', 'Given', '2012-01-27'),
(5, 39, 49, 2, 3, '11 PM - 7 AM', 'Given', '2012-01-28'),
(6, 39, 49, 2, 4, '11 PM - 7 AM', 'Given', '2012-01-28'),
(10, 39, 49, 2, 6, '11 PM - 7 AM', 'Given', '2012-01-28'),
(70, 39, 49, 2, 6, '11 PM - 7 AM', 'Given', '2012-01-29'),
(71, 39, 49, 2, 1, '11 PM - 7 AM', 'Given', '2012-01-29'),
(72, 39, 49, 2, 2, '11 PM - 7 AM', 'Given', '2012-01-29'),
(73, 39, 49, 2, 8, '11 PM - 7 AM', 'Given', '2012-01-29'),
(76, 39, 49, 2, 4, '11 PM - 7 AM', 'Given', '2012-01-29'),
(77, 39, 49, 2, 3, '11 PM - 7 AM', 'Given', '2012-01-29'),
(79, 40, 52, 3, 10, '11 PM - 7 AM', 'Given', '2012-01-29'),
(80, 39, 49, 2, 6, '7 AM - 3 PM', 'Given', '2012-01-30'),
(81, 39, 49, 2, 11, '7 AM - 3 PM', 'Given', '2012-01-30'),
(82, 39, 49, 2, 3, '7 AM - 3 PM', 'Given', '2012-01-30'),
(83, 39, 49, 2, 4, '7 AM - 3 PM', 'Given', '2012-01-30'),
(92, 39, 49, 2, 1, '3 PM - 11 PM', 'Given', '2012-01-30'),
(93, 39, 49, 2, 2, '3 PM - 11 PM', 'Given', '2012-01-30'),
(94, 39, 49, 2, 8, '3 PM - 11 PM', 'Given', '2012-01-30'),
(97, 39, 49, 2, 11, '3 PM - 11 PM', 'Given', '2012-01-30'),
(98, 39, 49, 2, 3, '3 PM - 11 PM', 'Given', '2012-01-30'),
(99, 39, 49, 2, 4, '3 PM - 11 PM', 'Given', '2012-01-30'),
(100, 43, 54, 6, 12, '3 PM - 11 PM', 'Given', '2012-01-30'),
(101, 39, 49, 2, 6, '7 AM - 3 PM', 'Given', '2012-01-31'),
(102, 46, 57, 10, 13, '11 PM - 7 AM', 'Given', '2012-02-04'),
(103, 43, 54, 6, 12, '11 PM - 7 AM', 'Given', '2012-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbltherapeutic`
--

CREATE TABLE IF NOT EXISTS `tbltherapeutic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `theraname` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbltherapeutic`
--

INSERT INTO `tbltherapeutic` (`tid`, `pid`, `rid`, `aid`, `theraname`, `type`) VALUES
(1, 39, 49, 2, 'Anti-Rabies', 'Injection'),
(2, 39, 49, 2, 'Anti-Tetanu', 'Injection'),
(3, 39, 49, 2, 'Anti-Biotics', 'Oral'),
(4, 39, 49, 2, 'Wound Cleaning', 'Treatment'),
(6, 39, 49, 2, 'Anti-Blah', 'Injection'),
(8, 39, 49, 2, 'Anti-Weh', 'Injection'),
(10, 40, 52, 3, 'Anti-Rabies', 'Injection'),
(11, 39, 49, 2, 'Sleeping Pills', 'Oral'),
(12, 43, 54, 6, 'Anti-Rabies', 'Injection'),
(13, 46, 57, 10, 'Vitamin C', 'Oral');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `department` varchar(20) NOT NULL,
  `dateregistered` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`uid`, `firstname`, `lastname`, `username`, `password`, `department`, `dateregistered`, `lastlogin`) VALUES
(8, 'Rico', 'Maglayon', 'ricoconess', '876d8718538d2a66adc737a8abd4983fb43043ef', 'Administrator', '2011-12-23 02:36:57', '2012-02-06 01:47:26'),
(24, 'Admin', 'Administrator', 'adminuser', '6f372c90822f7de721f3e6edc42653a746e81d90', 'Administrator', '2011-12-27 23:24:25', '2012-02-01 23:06:22'),
(27, 'Coco', 'Martin', 'cocomartin', '876d8718538d2a66adc737a8abd4983fb43043ef', 'Billing', '2012-01-22 22:57:29', '2012-02-06 01:43:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
