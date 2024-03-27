<?php 
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
    send_date DATE NOT NULL,
    send_time TIME NOT NULL,
    was_read TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (email_user) REFERENCES user(email_user));
  ";

  $contact_table = "
  CREATE TABLE IF NOT EXISTS contact (
    id_contact INT AUTO_INCREMENT PRIMARY KEY,
    email_primary VARCHAR(255) NOT NULL, 
    email_contact VARCHAR(255) NOT NULL);
  ";

  $contact_trigger = "
  CREATE OR REPLACE TRIGGER insert_contact
  AFTER INSERT ON message
  FOR EACH ROW
  BEGIN
    IF NEW.email_destination != NEW.email_user THEN
      IF NOT EXISTS (
        SELECT * FROM contact
        WHERE email_primary = NEW.email_user
        AND email_contact = NEW.email_destination
      ) THEN
        INSERT INTO contact (email_primary, email_contact)
        VALUES (NEW.email_user, NEW.email_destination);
      END IF;
    END IF;
  END;
  ";
?>