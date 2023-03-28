<!-- ini halaman registerasi -->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    REGISTERASI
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="telp">No. Telp</label>
                            <input type="number" class="form-control" name="telp" placeholder="Masukkan Telp" required>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim" class="btn btn-primary">DAFTAR</button>
                    <a href="index.php?page=login" class="m-3">Sudah punya akun? Login disini</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- perintah utk registerasi -->
<?php
include 'config/koneksi.php';
if (isset($_POST['kirim'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = 'petugas';

    //untuk menyimpan/mengirim ke db
    $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('$nik',
    '$nama','$username','$password','$telp','$level')");

    //jika registerasi berhasil
    if ($query) {
        header('location:index.php?page=login');
    }
}

?>