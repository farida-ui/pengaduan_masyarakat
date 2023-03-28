<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    DATA TANGGAPAN
                </div>
                <div class="card-body">
                    <a href="export_tanggapan.php" class="btn btn-success" target="_blank">Export Excel</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NIK</th>
                                <th>JUDUL</th>
                                <th>TANGGAPAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT a.*,b.* FROM tanggapan a INNER JOIN pengaduan b ON 
                        a.id_pengaduan=b.id_pengaduan");
                            while ($data = mysqli_fetch_array($query)) { ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['tgl_tanggapan'] ?></td>
                                <td><?php echo $data['nik'] ?></td>
                                <td><?php echo $data['judul_pengaduan'] ?></td>
                                <td><?php echo $data['tanggapan'] ?></td>
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
                                        <input type="hidden" name="id_tanggapan" class="form-control"
                                            value="<?php echo $data['id_tanggapan'] ?>">
                                        <button type="submit" name="hapus_tanggapan" class="btn btn-danger"
                                            onclick="return confirm('anda yakin mau menghapus tanggapan ini?');">HAPUS</button>

                                    </form>
                                </td>
                            <tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>