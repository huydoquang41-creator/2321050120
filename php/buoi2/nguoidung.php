<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            color: white;
        }
        .delete{
            background-color: red;
        }
    </style>
</head>
<body>
    <center>
    <h1>Quan li nguoi dung</h1>
    
    <table border=1>
        <tr>
            <th>Ten dang nhap</th>
            <th>Ho ten</th>
            <th>Email</th>
            <th>So dien thoai</th>
            <th>Vai tro</th>
            <th>Ngay sinh</th>
            <th>Chuc nang</th>
        </tr>
        <?php 
            include("connect.php");
            $sql = "Select * From nguoi_dung";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)){

        ?>    
        
        <tr>
            <td><?php echo $row["ten_dang_nhap"]; ?></td>
            <td><?php echo $row["ho_ten"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["sdt"]; ?></td>
            <td><?php echo $row["vai_tro_id"]; ?></td>
            <td><?php echo $row["ngay_sinh"]; ?></td>
            <td>
                <button>Sua</button>
                <button class="delete"><a class="" href="xoanguoidung.php?id=<?php echo $row["id"]; ?>">Xoa</a></button>
            </td>
        </tr>

        <?php } ?>
        
    </table>
    </center>
</body>
</html>