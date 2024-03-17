CREATE DATABASE IF NOT EXISTS mail;
use mail;

-- CREATE TABLE IF NOT EXISTS user (
--   user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
--   name VARCHAR(50) NOT NULL,
--   firstName VARCHAR(60),
--   mail VARCHAR(100) NOT NULL,
--   password VARCHAR(20) NOT NULL
-- );

CREATE TABLE IF NOT EXISTS user(
  Email_user VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
  Name_user VARCHAR(255) NOT NULL,
  Firstname_user VARCHAR(255) NULL,
  Password VARCHAR(255) NOT NULL ,
  Date_inscription DATE NOT NULL 
);

CREATE TABLE IF NOT EXISTS message (
  Id_message SERIAL PRIMARY KEY,
  Email_destination VARCHAR(255) NULL,
  Objet VARCHAR(255) NOT NULL,
  Contenu TEXT NULL,  
  Email_user VARCHAR(255) NOT NULL ,
  FOREIGN KEY(Email_user) REFERENCES user(Email_user)
);

CREATE TABLE IF NOT EXISTS contact (
  Email_propriate VARCHAR(255) NOT NULL, 
  Email_contact VARCHAR(255) NOT NULL 
);
