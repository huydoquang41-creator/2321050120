<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 1</title>
</head>
<body>
    <?php 
        // In ra mặt hình
        echo "Xin chào <br>";
        
        echo "Hi ";

        // 2. Biến
        $ten = "Đỗ Quang Huy";

        $tuoi = 20;

        echo $ten . " " . $tuoi . " tuổi";

        // 3. Hằng
        define("pi","3.14");
        echo pi . "<br>";

        //4. Phân biệt '' và ""

        echo '$ten' . "<br>";// Nháy đơn sẽ chỉ ra kết quả trong dấu nháy
        echo "$ten"."<br>";//Nháy đôi sẽ chỉ ra được tên biến nếu nó nằm bên trong

        //5. Chuỗi
        #5.1 Kiểm tra độ dài của chuỗi
        echo strlen($ten) . "<br>";#Đếm số kí tự

        #5.2 Đếm số từ
        echo str_word_count($ten) . "<br>";#Đếm số từ

        #5.3 Tìm kiếm kí từ
        echo strpos($ten,"H"). "<br>"; #Trả về thứ tự kí tự trong chuỗi

        #5.4 Thay thế kí tự trong chuỗi
        echo str_replace("Huy" , "HUY", $ten) . "<br>";

        #6.Toán tử
        
        $soThuNhat = 10; 
        $soThuHai = 5;
        $total = $soThuNhat + $soThuHai;
        # + - * /
        # += -= == != > < >= <= ===
        echo "Tổng là : " . $soThuNhat + $soThuHai . "<br>";

        // 7. Câu điều kiện

            //if ("Điều kiện"){
                // Logic 
            // } 
            
            // esleif(){}

        // kiểm tra tổng của số thứ nhất và số thứ 2
        // < 15 thì in ra nhỏ hơn 15
        // = 15 thì in ra bằng 15
        // còn lại là lớn hơn
        
        if($total < 15){
            echo "Tổng nhỏ hơn 15" . "<br>" ;
        }
        elseif($total == 15){
            echo "Tổng bằng 15" . "<br>" ;
        }
        else{
            echo "Tổng lớn hơn 15" . "<br>" ;
        }

        //8. switch case
        $color = "red";
        switch ($color){
            case "red":
                echo "is red" . "<br>";
                break;
            case "blue":
                echo "is blue" . "<br>";
                break;
            default:
                echo "no color" . "<br>";
                break;
        }

        // 9.Vòng lặp
        for($i = 0 ; $i < 10 ; $i++){
            echo $i . " I love you" . "<br>";
        }


        // 10.Mảng
        $mang = ["An", "Nhật Anh", "Vũ Anh"];

        // Đếm phần tử trong mảng

        echo "Số phần tử trong mảng : " . count($mang) . "<br>";

        echo $mang[1] ."<br>";

        echo print_r($mang) . "<br>" ;
        
        $mang[0] = "Hải Anh";

        echo print_r($mang) . "<br>";

        $mang[] = "Tâm";

        echo print_r($mang) . "<br>";

        unset($mang[3]);

        echo print_r($mang) . "<br>";

    ?>
</body>
</html>