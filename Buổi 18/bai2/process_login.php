<?php

session_start();

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        die("Vui lòng nhập đầy đủ thông tin");
    }


    $sql = "SELECT * FROM users
            WHERE username = :username";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":username" => $username
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$user) {
        die("Sai username hoặc password");
    }


    if (!password_verify($password, $user["password"])) {
        die("Sai username hoặc password");
    }


    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["full_name"] = $user["full_name"];
    $_SESSION["role"] = $user["role"];

    header("Location: home.php");
    exit();
}
