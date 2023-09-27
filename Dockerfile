FROM php:7.2-apache-stretch
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY osRoom.php /var/www/html/osRoom.php
COPY osLang.php /var/www/html/osLang.php
COPY osInitiate.php /var/www/html/osInitiate.php
COPY check_Role.php /var/www/html/check_Role.php
COPY osGetUserData.php /var/www/html/osGetUserData.php
COPY osRole.php /var/www/html/osRole.php
COPY reset_all_roles.php /var/www/html/reset_all_roles.php
COPY osPrim.php /var/www/html/osPrim.php
COPY osAskRoom.php /var/www/html/osAskRoom.php
COPY sensor_ask_room.php /var/www/html/sensor_ask_room.php