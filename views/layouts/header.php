<!-- Header layout: Mendefinisikan struktur HTML dasar dan navigasi navbar utama -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title><?= htmlspecialchars($pageTitle ?? 'Academic MVC') ?></title>
</head>

<body>
    <!-- Navbar navigasi antar menu (Lecturers, Departments, Courses) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=lecturers">Academic MVC</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'lecturers') ? 'active' : '' ?>" href="index.php?page=lecturers">Lecturers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'departments') ? 'active' : '' ?>" href="index.php?page=departments">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'courses') ? 'active' : '' ?>" href="index.php?page=courses">Courses</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
