<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table_style.css">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="logo" href="images/logo.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body style="background-color : #ecf0f1">
<!-- Start header -->
    <header class="top-navbar">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="" />
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a class="nav-link" href="controller/action-logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
	<!-- End header -->
    <div class="table_pos">
        <div class="container">
            <form action="" method="get">
                <label for="cari"></label>
                <input type="text" name="cari" id="cari" placeholder="Masukan No. Handphone">
                <input type="submit" value="Cari">
            </form>
            <table>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Handphone</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "controller/koneksi.php";
                        $no=1;
                        $query = mysqli_query($conn,"select * from tracing");
                        if(isset($_GET['cari'])){
                            $cari = $_GET['cari'];
                            $query = mysqli_query($conn,"select * from tracing where no_hp like '%".$cari."%'");				
                        }
                        while ($tampil = mysqli_fetch_array($query)) {
                        echo"
                        <tr>
                            <td data-label='No.'>$no</td>
                            <td data-label='No. Handphone'>$tampil[no_hp]</td>
                            <td data-label='Nama'>$tampil[nama]</td>
                            <td data-label='Tanggal'>$tampil[tanggal]</td>
                            <td data-label='Aksi'> <a href='?kode=$tampil[no_hp]'>Hapus</a></td>
                        </tr>";
                        $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        if (isset($_GET['kode'])) {
            mysqli_query($conn,"delete from tracing where no_hp='$_GET[kode]'");
            echo "<meta http-equiv=refresh content=2;URL='dataTracing.php'>";
        }
    ?>
<!-- ALL JS FILES -->
<script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
          <!-- ALL PLUGINS -->
        <script src="js/jquery.superslides.min.js"></script>
        <script src="js/images-loded.min.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/baguetteBox.min.js"></script>
        <script src="js/form-validator.min.js"></script>
          <script src="js/contact-form-script.js"></script>
          <script src="js/custom.js"></script>
</body>
</html>

