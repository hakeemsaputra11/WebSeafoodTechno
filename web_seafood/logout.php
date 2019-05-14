<?php
    session_start();

    echo "<script type='text/javascript'>alert('Berhasil Logout')</script>";
    echo "<script type='text/javascript'>window.location = 'index.php'</script>";

    session_unset();
    session_destroy();
?>