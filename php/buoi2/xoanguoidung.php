<?php
session_start();
include("connect.php");

if(isset($_GET['id'])) {
    $id_xoa = $_GET['id'];
    
    // XÓA TRỰC TIẾP KHÔNG KIỂM TRA
    $sql_xoa = "DELETE FROM nguoi_dung WHERE id = $id_xoa";
    mysqli_query($conn, $sql_xoa);
}

// QUAY VỀ TRANG QUẢN LÝ NGƯỜI DÙNG
header("Location: index.php?page_layout=nguoidung");
exit();
?>