<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PeminjamanController.php';
$sql = "SELECT * FROM peminjaman";
$peminjaman = query($sql);

?>

<?php
require_once '../template/header.php'
?>

  <div class="container">
    <a href="<?= $baseURL; ?>/peminjaman/tambah.php" class="btn btn-success m-2">Tambah Peminjaman</a>
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Kode Peminjaman</th>
        <th scope="col">Kode Buku</th>
        <th scope="col">Kode Anggota</th>
        <th scope="col">Tanggal Peminjaman</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($peminjaman as $b) :?>
      <tr>
        <th><?php echo $b['kode_peminjaman']; ?></th>
        <td><?php echo $b['kode_buku']; ?></td>
        <td><?php echo $b['kode_anggota']; ?></td>
        <td><?php echo $b['tanggal_peminjaman']; ?></td>

        <td>
        <a href="<?= $baseURL; ?>/peminjaman/edit.php?id=<?= $b['kode_anggota']; ?>" class="btn btn-warning">Edit</a> ||
        <a href="<?= $baseURL; ?>/peminjaman/hapus.php?id=<?= $b['kode_anggota']; ?>"class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
    <?php endforeach ?>
    
  </table>


</div>


<?php
require_once '../template/footer.php'
?>




