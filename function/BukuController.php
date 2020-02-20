<?php

require 'utility.php';



function tambah($data) {
	global $conn;

	$kode = htmlspecialchars($data["kode"]);
	$judul = htmlspecialchars($data["judul"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$penulis = htmlspecialchars($data["penulis"]);
	$tahun = htmlspecialchars($data["tahun"]);


	// jika user tidak pilih gambar
	if( $_FILES['gambar']['error'] == 4 ) {
		echo "<script>
				alert('harap pilih gambar terlebih dahulu!');
				document.location.href = 'tambah.php';
			  </script>";
		return false;
	}

	if( ! cek_gambar() ) {
		return false;
	}

	// buat nama file baru
	$ekstensiGambar = explode('.', $_FILES['gambar']['name']);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	$nama_file_baru = uniqid() . '.' . $ekstensiGambar;
	$gambar = $nama_file_baru;

	move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/' . $gambar);

	$sql = "INSERT INTO buku
				VALUES
			('$kode', '$judul', '$penulis', '$penerbit', '$tahun', '$gambar')";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}



function ubah($data) {
	global $conn;

	$id = $data["kode"];
	$judul = htmlspecialchars($data["judul"]);
	$penerbit = htmlspecialchars($data["penerbit"]);
	$penulis = htmlspecialchars($data["penulis"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$gambar = htmlspecialchars($data["gambar_lama"]);

	// cek apakah user upload gambar baru
	if( $_FILES['gambar']['error'] === 0 ) {
		// cek gambar
		if( ! cek_gambar() ) {
			return false;
		}

		// upload gambar baru
		$ekstensiGambar = explode('.', $_FILES['gambar']['name']);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		$nama_file_baru = uniqid() . '.' . $ekstensiGambar;
		$gambar = $nama_file_baru;

		move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/' . $gambar);
	}

	$sql = "UPDATE buku SET
				judul = '$judul',
				penulis = '$penulis',
				penerbit = '$penerbit',
				tahun_terbit = '$tahun',
				gambar = '$gambar'
			WHERE
				kode_buku = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "delete from buku where kode_buku = $id");

	return mysqli_affected_rows($conn);
}