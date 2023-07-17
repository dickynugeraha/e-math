-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 01:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembelajaran_matematika`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `correct` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `quizId`, `a`, `b`, `c`, `d`, `correct`, `description`) VALUES
(1, 1, '90 cm', '100 cm', '80 cm', '625 cm', 'b', 'Rumus keliling persegi adalah 4 * Sisi\\nSehingga, 4 * 25cm = 100 cm\\nDan jawaban yang benar adalah B'),
(2, 2, '1331cm3', '44cm3', '121cm3', '22cm3', 'a', 'Menghitung Volume\\nV = s3\\nV = (11cm)3\\nV = 1331cm3\\nJadi , Luas kubus adalah 726cm2 dan volume kubus adalah 729 cm3'),
(3, 3, '2340cm3', '6390cm3', '144cm3', '2023cm3', 'b', 'Rumus volume tabung adalah\\nV = π r2 t\\nV = 22/7 × (21cm)2 × 5cm\\nV = 6390cm3\\nJadi tabung tersebut memiliki luas permukaan 3432cm2 dan volume tabung 6390cm3.'),
(4, 4, '336cm2', '22cm2', '222cm2', '292cm2', 'd', 'Menghitung luas permukaan balok\\nL = 2 × (p×l + p×t + l×t)\\nL = 2 × (6cm × 7cm + 6cm × 8cm + 7cm × 8cm)\\nL = 2 × (42cm2 + 48cm2 + 56cm2)\\nL = 2 × 146cm2\\nL = 292cm2'),
(5, 5, '29cm3', '64cm3', '36cm3', '48cm3', 'b', 'Menghitung volume limas\\nV = ⅓ × Lalas × tLimas\\nV = ⅓ × 64cm2 × 3cm = 64cm3'),
(6, 6, '100cm2', '609cm2', '3300cm2', '50cm2', 'c', 'Luas Permukaan Kerucut = Luas Bidang Alas + Luas Selimut\\nL = πr2 + πrs\\nL = π r (r + s)\\nL = 22/7 × 21cm × (21cm + 29cm)\\nL = 22 × 3cm × 50cm = 3300cm2'),
(7, 7, '100cm2', '5cm2', '15 cm2', '50 cm²', 'd', 'Cara Menghitung Luas Persegi Panjang\\nL = p × l\\nL = 10 × 5\\nL = 50 cm²\\nJadi, luas persegi panjang tersebut adalah 50 cm².'),
(8, 8, '35 cm²', '17 cm2', '70 cm2', '3cm2', 'a', 'L = ½ × a × t\\nL = ½ × 10 × 7\\nL = ½ × 70\\nL = 35 cm²'),
(9, 9, '12 cm', '32 cm', '4 cm', '16 cm', 'b', 'Cara Menghitung Keliling Belah Ketupat\\nK = 4 × s\\nK = 4 × 8\\nK = 32 cm\\nJadi, keliling belah ketupat tersebut adalah 32 cm.'),
(10, 10, '22 cm2', '17 cm2', '154 cm2', '49 cm2', 'c', 'L = π × r²\\nL = 22/7 × 7²\\nL = 22/7 × 49\\nL = 154 cm²\\nJadi, luas lingkaran tersebut adalah 154 cm².'),
(11, 12, 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/5c/Kerucut.JPG/220px-Kerucut.JPG', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png', 'c', ''),
(12, 13, 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png', 'https://rumuspintar.com/wp-content/uploads/2019/07/Belah-Ketupat.jpg', 'a', ''),
(13, 12, 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/5c/Kerucut.JPG/220px-Kerucut.JPG', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png', 'c', ''),
(14, 13, 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png', 'https://rumuspintar.com/wp-content/uploads/2019/07/Belah-Ketupat.jpg', 'a', ''),
(15, 14, 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/5c/Kerucut.JPG/220px-Kerucut.JPG', 'https://rumuspintar.com/wp-content/uploads/2019/07/Belah-Ketupat.jpg', 'b', NULL),
(16, 15, 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://rumuspintar.com/wp-content/uploads/2019/07/Belah-Ketupat.jpg', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png', 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG', 'c', NULL),
(17, 16, 'https://rumuspintar.com/wp-content/uploads/2019/07/Belah-Ketupat.jpg', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/5c/Kerucut.JPG/220px-Kerucut.JPG', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png', 'a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `type`, `question`, `img`) VALUES
(1, 'persegi', 'Berapakah luas keliling dari persegi ABCD, jika diketahui panjang sisinya adalah 25 cm', 'https://www.advernesia.com/wp-content/uploads/2018/10/Sudut-persegi.png'),
(2, 'kubus', 'Diketahui ada sebuah kubus dengan Panjang rusuk sepanjang 11 cm . berapakah  volume kubus tersebut ?', 'https://cdn0-production-images-kly.akamaized.net/PjlWbK0Q83FDiUQtaoqXq058964=/640x640/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3518168/original/026826900_1626957470-KUBUSSS.jpg'),
(3, 'tabung', 'Sebuah tabung memiliki jari-jari 21 cm dan tinggi 5 cm, berapakah volume tabung tersebut?', 'https://asset-a.grid.id//crop/0x0:0x0/700x0/photo/2022/03/29/tabungjpeg-20220329043914.jpeg'),
(4, 'balok', 'Diketahui sebuah balok berukuran Panjang 6 cm , lebar 7 cm , dan tinggi 8 cm. berapakah luas permukaan balok tersebut?', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Cuboid_simple.svg/1200px-Cuboid_simple.svg.png'),
(5, 'limas', 'Diketahui sebuah limas setinggi 3 cm memiliki alas berbentuk persegi yang Panjang rusuk alasnya adalah 8cm . jika sisi tegak limas adalah 5 cm , hitung lah volume limas?', 'https://core-ruangguru.s3.amazonaws.com/assets/ruang_belajar/questions/q_h79scl5077.PNG'),
(6, 'kerucut', 'Diketahui sebuah kerucut memiliki jari – jari alas 21 cm dan Panjang  garis pelukis 29 cm. hitung lah luas permukaan!', 'https://upload.wikimedia.org/wikipedia/id/thumb/5/5c/Kerucut.JPG/220px-Kerucut.JPG'),
(7, 'persegi panjang', 'Sebuah persegi Panjang memiliki ukuran Panjang 10 cm dan lebar 5 cm . berapa luas persegi Panjang tersebut ?', 'https://pict.sindonews.net/dyn/620/pena/news/2022/09/21/212/891055/rumus-luas-persegi-panjang-beserta-cara-menghitung-dan-contoh-soalnya-fds.jpg'),
(8, 'segitiga', 'Sebuah segitiga memiliki sisi alas 10 cm,  dan tinggi 7 cm. ukuran sisi miring nya 8cm dan 9cm . berapa luas segitiga tersebut ? ', 'https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1616065047/seaqcrd8h0wlfbc0gkyx.jpg'),
(9, 'belah ketupat', 'Sebuah belah ketupat memiliki diagonal 10 cm dan 14 cm . Panjang sisi nya 8 cm. berapa keliling belah ketupat tersebut ?', 'https://rumuspintar.com/wp-content/uploads/2019/07/Belah-Ketupat.jpg'),
(10, 'lingkaran', 'Sebuah lingkaran memiliki jari -jari 7 cm . berapa luas lingkaran tersebut ?', 'https://blue.kumparan.com/image/upload/v1642575394/jsb1x9fwcjndcjv3bbej.png'),
(11, 'jajar genjang', 'Sebuah jajar genjang memiliki alas yang Panjang 12 cm dan tinggi 5 cm . berapa luas jajargenjang tersebut ? ', 'https://asset.kompas.com/data/photo/2021/03/01/603d0e8e21660.png'),
(12, 'tebak_gambar', 'Yang manakah disebut dengan Kerucut?', ''),
(13, 'tebak_gambar', 'Coba tebak, yang manakah bangun ruang bernama limas?', ''),
(14, 'tebak_gambar', 'Tebaklah, mana yang disebut dengan tabung?', ''),
(15, 'tebak_gambar', 'Bangun datar mana yang dinamakan jajar genjang?', ''),
(16, 'tebak_gambar', 'Bangun datar mana yang dinamakan belah ketupat?', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `child_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_name`, `child_name`, `email`, `password`) VALUES
(1, 'Ade', 'Rafif Harmanto', 'ade@gmail.com', '$2y$10$dI1IaBMm1MoFKOr8qnycMOUAIBi1MdDo1RAeMdvWWbkalvmZT2I66'),
(2, 'Yanto', 'Rizki', 'yanto@gmail.com', '$2y$10$YZoiTFfDzyJcY25OYgeO.eRTW7PEmSOIl3pl2J56KNdtS11GQ/sW2'),
(3, 'Ade', 'Rafif Harmanto', 'iq@dev.com', '$2y$10$7gcSDyp2a65/fpBE2fdDQ.DEFUb8v3t/BFu04ATcGBMq3p6ioxNsW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizId` (`quizId`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
