<?php
session_start();
include("connect.php");

if(isset($_GET['id'])) {
    $id_xoa = $_GET['id'];
    
    // 1. Kiểm tra xem có thể loại này không
    $sql = "SELECT * FROM the_loai WHERE id = '$id_xoa'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        // 2. Kiểm tra xem thể loại có đang được sử dụng trong phim_theloai không
        $sql_kiemtra = "SELECT * FROM phim_theloai WHERE the_loai_id = '$id_xoa'";
        $result_kiemtra = mysqli_query($conn, $sql_kiemtra);
        
        if(mysqli_num_rows($result_kiemtra) > 0){
            // Nếu có phim sử dụng thể loại này, không cho xóa
            $_SESSION['error'] = "Không thể xóa thể loại này vì có phim đang sử dụng!";
            header("Location: index.php?page_layout=theloai");
            exit();
        } else {
            // 3. Xóa thể loại nếu không có phim nào sử dụng
            $sql_xoa = "DELETE FROM the_loai WHERE id = '$id_xoa'";
            
            if(mysqli_query($conn, $sql_xoa)) {
                $_SESSION['message'] = "Xóa thể loại thành công!";
                header("Location: index.php?page_layout=theloai");
                exit();
            } else {
                echo "Lỗi xóa thể loại: " . mysqli_error($conn);
            }
        }
    }
    else{
        $_SESSION['error'] = "Không tìm thấy thể loại với ID = $id_xoa!";
        header("Location: index.php?page_layout=theloai");
        exit();
    }
    
    mysqli_close($conn);
} else {
    echo "Không có ID thể loại được cung cấp!";
}
?>