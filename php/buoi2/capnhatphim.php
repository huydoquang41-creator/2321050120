<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them nguoi dung</title>
    <style>
        body{
            margin: 0 ;
        }
        .form{
            margin-left: 20px;
        }
        input{
            width: 40%;
            padding: 7px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php 
        include("connect.php");
        $id = $_GET["id"];
        $sql = "SELECT * from phim where id = '$id' ";
        $result = mysqli_query($conn , $sql);   
        $phim = mysqli_fetch_assoc($result);
    ?>
    <div class="form">
    <form action="index.php?page_layout=capnhatphim&id=<?php echo $id ?>" method="POST">
        <h1>Cập nhật phim</h1>
        <div>
            <p>ID</p>
            <select name="id">
                <?php 
                    include("connect.php");
                    $sql = "Select id From phim" ;
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
                <?php } ?>    
            </select>
        </div>
        <div>
            <p>Tên phim</p>
            <input type="text" name="ten_phim" placeholder="Tên phim" value="<?php echo $phim["ten_phim"] ?>">
        </div>
        <div>
            <p>Đạo diễn id</p>
            <input type='number' name="dao_dien_id" min=232101 max=232130 step="1" value="<?php echo $phim["dao_dien_id"] ?>">
        </div>
        <div>
            <p>Năm phát hành</p>
            <input type="number" name="nam_phat_hanh" min=1900 max=2026 value="<?php echo $phim["nam_phat_hanh"] ?>">

        </div>
        <div>
            <p>Poster</p>
            <input type="text" name="poster" placeholder="Nhập poster" value="<?php echo $phim["poster"] ?>">
        </div>
        <div>
            <p>Quốc gia id:</p>
            <input type='number' name="quoc_gia_id" min=701 max=730 step="1" value="<?php echo $phim["quoc_gia_id"] ?>">
        </div>
        <div>
            <p>Số tập</p>
            <input type="text" name="so_tap" placeholder="Nhập số tập phim" value="<?php echo $phim["so_tap"] ?>">
        </div>
        <div>
            <p>Trailer</p>
            <input type="text" name="trailer" placeholder="Nhập trailer" value="<?php echo $phim["trailer"] ?>">
        </div>
        <div>
            <p>Mô tả</p>
            <textarea name="mo_ta"><?php echo $phim["mo_ta"] ?></textarea>
        </div>
        <div style="margin-top: 20px;">
            <input type="submit">
        </div>
    <?php 
        if( 
            !empty($_POST["ten_phim"])&&
            !empty($_POST["dao_dien_id"])&&
            !empty($_POST["nam_phat_hanh"])&&
            !empty($_POST["poster"])&&
            !empty($_POST["quoc_gia_id"])&&
            !empty($_POST["so_tap"])&&
            !empty($_POST["trailer"])&&
            !empty($_POST["mo_ta"])

        ){
            $tenpPhim = $_POST["ten_phim"];
            $daoDienId = $_POST["dao_dien_id"];
            $namPhatHanh = $_POST["nam_phat_hanh"];
            $poster = $_POST["poster"];
            $quocGiaId = $_POST["quoc_gia_id"];
            $soTap = $_POST["so_tap"];
            $trailer = $_POST["trailer"];
            $moTa = $_POST["mo_ta"];
            
            $sql = "UPDATE phim SET ten_phim='$tenpPhim', dao_dien_id='$daoDienId', nam_phat_hanh='$namPhatHanh', poster='$poster', quoc_gia_id='$quocGiaId', so_tap='$soTap',trailer='$trailer',mo_ta='$moTa' where id='$id' ";  
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("location:index.php?page_layout=phim");
            echo $sql;
        }
        else{
            echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
        }
    ?>
</body>
</html>