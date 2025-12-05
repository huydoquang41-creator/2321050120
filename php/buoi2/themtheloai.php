<?php 
        if(
            // !empty($_POST["id"]) &&
            !empty($_POST["the_loai"])
            ){
                include("connect.php");
                // $id = $_POST["id"];
                $theLoai = $_POST["the_loai"];

                $sql = "INSERT INTO the_loai( ten_the_loai)
                VALUES ( '$theLoai')";
                mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("location:index.php?page_layout=theloai");
                exit();
                }
                else{
                    echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
            } 
            
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url(data:image/jpeg;base64,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);
            background-size: cover;

            
        }
        .khung{
            width: 40%;
            height: 300px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header{
            width: 80%;
            
            background-color: aliceblue;
            height: 300px; 
            font-size:20px;
            padding: 10px;
        }
        .title{
            text-align: center;

        }
        .chucnang{
            margin: 20px;
        }
        .quocgia input{
            padding:10px;
            width:50%;
            border-radius: 10px;
        }
        .nut{
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }
        .nut button{
            width: 40%;
            padding: 15px;
            border-radius: 20px;
            background-color: lawngreen;
        }
    </style>
</head>
<body>
    <form action="index?page_layout=themtheloai" method="POST">
    <div class="khung">
        <div class="header">
            <div class="title">
                <p><b>Thêm thể loại</b></p>
            </div>
            <!-- <div class="chucnang">
                <div class="id">
                <p>ID:</p>
                <select name="id">
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>

                </select>
                </div> -->
                <div class="quocgia">
                    <p>Tên thể loại:</p>
                    <input type="text" name="the_loai" placeholder="Nhập thể loại muốn thêm">
                </div>
                <div class="nut">
                    <button type="submit">Xác nhận</button>
                </div>
            </div>
        </div>
        
    </div>
    </form>
    
</body>
</html>