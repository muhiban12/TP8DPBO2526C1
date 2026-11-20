-- Membuat database tp_mvc25 jika belum ada
CREATE DATABASE IF NOT EXISTS tp_mvc25;
USE tp_mvc25;

-- 1. Tabel departments: menyimpan data Program Studi / Departemen
CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_code VARCHAR(20) NOT NULL UNIQUE,
    department_name VARCHAR(100) NOT NULL,
    faculty VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- 2. Tabel lecturers: menyimpan data Dosen dengan relasi ke departments
CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    join_date DATE NOT NULL,
    department_id INT NULL,
    -- Relasi: jika department dihapus, set department_id menjadi NULL
    CONSTRAINT fk_lecturer_department
        FOREIGN KEY (department_id) REFERENCES departments(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- 3. Tabel courses: menyimpan data Mata Kuliah dengan relasi ke lecturers
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(20) NOT NULL UNIQUE,
    course_name VARCHAR(100) NOT NULL,
    credits INT NOT NULL,
    semester INT NOT NULL,
    lecturer_id INT NOT NULL,
    -- Relasi: jika dosen dihapus, mata kuliah terkait ikut terhapus (CASCADE)
    CONSTRAINT fk_course_lecturer
        FOREIGN KEY (lecturer_id) REFERENCES lecturers(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- Data Awal (Dummy Data) untuk pengujian sistem
INSERT INTO departments (department_code, department_name, faculty) VALUES
('IK-01', 'Ilmu Komputer', 'FPMIPA'),
('PIK-02', 'Pendidikan Ilmu Komputer', 'FPMIPA'),
('RPL-03', 'Rekayasa Perangkat Lunak', 'FPTK');

INSERT INTO lecturers (name, nidn, email, phone, join_date, department_id) VALUES
('Dr. Budi Santoso, M.T.', '0012048501', 'budi.santoso@kampus.ac.id', '081234567890', '2018-09-01', 1),
('Siti Aminah, M.Kom.', '0024089002', 'siti.aminah@kampus.ac.id', '081298765432', '2020-02-15', 2);

INSERT INTO courses (course_code, course_name, credits, semester, lecturer_id) VALUES
('CS301', 'Desain dan Pemrograman Berorientasi Objek', 3, 3, 1),
('CS405', 'Pengembangan Aplikasi Web MVC', 3, 5, 2);
