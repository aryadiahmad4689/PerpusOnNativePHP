<?php


require 'utility.php';


function tambah($data) {
	global $conn;

	$kodePeminjaman = htmlspecialchars($data["kode_peminjaman"]);
	$kodeBuku = htmlspecialchars($data["kode_buku"]);
	$kodeAnggota = htmlspecialchars($data["kode_anggota"]);
	$tanggal = htmlspecialchars($data["tanggal"]);


    
    $sql = "INSERT INTO peminjaman
    VALUES
('$kodePeminjaman', '$kodeBuku', '$kodeAnggota', '$tanggal')";

mysqli_query($conn, $sql);

return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["kode_peminjaman"];
	$kodeBuku = htmlspecialchars($data["kode_buku"]);
	$kodeAnggota = htmlspecialchars($data["kode_anggota"]);
	$tanggal = htmlspecialchars($data["tanggal"]);


	$sql = "UPDATE peminjaman SET
				kode_buku = '$kodeBuku',
				kode_anggota = '$kodeAnggota',
				tanggal_peminjaman = '$tanggal'
			WHERE
				kode_peminjaman = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "delete from peminjaman where kode_peminjaman = $id");

	return mysqli_affected_rows($conn);
}