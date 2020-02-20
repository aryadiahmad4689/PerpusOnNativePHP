<?php


$conn = mysqli_connect("localhost", "root", "", "db_rekayasa_web");


	
function query($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}


function cek_gambar() {
	// ambil data gambar
	$gambar = $_FILES["gambar"]["name"];
	$tmp_name = $_FILES["gambar"]["tmp_name"];
	$ukuran = $_FILES["gambar"]["size"];
	$tipe = $_FILES["gambar"]["type"];
	$error = $_FILES["gambar"]["error"];

	// pengecekan gambar
	// jika ukuran file melebihi 5MB
	if( $ukuran > 5000000 ) {
		echo "<script>
				alert('ukuran file terlalu besar!');
				document.location.href = '';
			  </script>";
		return false;
	}

	// jika bukan gambar
	$tipeGambarAman = ['jpg', 'jpeg', 'png', 'gif'];
	$ekstensiGambar = explode('.', $gambar);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( ! in_array($ekstensiGambar, $tipeGambarAman) ) {
		echo "<script>
				alert('yang anda pilih bukan gambar!');
				document.location.href = '';
			  </script>";
		return false;
	}

	return true;
}