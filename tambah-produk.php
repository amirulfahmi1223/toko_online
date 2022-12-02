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
            <h3>Tambah Data Produk<h3>
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
                            <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
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

                            //print_r($_FILES['gambar']);

                            //menampung inputan dari form
                            $kategori   = $_POST['kategori'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $deskripsi  = $_POST['deskripsi'];
                            $status     = $_POST['status'];

                            //Menampung data file yg diupload
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            $type1 = explode('.', $filename);
                            $type2 = $type1[1];

                            $newname = 'produk' . time() . '.' . $type2;

                            //menampung data format file yang di izinkan
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'jfif');

                            //validasi format file
                            if (!in_array($type2, $tipe_diizinkan)) {
                                echo '<script>alert(Format file tidak diizinkan)</script>';
                                //jika format file tidak diizinkan
                            } else {

                                // Jika format file sesuai dengan yang ada array tipe di izinkan
                                // proses upload file sekaligus onsert data base 
                                move_uploaded_file($tmp_name, './produk/' .  $newname);

                                $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                    null,
                                        '" .  $kategori . "',
                                         '" . $nama . "',
                                         '" . $harga . "',
                                         '" . $deskripsi . "',
                                         '" . $newname . "',
                                         '" . $status . "',
                                        null  
                                     ) ");

                                if ($insert) {
                                    echo '<script>alert("Tambah data berhasil")</script>';
                                    echo '<script>window.location="data-produk.php"</script>';
                                } else {
                                    echo 'gagal' . mysqli_error($conn);
                                }
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
    <!-- CkEditor sendiri sesuai dengan name dan menggunakan textarea
    jika ingin mencoba rubah deskripsi sesusai dengan name yang anda miliki -->
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>

</html>