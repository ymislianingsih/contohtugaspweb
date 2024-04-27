<?php
include 'koneksi.php';

// Periksa apakah parameter ID dan konfirmasi diterima
if(isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM mahasiswa WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header("Location: home.php");
    exit();
} else {
    echo "Parameter ID atau konfirmasi tidak ditemukan.";
    exit();
}
?>
