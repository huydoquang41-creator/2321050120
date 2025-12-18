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
        .khung{
            display: flex;
            justify-content: space-around;
        }
        .khung button{
            padding: 15px;
            width: 100%;
            margin-top: 20px;
            border-radius: 20px;
            background-color: lawngreen;
        }
    </style>
</head>
<body>
    <center>
    <div class="khung">
        <h1>Bảng quốc gia</h1>
        <a href="themquocgia.php"><button>Thêm quốc gia</button></a>
    </div>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Tên quốc gia</th>
            <th>Chức năng</th>
        </tr>
        <?php 
            include("connect.php");
            $sql = "Select * From quoc_gia";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)){

        ?>    
        
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["ten_quoc_gia"]; ?></td>
            
            <td>
                <a href="index.php?page_layout=capnhatquocgia&id=<?php echo $row["id"]; ?>"><button>Sua</button></a>
                <button class="delete"><a class="" href="xoaquocgia.php?id=<?php echo $row["id"]; ?>">Xoa</a></button>
            </td>
        </tr>

        <?php } ?>
        
    </table>
    </center>
</body>
</html>