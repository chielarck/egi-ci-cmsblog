/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.16 : Database - cms_wc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`cms_wc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cms_wc`;

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` char(11) NOT NULL,
  `nama_file` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `banner` */

insert  into `banner`(`id`,`nama_file`,`status`) values ('BN1','BN1.jpg','active'),('BN2','BN2.jpg',NULL),('BN3','BN3.jpg',NULL);

/*Table structure for table `berita` */

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id` char(11) NOT NULL,
  `judul_berita` varchar(50) DEFAULT NULL,
  `isi_berita` text,
  `kategori` varchar(25) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `gambar_berita` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `berita` */

insert  into `berita`(`id`,`judul_berita`,`isi_berita`,`kategori`,`tgl`,`status`,`gambar_berita`) values ('BR2','Jalan Sehat','<p><img alt=\"\" src=\"/project/cms-wc/assets/content_upload/images/tg.png\" />aaaa</p>\r\n','kegiatan perusahaan','1423230895','Tampil','BR2.jpg'),('BR3','Jalan-Jalan','<p>hahaha</p>\r\n','info','1423272264','Tampil','BR3.jpg');

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

insert  into `gallery`(`id_foto`,`nama_file`) values (69,'post-02.png'),(71,'Desert.jpg'),(72,'Hydrangeas.jpg'),(73,'Jellyfish.jpg'),(75,'Chrysanthemum.jpg'),(76,'Penguins.jpg'),(77,'Tulips.jpg'),(78,'Koala.jpg'),(79,'Lighthouse.jpg');

/*Table structure for table `halaman` */

DROP TABLE IF EXISTS `halaman`;

CREATE TABLE `halaman` (
  `id` char(11) NOT NULL,
  `judul_halaman` varchar(50) DEFAULT NULL,
  `isi_halaman` text,
  `url_halaman` varchar(100) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `halaman` */

insert  into `halaman`(`id`,`judul_halaman`,`isi_halaman`,`url_halaman`,`status`) values ('HL1','Download Page','<p>yayaya</p>\r\n','download-page','Tampil'),('HL3','Career','<p>haha</p>\r\n','career','Tampil'),('HL4','holala hahahaxx','<p>gaga</p>\r\n','holala-hahahaxx','Tampil');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` char(11) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `jenis_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama_kategori`,`jenis_kategori`) values ('KG1','fashion','Berita'),('KG3','artikel','Berita');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id_user` char(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id_user`,`username`,`password`,`level`) values ('U001','admin','123','admin');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) DEFAULT NULL,
  `url_menu` varchar(100) DEFAULT NULL,
  `jenis_menu` varchar(15) DEFAULT NULL,
  `for` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`nama_menu`,`url_menu`,`jenis_menu`,`for`,`status`) values (26,'Download Page','http://localhost/project/cms-wc/page/download-page','primary','page','tampil'),(27,'Career','http://localhost/project/cms-wc/page/career','primary','page','tampil'),(30,'Manga','http://localhost/project/cms-wc/category/manga','second','category','tampil'),(32,'Office Boy','http://localhost/project/cms-wc/category/office-boy','second','category','tampil'),(33,'Home','http://www.reviewgue.ga','primary',NULL,'tampil'),(34,'ueta yaya','www.reviewgue.ga','primary',NULL,'tampil'),(35,'holala hahaha','http://localhost/project/cms-wc/page/holala-hahaha','primary','page','tampil');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` char(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `gambar_produk` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id`,`nama_produk`,`keterangan`,`kategori`,`gambar_produk`,`status`) values ('PR1','Kayu Jati','hahaha','makanan','PR1.jpg','Tampil'),('PR3','Batu akik','klklklkl','batu','PR3.jpg','Tampil'),('PR4','Keramik lah','hahaha','keramik','PR4.jpg','Tampil');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
