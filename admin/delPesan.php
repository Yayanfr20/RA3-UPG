<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
require 'sistem/functions.php';
$id = $_GET['id'];
if (delPesan($id) > 0) {
	echo "
		<script>
			alert('Pesan berhasil dihapus!');
			document.location.href = 'pesan.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Pesan gagal dihapus!');
			document.location.href = 'pesan.php';
		</script>
	";
}
