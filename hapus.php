<?php
include 'koneksi.php';

// Pastikan ada ID yang dikirim
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus
    $hapus = mysqli_query($conn, "DELETE FROM alumni WHERE id='$id'");

    if ($hapus) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location='index.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location='index.php';
          </script>";
}
?>