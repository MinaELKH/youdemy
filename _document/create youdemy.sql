DROP DATABASE IF EXISTS youdemy  ;

CREATE DATABASE youdemy ; 
USE youdemy ;


CREATE table roles (
id_role INT auto_increment PRIMARY KEY ,
role VARCHAR(50) NOT NULL UNIQUE ) ;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) ,
    id_role int NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_role) REFERENCEs roles(id_role)
);

CREATE TABLE categories (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description_ TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE courses (
    id_course INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    picture VARCHAR(255) , 
    id_teacher INT,
    status ENUM('pending', 'active', 'archived') DEFAULT 'pending',
    id_category INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_teacher) REFERENCES users(id_user),
    FOREIGN KEY (id_category) REFERENCES categories(id_categorie)
);  

CREATE TABLE enrollments (
    id_enrollements INT AUTO_INCREMENT PRIMARY KEY,
    id_student INT,
    id_course INT,
    enrollment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_student) REFERENCES users(id_user),
    FOREIGN KEY (id_course) REFERENCES courses(id_course)
);

CREATE TABLE tags (
id_tag INT AUTO_INCREMENT PRIMARY KEY , 
NAME VARCHAR(50) NOT NULL UNIQUE 
 )   ; 
 
 
 youdemy
 
 