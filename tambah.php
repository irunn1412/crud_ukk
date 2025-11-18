<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $nama           = $_POST['nama'];
    $tahun_lulus    = $_POST['tahun_lulus'];
    $jurusan        = $_POST['jurusan'];
    $pekerjaan      = $_POST['pekerjaan'];
    $telepon        = $_POST['telepon'];
    $email          = $_POST['email'];
    $alamat         = $_POST['alamat'];

    $query = mysqli_query($conn, "
        INSERT INTO alumni (nama, tahun_lulus, jurusan, pekerjaan, telepon, email, alamat)
        VALUES ('$nama', '$tahun_lulus', '$jurusan', '$pekerjaan', '$telepon', '$email', '$alamat')
    ");

    if ($query) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location='index.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <h2>TAMBAH DATA SISWA</h2>

    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>

            <tr>
                <td>Tahun Lulus</td>
                <td><input type="number" name="tahun_lulus" required></td>
            </tr>

            <tr>
    <td>Jurusan</td>
    <td>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TJAT">TJAT</option>
            <option value="ANIMASI">ANIMASI</option>
        </select>
    </td>
</tr>


            <tr>
                <td>Pekerjaan Saat Ini</td>
                <td><input type="text" name="pekerjaan" required></td>
            </tr>

            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="telepon" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required></textarea></td>
            </tr>
        </table>

        <br>

        <button type="submit" name="simpan" class="btn-update">Simpan</button>
        <a href="index.php"><button type="button" class="btn-cancel">Batal</button></a>
    </form>

</div>

</body>
</html>