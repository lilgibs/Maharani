<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table_style.css">
</head>
<body style="background-color : #ecf0f1">
    <form action="" method="get">
        <label for="cari"></label>
        <input type="text" name="cari" id="cari" placeholder="Masukan NIP">
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
    <?php
        if (isset($_GET['kode'])) {
            mysqli_query($conn,"delete from tracing where no_hp='$_GET[kode]'");
            echo "<meta http-equiv=refresh content=2;URL='dataTracing.php'>";
        }
    ?>
</body>
</html>

