<?php

// Rakit 0.9.x memakai API PHP lama yang memicu E_DEPRECATED pada PHP 8.2+.
// Saring hanya deprecated sebelum debugger framework aktif agar header tidak rusak.
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

// Muat environment variables sebelum konfigurasi Rakit dibaca.
require_once __DIR__.'/vendor/autoload.php';
\Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();

// --------------------------------------------------------------
// Catat timer awal (untuk benchmark)
// --------------------------------------------------------------
define('RAKIT_START', microtime(true));

// --------------------------------------------------------------
// Definisikan konstanta untuk directory separator.
// --------------------------------------------------------------
define('DS', DIRECTORY_SEPARATOR);

// --------------------------------------------------------------
// Include konstanta path milik framework.
// --------------------------------------------------------------
require 'paths.php';

// --------------------------------------------------------------
// Jalankan frameworknya.
// --------------------------------------------------------------
require path('system').'boot.php';
