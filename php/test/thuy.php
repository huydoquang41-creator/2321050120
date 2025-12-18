<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            text-align: center;
        }

        table {
            margin: auto;
            margin-top: 50px;
        }

        .title {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>

    <div class="khung">
        <div class="title">
            <h1>Bảng chăm sóc thú ý</h1>
            <div style="margin-top:40px ;">
                <a href="themthuy.php"><button style="padding: 10px 20px; border-radius:20px; background-color:azure">Thêm động vật</button></a>
            </div>
        </div>
        <table border=1 width=100%>
            <tr>
                <th>ID</th>
                <th>Tên động vật </th>
                <th>Giống Loài</th>
                <th>Ngày chăm sóc</th>
                <th>Thức ăn được cung cấp</th>
                <th>Ghi chú</th>
                <th>Tình trạng sức khỏe</th>
                <th>Chức năng</th>
            </tr>
            <?php
            include('connect.php');
            $sql = "SELECT * FROM cham_soc_dong_vat";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ten_dong_vat']; ?></td>
                    <td><?php echo $row['loai']; ?></td>
                    <td><?php echo $row['ngay_cham_soc']; ?></td>
                    <td><?php echo $row['thuc_an']; ?></td>
                    <td><?php echo $row['ghi_chu']; ?></td>
                    <td><?php echo $row['tinh_trang_suc_khoe']; ?></td>
                    <td>
                        <a href="xoa.php?id=<?php echo $row['id']; ?>"><button>Xóa</button></a>
                        <a href="capnhat.php?id=<?php echo $row['id']; ?>"><button>Cập nhật</button></a>
                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>

</body>

</html>