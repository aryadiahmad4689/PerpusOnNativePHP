<?php

require 'utility.php';


function tambah($data) {
	global $conn;

	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	// $foto = htmlspecialchars($data["foto"]);


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

	$sql = "INSERT INTO daftar_anggota
				VALUES
			('$kode', '$nama', '$jk', '$alamat', '$gambar')";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["kode"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
    $gambar = htmlspecialchars($data["gambar_lama"]);
	$jk = htmlspecialchars($data["jk_lama"]);
    

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
    
    if($data["jk"] != ""){
        $jk = $data["jk"];
    }

	$sql = "UPDATE daftar_anggota SET
				nama = '$nama',
				jk = '$jk',
				alamat = '$alamat',
				foto = '$gambar'
			WHERE
				kode_anggota = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "delete from daftar_anggota where kode_anggota = $id");

	return mysqli_affected_rows($conn);
}