<?php

// Model Course: Mengelola operasi CRUD data mata kuliah pada tabel courses
class Course
{
    private $conn;
    private $table = "courses";

    // Inisialisasi koneksi database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Mengambil seluruh data mata kuliah beserta data dosen pengampu (INNER JOIN)
    public function getAll()
    {
        $query = "SELECT c.*, l.name AS lecturer_name, l.nidn AS lecturer_nidn
                  FROM {$this->table} c
                  INNER JOIN lecturers l ON c.lecturer_id = l.id
                  ORDER BY c.id ASC";
        return $this->conn->query($query);
    }

    // Mengambil data satu mata kuliah berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Menambahkan data mata kuliah baru
    public function create($code, $name, $credits, $semester, $lecturer_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (course_code, course_name, credits, semester, lecturer_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiii", $code, $name, $credits, $semester, $lecturer_id);
        return $stmt->execute();
    }

    // Memperbarui data mata kuliah berdasarkan ID
    public function update($id, $code, $name, $credits, $semester, $lecturer_id)
    {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET course_code = ?, course_name = ?, credits = ?, semester = ?, lecturer_id = ? WHERE id = ?");
        $stmt->bind_param("ssiiii", $code, $name, $credits, $semester, $lecturer_id, $id);
        return $stmt->execute();
    }

    // Menghapus data mata kuliah berdasarkan ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
