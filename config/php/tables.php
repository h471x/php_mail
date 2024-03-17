<?php 
  $user = "
  CREATE TABLE IF NOT EXISTS user (
    user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    firstName VARCHAR(60),
    mail VARCHAR(100) NOT NULL,
    password VARCHAR(20) NOT NULL);
  ";

  $user_table = "
  CREATE TABLE IF NOT EXISTS user (
    email_user VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
    name_user VARCHAR(255) NOT NULL,
    firstname_user VARCHAR(255) NULL,
    password VARCHAR(255) NOT NULL,
    date_inscription DATE NOT NULL);
  ";

  $message_table = "
  CREATE TABLE IF NOT EXISTS message (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    email_destination VARCHAR(255) NULL,
    objet VARCHAR(255) NOT NULL,
    contenu TEXT NULL,  
    email_user VARCHAR(255) NOT NULL,
    FOREIGN KEY (email_user) REFERENCES user(email_user));
  ";

  $contact_table = "
  CREATE TABLE IF NOT EXISTS contact (
    email_propriate VARCHAR(255) NOT NULL, 
    email_contact VARCHAR(255) NOT NULL,
    PRIMARY KEY (email_propriate, email_contact));
  ";
?>