<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .phim {
            display: flex;
            gap: 20px;
            margin: 20px;
        }
    </style>
</head>

<body>
    <?php
    include('connect.php');
    include('index.php');
    $id = $_GET['id'];
    $sql = " SELECT 
                p.*,
                tl.ten_the_loai,
                GROUP_CONCAT(DISTINCT tl.ten_the_loai SEPARATOR ', ') as danh_sach_the_loai,
                q.ten_quoc_gia
            FROM phim p
            LEFT JOIN phim_theloai pt ON p.id = pt.phim_id
            LEFT JOIN the_loai tl ON pt.the_loai_id = tl.id
            LEFT JOIN quoc_gia q ON p.quoc_gia_id = q.id
            WHERE p.id = '$id'
            GROUP BY p.id, p.ten_phim, q.ten_quoc_gia
            ORDER BY p.id; ";

    $result = mysqli_query($conn, $sql);
    $poster = mysqli_fetch_array($result);

    ?>
    <div class="phim">

        <poster>
            <img src="<?php echo $poster['poster'] ?>" alt="">
        </poster>
        <div class="chitiet">
            <h2><?php echo $poster['ten_phim'] ?></h2>
            <p><strong>Đạo diễn: </strong><?php echo $poster['dao_dien_id'] ?></p>
            <p><strong>Thể loại: </strong><?php echo $poster['ten_the_loai'] ?></p>
            <p><strong>Quốc gia: </strong><?php echo $poster['ten_quoc_gia'] ?></p>
            <p><strong>Năm phát hành: </strong><?php echo $poster['nam_phat_hanh'] ?></p>
            <p><strong>Mô tả: </strong><?php echo $poster['mo_ta'] ?></p>
        </div>


</body>

</html>