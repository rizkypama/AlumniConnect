<?php
    $host = "localhost";
    $user = "smknuke1_admin";
    $pass = "nukesesi123?";
    $db = "smknuke1_sistem_informasi_alumni";

    $koneksi = mysqli_connect($host, $user, $pass, $db);

    if(!$koneksi) {
        die("Koneksi gagal : ".mysqli_connect_error());
    }
?>  