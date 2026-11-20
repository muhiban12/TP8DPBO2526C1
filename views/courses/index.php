<!-- View: Menampilkan daftar data mata kuliah dalam bentuk tabel -->
<div class="container my-4">
    <!-- Tombol untuk menuju form tambah mata kuliah baru -->
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary" href="index.php?page=courses&action=create">Add New</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>COURSE CODE</th>
                <th>COURSE NAME</th>
                <th>SKS</th>
                <th>SEMESTER</th>
                <th>LECTURER</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan menampilkan setiap baris data mata kuliah beserta dosen pengampu -->
            <?php while ($row = $courses->fetch_assoc()): ?>
                <tr>
                    <th><?= $row['id'] ?></th>
                    <td><?= htmlspecialchars($row['course_code']) ?></td>
                    <td><?= htmlspecialchars($row['course_name']) ?></td>
                    <td><?= $row['credits'] ?></td>
                    <td><?= $row['semester'] ?></td>
                    <td><?= htmlspecialchars($row['lecturer_name']) ?> (<?= htmlspecialchars($row['lecturer_nidn']) ?>)</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="index.php?page=courses&action=edit&id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="index.php?page=courses&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus mata kuliah ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
