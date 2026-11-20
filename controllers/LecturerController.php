<?php
// Memuat model Lecturer dan Department untuk interaksi database
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

// Controller Lecturer: Mengatur alur logika bisnis dan tampilan modul dosen
class LecturerController
{
    private $lecturerModel;
    private $departmentModel;

    // Inisialisasi model Lecturer dan Department dengan koneksi DB
    public function __construct($db)
    {
        $this->lecturerModel = new Lecturer($db);
        $this->departmentModel = new Department($db);
    }

    // Menampilkan daftar seluruh dosen
    public function index()
    {
        $lecturers = $this->lecturerModel->getAll();
        $pageTitle = "Lecturers";
        $activePage = "lecturers";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/lecturers/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menampilkan form tambah dan memproses simpan dosen baru
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->lecturerModel->create(
                $_POST['name'],
                $_POST['nidn'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['join_date'],
                $_POST['department_id']
            );
            header("Location: index.php?page=lecturers");
            exit;
        }

        $departments = $this->departmentModel->getAll();
        $pageTitle = "Create Lecturer";
        $activePage = "lecturers";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/lecturers/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menampilkan form edit dan memproses pembaruan data dosen
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=lecturers");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->lecturerModel->update(
                $_POST['id'],
                $_POST['name'],
                $_POST['nidn'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['join_date'],
                $_POST['department_id']
            );
            header("Location: index.php?page=lecturers");
            exit;
        }

        $lecturer = $this->lecturerModel->getById($id);
        $departments = $this->departmentModel->getAll();
        $pageTitle = "Update Lecturer";
        $activePage = "lecturers";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/lecturers/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menghapus data dosen berdasarkan ID dari parameter URL
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->lecturerModel->delete($id);
        }
        header("Location: index.php?page=lecturers");
        exit;
    }
}
