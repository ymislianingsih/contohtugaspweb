<?php
include 'koneksi.php';

// Periksa apakah parameter ID diterima
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Tambahkan konfirmasi delete
    echo "<script>
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (confirmation) {
                // Jika pengguna mengonfirmasi delete, maka hapus data
                window.location.href = 'proses_delete.php?id=$id&confirm=yes';
            } else {
                // Jika pengguna membatalkan delete, maka kembali ke halaman utama
                window.location.href = 'home.php';
            }
          </script>";

    // Keluar untuk mencegah eksekusi kode selanjutnya setelah alert
    exit();
} else {
    // Jika parameter ID tidak ditemukan, berikan pesan kesalahan
    echo "Parameter ID tidak ditemukan.";
    exit();
}
?>
