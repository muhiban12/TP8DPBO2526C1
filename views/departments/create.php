<!-- View: Form untuk menambahkan data program studi baru -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?page=departments&action=create">
        <br><br>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create Department</h1>
            </div><br>

            <!-- Input kode program studi -->
            <label>DEPARTMENT CODE:</label>
            <input type="text" name="department_code" class="form-control" required><br>

            <!-- Input nama program studi -->
            <label>DEPARTMENT NAME:</label>
            <input type="text" name="department_name" class="form-control" required><br>

            <!-- Input fakultas -->
            <label>FACULTY:</label>
            <input type="text" name="faculty" class="form-control" required><br>

            <!-- Tombol aksi submit dan batal -->
            <button class="btn btn-success" type="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php?page=departments">Cancel</a><br>
        </div>
    </form>
</div>
