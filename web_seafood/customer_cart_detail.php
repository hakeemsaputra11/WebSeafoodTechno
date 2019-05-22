<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail Transaksi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <?php

        session_start();

        include("db_conn.php");

        $id = $_SESSION['id'];
        $_SESSION['total'] = 0;

        $sqlCart = "SELECT * FROM carts WHERE id_member = '$id'";
        $listCart = $conn->query($sqlCart);

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center text-white font-italic mt-3 p-3 mb-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                
                <h2>Detail Transaksi</h2>
                <br>
                <table class="table table-dark" style="border-radius:20px">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Item</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga/kg</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            if($listCart->num_rows > 0)
                            {
                                while($row = $listCart->fetch_assoc())
                                {

                                    $idItem = $row['id_item'];

                                    $sql = "SELECT * FROM item_lists WHERE id_item = '$idItem'";

                                    $itemList = $conn->query($sql);

                                    if($itemList->num_rows > 0)
                                    {
                                        $rowItem = $itemList->fetch_assoc();
                                        $subtotal = $row['jumlah_item'] * $rowItem['harga_item'];
                                        
                                        echo "<tr>";
                                        echo "<td>" . $rowItem['id_item'] . "</td>";
                                        echo "<td>" . $rowItem['nama_item'] . "</td>";
                                        echo "<td>" . $rowItem['deskripsi_item'] . "</td>";
                                        echo "<td>" . $rowItem['jenis_item'] . "</td>";
                                        echo "<td>" . $rowItem['harga_item'] . "</td>";
                                        echo "<td>" . $row['jumlah_item'] . "</td>";
                                        echo "<td>" . $subtotal . "</td>";
                                        echo "<td><button class='btn btn-primary' 
                                                onclick='showform(" . $rowItem['id_item'] . ")'>
                                                Edit</button></td>";
                                        echo "</tr>";

                                        $_SESSION['total'] = $_SESSION['total'] + $subtotal;
                                    }
                                }
                            }
                            else{
                                echo "<tr>";
                                    echo "<td colspan=7>DATA ITEM TIDAK ADA</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <h4 class="float-right mr-5">Total = Rp.<?php echo $_SESSION['total'] ?></h4>
                <br><br>
                <h4 class="float-right mr-5">Saldo Anda = Rp.<?php echo $_SESSION['saldo'] ?></h4>
                <br><br>
                <h4 class="float-right mr-5">Sisa Saldo Anda = Rp.<?php echo $_SESSION['saldo'] - 
                $_SESSION['total'] ?></h4>
                <br>
                <br>
                <br>
                <a href="customer_menu.php">
                    <button class="btn btn-danger w-25">Cancel</button>
                </a>
                <a href="bayar.php">
                    <button class="btn btn-success w-25">Bayar</button>
                </a>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div id="form" class="col-4 text-center font-italic text-white p-3 mb-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px;display:none">
                <h2>Edit Jumlah</h2>
                <br>
                <form action="edit_jumlah_item.php" method="post">
                    <h5>ID</h5>
                    <input id="idItmFrm" class="inpfrm w-75" type="text" name="id" placeholder="Masukkan ID"
                    readonly>
                    <br>
                    <br>
                    <h5>Jumlah Item</h5>
                    <input class="inpfrm w-75" type="number" name="jumlah" placeholder="Masukkan Jumlah Item">
                    <br>
                    <br>
                    <input class="btn btn-success w-75" type="submit" value="Edit">
                </form>
                <br>
                <button class="btn btn-danger w-75" onclick="hideform()">Cancel</button>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

</body>
</html>

<style>

.inpfrm{
background-color:rgb(0,0,0,0.5);
border:none;
color:white;
text-align:center;
border-radius:20px;

}

</style>

<script>

    function showform($row){
        document.getElementById("form").style.display = "block";
        document.getElementById("idItmFrm").value = $row;
    }

    function hideform(){
        document.getElementById("form").style.display = "none";
    }

</script>