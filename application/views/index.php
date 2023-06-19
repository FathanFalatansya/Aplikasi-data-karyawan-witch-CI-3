
<?php include 'layout/header.php'; ?>
<br><br>

<div class="container">
    <h1>Daftar Karyawan</h1>

    <form method="post" action="<?php echo site_url('karyawan/cari'); ?>">
        <input type="text" name="cari" placeholder="Cari Karyawan">
        <input type="submit" value="Cari">
    </form>

    <br><br>

    <a href="<?php echo site_url('karyawan/tambah'); ?>" class="btn btn-primary">Tambah Karyawan Baru</a>
</div>

    

<br><br>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Departemen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($karyawan as $row): ?>
                        <tr>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->Nik; ?></td>
                            <td><?php echo $row->nama_departemen; ?></td>
                            <td>
                                <a href="karyawan/edit/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo site_url('karyawan/hapus/' . $row->id); ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    

    <br><br>
    <br><br>
    <br>

    <?php include 'layout/footer.php'; ?>

    <style scoped>
    .btn + .btn {
        margin-left: 8px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    .table thead th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .table tbody td {
        vertical-align: middle;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #e6e6e6;
    }

    .table a + a {
        margin-left: 4px;
    }

    a{
        margin-left: 20px;
    }
    </style>
