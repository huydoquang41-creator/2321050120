<?php
session_start();
include("connect.php");

if(isset($_GET['id'])) {
    $id_xoa = $_GET['id'];
    $sql = "SELECT * FROM nguoi_dung WHERE id = '$id_xoa'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $sql_xoa = "DELETE FROM nguoi_dung WHERE id = '$id_xoa'";
        if(mysqli_query($conn, $sql_xoa)) {
            $_SESSION['message'] = "Xóa người dùng thành công!";
            header("Location: index.php?page_layout=nguoidung");
            exit();
        } else {
            echo "Lỗi xóa: " . mysqli_error($conn);
        }
    }
    else{
        echo "Không tìm thấy người dùng với ID = $id_xoa!";      
    }
    
    mysqli_close($conn);
} else {
    echo "Không có ID được cung cấp!";
}
?>