<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <?php
        include("db_conn.php");
    ?>

    <h2>Create Member</h2>
    <form action="create_member.php" method="post">
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <br>
        <input type="text" name="notlp" placeholder="Masukkan Nomor Telepon">
        <br>
        <input type="text" name="alamat" placeholder="Masukkan Alamat">
        <br>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <input type="password" name="password" placeholder="Masukkan Password">
        <br>
        <input type="submit" value="Submit">
    </form>

    <h2>Edit Member</h2>
    <form action="edit_member.php" method="post">
        <input type="text" name="idMember" placeholder="Masukkan ID">
        <br>
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <br>
        <input type="text" name="notlp" placeholder="Masukkan Nomor Telepon">
        <br>
        <input type="text" name="alamat" placeholder="Masukkan Alamat">
        <br>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <input type="password" name="password" placeholder="Masukkan Password">
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        $sqlShowAll = "SELECT * FROM members";
        $listMember = $conn->query($sqlShowAll);
    ?>

    <h2>Member List</h2>
    <table class="table table-dark">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
        </thead>
        <tbody class="text-center">
            <?php
                if($listMember->num_rows > 0)
                {
                    while($row = $listMember->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>" . $row['id_member'] . "</td>";
                            echo "<td>" . $row['nama_member'] . "</td>";
                            echo "<td>" . $row['notelp_member'] . "</td>";
                            echo "<td>" . $row['alamat_member'] . "</td>";
                            echo "<td>" . $row['role_member'] . "</td>";
                            echo "<td><a href='delete_member.php?id=" . $row['id_member'] . "'>
                                    <button class='btn btn-danger'>Delete</button></a></td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo "<tr>";
                        echo "<td colspan=6>DATA MEMBER TIDAK ADA</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>