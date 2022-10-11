<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit;
}
require '../admin/sistem/functions.php';
$id = $_GET['id'];
if (delTugas($id) > 0) {
    echo "
		<script>
			alert('Link Input Tugas berhasil dihapus!');
			document.location.href = 'AllTugas.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Link Input Tugas gagal dihapus!');
			document.location.href = 'AllTugas.php';
		</script>
	";
}
