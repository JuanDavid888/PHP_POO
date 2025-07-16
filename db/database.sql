-- Active: 1752665738585@@127.0.0.1@3306@php_pdo

-- Database commands

CREATE DATABASE IF NOT EXISTS php_pdo;

USE php_pdo;

SHOW TABLES;

SELECT * FROM products

-- Drops

DROP TABLE IF EXISTS products;

-- Tables

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Inserts

INSERT INTO products(name, price)
VALUES('esponja', 4000),
('pan de queso', 2000);