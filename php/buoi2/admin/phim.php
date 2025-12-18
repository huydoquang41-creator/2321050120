<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            text-decoration: none;

        }

        .delete {
            background-color: red;
        }

        .khung {
            display: flex;
            justify-content: space-around;
        }

        .khung button {
            padding: 15px;
            width: 100%;
            margin-top: 20px;
            border-radius: 20px;
            background-color: lawngreen;
        }

        table {
            text-align: center;
        }

        /* th, td {
        max-width: 150px;  
        width: 120px;      
        overflow: hidden;  
        text-overflow: ellipsis;
        white-space: nowrap; 
        } */

        /* td:nth-child(2) { 
            max-width: 200px;
            min-width: 150px;
        }  */
    </style>
</head>

<body>
    <center>
        <div class="khung">
            <h1>Bảng Phim</h1>
            <a href="themphim.php"><button>Thêm phim</button></a>
        </div>
        <table border=1 style="width: 100%; height:500px;">
            <tr>
                <th>Id</th>
                <th>Tên phim</th>
                <th>Thể loại</th>
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
            $sql = "SELECT 
                p.*,
                tl.ten_the_loai,
                GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as danh_sach_the_loai,
                q.ten_quoc_gia
            FROM phim p
            LEFT JOIN phim_theloai pt ON p.id = pt.phim_id
            LEFT JOIN the_loai tl ON pt.the_loai_id = tl.id
            LEFT JOIN quoc_gia q ON p.quoc_gia_id = q.id
            GROUP BY p.id, p.ten_phim, q.ten_quoc_gia
            ORDER BY p.id; ";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {

            ?>

                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["ten_phim"]; ?></td>
                    <td><?php echo $row["ten_the_loai"]; ?></td>
                    <td><?php echo $row["dao_dien_id"]; ?></td>
                    <td><?php echo $row["nam_phat_hanh"]; ?></td>
                    <td>
                        <img src="<?php echo $row['poster']; ?>" alt="" style="width: 100px; height:150px;">
                    </td>
                    <td><?php echo $row["ten_quoc_gia"]; ?></td>
                    <td><?php echo $row["so_tap"]; ?></td>
                    <td><?php echo $row["trailer"]; ?></td>
                    <td><?php echo $row["mo_ta"]; ?></td>
                    <td>
                        <a href="index.php?page_layout=capnhatphim&id=<?php echo $row['id']; ?>"><button>Sua</button></a>
                        <button class="delete"><a class="" href="xoaphim.php?id=<?php echo $row["id"]; ?>">Xoa</a></button>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </center>
</body>

</html>