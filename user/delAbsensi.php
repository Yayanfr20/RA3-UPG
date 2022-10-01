<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit;
}
require '../admin/sistem/functions.php';
$id = $_GET['id'];
if (delAbsenMK($id) > 0) {
    echo "
		<script>
			alert('Kolom Absensi berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Kolom Absensi gagal dihapus!');
			document.location.href = 'index.php';
		</script>
	";
}
