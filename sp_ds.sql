-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Nov 2016 pada 16.33
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_ds`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `kode_diagnosa` varchar(16) NOT NULL,
  `nama_diagnosa` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `pengendalian` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`kode_diagnosa`, `nama_diagnosa`, `keterangan`, `pengendalian`, `gambar`) VALUES
('P01', 'Blas/Blast.(Pyricularia oryzae)', 'Blas dikenal di semua negara penanam padi dan dianggap sebagai penyakit yang paling penting. Pada tahun 1913 penyakit ini bersama-sama dengan bercak coklat banyak timbul di persemaian di daerah Surabaya dan Madura, meskipun tidak menimbulkan kerugian yang besar. Blas penyakit dengan gejala yang mirip dengan pertanaman yang ditiup dengan udara panas. Penyakit ini berbeda dengan penyakit bercak coklat (Drechslera oryzae), blas lebih banyak terdapat di pertanaman yang subur, oleh karena itu penyakit ini sering dianggap sebagai penyakit orang kaya, dengan makin meningkatnya intensifikasi pertanian di Indonesia, kerugian karena blas juga makin meningkat (Semangun, 1990).', '1. Pergiliran tanaman dengan tanaman bukan padi.\r\n2. Penanaman varietas tahan seperti Sentani, Danau Bawah, Tondano, Singkarak, Arias, Ranau, Maninjau, Danau Atas di lahan gogo, sedangkan varietas Dodokan dan Jangkok agak tahan. Varietas Asahan dan PM 38 tahan terhadap blas di lahan sawah.\r\n3. Perbaikan cara cocok tanam:\r\n-	Pembenaman jerami sakit sebagai kompos,\r\n-	Pengaturan jarak tanaman,\r\n-	Pemakaian pupuk secara seimbang (N, P, K, S, dan pupuk mikro)\r\n-	Perbaikan sistem pemberian air,\r\n-	Penyiangan\r\n4. Perawatan benih dengan fungisida anjuran\r\n5.Penyemprotan tanaman dengan fungisida anjuran. Untuk daerah yang sering timbul penyakit (daerah endemis), waktu aplikasi adalah saat anakan maksimum, fase bunting, dan awal berbungan (5-10 persen berbunga), sedangkan untuk daerah bukan endemis aplikasi dilakukan hanya saat awal berbungan apabila pada pengamatan sebelumnya ditemukan bercak daun.\r\n6. Penggunaan agens hayati Paenibacillus polymixa. (Direktorat Perlingdungan Tanaman Pangan, 1989)', 'Blas.jpg'),
('P02', 'Bercak Coklat/Brown Spot. (Helminthosporium oryzae/Drechslera oryzae)', '', '', 'bercakcoklat.jpg'),
('P03', 'Bercak Coklat Sempit (Cercospora oryzae)', '', '', 'coklatsempit.jpg'),
('P04', 'Hawar Pelepah/Sheath Bligh/Hawar Upih Daun/Busuk Batang/Sheath Blight and Stem Rot. (Rhizoctonia solani Kuhn)', '', '', 'hawar.jpg'),
('P05', 'Noda Palsu/Gosong Palsu/False Smut. (Ustilaginoidea virens)', '', '', 'gosong.jpg'),
('P06', 'Kerdil Rumput/Grassy Stunt. (Nilaparvata Lugens Stal)', '', '', 'kerdil.jpg'),
('P07', 'Kresek/Hawar Daun/bacterial leaf blight, BLB.(Xanthomonas campestris pv. Oryzae)', '', '', 'kresek.jpg'),
('P08', 'Tungro', '', '', 'tungro.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL DEFAULT '',
  `bobot` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`kode_gejala`, `nama_gejala`, `bobot`) VALUES
('G01', 'Bercak pada pelepah daun', 0.2),
('G02', 'Bercak berbentuk belah ketupat pada daun dan pelepah daun', 0.9),
('G03', 'Bercak berwarna abu-abu atau agak putih dan bagian tepinya coklat/coklat kemerahan', 0.6),
('G04', 'Bercak coklat pada malai', 0.1),
('G05', 'Bercak pada daun, buku-buku/ruas, leher malai, malai dan bulir.', 0.1),
('G06', 'Busuk leher pada pangkal malai dan akhirnya malai patah', 0.2),
('G07', 'Daun mati dan mengeringnya pelepah daun', 0.4),
('G08', 'Malai hampa', 0.1),
('G09', 'Bercak berwarna coklat dengan titik tengah berwarna abu-abu atau putih pada daun', 0.8),
('G10', 'Bercak berwarna hitam atau coklat gelap pada kulit gabah', 0.4),
('G11', 'Bercak muda berwarna coklat gelap atau sedikit ungu, bentuknya membulat', 0.4),
('G12', 'Bercak pada daun berbentuk oval dan merata di permukaan daun', 0.9),
('G13', 'Konidiofor dan Konidia tampak seperti beludru', 0.1),
('G14', 'Bagian tepi bercak berwarna coklat kemerah-merahan', 0.3),
('G15', 'Gejala awal berupa bercak kecil memanjang berwarna coklat', 0.9),
('G16', 'Terdapat titik abu-abu di tengah bercak', 0.5),
('G17', 'Ukuran bercak pada gabah lebih besar dan lebih pendek', 0.2),
('G18', 'Ukuran bercak pada pelepah daun dan ketiak lebih sempit daripada daun', 0.2),
('G19', 'Ukuran bercak, panjang 2-10mm dan lebar 1 mm', 0.2),
('G20', 'Bercak berwarna hijau keabu-abuan', 0.5),
('G21', 'Bercak berbentuk bulat panjang (oval) atau elips', 0.2),
('G22', 'Bercak berwarna putih keabu-abuan dan tepi berwarna coklat', 0.3),
('G23', 'bercak membentuk sklerotia berwarna coklat dan mudah lepas', 0.3),
('G24', 'Bercak pada daun bendera', 0.1),
('G25', 'Panjang Bercak 2-3 cm', 0.3),
('G26', 'Seluruh daun menjadi hawar', 0.9),
('G27', 'Bola spora berwarna kuning, licin dan ditutup oleh membran.', 0.8),
('G28', 'Bola spora menutup bagian bunga', 0.9),
('G29', 'Bulir padi menjadi bola (bulatan) spora', 0.2),
('G30', 'Dalam satu malai hanya sedikit bulir yang terinfeksi', 0.1),
('G31', 'Membran pecah dan warnanya menjadi orange sampai kuning kehijauan atau hijau kehitaman', 0.8),
('G32', 'Malai yang dihasilkan kecil', 0.2),
('G33', 'Pertumbuhan tanaman terhambat dan kerdil', 0.4),
('G34', 'Daun berwarna kekuning-kuningan dengan bercak-bercak berwarna coklat', 0.2),
('G35', 'Daun menjadi pendek, sempit berwarna hijau', 0.8),
('G36', 'Jumlah anakan bertambah banyak dan tumbuhnya tegak', 0.9),
('G37', 'Tidak menghasilkan malai sama sekali', 0.1),
('G38', 'Bercak garis kebasahan pada tepi daun atau bagian daun yang luka', 0.8),
('G39', 'Daun layu menjadi busuk', 0.8),
('G40', 'Daun layu seperti tersiram air panas', 0.9),
('G41', 'Daun menjadi keriput', 0.5),
('G42', 'Gejala layu pada tanaman muda', 0.2),
('G43', 'Bulir mandul (steril)', 0.2),
('G44', 'Daun Menguning sampai jingga dari pucuk daun ke arah pangkal', 0.9),
('G45', 'Jumlah anakan berkurang', 0.1),
('G46', 'Terdapat bintik-bintik coklat kehitaman pada butir', 0.4),
('G47', 'Terlihat bintik-bintik coklat bekas tusukan serangga penular pada daun tua ', 0.8),
('G48', 'Terlihat seperti mottle pada daun muda ', 0.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_relasi`
--

