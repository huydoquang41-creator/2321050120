<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            
        }
        .delete{
            background-color: red;
        }
        .them{
            display: flex;
            justify-content: space-around;
        }
        .button{
            margin-top: 20px;
            background-color: lawngreen;
            border-radius: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <center>
    <div class="them">
        <h1>Quan li nguoi dung</h1>
        <a class="" href="index.php?page_layout=themnguoidung"><button class="button"> Thêm người dùng</button></a>
    </div>
    
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
                <a class="" href="index.php?page_layout=capnhat&id=<?php echo $row["id"]; ?>"><button>Sua</button></a>
                <button class="delete"><a class="" href="xoanguoidung.php?id=<?php echo $row["id"]; ?>">Xoa</a></button>
            </td>
        </tr>

        <?php } ?>
        
    </table>
    </center>
</body>
</html>