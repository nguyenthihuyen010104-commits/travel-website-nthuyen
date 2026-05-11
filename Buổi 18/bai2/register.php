<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>

<body>

    <h2>Đăng ký tài khoản</h2>

    <form action="process_register.php" method="POST">

        <p>
            Họ tên:
            <input type="text" name="full_name">
        </p>

        <p>
            Username:
            <input type="text" name="username">
        </p>

        <p>
            Email:
            <input type="email" name="email">
        </p>

        <p>
            Password:
            <input type="password" name="password">
        </p>

        <button type="submit">Đăng ký</button>

    </form>

    <p>
        <a href="login.php">Đăng nhập</a>
    </p>

</body>

</html>