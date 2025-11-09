CREATE DATABASE db_supplier;
USE db_supplier;

CREATE TABLE supplier (
    id_supplier INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(150) NOT NULL
);
