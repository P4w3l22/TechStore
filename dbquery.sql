CREATE TABLE clients (
    client_id INT AUTO_INCREMENT,
    name CHAR(64),
    second_name CHAR(64),
    address CHAR,
    phone_number INT,
    email TEXT,
    date DATE
);

CREATE TABLE products (
    prod_id INT AUTO_INCREMENT,
    title CHAR(255),
    description TEXT,
    picture TEXT,
    price DECIMAL,
    amount INT,
    specification TEXT
);

CREATE TABLE opinions (
    prod_id INT,
    opinion TEXT,
    rate ENUM('1', '2', '3', '4', '5'),
    client_id INT
);

CREATE TABLE orders (
    client_id INT,
    order_id INT,
    date DATE
);

CREATE TABLE orderElements (
    order_id INT,
    prod_id INT,
    amount INT
);