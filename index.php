<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengaduan Masyarakat | Farida</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="index.php" class="navbar-brand">Aplikasi Pengaduan Masyarakat</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=registerasi">Daftar Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'login':
                include 'login.php';
                break;
            case 'registerasi':
                include 'registerasi.php';
                break;

            default:
                echo "Halaman tidak tersedia";
                break;
        }
    } else {
        include  'home.php';
    }
    ?>

    <footer class="footer py-2 bg-light">
        <div class="container">
            <p class="text-center">UKK RPL 2023 | Farida | SMKN2KRA</p>
        </div>
    </footer>

</body>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</html>