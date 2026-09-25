-- ============================================================
-- DP3AKB PROVSU
-- ADD-ON: KAJI CEPAT KBG & AUDIT KESELAMATAN
-- Incremental SQL - aman di-import ke database terbaru.
-- Tidak menghapus atau mengubah tabel lama.
-- Generated: 2026-09-24
-- ============================================================

SET NAMES utf8mb4;
SET foreign_key_checks = 0;

CREATE TABLE IF NOT EXISTS `kbg_assessment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(40) NOT NULL,
  `enumerator_id` int(11) DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'draft',
  `current_step` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `progress_percent` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `assessment_datetime` datetime DEFAULT NULL,
  `enumerator_name` varchar(180) DEFAULT NULL,
  `respondent_category` varchar(180) DEFAULT NULL,
  `respondent_name` varchar(180) DEFAULT NULL,
  `respondent_gender` varchar(40) DEFAULT NULL,
  `respondent_age` smallint(5) unsigned DEFAULT NULL,
  `respondent_role` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `village` varchar(180) DEFAULT NULL,
  `district` varchar(180) DEFAULT NULL,
  `regency` varchar(180) DEFAULT NULL,
  `province` varchar(180) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `altitude` decimal(10,2) DEFAULT NULL,
  `accuracy` decimal(10,2) DEFAULT NULL,
  `settlement_type` varchar(40) DEFAULT NULL,
  `settlement_size` varchar(40) DEFAULT NULL,
  `attention_count` smallint(5) unsigned NOT NULL DEFAULT 0,
  `critical_count` smallint(5) unsigned NOT NULL DEFAULT 0,
  `risk_level` varchar(60) NOT NULL DEFAULT 'Belum Ada Flag',
  `submitted_at` datetime DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verification_status` varchar(40) NOT NULL DEFAULT 'belum',
  `verification_note` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_kbg_assessment_kode` (`kode`),
  KEY `idx_kbg_assessment_status` (`status`),
  KEY `idx_kbg_assessment_enumerator` (`enumerator_id`),
  KEY `idx_kbg_assessment_location` (`province`,`regency`,`district`),
  KEY `idx_kbg_assessment_site` (`site_name`),
  KEY `idx_kbg_assessment_risk` (`risk_level`,`critical_count`),
  KEY `idx_kbg_assessment_updated` (`updated_at`),
  KEY `idx_kbg_assessment_verified_by` (`verified_by`),
  CONSTRAINT `fk_kbg_assessment_enumerator`
    FOREIGN KEY (`enumerator_id`) REFERENCES `user` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_kbg_assessment_verifier`
    FOREIGN KEY (`verified_by`) REFERENCES `user` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `kbg_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_id` bigint(20) unsigned NOT NULL,
  `section_step` tinyint(3) unsigned NOT NULL,
  `question_key` varchar(60) NOT NULL,
  `question_code` varchar(60) NOT NULL,
  `question_text` text NOT NULL,
  `answer_type` varchar(30) DEFAULT NULL,
  `answer_value` longtext DEFAULT NULL,
  `answer_json` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_kbg_answer_assessment_question`
    (`assessment_id`,`question_key`),
  KEY `idx_kbg_answer_question` (`question_key`),
  KEY `idx_kbg_answer_section` (`section_step`),
  CONSTRAINT `fk_kbg_answer_assessment`
    FOREIGN KEY (`assessment_id`) REFERENCES `kbg_assessment` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `kbg_assessment_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(60) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_kbg_log_assessment` (`assessment_id`,`created_at`),
  KEY `idx_kbg_log_user` (`user_id`),
  CONSTRAINT `fk_kbg_log_assessment`
    FOREIGN KEY (`assessment_id`) REFERENCES `kbg_assessment` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_kbg_log_user`
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================
-- RBAC
-- ============================================================

