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
        table{
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
    <div class="khung">
        <h1>Bảng Phim</h1>
        <a href="themphim.php"><button>Thêm phim</button></a>
    </div>
    <table border=1>
        <tr>
            <th>Id</th>
            <th>Tên phim</th>
            <th>Đạo diễn id</th>
            <th>Năm phát hành</th>
            <th>Poster</th>
            <th>Quốc gia id </th>
            <th>Số tập</th>
            <th>Trailer</th>
            <th>Mô tả</th>
            <th>Chức năng</th>
        </tr>
        <?php 
            include("connect.php");
            $sql = "Select * From phim";

            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)){

        ?>    
        
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["ten_phim"]; ?></td>
            <td><?php echo $row["dao_dien_id"]; ?></td>
            <td><?php echo $row["nam_phat_hanh"]; ?></td>
            <td><?php echo $row["poster"]; ?></td>
            <td><?php echo $row["quoc_gia_id"]; ?></td>
            <td><?php echo $row["so_tap"]; ?></td>
            <td><?php echo $row["trailer"]; ?></td>
            <td><?php echo $row["mo_ta"]; ?></td>
            <td>
                <a href="index.php?page_layout=capnhatphim&id=<?php echo $row['id'] ; ?>"><button>Sua</button></a>
                <button class="delete"><a class="" href="xoaphim.php?id=<?php echo $row["id"]; ?>">Xoa</a></button>
            </td>
        </tr>

        <?php } ?>
        
    </table>
    </center>
</body>
</html>