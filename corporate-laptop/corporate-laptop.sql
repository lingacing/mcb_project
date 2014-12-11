-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 05:16 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `corporate-laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_category` int(11) NOT NULL,
  `article_title` varchar(200) NOT NULL,
  `article_title_slug` varchar(200) NOT NULL,
  `article_summary` mediumtext NOT NULL,
  `article_meta_description` tinytext NOT NULL,
  `article_meta_keyword` varchar(200) NOT NULL,
  `article_meta_title` varchar(300) NOT NULL,
  `article_user_id` int(20) NOT NULL,
  `article_image` varchar(100) NOT NULL,
  `article_view` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `submited` varchar(50) NOT NULL DEFAULT 'user',
  `article_status` varchar(20) NOT NULL DEFAULT 'publish',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_category`, `article_title`, `article_title_slug`, `article_summary`, `article_meta_description`, `article_meta_keyword`, `article_meta_title`, `article_user_id`, `article_image`, `article_view`, `date`, `submited`, `article_status`) VALUES
(1, 1, 'Managing and Founding Partner Yozua Makes'' article, "Challenges and Opportunities for the Indonesian Securities Takeover Regulations: General Framework and Analysis from Dutch Law and Theoretical Pers', 'managing-and-founding-partner-yozua-makes-article-challenges-and-opportunities-for-the-indonesian-securities-takeover-regulations-general-framework-and-analysis-from-dutch-law-and-theoretical-pers', '<p>Managing and Founding Partner Yozua Makes&#39; article, &quot;Challenges and Opportunities for the Indonesian Securities Takeover Regulations: General Framework and Analysis from Dutch Law and Theoretical Perspectives&quot; was recently published at the University of Pennsylvania&#39;s East Asia Law Review. To view the published article,&nbsp;<a href="http://www.pennealr.com/index.php" target="_blank" title="U. OF PENNSYLVANIA EAST ASIA LAW REVIEW"><font color="#15779e">please click here&nbsp;</font></a></p>\r\n', 'Managing and Founding Partner Yozua Makes'' article, "Challenges and Opportunities for the Indonesian Securities Takeover Regulations: General Framework and Analysis from Dutch Law and Theoretical Pers', 'Managing and Founding Partner Yozua Makes'' article, "Challenges and Opportunities for the Indonesian Securities Takeover Regulations: General Framework and Analysis from Dutch Law and Theoretical Pers', 'Managing and Founding Partner Yozua Makes'' article, "Challenges and Opportunities for the Indonesian Securities Takeover Regulations: General Framework and Analysis from Dutch Law and Theoretical Pers', 6, '', 0, '2013-10-08 00:34:02', 'admin', 'trash'),
(2, 1, 'Duis facilisis nulla sed vulputate pharetra', 'makes-and-partners-is-nominated-at-the-2013-asian-legal-business-alb-se-asia-law-awards-for-se-asia-ma-deal-of-the-year', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', 'Makes and Partners is nominated at the 2013 Asian Legal Business (ALB) SE Asia Law Awards for SE Asia M&A Deal of the Year', 'Makes and Partners is nominated at the 2013 Asian Legal Business (ALB) SE Asia Law Awards for SE Asia M&A Deal of the Year', 'Makes and Partners is nominated at the 2013 Asian Legal Business (ALB) SE Asia Law Awards for SE Asia M&A Deal of the Year', 6, 'Honda_RC213V-S_-_Motor_Moto_GP_Versi_Jalanan.jpg', 0, '2013-10-08 00:34:55', 'admin', 'publish'),
(3, 1, 'Nam congue sapien id mauris ullamcorper mollis', 'yozua-makes-authored-the-chapter-on-indonesia-in-the-mergers-acquisitions-review-sixth-edition-published-by-law-business-research-ltd', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', '', '', '', 6, 'MV_Agusta_Stradale_800_-_Spesifikasi_Lengkap_dan_Harga.jpg', 30, '2013-10-08 00:35:24', 'admin', 'publish'),
(4, 1, 'Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi', 'partner-iwan-setiawan-was-quoted-in-an-iflr-article-on-the-asean-bourse-link', '<div class="entry-content">\r\n<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n</div>\r\n', 'Partner Iwan Setiawan was quoted in an IFLR article on the Asean bourse link', 'Partner Iwan Setiawan was quoted in an IFLR article on the Asean bourse link', 'Partner Iwan Setiawan was quoted in an IFLR article on the Asean bourse link', 6, '2015-Yamaha-MT-09-EU-Blazing-Orange-Studio-011.jpg', 9, '2013-10-08 00:35:46', 'admin', 'publish'),
(5, 1, 'hjkhkjhjkhkj', 'hjkhkjhjkhkj', '<div>Makes &amp; Partners offers a bouquet of services relating to Capital Markets, Mergers &amp; Acquisitions, Banking, Project Finance, Domestic &amp; Foreign Investment, Corporate Matters and Debt Restructuring. In building our practice around these key business areas, we have established our Firm as a leader in the Indonesian corporate and financial legal services market.<br />\r\n<br />\r\nOur main areas of expertise are:</div>\r\n\r\n<div>\r\n<ul>\r\n	<li><a href="http://www.makeslaw.com/capital-market.html">Capital Markets</a></li>\r\n	<li><a href="http://www.makeslaw.com/mergers.html">Mergers &amp; Acquisitions</a></li>\r\n	<li><a href="http://www.makeslaw.com/corporate-finance.html">Banking</a></li>\r\n	<li><a href="http://www.makeslaw.com/project-finance.html">Project Finance</a></li>\r\n	<li><a href="http://www.makeslaw.com/restructuring.html">Restructuring &amp; Reorganization</a></li>\r\n	<li>Domestic &amp; Foreign Investment</li>\r\n	<li><a href="http://www.makeslaw.com/energy-resources-mining.html">Energy, Resources &amp; Mining</a></li>\r\n	<li>Private Equity</li>\r\n	<li><a href="http://www.makeslaw.com/privatizations.html">Privatizations &amp; Divestments</a></li>\r\n	<li><a href="http://www.makeslaw.com/real-estate.html">Real Estate / Construction</a></li>\r\n	<li>Public Utilities &amp; Infrastructure</li>\r\n	<li>Energy, Resources &amp; Mining</li>\r\n	<li><a href="http://www.makeslaw.com/mediabroad.html">Media &amp; Broadcasting</a></li>\r\n	<li><a href="http://www.makeslaw.com/telecommunications.html">Telecommunications &amp; Information Technology</a></li>\r\n	<li><a href="http://www.makeslaw.com/hotel.html">Hotel Management Related Contracts</a></li>\r\n	<li><a href="http://www.makeslaw.com/environmental.html">Environment related matters </a></li>\r\n	<li><a href="http://www.makeslaw.com/corporate-governance.html">Corporate Governance</a></li>\r\n	<li><a href="http://www.makeslaw.com/others.html">Others</a></li>\r\n</ul>\r\n</div>\r\n', 'Makes &amp; Partners offers a bouquet', 'Makes &amp; Partners offers a bouquet', 'Makes &amp; Partners offers a bouquet', 6, '', 0, '2013-10-09 00:23:07', 'admin', 'trash'),
(6, 1, 'Aliquam eu nisl at lectus volutpat tempus', 'aliquam-eu-nisl-at-lectus-volutpat-tempus', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Vivamus dignissim justo ut sapien vulputate aliquam', 'Vivamus dignissim justo ut sapien vulputate aliquam', 'Vivamus dignissim justo ut sapien vulputate aliquam', 6, 'aliquam-eu-nisl-at-lectus-volutpat-tempus.png', 15, '2014-12-07 16:29:41', 'admin', 'publish'),
(7, 1, ' Donec non mattis nisi. Vivamus a imperdiet enim', 'donec-non-mattis-nisi-vivamus-a-imperdiet-enim', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', '', '', '', 6, 'donec-non-mattis-nisi-vivamus-a-imperdiet-enim.png', 7, '2014-12-08 09:58:00', 'admin', 'publish'),
(8, 7, 'Vivamus dignissim justo ut sapien vulputate aliquam', 'vivamus-dignissim-justo-ut-sapien-vulputate-aliquam', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', 6, 'vivamus-dignissim-justo-ut-sapien-vulputate-aliquam.png', 9, '2014-12-08 18:22:57', 'admin', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `category_slug` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_meta_title` varchar(200) NOT NULL,
  `category_meta_keyword` varchar(200) NOT NULL,
  `category_status` varchar(20) NOT NULL DEFAULT 'publish',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `category_slug`, `category_description`, `category_meta_title`, `category_meta_keyword`, `category_status`) VALUES
