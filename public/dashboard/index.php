<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}

?>

<?php
require_once '../template/header.php'
?>
   <h1 style="text-align:center;" class="m-2">Selamat Datang Admin</h1>
   <?php
require_once '../template/footer.php'
?>