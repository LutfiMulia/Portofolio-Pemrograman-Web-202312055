<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEEB; /* Biru langit */
            padding: 20px;
        }

        .container {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #001F3F; /* Navy */
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #001F3F;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #001F3F; /* Navy */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #004080; /* Lebih terang sedikit dari navy */
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .data-display {
            margin-top: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Buku Tamu Digital STITEK Bontang</h1>

    <?php
    // Inisialisasi variabel
    $nama = $email = $pesan = "";
    $error = "";

    // Proses form jika ada POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = trim($_POST["nama"]);
        $email = trim($_POST["email"]);
        $pesan = trim($_POST["pesan"]);

        // Validasi input kosong
        if (empty($nama) || empty($email) || empty($pesan)) {
            $error = "Semua kolom wajib diisi!";
        } else {
            // Bersihkan input (mencegah XSS)
            $nama = htmlspecialchars($nama);
            $email = htmlspecialchars($email);
            $pesan = htmlspecialchars($pesan);

            echo "<div class='success'>
                    <strong>Terima kasih atas pesan Anda!</strong>
                    <div class='data-display'>
                        <p><strong>Nama:</strong> $nama</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Pesan:</strong><br>$pesan</p>
                    </div>
                </div>";
        }
    }
    ?>

    <?php if (!empty($error)) : ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Form Input -->
    <form method="post" action="">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

        <label for="pesan">Pesan / Komentar:</label>
        <textarea id="pesan" name="pesan" rows="4"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>

        <button type="submit">Kirim Pesan</button>
    </form>
</div>

</body>
</html>
