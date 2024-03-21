
DELIMITER //

CREATE TRIGGER insert_contact AFTER INSERT ON message
FOR EACH ROW
BEGIN
    INSERT INTO contact (Email_propriate, Email_contact) VALUES (NEW.Email_user, NEW.Email_destination);
END;
//

DELIMITER ;
