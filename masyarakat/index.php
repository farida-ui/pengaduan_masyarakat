<?php

// agar bisa melakukan panggilan nama pada home.php
session_start();
if (empty($_SESSION['login'] == 'masyarakat')) {
    header("location:../index.php");
}
include '../layouts/header.php';


include  'home.php';


include '../layouts/footer.php';
