<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM produk WHERE id_produk=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $conn->query("UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
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
    <h2>Edit Produk</h2>
    <form method="post">
        Nama Produk: <br>
        <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" required><br>
        Harga: <br>
        <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>
        Stok: <br>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">← Kembali ke daftar</a>
</body>
</html>
