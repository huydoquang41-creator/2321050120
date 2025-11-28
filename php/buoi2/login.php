<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2</title>
</head>
<body>
    <form action="login.php" method="POST">
        <h1>Đăng nhập</h1>
        <div>
            <input type="text" name="username" placeholder="Tên đăng nhập" value>
        </div>
        <div>
            <input type="password" name="password" placeholder="Mật khẩu">
        </div>
        <div>
            <input type="submit" value="Đăng nhập">

        </div>
    </form>
    <?php 
        include('connect.php');
        if(isset($_POST["username"]) && isset($_POST["password"])){

            $tenDangNhap = $_POST["username"];
            $matKhau = $_POST["password"];
            
            // echo $tenDangNhap . "<br>";
            // echo $matKhau . "<br>";
        
            #Nếu tên đăng nhập bằng admin
            // Mật khẩu 123 thì cho phép người dùng vào trang chủ

            $sql = "select * from nguoi_dung where ten_dang_nhap = '$tenDangNhap' and mat_khau ='$matKhau'";
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0 ){
                session_start();
                $_SESSION["username"] = $tenDangNhap;
                $_SESSION["password"] = $matKhau;
                $_SESSION["hoten"] = $hoTen;
                header("location:index.html");
                exit();
            }
            
            else{
                if($tenDangNhap != $tenDangNhap){
                    echo "<script>alert('Sai ten dang nhap')</script>";
                }
                else{
                    echo "<script>alert('Sai mat khau')</script>";

                }
                exit();
            }            
        }                    
    ?>
    
</body>
</html>