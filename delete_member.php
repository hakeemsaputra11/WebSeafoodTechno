<?php

    session_start();

    include("db_conn.php");

    $id = $_SESSION['id'];

    $sql = "DELETE FROM members WHERE id_member = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('Delete Berhasil')</script>";
        mysqli_close($conn);
        if($_SESSION['role'] == "admin")
        {
            
        }
        else if($_SESSION['role'] == "seller")
        {
            echo "<script type='text/javascript'>window.location = 'logout.php'</script>";
        }
        else if($_SESSION['role'] == "buyer")
        {
            echo "<script type='text/javascript'>window.location = 'logout.php'</script>";
        }
    }
    else{
        echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        echo "<script type='text/javascript'>alert('Delete Gagal')</script>";
        mysqli_close($conn);

        if($_SESSION['role'] == "seller")
        {
            echo "<script type='text/javascript'>window.location = 'merchant_dasboard.php'</script>";
        }
        else if($_SESSION['role'] == "buyer")
        {
            echo "<script type='text/javascript'>window.location = 'customer_menu.php'</script>";
        }
    }

?>