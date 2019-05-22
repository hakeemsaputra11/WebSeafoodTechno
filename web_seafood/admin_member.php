<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <?php
    
        include("db_conn.php");

        $sql = "SELECT * FROM members";

        $listMembers = $conn->query($sql);
    
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
                <a href="admin_member.php">
                    <img class="w-100" src="icon/id-card.png" alt="icon home" id="img1">
                    <h6 class="text-center text-white" id="txt1">Member</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="admin_menu.php">
                    <img class="w-100 vis" src="icon/menu.png" alt="icon menu" id="img2" 
                    onmouseover="visible(2)" onmouseout="invisible(2)">
                    <h6 class="text-center text-white" id="txt2" style="display:none">Menu</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="admin_transactions.php" >
                    <img class="w-100 vis" src="icon/transaction.png" alt="icon member" id="img3"
                    onmouseover="visible(3)" onmouseout="invisible(3)">
                    <h6 class="text-center text-white" id="txt3" style="display:none">Transaksi</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="admin_voucher.php">
                    <img class="w-100 vis" src="icon/voucher.png" alt="icon about" id="img4" 
                    onmouseover="visible(4)" onmouseout="invisible(4)">
                    <h6 class="text-center text-white" id="txt4" style="display:none">Voucher</h6>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <!-- ISI -->
    <div class="pt-3 pb-3" style="background-image:url('icon/wpp22.jpg');background-size:100%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 text-white text-center font-italic p-3"
                style="background-color:rgb(0,0,0,0.8);border-radius:20px">

                    <h2 class="mb-3">Kelola Data Member</h2>
                
                    <table class="table table-dark" style="border-radius:20px">
                        <thead>
                            <th scope="col">ID </th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                if($listMembers->num_rows > 0)
                                {
                                    while($row = $listMembers->fetch_assoc())
                                    {
                                        echo "<tr>";
                                            echo "<td>" . $row['id_member'] . "</td>";
                                            echo "<td>" . $row['nama_member'] . "</td>";
                                            echo "<td>" . $row['notelp_member'] . "</td>";
                                            echo "<td>" . $row['alamat_member'] . "</td>";
                                            echo "<td>" . $row['username_member'] . "</td>";
                                            echo "<td>" . $row['role_member'] . "</td>";
                                            echo "<td>" . $row['saldo_member'] . "</td>";
                                            echo "<td><a href='.php?id=" . $row['id_member'] . "'>
                                                    <button class='btn btn-danger'>Delete</button></a></td>";
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