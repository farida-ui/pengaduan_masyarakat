<!-- halaman tambah data masyarakat -->
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 mt-3">
            <div class="card">
                <div class="card-header">
                    <h1>Tambah Data Masyarakat</h1>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-md-4">NIK</label>
                            <input type="number" name="nik" class="form-control" placeholder="Masukkan Nik" required>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap"
                                required>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username"
                                required>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password"
                                required>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Telp</label>
                            <input type="number" name="telp" class="form-control" placeholder="Masukkan Telp" required>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>

                <?php
                include '../config/koneksi.php';
                if (isset($_POST['kirim'])) {
                    $nik = $_POST['nik'];
                    $nama = $_POST['nama'];
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $telp = $_POST['telp'];
                    $level = 'masyarakat';

                    //untuk menyimpan/mengirim ke db
                    $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik',
                    '$nama','$username','$password','$telp','$level')");

                    //jika registerasi berhasil
                    if ($query) {
                        header('location:index.php?page=masyarakat');
                    }
                }
                ?>


            </div>
        </div>
    </div>
</div>