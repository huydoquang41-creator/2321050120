let danhSachPhim = [
    {
        id: 1,
        tenPhim: "Mưa đỏ",
        namPhatHanh: 2025,
        tuoi: "T13",
        thoiLuong: "124 phút",
        quocGia: "Việt Nam",
        poster: "./img/mua-do2-1122.jpeg",
        trailer: "https://www.youtube.com/watch?v=NDonnQvCdMw",
    },
    {
        id: 2,
        tenPhim: "Thám tử lừng danh Conan: Ngôi sao 5 cánh 1 triệu đô",
        namPhatHanh: 2024,
        tuoi: "T13",
        thoiLuong: "110 phút",
        quocGia: "Nhật Bản",
        poster: "./img/phim/conan.jpg",
        trailer: "https://www.youtube.com/watch?v=U9rCa_f3yoM",
    },
    {
        id: 3,
        tenPhim: "Người đẹp và quái vật",
        namPhatHanh: 2017,
        tuoi: "T16",
        thoiLuong: "130 phút",
        quocGia: "Mỹ",
        poster: './img/phim/beautyandthebeaets.jpg',
        trailer: "https://www.youtube.com/watch?v=o6k1ChY8kDg",
    },
    {
        id: 4,
        tenPhim: "Kungfu Panda",
        namPhatHanh: 2024,
        tuoi: "T13",
        thoiLuong: "115 phút",
        quocGia: "Âu Mỹ",
        poster: "./img/phim/kungfupanda.jpg",
        trailer: "https://www.youtube.com/watch?v=_inKs4eeHiI",
    },
];

let phimHienTai = danhSachPhim[0];

let bannerImg = document.getElementById("banner");

let bannerText = document.getElementById("tenphim");
let bannerInfo = document.getElementById("thongtinphim");

function chonPhim(idPhim) {
    for (let i = 0; i < danhSachPhim.length; i++) {
        if (danhSachPhim[i].id == idPhim) {
            phimHienTai = danhSachPhim[i];
            bannerImg.src = danhSachPhim[i].poster;
            alert("Bạn đã chọn phim: " + danhSachPhim[i].tenPhim);
            bannerText.innerText = danhSachPhim[i].tenPhim;
            bannerInfo.innerText = danhSachPhim[i].namPhatHanh + " • " + danhSachPhim[i].tuoi + " • " + danhSachPhim[i].thoiLuong + " • " + danhSachPhim[i].quocGia;
            break;
        }
    }
}

function trailer() {
    if (phimHienTai && phimHienTai.trailer) {
        window.open(phimHienTai.trailer, "_blank");
    } else {
        alert("Phim này chưa có trailer!");
    }
}