(1, 'Artikel', 'artikel', 'Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra', 'porttitor. Integer at odio', 'porttitor. Integer at odio', 'publish'),
(2, 'Video', 'video', '', '', '', 'publish'),
(3, 'Foto', 'foto', '', '', '', 'trash'),
(4, 'Test', 'test', 'Test', 'Test', 'Test', 'trash'),
(5, 'Test 2', 'test-2', 'Test 2', 'Test 2', 'Test 2', 'draft'),
(6, 'Asu Banget 2', 'asu-banget', 'Asu Banget 2', 'Asu Banget 2', 'Asu Banget 2', 'draft'),
(7, 'Acer', 'acer', 'Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique.', 'Acer', 'Acer', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_name` varchar(300) NOT NULL,
  `contact_email` varchar(300) NOT NULL,
  `contact_subject` varchar(300) NOT NULL,
  `contact_message` text NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_date`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`) VALUES
(1, '2014-12-09 10:50:16', 'Jessica Veranda', 'jeje@gmail.com', 'Tanya Laptop Chrome', 'Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra'),
(2, '2014-12-09 10:52:19', 'Sonia', 'sonia@sonia.co', 'Lowongan Kerja', 'Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. \r\n\r\nUt nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. \r\n\r\nDonec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.'),
(3, '2014-12-09 10:55:28', 'Roobin Harahap', 'roobin@gmail.com', 'Harga Update Bulanan', 'Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. \r\n\r\nAenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu.'),
(4, '2014-12-09 11:26:20', 'Joko Santoso', 'joko@gmail.com', 'Tanya Presiden', 'Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. \r\n\r\nMaecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus.\r\n\r\nDuis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(100) NOT NULL,
  `gallery_file_name` varchar(500) NOT NULL,
  `gallery_extension` varchar(10) NOT NULL,
  `file_size` varchar(11) NOT NULL,
  `upload_date` datetime NOT NULL,
  `type_for` varchar(50) NOT NULL,
  `gallery_description` text NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_file_name`, `gallery_extension`, `file_size`, `upload_date`, `type_for`, `gallery_description`) VALUES
