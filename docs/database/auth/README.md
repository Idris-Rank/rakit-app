# Domain Autentikasi

## Tujuan

Menyimpan akun yang dapat mengakses area admin dan mendukung pembatasan berdasarkan role.

## Tabel saat ini: `users`

| Kolom | Tipe/logika | Keterangan |
|---|---|---|
| `id` | integer auto-increment | Primary key |
| `name` | string | Nama pengguna |
| `email` | string unique | Username yang dipakai Rakit Auth |
| `password` | string | Hash password, bukan plaintext |
| `role` | string | Saat ini diisi `admin` |
| `created_at` | datetime | Waktu dibuat |
| `updated_at` | datetime | Waktu diperbarui |

## Aturan

- Driver auth Rakit memakai tabel `users` dan kolom username `email`.
- Password dibuat dengan `Hash::make()`.
- Akun pertama dapat dibuat dari `ADMIN_EMAIL` dan `ADMIN_PASSWORD` ketika migration users dijalankan.
- Setelah akun pertama berhasil dibuat, hapus password dari `.env` dan jangan commit `.env`.
- Untuk multi-role jangka panjang, role dapat dipisah menjadi tabel `roles` dan `user_roles`; jangan menambahkannya sebelum kebutuhan multi-user disepakati.

## Alur akses

1. Pengguna membuka `/admin/login`.
2. Rakit menjalankan `Auth::attempt()`.
3. Session menyimpan identitas user.
4. Middleware `auth` melindungi route admin.
5. Logout menjalankan `Auth::logout()`.
