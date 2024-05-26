-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 08:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookflixdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `bid` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`bid`, `name`, `title`, `price`, `category`, `description`, `image`, `date`) VALUES
(72, 'Atomic Habits', 'James C', '699', 'knowledge', 'Her imaginative childrens books feature many natural animals that can be found in the British countryside', 'ah.png', '2023-02-23 13:14:49'),
(81, 'Darwin', 'Darwin D.', '469', 'knowledge', 'Beatrix Potter ', 'sddxc.jpg', '2023-02-24 10:54:38'),
(83, 'Capture The Crown ', 'Jennifer E.', '633', 'Magic', 'From the author of The Witch Boy trilogy comes a graphic novel about family, romance, and first love', 'gf.jpg', '2023-02-24 10:56:14'),
(84, 'Crush The King ', 'Jennifer L', '566', 'knowledge', 'These stories are carefully chosen to highlight the power of the gods and how sometimes the demons challenge it. The stories are narrated in a way that would be suitable for children and ensures small moral lessons in each story. Children will learn that there are no short cuts to success, and our confidence is our biggest super power.', 'uuh.jpg', '2023-02-24 10:58:12'),
(85, 'Stephen King', 'Carre', '545', 'Adventure', 'The political struggle in the ancient city of Hastinapur is escalating as the Pandavas and Kauravas are on the verge of war. But its the rise of the demonic Asura King, Mahendrasura, that most troubles Krishna. Fueled by vengeance, Mahendrasura is not looking to just win a battle. Instead, he in search of dark powers to eradicate humanity once and for all.', 'FGGH.jpg', '2023-02-24 10:58:53'),
(86, 'The Winter King', 'Christ C', '65', 'knowledge', 'Trapped in an era beyond his wildest dreams, Abhay has managed to land right in the middle of all these conflicts. Along with Krishna and Suryaputra Karna, the responsibility to save the past, the present, and the future of mankind has fallen on Abhays shoulders. And for that, he must unlock ancient puzzles, encounter mythical beasts - and confront his terrifying destiny!', 'ghfh.jpg', '2023-02-24 10:59:29'),
(88, 'Ray Bearer', 'Jordan I.', '999', 'Magic', 'Once upon a time there were four little Rabbits, and their names were -- ', 'jjj.jpg', '2023-02-24 11:05:00'),
(89, 'The Sea Girl', 'Adriene ', '699', '', 'From the authovel about family, romance, and first love. ', 'jhj.jfif', '2023-02-24 11:07:51'),
(90, 'Love Boat', 'Abile Hing', '499', 'Adventure', 'Feel the power of strength and banding together come alive through the celebration of our very own female animal characters in Lili the Lioness & Friends. Written, designed and produced in-house, this impactful read highlights the importance of community ', 'jkkj.jpg', '2023-02-24 11:25:52'),
(93, 'Seventh Sun', ' Lani Forbes', '560', 'Magic', 'The terrible Asuras are pretty notorious. These demons have decided to spread chaos across the world and win over heaven. Here comes an Asura trying to kidnap mother Earth', 'kjljl.jpg', '2023-02-24 11:55:58'),
(94, 'Sunrise', 'Jhon D', '800', 'Magic', 'Charming but venturesome college student, Abhay Sharma, always thought the Mahabharata was just a story; until he set out to explore the secrets of an ancient temple – and finds himself transported five thousand years back in time!', 'hujh.jpg', '2023-02-24 11:57:02'),
(95, 'Batman Knight', 'DC', '789', 'Adventure', 'This collection of adorable stories for children show us how the Asuras tried to defeat the Devas, and how the gods ultimately won over. These stories will entertain, educate and provide healthy enjoyment to the readers.', 'kjkjl.jpg', '2023-02-24 11:59:54'),
(96, 'Last Blood ', 'Alexander G', '500', '', 'The political struggle in the ancient city of Hastinapur is escalating as the Pandavas and Kauravas are on the verge of war. But its the rise of the demonic Asura King, Mahendrasura, that most troubles Krishna. Fueled by vengeance, Mahendrasura is not looking to just win a battle. Instead, he in search of dark powers to eradicate humanity once and for all.', 'hjhj.jpg', '2023-02-24 12:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `book_id` int(20) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(25) NOT NULL,
  `quantity` int(25) NOT NULL,
  `total` double(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `book_id`, `user_id`, `name`, `price`, `image`, `quantity`, `total`, `date`) VALUES
(162, 96, 51, 'Last Blood ', 499, 'hjhj.jpg', 3, 1.00, '2023-03-10 14:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order`
--

CREATE TABLE `confirm_order` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `total_books` varchar(500) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending',
  `date` varchar(20) NOT NULL,
  `total_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_order`
--

INSERT INTO `confirm_order` (`order_id`, `user_id`, `name`, `email`, `number`, `address`, `payment_method`, `total_books`, `order_date`, `payment_status`, `date`, `total_price`) VALUES
(31, 51, 'rtyrty', 'pawan@gmail.coma', 0, 'yey, brtb, hrthgeg,  6ygege - 6546', 'cash on delivery', ' pawan #46,(1)  yukuyk #44,(1)  sdfsd #54,(1) ', '24-Feb-2023', 'completed', '24.02.2023', 7102.00),
(32, 51, 'dsdd', 'pawan@gmail.coma', 2147483647, 'hrthgerg, 747hfh, brt,  ygege - 6546', 'Debit card', ' iuji #89,(1)  Ray Bearer #88,(1) ', '24-Feb-2023', 'completed', '10.03.2023', 6424.00);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `number` int(20) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `user_id`, `name`, `email`, `number`, `msg`, `date`) VALUES
(6, 51, 'pawan ', 'pawan@gmail.com', 2147483647, 'MOST DANGEROUS GAME AND OTHER STORIES OF ADVENTURE, THE \r\n\r\nis there availability', '2023-02-23 13:41:50'),
(7, 51, 'dfbgf', 'hdgfh@vszv', 0, 'dh', '2023-02-23 13:47:26'),
(8, 51, 'sv', 'jisaxih205@minterp.c', 0, 'xhf', '2023-02-23 13:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(225) NOT NULL,
  `user_id` int(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `book` varchar(50) NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `city`, `state`, `country`, `pincode`, `book`, `unit_price`, `quantity`, `sub_total`, `payment_status`) VALUES
(0, 51, 'yey', '747hfh', 'eyy', 'tutututu', 6546, 'yukuyk', 56778.00, 1, 56778.00, 'completed'),
(0, 51, 'yey', '747hfh', 'eyy', 'tutututu', 6546, 'Don Quixote by Migue', 2555.00, 6, 15330.00, 'pending'),
(0, 51, 'yey', 'yery', 'eyy', 'erge', 0, 'yukuyk', 56778.00, 1, 56778.00, 'pending'),
(0, 51, 'hrth', 'hrt', 'hrth', ' 6y', 0, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(0, 51, 'hrthgerg', 'hrtgeg', 'hrthgeg', ' 6ygege', 0, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(0, 51, 'hrthgerg', '747hfh', 'hgfyj', ' 6ygege', 0, 'fhb', 5124.00, 1, 5124.00, 'pending'),
(0, 51, 'yey', 'yery', 'hgfyj', 'erge', 0, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(0, 51, '4747', '747hfh', 'hrthgeg', 'tutututu', 6546, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(0, 51, '4747', '747hfh', 'hrthgeg', 'tutututu', 6546, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(0, 51, 'hrthgerg', '747hfh', 'eyy', 'wfrwerfw', 0, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(21, 51, '4747', '747hfh', 'hgfyj', 'yey', 6546, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(21, 51, '4747', '747hfh', 'hgfyj', 'yey', 6546, 'yukuyk', 56778.00, 1, 56778.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'grwe', 45.00, 1, 45.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'yukuyk', 56778.00, 1, 56778.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'pawan', 4141471.00, 1, 4141471.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'pawan', 25252.00, 1, 25252.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'fhb', 5124.00, 1, 5124.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'Don Quixote by Migue', 2000.00, 1, 2000.00, 'pending'),
(24, 51, 'hrthgerg', '747hfh', 'eyy', 'tutututu', 6546, 'Don Quixote by Migue', 2555.00, 1, 2555.00, 'pending'),
(25, 51, 'f3f3', 'f34f', 'f3f', 'f3f', 0, 'pawan', 122.00, 1, 122.00, 'pending'),
(26, 51, 'brtbr', 'brtb', 'brt', 'bb', 0, 'pawan', 4141471.00, 1, 4141471.00, 'pending'),
(27, 51, 'nttnnht', 'nfnfghn', 'nghngh', 'ghng', 0, 'pawan', 122.00, 1, 122.00, 'pending'),
(27, 51, 'nttnnht', 'nfnfghn', 'nghngh', 'ghng', 0, 'yukuyk', 6545.00, 1, 6545.00, 'pending'),
(27, 51, 'nttnnht', 'nfnfghn', 'nghngh', 'ghng', 0, 'yukuyk', 56778.00, 1, 56778.00, 'pending'),
(28, 51, 'wtwtw', 'twet', 'wtwet', 'twet', 0, 'pawan', 122.00, 4, 488.00, 'pending'),
(29, 51, 'hrthgerg', '747hfh', 'hrthgeg', 'tutututu', 6546, 'Don Quixote by Migue', 2000.00, 1, 2000.00, 'pending'),
(29, 51, 'hrthgerg', '747hfh', 'hrthgeg', 'tutututu', 6546, 'v xvx', 45645.00, 1, 45645.00, 'pending'),
(29, 51, 'hrthgerg', '747hfh', 'hrthgeg', 'tutututu', 6546, 'fhb', 5124.00, 4, 20496.00, 'pending'),
(30, 51, 'hrthgerg', 'hrtgeg', 'hrthgeg', '85*94', 0, 'v xvx', 45645.00, 1, 45645.00, 'pending'),
(30, 51, 'hrthgerg', 'hrtgeg', 'hrthgeg', '85*94', 0, 'pawan', 122.00, 1, 122.00, 'pending'),
(31, 51, 'yey', 'brtb', 'hrthgeg', ' 6ygege', 6546, 'pawan', 122.00, 1, 122.00, 'pending'),
(31, 51, 'yey', 'brtb', 'hrthgeg', ' 6ygege', 6546, 'yukuyk', 6545.00, 1, 6545.00, 'pending'),
(31, 51, 'yey', 'brtb', 'hrthgeg', ' 6ygege', 6546, 'sdfsd', 435.00, 1, 435.00, 'pending'),
(32, 51, 'hrthgerg', '747hfh', 'brt', ' ygege', 6546, 'iuji', 5425.00, 1, 5425.00, 'pending'),
(32, 51, 'hrthgerg', '747hfh', 'brt', ' ygege', 6546, 'Ray Bearer', 999.00, 1, 999.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `Id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`Id`, `name`, `surname`, `email`, `password`, `user_type`) VALUES
(51, 'pawan', 'pawan', 'pawan@gmail.com', '12345678', 'User'),
(52, 'pawan111', 'pawan111', 'pawan@gmail.com1', '12345678', 'Admin'),
(53, 'pawan', 'pawan', 'pawan@gmail.coma', '12345678', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_order`
--
ALTER TABLE `confirm_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_info`
--
ALTER TABLE `book_info`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `confirm_order`
--
ALTER TABLE `confirm_order`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
