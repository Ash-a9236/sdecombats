
DELIMITER
    CREATE TRIGGER on_delete_staff_update


DELIMITER

CREATE TRIGGER set_foreign_key_to_000 
    BEFORE DELETE ON USER 
    FOR EACH ROW BEGIN
        UPDATE TRANSACTION
            SET user_id = 204 -- no content error : The server successfully processed the request, and is not returning any content : the user is not deleted
            WHERE user_id = OLD.user_id;
END 

DELIMITER;





