-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Apr 2023 pada 17.12
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image_url` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `content`, `image_url`, `published_date`) VALUES
(1, 1, 'Minuman Segar Sekali', 'Minuman merupakan salah satu kebutuhan manusia yang tidak dapat terpisahkan dari kehidupan sehari-hari. Dalam sejarahnya, minuman telah menjadi bagian dari ritual, acara sosial, dan kebiasaan sehari-hari yang melibatkan banyak orang di seluruh dunia. Dari mulai minuman tradisional hingga minuman modern yang diolah dengan teknologi canggih, semua bisa kita nikmati dengan mudah.  Ketika kita berbicara tentang minuman, tidak akan habisnya bahasan mengenai berbagai jenis dan varian minuman yang ada di dunia ini. Ada minuman beralkohol yang dianggap sebagai minuman kelas atas, seperti wine, champagne, dan whiskey. Ada juga minuman berkarbonasi yang menjadi minuman favorit banyak orang, seperti cola, soda, dan energy drink. Tidak ketinggalan, ada minuman alami yang diproses dengan cara tradisional, seperti teh, kopi, dan susu.  Di Indonesia, kita memiliki banyak sekali minuman tradisional yang sangat khas, seperti es cendol, es teler, es campur, es doger, dan masih banyak lagi. Minuman-minuman tersebut sangat terkenal di seluruh dunia dan menjadi identitas kuliner Indonesia yang kaya akan rasa dan variasi.  Namun, minuman tidak hanya memberikan manfaat dalam segi rasa saja, tetapi juga kaya akan nutrisi yang dibutuhkan tubuh. Ada minuman yang mengandung banyak serat seperti jus buah-buahan, ada juga minuman yang mengandung banyak protein seperti susu dan yogurt, bahkan ada minuman yang mengandung banyak vitamin seperti jus sayuran dan smoothies.  Tentu saja, kita harus bijak dalam mengonsumsi minuman. Terlalu banyak mengonsumsi minuman beralkohol dapat berdampak buruk pada kesehatan tubuh dan juga dapat memicu kecelakaan. Terlalu banyak minum minuman berkarbonasi juga dapat meningkatkan risiko obesitas dan gangguan pencernaan.  Namun, jika kita mengonsumsi minuman dengan bijak dan seimbang, minuman dapat memberikan manfaat yang besar bagi tubuh dan juga dapat menambah keseruan dalam kehidupan sehari-hari. Jadi, mari nikmati minuman dengan bijak dan sehat!', 'files/image/post-3.jpg', '2023-03-17 03:02:00'),
(3, 1, 'Handphone', 'Handphone atau HP menjadi salah satu teknologi yang sangat populer di era modern saat ini. HP tidak hanya digunakan sebagai alat komunikasi, tetapi juga sebagai alat untuk mengakses internet, bermain game, dan masih banyak lagi. Saat ini, ada banyak sekali merek HP yang bisa dipilih. Ada HP dengan sistem operasi Android, iOS, dan Windows. Setiap sistem operasi memiliki kelebihan dan kekurangannya masing-masing. Selain itu, setiap merek HP juga memiliki kelebihan dan kekurangannya sendiri. Ada merek HP yang terkenal dengan kameranya yang berkualitas, ada juga yang terkenal dengan baterai yang awet. Pilihan merek HP sangat bergantung pada kebutuhan dan budget masing-masing orang.', 'files/image/post-3.jpg', '2023-04-20 04:02:00'),
(6, 1, 'Teknologi', 'Teknologi terus berkembang dari tahun ke tahun. Ada banyak sekali teknologi yang baru ditemukan setiap tahunnya. Teknologi terbaru biasanya lebih canggih dan lebih efisien dibandingkan dengan teknologi sebelumnya. Teknologi juga memberikan banyak manfaat bagi manusia. Dalam bidang kesehatan, teknologi digunakan untuk membantu mendeteksi penyakit dan memberikan pengobatan yang lebih efektif. Dalam bidang transportasi, teknologi digunakan untuk membuat kendaraan yang lebih aman dan ramah lingkungan. Dalam bidang pendidikan, teknologi digunakan untuk membantu proses pembelajaran yang lebih interaktif dan lebih efektif. Namun, teknologi juga memiliki dampak negatif jika digunakan dengan cara yang tidak benar, seperti kecanduan gadget atau cyberbullying. Oleh karena itu, penting untuk menggunakan teknologi dengan bijak.', 'files/image/post-7.jpg', '2023-04-20 10:25:00'),
(7, 1, 'Makanan', 'hai teman', 'files/image/post-9.jpg', '2023-04-02 15:02:00'),
(12, 1, 'Minuman', 'bersama', 'files/image/post-6.jpg', '2023-04-21 04:33:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'NO NAME',
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone_number`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '0812345678910'),
(2, 'Jane Doe', 'janedoe@gmail.com', '08512345678'),
(13, 'Lalam', 'lala@gmail.com', '08123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_user_id_fk` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
