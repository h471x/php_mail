CREATE DATABASE IF NOT EXISTS mail;
use mail;

CREATE TABLE IF NOT EXISTS user (
  email_user VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
  fullname_user VARCHAR(255) NOT NULL,
  username_user VARCHAR(255) NOT NULL UNIQUE,
  user_password VARCHAR(255) NOT NULL,
  2fa_password VARCHAR(16) NOT NULL,
  inscription_date DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS message (
  id_message INT AUTO_INCREMENT PRIMARY KEY,
  email_destination VARCHAR(255) NULL,
  objet VARCHAR(255) NOT NULL,
  contenu TEXT NULL,
  send_date DATE NOT NULL,
  send_time TIME NOT NULL,
  was_read TINYINT(1) NOT NULL DEFAULT 0,
   email_user VARCHAR(255) NOT NULL,
   CONSTRAINT fk_message_user FOREIGN KEY (email_user) REFERENCES user(email_user)
  );

CREATE TABLE IF NOT EXISTS contact (
  id_contact INT AUTO_INCREMENT PRIMARY KEY,
  email_propriate VARCHAR(255) NOT NULL, 
  email_contact VARCHAR(255) NOT NULL,
  CONSTRAINT fk_email_contact FOREIGN KEY (email_contact) REFERENCES user(email_user),
  CONSTRAINT fk_email_propriate FOREIGN KEY (email_propriate) REFERENCES user(email_user)
);

CREATE OR REPLACE TRIGGER insert_contact
AFTER INSERT ON message
FOR EACH ROW
BEGIN
  IF NOT EXISTS (SELECT * FROM contact
    WHERE Email_propriate = NEW.Email_user
    AND Email_contact = NEW.Email_destination) THEN
    INSERT INTO contact (Email_propriate, Email_contact)
    VALUES (NEW.Email_user, NEW.Email_destination);
  END IF;
END;
