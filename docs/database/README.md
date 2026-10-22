# Dokumentasi Database

Database aplikasi: `db_wedding_v2`

Dokumentasi database dipisah berdasarkan domain agar perubahan pada satu fitur tidak mencampur domain lain.

## Struktur dokumentasi

- [Konvensi database](./00-conventions.md)
- [Autentikasi dan user](./auth/README.md)
- [Data inti undangan](./wedding/README.md)
- [RSVP dan ucapan](./engagement/README.md)
- [Media dan aset](./media/README.md)
- [Migration](./migrations/README.md)

## Status implementasi

### Sudah tersedia di migration package `admin`

- `users`
- `wedding_settings`
- `wedding_events`
- `rakit_migrations` — dibuat otomatis oleh Rakit ketika migration dijalankan

### Direncanakan, belum dibuat migration

- `wedding_stories`
- `wedding_galleries`
- `wedding_rsvps`
- `wedding_guestbooks`
- `wedding_media`
- `wedding_settings_history`

Tabel rencana tidak boleh dibuat manual sebelum migration dan kebutuhan fiturnya disepakati.

## Prinsip jangka panjang

1. Satu tabel memiliki satu tanggung jawab utama.
2. Data konten undangan tidak disimpan di tabel `users`.
3. File gambar/audio disimpan di storage; database hanya menyimpan metadata dan lokasi file.
4. Migration menjadi satu-satunya sumber perubahan schema.
5. Jangan menghapus data publik secara permanen jika masih diperlukan untuk audit.
6. Semua timestamp menggunakan timezone aplikasi `Asia/Jakarta`, disimpan dalam format database standar.
