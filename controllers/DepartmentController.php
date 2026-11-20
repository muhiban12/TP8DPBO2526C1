<?php
// Memuat model Department untuk interaksi database
require_once __DIR__ . '/../models/Department.php';

// Controller Department: Mengatur alur logika bisnis dan tampilan modul program studi
class DepartmentController
{
    private $departmentModel;

    // Inisialisasi model Department dengan koneksi DB
    public function __construct($db)
    {
        $this->departmentModel = new Department($db);
    }

    // Menampilkan daftar seluruh program studi
    public function index()
    {
        $departments = $this->departmentModel->getAll();
        $pageTitle = "Departments";
        $activePage = "departments";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/departments/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menampilkan form tambah dan memproses simpan data baru
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->departmentModel->create(
                $_POST['department_code'],
                $_POST['department_name'],
                $_POST['faculty']
            );
            header("Location: index.php?page=departments");
            exit;
        }

        $pageTitle = "Create Department";
        $activePage = "departments";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/departments/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menampilkan form edit dan memproses pembaruan data
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=departments");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->departmentModel->update(
                $_POST['id'],
                $_POST['department_code'],
                $_POST['department_name'],
                $_POST['faculty']
            );
            header("Location: index.php?page=departments");
            exit;
        }

        $department = $this->departmentModel->getById($id);
        $pageTitle = "Update Department";
        $activePage = "departments";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/departments/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menghapus data program studi berdasarkan ID dari parameter URL
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->departmentModel->delete($id);
        }
        header("Location: index.php?page=departments");
        exit;
    }
}
