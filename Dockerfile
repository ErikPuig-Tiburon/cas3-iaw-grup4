FROM php:8.2-apache

# Instal·la dependencies del sistema, extensions PHP y soport HTTPS en Apache.
RUN apt-get update \
    && apt-get install -y --no-install-recommends openssl \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite headers ssl \
    && printf 'ServerName 10.0.70.99\n' > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername \
    && mkdir -p /etc/apache2/ssl \
    && openssl req -x509 -nodes -days 365 \
        -newkey rsa:2048 \
        -keyout /etc/apache2/ssl/cas3-selfsigned.key \
        -out /etc/apache2/ssl/cas3-selfsigned.crt \
        -subj "/C=ES/ST=Tarragona/L=Amposta/O=CAS3/OU=IAW/CN=10.0.70.99" \
        -addext "subjectAltName=IP:10.0.70.99" \
    && a2ensite default-ssl

# Defineix el directori de treball on Apache.
WORKDIR /var/www/html

# Apliquem la configuracio creada al projecte a apache.
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY apache/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Mantiene activos los sitios HTTP y HTTPS: HTTP solo redirige a HTTPS.
