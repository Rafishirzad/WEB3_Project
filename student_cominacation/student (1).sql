-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 09:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo`) VALUES
(4, 'photo/Click (53).jpg'),
(6, 'photo/thumb-p8.jpg'),
(7, 'photo/p3.jpg'),
(11, 'photo/Click (28).jpg'),
(12, 'photo/Click (28).jpg'),
(14, 'photo/thumb-p6.jpg'),
(15, 'photo/thumb-p5.jpg'),
(16, 'photo/thumb-p7.jpg'),
(17, 'photo/IMG_1762.JPG'),
(18, 'photo/received_1895082013843464.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `des` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `des`, `photo`) VALUES
(4, '10 tips to improve your laptop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales varius sagittis. Proin a arcu vitae turpis congue facilisis. Quisque a lectus pretium, sagittis augue in, fringilla risus....', 'post/blog4.jpg'),
(6, '10 tips to improve your laptop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sodales varius sagittis. Proin a arcu vitae turpis congue facilisis. Quisque a lectus pretium, sagittis augue in, fringilla risus....', 'post/blog5.jpg'),
(8, 'Phasellus sagittis tellus et quam dapibus, nec imperdiet massa tincidunt.', 'Provide detail sufficient to enable a competent \r\nreader to repeat the experiments.\r\nâ€¢ Write how you found out the material and \r\nwhich method you used.', 'post/thumb-p9.jpg'),
(9, 'New news', 'sdhfgdjkhghsgfdjhgdgdfd', 'post/thumb-p3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studetn_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `studetn_id`, `name`, `lname`, `email`, `phone`, `photo`, `password`, `des`) VALUES
(1, '', '', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', '', '', ''),
(2, '', '', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', '', '', ''),
(3, '', '', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', '', '', ''),
(4, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', '', '', ''),
(5, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/12234.jpg', '', ''),
(6, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/12234.jpg', '', ''),
(7, '', 'AHMAD', 'AHMADI', 'ahmad@gmail.com', '+93795997340', 'img/12345.jpg', '269c287e144cb9a430e87e2db7a95c60', ''),
(8, '', 'Nazir Ahmad Parsa', 'Parsa', 'admin@gmail.com', '+93795997340', 'img/12234.jpg', '88fd95b4c7255b9290a883a4c8df1ccd', ''),
(9, '', 'karim karim kair', 'kair', 'admin@gmail.com', '+93795997340', 'img/12234.jpg', '88fd95b4c7255b9290a883a4c8df1ccd', ''),
(10, '', 'mohammadrafi', 'shirzad', 'm.rafishirzad423@gmail.com', '+93795997340', 'img/112233.jpg', '0f0e84e10f900f36e5892bef58e5823b', ''),
(11, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/.jpg', 'd93a5def7511da3d0f2d171d9c344e91', ''),
(12, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', ''),
(13, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/re/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', ''),
(14, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/re/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(15, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/re/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(16, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/re/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(17, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/re/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(18, '', 'Nazir Ahmad Parsa', 'Parsa', 'nazirahmad7340@gamil.com', '+93795997340', 'img/re/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(19, '', 'Nazir Ahmad Parsa', 'Parsa', 'admin@gmail.com', '+93795997340', 'img/re/d93a5def7511da3d0f2d171d9c344e91.jpg', 'd93a5def7511da3d0f2d171d9c344e91', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(20, '', 'Nazir Ahmad Parsa', 'Parsa', 'admin@gmail.com', '+93795997340', 'img/re/61d401d87241eb2f65d7d46f6d64c2db.jpg', '61d401d87241eb2f65d7d46f6d64c2db', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(21, '', 'Nazir Ahmad Parsa', 'Parsa', 'admin@gmail.com', '+93795997340', 're/3ea76a8139eca082fda1cd3d2b1f0a22.jpg', '3ea76a8139eca082fda1cd3d2b1f0a22', 'Mastering OpenCV with Practical Computer Vision Projects\r\n'),
(22, '', 'karim', 'karrimi', 'karim1@gmail.com', '+93795997340', 're/3187386e2bca5343dfd079c2cfe5eb15.jpg', '3187386e2bca5343dfd079c2cfe5eb15', 'Mastering OpenCV with Practical Computer Vision Projects by Daniel Lelis Baggio, 9781849517829, available at Book Depository with free delivery worldwide.'),
(23, '', 'ahmad@gmail.com', 'Ahmad', 'ahmad@gmail.com', 'Ahmadi', 're/700c8b805a3e2a265b01c77614cd8b21.jpg', '700c8b805a3e2a265b01c77614cd8b21', 'Present the principles, relationship, and \r\ngeneralization shown by the results\r\nâ€¢ Point out any exceptions\r\nâ€¢ Do summarize the result\r\nâ€¢ New results should not be introduced in this \r\nsection'),
(24, '', 'a', 'b', 'a@gmail.com', '+93795997340', 're/b714337aa8007c433329ef43c7b8252c.jpg', 'b714337aa8007c433329ef43c7b8252c', 'Provide detail sufficient to enable a competent \r\nreader to repeat the experiments.\r\nâ€¢ Write how you found out the material and '),
(25, '', 'mohammadrsfi', 'shirzad', 'ahmad@gmail.com', '07990000000', 're/eb75963a510197cdd0f3c01909f9b780.jpg', 'eb75963a510197cdd0f3c01909f9b780', 'sdfgfds'),
(26, '', 'mohammadrafi', 'shirzad', 'ahmad@gmail.com', '079999999999', 're/79366bb2c8007ca02fdbe9a10073c16c.jpg', '79366bb2c8007ca02fdbe9a10073c16c', 'fjkjkdvbjksdjkbvjkckvsuifgweyguigfjkgkjnvnvdjkfhdklvnckvndfkgjdfghhhkcvn'),
(27, '', 'Nazir Ahmad', ' Parsa', 'admin@gmail.com', '+93795997340', 're/0f83c31b5c30ee1c622564a91f886fe0.jpg', '0f83c31b5c30ee1c622564a91f886fe0', 'for test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
