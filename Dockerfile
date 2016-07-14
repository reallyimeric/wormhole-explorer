# 使用官方 PHP-Apache 镜像
FROM daocloud.io/php:5.6-apache

# docker-php-ext-install 为官方 PHP 镜像内置命令，用于安装 PHP 扩展依赖
# pdo_mysql 为 PHP 连接 MySQL 扩展
RUN docker-php-ext-install mysqli

RUN mkdir -p /tmp/build/

WORKDIR /tmp/build/
##Will do apt-get update
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -

RUN apt-get upgrade -y > /dev/null 2>&1

RUN apt-get install -y git nodejs > /dev/null 2>&1

COPY . /tmp/build/

RUN bash ./composer_installer.sh

RUN npm i

RUN php composer.phar install -q

RUN npm i -g gulp

RUN gulp build

# /var/www/html/ 为 Apache 目录
RUN for file in $(ls -A /tmp/build/wormholeexplorer/);do cp -r /tmp/build/wormholeexplorer/$file /var/www/html/;done

RUN rm -rf /tmp/build/

RUN npm un -g gulp

RUN apt-get purge -y git nodejs > /dev/null 2>&1

RUN apt-get autoremove -y > /dev/null 2>&1

WORKDIR /var/www/html/

RUN ln -s ../mods-available/rewrite.load /etc/apache2/mods-enabled/
