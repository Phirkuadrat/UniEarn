#!/bin/sh

# Hapus paksa semua cache Laravel untuk memastikan .env dibaca
echo "==> Clearing all Laravel caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Jalankan migrasi database
echo "==> Running database migrations..."
php artisan migrate --force

# Setelah semua persiapan selesai, jalankan perintah utama (Apache)
echo "==> Starting Apache server..."
exec "$@"