<?php

    session_start();

    include("db_conn.php");

    $idMem = $_SESSION['id'];
    $idItem = $_GET['id'];

    $sql = "DELETE FROM item_lists WHERE id_item = '$idItem' AND id_member = '$idMem'";

    if(mysqli_query($conn, $sql))
    {
        echo "<script type='text/javascript'>alert('Delete Item Berhasil')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_menu.php'</script>";
    }
    else
    {
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Delete Item Gagal')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_menu.php'</script>";
    }

?>