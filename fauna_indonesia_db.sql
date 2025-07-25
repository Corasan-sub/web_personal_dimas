
CREATE DATABASE IF NOT EXISTS fauna_indonesia;
USE fauna_indonesia;

CREATE TABLE kategori (
  id_kategori INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(100) NOT NULL
);

CREATE TABLE habitat (
  id_habitat INT AUTO_INCREMENT PRIMARY KEY,
  nama_habitat VARCHAR(100) NOT NULL,
  lokasi TEXT
);

CREATE TABLE fauna (
  id_fauna INT AUTO_INCREMENT PRIMARY KEY,
  nama_fauna VARCHAR(100) NOT NULL,
  id_kategori INT,
  id_habitat INT,
  deskripsi TEXT,
  FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori),
  FOREIGN KEY (id_habitat) REFERENCES habitat(id_habitat)
);

-- Contoh data awal
INSERT INTO kategori (nama_kategori) VALUES
('Mamalia'), ('Burung'), ('Reptil');

INSERT INTO habitat (nama_habitat, lokasi) VALUES
('Hutan Tropis', 'Kalimantan'),
('Padang Savana', 'NTT'),
('Pegunungan', 'Papua');
