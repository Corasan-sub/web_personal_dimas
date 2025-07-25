<<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_fauna'];
    $kategori = $_POST['id_kategori'];
    $habitat = $_POST['id_habitat'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO fauna (nama_fauna, id_kategori, id_habitat, deskripsi) 
            VALUES ('$nama', $kategori, $habitat, '$deskripsi')";
    mysqli_query($conn, $sql);
    echo "Data berhasil ditambahkan! <a href='tampil_data.php'>Lihat Data</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Fauna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Database Fauna Asli Indonesia</h1>
    <nav>
        <a href="index.php">Beranda</a> |
        <a href="tampil_data.php">Lihat Data Fauna</a> |
        <a href="tambah_fauna.php">Tambah Fauna</a>
    </nav>

    <h2 style="text-align: center;">Tambah Fauna Baru</h2>
    <form method="post" style="width: 50%; margin: auto;">
        Nama Fauna: <input type="text" name="nama_fauna" required><br><br>
        Kategori: 
        <select name="id_kategori">
            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM kategori");
            while ($row = mysqli_fetch_assoc($kategori)) {
                echo "<option value='{$row['id_kategori']}'>{$row['nama_kategori']}</option>";
            }
            ?>
        </select><br><br>
        Habitat: 
        <select name="id_habitat">
            <?php
            $habitat = mysqli_query($conn, "SELECT * FROM habitat");
            while ($row = mysqli_fetch_assoc($habitat)) {
                echo "<option value='{$row['id_habitat']}'>{$row['nama_habitat']}</option>";
            }
            ?>
        </select><br><br>
        Deskripsi: <br><textarea name="deskripsi" rows="4" cols="40"></textarea><br><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
