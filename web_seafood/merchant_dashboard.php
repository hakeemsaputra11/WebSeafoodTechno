<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Merchant Dashboard</title>
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
                <a href="merchant_dashboard.php">
                    <img class="w-100" src="icon/id-card.png" alt="icon home" id="img1">
                    <h6 class="text-center text-white" id="txt1">Profile</h6>
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

    <div class="pt-3 pb-3" style="background-image:url('icon/wpp22.jpg');background-size:100%">

    <!-- ISI -->
    <div class="container-fluid">
        <!-- Welcoming Member -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-white text-center font-italic mb-3 p-1" 
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h1>Welcome, <?php echo $_SESSION['nama'] ?></h1>
            </div>
            <div class="col-4"></div>
        </div>
        <!-- Member Profile -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center font-italic text-white p-3" 
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h2>Profile</h2>
                <br>
                <h5>ID Member : <?php echo $_SESSION['id'] ?></h5>
                <h5>Nama : <?php echo $_SESSION['nama'] ?></h5>
                <h5>No. Telp : <?php echo $_SESSION['notlp'] ?></h5>
                <h5>Alamat : <?php echo $_SESSION['alamat'] ?></h5>
                <h5>Role : <?php echo $_SESSION['role'] ?></h5>
                <br>
                <button class="btn btn-primary w-50" onclick="showform()">Edit Profile</button>
                <br>
                <br>
                <a href="delete_member.php">
                    <button class="btn btn-danger w-50">Delete Profile</button>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
        <!-- Edit Profile Form -->
        <div class="row">
            <div class="col-4"></div>
            <div id="form" class="col-4 text-center font-italic text-white p-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px;display:none">
                <h2>Edit Profile</h2>
                <br>
                <form action="edit_member.php" method="post">
                    <h5>Nama</h5>
                    <input class="inpfrm w-75" type="text" name="nama" placeholder="Masukkan Nama" 
                    value=<?php echo $_SESSION['nama'] ?>>
                    <br>
                    <br>
                    <h5>No. Telp</h5>
                    <input class="inpfrm w-75" type="text" name="notlp" splaceholder="Masukkan Nomor Telepon" 
                    value=<?php echo $_SESSION['notlp'] ?>>
                    <br>
                    <br>
                    <h5>Alamat</h5>
                    <input class="inpfrm w-75" type="text" name="alamat" placeholder="Masukkan Alamat" 
                    value=<?php echo $_SESSION['alamat'] ?>>
                    <br>
                    <br>
                    <h5>Username</h5>
                    <input class="inpfrm w-75" type="text" name="username" placeholder="Masukkan Username"
                    value=<?php echo $_SESSION['username'] ?>>
                    <br>
                    <br>
                    <h5>Password</h5>
                    <input class="inpfrm w-75" type="password" name="password" placeholder="Masukkan Password">
                    <br>
                    <br>
                    <input class="btn btn-success w-75" type="submit" value="Submit">
                </form>
                <br>
                <button class="btn btn-danger w-75" onclick="hideform()">Cancel</button>
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