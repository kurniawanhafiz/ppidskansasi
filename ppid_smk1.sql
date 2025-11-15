CREATE DATABASE IF NOT EXISTS `ppid_smk1`;
USE ppid_smk1;
CREATE TABLE IF NOT EXISTS `informasi_jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `informasi_jurusan` (`id`, `jurusan`, `deskripsi`) VALUES
(1, 'TKJ', 'Jurusan Teknik Komputer dan Jaringan (TKJ) fokus pada pembelajaran instalasi, konfigurasi, dan pemeliharaan jaringan komputer serta perangkat keras dan perangkat lunak yang mendukung sistem jaringan.'),
(2, 'DKV', 'Jurusan Desain Komunikasi Visual (DKV) mempelajari seni dan teknik komunikasi visual melalui media digital maupun cetak, termasuk desain grafis, ilustrasi, dan multimedia.'),
(3, 'DPB', 'Desain Produksi Busana adalah jurusan yang berfokus pada produksi pakaian yang dibarengi dengan design teknologi terkini.');