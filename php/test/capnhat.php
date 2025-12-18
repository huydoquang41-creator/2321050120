<?php
include('connect.php');

// 1. Lấy ID và thông tin cũ
$id = $_GET['id'];
$sql = "SELECT * FROM cham_soc_dong_vat WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);
$dv = mysqli_fetch_assoc($result); // QUAN TRỌNG: Khai báo $dv

// 2. Xử lý update
if ($_POST) {
    $ten = $_POST['ten'];
    $loai = $_POST['loai'];
    $ngay = $_POST['ngay'];
    $thucAn = $_POST['thucan'];
    $ghiChu = $_POST['ghichu'];
    $sucKhoe = $_POST['suckhoe'];

    $sql_update = "UPDATE cham_soc_dong_vat 
                   SET ten_dong_vat='$ten', loai='$loai', ngay_cham_soc='$ngay', 
                       thuc_an='$thucAn', ghi_chu='$ghiChu', tinh_trang_suc_khoe='$sucKhoe' 
                   WHERE id='$id'";

    mysqli_query($conn, $sql_update);
    header("Location: thuy.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
        }

        .khung {
            width: 30%;
            height: 600px;
            margin: auto;
            border: solid 2px black;
            border-radius: 20px;
            margin-top: 50px;

        }

        .form {
            width: 90%;
            height: 100%;

            margin: auto;

        }
    </style>
</head>

<body>
    <div class="khung">
        <div style="text-align: center;">
            <h1>Cập nhật thú y</h1>
        </div>
        <div class="form">
            <form method="POST">
                <p>Tên động vật</p>
                <input type="text" name="ten" value="<?php echo $dv['ten_dong_vat']; ?>">

                <p>Giống loài</p>
                <input type="text" name="loai" value="<?php echo $dv['loai']; ?>">

                <p>Ngày chăm sóc</p>
                <input type="date" name="ngay" value="<?php echo $dv['ngay_cham_soc']; ?>">

                <p>Thức ăn</p>
                <input type="text" name="thucan" value="<?php echo $dv['thuc_an']; ?>">

                <p>Ghi chú</p>
                <textarea name="ghichu"><?php echo $dv['ghi_chu']; ?></textarea>

                <p>Tình trạng sức khỏe</p>
                <input type="text" name="suckhoe" value="<?php echo $dv['tinh_trang_suc_khoe']; ?>">

                <!-- NÚT SUBMIT -->
                <button type="submit">Cập nhật</button>
            </form>

            <a href="thuy.php">Quay lại</a>
        </div>
    </div>

</body>