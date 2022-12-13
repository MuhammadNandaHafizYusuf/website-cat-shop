-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2022 pada 19.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshopdatabase`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `nama_bank`, `no_rekening`) VALUES
(2, 'hafizz', 'hafiz', 'Hafiz Yusuf', 'bank syariah indonesia', '1231231232123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_penjualan`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(6, 21, 'hafiz', 'syariah', 52000, '2022-05-28', '20220528100536download (1).jpg'),
(7, 26, 'zaky', 'bni syariah', 120000, '2022-06-16', '20220616071523music.png'),
(8, 28, 'hafiz', 'mandiri', 179000, '2022-06-18', '20220618073350GayaMotor.jpg'),
(9, 30, 'Calvin', 'bca', 187000, '2022-07-01', '202207012049591547962221530.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `password_pembeli` varchar(50) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `telepon_pembeli` varchar(20) NOT NULL,
  `alamat_pembeli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `email_pembeli`, `password_pembeli`, `nama_pembeli`, `telepon_pembeli`, `alamat_pembeli`) VALUES
(8, 'nanda@gmail.com', 'nanda', 'hafizyusuf', '01111111', 'puri harapan'),
(9, 'calvin@gmail.com', 'calvin', 'CALVIN DWI PUTRA', '01213132132131', 'puri harapan blok e6 no 31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_produk`
--

CREATE TABLE `penjualan_produk` (
  `id_penjualan_produk` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_produk`
--

INSERT INTO `penjualan_produk` (`id_penjualan_produk`, `id_penjualan`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 1, 2, 1, '', 0, 0, 0, 0),
(3, 7, 3, 1, '', 0, 0, 0, 0),
(4, 7, 9, 1, '', 0, 0, 0, 0),
(5, 8, 3, 1, '', 0, 0, 0, 0),
(6, 9, 9, 1, '', 0, 0, 0, 0),
(7, 9, 3, 1, '', 0, 0, 0, 0),
(8, 10, 3, 1, '', 0, 0, 0, 0),
(9, 11, 3, 2, 'boba', 12000, 1000, 2000, 24000),
(10, 11, 9, 1, 'boba cream', 15000, 12, 12, 15000),
(11, 12, 3, 1, 'boba', 14000, 1000, 1000, 14000),
(12, 13, 3, 2, 'boba', 14000, 1000, 2000, 28000),
(13, 14, 3, 1, 'boba', 14000, 1000, 1000, 14000),
(14, 15, 3, 1, 'boba', 14000, 1000, 1000, 14000),
(15, 16, 3, 2, 'boba', 14000, 1000, 2000, 28000),
(16, 17, 3, 5, 'boba', 14000, 1000, 5000, 70000),
(17, 18, 9, 1, 'boba cream', 15000, 12, 12, 15000),
(18, 18, 3, 1, 'boba', 14000, 1000, 1000, 14000),
(19, 19, 3, 1, 'boba', 14000, 1000, 1000, 14000),
(20, 20, 9, 9, 'boba cream', 15000, 12, 108, 135000),
(21, 21, 11, 1, 'bobaa', 12000, 142, 142, 12000),
(22, 22, 11, 1, 'bobaa', 12000, 142, 142, 12000),
(23, 23, 18, 1, 'Royal Canin Adult Persian', 85000, 500, 500, 85000),
(24, 24, 12, 1, 'ME-O KITTEN Ocean Fish', 75000, 1200, 1200, 75000),
(25, 24, 21, 1, 'Excel Cat Food Ikan Tuna', 22000, 5, 5, 22000),
(26, 25, 14, 1, 'ME-O Adult Salmonn', 75000, 1200, 1200, 75000),
(27, 26, 13, 1, 'ME-O Adult Seafood', 75000, 1200, 1200, 75000),
(28, 27, 13, 4, 'ME-O Adult Seafood', 75000, 1200, 4800, 300000),
(29, 28, 12, 1, 'ME-O KITTEN Ocean Fish', 80000, 1200, 1200, 80000),
(30, 28, 14, 1, 'ME-O Adult Salmonn', 75000, 1200, 1200, 75000),
(31, 29, 12, 1, 'ME-O KITTEN Ocean Fish', 80000, 1200, 1200, 80000),
(32, 30, 12, 2, 'ME-O KITTEN Ocean Fish', 80000, 1200, 2400, 160000),
(33, 31, 14, 1, 'ME-O Adult Salmonn', 75000, 1200, 1200, 75000),
(34, 32, 12, 1, 'ME-O KITTEN Ocean Fish', 80000, 1200, 1200, 80000),
(35, 33, 22, 1, 'Pasir TOP Litter Lemon', 70000, 10000, 10000, 70000),
(36, 34, 21, 1, 'Excel Cat Food Ikan Tuna', 22000, 5, 5, 22000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(12, 'ME-O KITTEN Ocean Fish', 80000, 1200, 'meo kitten ocean fish.jpg', '                                                Kondisi: Baru,\r\nKemasan : 1,2 kg     \r\n\r\n- Taurine untuk kesehatan mata dan ketajaman penglihatan kucing.\r\n- Vitamin C meningkatkan sistem imunitas dan membantu mengatasi stres terhadap lingkungan.\r\n- Kalsium, Fosfor dan Vitamin D membantu memperkuat gigi dan tulang.\r\n- Mineral & vitamin seimbang untuk mencegah resiko penyakit pada saluran kencing/FLUTD (Felline Lower Urinary Tract Disease ) dan batu kandung kemih.\r\n- Omega-3 dan omega-6 dari minyak berkualitas tinggi dikombinasikan dengan Seng (Zn) untuk memelihara kesehatan bulu dan kulit serta memelihara kerja sistem syaraf.\r\n- Formula sodium menurunkan risiko terhadap tekanan darah tinggi, ginjal dan penyakit jantung pada kucing.                                                                ', 6),
(13, 'ME-O Adult Seafood', 75000, 1200, 'ed167a7fbb7af8f3c296d44a678feadc.jpg', '                Kondisi: Baru,\r\nKemasan : 1,2 kg     \r\n\r\n- Taurine untuk kesehatan mata dan ketajaman penglihatan kucing.\r\n- Vitamin C meningkatkan sistem imunitas dan membantu mengatasi stres terhadap lingkungan.\r\n- Kalsium, Fosfor dan Vitamin D membantu memperkuat gigi dan tulang.\r\n- Mineral & vitamin seimbang untuk mencegah resiko penyakit pada saluran kencing/FLUTD (Felline Lower Urinary Tract Disease ) dan batu kandung kemih.\r\n- Omega-3 dan omega-6 dari minyak berkualitas tinggi dikombinasikan dengan Seng (Zn) untuk memelihara kesehatan bulu dan kulit serta memelihara kerja sistem syaraf.\r\n- Formula sodium menurunkan risiko terhadap tekanan darah tinggi, ginjal dan penyakit jantung pada kucing.                                ', 0),
(14, 'ME-O Adult Salmonn', 75000, 1200, 'ed167a7fbb7af8f3c296d44a678feadc.jpg', '                                        Kondisi: Baru,\r\nKemasan : 1,2 kg     \r\n\r\n- Taurine untuk kesehatan mata dan ketajaman penglihatan kucing.\r\n- Vitamin C meningkatkan sistem imunitas dan membantu mengatasi stres terhadap lingkungan.\r\n- Kalsium, Fosfor dan Vitamin D membantu memperkuat gigi dan tulang.\r\n- Mineral & vitamin seimbang untuk mencegah resiko penyakit pada saluran kencing/FLUTD (Felline Lower Urinary Tract Disease ) dan batu kandung kemih.\r\n- Omega-3 dan omega-6 dari minyak berkualitas tinggi dikombinasikan dengan Seng (Zn) untuk memelihara kesehatan bulu dan kulit serta memelihara kerja sistem syaraf.\r\n- Formula sodium menurunkan risiko terhadap tekanan darah tinggi, ginjal dan penyakit jantung pada kucing.                                                        ', 2),
(15, 'ME-O Adult Rasa Tuna', 75000, 1200, 'me-o_me-o-dry-cat-food-tuna-1-2kg-_full01.jpg', '                                                                                                                                                                                ', 5),
(18, 'Royal Canin Adult Persian', 85000, 500, '946ce36b120a00781db81efeb4d6895f.jpg', '                                Royal Canin Persian Adult Cat Food Makanan Kucing  merupakan makanan kucing dengan kemasan 400gr  yang direkomendasikan oleh cat lovers dan dokter hewan. Terbuat dari komposisi bahan pilihan dengan berbagai macam nutrisi yang terkandung di dalamnya. Cocok untuk masa pertumbuhan kucing peliharaan Anda.                                ', 1),
(19, 'Royal Canin Kittenn         .', 85000, 500, 'royal_canin_royal_canin_kitten_4kg_full01_sssk0dgd.jpg', '        Mendukung kesehatan kucing Anda selama masa pertumbuhan, meningkatkan keseimbangan dalam flora usus yang berkontribusi pada kualitas tinja yang baik dan mendukung pertumbuhan yang sehat. Dikhususkan untuk anak kucing berusia 4 sampai 12 bulan.\r\n\r\nAnak kucing membutuhkan nutrisi seimbang untuk mendukung tumbuh kembangnya. Royal Canin menghadirkan Royal Canin Kitten yang dapat menjaga kesehatan pencernaan dan sistem imun.        ', 2),
(21, 'Excel Cat Food Ikan Tuna', 22000, 5, '547271bf09d5d0c5c6b87c750001680f.jpg', '- Menyehatkan kulit dan memperindah bulu\r\n- - Menyehatkan mata\r\n- Meningkatkan daya tahan tubuh\r\n- - Memperkuat tulang dan gigi\r\n- Mengurangi bau', 4),
(22, 'Pasir TOP Litter Lemon', 70000, 10000, 'e2afa81ccea206805b566d3836612cfb.jpg', '~ Langsung menggumpal bila terkena cairan, sehingga pipis tidak tergenang, tidak berceceran, tidak basah dan tidak lengket\r\n~ Menekan bau tak sedap dari pipis dan kotoran sehingga ruangan tetap nyaman\r\n~ Tidak perlu di cuci, hemat waktu, hemat tenaga, hemat harga\r\n~ Praktis, tinggal buang bagian yang menggumpal, litter box sudah siap dipakai lagi\r\n~ Lebih murah dari merk pasir gumpal import lainnya\r\n~ Daya Serap TINGGI,\r\n~ Tidak mudah rusak dalam jangka waktu lama', 1),
(23, 'PASIR KUCING LALA CAT ', 67000, 10000, '91ea862b-37df-4915-b9c6-7bd5a4f9ff96.jpg', '                EFFECTIVELY ABSORD & PERFECT CLUMPING\r\n\r\n* SUPERIOR ODOR CONTROL\r\n* QUICK CLAMPING\r\n* ELIMINATES TRACKING                ', 3),
(29, 'kitchen flavor kitten & baby kitten', 120000, 1800, 'images (1).jpg', 'Keunggulan:\r\nâ€‹Meningkatkan kesehatan sistem pencernaan\r\nMembantu proses pencernaan dan peristaltik usus\r\nMenutrisi kulit\r\nMemelihara & menutrisi folikel bulu: Membantu pertumbuhan bulu\r\nMembuat bulu lebih lembut & mengkilap\r\nMembantu mengeluarkan gumpalan bulu (hairball)\r\nMenjadikan tubuh kucing lebih energik dan kuat\r\nMempertajam penglihatan\r\n\r\nBahan-Bahan:\r\nChicken meat, fish meat, sweet potato, potato, pea, brewerâ€˜s yeast, chicken fat, taurine, Vitamin A, Vitamin C, Vitamin D3, Vitamin E, Vitamin B1, Vitamin B2, Vitamin B6, Vitamin B12, biotin, niacin, pantothenic acid, folic acid, zinc sulfate, copper sulfate, ferrous sulfate, manganese sulfate, sodium selenite, potassium iodide.', 5),
(30, 'Cat choize kitten salmon ', 40000, 1000, 'download (2).jpg', 'Cat Choize kitten food mengandung nutrisi, vitamin, dan mineral lengkap yang menjaga kesehatan anak kucing anda. untuk memastikan pertumbuhan kucing yang optimal.\r\nCat Choize cocok untuk semua ras dan jenis anak kucing.', 4),
(31, 'Vitamin minyak ikan', 5000, 10, '642002193969b4393f88754ff1487f13.jpg', '                 Membantu menjaga kesehatan tubuh, baik untuk hewan pelihraan seperti anjing dan kucing untuk menjaga kesehatan bulu dan daya tahan tubuh supaya bulu semakin bersinar.\r\nDapat juga menjaga kesehatan jantung dan hati.                ', 166),
(32, 'MANTOEL Tuna Chicken Milk', 30000, 1200, 'download (3).jpg', '        Makanan kucing premium MANTOEL (Mantap Betoel) dengan perpaduan rasa ikan tuna, ayam, dan susu dengan 3 bentuk kibble (ikan, hati, segitiga) yang sangat menggugah selera makan kucing peliharaan anda. Kibble berukuran kecil sehingga mudah dimakan baik oleh kucing dewasa maupun anak kucing (kitten), dengan nutrisi yang lengkap.        ', 10),
(33, 'CAT CHOIZE KITTEN tuna with milk ', 30000, 1100, 'download (4).jpg', 'sereal gandum, tepung gluten jagung, tepung kedelai, minyak (ayam/kelapa sawit olahan), gandum dan atau beras, kedelai lemak penuh, mineral, tuna olahan, hidrolisat ayam, susu skim, vitamin, minyak ikan, DL-methionine (asam amino), potassium sorbate, Taurine dan antioksidan.', 3),
(34, 'Pasir Kucing HAPPY KATTY', 47000, 3500, 'images (1).jpg', '        - Eco friendly\r\n- Odor control\r\n- Quick cl...', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id_penjualan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_penjualan` varchar(50) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(20) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `distrik` varchar(50) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `kodepos` varchar(15) NOT NULL,
  `ekspedisi` varchar(20) NOT NULL,
  `paket` varchar(25) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_penjualan`, `id_pembeli`, `tanggal_penjualan`, `total_penjualan`, `alamat_pengiriman`, `status_penjualan`, `resi_pengiriman`, `totalberat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(8, 2, '2022-03-02', 27000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(9, 2, '2022-03-02', 47000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(10, 2, '2022-03-02', 32000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(11, 2, '2022-03-02', 59000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(12, 2, '2022-03-02', 14000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(13, 2, '2022-03-02', 43000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(14, 4, '2022-03-03', 34000, 'asdasdasdasdasd55', 'barang dikirim', 'abn123', 0, '', '', '', '', '', '', 0, ''),
(15, 4, '2022-03-05', 34000, '', 'Sudah mengirim bukti', '', 0, '', '', '', '', '', '', 0, ''),
(16, 4, '2022-03-06', 48000, 'aaasss', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(17, 4, '2022-03-09', 85000, 'jalan mandalika no 355', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(18, 4, '2022-03-19', 44000, 'jl enau raya 16 bekasi', 'lunas', '', 1012, 'DKI Jakarta', 'Jakarta Pusat', 'Kota', '10540', 'pos', 'Paket Kilat Khusus', 15000, '2 HARI'),
(19, 1, '2022-05-06', 59000, 'asdasdasd', 'pending', '', 1000, 'Kepulauan Riau', 'Batam', 'Kota', '29413', 'jne', 'REG', 45000, '2-3'),
(20, 1, '2022-05-06', 150000, '', 'pending', '', 108, 'DKI Jakarta', 'Jakarta Barat', 'Kota', '11220', 'pos', 'Paket Kilat Khusus', 15000, '2 HARI'),
(22, 5, '2022-05-26', 26000, 'asdasd', 'pending', '', 142, 'Jawa Barat', 'Bekasi', 'Kota', '17121', 'jne', 'OKE', 14000, '4-5'),
(23, 5, '2022-06-04', 125000, 'asdasd', 'pending', '', 500, 'Bengkulu', 'Kaur', 'Kabupaten', '38911', 'jne', 'OKE', 40000, '3-6'),
(24, 6, '0000-00-00', 0, 'puri harapan blok e5', 'pending', '', 1205, 'Jawa Barat', 'Bekasi', 'Kabupaten', '17837', 'tiki', 'ECO', 8000, '4'),
(25, 6, '0000-00-00', 83000, 'asdasd', 'pending', '', 1200, 'DKI Jakarta', 'Jakarta Barat', 'Kota', '11220', 'jne', 'OKE', 8000, '2-3'),
(28, 8, '2022-06-18', 179000, 'puri harapan blok e5 no 16', 'barang dikirim', '2222', 2400, 'Jawa Barat', 'Bekasi', 'Kota', '17121', 'tiki', 'ECO', 24000, '4'),
(29, 8, '2022-06-18', 89000, 'puri harapan e5 no 16', 'pending', '', 1200, 'Jawa Barat', 'Bekasi', 'Kota', '17121', 'jne', 'CTC', 9000, '1-2'),
(30, 9, '2022-07-01', 187000, 'Puri Harapan blok e5 no 12', 'barang dikirim', '210001', 2400, 'Jawa Barat', 'Bekasi', 'Kota', '17121', 'tiki', 'REG', 27000, '2'),
(31, 8, '2022-07-18', 75000, '<b>Notice</b>:  Undefined variable: error_email in <b>C:xampphtdocsskripsiprogramcheckout.php</b> on line <b>108</b><br />\r\n>', 'pending', '', 1200, '', '', '', '', '', '', 0, ''),
(32, 8, '2022-07-18', 80000, '', 'pending', '', 1200, '', '', '', '', '', '', 0, ''),
(33, 8, '2022-07-18', 70000, '', 'pending', '', 10000, '', '', '', '', '', '', 0, ''),
(34, 8, '2022-07-18', 22000, 'asdasdasd', 'pending', '', 5, '', '', '', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD PRIMARY KEY (`id_penjualan_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  MODIFY `id_penjualan_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
