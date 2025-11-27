-- CREATING DATABASE ------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS sdc_db;

USE sdc_db;

-- STAND ALONE TABLES -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS gift_card (
    card_id INT NOT NULL AUTO_INCREMENT,
    `for`   VARCHAR(100),
    price   DECIMAL(5, 2)
    /*max amount on a card = $999.99*/
);

CREATE TABLE IF NOT EXISTS staff (
    staff_id INT                                     NOT NULL,
    name     VARCHAR(75)                             NOT NULL,
    level    ENUM ( 'EMPLOYEE', 'MANAGER', 'ADMIN' ) NOT NULL,
    password VARCHAR(30)                             NOT NULL DEFAULT 'Hello123'
);

CREATE TABLE IF NOT EXISTS language (
    language_id  VARCHAR(15) NOT NULL,
    abbreviation VARCHAR(3)
);

CREATE TABLE IF NOT EXISTS locker (
    locker_id INT NOT NULL,
    type      ENUM ( 'SMALL', 'MEDIUM', 'BIG' ),
    name      VARCHAR(75) DEFAULT 'UNASSIGNED'
);

CREATE TABLE IF NOT EXISTS room (
    room_id          VARCHAR(15) NOT NULL,
    available_places INT         NOT NULL
);

CREATE TABLE IF NOT EXISTS image (
    image_id   VARCHAR(18) NOT NULL,
    image_data MEDIUMBLOB
);

CREATE TABLE IF NOT EXISTS transactions (
    transaction_id INT NOT NULL AUTO_INCREMENT,
    paid           BOOLEAN DEFAULT FALSE,
    amount         DECIMAL(5, 2),
    type           ENUM ( 'CASH', 'DEBIT', 'CREDIT', 'CREDIT - MASTERCARD', 'CREDIT - VISA', 'CREDIT - AMEX', 'CHEQUE', 'OTHER' )
);

CREATE TABLE IF NOT EXISTS activity (
    activity_id VARCHAR(6)  NOT NULL,
    room_id     VARCHAR(15) NOT NULL,
    name        VARCHAR(30) UNIQUE,
    duration    INT         NOT NULL
);

CREATE TABLE IF NOT EXISTS package (
    package_id VARCHAR(7) NOT NULL,
    category   ENUM ( 'NOT A PACKAGE', 'INDIVIDUAL', 'SMALL GROUP', 'BIG GROUP', 'DATE NIGHT', 'KIDS BIRTHDAY', 'TEEN BIRTHDAY', 'CORPORATE EVENT', 'OUTSIDE EVENT', 'OTHER' ),
    name       VARCHAR(40) UNIQUE
);

-- CONNECTING TABLES ------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS logger (
    log_id    INT          NOT NULL AUTO_INCREMENT,
    staff_id  INT          NOT NULL DEFAULT 418,
    operation VARCHAR(100) NOT NULL,
    log_time  DATE                  DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS membership (
    membership_id INT NOT NULL AUTO_INCREMENT,
    locker_id     INT,
    bow_rental    BOOLEAN DEFAULT FALSE,
    start         DATE    DEFAULT CURRENT_DATE,
    end           DATE    DEFAULT (CURRENT_DATE + INTERVAL 1 MONTH)
);

CREATE TABLE IF NOT EXISTS users (
    user_id       INT         NOT NULL AUTO_INCREMENT,
    language_id   VARCHAR(15) NOT NULL,
    membership_id INT,
    fname         VARCHAR(75),
    lname         VARCHAR(75),
    email         VARCHAR(75),
    phone         VARCHAR(20),
    password      VARCHAR(30) NOT NULL DEFAULT 'Hello123'
);

CREATE TABLE IF NOT EXISTS contains (
    package_id  VARCHAR(7) NOT NULL,
    activity_id VARCHAR(6) NOT NULL
);

CREATE TABLE IF NOT EXISTS information (
    reference_id      VARCHAR(7)  NOT NULL,
    language_id       VARCHAR(15) NOT NULL,
    reference_type    ENUM ( 'ACTIVITY', 'PACKAGE' ),
    alt_name          VARCHAR(50) UNIQUE,
    small_description VARCHAR(500),
    full_description  VARCHAR(2000)
);

CREATE TABLE IF NOT EXISTS price (
    reference_id VARCHAR(7) NOT NULL,
    ppl_num      INT        NOT NULL,
    price        DECIMAL(5, 2)
);

CREATE TABLE IF NOT EXISTS uses (
    image_id     VARCHAR(15) NOT NULL,
    reference_id VARCHAR(7)  NOT NULL
);

CREATE TABLE IF NOT EXISTS reservation (
    reservation_id INT        NOT NULL,
    user_id        INT        NOT NULL,
    transaction_id INT        NOT NULL,
    activity_id    VARCHAR(6) NOT NULL,
    package_id     INT        NOT NULL,
    start          DATE,
    end            DATE,
    num_of_users   SMALLINT DEFAULT 1
);

CREATE TABLE IF NOT EXISTS reserved (
    reservation_id INT         NOT NULL,
    room_id        VARCHAR(15) NOT NULL,
    places_taken   SMALLINT
);
