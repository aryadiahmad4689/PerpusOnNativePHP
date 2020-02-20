<?php


require 'utility.php';

function tambah($data) {
	global $conn;

	$kodePeminjaman = htmlspecialchars($data["kode"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$denda = htmlspecialchars($data["denda"]);


    
    $sql = "INSERT INTO pengembalian
    VALUES
('$kodePeminjaman', '$tanggal', '$denda')";

mysqli_query($conn, $sql);

return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["kode"];
	$tanggal = htmlspecialchars($data["tanggal"]);
	$denda = htmlspecialchars($data["denda"]);


	$sql = "UPDATE pengembalian SET
				tanggal_pengembalian = '$tanggal',
				denda = '$denda'
			WHERE
				kode_peminjaman = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "delete from pengembalian where kode_peminjaman = $id");

	return mysqli_affected_rows($conn);
}