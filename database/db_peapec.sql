-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. Juni 2015 jam 12:37
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_peapec`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pemesanan` varchar(7) DEFAULT NULL,
  `id_gambar` int(11) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `harga` int(7) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `link` text,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pemesanan`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pemesanan` (
  `id_konfirmasi` int(4) NOT NULL,
  `id_pemesanan` varchar(7) DEFAULT NULL,
  `tgl_konfirmasi` datetime DEFAULT NULL,
  `tgl_delivery` date DEFAULT NULL,
  `keterangan` text,
  `diskon` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pemesanan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL,
  `Kota` varchar(20) DEFAULT NULL,
  `tarif` int(7) DEFAULT NULL,
  `durasi` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(7) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `tarif` int(7) DEFAULT NULL,
  `alamat_pengiriman` text,
  `status` varchar(6) DEFAULT NULL,
  `tgl_pemesanan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL,
  `pengirim` int(11) DEFAULT NULL,
  `penerima` int(11) DEFAULT NULL,
  `judul_pesan` text,
  `type` tinyint(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `tanggal_kirim` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(11) NOT NULL,
  `id_gambar` int(11) DEFAULT NULL,
  `jumlah_stock` int(7) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) NOT NULL,
  `user_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(150) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `user_admin`, `pass_admin`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id_barang` varchar(150) NOT NULL,
  `id_kategori` varchar(150) NOT NULL,
  `id_ukm` varchar(150) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga_normal` int(8) DEFAULT NULL,
  `harga_diskon` int(8) NOT NULL,
  `ket_barang` varchar(200) NOT NULL,
  `tgl_barang` date DEFAULT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_kategori`, `id_ukm`, `nama_barang`, `harga_normal`, `harga_diskon`, `ket_barang`, `tgl_barang`, `gambar_barang`) VALUES
('42cdbd5a20eb18c31e9ab0741a380b0d', '8ef47def8b826a62829e53911a014098', 'e789abc298c613deda074ba3c2903b80', 'Tenun Pucuk Rebung', 200000, 0, 'Keterangan Barang 1', '2015-06-16', 'produk_Annie in the Sink.jpg'),
('4dfcc992bb5e953ed3e2a93e184a0ebd', 'a7e889df90cce5e9412ab2da9bbc3315', 'd41d8cd98f00b204e9800998ecf8427e', 'Belacan Serbuk Malaka', 50000, 45000, 'Belacan yang diproses menggunakan udang pilihan yang terbaik', '2015-06-15', 'produk_belacan serbuk melaka.JPG'),
('611b9153ad4d0a45f70c00c215ef48d1', 'a7e889df90cce5e9412ab2da9bbc3315', 'd41d8cd98f00b204e9800998ecf8427e', 'Mie Sagu', 15000, 10000, 'Mie sagu yang diproses secara manual untuk memberikan rasa yang nikmat bagi pada pecinta kuliner khas indonesia', '2015-06-16', 'produk_Crater.jpg'),
('8bae88d3481c4b7758045ba17bacd6ba', 'a7e889df90cce5e9412ab2da9bbc3315', 'd41d8cd98f00b204e9800998ecf8427e', ' Belacan Bubuk', 15000, 0, 'Keterangan Belacan bubuk', '2015-06-15', 'produk_bubuk belacan.JPG'),
('f2e8c6cff67322ba8c9a231c79da11cf', 'a7e889df90cce5e9412ab2da9bbc3315', 'd41d8cd98f00b204e9800998ecf8427e', 'Belacan Pasta', 25000, 0, 'Keterangan Belacan Pasta', '2015-06-15', 'produk_belacan pasta.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE IF NOT EXISTS `tbl_informasi` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_info`, `jenis`, `ket`, `gambar`) VALUES
(1, 'Profil', '<p>isi dari profil peapec Bengkalis Baru</p>', '-'),
(2, 'Cara Pembelian', '<p>Masukkan Cara Pembelian Barang Baru</p>', '-'),
(4, 'Kontak', '<p>Masukkan Kontak PEAPEC Disini Baru</p>', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` varchar(150) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `ket_kategori` varchar(200) NOT NULL,
  `tgl_kategori` date NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `ket_kategori`, `tgl_kategori`) VALUES
('8ef47def8b826a62829e53911a014098', 'Tenun Songket Bengkalis', 'Menyediakan berbagai jenis tenun songket terbaik ', '2015-06-14'),
('a7e889df90cce5e9412ab2da9bbc3315', 'Makanan', 'Makanan Khas Daerah Melayu', '2015-06-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ukm`
--

CREATE TABLE IF NOT EXISTS `tbl_ukm` (
  `id_ukm` varchar(150) NOT NULL,
  `nama_ukm` varchar(100) NOT NULL,
  `alamat_ukm` text NOT NULL,
  `pengelola_ukm` varchar(100) NOT NULL,
  `ket_ukm` text NOT NULL,
  PRIMARY KEY (`id_ukm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ukm`
--

INSERT INTO `tbl_ukm` (`id_ukm`, `nama_ukm`, `alamat_ukm`, `pengelola_ukm`, `ket_ukm`) VALUES
('d41d8cd98f00b204e9800998ecf8427e', 'Sumber Rezeki', 'Jl. Meskom, Bengkalis', 'Udin', 'Menyediakan berbagai produk makanan seperti belacan, kerupuk ikan, dll'),
('e789abc298c613deda074ba3c2903b80', 'Tenun Bersaudara', 'Jl. Teluk Latak, Desa Teluk Latak, Bengkalis', 'Mariani', 'Menyediakan berbagai macam jenis kain tenun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `kota` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cp` varchar(13) DEFAULT NULL,
  `kodepos` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
