Upgrade the system packages

```bash
sudo apt-get update && sudo apt-get install -fy && sudo apt-get upgrade -y
```

Set the system locale

```bash
locale -a # view availabe locales
sudo locale-gen en_US.UTF-8 # generate locale
sudo update-locale LANG=en_US.UTF-8 LANGUAGE=en_US.UTF-8 LC_ALL=en_US.UTF-8 # set locales
locale # view current locales
```

Configure the timezone and datetime

```bash
sudo apt-get install -y ntp # install network time protocol to get time from the internet
sudo service ntp start
sudo systemctl enable ntp # enable NTP service on boot up
sudo timedatectl set-timezone UTC
sudo hwclock -w # set the RTC time from the system time
sudo timedatectl set-ntp on && sudo service ntp restart # synchronize the time
timedatectl status # view local and RTC times
sudo service ntp status # view status of the NTP service
```

Install curl, git, vim, tmux, htop, openssl, zip

```bash
sudo apt-get install -y curl git vim tmux htop openssl zip unzip
```

Install and configure tmux

```bash
./tmux_init.sh
```

Install NodeJS

```bash
curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
sudo apt-get install -y nodejs

# install development tools for nodejs to build native addons
sudo apt-get install -y gcc g++ make

# install yarn
sudo npm install -g yarn
```

Install PHP v7.3

```bash
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update
sudo apt-get install -y php7.3
```

Install PHP extensions

```bash
sudo apt-get install -y php7.3-mysql php7.3-curl php7.3-json php7.3-zip php7.3-gd php7.3-xml php7.3-pdo php7.3-tokenizer php7.3-mbstring php7.3-ctype php7.3-bcmath php7.3-intl php7.3-sqlite php7.3-imagick
```

Configure PHP (CLI app)

```bash
vim php.ini # if need
sudo cp -f php.ini /etc/php/7.3/cli/php.ini
```

Install MySQL v5.7

```bash
sudo apt-get install -y mysql-server mysql-client
```

MySQL: Configure

```bash
sudo cp -f mysql-conf/my.cnf /etc/mysql/
sudo cp -rf mysql-conf/conf.d/ /etc/mysql/
sudo cp -rf mysql-conf/mysql.conf.d/ /etc/mysql/
sudo /etc/init.d/mysql restart
```

MySQL: Secure the MySQL

```bash
sudo mysql_secure_installation # set password 12345 if in development mode, else set a complex password.
```

MySQL: Log into

```bash
sudo mysql -h localhost -u root
```

MySQL: Create user and grant permissions

```bash
mysql> CREATE USER 'nurassyl'@'localhost' IDENTIFIED BY '12345';
mysql> GRANT ALL PRIVILEGES ON * . * TO 'nurassyl'@'localhost';
mysql> FLUSH PRIVILEGES;
```

MySQL: Create database

```bash
mysql> CREATE DATABASE mydb;
```

MySQL: Quit the MySQL shell

```bash
mysql> quit
```

Install Composer

```bash
php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

Install packages

```bash
composer install # install composer packages
yarn install # install npm packages
```

Run the server

```bash
php yii serve 0 --port=8888
```

---

View the MySQL all queries log (recommended in development mode)

```bash
sudo bash -c 'echo -e "[mysqld]\ngeneral_log = on\ngeneral_log_file=/tmp/mysql_quires.log" >> /etc/mysql/my.cnf'
sudo /etc/init.d/mysql restart
sudo tail -f /tmp/mysql_quires.log
```

