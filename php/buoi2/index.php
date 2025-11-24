<?php 
    // cookie
    #Lưu ở máy chủ người dùng(user)
    # dùng cho thông tin ít quan trọng
    
    $cookieName = "user";
    $cookieValue = "Huy";
    // 864000 = 30 ngay
    setcookie($cookieName, $cookieValue,time() + (86400), "/" );
     if(isset($_COOKIE[$cookieName])){
        echo "cookie đã tồn tại" . "<br>";
        
     }
     else{
        echo "cookie chưa tồn tại" . "<br>";
     }

    // session 
    #Thông tin đăng nhập, giỏ hàng ...
    session_start();
    $_SESSION["username"] = "Huy";

    echo $_SESSION["username"];
   
?>