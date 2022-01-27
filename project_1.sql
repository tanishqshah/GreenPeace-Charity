-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 07:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `charities`
--

CREATE TABLE `charities` (
  `id` int(11) NOT NULL,
  `founder` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `purpose` text NOT NULL,
  `cover` varchar(80) NOT NULL,
  `u_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charities`
--

INSERT INTO `charities` (`id`, `founder`, `name`, `purpose`, `cover`, `u_name`) VALUES
(14, 'Banjo', 'Banjo', 'Caerphilly cream cheese the big cheese. Cow lancashire pecorino gouda dolcelatte red leicester bocconcini cheese on toast. Macaroni cheese chalk and c', 'chad-madden-YF4qTRQ2E28-unsplash.jpg', 'Sahil'),
(16, 'Sonia', 'Awaaz', 'Lancashire cream cheese cream cheese. Who moved my cheese camembert de normandie manchego smelly cheese stilton macaroni cheese monterey jack pepper j', 'tianqi-zhang-Dp6Y9fs_jW8-unsplash.jpg', 'Sahil'),
(19, 'armin', 'Brian', 'Ricotta brie babybel. Who moved my cheese halloumi smelly cheese blue castello edam cheese and wine cow red leicester. Cow brie stinking bishop bavari', 'steve-halama-_ip-XbaLBPs-unsplash.jpg', 'Sahil'),
(20, 'rashi', 'Pyaas', 'This is charity aiming to save water', 'eberhard-grossgasteiger-vRuVIv6KrVA-unsplash.jpg', 'Sahil'),
(25, 'jaden', 'adscbdc', 'sac asjdcadoscdscjasdj', 'chris-holgersson-zshyCr6HGw0-unsplash.jpg', 'Sahil'),
(26, 'amit', 'Save Water', 'To Save Water', 'raphael-schaller-ylQBibJByto-unsplash.jpg', 'Sahil');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_amount` int(20) NOT NULL,
  `d_purpose` text NOT NULL,
  `d_date` datetime NOT NULL DEFAULT current_timestamp(),
  `d_addr` varchar(120) NOT NULL,
  `d_cell` bigint(20) NOT NULL,
  `d_pay` varchar(10) NOT NULL,
  `d_paytype` varchar(10) NOT NULL,
  `founder` varchar(50) NOT NULL,
  `u_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`d_id`, `d_name`, `d_amount`, `d_purpose`, `d_date`, `d_addr`, `d_cell`, `d_pay`, `d_paytype`, `founder`, `u_name`) VALUES