CREATE TABLE `tb_relasi` (
  `ID` int(11) NOT NULL,
  `kode_diagnosa` varchar(16) DEFAULT NULL,
  `kode_gejala` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_relasi`
--

INSERT INTO `tb_relasi` (`ID`, `kode_diagnosa`, `kode_gejala`) VALUES
(62, 'P01', 'G01'),
(63, 'P01', 'G02'),
(64, 'P01', 'G03'),
(65, 'P01', 'G04'),
(66, 'P01', 'G05'),
(67, 'P01', 'G06'),
(68, 'P01', 'G07'),
(69, 'P01', 'G08'),
(70, 'P02', 'G09'),
(71, 'P02', 'G10'),
(72, 'P02', 'G11'),
(73, 'P02', 'G12'),
(74, 'P02', 'G13'),
(75, 'P03', 'G14'),
(76, 'P03', 'G15'),
(77, 'P03', 'G16'),
(78, 'P03', 'G17'),
(79, 'P03', 'G18'),
(80, 'P03', 'G19'),
(81, 'P04', 'G01'),
(82, 'P04', 'G20'),
(83, 'P04', 'G21'),
(84, 'P04', 'G22'),
(85, 'P04', 'G23'),
(86, 'P04', 'G24'),
(87, 'P04', 'G25'),
(88, 'P04', 'G26'),
(89, 'P05', 'G27'),
(90, 'P05', 'G28'),
(91, 'P05', 'G29'),
(92, 'P05', 'G30'),
(93, 'P05', 'G31'),
(94, 'P06', 'G32'),
(95, 'P06', 'G33'),
(96, 'P06', 'G34'),
(97, 'P06', 'G35'),
(98, 'P06', 'G36'),
(99, 'P06', 'G37'),
(100, 'P07', 'G20'),
(101, 'P07', 'G38'),
(102, 'P07', 'G39'),
(103, 'P07', 'G40'),
(104, 'P07', 'G41'),
(105, 'P07', 'G42'),
(114, 'P08', 'G32'),
(115, 'P08', 'G33'),
(116, 'P08', 'G43'),
(117, 'P08', 'G44'),
(118, 'P08', 'G45'),
(119, 'P08', 'G47'),
(120, 'P08', 'G46'),
(121, 'P08', 'G48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'user',
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user`, `pass`, `email`, `nama`, `level`, `alamat`) VALUES
(1, 'Admin', '123456789', 'user@mail.com', 'Nama User', 'user', 'alamat user'),
(2, 'pakar', 'pakar', 'pakar@mail.com', 'Nama Pakar', 'pakar', 'Alamat pakar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`kode_diagnosa`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tb_relasi`
--
ALTER TABLE `tb_relasi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_relasi`
--
ALTER TABLE `tb_relasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
