ALTER TABLE GIFT_CARD
ADD CONSTRAINT pk_gift_card_card_id PRIMARY KEY (card_id);
ALTER TABLE STAFF
ADD CONSTRAINT pk_staff_staff_id PRIMARY KEY (staff_id),
    ON UPDATE CASCADE;
ALTER TABLE LANGUAGE
ADD CONSTRAINT pk_language_language_id PRIMARY KEY (language_id),
    ON DELETE RESTRICT,
    ON UPDATE CASCADE;
ALTER TABLE LOCKER
ADD CONSTRAINT pk_locker_locker_id PRIMARY KEY (locker_id),
    ON DELETE RESTRICT,
    ON UPDATE CASCADE;
ALTER TABLE ROOM
ADD CONSTRAINT pk_room_room_id PRIMARY KEY (room_id),
    ON UPDATE CASCADE;
--SET A TRIGGER FOR ON DELETE
ALTER TABLE IMAGE
ADD CONSTRAINT pk_image_image_id PRIMARY KEY (image_id) ON UPDATE CASCADE;
ALTER TABLE `TRANSACTION`
ADD CONSTRAINT pk_transaction_transaction_id PRIMARY KEY (transaction_id);
ALTER TABLE ACTIVITY
ADD CONSTRAINT pk_activity_activity_id PRIMARY KEY (activity_id),
    ON UPDATE CASCADE;
--SET A TRIGGER FOR ON DELETE
ALTER TABLE PACKAGE
ADD CONSTRAINT pk_package_package_id PRIMARY KEY (package_id),
    ON UPDATE CASCADE;
-- CONNECTING TABLES ------------------------------------------------------------------------------
ALTER TABLE LOGGER
ADD CONSTRAINT pk_logger_log_id PRIMARY KEY (log_id),
    ADD CONSTRAINT fk_staff_id_on_logger FOREIGN KEY (staff_id) REFERENCES STAFF(staff_id);
ALTER TABLE MEMBERSHIP
ADD CONSTRAINT pk_membership_membership_id PRIMARY KEY (membership_id),
    ADD CONSTRAINT fk_locker_id_on_membership FOREIGN KEY (locker_id) REFERENCES LOCKER(locker_id),
    ON UPDATE CASCADE;
--SET A TRIGGER FOR ON DELETE
ALTER TABLE USER
ADD CONSTRAINT pk_user_user_id PRIMARY KEY (user_id),
    ADD CONSTRAINT fk_language_id_on_user FOREIGN KEY (language_id) REFERENCES LANGUAGE(language_id),
    ADD CONSTRAINT fk_membership_id_on_user FOREIGN KEY (membership_id) REFERENCES MEMBERSHIP(membership_id);
ALTER TABLE CONTAINS
ADD CONSTRAINT pk_contains_package_id_activity_id PRIMARY KEY (package_id, activity_id),
    ADD CONSTRAINT fk_activity_id_on_contains FOREIGN KEY (activity_id) REFERENCES ACTIVITY(activity_id),
    ADD CONSTRAINT fk_package_id_on_contains FOREIGN KEY (package_id) REFERENCES PACKAGE(package_id);
ALTER TABLE INFORMATION
ADD CONSTRAINT pk_information_reference_id_language_id PRIMARY KEY (reference_id, language_id),
    ADD CONSTRAINT fk_language_id_on_information FOREIGN KEY (language_id) REFERENCES LANGUAGE(language_id);
ALTER TABLE PRICE
ADD CONSTRAINT pk_price_reference_id_ppl_num PRIMARY KEY (reference_id, ppl_num),
    ADD CONSTRAINT fk_reference_id_on_price FOREIGN KEY (reference_id) REFERENCES INFORMATION(reference_id);
ALTER TABLE USES
ADD CONSTRAINT pk_uses_image_id_reference_id PRIMARY KEY (image_id, reference_id),
    ADD CONSTRAINT fk_reference_id_on_uses FOREIGN KEY (reference_id) REFERENCES INFORMATION(reference_id),
    ADD CONSTRAINT fk_image_id_on_uses FOREIGN KEY (image_id) REFERENCES IMAGE(image_id);
ALTER TABLE RESERVATION
ADD CONSTRAINT pk_reservation_reservation_id PRIMARY KEY (reservation_id),
    ADD CONSTRAINT fk_user_id_on_reservation FOREIGN KEY (user_id) REFERENCES USER(user_id),
    ADD CONSTRAINT fk_transaction_id_on_reservation FOREIGN KEY (transaction_id) REFERENCES TRANSACTION(transaction_id),
    ADD CONSTRAINT fk_activity_id_on_reservation FOREIGN KEY (activity_id) REFERENCES ACTIVITY(activity_id),
    ADD CONSTRAINT fk_package_id_on_reservation FOREIGN KEY (package_id) REFERENCES PACKAGE(package_id);
ALTER TABLE RESERVED
ADD CONSTRAINT pk_reserved_reservation_id_room_id PRIMARY KEY (reservation_id, room_id),
    ADD CONSTRAINT fk_reservation_id_on_reserved FOREIGN KEY (reservation_id) REFERENCES RESERVATION(reservation_id),
    ADD CONSTRAINT fk_room_id_on_reserved FOREIGN KEY (room_id) REFERENCES ROOM(room_id);