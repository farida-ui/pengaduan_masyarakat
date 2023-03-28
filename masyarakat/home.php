<div class="container">
    <div class="row">
        <div class="col-md-12" mt-3>
            <!-- untuk memanggil nama yang login ke halaman masyarakat -->
            <p>Selamat Datang <?php echo $_SESSION['nama'] ?></p>
            <div class="card">
                <div class="card-header">
                    FROM PENGADUAN
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="judul_pengaduan">Judul Laporan</label>
                            <input type="text" class="form-control" name="judul_pengaduan" placeholder="Masukkan Judul"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="isi_laporan">Isi Laporan</label>
                            <textarea name="isi_laporan" class="form-control" placeholder="Masukkan Isi Laporan"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" required>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="kirim" class="btn btn-primary">KIRIM</button>
                    </div>
                </form>

                <?php
                include '../config/koneksi.php';
                $tanggal = date("Y-m-d");
                if (isset($_POST['kirim'])) {
                    $nik = htmlspecialchars($_SESSION['nik']);
                    $judul_pengaduan = htmlspecialchars($_POST['judul_pengaduan']);
                    $isi_laporan = htmlspecialchars($_POST['isi_laporan']);
                    $status = 0;
                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                    $lokasi = '../assets/img/';
                    $nama_foto = rand(0, 999) . '-' . $foto;

                    // memindahkan file
                    move_uploaded_file($tmp, $lokasi . $nama_foto);
                    $query = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('', '$tanggal', '$nik', '$judul_pengaduan',
                '$isi_laporan', '$nama_foto', '$status')");

                    echo " <script> 
                alert('Data berhasil dikirim!');
                window.location='index.php';
                </script>
                ";
                }
                ?>

            </div>
        </div>
    </div>

    <!-- ROW BARU -->
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    RIWAYAT PENGADUAN
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JUDUL</th>
                                <th>ISI</th>
                                <th>FOTO</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- untuk memasukkan data dinamis sesuai database-->
                            <?php
                            $no = 1;
                            $nik = $_SESSION['nik'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE $nik='$nik' ORDER BY id_pengaduan DESC");
                            // perulangan
                            while ($data = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['judul_pengaduan'] ?></td>
                                <td><?php echo $data['isi_laporan'] ?></td>
                                <td><img src="../assets/img/<?php echo $data['foto'] ?>" width="100"></td>
                                <td>
                                    <?php
                                        if ($data['status'] == 'proses') {
                                            echo "<span class='badge bg-warning'>Proses</span>";
                                        } elseif ($data['status'] == 'selesai') {
                                            echo "<span class='badge bg-success'>Selesai</span>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Menunggu</span>";
                                        }
                                        ?>
                                </td>
                                <td>

                                    <form action="edit_data.php" method="POST">
                                        <input type="hidden" name="id_pengaduan"
                                            value="<?php echo $data['id_pengaduan'] ?>">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('anda yakin menghapus?');"
                                            name="hapus_pengaduan">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>