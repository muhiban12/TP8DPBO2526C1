<!-- View: Menampilkan daftar data program studi dalam bentuk tabel -->
<div class="container my-4">
    <!-- Tombol untuk menuju form tambah program studi baru -->
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary" href="index.php?page=departments&action=create">Add New</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>CODE</th>
                <th>DEPARTMENT NAME</th>
                <th>FACULTY</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan menampilkan setiap baris data program studi -->
            <?php while ($row = $departments->fetch_assoc()): ?>
                <tr>
                    <th><?= $row['id'] ?></th>
                    <td><?= htmlspecialchars($row['department_code']) ?></td>
                    <td><?= htmlspecialchars($row['department_name']) ?></td>
                    <td><?= htmlspecialchars($row['faculty']) ?></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="index.php?page=departments&action=edit&id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="index.php?page=departments&action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus program studi ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
