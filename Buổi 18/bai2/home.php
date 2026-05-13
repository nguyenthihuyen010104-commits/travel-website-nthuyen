<?php

session_start();


if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>

<body>

    <h2>Xin chào <?php echo $_SESSION["full_name"]; ?></h2>

    <p>Username: <?php echo $_SESSION["username"]; ?></p>

    <p>Role: <?php echo $_SESSION["role"]; ?></p>

    <p>Đăng nhập thành công.</p>

    <a href="logout.php">Đăng xuất</a>

</body>

</html>