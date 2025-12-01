<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <style>
        body{
            margin: 0;
        }
        nav{
            background-color: aqua;
            display: flex;
            justify-content: space-between;
        }
        ul{
            display: flex;
            list-style: none;
            margin: 0;
        }
        li{
            padding: 10px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php  session_start();?>
    <header>
        <nav>
            <ul>
                <li class=""><a class="" href="index.php?page_layout=trangchu">Trang chủ</a></li>
                <li class=""><a class="" href="index.php?page_layout=phim">Phim</a></li>
                <li class=""><a class="" href="index.php?page_layout=theloai">Thể loại</a></li>
                <li class=""><a class="" href="index.php?page_layout=quocgia">Quốc gia</a></li>
                <li class=""><a class="" href="index.php?page_layout=nguoidung">Người dùng</a></li>

            </ul>
            <ul class="">
                <li><?php
                include('connect.php');
                if(isset($_SESSION["username"]) && isset($_SESSION["hoten"])){
                        echo "Xin chào " . $_SESSION["hoten"];
                }
                ?></li>
                <li><a class="" href="index.php?page_layout=dangxuat">Dang xuat</a></li>
            </ul>
        </nav>
        <?php  
            if(isset($_GET['page_layout'])){
                switch($_GET['page_layout']){
                    case 'trangchu':
                        include "trangchu.php";
                        break;
                    case 'phim':
                        include "phim.php";
                        break;    
                    case 'theloai':
                        include "theloai.php";
                        break;
                    case 'nguoidung':
                        include "nguoidung.php";
                        break;
                    case 'quocgia':
                        include "quocgia.php";
                        break;
                    case 'dangxuat':
                        include "dangxuat.php";
                        session_unset();
                        session_destroy();
                        header("Location:login.php");
                        break;
                    case 'themnguoidung':
                        include "themnguoidung.php";
                        break;
                    case 'capnhat':
                        include "capnhat.php";
                        break; 
                       
                }
            }
        ?>
    </header>
    
</body>
</html>