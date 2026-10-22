# Domain Inti Undangan

Struktur dibuat sederhana dan dipisah berdasarkan tanggung jawab. Data mempelai tidak dicampur dengan data acara.

## Tabel `wedding_couples`

Satu record untuk pasangan pada undangan aktif.

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `groom_name`, `groom_title`, `groom_parents` | Data mempelai pria |
| `groom_photo_url` | Foto mempelai pria |
| `bride_name`, `bride_title`, `bride_parents` | Data mempelai wanita |
| `bride_photo_url` | Foto mempelai wanita |
| `created_at`, `updated_at` | Audit waktu |

## Tabel `wedding_options`

Pengaturan kecil website yang tidak termasuk data pasangan atau detail acara.

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `title` | Judul undangan |
| `hero_date` | Label tanggal di halaman utama |
| `event_target` | Target ISO-8601 countdown |
| `whatsapp` | Nomor kontak RSVP |
| `audio_url` | URL musik latar |
| `created_at`, `updated_at` | Audit waktu |

## Tabel `wedding_events`

Satu record untuk satu rangkaian acara, misalnya akad dan resepsi.

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `name` | Nama acara |
| `date_label` | Label tanggal |
| `time_label` | Label waktu |
| `venue` | Nama tempat |
| `address` | Alamat acara |
| `maps_url` | URL peta untuk acara tersebut |
| `sort_order` | Urutan tampil |
| `created_at`, `updated_at` | Audit waktu |

## Yang dihapus

Tabel `wedding_settings` dihapus karena sebelumnya mencampur:

- data mempelai;
- detail acara;
- konfigurasi website;
- kontak dan musik.

Migration pemecahan memindahkan data lama ke tabel baru sebelum tabel lama dihapus.
