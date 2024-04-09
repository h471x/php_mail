<?php 
  $user_table = "
  CREATE TABLE IF NOT EXISTS user (
    email_user VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,
    fullname_user VARCHAR(255) NOT NULL,
    username_user VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    2fa_password VARCHAR(16) NOT NULL,
    inscription_date DATE NOT NULL
  );
  ";

  $message_table = "
  CREATE TABLE IF NOT EXISTS message (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    email_destination_username VARCHAR(255) NULL,
    email_destination VARCHAR(255) NULL,
    objet VARCHAR(255) NOT NULL,
    contenu TEXT NULL,
    send_date DATE NOT NULL,
    send_time VARCHAR(5) NOT NULL,
    was_read TINYINT(1) NOT NULL DEFAULT 0,
    email_user VARCHAR(255) NOT NULL,
    CONSTRAINT fk_message_user FOREIGN KEY (email_user) REFERENCES user(email_user)
  );
  ";

  $contact_table = "
  CREATE TABLE IF NOT EXISTS contact (
    email_propriate VARCHAR(255) NOT NULL,
    email_contact VARCHAR(255) NOT NULL,
    CONSTRAINT fk_email_contact FOREIGN KEY (email_contact) REFERENCES user(email_user),
    CONSTRAINT fk_email_propriate FOREIGN KEY (email_propriate) REFERENCES user(email_user)
  );
  ";

  $contact_trigger = "
  CREATE OR REPLACE TRIGGER insert_contact
  AFTER INSERT ON message
  FOR EACH ROW
  BEGIN
    IF NEW.email_destination != NEW.email_user THEN
      IF NOT EXISTS (
        SELECT * FROM contact
        WHERE email_propriate = NEW.email_user
        AND email_contact = NEW.email_destination
      ) THEN
        INSERT INTO contact (email_propriate, email_contact)
        VALUES (NEW.email_user, NEW.email_destination);
      END IF;
    END IF;
  END;
  ";
?>