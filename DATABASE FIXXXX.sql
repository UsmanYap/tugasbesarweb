-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 12:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myspotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `Judul` char(64) NOT NULL,
  `Penyanyi` char(128) NOT NULL,
  `Total_duration` int(11) NOT NULL,
  `Image_path` char(255) NOT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `uid` int(11) NOT NULL,
  `songID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groupName` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE `singers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`id`, `name`, `info`, `image`) VALUES
(1, 'Sơn Tùng MTP', 'Nguyễn Thanh Tùng, thường được biết đến với nghệ danh Sơn Tùng M-TP, là một nam ca sĩ kiêm sáng tác nhạc, rapper và diễn viên người Việt Nam.', 'images/singers/mtp.png'),
(2, 'Đức Phúc', 'Nguyễn Đức Phúc là một nam ca sĩ người Việt Nam được biết đến rộng rãi với tư cách quán quân của The Voice Vietnam 2015.', 'images/singers/ducphuc.png'),
(3, 'Hoài Lâm', 'Hoài Lâm, tên thật là Nguyễn Tuấn Lộc, là một nam ca sĩ, rapper kiêm diễn viên người Việt Nam. Anh từng giành 1 giải Cống hiến và được công chúng Việt Nam đặc biệt chú ý sau khi giành giải quán quân chương trình truyền hình thực tế Gương mặt thân quen.', 'images/singers/hoailam.png'),
(4, 'Hương Tràm', 'Hương Tràm có tên đầy đủ là Phạm Thị Hương Tràm là một nữ ca sĩ người Việt Nam. Cô là quán quân cuộc thi Giọng hát Việt mùa đầu tiên 2012.', 'images/singers/huongtram.png'),
(5, 'Chế Linh', 'Chế Linh là nam ca sĩ người Chăm nổi tiếng, đồng thời là nhạc sĩ với bút hiệu Tú Nhi và Lưu Trần Lê. Ông nổi danh từ thập niên 60 và được xem như là một trong bốn giọng nam nổi tiếng nhất của nhạc vàng thời kỳ đầu.', 'images/singers/chelinh.png'),
(8, 'Min', 'Nguyễn Minh Hằng, được biết đến với nghệ danh MIN, là một nữ ca sĩ, vũ công và nhà sản xuất âm nhạc người Việt Nam.', 'images/singers/cec.jpg'),
(9, 'Unknown', 'Random Beatiful Songs', 'images/singers/lofi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` char(64) NOT NULL,
  `singers` char(128) NOT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` char(64) NOT NULL,
  `Duration` int(11) NOT NULL,
  `filepath` char(255) NOT NULL,
  `imgPath` char(255) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `album_id` int(11) NOT NULL,
  `singerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `username` char(255) NOT NULL,
  `groupID` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `groupID`, `isAdmin`) VALUES
(0, 'wadawslimit@gmail.com', '1234567', 'Usman', 1, 1),
(1, 'usmanyap0301@gmail.com', 'hesoyam', 'usmanyap', 1, 1),
(2, 'usmanyap0301@gmail.com', 'hesoyam', 'usmanyap', 1, 1),
(3, 'wadawslimit@gmail.com', '123456', 'usman', 1, 1),
(4, 'wadawslimit@gmail.com', '123456', 'usman', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`uid`,`songID`),
  ADD KEY `favourites_ibfk_2` (`songID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `singerID` (`singerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupID` (`groupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`songID`) REFERENCES `songs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`singerID`) REFERENCES `singers` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
