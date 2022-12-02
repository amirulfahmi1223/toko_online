<?php
session_start();
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
            <h3>Dashboard<h3>
                <div class="box">
                    <h4>Selamat Datang
                        <?php echo $_SESSION['a_global']->admin_name ?> di Toko Online</h4>
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