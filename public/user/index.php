<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/AuthController.php';

$users = query("SELECT * FROM users");
?>

<?php
require_once '../template/header.php'
?>
   <h1 style="text-align:center;" class="m-2">Selamat Datang Admin</h1>

   <div class="container">
    <!-- <a href="<?= $baseURL; ?>/peminjaman/tambah.php" class="btn btn-success m-2">Tambah Peminjaman</a> -->
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Password</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($users as $b) :?>
      <tr>
        <th><?php echo $b['username']; ?></th>
        <td><?php echo $b['password']; ?></td>


        <!-- <td>
        <a href="<?= $baseURL; ?>/peminjaman/edit.php?id=<?= $b['kode_anggota']; ?>" class="btn btn-warning">Edit</a> ||
        <a href="<?= $baseURL; ?>/peminjaman/hapus.php?id=<?= $b['kode_anggota']; ?>"class="btn btn-danger">Delete</a>
        </td>
      </tr> -->
    </tbody>
    <?php endforeach ?>
    
  </table>


</div>
   <?php
require_once '../template/footer.php'
?>