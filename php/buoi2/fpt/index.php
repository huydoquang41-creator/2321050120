<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang admin</title>
    <style>
        body {
            background-color: rgb(13, 14, 14);
            margin: 0;
            color: white;
        }

        header {
            background-color: black;
            width: 100%;
            height: 10vh;
            align-items: center;
            display: flex;
        }

        .container {
            width: 70%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul {
            display: flex;
            list-style: none;
            /* gap: 20px; */
            padding: 0;
            margin: 0;
        }

        li {
            margin-right: 20px;
        }

        .logo {
            width: 100%;
            height: 40px;
            margin-right: 15px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        #xem-them {
            background: black;
            border: black;
            font-size: 16px;
            cursor: pointer;
            color: white;
        }

        #xem-them option {
            color: white;
            background: #222;
        }

        .chucnang {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .chucnang i {
            font-size: 18px;
        }

        .mua-goi {
            background-color: #ff6600;
            color: #fff;
            padding: 6px 15px;
            border-radius: 4px;
            font-weight: bold;
        }

        .dang-nhap {
            color: #ccc;
            text-decoration: none;
        }

        main {
            width: 70%;
            background-color: black;
            margin: auto;
        }

        .banner {
            width: 90%;
            margin: 0 30px 30px 30px auto;

        }

        .banner-info {
            position: absolute;
            color: white;
            background: rgba(0, 0, 0, 0.6);
            /* nền đen trong suốt */
            padding: 10px;
            bottom: -125px;
            width: 72%;


        }

        .banner-info h1 {
            font-size: 36px;
            color: #fff;
        }

        .banner-img {
            width: 116%;
            border-radius: 10px;

        }

        .banner-info p {
            color: #ccc;
            margin: 10px 0;
        }

        .xem-ngay {
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        button {
            width: 25%;
            padding: 10px;
        }

        .icon {
            background-color: rgba(218, 213, 213, 0.4);
            color: white;
            padding: 8px 10px;
            font-size: 16px;
            border-radius: 100px;
            margin-left: 10px;
        }

        .banner-qc {
            width: 110%;
            margin-top: 20px;
            border-radius: 10px;
        }

        .tieude {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0px 0 10px 0px;
        }

        .xemthem {
            font-size: 14px;
            color: #999;
            margin-right: -80px;
        }

        .banner-phim {
            display: flex;
            gap: 20px;
            margin-top: 0px;
            overflow-x: auto;
            scrollbar-width: none;
            padding-bottom: 10px;
            width: 110%;
        }

        .banner-phim img {
            flex: 0 0 180px;
            text-align: center;
            width: 170px;
            height: 220px;
            border-radius: 8px;
            display: block;
        }

        .tenphim {
            margin-top: 8px;
            color: white;
        }

        footer {
            color: #999;
            width: 70%;
            margin: auto;
            margin-top: 150px;
            height: 120px;
        }

        .foot1 {
            border-top: 2px solid #f1f1f2;
            display: flex;
            gap: 100px;
            font-size: 15px;
        }

        .foot1 img {
            margin-top: 22px;
            height: 40px;
            width: 70px;
            display: flex;
        }

        .foot2 {
            border-top: 2px solid #f1f1f2;
            font-size: 15px;
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><img class="logo" src="./img/logowebsite4x_1748221195181.png" alt="">
                    <li><a href="index.php?page_layout=trangchu">Trang chủ</a></li>
                    <li><a href="index.php?page_layout=truyenhinh">Truyền hình</a></li>
                    <li><a href="index.php?page_layout=phimbo">Phim bộ</a></li>
                    <li><a href="index.php?page_layout=vleague">V.League</a></li>
                    <li><a href="index.php?page_layout=thieunhi">Thiếu nhi</a></li>
                    <li>
                        <select id="xem-them">
                            <option value="#">Trực tiếp</option>
                            <option value="#">Anime</option>
                            <option value="#">Âm nhạc</option>
                            <option value="#">Giải trí</option>
                            <option value="#">ASEAN Cup</option>
                            <option value="#">Phim lẻ</option>
                            <option value="#">Học tập</option>
                            <option value="#">Esports</option>
                            <option value="#">ASEAN U23</option>
                            <option value="#">Galaxy Play</option>
                            <option value="#">K+</option>
                            <option value="#">Karaoke</option>
                            <option value="#">Thể thao</option>
                            <option value="#">NBA</option>
                            <option value="#">Podcast</option>
                            <option value="#">FA Cup</option>
                            <option value="#">FIFA CWC</option>
                            <option value="#">Shopee Cup</option>
                        </select>
                    </li>
                </ul>

            </nav>
            <div class="chucnang">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-regular fa-bell"></i>
                <button class="mua-goi">Mua gói</button>
                <a href="#" class="dang-nhap">Đăng nhập</a>
            </div>
        </div>
    </header>

    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'trangchu':
                include "trangchu.php";
                break;
            case 'truyenhinh':
                include "truyenhinh.php";
                break;
            case 'phimbo':
                include "phimbo.php";
                break;
            case 'vleague':
                include "vleague.php";
                break;
            case 'thieunhi':
                include "thieunhi.php";
                break;
            case 'dangxuat':
                include "dangxuat.php";
                session_unset();
                session_destroy();
                header("Location:login.php");
                break;
            case 'tructiep':
                include "tructiep.php";
                break;
        }
    }
    ?>

</body>

</html>