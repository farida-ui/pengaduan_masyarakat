<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengaduan Masyarakat | Farida</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="index.php" class="navbar-brand">Aplikasi Pengaduan Masyarakat</a>
            <div class="collapse navbar-collapse justify-content-end">
                <div class="navbar-nav">
                    <!-- session untuk menampilkan saat berada pada login masyarakat dan admin -->
                    <?php
                    if ($_SESSION['login'] == 'admin') { ?>
                        <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
                        <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
                        <a class="nav-link" href="index.php?page=petugas">Data Petugas</a>
                        <a class="nav-link" href="index.php?page=masyarakat">Data Masyarakat</a>
                        <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

                    <?php } elseif ($_SESSION['login'] == 'petugas') { ?>
                        <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
                        <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
                        <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

                    <?php  } elseif ($_SESSION['login'] == 'masyarakat') { ?>
                        <a class="nav-link" href="../config/aksi_logout.php">Keluar</a>

                    <?php } else { ?>
                        <a class="nav-link" href="index.php?page=registerasi">Daftar Akun</a>
                        <a class="nav-link" href="index.php?page=login">Login</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>