<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/BukuController.php';
$sql = "SELECT * FROM pengembalian";
$pengembalian = query($sql);

?>

<?php
require_once '../template/header.php'
?>

  <div class="container">
    <a href="<?= $baseURL; ?>/pengembalian/tambah.php" class="btn btn-success m-2">Tambah Pengembalian</a>
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Kode Peminjaman</th>
        <th scope="col">Tanggal Pengembalian</th>
        <th scope="col">Denda</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($pengembalian as $b) :?>
      <tr>
        <th><?php echo $b['kode_peminjaman']; ?></th>
        <td><?php echo $b['tanggal_pengembalian']; ?></td>
        <td><?php echo $b['denda']; ?></td>
        <td>
        <a href="<?= $baseURL; ?>/pengembalian/edit.php?id=<?= $b['kode_peminjaman']; ?>" class="btn btn-warning">Edit</a> ||
        <a href="<?= $baseURL; ?>/pengembalian/hapus.php?id=<?= $b['kode_peminjaman']; ?>"class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
    <?php endforeach ?>
    
  </table>


</div>


<?php
require_once '../template/footer.php'
?>




