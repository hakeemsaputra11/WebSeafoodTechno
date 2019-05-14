<?php

    session_start();

    include("db_conn.php");

    $idMem = $_SESSION['id'];
    $idItem = $_POST['idItem'];
    $nama = $_POST['namaItem'];
    $deskripsi = $_POST['deskripsiItem'];
    $jenis = $_POST['jenisItem'];
    $harga = $_POST['hargaItem'];

    $sql = "UPDATE item_lists SET nama_item = '$nama', deskripsi_item = '$deskripsi', jenis_item='$jenis', 
            harga_item = '$harga' WHERE id_item = '$idItem' AND id_member = '$idMem'";

    if(mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('Edit Item Berhasil')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_menu.php'</script>";
    }
    else
    {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Edit Item Gagal')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_menu.php'</script>";
    }

?>