-- Role petugas lapangan KBG.
INSERT IGNORE INTO `auth_item`
(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`)
VALUES
(
  'PetugasKBG',
  1,
  'Petugas lapangan Kaji Cepat KBG',
  NULL,
  NULL,
  UNIX_TIMESTAMP(),
  UNIX_TIMESTAMP()
);

-- Permission route KBG.
INSERT IGNORE INTO `auth_item`
(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`)
VALUES
('/kbg/*',2,'Akses penuh modul KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/index',2,'Daftar dan dashboard KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/create',2,'Buat assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/form',2,'Isi assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/save',2,'Simpan assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/autosave',2,'Autosave assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/view',2,'Detail assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/submit',2,'Kirim assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/verify',2,'Verifikasi assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/delete',2,'Hapus assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/map',2,'Peta assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/export-csv',2,'Export assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg/print',2,'Cetak assessment KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP());

-- Admin mendapat wildcard KBG.
INSERT IGNORE INTO `auth_item_child` (`parent`,`child`)
VALUES ('Admin','/kbg/*');

-- SuperAdmin juga diberi langsung agar tetap aman jika inheritance berubah.
INSERT IGNORE INTO `auth_item_child` (`parent`,`child`)
VALUES ('SuperAdmin','/kbg/*');

-- PetugasKBG hanya diberi route operasional.
INSERT IGNORE INTO `auth_item_child` (`parent`,`child`) VALUES
('PetugasKBG','/kbg/index'),
('PetugasKBG','/kbg/create'),
('PetugasKBG','/kbg/form'),
('PetugasKBG','/kbg/save'),
('PetugasKBG','/kbg/autosave'),
('PetugasKBG','/kbg/view'),
('PetugasKBG','/kbg/submit'),
('PetugasKBG','/kbg/delete'),
('PetugasKBG','/kbg/map'),
('PetugasKBG','/kbg/export-csv'),
('PetugasKBG','/kbg/print');


-- ============================================================
-- ADMIN MENU (mdmsoft/yii2-admin)
-- ============================================================

INSERT INTO `menu` (`name`,`parent`,`route`,`order`,`data`)
SELECT
  'Kaji Cepat KBG',
  NULL,
  NULL,
  6,
  'shield'
WHERE NOT EXISTS (
  SELECT 1
  FROM `menu`
  WHERE `name` = 'Kaji Cepat KBG'
    AND `parent` IS NULL
);

SET @kbg_parent_id = (
  SELECT `id`
  FROM `menu`
  WHERE `name` = 'Kaji Cepat KBG'
    AND `parent` IS NULL
  ORDER BY `id` DESC
  LIMIT 1
);

INSERT INTO `menu` (`name`,`parent`,`route`,`order`,`data`)
SELECT 'Dashboard & Data', @kbg_parent_id, '/kbg/index', 1, 'dashboard'
WHERE NOT EXISTS (
  SELECT 1 FROM `menu`
  WHERE `parent` = @kbg_parent_id
    AND `route` = '/kbg/index'
);

INSERT INTO `menu` (`name`,`parent`,`route`,`order`,`data`)
SELECT 'Assessment Baru', @kbg_parent_id, '/kbg/create', 2, 'plus-circle'
WHERE NOT EXISTS (
  SELECT 1 FROM `menu`
  WHERE `parent` = @kbg_parent_id
    AND `route` = '/kbg/create'
);

INSERT INTO `menu` (`name`,`parent`,`route`,`order`,`data`)
SELECT 'Peta Assessment', @kbg_parent_id, '/kbg/map', 3, 'map-marker'
WHERE NOT EXISTS (
  SELECT 1 FROM `menu`
  WHERE `parent` = @kbg_parent_id
    AND `route` = '/kbg/map'
);


SET foreign_key_checks = 1;

-- ============================================================
-- SELESAI
-- Catatan:
-- 1. Tidak ada tabel lama yang dihapus/diubah.
-- 2. Role PetugasKBG belum otomatis diberikan ke user mana pun.
--    Assign melalui menu RBAC/User sesuai kebutuhan.
-- 3. Admin/SuperAdmin otomatis memperoleh akses modul.
-- ============================================================
