-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2020, 08:48:17
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `uzem_rez`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `yetki` varchar(255) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `yetki`) VALUES
(1, 'admin@admin.com', '1', '1'),
(2, 'kullanici@bilecik.edu.tr', '1', '2'),
(3, 'ogrenci@bilecik.edu.tr', '1', '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birim`
--

CREATE TABLE `birim` (
  `birim_id` int(11) NOT NULL,
  `birim_ad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `birim`
--

INSERT INTO `birim` (`birim_id`, `birim_ad`) VALUES
(1, 'Bozüyük Meslek Yüksekokulu'),
(2, 'Fen-Edebiyat Fakültesi'),
(3, 'Gölpazarı Meslek Yüksekokulu'),
(4, 'Güzel Sanatlar ve Tasarım Fakültesi'),
(5, 'İktisadi ve İdari Bilimler Fakültesi'),
(6, 'İslami İlimler Fakültesi'),
(7, 'Meslek Yüksekokulu'),
(8, 'Mühendislik Fakültesi'),
(9, 'Osmaneli Meslek Yüksekokulu'),
(10, 'Pazaryeri Meslek Yüksekokulu'),
(11, 'Sağlık Hizmetleri Meslek Yüksekokulu'),
(12, 'Sağlık Yüksekokulu'),
(13, 'Söğüt Meslek Yüksekokulu'),
(14, 'Uygulamalı Bilimler Yüksekokulu'),
(15, 'Ziraat ve Doğa Bilimleri Fakültesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `bolum_id` int(11) NOT NULL,
  `bolum_ad` varchar(255) DEFAULT NULL,
  `birim_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`bolum_id`, `bolum_ad`, `birim_id`) VALUES
(1, 'Bankacılık ve Sigortacılık', 1),
(2, 'Dış Ticaret', 1),
(3, 'Doğal Yapı Taşları Teknolojisi', 1),
(4, 'Grafik Tasarımı', 1),
(5, 'Muhasebe ve Vergi Uygulamaları', 1),
(6, 'Pazarlama', 1),
(7, 'Seramik, Cam ve Çinicilik', 1),
(8, 'Arkeoloji', 2),
(9, 'Coğrafya', 2),
(10, 'Kimya', 2),
(11, 'Matematik', 2),
(12, 'Moleküler Biyoloji ve Genetik', 2),
(13, 'Tarih', 2),
(14, 'Türk Dili ve Edebiyatı', 2),
(15, 'Büro Yönetimi ve Yönetici Asistanlığı', 3),
(16, 'Halkla İlişkiler ve Tanıtım', 3),
(17, 'Muhasebe ve Vergi Uygulamaları', 3),
(18, 'Pazarlama', 3),
(19, 'Yerel Yönetimler', 3),
(20, 'Endüstri Ürünleri Tasarımı', 4),
(21, 'Seramik ve Cam Tasarımı', 4),
(22, 'İktisat', 5),
(23, 'İşletme', 5),
(24, 'Maliye', 5),
(25, 'Siyaset Bilimi ve Kamu Yönetimi', 5),
(26, 'Yönetim Bilişim Sistemleri', 5),
(27, 'İslami İlimler', 6),
(28, 'Bilgisayar Programcılığı', 7),
(29, 'Döküm', 7),
(30, 'Elektrik', 7),
(31, 'Elektrik Enerjisi Üretim, İletim ve Dağıtımı', 7),
(32, 'Elektronik Haberleşme Teknolojisi', 7),
(33, 'Elektronik Teknolojisi', 7),
(34, 'Gıda Teknolojisi', 7),
(35, 'İnşaat Teknolojisi', 7),
(36, 'Kimya Teknolojisi', 7),
(37, 'Kontrol ve Otomasyon Teknolojisi', 7),
(38, 'Makine', 7),
(39, 'Metalurji', 7),
(40, 'Otomotiv Teknolojisi', 7),
(41, 'Peyzaj ve Süs Bitkileri', 7),
(42, 'Üretimde Kalite Kontrol', 7),
(43, 'Bilgisayar Mühendisliği', 8),
(44, 'Elektrik-Elektronik Mühendisliği', 8),
(45, 'İnşaat Mühendisliği', 8),
(46, 'Kimya Mühendisliği', 8),
(47, 'Makine Mühendisliği', 8),
(48, 'Metalurji ve Malzeme Mühendisliği', 8),
(49, 'Dış Ticaret', 9),
(50, 'Elektrik', 9),
(51, 'İklimlendirme ve Soğutma Teknolojisi', 9),
(52, 'İş Sağlığı ve Güvenliği', 9),
(53, 'Makine', 9),
(54, 'Muhasebe ve Vergi Uygulamaları', 9),
(55, 'Sağlık Kurumları İşletmeciliği', 9),
(56, 'Bankacılık ve Sigortacılık', 10),
(57, 'Bilgisayar Programcılığı', 10),
(58, 'Çağrı Merkezi Hizmetleri', 10),
(59, 'Doğal Yapı Taşları Teknolojisi', 10),
(60, 'Endüstri Ürünleri Tasarımı', 10),
(61, 'Kozmetik Teknolojisi', 10),
(62, 'Muhasebe ve Vergi Uygulamaları', 10),
(63, 'Organik Tarım', 10),
(64, 'Tekstil Teknolojisi - Dokuma', 10),
(65, 'Tekstil Teknolojisi - Terbiye', 10),
(66, 'Tıbbi Tanıtım ve Pazarlama', 10),
(67, 'Tıbbi ve Aromatik Bitkiler', 10),
(68, 'Çocuk Gelişimi', 11),
(69, 'İlk ve Acil Yardım', 11),
(70, 'Tıbbi Laboratuvar Teknikleri', 11),
(71, 'Çocuk Gelişimi', 12),
(72, 'Hemşirelik', 12),
(73, 'Basım ve Yayın Teknolojileri', 13),
(74, 'Bilgisayar Programcılığı', 13),
(75, 'Büro Yönetimi ve Yönetici Asistanlığı', 13),
(76, 'Geleneksel El Sanatları', 13),
(77, 'Halkla İlişkiler ve Tanıtım', 13),
(78, 'İç Mekan Tasarımı', 13),
(79, 'Moda Tasarımı', 13),
(80, 'Muhasebe ve Vergi Uygulamaları', 13),
(81, 'Seramik, Cam ve Çinicilik', 13),
(82, 'Sosyal Güvenlik', 13),
(83, 'Turist Rehberliği', 13),
(84, 'Turizm ve Otel İşletmeciliği', 13),
(85, 'Bankacılık ve Finans', 14),
(86, 'Muhasebe ve Denetim', 14),
(87, 'Turizm İşletmeciliği ve Otelcilik', 14),
(88, 'Bahçe Bitkileri', 15),
(89, 'Bitki Koruma', 15),
(90, 'Biyosistem Mühendisliği', 15),
(91, 'Tarla Bitkileri', 15),
(92, 'Ziraat Mühendisliği Programları', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `optikdegisiklikleri`
--

CREATE TABLE `optikdegisiklikleri` (
  `id` int(11) NOT NULL,
  `optik_id` int(11) UNSIGNED DEFAULT NULL,
  `teslimAlanID` int(11) DEFAULT NULL,
  `okuyanID` int(11) DEFAULT NULL,
  `teslimEdenID` int(11) DEFAULT NULL,
  `excelYukleyenID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `optikdegisiklikleri`
--

INSERT INTO `optikdegisiklikleri` (`id`, `optik_id`, `teslimAlanID`, `okuyanID`, `teslimEdenID`, `excelYukleyenID`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 2, 1, 1, 1, NULL),
(3, 3, NULL, NULL, NULL, NULL),
(4, 4, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL, NULL),
(9, 9, NULL, NULL, NULL, NULL),
(10, 10, NULL, NULL, NULL, NULL),
(11, 11, NULL, NULL, NULL, NULL),
(12, 12, NULL, NULL, NULL, NULL),
(13, 13, NULL, NULL, NULL, NULL),
(14, 14, NULL, NULL, NULL, NULL),
(15, 15, NULL, NULL, NULL, NULL),
(16, 16, NULL, NULL, NULL, NULL),
(17, 17, NULL, NULL, NULL, NULL),
(18, 18, NULL, NULL, NULL, NULL),
(19, 19, NULL, NULL, NULL, NULL),
(20, 20, NULL, NULL, NULL, NULL),
(21, 21, NULL, NULL, NULL, NULL),
(22, 22, NULL, NULL, NULL, NULL),
(23, 23, NULL, NULL, NULL, NULL),
(24, 24, NULL, NULL, NULL, NULL),
(25, 25, NULL, NULL, NULL, NULL),
(26, 26, NULL, NULL, NULL, NULL),
(27, 27, NULL, NULL, NULL, NULL),
(28, 28, NULL, NULL, NULL, NULL),
(29, 29, NULL, NULL, NULL, NULL),
(30, 30, NULL, NULL, NULL, NULL),
(31, 31, NULL, NULL, NULL, NULL),
(32, 32, NULL, NULL, NULL, NULL),
(33, 33, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `optikdurum`
--

CREATE TABLE `optikdurum` (
  `id` int(10) UNSIGNED NOT NULL,
  `durumBilgisi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `optikdurum`
--

INSERT INTO `optikdurum` (`id`, `durumBilgisi`) VALUES
(1, 'Sadece Randevu Alındı'),
(2, 'Optikler Alındı'),
(3, 'Optikler Okundu'),
(4, 'Teslim Edildi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `optikislem`
--

CREATE TABLE `optikislem` (
  `optikID` int(11) UNSIGNED NOT NULL,
  `hocaID` int(11) DEFAULT NULL,
  `bolumID` int(11) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL,
  `durum` varchar(2) DEFAULT '1',
  `optik_sayisi` int(255) DEFAULT NULL,
  `BirimID` int(11) DEFAULT NULL,
  `teslimAlma_Tarih` date DEFAULT NULL,
  `okundu_Tarih` date DEFAULT NULL,
  `RandevuID` int(11) UNSIGNED DEFAULT NULL,
  `notYuklemeDurumu` smallint(10) DEFAULT 0,
  `tamamlandi` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE `randevu` (
  `RandevuID` int(11) UNSIGNED NOT NULL,
  `tarih` date DEFAULT NULL,
  `saat` time DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `durum` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `unvan`
--

CREATE TABLE `unvan` (
  `unvan_id` int(11) UNSIGNED NOT NULL,
  `unvan_ad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `unvan`
--

INSERT INTO `unvan` (`unvan_id`, `unvan_ad`) VALUES
(1, 'Doçent'),
(2, 'Profesör');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `upload`
--

CREATE TABLE `upload` (
  `id` int(11) UNSIGNED NOT NULL,
  `optik_id` int(11) UNSIGNED DEFAULT NULL,
  `dosya_ad` varchar(255) DEFAULT NULL,
  `hocaID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_ad` varchar(255) DEFAULT NULL,
  `user_soyad` varchar(255) DEFAULT NULL,
  `user_birimId` int(11) DEFAULT NULL,
  `user_unvanId` int(11) UNSIGNED DEFAULT NULL,
  `user_accountId` int(11) UNSIGNED NOT NULL,
  `user_durum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_ad`, `user_soyad`, `user_birimId`, `user_unvanId`, `user_accountId`, `user_durum`) VALUES
(1, 'admin', 'admin', NULL, NULL, 1, 1),
(5, 'kullanici', 'kullanici', 2, 1, 2, 1),
(6, 'öğrenci', 'öğrenci', NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkiler`
--

CREATE TABLE `yetkiler` (
  `id` varchar(255) NOT NULL,
  `yetki` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `yetkiler`
--

INSERT INTO `yetkiler` (`id`, `yetki`) VALUES
('1', 'Admin'),
('2', 'Kullanici'),
('3', 'Öğrenci');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`,`yetki`) USING BTREE,
  ADD KEY `account_ibfk_1` (`yetki`),
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `birim`
--
ALTER TABLE `birim`
  ADD PRIMARY KEY (`birim_id`);

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`bolum_id`),
  ADD KEY `birim` (`birim_id`);

--
-- Tablo için indeksler `optikdegisiklikleri`
--
ALTER TABLE `optikdegisiklikleri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `optikid` (`optik_id`);

--
-- Tablo için indeksler `optikdurum`
--
ALTER TABLE `optikdurum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `optikislem`
--
ALTER TABLE `optikislem`
  ADD PRIMARY KEY (`optikID`) USING BTREE,
  ADD KEY `hocaid` (`hocaID`),
  ADD KEY `bolum` (`bolumID`),
  ADD KEY `birim` (`BirimID`) USING BTREE,
  ADD KEY `randevuid` (`RandevuID`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`RandevuID`);

--
-- Tablo için indeksler `unvan`
--
ALTER TABLE `unvan`
  ADD PRIMARY KEY (`unvan_id`);

--
-- Tablo için indeksler `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `optikidd` (`optik_id`),
  ADD KEY `hocaid_upload` (`hocaID`) USING BTREE;

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD KEY `user_birimId` (`user_birimId`) USING BTREE,
  ADD KEY `user_unvanId` (`user_unvanId`) USING BTREE,
  ADD KEY `accID` (`user_accountId`);

--
-- Tablo için indeksler `yetkiler`
--
ALTER TABLE `yetkiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yetki` (`id`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `birim`
--
ALTER TABLE `birim`
  MODIFY `birim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `bolum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Tablo için AUTO_INCREMENT değeri `optikdegisiklikleri`
--
ALTER TABLE `optikdegisiklikleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `optikdurum`
--
ALTER TABLE `optikdurum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `optikislem`
--
ALTER TABLE `optikislem`
  MODIFY `optikID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `RandevuID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `unvan`
--
ALTER TABLE `unvan`
  MODIFY `unvan_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`yetki`) REFERENCES `yetkiler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
