
CREATE DATABASE IF NOT EXISTS SDC_DB;

CREATE TABLE IF NOT EXISTS STAFF (
    staff_id INT NOT NULL,
    name VARCHAR(75) NOT NULL,
    level ENUM('EMPLOYEE', 'MANAGER', 'ADMIN') NOT NULL, /*corresponds to (1, 2, 3)*/
    password VARCHAR(30) NOT NULL DEFAULT 'Hello123', /*check if 'NN default' will work */
);

CREATE TABLE IF NOT EXISTS LANGUAGE (
    language_id VARCHAR(15) NOT NULL,
    abreviation VARCHAR(3),
);

CREATE TABLE IF NOT EXISTS LOCKER (
    locker_id INT NOT NULL,
    name VARCHAR(150) DEFAULT 'UNASSIGNED',
);

CREATE TABLE IF NOT EXISTS COMBO (
    combo_id INT NOT NULL,
);

CREATE TABLE IF NOT EXISTS MEMBERSHIP (
    memebrship_id INT NOT NULL,
    locker_id INT NOT NULL,
    bow_rental BOOLEAN DEFAULT FALSE,
    start DATE DEFAULT (CURRENT_DATE()),
    end DATE DEFAULT (CURRENT_DATE() + INTERVAL 1 MONTH), /*default membership = 1 month*/
);

CREATE TABLE IF NOT EXISTS USER (
    user_id INT NOT NULL,
    language_id VARCHAR(15) NOT NULL,
    membership_id INT,
    fname VARCHAR(75),
    lname VARCHAR(75),
    email VARCHAR(150),
    phone VARCHAR(20),
    password VARCHAR(30) NOT NULL DEFAULT 'Hello123',
    /*check if 'NN default' will work */
);

CREATE TABLE IF NOT EXISTS ACTIVITY (
    activity_id VARCHAR(5) NOT NULL,
    name VARCHAR(50) UNIQUE,
    price DECIMAL(6, 2),
    /*max amount on an activity = $9999.99*/
    time INT NOT NULL,
    /*in minutes*/
);

CREATE TABLE IF NOT EXISTS INFORMATION (
    activity_id VARCHAR(5) NOT NULL,
    language_id VARCHAR(15) NOT NULL,
    alt_name VARCHAR(50) UNIQUE,
    small_description VARCHAR,
    full_description VARCHAR,
);
CREATE TABLE IF NOT EXISTS GIFT_CARD (
    card_id BIGINT NOT NULL,
    activity_id VARCHAR(5),
    amount_of_people INT DEFAULT 0,
    price DECIMAL(5, 2),
    /*max amount on a card = $999.99*/
);

CREATE TABLE IF NOT EXISTS ROOM (
    room_id VARCHAR(15) NOT NULL,
    activity_id VARCHAR(5) NOT NULL,
    available_places INT NOT NULL,
);

CREATE TABLE IF NOT EXISTS IMAGE (
    image_id VARCHAR(15) NOT NULL,
    /*set id = [activity id]_[IMG TYPE (i.e. logo)]_[5 numbers]*/
    image_data MEDIUMBLOB,
    /*IMG up to 16MB*/
);

CREATE TABLE IF NOT EXISTS USES (
    image_id VARCHAR(15) NOT NULL,
    activity_id VARCHAR(5) NOT NULL,
);

CREATE TABLE IF NOT EXISTS TRANSACTION (
    transaction_id INT NOT NULL,
    paid BOOLEAN DEFAULT FALSE,
    amount DECIMAL(5, 2),
    type ENUM (
        'CASH',
        'DEBIT',
        'CREDIT',
        'CREDIT - MASTERCARD',
        'CREDIT - VISA',
        'CREDIT - AMEX',
        'OTHER'
    ),
);

CREATE TABLE IF NOT EXISTS RESERVATION (
    reservation_id INT NOT NULL,
    user_id INT NOT NULL,
    transaction_id INT NOT NULL,
    activity_id VARCHAR(5) NOT NULL,
    combo_id INT NOT NULL DEFAULT 0, /*for all the combo = 0 = not a combo*/
    start DATE,
    end DATE,
    num_of_users SMALLINT DEFAULT 1,
);

CREATE TABLE IF NOT EXISTS RESERVED (
    reservation_id INT NOT NULL,
    room_id VARCHAR(15) NOT NULL,
    places_taken SMALLINT,
);

CREATE TABLE IF NOT EXISTS LOGGER (
    log_id INT NOT NULL,
    staff_id INT NOT NULL DEFAULT 418,
    operation VARCHAR NOT NULL,
    log_time DATE DEFAULT (CURRENT_DATE()),
);

/*
 
 -- Insert the reservation with the calculated end time
 INSERT INTO reservations (user_id, activity_id, start_time, end_time)
 VALUES (
 @user_id, 
 @activity_id, 
 @start_time, 
 DATE_ADD(@start_time, INTERVAL (SELECT duration FROM activities WHERE activity_id = @activity_id) MINUTE)
 );
 
 */