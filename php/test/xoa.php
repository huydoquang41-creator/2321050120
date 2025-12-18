<?php
session_start();
if (isset($_GET['id'])) {
    include("connect.php");
    $id_xoa = $_GET['id'];
    $sql_xoa = "DELETE FROM cham_soc_dong_vat WHERE id = '$id_xoa' ";
    mysqli_query($conn, $sql_xoa);
    header("Location:thuy.php");
    exit();
}
?>