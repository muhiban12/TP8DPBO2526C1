<?php

// Kelas Database: Mengelola koneksi ke database MySQL menggunakan MySQLi
class Database
{
    // Konfigurasi kredensial dan nama database
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tp_mvc25";
    public $conn;

    // Membuka koneksi ke MySQL dan mengembalikan objek koneksi
    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Memeriksa jika terjadi kegagalan koneksi
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn; 
    }
}
