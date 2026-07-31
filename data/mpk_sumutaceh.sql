-- Adminer 4.8.1 MySQL 8.0.43-0ubuntu0.24.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `agenda_id` int NOT NULL AUTO_INCREMENT,
  `tema` varchar(200) DEFAULT NULL,
  `slug_tema` varchar(200) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `isi_agenda` text,
  `tempat` varchar(120) DEFAULT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL,
  `hits` int DEFAULT NULL,
  `id` int unsigned DEFAULT NULL,
  `sts` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`agenda_id`),
  KEY `id` (`id`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users2` (`id`) ON UPDATE CASCADE
) ;


DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `priority` int DEFAULT '0' COMMENT '0=normal, 1=high, 2=urgent',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_active_priority` (`is_active`,`priority`,`date`),
  KEY `idx_date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `announcements` (`id`, `title`, `content`, `date`, `is_active`, `priority`, `created_at`, `updated_at`) VALUES
(1,	'Perayaan 17 Agustus',	'Dinas Pendidikan melakukan kegiatan menyambut 17 Agustus 2025',	'2025-08-02',	1,	1,	'2025-07-24 10:46:36',	'2025-07-24 10:46:36'),
(2,	'Pembagian Rapor Semester',	'Jadwal pembagian rapor semester gasal tahun ajaran 2025/2026',	'2025-07-20',	1,	0,	'2025-07-24 10:46:36',	'2025-07-24 10:46:36'),
(3,	'Libur Hari Raya Idul Adha',	'Libur sekolah untuk memperingati Hari Raya Idul Adha 1446 H',	'2025-07-25',	1,	2,	'2025-07-24 10:46:36',	'2025-07-24 10:46:36'),
(4,	'Workshop Kurikulum Merdeka',	'Pelatihan implementasi Kurikulum Merdeka bagi guru SMA/SMK',	'2025-08-10',	1,	0,	'2025-07-24 10:46:36',	'2025-07-24 10:46:36'),
(5,	'Penerimaan CPNS',	'Pembukaan penerimaan Calon Pegawai Negeri Sipil tahun 2025',	'2025-07-30',	1,	1,	'2025-07-24 10:46:36',	'2025-07-24 10:46:36');

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Developer',	'1',	1714443527);

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/admin/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/assignment/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/assignment/assign',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/assignment/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/assignment/revoke',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/assignment/view',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/default/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/default/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/menu/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/menu/create',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/menu/delete',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/menu/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/menu/update',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/menu/view',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/assign',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/create',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/delete',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/get-users',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/remove',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/update',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/permission/view',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/assign',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/create',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/delete',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/get-users',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/remove',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/update',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/role/view',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/route/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/route/assign',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/route/create',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/route/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/route/refresh',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/route/remove',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/rule/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/rule/create',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/rule/delete',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/rule/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/rule/update',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/rule/view',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/*',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/activate',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/change-password',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/delete',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/index',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/login',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/logout',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/request-password-reset',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/reset-password',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/signup',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/admin/user/view',	2,	NULL,	NULL,	NULL,	1714442400,	1714442400),
('/announcements/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/announcements/bulk-delete',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/announcements/create',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/announcements/delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/announcements/index',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/announcements/update',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/announcements/view',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/bankdata/*',	2,	NULL,	NULL,	NULL,	1756955862,	1756955862),
('/bankdata/bulk-delete',	2,	NULL,	NULL,	NULL,	1756955862,	1756955862),
('/bankdata/create',	2,	NULL,	NULL,	NULL,	1756955861,	1756955861),
('/bankdata/delete',	2,	NULL,	NULL,	NULL,	1756955862,	1756955862),
('/bankdata/index',	2,	NULL,	NULL,	NULL,	1756955861,	1756955861),
('/bankdata/update',	2,	NULL,	NULL,	NULL,	1756955862,	1756955862),
('/bankdata/view',	2,	NULL,	NULL,	NULL,	1756955861,	1756955861),
('/banner/*',	2,	NULL,	NULL,	NULL,	1754903056,	1754903056),
('/banner/bulk-delete',	2,	NULL,	NULL,	NULL,	1754903056,	1754903056),
('/banner/create',	2,	NULL,	NULL,	NULL,	1754903056,	1754903056),
('/banner/delete',	2,	NULL,	NULL,	NULL,	1754903056,	1754903056),
('/banner/index',	2,	NULL,	NULL,	NULL,	1754903055,	1754903055),
('/banner/update',	2,	NULL,	NULL,	NULL,	1754903056,	1754903056),
('/banner/uploadFoto',	2,	NULL,	NULL,	NULL,	1756193902,	1756193902),
('/banner/view',	2,	NULL,	NULL,	NULL,	1754903056,	1754903056),
('/berita/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/bulk-delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/create',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/index',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/update',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/uploadFoto',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/berita/view',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/buku/*',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/buku/bulk-delete',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/buku/create',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/buku/delete',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/buku/index',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/buku/update',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/buku/view',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/events/*',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/events/bulk-delete',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/events/create',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/events/delete',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/events/index',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/events/update',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/events/view',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/faq/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/faq/bulk-delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/faq/create',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/faq/delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/faq/index',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/faq/update',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/faq/view',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/foto/*',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/foto/bulk-delete',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/foto/create',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/foto/delete',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/foto/index',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/foto/update',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/foto/uploadFoto',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/foto/view',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/gii/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gii/default/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gii/default/action',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gii/default/diff',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gii/default/index',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gii/default/preview',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gii/default/view',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gridview/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gridview/export/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gridview/export/download',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gridview/grid-edited-row/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/gridview/grid-edited-row/back',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/infografis/*',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/bulk-delete',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/create',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/delete',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/index',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/update',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/uploadFoto',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/infografis/view',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/kategori-buku/*',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-buku/bulk-delete',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-buku/create',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-buku/delete',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-buku/index',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-buku/update',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-buku/uploadFoto',	2,	NULL,	NULL,	NULL,	1756990176,	1756990176),
('/kategori-buku/view',	2,	NULL,	NULL,	NULL,	1756974145,	1756974145),
('/kategori-foto/*',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/kategori-foto/bulk-delete',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/kategori-foto/create',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/kategori-foto/delete',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/kategori-foto/index',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/kategori-foto/update',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/kategori-foto/view',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/keunggulan/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/keunggulan/create',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/keunggulan/delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/keunggulan/index',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/keunggulan/update',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/keunggulan/view',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/koleksi-deposit/*',	2,	NULL,	NULL,	NULL,	1714448189,	1714448189),
('/koleksi-deposit/create',	2,	NULL,	NULL,	NULL,	1714448040,	1714448040),
('/koleksi-deposit/delete',	2,	NULL,	NULL,	NULL,	1714448035,	1714448035),
('/koleksi-deposit/index',	2,	NULL,	NULL,	NULL,	1714448026,	1714448026),
('/koleksi-deposit/update',	2,	NULL,	NULL,	NULL,	1714448031,	1714448031),
('/news/*',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/news/bulk-delete',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/news/create',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/news/delete',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/news/index',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/news/logtest',	2,	NULL,	NULL,	NULL,	1755067118,	1755067118),
('/news/test-log-crop',	2,	NULL,	NULL,	NULL,	1755066956,	1755066956),
('/news/update',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/news/uploadFoto',	2,	NULL,	NULL,	NULL,	1754894542,	1754894542),
('/news/view',	2,	NULL,	NULL,	NULL,	1754885394,	1754885394),
('/profil-list/*',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/bulk-delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/create',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/delete',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/index',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-donwload',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-home',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-keunggulan',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-maklumat',	2,	NULL,	NULL,	NULL,	1756367921,	1756367921),
('/profil-list/update-profil',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-struktur',	2,	NULL,	NULL,	NULL,	1756196959,	1756196959),
('/profil-list/update-tema',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-tentang',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-tugasfungsi',	2,	NULL,	NULL,	NULL,	1756367920,	1756367920),
('/profil-list/update-video',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/update-visi-misi',	2,	NULL,	NULL,	NULL,	1756201439,	1756201439),
('/profil-list/update-visimisi',	2,	NULL,	NULL,	NULL,	1756194484,	1756194484),
('/profil-list/view',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/profil-list/visi-misi',	2,	NULL,	NULL,	NULL,	1756196958,	1756196958),
('/site/*',	2,	NULL,	NULL,	NULL,	1714443228,	1714443228),
('/site/agenda',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/aktivitas',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/bank-data',	2,	NULL,	NULL,	NULL,	1756955862,	1756955862),
('/site/berita',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/berita-detail',	2,	NULL,	NULL,	NULL,	1756193902,	1756193902),
('/site/buku',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/buku-tamu',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/site/captcha',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/dilan-bidang-sma',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/dilan-bidang-smk',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/dilan-maklumat',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/dilan-perintah',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/download-file',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/site/download-safe',	2,	NULL,	NULL,	NULL,	1756955862,	1756955862),
('/site/error',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/faq',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/foto',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/get-event-dots',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/get-events-by-date',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/get-poll-results',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/index',	2,	NULL,	NULL,	NULL,	1714443580,	1714443580),
('/site/infografis',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/infografis-disdik',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/site/kontak',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/layanan',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/login',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/logout',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/maklumat-pelayanan',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/masukan',	2,	NULL,	NULL,	NULL,	1756971545,	1756971545),
('/site/materi',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/moto-pelayanan',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/online-count',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/pengumuman',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/preview-buku',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/produk-peserta',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/profil',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/profil-kegiatan',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/profil-noheader',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/profil-program-kerja',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/profil-struktur',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/pustaka',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/regulasi',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-download',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-footer',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-header',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-keunggulan',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-layanan',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-price',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/set-tentang',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/set-video',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/stats',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/struktur-organisasi',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/submit-poll',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/testimoni',	2,	NULL,	NULL,	NULL,	1754883366,	1754883366),
('/site/tugas-fungsi',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/video',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/site/visi-misi',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/*',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/bulk-delete',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/create',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/delete',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/index',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/update',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/uploadFoto',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/slider/view',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/type/*',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/type/create',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/type/delete',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/type/index',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/type/update',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/type/view',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/*',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/admin-reset-password',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/bulk-delete',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/change-password',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/delete',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/index',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/set-password-cadangan',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/signup',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/status-role',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/update',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/uploadPhoto',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/user/view',	2,	NULL,	NULL,	NULL,	1754883367,	1754883367),
('/video-galeri/*',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('/video-galeri/bulk-delete',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('/video-galeri/create',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('/video-galeri/delete',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('/video-galeri/index',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('/video-galeri/update',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('/video-galeri/view',	2,	NULL,	NULL,	NULL,	1756977117,	1756977117),
('Developer',	2,	NULL,	NULL,	NULL,	1714442364,	1714442364);

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Developer',	'/*'),
('Developer',	'/admin/*'),
('Developer',	'/admin/assignment/*'),
('Developer',	'/admin/assignment/assign'),
('Developer',	'/admin/assignment/index'),
('Developer',	'/admin/assignment/revoke'),
('Developer',	'/admin/assignment/view'),
('Developer',	'/admin/default/*'),
('Developer',	'/admin/default/index'),
('Developer',	'/admin/menu/*'),
('Developer',	'/admin/menu/create'),
('Developer',	'/admin/menu/delete'),
('Developer',	'/admin/menu/index'),
('Developer',	'/admin/menu/update'),
('Developer',	'/admin/menu/view'),
('Developer',	'/admin/permission/*'),
('Developer',	'/admin/permission/assign'),
('Developer',	'/admin/permission/create'),
('Developer',	'/admin/permission/delete'),
('Developer',	'/admin/permission/get-users'),
('Developer',	'/admin/permission/index'),
('Developer',	'/admin/permission/remove'),
('Developer',	'/admin/permission/update'),
('Developer',	'/admin/permission/view'),
('Developer',	'/admin/role/*'),
('Developer',	'/admin/role/assign'),
('Developer',	'/admin/role/create'),
('Developer',	'/admin/role/delete'),
('Developer',	'/admin/role/get-users'),
('Developer',	'/admin/role/index'),
('Developer',	'/admin/role/remove'),
('Developer',	'/admin/role/update'),
('Developer',	'/admin/role/view'),
('Developer',	'/admin/route/*'),
('Developer',	'/admin/route/assign'),
('Developer',	'/admin/route/create'),
('Developer',	'/admin/route/index'),
('Developer',	'/admin/route/refresh'),
('Developer',	'/admin/route/remove'),
('Developer',	'/admin/rule/*'),
('Developer',	'/admin/rule/create'),
('Developer',	'/admin/rule/delete'),
('Developer',	'/admin/rule/index'),
('Developer',	'/admin/rule/update'),
('Developer',	'/admin/rule/view'),
('Developer',	'/admin/user/*'),
('Developer',	'/admin/user/activate'),
('Developer',	'/admin/user/change-password'),
('Developer',	'/admin/user/delete'),
('Developer',	'/admin/user/index'),
('Developer',	'/admin/user/login'),
('Developer',	'/admin/user/logout'),
('Developer',	'/admin/user/request-password-reset'),
('Developer',	'/admin/user/reset-password'),
('Developer',	'/admin/user/signup'),
('Developer',	'/admin/user/view'),
('Developer',	'/announcements/*'),
('Developer',	'/announcements/create'),
('Developer',	'/announcements/delete'),
('Developer',	'/announcements/index'),
('Developer',	'/announcements/update'),
('Developer',	'/announcements/view'),
('Developer',	'/berita/*'),
('Developer',	'/berita/bulk-delete'),
('Developer',	'/berita/create'),
('Developer',	'/berita/delete'),
('Developer',	'/berita/index'),
('Developer',	'/berita/update'),
('Developer',	'/berita/uploadFoto'),
('Developer',	'/berita/view'),
('Developer',	'/faq/*'),
('Developer',	'/faq/bulk-delete'),
('Developer',	'/faq/create'),
('Developer',	'/faq/delete'),
('Developer',	'/faq/index'),
('Developer',	'/faq/update'),
('Developer',	'/faq/view'),
('Developer',	'/gii/*'),
('Developer',	'/gii/default/*'),
('Developer',	'/gii/default/action'),
('Developer',	'/gii/default/diff'),
('Developer',	'/gii/default/index'),
('Developer',	'/gii/default/preview'),
('Developer',	'/gii/default/view'),
('Developer',	'/gridview/*'),
('Developer',	'/gridview/export/*'),
('Developer',	'/gridview/export/download'),
('Developer',	'/gridview/grid-edited-row/*'),
('Developer',	'/gridview/grid-edited-row/back'),
('Developer',	'/keunggulan/*'),
('Developer',	'/keunggulan/create'),
('Developer',	'/keunggulan/delete'),
('Developer',	'/keunggulan/index'),
('Developer',	'/keunggulan/update'),
('Developer',	'/keunggulan/view'),
('Developer',	'/koleksi-deposit/*'),
('Developer',	'/koleksi-deposit/create'),
('Developer',	'/koleksi-deposit/delete'),
('Developer',	'/koleksi-deposit/index'),
('Developer',	'/koleksi-deposit/update'),
('Developer',	'/profil-list/*'),
('Developer',	'/profil-list/bulk-delete'),
('Developer',	'/profil-list/create'),
('Developer',	'/profil-list/delete'),
('Developer',	'/profil-list/index'),
('Developer',	'/profil-list/update'),
('Developer',	'/profil-list/update-donwload'),
('Developer',	'/profil-list/update-home'),
('Developer',	'/profil-list/update-keunggulan'),
('Developer',	'/profil-list/update-profil'),
('Developer',	'/profil-list/update-tema'),
('Developer',	'/profil-list/update-tentang'),
('Developer',	'/profil-list/update-video'),
('Developer',	'/profil-list/view'),
('Developer',	'/site/*'),
('Developer',	'/site/agenda'),
('Developer',	'/site/aktivitas'),
('Developer',	'/site/berita'),
('Developer',	'/site/buku'),
('Developer',	'/site/captcha'),
('Developer',	'/site/dilan-bidang-sma'),
('Developer',	'/site/dilan-bidang-smk'),
('Developer',	'/site/dilan-maklumat'),
('Developer',	'/site/dilan-perintah'),
('Developer',	'/site/error'),
('Developer',	'/site/faq'),
('Developer',	'/site/foto'),
('Developer',	'/site/get-event-dots'),
('Developer',	'/site/get-events-by-date'),
('Developer',	'/site/get-poll-results'),
('Developer',	'/site/index'),
('Developer',	'/site/infografis'),
('Developer',	'/site/kontak'),
('Developer',	'/site/layanan'),
('Developer',	'/site/login'),
('Developer',	'/site/logout'),
('Developer',	'/site/maklumat-pelayanan'),
('Developer',	'/site/materi'),
('Developer',	'/site/moto-pelayanan'),
('Developer',	'/site/online-count'),
('Developer',	'/site/pengumuman'),
('Developer',	'/site/preview-buku'),
('Developer',	'/site/produk-peserta'),
('Developer',	'/site/profil'),
('Developer',	'/site/profil-kegiatan'),
('Developer',	'/site/profil-noheader'),
('Developer',	'/site/profil-program-kerja'),
('Developer',	'/site/profil-struktur'),
('Developer',	'/site/pustaka'),
('Developer',	'/site/regulasi'),
('Developer',	'/site/set-download'),
('Developer',	'/site/set-footer'),
('Developer',	'/site/set-header'),
('Developer',	'/site/set-keunggulan'),
('Developer',	'/site/set-layanan'),
('Developer',	'/site/set-price'),
('Developer',	'/site/set-tentang'),
('Developer',	'/site/set-video'),
('Developer',	'/site/stats'),
('Developer',	'/site/struktur-organisasi'),
('Developer',	'/site/submit-poll'),
('Developer',	'/site/testimoni'),
('Developer',	'/site/tugas-fungsi'),
('Developer',	'/site/video'),
('Developer',	'/site/visi-misi'),
('Developer',	'/slider/*'),
('Developer',	'/slider/bulk-delete'),
('Developer',	'/slider/create'),
('Developer',	'/slider/delete'),
('Developer',	'/slider/index'),
('Developer',	'/slider/update'),
('Developer',	'/slider/uploadFoto'),
('Developer',	'/slider/view'),
('Developer',	'/type/*'),
('Developer',	'/type/create'),
('Developer',	'/type/delete'),
('Developer',	'/type/index'),
('Developer',	'/type/update'),
('Developer',	'/type/view'),
('Developer',	'/user/*'),
('Developer',	'/user/admin-reset-password'),
('Developer',	'/user/bulk-delete'),
('Developer',	'/user/change-password'),
('Developer',	'/user/delete'),
('Developer',	'/user/index'),
('Developer',	'/user/set-password-cadangan'),
('Developer',	'/user/signup'),
('Developer',	'/user/status-role'),
('Developer',	'/user/update'),
('Developer',	'/user/uploadPhoto'),
('Developer',	'/user/view');

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;


DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `berita_id` int NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(200) DEFAULT NULL,
  `slug_berita` varchar(250) DEFAULT NULL,
  `ringkasan` varchar(500) DEFAULT NULL,
  `isi` longtext,
  `gambar` varchar(150) DEFAULT NULL,
  `tgl_berita` date DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `id` int unsigned DEFAULT NULL,
  `jenis_berita` varchar(20) DEFAULT NULL,
  `hits` int DEFAULT NULL,
  `likepost` int DEFAULT '0',
  `headline` varchar(1) DEFAULT NULL,
  `ket_foto` varchar(255) DEFAULT NULL,
  `filepdf` varchar(100) DEFAULT NULL,
  `sts_komen` varchar(1) DEFAULT '0',
  `pilihan` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`berita_id`),
  KEY `id` (`id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON UPDATE CASCADE,
  CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users2` (`id`) ON UPDATE CASCADE
) ;


DROP TABLE IF EXISTS `berita_komen`;
CREATE TABLE `berita_komen` (
  `beritakomen_id` int NOT NULL AUTO_INCREMENT,
  `berita_id` int DEFAULT NULL,
  `nama_komen` varchar(100) DEFAULT NULL,
  `hp_komen` varchar(20) DEFAULT NULL,
  `isi_komen` text,
  `tanggal_komen` datetime DEFAULT NULL,
  `balas_komen` text,
  `id` int unsigned DEFAULT NULL,
  `sts_komen` varchar(1) DEFAULT NULL,
  `email_komen` varchar(100) DEFAULT NULL,
  `tgl_balas` datetime DEFAULT NULL,
  PRIMARY KEY (`beritakomen_id`),
  KEY `id` (`id`),
  KEY `berita_id` (`berita_id`)
) ;


DROP TABLE IF EXISTS `berita_tag`;
CREATE TABLE `berita_tag` (
  `beritatag_id` int NOT NULL AUTO_INCREMENT,
  `berita_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`beritatag_id`),
  KEY `berita_id` (`berita_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `berita_tag_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`) ON UPDATE CASCADE
) ;


DROP TABLE IF EXISTS `counter`;
CREATE TABLE `counter` (
  `id_counter` int NOT NULL AUTO_INCREMENT,
  `nm` varchar(255) DEFAULT NULL,
  `jm` int DEFAULT NULL,
  `ic` varchar(100) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `sts` varchar(1) NOT NULL DEFAULT '1',
  `bgc` varchar(50) NOT NULL DEFAULT '#2f79b6',
  PRIMARY KEY (`id_counter`)
) ;


DROP TABLE IF EXISTS `daily_stats`;
CREATE TABLE `daily_stats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `total_visits` int DEFAULT '0',
  `unique_visitors` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_date` (`visit_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `event_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('Rapat','Pelatihan','Sosialisasi','Evaluasi','Lainnya') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Lainnya',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_event_date` (`event_date`),
  KEY `idx_category` (`category`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `foto_id` int NOT NULL AUTO_INCREMENT,
  `kategorifoto_id` int DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `id` int unsigned DEFAULT NULL,
  `hits` int DEFAULT NULL,
  PRIMARY KEY (`foto_id`),
  KEY `id` (`id`),
  KEY `kategorifoto_id` (`kategorifoto_id`),
  CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users2` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`kategorifoto_id`) REFERENCES `kategori_foto` (`kategorifoto_id`) ON UPDATE CASCADE
) ;


DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `slug_kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ;


DROP TABLE IF EXISTS `kategori_foto`;
CREATE TABLE `kategori_foto` (
  `kategorifoto_id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_foto` varchar(200) DEFAULT NULL,
  `slug_kategori_foto` varchar(200) DEFAULT NULL,
  `cover_foto` varchar(100) DEFAULT NULL,
  `ket` text,
  `tgl_album` date DEFAULT NULL,
  PRIMARY KEY (`kategorifoto_id`)
) ;


DROP TABLE IF EXISTS `kategori_video`;
CREATE TABLE `kategori_video` (
  `kategorivideo_id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_video` varchar(200) DEFAULT NULL,
  `slug_kategori_video` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kategorivideo_id`)
) ;


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1,	'Setting',	NULL,	'/admin/menu/index',	99,	'th'),
(2,	'Dashboad',	NULL,	'/site/index',	1,	'dashboard'),
(4,	'Pengumuman',	NULL,	'/announcements/index',	2,	'bell'),
(5,	'News',	NULL,	'/news/index',	1,	'newspaper-o'),
(6,	'Banner',	NULL,	'/banner/index',	3,	'list'),
(7,	'Profil',	NULL,	'/profil-list/index',	1,	NULL),
(8,	'Album',	NULL,	'/kategori-foto/index',	NULL,	'list');

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1712123658),
('m140506_102106_rbac_init',	1712123672),
('m140602_111327_create_menu_table',	1712123661),
('m160312_050000_create_user',	1712123661),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',	1712123672),
('m180523_151638_rbac_updates_indexes_without_prefix',	1712123672),
('m200409_110543_rbac_update_mssql_trigger',	1712123672);

DROP TABLE IF EXISTS `online_visitors`;
CREATE TABLE `online_visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_activity` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `session_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_visitor` (`ip_address`,`session_id`),
  KEY `idx_last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `online_visitors` (`id`, `ip_address`, `user_agent`, `last_activity`, `session_id`) VALUES
(52,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36',	'2025-10-01 07:23:59',	'le56ieihe146mdo525l5vkncv2'),
(53,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36',	'2025-10-01 07:57:46',	'si7mqa8ts4hhh91qkn02omgcm8');

DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE `tbl_banner` (
  `id_banner` int NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(255) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `type` int DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `posisi` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ;


DROP TABLE IF EXISTS `tbl_bidang`;
CREATE TABLE `tbl_bidang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(100) NOT NULL,
  `img` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `logo` text NOT NULL,
  `body` longtext NOT NULL,
  `body2` longtext NOT NULL,
  `link_yt` text NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ;


DROP TABLE IF EXISTS `tbl_infografis`;
CREATE TABLE `tbl_infografis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kategori_infografis` int DEFAULT NULL,
  `judul` text,
  `foto` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_publish` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT '1',
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_profil_list`;
CREATE TABLE `tbl_profil_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `list_data` longtext,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` text,
  `link` text,
  `field` varchar(255) DEFAULT NULL,
  `data` text,
  `data2` text,
  `order` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `link2` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_profil_list` (`id`, `name`, `list_data`, `tanggal`, `images`, `link`, `field`, `data`, `data2`, `order`, `status`, `link2`) VALUES
(1,	'Foto Home',	'',	'2024-04-23 08:42:48',	'web/uploads/website/bbHJDttv1aa7.png',	'',	'',	'',	'',	1,	NULL,	''),
(2,	'Foto Profil',	'',	'2024-04-23 08:42:48',	'web/uploads/website/TlBVPkUsZEwa.png',	'',	'',	'',	'',	2,	NULL,	''),
(3,	'Pendidikan Formal',	'<ol>\r\n	<li>Tamat Sekolah Dasar (SD) di SD Swasta Budi Luhur Medan Tahun 1983</li>\r\n	<li>Tamat Sekolah Menengah Pertama (SMP) di SMP Swasta Budi Murni 1 Medan Tahun 1986</li>\r\n	<li>Tamat Sekolah Menengah Atas (SMA) di SMA Negeri 3 Medan Jurusan Biologi Tahun 1989</li>\r\n	<li>Tamat Program Sarjana di Institut Keguruan Ilmu Pendidikan (IKIP) Medan Fakultas Matematika dan Ilmu Pengetahuan Alam (MIPA) Jurusan Pendidikan Matematika Tahun 1996</li>\r\n	<li>Tamat Program Magister di Universitas Syiah Kuala (Unsyiah) Banda Aceh Pascasarjana Jurusan Ekonomi Pembangunan Tahun 2003</li>\r\n	<li>Tamat Program Magister di Universitas Medan Area Program Studi Psikologi Tahun 2023</li>\r\n	<li>Tamat Program Doktor di Universitas Negeri Medan (Unimed) Pascasarjana Jurusan Manajemen Pendidikan Tahun 2015</li>\r\n	<li>Tamat Program Magister Psikologi di Universitas Medan Aera (UMA) Pascasarjana Program Studi Psikologi Tahun 2023</li>\r\n</ol>\r\n',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	4,	NULL,	''),
(4,	'Pendidikan & Pelatihan',	'<ol>\r\n                        <li>Penataran P4 Pola 100 Jam Tahun 1989 di IKIP Medan</li>\r\n                        <li>Seminar Pendidikan Wajib Belajar 9 Tahun pada Tahun 1995 di IKIP Medan</li>\r\n                        <li>Seminar Nasional Pendidikan Matematika pada Tahun 1995 di IKIP Medan</li>\r\n                        <li>Pendidikan dan Pelatihan Prajabatan Golongan III Angkatan IV Tahun 1998 di RINDAM I Bukit Barisan</li>\r\n                        <li>Pendidikan Karate Kala Hitam Tingkat Dan IV (empat) Yon Dan Tahun 1999 di Perguruan Karate Kala Hitam Medan</li>\r\n                        <li><i>In Recognition of Attendance of Mathematics Serial Trainning</i> Tahun 2000 di SMA Swasta Methodist 2 Medan</li>\r\n                        <li>Wawasan Kependidikan Guru Agama SLTA Kristen Protestan/Katolik Tahun 2000 di SLB Pembina Sumatera Utara</li>\r\n                        <li>Seminar dan Pelatihan “ Penilisan Artikel Ilmiah di Unimed Tahun 2001 di Universitas Negeri Medan</li>\r\n                        <li>Peluang Studi Teknologi Informasi dan e-Bisnis di Jenjang Karir Tahun 2002 di Hotel Novotel Sochi Medan</li>\r\n                        <li>Seminar Program Pecegahan Remaja Merokok bekerjasama dengan Pusat Pengembangan Kualitas Jasmani DEPDIKNAS Tahun 2002 di Bina Graha Pemerintah Provinsi Sumatera Utara</li>\r\n                        <li>Pemasyarakatan Software Pembelajaran MIPA (Matematika, Fisika, Biologi dan kimia) dengan menggunakan Media Komputer Tahun 2002 di SMA Negeri 2 Medan</li>\r\n                        <li>Pelatihan <i>Structural Equation Modelling</i> (Pemodelan Persamaan Struktural) Tahun 2004 di Universitas Airlangga Surabaya</li>\r\n                        <li>Sekolah Medan “ Melek “ Teknologi Informasi Tahun 2004 di Bina Nusantara Medan</li>\r\n                        <li>Pelatihan Fasilitator Musyawarah Guru Mata Pelajaran (MGMP) Angkatan I Tingkat Pusat di DEPDIKNAS Jakarta</li>\r\n                        <li>Workshop Musyawarah Guru Mata Pelajaran (MGMP) SMA Tingkat Kota Medan Tahun 2005 di BLKI Provinsi Sumatera Utara</li>\r\n                        <li>Workshop Pengembangan Bahan Ajar dan Bahan Ujian Berbasis Teknologi Informasi dan Komunikasi (TIK) Angakatan III Tahun 2005 di DEPDIKNAS Jakarta</li>\r\n                        <li>Seminar Guru Tahun 2006 di Hotel Seraton Medan</li>\r\n                        <li>Workshop Pengelola Sekolag dalam Rangka Pengembangan Pembelajaran berbasis TIK/ICT Tahun 2006 di DEPDIKNAS Jakarta</li>\r\n                        <li>Workshop Fasilitator Rintisan SMA Bertaraf Internasional (SMA Negeri 1 Medan, SMA Negeri 1 Plus Matauli, dan SMA Negeri 2 Plus Sipirok) Tahun 2007 di Hotel Putragus Bogor</li>\r\n                        <li>Workshop <i>Trainning of Trainer</i> (TOT) Bimbingan Teknis (Bimtek) Kurikulum Tingkat Satuan Pendidikan (KTSP) Tahun 2008 di Hotel Grand Aquila Bandung</li>\r\n                        <li>Workshop Pengelola Pusat Sumber Belajar dan Pengembangan Bahan Ajar dan Bahan Ujian Berbasis TIK Tahun 2008 di Hotel Grand Aquila Bandung</li>\r\n                        <li>Workshop Pemantapan Penanggung Jawab dan Admin Pusat Sumber Belajar Tahun 2008 di Wisma Handayani Jakarta</li>\r\n                        <li>Pendidikan dan Pelatihan Kerjasama Lembaga Administrasi Negara (LAN) RI dengan Kementerian Kesehatan RI Tahun 2012 dengan Konsentrasi : (1) Teknologi Informasi dalam Pemerintahan dan (2) Analisis Kebijakan Publik</li>\r\n                        <li>Training of Trainner (TOT) Pendidikan dan Pelatihan (Diklat) DPRD Kabupaten/Kota di Kementerian Dalam Negeri RI Tahun 2014</li>\r\n                        <li>Pendidikan dan Pelatihan (Diklat) Training of Fasilitator (TOF) Kepemimpinan Tingkat III dan IV Pola Baru Lembaga Administrasi Negera (LAN) RI Tahun 2014</li>\r\n                        <li>Pelatihan Penerapan Kebijakan (Training of Trainer) Pelatihan Dasar Calon PNS Tahun 2017</li>\r\n                        <li>Pendidikan dan Pelatihan Asesor bagi Pejabat Strategis di Lingkungan Kemendagri dan Pemda Tahun 2017</li>\r\n                        <li>Pendidikan dan Pelatihan Penyiapan Asesor Seleksi Akademik Calon Kepala Sekolah Tahun 2017</li>\r\n                        <li>Pendidikan dan Pelatihan Penyiapan Master Trainer pada Diklat Calon Kepala Sekolah Tahun 2017</li>\r\n                        <li>Training of Trainer (TOT) Pendidikan dan Pelatihan Aparatur Pelopor Revolusi Mental (APRM) bagi Jabatan Tinggi dan Administrator di Lingkungan Kemendagri dan Pemda</li>\r\n                        <li>Bimbingan Teknis Petugas Diklat Supervisi Diklat Calon Kepala Sekolah Tahun 2020</li>\r\n                        <li>Alumni Program Pendidikan Reguler Angkatan (PPRA) LIV Tahun 2016 Lembaga Ketahahan Nasional (Lemhannas) RI</li>\r\n                    </ol>',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	5,	NULL,	''),
(5,	'Riwayat Pekerjaan',	'<ol>\r\n	<li>Guru Matematika dan IPA di SD Swasta Methodist 3 Medan Tahun 1989 s.d 1990</li>\r\n	<li>Wakil Kepala Sekolah Urusan Kurikulum Guru Matematika dan Fisika SMP di SMP Swasta Methodist 3 Medan Tahun 1990 s.d 1997</li>\r\n	<li>Guru Matematika SMP dan SMA di SMP/SMA Swasta Sutomo 2 Medan Tahun 1991 s.d 1995</li>\r\n	<li>Guru Matematika SMA di SMA Swasta Methodist 2 Medan Tahun 1997 s.d 1998</li>\r\n	<li>Guru Matematika SMP di SMP Negeri 1 Sosopan Pasarmatanggor Tahun 1998 s.d 1999</li>\r\n	<li>Guru Matematika SMA di SMA Negeri 2 Medan Tahun 1999 s.d 2008</li>\r\n	<li>Staf Bidang Pengendalian Mutu Pendidik dan Tenaga Kependidikan di Dinas Pendidikan Provinsi Sumatera Utara Tahun 2009</li>\r\n	<li>Kepala Seksi (Eselon IVa) Perencanaan dan Pengembangan Unit Pelaksana Teknis Dinas (UPTD) di Dinas Pendidikan Provinsi Sumatera Utara Tahun 2010 s.d 2013</li>\r\n	<li>Kepala Bidang (Eselon IIIa) Pengendalian Mutu Pendidik dan Tenaga Kependidikan (PMPTK) di Dinas Pendidikan Provinsi Sumatera Utara Tahun 2013</li>\r\n	<li>Tenaga Ahli pada Dinas Pendidikan Provinsi Sumatera Utara sejak Tahun 2013 sd sekarang</li>\r\n	<li>Tim Penjamin Mutu pada BKKBN Provinsi Sumatera Utara</li>\r\n	<li>Widyaiswara Ahli Utama&nbsp;di Badan Pengembangan Sumber Daya Manusia (BPSDM) Provinsi Sumatera Utara sejak bulan Oktober 2013 s.d sekarang</li>\r\n</ol>\r\n',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	6,	NULL,	''),
(6,	'Riwayat Narasumber / Fasilitator / Instruktur',	'<ol>\r\n	<li>Instruktur pada Sosialisasi Kurikulum Berbasis Kompetensi (KBK) dan Musyawarah Guru Mata Pelajaran (MGMP) di SMK Negeri 8 Medan Tahun 2003</li>\r\n	<li>Instruktur pada Penyusunan Korektor Seleksi Pra Oplimpiade Fisika, Matematika, Kimia, Biologi, Komputer dan Astronomi Tingkat Kota Medan Tahun 2005</li>\r\n	<li>Narasumber pada Pelatihan Kurikulum 2004 (Kurikulum Berbasis Kompetensi) bagi Kepala Sekolah dan Guru SMA se-Kota Medan Tahun 2004</li>\r\n	<li>Narasumber pada Pembinaan dan Pengembangan Kelas Unggulan di SMA pada Kabupaten/Kota Provinsi Sumatera Utara Tahun 2005</li>\r\n	<li>Instruktur pada Workshop Musyawarah Kepala-Kepala Sekolah (MKKS) SMA Tahun 2005</li>\r\n	<li>Instruktur pada Musyawarah Guru Mata Pelajaran (MGMP) SMA Angkatan I di Provinsi Sumatera Utara Tahun 2005</li>\r\n	<li>Instruktur pada Musyawarah Guru Mata Pelajaran (MGMP) SMA Angkatan II di Provinsi Sumatera Utara Tahun 2005</li>\r\n	<li>Instruktur pada Musyawarah Guru Mata Pelajaran (MGMP) SMA Angkatan III di Provinsi Sumatera Utara Tahun 2005</li>\r\n	<li>Narasumber pada Workshop Guru Mata Pelajaran (MGMP) SMA di SMA Negeri 3 Medan Tahun 2005</li>\r\n	<li>Narasumber pada Workshop Guru Mata Pelajaran (MGMP) SMA di SMA Negeri 21 Medan Tahun 2005</li>\r\n	<li>Narasumber pada Workshop Guru Mata Pelajaran (MGMP) SMA di SMA Negeri 7 Medan Tahun 2005</li>\r\n	<li>Fasilitator pada Workshop Teknologi Informasi dan Komunikasi (TIK) Tingkat Provinsi Jawa Timur Tahun 2005</li>\r\n	<li>Fasilitator pada Workshop Teknologi Informasi dan Komunikasi (TIK) Tingkat Provinsi Jambi Tahun 2005</li>\r\n	<li>Fasilitator pada Workshop TOT Calon Fasilitator pada Pengembangan Bahan Ajar dan Bahan Ujian Berbasis TIK di DEPDIKNAS Jakarta Tahun 2006</li>\r\n	<li>Fasilitator pada Workshop TOT Pengembangan Bahan Ajar dan Bahan Ujian Berbasis TIK di DEPDIKNAS Jakarta Tahun 2006</li>\r\n	<li>Narsumber pada Diklat Peningkatan Mutu Pengelolaan Sekolah dalam Rangka Pelaksanaan Kurikulum Tingkat Satuan Pendidikan (KTSP) di Kabupaten Deli Serdang Tahun 2006</li>\r\n	<li>Narasumber pada Inovasi Pembelajaran dan Pengembangan Matematika dalam Menyongsong Olimpiade Sains Nasional di SMA Negeri 1 Medan Tahun 2006</li>\r\n	<li>Instruktur pada Workshop TOT Pengembangan In House Training (IHT) dan Supervisi Tingkat Provinsi Jawa Tengah Tahun 2006</li>\r\n	<li>Supervisor pada Supervisi Program Pengembangan Pusat Sumber Belajar (PSB) / Learning Resource Centre (LRC) berbasis TIK/ICT di SMA Provinsi Jawa Tengah Tahun 2007</li>\r\n	<li>Fasilitator pada Bimtek Kurikulum Tingkat Satuan Pendidikan (KTSP) di provinsi Palembang Tahun 2008</li>\r\n	<li>Fasilitator pada Bimtek Kurikulum Tingkat Satuan Pendidikan (KTSP) di Provinsi Papua Barat Tahun 2008</li>\r\n	<li>Penguji / Juri pada Seleksi Pemilihan Guru, Kepala Sekolah dan Pengawas Sekolah Berprestasi jenjang TK/RA, SD/MI, SMP/MTs, SMA/SMK/MA dan tutor Paket A, Paket B dan Paket C Tingkat Provinsi Sumatera Utara sejak tahun 2008 s.d 2015</li>\r\n	<li>Widyaiswara pada Diklat Struktural dan Fungsional dengan spesialisasi Mata Pendidikan dan Pelatihan (Diklat), sebagai berikut : (1) Kurikulum Pendidikan, (2) Tekenologi Informasi dan Komunikasi (TIK), (3) Perencanaan Pembangunan, (4) Pola Pikir ASN sebagai Pelayan Masyarakat dan (5) Sistem Manajemen Nasional (SISMENNAS)</li>\r\n	<li>Widyaiswara pada Diklat Prajabatan CPNS Golongan I, II dan III pada CPNS Reguler dan CPNS K1 dan/atau K2 di Provinsi Sumatera Utara</li>\r\n	<li>Widyaiswara pada Pendidikan, Pelatihan dan Bimbingan Teknis bagi Anggota DPRD Kabupaten dan Kota se-Provinsi Sumatera Utara</li>\r\n	<li>Widyaiswara sebagai Coach pada Pendidikan dan Pelatihan (Diklat) Kepemimpinan Tingkat III dan IV Pola Baru LAN RI, dengan spesialisasi : (1) Penjelasan Proyek Perubahan, (2) Merancang Proyek Perubahan, (3) Pembekalan Implementasi Proyek Perubahan, (4) Seminar Proyek Perubahan dan (5) Seminar Laboratorium Kepemimpinan</li>\r\n	<li>Asesor Kompetensi Pemerintahan</li>\r\n	<li>Pengajar di Lembaga Administrasi Negara (LAN) Republik Indonesia</li>\r\n	<li>Pengajar di BPSDM Kementerian Dalam Negeri Republik Indonesia</li>\r\n	<li>Pengajar di Pusdiklat Kementerian Luar Negeri Republik Indonesia</li>\r\n	<li>Pengajar di Pusdiklat Kementerian Pertahanan Republik Indonesia</li>\r\n	<li>Pengajar di Pusdiklat Setjen DPR Republik Indonesia</li>\r\n	<li>Pengajar di Kementerian PUPR Republik Indonesia</li>\r\n	<li>Pengajar &nbsp;Badan Inteligen Negara Republik Indonesia</li>\r\n	<li>Pengajar dan Pembimbing di BSPDM Provinsi Kalimantan Tengah</li>\r\n	<li>Pengajar di BPSDM Provinsi Riau</li>\r\n	<li>Pengajar di BPSDM Provinsi Nusa Tenggara Timur</li>\r\n	<li>Pengajar&nbsp;Pusdiklat Kementerian Agama Provinsi Sumatera Selatan</li>\r\n	<li>Pengajar, Pembimbing dan Pelatih pada Pelatihan Kepemimpinan Nasional Tingkat II di BPSDM Provisni Sumatera Utara</li>\r\n	<li>Pengajar, Pembimbing dan Pelatih pada Pelatihan Kepemimpinan Nasional Tingkat II di Puslatbang KHAN LAN RI</li>\r\n	<li>Pengajar dan Pembimbing pada Pelatihan Kepemimpinan Administrator di BPSDM Provinsi Sumatera Utara</li>\r\n	<li>Pengajar dan Pembimbing pada Pelatihan Kepemimpinan Pengawas di BPSDM Provinsi Sumatera Utara</li>\r\n	<li>Asesor Kompetensi Pemerintahan BNSP RI</li>\r\n	<li>Tenaga Ahli Dinas Pendidikan Provinsi Sumatera Utara</li>\r\n	<li>Pelatih Ahli Sekolah Penggerak Kemendikbud Ristek RI</li>\r\n	<li>Konsultan pada Dinas Kebudayaan, Pariwisata dan Ekonomi Kreatif Provinsi Sumatera Utara</li>\r\n	<li>Konsultan&nbsp;pada Dinas Komunikasi dan Informatika Provinsi Sumatera Utara</li>\r\n	<li>Founder Yayasan Cerdas Digital Indonesia</li>\r\n	<li>Founder Bimbingan Belajar Gho Class</li>\r\n</ol>\r\n',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	7,	NULL,	''),
(7,	'Aktif di Organisasi / Asosiasi ',	'<ol>\r\n	<li>Ketua Musyawarah Guru Mata Pelajaran (MGMP) Teknologi Informasi dan Komunikasi (TIK) Jenjang SMA se-Kota Medan Tahun 2002 s.d 2008</li>\r\n	<li>Koordinator Balitbang Asosiasi Guru Matematika SMA/MA se-Provinsi Sumatera Utra tahun 2007 s.d 2008</li>\r\n	<li>Ketua Tim Pengembang Kurikulum (TPK) Jenjang SMA Dinas Pendidikan Kota Medan Tahun 2005 s.d 2008</li>\r\n	<li>Ketua Tim Pengembang Kurikulum (TPK) Jenjang SMA Dinas Pendiidkan Provinsi Sumatera Utara Tahun 2007 s.d 2008</li>\r\n	<li>Penanggung Jawab Pusat Sumber Belajar (PSB) Sekolah Inti SMA Negeri 2 Medan Tahun 2007 s.d 2008</li>\r\n	<li>Wakil Sekretaris Ikatan Keluarga Alumni Lemhannas (IKAL) Komisariat Provinsi Sumatera Utara Tahun 2018 sd 2022</li>\r\n	<li>Tenaga Ahli Dinas Pendidikan Provinsi Sumatera Utara Tahun 2016 sd sekarang</li>\r\n	<li>Ketua Tim Tenaga Ahli Dinas Pendidikan Provinsi Sumatera Utara 2022</li>\r\n	<li>Pelatih Ahli Sekolah Penggerak Kemendikbud Ristek RI Tahun 2021 sd sekarang</li>\r\n	<li>Asesor Kompetensi Pemerintahan BNSP RI</li>\r\n</ol>\r\n',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	8,	NULL,	''),
(8,	'Buku / Penelitian / Karya lain',	'<ol>\r\n	<li>Penulis Gebyar Rangkuman Matematika (Teori dan Rumus serta dilengkapi Prediksi Soal EBTANAS sejak Tahun 1985-2001) Untuk SLTP Kelas 3 Tahun 2001</li>\r\n	<li>Penulis Lembar Kerja Siswa (LKS) Gebyar untuk jenjang SLTP Kelas 1 2, dan 3 Caturwulan 1 dan 2 Tahun 2000</li>\r\n	<li>Penulis Lembar Kerja Siswa (LKS) Aksioma untuk jenjang SMU Kelas 1 2, dan 3 Caturwulan 1 dan 2 Tahun 2000</li>\r\n	<li>Penulis Buku Mata Pelajaran Teknologi Informasi dan Komunikasi (TIK) Jenjang SMA kelas X, XI dan XII Semester 1 dan 2 Tahun 2005</li>\r\n	<li>Penulis Artikel &ldquo; Pengoptimalan Sekolah berbasis TIK dalam Upaya Meningkatkan Pelayanan, Kinerja dan Kesejahteraan Sekolah &ldquo; di Koran Waspada Tahun 2005</li>\r\n	<li>Pembuat Database Penilaian Hasil Belajar Peserta Didik (LHBPD) Berbasis TIK SMA Negeri 1 Medan Tahun 2007 s.d 2008</li>\r\n	<li>Pembuat Database Penilaian Hasil Belajar Peserta Didik (LHBPD) Berbasis TIK SMA Swasta St. Thomas 1 Medan Tahun 2007 s.d 2008</li>\r\n	<li>Pembuat Database Penilaian Hasil Belajar Peserta Didik (LHBPD) Berbasis TIK SMA Swasta St. Thomas 2 Medan Tahun 2007 s.d 2008</li>\r\n	<li>Pembuat Database Penilaian Hasil Belajar Peserta Didik (LHBPD) Berbasis TIK SMA Swasta Methodist Tanjung Morawa Tahun 2007 s.d 2008</li>\r\n	<li>Pembuat/Perancang Media Pembelajaran Matematika SMA Berbasis TIK sebanyak 8 Judul Tahun 2008</li>\r\n	<li>Penulis pada Penelitian Tindakan Kelas (PTK) dengan judul : &ldquo; Pengoptimalan Pembelajaran Dimensi Tiga Kelas X Semester 2 dengan menggunakan Model Penemuan Terbimbing berbantuan Komputer di SMA Negeri 2 Medan &ldquo; Tahun Pelajaran 2007 s.d 2008</li>\r\n	<li>Penulis pada Penelitian Tindakan Kelas (PTK) dengan judul : &ldquo; Peningkatan Kualitas Pembelajaran Matematika dengan Metoda Penemuan Terbimbing melalui Pendekatan Kooperatif berbantuan Komputer Kelas XI IPA SMA Negeri 2 medan &ldquo; Tahun Pelajaran 2008 s,d 2009</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; Pemanfaatan Sistem Informasi Manajeme Berbasis TIK &ldquo; Bulan September Tahun 2014</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; Kosnep Dasar dan Aplikasi Statistik Pendekatan SPSS &ldquo; Bulan Desember Tahun 2014</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; Aplikasi Analisis Jalur Pendekatan Manajemen Pendidikan &ldquo; Bulan September Tahun 2015</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; Pola Pikir&nbsp; ASN sebagai Pelayan Masyarakat &ldquo; Bulan Desember Tahun 2015</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 3 No. 9 Bulan September 2015 halaman 245-254</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 3 No. 11 Bulan November 2015 halaman 251-260</li>\r\n	<li>Penulis Jurnal Ilmiah Nasional di Credential (Jurnal Ilmu Pendidikan, Sains dan Humaniora) Volume 1 No. 3 Oktober 2015 halaman 1-10</li>\r\n	<li>Penulis Jurnal Ilmiah Nasional di Integrity (Jurnal Ilmiah Ilmu Pendidikan) Volume 1 No. 1 Juni 2015 halaman 1-15</li>\r\n	<li>Penulis Jurnal Ilmiah Nasional di Considerate (Jurnal Ilmu Pendidikan, Humaniora dan Sains) Volume 1 No. 3 Agustus 2015 halaman 1-10</li>\r\n	<li>Penyusun dan Perancang Pembelajaran berbasis Multimedia (e-Learning) Pendidikan dan Pelatihan (Diklat) Kepemimpinan Tingkat III dan IV dan Diklat Prajabatan CPNS Kategori I dan II dengan Mata Diklat : (1) Penjelasan Proyek Perubahan, (2) Merancang Proyek Perubahan, (3) Pembekalan Implementasi Proyek Perubahan, (4) Seminar Proyek Perubahan, (5) Seminar Kepemimpinan, (6) Pola Pikir ASN sebagai Pelayan Masyarakat dan (7) Manajemen ASN</li>\r\n	<li>Penyusun dan Perancang Pembelajaran berbasis Multimedia (e-Learning) Pendidikan dan Pelatihan (Diklat) Prajabatan CPNS Kategori K1 dan K2 pada Mata Diklat&nbsp; : (1) Pola Pikir ASN sebagai Pelayan Masyarakat dab (2) Manajemen ASN</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; PAIKEM (Pembelajaran Aktif, Inovatif, Kreatif, Efektif dan Menyenangkan berbasis Teknologi Informasi dan Komunikasi) &ldquo; Bulan April Tahun 2018</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; STRATEGI PEMBELAJARAN INOVATIF (Media, Metode dan Model) &ldquo; Bulan April Tahun 2018</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; Layanan Digitaldalam Percepatan Pembangunan Pariwisata Nasional &ldquo; Bulan Juni Tahun 2019</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 6 No. 3 Bulan Maret 2018 halaman 33-44</li>\r\n	<li>Penulis Buku dengan ISBN, Judul : &ldquo; STRATEGI PEMBELAJARAN INOVATIF (Media, Metode dan Model) &ldquo; Bulan April Tahun 2018</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 6 No. 3 Bulan Maret 2018 halaman 33-44</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 6 No. 3 Bulan Maret 2018 halaman 33-44</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 7 No. 6 Bulan Juni 2019 halaman 229-236</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &ldquo; Metode Penelitian Kuantitatif (Konsep Dasar dan Aplikasi Analisis Regresi dan Jalur dengan SPSS)&rdquo;. Bulan Oktober 2020</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &ldquo; Step by Step Belajar dengan Google &rdquo;. Bulan Oktober 2020</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &ldquo; Path Analysis (Konsep dan Pratik dalam Penelitian &rdquo;. Bulan Oktober 2020</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &ldquo; Ekonometrika Dasar (Teori dan Konsep dengan Pendekatan Matematika &rdquo;. Bulan Januari 2021</li>\r\n	<li>Penulis Jurnal Internasional di International Journal of Education and Research (IJER) Volume 9 No. 3 Bulan Januari 2021 halaman 39 - 54</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &quot; Matematika Ekonomi (Pendekatan Makro dan Mikro Ekonomi) &quot;. Bulan Desember 2022</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &quot; Kepemimpinan Virtual &quot;, September 2023</li>\r\n	<li>Penulis Buku dengan ISBN, Judul &quot; Kepemimpinan Technopreneurship &quot;, September 2023</li>\r\n</ol>\r\n',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	9,	NULL,	''),
(9,	'Penghargaan',	'<ol>\r\n	<li>Prestasi kelulusan dengan Pujian (Cum Laude) Program Magister Jurusan Ekonomi Studi Pembangunan Universitas Syiah Kuala Tahun 2004</li>\r\n	<li>Juara 1 Guru Berprestasi Jenjang SMA Tingkat Kota Medan Tahun 2007</li>\r\n	<li>Juara 1 Guru Berprestasi Jenjang SMA Tingkat Provinsi Sumatera Utara Tahun 2008</li>\r\n	<li>Juara 1 Guru Berprestasi Jenjang SMA Tingkat Nasional Tahun 2008</li>\r\n	<li>Terbaik 1 Widyaiswara Berprestasi Tingkat Nasional Tahun 2023</li>\r\n</ol>\r\n',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	10,	NULL,	''),
(10,	'Kontak',	'',	'2024-04-23 08:42:48',	'',	'',	'',	'',	'',	3,	NULL,	''),
(11,	'Home Website',	'#1e56b7',	'2024-04-23 08:42:24',	'web/uploads/website/7ExbZQuQZTxQ.png',	'https://www.gho-elearning.com/',	'',	'Tingkatkan Prestasi, Wujudkan Impian',	'Gho Class Mengajakmu Menemukan Kekuatan Belajar yang Tak Terbatas. Bersama Kami, Tingkatkan Prestasimu, Wujudkan Impianmu, dan Raih Kesuksesan di Setiap Langkah Pendidikanmu!',	11,	NULL,	''),
(12,	'Visi Misi',	'<ol>\r\n	<li>Pelihara Dan Tingkatkan Kualitas Keimanan Dan Ketaqwaan Kepada Tuhan Yang Maha Esa;</li>\r\n	<li>Pahami Dan Laksanakan Tugas Pokok, Fungsi Dengan penuh Rasa Tanggung Jawab;</li>\r\n	<li>Tingkatkan Kompetensi Sumber Daya Aparatur, Guru, Tenaga Kependidikan Dan Peserta Didik Dengan Membudayakan Belajar Dan Berlatih;</li>\r\n	<li>Lakukan Pengawasan Pembangunan Zona Integritas Yang Efektif Pada Aspek Manajerial, Akademik dan Pengelolaan Keuangan;</li>\r\n	<li>Kobarkan dan implementasikan Profil Pelajar Pancasila pada seluruh jenjang dan satuan pendidikan;</li>\r\n	<li>Bangun Komunikasi Sosial dengan lintas sektoral;</li>\r\n	<li>Perkokoh solidaritas, loyalitas, kerjasama, jiwa korsa (exprit de corps) semangat kekeluargaan untuk mewujudkan Visi, Misi dan 8 Prioritas Pembangunan Sumatera Utara.</li>\r\n</ol>\r\n',	'2025-08-26 08:03:09',	'web/uploads/website/',	'',	'',	'Sumatera Utara Yang Maju, Aman Dan Hebat',	'Mewujudkan Masyarakat Sumatera Utara Yang Hebat Dalam Pendidikan karena Masyarakatnya Yang Terpelajar, Berkarakter, Cerdas, Kolaboratif, Berdaya Saing Dan Mandiri.',	1,	1,	''),
(13,	'Foto Struktur',	'',	'2025-08-26 08:31:46',	'',	'',	'',	'',	'',	2,	1,	''),
(14,	'Tugas dan Fungsi',	'<ul>\r\n	<li>Dinas Pendidikan Mempunyai Tugas : Melaksanakan Urusan Pemerintahan Daerah/Kewenangan Provinsi Di Bidang Pendidikan Serta Tugas Pembantuan.</li>\r\n	<li>Dinas Pendidikan Menyelenggarakan Fungsi: Penyelenggaraan Perumusan Kebijakan Manajemen Pendidikan Menengah, Kurikulum, Pendidik Dan Tenaga Kependidikan, Perizinan Pendidikan, Bahasa Dan Sastra, Sesuai Dengan Lingkup Bidang Tugasnya.</li>\r\n	<li>Penyelenggaraan Kebijakan Manajemen Pendidikan Menengah, Kurikulum, Pendidik Dan Tenaga Kependidikan, Perizinan Pendidikan, Bahasa Dan Sastra, Sesuai Dengan Lingkup Bidang Tugasnya.</li>\r\n	<li>Penyelenggaraan Evaluasi Dan Pelaporan Manajemen Pendidikan Menengah, Kurikulum, Pendidik Dan Tenaga Kependidikan, Perizinan Pendidikan, Bahasa Dan Sastra, Sesuai Dengan Lingkup Bidang Tugasnya.</li>\r\n	<li>Penyelenggaraan Administrasi Manajemen Pendidikan Menengah, Kurikulum, Pendidik Dan Tenaga Kependidikan, Perizinan Pendidikan, Bahasa Dan Sastra, Sesuai Dengan Lingkup Bidang Tugasnya.</li>\r\n	<li>Penyelenggaraan Fungsi Lain Yang Diberikan Gubernur, Terkait Dengan Tugas Dan Fungsinya.</li>\r\n</ul>\r\n',	'2025-08-26 09:54:08',	'web/uploads/website/RX-vPKWFjkCB.website/pahCezuQ4Ji6.website/VWEJGPDyoY8N.website/',	'',	'',	'',	'',	3,	1,	''),
(15,	'Foto Maklumat Pelayanan',	'',	'2025-09-04 06:38:48',	'web/uploads/website/M_lMcRvkAvfe.png',	'',	'',	'',	'',	4,	1,	'');

DROP TABLE IF EXISTS `tbl_video`;
CREATE TABLE `tbl_video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `link` text,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_publish` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1,	'devadmin',	'bwGHSS0mRuNRf7u4gTYwbEnpIWbqfFGk',	'$2y$13$PtExjiSUeB7URhTcxIJ4eOlSkMOToiQyaZUt1o5vf4DSI.MXwj0NS',	NULL,	'admin@email.com',	10,	1714395764,	1714395764);

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int NOT NULL AUTO_INCREMENT,
  `kategorivideo_id` int DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `video_link` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id` int unsigned DEFAULT NULL,
  `sts_v` varchar(1) DEFAULT NULL,
  `ket_video` text,
  `hits` int DEFAULT NULL,
  `likevideo` int DEFAULT '0',
  PRIMARY KEY (`video_id`),
  KEY `id` (`id`),
  KEY `kategorivideo_id` (`kategorivideo_id`)
) ;


DROP TABLE IF EXISTS `visitor`;
CREATE TABLE `visitor` (
  `ip` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `hits` int DEFAULT NULL,
  `online` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ;


-- 2025-10-11 05:26:38
