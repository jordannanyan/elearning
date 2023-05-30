/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_epahari
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_epahari` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_epahari`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id`,`nama`,`username`,`password`) values 
(1,'JORDAN SETIAWAN NANYAN','admin1','password1');

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajar` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `video` text NOT NULL,
  `materi` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pengajar` (`id_pengajar`),
  CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `tb_pengajar` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`id`,`id_pengajar`,`judul`,`jurusan`,`durasi`,`tanggal`,`deskripsi`,`video`,`materi`) values 
(56,8,'Kelas Oke','bahasa','2 Jam 30 Menit','2023-05-29','Keren BangetDeh','assets/video/6474188b42d62_video1.mp4','assets/materi/6474188b70ccc_Teks Orasi B. Indo Bahasa Indonesia dan Pengaruh Perkembangan Teknologi.pdf'),
(57,8,'Kelas Keren','bahasa','2 Jam 20 Menit','2023-05-31','Wow Banget Kelas-nya','assets/video/6474155d64f26_video1.mp4','assets/materi/6474155d65388_test1.pdf'),
(58,8,'Kelas Keren','bahasa','3 Jam','2023-05-29','Kelas Paling Keren di PKY','assets/video/647415b986d80_video1.mp4','assets/materi/647415b987229_test1.pdf'),
(59,8,'Kelas Mantap','bahasa','2 Jam 20 Menit','2023-05-29','Keren Paling Hehe','assets/video/647415f508834_video1.mp4','assets/materi/647415f508c09_test1.pdf'),
(60,11,'Kelas Luar Biasa','mipa','2 Jam 10 Menit','2023-06-02','Keren Paling Hehe','assets/video/647416d273a55_video1.mp4','assets/materi/647416d273f33_test1.pdf'),
(61,8,'Kelas Luar ','bahasa','2 Jam 40 Menit','2023-06-03','Wow Banget Kelas-nya','assets/video/64741c8d76c0c_video1.mp4','assets/materi/64741c8d774e1_test1.pdf');

/*Table structure for table `tb_kelas_pelajar` */

DROP TABLE IF EXISTS `tb_kelas_pelajar`;

CREATE TABLE `tb_kelas_pelajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelajar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kelas` (`id_kelas`),
  KEY `tb_kelas_pelajar_ibfk_1` (`id_pelajar`),
  CONSTRAINT `tb_kelas_pelajar_ibfk_1` FOREIGN KEY (`id_pelajar`) REFERENCES `tb_pelajar` (`id`),
  CONSTRAINT `tb_kelas_pelajar_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kelas_pelajar` */

insert  into `tb_kelas_pelajar`(`id`,`id_pelajar`,`id_kelas`) values 
(45,14,56);

/*Table structure for table `tb_pelajar` */

DROP TABLE IF EXISTS `tb_pelajar`;

CREATE TABLE `tb_pelajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pelajar` */

insert  into `tb_pelajar`(`id`,`nama`,`asal_sekolah`,`jurusan`,`username`,`password`,`foto`) values 
(6,'Jessica Berliana Nanyan','SMA 1 Tamiang Layang','bahasa','admin','1234','assets/profile-pic/64741d20a9b48_pic1.png'),
(14,'Jessica Berliana Nanyan','SMA 1 Tamiang Layang','bahasa','jessicanyn','jessica31','assets/profile-pic/6474178c7beac_pic2.png'),
(15,'Ninis','SMA 1 Tamiang Layang','bahasa','admin','heehe','assets/profile-pic/64741d43364e0_pic2.png');

/*Table structure for table `tb_pengajar` */

DROP TABLE IF EXISTS `tb_pengajar`;

CREATE TABLE `tb_pengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pengajar` */

insert  into `tb_pengajar`(`id`,`nama`,`jurusan`,`username`,`password`,`foto`) values 
(8,'Saripah Ainah','bahasa','admin','admin','assets/profile-pic/64741d0a374d1_pic3.png'),
(10,'jess1','ips','admin','1234','assets/profile-pic/647409aed2472_pic2.png'),
(11,'Kevin','mipa','admin','12345','assets/profile-pic/6474170817566_pic1.png'),
(12,'Aldoni','bahasa','admin','wewewe','assets/profile-pic/64741d63aed56_pic2.png');

/* Trigger structure for table `tb_kelas` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_delete_kelas_pelajar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_delete_kelas_pelajar` BEFORE DELETE ON `tb_kelas` FOR EACH ROW 
BEGIN
    DELETE FROM `tb_kelas_pelajar`
    WHERE `id_kelas` = OLD.`id`;
