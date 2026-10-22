<?php

defined('DS') or exit('No direct script access.');

return [
    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | Secara default, record hasil dari kueri database akan direturn sebagai
    | instance dari objek stdClass; namun, anda mungkin ingin mengambil record
    | tersebut sebagai array, bukan sebagai objek. Di sini anda dapat
    | mengontrol gaya pengambilan record PDO dari hasil kueri anda.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Koneksi Database Default
    |--------------------------------------------------------------------------
    |
    | Nama koneksi database default anda. Koneksi ini akan digunakan sebagai
    | default untuk semua operasi database kecuali anda memberikan
    | nama koneksi lain saat melakukan operasi tersebut.
    |
    | Nama koneksi ini harus terdaftar dalam list koneksi database di bawah.
    |
    */

    'default' => $_ENV['DB_CONNECTION'] ?? 'sqlite',

    /*
    |--------------------------------------------------------------------------
    | List Koneksi Database
    |--------------------------------------------------------------------------
    |
    | List koneksi database yang digunakan oleh aplikasi anda. Biasanya,
    | aplikasi anda hanya akan menggunakan satu koneksi; namun, anda memiliki
    | kebebasan untuk menentukan berapapun koneksi yang ingin anda tangani.
    |
    | Seluruh pengelolaan database di rakit dilakukan melalui fasilitas PDO,
    | jadi pastikan driver PDO untuk database pilihan anda sudah diinstal.
    |
    |
    */

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => $_ENV['DB_SQLITE_DATABASE'] ?? 'application',
            'prefix' => $_ENV['DB_PREFIX'] ?? '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
            'database' => $_ENV['DB_DATABASE'] ?? 'database',
            'username' => $_ENV['DB_USERNAME'] ?? 'root',
            'password' => $_ENV['DB_PASSWORD'] ?? '',
            'charset' => $_ENV['DB_CHARSET'] ?? 'utf8',
            'prefix' => $_ENV['DB_PREFIX'] ?? '',
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => '127.0.0.1',
            'database' => 'database',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => '127.0.0.1',
            'database' => 'database',
            'username' => 'root',
            'password' => '',
            'prefix' => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Database Redis
    |--------------------------------------------------------------------------
    |
    | Redis adalah penyimpanan berbasis key-value yang cepat dan canggih.
    | Dia juga menyediakan sekumpulan perintah yang lebih kaya daripada
    | penyimpanan berbasis key-value biasa seperti APC atau memcache.
    | Banyak orang menyukainya.
    |
    | Untuk mengetahui informasi tentang Redis, lihat: https://redis.io
    |
    */

    'redis' => [
        'default' => [
            'host' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
        ],
    ],
];
