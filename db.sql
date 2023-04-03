



-- Create the user table
CREATE TABLE users (
  email VARCHAR(255) PRIMARY KEY,
  password VARCHAR(255)NOT NULL,
  name VARCHAR(255),
  role ENUM('admin', 'customer') DEFAULT 'customer'
);

-- Create the meal table
CREATE TABLE meals (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  description TEXT,
  price DECIMAL(10,2)
);


---WAAAAAAA

-- Create the order table
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
