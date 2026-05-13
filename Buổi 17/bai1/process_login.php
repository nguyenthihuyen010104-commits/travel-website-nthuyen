<?php
session_start();


$correct_username = "admin";
$correct_password = "Admin@123";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

   
    if (empty($username) || empty($password)) {

        echo "<h3>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!</h3>";
        echo "<a href='login.html'>Quay lại</a>";

    } else {

        
        if ($username == $correct_username && $password == $correct_password) {

           
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;

       
            header("Location: success.php");
            exit();

        } else {

            echo "<h3>Sai tên đăng nhập hoặc mật khẩu!</h3>";
            echo "<a href='login.html'>Thử lại</a>";

        }
    }

} else {

    echo "Không hợp lệ!";

}
?>