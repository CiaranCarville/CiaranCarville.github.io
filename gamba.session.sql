-- @block
CREATE TABLE Users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(16) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    activated BIT NOT NULL
);
-- @block 
INSERT INTO Users (email, username)
VALUES ('CiaranCarville@pm.me', 'safe')