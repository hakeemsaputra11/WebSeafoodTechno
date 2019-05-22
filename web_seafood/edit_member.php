<?php

    session_start();

    include("db_conn.php");

    $id = $_SESSION["id"];
    $nama = $_POST["nama"];
    $notlp = $_POST["notlp"];
    $alamat = $_POST["alamat"];
    $role = $_SESSION["role"];
    $usr = $_POST["username"];
    $pass = md5($_POST["password"]);

    $sql = "UPDATE members SET nama_member = '$nama', notelp_member = '$notlp', alamat_member = '$alamat',
    username_member = '$usr', password_member = '$pass' WHERE id_member = '$id'";

    if(mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('Edit Member Berhasil')</script>";
        $_SESSION['nama'] = $nama;
        $_SESSION['notlp'] = $notlp;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['username'] = $usr;
        mysqli_close($conn);
        if($role == "seller")
        {
            echo "<script type='text/javascript'>window.location = 'merchant_dashboard.php'</script>";
        }
        else if($role == "buyer")
        {
            echo "<script type='text/javascript'>window.location = 'customer_dashboard.php'</script>";
        }

    }
    else{
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Edit Gagal')</script>";
        mysqli_close($conn);
        echo "<script type='text/javascript'>window.location = 'merchant_dashboard.php'</script>";
    }

?>