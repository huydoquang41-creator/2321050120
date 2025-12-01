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
        table{
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
    <h1>Bảng phim</h1>
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
                <button>Sua</button>
                <button class="delete"><a class="" href="xoanguoidung.php?id=<?php echo $row["id"]; ?>">Xoa</a></button>
            </td>
        </tr>

        <?php } ?>
        
    </table>
    </center>
</body>
</html>