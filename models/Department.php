<?php

// Model Department: Mengelola operasi CRUD data program studi pada tabel departments
class Department
{
    private $conn;
    private $table = "departments";

    // Inisialisasi koneksi database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Mengambil seluruh data program studi diurutkan berdasarkan ID
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY id ASC";
        return $this->conn->query($query);
    }

    // Mengambil data satu program studi berdasarkan ID menggunakan prepared statement
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Menambahkan data program studi baru
    public function create($code, $name, $faculty)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (department_code, department_name, faculty) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $code, $name, $faculty);
        return $stmt->execute();
    }

    // Memperbarui data program studi berdasarkan ID
    public function update($id, $code, $name, $faculty)
    {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET department_code = ?, department_name = ?, faculty = ? WHERE id = ?");
        $stmt->bind_param("sssi", $code, $name, $faculty, $id);
        return $stmt->execute();
    }

    // Menghapus data program studi berdasarkan ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
