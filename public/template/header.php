


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerpusON</title>
    <style>
    a:hover{
      font-size:15px;
      color:blue;
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
$baseURL = 'http://localhost.test/FinalRekayasaWeb/public';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <p class="navbar-brand" style="color:red;" >PerpusON</p>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= $baseURL; ?>/buku">Buku </a>
        <a class="dropdown-item" href="<?= $baseURL; ?>/anggota">Daftar Anggota</a>
        <a class="dropdown-item" href="<?= $baseURL; ?>/denda">Pengaturan Denda</a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= $baseURL; ?>/peminjaman">Buku Peminjaman</a>
          <a class="dropdown-item" href="<?= $baseURL; ?>/pengembalian">Pengembalian</a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=$baseURL; ?>/laporandaftarbuku">Laporan Daftar Buku</a>
          <a class="dropdown-item" href="<?=$baseURL?>/laporandenda/index.php">Laporan Denda</a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu Akun
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= $baseURL;?>/user/index.php">User</a>
          <a class="dropdown-item" href="<?= $baseURL;?>/Auth/logout.php">Keluar</a>

      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>