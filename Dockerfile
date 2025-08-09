# ---- Base Stage ----
# Menggunakan image resmi PHP 8.2 dengan Apache
FROM php:8.2-apache AS base

# Install dependensi sistem dan ekstensi PHP yang umum untuk Laravel
RUN apt-get update && apt-get install -y \
      libpng-dev \
      libjpeg-dev \
      libfreetype6-dev \
      libzip-dev \
      zip \
      unzip \
      git \
      curl \
      && docker-php-ext-configure gd --with-freetype --with-jpeg \
      && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql zip

# Konfigurasi Apache untuk menunjuk ke folder public Laravel
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Install Composer (manajer dependensi PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set direktori kerja
WORKDIR /var/www/html

# Salin entrypoint script dan berikan izin eksekusi
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# ---- Build Stage ----
# Tahap ini hanya untuk menginstall dependensi composer
FROM base AS build
COPY . .
RUN composer install --no-interaction --no-plugins --no-scripts --no-dev --prefer-dist --optimize-autoloader

# ---- Final Stage ----
# Tahap ini adalah image akhir yang akan dijalankan
FROM base AS final
COPY --chown=www-data:www-data . .
# Salin dependensi yang sudah diinstall dari tahap 'build'
COPY --from=build /var/www/html/vendor /var/www/html/vendor

# Set izin folder agar web server bisa menulis log dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 untuk Apache
EXPOSE 80

# Jalankan entrypoint.sh sebagai perintah utama
ENTRYPOINT ["entrypoint.sh"]
# Perintah default yang akan dijalankan oleh entrypoint setelah migrasi
CMD ["apache2-foreground"]