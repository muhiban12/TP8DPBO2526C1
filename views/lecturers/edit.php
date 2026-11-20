<!-- View: Form untuk mengedit data dosen yang sudah ada -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?page=lecturers&action=edit&id=<?= $lecturer['id'] ?>">
        <br><br>
        <div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">Update Lecturer</h1>
            </div><br>

            <!-- Input tersembunyi untuk ID dosen -->
            <input type="hidden" name="id" value="<?= $lecturer['id'] ?>">

            <!-- Input nama dosen -->
            <label>NAME:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($lecturer['name']) ?>" class="form-control" required><br>

            <!-- Input NIDN dosen -->
            <label>NIDN:</label>
            <input type="text" name="nidn" value="<?= htmlspecialchars($lecturer['nidn']) ?>" class="form-control" required><br>

            <!-- Input email dosen -->
            <label>EMAIL:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($lecturer['email']) ?>" class="form-control" required><br>

            <!-- Input nomor telepon dosen -->
            <label>PHONE:</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($lecturer['phone']) ?>" class="form-control" required><br>

            <!-- Pilihan program studi dosen -->
            <label>DEPARTMENT:</label>
            <select name="department_id" class="form-control">
                <option value="">-- Pilih Program Studi --</option>
                <?php while ($dept = $departments->fetch_assoc()): ?>
                    <option value="<?= $dept['id'] ?>" <?= ($lecturer['department_id'] == $dept['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($dept['department_name']) ?> (<?= htmlspecialchars($dept['faculty']) ?>)
                    </option>
                <?php endwhile; ?>
            </select><br>

            <!-- Input tanggal bergabung -->
            <label>JOIN DATE:</label>
            <input type="date" name="join_date" value="<?= htmlspecialchars($lecturer['join_date']) ?>" class="form-control" required><br>

            <!-- Tombol aksi submit dan batal -->
            <button class="btn btn-success" type="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php?page=lecturers">Cancel</a><br>
        </div>
    </form>
</div>
