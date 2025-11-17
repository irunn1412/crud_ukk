<?php
include 'koneksi.php';

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Ambil data alumni berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM alumni WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

// Jika tombol update ditekan
if (isset($_POST['update'])) {

    $nama           = $_POST['nama'];
    $tahun_lulus    = $_POST['tahun_lulus'];
    $jurusan        = $_POST['jurusan'];
    $pekerjaan      = $_POST['pekerjaan'];
    $telepon        = $_POST['telepon'];
    $email          = $_POST['email'];
    $alamat         = $_POST['alamat'];

    $update = mysqli_query($conn, "
        UPDATE alumni SET
            nama='$nama',
            tahun_lulus='$tahun_lulus',
            jurusan='$jurusan',
            pekerjaan='$pekerjaan',
            telepon='$telepon',
            email='$email',
            alamat='$alamat'
        WHERE id='$id'
    ");

    if ($update) {
        echo "<script>
                alert('Data berhasil diupdate!');
                window.location='index.php';
              </script>";
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Alumni</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 40px;
        }
        table td {
            padding: 10px;
            font-size: 15px;
        }
        input, textarea {
            width: 100%;
            padding: 7px;
            font-size: 14px;
        }
        .btn-update {
            background: #28a745;
            padding: 10px 20px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 6px;
        }
        .btn-cancel {
            background: #dc3545;
            padding: 10px 20px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 6px;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>EDIT DATA SISWA</h2>

    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td>
            </tr>

            <tr>
                <td>Tahun Lulus</td>
                <td><input type="number" name="tahun_lulus" value="<?= $data['tahun_lulus'] ?>" required></td>
            </tr>

            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required></td>
            </tr>

            <tr>
                <td>Pekerjaan Saat Ini</td>
                <td><input type="text" name="pekerjaan" value="<?= $data['pekerjaan'] ?>" required></td>
            </tr>

            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="telepon" value="<?= $data['telepon'] ?>" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?= $data['email'] ?>" required></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" rows="4" required><?= $data['alamat'] ?></textarea></td>
            </tr>
        </table>

        <br>

        <button type="submit" name="update" class="btn-update">Update Data</button>
        <a href="index.php"><button type="button" class="btn-cancel">Batal</button></a>
    </form>
</div>

</body>
</html>