(16, 'Sahil', 1000000, 'Ricotta brie babybel. Who moved my cheese halloumi smelly cheese blue castello edam cheese and wine cow red leicester. Cow brie stinking bishop bavari', '2021-06-03 10:31:19', 'Goa', 9213427555, 'Paid', 'Cheque', 'armin', 'sonia'),
(17, 'Diksha Harjai', 180000, 'Ricotta brie babybel. Who moved my cheese halloumi smelly cheese blue castello edam cheese and wine cow red leicester. Cow brie stinking bishop bavari', '2021-06-03 10:35:22', 'Delhi', 9811459855, 'Paid', 'UPI', 'armin', 'lalit'),
(18, 'Sonia', 18000, 'Caerphilly cream cheese the big cheese. Cow lancashire pecorino gouda dolcelatte red leicester bocconcini cheese on toast. Macaroni cheese chalk and cheese the big cheese the big cheese boursin cheese on toast goat cheese strings. Queso cheeseburger camembert de normandie hard cheese everyone loves queso bocconcini cottage cheese. Goat babybel lancashire cauliflower cheese.', '2021-06-03 12:49:10', 'Kerala', 9833214555, 'Unpaid', 'Cheque', 'Bluth', 'sonia'),
(20, 'Vineet', 20000, 'Lancashire cream cheese cream cheese. Who moved my cheese camembert de normandie manchego smelly cheese stilton macaroni cheese monterey jack pepper j', '2021-06-03 20:11:27', 'Delhi', 9213425532, 'Paid', 'Cheque', 'Sonia', 'armin'),
(23, 'Rashi Kumar luthra', 100000, 'Ricotta brie babybel. Who moved my cheese halloumi smelly cheese blue castello edam cheese and wine cow red leicester. Cow brie stinking bishop bavari', '2021-06-03 21:23:31', 'Delhi', 9811817555, 'Paid', 'Cheque', 'armin', 'rashi'),
(24, 'Diksha Harjai', 90000, 'Ricotta brie babybel. Who moved my cheese halloumi smelly cheese blue castello edam cheese and wine cow red leicester. Cow brie stinking bishop bavari', '2021-06-03 21:35:19', 'Delhi', 9811834567, 'Paid', 'Cheque', 'armin', 'diksha'),
(27, 'Rahul Singh Kalra Singh', 1000, 'Caerphilly cream cheese the big cheese. Cow lancashire pecorino gouda dolcelatte red leicester bocconcini cheese on toast. Macaroni cheese chalk and c', '2021-06-04 02:50:17', 'Jammu', 9213485832, 'Paid', 'UPI', 'Banjo', 'armin'),
(28, 'Sahil', 234, 'Caerphilly cream cheese the big cheese. Cow lancashire pecorino gouda dolcelatte red leicester bocconcini cheese on toast. Macaroni cheese chalk and c', '2021-06-05 11:55:59', 'sad', 9213427189, 'Paid', 'Cash', 'Banjo', 'armin'),
(29, 'Shanu Kumar', 10, 'Ricotta brie babybel. Who moved my cheese halloumi smelly cheese blue castello edam cheese and wine cow red leicester. Cow brie stinking bishop bavari', '2021-06-20 12:56:55', 'Mumbai', 9822418555, 'Unpaid', 'Cheque', 'armin', 'amit'),
(30, 'Brie Larson', 100000, 'Caerphilly cream cheese the big cheese. Cow lancashire pecorino gouda dolcelatte red leicester bocconcini cheese on toast. Macaroni cheese chalk and c', '2021-06-20 12:58:13', 'Kakrola Mod, Delhi', 9234156743, 'Unpaid', 'Cheque', 'Banjo', 'amit'),
(31, 'Vihaan Jangid', 100, 'TO SAVE THE BIRDS OF NATURE WHO KEEP OUR ECOSYSTEM ALIVE WITH THEIR SWEET PRESENCE ', '2021-06-20 13:01:04', 'Delhi', 9213256213, 'Paid', 'Cheque', 'amit', 'amit'),
(32, 'Sahil', 1, 'This is charity aiming to save water', '2021-07-10 15:06:43', 'Mumbai', 9811319255, 'Unpaid', 'Others', 'rashi', 'gaurav'),
(33, 'Gillian', 5000, 'Caerphilly cream cheese the big cheese. Cow lancashire pecorino gouda dolcelatte red leicester bocconcini cheese on toast. Macaroni cheese chalk and c', '2021-08-15 13:25:37', 'Delhi', 9234185298, 'Paid', 'Cheque', 'Banjo', 'jaden'),
(34, 'aldjc', 2525432, 'Lancashire cream cheese cream cheese. Who moved my cheese camembert de normandie manchego smelly cheese stilton macaroni cheese monterey jack pepper j', '2021-08-15 14:01:10', 'wjebjcb', 8542314999, 'Unpaid', 'Cheque', 'Sonia', 'jaden');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `dt`) VALUES
(11, 'Tanishq', 'Tanishq123', '2021-05-15 00:40:35'),
(14, 'sonia', 'Sonia123', '2021-06-03 13:52:34'),
(16, 'diksha', 'Diksha123', '2021-06-03 21:33:02'),
(21, 'paritosh', 'Paritosh123', '2021-08-15 15:27:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charities`
--
ALTER TABLE `charities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charities`
--
ALTER TABLE `charities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
