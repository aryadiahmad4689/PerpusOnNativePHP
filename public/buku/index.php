<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/BukuController.php';
$sql = "SELECT * FROM buku";
$buku = query($sql);

?>

<?php
require_once '../template/header.php'
?>

  <div class="container">
    <a href="<?= $baseURL; ?>/buku/tambah.php" class="btn btn-success m-2">Tambah Buku</a>
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Kode Buku</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Penulis</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Tahun Terbit</th>
        <th scope="col">Gambar</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($buku as $b) :?>
      <tr>
        <th><?php echo $b['kode_buku']; ?></th>
        <td><?php echo $b['judul']; ?></td>
        <td><?php echo $b['penulis']; ?></td>
        <td><?php echo $b['penerbit']; ?></td>
        <td><?php echo $b['tahun_terbit']; ?></td>
        <td> <img src="<?= $baseURL; ?>/img/<?= $b['gambar'] ?>" alt="" width="80px" height="80px"></td>
        <td>
        <a href="<?= $baseURL; ?>/buku/edit.php?id=<?= $b['kode_buku']; ?>" class="btn btn-warning">Edit</a> ||
        <a href="<?= $baseURL; ?>/buku/hapus.php?id=<?= $b['kode_buku']; ?>"class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
    <?php endforeach ?>
    
  </table>


</div>


<?php
require_once '../template/footer.php'
?>




