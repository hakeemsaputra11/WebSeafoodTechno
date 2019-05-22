<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <!-- Header -->
    <div class="container-fluid">
        <div class="row">
            <div class=""></div>
            <div class=""></div>
            <div class=""></div>
        </div>
    </div>

    <div class="pt-3 pb-3" style="background-image:url('icon/wpp22.jpg');background-size:100%">

    <!-- Navbar -->
    <div class="container-fluid pt-3 pb-3 mt-5 mb-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-white text-center font-italic p-1"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px;">
                <h1>Welcome, Admin</h1>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row mt-3">
            <div class="col-4"></div>
            <div class="col-2 pt-3 pr-3 pb-1 pl-3 text-center" 
            style="background-color:rgb(0,0,0,0.8);border-radius:20px 0 0 0">
                <a href="admin_member.php">
                    <img class="w-75 vis" src="icon/id-card.png" alt="icon home" id="img1" 
                    onmouseover="visible(1)" onmouseout="invisible(1)">
                    <h4 class="text-center text-white" id="txt1" style="display:none">Member</h4>
                </a>
            </div>
            <div class="col-2 pt-3 pr-3 pb-1 pl-3 text-center" 
            style="background-color:rgb(0,0,0,0.8);border-radius:0 20px 0 0">
                <a href="admin_menu.php">
                    <img class="w-75 vis" src="icon/menu1.png" alt="icon menu" id="img2" 
                    onmouseover="visible(2)" onmouseout="invisible(2)">
                    <h4 class="text-center text-white" id="txt2" style="display:none">Menu</h4>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2 pt-3 pr-3 pb-1 pl-3 text-center" 
            style="background-color:rgb(0,0,0,0.8);border-radius:0 0 0 20px">
                <a href="admin_transaction.php" >
                    <img class="w-75 vis" src="icon/transaction.png" alt="icon member" id="img3"
                    onmouseover="visible(3)" onmouseout="invisible(3)">
                    <h4 class="text-center text-white" id="txt3" style="display:none">Transaksi</h4>
                </a>
            </div>
            <div class="col-2 pt-3 pr-3 pb-1 pl-3 text-center" 
            style="background-color:rgb(0,0,0,0.8);border-radius:0 0 20px 0">
                <a href="voucher.php">
                    <img class="w-75 vis" src="icon/voucher.png" alt="icon about" id="img4" 
                    onmouseover="visible(4)" onmouseout="invisible(4)">
                    <h4 class="text-center text-white" id="txt4" style="display:none">Voucher</h4>
                </a>
            </div>
            <div class="col-4"></div>
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