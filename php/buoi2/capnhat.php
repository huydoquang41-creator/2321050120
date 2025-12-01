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
        $sql = "select * from nguoi_dung where id ='$id' ";
        $result = mysqli_query($conn , $sql);
        $nguoiDung = mysqli_fetch_assoc($result);
    ?>
    <div class="form">
    <form action="index.php?page_layout=capnhat &id=<?php echo $id ?>" method="POST">
        <h1>Cập nhật người dùng</h1>
        <div>
            <p>Tên đăng nhập:</p>
            <input type="text" name="username" placeholder="Tên đăng nhập" value=<?php echo $nguoiDung['ten_dang_nhap'] ?>>
        </div>
        <div>
            <p>Mật khẩu:</p>
            <input type="password" name="password" placeholder="Mật khẩu" value=<?php echo $nguoiDung['mat_khau'] ?>>
        </div>
        <div>
            <p>Họ và tên:</p>
            <input type="text" name="ho_ten" placeholder="Nhập họ và tên" value=<?php echo $nguoiDung['ho_ten'] ?>>

        </div>
        <div>
            <p>Email:</p>
            <input type="email" name="email" placeholder="Nhập email" value=<?php echo $nguoiDung['email'] ?>>
        </div>
        <div>
            <p>Số điện thoại:</p>
            <input type="text" name="sdt" placeholder="Nhập số điện thoại" value=<?php echo $nguoiDung['sdt'] ?>>

        </div>
        <div>
            <p>Ngày sinh</p>
            <input type="date" name="date" value=<?php echo $nguoiDung['date'] ?>>
        </div>
        <div>
            <p>Vai trò</p>
            
            <select name="vai_tro" value=<?php echo $nguoiDung['vai_tro'] ?>>
                <option value="301">user 1</option>
                <option value="302">user 2</option>
                <option value="303">user 3</option>
                <option value="304">user 4</option>

            </select>
        </div>
        <div style="margin-top: 20px;">
            <input type="submit">
        </div>

    </form>
    </div>
    <?php 
        if(!empty($_POST["username"])&& 
            !empty($_POST["password"])&&
            !empty($_POST["ho_ten"])&&
            !empty($_POST["email"])&&
            !empty($_POST["sdt"])&&
            !empty($_POST["date"])&&
            !empty($_POST["vai_tro"])
        ){
            include("connect.php");
            $tenDangNhap = $_POST["username"];
            $password = $_POST["password"];
            $hoTen = $_POST["ho_ten"];
            $email = $_POST["email"];
            $sdt = $_POST["sdt"];
            $ngaySinh = $_POST["date"];
            $vaiTro = $_POST["vai_tro"];
            
            
            $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, email, sdt, ngay_sinh, vai_tro_id)
            VALUES ('$tenDangNhap', '$password', '$hoTen', '$email', '$sdt', '$ngaySinh', '$vaiTro')";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("location:index.php?page_layout=nguoidung");
        }
        else{
            echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
        }
    ?>
</body>
</html>