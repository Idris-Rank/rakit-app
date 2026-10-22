# Domain Media dan Aset

Domain ini belum dibuat migration.

## Rencana tabel: `wedding_media`

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `type` | `image`, `audio`, atau tipe lain yang disetujui |
| `disk` | Lokasi penyimpanan, misalnya local atau object storage |
| `path` | Path internal; jangan mengandalkan URL yang dapat berubah |
| `url` | URL publik jika diperlukan |
| `alt_text` | Teks alternatif gambar |
| `mime_type` | MIME file |
| `size_bytes` | Ukuran file |
| `status` | `active`, `archived`, atau `deleted` |
| `created_at`, `updated_at` | Audit waktu |

## Aturan

- Database menyimpan metadata, bukan binary file.
- Validasi MIME, ukuran, dan ekstensi sebelum upload.
- Nama file publik tidak boleh berasal langsung dari input user.
- Media yang tidak lagi dipakai diarsipkan dahulu agar dapat dipulihkan.
