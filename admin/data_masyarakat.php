<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    DATA MASYARAKAT
                </div>
                <div class="card-body">
                    <a href="index.php?page=tambah_masyarakat" class="btn btn-primary btn-sm">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>TELP</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM masyarakat");
                            while ($data = mysqli_fetch_array($query)) { ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nik'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['username'] ?></td>
                                    <td><?php echo $data['telp'] ?></td>
                                    <td>

                                        <form action="edit_data.php" method="POST">
                                            <input type="hidden" name="nik" class="form-control" value="<?php echo $data['nik'] ?>">
                                            <button type="submit" name="hapus_masyarakat" class="btn btn-danger" onclick="return confirm('anda yakin menghapus?');">HAPUS</button>
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