DP3AKB - KAJI CEPAT KBG MOBILE V3
=================================

FITUR V3
--------
1. Portal Petugas KBG mobile friendly.
2. Login petugas menggunakan NIP (kolom tbl_pegawai.nip).
3. Semua pegawai aktif yang memiliki NIP disiapkan sebagai calon akun.
4. Default akun Petugas KBG NONAKTIF.
5. Admin Provinsi dapat memilih 5 orang / beberapa orang lalu klik Aktifkan Terpilih.
6. Saat diaktifkan, sistem membuat password sementara dan menampilkannya SEKALI kepada admin.
7. Petugas wajib mengganti password saat login pertama.
8. Admin dapat menonaktifkan akses tanpa menghapus assessment lama.
9. Admin dapat mengaktifkan kembali dan reset password petugas.
10. Nama petugas pada assessment diambil dari tbl_pegawai, bukan NIP.

LOGIN PETUGAS
-------------
/site/kbg-login

Username : NIP
Password : password sementara dari Admin Provinsi

Setelah login pertama, petugas otomatis diminta membuat password baru.


INSTALASI JIKA MODUL KBG V2 SUDAH TERPASANG
-------------------------------------------
1. Backup project dan database.
2. Extract ZIP ini ke root project DP3AKB dan replace file yang diminta.
3. Import HANYA:
   database/KBG-PETUGAS-AKUN-V3-2026-09-29.sql
4. Login Admin.
5. Buka menu Kaji Cepat KBG > Petugas KBG.
6. Pilih 5 pegawai lalu klik Aktifkan Terpilih.
7. Salin NIP + password sementara dan berikan kepada masing-masing petugas.


INSTALASI JIKA MODUL KBG BELUM PERNAH TERPASANG
-----------------------------------------------
1. Backup project dan database.
2. Extract ZIP ke root project.
3. Import berurutan:
   a. database/KBG-ADDON-2026-09-24.sql
   b. database/KBG-PETUGAS-AKUN-V3-2026-09-29.sql
4. Login Admin dan aktifkan petugas dari menu Petugas KBG.


CATATAN KEAMANAN
----------------
- Pegawai yang belum diaktifkan tidak dapat login ke Portal KBG.
- Akun khusus KBG memakai status user=0 saat belum aktif.
- Password sementara tidak disimpan dalam plaintext.
- Password sementara hanya tampil satu kali setelah aktivasi/reset.
- Petugas wajib mengganti password pertama.
- Menonaktifkan petugas tidak menghapus data assessment yang pernah dibuat.
- Jika NIP sudah merupakan username akun sistem lama, modul tidak mengambil alih password akun tersebut.


STRUKTUR AKSES
--------------
ADMIN / SUPERADMIN / DEVELOPER
- Dashboard KBG
- Seluruh assessment
- Verifikasi / revisi
- Peta
- Export
- Kelola Petugas KBG
- Aktifkan/nonaktifkan/reset password

PETUGASKBG
- Login mobile dengan NIP
- Assessment baru
- Draft Saya
- Riwayat Saya
- Peta Saya
- Submit assessment
- Ganti password pertama

