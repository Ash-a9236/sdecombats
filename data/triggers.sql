DELIMITER

CREATE TRIGGER on_delete_staff_update DELIMITER

CREATE TRIGGER set_foreign_key_to_000
    BEFORE DELETE
    ON user
    FOR EACH ROW
BEGIN
    UPDATE transaction
    SET user_id = 204 -- no content error : The server successfully processed the request, and is not returning any content : the user is not deleted
        WHERE user_id = old.user_id;
END DELIMITER;


CREATE TRIGGER staff_onUpdate_staff_id
    {BEFORE | AFTER} {INSERT | UPDATE | DELETE}
                               ON table_name FOR EACH ROW
BEGIN
    -- SQL statements
END;


DELIMITER
CREATE TRIGGER staff_onUpdate_staff_id
    AFTER UPDATE
        ON staff
        FOR EACH ROW
BEGIN
    -- SQL statements
END;
DELIMITER;





