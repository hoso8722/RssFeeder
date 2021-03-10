FROM php:5.6-apache

# PHPのインストール
RUN apt-get update \
    && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    openssl libssl-dev \
    libxml2-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo_mysql mbstring xml tokenizer zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysql \
    && pear channel-update pear.php.net \
    && pear upgrade-all \
    && pear config-set auto_discover 1 \
    && pear install DB 

# apacheのrewriteを有効にする
RUN cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load

RUN apt-get install -y \
    vim \
    inetutils-ping \
    gosu

COPY config/php/php.ini /usr/local/etc/php/php.ini
# COPY /cron/crontablist /etc/cron.d/crontablist
# RUN  crontab /etc/cron.d/crontablist

# CMD ["service","apache2","start","&&","crond", "-f"]
# CMD ["cat","/config/apache2/resolv.conf",">","/etc/resolv.conf"]
# COPY ./config/apache2/resolv.conf /et

# COPY entrypoint.sh /usr/local/bin/entrypoint.sh
# RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

# ENTRYPOINT [ "/usr/local/bin/entrypoint.sh" ]