CREATE TRIGGER insert_contact 
AFTER INSERT 
ON message
FOR EACH ROW
BEGIN 
  INSERT INTO contact (email_propriate, email_contact )
  VALUES (NEW.email_user,  NEW.email_destination);
END;
