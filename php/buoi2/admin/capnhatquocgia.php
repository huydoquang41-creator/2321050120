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
            $sql = "select * from quoc_gia where id ='$id' ";
            $result = mysqli_query($conn,$sql);  
            $quoc_gia = mysqli_fetch_assoc($result);
        }
    ?>
    <div class="form">
    <form action="index.php?page_layout=capnhatquocgia&id=<?php echo $id ?>" method="POST">
        <h1>Cập nhật quốc gia</h1>
        
        <div>
            <p>Tên Quốc Gia:</p>
            <input type="text" name="quoc_gia" value="<?php echo $quoc_gia['ten_quoc_gia']; ?>">
        </div>
        <div style="margin-top: 20px;">
            <input type="submit">
        </div>
<?php 
    
        if(
            !empty($_POST["quoc_gia"])
            ){
                
                $quocGia = $_POST["quoc_gia"];

                $sql = "UPDATE quoc_gia 
                SET ten_quoc_gia= '$quocGia' 
                where id = '$id'
                " ;
                mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("location:index.php?page_layout=quocgia");
                echo $sql;
                }
                else{
                    echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
            } 
            
    ?>


</body>
</html>