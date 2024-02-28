### Commands shorthands

## Linux

$ sudo systemctl start mysql
$ sudo mysql -u root
$ mysql -u user_name -p

## MariaDB
MariaDB [(nonce)]>show databases;
MariaDB [(none)]>use mysql;
MariaDB [mysql]>show tables;
MariaDB [mysql]>CREATE USER 'emailAdmin'@'%' IDENTIFIED BY 'rootemail';
MariaDB [mysql]>GRANT ALL PRIVILEGES ON *.* TO 'emailAdmin'@'%';
MariaDB [mysql]>FLUSH PRIVILEGES;


### Credentials

Username : emailAdmin
Password : rootemail

- We will use those in Php MySQL connection
- Just example for this project but instructions
on how to create users will be taught here


### Database initialization

## MySQL service
- Start MySQL server :
$ sudo systemctl start mysql

- Stop MySQL Server :
$ sudo systemctl stop mysql

- Check MySQL Server :
$ sudo systemctl status mysql

## MariaDB DBMS Console

- Once the service started we can connect
to the console of MariaDB using CLI

$ sudo mysql -u root

# NOTE :
For the first instance we will use
the root user which explains super do here

- Now you should see MySQL console like
MariaDB [(none)]>

- Then we will choose database within
the MariaDB DBMS, of course we will use MySQL

MariaDB [(none)]> use mysql;

- There are many databases there, just do
MariaDB [(none)]>show databases;

## User Creation

- This will be the user we will use for
our database, let's create one 

MariaDB [mysql]>CREATE USER 'emailAdmin'@'%' IDENTIFIED BY 'rootemail';

# Explanations :

This command will create a MySQL User
named emailAdmi with the password rootemail

The '@' indicates from which IP Adress this user
aka database is accessible,
it could be localhost or 127.0.0.1
but as long as we want it to be accessible
everywhere since the credentials are right we assign
it to "%" which says all IP adress can access it


MariaDB [mysql]>GRANT ALL PRIVILEGES ON *.* TO 'emailAdmin'@'%';

# Explanations :

This command will grant all the privileges of that
user in all types of SQL querry aka CRUD operations


MariaDB [mysql]>FLUSH PRIVILEGES;

- This will reload the MySQL privileges database
so that parameter we set before is applied


## NOTES:

# Show all MySQL Users
SELECT User, Host FROM mysql.user;

# Delete a User
DROP USER 'emailAdmin'@'%';
Here the % is the scope

## That's you can now login with new user !!
