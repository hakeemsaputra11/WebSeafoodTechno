<?php

    session_start();

    include("db_conn.php");

    $idMem = $_SESSION['id'];
    $idItem = $_POST['id'];
    $jumlah = $_POST['jumlah'];

    $sql = "UPDATE carts SET jumlah_item = '$jumlah' WHERE id_item = '$idItem' AND id_member = '$idMem'";

    if(mysqli_query($conn, $sql))
    {
        echo "<script type='text/javascript'>alert('Edit Jumlah Berhasil')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
    }
    else
    {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Edit Jumlah Gagal')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
    }

?>