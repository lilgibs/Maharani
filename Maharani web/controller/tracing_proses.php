<?php
    include "koneksi.php";
    $no_hp = $_POST['no_hp'];
    $nama = $_POST['nama'];
    $tanggal = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO tracing VALUES('$no_hp','$nama','$tanggal')";
    mysqli_query($conn,$sql);
    
    header('location:../tracing.php?sukses');
?>