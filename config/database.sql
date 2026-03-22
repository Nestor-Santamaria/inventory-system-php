CREATE DATABASE inventario;

USE inventario;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    stock INT,
    price DECIMAL(10,2)
);

-- Insertar datos de prueba

INSERT INTO users (email, password) VALUES 
('admin@test.com', '$2y$10$wH8Qx9V0c2jX3Xb8mC8lUuXkFz9uQeJm9G7Q1YwPp6vYwZk8m9Q2G');

INSERT INTO products (name, stock, price) VALUES
('Laptop Lenovo ThinkPad', 10, 850.00),
('Mouse Logitech Wireless', 3, 25.50),
('Teclado Mecánico Corsair', 7, 120.00),
('Monitor Dell 24"', 2, 200.00),
('Impresora HP LaserJet', 5, 150.00);