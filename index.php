<?php
// Memuat konfigurasi database dan seluruh controller modul
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controllers/LecturerController.php';
require_once __DIR__ . '/controllers/DepartmentController.php';
require_once __DIR__ . '/controllers/CourseController.php';

// Inisialisasi objek database dan membuat koneksi
$database = new Database();
$db = $database->getConnection();

// Menangkap parameter halaman dan aksi dari URL (default: lecturers & index)
$page = $_GET['page'] ?? 'lecturers';
$action = $_GET['action'] ?? 'index';

// Routing: Menentukan controller berdasarkan nilai parameter 'page'
switch ($page) {
    case 'departments':
        $controller = new DepartmentController($db);
        break;
    case 'courses':
        $controller = new CourseController($db);
        break;
    case 'lecturers':
    default:
        $controller = new LecturerController($db);
        break;
}

// Menjalankan method pada controller jika tersedia, atau kembali ke index
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}
