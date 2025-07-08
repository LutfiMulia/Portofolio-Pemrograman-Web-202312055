<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $conn->query("INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 0 8px rgba(204, 102, 153, 0.2);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #cc3366;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #b82e5d;
        }
        a {
            text-decoration: none;
            color: #cc3366;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="post">
        Nama Produk: <br>
        <input type="text" name="nama_produk" required><br>
        Harga: <br>
        <input type="number" name="harga" required><br>
        Stok: <br>
        <input type="number" name="stok" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">← Kembali ke daftar</a>
</body>
</html>
