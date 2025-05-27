-- Active: 1747895818029@@mysql-2275a1e1-fardanfadh.c.aivencloud.com@23059@YTTA

CREATE TABLE User (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(100) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL
);

CREATE TABLE Project (
    pr_id INT PRIMARY KEY AUTO_INCREMENT,
    pr_name VARCHAR(100) NOT NULL,
    pr_desc TEXT,
    pr_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ProjectRole (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    pr_id INT NOT NULL,
    role_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (pr_id) REFERENCES Project(pr_id) ON DELETE CASCADE
);

CREATE TABLE Unit (
    unit_id INT PRIMARY KEY AUTO_INCREMENT,
    unit_name VARCHAR(100) NOT NULL,
    unit_depth INT NOT NULL
);

CREATE TABLE Task (
    task_id INT PRIMARY KEY AUTO_INCREMENT,
    task_title VARCHAR(100) NOT NULL,
    task_desc TEXT,
    task_status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    task_creator INT,
    task_start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    task_end_date DATE,

    FOREIGN KEY (task_creator) REFERENCES User(user_id)
);

CREATE TABLE ProjectMember (
    member_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    pr_id INT,
    role_id INT,
    unit_id INT,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (pr_id) REFERENCES Project(pr_id),
    FOREIGN KEY (role_id) REFERENCES ProjectRole(role_id),
    FOREIGN KEY (unit_id) REFERENCES Unit(unit_id)
);

CREATE TABLE Access (
    access_id INT PRIMARY KEY AUTO_INCREMENT,
    pr_id INT,
    access_view BOOLEAN DEFAULT TRUE, 
    access_edit BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (pr_id) REFERENCES Project(pr_id)
);

INSERT INTO User (user_name, user_email, user_password) VALUES
    ('admin', 'admin123@gmail.com', 'admin123');

SELECT * FROM User;