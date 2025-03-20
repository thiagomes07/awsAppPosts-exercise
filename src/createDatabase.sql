CREATE DATABASE ec2_exercise;

USE ec2_exercise;

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    autor VARCHAR(100),
    description TEXT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
