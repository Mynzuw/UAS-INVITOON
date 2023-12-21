-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Des 2023 pada 23.33
-- Versi server: 5.7.24
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invitoon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chapter`
--

CREATE TABLE `chapter` (
  `komik_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `no_chapter` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chapter`
--

INSERT INTO `chapter` (`komik_id`, `chapter_id`, `no_chapter`, `likes`) VALUES
(1, 10001, 1, 20),
(1, 10002, 2, 13),
(1, 10003, 3, 16),
(2, 20001, 1, 12),
(5, 50001, 1, NULL),
(7, 70001, 1, 17),
(7, 70002, 2, 10),
(8, 80001, 1, 11),
(9, 90001, 1, 15),
(10, 100000, 0, 30),
(10, 100001, 1, 22),
(11, 110001, 1, NULL),
(11, 110002, 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) NOT NULL,
  `comment_text` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `chapter_id`, `comment_text`, `created_at`, `parent_comment_id`) VALUES
(43, 1, 80001, 'Halo', '2023-12-14 16:14:31', NULL),
(44, 1, 80001, 'Hi', '2023-12-14 16:14:38', 43),
(56, 2, 80001, 'keren', '2023-12-14 16:39:53', NULL),
(61, 1, 80001, 'Halo apa kabar?\r\n', '2023-12-15 04:25:52', NULL),
(62, 2, 80001, 'Baik', '2023-12-15 10:50:01', 61),
(64, 2, 80001, 'baik', '2023-12-15 22:18:03', 61),
(101, 2, 70001, 'Keren bangettt', '2023-12-17 06:28:21', NULL),
(102, 1, 100000, 'kerenn bangettt', '2023-12-17 06:37:02', NULL),
(103, 2, 100000, 'iyah keren', '2023-12-17 09:31:25', 102),
(104, 1, 100000, 'iya bang', '2023-12-17 14:54:53', 102);

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `chapter_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`chapter_id`, `content`) VALUES
(80001, '80001-366-001.jpg'),
(80001, '80001-18-002.jpg'),
(80001, '80001-410-003.jpg'),
(80001, '80001-473-004.jpg'),
(80001, '80001-997-005.jpg'),
(100000, '100000-689-02.webp'),
(100000, '100000-621-03.webp'),
(70001, '70001-83-01.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komik`
--

CREATE TABLE `komik` (
  `komik_id` int(11) NOT NULL,
  `judul_komik` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komik`
--

INSERT INTO `komik` (`komik_id`, `judul_komik`, `cover`, `genre`, `deskripsi`, `pengarang`, `tanggal`, `rating`) VALUES
(1, 'Gundala Putra Petir', 'cover_gundala.jpg', 'Fantasi', 'Gundala adalah tokoh komik ciptaan Hasmi yang muncul pertama kali dalam komik Gundala Putra Petir pada tahun 1969. Genre komik adalah Fantasi. Jelas tampak pengaruh komik pahlawan super Amerika pada desain karakter maupun jenis kekuatannya, meskipun alur ceritanya bergaya Indonesia. Lokasi cerita sering digambarkan di kota Yogyakarta meskipun dalam filmnya pada tahun 1982 diceritakan berada di Jakarta. Gundala termasuk karakter komik yang cukup populer di Indonesia selain Si Buta dari Gua Hantu, Panji Tengkorak, dan Godam.', 'Hasmi', '2023-11-21 23:11:25', 4.9),
(2, 'Sri Asih', 'cover_SriAsih.jpg', 'Fantasi', 'Sri Asih adalah karakter adisatria (pahlawan super) ciptaan R. A. Kosasih.\r\nPertama kali rilis pada tahun 1954 di komik Sri Asih terbitan Penerbit Melodie, Bandung. Sri Asih adalah karakter adisatria pertama sekaligus adisatria perempuan pertama di Indonesia. Sri Asih adalah salah satu adisatria paling sakti di Jagat Bumilangit.', 'R.A. Kosasih', '2023-11-21 23:22:09', 4.2),
(3, 'Godam', '18-Cover_Godam.jpeg', 'Fantasi', 'Seorang bayi dibuang oleh orang tuanya, panglima perang yang gagal kudeta, karena khawatir akan dibunuh oleh sang penguasa. Bayi itu ditemukan oleh sekelompok perampok dan diberi nama Godam. Setelah dewasa, Godam berpetualang sampai mendapatkan baju, jubah dan cincin sakti. Namun karena melanggar sumpah, Godam dihukum dengan dimasukkan ke dalam cincin sakti. Bapa Kebenaran kemudian memberikan cincin itu kepada Awang, seorang manusia bumi yang sederhana. Setiap kali Awang menggunakan cincin tersebut, ia akan berubah wujud menjadi Godam.', 'Widodo Noor Slamet', '2023-11-22 08:59:56', 4.1),
(4, 'Mandala', '156-9786024809133_MANDALA_-_GOLOK_SETAN.jpg', 'Fantasi', 'Menurut cerita legenda yang sudah turun temurun, ada sepasang golok sakti yang diciptakan oleh sepasang empu senjata ternama. Siapapun yang memiliki kedua bilah golok ini, akan menjadi pendekar terkuat di jagat persilatan. Namun, golok ini dikabarkan hilang dalam legendanya. Yang tersisa hanya kabar mengenai lokasinya, yang diketahui oleh setiap insan persilatan. Dan setiap tahun, para pendekar akan berkumpul di tempat ini, untuk saling bertarung hingga tersisaâ€¦', 'Mansyur Daman', '2023-11-26 21:44:39', 4),
(5, 'Aquanus', '206-Aquanus-Vol-2.jpg', 'Fantasi', 'Dhanus dilahirkan di planet Zyba, sebuah planet yang dihuni bangsa amfibi. Dhanus kemudian dibesarkan di bumi dan menjadi seorang superhero, Aquanus. Kediaman Aquanus, Pulau Berhala, sering menjadi tempat berkumpul rekan-rekan superheronya. Aquanus juga memiliki sebuah kapal selam berteknologi canggih.', 'Widodo Noor Slamet', '2023-11-26 21:55:46', 4.4),
(6, 'Si Buta dari Gua Hantu', '354-Si-Buta-Dari-Gua-Hantu-Cover.jpg', 'Fantasi', 'Si Buta Dari Gua Hantu Putih Hitam merupakah antologi komik yang menampilkan petualangan Barda Mandrawata setelah ia meninggalkan kampung halamannya di Banten, hingga sebelum ia beraksi dalam petualangannya di Rajamandala', 'Ganes Thiar Santosa', '2023-11-26 23:13:32', 4.2),
(7, 'The Wailing Perversion', '7-d70b218e-70d4-45e8-a8dd-da72351147d0.jpg', 'Aksi', 'Ananta, seorang prajurit barbar yang dikutuk oleh dewa iblis. Untuk menghukum inkarnasi sayap, yang mengubah nasibnya menjadi sebuah tragedi, dia tanpa henti berpesta dengan dewa iblis dalam kisah darah, keringat, daging, dan tulang yang mendambakan balas dendam.', 'Jodeon', '2023-12-03 22:37:25', 4),
(8, 'Evolution Frenzy', '16-frenzy.jpg', 'Aksi', 'Setelah Duan Fei meninggal di kehidupan sebelumnya, dia terlahir kembali dan kembali ke 20 tahun yang lalu, beberapa jam sebelum terkena virus. Penyesalan Duan Fei selama 20 tahun itu akhirnya dapat diatasi dengan menggunakan 20 tahun pengetahuannya dari kehidupan sebelumnya untuk mempersenjatai dirinya di dunia saat ini. Duan Fei, yang telah memperoleh pohon evolusi, terus meningkatkan kekuatannya. Meski dia satu-satunya yang selamat di kehidupan sebelumnya, kini dia menjadi pahlawan dunia di kehidupan ini', 'MOKF', '2023-12-03 23:09:01', 4.5),
(9, 'Fuuto Pi', '965-Fuuto Pi.jpg', 'Misteri', 'seorang detektif swasta bernama ShÅtarÅ Hidari bekerja di Kantor Detektif Narumi bersama rekannya, Raito \"Philip\" Sonozaki, satu-satunya orang yang selamat dari keluarga Sonozaki yang dapat mengakses Perpustakaan Gaia. Mereka berdua berubah menjadi Kamen Rider W, yang melindungi kota Futo dari Dopant, monster yang diciptakan oleh Gaia Memory. Mereka memecahkan kasus bersama atasan mereka, Akiko Narumi, yang biasa bergabung dalam penyelidikan mereka beserta suaminya, RyÅ« Terui, seorang anggota kepolisian sekaligus Kamen Rider Accel.', 'Riku Sanjo', '2023-12-03 23:35:56', 4.6),
(10, 'My Eternal Reign', '44-My Eternal Reign - Cover.jpg', 'Aksi', 'Dunia tiba-tiba diserang oleh fenomena dungeon. Umat manusia dapat mengatasi bencana ini berkat para Awakener yang dapat mengendalikan Kartu Gerbang yang muncul bersamaan dengan dungeon. Di tengah-tengah itu, Okita Hikaru, seseorang yang hampir tidak dapat memenuhi syarat sebagai Awakener, ditindas oleh Elite Awakener di sebuah perusahaan yang berurusan dengan penaklukan ruang bawah tanah sebagai sebuah bisnis. Suatu hari, setelah dia didorong ke ambang kematian oleh monster penjara bawah tanah yang ganas dan pengkhianatan yang keji, Okita memperoleh kekuatan di luar kemampuan manusia, kekuatan yang memungkinkannya untuk memanipulasi Kartu Gerbang tanpa batas. Okita, yang telah menjadi makhluk terkuat yang melampaui hukum dunia ini, tidak akan pernah mengakhiri serangan baliknya terhadap mereka yang telah menindasnya!', 'OTCL', '2023-12-05 14:51:10', 4.9),
(11, 'Life, Once Again!', '92-loa.jpg', 'Romantis', 'Apakah Anda ingin hidup sekali lagi dengan kehidupan yang damai dan normal seperti kebanyakan orang? Begitulah kehidupan yang saya jalani, dengan pekerjaan, pasangan yang tepat, dan keluarga yang saya cintai. Namun, ketika saya diberi tawaran untuk memulai hidup lagi, kegembiraan itu segera memudar. Kenangan dari kehidupan sebelumnya semakin lama semakin kabur, dan ketakutan tidak dapat bertemu dengan istri dan anak perempuan saya melanda saya. Lebih buruk lagi, ada kesempatan untuk mengejar mimpi masa lalu saya sebagai seorang aktor, sesuatu yang sudah saya lepaskan. Saya bertanya-tanya, jika saya menjalani hidup ini dengan cara yang berbeda, apakah saya akan kehilangan kesempatan bertemu dengan keluarga saya? Terjebak antara keluarga dan impian yang pernah saya tinggalkan, saya harus membuat pilihan yang sulit.', 'Wise Dragon', '2023-12-07 23:12:06', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saw_result`
--

CREATE TABLE `saw_result` (
  `komik_id` int(11) NOT NULL,
  `judul_komik` varchar(50) NOT NULL,
  `nilai_saw` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saw_result`
--

INSERT INTO `saw_result` (`komik_id`, `judul_komik`, `nilai_saw`) VALUES
(1, 'Gundala Putra Petir', 9.47332),
(2, 'Sri Asih', 7.32),
(3, 'Godam', 2.46),
(4, 'Mandala', 2.4),
(5, 'Aquanus', 2.64),
(6, 'Si Buta dari Gua Hantu', 2.52),
(7, 'The Wailing Perversion', 7.8),
(8, 'Evolution Frenzy', 7.1),
(9, 'Fuuto Pi', 8.76),
(10, 'My Eternal Reign', 13.0733),
(11, 'Life, Once Again!', 6.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'miftahadha@gmail.com', 'miftahadha', '$2y$10$3XryvnWX9LZqhza9itfRM.HtYhNC3vaJmG0qkAi1RyfJtfkFwDCTS', '2023-11-21 16:11:25'),
(2, 'adhamiftah@gmail.com', 'mynzuw', '$2y$10$yjfo6q00Ih4fyOMaIKDXdeogi/MXqx0yN8H9Hmflvet6tmxlJ1mti', '2023-12-16 15:24:09'),
(3, 'tsumuri-san@gmail.com', 'Tsumuri', '$2y$10$3rUlD80DKwjpWOenh7cz/O6IEJI196P/2Lzbtm3FZgEmaIDvEl3ly', '2023-12-17 03:03:31'),
(4, 'kamenrider@toei.com', 'GitsuFox', '$2y$10$BKeOQLzniFQQ8KOE6JnPr.aUFc7/LJDCb6bHE/79mZ6Zhbu1icwh2', '2023-12-17 03:05:12'),
(6, 'geats@gmail.com', 'Geats', '$2y$10$Pcck/z4isVmH2U2AuR/L3.SoS36xmZJdKHsq9Z.B.w/QewgEn4tEO', '2023-12-17 03:55:06'),
(8, 'demouserrr@email.com', 'demouserrr', '$2y$10$fiWgqvLaMnzZKs9d1djL1e30fgEHj9B19yyUl8cX8pEKf9CIslwUC', '2023-12-17 03:57:51'),
(9, 'admin@invitoon.com', 'admin', '$2y$10$fXqhPwIwWJLOVttElQKh.eHrFO3xzvACd6iMSUglaP/2kwtzLLlHe', '2023-12-17 04:01:40'),
(10, 'abc@e.com', 'abc', '$2y$10$WguCYkOiAq.x3vPuHKoNhOjoSgy4voTRGQ.rJKnLpCVN652KNrIZC', '2023-12-17 04:03:13'),
(11, 'abcd@e.com', 'abcd', '$2y$10$zHwUQtXntlfTVKR7020Kq.kRaw0Ghu0aRt55dI/miVpG3GMbacJKK', '2023-12-17 04:04:55'),
(12, 'accelist.mc@gmail.com', 'mynzuwww', '$2y$10$RjRDcOSP1wR9MOyDb1ZmkeE8xamlQ/TBUvWJ4Xf3Dh6skTMNlAsSm', '2023-12-17 04:23:27'),
(13, 'miftah.adha@student.upj.ac.idd', 'GitsuFoxx', '$2y$10$Dmrt20rnQMyT1M8dRh/H0urrKGBTdpf70Ky.qPnhPG5rhXemafglO', '2023-12-17 04:27:59'),
(14, 'miftah.adha@student.upj.ac.iddd', 'GitsuFoxxx', '$2y$10$Ka0W.3w9GVn0g15pBHwn1u52ARxBOeJbheS5wrSc71un/mbidrGSK', '2023-12-17 04:28:20'),
(16, 'userdemoxt@email.com', 'userdemoxt', '$2y$10$8k3Q9JiJlZGf2ZWFds7svO.GE6FRZ2lfVVvjs6S4lpIJcx6OWXbcC', '2023-12-17 06:11:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `komik_id` (`komik_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`parent_comment_id`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indeks untuk tabel `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`komik_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQUE` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `komik`
--
ALTER TABLE `komik`
  MODIFY `komik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
