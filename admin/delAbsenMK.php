<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require 'sistem/functions.php';
$id = $_GET['id'];
if (delAbsenMK($id) > 0) {
    echo "
		<script>
			alert('Kolom Absensi berhasil dihapus!');
			document.location.href = 'absensi.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Kolom Absensi gagal dihapus!');
			document.location.href = 'absensi.php';
		</script>
	";
}
