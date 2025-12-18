<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT Play</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!-- <header>
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
    </header> -->
    <main>
        <div class="banner">
            <a style="height: 350px;" href="#"><img src="./img/09_68bfea5810013f0001205210.jpg" alt="" class="banner-img"></a>
            <img style="height: 520px;" src="./img/mua-do2-1122.jpeg" alt="" class="banner-img" id="banner">
            <div class="banner-info">
                <h1 id="tenphim">Mưa đỏ</h1>
                <p id="thongtinphim">2025 • T13 • 124 phút • Việt Nam</p>
                <div>
                    <button class="xem-ngay"><i class="fa-solid fa-play"></i><a href="#"> Xem ngay</a></button>
                    <button class="xem-ngay" onclick="trailer()"><i class="fa-solid fa-film"></i><a href="#">Trailer</a></button>
                    <button class="icon"><i class="fa-regular fa-heart"></i><a href="#"></a></button>
                    <button class="icon"><i class="fa-solid fa-share-nodes"></i><a href="#"></a></button>
                    <button class="icon"><i class="fa-solid fa-heart"></i><a href="#"></a></button>
                </div>
            </div>
            <a href="#"><img src="./img/qc.jpg" alt="" class="banner-qc"></a>
            <?php
            include("connect.php");
            $sql = "SELECT t.* FROM the_loai t ";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $idTheLoai = $row['id'];

                // Lấy 5 phim của thể loại hiện tại
                $sql2 = "SELECT DISTINCT p.*, t.ten_the_loai 
             FROM phim p 
             JOIN phim_theloai pt ON p.id = pt.phim_id 
             JOIN the_loai t ON pt.the_loai_id = t.id 
             WHERE t.id = '$idTheLoai'
             ORDER BY p.id DESC 
             LIMIT 5";

                $result2 = mysqli_query($conn, $sql2);

                // Kiểm tra nếu có phim
                if (mysqli_num_rows($result2) == 0) {
                    continue;
                }
            ?>
                <div class="tieude">
                    <h2><?php echo $row["ten_the_loai"] ?></h2>
                    <a href="theloai.php?id=<?php echo $row['id'] ?>" class="xemthem">Xem thêm</a>
                </div>

                <div class="banner-phim">
                    <?php
                    while ($phim = mysqli_fetch_array($result2)) {
                    ?>
                        <div class="phim-item">
                            <a href='chitietphim.php?id=<?php echo $phim["id"] ?>'>
                                <img src="<?php echo $phim['poster']; ?>" alt="<?php echo $phim['ten_phim'] ?>">
                                <div class="tenphim" style="text-align: center; font-weight: bold;">
                                    <?php echo $phim["ten_phim"] ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
    </main>

    <footer>
        <div class="foot1">

            <div>
                <p>Về FPT Play</p>
                <p>Giới thiệu</p>
                <p>Các gói dịch vụ</p>
                <p>Liên hệ</p>
                <p>Trung tâm hỗ trợ</p>
                <p>Thông tin</p>
            </div>
            <div>
                <p>Dịch vụ</p>
                <p>Gói DATA</p>
                <p>Quảng cáo</p>
                <p>Mua gói</p>
                <p>Bảo hành</p>
            </div>
            <div>
                <p>Quy định</p>
                <p>Điều khoản sử dụng</p>
                <p>Chính sách thanh toán</p>
                <p>Chính sách bảo mật thông tin dữ liệu</p>
                <p>Cam kết của FPT Telecom</p>
            </div>
            <div>
                <p>19006600</p>
                <p>hotrofptplay@fpt.com</p>
                <p>Theo dõi chúng tôi trên:</p>
            </div>
        </div>
        <div class="foot2">
            <p>
                Công ty Cổ phần Viễn Thông FPT - Người đại diện: Ông Hoàng Việt Anh.
                Trụ sở: Tầng 2, Tòa nhà FPT Cầu Giấy, Số 17 Phố Duy Tân, Phường Dịch
                Vọng Hậu, Quận Cầu Giấy, TP.Hà Nội<br />

                Địa chỉ liên lạc: Tầng 9, Block A, tòa nhà FPT Cầu Giấy, số 10 Phạm
                Văn Bạch, quận Cầu Giấy, TP. Hà Nội <br />
                Số điện thoại liên hệ: 024 7300 2222. Thư điện
                tử:hotrokhachhang@fpt.com hoặc hotrofptplay@fpt.com <br /><br />
                Giấy chứng nhận đăng ký doanh nghiệp số 0101778163 do Sở Kế hoạch và
                Đầu tư Thành phố Hà Nội cấp lần đầu ngày 28/7/2005, cấp đăng ký thay
                đổi lần thứ 32 vào ngày 21/12/2023. <br />
                Giấy phép cung cấp dịch vụ phát thanh, truyền hình trả tiền số
                377/GP-BTTTT cấp sửa đổi bổ sung lần 1 ngày 10/10/2023.
            </p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>