<?php
session_start();
include 'koneksi.php';

$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (nama, alamat, jurusan) VALUES ('$nama', '$alamat', '$jurusan')";

    if (mysqli_query($conn, $sql)) {
        $status = "Data berhasil ditambahkan!";
        header("Location: home.php");
        exit();
    } else {
        $status = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

</head>

<body>
    <h2>Form Tambah Data Mahasiswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>
        <button type="submit">Tambah Data</button>
    </form>
</body>

</html>