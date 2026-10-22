# Domain RSVP dan Ucapan

Domain ini belum dibuat migration. Desain awalnya dipisah agar data publik tidak bercampur dengan konfigurasi undangan.

## Rencana tabel: `wedding_rsvps`

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `guest_name` | Nama tamu |
| `phone` | Nomor kontak opsional |
| `attendance_status` | `attending`, `not_attending`, atau `maybe` |
| `guest_count` | Jumlah tamu |
| `note` | Catatan opsional |
| `status` | Moderasi: `pending`, `approved`, `rejected` |
| `created_at`, `updated_at` | Audit waktu |

## Rencana tabel: `wedding_guestbooks`

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `guest_name` | Nama pengirim |
| `message` | Ucapan |
| `status` | Moderasi publik |
| `ip_hash` | Hash IP jika rate limiting/audit diperlukan; jangan simpan IP mentah tanpa alasan |
| `created_at`, `updated_at` | Audit waktu |

## Aturan

- Input publik harus divalidasi dan dilindungi CSRF jika memakai session/form.
- Ucapan tidak langsung tampil sebelum moderasi jika undangan dipublikasikan.
- Gunakan status untuk moderasi; jangan menghapus record hanya karena belum disetujui.
