<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách tour</title>

    <style>
    table {
        border-collapse: collapse;
        width: 80%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>

    <h2>Danh sách tour du lịch</h2>

    <?php

$tours = [
    [
        "ma" => "T01",
        "ten" => "Tour Đà Lạt",
        "diemden" => "Đà Lạt",
        "gia" => 2000000,
        "songay" => 3
    ],

    [
        "ma" => "T02",
        "ten" => "Tour Phú Quốc",
        "diemden" => "Phú Quốc",
        "gia" => 3500000,
        "songay" => 4
    ],

    [
        "ma" => "T03",
        "ten" => "Tour Hà Nội",
        "diemden" => "Hà Nội",
        "gia" => 2500000,
        "songay" => 2
    ],

    [
        "ma" => "T04",
        "ten" => "Tour Nha Trang",
        "diemden" => "Nha Trang",
        "gia" => 3000000,
        "songay" => 3
    ]
];

?>

    <table>
        <tr>
            <th>Mã tour</th>
            <th>Tên tour</th>
            <th>Điểm đến</th>
            <th>Giá tour</th>
            <th>Số ngày</th>
        </tr>

        <?php foreach($tours as $tour){ ?>

        <tr>
            <td><?php echo $tour["ma"]; ?></td>
            <td><?php echo $tour["ten"]; ?></td>
            <td><?php echo $tour["diemden"]; ?></td>
            <td><?php echo number_format($tour["gia"]); ?> VNĐ</td>
            <td><?php echo $tour["songay"]; ?></td>
        </tr>

        <?php } ?>

    </table>

    <hr>

    <h2>Form đặt tour</h2>

    <form method="POST">

        <label>Họ tên:</label><br>
        <input type="text" name="hoten"><br><br>

        <label>Chọn mã tour:</label><br>
        <select name="matour">
            <option value="">-- Chọn tour --</option>

            <?php
        foreach($tours as $tour){
            echo "<option value='".$tour["ma"]."'>".$tour["ma"]." - ".$tour["ten"]."</option>";
        }
        ?>

        </select><br><br>

        <label>Số người:</label><br>
        <input type="number" name="songuoi"><br><br>

        <button type="submit" name="submit">Đặt tour</button>

    </form>

    <hr>

    <?php

if(isset($_POST['submit'])){

    $hoten = trim($_POST['hoten']);
    $matour = $_POST['matour'];
    $songuoi = $_POST['songuoi'];

    $loi = "";

    if($hoten == ""){
        $loi .= "Họ tên không được rỗng.<br>";
    }

    if(!is_numeric($songuoi) || $songuoi <= 0){
        $loi .= "Số người phải lớn hơn 0.<br>";
    }

    $tourchon = null;

    foreach($tours as $tour){
        if($tour["ma"] == $matour){
            $tourchon = $tour;
            break;
        }
    }

    if($tourchon == null){
        $loi .= "Mã tour không hợp lệ.<br>";
    }

    if($loi != ""){
        echo "<h3>Thông báo lỗi:</h3>";
        echo $loi;
    }else{

        $tongtien = $tourchon["gia"] * $songuoi;

        echo "<h3>Thông tin đặt tour</h3>";

        echo "Họ tên khách hàng: ".$hoten."<br>";
        echo "Tên tour: ".$tourchon["ten"]."<br>";
        echo "Điểm đến: ".$tourchon["diemden"]."<br>";
        echo "Số người: ".$songuoi."<br>";
        echo "Tổng tiền: ".number_format($tongtien)." VNĐ";
    }

}

?>

</body>

</html>