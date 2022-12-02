<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "'");
$p = mysqli_fetch_object($produk);

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
                <a href="index.php">
                    <h1>SenengTuku</h1>
                </a>
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
            <h3>Edit Data Produk<h3>
                    <div class="box">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <select class="input-control" name="kategori" required>
                                <option value="">--- Pilih ---</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?>

                                    <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                <?php }   ?>


                            </select>
                            <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                            <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                            <textarea class="input-control" name="deskripsi"></textarea>
                            <input type="file" name="gambar" class="input-control" placeholder="" required>

                            <select class="input-control" name="status">
                                <option value="">--Pilih--</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <input type="submit" name="submit" value="Submit" class="btn">
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
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
    <!-- CkEditor sendiri sesuai dengan name dan menggunakan textarea
    jika ingin mencoba rubah deskripsi sesusai dengan name yang anda miliki -->
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html>