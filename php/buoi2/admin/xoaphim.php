<?php
session_start();
include("connect.php");

if(isset($_GET['id'])) {
    $id_xoa = $_GET['id'];
    
    // 1. Kiểm tra xem có phim này không
    $sql = "SELECT * FROM phim WHERE id = '$id_xoa'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        // 2. Xóa dữ liệu liên quan trong bảng phim_theloai trước
        $sql_xoa_lienquan = "DELETE FROM phim_theloai WHERE phim_id = '$id_xoa'";
        mysqli_query($conn, $sql_xoa_lienquan);
        
        // 3. Xóa phim
        $sql_xoa = "DELETE FROM phim WHERE id = '$id_xoa'";
        
        if(mysqli_query($conn, $sql_xoa)) {
            $_SESSION['message'] = "Xóa phim thành công!";
            header("Location: index.php?page_layout=phim");
            exit();
        } else {
            echo "Lỗi xóa phim: " . mysqli_error($conn);
        }
    }
    else{
        echo "Không tìm thấy phim với ID = $id_xoa!";      
    }
    
    mysqli_close($conn);
} else {
    echo "Không có ID phim được cung cấp!";
}
?>