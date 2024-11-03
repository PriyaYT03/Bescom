
CREATE DATABASE file_track;

USE file_track;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE files (
    file_id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL, 
    status VARCHAR(50) DEFAULT 'Pending', 
    version INT DEFAULT 1, 
    department_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id INT, 
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL
);

CREATE TABLE file_movements (
    movement_id INT AUTO_INCREMENT PRIMARY KEY,
    file_id INT,
    user_id INT,  
    action VARCHAR(255), 
    department_id INT,  
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (file_id) REFERENCES files(file_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL
);

INSERT INTO users (username, password, email) VALUES 
('user1', MD5('password1'), 'user1@example.com'),
('user2', MD5('password2'), 'user2@example.com'),
('user3', MD5('password3'), 'user3@example.com'),
('user4', MD5('password4'), 'user4@example.com'),
('user5', MD5('password5'), 'user5@example.com'),
('user6', MD5('password6'), 'user6@example.com'),
('user7', MD5('password7'), 'user7@example.com'),
('user8', MD5('password8'), 'user8@example.com'),
('user9', MD5('password9'), 'user9@example.com'),
('user10', MD5('password10'), 'user10@example.com');


INSERT INTO departments (department_name) VALUES 
('Manager'),
('AGM'),
('DGM'),
('GM');


INSERT INTO files (file_name, file_path, status, version, department_id, user_id) VALUES 
('FileA', '/path/to/FileA', 'Pending', 1, 1, 1),
('FileB', '/path/to/FileB', 'In Progress', 1, 2, 2),
('FileC', '/path/to/FileC', 'Approved', 2, 3, 3),
('FileD', '/path/to/FileD', 'Pending', 1, 4, 4),
('FileE', '/path/to/FileE', 'Rejected', 3, 2, 5),
('FileF', '/path/to/FileF', 'Pending', 1, 3, 6),
('FileG', '/path/to/FileG', 'Approved', 2, 2, 7),
('FileH', '/path/to/FileH', 'In Progress', 1, 4, 8),
('FileI', '/path/to/FileI', 'Approved', 3, 2, 9),
('FileJ', '/path/to/FileJ', 'Pending', 1, 1, 10);

INSERT INTO file_movements (file_id, user_id, action, department_id) VALUES 
(1, 1, 'Submitted', 1),
(2, 2, 'Reviewed', 2),
(3, 3, 'Approved', 3),
(4, 4, 'Submitted', 4),
(5, 5, 'Rejected', 2),
(6, 6, 'Submitted', 3),
(7, 7, 'Approved', 4),
(8, 8, 'Reviewed', 2),
(9, 9, 'Approved', 3),
(10, 10, 'Submitted', 1),
(1, 2, 'Reviewed', 2),
(3, 4, 'Reviewed', 4),
(5, 6, 'Reviewed', 3),
(7, 8, 'Reviewed', 4),
(9, 10, 'Reviewed', 1);

use file_track;



show TABLES;

SELECT * FROM users;
select * from files;
use file_track;


SELECT * FROM file_movements;
use database file_track;
















