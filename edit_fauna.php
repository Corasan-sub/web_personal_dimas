<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fauna WHERE id_fauna=$id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_fauna'];
    $kategori = $_POST['id_kategori'];
    $habitat = $_POST['id_habitat'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "UPDATE fauna SET nama_fauna='$nama', id_kategori=$kategori, id_habitat=$habitat, deskripsi='$deskripsi' 
            WHERE id_fauna=$id";
    mysqli_query($conn, $sql);
    echo "Data berhasil diubah! <a href='tampil_data.php'>Kembali</a>";
    exit;
}
?>
<h2>Edit Fauna</h2>
<form method="post">
    Nama Fauna: <input type="text" name="nama_fauna" value="<?= $data['nama_fauna'] ?>" required><br>
    Kategori: 
    <select name="id_kategori">
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
        while ($row = mysqli_fetch_assoc($kategori)) {
            $selected = $row['id_kategori'] == $data['id_kategori'] ? 'selected' : '';
            echo "<option value='{$row['id_kategori']}' $selected>{$row['nama_kategori']}</option>";
        }
        ?>
    </select><br>
    Habitat: 
    <select name="id_habitat">
        <?php
        $habitat = mysqli_query($conn, "SELECT * FROM habitat");
        while ($row = mysqli_fetch_assoc($habitat)) {
            $selected = $row['id_habitat'] == $data['id_habitat'] ? 'selected' : '';
            echo "<option value='{$row['id_habitat']}' $selected>{$row['nama_habitat']}</option>";
        }
        ?>
    </select><br>
    Deskripsi: <br><textarea name="deskripsi" rows="4" cols="40"><?= $data['deskripsi'] ?></textarea><br>
    <input type="submit" value="Update">
</form>
<a href="tampil_data.php">Kembali</a>