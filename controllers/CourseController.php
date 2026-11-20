<?php
// Memuat model Course dan Lecturer untuk interaksi database
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';

// Controller Course: Mengatur alur logika bisnis dan tampilan modul mata kuliah
class CourseController
{
    private $courseModel;
    private $lecturerModel;

    // Inisialisasi model Course dan Lecturer dengan koneksi DB
    public function __construct($db)
    {
        $this->courseModel = new Course($db);
        $this->lecturerModel = new Lecturer($db);
    }

    // Menampilkan daftar seluruh mata kuliah
    public function index()
    {
        $courses = $this->courseModel->getAll();
        $pageTitle = "Courses";
        $activePage = "courses";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/courses/index.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menampilkan form tambah dan memproses simpan mata kuliah baru
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->courseModel->create(
                $_POST['course_code'],
                $_POST['course_name'],
                (int)$_POST['credits'],
                (int)$_POST['semester'],
                (int)$_POST['lecturer_id']
            );
            header("Location: index.php?page=courses");
            exit;
        }

        $lecturers = $this->lecturerModel->getAll();
        $pageTitle = "Create Course";
        $activePage = "courses";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/courses/create.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menampilkan form edit dan memproses pembaruan data mata kuliah
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=courses");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->courseModel->update(
                $_POST['id'],
                $_POST['course_code'],
                $_POST['course_name'],
                (int)$_POST['credits'],
                (int)$_POST['semester'],
                (int)$_POST['lecturer_id']
            );
            header("Location: index.php?page=courses");
            exit;
        }

        $course = $this->courseModel->getById($id);
        $lecturers = $this->lecturerModel->getAll();
        $pageTitle = "Update Course";
        $activePage = "courses";
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/courses/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    // Menghapus data mata kuliah berdasarkan ID dari parameter URL
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->courseModel->delete($id);
        }
        header("Location: index.php?page=courses");
        exit;
    }
}
