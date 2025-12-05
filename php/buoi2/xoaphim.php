<?php
session_start();
include("connect.php");

if(isset($_GET['id'])) {
    $id_xoa = $_GET['id'];
    $sql = "SELECT * FROM phim where quoc_gia_id = '$id_xoa'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "Đã có phim liên quan đến Quốc Gia muốn xóa! Vui lòng kiểm tra lại "  ;      
    }
    else{
    $sql_xoa = "DELETE FROM phim WHERE id = $id_xoa";
    mysqli_query($conn, $sql_xoa);
    header("Location: index.php?page_layout=phim");
    exit();
    }
}
?>