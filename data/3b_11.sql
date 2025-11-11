-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3b_11`
--

-- --------------------------------------------------------

--
-- Table structure for table `3b_11_tbl_cart`
--

CREATE TABLE `3b_11_tbl_cart` (
  `perfume_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perfume_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3b_11_tbl_cart`
--

INSERT INTO `3b_11_tbl_cart` (`perfume_user_id`, `user_id`, `perfume_id`, `quantity`) VALUES
(0, 5, 4, 4),
(0, 5, 2, 3),
(0, 6, 3, 1),
(0, 6, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `3b_11_tbl_perfume`
--

CREATE TABLE `3b_11_tbl_perfume` (
  `perfume_id` int(11) NOT NULL,
  `perfume_name` varchar(255) NOT NULL,
  `perfume_description` varchar(2555) NOT NULL,
  `perfume_brand` varchar(255) NOT NULL,
  `perfume_type` varchar(255) NOT NULL,
  `perfume_gender` varchar(255) NOT NULL,
  `perfume_image` varchar(255) NOT NULL,
  `perfume_cost` int(11) NOT NULL,
  `seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3b_11_tbl_perfume`
--

INSERT INTO `3b_11_tbl_perfume` (`perfume_id`, `perfume_name`, `perfume_description`, `perfume_brand`, `perfume_type`, `perfume_gender`, `perfume_image`, `perfume_cost`, `seller`) VALUES
(1, 'Creed Aventus', 'A really strong scent good for the old classic fit. Used for occasions and even casual events.', 'Creed', 'Strong', 'Male', '../3B-11/assets/images/creed-aventus.png', 5600, 3),
(2, 'Virgin Islands', 'A really strong scent good for the old classic fit. Used for occasions and even casual events.', 'Creed', 'Strong', 'Male', '../3B-11/assets/images/creed-virgin-island.png', 5400, 3),
(3, 'Green Irish Tweed', 'Green Irish Tweed is a sophisticated fragrance that evokes the fresh, invigorating scents of the Irish countryside, blending notes of lemon verbena, violet leaves, and sandalwood. Perfect for both casual and formal occasions, this timeless scent exudes elegance and a refined masculine charm.', 'Creed', 'Strong', 'Female', '../3B-11/assets/images/creed-greenirishtweed.png', 6300, 3),
(4, 'Ambre Nuits', 'Ambre Nuit is a luxurious fragrance that combines warm amber with floral and spicy notes, creating a sophisticated and intimate aroma. This moderately strong scent is versatile and suitable for both men and women, making it an elegant choice for various occasions.', 'Dior', 'Strong', 'Male', '../3B-11/assets/images/ambrenuit.png', 5600, 3),
(5, 'Bois D\'argent', 'Bois d\'Argent is an elegant and refined fragrance that blends notes of iris, incense, and honey for a soft, powdery finish. This unisex scent has a moderate strength, offering a subtle yet enduring presence perfect for both men and women.', 'Dior', 'Moderately Strong', 'Female', '../3B-11/assets/images/boisdargent.png', 5300, 3),
(6, 'Dior Griss', 'Dior Gris is a sophisticated fragrance that harmoniously combines floral, woody, and chypre notes, creating a balanced and modern scent. This unisex perfume has a moderate strength, making it an elegant and versatile choice for both men and women.', 'Dior', 'Strong', 'Male', '../3B-11/assets/images/dior-gris.png', 4200, 3),
(7, 'Flowers and Flames', 'Flowers and Flames is a vibrant and dynamic fragrance that blends floral notes with spicy and woody undertones, offering a lively and passionate scent profile. This unisex fragrance has a moderate strength, making it versatile and suitable for both men and women.', 'YSL', 'Strong', 'Female', '../3B-11/assets/images/flowers-flames.png', 4500, 3),
(8, 'Mon Paris', 'Mon Paris is a romantic and vibrant fragrance that combines sweet notes of strawberry, raspberry, and peony with a rich base of patchouli and musk. Designed for women, this scent has a moderate to strong intensity, delivering a bold and enchanting presence.', 'YSL', 'Weak', 'Female', '../3B-11/assets/images/mon-paris.png', 5400, 4),
(9, 'Black Opium', 'Black Opium is a bold and addictive fragrance featuring rich coffee, sweet vanilla, and soft white flowers, creating a seductive and energizing aroma. Designed for women, this scent is strong and long-lasting, making a powerful and memorable impression.', 'YSL', 'Weak', 'Male', '../3B-11/assets/images/black-opium.png', 4200, 4),
(10, 'Bomb Shell Passion', 'Victoria\'s Secret Bombshell Passion is a sultry fragrance that combines notes of white peony, sage, and velvet musk, creating an irresistibly alluring and intimate scent. Designed for women, this perfume has a moderate strength, providing a captivating yet subtle presence.', 'Victorias Secret', 'Weak', 'Female', '../3B-11/assets/images/bombshellpassion.png', 5500, 4),
(11, 'Bomb Shell Seduction', 'Victoria\'s Secret Bombshell Seduction is a vibrant and alluring fragrance that blends notes of juicy cassis, lush peony, and warm rose for a passionate floral bouquet. Designed for women, this scent has a moderate strength, offering a balanced and enchanting presence.', 'Victorias Secret', 'Moderately Strong', 'Male', '../3B-11/assets/images/bombshellseduction.png', 5600, 4),
(12, 'Bomb Shell Intense', 'Victoria\'s Secret Bombshell Intense is a captivating fragrance that features bold notes of cherry, red peony, and vanilla, exuding a rich and sultry allure. Designed for women, this scent has a strong presence, making a striking and memorable impression.', 'Victorias Secret', 'Strong', 'Female', '../3B-11/assets/images/bombshellintense.png', 4123, 4);

-- --------------------------------------------------------

--
-- Table structure for table `3b_11_tbl_perfume_season`
--

CREATE TABLE `3b_11_tbl_perfume_season` (
  `perfume_seasons_id` int(11) NOT NULL,
  `perfume_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3b_11_tbl_perfume_season`
--

INSERT INTO `3b_11_tbl_perfume_season` (`perfume_seasons_id`, `perfume_id`, `season_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 3),
(4, 2, 4),
(5, 3, 1),
(6, 3, 2),
(7, 3, 4),
(8, 4, 1),
(9, 4, 2),
(11, 6, 3),
(12, 6, 4),
(15, 8, 2),
(16, 8, 3),
(17, 9, 1),
(18, 9, 4),
(19, 10, 2),
(20, 10, 3),
(21, 11, 1),
(22, 12, 1),
(23, 12, 2),
(24, 12, 3),
(25, 12, 4),
(26, 5, 2),
(27, 5, 3),
(28, 7, 1),
(29, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `3b_11_tbl_season`
--

CREATE TABLE `3b_11_tbl_season` (
  `season_id` int(11) NOT NULL,
  `season` varchar(255) NOT NULL,
  `season_description` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3b_11_tbl_season`
--

INSERT INTO `3b_11_tbl_season` (`season_id`, `season`, `season_description`) VALUES
(1, 'Spring', 'A perfume for spring blossoms with lively notes of blooming flowers and zesty citrus, embodying the season’s freshness and rebirth. Its light, airy character is perfect for celebrating new beginnings and the vibrant energy of spring.'),
(2, 'Summer', 'Summer perfumes are vibrant and sun-soaked, featuring invigorating blends of tropical fruits and warm, radiant florals. These scents capture the essence of endless sunshine and carefree adventures, making them ideal for the season\'s heat and fun.'),
(3, 'Fall', 'Fall fragrances are warm and earthy, blending spicy, woody notes with rich, golden undertones. They evoke the cozy comfort of falling leaves and crisp air, perfect for embracing the season\'s introspective and comforting ambiance.'),
(4, 'Winter', 'Winter perfumes are deep and enveloping, with notes of rich spices, dark woods, and creamy vanillas. They provide a sense of warmth and elegance against the season’s chill, ideal for cozy evenings and festive celebration.');

-- --------------------------------------------------------

--
-- Table structure for table `3b_11_tbl_users`
--

CREATE TABLE `3b_11_tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `3b_11_tbl_users`
--

INSERT INTO `3b_11_tbl_users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Jervie', 'Akia', 'admin1', '$2y$10$nDRVwQ1DPH/4.7V5vYUR8OgneDZLUWg/Cbx8z1Rxd4sT1ihw61Loi', 'administrator'),
(2, 'Mark', 'Dulnuan', 'admin2', '$2y$10$5EFUytdYJIDJW55Tfaed4.8wDChE3mGe4zaeYdeZu3AEYW9MEsFM6', 'administrator'),
(3, 'John', 'Doe', 'seller1', '$2y$10$jeX9.RzNAPHHaUjzbgPqUetXmI61d.M381AvgsLnUmurFGkH9aAGq', 'seller'),
(4, 'Jane', 'Doe', 'seller2', '$2y$10$ky6RtTMLQhtolxoqSU2bNOEDKtfoPBdp/BYn5mF1C4r4SP8Y9GnsO', 'seller'),
(5, 'Hilton', 'Dulnuan', 'buyer1', '$2y$10$WVfSjapjb96Cu7.IavcKCu0AF9WDQS1zKBrl9iocdDbCj4KviaBfq', 'buyer'),
(6, 'Jerbon', 'Akia', 'buyer2', '$2y$10$4CAkl6REEpUk2huOrqid5u6u7n9zAaDSZmFU9SrMGvjZkgamtcKJy', 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3b_11_tbl_cart`
--
ALTER TABLE `3b_11_tbl_cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `perfume_id` (`perfume_id`);

--
-- Indexes for table `3b_11_tbl_perfume`
--
ALTER TABLE `3b_11_tbl_perfume`
  ADD PRIMARY KEY (`perfume_id`);

--
-- Indexes for table `3b_11_tbl_perfume_season`
--
ALTER TABLE `3b_11_tbl_perfume_season`
  ADD PRIMARY KEY (`perfume_seasons_id`),
  ADD KEY `perfume_id` (`perfume_id`),
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `3b_11_tbl_season`
--
ALTER TABLE `3b_11_tbl_season`
  ADD PRIMARY KEY (`season_id`);

--
-- Indexes for table `3b_11_tbl_users`
--
ALTER TABLE `3b_11_tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3b_11_tbl_perfume`
--
ALTER TABLE `3b_11_tbl_perfume`
  MODIFY `perfume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `3b_11_tbl_perfume_season`
--
ALTER TABLE `3b_11_tbl_perfume_season`
  MODIFY `perfume_seasons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `3b_11_tbl_season`
--
ALTER TABLE `3b_11_tbl_season`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `3b_11_tbl_users`
--
ALTER TABLE `3b_11_tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `3b_11_tbl_cart`
--
ALTER TABLE `3b_11_tbl_cart`
  ADD CONSTRAINT `3b_11_tbl_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `3b_11_tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `3b_11_tbl_cart_ibfk_2` FOREIGN KEY (`perfume_id`) REFERENCES `3b_11_tbl_perfume` (`perfume_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `3b_11_tbl_perfume_season`
--
ALTER TABLE `3b_11_tbl_perfume_season`
  ADD CONSTRAINT `3b_11_tbl_perfume_season_ibfk_1` FOREIGN KEY (`perfume_id`) REFERENCES `3b_11_tbl_perfume` (`perfume_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `3b_11_tbl_perfume_season_ibfk_2` FOREIGN KEY (`season_id`) REFERENCES `3b_11_tbl_season` (`season_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
