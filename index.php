<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <?php

        session_start();

        $visLogin = "";
        $visLogout = "";
        $visMember = "";

        if(isset($_SESSION['role'])){
            $visLogin = "style = display:none"; 
            $visLogout = "style = display:block";
            
            if($_SESSION['role'] == "admin"){

                $visMember = "style = display:block";
            }
            else{
                $visMember = "style = display:none";
            }
        }
        else{
            $visLogin = "style = display:block";
            $visLogout = "style = display:none";
            $visMember = "style = display:none";
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
                <a href="index.php">
                    <img class="w-100" src="icon/house.png" alt="icon home" id="img1">
                    <h6 class="text-center text-white" id="txt1">Home</h6>
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
                <a href="loginRegister.php">
                    <img class="w-100 vis" src="icon/barcode.png" alt="icon member" id="img3"
                    onmouseover="visible(3)" onmouseout="invisible(3)">
                    <h6 class="text-center text-white" id="txt3" style="display:none">Member</h6>
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

    <a href="member.php" <?php echo $visMember; ?>>
        Member
    </a>
    <a href="loginRegister.php" <?php echo $visLogin; ?>>
        Login
    </a>
    <a href="logout.php" <?php echo $visLogout; ?>>
        Logout
    </a>

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