<?php 

    session_start();

    if($_SESSION['saldo'] >= $_SESSION['total'])
    {
        include("db_conn.php");

        $idMem = $_SESSION['id'];
        $saldo = $_SESSION['saldo'] - $_SESSION['total'];


        $sqlCart = "SELECT * FROM carts WHERE id_member = '$idMem'";
        $listCart = $conn->query($sqlCart);

        if($listCart->num_rows > 0)
        {
            while($rowCart = $listCart->fetch_assoc())
            {
                $idItem = $rowCart['id_item'];

                $sqlItem = "SELECT * FROM item_lists WHERE id_item = '$idItem'";
                $listItem = $conn->query($sqlItem);

                if($listItem->num_rows > 0)
                {
                    while($rowItem = $listItem->fetch_assoc())
                    {
                        $idPenjual = $rowItem['id_member'];
                        $terjual = $rowItem['item_terjual'] + $rowCart['jumlah_item'];
                        
                        $sqlSaldoPenjual = "SELECT saldo_member FROM members WHERE id_member = '$idPenjual'";
                        $listSaldo = $conn->query($sqlSaldoPenjual);

                        if($listSaldo->num_rows > 0)
                        {
                            $rowSaldo = $listSaldo->fetch_assoc();
                        }

                        $total = $rowCart['jumlah_item'] * $rowItem['harga_item'];
                        $saldoPenjual = $total + $rowSaldo['saldo_member'];

                        $sqlPenjual = "UPDATE members SET saldo_member = '$saldoPenjual' WHERE id_member = '$idPenjual'";
                        $sqlTerjual = "UPDATE item_lists SET item_terjual = '$terjual' WHERE id_item = '$idItem'";
                        $sqlTransaksi = "INSERT INTO transactions (id_item, id_penjual, id_pembeli, 
                        total_harga, status_transaksi) VALUES ('$idItem', '$idPenjual', '$idMem', '$total', 'Progress')";

                        if(mysqli_query($conn, $sqlPenjual) && mysqli_query($conn, $sqlTerjual) && 
                        mysqli_query($conn, $sqlTransaksi))
                        {
                            $_SESSION['total'] = 0;
                            echo "<script type='text/javascript'>alert('Edit Saldo Penjual Berhasil')</script>";
                        }
                        else
                        {
                            echo "Error : " . $sqlPenjual . $sqlTerjual .  "<br>" . mysqli_error($conn);
                            echo "<script type='text/javascript'>alert('Edit Saldo Penjual Gagal')</script>";
                            mysqli_close($conn);
                            echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
                        }
                    }
                }
                else
                {
                    echo "Error : " . $sqlItem . "<br>" . mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('Edit Saldo Penjual Gagal')</script>";
                    mysqli_close($conn);
                    echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
                }
            }

        }
        else
        {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Edit Saldo Penjual Gagal')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
        }

        $sqlSaldo = "UPDATE members SET saldo_member = '$saldo' WHERE id_member = '$idMem'";
        echo "oke";
        $sqlCarts = "DELETE FROM carts WHERE id_member = '$idMem'";

        if(mysqli_query($conn, $sqlSaldo) && mysqli_query($conn,$sqlCarts))
        {
            $_SESSION['saldo'] = $saldo;

            echo "<script type='text/javascript'>alert('Transaksi Berhasil')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_dashboard.php'</script>";
        }
        else
        {
            echo "Error : " . $sqlSaldo . "<br>" . $sqlCarts . "<br>" . mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Transaksi Gagal')</script>";
            mysqli_close($conn);
            echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Uang Anda Tidak Cukup')</script>";
        echo "<script type='text/javascript'>window.location = 'customer_cart_detail.php'</script>";
    }

?>