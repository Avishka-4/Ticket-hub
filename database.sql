-- TicketHub Database Schema (Pure SQL for phpMyAdmin)
-- Create database
CREATE DATABASE IF NOT EXISTS tickethub;
USE tickethub;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    date_of_birth DATE,
    gender ENUM('male', 'female', 'other', 'prefer_not_to_say'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Bookings table (normalized/basic)
CREATE TABLE IF NOT EXISTS bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    booking_type ENUM('event', 'movie', 'sports', 'leisure', 'food', 'tour') NOT NULL,
    item_id INT NULL,
    booking_reference VARCHAR(50) UNIQUE,
    booking_date DATE NOT NULL,
    booking_time TIME NULL,
    seats INT NOT NULL DEFAULT 1,
    total_price DECIMAL(10,2) NOT NULL DEFAULT 0,
    selected_seats JSON NULL,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Events table
CREATE TABLE IF NOT EXISTS events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    category ENUM('concerts', 'festivals', 'comedy', 'theater') NOT NULL,
    description TEXT,
    venue VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(500),
    rating DECIMAL(3,1),
    badge VARCHAR(50),
    status ENUM('active', 'inactive', 'sold_out') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Movies table
CREATE TABLE IF NOT EXISTS movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    duration INT NOT NULL,
    rating VARCHAR(10),
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(500),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sports events table
CREATE TABLE IF NOT EXISTS sports_events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    sport_type ENUM('football', 'cricket', 'basketball', 'tennis', 'baseball') NOT NULL,
    home_team VARCHAR(100),
    away_team VARCHAR(100),
    venue VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(500),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Leisure activities table
CREATE TABLE IF NOT EXISTS leisure_activities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    category ENUM('water', 'adventure', 'crafts', 'wellness', 'outdoor') NOT NULL,
    description TEXT,
    duration INT,
    location VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    max_participants INT,
    image VARCHAR(500),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Food Festivals table
CREATE TABLE IF NOT EXISTS food_festivals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    venue VARCHAR(255) NOT NULL,
    festival_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    entry_fee DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    image VARCHAR(500),
    featured BOOLEAN DEFAULT FALSE,
    cuisines TEXT,
    status ENUM('upcoming', 'ongoing', 'completed', 'cancelled') DEFAULT 'upcoming',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Food Festivals
INSERT INTO food_festivals (title, description, venue, festival_date, start_time, end_time, entry_fee, featured, cuisines, status) VALUES
('Street Food Festival', 'Experience the best street food from local vendors!', 'Central Park', '2025-11-15', '11:00:00', '21:00:00', 5.00, TRUE, 'Street Tacos, Gourmet Burgers, Asian Fusion, Desserts', 'upcoming'),
('International Food Fair', 'A world tour of flavors under one roof!', 'City Convention Center', '2025-12-01', '10:00:00', '20:00:00', 10.00, FALSE, 'Italian, Chinese, Mexican, Indian, Thai', 'upcoming'),
('Sweet Treats Festival', 'Indulge in the citys best desserts!', 'Riverside Park', '2025-12-20', '12:00:00', '22:00:00', 8.00, FALSE, 'Cakes, Ice Cream, Chocolates, Pastries', 'upcoming');

-- Food items table
CREATE TABLE IF NOT EXISTS food_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    category ENUM('appetizers', 'mains', 'desserts', 'beverages', 'alcohol') NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(500),
    available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tours/Places table
CREATE TABLE IF NOT EXISTS tours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    duration VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image VARCHAR(500),
    date DATE,
    time TIME,
    difficulty ENUM('Easy','Medium','Hard') DEFAULT 'Easy',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'super_admin', 'manager') DEFAULT 'admin',
    is_active BOOLEAN DEFAULT TRUE,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Admin sessions table
CREATE TABLE IF NOT EXISTS admin_sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT NOT NULL,
    session_token VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    expires_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE
);

-- Activity logs
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    admin_id INT,
    action VARCHAR(100) NOT NULL,
    table_name VARCHAR(50),
    record_id INT,
    old_values JSON,
    new_values JSON,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);

