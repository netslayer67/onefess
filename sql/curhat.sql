CREATE TABLE curhat (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT(255) NOT NULL,
    body TEXT NOT NULL,
    created_at DATE DEFAULT NOW(),
    updated_at DATE DEFAULT NOW()
);