END */$$


DELIMITER ;

/* Trigger structure for table `tb_pelajar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_delete_tb_pelajar_data` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_delete_tb_pelajar_data` BEFORE DELETE ON `tb_pelajar` FOR EACH ROW 
BEGIN
    DELETE FROM tb_kelas_pelajar WHERE id_pelajar = OLD.id;
END */$$


DELIMITER ;

/* Trigger structure for table `tb_pengajar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_delete_pengajar_data` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_delete_pengajar_data` BEFORE DELETE ON `tb_pengajar` FOR EACH ROW 
BEGIN
    DECLARE pengajar_id INT;

    -- Save the ID of the deleted pengajar
    SET pengajar_id = OLD.id;

    -- Delete records from tb_kelas related to the deleted pengajar
    DELETE FROM tb_kelas WHERE id_pengajar = pengajar_id;

    -- Delete records from tb_kelas_pelajar related to the deleted pengajar
    DELETE FROM tb_kelas_pelajar WHERE id_kelas IN (SELECT id FROM tb_kelas WHERE id_pengajar = pengajar_id);
END */$$


DELIMITER ;

/* Procedure structure for procedure `sp_get_kelas_by_jurusan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_get_kelas_by_jurusan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_kelas_by_jurusan`(IN p_jurusan VARCHAR(255), IN p_student_id INT, IN p_offset INT, IN p_limit INT)
BEGIN
    SELECT k.*
    FROM tb_kelas k
    LEFT JOIN tb_kelas_pelajar kp ON k.id = kp.id_kelas AND kp.id_pelajar = p_student_id
    WHERE k.jurusan = p_jurusan AND kp.id IS NULL
    LIMIT p_offset, p_limit;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_get_students_and_classes` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_get_students_and_classes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_students_and_classes`(IN teacher_id INT, IN p_offset INT, IN p_limit INT)
BEGIN
    SELECT tb_pelajar.id AS student_id, tb_pelajar.nama AS student_name, tb_kelas.judul AS class_title, tb_kelas.deskripsi, tb_kelas.tanggal, tb_kelas.id as id_kelas
    FROM tb_pelajar
    JOIN tb_kelas_pelajar ON tb_pelajar.id = tb_kelas_pelajar.id_pelajar
    JOIN tb_kelas ON tb_kelas_pelajar.id_kelas = tb_kelas.id
    JOIN tb_pengajar ON tb_kelas.id_pengajar = tb_pengajar.id
    WHERE tb_pengajar.id = teacher_id
    LIMIT p_offset, p_limit;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_get_student_classes` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_get_student_classes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_student_classes`(IN p_student_id INT, IN p_offset INT, IN p_limit INT)
BEGIN
    SELECT tb_kelas.judul AS class_title, tb_pengajar.nama AS teacher_name, tb_kelas.tanggal AS class_date, tb_kelas.deskripsi AS class_description, tb_kelas.video, tb_kelas.durasi, tb_kelas_pelajar.id, tb_kelas.id as id_kelas
    FROM tb_kelas
    JOIN tb_kelas_pelajar ON tb_kelas.id = tb_kelas_pelajar.id_kelas
    JOIN tb_pengajar ON tb_kelas.id_pengajar = tb_pengajar.id
    WHERE tb_kelas_pelajar.id_pelajar = p_student_id
    LIMIT p_offset, p_limit;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
