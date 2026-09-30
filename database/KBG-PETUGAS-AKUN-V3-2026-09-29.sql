-- ============================================================
-- DP3AKB PROVSU
-- KBG MOBILE V3 - REGISTRY & AKUN PETUGAS BERBASIS NIP
-- Incremental / aman di-import setelah KBG-ADDON-2026-09-24.sql
-- Tidak menghapus tabel lama.
-- Generated: 2026-09-29
-- ============================================================

SET NAMES utf8mb4;
SET foreign_key_checks = 0;


-- ============================================================
-- 1. REGISTRY PETUGAS KBG
-- ============================================================

CREATE TABLE IF NOT EXISTS `kbg_petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pegawai_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `account_owned` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=akun khusus KBG, 0=akun lama sistem',
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `must_change_password` tinyint(1) NOT NULL DEFAULT 1,
  `activated_at` datetime DEFAULT NULL,
  `activated_by` int(11) DEFAULT NULL,
  `deactivated_at` datetime DEFAULT NULL,
  `password_changed_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_kbg_petugas_pegawai` (`pegawai_id`),
  UNIQUE KEY `uq_kbg_petugas_user` (`user_id`),
  KEY `idx_kbg_petugas_active` (`is_active`),
  KEY `idx_kbg_petugas_activated_by` (`activated_by`),
  CONSTRAINT `fk_kbg_petugas_pegawai`
    FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_kbg_petugas_user`
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_kbg_petugas_activated_by`
    FOREIGN KEY (`activated_by`) REFERENCES `user` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================
-- 2. DAFTARKAN SEMUA PEGAWAI AKTIF YANG MEMILIKI NIP
--    Jika NIP kebetulan sudah menjadi username akun lama,
--    akun tersebut ditautkan dan tidak diambil alih modul KBG.
-- ============================================================

INSERT INTO `kbg_petugas`
(
  `pegawai_id`,
  `user_id`,
  `account_owned`,
  `is_active`,
  `must_change_password`,
  `created_at`,
  `updated_at`
)
SELECT
  p.`id`,
  u.`id`,
  CASE WHEN u.`id` IS NULL THEN 1 ELSE 0 END,
  0,
  CASE WHEN u.`id` IS NULL THEN 1 ELSE 0 END,
  NOW(),
  NOW()
FROM `tbl_pegawai` p
LEFT JOIN `user` u
  ON u.`username` = p.`nip`
WHERE p.`status` = 1
  AND p.`nip` IS NOT NULL
  AND TRIM(p.`nip`) <> ''
  AND NOT EXISTS (
    SELECT 1
    FROM `kbg_petugas` kp
    WHERE kp.`pegawai_id` = p.`id`
  );


-- ============================================================
-- 3. BUAT AKUN LOGIN NONAKTIF UNTUK PEGAWAI YANG BELUM PUNYA USER
--    Username = NIP.
--    Password awal sengaja tidak diketahui dan akun status=0.
--    Saat Admin mengaktifkan, aplikasi membuat password sementara baru.
-- ============================================================

INSERT INTO `user`
(
  `username`,
  `auth_key`,
  `password_hash`,
  `password_reset_token`,
  `email`,
  `status`,
  `created_at`,
  `updated_at`
)
SELECT
  p.`nip`,
  MD5(CONCAT('KBG-', p.`id`, '-', p.`nip`, '-', UNIX_TIMESTAMP())),
  '$2y$12$.Pd27/MEs3WWDqi8tNF1T.R3TckO9Nlb0VunRGrXRWQLdHn7m85uy',
  NULL,
  CASE
    WHEN p.`email` IS NOT NULL AND TRIM(p.`email`) <> ''
      THEN p.`email`
    ELSE CONCAT(p.`nip`, '@kbg.internal')
  END,
  0,
  UNIX_TIMESTAMP(),
  UNIX_TIMESTAMP()
FROM `kbg_petugas` kp
INNER JOIN `tbl_pegawai` p
  ON p.`id` = kp.`pegawai_id`
WHERE kp.`user_id` IS NULL
  AND p.`nip` IS NOT NULL
  AND TRIM(p.`nip`) <> ''
  AND NOT EXISTS (
    SELECT 1
    FROM `user` u
    WHERE u.`username` = p.`nip`
  );


-- Tautkan akun yang baru dibuat ke registry.
UPDATE `kbg_petugas` kp
INNER JOIN `tbl_pegawai` p
  ON p.`id` = kp.`pegawai_id`
INNER JOIN `user` u
  ON u.`username` = p.`nip`
SET
  kp.`user_id` = u.`id`,
  kp.`account_owned` = 1,
  kp.`must_change_password` = 1,
  kp.`updated_at` = NOW()
WHERE kp.`user_id` IS NULL;


-- ============================================================
-- 4. RBAC
-- ============================================================

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

INSERT IGNORE INTO `auth_item`
(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`)
VALUES
('/kbg/change-password',2,'Ganti password pertama Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/*',2,'Kelola akun Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/index',2,'Daftar Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/sync',2,'Sinkronisasi pegawai Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/activate',2,'Aktifkan Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/activate-selected',2,'Aktifkan beberapa Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/deactivate',2,'Nonaktifkan Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP()),
('/kbg-petugas/reset-password',2,'Reset password Petugas KBG',NULL,NULL,UNIX_TIMESTAMP(),UNIX_TIMESTAMP());

INSERT IGNORE INTO `auth_item_child` (`parent`,`child`) VALUES
('PetugasKBG','/kbg/change-password'),
('Admin','/kbg-petugas/*'),
('SuperAdmin','/kbg-petugas/*');


-- Bila sebelumnya sudah ada user yang manual diberi role PetugasKBG,
-- sinkronkan status registry agar tidak tiba-tiba terlihat nonaktif.
UPDATE `kbg_petugas` kp
INNER JOIN `auth_assignment` aa
  ON aa.`user_id` = CAST(kp.`user_id` AS CHAR)
  AND aa.`item_name` = 'PetugasKBG'
INNER JOIN `user` u
  ON u.`id` = kp.`user_id`
SET
  kp.`is_active` = 1,
  kp.`must_change_password` = CASE
    WHEN kp.`account_owned` = 1 THEN kp.`must_change_password`
    ELSE 0
  END,
  kp.`updated_at` = NOW()
WHERE u.`status` = 10;


-- ============================================================
-- 5. MENU ADMIN
-- ============================================================

SET @kbg_parent_id = (
  SELECT `id`
  FROM `menu`
  WHERE `name` = 'Kaji Cepat KBG'
    AND `parent` IS NULL
  ORDER BY `id` DESC
  LIMIT 1
);

-- Jika parent belum ada, buat agar SQL tetap aman digunakan.
INSERT INTO `menu` (`name`,`parent`,`route`,`order`,`data`)
SELECT
  'Kaji Cepat KBG',
  NULL,
  NULL,
  6,
  'shield'
WHERE @kbg_parent_id IS NULL;

SET @kbg_parent_id = (
  SELECT `id`
  FROM `menu`
  WHERE `name` = 'Kaji Cepat KBG'
    AND `parent` IS NULL
  ORDER BY `id` DESC
  LIMIT 1
);

INSERT INTO `menu` (`name`,`parent`,`route`,`order`,`data`)
SELECT
  'Petugas KBG',
  @kbg_parent_id,
  '/kbg-petugas/index',
  4,
  'users'
WHERE NOT EXISTS (
  SELECT 1
  FROM `menu`
  WHERE `parent` = @kbg_parent_id
    AND `route` = '/kbg-petugas/index'
);


SET foreign_key_checks = 1;

-- ============================================================
-- SELESAI
--
-- Setelah import:
-- 1. Semua pegawai aktif yang memiliki NIP tampil di menu Petugas KBG.
-- 2. Akun khusus KBG telah disiapkan dalam keadaan NONAKTIF.
-- 3. Admin memilih 5 orang (atau sesuai kebutuhan) lalu klik Aktifkan.
-- 4. Password sementara muncul satu kali di layar Admin.
-- 5. Petugas login dengan NIP dan wajib mengganti password pertama.
-- 6. Admin dapat nonaktifkan / aktifkan kembali kapan saja.
-- ============================================================
