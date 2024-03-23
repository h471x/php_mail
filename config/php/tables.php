<?php 
  // $user = "
  // CREATE TABLE IF NOT EXISTS user (
  //   user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  //   name VARCHAR(50),
  //   firstName VARCHAR(60),
  //   mail VARCHAR(100) NOT NULL,
  //   password VARCHAR(20) NOT NULL);
  // ";

  $user_table = "
  CREATE TABLE IF NOT EXISTS user (
    email_user VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
    fullname_user VARCHAR(255) NOT NULL,
    username_user VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    2fa_password VARCHAR(16) NOT NULL,
    inscription_date DATE NOT NULL);
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
//Create trigger for contact 
//WARNING :"DELIMITER IS IMPORTANT"

  $insert_contact_auto="DELIMITER //

    CREATE TRIGGER insert_contact AFTER INSERT ON message
    FOR EACH ROW
    BEGIN
        INSERT INTO contact (Email_propriate, Email_contact) VALUES (NEW.Email_user, NEW.Email_destination);
    END;
    //

    DELIMITER ;";
?>
