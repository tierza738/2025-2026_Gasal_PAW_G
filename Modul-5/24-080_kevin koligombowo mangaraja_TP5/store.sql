CREATE DATABASE IF NOT EXISTS db_supplier;
USE db_supplier;

CREATE TABLE supplier (
    id_supplier INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(255) NOT NULL
);

INSERT INTO supplier (nama, telp, alamat) VALUES
('Toko Maju Jaya', '08123456789', 'Jl. Raya 1A'),
('CV Sumber Makmur', '08567891234', 'Jl. Merdeka 45'),
('PT Indo Supply', '082233445566', 'Jl. Mawar No. 9B');
