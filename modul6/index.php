<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            padding: 20px;
            color: #333;
        }
        h2 {
            color: #cc3366;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(204, 102, 153, 0.2);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #f8d7da;
        }
        th {
            background-color: #f7c5d4;
            color: #660033;
        }
        tr:hover {
            background-color: #ffe6ec;
        }
        a {
            text-decoration: none;
            color: #cc3366;
            margin-right: 10px;
        }
        .btn {
            background-color: #f7c5d4;
            border: none;
            padding: 8px 16px;
            color: #660033;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #f4b1c3;
        }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="tambah.php" class="btn">Tambah Produk Baru</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th><th>Nama Produk</th><th>Harga</th><th>Stok</th><th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_produk'] ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id_produk'] ?>" class="btn">Edit</a>
                <a href="hapus.php?id=<?= $row['id_produk'] ?>" class="btn" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
