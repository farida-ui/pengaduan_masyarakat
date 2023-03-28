<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    DATA PETUGAS
                </div>
                <div class="card-body">
                    <a href="index.php?page=tambah_petugas" class="btn btn-primary btn-sm">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>TELP</th>
                                <th>LEVEL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM petugas");
                            while ($data = mysqli_fetch_array($query)) { ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_petugas'] ?></td>
                                <td><?php echo $data['username'] ?></td>
                                <td><?php echo $data['telp'] ?></td>
                                <td><?php echo $data['level'] ?></td>
                                <td>
                                    <form action="edit_data.php" method="post">
                                        <input type="hidden" name="id_petugas" class="form-control"
                                            value="<?php echo $data['id_petugas'] ?>">
                                        <button type="submit" onclick="return confirm('anda yakin menghapus?');"
                                            name="hapus_petugas" class="btn btn-danger">HAPUS</button>
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