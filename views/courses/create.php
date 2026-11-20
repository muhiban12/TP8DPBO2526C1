<!-- View: Form untuk menambahkan data mata kuliah baru -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?page=courses&action=create">
        <br><br>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create Course</h1>
            </div><br>

            <!-- Input kode mata kuliah -->
            <label>COURSE CODE:</label>
            <input type="text" name="course_code" class="form-control" required><br>

            <!-- Input nama mata kuliah -->
            <label>COURSE NAME:</label>
            <input type="text" name="course_name" class="form-control" required><br>

            <!-- Input bobot SKS -->
            <label>CREDITS (SKS):</label>
            <input type="number" name="credits" min="1" max="6" class="form-control" required><br>

            <!-- Input semester -->
            <label>SEMESTER:</label>
            <input type="number" name="semester" min="1" max="8" class="form-control" required><br>

            <!-- Pilihan dosen pengampu mata kuliah -->
            <label>LECTURER:</label>
            <select name="lecturer_id" class="form-control" required>
                <option value="">-- Pilih Dosen Pengampu --</option>
                <?php while ($lec = $lecturers->fetch_assoc()): ?>
                    <option value="<?= $lec['id'] ?>"><?= htmlspecialchars($lec['name']) ?> (<?= htmlspecialchars($lec['nidn']) ?>)</option>
                <?php endwhile; ?>
            </select><br>

            <!-- Tombol aksi submit dan batal -->
            <button class="btn btn-success" type="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php?page=courses">Cancel</a><br>
        </div>
    </form>
</div>
