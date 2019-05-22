<?php

    session_start();

    include("db_conn.php");

    $idMem = $_SESSION['id'];
    $idItem = $_GET['id'];

    $getNama = "SELECT nama_item FROM item_lists WHERE id_item = '$idItem'";

    $tempNama = $conn->query($getNama);

    if($tempNama->num_rows > 0)
    {
        $namaArr = $tempNama->fetch_assoc();
        $nama = implode("", $namaArr);
        $sql = "INSERT INTO carts (id_item, id_member, nama_item, jumlah_item) 
        VALUES ('$idItem', '$idMem', '$nama', 1)";

        if(mysqli_query($conn, $sql))
        {
            echo "<script type='text/javascript'>alert('Berhasil Menambahkan Item Ke Cart')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_menu.php'</script>";
        }
        else
        {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Item Sudah Masuk Ke Keranjang')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_menu.php'</script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Gagal Mengambil Nama Item')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'customer_menu.php'</script>";
    }
?>