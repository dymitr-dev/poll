CREATE DATABASE IF NOT EXISTS poll;

USE poll;

CREATE TABLE IF NOT EXISTS votes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ip VARCHAR(255) NOT NULL,
  vote VARCHAR(3) NOT NULL
);
