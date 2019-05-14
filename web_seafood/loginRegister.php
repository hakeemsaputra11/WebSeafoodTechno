<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login and Register</title>
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

    <!-- Navbar -->
    <div class="container-fluid" style="background-color:#2980b9">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="index.php">
                    <img class="w-100 vis" src="icon/house.png" alt="icon home" id="img1"
                    onmouseover="visible(1)" onmouseout="invisible(1)">
                    <h6 class="text-center text-white" id="txt1" style="display:none">Home</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="">
                    <img class="w-100 vis" src="icon/menu.png" alt="icon menu" id="img2" 
                    onmouseover="visible(2)" onmouseout="invisible(2)">
                    <h6 class="text-center text-white" id="txt2" style="display:none">Menu</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="loginRegister.php" >
                    <img class="w-100" src="icon/barcode.png" alt="icon member" id="img3">
                    <h6 class="text-center text-white" id="txt3">Member</h6>
                </a>
            </div>
            <div class="col-1 pt-3 pr-3 pb-1 pl-3">
                <a href="">
                    <img class="w-100 vis" src="icon/information.png" alt="icon about" id="img4" 
                    onmouseover="visible(4)" onmouseout="invisible(4)">
                    <h6 class="text-center text-white" id="txt4" style="display:none">About</h6>
                </a>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <!-- Form -->
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4 text-center text-white p-3 font-italic bgForm"
            style="border-radius:20px 0 0 20px;"><!-- Login Form -->

                <h1>Login</h1>
                <form action="login_check.php" method="post">
                    <h6>Username</h6>
                    <input type="text" name="username" class="w-75 text-center text-white" 
                    placeholder="Masukkan Username" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <h6>Password</h6>
                    <input type="Password" name="password" class="w-75 text-center text-white" 
                    placeholder="Masukkan Password" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <input type="submit" value="Login" class="btn btn-success">
                </form>

            </div>
            <div class="col-4 text-center text-white p-3 font-italic bgForm"
            style="border-radius:0 20px 20px 0;"><!-- Register Form -->

                <h1>Register</h1>
                <form action="register_member.php" method="post">

                    <h6>Nama</h6>
                    <input type="text" name="nama" class="w-75 text-center text-white" 
                    placeholder="Masukkan Nama" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <h6>No. Telepon</h6>
                    <input type="text" name="notlp" class="w-75 text-center text-white" 
                    placeholder="Masukkan Nomor Telepon" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <h6>Alamat</h6>
                    <input type="text" name="alamat" class="w-75 text-center text-white" 
                    placeholder="Masukkan Alamat" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <h6>Role</h6>
                    <select name="role" class="w-75 text-white text-center" style="background-color:rgb(0,0,0,0.5);
                    border:none;border-radius:20px">
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select>
                    <br>
                    <br>
                    <h6>Username</h6>
                    <input type="text" name="username" class="w-75 text-center text-white" 
                    placeholder="Masukkan Username" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <h6>Password</h6>
                    <input type="Password" name="password" class="w-75 text-center text-white" 
                    placeholder="Masukkan Password" style="background-color:rgb(0,0,0,0.5);border:none;
                    border-radius:20px" required>
                    <br>
                    <br>
                    <input type="submit" value="Register" class="btn btn-success">
                </form>

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