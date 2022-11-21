CREATE TABLE user (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    unique_id INT(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    image TEXT DEFAULT NULL,
    created_at DATE DEFAULT NOW(),
    updated_at DATE DEFAULT NOW()
);