(30, '0', 'nbl post.png', '', '', '2013-10-03 17:51:07', 'post', '0'),
(31, '0', 'One Piece 609 Subtitle Indonesia.jpg', '', '', '2013-10-03 17:53:22', 'post', '0'),
(32, '0', 'One Piece 606 Subtitle Indonesia.jpg', '', '', '2013-10-03 17:57:32', 'post', '0'),
(33, '0', 'One Piece 607 Subtitle Indonesia.jpg', '', '', '2013-10-03 17:58:42', 'post', '0'),
(34, '0', '02.jpg', '', '', '2013-10-04 18:44:51', 'post', '0'),
(35, '0', 'IMG_5864.jpg', '', '', '2013-10-04 18:45:43', 'post', '0'),
(36, '0', 'bob-odenkirk-saul-goodman-breaking-bad.jpg', '', '', '2013-10-10 16:35:06', 'post', '0'),
(37, '0', 'ads-300x250.png', '', '', '2014-12-07 05:37:33', 'post', '0');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(1000) NOT NULL,
  `menu_link` text NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_link`, `menu_parent`, `menu_order`) VALUES
(1, 'Home', 'http://localhost/corporate-laptop/', 0, 1),
(17, 'About Us', 'http://localhost/corporate-laptop/page/about-us', 0, 2),
(19, 'Visi dan Misi', 'http://localhost/corporate-laptop/page/visi-dan-misi', 0, 4),
(20, 'Carer', 'http://localhost/corporate-laptop/page/carer', 0, 5),
(22, 'Contact', 'http://localhost/corporate-laptop/contact', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `key`, `val`) VALUES
(13, 'site_name', ' Ultratech'),
(14, 'site_description', 'Jakarta Notebook Distributor'),
(15, 'home_title', 'J-NoteBook'),
(16, 'testimoni', ''),
(17, 'home_page_logo', 'ultratech.png'),
(18, 'founder_photo', 'park-sojin-oh-my-god-shoot.jpg'),
(19, 'founder_bio', 'Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. '),
(20, 'founder_email', 'aliando@gmail.com'),
(21, 'founder_phone', '08256799878'),
(22, 'founder_bbm', '7DG78C'),
(23, 'founder_twitter', '@aliando17'),
(24, 'founder_facebook', 'Aliando Sharif'),
(25, 'founder_name', 'Aliando Sharif Maulana'),
(26, 'company_map', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15812.293587933975!2d110.3656995129289!3d-7.78204282632291!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xe4e8348a866b3d4a!2sTugu+Yogyakarta!5e0!3m2!1sen!2s!4v1418102692119" width="600" height="450" frameborder="0" style="border:0"></iframe>'),
(27, 'company_about', 'Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. \r\n\r\nAliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique'),
(28, 'company_address', 'JL. Vivamus Dignissim\r\nSleman, Bantul\r\nYogyakarta'),
(29, 'company_phone', '(0274) 321897'),
(30, 'company_fax', '(0274) 321856'),
(31, 'company_email', 'jnotebook@gmail.com'),
(32, 'company_facebook', 'http://facebok.com/'),
(33, 'company_twitter', 'http://twitter/com'),
(34, 'company_gplus', 'http://plus.google.com'),
(35, 'company_linkedin', 'http://linkedin.com'),
(36, 'company_pinterest', 'http://pinterest.com');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_author` int(11) NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_title` varchar(300) NOT NULL,
  `page_slug` varchar(300) NOT NULL,
  `page_summary` text NOT NULL,
  `page_award` text NOT NULL,
  `page_content` text NOT NULL,
  `page_order` int(11) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `meta_description` text NOT NULL,
  `page_status` varchar(50) NOT NULL DEFAULT 'publish',
  `page_width` varchar(50) NOT NULL,
  `page_float` varchar(50) NOT NULL,
  `page_type` varchar(100) NOT NULL DEFAULT 'page',
  `page_class` varchar(200) NOT NULL,
  `page_template` varchar(500) NOT NULL DEFAULT 'page',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_author`, `page_date`, `page_title`, `page_slug`, `page_summary`, `page_award`, `page_content`, `page_order`, `meta_title`, `meta_keyword`, `meta_description`, `page_status`, `page_width`, `page_float`, `page_type`, `page_class`, `page_template`) VALUES
