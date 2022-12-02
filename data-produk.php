<?php
session_start();

include 'db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
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
                    <li><a href="profil.php">Profil</a></li>
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
            <h3>Data Produk<h3>
                    <div class="box">
                        <p><a href="tambah-produk.php">Tambah Data</a></p>
                        <table border="1" cellspacing="0" class="table">
                            <thead>
                                <tr>
                                    <th width="60px">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");

                                if (mysqli_num_rows($produk) > 0) {

                                    while ($row = mysqli_fetch_array($produk)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                            <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row['product_image'] ?>" width="80px"></a></td>
                                            <td><?php echo ($row['product_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                            <td>
                                                <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>

    <!---footer--->
    <footer>
        <div class=" container">
            <small>Copyright &copy; 2022 - FahmiCode.</small>
        </div>
    </footer>
</body>

</html>