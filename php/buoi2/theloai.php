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
    </style>
</head>
<body>
    <center>
    <h1>Thể loại</h1>
    
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Tên thể loại</th>
            <th>Chức năng</th>
        </tr>
        <?php 
            include("connect.php");
            $sql = "Select * From the_loai";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)){

        ?>    
        
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["ten_the_loai"]; ?></td>
            
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