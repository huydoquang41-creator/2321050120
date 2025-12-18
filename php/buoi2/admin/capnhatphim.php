<?php
if (
    !empty($_POST["ten_phim"]) &&
    !empty($_POST["the_loai"]) &&
    !empty($_POST["dao_dien"]) &&
    !empty($_POST["nam_phat_hanh"]) &&
    !empty($_POST["poster"]) &&
    !empty($_POST["quoc-gia-id"]) &&
    !empty($_POST["so_tap"]) &&
    !empty($_POST["trailer"]) &&
    !empty($_POST["mo_ta"])

) {
    include("connect.php");
    $id = $_GET["id"];
    $tenpPhim = $_POST["ten_phim"];
    $theLoai = $_POST["the_loai"];
    $daoDien = $_POST["dao_dien"];
    $namPhatHanh = $_POST["nam_phat_hanh"];
    $poster = $_POST["poster"];
    $quocGiaId = $_POST["quoc-gia-id"];
    $soTap = $_POST["so_tap"];
    $trailer = $_POST["trailer"];
    $moTa = $_POST["mo_ta"];

    $sql = "UPDATE phim SET ten_phim='$tenpPhim', dao_dien_id = '$daoDien',  nam_phat_hanh='$namPhatHanh', poster='$poster', quoc_gia_id='$quocGiaId', so_tap='$soTap',trailer='$trailer',mo_ta='$moTa' where id='$id' ";
    mysqli_query($conn, $sql);
    $sql2 = "UPDATE phim_theloai SET the_loai_id = '$theLoai' WHERE phim_id = '$id'";
    mysqli_query($conn, $sql2);

    mysqli_close($conn);
    header("location:index.php?page_layout=phim");
    echo $sql;
} else {
    echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them nguoi dung</title>
    <style>
        body {
            margin: 0;
        }

        .form {
            margin-left: 20px;
        }

        input {
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

    // 1. Lấy thông tin phim
    $sql_phim = "SELECT * FROM phim WHERE id = '$id'";
    $result_phim = mysqli_query($conn, $sql_phim);
    $phim = mysqli_fetch_assoc($result_phim);

    // 2. Lấy thể loại của phim này từ bảng phim_theloai
    $sql_theloai = "SELECT the_loai_id FROM phim_theloai WHERE phim_id = '$id' LIMIT 1";
    $result_theloai = mysqli_query($conn, $sql_theloai);
    $theloai_phim = mysqli_fetch_assoc($result_theloai);

    // Biến lưu thể loại hiện tại của phim
    $the_loai_hien_tai = isset($theloai_phim['the_loai_id']) ? $theloai_phim['the_loai_id'] : '';

    ?>
    <div class="form">
        <form action="index.php?page_layout=capnhatphim&id=<?php echo $id ?>" method="POST">
            <h1>Cập nhật phim</h1>
            <div>
                <!-- <p>ID</p>
            <select name="id">
                <?php
                include("connect.php");
                $sql = "Select * From phim";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
                <?php } ?>    
            </select> -->
            </div>
            <div>
                <p>Tên phim</p>
                <input type="text" name="ten_phim" placeholder="Tên phim" value="<?php echo $phim["ten_phim"] ?>">
            </div>
            <div>
                <p>Thể loại</p>
                <select name="the_loai">
                    <?php
                    $sql_tl = "SELECT * FROM the_loai";
                    $result_tl = mysqli_query($conn, $sql_tl);
                    while ($row = mysqli_fetch_array($result_tl)) {
                        $selected = ($the_loai_hien_tai == $row['id']) ? "selected" : "";
                    ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo $selected; ?>>
                            <?php echo $row['ten_the_loai'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <p>Đạo diễn id</p>
                <select name="dao_dien">
                    <?php
                    include("connect.php");
                    $sql = "SELECT * From dao_dien ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $selected = ($phim["dao_dien_id"] == $row['id']) ? "selected" : "";
                    ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo $selected; ?>><?php echo $row['id'] ?></option>
                    <?php } ?>
                </select>
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
                <select name="quoc-gia-id">
                    <?php
                    include("connect.php");
                    $sql = "SELECT * From quoc_gia ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $selected = ($phim["quoc_gia_id"] == $row['id']) ? "selected" : "";
                    ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo $selected; ?>><?php echo $row['ten_quoc_gia'] ?></option>
                    <?php } ?>
                </select>
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

</body>

</html>