# Konvensi Database

## Naming

- Tabel menggunakan `snake_case` dan bentuk jamak: `wedding_events`.
- Primary key standar: `id` integer auto-increment.
- Foreign key menggunakan pola `<singular_table>_id`, misalnya `user_id`.
- Kolom status memakai nama eksplisit, misalnya `status`, `is_published`, atau `is_active`.
- URL memakai akhiran `_url` jika yang disimpan adalah URL eksternal.
- Waktu memakai akhiran `_at`, tanggal kalender memakai akhiran `_date`.

## Tipe data

- Teks pendek: `string`.
- Teks panjang: `text`.
- Nilai benar/salah: `boolean`.
- Waktu event yang membutuhkan timezone: simpan juga representasi ISO-8601 pada kolom target bila diperlukan.
- Password tidak pernah disimpan dalam bentuk plaintext; gunakan `Hash::make()`.

## Audit dan lifecycle

Tabel domain yang bisa diedit admin menggunakan `created_at` dan `updated_at`.
Untuk data publik seperti RSVP dan ucapan, gunakan `status` atau `is_approved` daripada langsung menghapus record.

## Prefix tabel

`.env` saat ini menggunakan `DB_PREFIX=tb_`. Konfigurasi prefix harus diterapkan konsisten pada seluruh tabel baru. Nama logis pada dokumentasi ditulis tanpa prefix agar mudah dibaca; nama fisik mengikuti konfigurasi aplikasi.
