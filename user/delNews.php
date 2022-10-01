<?php
session_start();

if (!isset($_SESSION["user"])) {
	header("Location: ../login.php");
	exit;
}
require '../admin/sistem/functions.php';
$id = $_GET['id'];
if (delNews($id) > 0) {
	echo "
		<script>
			alert('Berita berhasil dihapus!');
			document.location.href = 'readInfo.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Berita gagal dihapus!');
			document.location.href = 'readInfo.php';
		</script>
	";
}
