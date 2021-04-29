FROM debian:buster

# update && upgrade - to get the latest security updates
RUN apt update && apt upgrade -y

# get some of the required components via apt install
RUN apt install -y \
wget nginx mariadb-server php7.3-fpm php7.3-mysql php-xml php-mbstring

# create a directory for our stuff & set working dir
RUN mkdir /var/www/localhost/
WORKDIR /var/www/localhost/

# download phpMyAdmin & copy config
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.1.0/phpMyAdmin-5.1.0-english.tar.xz && \
tar -xf phpMyAdmin-5.1.0-english.tar.xz && \
rm -rf phpMyAdmin-5.1.0-english.tar.xz && \
mv phpMyAdmin-5.1.0-english phpmyadmin
COPY srcs/config.sample.inc.php phpmyadmin/

# download WordPress & copy config
RUN wget https://wordpress.org/wordpress-5.7.tar.gz && \
tar -xf wordpress-5.7.tar.gz && \
rm -rf wordpress-5.7.tar.gz
COPY srcs/wp-config.php wordpress/
RUN chown -R www-data *

# create database
RUN service mysql start && \
mysql -e "CREATE DATABASE ft_server; \
CREATE USER 'admin'@'localhost' IDENTIFIED by 'admin'; \
GRANT ALL PRIVILEGES ON ft_server.* TO 'admin'@'localhost' IDENTIFIED by 'admin';"

# create a totally safe and secure SSL certificate
WORKDIR /etc/ssl/certs
RUN openssl req -x509 -sha256 -days 90 -newkey rsa:4096 -nodes \
-subj "/C=RU/ST=St.Petersburg/L=St.Petersburg/O=42Paris/OU=School21/CN=rgreater" \
-keyout totallysafe.pem -out totallysafe.crt

# copy nginx config
WORKDIR /etc/nginx/sites-available/
COPY srcs/default .

# copy autoindex scripts
WORKDIR /var/www/
COPY [ "srcs/autoindex_enable.sh", "srcs/autoindex_disable.sh", "./" ]

# HTTP/HTTPS ports
EXPOSE 80 443
# enviroment variable to turn autoindex on/off
# docker run <...> --env AUTOINDEX=off to turn it off on container start
ENV AUTOINDEX=on

CMD service mysql start ; \
service php7.3-fpm start ; \
sed -i "s/autoindex on/autoindex $AUTOINDEX/g" /etc/nginx/sites-available/default ; \
nginx -g 'daemon off;'
# another option is:
# service nginx start ; sleep inf ;
