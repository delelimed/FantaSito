-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 07:35 PM
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
-- Database: `fantasito`
--

--
-- Dumping data for table `fs_impostazioni`
--

INSERT INTO `fs_impostazioni` (`id`, `nome_impostazione`, `valore`) VALUES
(24, 'prezzo_massimo', '99'),
(25, 'numero_educatori', '4'),
(26, 'consenti_cambio', '1'),
(29, 'Key_Att', 'HGUWY-OPFNH-VYOGO-ZKKVX'),
(30, 'machine_code', '289jf2afs3');

--
-- Dumping data for table `fs_users`
--

INSERT INTO `fs_users` (`id`, `utente`, `nome`, `cognome`, `password`, `admin`) VALUES
(1, '123', 'Ciao', '123', '$2y$15$3A9bAnLe9IzuK0FTbSJKpe0NWxzbaCXp9mA0jiihwFRBJX4kH150K', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
