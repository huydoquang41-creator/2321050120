<!-- !empty($_POST["id"])&& -->
<!-- $id = $_POST["id"]; -->
<?php 
        if( 
            !empty($_POST["ten_phim"])&&
            !empty($_POST["the_loai"])&&
            !empty($_POST["dao_dien_id"])&&
            !empty($_POST["nam_phat_hanh"])&&
            !empty($_POST["poster"])&&
            !empty($_POST["quoc_gia_id"])&&
            !empty($_POST["so_tap"])&&
            !empty($_POST["trailer"])&&
            !empty($_POST["mo_ta"])

        ){
            include("connect.php");
            
            $tenpPhim = $_POST["ten_phim"];
            $theLoai = $_POST["the_loai"];
            $daoDienId = $_POST["dao_dien_id"];
            $namPhatHanh = $_POST["nam_phat_hanh"];
            $poster = $_POST["poster"];
            $quocGiaId = $_POST["quoc_gia_id"];
            $soTap = $_POST["so_tap"];
            $trailer = $_POST["trailer"];
            $moTa = $_POST["mo_ta"];

            // Bước 1: Thêm phim (KHÔNG có the_loai_id)
            $sql= "INSERT INTO phim (ten_phim, dao_dien_id, nam_phat_hanh, poster, quoc_gia_id, so_tap, trailer, mo_ta)
                    VALUES ('$tenpPhim', '$daoDienId','$namPhatHanh', '$poster', '$quocGiaId', '$soTap', '$trailer', '$moTa')";
            mysqli_query($conn, $sql);

            // Bước 2: Lấy ID phim vừa thêm
            $phim_id = mysqli_insert_id($conn);

            // Bước 3: Thêm thể loại vào bảng phim_theloai
            $sql1 = "INSERT INTO phim_theloai (phim_id, the_loai_id) VALUES ('$phim_id', '$theLoai')";
            mysqli_query($conn, $sql1);
            mysqli_close($conn);
            header("location:index.php?page_layout=phim");
        }
        else{
            echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them phim</title>
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
            padding: 10px 0;

        }
        .box{
            width:100%;
        }
        textarea{
            width: 40%;
            padding: 10px 0;
        }
        select{
            width: 40%;
            padding: 10px 0;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="form">
    <form action="index.php?page_layout=themphim" method="POST">
        <h1>Thêm phim</h1>
        <!-- <div>
            <p>ID</p>
            <select name="id">
                <option value="431">431</option>
                <option value="432">432</option>
                <option value="433">433</option>
                <option value="434">434</option>
            </select>
        </div> -->
        <div>
            <p>Tên phim</p>
            <input type="text" name="ten_phim" placeholder="Tên phim" >
        </div>
        <div>
            <p>Thể loại</p>
            <select name="the_loai" >
                <?php 
                    include("connect.php");
                    $sql = "Select * From the_loai" ;
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['ten_the_loai'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <p>Đạo diễn id</p>
            <select name="dao_dien_id" required>
                <option value="">-- Chọn đạo diễn --</option>
                <?php 
                    include("connect.php");
                    $sql = "SELECT * FROM dao_dien ORDER BY id ASC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id'] ?>">
                        <?php echo $row['id'] ?> (ID: <?php echo $row['id'] ?>)
                    </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <p>Năm phát hành</p>
            <input type="number" name="nam_phat_hanh" min=1900 max=2026>

        </div>
        <div>
            <p>Poster</p>
            <input type="text" name="poster" placeholder="Nhập poster">
        </div>
        <div class="box">
            <p>Quốc gia id:</p>
            <select name="quoc_gia_id" >
                <?php 
                    include("connect.php");
                    $sql = "Select * From quoc_gia" ;
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['ten_quoc_gia'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <p>Số tập</p>
            <input type="text" name="so_tap" placeholder="Nhập số tập phim">
        </div>
        <div>
            <p>Trailer</p>
            <input type="text" name="trailer" placeholder="Nhập trailer">
        </div>
        <div>
            <p>Mô tả</p>
            <textarea name="mo_ta"></textarea>
        </div>
        <div style="margin-top: 20px;">
            <input type="submit">
        </div>

    </form>
    </div>
    
</body>
</html>