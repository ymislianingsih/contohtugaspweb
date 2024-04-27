
<?php
session_start(); // Mulai session
include 'koneksi.php';

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);

if ($result) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mahasiswa</title>
    
    </head>
    
    <body>
        <nav>
            <h2>Selamat Datang!</h2>
            <div>
                <a href="home.php">Home</a>
                <a href="logout.php">Logout</a> 
            </div>
        </nav>

        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='update.php?id=" . $row['id'] . "' class='update-button'><button>Update</button></a>"; 
                echo "<a href='delete.php?id=" . $row['id'] . "' class='delete-button'><button>Delete</button></a>"; 
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <a href="add.php" class="add-button" class="btn btn-secondary"><button>Tambah Data</button></a>
        
    </body>
    
    </html>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
