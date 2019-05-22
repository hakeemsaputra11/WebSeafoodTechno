<?php

    session_start();

    include("db_conn.php");

    $idMem = $_SESSION['id'];
    $idItem = $_GET['id'];

    $sql = "DELETE FROM carts WHERE id_item = '$idItem' AND id_member = '$idMem'";

    if(mysqli_query($conn, $sql))
    {
        echo "<script type='text/javascript'>alert('Delete Cart Berhasil')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'customer_menu.php'</script>";
    }
    else
    {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Delete Cart Gagal')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'customer_menu.php'</script>";
    }
?>