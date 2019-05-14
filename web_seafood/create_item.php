<?php

    session_start();

    include("db_conn.php");

    $idMem = $_SESSION["id"];
    $nama = $_POST["namaItem"];
    $deskripsi = $_POST["deskripsiItem"];
    $jenis = $_POST["jenisItem"];
    $harga = $_POST["hargaItem"];
    $terjual = 0;

    $sql = "INSERT INTO item_lists (id_member, nama_item, deskripsi_item, jenis_item, harga_item, item_terjual) 
    VALUES ('$idMem', '$nama', '$deskripsi', '$jenis', '$harga', '$terjual')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script type='text/javascript'>alert('Berhasil Menambahkan Item')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_menu.php'</script>";
    }
    else
    {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Gagal Menambahkan Item')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_menu.php'</script>";
    }

?>