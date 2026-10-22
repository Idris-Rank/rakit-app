# Migration Database

## Migration yang tersedia

Migration domain admin berada di:

```text
packages/admin/migrations/
```

Saat ini tersedia:

- `2026_10_22_063000_create_users_table.php`
- `2026_10_22_063100_create_wedding_content_tables.php`

## Menjalankan

Pastikan `.env` menunjuk ke database yang benar, lalu jalankan dari root project:

```bash
php rakit migrate admin
```

Rakit mencatat migration di `rakit_migrations`. Jangan menjalankan migration dengan menyalin SQL manual jika file migration sudah tersedia.

## Rollback

Rollback migration terakhir:

```bash
php rakit migrate:rollback
```

Perintah rollback dapat menghapus tabel/data yang dibuat migration. Jalankan setelah backup dan jangan memakai `migrate:reset` pada production tanpa prosedur pemulihan.

## Prosedur penambahan domain baru

1. Buat migration baru di `packages/admin/migrations/` atau package domain yang sesuai.
2. Satu migration fokus pada satu domain/perubahan yang koheren.
3. Tambahkan dokumentasi domain terkait di folder `docs/database/`.
4. Uji pada database development.
5. Backup database sebelum menjalankan di environment lain.
6. Jalankan `php rakit migrate admin`.
7. Verifikasi tabel dan data seed setelah migration selesai.
