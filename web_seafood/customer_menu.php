<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Merchant Menu</title>
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
                <a href="customer_dashboard.php">
                    <img class="w-100 vis" src="icon/id-card.png" alt="icon home" id="img1" 
                    onmouseover="visible(1)" onmouseout="invisible(1)">
                    <h6 class="text-center text-white" id="txt1" style="display:none">Profile</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="customer_menu.php">
                    <img class="w-100" src="icon/menu.png" alt="icon menu" id="img2">
                    <h6 class="text-center text-white" id="txt2">Catalogue</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href=".php" >
                    <img class="w-100 vis" src="icon/transaction.png" alt="icon member" id="img3"
                    onmouseover="visible(3)" onmouseout="invisible(3)">
                    <h6 class="text-center text-white" id="txt3" style="display:none">Transaction</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="customer_voucher.php">
                    <img class="w-100 vis" src="icon/voucher.png" alt="icon about" id="img4" 
                    onmouseover="visible(4)" onmouseout="invisible(4)">
                    <h6 class="text-center text-white" id="txt4" style="display:none">Voucher</h6>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <?php
        $sqlItemKerang = "SELECT * FROM item_lists WHERE jenis_item = 'kerang'";
        $listItemKerang = $conn->query($sqlItemKerang);

        $sqlItemKepiting = "SELECT * FROM item_lists WHERE jenis_item = 'kepiting'";
        $listItemKepiting = $conn->query($sqlItemKepiting);

        $sqlItemLobster = "SELECT * FROM item_lists WHERE jenis_item = 'lobster'";
        $listItemLobster = $conn->query($sqlItemLobster);
    ?>

    <!-- ISI -->
    <div class="container-fluid">
        
        <!-- List Item Kerang -->
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center text-white font-italic mt-3 p-3 mb-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h2>Item List</h2>
                <br>
                <h4>Kerang</h4>
                <table class="table table-dark" style="border-radius:20px">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Item</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga/kg</th>
                        <th scope="col">Terjual</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            if($listItemKerang->num_rows > 0)
                            {
                                while($row = $listItemKerang->fetch_assoc())
                                {
                                    echo "<tr>";
                                        echo "<td>" . $row['id_item'] . "</td>";
                                        echo "<td>" . $row['nama_item'] . "</td>";
                                        echo "<td>" . $row['deskripsi_item'] . "</td>";
                                        echo "<td>" . $row['jenis_item'] . "</td>";
                                        echo "<td>" . $row['harga_item'] . "</td>";
                                        echo "<td>" . $row['item_terjual'] . "</td>";
                                        echo "<td><a href='.php?id=" . $row['id_item'] . "'>
                                                <button class='btn btn-info'>Add To Cart</button></a></td>";
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

                <h4>Kepiting</h4>
                <table class="table table-dark" style="border-radius:20px">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Item</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga/kg</th>
                        <th scope="col">Terjual</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            if($listItemKepiting->num_rows > 0)
                            {
                                while($row = $listItemKepiting->fetch_assoc())
                                {
                                    echo "<tr>";
                                        echo "<td>" . $row['id_item'] . "</td>";
                                        echo "<td>" . $row['nama_item'] . "</td>";
                                        echo "<td>" . $row['deskripsi_item'] . "</td>";
                                        echo "<td>" . $row['jenis_item'] . "</td>";
                                        echo "<td>" . $row['harga_item'] . "</td>";
                                        echo "<td>" . $row['item_terjual'] . "</td>";
                                        echo "<td><a href='.php?id=" . $row['id_item'] . "'>
                                                <button class='btn btn-info'>Add To Cart</button></a></td>";
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

                <h4>Lobster</h4>
                <table class="table table-dark" style="border-radius:20px">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Item</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga/kg</th>
                        <th scope="col">Terjual</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            if($listItemLobster->num_rows > 0)
                            {
                                while($row = $listItemLobster->fetch_assoc())
                                {
                                    echo "<tr>";
                                        echo "<td>" . $row['id_item'] . "</td>";
                                        echo "<td>" . $row['nama_item'] . "</td>";
                                        echo "<td>" . $row['deskripsi_item'] . "</td>";
                                        echo "<td>" . $row['jenis_item'] . "</td>";
                                        echo "<td>" . $row['harga_item'] . "</td>";
                                        echo "<td>" . $row['item_terjual'] . "</td>";
                                        echo "<td><a href='.php?id=" . $row['id_item'] . "'>
                                                <button class='btn btn-info'>Add To Cart</button></a></td>";
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

.bgForm{
    background-color:rgb(0,0,0,0.8);
}

.inpfrm{
    background-color:rgb(0,0,0,0.5);
    border:none;
    color:white;
    text-align:center;
    border-radius:20px;
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

    function showform(x){
        document.getElementById(x).style.display = "block";
    }

    function hideform(x){
        document.getElementById(x).style.display = "none";
    }

</script>