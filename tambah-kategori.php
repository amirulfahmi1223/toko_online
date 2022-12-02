<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online | Shop</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Source+Code+Pro:ital,wght@1,500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>SenengTuku</h1>
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="Profil.php">Profil</a></li>
                    <li><a href="data-kategori.php">Data Kategori</a></li>
                    <li><a href="data-produk.php">Data Produk</a></li>
                    <li><a href="keluar.php">Keluar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--Content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori<h3>
                    <div class="box">
                        <form action="" method="POST">
                            <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                            <input type="submit" name="submit" value="Submit" class="btn">
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {

                            $nama = ucwords($_POST['nama']);

                            $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (

                                            null,
                                            '" . $nama . "')");
                            if ($insert) {
                                echo '<script>alert("Tambah Data Berhasil")</script>';
                                echo '<script>window.location="data-kategori.php"</script>';
                            } else {
                                echo 'gagal' . mysqli_error($conn);
                            }
                        }

                        ?>
                    </div>
        </div>
    </div>

    <!---footer--->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - FahmiCode.</small>
        </div>
    </footer>
</body>

</html>