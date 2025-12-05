<?php
session_start();


if(isset($_GET['id'])) {
    include("connect.php");
    $id_xoa = $_GET['id'];
    $sql = "SELECT * FROM quoc_gia where id = '$id_xoa'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_fetch_row($result) > 0){
        echo "Đã có phim liên quan đến Quốc Gia muốn xóa! Vui lòng kiểm tra lại "  ;      
    }
    else{
    $sql_xoa = "DELETE FROM phim WHERE id = $id_xoa";
    mysqli_query($conn, $sql_xoa);
    header("Location: index.php?page_layout=quocgia");
    exit();
    }
}
?>