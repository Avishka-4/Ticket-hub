-- TicketHub Database Schema (Legacy-compatible, no JSON; uses TEXT)
-- Compatible with older MariaDB/MySQL

CREATE DATABASE IF NOT EXISTS tickethub;
USE tickethub;

-- Users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  phone VARCHAR(20),
  password VARCHAR(255) NOT NULL,
  date_of_birth DATE,
  gender ENUM('male','female','other','prefer_not_to_say'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bookings
CREATE TABLE IF NOT EXISTS bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NULL,
  booking_type ENUM('event','movie','sports','leisure','food','tour') NOT NULL,
  item_id INT NULL,
  booking_reference VARCHAR(50) UNIQUE,
  booking_date DATE NOT NULL,
  booking_time TIME NULL,
  seats INT NOT NULL DEFAULT 1,
  total_price DECIMAL(10,2) NOT NULL DEFAULT 0,
  selected_seats TEXT NULL,
  status ENUM('pending','confirmed','cancelled','completed') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_bookings_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Events
CREATE TABLE IF NOT EXISTS events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  category ENUM('concerts','festivals','comedy','theater') NOT NULL,
  description TEXT,
  venue VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(500),
  status ENUM('active','inactive','sold_out') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Movies
CREATE TABLE IF NOT EXISTS movies (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  genre VARCHAR(100) NOT NULL,
  duration INT NOT NULL,
  rating VARCHAR(10),
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(500),
  status ENUM('active','inactive') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sports
CREATE TABLE IF NOT EXISTS sports_events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  sport_type ENUM('football','cricket','basketball','tennis','baseball') NOT NULL,
  home_team VARCHAR(100),
  away_team VARCHAR(100),
  venue VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(500),
  status ENUM('active','inactive') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Leisure
CREATE TABLE IF NOT EXISTS leisure_activities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  category ENUM('water','adventure','crafts','wellness','outdoor') NOT NULL,
  description TEXT,
  duration INT,
  location VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  max_participants INT,
  image VARCHAR(500),
  status ENUM('active','inactive') DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Food
CREATE TABLE IF NOT EXISTS food_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  category ENUM('appetizers','mains','desserts','beverages','alcohol') NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(500),
  available BOOLEAN DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tours
CREATE TABLE IF NOT EXISTS tours (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL,
  duration VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  image VARCHAR(500),
  date DATE,
  time TIME,
  difficulty ENUM('Easy','Medium','Hard') DEFAULT 'Easy',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admins
CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  full_name VARCHAR(100) NOT NULL,
  role ENUM('admin','super_admin','manager') DEFAULT 'admin',
  is_active BOOLEAN DEFAULT TRUE,
  last_login TIMESTAMP NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin sessions (TEXT instead of JSON anywhere else)
CREATE TABLE IF NOT EXISTS admin_sessions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  admin_id INT NOT NULL,
  session_token VARCHAR(255) NOT NULL,
  ip_address VARCHAR(45),
  user_agent TEXT,
  expires_at TIMESTAMP NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_admin_sessions_admin FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Activity logs (TEXT columns for before/after)
CREATE TABLE IF NOT EXISTS activity_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  admin_id INT,
  action VARCHAR(100) NOT NULL,
  table_name VARCHAR(50),
  record_id INT,
  old_values TEXT,
  new_values TEXT,
  ip_address VARCHAR(45),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_activity_logs_admin FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed data
INSERT INTO users (first_name,last_name,email,phone,password,date_of_birth,gender) VALUES
 ('Demo','User','demo@tickethub.com','+1234567890','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1990-01-01','prefer_not_to_say'),
 ('John','Doe','john@example.com','+1234567891','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1985-05-15','male'),
 ('Jane','Smith','jane@example.com','+1234567892','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1992-08-22','female');

INSERT INTO events (title,category,description,venue,date,time,price) VALUES
 ('Rock Legends Live 2024','concerts','Greatest rock hits','Madison Square Garden, NYC','2024-12-15','20:00:00',45.00),
 ('Summer Music Festival','festivals','Three days of non-stop music','Central Park, NYC','2024-07-20','14:00:00',120.00);

INSERT INTO movies (title,genre,duration,rating,description,price) VALUES
 ('Action Hero Chronicles','Action, Adventure',135,'PG-13','Epic action adventure',12.00),
 ('Comedy Central Deluxe','Comedy, Romance',105,'PG','Hilarious rom-com',10.00);

INSERT INTO sports_events (title,sport_type,home_team,away_team,venue,date,time,price) VALUES
 ('NFL Championship Final','football','Eagles','Patriots','MetLife Stadium, NJ','2025-01-15','18:30:00',85.00);

INSERT INTO leisure_activities (title,category,description,duration,location,price,max_participants) VALUES
 ('Scuba Diving Adventure','water','Explore the underwater world',4,'Crystal Bay Marina',89.00,8);

INSERT INTO food_items (name,category,description,price) VALUES
 ('Classic Burger','mains','Beef patty, fries',15.99),
 ('Premium Coffee','beverages','Fresh arabica coffee',3.99);

INSERT INTO tours (title,location,duration,price,description,date,time,difficulty) VALUES
 ('City Walking Tour','Downtown District','3 hours',25.00,'Guided commentary','2024-06-15','10:00:00','Easy');

INSERT INTO admins (username,email,password,full_name,role) VALUES
 ('admin','admin@tickethub.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','System Administrator','super_admin');
