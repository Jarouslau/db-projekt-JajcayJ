-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 03. kvě 2024, 19:45
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `jajcay`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `obrazok` blob DEFAULT NULL,
  `latka` varchar(255) DEFAULT 'polyester'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `products`
--

INSERT INTO `products` (`id`, `nazov`, `cena`, `kategoria`, `obrazok`, `latka`) VALUES
(1, 'Bob A Bobek Sportuju', 10.99, 'Ponožky', 0x68747470733a2f2f7777772e667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f323038382d626f622d612d626f62656b2d73706f7274756a752d312e6a7067, 'vlna'),
(2, 'Lietam V Tom', 9.50, 'Ponožky', 0x68747470733a2f2f7777772e667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f323036372d6c696574616d2d762d746f6d2d312e6a7067, 'vlna'),
(3, 'Caukymnauky', 8.25, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f303932395f6361756b796d6e61756b695f312e6a7067, 'vlna'),
(4, 'Frajeri', 12.00, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f303636375f6672616a6572695f315f332e6a7067, 'vlna'),
(5, 'Sachmat', 15.99, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f313438312d706f6e6f7a6b792d667573616b6c652d736163686d61742d315f342e6a7067, 'vlna'),
(6, 'Vino', 11.20, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f313034395f76696e6f5f312e6a7067, 'polyester'),
(7, 'Medved Tatransky', 7.30, 'Ponožky', 0x68747470733a2f2f7777772e667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f313832392d6d65647665642d74617472616e736b792d3173722e6a7067, 'polyester'),
(8, 'Ceresnik', 14.45, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f303931395f63657265736e696b5f315f342e6a7067, 'polyester'),
(9, 'Vysoke Tatry', 6.75, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f303135345f7679736f6b655f74617472795f312e6a7067, 'polyester'),
(10, 'Matko A Kubko', 13.50, 'Ponožky', 0x68747470733a2f2f667573616b6c652e736b2f75706c6f6164732f696d6167655f62616e6b2f303532325f6d61746b6f5f615f6b75626b6f5f315f315f322e6a7067, 'polyester');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(34, 'adsjdad', '$2y$10$8ihnlvl3iRmI797avcnute6qzkXp7F2hxjpYf7XK7m0uSpihDf7py', ''),
(36, 'Bratislava', '$2y$10$3H5W9Ko0G0o636s1UaE1FO9C/HMDH7hLbfOjHM6JrkunhhuxcOudO', ''),
(38, 'pennn', '$2y$10$fFL5/5uusMJ/MEQzaf9EeutFWZNc0mJWKopCjLefNawI2SnJaP7AS', ''),
(40, 'Bernolakovo', '$2y$10$Q7fH8u1qJGO53GDSULJWWOKOMgTF9BLT8it6TfSPjhtaqWu3/vm3O', ''),
(41, 'LEN', '$2y$10$naWDENwG3/E81.PgAocEteP/Sf6G1dwKFwFSncnrQX6zcmrcLkjjS', ''),
(42, 'jaro', '$2y$10$g.We6KMXu1vBGg94Cj/n2ugx/HR4RJiZFusLquGw9jc0PSxA8.h06', '');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
