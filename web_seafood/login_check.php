<?php

    session_start();

    if(isset($_SESSION['role']))
    {
        echo "<script type='text/javascript'>alert('Anda Sudah Login')</script>";
        echo "<script type='text/javascript'>window.location = 'index.php'</script>";
    }

    if(isset($_POST))
    {
        include("db_conn.php");

        $usr = $_POST['username'];
        $pass = md5($_POST['password']);

        $sql = mysqli_query($conn, "SELECT * FROM members WHERE username_member = '$usr' AND password_member = '$pass'");

        if(mysqli_num_rows($sql) != 0){
            $data = mysqli_fetch_assoc($sql);

            $_SESSION['id'] = $data['id_member'];
            $_SESSION['nama'] = $data['nama_member'];
            $_SESSION['notlp'] = $data['notelp_member'];
            $_SESSION['alamat'] = $data['alamat_member'];
            $_SESSION['role'] = $data['role_member'];
            $_SESSION['saldo'] = $data['saldo_member'];
            $_SESSION['username'] = $data['username_member'];

            if($data['role_member'] == "admin"){
                echo "<script type='text/javascript'>alert('Welcome Admin')</script>";
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location = 'admin_dashboard.php'</script>";
            }
            else if($data['role_member'] == "buyer"){
                echo "<script type='text/javascript'>alert('Welcome Customer')</script>";
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location = 'customer_dashboard.php'</script>";
            }
            else if($data['role_member'] == "seller"){
                echo "<script type='text/javascript'>alert('Welcome Partner')</script>";
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location = 'merchant_dashboard.php'</script>";
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Username atau Password Salah!')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'loginRegister.php'</script>";
        }
    }

?>