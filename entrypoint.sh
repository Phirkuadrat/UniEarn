#!/bin/sh
# Skrip ini akan dijalankan setiap kali kontainer dimulai.

# Jalankan migrasi database
echo "==> Running database migrations..."
php artisan migrate --force

# Setelah migrasi selesai, jalankan perintah utama dari Docker image (yaitu Apache)
# 'exec "$@"' akan menjalankan CMD yang didefinisikan di Dockerfile.
exec "$@"