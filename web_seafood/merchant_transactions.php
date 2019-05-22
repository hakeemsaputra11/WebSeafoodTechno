<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transaksi Merchant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <?php
        session_start();

        include("db_conn.php");
    ?>

    <!-- Header -->
    <div class="container-fluid">
        <div class="row">
            <div class=""></div>
            <div class=""></div>
            <div class=""></div>
        </div>
    </div>

    <!-- Navbar -->
    <div class="container-fluid" style="background-color:#2980b9">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="merchant_dashboard.php">
                    <img class="w-100 vis" src="icon/id-card.png" alt="icon home" id="img1" 
                    onmouseover="visible(1)" onmouseout="invisible(1)">
                    <h6 class="text-center text-white" id="txt1" style="display:none">Profile</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="merchant_menu.php">
                    <img class="w-100 vis" src="icon/menu1.png" alt="icon menu" id="img2"
                    onmouseover="visible(2)" onmouseout="invisible(2)">
                    <h6 class="text-center text-white" id="txt2" style="display:none">Selling</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="merchant_transactions.php" >
                    <img class="w-100" src="icon/transaction.png" alt="icon member" id="img3">
                    <h6 class="text-center text-white" id="txt3">Transaction</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="logout.php">
                    <img class="w-100 vis" src="icon/logout.png" alt="icon about" id="img4" 
                    onmouseover="visible(4)" onmouseout="invisible(4)">
                    <h6 class="text-center text-white" id="txt4" style="display:none">Logout</h6>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <?php
    
        $id = $_SESSION['id'];

        $sqlTransactions = "SELECT * FROM transactions WHERE id_penjual = '$id'";
        $listTransactions = $conn->query($sqlTransactions);

    ?>

    <div class="pt-3 pb-3" style="background-image:url('icon/wpp22.jpg');background-size:100%">

    <!-- ISI -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center text-white font-italic p-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h2>Transaksi</h2>
                <br>
                <table class="table table-dark" style="border-radius:20px">
                    <thead>
                        <th scope="col">ID Transaksi </th>
                        <th scope="col">Nama Item</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            if($listTransactions->num_rows > 0)
                            {
                                while($row = $listTransactions->fetch_assoc())
                                {
                                    $idItem = $row['id_item'];
                                    $sqlNamaItem = "SELECT nama_item FROM item_lists WHERE id_item = '$idItem'";
                                    $listNamaItem = $conn->query($sqlNamaItem);

                                    if($listNamaItem->num_rows > 0)
                                    {
                                        $rowItem = $listNamaItem->fetch_assoc();
                                        $namaItem = $rowItem['nama_item'];
                                    }

                                    echo "<tr>";
                                        echo "<td>" . $row['id_transaksi'] . "</td>";
                                        echo "<td>" . $namaItem . "</td>";
                                        echo "<td>" . $row['status_transaksi'] . "</td>";
                                        
                                        if($row['status_transaksi'] != "Progress")
                                        {
                                            echo "<td>
                                                    <button class='btn btn-success' disabled>Kirim</button>
                                                </td>";
                                        }
                                        else
                                        {
                                            echo "<td><a href='transaction_finish.php?id=" . $row['id_transaksi'] . "'>
                                                <button class='btn btn-success'>Kirim</button></a></td>";
                                        }
                                    echo "</tr>";
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
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid" style="background-color:#3498db;color:white">
        <div class="row">
            <div class="col text-center font-italic pt-3 pb-3">&copy;Fisherman Black Market</div>
        </div>
    </div>

</body>
</html>

<style>

.vis{
    opacity:0.5;
}

</style>

<script>

    function visible(x){
        document.getElementById("img"+ x).style.opacity = "1";
        document.getElementById("txt"+ x).style.display = "block";
    }

    function invisible(x){
        document.getElementById("img"+ x).style.opacity = "0.5";
        document.getElementById("txt"+ x).style.display = "none";
    }

</script>