# 使用官方 PHP-Apache 镜像
FROM daocloud.io/php:5.6-apache

# docker-php-ext-install 为官方 PHP 镜像内置命令，用于安装 PHP 扩展依赖
# pdo_mysql 为 PHP 连接 MySQL 扩展
RUN docker-php-ext-install mysqli

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN apt-get update
RUN apt-get -y install npm
RUN apt-get -y install git

# /var/www/html/ 为 Apache 目录
COPY . /var/www/html/

RUN php composer.phar install
RUN npm install
RUN ln -s ../mods-available/rewrite.load /etc/apache2/mods-enabled/
