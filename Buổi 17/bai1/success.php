<?php
session_start();


if (!isset($_SESSION["login"])) {

    header("Location: login.html");
    exit();

}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập thành công</title>

    <style>
    body {
        font-family: Arial;
        text-align: center;
        margin-top: 100px;
    }

    a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: red;
        color: white;
        text-decoration: none;
    }
    </style>
</head>

<body>

    <h1>Đăng nhập thành công!</h1>

    <h3>Xin chào:
        <?php echo $_SESSION["username"]; ?>
    </h3>

    <a href="logout.php">Đăng xuất</a>

</body>

</html>