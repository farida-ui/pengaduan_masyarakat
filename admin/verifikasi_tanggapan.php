<?php session_start();
if (empty($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'petugas')) {
    header("location:../index.php");
}
include '../layouts/header.php';
include '../config/koneksi.php';

$id = $_GET['tanggapan'];
$query = mysqli_query($koneksi, "SELECT a.*,b.* FROM pengaduan a INNER JOIN masyarakat b ON 
                        a.nik=b.nik WHERE id_pengaduan = $id ORDER BY id_pengaduan DESC");
$data = mysqli_fetch_array($query);
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-4 mt-5">
            <div class="card">
                <div class="card-header">
                    Status
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id_pengaduan" class="form-control"
                            value="<?php echo $_GET['tanggapan'] ?>">
                        <div class="row mb-3">
                            <label class="col-md-4">Tanggal</label>
                            <div class="col-md-8">
                                <input type="text" name="tgl_pengaduan" class="form-control"
                                    value="<?php echo $data['tgl_pengaduan'] ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4">Judul</label>
                            <div class="col-md-8">
                                <input type="text" name="judul_pengaduan" class="form-control"
                                    value="<?php echo $data['judul_pengaduan'] ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4">Isi</label>
                            <div class="col-md-8">
                                <textarea name="isi_laporan" class="form-control"
                                    readonly><?php echo $data['isi_laporan'] ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4">Foto</label>
                            <img src="../assets/img/<?php echo $data['foto'] ?>" width="100">
                            <div class="col-md-8">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4">Tanggapan</label>
                            <div class="col-md-8">
                                <textarea name="tanggapan" class="form-control" required></textarea>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim_tanggapan" class="btn btn-warning">TANGGAPI</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if (isset($_POST['kirim_tanggapan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $id_petugas = $_SESSION['id_petugas'];
    $tanggal = date("Y-m-d");
    $tanggapan = htmlspecialchars($_POST['tanggapan']);

    $query_tanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan VALUES ('', '$id_pengaduan','$tanggal','$tanggapan','$id_petugas')");
    if ($tanggapan != NULL) {
        $update = mysqli_query($koneksi, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$id_pengaduan' ");
    }
    echo " <script>
    alert('Data berhasil ditanggapi!');
    window.location='index.php?page=pengaduan';
  </script>
 ";
}
?>

<?php include '../layouts/footer.php'; ?>