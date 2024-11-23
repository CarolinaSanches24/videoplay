# Use a imagem base oficial do PHP 8.3 com FPM
FROM php:8.3-fpm

# Instale extensões necessárias para o PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copie o código da aplicação para o diretório de trabalho
COPY . /var/www/html/

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Defina o usuário e o grupo para o container
RUN chown -R www-data:www-data /var/www/html

# Exponha a porta 9000 para o PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]