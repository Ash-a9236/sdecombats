-- CREATING DATABASE ------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS SDC_DB;
USE SDC_DB;
-- STAND ALONE TABLES -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS GIFT_CARD (
    card_id INT NOT NULL AUTO_INCREMENT,
    for VARCHAR(100),
    price DECIMAL(5, 2)
    /*max amount on a card = $999.99*/
);
CREATE TABLE IF NOT EXISTS STAFF (
    staff_id INT NOT NULL,
    name VARCHAR(75) NOT NULL,
    level ENUM(
        'EMPLOYEE',
        'MANAGER',
        'ADMIN' 
    ) NOT NULL,
    password VARCHAR(30) NOT NULL DEFAULT 'Hello123'
);
CREATE TABLE IF NOT EXISTS LANGUAGE (
    language_id VARCHAR(15) NOT NULL,
    abreviation VARCHAR(3)
);
CREATE TABLE IF NOT EXISTS LOCKER (
    locker_id INT NOT NULL,
    type ENUM (
        'SMALL',
        'MEDIUM',
        'BIG'
    ),
    name VARCHAR(75) DEFAULT 'UNASSIGNED'
);
CREATE TABLE IF NOT EXISTS ROOM (
    room_id VARCHAR(15) NOT NULL,
    available_places INT NOT NULL
);
CREATE TABLE IF NOT EXISTS IMAGE (
    image_id VARCHAR(15) NOT NULL,
    /*set id = [activity id]_[IMG TYPE (i.e. logo)]_[5 numbers]*/
    image_data MEDIUMBLOB
    /*IMG up to 16MB*/
);
CREATE TABLE IF NOT EXISTS `TRANSACTION` (
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
        'CHEQUE',
        'OTHER'
    )
);
CREATE TABLE IF NOT EXISTS ACTIVITY (
    activity_id VARCHAR(6) NOT NULL,
    name VARCHAR(50) UNIQUE,
    duration INT NOT NULL
);
CREATE TABLE IF NOT EXISTS PACKAGE (
    package_id VARCHAR(7) NOT NULL,
    category ENUM (
        'NOT A PACKAGE',
        'INDIVIDUAL',
        'SMALL GROUP',
        'BIG GROUP',
        'DATE NIGHT',
        'KIDS BIRTHDAY',
        'TEEN BIRTHDAY',
        'CORPORATE EVENT',
        'OUTSIDE EVENT',
        'OTHER'
    ),
    name VARCHAR(40)
);
-- CONNECTING TABLES ------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS LOGGER (
    log_id INT NOT NULL AUTO_INCREMENT,
    staff_id INT NOT NULL DEFAULT 418,
    operation VARCHAR(100) NOT NULL,
    log_time DATE DEFAULT CURRENT_DATE
);
CREATE TABLE IF NOT EXISTS MEMBERSHIP (
    membership_id INT NOT NULL AUTO_INCREMENT,
    locker_id INT,
    bow_rental BOOLEAN DEFAULT FALSE,
    start DATE DEFAULT CURRENT_DATE,
end DATE DEFAULT (CURRENT_DATE + INTERVAL 1 MONTH)
);
CREATE TABLE IF NOT EXISTS USER (
    user_id INT NOT NULL AUTO_INCREMENT,
    language_id VARCHAR(15) NOT NULL,
    membership_id INT,
    fname VARCHAR(75),
    lname VARCHAR(75),
    email VARCHAR(75),
    phone VARCHAR(20),
    password VARCHAR(30) NOT NULL DEFAULT 'Hello123'
);
CREATE TABLE IF NOT EXISTS CONTAINS (
    package_id VARCHAR(7) NOT NULL,
    activity_id VARCHAR(6) NOT NULL
);
CREATE TABLE IF NOT EXISTS INFORMATION (
    reference_id VARCHAR(7) NOT NULL,
    language_id VARCHAR(15) NOT NULL,
    reference_type ENUM ('ACTIVITY', 'PACKAGE'),
    alt_name VARCHAR(50) UNIQUE,
    small_description VARCHAR(500),
    full_description VARCHAR(2000)
);
CREATE TABLE IF NOT EXISTS PRICE (
    reference_id VARCHAR(7) NOT NULL,
    ppl_num INT NOT NULL,
    price DECIMAL(5, 2)
);
CREATE TABLE IF NOT EXISTS USES (
    image_id VARCHAR(15) NOT NULL,
    reference_id VARCHAR(7) NOT NULL
);
CREATE TABLE IF NOT EXISTS RESERVATION (
    reservation_id INT NOT NULL,
    user_id INT NOT NULL,
    transaction_id INT NOT NULL,
    activity_id VARCHAR(6) NOT NULL,
    package_id INT NOT NULL,
    start DATE,
end DATE,
num_of_users SMALLINT DEFAULT 1
);
CREATE TABLE IF NOT EXISTS RESERVED (
    reservation_id INT NOT NULL,
    room_id VARCHAR(15) NOT NULL,
    places_taken SMALLINT
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