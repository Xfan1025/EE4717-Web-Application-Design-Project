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

CREATE TABLE menu (
    product_id INT NOT NULL,
    product_name VARCHAR(50),
    product_price FLOAT,
    product_cat VARCHAR(20),
    CONSTRAINT menu_PK PRIMARY KEY (product_id)
);

INSERT INTO menu VALUES
    (0, "Sliced Beef with Black Pepper Sauce", 20, "meat"),
    (1, "Double Cooked Pork with Chinese Leek", 16, "meat"),
    (2, "Spicy Chicken", 18, "meat"),
    (3, "Fish Filets in Hot Chili Oil", 22, "meat"),
    (4, "Egg Plant with Minced Chicken and Sichuan Chilli Sauce", 10, "vege"),
    (5, "Lettuce in Oyster Sauce", 8, "vege"),
    (6, "Bai Mu Dan White Peony Tea", 5, "drink"),
    (7, "Oolong Tea", 4.5, "drink"),
    (8, "Sweet-sour Plum Juice", 3.5, "drink"),
    (9, "Traditional Chinese Liquor", 11, "drink");