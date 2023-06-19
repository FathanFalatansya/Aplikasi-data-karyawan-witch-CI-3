<?php include 'layout/header.php'; ?>
<br><br>
    <h1>Tambah Karyawan</h1>
    <form method="post" action="<?php echo site_url('karyawan/simpan'); ?>">
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div>
            <label for="Nik">Nik:</label>
            <input type="text" name="Nik" id="Nik" required>
        </div>
        <div>
            <label for="departemen">Departemen:</label>
            <select name="departemen" id="departemen" required>
                <option value="">Pilih Departemen</option>
         
                    <option value="1">Marketing</option>
                    <option value="2">Pemasaran</option>
                    <option value="3">Produksi</option>
         
            </select>
        </div>
        <div>
            <input type="submit" value="Simpan">
        </div>
    </form>

    <br><br>
    <br><br>
    <br><br>

    <?php include 'layout/footer.php'; ?>

    <style scoped>
    h1 {
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
    }

    div {
        margin-bottom: 10px;
    }

    label {
        display: inline-block;
        width: 100px;
        font-weight: bold;
    }

    input[type="text"],
    select {
        width: 200px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
