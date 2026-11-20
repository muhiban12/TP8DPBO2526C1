<?php

// Model Lecturer: Mengelola operasi CRUD data dosen pada tabel lecturers
class Lecturer
{
    private $conn;
    private $table = "lecturers";

    // Inisialisasi koneksi database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Mengambil seluruh data dosen beserta nama program studinya (LEFT JOIN)
    public function getAll()
    {
        $query = "SELECT l.*, d.department_name 
                  FROM {$this->table} l
                  LEFT JOIN departments d ON l.department_id = d.id
                  ORDER BY l.id ASC";
        return $this->conn->query($query);
    }

    // Mengambil data satu dosen berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Menambahkan data dosen baru ke tabel lecturers
    public function create($name, $nidn, $email, $phone, $join_date, $department_id)
    {
        $deptId = !empty($department_id) ? (int)$department_id : null;
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, nidn, email, phone, join_date, department_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $name, $nidn, $email, $phone, $join_date, $deptId);
        return $stmt->execute();
    }

    // Memperbarui data dosen berdasarkan ID
    public function update($id, $name, $nidn, $email, $phone, $join_date, $department_id)
    {
        $deptId = !empty($department_id) ? (int)$department_id : null;
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, nidn = ?, email = ?, phone = ?, join_date = ?, department_id = ? WHERE id = ?");
        $stmt->bind_param("sssssii", $name, $nidn, $email, $phone, $join_date, $deptId, $id);
        return $stmt->execute();
    }

    // Menghapus data dosen berdasarkan ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
