-- MySQL dump 10.11
--
-- Host: acs.gamatechno.net    Database: potensiutama_testing_gtakademik_portal
-- ------------------------------------------------------
-- Server version	4.1.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas` (
  `fakKode` smallint(6) NOT NULL default '0',
  `fakKodeUniv` int(11) default NULL,
  `fakNamaResmi` varchar(255) NOT NULL default '',
  `fakNamaSingkat` varchar(255) default NULL,
  `fakNamaAsing` varchar(255) default NULL,
  `fakIsEksakta` tinyint(1) unsigned default '1',
  `fakAlamat` varchar(255) default NULL,
  `fakTelp` varchar(100) default NULL,
  `fakFax` varchar(100) default NULL,
  `fakEmail` varchar(100) default NULL,
  `fakKontakPerson` varchar(255) default NULL,
  PRIMARY KEY  (`fakKode`),
  KEY `fakKode` (`fakKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

LOCK TABLES `fakultas` WRITE;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,NULL,'KEGURUAN',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),(2,NULL,'SAINS DAN TEKNOLOGI',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),(3,NULL,'ILMU KESEHATAN',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_hakakses`
--

DROP TABLE IF EXISTS `forum_hakakses`;
CREATE TABLE `forum_hakakses` (
  `fhakId` int(10) unsigned NOT NULL auto_increment,
  `fhakFtopikId` int(10) unsigned NOT NULL default '0',
  `fhakHakAksesId` smallint(6) NOT NULL default '0',
  `fhakAkses` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`fhakId`,`fhakFtopikId`,`fhakHakAksesId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_hakakses`
--

LOCK TABLES `forum_hakakses` WRITE;
/*!40000 ALTER TABLE `forum_hakakses` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_hakakses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_kategori`
--

DROP TABLE IF EXISTS `forum_kategori`;
CREATE TABLE `forum_kategori` (
  `fkatId` int(10) unsigned NOT NULL auto_increment,
  `fkatJudul` varchar(50) NOT NULL default '',
  `fkatDeskripsi` text NOT NULL,
  PRIMARY KEY  (`fkatId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_kategori`
--

LOCK TABLES `forum_kategori` WRITE;
/*!40000 ALTER TABLE `forum_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_post`
--

DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE `forum_post` (
  `fpostId` int(10) unsigned NOT NULL auto_increment,
  `fpostJudul` varchar(50) NOT NULL default '',
  `fpostIsi` text,
  `fpostTime` datetime NOT NULL default '0000-00-00 00:00:00',
  `fpostAttach` varchar(100) default NULL,
  `fpostFthreadId` int(10) unsigned NOT NULL default '0',
  `fpostUserId` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`fpostId`),
  KEY `fpostFthreadId` (`fpostFthreadId`),
  KEY `fpostUserId` (`fpostUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_post`
--

LOCK TABLES `forum_post` WRITE;
/*!40000 ALTER TABLE `forum_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_thread`
--

DROP TABLE IF EXISTS `forum_thread`;
CREATE TABLE `forum_thread` (
  `fthreadId` int(10) unsigned NOT NULL auto_increment,
  `fthreadFtopikId` int(10) unsigned NOT NULL default '0',
  `fthreadFpostId` int(10) unsigned NOT NULL default '0',
  `fthreadFmoderatorId` varchar(50) NOT NULL default '',
  `fthreadJudul` varchar(255) NOT NULL default '',
  `threadLastPost` datetime NOT NULL default '0000-00-00 00:00:00',
  `threadJmlPost` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fthreadId`),
  KEY `fthreadFtopikId` (`fthreadFtopikId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_thread`
--

LOCK TABLES `forum_thread` WRITE;
/*!40000 ALTER TABLE `forum_thread` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_topik`
--

DROP TABLE IF EXISTS `forum_topik`;
CREATE TABLE `forum_topik` (
  `ftopikId` int(10) unsigned NOT NULL auto_increment,
  `ftopikJudul` varchar(50) NOT NULL default '',
  `ftopikDeskripsi` text,
  `ftopikLastPost` datetime NOT NULL default '0000-00-00 00:00:00',
  `ftopikUserIdModerator` varchar(50) NOT NULL default '',
  `ftopikFkatId` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ftopikId`),
  KEY `ftopikFkatId` (`ftopikFkatId`),
  KEY `ftopikUserIdModerator` (`ftopikUserIdModerator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topik`
--

LOCK TABLES `forum_topik` WRITE;
/*!40000 ALTER TABLE `forum_topik` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_topik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenjang_akademik_ref`
--

DROP TABLE IF EXISTS `jenjang_akademik_ref`;
CREATE TABLE `jenjang_akademik_ref` (
  `jjarKode` varchar(10) NOT NULL default '',
  `jjarKodeDikti` char(1) default NULL,
  `jjarNama` varchar(100) default NULL,
  PRIMARY KEY  (`jjarKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang_akademik_ref`
--

LOCK TABLES `jenjang_akademik_ref` WRITE;
/*!40000 ALTER TABLE `jenjang_akademik_ref` DISABLE KEYS */;
INSERT INTO `jenjang_akademik_ref` VALUES ('D1','G','Diploma 1'),('D2','F','Diploma 2'),('D3','E','Diploma 3'),('D4','D','Diploma 4'),('NON-AKAD','X','NON-AKADEMIK'),('PR','J','Profesi'),('S1','C','Strata 1'),('S2','B','Strata 2'),('S3','A','Strata 3'),('Sp-1','H',NULL),('Sp-2','I',NULL),('TAMAT SD','M','TAMAT SD'),('TAMAT SMA','K','TAMAT SMA'),('TAMAT SMP','L','TAMAT SMP'),('TDK TMT SD','N','TIDAK TAMAT SD');
/*!40000 ALTER TABLE `jenjang_akademik_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `jurKode` smallint(6) NOT NULL default '0',
  `jurKodeuniv` varchar(10) default NULL,
  `jurFakKode` smallint(6) default NULL,
  `jurNamaResmi` varchar(255) NOT NULL default '',
  `jurNamaSingkat` varchar(255) default NULL,
  `jurNamaAsing` varchar(255) default NULL,
  `jurAlamat` varchar(255) default NULL,
  `jurTelp` varchar(100) default NULL,
  `jurFax` varchar(100) default NULL,
  `jurEmail` varchar(100) default NULL,
  `jurKontakPerson` varchar(255) default NULL,
  `jurLuasKebunPercobaan` float default '0',
  `jurLuasRuangKuliah` float default '0',
  `jurJumlahRuangKuliah` smallint(6) default '0',
  `jurLuasLaboratorium` float default '0',
  `jurJumlahRuangLaboratorium` smallint(6) default '0',
  `jurLuasRuangDosenTetap` float default '0',
  `jurLuasRuangAdministrasi` float default '0',
  `jurJumlahJudulBuku` int(11) default '0',
  `jurJumlahEksemplarBuku` int(11) default '0',
  PRIMARY KEY  (`jurKode`),
  KEY `jurNamaAsing` (`jurNamaAsing`),
  KEY `jurFakKode` (`jurFakKode`),
  CONSTRAINT `jur_fak_jurFakKode` FOREIGN KEY (`jurFakKode`) REFERENCES `fakultas` (`fakKode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES (1,NULL,1,'Pendidikan Fisika',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(2,NULL,1,'Pendidikan Biologi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(3,NULL,1,'TADRIS','TD',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(4,NULL,1,'Pendidikan Agama Islam',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(5,NULL,1,'Pendidikan Bahasa Arab',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(6,NULL,1,'Kependidikan Islam',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(7,NULL,1,'Pendidikan Guru Madrasah Ibtidaiyah  (PGMI)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(8,NULL,2,'Teknik Informatika',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(9,NULL,2,'Teknik Arsitektur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(10,NULL,2,'Teknik Perenc. Wil. & Kota',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(11,NULL,2,'Matematika',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(12,NULL,2,'Fisika',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(13,NULL,2,'Biologi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(14,NULL,2,'Kimia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(15,NULL,2,'Ilmu Peternakan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(16,NULL,3,'Keperawatan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(17,NULL,3,'Kesehatan Masyarakat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(18,NULL,3,'Farmasi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(19,NULL,3,'Kebidanan (D3)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(42,NULL,2,'Sistem Informasi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0),(47,'47',1,'Kependidikan Islam',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_ref`
--

DROP TABLE IF EXISTS `model_ref`;
CREATE TABLE `model_ref` (
  `modelrId` smallint(6) NOT NULL default '0',
  `modelrNama` varchar(50) default NULL,
  PRIMARY KEY  (`modelrId`),
  KEY `modelrId` (`modelrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_ref`
--

LOCK TABLES `model_ref` WRITE;
/*!40000 ALTER TABLE `model_ref` DISABLE KEYS */;
INSERT INTO `model_ref` VALUES (0,'-'),(1,'Reguler'),(2,'Ekstensi');
/*!40000 ALTER TABLE `model_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_studi`
--

DROP TABLE IF EXISTS `program_studi`;
CREATE TABLE `program_studi` (
  `prodiKode` int(11) NOT NULL default '0',
  `prodiKodeUm` varchar(10) default NULL,
  `prodiKodeUniv` varchar(10) default NULL,
  `prodiLabelNim` varchar(5) default NULL,
  `prodiJurKode` smallint(6) default NULL,
  `prodiFakKode` smallint(6) default NULL,
  `prodiNamaResmi` varchar(255) NOT NULL default '',
  `prodiNamaSingkat` varchar(255) default NULL,
  `prodiNamaAsing` varchar(255) default NULL,
  `prodiNamaJenjang` varchar(255) default NULL,
  `prodiJjarKode` varchar(10) default NULL,
  `prodiModelrId` smallint(6) default NULL,
  PRIMARY KEY  (`prodiKode`),
  UNIQUE KEY `prodiUniqueKey` (`prodiKodeUm`,`prodiJjarKode`,`prodiModelrId`),
  KEY `prodiJurKode` (`prodiJurKode`),
  KEY `prodiJjarKode` (`prodiJjarKode`),
  KEY `prodiModelrId` (`prodiModelrId`),
  KEY `program_studi_ibfk_2` (`prodiFakKode`),
  CONSTRAINT `program_studi_ibfk_2` FOREIGN KEY (`prodiFakKode`) REFERENCES `fakultas` (`fakKode`) ON UPDATE CASCADE,
  CONSTRAINT `program_studi_ibfk_3` FOREIGN KEY (`prodiModelrId`) REFERENCES `model_ref` (`modelrId`) ON UPDATE CASCADE,
  CONSTRAINT `pro_jen_prodiJjarKode` FOREIGN KEY (`prodiJjarKode`) REFERENCES `jenjang_akademik_ref` (`jjarKode`) ON UPDATE CASCADE,
  CONSTRAINT `pro_jur_prodiJurKode` FOREIGN KEY (`prodiJurKode`) REFERENCES `jurusan` (`jurKode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

LOCK TABLES `program_studi` WRITE;
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` VALUES (1,NULL,'26112','12345',1,NULL,'PENDIDIKAN FISIKA',NULL,NULL,NULL,'S1',1),(2,NULL,'27113',NULL,2,1,'Pendidikan Biologi',NULL,NULL,NULL,'S1',1),(3,NULL,'25114',NULL,3,NULL,'Pendidikan Matematika',NULL,NULL,NULL,'S1',1),(4,NULL,'21210',NULL,4,1,'Pendidikan Agama Islam',NULL,NULL,NULL,'S1',1),(5,NULL,'22211',NULL,5,1,'Pendidikan Bahasa Arab',NULL,NULL,NULL,'S1',1),(6,NULL,'23212',NULL,3,NULL,'Pendidikan Bahasa Inggris',NULL,NULL,NULL,'S1',1),(7,NULL,'24213',NULL,6,NULL,'Manajemen Pendidikan Islam',NULL,NULL,NULL,'S1',1),(8,NULL,'28229',NULL,7,1,'Pendidikan Guru Madrasah Ibtidaiyah  (PGMI)',NULL,NULL,NULL,'S1',1),(9,NULL,'61104',NULL,8,2,'Teknik Informatika',NULL,NULL,NULL,'S1',1),(10,NULL,'62105',NULL,9,2,'Teknik Arsitektur',NULL,NULL,NULL,'S1',1),(11,NULL,'63106',NULL,10,NULL,'Teknik Perencanaan Wilayah & Kota',NULL,NULL,NULL,'S1',1),(12,NULL,'64107',NULL,11,2,'Matematika',NULL,NULL,NULL,'S1',1),(13,NULL,'65108',NULL,12,2,'Fisika',NULL,NULL,NULL,'S1',1),(14,NULL,'66109',NULL,13,2,'Biologi',NULL,NULL,NULL,'S1',1),(15,NULL,'67110',NULL,14,2,'Kimia',NULL,NULL,NULL,'S1',1),(16,NULL,'68111',NULL,15,2,'Ilmu Peternakan',NULL,NULL,NULL,'S1',1),(17,NULL,'72101',NULL,16,3,'Keperawatan',NULL,NULL,NULL,'S1',1),(18,NULL,'71102',NULL,17,3,'Kesehatan Masyarakat',NULL,NULL,NULL,'S1',1),(19,NULL,'73103',NULL,18,3,'Farmasi',NULL,NULL,NULL,'S1',1),(20,NULL,'74115',NULL,19,3,'Kebidanan (D3)',NULL,NULL,NULL,'D3',1),(47,'47','24213','47',47,1,'Kependidikan Islam',NULL,NULL,'S1 REG','S1',1),(147,'147','57201','57201',42,2,'SISTEM INFORMASI',NULL,NULL,NULL,'S1',1);
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_jawaban`
--

DROP TABLE IF EXISTS `q_jawaban`;
CREATE TABLE `q_jawaban` (
  `jwbnId` bigint(20) NOT NULL auto_increment,
  `jwbnIsi` varchar(255) default NULL,
  `jwbnSoalId` bigint(20) default NULL,
  PRIMARY KEY  (`jwbnId`),
  KEY `jwbnSoalId` (`jwbnSoalId`),
  CONSTRAINT `q_jawaban_ibfk_1` FOREIGN KEY (`jwbnSoalId`) REFERENCES `q_soal` (`soalId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `q_jawaban`
--

LOCK TABLES `q_jawaban` WRITE;
/*!40000 ALTER TABLE `q_jawaban` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_jawaban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_jenis_pertanyaan`
--

DROP TABLE IF EXISTS `q_jenis_pertanyaan`;
CREATE TABLE `q_jenis_pertanyaan` (
  `jnsPertanyaanId` int(11) NOT NULL auto_increment,
  `jnsPertanyaanIsi` varchar(255) default NULL,
  PRIMARY KEY  (`jnsPertanyaanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `q_jenis_pertanyaan`
--

LOCK TABLES `q_jenis_pertanyaan` WRITE;
/*!40000 ALTER TABLE `q_jenis_pertanyaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_jenis_pertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_soal`
--

DROP TABLE IF EXISTS `q_soal`;
CREATE TABLE `q_soal` (
  `soalId` bigint(20) NOT NULL auto_increment,
  `soalIsi` varchar(255) default NULL,
  `soalJnsPertanyaanId` int(11) default NULL,
  `soalTipeJwbnId` int(11) default NULL,
  PRIMARY KEY  (`soalId`),
  KEY `soalJnsPertanyaanId` (`soalJnsPertanyaanId`),
  KEY `soalTipeJwbnId` (`soalTipeJwbnId`),
  CONSTRAINT `q_soal_ibfk_1` FOREIGN KEY (`soalJnsPertanyaanId`) REFERENCES `q_jenis_pertanyaan` (`jnsPertanyaanId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `q_soal_ibfk_2` FOREIGN KEY (`soalTipeJwbnId`) REFERENCES `q_tipe_jawaban` (`tipeJwbnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `q_soal`
--

LOCK TABLES `q_soal` WRITE;
/*!40000 ALTER TABLE `q_soal` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_tipe_jawaban`
--

DROP TABLE IF EXISTS `q_tipe_jawaban`;
CREATE TABLE `q_tipe_jawaban` (
  `tipeJwbnId` int(11) NOT NULL auto_increment,
  `tipeJwbn` varchar(255) default NULL,
  PRIMARY KEY  (`tipeJwbnId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_tipe_jawaban`
--

LOCK TABLES `q_tipe_jawaban` WRITE;
/*!40000 ALTER TABLE `q_tipe_jawaban` DISABLE KEYS */;
INSERT INTO `q_tipe_jawaban` VALUES (1,'Multiple Choice'),(2,'Essay');
/*!40000 ALTER TABLE `q_tipe_jawaban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_trans_jawaban`
--

DROP TABLE IF EXISTS `q_trans_jawaban`;
CREATE TABLE `q_trans_jawaban` (
  `jwbnTusrNama` varchar(255) NOT NULL default '0',
  `jwbnSoalId` bigint(20) NOT NULL default '0',
  `jwbnJawaban` bigint(20) default NULL,
  `jwbnDeskripsi` text,
  PRIMARY KEY  (`jwbnTusrNama`,`jwbnSoalId`),
  KEY `jwbnSoalId` (`jwbnSoalId`),
  KEY `jwbnJawaban` (`jwbnJawaban`),
  CONSTRAINT `q_trans_jawaban_ibfk_1` FOREIGN KEY (`jwbnTusrNama`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `q_trans_jawaban_ibfk_2` FOREIGN KEY (`jwbnSoalId`) REFERENCES `q_soal` (`soalId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `q_trans_jawaban_ibfk_3` FOREIGN KEY (`jwbnJawaban`) REFERENCES `q_jawaban` (`jwbnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `q_trans_jawaban`
--

LOCK TABLES `q_trans_jawaban` WRITE;
/*!40000 ALTER TABLE `q_trans_jawaban` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_trans_jawaban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_fakultas_pengumuman_link`
--

DROP TABLE IF EXISTS `t_fakultas_pengumuman_link`;
CREATE TABLE `t_fakultas_pengumuman_link` (
  `fpmlPmId` bigint(20) NOT NULL default '0',
  `fpmlFakId` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`fpmlPmId`,`fpmlFakId`),
  KEY `fpmlFakId` (`fpmlFakId`),
  KEY `fpmlPmId` (`fpmlPmId`),
  CONSTRAINT `t_fakultas_pengumuman_link_ibfk_1` FOREIGN KEY (`fpmlPmId`) REFERENCES `t_pengumuman` (`pmId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_f_fak_fpmlFakId` FOREIGN KEY (`fpmlFakId`) REFERENCES `fakultas` (`fakKode`) ON UPDATE CASCADE,
  CONSTRAINT `t_f_t_p_fpmlPmId` FOREIGN KEY (`fpmlPmId`) REFERENCES `t_pengumuman` (`pmId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_fakultas_pengumuman_link`
--

LOCK TABLES `t_fakultas_pengumuman_link` WRITE;
/*!40000 ALTER TABLE `t_fakultas_pengumuman_link` DISABLE KEYS */;
INSERT INTO `t_fakultas_pengumuman_link` VALUES (1,2);
/*!40000 ALTER TABLE `t_fakultas_pengumuman_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_faq`
--

DROP TABLE IF EXISTS `t_faq`;
CREATE TABLE `t_faq` (
  `faqId` int(11) NOT NULL auto_increment,
  `faqPertanyaan` text NOT NULL,
  `faqJawaban` text NOT NULL,
  `faqFktgrId` int(11) NOT NULL default '0',
  `faqIsPublic` int(1) NOT NULL default '0',
  PRIMARY KEY  (`faqId`),
  KEY `t_t_t_p_faqFktgrId` (`faqFktgrId`),
  CONSTRAINT `t_t_t_p_faqFktgrId` FOREIGN KEY (`faqFktgrId`) REFERENCES `t_faq_kategori` (`fktgrId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_faq`
--

LOCK TABLES `t_faq` WRITE;
/*!40000 ALTER TABLE `t_faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_faq_kategori`
--

DROP TABLE IF EXISTS `t_faq_kategori`;
CREATE TABLE `t_faq_kategori` (
  `fktgrId` int(11) NOT NULL auto_increment,
  `fktgrNama` varchar(100) NOT NULL default '',
  `fktgrKeterangan` varchar(255) default NULL,
  PRIMARY KEY  (`fktgrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_faq_kategori`
--

LOCK TABLES `t_faq_kategori` WRITE;
/*!40000 ALTER TABLE `t_faq_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_faq_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_faq_tujuan`
--

DROP TABLE IF EXISTS `t_faq_tujuan`;
CREATE TABLE `t_faq_tujuan` (
  `ftjFaqId` int(11) NOT NULL default '0',
  `ftjThakrId` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`ftjFaqId`,`ftjThakrId`),
  KEY `ftjFaqId` (`ftjFaqId`),
  KEY `ftjThakrId` (`ftjThakrId`),
  CONSTRAINT `t_t_t_h_ftjThakrId` FOREIGN KEY (`ftjThakrId`) REFERENCES `t_hak_akses_ref` (`thakrId`) ON UPDATE CASCADE,
  CONSTRAINT `t_t_t_p_ftjFaqId` FOREIGN KEY (`ftjFaqId`) REFERENCES `t_faq` (`faqId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_faq_tujuan`
--

LOCK TABLES `t_faq_tujuan` WRITE;
/*!40000 ALTER TABLE `t_faq_tujuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_faq_tujuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_feedback`
--

DROP TABLE IF EXISTS `t_feedback`;
CREATE TABLE `t_feedback` (
  `fbId` int(11) NOT NULL auto_increment,
  `fbTusrNama` varchar(255) default NULL,
  `fbTanggalPost` datetime default NULL,
  `fbIsi` text,
  `fbKomentar` text,
  `fbTanggalKomentar` datetime default NULL,
  `fbFbprId` tinyint(3) unsigned default NULL,
  PRIMARY KEY  (`fbId`),
  KEY `FK_fbTusrNama` (`fbTusrNama`),
  KEY `FK_fbFbprId` (`fbFbprId`),
  CONSTRAINT `FK_fbFbprId` FOREIGN KEY (`fbFbprId`) REFERENCES `t_feedback_priority` (`fbprId`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_fbTusrNama` FOREIGN KEY (`fbTusrNama`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_feedback`
--

LOCK TABLES `t_feedback` WRITE;
/*!40000 ALTER TABLE `t_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_feedback_priority`
--

DROP TABLE IF EXISTS `t_feedback_priority`;
CREATE TABLE `t_feedback_priority` (
  `fbprId` tinyint(3) unsigned NOT NULL default '0',
  `fbprNama` varchar(50) default NULL,
  PRIMARY KEY  (`fbprId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_feedback_priority`
--

LOCK TABLES `t_feedback_priority` WRITE;
/*!40000 ALTER TABLE `t_feedback_priority` DISABLE KEYS */;
INSERT INTO `t_feedback_priority` VALUES (0,''),(1,'sangat penting'),(2,'penting'),(3,'sedang'),(4,'kurang penting'),(5,'tidak penting');
/*!40000 ALTER TABLE `t_feedback_priority` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_hak_akses_ref`
--

DROP TABLE IF EXISTS `t_hak_akses_ref`;
CREATE TABLE `t_hak_akses_ref` (
  `thakrId` smallint(6) NOT NULL default '0',
  `thakrNama` varchar(255) default NULL,
  `thakrDesc` varchar(255) default NULL,
  `thakrKode` varchar(40) default NULL,
  PRIMARY KEY  (`thakrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hak_akses_ref`
--

LOCK TABLES `t_hak_akses_ref` WRITE;
/*!40000 ALTER TABLE `t_hak_akses_ref` DISABLE KEYS */;
INSERT INTO `t_hak_akses_ref` VALUES (1,'Mahasiswa',NULL,'MAHASISWA'),(2,'Dosen',NULL,'DOSEN'),(3,'Administrasi','','ADMINISTRASI'),(4,'Orang Tua',NULL,'ORTU'),(5,'Eksekutif',NULL,'EKSEKUTIF'),(6,'Admin Unit',NULL,'ADMINUNIT'),(7,'Tenaga Kependidikan',NULL,'KEPENDIDIKAN');
/*!40000 ALTER TABLE `t_hak_akses_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_login_history`
--

DROP TABLE IF EXISTS `t_login_history`;
CREATE TABLE `t_login_history` (
  `loghisTusrNama` varchar(255) NOT NULL default '',
  `loghisTanggal` datetime NOT NULL default '0000-00-00 00:00:00',
  `loghisIp` varchar(50) default NULL,
  PRIMARY KEY  (`loghisTusrNama`,`loghisTanggal`),
  CONSTRAINT `t_login_history_ibfk_1` FOREIGN KEY (`loghisTusrNama`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_login_history`
--

LOCK TABLES `t_login_history` WRITE;
/*!40000 ALTER TABLE `t_login_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_login_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pengumuman`
--

DROP TABLE IF EXISTS `t_pengumuman`;
CREATE TABLE `t_pengumuman` (
  `pmId` bigint(20) NOT NULL auto_increment,
  `pmProdiKode` int(11) default NULL,
  `pmTppmrId` smallint(6) NOT NULL default '0',
  `pmTanggal` date default NULL,
  `pmJudul` varchar(255) default NULL,
  `pmIsi` text,
  `pmImagePath` varchar(255) default NULL,
  `pmImageAlt` varchar(255) default NULL,
  PRIMARY KEY  (`pmId`),
  KEY `pmId` (`pmId`),
  KEY `pmTppmrId` (`pmTppmrId`),
  KEY `pmProdiKode` (`pmProdiKode`),
  CONSTRAINT `t_p_pro_pmProdiKode` FOREIGN KEY (`pmProdiKode`) REFERENCES `program_studi` (`prodiKode`) ON UPDATE CASCADE,
  CONSTRAINT `t_p_t_t_pmTppmrId` FOREIGN KEY (`pmTppmrId`) REFERENCES `t_tipe_pengumuman_ref` (`tppmrId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengumuman`
--

LOCK TABLES `t_pengumuman` WRITE;
/*!40000 ALTER TABLE `t_pengumuman` DISABLE KEYS */;
INSERT INTO `t_pengumuman` VALUES (1,NULL,2,'2012-04-24','Workshop Internet','Internet itu Penting','','');
/*!40000 ALTER TABLE `t_pengumuman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pesan`
--

DROP TABLE IF EXISTS `t_pesan`;
CREATE TABLE `t_pesan` (
  `pesanId` int(11) NOT NULL auto_increment,
  `pesanTusrNamaPengirim` varchar(255) NOT NULL default '',
  `pesanTusrNamaPenerima` varchar(255) NOT NULL default '',
  `pesanJudul` varchar(255) default NULL,
  `pesanIsi` text,
  `pesanWaktuKirim` datetime default NULL,
  `pesanWaktuBaca` datetime default NULL,
  `pesanWaktuDihapus` datetime default NULL,
  `pesanIsDihapusPengirim` tinyint(9) default NULL,
  `pesanisDihapusPenerima` tinyint(8) default NULL,
  PRIMARY KEY  (`pesanId`),
  KEY `pesanTusrNamaPengirim` (`pesanTusrNamaPengirim`),
  KEY `pesanTusrNamaPenerima` (`pesanTusrNamaPenerima`),
  KEY `pesanIsDihapusPengirim` (`pesanIsDihapusPengirim`),
  KEY `pesanisDihapusPenerima` (`pesanisDihapusPenerima`),
  CONSTRAINT `t_pesan_ibfk_1` FOREIGN KEY (`pesanTusrNamaPengirim`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_pesan_ibfk_2` FOREIGN KEY (`pesanTusrNamaPenerima`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pesan`
--

LOCK TABLES `t_pesan` WRITE;
/*!40000 ALTER TABLE `t_pesan` DISABLE KEYS */;
INSERT INTO `t_pesan` VALUES (1,'60200108003','60300110008','test','test','2012-04-24 14:57:28','2012-04-24 14:58:55',NULL,NULL,NULL);
/*!40000 ALTER TABLE `t_pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tipe_pengumuman_ref`
--

DROP TABLE IF EXISTS `t_tipe_pengumuman_ref`;
CREATE TABLE `t_tipe_pengumuman_ref` (
  `tppmrId` smallint(6) NOT NULL default '0',
  `tppmrNama` varchar(255) default NULL,
  PRIMARY KEY  (`tppmrId`),
  KEY `tppmrId` (`tppmrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tipe_pengumuman_ref`
--

LOCK TABLES `t_tipe_pengumuman_ref` WRITE;
/*!40000 ALTER TABLE `t_tipe_pengumuman_ref` DISABLE KEYS */;
INSERT INTO `t_tipe_pengumuman_ref` VALUES (1,'Informasi Akademik'),(2,'Kegiatan Mahasiswa'),(3,'Seputar Registrasi');
/*!40000 ALTER TABLE `t_tipe_pengumuman_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tujuan_pengumuman_link`
--

DROP TABLE IF EXISTS `t_tujuan_pengumuman_link`;
CREATE TABLE `t_tujuan_pengumuman_link` (
  `tjpmlPmId` bigint(20) NOT NULL default '0',
  `tjpmThakrId` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`tjpmlPmId`,`tjpmThakrId`),
  KEY `tjpmThakrId` (`tjpmThakrId`),
  KEY `tjpmlPmId` (`tjpmlPmId`),
  CONSTRAINT `t_tujuan_pengumuman_link_ibfk_1` FOREIGN KEY (`tjpmlPmId`) REFERENCES `t_pengumuman` (`pmId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_t_t_h_tjpmThakrId` FOREIGN KEY (`tjpmThakrId`) REFERENCES `t_hak_akses_ref` (`thakrId`) ON UPDATE CASCADE,
  CONSTRAINT `t_t_t_p_tjpmlPmId` FOREIGN KEY (`tjpmlPmId`) REFERENCES `t_pengumuman` (`pmId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tujuan_pengumuman_link`
--

LOCK TABLES `t_tujuan_pengumuman_link` WRITE;
/*!40000 ALTER TABLE `t_tujuan_pengumuman_link` DISABLE KEYS */;
INSERT INTO `t_tujuan_pengumuman_link` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `t_tujuan_pengumuman_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_unit`
--

DROP TABLE IF EXISTS `t_unit`;
CREATE TABLE `t_unit` (
  `untId` int(3) unsigned NOT NULL default '0',
  `untServiceAddress` varchar(255) default NULL,
  `untNama` varchar(255) default NULL,
  PRIMARY KEY  (`untId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_unit`
--

LOCK TABLES `t_unit` WRITE;
/*!40000 ALTER TABLE `t_unit` DISABLE KEYS */;
INSERT INTO `t_unit` VALUES (1011001,'http://academica.gamatechno.net/academicademo/ams/gtakademik/portal_services/index.service.php','Sia'),(1021001,'http://academica.gamatechno.net/academicademo/ams/gtakademik_portal/index.service.php','Portal');
/*!40000 ALTER TABLE `t_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `tusrNama` varchar(255) NOT NULL default '',
  `tusrPassword` varchar(255) default NULL,
  `tusrThakrId` smallint(6) NOT NULL default '0',
  `tusrProfil` varchar(40) default NULL,
  `tusrPertanyaan` varchar(255) default NULL,
  `tusrJawaban` varchar(255) default NULL,
  `tusrSignature` varchar(255) default NULL,
  `tusrAvatar` varchar(100) default NULL,
  `tusrEmail` varchar(50) default NULL,
  `tusrIsTampilBiodata` tinyint(1) unsigned NOT NULL default '0',
  `tusrNoTelp` varchar(50) default NULL,
  `tusrRefIndex` varchar(255) default NULL,
  `tusrUntId` int(3) unsigned default NULL,
  `tusrIsAgree` tinyint(3) unsigned default '0',
  `tusrAgreementDate` datetime default NULL,
  `tusrLastAccess` datetime default NULL,
  `tusrIsOnline` tinyint(1) default '0',
  `tusrProdiKode` int(11) default NULL,
  PRIMARY KEY  (`tusrNama`),
  KEY `tusrThakrId` (`tusrThakrId`),
  KEY `tusrRefIndex` (`tusrRefIndex`),
  KEY `tusrPassword` (`tusrPassword`),
  KEY `tusruntId` (`tusrUntId`),
  KEY `tusrProdiKode` (`tusrProdiKode`),
  CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`tusrUntId`) REFERENCES `t_unit` (`untId`) ON UPDATE CASCADE,
  CONSTRAINT `t_user_ibfk_2` FOREIGN KEY (`tusrProdiKode`) REFERENCES `program_studi` (`prodiKode`) ON UPDATE CASCADE,
  CONSTRAINT `t_u_t_h_tusrThakrId` FOREIGN KEY (`tusrThakrId`) REFERENCES `t_hak_akses_ref` (`thakrId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

LOCK TABLES `t_user` WRITE;
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` VALUES ('000000','e10adc3949ba59abbe56e057f20f883e',2,'Baxter Nathan',NULL,NULL,NULL,NULL,NULL,0,NULL,'000000',1011001,1,'2012-03-16 08:35:32','2012-03-16 08:34:02',1,9),('00000000','db5fa1dc7b2d4d0342dbc3a5347eef1b',1,'Mallory Hyde',NULL,NULL,NULL,NULL,NULL,0,NULL,'00000000',1011001,0,NULL,NULL,0,3),('001','a7fcaece738720d68969a6b4c7b2fedf',1,'Randall Haney',NULL,NULL,NULL,NULL,NULL,0,NULL,'001',1011001,0,NULL,NULL,0,3),('00100503027','16eedc8db16f28017f1141dbcd28b7b8',1,'Aurora Hooper',NULL,NULL,NULL,NULL,NULL,0,NULL,'00100503027',1011001,0,NULL,NULL,0,3),('002','4196ed469c5f66bfb4e0126dfaa77af5',1,'Vera Marsh',NULL,NULL,NULL,NULL,NULL,0,NULL,'002',1011001,0,NULL,'2012-01-03 07:43:56',1,3),('0030104015','3f8bda4d77c38c75b89af3f5caedfe76',1,'Lee Tyson',NULL,NULL,NULL,NULL,NULL,0,NULL,'0030104015',1011001,0,NULL,NULL,0,5),('01048276','3462102c865778e8fbad75668a5e3a8b',1,'Fay Farley',NULL,NULL,NULL,NULL,NULL,0,NULL,'01048276',1011001,0,NULL,NULL,0,3),('01048300','0226fafa4563292120bd0c6d8d713e43',1,'Daniel Duke',NULL,NULL,NULL,NULL,NULL,0,NULL,'01048300',1011001,0,NULL,NULL,0,3),('197509092009121001','e86e234e3b71bfba9a0ab95ab0de36b1',2,'Andrews Calvin',NULL,NULL,NULL,NULL,NULL,0,NULL,'197509092009121001',1011001,0,NULL,NULL,0,16),('198109122009122008','c4ca4238a0b923820dcc509a6f75849b',2,'Day Bryar',NULL,NULL,NULL,NULL,NULL,0,NULL,'198109122009122008',1011001,1,'2011-11-15 14:51:33','2011-11-15 14:50:17',1,14),('198211102009122005','c03e19a11ade2dc73ab73bf82cb1c29c',2,'Burton Montana',NULL,NULL,NULL,NULL,NULL,0,NULL,'198211102009122005',1011001,1,'2011-11-03 11:26:08','2012-05-10 20:36:15',0,14),('198211102009122006','429457432c47eb150bd92210cfdc1c0c',2,'Pedro Salfaro',NULL,NULL,NULL,NULL,NULL,0,NULL,'198211102009122009',1011001,0,NULL,NULL,0,1),('198306112009122004','73b536a80011b2958bd03775ef344712',2,'Chaney Beck',NULL,NULL,NULL,NULL,NULL,0,NULL,'198306112009122004',1011001,0,NULL,'2012-04-10 13:35:51',1,13),('20100109035','26d345c239e5e18299559cbbc0b30fca',1,'Eliana Crawford',NULL,NULL,NULL,NULL,NULL,0,NULL,'20100109035',1011001,0,NULL,NULL,0,4),('60200105003','3df5c740cfde8efea783b5b9b33238a0',1,'ALMAINAH',NULL,NULL,NULL,NULL,NULL,0,NULL,'60200105003',1011001,1,'2011-09-20 11:21:49','2011-09-20 11:21:40',1,9),('60200108003','bfebf8718c3851f502c9d5d99c646a05',1,'ISMAIL',NULL,NULL,NULL,NULL,NULL,0,NULL,'60200108003',1011001,1,'2011-09-16 13:38:34','2012-04-24 14:55:50',0,9),('60200108009','01e0f15738a7e7133a1179e5b6b28b1b',1,'GUNAWAN',NULL,NULL,NULL,NULL,NULL,0,NULL,'60200108009',1011001,1,'2011-09-20 11:18:37','2011-09-20 11:17:50',0,9),('60200109001','adbcb0ea40f458f3ef08733ea8c114fd',1,'A BASIT RIZAL F',NULL,NULL,NULL,NULL,NULL,0,NULL,'60200109001',1011001,1,'2011-10-13 10:50:26','2012-04-24 16:01:19',0,9),('60300105001','4b898eeda45b5c36f28e3d0f0ad30e72',1,'Zeus Pace',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105001',1011001,0,NULL,NULL,0,14),('60300105002','32fd7a13399c740d289fe50f1647ee5b',1,'Abigail Anderson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105002',1011001,0,NULL,NULL,0,14),('60300105003','3ccb8208d2e199b24d39d2dc626d0172',1,'Christen Eaton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105003',1011001,0,NULL,NULL,0,14),('60300105004','9b88bfba26306e453f8576b0af8b6ab9',1,'Kenyon Sargent',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105004',1011001,0,NULL,NULL,0,14),('60300105005','38b43925c2b9d2e080a8778fd390c6d9',1,'Aimee Fernandez',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105005',1011001,0,NULL,NULL,0,14),('60300105006','617727ce9016651edc3a0f7c0ec4fa14',1,'Harding Suarez',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105006',1011001,0,NULL,NULL,0,14),('60300105007','efe4a0e7b0930ede0df9f1f1153cd3d7',1,'Blaze Hudson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105007',1011001,0,NULL,NULL,0,14),('60300105008','a35735b29524accf3bca8a4af2efad7a',1,'Fuller Cooper',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105008',1011001,0,NULL,NULL,0,14),('60300105009','523b9c7dccfe05fc1c0f9d385c907cd7',1,'Rhiannon Tate',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105009',1011001,0,NULL,NULL,0,14),('60300105010','34f36707dd3559fb78ca597bdfb79505',1,'Jolie Michael',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105010',1011001,0,NULL,NULL,0,14),('60300105011','f6eb7e843dba8229a075023306a549be',1,'Pamela Cabrera',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105011',1011001,0,NULL,NULL,0,14),('60300105012','dd525578308cc0a8f18e06822434361d',1,'Athena Rocha',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105012',1011001,0,NULL,NULL,0,14),('60300105013','7731100bb6512cb4faec4435300102a8',1,'Mary Leonard',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105013',1011001,0,NULL,NULL,0,14),('60300105014','5dccb95f59b44f470f1a1d9c54aa4b8c',1,'Libby Davenport',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105014',1011001,0,NULL,NULL,0,14),('60300105015','f824efdd49a115a65c5592e0427e6dd2',1,'Kennan Summers',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105015',1011001,0,NULL,NULL,0,14),('60300105016','624e024acc30963996a9b5e1a477733c',1,'Cherokee Lewis',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105016',1011001,0,NULL,NULL,0,14),('60300105017','f2bf28166e3f13af00f76dd50e19c15b',1,'Leah Conrad',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105017',1011001,0,NULL,NULL,0,14),('60300105018','e7eb5c0eba11984f97bf022b7d344d5b',1,'Kimberley Roberson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105018',1011001,0,NULL,NULL,0,14),('60300105019','e30992bd1f5bc2c73293317f2484de78',1,'Jamal Boyer',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105019',1011001,0,NULL,NULL,0,14),('60300105020','ddc4378ac81139992f6fc9f6bd2d748a',1,'Liberty Jimenez',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105020',1011001,0,NULL,NULL,0,14),('60300105021','139c151c6ca3fa2278a04d3b20909953',1,'Hakeem Winters',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105021',1011001,0,NULL,NULL,0,14),('60300105022','6f4029bccad7f1eba2e757b95d4d152d',1,'Grace Jordan',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105022',1011001,0,NULL,NULL,0,14),('60300105023','652832aa72add43af22ddc2cbdb7beb2',1,'Indigo Osborn',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105023',1011001,0,NULL,NULL,0,14),('60300105024','ef7d66205a83e7f66624a9836680bd6a',1,'Morgan Dejesus',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300105024',1011001,0,NULL,NULL,0,14),('60300106001','450b332d9740f58e61ef51aa8c5afbae',1,'Leila Church',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106001',1011001,0,NULL,NULL,0,14),('60300106002','c2b91e36b19af1c122cc693d1abf5a50',1,'Shelly Gardner',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106002',1011001,0,NULL,NULL,0,14),('60300106003','e8332c15be78270869ee4504cf4ab8c9',1,'Eric Vincent',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106003',1011001,0,NULL,NULL,0,14),('60300106004','0a4ec0d8a3b445fba5d8f12d36243612',1,'Blythe Weber',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106004',1011001,0,NULL,NULL,0,14),('60300106005','4e68f57e69e57ad441cef05841b7cc4f',1,'James Pate',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106005',1011001,0,NULL,NULL,0,14),('60300106006','7389f8951494f764f742d83bbe2e7a6d',1,'Chadwick Young',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106006',1011001,0,NULL,NULL,0,14),('60300106007','702a1020f2628bc29f4ca1a0d7f5dc55',1,'Lesley Guerra',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106007',1011001,0,NULL,NULL,0,14),('60300106008','8ddfb2cbe99b5ce9bedfd33beb7ed5ce',1,'Keith Church',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106008',1011001,0,NULL,NULL,0,14),('60300106009','5f755b9f944a08d676fdcef4ab58e150',1,'Kyra Bond',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106009',1011001,0,NULL,NULL,0,14),('60300106010','c2399f5d71533a41301d7c11871606bb',1,'Whilemina Atkinson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106010',1011001,0,NULL,NULL,0,14),('60300106011','024972f10aedfc9bc12e000bd470db87',1,'Castor Lynn',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106011',1011001,0,NULL,NULL,0,14),('60300106012','086eb2a019b8184c47d21785539a03eb',1,'Joy Love',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106012',1011001,0,NULL,NULL,0,14),('60300106013','7db1bed40e6c7e7afce55087183e84e9',1,'Keelie Solis',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106013',1011001,0,NULL,NULL,0,14),('60300106014','85c6a069292c548c6ef9d7a8895a9d36',1,'Alexander Whitaker',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106014',1011001,0,NULL,NULL,0,14),('60300106015','2e81d1a5996ec54ad1ac4fcf197dc8c6',1,'Kiona Patterson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106015',1011001,0,NULL,NULL,0,14),('60300106016','323311fdbb4ed2b9a56412ef4afc5fc8',1,'Chester Campbell',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106016',1011001,0,NULL,NULL,0,14),('60300106017','0b260fc09a95476c81af5c401a8a9e7a',1,'Sydney Bates',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106017',1011001,0,NULL,NULL,0,14),('60300106018','b48a7fb4a5c6fe1961fd6400f198aff5',1,'Jaquelyn Cohen',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106018',1011001,0,NULL,NULL,0,14),('60300106019','69fcb9af0b2dd1179b1003b7170da3e5',1,'Yetta Mayer',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106019',1011001,0,NULL,NULL,0,14),('60300106020','8e1ee32829cbb58770cf40566d07913a',1,'Burke Hood',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106020',1011001,0,NULL,NULL,0,14),('60300106021','fb4cbe7b51c61fe920d4b0a2d9cbf905',1,'Eaton Fry',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106021',1011001,0,NULL,NULL,0,14),('60300106022','6926acd5209458e72db9ac4d18459c3e',1,'Ingrid Stephenson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106022',1011001,0,NULL,NULL,0,14),('60300106023','fe0966e995641c6431a38288c075abcc',1,'Mufutau Wiggins',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106023',1011001,0,NULL,NULL,0,14),('60300106024','0a96b260ff09d738a3f1ca5e63c9f61c',1,'Amethyst Dotson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106024',1011001,0,NULL,NULL,0,14),('60300106025','704761cb9e65d560eed4d1c41de3d1dc',1,'Amity Abbott',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106025',1011001,0,NULL,NULL,0,14),('60300106026','a8b66f9c9bfd4aa4d31f6adc5feb9342',1,'Donna Daniels',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106026',1011001,0,NULL,NULL,0,14),('60300106027','79e6c466d33fd131cd85e7ab7857d05f',1,'Kimberly Riddle',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106027',1011001,0,NULL,NULL,0,14),('60300106028','9ef1bf47797fd8a22ca70e20453f1a89',1,'Quentin Blevins',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106028',1011001,0,NULL,NULL,0,14),('60300106029','61fc6a00999597b6c60bf0dc4f575a48',1,'Maia Romero',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106029',1011001,0,NULL,NULL,0,14),('60300106030','f2e454ebe804db692e8fd44475fd277f',1,'Amanda Clemons',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106030',1011001,0,NULL,NULL,0,14),('60300106031','2a6183c6ac407e3539ae9ac151fc2882',1,'Judith Deleon',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106031',1011001,0,NULL,NULL,0,14),('60300106032','a257863c0b84f1f7a3b841636a13639e',1,'Felicia Haney',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106032',1011001,0,NULL,NULL,0,14),('60300106033','2c5eab10cb97f35b861526dcd289f56d',1,'Echo Robinson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106033',1011001,0,NULL,NULL,0,14),('60300106034','6fe04a59fecfe9ab8c24374d5a3cd057',1,'Lael Dyer',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106034',1011001,0,NULL,NULL,0,14),('60300106035','3c3b964ca6c99abaab6d367057e8df94',1,'Gisela Pate',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106035',1011001,0,NULL,NULL,0,14),('60300106036','123a00ca793f7db5b771574116bc061f',1,'Nero Moore',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106036',1011001,0,NULL,NULL,0,14),('60300106037','de184c535f4d9e30ada38c1116eb8a58',1,'Alden Camacho',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106037',1011001,0,NULL,NULL,0,14),('60300106038','85011d27f1e1a22d294002d38d6e1da0',1,'Kameko Patel',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106038',1011001,0,NULL,NULL,0,14),('60300106039','ffbbf373fd4d32f9c8de84acf521721b',1,'Bethany Mann',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106039',1011001,0,NULL,NULL,0,14),('60300106040','230ec2a28c59cf50ad5a04dc29dee176',1,'William Carter',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106040',1011001,0,NULL,NULL,0,14),('60300106041','4edd4f1806f31833b0e1a11ee91bd1e7',1,'Kylan Dawson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106041',1011001,0,NULL,NULL,0,14),('60300106042','9f0f3d7ed9c0746eabb389b472f4a134',1,'Halee Bryant',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106042',1011001,0,NULL,NULL,0,14),('60300106043','dc42cdf121573124022603374c85e58d',1,'Zia Campos',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106043',1011001,0,NULL,NULL,0,14),('60300106044','4893c11cc34a9d3f7fb223e79c3d63e5',1,'Chelsea Middleton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106044',1011001,0,NULL,NULL,0,14),('60300106045','78ebdb34a7b07c6489d730bd0a4754e9',1,'Vanna Dejesus',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106045',1011001,0,NULL,NULL,0,14),('60300106046','971146f3f6892c1d779df67c947c876d',1,'Riley Holcomb',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106046',1011001,0,NULL,NULL,0,14),('60300106047','aa98faf4b29e8232cf12b78d1cfc04ec',1,'Jasmine Burris',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300106047',1011001,0,NULL,NULL,0,14),('60300107001','80ca624b8367d2bcf69ff10f10bbe845',1,'Rooney Randolph',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107001',1011001,0,NULL,NULL,0,14),('60300107002','900078ac06f4bb027cbd98a36458134d',1,'Thaddeus Hancock',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107002',1011001,0,NULL,NULL,0,14),('60300107003','3929486e69787e18597f014e00643f12',1,'Adrian Durham',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107003',1011001,0,NULL,NULL,0,14),('60300107004','8c5eb5fa587eea792c74821e8824fc21',1,'Barclay Paul',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107004',1011001,0,NULL,NULL,0,14),('60300107005','91174a386cbb5176964cf90d6f0e97a6',1,'Tate Bryant',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107005',1011001,0,NULL,NULL,0,14),('60300107006','8c744b8e31ab0d1ae14c137a0d79159c',1,'Shana Henry',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107006',1011001,0,NULL,NULL,0,14),('60300107007','8157cb40869abc86c92410a1fa2e4fc5',1,'Rowan Watts',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107007',1011001,0,NULL,NULL,0,14),('60300107008','a6e489cf7135cd58e5a75ab7684c2af9',1,'Xavier Rivas',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107008',1011001,0,NULL,NULL,0,14),('60300107009','e5f3aa46d340e87e17766675d1fd772e',1,'Bertha Lee',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107009',1011001,0,NULL,NULL,0,14),('60300107010','be494487d4e287e0212199a2f9fabc11',1,'Abbot Jensen',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107010',1011001,1,'2012-04-24 16:31:47','2012-04-24 16:31:27',0,14),('60300107011','b4330c4afc79cec37d73754a0a748ae9',1,'Mari Young',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107011',1011001,0,NULL,NULL,0,14),('60300107012','29497a2621e93742deb22197699a40fc',1,'Lydia Sellers',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107012',1011001,0,NULL,NULL,0,14),('60300107013','c0385f56a367c5e0f09a082f3e3ff5b9',1,'Madeline Lott',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107013',1011001,0,NULL,NULL,0,14),('60300107014','5a2ede27aeda5e34c017360aedfb7d4d',1,'Arden Hodges',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107014',1011001,0,NULL,NULL,0,14),('60300107015','1de27cd35965b16090d52f4f5941dc2c',1,'Yael Lee',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107015',1011001,0,NULL,NULL,0,14),('60300107016','4fde602b67931d4b5fa39d68b91c31de',1,'Kim Rogers',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107016',1011001,0,NULL,NULL,0,14),('60300107017','fe384c86b8008c14eccd8708907dd343',1,'Duncan Hudson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107017',1011001,0,NULL,NULL,0,14),('60300107018','d80d6ee31ebc84bc8f5b5d4dd12aabd4',1,'Casey Fitzgerald',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107018',1011001,0,NULL,NULL,0,14),('60300107019','e5e49b2e85270e016b8cb57d751f9e5c',1,'Nola Duncan',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107019',1011001,0,NULL,NULL,0,14),('60300107020','5a40956dc4a700afdd6b3f44835921e9',1,'Abel Meadows',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107020',1011001,0,NULL,NULL,0,14),('60300107021','3a15a06bc8d5e7f223d890f27e7d348f',1,'Griffith Singleton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107021',1011001,0,NULL,NULL,0,14),('60300107022','bcecfd59f1b3c752fd341e7e1a8eb020',1,'Alana Cohen',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107022',1011001,0,NULL,NULL,0,14),('60300107023','8a7ef2cefe4e85ba48cf5bbff6153d05',1,'Rhoda Workman',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107023',1011001,0,NULL,NULL,0,14),('60300107024','1657ecaad7d1547bc92e78c149ff2d4a',1,'Winifred Torres',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107024',1011001,0,NULL,NULL,0,14),('60300107025','10ba54a7e46c2f391930527275f8c231',1,'Kasimir Wheeler',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107025',1011001,0,NULL,NULL,0,14),('60300107026','1c97be0978f3beed57e9c2c9b42dc0db',1,'Hamish Castro',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107026',1011001,0,NULL,NULL,0,14),('60300107027','bc6381ee7e2b69afc62533cce56026fe',1,'Wilma Workman',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107027',1011001,0,NULL,NULL,0,14),('60300107028','b18a4f4885625668a495ae9f8f8fdbd5',1,'Zane Mccarthy',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107028',1011001,0,NULL,NULL,0,14),('60300107029','9d35a9f98222917287be315005331512',1,'Kelly Battle',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107029',1011001,0,NULL,NULL,0,14),('60300107030','f9d9b9b2993ba66b28100bbf3a7a9f77',1,'Adara Knapp',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107030',1011001,0,NULL,NULL,0,14),('60300107031','c0de4e45de9e9654ddf8fb2a76257580',1,'Laura Maldonado',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107031',1011001,0,NULL,NULL,0,14),('60300107032','2b636ee13231df0f1056dd592d2c6b5d',1,'Elvis Snow',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107032',1011001,0,NULL,NULL,0,14),('60300107033','f121dd204426ca08a43fb8e9bd7dfb5d',1,'Adena Hutchinson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107033',1011001,0,NULL,NULL,0,14),('60300107034','4df4b09bf8adec5ceca77f5ea3df68a0',1,'Calista Petty',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107034',1011001,0,NULL,NULL,0,14),('60300107035','394dbbbe8581d057d54d6cfdf436b2e5',1,'Octavia Carson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107035',1011001,0,NULL,NULL,0,14),('60300107036','1ea1c107f82290d760fee0abdce09502',1,'Gage Bowers',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300107036',1011001,0,NULL,NULL,0,14),('60300108001','43f88efe943f55a5292f67bad015dfb9',1,'Aaron Graham',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108001',1011001,0,NULL,NULL,0,14),('60300108002','768d9be540e566d92d9ba392777642b3',1,'Dora Roy',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108002',1011001,0,NULL,NULL,0,14),('60300108003','2ba5b60be1c421f36fa94e18efcc84fb',1,'Genevieve Dejesus',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108003',1011001,0,NULL,NULL,0,14),('60300108004','b6f5db27c8cc98b3c4249816c02b1e8f',1,'Neville Stafford',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108004',1011001,0,NULL,NULL,0,14),('60300108005','d7beb2830c7d8640e64b03e43d525782',1,'Cherokee Blevins',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108005',1011001,0,NULL,NULL,0,14),('60300108006','361adef52e08a3c8c16f549ea73a13e6',1,'Alexander Carroll',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108006',1011001,0,NULL,NULL,0,14),('60300108007','a90fac34a5eaa3bb6049fa071899c005',1,'Asher Alvarado',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108007',1011001,0,NULL,NULL,0,14),('60300108008','ba408a64cbe12bb7783aeda5b485ab2b',1,'Ora Mclaughlin',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108008',1011001,0,NULL,NULL,0,14),('60300108009','49197eff4bd13092cdd55577ac343b6f',1,'Ariana Powers',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108009',1011001,0,NULL,NULL,0,14),('60300108010','5cba3151a2bbee3570ab61d4db0bddbe',1,'Boris Morgan',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108010',1011001,0,NULL,NULL,0,14),('60300108011','b3f509d651b457c96047a5987cd293ef',1,'Elvis Henderson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108011',1011001,0,NULL,NULL,0,14),('60300108012','b4687f251782588c8e9a60118eb36459',1,'Judah Francis',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108012',1011001,0,NULL,NULL,0,14),('60300108013','033e76c882775e108b9aded7a841b58f',1,'Stacy Morrow',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108013',1011001,0,NULL,NULL,0,14),('60300108014','f3daecd3b4a99de05ccba292a4186130',1,'Alfreda Mcdaniel',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108014',1011001,0,NULL,NULL,0,14),('60300108015','17edffc4fd202c1bca63f236a85b36be',1,'Reuben Griffin',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108015',1011001,0,NULL,NULL,0,14),('60300108016','fae483d7603604706e54b197d42d52bb',1,'Miranda Roth',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108016',1011001,0,NULL,NULL,0,14),('60300108017','0d9767cbdd8379a84e254bbfdcf1e310',1,'Odessa Watkins',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108017',1011001,0,NULL,NULL,0,14),('60300108018','8e4235ca929541bff9db696a6ce5a727',1,'Liberty Berry',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108018',1011001,0,NULL,NULL,0,14),('60300108019','8e40821f3b2093863d2a04f608f66264',1,'Chandler Ford',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108019',1011001,0,NULL,NULL,0,14),('60300108020','2ed54eebac47060670d356c70523ef6a',1,'Veronica Gutierrez',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300108020',1011001,0,NULL,NULL,0,14),('60300109001','679e42d14db6bb8b1a939649a8f29aa2',1,'Hanna Wheeler',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109001',1011001,0,NULL,NULL,0,14),('60300109002','84a256eb732ca3a7015f7254088dc727',1,'Katell Howell',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109002',1011001,0,NULL,NULL,0,14),('60300109003','92746f865ff71fc2a0703a0c94c967e0',1,'Yardley Downs',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109003',1011001,0,NULL,NULL,0,14),('60300109004','adb7bb83c3e268cb79465aea89fd8742',1,'Anika Barnes',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109004',1011001,0,NULL,NULL,0,14),('60300109005','30279bfde92aeaae7778a80dfef7973c',1,'Zane Chase',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109005',1011001,0,NULL,NULL,0,14),('60300109006','d16ca303e45523f9d66f5e9a6e636a4a',1,'Mona Ferrell',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109006',1011001,0,NULL,NULL,0,14),('60300109007','ec7a3a39b81b5be0336903cac5125d9b',1,'Lara Cleveland',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109007',1011001,0,NULL,NULL,0,14),('60300109008','b501d43a5e19312564109415b6d32a63',1,'Lenore Horn',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109008',1011001,0,NULL,NULL,0,14),('60300109009','a4e57b7f288cf5035ef0ea762ee5cf13',1,'Salvador Mendoza',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109009',1011001,0,NULL,NULL,0,14),('60300109010','1a47acac7c17f40cee44710451ce13bb',1,'Aline Michael',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109010',1011001,0,NULL,NULL,0,14),('60300109011','8341cde277686c942220c9216a5c2d17',1,'Yuli Patterson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109011',1011001,0,NULL,NULL,0,14),('60300109012','49890fbfbe127d4ae94bc10dc2b24199',1,'Ignatius Parks',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109012',1011001,0,NULL,NULL,0,14),('60300109013','febf081d310883315ea6ab9a47945611',1,'Mechelle Arnold',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109013',1011001,0,NULL,NULL,0,14),('60300109014','297e662decc1fd8b62ed187252e8ffeb',1,'Quon Shepard',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109014',1011001,0,NULL,NULL,0,14),('60300109015','7943b8a7c40a4ddff4eb84f5338e8706',1,'Finn Patel',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109015',1011001,0,NULL,NULL,0,14),('60300109016','5e14e9958cc2a2d3e2b734c115041c1c',1,'Coby Palmer',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109016',1011001,0,NULL,NULL,0,14),('60300109017','65c0eb1f409c1a0fd223b38a4882cbd0',1,'Meredith Poole',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109017',1011001,0,NULL,NULL,0,14),('60300109018','e41fed21e976fb2801924d774b6ac64a',1,'Calvin Morgan',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109018',1011001,0,NULL,NULL,0,14),('60300109019','6b8d0016c8967cc5d455c28e291f2916',1,'Yuli Cox',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109019',1011001,0,NULL,NULL,0,14),('60300109020','95e8a8308e278b14f47422f0a4634a34',1,'Mona Wilkerson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109020',1011001,0,NULL,NULL,0,14),('60300109021','fe2c73ece921eba72cc31ed3a9857095',1,'Halee Greer',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109021',1011001,0,NULL,NULL,0,14),('60300109022','055d3b2632aeaabbf53d64dff7cd287a',1,'Deirdre Waters',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109022',1011001,0,NULL,NULL,0,14),('60300109023','0a8994a5a4e110d35f025ec036036a53',1,'Kessie Shields',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109023',1011001,0,NULL,NULL,0,14),('60300109024','04daae77208cefead754a60b821194ad',1,'Hayfa Guerrero',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109024',1011001,0,NULL,NULL,0,14),('60300109025','efc3364df5d4ba7d89bf1df06b0c0d72',1,'James Hill',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109025',1011001,0,NULL,NULL,0,14),('60300109026','6fad7477df2c3b89edf45fde42ae1ad0',1,'Zeph Hopper',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300109026',1011001,0,NULL,NULL,0,14),('60300110001','f60d775eac1d1c9ce8a3bce260224f30',1,'Brooke Herring',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110001',1011001,0,NULL,NULL,0,14),('60300110002','b935123d0a418300e49b4b5cd63a7998',1,'Caldwell Roman',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110002',1011001,0,NULL,NULL,0,14),('60300110003','949e3d4ec606e78d32574a047528841d',1,'Ingrid Vang',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110003',1011001,0,NULL,NULL,0,14),('60300110004','63e0cd2df91e839412b54457fe0a93e7',1,'Maile Reed',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110004',1011001,1,'2011-11-04 14:09:29','2011-11-04 14:08:58',0,14),('60300110005','b847bf38ca4a044c9f300ab7a626eded',1,'Magee Shepherd',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110005',1011001,1,'2011-11-04 14:42:43','2011-11-04 14:42:32',0,14),('60300110006','587ec0d7eb1217d1ccf3832375404a54',1,'Jael Fletcher',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110006',1011001,0,NULL,NULL,0,14),('60300110007','b48e56e0cbe250002898fbb2e69cbf7c',1,'Lance Mcmahon',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110007',1011001,0,NULL,NULL,0,14),('60300110008','2529c5c991e95ff7eb199e2d5602a06e',1,'Victor Mack',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110008',1011001,1,'2011-11-04 10:26:31','2012-05-15 22:24:25',1,14),('60300110009','e307a3b021425e9d8a3c68ac53c238a7',1,'Rosalyn Mercado',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110009',1011001,0,NULL,NULL,0,14),('60300110010','36f7aa0c74e4b43996f43fa746830282',1,'Kaye Coleman',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110010',1011001,0,NULL,NULL,0,14),('60300110011','3dc7915615c928f4a19ca039079fa0a3',1,'Yoshi Roberts',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110011',1011001,0,NULL,NULL,0,14),('60300110012','dfdeca8d6b9078efd004a2c5adff272e',1,'Brynn Lawrence',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110012',1011001,0,NULL,NULL,0,14),('60300110013','8c98bdfe01cb702deaa49569bb24fc4d',1,'Madeline Le',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110013',1011001,0,NULL,NULL,0,14),('60300110014','9d6e6738ae83733c0f120eea17c171a7',1,'Tanner Booker',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110014',1011001,0,NULL,NULL,0,14),('60300110015','738e82db83f73b88d1d9520168491c2c',1,'Wang Sutton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110015',1011001,0,NULL,NULL,0,14),('60300110016','3a34b20b93a268bd016d10a82b4c19ec',1,'Keaton Bolton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110016',1011001,0,NULL,NULL,0,14),('60300110017','b02525905b61be6078a7d019fb0a60eb',1,'Eric Noel',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110017',1011001,0,NULL,NULL,0,14),('60300110018','dfbd59cf83e1afe6048d262e326dbfb4',1,'Steel Pratt',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110018',1011001,0,NULL,NULL,0,14),('60300110019','7afc20b77d25175c8ce167e8bdb93162',1,'Leroy Kim',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110019',1011001,0,NULL,NULL,0,14),('60300110020','8677854c56dfeb7e10da7934056d1424',1,'Jorden Curry',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110020',1011001,1,'2011-11-04 10:36:57','2011-11-04 10:36:49',0,14),('60300110021','e00c11bdd4496a6726e32fe9b8dccf9d',1,'Gannon Watts',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110021',1011001,0,NULL,NULL,0,14),('60300110022','f24016caef420204a0bd7fbdd59121b6',1,'Kalia Tyson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110022',1011001,0,NULL,NULL,0,14),('60300110023','3bb93b9361797bff0b4b901aec22e769',1,'Kuame House',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110023',1011001,0,NULL,NULL,0,14),('60300110024','0f1b815e0d3398c2ef6e78b02ec31948',1,'Jared Guy',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110024',1011001,0,NULL,NULL,0,14),('60300110025','85c5e33f69ea6c83f8f11fe011d49372',1,'Ariel Wright',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110025',1011001,0,NULL,NULL,0,14),('60300110026','dd3f775065edc68c7ffea84072ae9653',1,'Kylan Bartlett',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110026',1011001,0,NULL,NULL,0,14),('60300110027','02ce996f908f19c0d003b522827eec0f',1,'Quintessa Owens',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110027',1011001,0,NULL,NULL,0,14),('60300110028','dfbc470e2cdba888a06a06ec3e126209',1,'Laith Harrison',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110028',1011001,0,NULL,NULL,0,14),('60300110029','23b545022f0fb5a2ca68d0bac5084191',1,'Constance Hurley',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110029',1011001,0,NULL,NULL,0,14),('60300110030','f97ec2e33553eb2dd5c972396ae7370a',1,'Jermaine Chavez',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110030',1011001,0,NULL,NULL,0,14),('60300110031','a80ec9256784ab4c79e0595297e1f663',1,'George Adams',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110031',1011001,0,NULL,NULL,0,14),('60300110032','86d4f94b222090ecfafcb66d9baf652b',1,'Dawn Moss',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110032',1011001,0,NULL,NULL,0,14),('60300110033','f5f00d18553aecdaae3c0003f88e0da3',1,'Miriam Burks',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110033',1011001,0,NULL,NULL,0,14),('60300110034','b034970584a6bd0a15613ef11b841445',1,'Hayes Emerson',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110034',1011001,0,NULL,NULL,0,14),('60300110035','79d4fa0312beeb1eb7a91b75adeabd8d',1,'Macey Suarez',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110035',1011001,0,NULL,NULL,0,14),('60300110036','e34d8ab7124ec0d470252b4187acf570',1,'Jin Wells',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110036',1011001,0,NULL,NULL,0,14),('60300110037','3e1a35c9da615e0e3b84c487e6620a2e',1,'Savannah Yang',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110037',1011001,0,NULL,NULL,0,14),('60300110038','b33ee2b2d7ce61c0123cb84b3fdb5172',1,'Stacy Harris',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110038',1011001,0,NULL,NULL,0,14),('60300110039','7a677be781ea6fcdb00b4e897042b402',1,'Isaac Gibbs',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110039',1011001,0,NULL,NULL,0,14),('60300110040','88a93d92760f8d4f6e34383d504fb3fa',1,'Quemby Klein',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110040',1011001,0,NULL,NULL,0,14),('60300110041','4c6715dec907246387a04afa3f2d39bb',1,'Flynn Gamble',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110041',1011001,0,NULL,NULL,0,14),('60300110042','bb4cc55873f0a6f359d01ac400eeb530',1,'Kimberly Bray',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110042',1011001,0,NULL,NULL,0,14),('60300110043','e5b73a4381091704c4324e3a9479e3f6',1,'Aladdin Burks',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110043',1011001,0,NULL,NULL,0,14),('60300110044','ebd732030790ff0dfb38ff8a04c43598',1,'Jonah Dillard',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110044',1011001,0,NULL,NULL,0,14),('60300110045','f31b68ed98dc1db19967e61204edea6b',1,'Lawrence Wilcox',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110045',1011001,0,NULL,NULL,0,14),('60300110046','9efd804950917dd5ef9fa14179491756',1,'Holmes Villarreal',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110046',1011001,0,NULL,NULL,0,14),('60300110047','d8a456447e0b220cb22dae6c4ed221d7',1,'Xyla Murray',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110047',1011001,0,NULL,NULL,0,14),('60300110048','a937f0d8e783fed095e71298117f8f07',1,'Lavinia Moses',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110048',1011001,0,NULL,NULL,0,14),('60300110049','7001d41d93a0aeac0d93164cdfea40c5',1,'Rahim Wilder',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110049',1011001,0,NULL,NULL,0,14),('60300110050','9a4c3483164a8fbc361e1710272523d3',1,'Ulla Hartman',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110050',1011001,0,NULL,NULL,0,14),('60300110051','47be9f875db2eeabc7115d1d1e20f970',1,'Shelby Hays',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110051',1011001,0,NULL,NULL,0,14),('60300110052','304315f02ac34912a604636239680622',1,'Gillian Oneal',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110052',1011001,0,NULL,NULL,0,14),('60300110053','0c97fedafdc9684fbe5912de711d224c',1,'Heidi David',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110053',1011001,0,NULL,NULL,0,14),('60300110054','a4934f15f0f6b828df1e9ee4794463bf',1,'Aurora Shepard',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110054',1011001,0,NULL,NULL,0,14),('60300110055','83b060fac86beac541a84573e83defe0',1,'Kylan Short',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110055',1011001,0,NULL,NULL,0,14),('60300110056','22813103feb8a847d9d240b1b0de2619',1,'Gary Sutton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110056',1011001,0,NULL,NULL,0,14),('60300110057','67687583d3959fef90cebd051a78e401',1,'Casey Taylor',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110057',1011001,0,NULL,NULL,0,14),('60300110058','24b00d96eea93a51d539424e7f50c448',1,'Yvette Collier',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110058',1011001,0,NULL,NULL,0,14),('60300110059','74b54b346ecbec25b5b3f3c97fd1d307',1,'Adrienne Jensen',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300110059',1011001,0,NULL,NULL,0,14),('60300111001','2a6d84330635349b76444164a9655988',1,'Imogene Mcgee',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300111001',1011001,0,NULL,NULL,0,14),('60300111002','2822693e58e89a34c004274e5895a7ab',1,'Isadora Shelton',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300111002',1011001,0,NULL,NULL,0,14),('60300111003','3af40fcab9e156019e00375cd30410b8',1,'NUR HALIZAH',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300111003',1011001,0,NULL,NULL,0,14),('60300111004','140e8caaa56ea9241366392cf3fe5b7c',1,'KEN WATANABE',NULL,NULL,NULL,NULL,NULL,0,NULL,'60300111004',1011001,1,'2011-11-02 11:30:50','2011-11-04 09:14:22',0,14),('60600111001','6eb8698e1cd04a5e19b09db43148da7a',1,'CAMILLA HUDSON',NULL,NULL,NULL,NULL,NULL,0,NULL,'60600111001',1011001,0,NULL,NULL,0,12),('60600111002','54bff21455198ae0c109c2c3f91a9ed4',1,'STEVENSON HUDNER',NULL,NULL,NULL,NULL,NULL,0,NULL,'60600111002',1011001,0,NULL,NULL,0,12),('60600111003','c86595f2822a1d4dd4c289ac2df4aab3',1,'HARRY JAMES',NULL,NULL,NULL,NULL,NULL,0,NULL,'60600111003',1011001,0,NULL,NULL,0,12),('70100008082','9e61bffc4f57a0522d3873d3c0fdbc6d',1,'Savannah Cline',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100008082',1011001,0,NULL,NULL,0,19),('70100105022','81c8ec872e36c80ba78de0ffa6dad17c',1,'Dorian Lott',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100105022',1011001,0,NULL,NULL,0,19),('70100105040','79ad029475ab9c303e144215974058b8',1,'Jaime Hickman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100105040',1011001,0,NULL,NULL,0,19),('70100105041','98fb74863b42f87930eb1e62d5eab8bb',1,'Kenyon Ward',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100105041',1011001,0,NULL,NULL,0,19),('70100105047','02aae89e993da2d11710e104874309a2',1,'Sara Owen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100105047',1011001,0,NULL,NULL,0,19),('70100105048','af4349644b44a2f5045a0e76acf70c15',1,'Gage Harris',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100105048',1011001,0,NULL,NULL,0,19),('70100106004','dac8e01323ea426999bd0fb40cc89f62',1,'Martina Lynn',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106004',1011001,0,NULL,NULL,0,19),('70100106005','9b6f74fca8e6145a3295432c1dae2721',1,'Aspen Nunez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106005',1011001,0,NULL,NULL,0,19),('70100106006','d905db36d6b881a57965b9eed6a491cb',1,'Lester Wells',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106006',1011001,0,NULL,NULL,0,19),('70100106009','b9b7b7b0f1daff5c36dac694e9b67baa',1,'Raja Koch',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106009',1011001,0,NULL,NULL,0,19),('70100106010','56917ee1160874057645bb9c56ee6a5e',1,'Kenyon Reese',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106010',1011001,0,NULL,NULL,0,19),('70100106013','c99fd2c5734b95c6206c253e6dcfe272',1,'Nola Delgado',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106013',1011001,0,NULL,NULL,0,19),('70100106016','b48485b5e3b4bae73de1a7fa29ab8c2b',1,'Philip Burnett',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106016',1011001,0,NULL,NULL,0,19),('70100106017','23462542cfcad6481ff19d1cc2eb99f1',1,'Rowan Frederick',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106017',1011001,0,NULL,NULL,0,19),('70100106018','7f6d3a575e804b3ed00575bfef3b51c6',1,'Solomon Cherry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106018',1011001,0,NULL,NULL,0,19),('70100106019','211b5a342d152be9516633f8104255aa',1,'Chaney Padilla',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106019',1011001,0,NULL,NULL,0,19),('70100106020','143b2fe34b496d086a4f0854fca70d6d',1,'Giacomo Huff',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106020',1011001,0,NULL,NULL,0,19),('70100106021','002dff9a7650587e5fe2ea304e821e25',1,'Dara Salinas',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106021',1011001,0,NULL,NULL,0,19),('70100106022','7454b3f90a814b1393f008807ff0076b',1,'Steven Robles',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106022',1011001,0,NULL,NULL,0,19),('70100106024','d5052a978714dfd37cdd722d4e7671b3',1,'Petra Parsons',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106024',1011001,0,NULL,NULL,0,19),('70100106025','a4dc2836a70c8733de6d04ab9bd39c98',1,'Jeremy Bowen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106025',1011001,0,NULL,NULL,0,19),('70100106029','f7c157f1822ea79840632f0dd9f38919',1,'Benjamin Bush',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106029',1011001,0,NULL,NULL,0,19),('70100106030','48d5d07a39c8379bc2276f965ad93071',1,'Marcia Cherry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106030',1011001,0,NULL,NULL,0,19),('70100106031','842c353924d81e6149b28b971deaa84d',1,'Ria Decker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106031',1011001,0,NULL,NULL,0,19),('70100106034','19b2f5fe8c1d7888fb47cbb87ed07afd',1,'Brittany Mccarthy',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106034',1011001,0,NULL,NULL,0,19),('70100106039','f7bb6cd7e4b71e54184bc17b9f2d1c48',1,'Pandora Nieves',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106039',1011001,0,NULL,NULL,0,19),('70100106042','c11050b7c9231139c5cf833cf3666103',1,'Galena Huffman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106042',1011001,0,NULL,NULL,0,19),('70100106044','b638c643e55e849a788cd62203e85cf4',1,'Thane Boyer',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106044',1011001,0,NULL,NULL,0,19),('70100106046','81257431b16406ab0aad7e559fa7111f',1,'Lars Peterson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106046',1011001,0,NULL,NULL,0,19),('70100106052','cb5e52446192b1d4498615225c37b8d3',1,'Hilary Hoover',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106052',1011001,0,NULL,NULL,0,19),('70100106053','23d756d0e99a79cc4260de28bcc9e088',1,'Tanner Mcclure',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106053',1011001,0,NULL,NULL,0,19),('70100106055','bb31181cb9f981db5e09b15840850788',1,'Burke Donaldson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106055',1011001,0,NULL,NULL,0,19),('70100106056','c8a157cc1d91be93b56096dcd9e92326',1,'Althea Hampton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106056',1011001,0,NULL,NULL,0,19),('70100106058','b624edf19c3d8b7098d557c612dad708',1,'Anika Underwood',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106058',1011001,0,NULL,NULL,0,19),('70100106059','6e3acd504fbcc491c86ea61fe5f30b92',1,'Carlos Rutledge',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106059',1011001,0,NULL,NULL,0,19),('70100106060','a147a73d8fb6d7769b35d3a1d8a58770',1,'Macaulay Morales',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106060',1011001,0,NULL,NULL,0,19),('70100106064','4127aed5454d8cbab70082fb273adffe',1,'Tanner Pennington',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106064',1011001,0,NULL,NULL,0,19),('70100106065','878a62bfc08f1d785213c9effc698d82',1,'Quemby Leonard',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106065',1011001,0,NULL,NULL,0,19),('70100106066','6ddad4860955a6746f3c07260c0b9595',1,'Tallulah Mason',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106066',1011001,0,NULL,NULL,0,19),('70100106067','19b10860a5ea849b962aea98461a314d',1,'Price Andrews',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106067',1011001,0,NULL,NULL,0,19),('70100106068','01f631bbe1d5cc446ea3b1545f32dc8c',1,'Calista Kirk',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106068',1011001,0,NULL,NULL,0,19),('70100106069','046f18c835d97d8043c80f5740a992ad',1,'Murphy Juarez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106069',1011001,0,NULL,NULL,0,19),('70100106071','83300acf036aee4ed119f7890ec44f2b',1,'Winifred Mcdonald',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106071',1011001,0,NULL,NULL,0,19),('70100106074','f313d0fe79d0c8d636b768e6f85c9c7c',1,'Larissa Lindsay',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106074',1011001,0,NULL,NULL,0,19),('70100106076','aabf69be4b3a089d990262c2ddac50a6',1,'Faith Willis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106076',1011001,0,NULL,NULL,0,19),('70100106080','00205fc274b12a1f7b78bfd2d56ff81b',1,'Yen Cox',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106080',1011001,0,NULL,NULL,0,19),('70100106081','ecb507703cbe6794420cc438526a860d',1,'Kyle Bullock',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106081',1011001,0,NULL,NULL,0,19),('70100106085','426e6210003123b8a44189b02ce1ecf3',1,'Joseph Kline',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100106085',1011001,0,NULL,NULL,0,19),('70100107001','036a37c51966d91fba4d28626679ce3d',1,'Kameko Myers',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107001',1011001,0,NULL,NULL,0,19),('70100107002','ccd8c7e258689d026b8e42d1f3b42b3e',1,'Ezra Cabrera',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107002',1011001,0,NULL,NULL,0,19),('70100107003','259694d0168593ac5afb8db85361e191',1,'Emery Cotton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107003',1011001,0,NULL,NULL,0,19),('70100107004','9d83abe0a79397fb20137d6dc863a8c4',1,'Shafira Bennett',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107004',1011001,0,NULL,NULL,0,19),('70100107005','ebfff095fdf6cdd83f46caca16454f90',1,'Oscar Porter',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107005',1011001,0,NULL,NULL,0,19),('70100107006','fdb76152bd53ba46325d68c1d791593e',1,'Maile Key',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107006',1011001,0,NULL,NULL,0,19),('70100107007','f2bc82cab288605b4253e32fcac1bd01',1,'Perry Robbins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107007',1011001,0,NULL,NULL,0,19),('70100107008','ca8135fa056b8c5f8ed5f9396afb04d0',1,'Abbot Holman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107008',1011001,0,NULL,NULL,0,19),('70100107009','4268ad96c97f5257ffeef2590d2936b3',1,'Desiree Wheeler',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107009',1011001,0,NULL,NULL,0,19),('70100107010','79c13f9244fa6a96a345220deec3e9d5',1,'Alexander Shelton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107010',1011001,0,NULL,NULL,0,19),('70100107014','96b5a20851820c3e5a3ffdc2045e4c60',1,'Josephine Giles',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107014',1011001,0,NULL,NULL,0,19),('70100107015','5b397511f61b74d91231907e4f35a06b',1,'Ross Jefferson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107015',1011001,0,NULL,NULL,0,19),('70100107016','73303c52731dc32df9a1e7735d33fcfe',1,'Kevyn Hall',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107016',1011001,0,NULL,NULL,0,19),('70100107017','4bd48adceec901169823a0b4345dd805',1,'Len York',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107017',1011001,0,NULL,NULL,0,19),('70100107019','9b24239c617a8eb61913b99a9289acc6',1,'Yen Booker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107019',1011001,0,NULL,NULL,0,19),('70100107020','85341392114b03cd69574ba505078ea5',1,'Juliet Kaufman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107020',1011001,0,NULL,NULL,0,19),('70100107022','2d1d99db9248910acf486dc6547aee3a',1,'Pamela Santana',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107022',1011001,0,NULL,NULL,0,19),('70100107023','9a10854932662991f01e918105d01da9',1,'Macaulay Barnes',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107023',1011001,0,NULL,NULL,0,19),('70100107025','9062014833b40e828ba1fca7b8bea4df',1,'Aladdin Hyde',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107025',1011001,0,NULL,NULL,0,19),('70100107026','71f29f0b0f1dc222251ead232293775e',1,'Bernard Reed',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107026',1011001,0,NULL,NULL,0,19),('70100107027','b10d3333ce98ebbbeb9aa92da6b91b17',1,'Christian Pitts',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107027',1011001,0,NULL,NULL,0,19),('70100107028','85ef7646c94424ed967d6f00d944c54e',1,'Debra Waters',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107028',1011001,0,NULL,NULL,0,19),('70100107029','9952e4dac04ca83e9eed53a7892bd61a',1,'Kaden Dudley',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107029',1011001,0,NULL,NULL,0,19),('70100107030','5f48573c4eb2571d618647db73ee2013',1,'Harlan Riddle',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107030',1011001,0,NULL,NULL,0,19),('70100107031','8f2d71e5e777ba19d9ff6e5a73b25240',1,'Colin Hendrix',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107031',1011001,0,NULL,NULL,0,19),('70100107032','1224053b850fe2e8a7b5ea99356d2f1a',1,'Louis Patton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107032',1011001,0,NULL,NULL,0,19),('70100107034','7f487914e643590f4bbc8db39f96b25e',1,'Paula Hill',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107034',1011001,0,NULL,NULL,0,19),('70100107035','5adfdf63184659a33f2c2a727bec7572',1,'Chantale Fitzpatrick',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107035',1011001,0,NULL,NULL,0,19),('70100107036','3b2e2f9ed128fc0ac43beeaf1d0bcec4',1,'Rhoda Riggs',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107036',1011001,0,NULL,NULL,0,19),('70100107037','10b46d7843c2ba53d116ca2ed9abb56e',1,'Eliana Roach',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107037',1011001,0,NULL,NULL,0,19),('70100107038','acc86b8bdb0c4c704e60b49b8b1bff3d',1,'Shelley Romero',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107038',1011001,0,NULL,NULL,0,19),('70100107039','7e2e454be01e9edb2d5bb745f87c452f',1,'Dexter Mcgee',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107039',1011001,0,NULL,NULL,0,19),('70100107040','97802fa2168c291db31f44cc6485f57f',1,'Louis Stuart',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107040',1011001,0,NULL,NULL,0,19),('70100107041','06836aecf7dbbe79bc8b4b84045f097a',1,'Malik Miller',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107041',1011001,0,NULL,NULL,0,19),('70100107042','97c70699e5f85c1b17a2eb5943ccb028',1,'Genevieve Porter',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107042',1011001,0,NULL,NULL,0,19),('70100107043','3b58214777e2ab8bd45808c71c8b3f9c',1,'Harper Love',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107043',1011001,0,NULL,NULL,0,19),('70100107044','6e2a3643655fe2cee3bba97413644848',1,'Janna Moon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107044',1011001,0,NULL,NULL,0,19),('70100107045','794fce57eec6f0779f43cb7678d42970',1,'Jonah Wilkerson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107045',1011001,0,NULL,NULL,0,19),('70100107046','3e5e9ff2497dd4d9f20904706201137b',1,'Tana Stephenson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107046',1011001,0,NULL,NULL,0,19),('70100107047','adc9e2d3f7aede47b35dd07a1c331dd2',1,'Paloma Brock',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107047',1011001,0,NULL,NULL,0,19),('70100107048','f1df6662a00bf32a8fc81458287c9360',1,'Eaton Golden',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107048',1011001,0,NULL,NULL,0,19),('70100107050','3554ed257ef62270b63c93cce10ccaba',1,'Rose Baird',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107050',1011001,0,NULL,NULL,0,19),('70100107052','8cbc44e17eca5d7be48faf9493b19fbb',1,'Quintessa Zamora',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107052',1011001,0,NULL,NULL,0,19),('70100107053','ef164d44a79190722697b505ba4d69f6',1,'Fiona Mathis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107053',1011001,0,NULL,NULL,0,19),('70100107054','96b6c4c414a872280db294e5e9278e49',1,'Quinlan Mcneil',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107054',1011001,0,NULL,NULL,0,19),('70100107055','9777fc44ff7327798c27e558c160070c',1,'Genevieve Meyer',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107055',1011001,0,NULL,NULL,0,19),('70100107056','bc80a32c984a760ead2b37d6af2278db',1,'Herrod Meadows',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107056',1011001,0,NULL,NULL,0,19),('70100107057','474231e33adda9329a5e2aa1b22e49fb',1,'Colt Alexander',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107057',1011001,0,NULL,NULL,0,19),('70100107058','1a637edfd22a45acd71ffd5cf5185abd',1,'Jorden Skinner',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107058',1011001,0,NULL,NULL,0,19),('70100107059','a00566d077b00a7c2e57c350ce7c451a',1,'Mannix Sherman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107059',1011001,0,NULL,NULL,0,19),('70100107060','2552b88abe841db111425958aae56ace',1,'Lee Armstrong',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107060',1011001,0,NULL,NULL,0,19),('70100107061','9ad76b3e15bb1f85bc22aa1ff802b373',1,'Harrison Bass',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107061',1011001,0,NULL,NULL,0,19),('70100107062','456fcbc71e94a32940f881c06ca70734',1,'Maxwell Stewart',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107062',1011001,0,NULL,NULL,0,19),('70100107064','88ce166ecc25235937dff80ef526bc8a',1,'Akeem Lowe',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107064',1011001,0,NULL,NULL,0,19),('70100107065','f4fa988ff60d0d886bced37646ce61ec',1,'Peter Reilly',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107065',1011001,0,NULL,NULL,0,19),('70100107066','b974fe0f44d786bc4dfb339b7b5d4541',1,'Marvin Ballard',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107066',1011001,0,NULL,NULL,0,19),('70100107068','edb3f595823a75b6ac386c624f9d57a5',1,'Blair Hyde',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107068',1011001,0,NULL,NULL,0,19),('70100107069','e07e780d9ab30968ad1b49652b8c89c1',1,'Arden Stokes',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107069',1011001,0,NULL,NULL,0,19),('70100107070','0c47bdbc107e28ed84d6e8241e7838d6',1,'Jane Hansen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107070',1011001,0,NULL,NULL,0,19),('70100107071','c3ecd641b9ab8812ebe7b370a567ac4c',1,'Ivor Dejesus',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107071',1011001,0,NULL,NULL,0,19),('70100107072','32822db215ca0ca447c8fe31311e68b7',1,'Zenia Rose',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107072',1011001,0,NULL,NULL,0,19),('70100107073','f7fba5109000c38cef03c8ae67f32819',1,'Shelley Hart',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107073',1011001,0,NULL,NULL,0,19),('70100107074','1caaeefe76f82e73fc6223b1dc705932',1,'Hollee Bird',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107074',1011001,0,NULL,NULL,0,19),('70100107075','e33705653da353d70febd9e9b285e66a',1,'Hilary Torres',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107075',1011001,0,NULL,NULL,0,19),('70100107076','0e7d505c674dd68498776dbc2764db3f',1,'Unity Barlow',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107076',1011001,0,NULL,NULL,0,19),('70100107077','104d7d756c1ff0fa16cab74af8cfd834',1,'Patience Kirkland',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107077',1011001,0,NULL,NULL,0,19),('70100107078','5a2d5eb2a8847eb29778c6897a46a102',1,'Ann Cabrera',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107078',1011001,0,NULL,NULL,0,19),('70100107079','d2bf9b069a09c81b072e0906c7a636ff',1,'Kirby Paul',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107079',1011001,0,NULL,NULL,0,19),('70100107080','3b24cc54e538762903d3f0f7c3f7156e',1,'Abraham Matthews',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107080',1011001,0,NULL,NULL,0,19),('70100107081','de6f9ad84ecf50a1769cd05643231c1d',1,'Demetria Reese',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107081',1011001,0,NULL,NULL,0,19),('70100107082','8f5f5d140020153ac570ee3cf3b958e3',1,'Freya Trevino',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107082',1011001,0,NULL,NULL,0,19),('70100107083','3250cc43499e5bafec14711d455e9c87',1,'Rebecca Hood',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107083',1011001,0,NULL,NULL,0,19),('70100107084','54bc562dfb116cb8b390e8582b84a76d',1,'Hadassah Sloan',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107084',1011001,0,NULL,NULL,0,19),('70100107085','8d5aa1e0b41cf42ab0fbcc9c848c80f5',1,'Fay Sharp',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107085',1011001,0,NULL,NULL,0,19),('70100107086','40152a6a8a12bec54cf1735c6b58a97c',1,'Damon Rich',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107086',1011001,0,NULL,NULL,0,19),('70100107087','c1d6de056b0cd039651df980064bfc42',1,'Armand Day',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107087',1011001,0,NULL,NULL,0,19),('70100107088','51d17075206d1f176f9de56d2cc30c13',1,'Kyle Vargas',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107088',1011001,0,NULL,NULL,0,19),('70100107089','e6cae1a4b1bb4a9d7710d787954d23ab',1,'Madeline Wilcox',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107089',1011001,0,NULL,NULL,0,19),('70100107090','edb6ab8a6d1ec5eb0b08aa2ff451d8fe',1,'Zelenia Avila',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107090',1011001,0,NULL,NULL,0,19),('70100107091','b6916329c70747242d2d6cee5d0de0e6',1,'Steel Tyson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107091',1011001,0,NULL,NULL,0,19),('70100107092','5edd977db9d33cd188d09fad5ae6ceb7',1,'Aretha Melendez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107092',1011001,0,NULL,NULL,0,19),('70100107093','f8484513f1ddd1688331213c3f3a7a7e',1,'Hyacinth Burks',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107093',1011001,0,NULL,NULL,0,19),('70100107094','a3050a9699df19dc1fefe3195753ab41',1,'Patience Wilcox',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107094',1011001,0,NULL,NULL,0,19),('70100107095','33623c6b4f930f001e107d641647b254',1,'Sara Randall',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107095',1011001,0,NULL,NULL,0,19),('70100107096','0f3a7334a92a8d573df837f9170769a8',1,'Kenyon Bowman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107096',1011001,0,NULL,NULL,0,19),('70100107097','428164dbafff33bb5a276366b2277fe7',1,'Kadeem Stein',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107097',1011001,0,NULL,NULL,0,19),('70100107098','f1b6eda347abb07cabb8679637279c49',1,'Zephania Floyd',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107098',1011001,0,NULL,NULL,0,19),('70100107102','a38aa5bea21be9db0820913becf20eba',1,'Evelyn Griffith',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107102',1011001,0,NULL,NULL,0,19),('70100107103','1fb1211695f2229e501e09ef3e6c89cb',1,'Calista Miles',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107103',1011001,0,NULL,NULL,0,19),('70100107104','feb61c1f8779ca185f6297e98c64f7db',1,'Ciara Hansen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107104',1011001,0,NULL,NULL,0,19),('70100107105','0e5d3bcaa3042064832e3bd1dd636c5b',1,'Hayley Ellis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107105',1011001,0,NULL,NULL,0,19),('70100107106','068ceabf2f34e435dfe19836de64d1f9',1,'Lunea Webb',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107106',1011001,0,NULL,NULL,0,19),('70100107107','7289c315bfb72aac8722ef1cb1ab400b',1,'Charity Deleon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107107',1011001,0,NULL,NULL,0,19),('70100107108','8f3c2992dff883cd19bdb984004168fd',1,'Uma Clarke',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107108',1011001,0,NULL,NULL,0,19),('70100107109','d235d90a560e2d391df4b3e79ae2fd41',1,'Denton Romero',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107109',1011001,0,NULL,NULL,0,19),('70100107110','4a10f755561a49a808659f8261275e58',1,'Baker Gallegos',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107110',1011001,0,NULL,NULL,0,19),('70100107111','74a1d6febef0300dfc04d30d5072f4d2',1,'Hiram Kirby',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107111',1011001,0,NULL,NULL,0,19),('70100107112','2f07916f70f635c7acee48be5e270a0a',1,'Isabella Carroll',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107112',1011001,0,NULL,NULL,0,19),('70100107114','c0753e081269919403a4ce8299be5a7a',1,'Jelani Estrada',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107114',1011001,0,NULL,NULL,0,19),('70100107116','5c583a55906567a426ad699a8d0d6607',1,'Tatiana Allison',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107116',1011001,0,NULL,NULL,0,19),('70100107117','9a5e514a722748ca44ae5a6fc51ece69',1,'Graham Hebert',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100107117',1011001,0,NULL,NULL,0,19),('70100108001','fc64630df5f886ec1240ac0569ed244a',1,'Sylvester Graham',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108001',1011001,0,NULL,NULL,0,19),('70100108002','c291d933d64c1bd6247e6b86483c8919',1,'Nevada Conley',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108002',1011001,0,NULL,NULL,0,19),('70100108003','67f06a6e5c316eee54c139023c19460c',1,'Odessa Singleton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108003',1011001,0,NULL,NULL,0,19),('70100108004','21f41b1a4c3ae72cc6ce3347dbffd02d',1,'Russell Vaughan',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108004',1011001,0,NULL,NULL,0,19),('70100108005','b15feddd9b4f1d23e73c109324c3a1d3',1,'Dale Crosby',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108005',1011001,0,NULL,NULL,0,19),('70100108006','ef7133f833d575c5c26ec83ba1d77b2f',1,'Charles Silva',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108006',1011001,0,NULL,NULL,0,19),('70100108007','0c1b124b708e46f1433458dfa7d3522a',1,'Carol Guy',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108007',1011001,0,NULL,NULL,0,19),('70100108008','e31ad509b53668802f0f36158c5c25e4',1,'Aurora Boone',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108008',1011001,0,NULL,NULL,0,19),('70100108010','1e120380159bf9f50676f6bcf889315d',1,'Kibo Giles',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108010',1011001,0,NULL,NULL,0,19),('70100108011','4857885b8595b5d0acbabafeebf51dae',1,'Stone Montoya',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108011',1011001,0,NULL,NULL,0,19),('70100108012','e9242d91fd9a80d37964f5200da0f779',1,'Meghan Ferguson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108012',1011001,0,NULL,NULL,0,19),('70100108015','60c80cf7c04c042d097af7b4c3862d6b',1,'Buckminster Britt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108015',1011001,0,NULL,NULL,0,19),('70100108016','3854389e62b9706f063880fa1465acc6',1,'India Mcmillan',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108016',1011001,0,NULL,NULL,0,19),('70100108017','475f0e1e271ef7980d89c0a479cb4af2',1,'Hamilton Garza',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108017',1011001,0,NULL,NULL,0,19),('70100108018','830c0341f94248b9d9654bbf780231a9',1,'Macy Pratt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108018',1011001,0,NULL,NULL,0,19),('70100108019','5d65fafc5561c8fe1f202d341c562c07',1,'Orson Kirk',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108019',1011001,0,NULL,NULL,0,19),('70100108020','d536180141950c8c9093119dddca2fab',1,'Beck Holmes',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108020',1011001,0,NULL,NULL,0,19),('70100108021','243dad7f1ecbbd12886701744e70d53c',1,'Nell Santiago',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108021',1011001,0,NULL,NULL,0,19),('70100108022','d2eb5386e6bd60b34cc5f0b2f83f91bf',1,'Edward Lane',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108022',1011001,0,NULL,NULL,0,19),('70100108023','e8610822f0f5e5c13fa9cca0b97ba379',1,'Owen Lang',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108023',1011001,0,NULL,NULL,0,19),('70100108025','bcdb92e0d3654ea1040d1b6c6e91d168',1,'Oprah Vega',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108025',1011001,0,NULL,NULL,0,19),('70100108026','a63da4b5f177831f455fc77df192aba2',1,'Grant Tate',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108026',1011001,0,NULL,NULL,0,19),('70100108027','0e034e69b3c5263dfa5c700f85425a20',1,'Emerson Hopper',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108027',1011001,0,NULL,NULL,0,19),('70100108028','38d4cb414932086975a7645c0ea34acb',1,'Yeo Silva',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108028',1011001,0,NULL,NULL,0,19),('70100108029','99141b5f30552c3b787363b9790f528a',1,'Rama Small',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108029',1011001,0,NULL,NULL,0,19),('70100108030','61e4dc5a087bb706a76b22c2a7f86e78',1,'Jerry Hopkins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108030',1011001,0,NULL,NULL,0,19),('70100108031','8ddd415014e960f3744a63adddc95ae2',1,'Brynn Mendez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108031',1011001,0,NULL,NULL,0,19),('70100108032','9c2a86e24127dcc0b66f4357a52c0eb6',1,'Kevyn Martinez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108032',1011001,0,NULL,NULL,0,19),('70100108033','abad68d916dd96b749b0a54292f5812e',1,'Cruz Vaughn',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108033',1011001,0,NULL,NULL,0,19),('70100108034','d5317dda71320af9036d987d0cd9cc34',1,'Tashya Simmons',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108034',1011001,0,NULL,NULL,0,19),('70100108036','ec4d92fa27281e579517a43cf247bb2f',1,'Meghan Monroe',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108036',1011001,0,NULL,NULL,0,19),('70100108037','3e6dfef81f0a3da79e807508409322cb',1,'Georgia Reese',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108037',1011001,0,NULL,NULL,0,19),('70100108038','c66d6e05500899173b3efff9b2b04dc1',1,'Ashely Barton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108038',1011001,0,NULL,NULL,0,19),('70100108039','91b08df537cff08b004f25c6bd17bf7d',1,'Lani Gould',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108039',1011001,0,NULL,NULL,0,19),('70100108040','fa764cc3e571bf343683f7e83ae95666',1,'Kyra Frazier',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108040',1011001,0,NULL,NULL,0,19),('70100108042','2db73e0e440498c4440a9f646912e9df',1,'Steven Flores',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108042',1011001,0,NULL,NULL,0,19),('70100108043','a85455a0d1b7d26ddd7044a39b3b03ec',1,'Dana Diaz',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108043',1011001,0,NULL,NULL,0,19),('70100108044','e2c8ca3521ca068efa5fc3e5f9018f4f',1,'Charlotte Levine',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108044',1011001,0,NULL,NULL,0,19),('70100108045','94799e01460885b942f6f57345ae9ec1',1,'Mollie Chapman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108045',1011001,0,NULL,NULL,0,19),('70100108046','309ca5a0d3364eb7047400c5db99abbb',1,'Hamilton Hunter',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108046',1011001,0,NULL,NULL,0,19),('70100108047','65737da0fc9dbcb73fddf08c2a86469d',1,'Akeem Snow',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108047',1011001,0,NULL,NULL,0,19),('70100108048','e4ecd964f14ad685b0f51b1c20ac6061',1,'Teagan Casey',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108048',1011001,0,NULL,NULL,0,19),('70100108049','e75fdf298b94516227edbeea892aa8ed',1,'Jena Houston',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108049',1011001,0,NULL,NULL,0,19),('70100108050','fb6aef8b314a983db74d860e8bf7e386',1,'Odessa Pacheco',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108050',1011001,0,NULL,NULL,0,19),('70100108051','366ed0630b3aef99dc8c990e264b1086',1,'Gwendolyn Mercado',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108051',1011001,0,NULL,NULL,0,19),('70100108053','715cc017636bc07bb5c98fe40fb08b88',1,'Kevin Baker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108053',1011001,0,NULL,NULL,0,19),('70100108054','7d1a01d5da276254a169328574db597e',1,'Dean Tate',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108054',1011001,0,NULL,NULL,0,19),('70100108056','e14846877ace4189668b8299c7899586',1,'Raya Fulton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108056',1011001,0,NULL,NULL,0,19),('70100108057','734aa17d853d044a2d72ede8e4bd802a',1,'Violet Gray',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108057',1011001,0,NULL,NULL,0,19),('70100108058','c1b63d83ad073d86d555d21972348f4f',1,'Mira Kirkland',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108058',1011001,0,NULL,NULL,0,19),('70100108059','4add29dec9171f9f9f3ba2f91cd0e2cf',1,'Mia Lynch',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108059',1011001,0,NULL,NULL,0,19),('70100108060','1f92fa52940a34249f158b314b18cd64',1,'Rhiannon Travis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108060',1011001,0,NULL,NULL,0,19),('70100108061','d4a80061b0112221d8a62a6d1bf6796e',1,'Ray Woodard',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108061',1011001,0,NULL,NULL,0,19),('70100108062','eadd51f95a67c749518de66e2be8b739',1,'Ira Irwin',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108062',1011001,0,NULL,NULL,0,19),('70100108063','53240ea74b33018d62f95fcb40777232',1,'Calvin Santana',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108063',1011001,0,NULL,NULL,0,19),('70100108065','189236d3fd1c7766d6e7b864a2692a0b',1,'Ursula Cherry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108065',1011001,0,NULL,NULL,0,19),('70100108067','aafb319cfc6139a2102647b9342bf80c',1,'Michael Sears',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108067',1011001,0,NULL,NULL,0,19),('70100108068','b11497f2de84c90772eff02e80a10062',1,'Fleur Carlson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108068',1011001,0,NULL,NULL,0,19),('70100108069','7030856f78f6344dcce61a65ee06ca53',1,'Drake Bartlett',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108069',1011001,0,NULL,NULL,0,19),('70100108070','b1e7eff48b1c112f25756746786ba6dc',1,'Serina Morrison',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108070',1011001,0,NULL,NULL,0,19),('70100108071','4de38cb87a35d7f6f7346fb901fc4dc0',1,'Melissa Harding',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108071',1011001,0,NULL,NULL,0,19),('70100108072','fd4c55e7a884ca171c92975e62c59090',1,'Mira Valencia',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108072',1011001,0,NULL,NULL,0,19),('70100108073','5780f60fff292e25ecaaf3e6b4463242',1,'Dustin Hurst',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108073',1011001,0,NULL,NULL,0,19),('70100108074','4e43db17a64750c801ce4bb4c94d5817',1,'Damian Dalton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108074',1011001,0,NULL,NULL,0,19),('70100108075','cc1dc7776e2454f728520acd244f4c36',1,'Ryan Tucker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108075',1011001,0,NULL,NULL,0,19),('70100108076','0175732572840ed605b858d7777ae347',1,'Oleg Kelly',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108076',1011001,0,NULL,NULL,0,19),('70100108077','a38071a80b5aabf25ae144060aee5979',1,'Jakeem Larson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108077',1011001,0,NULL,NULL,0,19),('70100108078','303fc09201f8ac20e1b0e8233e927944',1,'Helen Dominguez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108078',1011001,0,NULL,NULL,0,19),('70100108079','04bc2dd8aefc8ada7359a48965cadb99',1,'Kaitlin Shaw',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108079',1011001,0,NULL,NULL,0,19),('70100108080','0531d09e3ab9b0b4edbbd5e625bae29a',1,'Noble Nash',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108080',1011001,0,NULL,NULL,0,19),('70100108081','2261e9e37022dde66fdc9426f5c9f4a3',1,'Maryam Moon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108081',1011001,0,NULL,NULL,0,19),('70100108083','9ac3d3e1a36b41fd40f3f56b99bd69fc',1,'Samuel Galloway',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108083',1011001,0,NULL,NULL,0,19),('70100108084','31e96718456d75e7da89ee500e9a4b46',1,'Jared Casey',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108084',1011001,0,NULL,NULL,0,19),('70100108085','0fc2af79d4637988c7d7a337dbcaa7a4',1,'Jason Prince',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108085',1011001,0,NULL,NULL,0,19),('70100108086','c1359149f5ad5adcaebddac21b519bf9',1,'Ciara Frazier',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108086',1011001,0,NULL,NULL,0,19),('70100108087','864239a0815e3fb20935a9ae5d37d61e',1,'Hasad Spears',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108087',1011001,0,NULL,NULL,0,19),('70100108088','01697c19d230331b6018606e50c2ab6a',1,'Neil Bennett',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108088',1011001,0,NULL,NULL,0,19),('70100108089','44260e342d23464aba623b0e4e9de174',1,'Raja Williams',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108089',1011001,0,NULL,NULL,0,19),('70100108090','5a0d0d9177871f835b4a91490d230f3f',1,'Kay Allison',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100108090',1011001,0,NULL,NULL,0,19),('70100109003','75308e72a83da175a720862134b3dca2',1,'Uma Vang',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109003',1011001,0,NULL,NULL,0,19),('70100109004','fa45c134490caf45195fd6e43856471d',1,'Sean Hamilton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109004',1011001,0,NULL,NULL,0,19),('70100109005','796234d07dbb9dd08422dada2b945983',1,'Isaac Dennis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109005',1011001,0,NULL,NULL,0,19),('70100109006','ea2c211f0a7cc67b4ae427adc6dbbea6',1,'Madeson Watson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109006',1011001,0,NULL,NULL,0,19),('70100109007','2b40b1f89430a25b335f16d73684bc3a',1,'Astra Gentry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109007',1011001,0,NULL,NULL,0,19),('70100109009','08303d4c782a4f10a3163781642d8159',1,'Lucius Phelps',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109009',1011001,0,NULL,NULL,0,19),('70100109012','5ae3940d274ed37d3220ebb62c6034fb',1,'Xena Hooper',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109012',1011001,0,NULL,NULL,0,19),('70100109013','51dfbd23bda26b6495ec5c971c9f3e27',1,'Amir Holman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109013',1011001,0,NULL,NULL,0,19),('70100109015','3c83d21b10b51638312ce32d11539003',1,'Lev Landry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109015',1011001,0,NULL,NULL,0,19),('70100109016','790ca0a574d7f4a9a5bf5079fcf03e9f',1,'Celeste Rosario',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109016',1011001,0,NULL,NULL,0,19),('70100109017','55287426f9abf77ea20ae20ea38e7127',1,'Sage Marquez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109017',1011001,0,NULL,NULL,0,19),('70100109018','017cee6562b9665b20f8c21d018a7283',1,'McKenzie Lawrence',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109018',1011001,0,NULL,NULL,0,19),('70100109022','27f6c66f28fb2ca0157ccf1faec06ae8',1,'Madonna Holman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109022',1011001,0,NULL,NULL,0,19),('70100109023','a5fc859e9c4a1a6c5e7edeab9cc0debc',1,'Joy Carrillo',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109023',1011001,0,NULL,NULL,0,19),('70100109024','58a06bed9a287ca9d759f7fa765936bd',1,'Ivan Osborne',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109024',1011001,0,NULL,NULL,0,19),('70100109026','6cb1b9657ba2aaf2363271cc98062bf6',1,'Joseph Gross',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109026',1011001,0,NULL,NULL,0,19),('70100109027','a81ea08b7428104651799d5ca33d2a27',1,'Lunea Gentry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109027',1011001,0,NULL,NULL,0,19),('70100109028','8b02d5bd08420e912630cc859c3b87ff',1,'Paul Bean',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109028',1011001,0,NULL,NULL,0,19),('70100109029','cde50fc23961f6bac592bc3acd140369',1,'Lana Guerrero',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109029',1011001,0,NULL,NULL,0,19),('70100109030','d5699b5891e813ccecd8dc0b43503438',1,'Abel Morin',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109030',1011001,0,NULL,NULL,0,19),('70100109032','4c5926d5a1f4a6d437a484232b90c1b8',1,'Neville Mejia',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109032',1011001,0,NULL,NULL,0,19),('70100109033','7a01546957b62eea081eeabfe48684ad',1,'Guinevere Noel',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109033',1011001,0,NULL,NULL,0,19),('70100109034','dd387c12f94cefc557dce72aa042f3cc',1,'Andrew Hess',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109034',1011001,0,NULL,NULL,0,19),('70100109035','dacc0b57d809224ac876d34adade1a61',1,'Blake Morrow',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109035',1011001,0,NULL,NULL,0,19),('70100109036','38d53b1ab837b6c6fd7f6b1afcf69abe',1,'Venus Fields',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109036',1011001,0,NULL,NULL,0,19),('70100109037','c21f3cb9db492834618f9fe66b4bf04b',1,'Irma Reilly',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109037',1011001,0,NULL,NULL,0,19),('70100109038','905cbf95e3047f119fc0fb474ae7e014',1,'Shana Brennan',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109038',1011001,0,NULL,NULL,0,19),('70100109039','81fabe64a6cec6fc9d771faf76741a91',1,'Ebony Jefferson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109039',1011001,0,NULL,NULL,0,19),('70100109041','cffcd4497a207ae8cf57a7e034d334ef',1,'Kelly Robinson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109041',1011001,0,NULL,NULL,0,19),('70100109042','488f92c2fb7ef64c9b2af3cffb1fc38c',1,'Macy Wise',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109042',1011001,0,NULL,NULL,0,19),('70100109043','91b889bd628b386590665da7bf164ee0',1,'Jenna Burch',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109043',1011001,0,NULL,NULL,0,19),('70100109044','4aab64aaaa211106ef4e7aee8c18f10b',1,'George Bowen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109044',1011001,0,NULL,NULL,0,19),('70100109046','ff4b3a8e385a1639a0b7037d3ce0dda0',1,'Ivy Bradshaw',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109046',1011001,0,NULL,NULL,0,19),('70100109047','1baaca96eff3e6af2971cf20d60d0a9d',1,'Byron Ashley',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109047',1011001,0,NULL,NULL,0,19),('70100109048','5f6452507db289487778d922f8ee3dbb',1,'Janna Carey',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109048',1011001,0,NULL,NULL,0,19),('70100109049','724e4447b45e767bdf49697c66604678',1,'Melodie Charles',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109049',1011001,0,NULL,NULL,0,19),('70100109051','7588fb012be6ac9581ca59fefecd838b',1,'Piper Ball',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109051',1011001,0,NULL,NULL,0,19),('70100109052','e3b47afaa754bae76bc083bda8f1823c',1,'Sebastian Salinas',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109052',1011001,0,NULL,NULL,0,19),('70100109053','558764896413eff70141ee8e38357365',1,'Ivory Waters',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109053',1011001,0,NULL,NULL,0,19),('70100109054','3872dc912b69279c5edb629ac612ad30',1,'Jael Haney',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109054',1011001,0,NULL,NULL,0,19),('70100109055','73d4b8967d2361945f7d4129eec3fc38',1,'Dale Thomas',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109055',1011001,0,NULL,NULL,0,19),('70100109056','fec097b329ef6fe39d9f787a2a759edc',1,'Cadman Blevins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109056',1011001,0,NULL,NULL,0,19),('70100109057','24a90cdcd9e2e4dc3ee41bca1b9caa86',1,'Zeus Hobbs',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109057',1011001,0,NULL,NULL,0,19),('70100109058','56772d12a9fd3390e53b1eb42e217b7d',1,'Kirby Leon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109058',1011001,0,NULL,NULL,0,19),('70100109059','d7d72ead2b38dea105af51ec1d3d6d44',1,'Clementine Church',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109059',1011001,0,NULL,NULL,0,19),('70100109060','fb98e36c93d1ea255e77a636731bcb3f',1,'Kamal Odom',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109060',1011001,0,NULL,NULL,0,19),('70100109062','a662e58383da9e4ccef8197b2c865a5f',1,'Elijah Solomon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109062',1011001,0,NULL,NULL,0,19),('70100109063','7af39797c88a145aa587db23252978cf',1,'Quinlan Preston',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109063',1011001,0,NULL,NULL,0,19),('70100109066','532cb970f44226b3a609177e667b26dd',1,'Whoopi Tucker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109066',1011001,0,NULL,NULL,0,19),('70100109067','b41890c7c6df4a79521f3f3f18daa473',1,'Prescott Hester',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109067',1011001,0,NULL,NULL,0,19),('70100109068','318a930cb275e67217871d9f01443e29',1,'Andrew Hinton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109068',1011001,0,NULL,NULL,0,19),('70100109071','a671697492bdd1ccdb49963c0c3c5c13',1,'Lee Salinas',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109071',1011001,0,NULL,NULL,0,19),('70100109072','8709147691d5e6cbe19cfb99dd19d33d',1,'Jaime Hines',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109072',1011001,0,NULL,NULL,0,19),('70100109073','3ae51c7251b2b88fd2b83dbccd24640e',1,'Macaulay Trevino',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109073',1011001,0,NULL,NULL,0,19),('70100109074','22700374ad662c985f6a0f5353e95bf5',1,'Hadassah Blackwell',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109074',1011001,0,NULL,NULL,0,19),('70100109075','63465b1b763cc1f8c1d7ce6ede5a6493',1,'Elijah Mcknight',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109075',1011001,0,NULL,NULL,0,19),('70100109076','84c9e6ae3497256379e3c1c6190db0de',1,'Xerxes Holden',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109076',1011001,0,NULL,NULL,0,19),('70100109077','b6476c191048f98f73c8eadee10d1ad8',1,'Morgan Wiggins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109077',1011001,0,NULL,NULL,0,19),('70100109078','ef70dbdd83d952298ed753f6d26725c3',1,'Shoshana Delgado',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109078',1011001,0,NULL,NULL,0,19),('70100109079','db5d0f225ca1883bc442b8b3f74c6616',1,'Josiah Bentley',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109079',1011001,0,NULL,NULL,0,19),('70100109080','afd051a7857c9529c1bfcb1e1a58c355',1,'Holly Alexander',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109080',1011001,0,NULL,NULL,0,19),('70100109081','628612ad1d84ed962e68713df78c81d7',1,'Patricia Pacheco',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109081',1011001,0,NULL,NULL,0,19),('70100109082','95d40ecf1fa9b55c9952edcbfda4a31c',1,'Sophia Lamb',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109082',1011001,0,NULL,NULL,0,19),('70100109083','f86d7beef2593eb00b17e09d08d7f845',1,'Iona Sawyer',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109083',1011001,0,NULL,NULL,0,19),('70100109084','68bb30f95fa2cc8c0de70afdfaed6055',1,'Ignatius Conway',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109084',1011001,0,NULL,NULL,0,19),('70100109087','e8d8468c9177d9f53f9e15d46ca7fa8b',1,'Dante Jennings',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100109087',1011001,0,NULL,NULL,0,19),('70100110001','f258f926404b572db3c134d09d87f16e',1,'Madeline Schneider',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110001',1011001,0,NULL,NULL,0,19),('70100110002','34d3e579d780f2b39e18601a91b695b1',1,'Ebony Blevins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110002',1011001,0,NULL,NULL,0,19),('70100110003','a44e6fc86b33ddffbba9a68d44e3d0ef',1,'David Todd',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110003',1011001,0,NULL,NULL,0,19),('70100110004','d7af6f80acc5118b7f283e45d80116eb',1,'Zachary Mercado',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110004',1011001,0,NULL,NULL,0,19),('70100110005','2ef20269e7d3e6bd5fa4f557652ef211',1,'Yen Everett',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110005',1011001,0,NULL,NULL,0,19),('70100110006','7d2cbae520b08747bb4bb3b5b6cb6564',1,'Cooper Watkins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110006',1011001,0,NULL,NULL,0,19),('70100110007','02fad5bd92e55f01148c024e063cf5b3',1,'Nina Travis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110007',1011001,0,NULL,NULL,0,19),('70100110008','ceadbb730e24a1f3842ca22cc1208819',1,'Tyrone Marsh',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110008',1011001,0,NULL,NULL,0,19),('70100110009','0f5973b17d0e47306d4002f645f111cb',1,'Byron Herrera',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110009',1011001,0,NULL,NULL,0,19),('70100110010','5cf4b93426a0e1b3afa86f2186672479',1,'Maggie Lynch',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110010',1011001,0,NULL,NULL,0,19),('70100110011','8415b5f63dde8c34ca5df1b9abc2eda7',1,'Ignatius Gutierrez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110011',1011001,0,NULL,NULL,0,19),('70100110012','deb0d7cd5738904b20d5b8f21bc67618',1,'David Fisher',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110012',1011001,0,NULL,NULL,0,19),('70100110013','052c954f2178de0b898a580de7e847d5',1,'Sylvia Olsen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110013',1011001,0,NULL,NULL,0,19),('70100110014','abb687286af099b8822bd546213dc79c',1,'Bo Franco',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110014',1011001,0,NULL,NULL,0,19),('70100110015','483ef16b16d771a51042b023d5fe6999',1,'Sydney Gonzalez',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110015',1011001,0,NULL,NULL,0,19),('70100110016','364f77195215104cb9861c98d983d2c6',1,'Rama Kirkland',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110016',1011001,0,NULL,NULL,0,19),('70100110017','43562f9c81c39aebaa85e5561f91540b',1,'Cecilia Bentley',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110017',1011001,0,NULL,NULL,0,19),('70100110018','b3bef839f52909a0519370a7c1745ec0',1,'Lee Higgins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110018',1011001,0,NULL,NULL,0,19),('70100110019','aeb7f29f4569e37cc1db9b2e587b151c',1,'Xander Mathis',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110019',1011001,0,NULL,NULL,0,19),('70100110020','7fb9534969ca9e076f04fbf0a5e81c9c',1,'Alyssa Walton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110020',1011001,0,NULL,NULL,0,19),('70100110021','5c1ca25b4e50d65eac9ea03de73df9c7',1,'Shafira Dyer',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110021',1011001,0,NULL,NULL,0,19),('70100110022','da897c684e971f7f7b0b9bc8b0bd1482',1,'Tana Macias',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110022',1011001,0,NULL,NULL,0,19),('70100110023','7976b7d7b1986770eac2a4d9c90cbf11',1,'Carter Salas',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110023',1011001,0,NULL,NULL,0,19),('70100110024','5840a8e90d223d925d257a8eddf01e17',1,'Bree Frank',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110024',1011001,0,NULL,NULL,0,19),('70100110025','9dbbefb72b9c4bb1a3aa57c6f05e5853',1,'Cooper Pugh',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110025',1011001,0,NULL,NULL,0,19),('70100110026','a42bc3547a1427da912ea713baf05223',1,'Shoshana Morin',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110026',1011001,0,NULL,NULL,0,19),('70100110027','95b3b353b819d2d5fd1d458ce5d5ba72',1,'Brandon Britt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110027',1011001,0,NULL,NULL,0,19),('70100110028','140585e7b04de792ff3de9f23ffe38c0',1,'Vera Abbott',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110028',1011001,0,NULL,NULL,0,19),('70100110029','dba2779d0991333a6e7f98c2d585eb12',1,'Raymond Barry',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110029',1011001,0,NULL,NULL,0,19),('70100110030','0dee6febf4287227a9819e675a1cef5b',1,'Eugenia Nixon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110030',1011001,0,NULL,NULL,0,19),('70100110031','48fcd53decac3df0d0bd3785fbac3ce3',1,'Hedley Bowers',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110031',1011001,0,NULL,NULL,0,19),('70100110032','f4f74a492f839c6d62bbf253b46f3ad6',1,'Cedric Mathews',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110032',1011001,0,NULL,NULL,0,19),('70100110033','c2f70ac017f9692e227dfb93976e7048',1,'Cally Reilly',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110033',1011001,0,NULL,NULL,0,19),('70100110034','925a856d3ba6d2a462cac0030334ac33',1,'Zelenia Burch',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110034',1011001,0,NULL,NULL,0,19),('70100110035','1a5802085e02d8608d29477a0e572d16',1,'Francis Baker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110035',1011001,0,NULL,NULL,0,19),('70100110036','08e98148f680687b30323e656548ba86',1,'Anthony Clarke',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110036',1011001,0,NULL,NULL,0,19),('70100110037','1e18a0e3c0797db0375d3c766ac819ab',1,'Elliott Watson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110037',1011001,0,NULL,NULL,0,19),('70100110038','716e32676f02c474d12174039433cf84',1,'Oprah Hunt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110038',1011001,0,NULL,NULL,0,19),('70100110039','3a9deaf774b1c794da554d9ed5896ed9',1,'Piper Simon',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110039',1011001,0,NULL,NULL,0,19),('70100110040','30d6b87607ae595621b3f3937f97ea99',1,'Quin Wilson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110040',1011001,0,NULL,NULL,0,19),('70100110041','bccb199d58bf678da84a36b5e3e1d327',1,'Leroy Meyers',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110041',1011001,0,NULL,NULL,0,19),('70100110042','6dbb2e33db7771b18d801a9f4f52c452',1,'Madeline Pate',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110042',1011001,0,NULL,NULL,0,19),('70100110043','ef0bce84135a3568b2abb2017e7c3b13',1,'Olivia Madden',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110043',1011001,0,NULL,NULL,0,19),('70100110044','770af295460108688c6857e2483c2398',1,'Nina Lambert',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110044',1011001,0,NULL,NULL,0,19),('70100110045','477055f1074039c43cb276bff1a79064',1,'Lillian Alvarado',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110045',1011001,0,NULL,NULL,0,19),('70100110046','784e5f267db3d7371c3d2c2a09f44d3d',1,'Charity Yates',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110046',1011001,0,NULL,NULL,0,19),('70100110047','be40e9cc52396fb1f8a24cdfdc82a2aa',1,'Bert Green',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110047',1011001,0,NULL,NULL,0,19),('70100110048','ead90fa8857b5be5ab1eef40dc9266a3',1,'Kyra Doyle',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110048',1011001,0,NULL,NULL,0,19),('70100110049','ba943895b691d70e9f877688ef558594',1,'Brenden Madden',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110049',1011001,0,NULL,NULL,0,19),('70100110050','e0cb2c746b3977cd70f72bf3624803a4',1,'Guinevere Howe',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110050',1011001,0,NULL,NULL,0,19),('70100110051','69b07071b28a54b357bfa83a2d35e349',1,'Leila Hodge',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110051',1011001,0,NULL,NULL,0,19),('70100110052','72d3f8e5e1e20f296b5eb5321cde64f8',1,'Magee Stokes',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110052',1011001,0,NULL,NULL,0,19),('70100110053','d305340e64c2b706c95af82a476362fb',1,'Halla Gould',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110053',1011001,0,NULL,NULL,0,19),('70100110054','0094e6739d65ecaec7a5d3be6ebda02f',1,'Galena Caldwell',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110054',1011001,0,NULL,NULL,0,19),('70100110055','162cb1a3c60f5155d3dfc4c3ee939e54',1,'Claire Britt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110055',1011001,0,NULL,NULL,0,19),('70100110056','e463a8584beab4fa49ff1c46b727fd35',1,'Blythe Rosa',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110056',1011001,0,NULL,NULL,0,19),('70100110057','1761d40e29c73942067cce8cb640e197',1,'Olivia Pope',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110057',1011001,0,NULL,NULL,0,19),('70100110058','7caffa2b9272e0d4907c2c1eeba15f2c',1,'Joy Hudson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110058',1011001,0,NULL,NULL,0,19),('70100110059','b5349ab9be201418d9578a78adf5292e',1,'Eliana Cotton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110059',1011001,0,NULL,NULL,0,19),('70100110060','427a546c44afe49c6c0495739b81218c',1,'Xavier Sweeney',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110060',1011001,0,NULL,NULL,0,19),('70100110061','9b3a09ac1e5104c1610dc829a8e91f29',1,'Conan Casey',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110061',1011001,0,NULL,NULL,0,19),('70100110062','b390860ba37ac29e59cfb6d53bbacaab',1,'Sylvia Fulton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110062',1011001,0,NULL,NULL,0,19),('70100110063','266408d22700a3b8139455f9f58cb02a',1,'Karina Howard',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110063',1011001,0,NULL,NULL,0,19),('70100110064','1170e3c957395af3c5111b975c5695ac',1,'Lance Moody',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110064',1011001,0,NULL,NULL,0,19),('70100110065','25543a0eb20ff8632baf921f61b72a27',1,'Abigail Walter',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110065',1011001,0,NULL,NULL,0,19),('70100110066','0eb75f4f8236225128684d71f9d7223d',1,'Ayanna Mcdaniel',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110066',1011001,0,NULL,NULL,0,19),('70100110067','069003461a325f1fab4a82d8c4fcc7a1',1,'Griffin Patton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110067',1011001,0,NULL,NULL,0,19),('70100110068','5b0abc51d987392d3eed7294a71e92d3',1,'Jasmine Prince',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110068',1011001,0,NULL,NULL,0,19),('70100110069','cd84c014f3ca475ded441a407fa002fc',1,'Armand Russo',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110069',1011001,0,NULL,NULL,0,19),('70100110070','596b421392994fa502bf0a920025c090',1,'Steven Emerson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110070',1011001,0,NULL,NULL,0,19),('70100110071','a9c0526c647d219104dbfe703014809d',1,'Tiger Wong',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110071',1011001,0,NULL,NULL,0,19),('70100110072','8353e183675bcbd176b98fbf862bde70',1,'Aphrodite Montoya',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110072',1011001,0,NULL,NULL,0,19),('70100110073','fd25bdc1a9b83acbfed37801016e83a6',1,'Norman Maldonado',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110073',1011001,0,NULL,NULL,0,19),('70100110074','7816a964027d22fe5554a65f5115ebdf',1,'Barclay Aguilar',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110074',1011001,0,NULL,NULL,0,19),('70100110075','d46b3d13ee770922b83bd1596a1cfd23',1,'Quail Becker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110075',1011001,0,NULL,NULL,0,19),('70100110076','bf9aaf7bca9a260f28bc4cb39742a7e2',1,'Tara Witt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110076',1011001,0,NULL,NULL,0,19),('70100110077','36a324b260f12abef250e034eca98211',1,'Cody Roberson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110077',1011001,0,NULL,NULL,0,19),('70100110078','578df028717ef3df9f67269ef88c93f5',1,'Erasmus Pickett',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110078',1011001,0,NULL,NULL,0,19),('70100110079','416eb042a2a839ac9d4bbaaea9aa9166',1,'Cynthia Stephens',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110079',1011001,0,NULL,NULL,0,19),('70100110080','185e07f4ef695e4da3fb9d8f3340a1d6',1,'Graham Dejesus',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110080',1011001,0,NULL,NULL,0,19),('70100110081','8e6e2a242e0b1b554aa164a63294b361',1,'Ronan House',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110081',1011001,0,NULL,NULL,0,19),('70100110082','109553113da9662452c9c31a55148dcf',1,'Russell Clements',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110082',1011001,0,NULL,NULL,0,19),('70100110083','0655bb70769a15e80ea626e9e56b7b07',1,'Candace Finley',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110083',1011001,0,NULL,NULL,0,19),('70100110084','8f8e98504491aa68fffdece633d72e89',1,'Uma Davenport',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110084',1011001,0,NULL,NULL,0,19),('70100110085','4d27e12d9d5a995ce912a2e67d7dea50',1,'Basil Rosario',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110085',1011001,0,NULL,NULL,0,19),('70100110086','75804fccc1fda311dd0dae3ba0b01559',1,'Jonah Abbott',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110086',1011001,0,NULL,NULL,0,19),('70100110087','672ca2d3e29c04fd4b5e3cf70a425ec0',1,'Ralph Lynn',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110087',1011001,0,NULL,NULL,0,19),('70100110088','3b7827a8d597adfbfb4813c2d3d39c19',1,'Mannix Kerr',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110088',1011001,0,NULL,NULL,0,19),('70100110089','ffee246d00ba636c835b6d4dc22d911a',1,'Blake Petty',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110089',1011001,0,NULL,NULL,0,19),('70100110090','4a63a40554cbbdedeea1ee2827aa32eb',1,'Juliet Stein',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110090',1011001,0,NULL,NULL,0,19),('70100110091','bf9e064487ae7b8f7799601c68a9fe36',1,'Rama Hatfield',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110091',1011001,0,NULL,NULL,0,19),('70100110092','013551cffaf83aac99e86bb3a7acc1e6',1,'Shelby Wyatt',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110092',1011001,0,NULL,NULL,0,19),('70100110093','0d8cf65b7d218ea31e06ac325170d696',1,'Celeste Casey',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110093',1011001,0,NULL,NULL,0,19),('70100110094','2f9e879bd484ccca0e40bc2288b5f4bb',1,'Ocean Head',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110094',1011001,0,NULL,NULL,0,19),('70100110095','c52d91e9bb5e0a0a6646e64b191b6878',1,'Alexandra Bolton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110095',1011001,0,NULL,NULL,0,19),('70100110096','5661d7310210fac9014e2e1f95b8f63c',1,'Mannix Shepherd',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110096',1011001,0,NULL,NULL,0,19),('70100110097','58ae7af298f42659fb371f565120409c',1,'Keaton Huffman',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110097',1011001,0,NULL,NULL,0,19),('70100110098','d322821c70f1737dc971f51b56e345dc',1,'Ainsley Olsen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110098',1011001,0,NULL,NULL,0,19),('70100110099','6f2b96e7fb233ffed18af0de5f78be56',1,'Patience Walsh',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110099',1011001,0,NULL,NULL,0,19),('70100110100','a9e6f853a393080d363c6fa64adcc1e3',1,'Tiger Sharpe',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110100',1011001,0,NULL,NULL,0,19),('70100110101','0394fafb6daa7ac9e046c98351daa22d',1,'Orlando Hawkins',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110101',1011001,0,NULL,NULL,0,19),('70100110102','3ca2eb6c67a8a9451db0d021ce761dff',1,'Scarlet Kramer',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110102',1011001,0,NULL,NULL,0,19),('70100110103','89249072b1debdac0a0f21ad2a5a13b2',1,'Warren James',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110103',1011001,0,NULL,NULL,0,19),('70100110104','f8c8d26350a94c783009eb6e433d610e',1,'Adele Becker',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110104',1011001,0,NULL,NULL,0,19),('70100110105','e99193dd170126260f9964a3b0b2461f',1,'Cheyenne Kramer',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110105',1011001,0,NULL,NULL,0,19),('70100110106','5eb6c872eb13c095d3411c9447948053',1,'Vance William',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110106',1011001,0,NULL,NULL,0,19),('70100110107','505561055896c80f85c86ae723397ea8',1,'Timon Robinson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110107',1011001,0,NULL,NULL,0,19),('70100110108','4616434022f8ee111e78f66987f82c17',1,'Xandra Booth',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110108',1011001,0,NULL,NULL,0,19),('70100110109','7da80f2bbd0cf76eb6b64c75fd9ced74',1,'Veronica Olsen',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110109',1011001,0,NULL,NULL,0,19),('70100110110','384f4c15e513bc144c0c4667b3c6103a',1,'Jolene Whitehead',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110110',1011001,0,NULL,NULL,0,19),('70100110111','2f5b63591cd8e5d1d69dbea2032464cd',1,'Quemby Burton',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110111',1011001,0,NULL,NULL,0,19),('70100110112','cea8d03fa22eb48eab11a16335bbce46',1,'Ria Fitzpatrick',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110112',1011001,0,NULL,NULL,0,19),('70100110113','915bb42225063e1106e24b8fdc640e27',1,'Lavinia Savage',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110113',1011001,0,NULL,NULL,0,19),('70100110114','9f24d85b93a809f50baf9e7a9431e9f8',1,'Yasir Gallegos',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110114',1011001,0,NULL,NULL,0,19),('70100110115','50b11a9de9f2f07def827bb4af44f89d',1,'Portia Sullivan',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110115',1011001,0,NULL,NULL,0,19),('70100110116','0b24c86d9234aaa3e77b81419ece4f64',1,'Candice Kelly',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110116',1011001,0,NULL,NULL,0,19),('70100110117','66ef40658dffbf428bcaf05799e742a6',1,'Ebony Wynn',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110117',1011001,0,NULL,NULL,0,19),('70100110118','c819b53af275f27ec97d83bf927570ad',1,'Abraham Delacruz',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110118',1011001,0,NULL,NULL,0,19),('70100110119','9b4da027a62d6b5007dfb25c428b2ec3',1,'Janna Anderson',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110119',1011001,0,NULL,NULL,0,19),('70100110120','45b3caab4ced29ae86e28b40df732bc2',1,'Elijah Murray',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110120',1011001,0,NULL,NULL,0,19),('70100110121','2e10e1fd1afe135b1516b902849a66cb',1,'Keefe Dale',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110121',1011001,0,NULL,NULL,0,19),('70100110122','b8cd1746785c05f65a72f2b8924ead1b',1,'Malachi Holmes',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100110122',1011001,0,NULL,NULL,0,19),('70100111001','4519f6d258553495d1b6683af50fd63f',1,'ANDI SAPUTRO',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100111001',1011001,0,NULL,NULL,0,19),('70100111002','0757e4fe654712e11d591c41fb9c08de',1,'KIERA ALIA PUTRI',NULL,NULL,NULL,NULL,NULL,0,NULL,'70100111002',1011001,0,NULL,NULL,0,19),('admin','21232f297a57a5a743894a0e4a801fc3',3,'Administrator Portal',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,1021001,0,NULL,'2012-04-25 13:40:36',1,NULL),('mahasiswa','744d3c652c7825046eca59a4fa464595',1,'Mahasiswa Demo',NULL,NULL,NULL,NULL,NULL,0,NULL,'ok',1011001,0,NULL,NULL,0,2);
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user_login`
--

DROP TABLE IF EXISTS `t_user_login`;
CREATE TABLE `t_user_login` (
  `tusrlgnSesId` varchar(50) NOT NULL default '',
  `tusrlgnTusrNama` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`tusrlgnSesId`),
  KEY `FK_tusrlgnTusrNama` (`tusrlgnTusrNama`),
  CONSTRAINT `FK_tusrlgnTusrNama` FOREIGN KEY (`tusrlgnTusrNama`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_login`
--

LOCK TABLES `t_user_login` WRITE;
/*!40000 ALTER TABLE `t_user_login` DISABLE KEYS */;
INSERT INTO `t_user_login` VALUES ('906bd29e83cb8470d3bf6c56b4c051ce','000000'),('88025cd46816d1c5fb63afee8bfc3f39','002'),('8a5951a7d177e0c4a0985489501834f3','002'),('258826a24a9169764fa9ae6f27c0f380','198109122009122008'),('0474dc5741cbef83d5c1c388cf46ef52','198211102009122005'),('0b5fbff3aba266729d3f0a2dd931b09a','198211102009122005'),('0b6dfbd5d8d5f458b3e7c978567bbb49','198211102009122005'),('0dcc0c6d58277907541e9234b85a413f','198211102009122005'),('16d08aa1b5be19abecd8220cbd38a528','198211102009122005'),('1fe63b6647b69540f1b5aad5fcf6ed3e','198211102009122005'),('286c32c7e00ddf1b7c289453081e7fd7','198211102009122005'),('2e8511ff278eeb9b9e26f71564c17f61','198211102009122005'),('3387e89efb8a783a1862a9e4b716c2c4','198211102009122005'),('34f0a37687edf0c861e0ce1c64695f10','198211102009122005'),('359b8ca57d9f9d7b81cead3eec79da35','198211102009122005'),('3e1b2dc780dd1d571a8be70771198ca3','198211102009122005'),('3e82b74e17ec7955fc006f0c48311127','198211102009122005'),('4c1ad7c35615d804d365aa23c1020665','198211102009122005'),('4c962f743a41c5725c97de1770094e50','198211102009122005'),('4d43b201083047f200e1889fa1426dfc','198211102009122005'),('562e031fdada07811fce78907670fe15','198211102009122005'),('564a25220857ce4b94d9268466d69323','198211102009122005'),('58c93cdcd4fa8c1d94e3363bce260063','198211102009122005'),('5c5238aea14aa0a3127361a361fd2d61','198211102009122005'),('5d7ffe8d84dec8e3718bdc92ffa3a955','198211102009122005'),('693983d7f4d284b029e0e9e3a212d865','198211102009122005'),('69e98630a66bab55ad78231e696a1674','198211102009122005'),('6f9c81fa9e88f2d1ff8a9c222d928b3d','198211102009122005'),('723f4ba3242ade13f324ee0655adba26','198211102009122005'),('74196e3ed1fb673ac80dfb26ed33477d','198211102009122005'),('902f468e5f8d95965de10ae4af712362','198211102009122005'),('9d94f4b8229e34b24bf07a4314fa2efb','198211102009122005'),('9ecc0ba9aaf8a2d650d82b8b12a38bbd','198211102009122005'),('a29c6a3f3661f711965ff1b4c9a14f82','198211102009122005'),('aada01861be429331057f34da4e79f29','198211102009122005'),('aff00f54bb7d0c3417a9ee451764b8fb','198211102009122005'),('bbaaab3702bfca6f16f5de34f3ad4ee6','198211102009122005'),('c3ee991b7638835c3c1f8bcf8e898533','198211102009122005'),('c4337901a023392426c3b43f2d1645a7','198211102009122005'),('c5c4ae11797124e18311dd09b064f6c9','198211102009122005'),('c7ad001c92f3cad1796b246fc9271fea','198211102009122005'),('cd4ce4b79af7e6b255fe216f61cfc020','198211102009122005'),('ce1647c33688e9d86a9ce2851f099b26','198211102009122005'),('d20447279785f6cab090c2e220e62204','198211102009122005'),('d695c4a8c7784586ad8c79f38fe0fb3f','198211102009122005'),('db99d5b114b6b3b077aada6d8f61363f','198211102009122005'),('dbb7c6520bd354c534db98509530b6b4','198211102009122005'),('dd6be7f7fe66aa95978abef7f94fdb02','198211102009122005'),('e28c416e4a493f593128d2bac8466679','198211102009122005'),('e38cab732c93713fdda0dbdb20cb3f29','198211102009122005'),('6d639599b2b1427db79e4fcec2f31263','198306112009122004'),('8746b4382fb0df6ceb1c69ea7dbf47ca','60200105003'),('384a1ae695f40d3c2666187254d62ab5','60200108003'),('029f243fc7474496c9146dafbe4351ac','60300110008'),('037886d4d9c34467e042628452391876','60300110008'),('110c996552cf084d0bcffea32f27a16f','60300110008'),('111ef5933fa0dda02b1d544ead72b8ff','60300110008'),('14c6406df10c2bca3570a9653a5c39b9','60300110008'),('1b4dcd38bdd2f9852bf0b6da4f38b59d','60300110008'),('1edb04a24866bee91b3bb88e4549e050','60300110008'),('21a8555ed0a75d319e8703cc6c3e0e90','60300110008'),('2f1eed0ad09c2a2ee2704ccf4c8c786f','60300110008'),('2f7edacaf17c280a996fcff256ba9e62','60300110008'),('3102ce2df30e945205a3827283c16e4a','60300110008'),('3340068cf0093bd4c6159b570f77271d','60300110008'),('39f03c4c8eb383c493438bf087dc829a','60300110008'),('3eae33f6ed4f9d2a7da7ebac1d2a529d','60300110008'),('42187ca801a371f78cf14fb7133e1cec','60300110008'),('49c39f2fa75b5cec348970c0824d8bd6','60300110008'),('4fc265a4e2fb2b17e7cea328b1ec730a','60300110008'),('575245d747908253ffeafb26f778e220','60300110008'),('597a2c4e8df878171151f819ea616fc6','60300110008'),('5f1d5fb32bd2b5e8ac439412807aff49','60300110008'),('61bd172ce0e589e6661608f76372a806','60300110008'),('69140bc3c138aa76eb5b44e5a57cb532','60300110008'),('72d5a128e54f4a1efad62f7ce066816d','60300110008'),('756c49fa4b91b9498fa1c200e49baa99','60300110008'),('767fb1083774cac9b621c96b923fcedb','60300110008'),('78b4fd72074a166ebd43cf8e3cb4f5a6','60300110008'),('7f261558bcef0924b33d29e1b11d12b3','60300110008'),('7f391077aad4d44966c49fde0467be92','60300110008'),('7f629ff0961a9a1a8f11bd3637582c53','60300110008'),('8a70c3db3e5b3cb84004ff106406ea11','60300110008'),('8b4d461530f79947befc085446c62907','60300110008'),('8ba90eb0c7e58e9597fd736dcf27dd54','60300110008'),('8c4f914e1a205021c6399025ed0f51d4','60300110008'),('8e3da36afa15ca2719db15edc852989d','60300110008'),('903b0e4115d664189c6e428ed059e02f','60300110008'),('90c6c98e59a3b560384febabe4f6cca1','60300110008'),('94ea7d192918d9938fddeb95cb76c01a','60300110008'),('96c54716037405bb1f3fe1b548ba9f61','60300110008'),('9706c84b2994f999160cfc1f4292ff7a','60300110008'),('9b9adcaf41adf5049123d4c0859945b6','60300110008'),('9bb49fd3fa98cf989c8c2aff17b46db5','60300110008'),('9be39691ac0757d7eeadfb749a6ea0d5','60300110008'),('a25456fe47f9bfc8833f68195b8cace3','60300110008'),('ae97b5e21c38722adba2b90c0872ee29','60300110008'),('b55f88fb8199ec5ec45011e479f0be81','60300110008'),('b730f4427a9d03445834f6872d2de545','60300110008'),('b85712a18267ad4ff062070851857b72','60300110008'),('b9d850a03bfbeafe3bb794eb27b11376','60300110008'),('bab2ff2913efc895456a5bcea7fbfa4b','60300110008'),('be6ac4259d1d444d3219f08619e58874','60300110008'),('c6da8c0f0e311c4b931fdb5c7e5131a1','60300110008'),('cb3778e7a750aa6da453d60b43d4b855','60300110008'),('cc41d8fc9fa9d3bdb45d96579adccb9b','60300110008'),('cf2379464b1cf71d26a35646f2973c98','60300110008'),('d0b9510d02461e01bba90cd105970872','60300110008'),('d961efe42afde7bd65854e84e20f4d34','60300110008'),('db0b1187791695261ac3316e239e1854','60300110008'),('dc2d7259419f480a94c6a652a3dee8db','60300110008'),('dcc52449b395cb93a156dd5ae6df5ad1','60300110008'),('e6b8dcb779fb8ae5cef44379dc025248','60300110008'),('e897b7baec9095df8abb0a81bfb6eb48','60300110008'),('ea365b99bf4f2ee110eb6742ca7abcdc','60300110008'),('ebeef90c65373d044bd7fcd09344139f','60300110008'),('efae178b86e66dc7aaeff7a4fe061616','60300110008'),('f039ae840cdc306f3f1d0b9cc25c7fde','60300110008'),('f15dd15787003ed65b34265105f5fb21','60300110008'),('f64b4cfb4a738a313e95ad5a77e5b0ae','60300110008'),('f687bc55fc10627a6bed6f9c0c3c1f74','60300110008'),('f77c2b27b199c70ff857635f7877c983','60300110008'),('f9a6eb1b6dacc4ea47baa4deb1c7686c','60300110008'),('f9cc4c3a584472b26cd66c36a49ff840','60300110008'),('fc05249f90f53fef3659c329b98992ea','60300110008'),('fd0c313067a113dfc6fb4f4a06e58fec','60300110008'),('fd3f956bf79e8a4ad1897597d019af05','60300111004'),('2910b4bdeb6d747ed37bcb362caf56c5','admin'),('4c96f40caf262191afcf9775b54e0cc4','admin'),('53bee767c5ef594f40e91566e1000b83','admin'),('8a2b63fd075342285e48a79238fea348','admin'),('iv7dcui59hvnv6n29hvq9iikp0','admin'),('s6u73qtj01bdr5a0univuc28p7','admin');
/*!40000 ALTER TABLE `t_user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user_temporer`
--

DROP TABLE IF EXISTS `t_user_temporer`;
CREATE TABLE `t_user_temporer` (
  `tusrNama` varchar(255) NOT NULL default '',
  `tusrPassword` varchar(255) default NULL,
  `tusrThakrId` smallint(6) NOT NULL default '0',
  `tusrProfil` varchar(40) default NULL,
  `tusrPertanyaan` varchar(255) default NULL,
  `tusrJawaban` varchar(255) default NULL,
  `tusrSignature` varchar(255) default NULL,
  `tusrAvatar` varchar(100) default NULL,
  `tusrEmail` varchar(50) default NULL,
  `tusrIsTampilBiodata` tinyint(1) unsigned NOT NULL default '0',
  `tusrNoTelp` varchar(50) default NULL,
  `tusrRefIndex` int(11) default NULL,
  `tusrUntId` int(3) unsigned default NULL,
  `tusrIsAgree` tinyint(3) unsigned default '0',
  `tusrAgreementDate` datetime default NULL,
  `tusrLastAccess` datetime default NULL,
  `tusrIsOnline` tinyint(1) default '0',
  `tusrProdiKode` int(11) default NULL,
  PRIMARY KEY  (`tusrNama`),
  KEY `tusrThakrId` (`tusrThakrId`),
  KEY `tusrRefIndex` (`tusrRefIndex`),
  KEY `tusrPassword` (`tusrPassword`),
  KEY `tusruntId` (`tusrUntId`),
  KEY `tusrProdiKode` (`tusrProdiKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_temporer`
--

LOCK TABLES `t_user_temporer` WRITE;
/*!40000 ALTER TABLE `t_user_temporer` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_user_temporer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trans_address_book`
--

DROP TABLE IF EXISTS `trans_address_book`;
CREATE TABLE `trans_address_book` (
  `transAddrBookPemilik` varchar(255) NOT NULL default '0',
  `transAddrBookTeman` varchar(255) NOT NULL default '0',
  PRIMARY KEY  (`transAddrBookPemilik`,`transAddrBookTeman`),
  KEY `trans_address_book_ibfk_2` (`transAddrBookTeman`),
  CONSTRAINT `trans_address_book_ibfk_1` FOREIGN KEY (`transAddrBookPemilik`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trans_address_book_ibfk_2` FOREIGN KEY (`transAddrBookTeman`) REFERENCES `t_user` (`tusrNama`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_address_book`
--

LOCK TABLES `trans_address_book` WRITE;
/*!40000 ALTER TABLE `trans_address_book` DISABLE KEYS */;
INSERT INTO `trans_address_book` VALUES ('60200108003','60300110008');
/*!40000 ALTER TABLE `trans_address_book` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-05-28  4:25:05
