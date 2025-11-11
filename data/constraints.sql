ALTER TABLE gift_card
    ADD CONSTRAINT pk_gift_card_card_id PRIMARY KEY (card_id);

ALTER TABLE staff
    ADD CONSTRAINT pk_staff_staff_id PRIMARY KEY (staff_id), ON

UPDATE cascade;

ALTER TABLE language
    ADD CONSTRAINT pk_language_language_id PRIMARY KEY (language_id), ON

DELETE restrict, on
UPDATE CASCADE;

ALTER TABLE locker
    ADD CONSTRAINT pk_locker_locker_id PRIMARY KEY (locker_id), ON

DELETE restrict, on
UPDATE CASCADE;

ALTER TABLE room
    ADD CONSTRAINT pk_room_room_id PRIMARY KEY (room_id), ON

UPDATE cascade;

--

SET a TRIGGER FOR ON DELETE

ALTER TABLE image
    ADD CONSTRAINT pk_image_image_id PRIMARY KEY (image_id) ON UPDATE CASCADE;

ALTER TABLE `TRANSACTION`
    ADD CONSTRAINT pk_transaction_transaction_id PRIMARY KEY (transaction_id);

ALTER TABLE activity
    ADD CONSTRAINT pk_activity_activity_id PRIMARY KEY (activity_id), ON

UPDATE cascade;

--

SET a TRIGGER FOR ON DELETE

ALTER TABLE package
    ADD CONSTRAINT pk_package_package_id PRIMARY KEY (package_id), ON

UPDATE cascade;
-- CONNECTING TABLES ------------------------------------------------------------------------------
ALTER TABLE logger
    ADD CONSTRAINT pk_logger_log_id PRIMARY KEY (log_id),
    ADD CONSTRAINT fk_staff_id_on_logger FOREIGN KEY (staff_id) REFERENCES staff (staff_id);

ALTER TABLE membership
    ADD CONSTRAINT pk_membership_membership_id PRIMARY KEY (membership_id),
    ADD CONSTRAINT fk_locker_id_on_membership FOREIGN KEY (locker_id) REFERENCES locker (locker_id), ON

UPDATE cascade;

--

SET a TRIGGER FOR ON DELETE

ALTER TABLE user
    ADD CONSTRAINT pk_user_user_id PRIMARY KEY (user_id),
    ADD CONSTRAINT fk_language_id_on_user FOREIGN KEY (language_id) REFERENCES language (language_id),
    ADD CONSTRAINT fk_membership_id_on_user FOREIGN KEY (membership_id) REFERENCES membership (membership_id);

ALTER TABLE contains
    ADD CONSTRAINT pk_contains_package_id_activity_id PRIMARY KEY (package_id, activity_id),
    ADD CONSTRAINT fk_activity_id_on_contains FOREIGN KEY (activity_id) REFERENCES activity (activity_id),
    ADD CONSTRAINT fk_package_id_on_contains FOREIGN KEY (package_id) REFERENCES package (package_id);

ALTER TABLE information
    ADD CONSTRAINT pk_information_reference_id_language_id PRIMARY KEY (reference_id, language_id),
    ADD CONSTRAINT fk_language_id_on_information FOREIGN KEY (language_id) REFERENCES language (language_id);

ALTER TABLE price
    ADD CONSTRAINT pk_price_reference_id_ppl_num PRIMARY KEY (reference_id, ppl_num),
    ADD CONSTRAINT fk_reference_id_on_price FOREIGN KEY (reference_id) REFERENCES information (reference_id);

ALTER TABLE uses
    ADD CONSTRAINT pk_uses_image_id_reference_id PRIMARY KEY (image_id, reference_id),
    ADD CONSTRAINT fk_reference_id_on_uses FOREIGN KEY (reference_id) REFERENCES information (reference_id),
    ADD CONSTRAINT fk_image_id_on_uses FOREIGN KEY (image_id) REFERENCES image (image_id);

ALTER TABLE reservation
    ADD CONSTRAINT pk_reservation_reservation_id PRIMARY KEY (reservation_id),
    ADD CONSTRAINT fk_user_id_on_reservation FOREIGN KEY (user_id) REFERENCES user (user_id),
    ADD CONSTRAINT fk_transaction_id_on_reservation FOREIGN KEY (transaction_id) REFERENCES transaction (transaction_id),
    ADD CONSTRAINT fk_activity_id_on_reservation FOREIGN KEY (activity_id) REFERENCES activity (activity_id),
    ADD CONSTRAINT fk_package_id_on_reservation FOREIGN KEY (package_id) REFERENCES package (package_id);

ALTER TABLE reserved
    ADD CONSTRAINT pk_reserved_reservation_id_room_id PRIMARY KEY (reservation_id, room_id),
    ADD CONSTRAINT fk_reservation_id_on_reserved FOREIGN KEY (reservation_id) REFERENCES reservation (reservation_id),
    ADD CONSTRAINT fk_room_id_on_reserved FOREIGN KEY (room_id) REFERENCES room (room_id);
