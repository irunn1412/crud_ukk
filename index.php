<?php
include 'koneksi.php';

// Jika melakukan pencarian
$cari = "";
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $query = mysqli_query($conn, "SELECT * FROM alumni 
                                  WHERE nama LIKE '%$cari%' 
                                  OR jurusan LIKE '%$cari%' 
                                  OR pekerjaan LIKE '%$cari%'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM alumni ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Alumni</title>
    <style>
        body {
            font-family: Arial;
            background: #f7f7f7;
        }
        .header {
            background: #0056b3;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 22px;
        }
        .container {
            width: 90%;
            margin: auto;
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background: #007bff;
            color: white;
            padding: 10px;
        }
        td {
            padding: 8px;
            text-align: center;
        }
        .btn-tambah {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn-edit {
            background: #ffc107;
            padding: 5px 10px;
            border-radius: 5px;
            color: black;
            text-decoration: none;
        }
        .btn-hapus {
            background: #dc3545;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }
        .search-box {
            margin-bottom: 15px;
        }
        input[type="text"] {
            width: 250px;
            padding: 8px;
        }
        .btn-cari {
            padding: 8px 12px;
            background: #17a2b8;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="header">APLIKASI DATA ALUMNI</div>

<div class="container">

    <h2>DATA ALUMNI SMK TELKOM LAMPUNG</h2>

    <a href="tambah.php" class="btn-tambah">TAMBAH DATA</a>

    <form method="GET" class="search-box">
        <input type="text" name="cari" placeholder="Pencarian data..." value="<?= $cari ?>">
        <button class="btn-cari">Cari Data</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tahun Lulus</th>
            <th>Jurusan</th>
            <th>Pekerjaan</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['tahun_lulus'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['pekerjaan'] ?></td>
            <td><?= $row['telepon'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <a class="btn-edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="btn-hapus" href="hapus.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>

        <?php 
            }
        } else { 
        ?>

        <tr>
            <td colspan="9">Data tidak ditemukan</td>
        </tr>

        <?php } ?>
    </table>
</div>

</body>
</html>