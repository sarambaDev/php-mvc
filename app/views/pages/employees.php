<?php
require_once '../app/models/EmployeeModel.php';

$action = $_GET['action'] ?? '';

if ($action === 'add') {
    // FORM TAMBAH
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Tambah Karyawan</h1>
        </section>
        <section class="content">
            <form method="POST" action="?view=employees&action=save_add">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <input type="text" name="position" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gaji</label>
                    <input type="number" name="salary" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="?view=employees" class="btn btn-secondary">Batal</a>
            </form>
        </section>
    </div>
<?php

} elseif ($action === 'save_add') {
    // SIMPAN TAMBAH
    $name     = $_POST['name'] ?? '';
    $position = $_POST['position'] ?? '';
    $salary   = $_POST['salary'] ?? 0;

    if ($name && $position && $salary) {
        addEmployee($conn, $name, $position, $salary);
    }
    header("Location: ?view=employees");
    exit;
} elseif ($action === 'edit') {
    // FORM EDIT
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header("Location: ?view=employees");
        exit;
    }
    $employee = getEmployeeById($conn, $id);
    if (!$employee) {
        echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
        exit;
    }
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit Karyawan</h1>
        </section>
        <section class="content">
            <form method="POST" action="?view=employees&action=save_edit">
                <input type="hidden" name="id" value="<?= $employee['id'] ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($employee['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <input type="text" name="position" class="form-control" value="<?= htmlspecialchars($employee['position']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Gaji</label>
                    <input type="number" name="salary" class="form-control" value="<?= $employee['salary'] ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="?view=employees" class="btn btn-secondary">Batal</a>
            </form>
        </section>
    </div>
<?php

} elseif ($action === 'save_edit') {
    // SIMPAN EDIT
    $id       = $_POST['id'] ?? null;
    $name     = $_POST['name'] ?? '';
    $position = $_POST['position'] ?? '';
    $salary   = $_POST['salary'] ?? 0;

    if ($id && $name && $position && $salary) {
        updateEmployee($conn, $id, $name, $position, $salary);
    }
    header("Location: ?view=employees");
    exit;
} elseif ($action === 'delete') {
    // HAPUS
    $id = $_GET['id'] ?? null;
    if ($id) {
        deleteEmployee($conn, $id);
    }
    header("Location: ?view=employees");
    exit;
} else {
    // LIST
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Data Karyawan</h1>
        </section>
        <section class="content">
            <a href="?view=employees&action=add" class="btn btn-primary mb-3">Tambah Karyawan</a>
            <table id="employeeTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = getAllEmployees($conn);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['position']}</td>
                            <td>Rp " . number_format($row['salary'], 0, ',', '.') . "</td>
                            <td>
                                <a href='?view=employees&action=edit&id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='?view=employees&action=delete&id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

    <script src="<?= $base_url ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $base_url ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#employeeTable').DataTable();
        });
    </script>
<?php
}
