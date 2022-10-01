<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit;
}
require '../admin/sistem/functions.php';
$id = $_GET['id'];
if (delList($id) > 0) {
    echo "
		<script>
			alert('berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('gagal dihapus!');
			document.location.href = 'index.php';
		</script>
	";
}