(35, 6, '2014-12-09 09:40:43', 'About Us', 'about-us', '0', '0', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', 0, '', '', '', 'publish', '0', '0', 'page', '0', '0'),
(36, 6, '2014-12-09 09:40:51', 'TOS', 'tos', '0', '0', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', 0, '', '', '', 'publish', '0', '0', 'page', '0', '0'),
(37, 6, '2014-12-09 09:40:59', 'Visi dan Misi', 'visi-dan-misi', '0', '0', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', 0, '', '', '', 'publish', '0', '0', 'page', '0', '0'),
(38, 6, '2014-12-09 09:41:27', 'Carer', 'carer', '0', '0', '<p>Phasellus luctus velit a mauris dignissim, in cursus lorem porttitor. Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere, sed cursus nisl feugiat. Aenean rutrum in magna id accumsan. Quisque luctus tincidunt pellentesque. Aliquam erat erat, faucibus et mattis non, semper vitae eros. Etiam vehicula mi at felis ornare, sit.</p>\r\n\r\n<p>Vestibulum porttitor lorem nibh, eu mollis enim ornare ac, pulvinar nisi. Nam congue sapien id mauris ullamcorper mollis. Fusce eget augue et nulla scelerisque tristique. Duis at aliquam tellus, porttitor lacinia diam. Aenean nec ligula vitae quam sodales fringilla sed vitae risus. Morbi mattis justo vel dui varius malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam aliquet dolor magna, eu cursus mauris sagittis eu. Aenean interdum elit at justo venenatis, at rutrum sapien malesuada. Etiam tincidunt, odio in fermentum commodo, neque tortor faucibus urna, vel aliquet nisl risus nec nunc. Duis viverra nunc nec metus scelerisque bibendum. Vivamus quis faucibus nisi, sed congue quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>\r\n\r\n<p>Vivamus dignissim justo ut sapien vulputate aliquam. Aliquam eu nisl at lectus volutpat tempus. Nulla feugiat sapien non eros tristique luctus. Aliquam ipsum erat, egestas id porta tempus, mollis commodo mi. Maecenas consequat lacinia luctus. Etiam vitae purus tempor, scelerisque ante quis, semper orci. Ut nec purus tincidunt, hendrerit sem vitae, fringilla dui. In convallis libero odio, non tristique metus lobortis quis. Donec non mattis nisi. Vivamus a imperdiet enim. Cras a egestas lacus. Duis et metus ac sapien condimentum aliquet. Donec at tortor ac quam mattis egestas. Nullam pharetra vitae leo quis tempus. Proin ultrices dui in lorem vestibulum semper. Morbi condimentum felis nec dui vulputate malesuada.</p>\r\n', 0, '', '', '', 'publish', '0', '0', 'page', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `slideshow_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slideshow_image` varchar(10000) NOT NULL,
  `slideshow_title` varchar(1000) NOT NULL,
  `slideshow_link` varchar(2000) NOT NULL,
  `slideshow_description` text NOT NULL,
  PRIMARY KEY (`slideshow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideshow_id`, `slideshow_image`, `slideshow_title`, `slideshow_link`, `slideshow_description`) VALUES
(4, '1.jpg', 'Integer at odio quis mauris iaculis imperdiet', 'http://google.com', 'Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere'),
(5, '2.jpg', 'Suspendisse eget lacus malesuada', 'http://google.com', 'Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere'),
(6, '3.jpg', 'Duis facilisis nulla sed vulputate pharetra', 'http://google.com', 'Integer at odio quis mauris iaculis imperdiet. Suspendisse eget lacus malesuada, scelerisque metus laoreet, viverra orci. Duis facilisis nulla sed vulputate pharetra. Nam cursus purus eget nisi posuere');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_level` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `num_post_perday` int(11) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `about_me` tinytext NOT NULL,
  `site` varchar(50) NOT NULL,
  `user_stats` varchar(20) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_admin`, `username`, `password`, `email`, `user_level`, `full_name`, `num_post_perday`, `avatar`, `genre`, `about_me`, `site`, `user_stats`) VALUES
(6, 'Aliando', '87dab82ad6d5edb387500e9dcfddfb540cc236e8', 'Aliando@gmail.com', 'top_admin', 'Aliando', 0, 'Cosplay_Chucky_knife.png', 'laki-laki', '', '0', 'active');
