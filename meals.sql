-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2023 at 10:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`price`, `description`, `meal_id`, `name`) VALUES
(120, ' A savory and sweet pastry made with layers of thin phyllo dough, chicken, almonds, and cinnamon.', 4, ' Chicken Pastilla'),
(20, 'A hearty soup made with lentils, chickpeas, tomatoes, and spices, often served during Ramadan.', 3, ' Harira Soup'),
(30, 'A salad made with roasted eggplant, tomatoes, garlic, and spices, often served as an appetizer or side dish.', 5, ' Zaalouk Salad'),
(100, 'A classic Moroccan dish made with meat, vegetables, and spices cooked in a conical clay pot called a tagine.', 1, 'Chicken Tagine'),
(80, 'A North African dish made with steamed semolina grains, vegetables, and a variety of meats or fish.', 2, 'Vegetable Couscous');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