-- Sample users (password: password)
INSERT INTO users (first_name, last_name, email, phone, password, date_of_birth, gender) VALUES
('Demo', 'User', 'demo@tickethub.com', '+1234567890', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1990-01-01', 'prefer_not_to_say'),
('John', 'Doe', 'john@example.com', '+1234567891', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1985-05-15', 'male'),
('Jane', 'Smith', 'jane@example.com', '+1234567892', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1992-08-22', 'female');

-- Sample events
INSERT INTO events 
(title, category, description, venue, date, time, price, image, rating, badge, status) VALUES
('Rock Legends Live 2024', 'concerts', 'Experience legendary rock bands live in Colombo!', 'Nelum Pokuna Theatre, Colombo', '2024-12-15', '18:30:00', 45.00, 'rock_legends.jpg', 4.9, 'Hot', 'active'),
('Summer Music Festival', 'festivals', 'Three days of non-stop music by top local and international artists.', 'Galle Face Green, Colombo', '2024-07-20', '16:00:00', 120.00, 'summer_music.jpg', 4.7, '3 Days', 'active'),
('Comedy Night Special', 'comedy', 'Laugh out loud with Sri Lanka’s best stand-up comedians.', 'Kandy City Center Hall', '2024-11-30', '19:00:00', 25.00, 'comedy_night.jpg', 4.8, '', 'active'),
('Shakespeare in the Park', 'theater', 'Classic Shakespeare performances under the stars.', 'Viharamahadevi Open Air Theater', '2024-08-10', '18:00:00', 35.00, 'shakespeare_park.jpg', 4.6, 'Limited', 'active'),
('Jazz & Blues Night', 'concerts', 'Smooth jazz and soulful blues by top Sri Lankan artists.', 'Lionel Wendt Theatre, Colombo', '2024-10-05', '20:00:00', 55.00, 'jazz_blues.jpg', 4.9, '', 'active'),
('Electronic Dance Festival', 'festivals', 'Dance the night away with top DJs and light shows.', 'BMICH Grounds, Colombo', '2024-09-15', '21:00:00', 75.00, 'edm_fest.jpg', 4.5, 'New', 'active');

-- Sample movies
INSERT INTO movies (title, genre, duration, rating, description, price, image) VALUES
('Action Hero Chronicles', 'Action, Adventure', 135, 'PG-13', 'Epic action adventure', 12.00, NULL),
('Comedy Central Deluxe', 'Comedy, Romance', 105, 'PG', 'Hilarious romantic comedy', 10.00, NULL),
('Space Odyssey 2025', 'Sci-Fi, Thriller', 150, 'PG-13', 'Mind-bending sci-fi epic', 15.00, NULL),
('The Hearts Journey', 'Drama, Romance', 125, 'R', 'Touching drama', 11.00, NULL);

-- Sample sports events
INSERT INTO sports_events (title, sport_type, home_team, away_team, venue, date, time, price, image) VALUES
('NFL Championship Final', 'football', 'Eagles', 'Patriots', 'MetLife Stadium, New Jersey', '2025-01-15', '18:30:00', 85.00, NULL),
('Cricket World Cup Semi-Final', 'cricket', 'India', 'Australia', 'Wankhede Stadium, Mumbai', '2025-02-20', '14:00:00', 45.00, NULL),
('NBA Playoff Game', 'basketball', 'Lakers', 'Warriors', 'Crypto.com Arena, Los Angeles', '2025-03-10', '20:00:00', 65.00, NULL),
('Wimbledon Mens Final', 'tennis', NULL, NULL, 'Centre Court, Wimbledon', '2025-07-14', '14:00:00', 120.00, NULL);

-- Sample leisure activities
INSERT INTO leisure_activities (title, category, description, duration, location, price, max_participants, image) VALUES
('Scuba Diving Adventure', 'water', 'Explore the underwater world', 4, 'Crystal Bay Marina', 89.00, 8, NULL),
('Professional Surfing Lessons', 'water', 'Learn to surf with professional instructors', 3, 'Sunset Beach', 65.00, 6, NULL),
('Rock Climbing Experience', 'adventure', 'Guided rock climbing on natural cliffs', 5, 'Rocky Point Adventure Park', 95.00, 4, NULL),
('Pottery & Ceramic Workshop', 'crafts', 'Create beautiful ceramic pieces', 3, 'Creative Arts Studio', 45.00, 12, NULL);

-- Sample food items
INSERT INTO food_items (name, category, description, price, image) VALUES
('Caesar Salad', 'appetizers', 'Fresh romaine lettuce, croutons, parmesan', 8.99, NULL),
('Buffalo Wings', 'appetizers', 'Spicy chicken wings with blue cheese dip', 12.99, NULL),
('Classic Burger', 'mains', 'Beef patty, lettuce, tomato, cheese, fries', 15.99, NULL),
('Margherita Pizza', 'mains', 'Fresh mozzarella, tomato sauce, basil', 18.99, NULL),
('Chocolate Cake', 'desserts', 'Rich chocolate cake with vanilla frosting', 6.99, NULL),
('Premium Coffee', 'beverages', 'Freshly brewed arabica coffee', 3.99, NULL),
('Red Wine', 'alcohol', 'Premium red wine from Italy', 12.99, NULL);

-- Sample tours
INSERT INTO tours (title, location, duration, price, description, image, date, time, difficulty) VALUES
('City Walking Tour', 'Downtown District', '3 hours', 25.00, 'Explore the historic downtown area with guided commentary', NULL, '2024-06-15', '10:00:00', 'Easy'),
('Mountain Hiking Adventure', 'Rocky Mountains', '6 hours', 75.00, 'Challenging hike with breathtaking mountain views', NULL, '2024-06-20', '08:00:00', 'Hard'),
('Wine Tasting Tour', 'Vineyard Valley', '4 hours', 85.00, 'Visit local wineries and taste premium wines', NULL, '2024-06-25', '14:00:00', 'Easy'),
('Photography Workshop', 'Scenic Overlook', '5 hours', 95.00, 'Learn photography techniques in stunning locations', NULL, '2024-06-30', '09:00:00', 'Medium'),
('Sunset Boat Tour', 'Harbor Bay', '2 hours', 45.00, 'Relaxing boat ride with spectacular sunset views', NULL, '2024-07-05', '18:00:00', 'Easy');

-- Sample admins (password hash corresponds to 'password')
INSERT INTO admins (username, email, password, full_name, role) VALUES
('admin', 'admin@tickethub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'super_admin'),
('manager', 'manager@tickethub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Event Manager', 'manager'),
('support', 'support@tickethub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Support Staff', 'admin');
