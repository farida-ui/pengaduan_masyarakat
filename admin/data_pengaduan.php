<div class="container">
    <div class="row">
        <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                    DATA PENGADUAN
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NAMA</th>
                                <th>JUDUL</th>
                                <th>LAPORAN</th>
                                <th>FOTO</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT a.*,b.* FROM pengaduan a INNER JOIN masyarakat b ON 
                        a.nik=b.nik ORDER BY id_pengaduan DESC");
                            while ($data = mysqli_fetch_array($query)) { ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['tgl_pengaduan'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
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
                                    <?php if ($data['status'] != 'selesai') { ?>
                                    <a href="verifikasi_pengaduan.php?verifikasi=<?php echo $data['id_pengaduan'] ?>"
                                        class="btn btn-primary btn-sm">VERIFIKASI</a>
                                    <?php } ?>


                                    <?php
                                        if ($data['status'] == 'proses') { ?>
                                    <a href="verifikasi_tanggapan.php?tanggapan=<?php echo $data['id_pengaduan'] ?>"
                                        class="btn btn-warning btn-sm">TANGGAPI</a>

                                        <?php } ?>
                                        <form action=" edit_data.php" method="POST">
                                        <input type="hidden" name="id_pengaduan" class="form-control"
                                            value="<?php echo $data['id_pengaduan'] ?>">


                                        <button type="submit" name="hapus_pengaduan" class="btn btn-danger"
                                            onclick="return confirm('anda yakin menghapus?');">HAPUS</button>

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