/* Database SQL record */
CREATE TABLE reserve (
    rsv_id INT NOT NULL AUTO_INCREMENT,
    rsv_salulation CHAR(3),
    rsv_name VARCHAR(30),
    rsv_phone VARCHAR(15),
    rsv_email VARCHAR(30),
    rsv_date DATE,
    rsv_time VARCHAR(10),
    rsv_pax INT(1),
    rsv_comment VARCHAR(100),
    CONSTRAINT reserve_PK PRIMARY KEY (rsv_id)
);

CREATE TABLE contact (
    ctt_id INT NOT NULL AUTO_INCREMENT,
    ctt_salulation CHAR(3),
    ctt_name VARCHAR(30),
    ctt_email VARCHAR(30),
    ctt_comment VARCHAR(100),
    CONSTRAINT contact_PK PRIMARY KEY (ctt_id)
);

CREATE TABLE users (
    user_id INT NOT NULL AUTO_INCREMENT,
    user_firstName VARCHAR(20),
    user_lastName VARCHAR(20),
    user_email VARCHAR(30) UNIQUE,
    user_password VARCHAR(50),
    CONSTRAINT users_PK PRIMARY KEY (user_id)
);