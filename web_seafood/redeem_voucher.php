<?php

    session_start();

    include("db_conn.php");

    $kode = $_POST['i1'] . "-" . $_POST['i2'] . "-" . $_POST['i3'] . "-" . $_POST['i4'] . "-" . $_POST['i5'];

    $sqlCek = mysqli_query($conn, "SELECT * FROM vouchers WHERE kode_voucher = '$kode'");

    if(mysqli_num_rows($sqlCek) != 0)
    {
        $data = mysqli_fetch_assoc($sqlCek);

        if($data['status_voucher'] == 'unused')
        {
            $status = 'used';

            $sql = "UPDATE vouchers SET status_voucher = '$status' WHERE kode_voucher = '$kode'";

            if(mysqli_query($conn, $sql))
            {
                $saldo = $_SESSION['saldo'] + $data['saldo_voucher'];
                echo $saldo;
                $_SESSION['saldo'] = $saldo;
                $id = $_SESSION['id'];

                #Edit Saldo Member
                $sqlMember = "UPDATE members SET saldo_member = '$saldo' WHERE id_member = '$id'";

                if(mysqli_query($conn, $sqlMember))
                {
                    echo "<script type='text/javascript'>alert('Redeem Berhasil')</script>";
                    mysqli_close($conn);
                    echo "<script type='text/javascript'>window.location = 'customer_voucher.php'</script>";
                }
                else
                {
                    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('Edit Saldo Gagal')</script>";
                    mysqli_close($conn);
                    echo "<script type='text/javascript'>window.location = 'customer_voucher.php'</script>";    
                }
            }
            else
            {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
                echo "<script type='text/javascript'>alert('Redeem Gagal')</script>";
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location = 'customer_voucher.php'</script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Voucher Sudah DiRedeem')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_voucher.php'</script>";
        }
    }

?>