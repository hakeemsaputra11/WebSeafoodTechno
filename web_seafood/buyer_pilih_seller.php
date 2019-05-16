
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

        if(isset($_POST["menu_seller"]))
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "id");
            if(!in_array($_GET["id"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'id_item'			=>	$_GET["id"],
                    'nama_item'			=>	$_POST["hidden_name"],
                    'harga_item'		=>	$_POST["hidden_price"],
                    'jumlah'		=>	$_POST["jumlah"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            }
            else
            {
                echo '<script>alert("Item Already Added")</script>';
            }
        }
        else
        {
            $item_array = array(
                'id_item'			=>	$_GET["id_item"],
                'nama_item'			=>	$_POST["hidden_name"],
                'harga_item'		=>	$_POST["hidden_price"],
                'jumlah'		=>	$_POST["jumlah"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }
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
                    <img class="w-100" src="icon/menu1.png" alt="icon menu" id="img2">
                    <h6 class="text-center text-white" id="txt2">Selling</h6>
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
        $sqlShowAll = "SELECT * FROM members ";
        $listItem = $conn->query($sqlShowAll);
    ?>

    <!-- ISI -->
    <div class="container-fluid">
        
        <!-- List Item -->
        <div class="row">

           
            <?php
				$query = "SELECT * FROM members WHERE ROLE_MEMBER = 'seller'";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
                        <div class="col-md-4">
                            <form method="post" action="buyer_shop.php ?>">
                                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                                    <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                                    <h4 class="text-info"><?php echo $row["nama_member"]; ?></h4>

                                    <h4 class="text-danger"><?php echo $row["alamat_member"]; ?> K</h4>

                                   
                                   

                                    <input type="submit" name="menu_seller" style="margin-top:5px;" class="btn btn-success" value="Pilih Menu" />

                                </div>
                            </form>
                        </div>
			<?php
					}
				}
			?>
            
            
        </div>
        
       

        <!-- Form Create -->
        <div class="row">
            <div class="col-4"></div>
            <div id="crtfrm" class="col-4 text-center font-italic text-white p-3 mb-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px;display:none">
                <h2>Create Item</h2>
                <br>
                <form action="create_item.php" method="post">
                    <h5>Nama Item</h5>
                    <input class="inpfrm w-75" type="text" name="namaItem" placeholder="Masukkan Nama Item">
                    <br>
                    <br>
                    <h5>Deskripsi Item</h5>
                    <textarea class="inpfrm w-75" name="deskripsiItem" cols="18" rows="5"
                    placeholder="Masukkan Deskripsi Item"></textarea>
                    <br>
                    <br>
                    <h5>Jenis Item</h5>
                    <select class="inpfrm w-75" name="jenisItem">
                        <option value="kerang">Kerang</option>
                        <option value="kepiting">Kepiting</option>
                        <option value="lobster">Lobster</option>
                    </select>
                    <br>
                    <br>
                    <h5>Harga/kg</h5>
                    <input class="inpfrm w-75" type="number" name="hargaItem" placeholder="Masukkan Harga Item">
                    <br>
                    <br>
                    <input class="btn btn-success w-75" type="submit" value="Create">
                </form>
                <br>
                <button class="btn btn-danger w-75" onclick="hideform('crtfrm')">Cancel</button>
            </div>
            <div class="col-4"></div>
        </div>

        <!-- Form Edit -->
        <div class="row">
            <div class="col-4"></div>
            <div id="edtfrm" class="col-4 text-center font-italic text-white p-3 mb-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px;display:none">
                <h2>Edit Item</h2>
                <br>
                <form action="edit_item.php" method="post">
                    <h5>ID Item</h5>
                    <input class="inpfrm w-75" type="text" name="idItem" placeholder="Masukkan ID Item">
                    <br>
                    <br>
                    <h5>Nama Item</h5>
                    <input class="inpfrm w-75" type="text" name="namaItem" placeholder="Masukkan Nama Item">
                    <br>
                    <br>
                    <h5>Deskripsi Item</h5>
                    <textarea class="inpfrm w-75" name="deskripsiItem" cols="18" rows="5"
                    placeholder="Masukkan Deskripsi Item"></textarea>
                    <br>
                    <br>
                    <h5>Jenis Item</h5>
                    <select class="inpfrm w-75" name="jenisItem">
                        <option value="kerang">Kerang</option>
                        <option value="kepiting">Kepiting</option>
                        <option value="lobster">Lobster</option>
                    </select>
                    <br>
                    <br>
                    <h5>Harga/kg</h5>
                    <input class="inpfrm w-75" type="number" name="hargaItem" placeholder="Masukkan Harga Item">
                    <br>
                    <br>
                    <input class="btn btn-success w-75" type="submit" value="Edit">
                </form>
                <br>
                <button class="btn btn-danger w-75" onclick="hideform('edtfrm')">Cancel</button>
            </div>
            <div class="col-4"></div>
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