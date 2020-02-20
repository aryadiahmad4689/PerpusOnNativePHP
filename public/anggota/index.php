<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/AnggotaController.php';
$sql = "SELECT * FROM daftar_anggota";
$anggota = query($sql);

?>

<?php
require_once '../template/header.php'
?>

  <div class="container">
    <a href="<?= $baseURL; ?>/anggota/tambah.php" class="btn btn-success m-2">Tambah Anggota</a>
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Kode Anggota</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Alamat</th>
        <th scope="col">Gambar</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($anggota as $b) :?>
      <tr>
        <th><?php echo $b['kode_anggota']; ?></th>
        <td><?php echo $b['nama']; ?></td>
        <td><?php echo $b['jk']; ?></td>
        <td><?php echo $b['alamat']; ?></td>
        <td>  <img src="<?= $baseURL; ?>/img/<?= $b['foto'] ?>" alt="" width="80px" height="80px">
</td>
        
        <td>
        <a href="<?= $baseURL; ?>/anggota/edit.php?id=<?= $b['kode_anggota']; ?>" class="btn btn-warning">Edit</a> ||
        <a href="<?= $baseURL; ?>/anggota/hapus.php?id=<?= $b['kode_anggota']; ?>"class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
    <?php endforeach ?>
    
  </table>


</div>


<?php
require_once '../template/footer.php'
?>




