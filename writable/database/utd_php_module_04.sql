-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2024 at 01:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utd_php_module_04`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `isbn_13` varchar(13) NOT NULL,
  `series_name` varchar(255) DEFAULT NULL,
  `series_volume` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `language`, `isbn_13`, `series_name`, `series_volume`, `quantity`, `cover_image`) VALUES
(1, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Fábula', 'Português', '9788572327812', NULL, NULL, 10, 'https://upload.wikimedia.org/wikipedia/pt/thumb/4/47/O-pequeno-pr%C3%ADncipe.jpg/200px-O-pequeno-pr%C3%ADncipe.jpg'),
(2, 'O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R. Tolkien', 'Fantasia', 'Inglês', '9788578270697', 'O Senhor dos Anéis', 1, 2, 'https://upload.wikimedia.org/wikipedia/pt/2/26/Asociedadedoanel.jpg'),
(3, 'Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Fantasia', 'Português', '9788532530784', 'Harry Potter', 1, 15, 'https://upload.wikimedia.org/wikipedia/pt/thumb/c/c1/Capa_HP1.jpg/230px-Capa_HP1.jpg'),
(4, 'A Revolução dos Bichos', 'George Orwell', 'Fábula', 'Português', '9788535914849', NULL, NULL, 8, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Animal_Farm_-_1st_edition.jpg/230px-Animal_Farm_-_1st_edition.jpg'),
(5, 'Dom Casmurro', 'Machado de Assis', 'Romance', 'Português', '9788538071650', NULL, NULL, 12, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/DomCasmurroMachadodeAssis.jpg/240px-DomCasmurroMachadodeAssis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `is_returned` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `loan_date`, `return_date`, `is_returned`) VALUES
(7, 3, 1, '2024-03-08', '2024-03-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'Comum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'Administrador', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador'),
(3, 'Usuário', 'user@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Comum'),
(10, 'Maria', 'maria@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Comum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
