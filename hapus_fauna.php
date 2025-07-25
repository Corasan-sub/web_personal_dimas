<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM fauna WHERE id_fauna=$id");
header("Location: tampil_data.php");
?>