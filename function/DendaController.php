<?php
require 'utility.php';

function ubah($data) {
	global $conn;

	// $id = $data["kode"];
	$batas = htmlspecialchars($data["batasWaktu"]);
	$denda = htmlspecialchars($data["denda"]);


	$sql = "UPDATE pengaturan_denda SET
				batas_waktu = '$batas',
				denda = '$denda'";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}