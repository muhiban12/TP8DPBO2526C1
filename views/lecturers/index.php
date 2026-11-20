<!-- View: Menampilkan daftar data dosen dalam bentuk tabel -->
<div class="container my-4">
    <!-- Tombol untuk menuju form tambah dosen baru -->
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary" href="index.php?page=lecturers&action=create">Add New</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>NIDN</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>DEPARTMENT</th>
                <th>JOIN DATE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan menampilkan setiap baris data dosen -->
            <?php while ($row = $lecturers->fetch_assoc()): ?>
                <tr>
                    <th><?= $row['id'] ?></th>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['nidn']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= htmlspecialchars($row['department_name'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($row['join_date']) ?></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="index.php?page=lecturers&action=edit&id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="index.php?page=lecturers&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus dosen ini? Semua mata kuliah terkait juga akan terhapus.')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
