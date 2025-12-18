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

    <form action="themthuy.php" method="post">
        <div class="khung">
            <div style="text-align: center;">
                <h1>Thêm thú y</h1>
            </div>
            <div class="form">

                <div class="ten">
                    <p>Ten dong vat</p>
                    <input type="text" placeholder="Nhập vào tên của động vật" name="ten">
                </div>
                <div class="loai">
                    <p>Giong loai dong vat</p>
                    <input type="text" placeholder="Nhập vào giống loài" name="loai">
                </div>
                <div class="ngay">
                    <p>Ngay cham soc</p>
                    <input type="date" name="ngay">
                </div>
                <div class="thucan">
                    <p>Thuc an/thuc uong duoc cung cap</p>
                    <input type="text" name="thucan">
                </div>
                <div class="ghichu">
                    <p>Ghi chu:</p>
                    <textarea name="ghichu"></textarea>
                </div>
                <div class="suckhoe">
                    <p>Tinh trang suc khoe</p>
                    <input type="text" name="suckhoe">
                </div>
                <div class="xacnhan">
                    <a href="thuy.php"><button>Xác nhận</button></a>
                </div>
            </div>
        </div>

        <?php
        if (
            !empty($_POST['ten']) &&
            !empty($_POST['loai']) &&
            !empty($_POST['ngay']) &&
            !empty($_POST['thucan']) &&
            !empty($_POST['ghichu']) &&
            !empty($_POST['suckhoe'])
        ) {
            include('connect.php');

            $ten = $_POST['ten'];
            $loai = $_POST['loai'];
            $ngay =  $_POST['ngay'];
            $thucAn = $_POST['thucan'];
            $ghiChu = $_POST['ghichu'];
            $sucKhoe = $_POST['suckhoe'];

            $sql = "INSERT INTO cham_soc_dong_vat (ten_dong_vat,loai,ngay_cham_soc,thuc_an,ghi_chu,tinh_trang_suc_khoe)
        VALUES ('$ten','$loai','$ngay','$thucAn','$ghiChu','$sucKhoe') ";
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            header('location:thuy.php');
        }
        ?>
</body>

</html>