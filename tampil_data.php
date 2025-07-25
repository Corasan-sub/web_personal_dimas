<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Fauna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Database Fauna Asli Indonesia</h1>
    <nav>
        <a href="index.php">Beranda</a> |
        <a href="tampil_data.php">Lihat Data Fauna</a> |
        <a href="tambah_fauna.php">Tambah Fauna</a>
    </nav>

    <h2 style="text-align: center;">Daftar Fauna</h2>
    <table border="1">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Habitat</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php
    $sql = "SELECT f.id_fauna, f.nama_fauna, k.nama_kategori, h.nama_habitat, f.deskripsi
            FROM fauna f
            JOIN kategori k ON f.id_kategori = k.id_kategori
            JOIN habitat h ON f.id_habitat = h.id_habitat";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['nama_fauna']}</td>
                <td>{$row['nama_kategori']}</td>
                <td>{$row['nama_habitat']}</td>
                <td>{$row['deskripsi']}</td>
                <td>
                    <a href='edit_fauna.php?id={$row['id_fauna']}'>Edit</a> | 
                    <a href='hapus_fauna.php?id={$row['id_fauna']}' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
                </td>
              </tr>";
    }
    ?>
    </table>
</body>
</html>
