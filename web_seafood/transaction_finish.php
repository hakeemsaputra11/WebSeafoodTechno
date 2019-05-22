<?php

    session_start();

    include("db_conn.php");

    $id = $_GET['id'];

    if($_SESSION['role'] == "buyer")
    {
        $sql = "UPDATE transactions SET status_transaksi = 'Selesai' WHERE id_transaksi = '$id'";

        if(mysqli_query($conn, $sql))
        {
            echo "<script type='text/javascript'>alert('Transaksi " . $id . " Berhasil')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_transactions.php'</script>";
        }
        else
        {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Transaksi " . $id . " Gagal')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_transactions.php'</script>";
        }
    }
    else if($_SESSION['role'] == "seller")
    {
        $sql = "UPDATE transactions SET status_transaksi = 'Dikirim' WHERE id_transaksi = '$id'";

        if(mysqli_query($conn, $sql))
        {
            echo "<script type='text/javascript'>alert('Transaksi " . $id . " Berhasil Dikirim')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'merchant_transactions.php'</script>";
        }
        else
        {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Transaksi " . $id . " Gagal Dikirim')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'merchant_transactions.php'</script>";
        }
    }

?>