# PHP Mail Web Application using MariaDB as Database
Using [PHP Mailer](https://github.com/PHPMailer/PHPMailer)
# How to run it in your local machine ? 
### Cloning the repository
git clone https://github.com/h471x/php_mail.git
### Setup 
#### Dependencies
- php 
```bash
sudo apt install php php-mysql

```
- Database
```bash
sudo apt install mariadb-client mariadb-server 

```
### Config
#### Create the user and the Database
- Start the mariadb-server
```bash
sudo systemctl start mariadb

```
- Login into the local server as root and create a new user _phpmail_
```bash 
sudo mariadb -u root -p -e "CREATE USER 'phpmail'@'localhost' IDENTIFIED BY 'mail';"
```
- Create the Database
```bash 
sudo mariadb -u root -p -e "CREATE DATABASE IF NOT EXISTS mail;"
```
- Give the right privilege into the new user 
```bash 
sudo mariadb -u root -p -e "GRANT ALL PRIVILEGES ON mail.* TO 'phpmail'@'localhost';"
```
```bash 
sudo mariadb -u root -p -e "FLUSH PRIVILEGES;"

```
- Move the source code into the `/var/www/htm/` directory
```bash
sudo rsync -a -v --exclude='.git' --exclude='README.md' ./ /var/www/html
```

- Launch the web server for example Apache2
```bash
sudo systemctl start apache2
```
- Finally type localhost in your web-browser

