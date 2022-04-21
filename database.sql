CREATE DATABASE IF NOT EXISTS `e-shop`;

CREATE TABLE product (
    -> id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    -> title VARCHAR(200) NOT NULL, 
    -> description TEXT NOT NULL,
    -> price INT NOT NULL,
    -> illustration VARCHAR(255) NOT NULL);

INSERT INTO product (title, description, price, illustration) VALUES ('Polo', 'Picqué', 120, 'http://placeholder.com');