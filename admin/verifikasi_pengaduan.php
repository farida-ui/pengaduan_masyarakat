<?php session_start();
if (empty($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'petugas')) {
    header("location:../index.php");
}
include '../layouts/header.php';
include '../config/koneksi.php';
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
                            value="<?php echo $_GET['verifikasi'] ?>">
                        <div class="row mb-3">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <select class="form-control" name="status">
                                    <option value="proses">Proses</option>
                                    <option value="0">Tolak</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim" class="btn btn-primary">Verifikasi</button>
                    </form>
                </div>       
            </div>

        </div>
    </div>
</div>

<?php
if (isset($_POST['kirim'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $status = $_POST['status'];

    $query = mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
    echo " <script>
    alert('Data berhasil diverifikasi!');
     window.location='index.php?page=pengaduan';
    </script> ";
}
?>

<?php include '../layouts/footer.php'; ?>