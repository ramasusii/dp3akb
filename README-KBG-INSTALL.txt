DP3AKB - MODUL KAJI CEPAT KBG & AUDIT KESELAMATAN
=========================================================
Tanggal paket: 24 September 2026

TUJUAN
------
Modul ini mengimplementasikan instrumen:
"Kaji Cepat Bersama Risiko Kekerasan Berbasis Gender dan Audit Keselamatan"
langsung pada aplikasi Yii2 DP3AKB.

Data disimpan ke database DP3AKB sendiri. Tidak menggunakan penyimpanan KoboToolbox.


FILE BARU
---------
controllers/KbgController.php

models/KbgAssessment.php
models/KbgAnswer.php
models/KbgAssessmentLog.php
models/KbgQuestionnaire.php

views/kbg/index.php
views/kbg/form.php
views/kbg/view.php
views/kbg/map.php
views/kbg/print.php
views/kbg/_question.php
views/kbg/_styles.php

database/KBG-ADDON-2026-09-24.sql


FITUR
-----
1. Dashboard assessment.
2. 7 tahap formulir responsive/mobile-first.
3. 194 field/pertanyaan sesuai struktur instrumen sumber.
4. Conditional question.
5. Autosave draft.
6. Simpan & lanjutkan per tahap.
7. Resume draft.
8. Status Draft / Dikirim / Perlu Revisi / Terverifikasi.
9. Verifikasi admin + catatan revisi.
10. Pengambilan koordinat GPS browser.
11. Peta assessment menggunakan Leaflet + OpenStreetMap.
12. Search/filter data.
13. Export CSV.
14. Cetak / Simpan PDF melalui browser.
15. Flag perhatian operasional untuk membantu peninjauan data.
16. Scope data: PetugasKBG hanya melihat assessment miliknya.
17. Admin/SuperAdmin/Developer melihat seluruh assessment.
18. Log aktivitas dasar.


PENTING TENTANG FLAG SISTEM
---------------------------
Flag "Perlu Tindak Lanjut", "Perlu Perhatian", dll adalah indikator bantu
berdasarkan jawaban instrumen. Flag tersebut BUKAN penetapan kasus,
diagnosis, atau pengganti verifikasi petugas yang berwenang.


CARA PASANG - SOURCE
--------------------
Jika memakai ZIP full source:
- backup project server terlebih dahulu.
- upload/replace source seperti workflow Git biasa.

Jika memakai ZIP add-on:
copy folder berikut ke root project:
- controllers/
- models/
- views/kbg/
- database/


CARA PASANG - DATABASE
----------------------
1. Backup database online.
2. Buka Adminer.
3. Import:
   database/KBG-ADDON-2026-09-24.sql

SQL bersifat incremental:
- tidak DROP tabel lama;
- tidak mengubah data lama;
- membuat tabel kbg_*;
- menambah permission RBAC KBG;
- menambah menu backend Kaji Cepat KBG.


ROLE
----
Admin dan SuperAdmin mendapatkan akses KBG dari SQL.

Role baru:
PetugasKBG

Role ini TIDAK otomatis diberikan ke user.
Assign melalui RBAC kepada akun petugas lapangan jika diperlukan.


MENU BACKEND
------------
Kaji Cepat KBG
├── Dashboard & Data
├── Assessment Baru
└── Peta Assessment


TABEL BARU
----------
kbg_assessment
- record utama assessment
- status, petugas, lokasi, koordinat, progress, verifikasi

kbg_answer
- jawaban seluruh pertanyaan
- satu record per pertanyaan per assessment
- mendukung text, number, radio, checkbox/multi-value

kbg_assessment_log
- jejak create/save/submit/verify/revision


CATATAN PRIVASI
---------------
Instrumen memuat nama responden dan informasi yang dapat berkaitan
dengan kekerasan. Modul ditempatkan di area login backend.
Jangan membuka route KBG sebagai halaman guest/public.


SETELAH DEPLOY
--------------
1. Login sebagai Admin.
2. Buka menu Kaji Cepat KBG.
3. Buat satu assessment uji.
4. Isi sampai tahap 3 dan uji "Ambil Lokasi".
5. Uji autosave dengan reload halaman.
6. Selesaikan form, kirim untuk verifikasi.
7. Login Admin dan uji Verifikasi / Revisi.
8. Uji Peta Assessment.
9. Uji Export CSV dan Cetak.


DEPENDENSI EKSTERNAL
--------------------
Peta memakai:
- Leaflet 1.9.4
- OpenStreetMap tile

Tidak membutuhkan API key.
Jika internet pengguna tidak tersedia, formulir tetap dapat digunakan
tetapi peta dasar Leaflet/OpenStreetMap tidak akan dimuat.


TIDAK DIUBAH
------------
Modul ini tidak memodifikasi SiteController, layout guest, halaman publik,
atau tabel lama DP3AKB.
