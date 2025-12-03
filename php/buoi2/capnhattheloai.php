<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "select * from the_loai where id ='$id' ";
            $result = mysqli_query($conn,$sql);  
            $the_loai = mysqli_fetch_assoc($result);
        }
    ?>
    <div class="form">
    <form action="index.php?page_layout=capnhattheloai&id=<?php echo $id?>" method="POST">
        <h1>Cập nhật thể loại</h1>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <p>Tên thể loại</p>
            <input type="text" name="the_loai" value="<?php echo $the_loai['ten_the_loai']; ?>">
        </div>
        <div style="margin-top: 20px;">
            <input type="submit">
        </div>
<?php 
    
        if(
            !empty($_POST["the_loai"])
            ){
                $theLoai = $_POST["the_loai"];

                $sql = "UPDATE the_loai 
                SET ten_the_loai = '$theLoai' 
                where id = '$id'
                " ;
                mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("location:index.php?page_layout=theloai");
                exit();
                echo $sql;
                }
                else{
                    echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
            } 
            
    ?>


</body>
</html>