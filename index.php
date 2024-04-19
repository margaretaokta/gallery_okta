<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
        }

        nav ul li a:hover {
            color: #666;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Halaman Landing</h1>
    </header>
    <div class="container">
        <?php
        session_start();
        if (!isset($_SESSION['user_id'])) {
        ?>
            <nav>
                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        <?php
        } else {
        ?>
            <p>Selamat datang <b><?= $_SESSION['nama_lengkap'] ?></b></p>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="album.php">Album</a></li>
                    <li><a href="foto.php">Foto</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        <?php
        }
        ?>
    </div>
</body>

</html>



<!-- <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        $sql = mysqli_query($conn, "select * from foto,user where foto.user_id=user.user_id");
        if (!$sql) {
            echo "Query error: " . mysqli_error($conn);
        } else {
            while ($data = mysqli_fetch_array($sql)) {
        ?>
                <tr>
                    <td><?= $data['foto_id'] ?></td>
                    <td><?= $data['judul_foto'] ?></td>
                    <td><?= $data['deskripsi_foto'] ?></td>
                    <td>
                        <img src="gambar/<?= $data['lokasifile'] ?>" width="200px">
                    </td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td>
                        <?php
                        $fotoid = $data['foto_id'];
                        $sql2 = mysqli_query($conn, "select * from like_foto where foto_id='$fotoid'");
                        if ($sql2) {
                            echo mysqli_num_rows($sql2);
                        } else {
                            echo "0";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="like.php?foto_id=<?= $data['foto_id'] ?>">Like</a>
                        <a href="komentar.php?foto_id=<?= $data['foto_id'] ?>">Komentar</a>
                    </td>
                </tr>
        <?php
            }
        }
        mysqli_close($conn);
        ?>
    </table> -->

</body>

</html>