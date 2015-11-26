#!/usr/bin/env bash

# error? apt-get sudo lsof /var/lib/dpkg/locak  sudo kill -9 numberprocess
sudo apt-get -y update
sudo apt-get -y install vim curl git python-software-properties

# install php5.6
sudo add-apt-repository ppa:ondrej/php5-5.6
sudo apt-get -y update
sudo apt-get -y install php5

sudo apt-get -y install apache2

sudo apt-get -y update && sudo apt-get upgrade

echo '--- mysql install set password --- '

echo 'mysql-server mysql-server/root_password password antoine' | sudo debconf-set-selections
echo 'mysql-server mysql-server/root_password_again password antoine' | sudo debconf-set-selections

sudo apt-get -y install mysql-server

sudo apt-get -y install libapache2-mod-php5 php5-curl php5-gd php5-mcrypt php5-mysql php5-xdebug

echo " ------ composer ------- "

sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

sudo mkdir /vagrant/sites

sudo rm -rf /var/www
sudo ln -fs /vagrant /var/www

# echo "<?php phpinfo(); " > /vagrant/sites/index.php

sudo rm -f /etc/apache2/sites-available/000-default.conf

#vhost apache 192.168.33.22 Vagrantfile
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/vagrant/sites/public"
  ServerName localhost
  <Directory "/vagrant/sites/public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" | sudo tee /etc/apache2/sites-available/000-default.conf > /dev/null 2>&1

sudo service apache2 restart
sudo service apache2 restart

echo "--- les droits sur le dossiers sites ---"

#droits sur les dossiers du site
sudo chown -R vagrant:www-data /vagrant/sites
sudo find /vagrant/sites/* -type f -exec chmod 640 {} \ ;
sudo find /vagrant/sites/* -type d -exec chmod 750 {} \ ;

sudo a2enmod rewrite

echo "--- install nodeJS ---"
sudo apt-get update
sudo apt-get install nodejs npm

echo "--- install mailDev ---"


echo "--- utf8 french "

echo 'LC_ALL="fr_FR.UTF-8"'  | sudo tee  /etc/default/locale > /dev/null 2>&1

