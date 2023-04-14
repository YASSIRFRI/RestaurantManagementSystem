DROP DATABASE IF EXISTS restaurantProject;
CREATE Database restaurantProject;
use restaurantProject;
CREATE TABLE users (
  email VARCHAR(255) PRIMARY KEY,
  password VARCHAR(255)NOT NULL,
  role ENUM('admin', 'customer') DEFAULT 'customer'
);
CREATE TABLE meals (
  meal_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  description TEXT,
  price float NOT NULL, 
);
CREATE TABLE orders (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_email VARCHAR(255),
  meal_id INT,
  status ENUM('pending', 'processing', 'delivering', 'delivered') DEFAULT 'pending',
  delivery_date DATE,
  FOREIGN KEY (user_email) REFERENCES users(email),
);
CREATE TABLE Order_meals (
  order_id INT,
  meal_id INT,
  PRIMARY KEY (order_id, meal_id),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (meal_id) REFERENCES meals(id)
);

ALTER TABLE `orders` ADD `total_price` DECIMAL(5) NOT NULL DEFAULT '0' AFTER `status`;
