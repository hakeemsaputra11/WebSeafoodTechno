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
<body style="background-image:url('icon/wpp2.png')">

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
                    <img class="w-100" src="icon/id-card.png" alt="icon home" id="img1">
                    <h6 class="text-center text-white" id="txt1">Profile</h6>
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
                    <img class="w-100 vis" src="icon/voucher.png" alt="icon about" id="img4" 
                    onmouseover="visible(4)" onmouseout="invisible(4)">
                    <h6 class="text-center text-white" id="txt4" style="display:none">Voucher</h6>
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
                <h1>
                    Welcome, <?php echo $_SESSION['nama'] ?>
                </h1>
            </div>
            <div class="col-4"></div>
        </div>
        <!-- Member Profile -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center font-italic mb-3 text-white p-3" 
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h2>Profile</h2>
                <br>
                <h5>ID Member : <?php echo $_SESSION['id'] ?></h5>
                <h5>Nama : <?php echo $_SESSION['nama'] ?></h5>
                <h5>No. Telp : <?php echo $_SESSION['notlp'] ?></h5>
                <h5>Alamat : <?php echo $_SESSION['alamat'] ?></h5>
                <h5>Role : <?php echo $_SESSION['role'] ?></h5>
                <h5>Saldo : Rp. <?php echo $_SESSION['saldo'] ?></h5>
                <br>
                <button class="btn btn-primary w-75" onclick="showform()">Edit Profile</button>
                <br>
                <br>
                <a href="delete_member.php">
                    <button class="btn btn-danger w-75">Delete Profile</button>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
        <!-- Edit Profile Form -->
        <div class="row">
            <div class="col-4"></div>
            <div id="form" class="col-4 text-center font-italic text-white p-3 mb-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px;display:none">
                <h2>Edit Profile</h2>
                <br>
                <form action="edit_member.php" method="post">
                    <h5>Nama</h5>
                    <input class="inpfrm w-75" id="nama" type="text" name="nama" placeholder="Masukkan Nama" 
                    value=<?php echo $_SESSION['nama'] ?> onkeyup="cek()" required>
                    <br>
                    <br>
                    <h5>No. Telp</h5>
                    <input class="inpfrm w-75" id="notlp" type="text" name="notlp" splaceholder="Masukkan Nomor Telepon" 
                    value=<?php echo $_SESSION['notlp'] ?> onkeyup="cek()" required>
                    <br>
                    <br>
                    <h5>Alamat</h5>
                    <input class="inpfrm w-75" id="alamat" type="text" name="alamat" placeholder="Masukkan Alamat" 
                    value=<?php echo $_SESSION['alamat'] ?> required>
                    <br>
                    <br>
                    <h5>Username</h5>
                    <input class="inpfrm w-75" id="usrnm" type="text" name="username" placeholder="Masukkan Username"
                    value=<?php echo $_SESSION['username'] ?> onkeyup="cek()" required>
                    <br>
                    <br>
                    <h5>Password</h5>
                    <input class="inpfrm w-75" id="pass" type="password" name="password" placeholder="Masukkan Password"
                    onkeyup="cek()" required>
                    <br>
                    <br>
                    <input class="btn btn-success w-75" type="submit" value="Submit">
                </form>
                <br>
                <button class="btn btn-danger w-75" onclick="hideform()">Cancel</button>
            </div>
            <div class="col-4"></div>
        </div>
        <!-- Button Logout -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center p-3"
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <a href="logout.php">
                    <button class="btn btn-danger w-75">Logout</button>
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

    function cek()
    {
        let nama = document.getElementById("nama").value;
        let notelp = document.getElementById("notlp").value;
        let usrnm = document.getElementById("usrnm").value;
        let pass = document.getElementById("pass").value;
        
        if(nama.match(/[$-/:-?{-~!"^_`\[\]]/) || nama.match(/[0-9]/))
        {
            alert("Nama hanya boleh huruf!");
            document.getElementById("nama").value = "";
        }
        
        if(notelp.match(/[$-/:-?{-~!"^_`\[\]]/) || notelp.match(/[a-zA-Z]/) || notelp.match(/\s/))
        {
            alert("Telepon hanya boleh angka!");
            document.getElementById("notlp").value = "";
        }

        if(usrnm.match(/\s/))
        {
            alert("Username tidak boleh ada spasi!");
            document.getElementById("usrnm").value = "";
        }

        if(pass.match(/\s/))
        {
            alert("Password tidak boleh ada spasi!");
            document.getElementById("pass").value = "";
        }
    }
</script>