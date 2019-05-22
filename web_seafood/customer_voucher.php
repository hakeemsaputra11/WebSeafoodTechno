<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <?php
        session_start();
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
                    <img class="w-100 vis" src="icon/menu.png" alt="icon menu" id="img2" 
                    onmouseover="visible(2)" onmouseout="invisible(2)">
                    <h6 class="text-center text-white" id="txt2" style="display:none">Catalogue</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="customer_transactions.php" >
                    <img class="w-100 vis" src="icon/transaction.png" alt="icon member" id="img3"
                    onmouseover="visible(3)" onmouseout="invisible(3)">
                    <h6 class="text-center text-white" id="txt3" style="display:none">Transaction</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="customer_voucher.php">
                    <img class="w-100" src="icon/voucher.png" alt="icon about" id="img4">
                    <h6 class="text-center text-white" id="txt4">Voucher</h6>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div class="pt-3 pb-3" style="background-image:url('icon/wpp22.jpg');background-size:100%">

    <!-- ISI -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center text-white font-italic mt-3 mb-3 p-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h2>Redeem Voucher</h2>
                <br>
                <form action="redeem_voucher.php" method="post">
                    <input class="inpfrm w-25" type="text" name="i1" maxlength="4"> -
                    <input class="inpfrm w-25" type="text" name="i2" maxlength="4"> -
                    <input class="inpfrm w-25" type="text" name="i3" maxlength="4">
                    <br><br>
                    <input class="inpfrm w-25" type="text" name="i4" maxlength="4"> -
                    <input class="inpfrm w-25" type="text" name="i5" maxlength="4">
                    <br><br>
                    <input class="btn btn-success w-75" type="submit" value="Redeem">
                </form>
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

    function showform(){
        document.getElementById("form").style.display = "block";
    }

    function hideform(){
        document.getElementById("form").style.display = "none";
    }

</script>