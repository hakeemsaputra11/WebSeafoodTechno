<?php

    if(isset($_POST))
    {
        include("db_conn.php");
        
        $nama = $_POST["nama"];
        $notlp = $_POST["notlp"];
        $alamat = $_POST["alamat"];
        $role = $_POST["role"];
        $usr = $_POST["username"];
        $pass = md5($_POST["password"]);
        $saldo = 0;

        $sql = "INSERT INTO members (nama_member, notelp_member, alamat_member, username_member, password_member,
        role_member, saldo_member) VALUES ('$nama', '$notlp', '$alamat', '$usr', '$pass', '$role', '$saldo')";

        if(mysqli_query($conn, $sql)){
            echo "<script type='text/javascript'>alert('Register Berhasil, Silahkan Login')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'loginRegister.php'</script>";
        }
        else{
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Register Gagal')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'loginRegister.php'</script>";
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Data Tidak Boleh Kosong')</script>";
        echo "<script type='text/javascript'>window.location = 'loginRegister.php'</script>";
    }

?> 