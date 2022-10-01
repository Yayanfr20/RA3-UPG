<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
require 'sistem/functions.php';
$id = $_GET['id'];
if (delImages($id) > 0) {
	echo "
		<script>
			alert('Images berhasil dihapus!');
			document.location.href = 'gallery.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Images gagal dihapus!');
			document.location.href = 'gallery.php';
		</script>
	";
}
