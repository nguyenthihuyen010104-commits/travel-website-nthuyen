<?php

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);


    if (
        empty($full_name) ||
        empty($username) ||
        empty($email) ||
        empty($password)
    ) {
        die("Vui lòng nhập đầy đủ thông tin");
    }


    if (strlen($username) < 4 || strlen($username) > 30) {
        die("Username phải từ 4 đến 30 ký tự");
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email không hợp lệ");
    }


    if (strlen($password) < 8) {
        die("Password phải tối thiểu 8 ký tự");
    }


    $sql = "SELECT * FROM users
            WHERE username = :username
            OR email = :email";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":username" => $username,
        ":email" => $email
    ]);

    if ($stmt->rowCount() > 0) {
        die("Username hoặc Email đã tồn tại");
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO users
            (full_name, username, email, password)
            VALUES
            (:full_name, :username, :email, :password)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":full_name" => $full_name,
        ":username" => $username,
        ":email" => $email,
        ":password" => $hashed_password
    ]);

    echo "Đăng ký thành công";
    echo "<br>";
    echo "<a href='login.php'>Đăng nhập</a>";
}
