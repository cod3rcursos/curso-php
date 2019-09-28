USE INNOUT;

DROP TABLE IF EXISTS working_hours, users;
CREATE TABLE users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    is_admin BOOLEAN NOT NULL DEFAULT false
);
CREATE TABLE working_hours (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    user_id INT(6),
    work_date DATE NOT NULL,
    time1 TIME,
    time2 TIME,
    time3 TIME,
    time4 TIME,
    worked_time INT,

    FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT cons_user_day UNIQUE (user_id, work_date)
);

-- Essa senha criptografada corresponde ao valor "a"
INSERT INTO users (id, name, password, email, start_date, end_date, is_admin)
VALUES (1, 'Admin', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'admin@cod3r.com.br', '2000-1-1', null, 1);

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin)
VALUES (2, 'Chaves', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'chaves@cod3r.com.br', '2000-1-1', null, 1);

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin)
VALUES (3, 'Seu Barriga', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'barriga@cod3r.com.br', '2000-1-1', null, 0);

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin)
VALUES (4, 'Seu Madruga', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'madruga@cod3r.com.br', '2000-1-1', null, 0);

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin)
VALUES (5, 'Quico', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'quico@cod3r.com.br', '2000-1-1', '2019-1-1', 0);
